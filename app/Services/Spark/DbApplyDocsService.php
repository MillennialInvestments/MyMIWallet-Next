<?php

namespace App\Services\Spark;

class DbApplyDocsService
{
    private ?\mysqli $mysqli = null;

    public function run(array $options, bool $dryRun = false): array
    {
        $dbGroup = (string) ($options['db-group'] ?? 'default');

        $outputDir = WRITEPATH . 'aiops/artifacts/db-apply-docs';
        if (! is_dir($outputDir)) {
            mkdir($outputDir, 0775, true);
        }

        $logPath = $outputDir . '/apply_' . date('Y-m-d_His') . '.log';
        $logHandle = fopen($logPath, 'ab');
        $this->logLine($logHandle, 'db:apply-docs started');

        $scriptPath = ROOTPATH . 'scripts/extract_sql_from_md.sh';
        if (! file_exists($scriptPath)) {
            $this->logLine($logHandle, 'SQL extraction script missing: ' . $scriptPath);
            fclose($logHandle);
            return [
                'ok' => false,
                'message' => 'SQL extraction script missing.',
                'log_path' => $logPath,
            ];
        }

        $command = 'bash ' . escapeshellarg($scriptPath) . ' 2>&1';
        $this->logLine($logHandle, 'Running: ' . $command);
        $scriptOutput = shell_exec($command);
        if ($scriptOutput !== null && $scriptOutput !== '') {
            $this->logLine($logHandle, trim($scriptOutput));
        }

        $compiledPath = $outputDir . '/compiled_adjustments.sql';
        if (! file_exists($compiledPath)) {
            $this->logLine($logHandle, 'Compiled SQL not found at expected path: ' . $compiledPath);
            fclose($logHandle);
            return [
                'ok' => false,
                'message' => 'Compiled SQL not found. Run scripts/extract_sql_from_md.sh and verify writable/aiops/artifacts/db-apply-docs/compiled_adjustments.sql exists.',
                'log_path' => $logPath,
            ];
        }

        $this->logLine($logHandle, 'Compiled SQL: ' . $compiledPath);
        if ($dryRun) {
            $this->logLine($logHandle, 'Dry-run enabled. No SQL executed.');
            fclose($logHandle);
            return [
                'ok' => true,
                'executed' => 0,
                'dry_run' => true,
                'log_path' => $logPath,
                'compiled_path' => $compiledPath,
            ];
        }

        $dbConfig = config('Database');
        $groupConfig = $dbConfig->{$dbGroup} ?? null;
        if (! $groupConfig) {
            $this->logLine($logHandle, 'Database group not found: ' . $dbGroup);
            fclose($logHandle);
            return [
                'ok' => false,
                'message' => 'Database group not found.',
                'log_path' => $logPath,
            ];
        }

        $hostname = $groupConfig['hostname'] ?? $groupConfig->hostname ?? 'localhost';
        $hostname = $this->normalizeHostname($hostname);
        $username = $groupConfig['username'] ?? $groupConfig->username ?? '';
        $password = $groupConfig['password'] ?? $groupConfig->password ?? '';
        $database = $groupConfig['database'] ?? $groupConfig->database ?? '';
        $port = (int) ($groupConfig['port'] ?? $groupConfig->port ?? 3306);

        $mysqli = new \mysqli();
        if (defined('MYSQLI_OPT_PROTOCOL') && defined('MYSQLI_PROTOCOL_TCP')) {
            $mysqli->options(MYSQLI_OPT_PROTOCOL, MYSQLI_PROTOCOL_TCP);
        }
        $mysqli->real_connect($hostname, $username, $password, $database, $port);

        if ($mysqli->connect_errno) {
            $this->logLine($logHandle, 'MySQL connect error: ' . $mysqli->connect_error);
            fclose($logHandle);
            return [
                'ok' => false,
                'message' => 'MySQL connection failed.',
                'log_path' => $logPath,
            ];
        }

        $this->mysqli = $mysqli;
        $mysqli->set_charset('utf8mb4');
        $this->ensureAuditTable($mysqli, $logHandle);

        $sqlContents = file_get_contents($compiledPath) ?: '';
        $statements = $this->splitStatements($sqlContents);

        $executed = 0;
        foreach ($statements as $statement) {
            $trimmed = trim($statement);
            if ($trimmed === '') {
                continue;
            }

            $analysis = $this->analyzeStatement($trimmed);
            if ($analysis['skip'] ?? false) {
                $this->logLine($logHandle, $analysis['message'] ?? 'Statement skipped.');
                continue;
            }

            if (! $mysqli->query($trimmed)) {
                $this->logLine($logHandle, 'SQL error: ' . $mysqli->error);
                $this->logLine($logHandle, 'Statement: ' . $trimmed);
                break;
            }

            $executed++;
            $this->logLine($logHandle, 'Executed statement.');
            $this->logWarnings($mysqli, $logHandle);

            if (! empty($analysis['operation']) && ! empty($analysis['table'])) {
                $this->insertAuditRow($mysqli, $analysis['operation'], $analysis['table'], $trimmed, $logHandle);
            }
        }

        $this->logLine($logHandle, "db:apply-docs finished. Statements executed: {$executed}");
        fclose($logHandle);

        return [
            'ok' => true,
            'executed' => $executed,
            'dry_run' => false,
            'log_path' => $logPath,
            'compiled_path' => $compiledPath,
        ];
    }

