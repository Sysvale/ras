<?php
namespace br\gov\saude\esus\thrift\definition\cidadao;

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

final class TipoSanguineoThrift
{
    const A_POSITIVO = 0;

    const A_NEGATIVO = 1;

    const B_POSITIVO = 2;

    const B_NEGATIVO = 3;

    const AB_POSITIVO = 4;

    const AB_NEGATIVO = 5;

    const O_POSITIVO = 6;

    const O_NEGATIVO = 7;

    static public $__names = array(
        0 => 'A_POSITIVO',
        1 => 'A_NEGATIVO',
        2 => 'B_POSITIVO',
        3 => 'B_NEGATIVO',
        4 => 'AB_POSITIVO',
        5 => 'AB_NEGATIVO',
        6 => 'O_POSITIVO',
        7 => 'O_NEGATIVO',
    );
}

