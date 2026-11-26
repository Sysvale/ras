<?php

// GERADO por bin/build_versions.php a partir do versions.json. Não edite.

return array (
  'latest' => '8.7.0',
  'schemas' => 
  array (
    '6.3.3' => 'V6_3_3',
    '7.2.0' => 'V7_2_0',
    '7.2.2' => 'V7_2_2',
    '7.3.0' => 'V7_3_0',
    '8.4.2' => 'V8_4_2',
    '8.7.0' => 'V8_7_0',
  ),
  'compat' => 
  array (
    0 => 
    array (
      'from' => '6.3.3',
      'to' => '7.1.999',
      'schema' => '6.3.3',
      'note' => '6.3.3 a 6.3.9: sem mudança estrutural no thrift',
    ),
    1 => 
    array (
      'from' => '7.2.0',
      'to' => '7.2.1',
      'schema' => '7.2.0',
      'note' => 'OCI e exame no odonto',
    ),
    2 => 
    array (
      'from' => '7.2.2',
      'to' => '7.2.999',
      'schema' => '7.2.2',
      'note' => 'vacinação 7.2.2 e ivcf na visita',
    ),
    3 => 
    array (
      'from' => '7.3.0',
      'to' => '8.3.999',
      'schema' => '7.3.0',
      'note' => 'via e local de aplicação; 7.3.1 a 8.3.x sem mudança estrutural',
    ),
    4 => 
    array (
      'from' => '8.4.0',
      'to' => '8.4.999',
      'schema' => '8.4.2',
      'note' => 'CPF com o nome stNaoPossuiCpf (dicionário 8.4.2); snapshot e205f2c8 traz também campos de versões posteriores, inofensivos na leitura por ID',
    ),
    5 => 
    array (
      'from' => '8.5.0',
      'to' => '8.7.999',
      'schema' => '8.7.0',
      'note' => '8.5.0 e 8.6.0 não têm snapshot no upstream; só adicionam campos, lidos pelo schema 8.7.0',
    ),
  ),
);
