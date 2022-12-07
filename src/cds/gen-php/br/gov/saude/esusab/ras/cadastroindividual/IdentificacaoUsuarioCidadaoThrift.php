<?php
namespace br\gov\saude\esusab\ras\cadastroindividual;

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

class IdentificacaoUsuarioCidadaoThrift
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'nomeSocial',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'codigoIbgeMunicipioNascimento',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'dataNascimentoCidadao',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        5 => array(
            'var' => 'desconheceNomeMae',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        6 => array(
            'var' => 'emailCidadao',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        7 => array(
            'var' => 'nacionalidadeCidadao',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        8 => array(
            'var' => 'nomeCidadao',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        9 => array(
            'var' => 'nomeMaeCidadao',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        10 => array(
            'var' => 'cnsCidadao',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        11 => array(
            'var' => 'cnsResponsavelFamiliar',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        12 => array(
            'var' => 'telefoneCelular',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        13 => array(
            'var' => 'numeroNisPisPasep',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        14 => array(
            'var' => 'paisNascimento',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        15 => array(
            'var' => 'racaCorCidadao',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        16 => array(
            'var' => 'sexoCidadao',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        17 => array(
            'var' => 'statusEhResponsavel',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        18 => array(
            'var' => 'etnia',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        19 => array(
            'var' => 'nomePaiCidadao',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        20 => array(
            'var' => 'desconheceNomePai',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        21 => array(
            'var' => 'dtNaturalizacao',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        22 => array(
            'var' => 'portariaNaturalizacao',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        23 => array(
            'var' => 'dtEntradaBrasil',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        24 => array(
            'var' => 'microArea',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        25 => array(
            'var' => 'stForaArea',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        26 => array(
            'var' => 'cpfCidadao',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        27 => array(
            'var' => 'cpfResponsavelFamiliar',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
    );

    /**
     * @var string
     */
    public $nomeSocial = null;
    /**
     * @var string
     */
    public $codigoIbgeMunicipioNascimento = null;
    /**
     * @var int
     */
    public $dataNascimentoCidadao = null;
    /**
     * @var bool
     */
    public $desconheceNomeMae = null;
    /**
     * @var string
     */
    public $emailCidadao = null;
    /**
     * @var int
     */
    public $nacionalidadeCidadao = null;
    /**
     * @var string
     */
    public $nomeCidadao = null;
    /**
     * @var string
     */
    public $nomeMaeCidadao = null;
    /**
     * @var string
     */
    public $cnsCidadao = null;
    /**
     * @var string
     */
    public $cnsResponsavelFamiliar = null;
    /**
     * @var string
     */
    public $telefoneCelular = null;
    /**
     * @var string
     */
    public $numeroNisPisPasep = null;
    /**
     * @var int
     */
    public $paisNascimento = null;
    /**
     * @var int
     */
    public $racaCorCidadao = null;
    /**
     * @var int
     */
    public $sexoCidadao = null;
    /**
     * @var bool
     */
    public $statusEhResponsavel = null;
    /**
     * @var int
     */
    public $etnia = null;
    /**
     * @var string
     */
    public $nomePaiCidadao = null;
    /**
     * @var bool
     */
    public $desconheceNomePai = null;
    /**
     * @var int
     */
    public $dtNaturalizacao = null;
    /**
     * @var string
     */
    public $portariaNaturalizacao = null;
    /**
     * @var int
     */
    public $dtEntradaBrasil = null;
    /**
     * @var string
     */
    public $microArea = null;
    /**
     * @var bool
     */
    public $stForaArea = null;
    /**
     * @var string
     */
    public $cpfCidadao = null;
    /**
     * @var string
     */
    public $cpfResponsavelFamiliar = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['nomeSocial'])) {
                $this->nomeSocial = $vals['nomeSocial'];
            }
            if (isset($vals['codigoIbgeMunicipioNascimento'])) {
                $this->codigoIbgeMunicipioNascimento = $vals['codigoIbgeMunicipioNascimento'];
            }
            if (isset($vals['dataNascimentoCidadao'])) {
                $this->dataNascimentoCidadao = $vals['dataNascimentoCidadao'];
            }
            if (isset($vals['desconheceNomeMae'])) {
                $this->desconheceNomeMae = $vals['desconheceNomeMae'];
            }
            if (isset($vals['emailCidadao'])) {
                $this->emailCidadao = $vals['emailCidadao'];
            }
            if (isset($vals['nacionalidadeCidadao'])) {
                $this->nacionalidadeCidadao = $vals['nacionalidadeCidadao'];
            }
            if (isset($vals['nomeCidadao'])) {
                $this->nomeCidadao = $vals['nomeCidadao'];
            }
            if (isset($vals['nomeMaeCidadao'])) {
                $this->nomeMaeCidadao = $vals['nomeMaeCidadao'];
            }
            if (isset($vals['cnsCidadao'])) {
                $this->cnsCidadao = $vals['cnsCidadao'];
            }
            if (isset($vals['cnsResponsavelFamiliar'])) {
                $this->cnsResponsavelFamiliar = $vals['cnsResponsavelFamiliar'];
            }
            if (isset($vals['telefoneCelular'])) {
                $this->telefoneCelular = $vals['telefoneCelular'];
            }
            if (isset($vals['numeroNisPisPasep'])) {
                $this->numeroNisPisPasep = $vals['numeroNisPisPasep'];
            }
            if (isset($vals['paisNascimento'])) {
                $this->paisNascimento = $vals['paisNascimento'];
            }
            if (isset($vals['racaCorCidadao'])) {
                $this->racaCorCidadao = $vals['racaCorCidadao'];
            }
            if (isset($vals['sexoCidadao'])) {
                $this->sexoCidadao = $vals['sexoCidadao'];
            }
            if (isset($vals['statusEhResponsavel'])) {
                $this->statusEhResponsavel = $vals['statusEhResponsavel'];
            }
            if (isset($vals['etnia'])) {
                $this->etnia = $vals['etnia'];
            }
            if (isset($vals['nomePaiCidadao'])) {
                $this->nomePaiCidadao = $vals['nomePaiCidadao'];
            }
            if (isset($vals['desconheceNomePai'])) {
                $this->desconheceNomePai = $vals['desconheceNomePai'];
            }
            if (isset($vals['dtNaturalizacao'])) {
                $this->dtNaturalizacao = $vals['dtNaturalizacao'];
            }
            if (isset($vals['portariaNaturalizacao'])) {
                $this->portariaNaturalizacao = $vals['portariaNaturalizacao'];
            }
            if (isset($vals['dtEntradaBrasil'])) {
                $this->dtEntradaBrasil = $vals['dtEntradaBrasil'];
            }
            if (isset($vals['microArea'])) {
                $this->microArea = $vals['microArea'];
            }
            if (isset($vals['stForaArea'])) {
                $this->stForaArea = $vals['stForaArea'];
            }
            if (isset($vals['cpfCidadao'])) {
                $this->cpfCidadao = $vals['cpfCidadao'];
            }
            if (isset($vals['cpfResponsavelFamiliar'])) {
                $this->cpfResponsavelFamiliar = $vals['cpfResponsavelFamiliar'];
            }
        }
    }

    public function getName()
    {
        return 'IdentificacaoUsuarioCidadaoThrift';
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
                        $xfer += $input->readString($this->nomeSocial);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->codigoIbgeMunicipioNascimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dataNascimentoCidadao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->desconheceNomeMae);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->emailCidadao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->nacionalidadeCidadao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 8:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->nomeCidadao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 9:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->nomeMaeCidadao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 10:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cnsCidadao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 11:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cnsResponsavelFamiliar);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 12:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->telefoneCelular);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 13:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->numeroNisPisPasep);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 14:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->paisNascimento);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 15:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->racaCorCidadao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 16:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->sexoCidadao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 17:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->statusEhResponsavel);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 18:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->etnia);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 19:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->nomePaiCidadao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 20:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->desconheceNomePai);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 21:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dtNaturalizacao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 22:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->portariaNaturalizacao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 23:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->dtEntradaBrasil);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 24:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->microArea);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 25:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->stForaArea);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 26:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cpfCidadao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 27:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cpfResponsavelFamiliar);
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
        $xfer += $output->writeStructBegin('IdentificacaoUsuarioCidadaoThrift');
        if ($this->nomeSocial !== null) {
            $xfer += $output->writeFieldBegin('nomeSocial', TType::STRING, 1);
            $xfer += $output->writeString($this->nomeSocial);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->codigoIbgeMunicipioNascimento !== null) {
            $xfer += $output->writeFieldBegin('codigoIbgeMunicipioNascimento', TType::STRING, 2);
            $xfer += $output->writeString($this->codigoIbgeMunicipioNascimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dataNascimentoCidadao !== null) {
            $xfer += $output->writeFieldBegin('dataNascimentoCidadao', TType::I64, 3);
            $xfer += $output->writeI64($this->dataNascimentoCidadao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->desconheceNomeMae !== null) {
            $xfer += $output->writeFieldBegin('desconheceNomeMae', TType::BOOL, 5);
            $xfer += $output->writeBool($this->desconheceNomeMae);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->emailCidadao !== null) {
            $xfer += $output->writeFieldBegin('emailCidadao', TType::STRING, 6);
            $xfer += $output->writeString($this->emailCidadao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->nacionalidadeCidadao !== null) {
            $xfer += $output->writeFieldBegin('nacionalidadeCidadao', TType::I64, 7);
            $xfer += $output->writeI64($this->nacionalidadeCidadao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->nomeCidadao !== null) {
            $xfer += $output->writeFieldBegin('nomeCidadao', TType::STRING, 8);
            $xfer += $output->writeString($this->nomeCidadao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->nomeMaeCidadao !== null) {
            $xfer += $output->writeFieldBegin('nomeMaeCidadao', TType::STRING, 9);
            $xfer += $output->writeString($this->nomeMaeCidadao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cnsCidadao !== null) {
            $xfer += $output->writeFieldBegin('cnsCidadao', TType::STRING, 10);
            $xfer += $output->writeString($this->cnsCidadao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cnsResponsavelFamiliar !== null) {
            $xfer += $output->writeFieldBegin('cnsResponsavelFamiliar', TType::STRING, 11);
            $xfer += $output->writeString($this->cnsResponsavelFamiliar);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->telefoneCelular !== null) {
            $xfer += $output->writeFieldBegin('telefoneCelular', TType::STRING, 12);
            $xfer += $output->writeString($this->telefoneCelular);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->numeroNisPisPasep !== null) {
            $xfer += $output->writeFieldBegin('numeroNisPisPasep', TType::STRING, 13);
            $xfer += $output->writeString($this->numeroNisPisPasep);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->paisNascimento !== null) {
            $xfer += $output->writeFieldBegin('paisNascimento', TType::I64, 14);
            $xfer += $output->writeI64($this->paisNascimento);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->racaCorCidadao !== null) {
            $xfer += $output->writeFieldBegin('racaCorCidadao', TType::I64, 15);
            $xfer += $output->writeI64($this->racaCorCidadao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->sexoCidadao !== null) {
            $xfer += $output->writeFieldBegin('sexoCidadao', TType::I64, 16);
            $xfer += $output->writeI64($this->sexoCidadao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->statusEhResponsavel !== null) {
            $xfer += $output->writeFieldBegin('statusEhResponsavel', TType::BOOL, 17);
            $xfer += $output->writeBool($this->statusEhResponsavel);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->etnia !== null) {
            $xfer += $output->writeFieldBegin('etnia', TType::I64, 18);
            $xfer += $output->writeI64($this->etnia);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->nomePaiCidadao !== null) {
            $xfer += $output->writeFieldBegin('nomePaiCidadao', TType::STRING, 19);
            $xfer += $output->writeString($this->nomePaiCidadao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->desconheceNomePai !== null) {
            $xfer += $output->writeFieldBegin('desconheceNomePai', TType::BOOL, 20);
            $xfer += $output->writeBool($this->desconheceNomePai);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dtNaturalizacao !== null) {
            $xfer += $output->writeFieldBegin('dtNaturalizacao', TType::I64, 21);
            $xfer += $output->writeI64($this->dtNaturalizacao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->portariaNaturalizacao !== null) {
            $xfer += $output->writeFieldBegin('portariaNaturalizacao', TType::STRING, 22);
            $xfer += $output->writeString($this->portariaNaturalizacao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->dtEntradaBrasil !== null) {
            $xfer += $output->writeFieldBegin('dtEntradaBrasil', TType::I64, 23);
            $xfer += $output->writeI64($this->dtEntradaBrasil);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->microArea !== null) {
            $xfer += $output->writeFieldBegin('microArea', TType::STRING, 24);
            $xfer += $output->writeString($this->microArea);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->stForaArea !== null) {
            $xfer += $output->writeFieldBegin('stForaArea', TType::BOOL, 25);
            $xfer += $output->writeBool($this->stForaArea);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cpfCidadao !== null) {
            $xfer += $output->writeFieldBegin('cpfCidadao', TType::STRING, 26);
            $xfer += $output->writeString($this->cpfCidadao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cpfResponsavelFamiliar !== null) {
            $xfer += $output->writeFieldBegin('cpfResponsavelFamiliar', TType::STRING, 27);
            $xfer += $output->writeString($this->cpfResponsavelFamiliar);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
