<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use App\Services\AIOps\CommandHookService;
use App\Services\Spark\CommandInventoryService;
use CodeIgniter\CLI\CLI;

class CopilotValidate extends SafeBaseCommand
{
    protected $group       = 'AIOps - Audit';
    protected $name        = 'aiops:copilot:validate';
    protected $description = 'Validate copilot instructions and Spark command safety rules.';
    protected $usage       = 'aiops:copilot:validate [--json] [--notify] [--db]';
    protected $options     = [
        '--json' => 'Emit JSON output to stdout',
        '--notify' => 'Send summary notification via Discord or email',
        '--db' => 'Store JSON snapshot in aiops_command_snapshots table',
        '--ci' => 'Force CI-safe mode (no external network or DB persistence)',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $jsonMode = isset($flags['json']);
        $ciMode = isset($flags['ci']) || $this->isCiRuntime();
        $notify = isset($flags['notify']) || isset($flags['notify=discord']);
        $storeDb = isset($flags['db']);

        $sections = $this->validateCopilotSections();
        $commandReport = $this->validateCommandRules();

        $summary = [
            'missing_sections' => count($sections['missing']),
            'command_violations' => count($commandReport['violations']),
            'total_commands' => $commandReport['total'],
        ];

        $payload = [
            'generated_at' => date('c'),
            'summary' => $summary,
            'sections' => $sections,
            'commands' => $commandReport,
        ];

        $this->renderSectionTable($sections);
        $this->renderCommandTable($commandReport['violations']);
        $this->writeSnapshot($payload);

        if ($jsonMode) {
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        }

        if ($storeDb && ! $ciMode) {
            $this->storeSnapshot($payload);
        } elseif ($storeDb && $ciMode) {
            CLI::write('CI mode: skipping database snapshot persistence.', 'yellow');
        }

        if ($notify && ! $ciMode) {
            $hook = new CommandHookService();
            $hook->notify(
                'Copilot Validation',
                $this->buildSummaryMessage($summary),
                $payload
            );
        } elseif ($notify && $ciMode) {
            CLI::write('CI mode: skipping external notification.', 'yellow');
        }

        if ($ciMode) {
            return EXIT_SUCCESS;
        }

        if ($summary['missing_sections'] > 0 || $summary['command_violations'] > 0) {
            return EXIT_ERROR;
        }

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    private function validateCopilotSections(): array
    {
        $path = ROOTPATH . '.github/copilot-instructions.md';
        $contents = @file_get_contents($path);

        $required = [
            'Overview',
            'Architecture',
            'Developer Workflows',
            'Project-Specific Conventions',
            'Integration Points',
            'Communication Patterns',
        ];

        if ($contents === false) {
            return [
                'path' => $path,
                'required' => $required,
                'missing' => $required,
                'status' => 'missing-file',
            ];
        }

        $missing = [];
        foreach ($required as $section) {
            if (! preg_match('/^##\s+' . preg_quote($section, '/') . '\s*$/m', $contents)) {
                $missing[] = $section;
            }
        }

        return [
            'path' => $path,
            'required' => $required,
            'missing' => $missing,
            'status' => $missing === [] ? 'ok' : 'missing-sections',
        ];
    }

    private function validateCommandRules(): array
    {
        $scanner = new CommandInventoryService();
        $commands = $scanner->scan(ROOTPATH . 'app/Commands');
        $violations = [];

        foreach ($commands as $command) {
            $issues = [];

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

            $meta = $command['metadata'];
            if ($meta['name'] === null || $meta['group'] === null || $meta['description'] === null) {
                $issues[] = 'Missing $name, $group, or $description.';
            }

            foreach ($command['violations'] as $violation) {
                $issues[] = $violation;
            }

            if ($issues !== []) {
                $violations[] = [
                    'command' => $meta['name'] ?? $command['class'],
                    'class' => $command['class'],
                    'file' => $this->relativePath($command['file']),
                    'issues' => $issues,
                ];
            }
        }

        return [
            'total' => count($commands),
            'violations' => $violations,
        ];
    }

    private function renderSectionTable(array $sections): void
    {
        CLI::write('Copilot Instructions', 'yellow');

        $rows = [];
        foreach ($sections['required'] as $section) {
            $rows[] = [
                $section,
                in_array($section, $sections['missing'], true) ? 'MISSING' : 'OK',
            ];
        }

        $this->renderTable(['Section', 'Status'], $rows);
    }

    /**
     * @param array<int, array<string, mixed>> $violations
     */
    private function renderCommandTable(array $violations): void
    {
        if ($violations === []) {
            CLI::write('✅ All Spark commands comply with copilot rules.', 'green');
            return;
        }

        CLI::write('Command Violations', 'red');

        $rows = [];
        foreach ($violations as $entry) {
            $rows[] = [
                $entry['command'],
                $entry['file'],
                implode('; ', $entry['issues']),
            ];
        }

        $this->renderTable(['Command', 'File', 'Issues'], $rows);
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

    private function relativePath(string $path): string
    {
        $root = rtrim(ROOTPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        if (str_starts_with($path, $root)) {
            return ltrim(substr($path, strlen($root)), DIRECTORY_SEPARATOR);
        }

        return $path;
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
            'Copilot validation complete. Missing sections: %d. Command violations: %d of %d.',
            $summary['missing_sections'],
            $summary['command_violations'],
            $summary['total_commands']
        );
    }

    private function writeSnapshot(array $payload): void
    {
        $directory = ROOTPATH . 'docs/aiops';
        if (! is_dir($directory)) {
            @mkdir($directory, 0775, true);
        }

        $path = $directory . '/copilot-validation.json';
        file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    // Call to undefined method CopilotValidate::isCiRuntime()
    // Root Cause
    // Method expected but not implemented or trait not imported.
    protected function isCiRuntime(): bool
    {
        return defined('CI_ENVIRONMENT');
    }

}
