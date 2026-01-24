<?php

namespace App\Services\Spark;

use App\Libraries\DbInventory\InventoryScanner;
use App\Libraries\DbInventory\SqlGenerator;
use Config\Database;
use Throwable;

class DbInventoryService
{
    public function run(array $options, bool $dryRun = false): array
    {
        $writeDocs = (int) ($options['write-docs'] ?? 1);
        $writeSql  = (int) ($options['write-sql'] ?? 1);
        $limit     = (int) ($options['limit'] ?? 0);
        $dbGroup   = (string) ($options['db-group'] ?? 'default');

        $scanner = new InventoryScanner();
        $generator = new SqlGenerator();

        $inventory = $scanner->buildInventory($limit);

        $dbReport = null;
        $dbHost = null;
        $dbVersion = null;
        try {
            $db = Database::connect($dbGroup);
            $dbReport = $scanner->inspectDatabase($db, $inventory);
            $dbVersionRow = $db->query('SELECT VERSION() AS version')->getRowArray();
            $dbVersion = $dbVersionRow['version'] ?? null;
            $dbConfig = config('Database');
            $groupConfig = $dbConfig->{$dbGroup} ?? null;
            if ($groupConfig) {
                $dbHost = $groupConfig['hostname'] ?? $groupConfig->hostname ?? null;
            }
        } catch (Throwable $exception) {
            $inventory['warnings'][] = 'Database inspection skipped: ' . $exception->getMessage();
        }

        $outputDir = WRITEPATH . 'db_inventory';
        if (! $dryRun && ! is_dir($outputDir)) {
            mkdir($outputDir, 0775, true);
        }

        $missingTables = [];
        $missingColumns = [];
        $missingIndexes = [];

        if ($dbReport !== null) {
            foreach ($inventory['tables'] as $table => $data) {
                $report = $dbReport['tables'][$table] ?? null;
                if (! $report || $report['exists'] === false) {
                    $missingTables[] = $table;
                    continue;
                }

                $schema = $generator->resolveSchema($table, $data['schema'], $dbReport, $data['suspected_columns'] ?? []);
                foreach ($schema['columns'] as $column => $spec) {
                    if (! isset($report['columns'][$column])) {
                        $missingColumns[] = [
                            'table'  => $table,
                            'column' => $column,
                        ];
                    }
                }

                foreach ($schema['indexes'] as $indexName => $columns) {
                    if ($indexName === 'PRIMARY') {
                        continue;
                    }
                    if (! isset($report['indexes'][$indexName])) {
                        $missingIndexes[] = [
                            'table'   => $table,
                            'index'   => $indexName,
                            'columns' => $columns,
                        ];
                    }
                }

                foreach ($schema['unique'] as $indexName => $columns) {
                    if (! isset($report['indexes'][$indexName])) {
                        $missingIndexes[] = [
                            'table'   => $table,
                            'index'   => $indexName,
                            'columns' => $columns,
                        ];
                    }
                }
            }
        }

        $status = $dbReport === null
            ? 'unknown'
            : (($missingTables === [] && $missingColumns === [] && $missingIndexes === []) ? 'aligned' : 'drift');
        $inventoryPayload = [
            'timestamp'       => gmdate('Y-m-d\TH:i:s\Z'),
            'db_host'         => $dbHost ?? 'unknown',
            'db_version'      => $dbVersion ?? 'unknown',
            'tables_checked'  => count($inventory['tables']),
            'missing_tables'  => $missingTables,
            'missing_columns' => $missingColumns,
            'missing_indexes' => $missingIndexes,
            'status'          => $status,
        ];

        $inventoryJson = json_encode($inventoryPayload, JSON_PRETTY_PRINT);
        $reportMarkdown = $scanner->buildReport($inventory, $dbReport);

        if (! $dryRun) {
            file_put_contents($outputDir . '/inventory.json', $inventoryJson);
            file_put_contents($outputDir . '/report.md', $reportMarkdown);

            if ($writeDocs === 1) {
                $generator->writeDocs($inventory, $dbReport);
            }

            if ($writeSql === 1) {
                $generator->writeAdjustments($inventory, $dbReport);
            }
        }

        return [
            'status' => $status,
            'output_dir' => $outputDir,
            'missing_tables' => $missingTables,
            'missing_columns' => $missingColumns,
            'missing_indexes' => $missingIndexes,
            'inventory' => $inventoryPayload,
            'report_markdown' => $reportMarkdown,
            'dry_run' => $dryRun,
            'write_docs' => $writeDocs === 1,
            'write_sql' => $writeSql === 1,
        ];
    }
}
