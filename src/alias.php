<?php

/**
 * br\... passa a ser alias das classes da última versão (Sysvale\Ras\V{latest}\br\...).
 *
 * @param  string $class Nome completo da classe pedida ao autoload.
 * @return void
 */
spl_autoload_register(static function (string $class): void {
    if (strncmp($class, 'br\\', 3) !== 0) {
        return;
    }

    $target = \Sysvale\Ras\Ras::namespaceFor(\Sysvale\Ras\Ras::latest()) . '\\' . $class;

    if (class_exists($target) || interface_exists($target)) {
        class_alias($target, $class);
    }
}, true, true);
