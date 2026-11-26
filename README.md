# API RAS

## O que é?

A estrutura RAS (Registro de Atendimento Simplificado) é baseada em um conjunto mínimo de informações em saúde coletadas pelos Sistemas PEC e CDS, e deverá ser adotada como processo padrão para transmissão dos dados ao Sistema de Informação em Saúde para a Atenção Básica (SISAB).

## Instalação

Coloque no `composer.json`:

``` json
"sysvale/ras": "^2.0"
```

depois rode o `composer update`. Requer PHP 8.1 ou superior.

## Versões do schema

O pacote traz uma pasta e um namespace por versão do schema Thrift, para ler fichas gravadas em versões diferentes no mesmo processo:

| Pasta | Namespace | Origem |
|---|---|---|
| `src/V6_3_3` | `Sysvale\Ras\V6_3_3\br\gov\...` | RAS 6.3.3 |
| `src/V7_2_0` | `Sysvale\Ras\V7_2_0\br\gov\...` | LEDI 7.2.0 (OCI, exame no odonto) |
| `src/V7_2_2` | `Sysvale\Ras\V7_2_2\br\gov\...` | LEDI 7.2.2 (vacinação, IVCF na visita) |
| `src/V7_3_0` | `Sysvale\Ras\V7_3_0\br\gov\...` | LEDI 7.3.0 (via e local de aplicação) |
| `src/V8_4_2` | `Sysvale\Ras\V8_4_2\br\gov\...` | LEDI 8.4.2 (CPF com o nome `stNaoPossuiCpf`, como no dicionário da 8.4.2) |
| `src/V8_7_0` | `Sysvale\Ras\V8_7_0\br\gov\...` | LEDI 8.7.0 (última; CPF com o nome `stCidadaoNaoPossuiCpf` nos modelos de atendimento, procedimentos, zika e consumo alimentar) |

O namespace antigo `br\gov\...` continua funcionando como alias da última versão.

Cada pasta foi gerada pelo compilador Thrift a partir de um commit do upstream (`esusab-integracao`), registrado em `versions.json`. O upstream não tem tags, então o commit é o que identifica a versão. Versões intermediárias usam o schema mais próximo por faixas de compatibilidade (`compat`), por exemplo 6.3.4 a 6.3.9 usam o 6.3.3, 8.4.0 a 8.4.x usam o 8.4.2 e 8.5.0 a 8.7.x usam o 8.7.0 (as versões 8.5.0 e 8.6.0 não têm snapshot no upstream e só adicionam campos).

O snapshot `8.4.2` vem do commit `e205f2c8`, o mais próximo do dicionário da 8.4.2: ele traz também campos de versões posteriores (visita, atividade coletiva e elegibilidade), que não atrapalham a leitura porque o Thrift lê por ID. Na 8.7.0 o campo `stNaoPossuiCpf` passou a se chamar `stCidadaoNaoPossuiCpf` (mesmos IDs) nos modelos de atendimento individual, odontológico, procedimentos, zika e consumo alimentar; no cadastro individual e na vacinação o nome continua `stNaoPossuiCpf`.

O Thrift identifica os campos pelo ID, não pelo nome. Por isso um registro gravado em uma versão antiga é lido corretamente por um schema mais novo (os campos que não existiam ficam nulos), e a única mudança que quebra o código PHP é a de nome de classe: `ExameThrift` passou de `atendindividual` para `common` na 7.2.0.

A tabela de referência fica em `versions.json` (`schemas`, `latest` e `compat`); `src/versions.php` é gerado a partir dele.

### Lendo um registro recebido (automático)

Passe só os bytes do registro. O pacote lê o envelope (`DadoTransporteThrift`), descobre o tipo (`tipoDadoSerializado`) e a versão (`versao`) e desserializa o conteúdo na classe certa:

