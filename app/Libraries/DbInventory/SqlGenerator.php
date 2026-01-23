<?php

namespace App\Libraries\DbInventory;

class SqlGenerator
{
    private const REQUIRED_TABLES = [
        'bf_user_events',
        'bf_email_outbox',
        'bf_ai_usage',
        'bf_marketing_scraper',
        'bf_marketing_blog_posts',
        'bf_ops_schema_audit',
    ];

    public function writeDocs(array $inventory, ?array $dbReport): void
    {
        $docsPath = ROOTPATH . 'docs/mysql';
        $tablesPath = $docsPath . '/tables';
        $adjustmentsPath = $docsPath . '/adjustments';

        foreach ([$docsPath, $tablesPath, $adjustmentsPath] as $path) {
            if (! is_dir($path)) {
                mkdir($path, 0775, true);
            }
        }

        file_put_contents($docsPath . '/README.md', $this->buildReadme());
        file_put_contents($tablesPath . '/_index.md', $this->buildIndex($inventory));

        foreach ($inventory['tables'] as $table => $data) {
            $schema = $this->hydrateSchema($table, $data['schema'], $dbReport, $data['suspected_columns'] ?? []);
            $sql = $this->buildTableDoc($table, $schema, $data['sources'] ?? []);
            file_put_contents($tablesPath . '/' . $table . '.md', $sql);
        }
    }

    public function writeAdjustments(array $inventory, ?array $dbReport): void
    {
        $docsPath = ROOTPATH . 'docs/mysql/adjustments';
        if (! is_dir($docsPath)) {
            mkdir($docsPath, 0775, true);
        }

        $dateStamp = date('Y-m-d');
        $logPath = $docsPath . "/adjustment_log_{$dateStamp}.md";

        $logContents = $this->buildAdjustmentLog($inventory, $dbReport);
        file_put_contents($logPath, $logContents);
    }

