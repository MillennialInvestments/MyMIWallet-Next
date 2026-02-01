<?php

declare(strict_types=1);

namespace App\Commands;

use App\Services\AiOps\CommandHookService;
use App\Services\Spark\CommandInventoryService;
use CodeIgniter\CLI\CLI;

class SparkFix extends SafeBaseCommand
{
    protected $defaultDryRun = true;
    protected $group       = 'maintenance';
    protected $name        = 'spark:fix';
    protected $description = 'Safely repair Spark command and cache issues.';
    protected $usage       = 'spark:fix [--dry-run] [--approve] [--json] [--notify] [--db]';
    protected $options     = [
        '--dry-run' => 'Preview actions without modifying files (default)',
        '--approve' => 'Apply fixes and write updates',
        '--json' => 'Emit JSON output to stdout',
        '--notify' => 'Send summary notification via Discord or email',
        '--db' => 'Store JSON snapshot in aiops_command_snapshots table',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $approved = isset($flags['approve']);
        $jsonMode = isset($flags['json']);
        $notify = isset($flags['notify']) || isset($flags['notify=discord']);
        $storeDb = isset($flags['db']);

        if (! $approved) {
            $dryRun = true;
        }

        $scanner = new CommandInventoryService();
        $commands = $scanner->scan(ROOTPATH . 'app/Commands');

        $actions = [];
        $touched = [];
        foreach ($commands as $command) {
            $needsPsr4Fix = ! $command['psr4']['ok'];
            $meta = $command['metadata'];
            $needsMetaFix = $meta['name'] === null || $meta['group'] === null || $meta['description'] === null;

            if (! $needsPsr4Fix && ! $needsMetaFix) {
                continue;
            }

            $actions[] = [
                'type' => 'command',
                'file' => $this->relativePath($command['file']),
                'psr4_fix' => $needsPsr4Fix,
                'metadata_fix' => $needsMetaFix,
            ];

            if ($dryRun) {
                continue;
            }

            $updated = $this->applyCommandFixes($command, $needsPsr4Fix, $needsMetaFix);
            if ($updated) {
                $touched[] = $command['file'];
            }
        }

        $cacheActions = $this->repairCacheDirectories($dryRun);
        $actions = array_merge($actions, $cacheActions);

        if (! $dryRun) {
            $actions[] = [
                'type' => 'autoload',
                'action' => 'cache:clear',
                'status' => $this->clearAutoloadCache(),
            ];
        } else {
            $actions[] = [
                'type' => 'autoload',
                'action' => 'cache:clear',
                'status' => 'dry-run',
            ];
        }

        $suggestions = [];
        if (! $dryRun && $touched !== []) {
            $suggestions[] = 'Run composer dump-autoload if class names or namespaces changed.';
        }

        $payload = [
            'generated_at' => date('c'),
            'dry_run' => $dryRun,
            'actions' => $actions,
            'suggestions' => $suggestions,
        ];

        $this->renderActions($payload);

        if ($jsonMode) {
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        }

        if ($storeDb) {
            $this->storeSnapshot($payload);
        }

        if ($notify) {
            $hook = new CommandHookService();
            $hook->notify(
                'Spark Fix Report',
                $this->buildSummaryMessage($payload),
                $payload
            );
        }

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return true;
    }

    private function applyCommandFixes(array $command, bool $fixPsr4, bool $fixMetadata): bool
    {
        $path = $command['file'];
        $contents = @file_get_contents($path);
        if ($contents === false) {
            CLI::error("Unable to read {$path}");
            return false;
        }

        $updated = $contents;

        if ($fixPsr4) {
            $expectedNamespace = $command['psr4']['expected_namespace'];
            $expectedClass = $command['psr4']['expected_class'];

            if (preg_match('/namespace\s+([^;]+);/', $updated)) {
                $updated = preg_replace('/namespace\s+([^;]+);/', 'namespace ' . $expectedNamespace . ';', $updated, 1);
            } else {
                $updated = preg_replace('/^<\?php\s*/', "<?php\n\nnamespace {$expectedNamespace};\n\n", $updated, 1);
            }

            $updated = preg_replace(
                '/class\s+([A-Za-z0-9_]+)\s+extends\s+([A-Za-z0-9_\\\\]+)/',
                'class ' . $expectedClass . ' extends $2',
                $updated,
                1
            );
        }

        if ($fixMetadata) {
            $updated = $this->ensureMetadata($updated, $command['class']);
        }

        if ($updated === $contents) {
            return false;
        }

        return file_put_contents($path, $updated) !== false;
    }

