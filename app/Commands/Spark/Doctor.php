<?php

declare(strict_types=1);

namespace App\Commands\Spark;

use App\Commands\SafeBaseCommand;
use App\Services\AIOps\CommandHookService;
use App\Services\Spark\CommandInventoryService;
use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\Commands;

class Doctor extends SafeBaseCommand
{
    protected $group       = 'Spark';
    protected $name        = 'spark:doctor';
    protected $description = 'System health inspector for Spark commands.';
    protected $usage       = 'spark:doctor [--json] [--notify] [--db]';
    protected $options     = [
        '--json' => 'Emit JSON output to stdout',
        '--notify' => 'Send summary notification via Discord or email',
        '--db' => 'Store JSON snapshot in aiops_command_snapshots table',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $jsonMode = isset($flags['json']);
        $notify = isset($flags['notify']) || isset($flags['notify=discord']);
        $storeDb = isset($flags['db']);

        $scanner = new CommandInventoryService();
        $commands = $scanner->scan(ROOTPATH . 'app/Commands');

        $registry = Commands::getCommands();
        $registeredNames = array_keys($registry);
        $registeredClasses = array_flip(array_values($registry));

        $commandIssues = [];
        foreach ($commands as $command) {
            $issues = [];
            $meta = $command['metadata'];

            if ($meta['name'] === null || $meta['group'] === null || $meta['description'] === null) {
                $issues[] = 'Missing $name, $group, or $description.';
            }

            if (! $command['uses_safe_base']) {
                $issues[] = 'Does not extend SafeBaseCommand.';
            }

            if (! $command['psr4']['ok']) {
                $issues[] = sprintf(
                    'PSR-4 mismatch (expected %s\\%s).',
                    $command['psr4']['expected_namespace'],
                    $command['psr4']['expected_class']
                );
            }

            foreach ($command['violations'] as $violation) {
                $issues[] = $violation;
            }

            if ($meta['name'] !== null && ! in_array($meta['name'], $registeredNames, true)) {
                $issues[] = 'Command name not registered in Spark.';
            }

            if ($issues !== []) {
                $commandIssues[] = [
                    'command' => $meta['name'] ?? $command['class'],
                    'file' => $this->relativePath($command['file']),
                    'issues' => $issues,
                ];
            }
        }

        $registryIssues = [];
        foreach ($registry as $name => $class) {
            if (! str_starts_with($class, 'App\\')) {
                continue;
            }

            if (! isset($registeredClasses[$class])) {
                continue;
            }

            if (! class_exists($class)) {
                $registryIssues[] = [
                    'command' => $name,
                    'issue' => 'Registered class not found at runtime.',
                ];
            }
        }

        $filesystemChecks = $this->checkFilesystem();
        $failureCount = $this->countFailures($commandIssues, $registryIssues, $filesystemChecks);

        $payload = [
            'generated_at' => date('c'),
            'summary' => [
                'commands_scanned' => count($commands),
                'command_issues' => count($commandIssues),
                'registry_issues' => count($registryIssues),
                'filesystem_issues' => $filesystemChecks['failures'],
                'failures' => $failureCount,
            ],
            'commands' => $commandIssues,
            'registry' => $registryIssues,
            'filesystem' => $filesystemChecks,
        ];

        $this->renderSummary($payload);
        $this->writeSnapshot($payload);

        if ($jsonMode) {
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        }

        if ($storeDb) {
            $this->storeSnapshot($payload);
        }

        if ($notify) {
            $hook = new CommandHookService();
            $hook->notify(
                'Spark Doctor Report',
                $this->buildSummaryMessage($payload['summary']),
                $payload
            );
        }

        return $failureCount > 0 ? EXIT_ERROR : EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    private function checkFilesystem(): array
    {
        $paths = [
            ROOTPATH . 'writable',
            ROOTPATH . 'writable/cache',
            ROOTPATH . 'writable/cache/FactoriesCache',
            ROOTPATH . 'writable/cache/FileLocatorCache',
            ROOTPATH . 'writable/logs',
        ];

        $checks = [];
        $failures = 0;

        foreach ($paths as $path) {
            $exists = file_exists($path);
            $writable = $exists ? is_writable($path) : false;
            $status = ($exists && $writable) ? 'ok' : 'fail';

            if ($status === 'fail') {
                $failures++;
            }

            $checks[] = [
                'path' => $this->relativePath($path),
                'exists' => $exists,
                'writable' => $writable,
                'status' => $status,
            ];
        }

        return [
            'checks' => $checks,
            'failures' => $failures,
        ];
    }

    private function countFailures(array $commandIssues, array $registryIssues, array $filesystem): int
    {
        return count($commandIssues) + count($registryIssues) + ($filesystem['failures'] ?? 0);
    }

    private function renderSummary(array $payload): void
    {
        CLI::write('Spark Doctor Summary', 'yellow');

        $summary = $payload['summary'];
        CLI::write(sprintf(
            'Commands scanned: %d | Command issues: %d | Registry issues: %d | Filesystem issues: %d',
            $summary['commands_scanned'],
            $summary['command_issues'],
            $summary['registry_issues'],
            $summary['filesystem_issues']
        ));

        if (! empty($payload['commands'])) {
            CLI::write('Command Issues', 'red');
            $rows = [];
            foreach ($payload['commands'] as $issue) {
                $rows[] = [
                    $issue['command'],
                    $issue['file'],
                    implode('; ', $issue['issues']),
                ];
            }
            $this->renderTable(['Command', 'File', 'Issues'], $rows);
        }

        if (! empty($payload['registry'])) {
            CLI::write('Registry Issues', 'red');
            $rows = [];
            foreach ($payload['registry'] as $issue) {
                $rows[] = [$issue['command'], $issue['issue']];
            }
            $this->renderTable(['Command', 'Issue'], $rows);
        }

        CLI::write('Filesystem Checks', 'yellow');
        $rows = [];
        foreach ($payload['filesystem']['checks'] as $check) {
            $rows[] = [
                $check['path'],
                $check['exists'] ? 'yes' : 'no',
                $check['writable'] ? 'yes' : 'no',
                $check['status'],
            ];
        }
        $this->renderTable(['Path', 'Exists', 'Writable', 'Status'], $rows);
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

    private function buildSummaryMessage(array $summary): string
    {
        return sprintf(
            'Spark Doctor complete. Command issues: %d. Registry issues: %d. Filesystem issues: %d.',
            $summary['command_issues'],
            $summary['registry_issues'],
            $summary['filesystem_issues']
        );
    }

    private function writeSnapshot(array $payload): void
    {
        $directory = ROOTPATH . 'docs/aiops';
        if (! is_dir($directory)) {
            @mkdir($directory, 0775, true);
        }

        $path = $directory . '/doctor.json';
        file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
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
