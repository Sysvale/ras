<?php
namespace br\gov\saude\esusab\dadotransp;

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

/**
 * Dados para identificar a instalacao que cadastrou/gerou os dados e/ou enviou
 */
class DadoInstalacaoThrift
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'contraChave',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'uuidInstalacao',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'cpfOuCnpj',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        4 => array(
            'var' => 'nomeOuRazaoSocial',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        5 => array(
            'var' => 'fone',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        6 => array(
            'var' => 'email',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        7 => array(
            'var' => 'versaoSistema',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        8 => array(
            'var' => 'nomeBancoDados',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
    );

    /**
     * Identifica o software que gerou o dado (pec/cds, cdsOff ou software de terceiros).
     * 
     * @var string
     */
    public $contraChave = null;
    /**
     * É um identificador da instalação do software que gerou o dado. Seja ele o e-SUS ou software de terceiro.
     * 
     * @var string
     */
    public $uuidInstalacao = null;
    /**
     * Cpf do responsável ou CNPJ da empresa responsável
     * 
     * @var string
     */
    public $cpfOuCnpj = null;
    /**
     * Nome do responsável ou Razão Social da empresa responsável
     * 
     * @var string
     */
    public $nomeOuRazaoSocial = null;
    /**
     * Telefone da pessoa ou empresa responsável
     * 
     * @var string
     */
    public $fone = null;
    /**
     * Email da pessoa ou empresa responsável
     * 
     * @var string
     */
    public $email = null;
    /**
     * Versão do software
     * 
     * @var string
     */
    public $versaoSistema = null;
    /**
     * Nome do banco de dados que o software utiliza
     * 
     * @var string
     */
    public $nomeBancoDados = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['contraChave'])) {
                $this->contraChave = $vals['contraChave'];
            }
            if (isset($vals['uuidInstalacao'])) {
                $this->uuidInstalacao = $vals['uuidInstalacao'];
            }
            if (isset($vals['cpfOuCnpj'])) {
                $this->cpfOuCnpj = $vals['cpfOuCnpj'];
            }
            if (isset($vals['nomeOuRazaoSocial'])) {
                $this->nomeOuRazaoSocial = $vals['nomeOuRazaoSocial'];
            }
            if (isset($vals['fone'])) {
                $this->fone = $vals['fone'];
            }
            if (isset($vals['email'])) {
                $this->email = $vals['email'];
            }
            if (isset($vals['versaoSistema'])) {
                $this->versaoSistema = $vals['versaoSistema'];
            }
            if (isset($vals['nomeBancoDados'])) {
                $this->nomeBancoDados = $vals['nomeBancoDados'];
            }
        }
    }

    public function getName()
    {
        return 'DadoInstalacaoThrift';
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
                        $xfer += $input->readString($this->contraChave);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->uuidInstalacao);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->cpfOuCnpj);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->nomeOuRazaoSocial);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->fone);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->email);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->versaoSistema);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 8:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->nomeBancoDados);
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
        $xfer += $output->writeStructBegin('DadoInstalacaoThrift');
        if ($this->contraChave !== null) {
            $xfer += $output->writeFieldBegin('contraChave', TType::STRING, 1);
            $xfer += $output->writeString($this->contraChave);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->uuidInstalacao !== null) {
            $xfer += $output->writeFieldBegin('uuidInstalacao', TType::STRING, 2);
            $xfer += $output->writeString($this->uuidInstalacao);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cpfOuCnpj !== null) {
            $xfer += $output->writeFieldBegin('cpfOuCnpj', TType::STRING, 3);
            $xfer += $output->writeString($this->cpfOuCnpj);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->nomeOuRazaoSocial !== null) {
            $xfer += $output->writeFieldBegin('nomeOuRazaoSocial', TType::STRING, 4);
            $xfer += $output->writeString($this->nomeOuRazaoSocial);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->fone !== null) {
            $xfer += $output->writeFieldBegin('fone', TType::STRING, 5);
            $xfer += $output->writeString($this->fone);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->email !== null) {
            $xfer += $output->writeFieldBegin('email', TType::STRING, 6);
            $xfer += $output->writeString($this->email);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->versaoSistema !== null) {
            $xfer += $output->writeFieldBegin('versaoSistema', TType::STRING, 7);
            $xfer += $output->writeString($this->versaoSistema);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->nomeBancoDados !== null) {
            $xfer += $output->writeFieldBegin('nomeBancoDados', TType::STRING, 8);
            $xfer += $output->writeString($this->nomeBancoDados);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
