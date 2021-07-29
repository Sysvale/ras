<?php
namespace br\gov\saude\esusab\ras\atendindividual;

/**
 * Autogenerated by Thrift Compiler (0.14.1)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class FichaAtendimentoIndividualChildThrift
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'numeroProntuario',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'cns',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'dataNascimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        4 => array(
            'var' => 'localDeAtendimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        5 => array(
            'var' => 'sexo',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        6 => array(
            'var' => 'turno',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        7 => array(
            'var' => 'tipoAtendimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        8 => array(
            'var' => 'pesoAcompanhamentoNutricional',
            'isRequired' => false,
            'type' => TType::DOUBLE,
        ),
        9 => array(
            'var' => 'alturaAcompanhamentoNutricional',
            'isRequired' => false,
            'type' => TType::DOUBLE,
        ),
        10 => array(
            'var' => 'aleitamentoMaterno',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        11 => array(
            'var' => 'dumDaGestante',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        12 => array(
            'var' => 'idadeGestacional',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        13 => array(
            'var' => 'atencaoDomiciliarModalidade',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        14 => array(
            'var' => 'problemaCondicaoAvaliada',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\br\gov\saude\esusab\ras\atendindividual\ProblemaCondicaoAvaliacaoAIThrift',
        ),
        17 => array(
            'var' => 'exame',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\br\gov\saude\esusab\ras\atendindividual\ExameThrift',
                ),
        ),
        18 => array(
            'var' => 'vacinaEmDia',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        19 => array(
            'var' => 'pic',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        20 => array(
            'var' => 'ficouEmObservacao',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        21 => array(
            'var' => 'nasfs',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::I64,
            'elem' => array(
                'type' => TType::I64,
                ),
        ),
        22 => array(
            'var' => 'condutas',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::I64,
            'elem' => array(
                'type' => TType::I64,
                ),
        ),
        23 => array(
            'var' => 'stGravidezPlanejada',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        24 => array(
            'var' => 'nuGestasPrevias',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        25 => array(
            'var' => 'nuPartos',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        26 => array(
            'var' => 'racionalidadeSaude',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        27 => array(
            'var' => 'perimetroCefalico',
            'isRequired' => false,
            'type' => TType::DOUBLE,
        ),
        28 => array(
            'var' => 'dataHoraInicialAtendimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        29 => array(
            'var' => 'dataHoraFinalAtendimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        30 => array(
            'var' => 'cpfCidadao',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        31 => array(
            'var' => 'medicamentos',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\br\gov\saude\esusab\ras\common\MedicamentoThrift',
                ),
        ),
        32 => array(
            'var' => 'encaminhamentos',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\br\gov\saude\esusab\ras\common\EncaminhamentoExternoThrift',
                ),
        ),
        33 => array(
            'var' => 'resultadosExames',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\br\gov\saude\esusab\ras\common\ResultadosExameThrift',
                ),
        ),
    );

    /**
     * @var string
     */
    public $numeroProntuario = null;
    /**
     * @var string
     */
    public $cns = null;
    /**
     * @var int
     */
    public $dataNascimento = null;
    /**
     * @var int
     */
    public $localDeAtendimento = null;
    /**
     * @var int
     */
    public $sexo = null;
    /**
     * @var int
     */
    public $turno = null;
    /**
     * @var int
     */
    public $tipoAtendimento = null;
    /**
     * @var double
     */
    public $pesoAcompanhamentoNutricional = null;
    /**
     * @var double
     */
    public $alturaAcompanhamentoNutricional = null;
    /**
     * @var int
     */
    public $aleitamentoMaterno = null;
    /**
     * @var int
     */
    public $dumDaGestante = null;
    /**
     * @var int
     */
    public $idadeGestacional = null;
    /**
     * @var int
     */
    public $atencaoDomiciliarModalidade = null;
    /**
     * @var \br\gov\saude\esusab\ras\atendindividual\ProblemaCondicaoAvaliacaoAIThrift
     */
    public $problemaCondicaoAvaliada = null;
    /**
     * @var \br\gov\saude\esusab\ras\atendindividual\ExameThrift[]
     */
    public $exame = null;
    /**
     * @var bool
     */
    public $vacinaEmDia = null;
    /**
     * @var int
     */
    public $pic = null;
    /**
     * @var bool
     */
    public $ficouEmObservacao = null;
    /**
     * @var int[]
     */
    public $nasfs = null;
    /**
     * @var int[]
     */
    public $condutas = null;
    /**
     * @var bool
     */
    public $stGravidezPlanejada = null;
    /**
     * @var int
     */
    public $nuGestasPrevias = null;
    /**
     * @var int
     */
    public $nuPartos = null;
    /**
     * @var int
     */
    public $racionalidadeSaude = null;
    /**
     * @var double
     */
    public $perimetroCefalico = null;
    /**
     * @var int
     */
    public $dataHoraInicialAtendimento = null;
    /**
     * @var int
     */
    public $dataHoraFinalAtendimento = null;
    /**
     * @var string
     */
    public $cpfCidadao = null;
    /**
     * @var \br\gov\saude\esusab\ras\common\MedicamentoThrift[]
     */
    public $medicamentos = null;
    /**
     * @var \br\gov\saude\esusab\ras\common\EncaminhamentoExternoThrift[]
     */
    public $encaminhamentos = null;
    /**
     * @var \br\gov\saude\esusab\ras\common\ResultadosExameThrift[]
     */
    public $resultadosExames = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['numeroProntuario'])) {
                $this->numeroProntuario = $vals['numeroProntuario'];
            }
            if (isset($vals['cns'])) {
                $this->cns = $vals['cns'];
            }
            if (isset($vals['dataNascimento'])) {
                $this->dataNascimento = $vals['dataNascimento'];
            }
            if (isset($vals['localDeAtendimento'])) {
                $this->localDeAtendimento = $vals['localDeAtendimento'];
            }
            if (isset($vals['sexo'])) {
                $this->sexo = $vals['sexo'];
            }
            if (isset($vals['turno'])) {
                $this->turno = $vals['turno'];
            }
            if (isset($vals['tipoAtendimento'])) {
                $this->tipoAtendimento = $vals['tipoAtendimento'];
            }
            if (isset($vals['pesoAcompanhamentoNutricional'])) {
                $this->pesoAcompanhamentoNutricional = $vals['pesoAcompanhamentoNutricional'];
            }
            if (isset($vals['alturaAcompanhamentoNutricional'])) {
                $this->alturaAcompanhamentoNutricional = $vals['alturaAcompanhamentoNutricional'];
            }
            if (isset($vals['aleitamentoMaterno'])) {
                $this->aleitamentoMaterno = $vals['aleitamentoMaterno'];
            }
            if (isset($vals['dumDaGestante'])) {
                $this->dumDaGestante = $vals['dumDaGestante'];
            }
            if (isset($vals['idadeGestacional'])) {
                $this->idadeGestacional = $vals['idadeGestacional'];
            }
            if (isset($vals['atencaoDomiciliarModalidade'])) {
                $this->atencaoDomiciliarModalidade = $vals['atencaoDomiciliarModalidade'];
            }
            if (isset($vals['problemaCondicaoAvaliada'])) {
                $this->problemaCondicaoAvaliada = $vals['problemaCondicaoAvaliada'];
            }
            if (isset($vals['exame'])) {
                $this->exame = $vals['exame'];
            }
            if (isset($vals['vacinaEmDia'])) {
                $this->vacinaEmDia = $vals['vacinaEmDia'];
            }
            if (isset($vals['pic'])) {
                $this->pic = $vals['pic'];
            }
            if (isset($vals['ficouEmObservacao'])) {
                $this->ficouEmObservacao = $vals['ficouEmObservacao'];
            }
            if (isset($vals['nasfs'])) {
                $this->nasfs = $vals['nasfs'];
            }
            if (isset($vals['condutas'])) {
                $this->condutas = $vals['condutas'];
            }
            if (isset($vals['stGravidezPlanejada'])) {
                $this->stGravidezPlanejada = $vals['stGravidezPlanejada'];
            }
            if (isset($vals['nuGestasPrevias'])) {
                $this->nuGestasPrevias = $vals['nuGestasPrevias'];
            }
            if (isset($vals['nuPartos'])) {
                $this->nuPartos = $vals['nuPartos'];
            }
            if (isset($vals['racionalidadeSaude'])) {
                $this->racionalidadeSaude = $vals['racionalidadeSaude'];
            }
            if (isset($vals['perimetroCefalico'])) {
                $this->perimetroCefalico = $vals['perimetroCefalico'];
            }
            if (isset($vals['dataHoraInicialAtendimento'])) {
                $this->dataHoraInicialAtendimento = $vals['dataHoraInicialAtendimento'];
            }
            if (isset($vals['dataHoraFinalAtendimento'])) {
                $this->dataHoraFinalAtendimento = $vals['dataHoraFinalAtendimento'];
            }
            if (isset($vals['cpfCidadao'])) {
                $this->cpfCidadao = $vals['cpfCidadao'];
            }
            if (isset($vals['medicamentos'])) {
                $this->medicamentos = $vals['medicamentos'];
            }
            if (isset($vals['encaminhamentos'])) {
                $this->encaminhamentos = $vals['encaminhamentos'];
            }
            if (isset($vals['resultadosExames'])) {
                $this->resultadosExames = $vals['resultadosExames'];
            }
        }
    }

    public function getName()
    {
        return 'FichaAtendimentoIndividualChildThrift';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->numeroProntuario);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cns);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dataNascimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->localDeAtendimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->sexo);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->turno);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->tipoAtendimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 8:
                    if ($ftype == TType::DOUBLE) {
                        $xfer += $input->readDouble($this->pesoAcompanhamentoNutricional);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 9:
                    if ($ftype == TType::DOUBLE) {
                        $xfer += $input->readDouble($this->alturaAcompanhamentoNutricional);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 10:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->aleitamentoMaterno);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 11:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dumDaGestante);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 12:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->idadeGestacional);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 13:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->atencaoDomiciliarModalidade);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 14:
                    if ($ftype == TType::STRUCT) {
                        $this->problemaCondicaoAvaliada = new \br\gov\saude\esusab\ras\atendindividual\ProblemaCondicaoAvaliacaoAIThrift();
                        $xfer += $this->problemaCondicaoAvaliada->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 17:
                    if ($ftype == TType::LST) {
                        $this->exame = array();
                        $_size14 = 0;
                        $_etype17 = 0;
                        $xfer += $input->readListBegin($_etype17, $_size14);
                        for ($_i18 = 0; $_i18 < $_size14; ++$_i18) {
                            $elem19 = null;
                            $elem19 = new \br\gov\saude\esusab\ras\atendindividual\ExameThrift();
                            $xfer += $elem19->read($input);
                            $this->exame []= $elem19;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 18:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->vacinaEmDia);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 19:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->pic);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 20:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->ficouEmObservacao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 21:
                    if ($ftype == TType::LST) {
                        $this->nasfs = array();
                        $_size20 = 0;
                        $_etype23 = 0;
                        $xfer += $input->readListBegin($_etype23, $_size20);
                        for ($_i24 = 0; $_i24 < $_size20; ++$_i24) {
                            $elem25 = null;
                            $xfer += $input->readI64($elem25);
                            $this->nasfs []= $elem25;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 22:
                    if ($ftype == TType::LST) {
                        $this->condutas = array();
                        $_size26 = 0;
                        $_etype29 = 0;
                        $xfer += $input->readListBegin($_etype29, $_size26);
                        for ($_i30 = 0; $_i30 < $_size26; ++$_i30) {
                            $elem31 = null;
                            $xfer += $input->readI64($elem31);
                            $this->condutas []= $elem31;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 23:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->stGravidezPlanejada);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 24:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->nuGestasPrevias);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 25:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->nuPartos);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 26:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->racionalidadeSaude);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 27:
                    if ($ftype == TType::DOUBLE) {
                        $xfer += $input->readDouble($this->perimetroCefalico);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 28:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dataHoraInicialAtendimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 29:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dataHoraFinalAtendimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 30:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cpfCidadao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 31:
                    if ($ftype == TType::LST) {
                        $this->medicamentos = array();
                        $_size32 = 0;
                        $_etype35 = 0;
                        $xfer += $input->readListBegin($_etype35, $_size32);
                        for ($_i36 = 0; $_i36 < $_size32; ++$_i36) {
                            $elem37 = null;
                            $elem37 = new \br\gov\saude\esusab\ras\common\MedicamentoThrift();
                            $xfer += $elem37->read($input);
                            $this->medicamentos []= $elem37;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 32:
                    if ($ftype == TType::LST) {
                        $this->encaminhamentos = array();
                        $_size38 = 0;
                        $_etype41 = 0;
                        $xfer += $input->readListBegin($_etype41, $_size38);
                        for ($_i42 = 0; $_i42 < $_size38; ++$_i42) {
                            $elem43 = null;
                            $elem43 = new \br\gov\saude\esusab\ras\common\EncaminhamentoExternoThrift();
                            $xfer += $elem43->read($input);
                            $this->encaminhamentos []= $elem43;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 33:
                    if ($ftype == TType::LST) {
                        $this->resultadosExames = array();
                        $_size44 = 0;
                        $_etype47 = 0;
                        $xfer += $input->readListBegin($_etype47, $_size44);
                        for ($_i48 = 0; $_i48 < $_size44; ++$_i48) {
                            $elem49 = null;
                            $elem49 = new \br\gov\saude\esusab\ras\common\ResultadosExameThrift();
                            $xfer += $elem49->read($input);
                            $this->resultadosExames []= $elem49;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('FichaAtendimentoIndividualChildThrift');
        if ($this->numeroProntuario !== null) {
            $xfer += $output->writeFieldBegin('numeroProntuario', TType::STRING, 1);
            $xfer += $output->writeString($this->numeroProntuario);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cns !== null) {
            $xfer += $output->writeFieldBegin('cns', TType::STRING, 2);
            $xfer += $output->writeString($this->cns);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dataNascimento !== null) {
            $xfer += $output->writeFieldBegin('dataNascimento', TType::I64, 3);
            $xfer += $output->writeI64($this->dataNascimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->localDeAtendimento !== null) {
            $xfer += $output->writeFieldBegin('localDeAtendimento', TType::I64, 4);
            $xfer += $output->writeI64($this->localDeAtendimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->sexo !== null) {
            $xfer += $output->writeFieldBegin('sexo', TType::I64, 5);
            $xfer += $output->writeI64($this->sexo);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->turno !== null) {
            $xfer += $output->writeFieldBegin('turno', TType::I64, 6);
            $xfer += $output->writeI64($this->turno);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->tipoAtendimento !== null) {
            $xfer += $output->writeFieldBegin('tipoAtendimento', TType::I64, 7);
            $xfer += $output->writeI64($this->tipoAtendimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->pesoAcompanhamentoNutricional !== null) {
            $xfer += $output->writeFieldBegin('pesoAcompanhamentoNutricional', TType::DOUBLE, 8);
            $xfer += $output->writeDouble($this->pesoAcompanhamentoNutricional);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->alturaAcompanhamentoNutricional !== null) {
            $xfer += $output->writeFieldBegin('alturaAcompanhamentoNutricional', TType::DOUBLE, 9);
            $xfer += $output->writeDouble($this->alturaAcompanhamentoNutricional);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->aleitamentoMaterno !== null) {
            $xfer += $output->writeFieldBegin('aleitamentoMaterno', TType::I64, 10);
            $xfer += $output->writeI64($this->aleitamentoMaterno);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dumDaGestante !== null) {
            $xfer += $output->writeFieldBegin('dumDaGestante', TType::I64, 11);
            $xfer += $output->writeI64($this->dumDaGestante);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->idadeGestacional !== null) {
            $xfer += $output->writeFieldBegin('idadeGestacional', TType::I32, 12);
            $xfer += $output->writeI32($this->idadeGestacional);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->atencaoDomiciliarModalidade !== null) {
            $xfer += $output->writeFieldBegin('atencaoDomiciliarModalidade', TType::I64, 13);
            $xfer += $output->writeI64($this->atencaoDomiciliarModalidade);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->problemaCondicaoAvaliada !== null) {
            if (!is_object($this->problemaCondicaoAvaliada)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('problemaCondicaoAvaliada', TType::STRUCT, 14);
            $xfer += $this->problemaCondicaoAvaliada->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->exame !== null) {
            if (!is_array($this->exame)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('exame', TType::LST, 17);
            $output->writeListBegin(TType::STRUCT, count($this->exame));
            foreach ($this->exame as $iter50) {
                $xfer += $iter50->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->vacinaEmDia !== null) {
            $xfer += $output->writeFieldBegin('vacinaEmDia', TType::BOOL, 18);
            $xfer += $output->writeBool($this->vacinaEmDia);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->pic !== null) {
            $xfer += $output->writeFieldBegin('pic', TType::I64, 19);
            $xfer += $output->writeI64($this->pic);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->ficouEmObservacao !== null) {
            $xfer += $output->writeFieldBegin('ficouEmObservacao', TType::BOOL, 20);
            $xfer += $output->writeBool($this->ficouEmObservacao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->nasfs !== null) {
            if (!is_array($this->nasfs)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('nasfs', TType::LST, 21);
            $output->writeListBegin(TType::I64, count($this->nasfs));
            foreach ($this->nasfs as $iter51) {
                $xfer += $output->writeI64($iter51);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->condutas !== null) {
            if (!is_array($this->condutas)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('condutas', TType::LST, 22);
            $output->writeListBegin(TType::I64, count($this->condutas));
            foreach ($this->condutas as $iter52) {
                $xfer += $output->writeI64($iter52);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->stGravidezPlanejada !== null) {
            $xfer += $output->writeFieldBegin('stGravidezPlanejada', TType::BOOL, 23);
            $xfer += $output->writeBool($this->stGravidezPlanejada);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->nuGestasPrevias !== null) {
            $xfer += $output->writeFieldBegin('nuGestasPrevias', TType::I32, 24);
            $xfer += $output->writeI32($this->nuGestasPrevias);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->nuPartos !== null) {
            $xfer += $output->writeFieldBegin('nuPartos', TType::I32, 25);
            $xfer += $output->writeI32($this->nuPartos);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->racionalidadeSaude !== null) {
            $xfer += $output->writeFieldBegin('racionalidadeSaude', TType::I64, 26);
            $xfer += $output->writeI64($this->racionalidadeSaude);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->perimetroCefalico !== null) {
            $xfer += $output->writeFieldBegin('perimetroCefalico', TType::DOUBLE, 27);
            $xfer += $output->writeDouble($this->perimetroCefalico);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dataHoraInicialAtendimento !== null) {
            $xfer += $output->writeFieldBegin('dataHoraInicialAtendimento', TType::I64, 28);
            $xfer += $output->writeI64($this->dataHoraInicialAtendimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dataHoraFinalAtendimento !== null) {
            $xfer += $output->writeFieldBegin('dataHoraFinalAtendimento', TType::I64, 29);
            $xfer += $output->writeI64($this->dataHoraFinalAtendimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cpfCidadao !== null) {
            $xfer += $output->writeFieldBegin('cpfCidadao', TType::STRING, 30);
            $xfer += $output->writeString($this->cpfCidadao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->medicamentos !== null) {
            if (!is_array($this->medicamentos)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('medicamentos', TType::LST, 31);
            $output->writeListBegin(TType::STRUCT, count($this->medicamentos));
            foreach ($this->medicamentos as $iter53) {
                $xfer += $iter53->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->encaminhamentos !== null) {
            if (!is_array($this->encaminhamentos)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('encaminhamentos', TType::LST, 32);
            $output->writeListBegin(TType::STRUCT, count($this->encaminhamentos));
            foreach ($this->encaminhamentos as $iter54) {
                $xfer += $iter54->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->resultadosExames !== null) {
            if (!is_array($this->resultadosExames)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('resultadosExames', TType::LST, 33);
            $output->writeListBegin(TType::STRUCT, count($this->resultadosExames));
            foreach ($this->resultadosExames as $iter55) {
                $xfer += $iter55->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
