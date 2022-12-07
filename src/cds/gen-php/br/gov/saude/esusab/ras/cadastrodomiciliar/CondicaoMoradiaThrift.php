<?php
namespace br\gov\saude\esusab\ras\cadastrodomiciliar;

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

class CondicaoMoradiaThrift
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'abastecimentoAgua',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        2 => array(
            'var' => 'areaProducaoRural',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        3 => array(
            'var' => 'destinoLixo',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        4 => array(
            'var' => 'formaEscoamentoBanheiro',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        5 => array(
            'var' => 'localizacao',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        6 => array(
            'var' => 'materialPredominanteParedesExtDomicilio',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        7 => array(
            'var' => 'nuComodos',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        8 => array(
            'var' => 'nuMoradores',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        9 => array(
            'var' => 'situacaoMoradiaPosseTerra',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        10 => array(
            'var' => 'stDisponibilidadeEnergiaEletrica',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        11 => array(
            'var' => 'tipoAcessoDomicilio',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        12 => array(
            'var' => 'tipoDomicilio',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        13 => array(
            'var' => 'aguaConsumoDomicilio',
            'isRequired' => false,
            'type' => TType::I64,
        ),
    );

    /**
     * @var int
     */
    public $abastecimentoAgua = null;
    /**
     * @var int
     */
    public $areaProducaoRural = null;
    /**
     * @var int
     */
    public $destinoLixo = null;
    /**
     * @var int
     */
    public $formaEscoamentoBanheiro = null;
    /**
     * @var int
     */
    public $localizacao = null;
    /**
     * @var int
     */
    public $materialPredominanteParedesExtDomicilio = null;
    /**
     * @var string
     */
    public $nuComodos = null;
    /**
     * @var string
     */
    public $nuMoradores = null;
    /**
     * @var int
     */
    public $situacaoMoradiaPosseTerra = null;
    /**
     * @var bool
     */
    public $stDisponibilidadeEnergiaEletrica = null;
    /**
     * @var int
     */
    public $tipoAcessoDomicilio = null;
    /**
     * @var int
     */
    public $tipoDomicilio = null;
    /**
     * @var int
     */
    public $aguaConsumoDomicilio = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['abastecimentoAgua'])) {
                $this->abastecimentoAgua = $vals['abastecimentoAgua'];
            }
            if (isset($vals['areaProducaoRural'])) {
                $this->areaProducaoRural = $vals['areaProducaoRural'];
            }
            if (isset($vals['destinoLixo'])) {
                $this->destinoLixo = $vals['destinoLixo'];
            }
            if (isset($vals['formaEscoamentoBanheiro'])) {
                $this->formaEscoamentoBanheiro = $vals['formaEscoamentoBanheiro'];
            }
            if (isset($vals['localizacao'])) {
                $this->localizacao = $vals['localizacao'];
            }
            if (isset($vals['materialPredominanteParedesExtDomicilio'])) {
                $this->materialPredominanteParedesExtDomicilio = $vals['materialPredominanteParedesExtDomicilio'];
            }
            if (isset($vals['nuComodos'])) {
                $this->nuComodos = $vals['nuComodos'];
            }
            if (isset($vals['nuMoradores'])) {
                $this->nuMoradores = $vals['nuMoradores'];
            }
            if (isset($vals['situacaoMoradiaPosseTerra'])) {
                $this->situacaoMoradiaPosseTerra = $vals['situacaoMoradiaPosseTerra'];
            }
            if (isset($vals['stDisponibilidadeEnergiaEletrica'])) {
                $this->stDisponibilidadeEnergiaEletrica = $vals['stDisponibilidadeEnergiaEletrica'];
            }
            if (isset($vals['tipoAcessoDomicilio'])) {
                $this->tipoAcessoDomicilio = $vals['tipoAcessoDomicilio'];
            }
            if (isset($vals['tipoDomicilio'])) {
                $this->tipoDomicilio = $vals['tipoDomicilio'];
            }
            if (isset($vals['aguaConsumoDomicilio'])) {
                $this->aguaConsumoDomicilio = $vals['aguaConsumoDomicilio'];
            }
        }
    }

    public function getName()
    {
        return 'CondicaoMoradiaThrift';
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
                        $xfer += $input->readI64($this->abastecimentoAgua);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->areaProducaoRural);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->destinoLixo);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->formaEscoamentoBanheiro);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->localizacao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->materialPredominanteParedesExtDomicilio);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->nuComodos);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 8:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->nuMoradores);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 9:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->situacaoMoradiaPosseTerra);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 10:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->stDisponibilidadeEnergiaEletrica);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 11:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->tipoAcessoDomicilio);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 12:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->tipoDomicilio);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 13:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->aguaConsumoDomicilio);
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
        $xfer += $output->writeStructBegin('CondicaoMoradiaThrift');
        if ($this->abastecimentoAgua !== null) {
            $xfer += $output->writeFieldBegin('abastecimentoAgua', TType::I64, 1);
            $xfer += $output->writeI64($this->abastecimentoAgua);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->areaProducaoRural !== null) {
            $xfer += $output->writeFieldBegin('areaProducaoRural', TType::I64, 2);
            $xfer += $output->writeI64($this->areaProducaoRural);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->destinoLixo !== null) {
            $xfer += $output->writeFieldBegin('destinoLixo', TType::I64, 3);
            $xfer += $output->writeI64($this->destinoLixo);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->formaEscoamentoBanheiro !== null) {
            $xfer += $output->writeFieldBegin('formaEscoamentoBanheiro', TType::I64, 4);
            $xfer += $output->writeI64($this->formaEscoamentoBanheiro);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->localizacao !== null) {
            $xfer += $output->writeFieldBegin('localizacao', TType::I64, 5);
            $xfer += $output->writeI64($this->localizacao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->materialPredominanteParedesExtDomicilio !== null) {
            $xfer += $output->writeFieldBegin('materialPredominanteParedesExtDomicilio', TType::I64, 6);
            $xfer += $output->writeI64($this->materialPredominanteParedesExtDomicilio);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->nuComodos !== null) {
            $xfer += $output->writeFieldBegin('nuComodos', TType::STRING, 7);
            $xfer += $output->writeString($this->nuComodos);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->nuMoradores !== null) {
            $xfer += $output->writeFieldBegin('nuMoradores', TType::STRING, 8);
            $xfer += $output->writeString($this->nuMoradores);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->situacaoMoradiaPosseTerra !== null) {
            $xfer += $output->writeFieldBegin('situacaoMoradiaPosseTerra', TType::I64, 9);
            $xfer += $output->writeI64($this->situacaoMoradiaPosseTerra);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->stDisponibilidadeEnergiaEletrica !== null) {
            $xfer += $output->writeFieldBegin('stDisponibilidadeEnergiaEletrica', TType::BOOL, 10);
            $xfer += $output->writeBool($this->stDisponibilidadeEnergiaEletrica);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->tipoAcessoDomicilio !== null) {
            $xfer += $output->writeFieldBegin('tipoAcessoDomicilio', TType::I64, 11);
            $xfer += $output->writeI64($this->tipoAcessoDomicilio);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->tipoDomicilio !== null) {
            $xfer += $output->writeFieldBegin('tipoDomicilio', TType::I64, 12);
            $xfer += $output->writeI64($this->tipoDomicilio);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->aguaConsumoDomicilio !== null) {
            $xfer += $output->writeFieldBegin('aguaConsumoDomicilio', TType::I64, 13);
            $xfer += $output->writeI64($this->aguaConsumoDomicilio);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