``` php
use Sysvale\Ras\Ras;

$record = Ras::readTransport($bytes);

$record->type();       // TipoDadoSerializado::MARCADORES_DE_CONSUMO_ALIMENTAR (tipoDadoSerializado do envelope)
$record->version();    // '8.4.1' (versão declarada usada para ler)
$record->schema();     // Schema da versão resolvida
$record->conteudo();   // conteúdo, na classe do tipo e do schema da versão
$record->envelope();   // envelope (sempre a última versão), com dadoSerializado ainda em binário
```

- O envelope é lido sempre com a última versão: a estrutura dele não muda entre versões.
- Quando o registro tiver uma versão mais confiável que a do envelope, informe-a: `Ras::readTransport($bytes, $versao)`. Isso importa porque alguns sistemas gravam no envelope uma versão fixa por tipo.
- Para só descobrir a versão declarada por um envelope já lido, use `Ras::envelopeVersion($envelope)`: devolve `'x.y.z'`, ou `null` quando o envelope não informa `versao`.
- Envelope sem `versao` e sem versão informada lança `InvalidArgumentException`. Tipo de registro desconhecido lança `UnsupportedRecordType` com o número do tipo.
- Tipos suportados: 2 a 8 e 10 a 14, da tabela `TipoDadoSerializado` do dicionário do LEDI, disponíveis na enum `Sysvale\Ras\TipoDadoSerializado` (`TipoDadoSerializado::from(12)`, `->value`, `->classe()`). O tipo 16 (Cuidado Compartilhado) ainda não está mapeado.

### Serializando um registro

O tipo é informado pelo consumidor, com a enum `TipoDadoSerializado`. O pacote serializa o conteúdo, coloca o binário no envelope e serializa o envelope:

``` php
use Sysvale\Ras\Ras;
use Sysvale\Ras\TipoDadoSerializado;
use br\gov\saude\esusab\ras\consumoalimentar\FichaConsumoAlimentarThrift;

$ficha = Ras::for($versao)->make(FichaConsumoAlimentarThrift::class, [...]);

$bytes = Ras::writeTransport($ficha, TipoDadoSerializado::MARCADORES_DE_CONSUMO_ALIMENTAR, $versao, [
    'uuidDadoSerializado' => ..., 'cnesDadoSerializado' => ..., 'codIbge' => ...,
    'numLote' => ..., 'ineDadoSerializado' => ..., 'remetente' => ..., 'originadora' => ...,
]);
```

- O quarto argumento traz os campos do envelope que só o consumidor conhece. `tipoDadoSerializado`, `versao` (a versão informada) e `dadoSerializado` são sempre preenchidos pelo pacote.
- O conteúdo precisa ter sido criado pelo schema da versão e ser do tipo informado; senão lança `InvalidArgumentException`.

### Usando as classes pela versão da ficha

Quando já se tem o objeto ou o conteúdo, e só falta a classe, informe a versão que a ficha declara. O pacote devolve uma fábrica (`Schema`) da família de classes daquela versão, e o consumidor não precisa conhecer namespaces:

``` php
use Sysvale\Ras\Ras;
use br\gov\saude\esusab\ras\consumoalimentar\FichaConsumoAlimentarThrift;

$schema = Ras::for($ficha->versionRas);

$schema->version();    // '8.4.2' (schema resolvido, pode ser diferente da versão pedida)
$schema->namespace();  // 'Sysvale\Ras\V8_4_2'

$schema->classFor(FichaConsumoAlimentarThrift::class);   // nome completo da classe, para usar com new
$schema->make(FichaConsumoAlimentarThrift::class, ['uuidFicha' => '...']);  // instância da versão
$objeto = $schema->deserialize($bytes, FichaConsumoAlimentarThrift::class);
$bytes  = $schema->serialize($objeto);
```

- As classes são sempre referenciadas pelo nome `br\...` (basta a constante `::class`, que não carrega nada).
- Classe que não existe na versão (ex.: `SolicitacaoOciThrift` na 6.3.3) lança `InvalidArgumentException` com o nome da classe e a versão.
- `serialize()` só aceita objetos criados pela mesma fábrica, para não misturar versões.
- Versões que resolvem para o mesmo schema recebem a mesma instância da fábrica.

