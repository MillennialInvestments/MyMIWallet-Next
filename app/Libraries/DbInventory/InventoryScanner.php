<?php

namespace App\Libraries\DbInventory;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Database\Migration;
use Throwable;

class InventoryScanner
{
    private const REQUIRED_TABLES = [
        'bf_user_events',
        'bf_email_outbox',
        'bf_ai_usage',
        'bf_marketing_scraper',
        'bf_marketing_blog_posts',
        'bf_ops_schema_audit',
    ];

    public function buildInventory(int $limit = 0): array
    {
        $migrationData = $this->scanMigrations();
        $codeData = $this->scanCodeUsage();

        $tables = array_unique(array_merge(array_keys($migrationData['tables']), array_keys($codeData['tables'])));
        $tables = array_values(array_filter($tables, static fn (string $table): bool => str_starts_with($table, 'bf_')));
        $tables = array_values(array_unique(array_merge($tables, self::REQUIRED_TABLES)));
        sort($tables);

        if ($limit > 0) {
            $tables = array_slice($tables, 0, $limit);
        }

        $inventory = [
            'generated_at' => date('Y-m-d H:i:s'),
            'tables'       => [],
            'warnings'     => $migrationData['warnings'],
        ];

        foreach ($tables as $table) {
            $inventory['tables'][$table] = [
                'schema'    => $migrationData['tables'][$table] ?? [
                    'columns'      => [],
                    'indexes'      => [],
                    'unique'       => [],
                    'foreign_keys' => [],
                    'attributes'   => [],
                ],
                'sources'   => [
                    'migrations' => $migrationData['sources'][$table] ?? [],
                    'code'       => $codeData['sources'][$table] ?? [],
                ],
                'suspected_columns' => $codeData['columns'][$table] ?? [],
            ];
        }

        return $inventory;
    }

    public function inspectDatabase(ConnectionInterface $db, array $inventory): array
    {
        $tables = array_keys($inventory['tables']);
        $dbTables = [];
        $result = $db->query('SELECT TABLE_NAME FROM information_schema.tables WHERE table_schema = DATABASE()');
        foreach ($result->getResultArray() as $row) {
            $dbTables[] = $row['TABLE_NAME'];
        }

        $report = [
            'db_tables' => $dbTables,
            'tables'    => [],
        ];

        foreach ($tables as $table) {
            if (! in_array($table, $dbTables, true)) {
                $report['tables'][$table] = [
                    'exists'  => false,
                    'columns' => [],
                    'indexes' => [],
                ];
                continue;
            }

            $columns = [];
            $columnRows = $db->query(
                'SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
                 FROM information_schema.columns
                 WHERE table_schema = DATABASE() AND table_name = ?
                 ORDER BY ORDINAL_POSITION',
                [$table]
            )->getResultArray();

            foreach ($columnRows as $row) {
                $columns[$row['COLUMN_NAME']] = $row;
            }

            $indexes = [];
            $indexRows = $db->query(
                'SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
                 FROM information_schema.statistics
                 WHERE table_schema = DATABASE() AND table_name = ?
                 ORDER BY INDEX_NAME, SEQ_IN_INDEX',
                [$table]
            )->getResultArray();

            foreach ($indexRows as $row) {
                $indexes[$row['INDEX_NAME']][] = [
                    'column' => $row['COLUMN_NAME'],
                    'seq'    => (int) $row['SEQ_IN_INDEX'],
                    'unique' => (int) $row['NON_UNIQUE'] === 0,
                ];
            }

            $report['tables'][$table] = [
                'exists'  => true,
                'columns' => $columns,
                'indexes' => $indexes,
            ];
        }

        return $report;
    }

