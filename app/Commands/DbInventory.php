<?php

namespace App\Commands;

use App\Libraries\DbInventory\InventoryScanner;
use App\Libraries\DbInventory\SqlGenerator;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;
use Throwable;

class DbInventory extends BaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'db:inventory';
    protected $description = 'Scan code and migrations to inventory MyMI Wallet tables and generate integrity docs.';
    protected $usage       = 'db:inventory [options]';
    protected $options     = [
        '--write-docs' => 'Write /docs/mysql files (default: 1)',
        '--write-sql'  => 'Write SQL adjustment files (default: 1)',
        '--limit'      => 'Limit tables processed (0 = no limit)',
        '--db-group'   => 'Database group to inspect (default: default)',
    ];

    public function run(array $params)
    {
        $writeDocs = (int) (CLI::getOption('write-docs') ?? 1);
        $writeSql  = (int) (CLI::getOption('write-sql') ?? 1);
        $limit     = (int) (CLI::getOption('limit') ?? 0);
        $dbGroup   = (string) (CLI::getOption('db-group') ?? 'default');

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
        if (! is_dir($outputDir)) {
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
        file_put_contents($outputDir . '/inventory.json', $inventoryJson);

        $reportMarkdown = $scanner->buildReport($inventory, $dbReport);
        file_put_contents($outputDir . '/report.md', $reportMarkdown);

        if ($writeDocs === 1) {
            $generator->writeDocs($inventory, $dbReport);
        }

        if ($writeSql === 1) {
            $generator->writeAdjustments($inventory, $dbReport);
        }

        CLI::write('db:inventory complete');
    }
}
