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

class FichaProcedimentoMasterThrift
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
        3 => array(
            'var' => 'headerTransport',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\br\gov\saude\esusab\ras\common\UnicaLotacaoHeaderThrift',
        ),
        4 => array(
            'var' => 'atendProcedimentos',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\br\gov\saude\esusab\ras\atendprocedimentos\FichaProcedimentoChildThrift',
                ),
        ),
        5 => array(
            'var' => 'numTotalAfericaoPa',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        6 => array(
            'var' => 'numTotalGlicemiaCapilar',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        7 => array(
            'var' => 'numTotalAfericaoTemperatura',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        8 => array(
            'var' => 'numTotalMedicaoAltura',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        9 => array(
            'var' => 'numTotalCurativoSimples',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        10 => array(
            'var' => 'numTotalMedicaoPeso',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        11 => array(
            'var' => 'numTotalColetaMaterialParaExameLaboratorial',
            'isRequired' => false,
            'type' => TType::I64,
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
     * @var \br\gov\saude\esusab\ras\common\UnicaLotacaoHeaderThrift
     */
    public $headerTransport = null;
    /**
     * @var \br\gov\saude\esusab\ras\atendprocedimentos\FichaProcedimentoChildThrift[]
     */
    public $atendProcedimentos = null;
    /**
     * @var int
     */
    public $numTotalAfericaoPa = null;
    /**
     * @var int
     */
    public $numTotalGlicemiaCapilar = null;
    /**
     * @var int
     */
    public $numTotalAfericaoTemperatura = null;
    /**
     * @var int
     */
    public $numTotalMedicaoAltura = null;
    /**
     * @var int
     */
    public $numTotalCurativoSimples = null;
    /**
     * @var int
     */
    public $numTotalMedicaoPeso = null;
    /**
     * @var int
     */
    public $numTotalColetaMaterialParaExameLaboratorial = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['uuidFicha'])) {
                $this->uuidFicha = $vals['uuidFicha'];
            }
            if (isset($vals['tpCdsOrigem'])) {
                $this->tpCdsOrigem = $vals['tpCdsOrigem'];
            }
            if (isset($vals['headerTransport'])) {
                $this->headerTransport = $vals['headerTransport'];
            }
            if (isset($vals['atendProcedimentos'])) {
                $this->atendProcedimentos = $vals['atendProcedimentos'];
            }
            if (isset($vals['numTotalAfericaoPa'])) {
                $this->numTotalAfericaoPa = $vals['numTotalAfericaoPa'];
            }
            if (isset($vals['numTotalGlicemiaCapilar'])) {
                $this->numTotalGlicemiaCapilar = $vals['numTotalGlicemiaCapilar'];
            }
            if (isset($vals['numTotalAfericaoTemperatura'])) {
                $this->numTotalAfericaoTemperatura = $vals['numTotalAfericaoTemperatura'];
            }
            if (isset($vals['numTotalMedicaoAltura'])) {
                $this->numTotalMedicaoAltura = $vals['numTotalMedicaoAltura'];
            }
            if (isset($vals['numTotalCurativoSimples'])) {
                $this->numTotalCurativoSimples = $vals['numTotalCurativoSimples'];
            }
            if (isset($vals['numTotalMedicaoPeso'])) {
                $this->numTotalMedicaoPeso = $vals['numTotalMedicaoPeso'];
            }
            if (isset($vals['numTotalColetaMaterialParaExameLaboratorial'])) {
                $this->numTotalColetaMaterialParaExameLaboratorial = $vals['numTotalColetaMaterialParaExameLaboratorial'];
            }
        }
    }

    public function getName()
    {
        return 'FichaProcedimentoMasterThrift';
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
                case 3:
                    if ($ftype == TType::STRUCT) {
                        $this->headerTransport = new \br\gov\saude\esusab\ras\common\UnicaLotacaoHeaderThrift();
                        $xfer += $this->headerTransport->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::LST) {
                        $this->atendProcedimentos = array();
                        $_size7 = 0;
                        $_etype10 = 0;
                        $xfer += $input->readListBegin($_etype10, $_size7);
                        for ($_i11 = 0; $_i11 < $_size7; ++$_i11) {
                            $elem12 = null;
                            $elem12 = new \br\gov\saude\esusab\ras\atendprocedimentos\FichaProcedimentoChildThrift();
                            $xfer += $elem12->read($input);
                            $this->atendProcedimentos []= $elem12;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->numTotalAfericaoPa);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->numTotalGlicemiaCapilar);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->numTotalAfericaoTemperatura);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 8:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->numTotalMedicaoAltura);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 9:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->numTotalCurativoSimples);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 10:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->numTotalMedicaoPeso);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 11:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->numTotalColetaMaterialParaExameLaboratorial);
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
        $xfer += $output->writeStructBegin('FichaProcedimentoMasterThrift');
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
        if ($this->headerTransport !== null) {
            if (!is_object($this->headerTransport)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('headerTransport', TType::STRUCT, 3);
            $xfer += $this->headerTransport->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->atendProcedimentos !== null) {
            if (!is_array($this->atendProcedimentos)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('atendProcedimentos', TType::LST, 4);
            $output->writeListBegin(TType::STRUCT, count($this->atendProcedimentos));
            foreach ($this->atendProcedimentos as $iter13) {
                $xfer += $iter13->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->numTotalAfericaoPa !== null) {
            $xfer += $output->writeFieldBegin('numTotalAfericaoPa', TType::I64, 5);
            $xfer += $output->writeI64($this->numTotalAfericaoPa);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->numTotalGlicemiaCapilar !== null) {
            $xfer += $output->writeFieldBegin('numTotalGlicemiaCapilar', TType::I64, 6);
            $xfer += $output->writeI64($this->numTotalGlicemiaCapilar);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->numTotalAfericaoTemperatura !== null) {
            $xfer += $output->writeFieldBegin('numTotalAfericaoTemperatura', TType::I64, 7);
            $xfer += $output->writeI64($this->numTotalAfericaoTemperatura);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->numTotalMedicaoAltura !== null) {
            $xfer += $output->writeFieldBegin('numTotalMedicaoAltura', TType::I64, 8);
            $xfer += $output->writeI64($this->numTotalMedicaoAltura);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->numTotalCurativoSimples !== null) {
            $xfer += $output->writeFieldBegin('numTotalCurativoSimples', TType::I64, 9);
            $xfer += $output->writeI64($this->numTotalCurativoSimples);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->numTotalMedicaoPeso !== null) {
            $xfer += $output->writeFieldBegin('numTotalMedicaoPeso', TType::I64, 10);
            $xfer += $output->writeI64($this->numTotalMedicaoPeso);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->numTotalColetaMaterialParaExameLaboratorial !== null) {
            $xfer += $output->writeFieldBegin('numTotalColetaMaterialParaExameLaboratorial', TType::I64, 11);
            $xfer += $output->writeI64($this->numTotalColetaMaterialParaExameLaboratorial);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
