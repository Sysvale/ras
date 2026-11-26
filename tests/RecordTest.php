<?php

namespace Sysvale\Ras\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Sysvale\Ras\Ras;
use Sysvale\Ras\Record;
use Sysvale\Ras\TipoDadoSerializado;
use Sysvale\Ras\UnsupportedRasVersion;
use Sysvale\Ras\UnsupportedRecordType;

class RecordTest extends TestCase
{
    private const ENVELOPE = 'br\gov\saude\esusab\dadotransp\DadoTransporteThrift';
    private const VERSAO = 'br\gov\saude\esusab\dadotransp\VersaoThrift';
    private const CONSUMO = 'br\gov\saude\esusab\ras\consumoalimentar\FichaConsumoAlimentarThrift';

    protected function tearDown(): void
    {
        Ras::supportUpTo(null);

        parent::tearDown();
    }

    public function testReadsTypeVersionAndContentFromTheEnvelopeAlone()
    {
        $bytes = $this->envelope(12, '8.4.2', $this->consumoBlob('8.4.2'));

        $record = Ras::readTransport($bytes);

        $this->assertInstanceOf(Record::class, $record);
        $this->assertSame(TipoDadoSerializado::MARCADORES_DE_CONSUMO_ALIMENTAR, $record->type());
        $this->assertSame('8.4.2', $record->version());
        $this->assertSame('8.4.2', $record->schema()->version());
        $this->assertInstanceOf('Sysvale\Ras\V8_4_2\\' . self::CONSUMO, $record->conteudo());
        $this->assertTrue($record->conteudo()->stNaoPossuiCpf);
        $this->assertSame(2, (int) $record->conteudo()->justificativaNaoPossuiCpf);
    }

    public function testContentIsReadWithTheSchemaOfTheDeclaredVersion()
    {
        $blob = $this->consumoBlob('8.4.2');

        $em842 = Ras::readTransport($this->envelope(12, '8.4.1', $blob));
        $em850 = Ras::readTransport($this->envelope(12, '8.5.0', $blob));

        $this->assertTrue($em842->conteudo()->stNaoPossuiCpf);
        $this->assertTrue($em850->conteudo()->stCidadaoNaoPossuiCpf);
        $this->assertFalse(property_exists($em850->conteudo(), 'stNaoPossuiCpf'));
    }

    public function testEnvelopeIsAlwaysTheLatestClassWithContentStillAsBytes()
    {
        $blob = $this->consumoBlob('8.4.2');

        $record = Ras::readTransport($this->envelope(12, '8.4.2', $blob));

        $this->assertInstanceOf(self::ENVELOPE, $record->envelope());
        $this->assertSame($blob, $record->envelope()->dadoSerializado);
    }

    public function testExplicitVersionWinsOverTheOneInTheEnvelope()
    {
        $bytes = $this->envelope(12, '4.3.7', $this->consumoBlob('8.4.2'));

        $declared = Ras::readTransport($bytes);
        $informed = Ras::readTransport($bytes, '8.4.2');

        $this->assertSame('4.3.7', $declared->version());
        $this->assertFalse(property_exists($declared->conteudo(), 'stNaoPossuiCpf'));
        $this->assertSame('8.4.2', $informed->version());
        $this->assertTrue($informed->conteudo()->stNaoPossuiCpf);
    }

    public function testEnvelopeWithoutVersionFailsUnlessOneIsInformed()
    {
        $bytes = $this->envelope(12, null, $this->consumoBlob('8.4.2'));

        $this->assertSame('8.4.2', Ras::readTransport($bytes, '8.4.2')->version());

        $this->expectException(InvalidArgumentException::class);

        Ras::readTransport($bytes);
    }

    public function testUnknownRecordTypeFailsWithTheTypeNumber()
    {
        $bytes = $this->envelope(99, '8.7.0', $this->consumoBlob('8.7.0'));

        try {
            Ras::readTransport($bytes);
            $this->fail('Esperava UnsupportedRecordType');
        } catch (UnsupportedRecordType $e) {
            $this->assertStringContainsString('99', $e->getMessage());
        }
    }

    public function testVersionAboveTheSupportedOnesFailsUnlessSupportIsDeclared()
    {
        $bytes = $this->envelope(12, '9.0.0', $this->consumoBlob('8.7.0'));

        try {
            Ras::readTransport($bytes);
            $this->fail('Esperava UnsupportedRasVersion');
        } catch (UnsupportedRasVersion $e) {
            $this->assertStringContainsString('9.0.0', $e->getMessage());
        }

        Ras::supportUpTo('9.0.0');
        $record = Ras::readTransport($bytes);

        $this->assertSame('9.0.0', $record->version());
        $this->assertSame(Ras::latest(), $record->schema()->version());
        $this->assertTrue($record->conteudo()->stCidadaoNaoPossuiCpf);
    }

    public function testEveryRecordTypeHasItsTopLevelClassInEverySchema()
    {
        foreach (Ras::schemas() as $version) {
            foreach (TipoDadoSerializado::cases() as $type) {
                $class = Ras::for($version)->classFor($type->classe());

                $this->assertTrue(class_exists($class), "{$type->name} sem classe no schema $version");
            }
        }
    }

    private function consumoBlob(string $version): string
    {
        $schema = Ras::for($version);

        $values = ['uuidFicha' => 'abc'];
        $values[$schema->version() === '8.4.2' ? 'stNaoPossuiCpf' : 'stCidadaoNaoPossuiCpf'] = true;
        $values[$schema->version() === '8.4.2' ? 'justificativaNaoPossuiCpf' : 'justificativaCidadaoNaoPossuiCpf'] = 2;

        return $schema->serialize($schema->make(self::CONSUMO, $values));
    }

    private function envelope(int $type, ?string $version, string $blob): string
    {
        $latest = Ras::for(Ras::latest());

        $values = ['uuidDadoSerializado' => 'x', 'tipoDadoSerializado' => $type, 'dadoSerializado' => $blob];

        if ($version !== null) {
            [$major, $minor, $revision] = array_map('intval', explode('.', $version));
            $values['versao'] = $latest->make(self::VERSAO, compact('major', 'minor', 'revision'));
        }

        return $latest->serialize($latest->make(self::ENVELOPE, $values));
    }
}
