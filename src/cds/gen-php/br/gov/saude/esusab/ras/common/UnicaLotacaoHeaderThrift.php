<?php
namespace br\gov\saude\esusab\ras\common;

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

class UnicaLotacaoHeaderThrift
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'profissionalCNS',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'cboCodigo_2002',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'cnes',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        4 => array(
            'var' => 'ine',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        5 => array(
            'var' => 'dataAtendimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        6 => array(
            'var' => 'codigoIbgeMunicipio',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
    );

    /**
     * @var string
     */
    public $profissionalCNS = null;
    /**
     * @var string
     */
    public $cboCodigo_2002 = null;
    /**
     * @var string
     */
    public $cnes = null;
    /**
     * @var string
     */
    public $ine = null;
    /**
     * @var int
     */
    public $dataAtendimento = null;
    /**
     * @var string
     */
    public $codigoIbgeMunicipio = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['profissionalCNS'])) {
                $this->profissionalCNS = $vals['profissionalCNS'];
            }
            if (isset($vals['cboCodigo_2002'])) {
                $this->cboCodigo_2002 = $vals['cboCodigo_2002'];
            }
            if (isset($vals['cnes'])) {
                $this->cnes = $vals['cnes'];
            }
            if (isset($vals['ine'])) {
                $this->ine = $vals['ine'];
            }
            if (isset($vals['dataAtendimento'])) {
                $this->dataAtendimento = $vals['dataAtendimento'];
            }
            if (isset($vals['codigoIbgeMunicipio'])) {
                $this->codigoIbgeMunicipio = $vals['codigoIbgeMunicipio'];
            }
        }
    }

    public function getName()
    {
        return 'UnicaLotacaoHeaderThrift';
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
                        $xfer += $input->readString($this->profissionalCNS);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cboCodigo_2002);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cnes);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->ine);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dataAtendimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->codigoIbgeMunicipio);
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
        $xfer += $output->writeStructBegin('UnicaLotacaoHeaderThrift');
        if ($this->profissionalCNS !== null) {
            $xfer += $output->writeFieldBegin('profissionalCNS', TType::STRING, 1);
            $xfer += $output->writeString($this->profissionalCNS);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cboCodigo_2002 !== null) {
            $xfer += $output->writeFieldBegin('cboCodigo_2002', TType::STRING, 2);
            $xfer += $output->writeString($this->cboCodigo_2002);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cnes !== null) {
            $xfer += $output->writeFieldBegin('cnes', TType::STRING, 3);
            $xfer += $output->writeString($this->cnes);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->ine !== null) {
            $xfer += $output->writeFieldBegin('ine', TType::STRING, 4);
            $xfer += $output->writeString($this->ine);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dataAtendimento !== null) {
            $xfer += $output->writeFieldBegin('dataAtendimento', TType::I64, 5);
            $xfer += $output->writeI64($this->dataAtendimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->codigoIbgeMunicipio !== null) {
            $xfer += $output->writeFieldBegin('codigoIbgeMunicipio', TType::STRING, 6);
            $xfer += $output->writeString($this->codigoIbgeMunicipio);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
