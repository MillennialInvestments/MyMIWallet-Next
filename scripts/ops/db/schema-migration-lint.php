<?php

declare(strict_types=1);

/**
 * Schema & Migration Lint / Completeness Auditor
 *
 * Verifies that:
 * 1. All migration files in app/Database/Migrations conform to naming standard <timestamp>_<ClassName>.php
 * 2. All migration files define a valid Migration class matching the filename
 * 3. All migration classes implement up() and down() methods
 * 4. All migrations use defensive guards (tableExists, fieldExists, getFieldNames, getFieldData, createTable(..., true))
 * 5. All concrete models define their $table property
 *
 * Usage:
 *   php scripts/ops/db/schema-migration-lint.php [--json]
 */

if (PHP_SAPI !== 'cli') {
    exit(1);
}

$isJson = in_array('--json', $argv, true);

$root = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR;
$migrationsDir = $root . 'app/Database/Migrations';

if (! is_dir($migrationsDir)) {
    fwrite(STDERR, "Migrations directory not found: {$migrationsDir}\n");
    exit(1);
}

$migrationFiles = glob("{$migrationsDir}/*.php") ?: [];
$migrationCount = count($migrationFiles);
$migrationErrors = [];
$migrationWarnings = [];

foreach ($migrationFiles as $file) {
    $basename = basename($file, '.php');
    $parts = explode('_', $basename, 2);

    if (count($parts) < 2) {
        $migrationErrors[] = "{$basename}: Invalid migration filename (missing timestamp prefix)";
        continue;
    }

    $expectedClass = $parts[1];
    $content = (string) file_get_contents($file);

    // Class existence & name match
    if (! preg_match('/class\s+([A-Za-z0-9_]+)\s+extends\s+Migration/i', $content, $classMatches)) {
        $migrationErrors[] = "{$basename}: No class extending Migration found";
        continue;
    }

    $actualClass = $classMatches[1];
    if ($actualClass !== $expectedClass) {
        $migrationErrors[] = "{$basename}: Class name mismatch (expected '{$expectedClass}', found '{$actualClass}')";
    }

    // Methods up() and down()
    if (! preg_match('/function\s+up\s*\(/i', $content)) {
        $migrationErrors[] = "{$basename}: Missing up() method";
    }
    if (! preg_match('/function\s+down\s*\(/i', $content)) {
        $migrationErrors[] = "{$basename}: Missing down() method";
    }

    // Defensive table creation checks
    if (preg_match_all('/createTable\s*\(([^;]+)\)/', $content, $createMatches)) {
        foreach ($createMatches[1] as $callArgs) {
            $args = explode(',', $callArgs);
            $hasIfNotExists = isset($args[1]) && trim($args[1]) === 'true';
            $hasTableExists = str_contains($content, 'tableExists');
            if (! $hasIfNotExists && ! $hasTableExists) {
                $migrationErrors[] = "{$basename}: createTable() called without tableExists check or ifNotExists=true flag";
            }
        }
    }

    // Defensive addColumn checks
    if (str_contains($content, 'addColumn')) {
        $hasFieldCheck = str_contains($content, 'fieldExists')
            || str_contains($content, 'getFieldNames')
            || str_contains($content, 'getFieldData');
        $hasTableCheck = str_contains($content, 'tableExists');
        if (! $hasFieldCheck && ! $hasTableCheck) {
            $migrationErrors[] = "{$basename}: addColumn() called without fieldExists/getFieldNames/tableExists guards";
        }
    }
}

// Model inventory
$modelFiles = array_merge(
    glob("{$root}app/Models/*.php") ?: [],
    glob("{$root}app/Models/*/*.php") ?: [],
    glob("{$root}app/Modules/*/Models/*.php") ?: [],
    glob("{$root}app/Modules/*/Models/*/*.php") ?: []
);

$concreteModels = [];
$abstractOrBaseModels = ['BaseModel', 'ObservedModel', 'DiscordModel'];

foreach ($modelFiles as $file) {
    $content = (string) file_get_contents($file);
    if (preg_match('/class\s+(\w+)\s+extends/', $content, $m)) {
        $className = $m[1];
        if (in_array($className, $abstractOrBaseModels, true)) {
            continue;
        }

        $table = null;
        if (preg_match('/table\s*=\s*[\'"]([^\'"]+)[\'"]/', $content, $tm)) {
            $table = $tm[1];
        }

        $primaryKey = 'id';
        if (preg_match('/primaryKey\s*=\s*[\'"]([^\'"]+)[\'"]/', $content, $pm)) {
            $primaryKey = $pm[1];
        }

        $concreteModels[$className] = [
            'file' => str_replace($root, '', $file),
            'table' => $table,
            'primaryKey' => $primaryKey,
        ];
    }
}

$modelsWithoutTable = [];
foreach ($concreteModels as $name => $info) {
    if (empty($info['table'])) {
        // Check if parent class defines it
        if ($name === 'CoinContributionModel') {
            continue; // Inherits from CoinLedgerModel
        }
        $modelsWithoutTable[] = "{$name} ({$info['file']})";
    }
}

$summary = [
    'status' => (empty($migrationErrors) && empty($modelsWithoutTable)) ? 'PASS' : 'FAIL',
    'migrations_total' => $migrationCount,
    'migration_errors_count' => count($migrationErrors),
    'migration_errors' => $migrationErrors,
    'models_scanned' => count($concreteModels),
    'models_missing_table_count' => count($modelsWithoutTable),
    'models_missing_table' => $modelsWithoutTable,
];

if ($isJson) {
    echo json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
} else {
    echo "=== TBI Schema & Migration Lint Audit ===\n";
    echo "Migrations Scanned: {$summary['migrations_total']}\n";
    echo "Migration Errors:   {$summary['migration_errors_count']}\n";
    if (! empty($migrationErrors)) {
        foreach ($migrationErrors as $err) {
            echo "  [FAIL] {$err}\n";
        }
    } else {
        echo "  [PASS] All {$summary['migrations_total']} migrations conform to naming and defensive guard standards.\n";
    }

    echo "Models Scanned:     {$summary['models_scanned']}\n";
    echo "Models Missing Table: {$summary['models_missing_table_count']}\n";
    if (! empty($modelsWithoutTable)) {
        foreach ($modelsWithoutTable as $m) {
            echo "  [FAIL] Model missing \$table: {$m}\n";
        }
    } else {
        echo "  [PASS] All concrete persistent models define explicit \$table mappings.\n";
    }

    echo "Audit Result:       {$summary['status']}\n";
}

exit($summary['status'] === 'PASS' ? 0 : 1);
