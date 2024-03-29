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

class VacinaRowThrift
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'imunobiologico',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        2 => array(
            'var' => 'estrategiaVacinacao',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        3 => array(
            'var' => 'dose',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        4 => array(
            'var' => 'lote',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        5 => array(
            'var' => 'fabricante',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        6 => array(
            'var' => 'grupoAtendimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        7 => array(
            'var' => 'stRegistroAnterior',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        8 => array(
            'var' => 'dataRegistroAnterior',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        9 => array(
            'var' => 'stAplicadoExterior',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
    );

    /**
     * @var int
     */
    public $imunobiologico = null;
    /**
     * @var int
     */
    public $estrategiaVacinacao = null;
    /**
     * @var int
     */
    public $dose = null;
    /**
     * @var string
     */
    public $lote = null;
    /**
     * @var string
     */
    public $fabricante = null;
    /**
     * @var int
     */
    public $grupoAtendimento = null;
    /**
     * @var bool
     */
    public $stRegistroAnterior = null;
    /**
     * @var int
     */
    public $dataRegistroAnterior = null;
    /**
     * @var bool
     */
    public $stAplicadoExterior = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['imunobiologico'])) {
                $this->imunobiologico = $vals['imunobiologico'];
            }
            if (isset($vals['estrategiaVacinacao'])) {
                $this->estrategiaVacinacao = $vals['estrategiaVacinacao'];
            }
            if (isset($vals['dose'])) {
                $this->dose = $vals['dose'];
            }
            if (isset($vals['lote'])) {
                $this->lote = $vals['lote'];
            }
            if (isset($vals['fabricante'])) {
                $this->fabricante = $vals['fabricante'];
            }
            if (isset($vals['grupoAtendimento'])) {
                $this->grupoAtendimento = $vals['grupoAtendimento'];
            }
            if (isset($vals['stRegistroAnterior'])) {
                $this->stRegistroAnterior = $vals['stRegistroAnterior'];
            }
            if (isset($vals['dataRegistroAnterior'])) {
                $this->dataRegistroAnterior = $vals['dataRegistroAnterior'];
            }
            if (isset($vals['stAplicadoExterior'])) {
                $this->stAplicadoExterior = $vals['stAplicadoExterior'];
            }
        }
    }

    public function getName()
    {
        return 'VacinaRowThrift';
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
                        $xfer += $input->readI64($this->imunobiologico);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->estrategiaVacinacao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dose);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->lote);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->fabricante);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->grupoAtendimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->stRegistroAnterior);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 8:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dataRegistroAnterior);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 9:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->stAplicadoExterior);
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
        $xfer += $output->writeStructBegin('VacinaRowThrift');
        if ($this->imunobiologico !== null) {
            $xfer += $output->writeFieldBegin('imunobiologico', TType::I64, 1);
            $xfer += $output->writeI64($this->imunobiologico);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->estrategiaVacinacao !== null) {
            $xfer += $output->writeFieldBegin('estrategiaVacinacao', TType::I64, 2);
            $xfer += $output->writeI64($this->estrategiaVacinacao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dose !== null) {
            $xfer += $output->writeFieldBegin('dose', TType::I64, 3);
            $xfer += $output->writeI64($this->dose);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->lote !== null) {
            $xfer += $output->writeFieldBegin('lote', TType::STRING, 4);
            $xfer += $output->writeString($this->lote);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->fabricante !== null) {
            $xfer += $output->writeFieldBegin('fabricante', TType::STRING, 5);
            $xfer += $output->writeString($this->fabricante);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->grupoAtendimento !== null) {
            $xfer += $output->writeFieldBegin('grupoAtendimento', TType::I64, 6);
            $xfer += $output->writeI64($this->grupoAtendimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->stRegistroAnterior !== null) {
            $xfer += $output->writeFieldBegin('stRegistroAnterior', TType::BOOL, 7);
            $xfer += $output->writeBool($this->stRegistroAnterior);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dataRegistroAnterior !== null) {
            $xfer += $output->writeFieldBegin('dataRegistroAnterior', TType::I64, 8);
            $xfer += $output->writeI64($this->dataRegistroAnterior);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->stAplicadoExterior !== null) {
            $xfer += $output->writeFieldBegin('stAplicadoExterior', TType::BOOL, 9);
            $xfer += $output->writeBool($this->stAplicadoExterior);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
