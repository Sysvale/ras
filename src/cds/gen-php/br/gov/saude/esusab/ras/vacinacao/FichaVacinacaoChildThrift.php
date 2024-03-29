<?php
namespace br\gov\saude\esusab\ras\vacinacao;

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

class FichaVacinacaoChildThrift
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'turno',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        2 => array(
            'var' => 'numProntuario',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'cnsCidadao',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        4 => array(
            'var' => 'dtNascimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        5 => array(
            'var' => 'sexo',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        6 => array(
            'var' => 'localAtendimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        7 => array(
            'var' => 'viajante',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        8 => array(
            'var' => 'comunicanteHanseniase',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        9 => array(
            'var' => 'gestante',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        10 => array(
            'var' => 'puerpera',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        11 => array(
            'var' => 'vacinas',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\br\gov\saude\esusab\ras\vacinacao\VacinaRowThrift',
                ),
        ),
        12 => array(
            'var' => 'dataHoraInicialAtendimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        13 => array(
            'var' => 'dataHoraFinalAtendimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        14 => array(
            'var' => 'cpfCidadao',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
    );

    /**
     * @var int
     */
    public $turno = null;
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
     * @var bool
     */
    public $viajante = null;
    /**
     * @var bool
     */
    public $comunicanteHanseniase = null;
    /**
     * @var bool
     */
    public $gestante = null;
    /**
     * @var bool
     */
    public $puerpera = null;
    /**
     * @var \br\gov\saude\esusab\ras\vacinacao\VacinaRowThrift[]
     */
    public $vacinas = null;
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

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['turno'])) {
                $this->turno = $vals['turno'];
            }
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
            if (isset($vals['viajante'])) {
                $this->viajante = $vals['viajante'];
            }
            if (isset($vals['comunicanteHanseniase'])) {
                $this->comunicanteHanseniase = $vals['comunicanteHanseniase'];
            }
            if (isset($vals['gestante'])) {
                $this->gestante = $vals['gestante'];
            }
            if (isset($vals['puerpera'])) {
                $this->puerpera = $vals['puerpera'];
            }
            if (isset($vals['vacinas'])) {
                $this->vacinas = $vals['vacinas'];
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
        }
    }

    public function getName()
    {
        return 'FichaVacinacaoChildThrift';
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
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->turno);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->numProntuario);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cnsCidadao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dtNascimento);
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
                        $xfer += $input->readI64($this->localAtendimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->viajante);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 8:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->comunicanteHanseniase);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 9:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->gestante);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 10:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->puerpera);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 11:
                    if ($ftype == TType::LST) {
                        $this->vacinas = array();
                        $_size0 = 0;
                        $_etype3 = 0;
                        $xfer += $input->readListBegin($_etype3, $_size0);
                        for ($_i4 = 0; $_i4 < $_size0; ++$_i4) {
                            $elem5 = null;
                            $elem5 = new \br\gov\saude\esusab\ras\vacinacao\VacinaRowThrift();
                            $xfer += $elem5->read($input);
                            $this->vacinas []= $elem5;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 12:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dataHoraInicialAtendimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 13:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dataHoraFinalAtendimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 14:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cpfCidadao);
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
        $xfer += $output->writeStructBegin('FichaVacinacaoChildThrift');
        if ($this->turno !== null) {
            $xfer += $output->writeFieldBegin('turno', TType::I64, 1);
            $xfer += $output->writeI64($this->turno);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->numProntuario !== null) {
            $xfer += $output->writeFieldBegin('numProntuario', TType::STRING, 2);
            $xfer += $output->writeString($this->numProntuario);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cnsCidadao !== null) {
            $xfer += $output->writeFieldBegin('cnsCidadao', TType::STRING, 3);
            $xfer += $output->writeString($this->cnsCidadao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dtNascimento !== null) {
            $xfer += $output->writeFieldBegin('dtNascimento', TType::I64, 4);
            $xfer += $output->writeI64($this->dtNascimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->sexo !== null) {
            $xfer += $output->writeFieldBegin('sexo', TType::I64, 5);
            $xfer += $output->writeI64($this->sexo);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->localAtendimento !== null) {
            $xfer += $output->writeFieldBegin('localAtendimento', TType::I64, 6);
            $xfer += $output->writeI64($this->localAtendimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->viajante !== null) {
            $xfer += $output->writeFieldBegin('viajante', TType::BOOL, 7);
            $xfer += $output->writeBool($this->viajante);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->comunicanteHanseniase !== null) {
            $xfer += $output->writeFieldBegin('comunicanteHanseniase', TType::BOOL, 8);
            $xfer += $output->writeBool($this->comunicanteHanseniase);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->gestante !== null) {
            $xfer += $output->writeFieldBegin('gestante', TType::BOOL, 9);
            $xfer += $output->writeBool($this->gestante);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->puerpera !== null) {
            $xfer += $output->writeFieldBegin('puerpera', TType::BOOL, 10);
            $xfer += $output->writeBool($this->puerpera);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->vacinas !== null) {
            if (!is_array($this->vacinas)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('vacinas', TType::LST, 11);
            $output->writeListBegin(TType::STRUCT, count($this->vacinas));
            foreach ($this->vacinas as $iter6) {
                $xfer += $iter6->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dataHoraInicialAtendimento !== null) {
            $xfer += $output->writeFieldBegin('dataHoraInicialAtendimento', TType::I64, 12);
            $xfer += $output->writeI64($this->dataHoraInicialAtendimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dataHoraFinalAtendimento !== null) {
            $xfer += $output->writeFieldBegin('dataHoraFinalAtendimento', TType::I64, 13);
            $xfer += $output->writeI64($this->dataHoraFinalAtendimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cpfCidadao !== null) {
            $xfer += $output->writeFieldBegin('cpfCidadao', TType::STRING, 14);
            $xfer += $output->writeString($this->cpfCidadao);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
