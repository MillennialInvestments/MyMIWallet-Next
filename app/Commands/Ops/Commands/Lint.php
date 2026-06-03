<?php

namespace App\Commands\Ops\Commands;

use App\Commands\SafeBaseCommand;
use App\Commands\Ops\Support\CommandRulesScanner;
use CodeIgniter\CLI\CLI;

class Lint extends SafeBaseCommand
{
    protected $group = 'ops';
    protected $name = 'ops:commands:lint';
    protected $description = 'Lint Spark commands for runtime safety contracts and documentation coverage.';
    protected $usage = 'ops:commands:lint [--json]';
    protected $options = [
        '--json' => 'Emit JSON results to stdout',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $scanner = new CommandRulesScanner();
        $entries = $scanner->scan(ROOTPATH . 'app/Commands');

        $docCommands = $this->loadDocumentedCommands();
        $results = [];

        foreach ($entries as $entry) {
            if ($entry['class'] === 'App\\Commands\\SafeBaseCommand') {
                continue;
            }

            $code = $this->readFile($entry['file']);
            if ($code === '') {
                continue;
            }

            $metadata = $this->extractMetadata($code);
            $name = $metadata['name'] ?? $entry['class'];

            $issues = [];

            if ($entry['illegal']) {
                $issues[] = 'Illegal constructor detected (must match SafeBaseCommand signature).';
            }

            if ($metadata['name'] === null || $metadata['group'] === null || $metadata['description'] === null) {
                $issues[] = 'Missing $name, $group, or $description metadata.';
            }

            if ($metadata['is_destructive'] && ! $metadata['has_approve']) {
                $issues[] = 'Destructive command missing --approve option.';
            }

            if ($metadata['is_destructive'] && ! $metadata['has_dry_run']) {
                $issues[] = 'Destructive command missing --dry-run option.';
            }

            if ($metadata['deprecated_api']) {
                $issues[] = 'Deprecated Spark CLI APIs detected ($this->option/getOption/getArgument).';
            }

            if ($metadata['php82_issues']) {
                $issues[] = 'Potential PHP 8.2 incompatibility (deprecated runtime APIs detected).';
            }

            if (! in_array($name, $docCommands, true)) {
                $issues[] = 'Missing documentation entry in docs/management/Command_Runtime_Audit.md.';
            }

            $results[] = [
                'command' => $name,
                'class' => $entry['class'],
                'file' => $this->relativePath($entry['file']),
                'status' => $issues === [] ? 'OK' : 'FAIL',
                'issues' => $issues,
            ];
        }

        $payload = [
            'generated_at' => date('c'),
            'total' => count($results),
            'failures' => count(array_filter($results, static fn(array $row) => $row['status'] === 'FAIL')),
            'results' => $results,
        ];

        $this->writeReport($payload);

        foreach ($results as $row) {
            $status = $row['status'] === 'OK' ? 'green' : 'red';
            CLI::write(sprintf('%s %s', $row['status'], $row['command']), $status);
            if ($row['status'] !== 'OK') {
                foreach ($row['issues'] as $issue) {
                    CLI::write('  - ' . $issue, 'yellow');
                }
            }
        }

        if (isset($flags['json'])) {
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT));
        }

        return $payload['failures'] > 0 ? EXIT_ERROR : EXIT_SUCCESS;
    }

    private function loadDocumentedCommands(): array
    {
        $path = ROOTPATH . 'docs/management/Command_Runtime_Audit.md';
        $contents = $this->readFile($path);
        if ($contents === '') {
            return [];
        }

        preg_match_all('/\\|\\s*`([^`]+)`\\s*\\|/', $contents, $matches);
        if (! isset($matches[1])) {
            return [];
        }

        return array_values(array_unique(array_map('trim', $matches[1])));
    }

    private function readFile(string $path): string
    {
        $contents = @file_get_contents($path);
        if ($contents === false) {
            return '';
        }

        return $contents;
    }

    private function extractMetadata(string $code): array
    {
        $name = $this->matchStringProperty($code, 'name');
        $group = $this->matchStringProperty($code, 'group');
        $description = $this->matchStringProperty($code, 'description');

        $hasDryRun = str_contains($code, '--dry-run');
        $hasApprove = str_contains($code, '--approve');

        $isDestructive = false;
        if (preg_match('/function\\s+isDestructive\\(\\)\\s*:\\s*bool\\s*\\{(.*?)\\}/s', $code, $match)) {
            $isDestructive = str_contains($match[1], 'return true');
        }

        $deprecatedApi = preg_match('/\\$this->(option|getOption|getArgument|argument)\\s*\\(/', $code) === 1;
        $php82Issues = preg_match('/\\b(each|create_function|split)\\s*\\(/', $code) === 1;

        return [
            'name' => $name,
            'group' => $group,
            'description' => $description,
            'has_dry_run' => $hasDryRun,
            'has_approve' => $hasApprove,
            'is_destructive' => $isDestructive,
            'deprecated_api' => $deprecatedApi,
            'php82_issues' => $php82Issues,
        ];
    }

    private function matchStringProperty(string $code, string $property): ?string
    {
        if (! preg_match('/protected\\s+\\$' . preg_quote($property, '/') . '\\s*=\\s*[\'"]([^\'"]+)[\'"]\\s*;/', $code, $matches)) {
            return null;
        }

        return $matches[1];
    }

    private function writeReport(array $payload): void
    {
        $directory = ROOTPATH . 'docs/next/bf_aiops_task_runs';
        if (! is_dir($directory)) {
            @mkdir($directory, 0775, true);
        }

        $path = $directory . '/commands_lint.json';
        file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT));
    }

    private function relativePath(string $path): string
    {
        $root = rtrim(ROOTPATH, DIRECTORY_SEPARATOR);
        if (str_starts_with($path, $root)) {
            $trimmed = substr($path, strlen($root));
            return ltrim($trimmed, DIRECTORY_SEPARATOR);
        }

        return $path;
    }
    private function shouldSkipCommandLint(string $file, string $source): bool
    {
        $normalized = str_replace('\\', '/', $file);

        if (preg_match('/abstract\s+class\s+/i', $source)) {
            return true;
        }

        if (preg_match('/interface\s+\w+/i', $source)) {
            return true;
        }

        if (preg_match('/trait\s+\w+/i', $source)) {
            return true;
        }

        if (str_ends_with($normalized, '/SafeBaseCommand.php')) {
            return true;
        }

        if (str_contains($normalized, '/Contracts/')) {
            return true;
        }

        if (str_contains($normalized, '/Traits/')) {
            return true;
        }

        if (str_contains($normalized, '/Support/')) {
            return true;
        }

        return false;
    }

}
