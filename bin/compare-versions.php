<?php

/**
 * Compara dois schemas do pacote (campo a campo, por ID) para indicar se a versão
 * nova mantém a leitura das fichas gravadas na antiga.
 *
 *   php bin/compare-versions.php 6.3.3 8.7.0
 */

require dirname(__DIR__) . '/vendor/autoload.php';

if ($argc < 3) {
    fwrite(STDERR, "uso: php bin/compare-versions.php <versaoA> <versaoB>\n");
    exit(1);
}

[$a, $b] = [$argv[1], $argv[2]];
$root = dirname(__DIR__);

function classesOf(string $root, string $version): array
{
    $folder = 'V' . str_replace('.', '_', $version);
    $base = "$root/src/$folder/br";

    if (!is_dir($base)) {
        fwrite(STDERR, "Pasta src/$folder não existe.\n");
        exit(1);
    }

    $classes = [];
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($base, FilesystemIterator::SKIP_DOTS));

    foreach ($files as $file) {
        if ($file->getExtension() !== 'php') {
            continue;
        }

        $relative = substr($file->getPathname(), strlen($base) - 2, -4);
        $classes[str_replace('/', '\\', $relative)] = "Sysvale\\Ras\\$folder\\" . str_replace('/', '\\', $relative);
    }

    ksort($classes);

    return $classes;
}

function describe(string $class, string $prefix): array
{
    if (property_exists($class, '_TSPEC')) {
        $fields = [];

        foreach ($class::$_TSPEC as $id => $spec) {
            $fields[$id] = [
                'name' => $spec['var'],
                'type' => $spec['type'],
                'required' => !empty($spec['isRequired']),
                'class' => isset($spec['class']) ? str_replace($prefix, '', $spec['class']) : null,
            ];
        }

        return $fields;
    }

    return (new ReflectionClass($class))->getConstants();
}

$classesA = classesOf($root, $a);
$classesB = classesOf($root, $b);
$prefixA = '\\Sysvale\\Ras\\V' . str_replace('.', '_', $a) . '\\';
$prefixB = '\\Sysvale\\Ras\\V' . str_replace('.', '_', $b) . '\\';
$changes = 0;

foreach (array_diff_key($classesA, $classesB) as $name => $_) {
    echo "- classe removida: $name\n";
    $changes++;
}

foreach (array_diff_key($classesB, $classesA) as $name => $_) {
    echo "+ classe nova: $name\n";
    $changes++;
}

foreach (array_intersect_key($classesA, $classesB) as $name => $fullA) {
    $fieldsA = describe($fullA, $prefixA);
    $fieldsB = describe($classesB[$name], $prefixB);

    foreach ($fieldsA as $id => $field) {
        if (!array_key_exists($id, $fieldsB)) {
            echo "- $name: campo removido [$id]" . (is_array($field) ? " {$field['name']}" : '') . "\n";
            $changes++;
        } elseif ($field !== $fieldsB[$id]) {
            $before = is_array($field) ? json_encode($field) : var_export($field, true);
            $after = is_array($fieldsB[$id]) ? json_encode($fieldsB[$id]) : var_export($fieldsB[$id], true);
            echo "~ $name [$id]: $before => $after\n";
            $changes++;
        }
    }

    foreach (array_diff_key($fieldsB, $fieldsA) as $id => $field) {
        echo "+ $name: campo novo [$id]" . (is_array($field) ? " {$field['name']}" : '') . "\n";
        $changes++;
    }
}

echo $changes === 0 ? "Schemas idênticos.\n" : "\n$changes diferença(s) entre $a e $b.\n";
