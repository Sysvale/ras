<?php

namespace Sysvale\Ras;

use InvalidArgumentException;

/**
 * Resolve a versão declarada por uma ficha para o schema Thrift (pasta V*).
 */
final class Ras
{
    private const VERSION_PATTERN = '/^\d+\.\d+\.\d+$/';

    private const ENVELOPE = 'br\gov\saude\esusab\dadotransp\DadoTransporteThrift';

    private const VERSAO = 'br\gov\saude\esusab\dadotransp\VersaoThrift';

    /** @var array|null */
    private static $config;

    /** @var Schema[] */
    private static $factories = [];

    /** @var string|null */
    private static ?string $supportedUpTo = null;

    /**
     * Declara que as versões maiores que o último schema, até $version, usam o último schema
     * (para versões do RAS que não mudam a estrutura do Thrift). null remove a declaração.
     *
     * @param  string|null $version Teto no formato x.y.z, ou null.
     * @return void
     * @throws InvalidArgumentException Se $version não estiver no formato x.y.z.
     */
    public static function supportUpTo(?string $version): void
    {
        if ($version !== null && !preg_match(self::VERSION_PATTERN, $version)) {
            throw new InvalidArgumentException("Versão RAS inválida: '$version'.");
        }

        self::$supportedUpTo = $version;
    }

    /**
     * Lê o envelope, descobre tipo e versão e desserializa o conteúdo.
     *
     * @param  string      $bytes   Envelope serializado (DadoTransporteThrift).
     * @param  string|null $version Versão x.y.z que substitui a do envelope, quando ela não for confiável.
     * @return Record
     * @throws UnsupportedRecordType Se o tipo do registro não estiver em TipoDadoSerializado.
     * @throws UnsupportedRasVersion Se nenhum schema atender a versão.
     * @throws InvalidArgumentException Se faltar o conteúdo, ou a versão (no envelope e no parâmetro).
     */
    public static function readTransport(string $bytes, ?string $version = null): Record
    {
        $transport = self::for(self::latest())->deserialize($bytes, self::ENVELOPE);

        $type = TipoDadoSerializado::tryFrom((int) $transport->tipoDadoSerializado)
            ?? throw new UnsupportedRecordType("Tipo de registro não suportado: {$transport->tipoDadoSerializado}.");

        if ($transport->dadoSerializado === null) {
            throw new InvalidArgumentException('O registro não traz o conteúdo (dadoSerializado).');
        }

        $version = $version
            ?? self::envelopeVersion($transport)
            ?? throw new InvalidArgumentException('O registro não informa a versão (versao) e nenhuma versão foi passada.');
        $schema = self::for($version);

        return new Record(
            $transport,
            $type,
            $version,
            $schema,
            $schema->deserialize($transport->dadoSerializado, $type->classe())
        );
    }

    /**
     * Serializa o conteúdo e o envelope. $transport traz os campos do envelope (uuid, cnes, lote...);
     * tipoDadoSerializado, versao e dadoSerializado são sempre preenchidos aqui.
     *
     * @param  object              $conteudo  Objeto Thrift do tipo, criado pelo schema da versão.
     * @param  TipoDadoSerializado $type      Tipo do registro.
     * @param  string              $version   Versão x.y.z gravada no envelope.
     * @param  array               $transport Campos do envelope, por nome.
     * @return string Envelope serializado.
     * @throws InvalidArgumentException Se $conteudo não for do tipo informado no schema da versão.
     * @throws UnsupportedRasVersion Se nenhum schema atender a versão.
     */
    public static function writeTransport(object $conteudo, TipoDadoSerializado $type, string $version, array $transport = []): string
    {
        $schema = self::for($version);
        $class = $schema->classFor($type->classe());

        if (!$conteudo instanceof $class) {
            throw new InvalidArgumentException(
                'O conteúdo ' . get_class($conteudo) . " não é do tipo {$type->name} no schema {$schema->version()}."
            );
        }

        [$major, $minor, $revision] = array_map('intval', explode('.', $version));
        $latest = self::for(self::latest());

        return $latest->serialize($latest->make(self::ENVELOPE, array_merge($transport, [
            'tipoDadoSerializado' => $type->value,
            'versao' => $latest->make(self::VERSAO, compact('major', 'minor', 'revision')),
            'dadoSerializado' => $schema->serialize($conteudo),
        ])));
    }