    public function buildAdjustmentSql(array $inventory, ?array $dbReport): string
    {
        $lines = [];
        $lines[] = '-- MyMI Wallet adjustment SQL';
        $lines[] = '';

        $missingTables = $this->buildMissingTablesSql($inventory, $dbReport);
        if ($missingTables !== '') {
            $lines[] = '-- Missing tables';
            $lines[] = $missingTables;
        }

        $missingColumns = $this->buildMissingColumnsSql($inventory, $dbReport);
        if ($missingColumns !== '') {
            $lines[] = '-- Missing columns';
            $lines[] = $missingColumns;
        }

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function buildReadme(): string
    {
        $lines = [];
        $lines[] = '# MyMI Wallet – Database Schema Contract';
        $lines[] = '';
        $lines[] = 'This directory is the authoritative contract for MyMI Wallet MySQL tables.';
        $lines[] = 'Schema drift is detected by `php spark db:inventory` and resolved by documented SQL in these files.';
        $lines[] = '';
        $lines[] = '## Commands';
        $lines[] = '- `php spark db:inventory` – scan code + migrations, compare with live DB, and write reports.';
        $lines[] = '- `php spark db:apply-docs` – compile SQL from docs and apply safely.';
        $lines[] = '- `php spark db:apply-docs --dry-run` – compile SQL without executing.';
        $lines[] = '';
        $lines[] = '## Artifacts';
        $lines[] = '- `docs/mysql/tables/*.md` – table contracts with SQL and verification.';
        $lines[] = '- `docs/mysql/adjustments/adjustment_log_YYYY-MM-DD.md` – drift summary.';
        $lines[] = '- `writable/db_inventory/inventory.json` – machine-readable status.';
        $lines[] = '- `writable/db_inventory/report.md` – human-readable report.';
        $lines[] = '- `writable/db_inventory/compiled_adjustments.sql` – SQL compiled from docs.';
        $lines[] = '- `writable/db_inventory/apply_YYYY-MM-DD_HHMMSS.log` – apply run log.';
        $lines[] = '';
        $lines[] = '## CI / CRON';
        $lines[] = 'Use `php spark db:inventory` in CI and enforce alignment with:';
        $lines[] = '```bash';
        $lines[] = "jq -e '.status==\"aligned\"' writable/db_inventory/inventory.json || exit 1";
        $lines[] = '```';
        $lines[] = '';
        $lines[] = 'DreamHost compatibility: TCP MySQL only, no sockets, no sudo, no composer.';
        $lines[] = '';

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function buildIndex(array $inventory): string
    {
        $lines = [];
        $lines[] = '# MyMI Wallet Table Index';
        $lines[] = '';
        $lines[] = 'Tables documented in this contract:';
        $lines[] = '';
        foreach ($inventory['tables'] as $table => $data) {
            $sources = $data['sources'] ?? [];
            $sourceParts = [];
            foreach (['migrations', 'code'] as $sourceType) {
                if (! empty($sources[$sourceType])) {
                    $sourceParts[] = $sourceType . ': ' . implode(', ', $sources[$sourceType]);
                }
            }

            $sourceText = $sourceParts !== [] ? ' (' . implode(' | ', $sourceParts) . ')' : '';
            $lines[] = "- `{$table}`{$sourceText}";
        }
        $lines[] = '';

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function buildTableDoc(string $table, array $schema, array $sources): string
    {
        $lines = [];
        $lines[] = "# {$table}";
        $lines[] = '';
        $lines[] = '## Source';
        $lines[] = '- Migration: ' . $this->formatSources($sources['migrations'] ?? []);
        $lines[] = '- Model:';
        $lines[] = '- Code references: ' . $this->formatSources($sources['code'] ?? []);
        $lines[] = '';
        $lines[] = '## Create table';
        $lines[] = '```sql';
        $lines[] = $this->buildCreateTableSql($table, $schema);
        $lines[] = '```';
        $lines[] = '';
        $lines[] = '## Required columns';
        foreach ($schema['columns'] as $column => $spec) {
            $lines[] = '- ' . $this->columnSummary($column, $spec);
        }
        if ($schema['columns'] === []) {
            $lines[] = '- _No columns defined_';
        }
        $lines[] = '';
        $lines[] = '## Required indexes';
        $indexLines = $this->indexSummaryLines($schema);
        if ($indexLines === []) {
            $lines[] = '- _No indexes defined_';
        } else {
            $lines = array_merge($lines, $indexLines);
        }
        $lines[] = '';
        $lines[] = '## Verification';
        $lines[] = '```sql';
        $lines[] = "SHOW CREATE TABLE `{$table}`;";
        $lines[] = '```';
        $lines[] = '';
        $lines[] = '```sql';
        $lines[] = "SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA";
        $lines[] = "FROM information_schema.columns";
        $lines[] = "WHERE table_schema = DATABASE() AND table_name = '{$table}'";
        $lines[] = "ORDER BY ORDINAL_POSITION;";
        $lines[] = '```';
        $lines[] = '';
        $lines[] = '```sql';
        $lines[] = "SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX";
        $lines[] = "FROM information_schema.statistics";
        $lines[] = "WHERE table_schema = DATABASE() AND table_name = '{$table}'";
        $lines[] = "ORDER BY INDEX_NAME, SEQ_IN_INDEX;";
        $lines[] = '```';
        $lines[] = '';

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function buildCreateTableSql(string $table, array $schema): string
    {
        $lines = [];
        $lines[] = "CREATE TABLE IF NOT EXISTS `{$table}` (";

        $columnSql = [];
        foreach ($schema['columns'] as $column => $spec) {
            $columnSql[] = '  ' . $this->columnSql($column, $spec);
        }

        if (isset($schema['indexes']['PRIMARY'])) {
            $columnSql[] = '  PRIMARY KEY (' . $this->columnList($schema['indexes']['PRIMARY']) . ')';
        }

        foreach ($schema['unique'] as $indexName => $columns) {
            $columnSql[] = sprintf('  UNIQUE KEY `%s` (%s)', $indexName, $this->columnList($columns));
        }

        foreach ($schema['indexes'] as $indexName => $columns) {
            if ($indexName === 'PRIMARY') {
                continue;
            }
            $columnSql[] = sprintf('  KEY `%s` (%s)', $indexName, $this->columnList($columns));
        }

        foreach ($schema['foreign_keys'] as $foreignKey) {
            $constraint = $foreignKey['constraint'] ?? '';
            $constraintSql = $constraint !== '' ? "CONSTRAINT `{$constraint}` " : '';
            $columnSql[] = sprintf(
                '  %sFOREIGN KEY (`%s`) REFERENCES `%s` (`%s`)%s%s',
                $constraintSql,
                $foreignKey['field'],
                $foreignKey['ref_table'],
                $foreignKey['ref_field'],
                $foreignKey['on_delete'] !== '' ? ' ON DELETE ' . $foreignKey['on_delete'] : '',
                $foreignKey['on_update'] !== '' ? ' ON UPDATE ' . $foreignKey['on_update'] : ''
            );
        }

        if ($columnSql === []) {
            $columnSql[] = '  -- TODO: define columns for this table';
        }

        $lines[] = implode(',' . PHP_EOL, $columnSql);
        $lines[] = ') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';

        return implode(PHP_EOL, $lines);
    }

    public function resolveSchema(string $table, array $schema, ?array $dbReport, array $suspectedColumns = []): array
    {
        return $this->hydrateSchema($table, $schema, $dbReport, $suspectedColumns);
    }

    private function buildAddColumnSql(string $table, string $column, array $spec): string
    {
        $columnSql = $this->columnSql($column, $spec);
        $escapedColumnSql = str_replace("'", "''", $columnSql);
        $lines = [];
        $lines[] = "SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = '{$table}' AND column_name = '{$column}');";
        $lines[] = "SET @sql := IF(@col_exists = 0, 'ALTER TABLE `{$table}` ADD COLUMN {$escapedColumnSql}', 'SELECT ''column {$column} already exists''');";
        $lines[] = 'PREPARE stmt FROM @sql;';
        $lines[] = 'EXECUTE stmt;';
        $lines[] = 'DEALLOCATE PREPARE stmt;';

        return implode(PHP_EOL, $lines);
    }

    private function buildAddIndexSql(string $table, string $indexName, array $columns, bool $unique): string
    {
        $columnList = $this->columnList($columns);
        $type = $unique ? 'ADD UNIQUE INDEX' : 'ADD INDEX';
        $lines = [];
        $lines[] = "SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = '{$table}' AND index_name = '{$indexName}');";
        $lines[] = "SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `{$table}` {$type} `{$indexName}` ({$columnList})', 'SELECT ''index {$indexName} already exists''');";
        $lines[] = 'PREPARE stmt FROM @sql;';
        $lines[] = 'EXECUTE stmt;';
        $lines[] = 'DEALLOCATE PREPARE stmt;';

        return implode(PHP_EOL, $lines);
    }

    private function buildMissingTablesSql(array $inventory, ?array $dbReport): string
    {
        if ($dbReport === null) {
            return '';
        }

        $lines = [];
        foreach ($inventory['tables'] as $table => $data) {
            $report = $dbReport['tables'][$table] ?? null;
            if ($report && $report['exists'] === false) {
                $schema = $this->hydrateSchema($table, $data['schema'], $dbReport, $data['suspected_columns'] ?? []);
                $lines[] = $this->buildCreateTableSql($table, $schema);
                $lines[] = '';
            }
        }

        return implode(PHP_EOL, $lines);
    }

    private function buildMissingColumnsSql(array $inventory, ?array $dbReport): string
    {
        if ($dbReport === null) {
            return '';
        }

        $lines = [];
        foreach ($inventory['tables'] as $table => $data) {
            $report = $dbReport['tables'][$table] ?? null;
            if (! $report || $report['exists'] === false) {
                continue;
            }

            $schema = $this->hydrateSchema($table, $data['schema'], $dbReport, $data['suspected_columns'] ?? []);
            foreach ($schema['columns'] as $column => $spec) {
                if (! isset($report['columns'][$column])) {
                    $lines[] = $this->buildAddColumnSql($table, $column, $spec);
                    $lines[] = '';
                }
            }

            foreach ($schema['indexes'] as $indexName => $columns) {
                if ($indexName === 'PRIMARY') {
                    continue;
                }
                if (! isset($report['indexes'][$indexName])) {
                    $lines[] = $this->buildAddIndexSql($table, $indexName, $columns, false);
                    $lines[] = '';
                }
            }

            foreach ($schema['unique'] as $indexName => $columns) {
                if (! isset($report['indexes'][$indexName])) {
                    $lines[] = $this->buildAddIndexSql($table, $indexName, $columns, true);
                    $lines[] = '';
                }
            }
        }

        return implode(PHP_EOL, $lines);
    }

    private function hydrateSchema(string $table, array $schema, ?array $dbReport, array $suspectedColumns = []): array
    {
        if ($table === 'bf_ops_schema_audit' && empty($schema['columns'])) {
            return $this->buildAuditSchema();
        }

        if (! empty($schema['columns'])) {
            return $schema;
        }

        if ($dbReport === null) {
            return $this->applySuspectedColumns($schema, $suspectedColumns);
        }

        $report = $dbReport['tables'][$table] ?? null;
        if (! $report || $report['exists'] === false) {
            return $this->applySuspectedColumns($schema, $suspectedColumns);
        }

        $columns = [];
        foreach ($report['columns'] as $name => $row) {
            $columns[$name] = [
                'column_type'   => $row['COLUMN_TYPE'],
                'is_nullable'   => $row['IS_NULLABLE'],
                'column_default'=> $row['COLUMN_DEFAULT'],
                'extra'         => $row['EXTRA'],
            ];
        }

        return [
            'columns'      => $columns,
            'indexes'      => $schema['indexes'] ?? [],
            'unique'       => $schema['unique'] ?? [],
            'foreign_keys' => $schema['foreign_keys'] ?? [],
            'attributes'   => $schema['attributes'] ?? [],
        ];
    }

    private function applySuspectedColumns(array $schema, array $suspectedColumns): array
    {
        if ($schema['columns'] !== []) {
            return $schema;
        }

        $columns = [];
        foreach (array_keys($suspectedColumns) as $column) {
            if ($column === 'id') {
                $columns['id'] = [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ];
                continue;
            }
            $columns[$column] = [
                'type' => 'TEXT',
                'null' => true,
            ];
        }

        if ($columns === []) {
            $columns['id'] = [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ];
        }

        $schema['columns'] = $columns;
        $schema['indexes'] = $schema['indexes'] ?? [];
        $schema['unique'] = $schema['unique'] ?? [];
        $schema['foreign_keys'] = $schema['foreign_keys'] ?? [];
        $schema['attributes'] = $schema['attributes'] ?? [];
        $schema['meta'] = ['suspected_columns' => array_keys($suspectedColumns)];

        if (! isset($schema['indexes']['PRIMARY']) && isset($schema['columns']['id'])) {
            $schema['indexes']['PRIMARY'] = ['id'];
        }

        return $schema;
    }

    private function columnSql(string $column, array $spec): string
    {
        if (isset($spec['column_type'])) {
            $sql = sprintf('`%s` %s', $column, $spec['column_type']);
            $sql .= ($spec['is_nullable'] ?? 'YES') === 'NO' ? ' NOT NULL' : ' NULL';

            if (array_key_exists('column_default', $spec)) {
                $default = $spec['column_default'];
                if ($default === null) {
                    $sql .= ' DEFAULT NULL';
                } elseif (is_numeric($default)) {
                    $sql .= ' DEFAULT ' . $default;
                } elseif (in_array(strtoupper((string) $default), ['CURRENT_TIMESTAMP', 'CURRENT_TIMESTAMP()'], true)) {
                    $sql .= ' DEFAULT CURRENT_TIMESTAMP';
                } else {
                    $sql .= " DEFAULT '" . addslashes((string) $default) . "'";
                }
            }

            if (! empty($spec['extra'])) {
                $sql .= ' ' . strtoupper($spec['extra']);
            }

            return $sql;
        }

        $type = strtoupper((string) ($spec['type'] ?? 'TEXT'));
        $constraint = $spec['constraint'] ?? null;

        if ($constraint !== null && $constraint !== '') {
            if (is_array($constraint)) {
                $constraintValue = implode("','", array_map('strval', $constraint));
                $type .= "('{$constraintValue}')";
            } else {
                $type .= '(' . $constraint . ')';
            }
        }

        $sql = sprintf('`%s` %s', $column, $type);

        if (! empty($spec['unsigned'])) {
            $sql .= ' UNSIGNED';
        }

        $nullable = $spec['null'] ?? false;
        $sql .= $nullable ? ' NULL' : ' NOT NULL';

        if (array_key_exists('default', $spec)) {
            $default = $spec['default'];
            if ($default === null) {
                $sql .= ' DEFAULT NULL';
            } elseif (is_numeric($default)) {
                $sql .= ' DEFAULT ' . $default;
            } elseif (in_array(strtoupper((string) $default), ['CURRENT_TIMESTAMP', 'CURRENT_TIMESTAMP()'], true)) {
                $sql .= ' DEFAULT CURRENT_TIMESTAMP';
            } else {
                $sql .= " DEFAULT '" . addslashes((string) $default) . "'";
            }
        }

        if (! empty($spec['auto_increment'])) {
            $sql .= ' AUTO_INCREMENT';
        }

        return $sql;
    }

    private function columnList(array $columns): string
    {
        $columns = array_map(static fn (string $column): string => "`{$column}`", $columns);
        return implode(', ', $columns);
    }

    private function buildAdjustmentLog(array $inventory, ?array $dbReport): string
    {
        $tableCount = count($inventory['tables']);
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

                $schema = $this->hydrateSchema($table, $data['schema'], $dbReport, $data['suspected_columns'] ?? []);
                foreach ($schema['columns'] as $column => $spec) {
                    if (! isset($report['columns'][$column])) {
                        $missingColumns[] = "{$table}.{$column}";
                    }
                }

                foreach ($schema['indexes'] as $indexName => $columns) {
                    if ($indexName === 'PRIMARY') {
                        continue;
                    }
                    if (! isset($report['indexes'][$indexName])) {
                        $missingIndexes[] = "{$table}.{$indexName}";
                    }
                }

                foreach ($schema['unique'] as $indexName => $columns) {
                    if (! isset($report['indexes'][$indexName])) {
                        $missingIndexes[] = "{$table}.{$indexName}";
                    }
                }
            }
        }

        $lines = [];
        $lines[] = '# MyMI Wallet – DB Schema Adjustment Log';
        $lines[] = 'Date: ' . date('Y-m-d');
        $lines[] = 'Command: php spark db:inventory';
        $lines[] = '';
        $lines[] = '## Summary';
        $lines[] = '- Tables analyzed: ' . $tableCount;
        $lines[] = '- Missing tables: ' . count($missingTables);
        $lines[] = '- Missing columns: ' . count($missingColumns);
        $lines[] = '- Missing indexes: ' . count($missingIndexes);
        $lines[] = '';
        $lines[] = '## Result';

        if ($dbReport === null) {
            $lines[] = '⚠️ Database inspection skipped';
            $lines[] = '';
            $lines[] = '## SQL Required';
            $lines[] = '_Unavailable_';
            $lines[] = '';
            return implode(PHP_EOL, $lines) . PHP_EOL;
        }

        if ($missingTables === [] && $missingColumns === [] && $missingIndexes === []) {
            $lines[] = '✅ Schema matches documented contract';
            $lines[] = '';
            $lines[] = '## SQL Required';
            $lines[] = '_None_';
            $lines[] = '';
            return implode(PHP_EOL, $lines) . PHP_EOL;
        }

        $lines[] = '❌ Schema drift detected';
        $lines[] = '';
        $lines[] = '## Missing tables';
        if ($missingTables === []) {
            $lines[] = '- _None_';
        } else {
            foreach ($missingTables as $table) {
                $lines[] = "- {$table}";
            }
        }
        $lines[] = '';
        $lines[] = '## Missing columns';
        if ($missingColumns === []) {
            $lines[] = '- _None_';
        } else {
            foreach ($missingColumns as $column) {
                $lines[] = "- {$column}";
            }
        }
        $lines[] = '';
        $lines[] = '## Missing indexes';
        if ($missingIndexes === []) {
            $lines[] = '- _None_';
        } else {
            foreach ($missingIndexes as $index) {
                $lines[] = "- {$index}";
            }
        }
        $lines[] = '';
        $lines[] = '## SQL Required';
        $lines[] = '```sql';
        $lines[] = $this->buildAdjustmentSql($inventory, $dbReport);
        $lines[] = '```';
        $lines[] = '';

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function buildAuditSchema(): array
    {
        return [
            'columns' => [
                'id' => [
                    'type'           => 'BIGINT',
                    'constraint'     => 20,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'operation' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 16,
                ],
                'table_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 64,
                ],
                'sql_hash' => [
                    'type'       => 'CHAR',
                    'constraint' => 64,
                ],
                'applied_by' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 64,
                ],
                'applied_at' => [
                    'type'    => 'DATETIME',
                    'default' => 'CURRENT_TIMESTAMP',
                ],
                'source' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 64,
                    'default'    => 'db:apply-docs',
                    'null'       => true,
                ],
            ],
            'indexes' => [
                'PRIMARY' => ['id'],
            ],
            'unique' => [],
            'foreign_keys' => [],
            'attributes' => [],
        ];
    }

