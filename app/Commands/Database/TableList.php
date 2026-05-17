<?php

namespace App\Commands\Database;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class TableList extends BaseCommand
{
    protected $group = 'Database';
    protected $name = 'db:table-list';
    protected $description = 'List database tables, columns, indexes, and approximate row counts.';

    public function run(array $params)
    {
        $db = Database::connect();

        $format = CLI::getOption('format') ?: 'text';
        $save = (bool) CLI::getOption('save');

        $database = $db->getDatabase();

        $tables = $db->query('SHOW TABLES')->getResultArray();

        $result = [
            'database' => $database,
            'generated_at' => date('Y-m-d H:i:s'),
            'tables' => [],
        ];

        foreach ($tables as $row) {
            $table = array_values($row)[0];

            $columns = $db->query('SHOW COLUMNS FROM `' . $table . '`')->getResultArray();
            $indexes = $db->query('SHOW INDEX FROM `' . $table . '`')->getResultArray();

            $rowCount = null;
            try {
                $countRow = $db->query('SELECT COUNT(*) AS total FROM `' . $table . '`')->getRowArray();
                $rowCount = isset($countRow['total']) ? (int) $countRow['total'] : null;
            } catch (\Throwable $e) {
                $rowCount = null;
            }

            $result['tables'][] = [
                'table' => $table,
                'row_count' => $rowCount,
                'columns' => $columns,
                'indexes' => $indexes,
            ];
        }

        if ($save) {
            $dir = WRITEPATH . 'reports';
            if (! is_dir($dir)) {
                mkdir($dir, 0775, true);
            }

            file_put_contents($dir . '/db-table-list-latest.json', json_encode($result, JSON_PRETTY_PRINT));

            $md = '# Database Table Inventory' . PHP_EOL . PHP_EOL;
            $md .= '- Database: `' . $database . '`' . PHP_EOL;
            $md .= '- Generated: `' . $result['generated_at'] . '`' . PHP_EOL . PHP_EOL;

            foreach ($result['tables'] as $tableData) {
                $md .= '## `' . $tableData['table'] . '`' . PHP_EOL . PHP_EOL;
                $md .= '- Rows: `' . ($tableData['row_count'] ?? 'unknown') . '`' . PHP_EOL . PHP_EOL;
                $md .= '| Field | Type | Null | Key | Default | Extra |' . PHP_EOL;
                $md .= '|---|---|---|---|---|---|' . PHP_EOL;

                foreach ($tableData['columns'] as $column) {
                    $md .= '| `' . ($column['Field'] ?? '') . '` | `' . ($column['Type'] ?? '') . '` | `' . ($column['Null'] ?? '') . '` | `' . ($column['Key'] ?? '') . '` | `' . (($column['Default'] ?? '') === null ? 'NULL' : $column['Default']) . '` | `' . ($column['Extra'] ?? '') . '` |' . PHP_EOL;
                }

                $md .= PHP_EOL;
            }

            file_put_contents($dir . '/db-table-list-latest.md', $md);
        }

        if ($format === 'json') {
            CLI::write(json_encode($result, JSON_PRETTY_PRINT));
            return;
        }

        CLI::write('Database: ' . $database, 'green');
        CLI::write('Tables found: ' . count($result['tables']), 'yellow');

        foreach ($result['tables'] as $tableData) {
            CLI::newLine();
            CLI::write($tableData['table'] . ' | rows: ' . ($tableData['row_count'] ?? 'unknown'), 'cyan');

            foreach ($tableData['columns'] as $column) {
                CLI::write(
                    '  - ' .
                    ($column['Field'] ?? '') .
                    ' | ' .
                    ($column['Type'] ?? '') .
                    ' | key=' .
                    ($column['Key'] ?? '')
                );
            }
        }

        if ($save) {
            CLI::newLine();
            CLI::write('Saved reports:', 'green');
            CLI::write('- writable/reports/db-table-list-latest.json');
            CLI::write('- writable/reports/db-table-list-latest.md');
        }
    }
}
