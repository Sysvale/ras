<?php
namespace br\gov\saude\esusab\ras\atenddomiciliar;

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

class FichaAtendimentoDomiciliarMasterThrift
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'uuidFicha',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'tpCdsOrigem',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        4 => array(
            'var' => 'atendimentosDomiciliares',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\br\gov\saude\esusab\ras\atenddomiciliar\FichaAtendimentoDomiciliarChildThrift',
                ),
        ),
        5 => array(
            'var' => 'headerTransport',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\br\gov\saude\esusab\ras\common\VariasLotacoesHeaderThrift',
        ),
    );

    /**
     * @var string
     */
    public $uuidFicha = null;
    /**
     * @var int
     */
    public $tpCdsOrigem = null;
    /**
     * @var \br\gov\saude\esusab\ras\atenddomiciliar\FichaAtendimentoDomiciliarChildThrift[]
     */
    public $atendimentosDomiciliares = null;
    /**
     * @var \br\gov\saude\esusab\ras\common\VariasLotacoesHeaderThrift
     */
    public $headerTransport = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['uuidFicha'])) {
                $this->uuidFicha = $vals['uuidFicha'];
            }
            if (isset($vals['tpCdsOrigem'])) {
                $this->tpCdsOrigem = $vals['tpCdsOrigem'];
            }
            if (isset($vals['atendimentosDomiciliares'])) {
                $this->atendimentosDomiciliares = $vals['atendimentosDomiciliares'];
            }
            if (isset($vals['headerTransport'])) {
                $this->headerTransport = $vals['headerTransport'];
            }
        }
    }

    public function getName()
    {
        return 'FichaAtendimentoDomiciliarMasterThrift';
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
                        $xfer += $input->readString($this->uuidFicha);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->tpCdsOrigem);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::LST) {
                        $this->atendimentosDomiciliares = array();
                        $_size14 = 0;
                        $_etype17 = 0;
                        $xfer += $input->readListBegin($_etype17, $_size14);
                        for ($_i18 = 0; $_i18 < $_size14; ++$_i18) {
                            $elem19 = null;
                            $elem19 = new \br\gov\saude\esusab\ras\atenddomiciliar\FichaAtendimentoDomiciliarChildThrift();
                            $xfer += $elem19->read($input);
                            $this->atendimentosDomiciliares []= $elem19;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRUCT) {
                        $this->headerTransport = new \br\gov\saude\esusab\ras\common\VariasLotacoesHeaderThrift();
                        $xfer += $this->headerTransport->read($input);
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
        $xfer += $output->writeStructBegin('FichaAtendimentoDomiciliarMasterThrift');
        if ($this->uuidFicha !== null) {
            $xfer += $output->writeFieldBegin('uuidFicha', TType::STRING, 1);
            $xfer += $output->writeString($this->uuidFicha);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->tpCdsOrigem !== null) {
            $xfer += $output->writeFieldBegin('tpCdsOrigem', TType::I32, 2);
            $xfer += $output->writeI32($this->tpCdsOrigem);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->atendimentosDomiciliares !== null) {
            if (!is_array($this->atendimentosDomiciliares)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('atendimentosDomiciliares', TType::LST, 4);
            $output->writeListBegin(TType::STRUCT, count($this->atendimentosDomiciliares));
            foreach ($this->atendimentosDomiciliares as $iter20) {
                $xfer += $iter20->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->headerTransport !== null) {
            if (!is_object($this->headerTransport)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('headerTransport', TType::STRUCT, 5);
            $xfer += $this->headerTransport->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
