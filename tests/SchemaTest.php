<?php

namespace Sysvale\Ras\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Sysvale\Ras\Ras;
use Sysvale\Ras\Schema;
use Sysvale\Ras\UnsupportedRasVersion;

class SchemaTest extends TestCase
{
    private const CONSUMO = 'br\gov\saude\esusab\ras\consumoalimentar\FichaConsumoAlimentarThrift';
    private const HEADER = 'br\gov\saude\esusab\ras\common\UnicaLotacaoHeaderThrift';
    private const OCI = 'br\gov\saude\esusab\ras\solicitacaooci\SolicitacaoOciThrift';

    protected function tearDown(): void
    {
        Ras::supportUpTo(null);

        parent::tearDown();
    }

    public function testForResolvesDeclaredVersionToItsSchema()
    {
        $factory = Ras::for('8.4.1');

        $this->assertInstanceOf(Schema::class, $factory);
        $this->assertSame('8.4.2', $factory->version());
        $this->assertSame('Sysvale\Ras\V8_4_2', $factory->namespace());
    }

    public function testVersionsOfTheSameSchemaShareTheFactoryInstance()
    {
        $this->assertSame(Ras::for('8.4.0'), Ras::for('8.4.2'));
        $this->assertNotSame(Ras::for('8.4.2'), Ras::for('8.5.0'));
    }

    public function testVersionAboveAllSchemasThrowsUnlessSupportIsDeclared()
    {
        try {
            Ras::for('9.0.0');
            $this->fail('Esperava UnsupportedRasVersion');
        } catch (UnsupportedRasVersion $e) {
            $this->assertStringContainsString('9.0.0', $e->getMessage());
        }

        Ras::supportUpTo('9.0.0');

        $this->assertSame(Ras::for(Ras::latest()), Ras::for('9.0.0'));
    }

    public function testForRejectsInvalidVersion()
    {
        $this->expectException(InvalidArgumentException::class);

        Ras::for('');
    }

    public function testClassForPlacesTheCanonicalNameInTheSchemaNamespace()
    {
        $this->assertSame(
            'Sysvale\Ras\V7_3_0\\' . self::CONSUMO,
            Ras::for('7.4.2')->classFor('\\' . self::CONSUMO)
        );
    }

    public function testClassForRejectsNameOutsideTheCanonicalNamespace()
    {
        $this->expectException(InvalidArgumentException::class);

        Ras::for('8.7.0')->classFor('App\Qualquer');
    }

    public function testMakeCreatesAnInstanceOfTheSchemaFamilyWithTheValues()
    {
        $ficha = Ras::for('8.4.2')->make(self::CONSUMO, ['uuidFicha' => 'abc']);

        $this->assertInstanceOf('Sysvale\Ras\V8_4_2\\' . self::CONSUMO, $ficha);
        $this->assertSame('abc', $ficha->uuidFicha);
    }

    public function testMakeFailsClearlyForClassThatDoesNotExistInTheSchema()
    {
        $this->assertInstanceOf('Sysvale\Ras\V7_2_0\\' . self::OCI, Ras::for('7.2.0')->make(self::OCI));

        try {
            Ras::for('6.3.3')->make(self::OCI);
            $this->fail('Esperava InvalidArgumentException');
        } catch (InvalidArgumentException $e) {
            $this->assertStringContainsString('SolicitacaoOciThrift', $e->getMessage());
            $this->assertStringContainsString('6.3.3', $e->getMessage());
        }
    }

    public function testDeserializeReadsTheSameBlobWithTheNameOfEachVersion()
    {
        $v842 = Ras::for('8.4.2');
        $v870 = Ras::for('8.7.0');

        $bytes = $v842->serialize($v842->make(self::CONSUMO, [
            'uuidFicha' => 'abc',
            'stNaoPossuiCpf' => true,
            'justificativaNaoPossuiCpf' => 2,
        ]));

        $lidaNa842 = $v842->deserialize($bytes, self::CONSUMO);
        $lidaNa870 = $v870->deserialize($bytes, self::CONSUMO);

        $this->assertTrue($lidaNa842->stNaoPossuiCpf);
        $this->assertSame(2, (int) $lidaNa842->justificativaNaoPossuiCpf);
        $this->assertTrue($lidaNa870->stCidadaoNaoPossuiCpf);
        $this->assertSame(2, (int) $lidaNa870->justificativaCidadaoNaoPossuiCpf);
        $this->assertFalse(property_exists($lidaNa870, 'stNaoPossuiCpf'));
    }

    public function testDeserializeReturnsObjectsOfTheRequestedSchema()
    {
        $old = Ras::for('6.3.3');
        $bytes = $old->serialize($old->make(self::CONSUMO, ['uuidFicha' => 'abc', 'cpfCidadao' => '12345678909']));

        $read = Ras::for('8.7.0')->deserialize($bytes, self::CONSUMO);

        $this->assertInstanceOf('Sysvale\Ras\V8_7_0\\' . self::CONSUMO, $read);
        $this->assertSame('12345678909', $read->cpfCidadao);
        $this->assertNull($read->stCidadaoNaoPossuiCpf);
    }

    public function testDeserializeFailsForClassMissingInTheSchema()
    {
        $this->expectException(InvalidArgumentException::class);

        Ras::for('6.3.3')->deserialize('', self::OCI);
    }

    public function testSerializeRejectsObjectFromAnotherSchema()
    {
        $header = Ras::for('8.7.0')->make(self::HEADER);

        try {
            Ras::for('8.4.2')->serialize($header);
            $this->fail('Esperava InvalidArgumentException');
        } catch (InvalidArgumentException $e) {
            $this->assertStringContainsString('8.4.2', $e->getMessage());
        }
    }
}
