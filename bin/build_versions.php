<?php

/**
 * Valida o versions.json e gera src/versions.php (lido pelo resolvedor).
 *
 *   php bin/build_versions.php                      valida e gera
 *   php bin/build_versions.php get <versao> <campo> imprime um campo do schema (branch, sha, thrift)
 *   php bin/build_versions.php register <versao> <branch> <sha> [<thrift>]
 */

$root = dirname(__DIR__);
$jsonPath = "$root/versions.json";
$pattern = '/^\d+\.\d+\.\d+$/';

$config = json_decode(file_get_contents($jsonPath), true);

if (!is_array($config)) {
    fail('versions.json inválido.');
}

function fail(string $message): void
{
    fwrite(STDERR, "Erro: $message\n");
    exit(1);
}

function folderOf(string $version): string
{
    return 'V' . str_replace('.', '_', $version);
}

$command = $argv[1] ?? 'build';

if ($command === 'get') {
    [, , $version, $field] = $argv + [null, null, null, null];
    echo $config['schemas'][$version][$field] ?? '', "\n";
    exit(0);
}

if ($command === 'register') {
    [, , $version, $branch, $sha] = $argv + [null, null, null, null, null];
    $thrift = $argv[5] ?? '0.19.0';

    if (!preg_match($pattern, (string) $version) || !$sha) {
        fail('uso: register <versao> <branch> <sha> [<thrift>]');
    }

    $config['schemas'][$version] = [
        'origin' => 'esusab-integracao',
        'branch' => $branch,
        'sha' => $sha,
        'thrift' => $thrift,
    ];

    file_put_contents($jsonPath, json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n");
    echo "Registrado $version em versions.json\n";
    exit(0);
}

$versions = array_keys($config['schemas'] ?? []);

foreach ($versions as $version) {
    if (!preg_match($pattern, $version)) {
        fail("versão de schema inválida: '$version'.");
    }
}

usort($versions, 'version_compare');

if (!in_array($config['latest'] ?? null, $versions, true)) {
    fail("'latest' deve ser um dos schemas.");
}

$folders = array_map('folderOf', $versions);
$existing = array_map('basename', glob("$root/src/V*", GLOB_ONLYDIR));

foreach (array_diff($folders, $existing) as $missing) {
    fail("pasta src/$missing não existe.");
}

foreach (array_diff($existing, $folders) as $orphan) {
    fail("pasta src/$orphan não está no versions.json.");
}

$compat = $config['compat'] ?? [];

foreach ($compat as $range) {
    foreach (['from', 'to'] as $edge) {
        if (!preg_match($pattern, $range[$edge] ?? '')) {
            fail("faixa de compat com '$edge' inválido.");
        }
    }

    if (version_compare($range['from'], $range['to'], '>')) {
        fail("faixa de compat com from > to: {$range['from']} > {$range['to']}.");
    }

    if (!in_array($range['schema'] ?? null, $versions, true)) {
        fail("compat aponta para schema inexistente: '" . ($range['schema'] ?? '') . "'.");
    }
}

usort($compat, static function ($a, $b) {
    return version_compare($a['from'], $b['from']);
});

for ($i = 1; $i < count($compat); $i++) {
    if (version_compare($compat[$i]['from'], $compat[$i - 1]['to'], '<=')) {
        fail("faixas de compat se sobrepõem: {$compat[$i - 1]['from']}-{$compat[$i - 1]['to']} e {$compat[$i]['from']}-{$compat[$i]['to']}.");
    }
}

$schemas = [];

foreach ($versions as $version) {
    $schemas[$version] = folderOf($version);
}

$output = "<?php\n\n// GERADO por bin/build_versions.php a partir do versions.json. Não edite.\n\nreturn "
    . var_export(['latest' => $config['latest'], 'schemas' => $schemas, 'compat' => $compat], true)
    . ";\n";

file_put_contents("$root/src/versions.php", $output);
echo 'src/versions.php gerado com ' . count($versions) . " schema(s).\n";