    private function normalizeHostname(string $hostname): string
    {
        $parsed = parse_url($hostname);
        if ($parsed !== false && isset($parsed['host'])) {
            return $parsed['host'];
        }

        return $hostname;
    }

    private function logLine($handle, string $message): void
    {
        $line = sprintf('[%s] %s%s', date('Y-m-d H:i:s'), $message, PHP_EOL);
        fwrite($handle, $line);
    }

    private function splitStatements(string $sql): array
    {
        $statements = [];
        $buffer = '';
        $inString = false;
        $stringChar = '';
        $length = strlen($sql);

        for ($i = 0; $i < $length; $i++) {
            $char = $sql[$i];
            $next = $sql[$i + 1] ?? '';

            if ($inString) {
                if ($char === $stringChar && $sql[$i - 1] !== '\\') {
                    $inString = false;
                    $stringChar = '';
                }
                $buffer .= $char;
                continue;
            }

            if ($char === '"' || $char === '\'') {
                $inString = true;
                $stringChar = $char;
                $buffer .= $char;
                continue;
            }

            if ($char === '-' && $next === '-') {
                while ($i < $length && $sql[$i] !== "\n") {
                    $buffer .= $sql[$i];
                    $i++;
                }
                continue;
            }

            if ($char === ';') {
                $statements[] = $buffer;
                $buffer = '';
                continue;
            }

            $buffer .= $char;
        }

        if (trim($buffer) !== '') {
            $statements[] = $buffer;
        }

        return $statements;
    }

    private function analyzeStatement(string $statement): array
    {
        $analysis = [
            'operation' => null,
            'table'     => null,
            'skip'      => false,
        ];

        if (preg_match('/^CREATE\s+TABLE\s+(IF\s+NOT\s+EXISTS\s+)?`?([a-zA-Z0-9_]+)`?/i', $statement, $matches)) {
            $table = $matches[2];
            $analysis['operation'] = 'CREATE';
            $analysis['table'] = $table;
            if ($this->tableExists($table)) {
                $analysis['skip'] = true;
                $analysis['message'] = "Table {$table} already exists. Skipping.";
            }
        }

        if (preg_match('/^ALTER\s+TABLE\s+`?([a-zA-Z0-9_]+)`?\s+ADD\s+COLUMN\s+`?([a-zA-Z0-9_]+)`?/i', $statement, $matches)) {
            $table = $matches[1];
            $column = $matches[2];
            $analysis['operation'] = 'ALTER';
            $analysis['table'] = $table;
            if ($this->columnExists($table, $column)) {
                $analysis['skip'] = true;
                $analysis['message'] = "Column {$table}.{$column} already exists. Skipping.";
            }
        }

        if (preg_match('/^ALTER\s+TABLE\s+`?([a-zA-Z0-9_]+)`?\s+ADD\s+(UNIQUE\s+)?INDEX\s+`?([a-zA-Z0-9_]+)`?/i', $statement, $matches)) {
            $table = $matches[1];
            $index = $matches[3];
            $analysis['operation'] = 'ALTER';
            $analysis['table'] = $table;
            if ($this->indexExists($table, $index)) {
                $analysis['skip'] = true;
                $analysis['message'] = "Index {$table}.{$index} already exists. Skipping.";
            }
        }

        if (! $analysis['operation'] && preg_match('/^ALTER\s+TABLE\s+`?([a-zA-Z0-9_]+)`?/i', $statement, $matches)) {
            $analysis['operation'] = 'ALTER';
            $analysis['table'] = $matches[1];
        }

        return $analysis;
    }

