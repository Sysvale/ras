<?php
namespace br\gov\saude\esusab\ras\atendindividual;

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

class FichaAtendimentoIndividualMasterThrift
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'headerTransport',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\br\gov\saude\esusab\ras\common\VariasLotacoesHeaderThrift',
        ),
        2 => array(
            'var' => 'atendimentosIndividuais',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\br\gov\saude\esusab\ras\atendindividual\FichaAtendimentoIndividualChildThrift',
                ),
        ),
        3 => array(
            'var' => 'uuidFicha',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        4 => array(
            'var' => 'tpCdsOrigem',
            'isRequired' => false,
            'type' => TType::I32,
        ),
    );

    /**
     * @var \br\gov\saude\esusab\ras\common\VariasLotacoesHeaderThrift
     */
    public $headerTransport = null;
    /**
     * @var \br\gov\saude\esusab\ras\atendindividual\FichaAtendimentoIndividualChildThrift[]
     */
    public $atendimentosIndividuais = null;
    /**
     * @var string
     */
    public $uuidFicha = null;
    /**
     * @var int
     */
    public $tpCdsOrigem = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['headerTransport'])) {
                $this->headerTransport = $vals['headerTransport'];
            }
            if (isset($vals['atendimentosIndividuais'])) {
                $this->atendimentosIndividuais = $vals['atendimentosIndividuais'];
            }
            if (isset($vals['uuidFicha'])) {
                $this->uuidFicha = $vals['uuidFicha'];
            }
            if (isset($vals['tpCdsOrigem'])) {
                $this->tpCdsOrigem = $vals['tpCdsOrigem'];
            }
        }
    }

    public function getName()
    {
        return 'FichaAtendimentoIndividualMasterThrift';
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
                    if ($ftype == TType::STRUCT) {
                        $this->headerTransport = new \br\gov\saude\esusab\ras\common\VariasLotacoesHeaderThrift();
                        $xfer += $this->headerTransport->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->atendimentosIndividuais = array();
                        $_size56 = 0;
                        $_etype59 = 0;
                        $xfer += $input->readListBegin($_etype59, $_size56);
                        for ($_i60 = 0; $_i60 < $_size56; ++$_i60) {
                            $elem61 = null;
                            $elem61 = new \br\gov\saude\esusab\ras\atendindividual\FichaAtendimentoIndividualChildThrift();
                            $xfer += $elem61->read($input);
                            $this->atendimentosIndividuais []= $elem61;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->uuidFicha);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->tpCdsOrigem);
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
        $xfer += $output->writeStructBegin('FichaAtendimentoIndividualMasterThrift');
        if ($this->headerTransport !== null) {
            if (!is_object($this->headerTransport)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('headerTransport', TType::STRUCT, 1);
            $xfer += $this->headerTransport->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->atendimentosIndividuais !== null) {
            if (!is_array($this->atendimentosIndividuais)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('atendimentosIndividuais', TType::LST, 2);
            $output->writeListBegin(TType::STRUCT, count($this->atendimentosIndividuais));
            foreach ($this->atendimentosIndividuais as $iter62) {
                $xfer += $iter62->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->uuidFicha !== null) {
            $xfer += $output->writeFieldBegin('uuidFicha', TType::STRING, 3);
            $xfer += $output->writeString($this->uuidFicha);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->tpCdsOrigem !== null) {
            $xfer += $output->writeFieldBegin('tpCdsOrigem', TType::I32, 4);
            $xfer += $output->writeI32($this->tpCdsOrigem);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
