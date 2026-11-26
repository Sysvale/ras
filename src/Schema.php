<?php

namespace Sysvale\Ras;

use InvalidArgumentException;
use Thrift\Serializer\TBinarySerializer;

/**
 * Fábrica das classes Thrift de uma versão do schema, entregue por Ras::for().
 * As classes são referenciadas pelo nome canônico (namespace br\...).
 */
final class Schema
{
    /** @var string */
    private $version;

    /** @var string */
    private $namespace;

    /**
     * @param string $version   Versão do schema resolvido.
     * @param string $namespace Namespace raiz do schema (Sysvale\Ras\V*).
     */
    public function __construct(string $version, string $namespace)
    {
        $this->version = $version;
        $this->namespace = $namespace;
    }

    /**
     * Versão do schema resolvido, que pode ser diferente da versão pedida.
     *
     * @return string
     */
    public function version(): string
    {
        return $this->version;
    }

    /**
     * @return string Namespace raiz do schema (Sysvale\Ras\V*).
     */
    public function namespace(): string
    {
        return $this->namespace;
    }

    /**
     * @param  string $class Nome canônico da classe, no namespace br\.
     * @return string Nome completo da classe no schema.
     * @throws InvalidArgumentException Se a classe não estiver no namespace br\ ou não existir na versão.
     */
    public function classFor(string $class): string
    {
        $class = ltrim($class, '\\');

        if (strncmp($class, 'br\\', 3) !== 0) {
            throw new InvalidArgumentException("A classe deve estar no namespace 'br\\': '$class'.");
        }

        $resolved = $this->namespace . '\\' . $class;

        if (!class_exists($resolved)) {
            throw new InvalidArgumentException("A classe '$class' não existe no schema {$this->version}.");
        }

        return $resolved;
    }

    /**
     * @param  string $class  Nome canônico da classe, no namespace br\.
     * @param  array  $values Valores iniciais dos campos, por nome.
     * @return object Instância da classe no schema.
     * @throws InvalidArgumentException Se a classe não estiver no namespace br\ ou não existir na versão.
     */
    public function make(string $class, array $values = []): object
    {
        $resolved = $this->classFor($class);

        return new $resolved($values);
    }

    /**
     * @param  string $bytes Conteúdo serializado em Thrift binário.
     * @param  string $class Nome canônico da classe, no namespace br\.
     * @return object Instância da classe no schema.
     * @throws InvalidArgumentException Se a classe não estiver no namespace br\ ou não existir na versão.
     */
    public function deserialize(string $bytes, string $class): object
    {
        return TBinarySerializer::deserialize($bytes, $this->classFor($class));
    }

    /**
     * Só aceita objetos criados por este schema.
     *
     * @param  object $object Objeto Thrift do schema.
     * @return string Conteúdo serializado em Thrift binário.
     * @throws InvalidArgumentException Se o objeto não pertencer ao schema.
     */
    public function serialize(object $object): string
    {
        if (strncmp(get_class($object), $this->namespace . '\\', strlen($this->namespace) + 1) !== 0) {
            throw new InvalidArgumentException(
                'O objeto ' . get_class($object) . " não pertence ao schema {$this->version}."
            );
        }

        return TBinarySerializer::serialize($object);
    }
}