    public function buildReport(array $inventory, ?array $dbReport): string
    {
        $lines = [];
        $lines[] = '# MyMI Wallet DB Inventory Report';
        $lines[] = '';
        $lines[] = 'Generated: ' . $inventory['generated_at'];
        $lines[] = '';

        if (! empty($inventory['warnings'])) {
            $lines[] = '## Warnings';
            foreach ($inventory['warnings'] as $warning) {
                $lines[] = '- ' . $warning;
            }
            $lines[] = '';
        }

        if ($dbReport === null) {
            $lines[] = '## Database inspection';
            $lines[] = 'Database inspection was skipped.';
            $lines[] = '';
        }

        $lines[] = '## Tables';
        foreach ($inventory['tables'] as $table => $data) {
            $lines[] = "- {$table}";
            $migrationSources = $data['sources']['migrations'] ?? [];
            $codeSources = $data['sources']['code'] ?? [];

            if ($migrationSources !== []) {
                $lines[] = '  - Migrations: ' . implode(', ', $migrationSources);
            }
            if ($codeSources !== []) {
                $lines[] = '  - Code: ' . implode(', ', $codeSources);
            }

            $suspected = $data['suspected_columns'] ?? [];
            if ($suspected !== []) {
                $lines[] = '  - Suspected columns: ' . implode(', ', array_keys($suspected));
            }
        }

        $lines[] = '';

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function scanMigrations(): array
    {
        $path = APPPATH . 'Database/Migrations';
        $files = glob($path . '/*.php');
        sort($files);

        $db = new SchemaRecorderDb();
        $forge = new SchemaRecorderForge($db);
        $runner = new MigrationRunner($db, $forge);
        $warnings = [];

        foreach ($files as $file) {
            $before = get_declared_classes();
            require_once $file;
            $after = get_declared_classes();
            $newClasses = array_diff($after, $before);

            foreach ($newClasses as $class) {
                if (! is_subclass_of($class, Migration::class)) {
                    continue;
                }

                try {
                    $runner->runMigration(basename($file), $class);
                } catch (Throwable $exception) {
                    $warnings[] = sprintf('Migration %s failed: %s', basename($file), $exception->getMessage());
                }
            }
        }

        return [
            'tables'   => $db->tables,
            'sources'  => $db->sources,
            'warnings' => $warnings,
        ];
    }

    private function scanCodeUsage(): array
    {
        $paths = [
            APPPATH,
            ROOTPATH . 'docs',
        ];

        $tables = [];
        $sources = [];
        $columns = [];

        foreach ($paths as $path) {
            if (! is_dir($path)) {
                continue;
            }

            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS)
            );

            foreach ($iterator as $file) {
                if (! $file->isFile()) {
                    continue;
                }

                $pathname = $file->getPathname();
                if (str_contains($pathname, '/docs/mysql/')) {
                    continue;
                }

                $extension = strtolower($file->getExtension());
                if (! in_array($extension, ['php', 'md', 'sql'], true)) {
                    continue;
                }

                $lines = file($pathname, FILE_IGNORE_NEW_LINES);
                if (! $lines) {
                    continue;
                }

                foreach ($lines as $lineNumber => $line) {
                    if (! str_contains($line, 'bf_')) {
                        continue;
                    }

                    if (preg_match_all('/\b(bf_[a-z0-9_]*[a-z0-9])\b/i', $line, $matches)) {
                        foreach ($matches[1] as $table) {
                            $tables[$table] = true;
                            $sources[$table][] = sprintf('%s:%d', $this->relativePath($file->getPathname()), $lineNumber + 1);
                        }
                    }

                    if (preg_match_all('/->table\(\s*[\'"](?P<table>bf_[a-z0-9_]*[a-z0-9])[\'"]\s*\)(?P<rest>[^;]*)/i', $line, $chainMatches, PREG_SET_ORDER)) {
                        foreach ($chainMatches as $match) {
                            $table = $match['table'];
                            if (preg_match_all('/->(?:where|orWhere|like|select|orderBy|groupBy|set)\(\s*[\'"](?P<col>[a-zA-Z0-9_]+)[\'"]/i', $match['rest'], $colMatches)) {
                                foreach ($colMatches['col'] as $column) {
                                    $columns[$table][$column] = 'code';
                                }
                            }
                        }
                    }

                    if (preg_match_all('/`?(bf_[a-z0-9_]*[a-z0-9])`?\.`?([a-zA-Z0-9_]+)`?/i', $line, $colMatches, PREG_SET_ORDER)) {
                        foreach ($colMatches as $match) {
                            $columns[$match[1]][$match[2]] = 'sql';
                        }
                    }
                }
            }
        }

        return [
            'tables'  => $tables,
            'sources' => $sources,
            'columns' => $columns,
        ];
    }

    private function relativePath(string $path): string
    {
        return ltrim(str_replace(ROOTPATH, '', $path), '/');
    }
}
