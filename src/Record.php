<?php

namespace Sysvale\Ras;

/**
 * Registro lido por Ras::readTransport().
 */
final class Record
{
    /** @var object */
    private $transport;

    /** @var TipoDadoSerializado */
    private $type;

    /** @var string */
    private $version;

    /** @var Schema */
    private $schema;

    /** @var object */
    private $conteudo;

    /**
     * @param object              $transport Envelope (DadoTransporteThrift).
     * @param TipoDadoSerializado $type      Tipo do registro.
     * @param string              $version   Versão x.y.z usada para ler o conteúdo.
     * @param Schema              $schema    Schema resolvido para a versão.
     * @param object              $conteudo  Conteúdo desserializado.
     */
    public function __construct(object $transport, TipoDadoSerializado $type, string $version, Schema $schema, object $conteudo)
    {
        $this->transport = $transport;
        $this->type = $type;
        $this->version = $version;
        $this->schema = $schema;
        $this->conteudo = $conteudo;
    }

    /**
     * Envelope, com dadoSerializado ainda em binário.
     *
     * @return \br\gov\saude\esusab\dadotransp\DadoTransporteThrift
     */
    public function envelope(): object
    {
        return $this->transport;
    }

    /**
     * @return TipoDadoSerializado
     */
    public function type(): TipoDadoSerializado
    {
        return $this->type;
    }

    /**
     * Versão usada para ler o conteúdo (a do envelope ou a informada).
     *
     * @return string Versão x.y.z.
     */
    public function version(): string
    {
        return $this->version;
    }

    /**
     * @return Schema Schema resolvido para a versão.
     */
    public function schema(): Schema
    {
        return $this->schema;
    }

    /**
     * Conteúdo do tipo, na classe do schema da versão. Pode conter várias fichas.
     *
     * @return object
     */
    public function conteudo(): object
    {
        return $this->conteudo;
    }
}
