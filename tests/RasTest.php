<?php

namespace Sysvale\Ras\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Sysvale\Ras\Ras;
use Sysvale\Ras\UnsupportedRasVersion;

class RasTest extends TestCase
{
    private const FICHA = 'br\gov\saude\esusab\ras\consumoalimentar\FichaConsumoAlimentarThrift';

    private const ENVELOPE = 'br\gov\saude\esusab\dadotransp\DadoTransporteThrift';

    private const VERSAO = 'br\gov\saude\esusab\dadotransp\VersaoThrift';

    public function testExactVersionResolvesToItself()
    {
        $this->assertSame('6.3.3', Ras::schemaFor('6.3.3'));
        $this->assertSame('8.7.0', Ras::schemaFor('8.7.0'));
    }

    public function testVersionBelowFirstSchemaResolvesToFirstSchema()
    {
        $this->assertSame('6.3.3', Ras::schemaFor('4.2.3'));
    }

    public function testCompatRangesResolveIntermediateVersions()
    {
        $this->assertSame('6.3.3', Ras::schemaFor('6.3.9'));
        $this->assertSame('7.2.0', Ras::schemaFor('7.2.1'));
        $this->assertSame('7.2.2', Ras::schemaFor('7.2.3'));
        $this->assertSame('7.3.0', Ras::schemaFor('7.3.3'));
        $this->assertSame('7.3.0', Ras::schemaFor('7.4.2'));
        $this->assertSame('8.4.2', Ras::schemaFor('8.4.0'));
        $this->assertSame('8.4.2', Ras::schemaFor('8.4.2'));
        $this->assertSame('8.7.0', Ras::schemaFor('8.5.0'));
        $this->assertSame('8.7.0', Ras::schemaFor('8.7.4'));
    }

    public function testVersionAboveAllSchemasThrowsByDefault()
    {
        try {
            Ras::schemaFor('8.8.0');
            $this->fail('Esperava UnsupportedRasVersion');
        } catch (UnsupportedRasVersion $e) {
            $this->assertStringContainsString('8.8.0', $e->getMessage());
        }
    }

    public function testSupportUpToMakesVersionsAboveTheLatestUseTheLatestUpToTheCeiling()
    {
        Ras::supportUpTo('8.9.0');

        $this->assertSame(Ras::latest(), Ras::schemaFor('8.8.0'));
        $this->assertSame(Ras::latest(), Ras::schemaFor('8.9.0'));

        $this->expectException(UnsupportedRasVersion::class);

        Ras::schemaFor('8.9.1');
    }

    public function testSupportUpToNullRestoresTheException()
    {
        Ras::supportUpTo('9.0.0');
        Ras::supportUpTo(null);

        $this->expectException(UnsupportedRasVersion::class);

        Ras::schemaFor('8.8.0');
    }

    public function testSupportUpToRejectsInvalidVersion()
    {
        $this->expectException(InvalidArgumentException::class);

        Ras::supportUpTo('8.9');
    }

    protected function tearDown(): void
    {
        Ras::supportUpTo(null);

        parent::tearDown();
    }

    public function testInvalidVersionThrows()
    {
        $this->expectException(InvalidArgumentException::class);

        Ras::schemaFor('');
    }

    public function testClassForReplacesPrefix()
    {
        $this->assertSame(
            'Sysvale\Ras\V6_3_3\\' . self::FICHA,
            Ras::classFor('6.0.0', '\\' . self::FICHA)
        );
    }

    public function testClassForRejectsClassOutsideBrNamespace()
    {
        $this->expectException(InvalidArgumentException::class);

        Ras::classFor('6.3.3', 'App\Qualquer');
    }

    public function testClassForRejectsClassThatDoesNotExistInTheSchema()
    {
        $this->expectException(InvalidArgumentException::class);

        Ras::classFor('6.3.3', 'br\gov\saude\esusab\ras\consumoalimentar\ClasseInexistente');
    }

    public function testEnvelopeVersionJoinsMajorMinorAndRevision()
    {
        $schema = Ras::for(Ras::latest());
        $envelope = $schema->make(self::ENVELOPE, [
            'versao' => $schema->make(self::VERSAO, ['major' => 7, 'minor' => 3, 'revision' => 7]),
        ]);

        $this->assertSame('7.3.7', Ras::envelopeVersion($envelope));
    }

    public function testEnvelopeVersionIsNullWhenTheEnvelopeHasNoVersao()
    {
        $envelope = Ras::for(Ras::latest())->make(self::ENVELOPE);

        $this->assertNull(Ras::envelopeVersion($envelope));
    }

    public function testLatestIsAmongSchemas()
    {
        $this->assertContains(Ras::latest(), Ras::schemas());
    }
}
