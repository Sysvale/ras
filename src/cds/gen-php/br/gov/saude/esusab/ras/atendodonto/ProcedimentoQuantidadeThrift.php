<?php
namespace br\gov\saude\esusab\ras\atendodonto;

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

class ProcedimentoQuantidadeThrift
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'coMsProcedimento',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'quantidade',
            'isRequired' => false,
            'type' => TType::I32,
        ),
    );

    /**
     * @var string
     */
    public $coMsProcedimento = null;
    /**
     * @var int
     */
    public $quantidade = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['coMsProcedimento'])) {
                $this->coMsProcedimento = $vals['coMsProcedimento'];
            }
            if (isset($vals['quantidade'])) {
                $this->quantidade = $vals['quantidade'];
            }
        }
    }

    public function getName()
    {
        return 'ProcedimentoQuantidadeThrift';
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
                        $xfer += $input->readString($this->coMsProcedimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->quantidade);
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
        $xfer += $output->writeStructBegin('ProcedimentoQuantidadeThrift');
        if ($this->coMsProcedimento !== null) {
            $xfer += $output->writeFieldBegin('coMsProcedimento', TType::STRING, 1);
            $xfer += $output->writeString($this->coMsProcedimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->quantidade !== null) {
            $xfer += $output->writeFieldBegin('quantidade', TType::I32, 2);
            $xfer += $output->writeI32($this->quantidade);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