`Ras::classFor($versao, $classe)` continua disponível como camada baixa.

Regra de resolução da versão declarada, nesta ordem:

1. faixa explícita em `compat` (versão acima compatível com um schema abaixo);
2. versão exata em `schemas`;
3. menor schema imediatamente acima da versão;
4. acima de todos os schemas: `UnsupportedRasVersion`, a menos que o consumidor tenha declarado o suporte (abaixo). Versão vazia ou inválida: `InvalidArgumentException`.

Uma versão nova do RAS nem sempre muda a estrutura do Thrift. Quando isso acontece, o consumidor pode declarar explicitamente, sem esperar uma versão nova do pacote, que as versões até um teto usam o último schema:

``` php
Ras::supportUpTo('8.9.0');   // 8.8.0 a 8.9.0 passam a usar o último schema
Ras::supportUpTo(null);      // volta a lançar UnsupportedRasVersion
```

A declaração vale para todo o processo e deve ser feita na inicialização da aplicação. Acima do teto declarado, ou sem a declaração, a exceção continua. A versão declarada pela ficha é mantida no envelope; só as classes usadas são as do último schema.

## Atualizando da 1.x para a 2.0

A 2.0 é uma versão major porque muda a estrutura do pacote:

- **PHP 8.1 ou superior.** A 1.x aceitava PHP 7.4.
- **As pastas `src/cds`, `src/transport` e `src/cidadao` deixaram de existir.** As classes ficam em `src/V*/br/...`, uma pasta por versão do schema. O mapeamento PSR-4 de `br\` foi removido: o nome `br\gov\...` continua funcionando por um alias (`src/alias.php`, carregado pelo autoload do Composer) que aponta para a última versão do schema, hoje a 8.7.0.
- **A última versão mudou.** Quem usa `br\...` passa a receber as classes da 8.7.0. Para ver o que mudou de nome, ID ou tipo em relação à versão que o seu projeto usava, rode `php bin/compare-versions.php 8.4.2 8.7.0`.
- **`atendindividual\ExameThrift` foi removida.** Use `br\gov\saude\esusab\ras\common\ExameThrift`.
- **`bin/update_thrift_files.sh` foi substituído por `bin/generate.sh`,** que gera uma versão por vez sem sobrescrever as anteriores.

Projetos que declaram `^1.x` não recebem a 2.0 sozinhos. Quem só precisa ler fichas de versões diferentes passa a usar `Ras::for($versao)` ou `Ras::readTransport($bytes)`, descritos acima.

## Gerar classes php

Requer Docker (imagem `ghcr.io/sysvale/ras/thrift:0.19.0`, construída a partir de `.docker/Dockerfile`).

Cada versão é gerada isoladamente e as demais nunca são alteradas:

``` bash
# versão nova: informe a branch ou o sha do upstream (laboratoriobridge/esusab-integracao)
bin/generate.sh 9.0.0 ledi_versao_900

# reproduzir uma versão já registrada (usa o sha do versions.json)
bin/generate.sh 8.7.0

php bin/build_versions.php              # valida o versions.json e gera src/versions.php
php bin/compare-versions.php 8.7.0 9.0.0  # o que mudou nos structs
```

Para a versão nova virar a padrão do alias `br\`, altere `"latest"` no `versions.json` e rode `php bin/build_versions.php`. Se a versão nova não ler fichas antigas, mantenha a pasta anterior e, se for o caso, registre uma faixa em `compat`.

> As pastas `V6_3_3` e `V8_4_2` foram criadas a partir das tags `v1.5.0` e `v1.6.0` com o namespace reescrito, e ainda não têm `sha` no `versions.json`. Preencha o `sha` do upstream e confirme com `bin/generate.sh` que o resultado é idêntico.

## Testes

``` bash
composer install
vendor/bin/phpunit
```