    /**
     * Fábrica das classes da versão. Versões do mesmo schema recebem a mesma instância.
     *
     * @param  string $version Versão x.y.z.
     * @return Schema
     * @throws InvalidArgumentException Se $version não estiver no formato x.y.z.
     * @throws UnsupportedRasVersion Se nenhum schema atender a versão.
     */
    public static function for(string $version): Schema
    {
        $schema = self::schemaFor($version);

        if (!isset(self::$factories[$schema])) {
            self::$factories[$schema] = new Schema($schema, 'Sysvale\\Ras\\' . self::config()['schemas'][$schema]);
        }

        return self::$factories[$schema];
    }

    /**
     * @return string Versão do último schema.
     */
    public static function latest(): string
    {
        return self::config()['latest'];
    }

    /**
     * @return string[] Versões dos schemas incluídos no pacote.
     */
    public static function schemas(): array
    {
        return array_keys(self::config()['schemas']);
    }

    /**
     * Ordem: faixa de compat, versão exata, menor schema imediatamente acima e, para versões
     * maiores que todos os schemas, o último schema se a versão estiver até o teto de supportUpTo().
     *
     * @param  string $version Versão x.y.z.
     * @return string Versão do schema resolvido.
     * @throws InvalidArgumentException Se $version não estiver no formato x.y.z.
     * @throws UnsupportedRasVersion Se nenhum schema atender a versão.
     */
    public static function schemaFor(string $version): string
    {
        if (!preg_match(self::VERSION_PATTERN, $version)) {
            throw new InvalidArgumentException("Versão RAS inválida: '$version'.");
        }

        $config = self::config();

        foreach ($config['compat'] as $range) {
            if (version_compare($version, $range['from'], '>=') && version_compare($version, $range['to'], '<=')) {
                return $range['schema'];
            }
        }

        if (isset($config['schemas'][$version])) {
            return $version;
        }

        foreach (array_keys($config['schemas']) as $schema) {
            if (version_compare($schema, $version, '>')) {
                return $schema;
            }
        }

        if (self::$supportedUpTo !== null && version_compare($version, self::$supportedUpTo, '<=')) {
            return $config['latest'];
        }

        throw new UnsupportedRasVersion("Nenhum schema RAS atende a versão '$version'.");
    }

    /**
     * @param  string $version Versão x.y.z.
     * @return string Namespace raiz do schema resolvido (sem o prefixo br\).
     * @throws InvalidArgumentException Se $version não estiver no formato x.y.z.
     * @throws UnsupportedRasVersion Se nenhum schema atender a versão.
     */
    public static function namespaceFor(string $version): string
    {
        return 'Sysvale\\Ras\\' . self::config()['schemas'][self::schemaFor($version)];
    }

    /**
     * Troca o prefixo "br\" do nome da classe pelo namespace do schema resolvido.
     *
     * @param  string $version Versão x.y.z.
     * @param  string $class   Nome canônico da classe, no namespace br\.
     * @return string Nome completo da classe no schema.
     * @throws InvalidArgumentException Se a classe não estiver no namespace br\ ou não existir no schema.
     * @throws UnsupportedRasVersion Se nenhum schema atender a versão.
     */
    public static function classFor(string $version, string $class): string
    {
        return self::for($version)->classFor($class);
    }

    /**
     * Versão declarada no envelope.
     *
     * @param  object $envelope DadoTransporteThrift de qualquer schema.
     * @return string|null Versão x.y.z, ou null se o envelope não informar a versão.
     */
    public static function envelopeVersion(object $envelope): ?string
    {
        $versao = $envelope->versao;

        return $versao === null ? null : sprintf('%d.%d.%d', $versao->major, $versao->minor, $versao->revision);
    }

    /**
     * @return array Conteúdo de versions.php.
     */
    private static function config(): array
    {
        if (self::$config === null) {
            self::$config = require __DIR__ . '/versions.php';
        }

        return self::$config;
    }
}
