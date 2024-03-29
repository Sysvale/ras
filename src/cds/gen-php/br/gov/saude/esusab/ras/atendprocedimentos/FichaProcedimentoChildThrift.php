<?php
namespace br\gov\saude\esusab\ras\atendprocedimentos;

/**
 * Autogenerated by Thrift Compiler (0.19.0)
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

class FichaProcedimentoChildThrift
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'numProntuario',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'cnsCidadao',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'dtNascimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        4 => array(
            'var' => 'sexo',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        5 => array(
            'var' => 'localAtendimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        6 => array(
            'var' => 'turno',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        7 => array(
            'var' => 'statusEscutaInicialOrientacao',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        8 => array(
            'var' => 'procedimentos',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRING,
            'elem' => array(
                'type' => TType::STRING,
                ),
        ),
        10 => array(
            'var' => 'dataHoraInicialAtendimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        11 => array(
            'var' => 'dataHoraFinalAtendimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        12 => array(
            'var' => 'cpfCidadao',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        13 => array(
            'var' => 'pesoAcompanhamentoNutricional',
            'isRequired' => false,
            'type' => TType::DOUBLE,
        ),
        14 => array(
            'var' => 'alturaAcompanhamentoNutricional',
            'isRequired' => false,
            'type' => TType::DOUBLE,
        ),
    );

    /**
     * @var string
     */
    public $numProntuario = null;
    /**
     * @var string
     */
    public $cnsCidadao = null;
    /**
     * @var int
     */
    public $dtNascimento = null;
    /**
     * @var int
     */
    public $sexo = null;
    /**
     * @var int
     */
    public $localAtendimento = null;
    /**
     * @var int
     */
    public $turno = null;
    /**
     * @var bool
     */
    public $statusEscutaInicialOrientacao = null;
    /**
     * @var string[]
     */
    public $procedimentos = null;
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
     * @var double
     */
    public $pesoAcompanhamentoNutricional = null;
    /**
     * @var double
     */
    public $alturaAcompanhamentoNutricional = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['numProntuario'])) {
                $this->numProntuario = $vals['numProntuario'];
            }
            if (isset($vals['cnsCidadao'])) {
                $this->cnsCidadao = $vals['cnsCidadao'];
            }
            if (isset($vals['dtNascimento'])) {
                $this->dtNascimento = $vals['dtNascimento'];
            }
            if (isset($vals['sexo'])) {
                $this->sexo = $vals['sexo'];
            }
            if (isset($vals['localAtendimento'])) {
                $this->localAtendimento = $vals['localAtendimento'];
            }
            if (isset($vals['turno'])) {
                $this->turno = $vals['turno'];
            }
            if (isset($vals['statusEscutaInicialOrientacao'])) {
                $this->statusEscutaInicialOrientacao = $vals['statusEscutaInicialOrientacao'];
            }
            if (isset($vals['procedimentos'])) {
                $this->procedimentos = $vals['procedimentos'];
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
            if (isset($vals['pesoAcompanhamentoNutricional'])) {
                $this->pesoAcompanhamentoNutricional = $vals['pesoAcompanhamentoNutricional'];
            }
            if (isset($vals['alturaAcompanhamentoNutricional'])) {
                $this->alturaAcompanhamentoNutricional = $vals['alturaAcompanhamentoNutricional'];
            }
        }
    }

    public function getName()
    {
        return 'FichaProcedimentoChildThrift';
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
                        $xfer += $input->readString($this->numProntuario);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cnsCidadao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dtNascimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->sexo);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->localAtendimento);
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
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->statusEscutaInicialOrientacao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 8:
                    if ($ftype == TType::LST) {
                        $this->procedimentos = array();
                        $_size0 = 0;
                        $_etype3 = 0;
                        $xfer += $input->readListBegin($_etype3, $_size0);
                        for ($_i4 = 0; $_i4 < $_size0; ++$_i4) {
                            $elem5 = null;
                            $xfer += $input->readString($elem5);
                            $this->procedimentos []= $elem5;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 10:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dataHoraInicialAtendimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 11:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dataHoraFinalAtendimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 12:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cpfCidadao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 13:
                    if ($ftype == TType::DOUBLE) {
                        $xfer += $input->readDouble($this->pesoAcompanhamentoNutricional);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 14:
                    if ($ftype == TType::DOUBLE) {
                        $xfer += $input->readDouble($this->alturaAcompanhamentoNutricional);
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
        $xfer += $output->writeStructBegin('FichaProcedimentoChildThrift');
        if ($this->numProntuario !== null) {
            $xfer += $output->writeFieldBegin('numProntuario', TType::STRING, 1);
            $xfer += $output->writeString($this->numProntuario);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cnsCidadao !== null) {
            $xfer += $output->writeFieldBegin('cnsCidadao', TType::STRING, 2);
            $xfer += $output->writeString($this->cnsCidadao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dtNascimento !== null) {
            $xfer += $output->writeFieldBegin('dtNascimento', TType::I64, 3);
            $xfer += $output->writeI64($this->dtNascimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->sexo !== null) {
            $xfer += $output->writeFieldBegin('sexo', TType::I64, 4);
            $xfer += $output->writeI64($this->sexo);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->localAtendimento !== null) {
            $xfer += $output->writeFieldBegin('localAtendimento', TType::I64, 5);
            $xfer += $output->writeI64($this->localAtendimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->turno !== null) {
            $xfer += $output->writeFieldBegin('turno', TType::I64, 6);
            $xfer += $output->writeI64($this->turno);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->statusEscutaInicialOrientacao !== null) {
            $xfer += $output->writeFieldBegin('statusEscutaInicialOrientacao', TType::BOOL, 7);
            $xfer += $output->writeBool($this->statusEscutaInicialOrientacao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->procedimentos !== null) {
            if (!is_array($this->procedimentos)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('procedimentos', TType::LST, 8);
            $output->writeListBegin(TType::STRING, count($this->procedimentos));
            foreach ($this->procedimentos as $iter6) {
                $xfer += $output->writeString($iter6);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dataHoraInicialAtendimento !== null) {
            $xfer += $output->writeFieldBegin('dataHoraInicialAtendimento', TType::I64, 10);
            $xfer += $output->writeI64($this->dataHoraInicialAtendimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dataHoraFinalAtendimento !== null) {
            $xfer += $output->writeFieldBegin('dataHoraFinalAtendimento', TType::I64, 11);
            $xfer += $output->writeI64($this->dataHoraFinalAtendimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cpfCidadao !== null) {
            $xfer += $output->writeFieldBegin('cpfCidadao', TType::STRING, 12);
            $xfer += $output->writeString($this->cpfCidadao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->pesoAcompanhamentoNutricional !== null) {
            $xfer += $output->writeFieldBegin('pesoAcompanhamentoNutricional', TType::DOUBLE, 13);
            $xfer += $output->writeDouble($this->pesoAcompanhamentoNutricional);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->alturaAcompanhamentoNutricional !== null) {
            $xfer += $output->writeFieldBegin('alturaAcompanhamentoNutricional', TType::DOUBLE, 14);
            $xfer += $output->writeDouble($this->alturaAcompanhamentoNutricional);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
