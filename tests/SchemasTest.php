<?php

namespace Sysvale\Ras\Tests;

use PHPUnit\Framework\TestCase;
use Sysvale\Ras\Ras;
use Thrift\Serializer\TBinarySerializer;

class SchemasTest extends TestCase
{
    private const FICHA = 'br\gov\saude\esusab\ras\consumoalimentar\FichaConsumoAlimentarThrift';

    public function testEveryClassOfEverySchemaLoadsInTheSameProcess()
    {
        $src = dirname(__DIR__) . '/src';

        foreach (Ras::schemas() as $version) {
            $folder = 'V' . str_replace('.', '_', $version);
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator("$src/$folder", \FilesystemIterator::SKIP_DOTS));

            foreach ($files as $file) {
                $class = 'Sysvale\Ras\\' . str_replace('/', '\\', substr($file->getPathname(), strlen($src) + 1, -4));

                $this->assertTrue(class_exists($class) || interface_exists($class), "Não carregou $class");
            }
        }
    }

    public function testLegacyNamespaceIsAliasOfLatestSchema()
    {
        $legacy = self::FICHA;
        $latest = Ras::classFor(Ras::latest(), self::FICHA);

        $this->assertInstanceOf($latest, new $legacy());
    }

    public function testSchemasAreDifferentClasses()
    {
        $this->assertNotSame(
            Ras::classFor('6.3.3', self::FICHA),
            Ras::classFor('8.7.0', self::FICHA)
        );
    }

    public function testFieldsAddedInNewerSchemaAreLostWhenReadingWithOlderSchema()
    {
        $newer = Ras::classFor('8.7.0', self::FICHA);
        $older = Ras::classFor('6.3.3', self::FICHA);

        $blob = TBinarySerializer::serialize(new $newer([
            'uuidFicha' => 'abc',
            'stCidadaoNaoPossuiCpf' => true,
            'justificativaCidadaoNaoPossuiCpf' => 1,
        ]));

        $read = TBinarySerializer::deserialize($blob, $older);

        $this->assertSame('abc', $read->uuidFicha);
        $this->assertFalse(property_exists($read, 'stCidadaoNaoPossuiCpf'));
    }

    public function testConsumptionMarkerCpfFlagKeepsIdAndChangesNameBetween842And870()
    {
        $v842 = Ras::classFor('8.4.2', self::FICHA);
        $v870 = Ras::classFor('8.7.0', self::FICHA);

        $blob = TBinarySerializer::serialize(new $v842([
            'uuidFicha' => 'abc',
            'stNaoPossuiCpf' => true,
            'justificativaNaoPossuiCpf' => 2,
        ]));

        $read842 = TBinarySerializer::deserialize($blob, $v842);
        $read870 = TBinarySerializer::deserialize($blob, $v870);

        $this->assertTrue($read842->stNaoPossuiCpf);
        $this->assertSame(2, (int) $read842->justificativaNaoPossuiCpf);
        $this->assertTrue($read870->stCidadaoNaoPossuiCpf);
        $this->assertSame(2, (int) $read870->justificativaCidadaoNaoPossuiCpf);
        $this->assertFalse(property_exists($read870, 'stNaoPossuiCpf'));
    }

    public function testBlobFromOlderSchemaIsReadByNewerSchemaWithoutNewFields()
    {
        $newer = Ras::classFor('8.7.0', self::FICHA);
        $older = Ras::classFor('6.3.3', self::FICHA);

        $blob = TBinarySerializer::serialize(new $older([
            'uuidFicha' => 'abc',
            'cpfCidadao' => '12345678909',
        ]));

        $read = TBinarySerializer::deserialize($blob, $newer);

        $this->assertSame('abc', $read->uuidFicha);
        $this->assertSame('12345678909', $read->cpfCidadao);
        $this->assertNull($read->stCidadaoNaoPossuiCpf);
    }
}