    private function tableExists(string $table): bool
    {
        $escapedTable = $this->escape($table);
        $sql = "SELECT COUNT(*) as count FROM information_schema.tables WHERE table_schema = DATABASE() AND table_name = '{$escapedTable}'";
        return $this->scalarCount($sql) > 0;
    }

    private function columnExists(string $table, string $column): bool
    {
        $escapedTable = $this->escape($table);
        $escapedColumn = $this->escape($column);
        $sql = "SELECT COUNT(*) as count FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = '{$escapedTable}' AND column_name = '{$escapedColumn}'";
        return $this->scalarCount($sql) > 0;
    }

    private function indexExists(string $table, string $index): bool
    {
        $escapedTable = $this->escape($table);
        $escapedIndex = $this->escape($index);
        $sql = "SELECT COUNT(*) as count FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = '{$escapedTable}' AND index_name = '{$escapedIndex}'";
        return $this->scalarCount($sql) > 0;
    }

    private function ensureAuditTable(\mysqli $mysqli, $logHandle): void
    {
        $escapedTable = $mysqli->real_escape_string('bf_ops_schema_audit');
        $exists = $this->scalarCount("SELECT COUNT(*) AS count FROM information_schema.tables WHERE table_schema = DATABASE() AND table_name = '{$escapedTable}'");
        if ($exists > 0) {
            return;
        }

        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS bf_ops_schema_audit (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  operation VARCHAR(16) NOT NULL,
  table_name VARCHAR(64) NOT NULL,
  sql_hash CHAR(64) NOT NULL,
  applied_by VARCHAR(64) NOT NULL,
  applied_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  source VARCHAR(64) DEFAULT 'db:apply-docs'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL;

        if (! $mysqli->query($sql)) {
            $this->logLine($logHandle, 'Failed to create audit table: ' . $mysqli->error);
        }
    }

    private function insertAuditRow(\mysqli $mysqli, string $operation, string $table, string $statement, $logHandle): void
    {
        $sqlHash = hash('sha256', $statement);
        $appliedBy = getenv('USER') ?: 'codex';
        $source = 'db:apply-docs';

        $stmt = $mysqli->prepare('INSERT INTO bf_ops_schema_audit (operation, table_name, sql_hash, applied_by, source) VALUES (?, ?, ?, ?, ?)');
        if (! $stmt) {
            $this->logLine($logHandle, 'Failed to prepare audit insert: ' . $mysqli->error);
            return;
        }

        $stmt->bind_param('sssss', $operation, $table, $sqlHash, $appliedBy, $source);
        if (! $stmt->execute()) {
            $this->logLine($logHandle, 'Failed to insert audit row: ' . $stmt->error);
        }
        $stmt->close();
    }

    private function logWarnings(\mysqli $mysqli, $logHandle): void
    {
        if ($mysqli->warning_count === 0) {
            return;
        }

        $result = $mysqli->query('SHOW WARNINGS');
        if (! $result) {
            return;
        }

        while ($row = $result->fetch_assoc()) {
            $this->logLine($logHandle, sprintf('Warning: %s', json_encode($row)));
        }
    }

    private function scalarCount(string $sql): int
    {
        if (! $this->mysqli) {
            return 0;
        }
        $result = $this->mysqli->query($sql);
        if (! $result) {
            return 0;
        }
        $row = $result->fetch_assoc();
        return (int) ($row['count'] ?? 0);
    }

    private function escape(string $value): string
    {
        if (! $this->mysqli) {
            return $value;
        }
        return $this->mysqli->real_escape_string($value);
    }
}