    private function ensureMetadata(string $code, string $className): string
    {
        if (preg_match('/\$name\s*=\s*.+;/', $code)
            && preg_match('/\$group\s*=\s*.+;/', $code)
            && preg_match('/\$description\s*=\s*.+;/', $code)
        ) {
            return $code;
        }

        $defaults = $this->defaultMetadata($className);
        $inserts = [];

        if (! preg_match('/\$name\s*=\s*.+;/', $code)) {
            $inserts[] = "    protected \$name = '{$defaults['name']}';";
        }

        if (! preg_match('/\$group\s*=\s*.+;/', $code)) {
            $inserts[] = "    protected \$group = '{$defaults['group']}';";
        }

        if (! preg_match('/\$description\s*=\s*.+;/', $code)) {
            $inserts[] = "    protected \$description = '{$defaults['description']}';";
        }

        if ($inserts === []) {
            return $code;
        }

        $insertBlock = implode("\n", $inserts) . "\n";

        return preg_replace(
            '/class\s+[^\n{]+\{\s*/',
            "$0\n{$insertBlock}",
            $code,
            1
        );
    }

    private function defaultMetadata(string $className): array
    {
        $short = $className;
        if (str_contains($className, '\\')) {
            $parts = explode('\\', $className);
            $short = end($parts);
        }

        $kebab = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $short));

        return [
            'name' => "app:{$kebab}",
            'group' => 'app',
            'description' => 'TODO: add command description',
        ];
    }

    /**
     * @return array<int, array<string, string>>
     */
    private function repairCacheDirectories(bool $dryRun): array
    {
        $paths = [
            ROOTPATH . 'writable/cache',
            ROOTPATH . 'writable/cache/FactoriesCache',
            ROOTPATH . 'writable/logs',
        ];

        $actions = [];

        foreach ($paths as $path) {
            $exists = is_dir($path);
            if ($exists) {
                $actions[] = [
                    'type' => 'filesystem',
                    'path' => $this->relativePath($path),
                    'status' => 'ok',
                ];
                continue;
            }

            if ($dryRun) {
                $actions[] = [
                    'type' => 'filesystem',
                    'path' => $this->relativePath($path),
                    'status' => 'dry-run',
                ];
                continue;
            }

            $ok = @mkdir($path, 0775, true);
            $actions[] = [
                'type' => 'filesystem',
                'path' => $this->relativePath($path),
                'status' => $ok ? 'created' : 'failed',
            ];
        }

        return $actions;
    }

    private function clearAutoloadCache(): string
    {
        $file = ROOTPATH . 'writable/cache/FileLocatorCache';
        if (file_exists($file)) {
            @unlink($file);
        }

        $this->runSparkCommand('cache:clear');

        return 'cleared';
    }

    private function renderActions(array $payload): void
    {
        CLI::write('Spark Fix Actions', 'yellow');
        CLI::write($payload['dry_run'] ? 'Dry-run mode (no changes applied).' : 'Changes applied.', $payload['dry_run'] ? 'yellow' : 'green');

        $rows = [];
        foreach ($payload['actions'] as $action) {
            $rows[] = [
                $action['type'],
                $action['file'] ?? ($action['path'] ?? $action['action'] ?? 'n/a'),
                $action['status'] ?? ($action['psr4_fix'] || $action['metadata_fix'] ? 'pending' : 'ok'),
            ];
        }

        $this->renderTable(['Type', 'Target', 'Status'], $rows);

        if ($payload['suggestions'] !== []) {
            CLI::newLine();
            CLI::write('Suggestions', 'yellow');
            foreach ($payload['suggestions'] as $suggestion) {
                CLI::write('- ' . $suggestion);
            }
        }
    }

    private function renderTable(array $headers, array $rows): void
    {
        $widths = array_map('strlen', $headers);
        foreach ($rows as $row) {
            foreach ($row as $index => $cell) {
                $widths[$index] = max($widths[$index], strlen((string) $cell));
            }
        }

        $divider = '';
        foreach ($widths as $width) {
            $divider .= str_repeat('-', $width + 2);
        }

        $line = '';
        foreach ($headers as $index => $header) {
            $line .= ' ' . str_pad($header, $widths[$index]) . ' ';
        }

        CLI::write($line, 'white');
        CLI::write($divider, 'white');

        foreach ($rows as $row) {
            $rowLine = '';
            foreach ($row as $index => $cell) {
                $rowLine .= ' ' . str_pad((string) $cell, $widths[$index]) . ' ';
            }
            CLI::write($rowLine);
        }
    }

    private function storeSnapshot(array $payload): void
    {
        $db = db_connect();
        $table = 'aiops_command_snapshots';

        $db->query(
            'CREATE TABLE IF NOT EXISTS ' . $table . ' (' .
            'id INT AUTO_INCREMENT PRIMARY KEY,' .
            'command_name VARCHAR(190) NOT NULL,' .
            'payload LONGTEXT NOT NULL,' .
            'created_at DATETIME NOT NULL' .
            ')'
        );

        $db->table($table)->insert([
            'command_name' => $this->name,
            'payload' => json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    private function buildSummaryMessage(array $payload): string
    {
        return sprintf(
            'Spark Fix complete. Actions: %d. Dry-run: %s.',
            count($payload['actions']),
            $payload['dry_run'] ? 'yes' : 'no'
        );
    }

    private function relativePath(string $path): string
    {
        $root = rtrim(ROOTPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        if (str_starts_with($path, $root)) {
            return ltrim(substr($path, strlen($root)), DIRECTORY_SEPARATOR);
        }

        return $path;
    }
}
