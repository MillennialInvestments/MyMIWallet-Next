<?php

declare(strict_types=1);

namespace App\Commands\Codex;

use App\Commands\Ops\Support\CommandRulesScanner;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ReviewPublish extends SafeBaseCommand
{
    protected $group       = 'Codex';
    protected $name        = 'codex:review:publish';
    protected $description = 'Aggregate governance lint results and publish review artifacts.';
    protected $usage       = 'codex:review:publish [--dry-run]';

    protected $options = [
        '--dry-run' => 'Preview payloads without writing artifacts',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $filesystem = $this->loadFilesystemLint();
        $commands = $this->loadCommandsAudit();

        $blockingErrors = ($filesystem['summary']['error'] ?? 0) > 0;
        $timestamp = date('c');

        $payload = [
            'timestamp' => $timestamp,
            'blocking_errors' => $blockingErrors,
            'summary' => [
                'filesystem' => [
                    'error' => $filesystem['summary']['error'] ?? 0,
                    'warning' => $filesystem['summary']['warning'] ?? 0,
                ],
                'commands' => [
                    'violations' => $commands['violations'],
                ],
            ],
            'files' => array_values(array_unique(array_merge($filesystem['files'], $commands['files']))),
        ];

        if ($dryRun) {
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), 'blue');
            return EXIT_SUCCESS;
        }

        $json = json_encode(
            $payload,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
        );

        if (! is_string($json)) {
            CLI::error('Unable to encode review publish payload: ' . json_last_error_msg());
            return EXIT_ERROR;
        }

        $dashboard = $this->renderDashboard($filesystem, $commands, $timestamp);

        $dir = ROOTPATH . 'docs/_codex/reviews';
        $this->ensureDir($dir);

        $artifactPath = $dir . '/review-publish.json';
        $dashboardPath = $dir . '/CODEX_REVIEW.md';

        $ciDir = WRITEPATH . 'aiops/artifacts/review-publish';
        $this->ensureDir($ciDir);

        $latestPath = $ciDir . '/latest.json';
        $ciDashboardPath = $ciDir . '/CODEX_REVIEW.md';

        $writes = [
            $artifactPath => $json . PHP_EOL,
            $dashboardPath => $dashboard,
            $latestPath => $json . PHP_EOL,
            $ciDashboardPath => $dashboard,
        ];

        foreach ($writes as $path => $content) {
            if (file_put_contents($path, $content) === false) {
                CLI::error('Unable to write review publish artifact: ' . $path);
                return EXIT_ERROR;
            }
        }

        CLI::write('Review publish artifacts written.', 'green');
        CLI::write('JSON: ' . $artifactPath);
        CLI::write('Dashboard: ' . $dashboardPath);
        CLI::write('CI latest JSON: ' . $latestPath);

        return EXIT_SUCCESS;
    }

    private function loadFilesystemLint(): array
    {
        $paths = [
            ROOTPATH . 'docs/_ops/filesystem-lint.json',
            WRITEPATH . 'aiops/artifacts/review-publish/filesystem.json',
            ROOTPATH . 'docs/_codex/reviews/filesystem.json',
            ROOTPATH . 'filesystem.json',
        ];

        $data = null;
        foreach ($paths as $path) {
            if (! is_file($path)) {
                continue;
            }
            $raw = file_get_contents($path);
            if ($raw === false || trim($raw) === '') {
                continue;
            }
            $decoded = json_decode($raw, true);
            if (is_array($decoded)) {
                $data = $decoded;
                break;
            }
        }

        if (! is_array($data)) {
            return [
                'summary' => ['error' => 0, 'warning' => 0],
                'files' => [],
                'issues' => [],
            ];
        }

        $issues = $data['issues'] ?? [];
        $summary = $data['severity_summary'] ?? ['error' => 0, 'warning' => 0];
        $files = array_values(array_unique(array_map(
            static fn (array $issue): string => $issue['file'] ?? 'unknown',
            is_array($issues) ? $issues : []
        )));

        return [
            'summary' => [
                'error' => (int) ($summary['error'] ?? 0),
                'warning' => (int) ($summary['warning'] ?? 0),
            ],
            'files' => $files,
            'issues' => $issues,
        ];
    }

    private function loadCommandsAudit(): array
    {
        $scanner = new CommandRulesScanner();
        $violations = $scanner->scan(ROOTPATH . 'app/Commands');
        $files = array_values(array_unique(array_map(
            fn (array $entry): string => $this->relativePath($entry['file'] ?? ''),
            $violations
        )));

        return [
            'violations' => count($violations),
            'files' => $files,
        ];
    }

    private function renderDashboard(array $filesystem, array $commands, string $timestamp): string
    {
        $fsIssues = is_array($filesystem['issues'] ?? null) ? $filesystem['issues'] : [];
        $byFile = [];
        foreach ($fsIssues as $issue) {
            $file = $issue['file'] ?? 'unknown';
            $severity = $issue['severity'] ?? 'warning';
            if (! isset($byFile[$file])) {
                $byFile[$file] = ['error' => 0, 'warning' => 0];
            }
            $byFile[$file][$severity] = ($byFile[$file][$severity] ?? 0) + 1;
        }

        $lines = [
            '# Remediation Dashboard',
            '',
            'Generated: ' . $timestamp,
            '',
            '## Summary',
            '',
            '| Area | Errors | Warnings |',
            '| --- | --- | --- |',
            sprintf('| Filesystem Lint | %d | %d |', $filesystem['summary']['error'] ?? 0, $filesystem['summary']['warning'] ?? 0),
            sprintf('| Commands Audit | %d | 0 |', $commands['violations'] ?? 0),
            '',
            '## Filesystem Issues by Command',
            '',
        ];

        if ($byFile === []) {
            $lines[] = '- No filesystem violations detected.';
        } else {
            $lines[] = '| Command File | Errors | Warnings | Issue Link |';
            $lines[] = '| --- | --- | --- | --- |';
            foreach ($byFile as $file => $counts) {
                $commandName = pathinfo($file, PATHINFO_FILENAME);
                $lines[] = sprintf(
                    '| %s | %d | %d | TODO: add GitHub issue link for %s |',
                    $file,
                    $counts['error'] ?? 0,
                    $counts['warning'] ?? 0,
                    $commandName
                );
            }
        }

        $lines[] = '';
        $lines[] = '## Suggested Next Actions';
        $lines[] = '- Address filesystem errors first; they block CI merges.';
        $lines[] = '- Review warnings for missing ROOTPATH anchors and consolidate write targets.';
        $lines[] = '- After fixes, re-run `php spark ops:filesystem:lint --json` and `php spark codex:review:publish`.';

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function ensureDir(string $dir): void
    {
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
    }

    private function relativePath(string $path): string
    {
        $root = rtrim(ROOTPATH, '/\\') . DIRECTORY_SEPARATOR;
        if ($path !== '' && str_starts_with($path, $root)) {
            return ltrim(substr($path, strlen($root)), '/\\');
        }

        return $path;
    }
}
