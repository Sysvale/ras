# API RAS

## O que é?

A estrutura RAS (Registro de Atendimento Simplificado) é baseada em um conjunto mínimo de informações em saúde coletadas pelos Sistemas PEC e CDS, e deverá ser adotada como processo padrão para transmissão dos dados ao Sistema de Informação em Saúde para a Atenção Básica (SISAB).


## Instalação

Coloque no `composer.json`:

``` json
"sysvale/ras": "1.2.x"
```

depois rode o `composer update`

## Gerar classes php

- Realize o build a imagem `docker build -t sysvale-thrift:0.17.0 -f .docker/.`
- Execute o script em `bin/update_thrift_files.sh`
