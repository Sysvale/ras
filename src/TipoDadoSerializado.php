<?php

namespace Sysvale\Ras;

/**
 * Tipos de registro (campo tipoDadoSerializado do envelope), conforme a tabela
 * TipoDadoSerializado do dicionário do LEDI.
 */
enum TipoDadoSerializado: int
{
    case FICHA_DE_CADASTRO_INDIVIDUAL = 2;
    case FICHA_DE_CADASTRO_DOMICILIAR_E_TERRITORIAL = 3;
    case FICHA_DE_ATENDIMENTO_INDIVIDUAL = 4;
    case FICHA_DE_ATENDIMENTO_ODONTOLOGICO = 5;
    case FICHA_DE_ATIVIDADE_COLETIVA = 6;
    case FICHA_DE_PROCEDIMENTOS = 7;
    case FICHA_DE_VISITA_DOMICILIAR_E_TERRITORIAL = 8;
    case FICHA_DE_ATENDIMENTO_DOMICILIAR = 10;
    case FICHA_DE_AVALIACAO_DE_ELEGIBILIDADE = 11;
    case MARCADORES_DE_CONSUMO_ALIMENTAR = 12;
    case FICHA_COMPLEMENTAR_SINDROME_NEUROLOGICA_POR_ZIKA_MICROCEFALIA = 13;
    case FICHA_DE_VACINACAO = 14;

    /**
     * Nome canônico (br\...) da classe de topo do tipo.
     *
     * @return string
     */
    public function classe(): string
    {
        return match ($this) {
            self::FICHA_DE_CADASTRO_INDIVIDUAL => 'br\gov\saude\esusab\ras\cadastroindividual\CadastroIndividualThrift',
            self::FICHA_DE_CADASTRO_DOMICILIAR_E_TERRITORIAL => 'br\gov\saude\esusab\ras\cadastrodomiciliar\CadastroDomiciliarThrift',
            self::FICHA_DE_ATENDIMENTO_INDIVIDUAL => 'br\gov\saude\esusab\ras\atendindividual\FichaAtendimentoIndividualMasterThrift',
            self::FICHA_DE_ATENDIMENTO_ODONTOLOGICO => 'br\gov\saude\esusab\ras\atendodonto\FichaAtendimentoOdontologicoMasterThrift',
            self::FICHA_DE_ATIVIDADE_COLETIVA => 'br\gov\saude\esusab\ras\atividadecoletiva\FichaAtividadeColetivaThrift',
            self::FICHA_DE_PROCEDIMENTOS => 'br\gov\saude\esusab\ras\atendprocedimentos\FichaProcedimentoMasterThrift',
            self::FICHA_DE_VISITA_DOMICILIAR_E_TERRITORIAL => 'br\gov\saude\esusab\ras\visitadomiciliar\FichaVisitaDomiciliarMasterThrift',
            self::FICHA_DE_ATENDIMENTO_DOMICILIAR => 'br\gov\saude\esusab\ras\atenddomiciliar\FichaAtendimentoDomiciliarMasterThrift',
            self::FICHA_DE_AVALIACAO_DE_ELEGIBILIDADE => 'br\gov\saude\esusab\ras\avaliacaoelegibilidade\FichaAvaliacaoElegibilidadeThrift',
            self::MARCADORES_DE_CONSUMO_ALIMENTAR => 'br\gov\saude\esusab\ras\consumoalimentar\FichaConsumoAlimentarThrift',
            self::FICHA_COMPLEMENTAR_SINDROME_NEUROLOGICA_POR_ZIKA_MICROCEFALIA => 'br\gov\saude\esusab\ras\complementarzika\FichaComplementarZikaMicrocefaliaThrift',
            self::FICHA_DE_VACINACAO => 'br\gov\saude\esusab\ras\vacinacao\FichaVacinacaoMasterThrift',
        };
    }
}
