<?php

namespace Sysvale\Ras\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Sysvale\Ras\Ras;
use Sysvale\Ras\TipoDadoSerializado;

class SerializeTest extends TestCase
{
    private const CONSUMO = 'br\gov\saude\esusab\ras\consumoalimentar\FichaConsumoAlimentarThrift';
    private const DOMICILIAR = 'br\gov\saude\esusab\ras\cadastrodomiciliar\CadastroDomiciliarThrift';
    private const CADASTRO = 'br\gov\saude\esusab\ras\cadastroindividual\CadastroIndividualThrift';

    protected function tearDown(): void
    {
        Ras::supportUpTo(null);

        parent::tearDown();
    }

    public function testSerializedRecordIsReadBackWithTypeVersionAndEnvelopeFields()
    {
        $schema = Ras::for('8.4.1');
        $ficha = $schema->make(self::CONSUMO, ['uuidFicha' => 'abc', 'stNaoPossuiCpf' => true]);

        $bytes = Ras::writeTransport($ficha, TipoDadoSerializado::MARCADORES_DE_CONSUMO_ALIMENTAR, '8.4.1', [
            'uuidDadoSerializado' => 'uuid-1',
            'cnesDadoSerializado' => '1234567',
            'numLote' => 5,
        ]);

        $record = Ras::readTransport($bytes);

        $this->assertSame(TipoDadoSerializado::MARCADORES_DE_CONSUMO_ALIMENTAR, $record->type());
        $this->assertSame('8.4.1', $record->version());
        $this->assertSame('abc', $record->conteudo()->uuidFicha);
        $this->assertTrue($record->conteudo()->stNaoPossuiCpf);
        $this->assertSame('uuid-1', $record->envelope()->uuidDadoSerializado);
        $this->assertSame('1234567', $record->envelope()->cnesDadoSerializado);
        $this->assertSame(5, (int) $record->envelope()->numLote);
    }

    public function testSupportedVersionAboveAllSchemasIsSerializedWithTheLatestSchemaKeepingTheDeclaredVersion()
    {
        Ras::supportUpTo('9.0.0');

        $ficha = Ras::for('9.0.0')->make(self::CONSUMO, ['uuidFicha' => 'abc', 'stCidadaoNaoPossuiCpf' => true]);

        $record = Ras::readTransport(
            Ras::writeTransport($ficha, TipoDadoSerializado::MARCADORES_DE_CONSUMO_ALIMENTAR, '9.0.0')
        );

        $this->assertSame('9.0.0', $record->version());
        $this->assertSame(Ras::latest(), $record->schema()->version());
        $this->assertTrue($record->conteudo()->stCidadaoNaoPossuiCpf);
    }

    public function testTypeVersionAndContentOfTheEnvelopeAreNotOverriddenByTheCaller()
    {
        $ficha = Ras::for('8.7.0')->make(self::CONSUMO, ['uuidFicha' => 'abc']);

        $bytes = Ras::writeTransport($ficha, TipoDadoSerializado::MARCADORES_DE_CONSUMO_ALIMENTAR, '8.7.0', [
            'tipoDadoSerializado' => TipoDadoSerializado::FICHA_DE_VACINACAO->value,
            'dadoSerializado' => 'outro-conteudo',
        ]);

        $record = Ras::readTransport($bytes);

        $this->assertSame(TipoDadoSerializado::MARCADORES_DE_CONSUMO_ALIMENTAR, $record->type());
        $this->assertSame('abc', $record->conteudo()->uuidFicha);
    }

    public function testFichaFromAnotherSchemaThanTheVersionIsRejected()
    {
        $ficha = Ras::for('8.7.0')->make(self::CONSUMO);

        $this->expectException(InvalidArgumentException::class);

        Ras::writeTransport($ficha, TipoDadoSerializado::MARCADORES_DE_CONSUMO_ALIMENTAR, '8.4.2');
    }

    public function testFichaOfAnotherTypeThanTheInformedIsRejected()
    {
        $ficha = Ras::for('8.7.0')->make(self::CONSUMO);

        try {
            Ras::writeTransport($ficha, TipoDadoSerializado::FICHA_DE_CADASTRO_INDIVIDUAL, '8.7.0');
            $this->fail('Esperava InvalidArgumentException');
        } catch (InvalidArgumentException $e) {
            $this->assertStringContainsString('FICHA_DE_CADASTRO_INDIVIDUAL', $e->getMessage());
        }
    }

    /**
     * @dataProvider stAtivoValues
     */
    public function testStAtivoOfTheCadastroDomiciliarIsSerializedAtPosition21AndReadBack(bool $stAtivo)
    {
        $ficha = Ras::for('8.7.0')->make(self::DOMICILIAR, ['uuid' => 'u-1', 'stAtivo' => $stAtivo]);

        $bytes = Ras::writeTransport(
            $ficha,
            TipoDadoSerializado::FICHA_DE_CADASTRO_DOMICILIAR_E_TERRITORIAL,
            '8.7.0'
        );

        $this->assertStringContainsString("\x02\x00\x15" . chr((int) $stAtivo), $bytes);
        $this->assertSame($stAtivo, Ras::readTransport($bytes)->conteudo()->stAtivo);
    }

    public static function stAtivoValues(): array
    {
        return [[true], [false]];
    }

    public function testStAtivoIsNotWrittenWhenTheCadastroDomiciliarDoesNotInformIt()
    {
        $ficha = Ras::for('8.7.0')->make(self::DOMICILIAR, ['uuid' => 'u-1']);

        $bytes = Ras::writeTransport(
            $ficha,
            TipoDadoSerializado::FICHA_DE_CADASTRO_DOMICILIAR_E_TERRITORIAL,
            '8.7.0'
        );

        $this->assertNull(Ras::readTransport($bytes)->conteudo()->stAtivo);
    }

    public function testStAtivoSentInAnOlderSchemaIsIgnoredWhenReadWithThePreviousSchema()
    {
        $current = Ras::for('8.7.0');
        $previous = Ras::for('8.4.2');
        $bytes = $current->serialize($current->make(self::DOMICILIAR, ['uuid' => 'u-1', 'stAtivo' => true]));

        $reread = $previous->deserialize($bytes, self::DOMICILIAR);

        $this->assertSame('u-1', $reread->uuid);
        $this->assertFalse(property_exists($reread, 'stAtivo'));
    }

    public function testTypeValuesAndClassesMatchTheLediDictionary()
    {
        $this->assertSame(TipoDadoSerializado::FICHA_DE_CADASTRO_INDIVIDUAL, TipoDadoSerializado::from(2));
        $this->assertSame(TipoDadoSerializado::FICHA_DE_ATENDIMENTO_DOMICILIAR, TipoDadoSerializado::from(10));
        $this->assertSame(12, TipoDadoSerializado::MARCADORES_DE_CONSUMO_ALIMENTAR->value);
        $this->assertSame(14, TipoDadoSerializado::FICHA_DE_VACINACAO->value);
        $this->assertNull(TipoDadoSerializado::tryFrom(16));
        $this->assertSame(self::CONSUMO, TipoDadoSerializado::MARCADORES_DE_CONSUMO_ALIMENTAR->classe());
        $this->assertSame(self::CADASTRO, TipoDadoSerializado::FICHA_DE_CADASTRO_INDIVIDUAL->classe());
    }
}