    private function formatSources(array $sources): string
    {
        if ($sources === []) {
            return '_None_';
        }

        return implode(', ', $sources);
    }

    private function columnSummary(string $column, array $spec): string
    {
        if (isset($spec['column_type'])) {
            $nullText = ($spec['is_nullable'] ?? 'YES') === 'NO' ? 'NOT NULL' : 'NULL';
            return sprintf('%s %s %s', $column, $spec['column_type'], $nullText);
        }

        $type = strtoupper((string) ($spec['type'] ?? 'TEXT'));
        $constraint = $spec['constraint'] ?? null;
        if ($constraint !== null && $constraint !== '') {
            if (is_array($constraint)) {
                $type .= '(' . implode(',', $constraint) . ')';
            } else {
                $type .= '(' . $constraint . ')';
            }
        }

        if (! empty($spec['unsigned'])) {
            $type .= ' UNSIGNED';
        }

        $nullable = $spec['null'] ?? false;
        $nullText = $nullable ? 'NULL' : 'NOT NULL';

        return sprintf('%s %s %s', $column, $type, $nullText);
    }

    private function indexSummaryLines(array $schema): array
    {
        $lines = [];

        if (isset($schema['indexes']['PRIMARY'])) {
            $lines[] = '- PRIMARY (' . implode(', ', $schema['indexes']['PRIMARY']) . ')';
        }

        foreach ($schema['unique'] as $indexName => $columns) {
            $lines[] = '- ' . $indexName . ' (' . implode(', ', $columns) . ') [UNIQUE]';
        }

        foreach ($schema['indexes'] as $indexName => $columns) {
            if ($indexName === 'PRIMARY') {
                continue;
            }
            $lines[] = '- ' . $indexName . ' (' . implode(', ', $columns) . ')';
        }

        return $lines;
    }
}
