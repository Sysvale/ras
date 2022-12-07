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

class InstituicaoPermanenciaThrift
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'nomeInstituicaoPermanencia',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'stOutrosProfissionaisVinculados',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        3 => array(
            'var' => 'nomeResponsavelTecnico',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        4 => array(
            'var' => 'cnsResponsavelTecnico',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        5 => array(
            'var' => 'cargoInstituicao',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        6 => array(
            'var' => 'telefoneResponsavelTecnico',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
    );

    /**
     * @var string
     */
    public $nomeInstituicaoPermanencia = null;
    /**
     * @var bool
     */
    public $stOutrosProfissionaisVinculados = null;
    /**
     * @var string
     */
    public $nomeResponsavelTecnico = null;
    /**
     * @var string
     */
    public $cnsResponsavelTecnico = null;
    /**
     * @var string
     */
    public $cargoInstituicao = null;
    /**
     * @var string
     */
    public $telefoneResponsavelTecnico = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['nomeInstituicaoPermanencia'])) {
                $this->nomeInstituicaoPermanencia = $vals['nomeInstituicaoPermanencia'];
            }
            if (isset($vals['stOutrosProfissionaisVinculados'])) {
                $this->stOutrosProfissionaisVinculados = $vals['stOutrosProfissionaisVinculados'];
            }
            if (isset($vals['nomeResponsavelTecnico'])) {
                $this->nomeResponsavelTecnico = $vals['nomeResponsavelTecnico'];
            }
            if (isset($vals['cnsResponsavelTecnico'])) {
                $this->cnsResponsavelTecnico = $vals['cnsResponsavelTecnico'];
            }
            if (isset($vals['cargoInstituicao'])) {
                $this->cargoInstituicao = $vals['cargoInstituicao'];
            }
            if (isset($vals['telefoneResponsavelTecnico'])) {
                $this->telefoneResponsavelTecnico = $vals['telefoneResponsavelTecnico'];
            }
        }
    }

    public function getName()
    {
        return 'InstituicaoPermanenciaThrift';
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
                        $xfer += $input->readString($this->nomeInstituicaoPermanencia);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->stOutrosProfissionaisVinculados);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->nomeResponsavelTecnico);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cnsResponsavelTecnico);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cargoInstituicao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->telefoneResponsavelTecnico);
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
        $xfer += $output->writeStructBegin('InstituicaoPermanenciaThrift');
        if ($this->nomeInstituicaoPermanencia !== null) {
            $xfer += $output->writeFieldBegin('nomeInstituicaoPermanencia', TType::STRING, 1);
            $xfer += $output->writeString($this->nomeInstituicaoPermanencia);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->stOutrosProfissionaisVinculados !== null) {
            $xfer += $output->writeFieldBegin('stOutrosProfissionaisVinculados', TType::BOOL, 2);
            $xfer += $output->writeBool($this->stOutrosProfissionaisVinculados);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->nomeResponsavelTecnico !== null) {
            $xfer += $output->writeFieldBegin('nomeResponsavelTecnico', TType::STRING, 3);
            $xfer += $output->writeString($this->nomeResponsavelTecnico);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cnsResponsavelTecnico !== null) {
            $xfer += $output->writeFieldBegin('cnsResponsavelTecnico', TType::STRING, 4);
            $xfer += $output->writeString($this->cnsResponsavelTecnico);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cargoInstituicao !== null) {
            $xfer += $output->writeFieldBegin('cargoInstituicao', TType::STRING, 5);
            $xfer += $output->writeString($this->cargoInstituicao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->telefoneResponsavelTecnico !== null) {
            $xfer += $output->writeFieldBegin('telefoneResponsavelTecnico', TType::STRING, 6);
            $xfer += $output->writeString($this->telefoneResponsavelTecnico);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
