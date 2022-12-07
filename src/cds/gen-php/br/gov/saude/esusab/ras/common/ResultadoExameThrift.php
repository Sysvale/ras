<?php
namespace br\gov\saude\esusab\ras\common;

/**
 * Autogenerated by Thrift Compiler (0.17.0)
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

class ResultadoExameThrift
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'tipoResultado',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'valorResultado',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
    );

    /**
     * @var int
     */
    public $tipoResultado = null;
    /**
     * @var string
     */
    public $valorResultado = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['tipoResultado'])) {
                $this->tipoResultado = $vals['tipoResultado'];
            }
            if (isset($vals['valorResultado'])) {
                $this->valorResultado = $vals['valorResultado'];
            }
        }
    }

    public function getName()
    {
        return 'ResultadoExameThrift';
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
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->tipoResultado);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->valorResultado);
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
        $xfer += $output->writeStructBegin('ResultadoExameThrift');
        if ($this->tipoResultado !== null) {
            $xfer += $output->writeFieldBegin('tipoResultado', TType::I32, 1);
            $xfer += $output->writeI32($this->tipoResultado);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->valorResultado !== null) {
            $xfer += $output->writeFieldBegin('valorResultado', TType::STRING, 2);
            $xfer += $output->writeString($this->valorResultado);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}