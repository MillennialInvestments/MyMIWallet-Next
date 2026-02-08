<?php

declare(strict_types=1);

namespace App\Commands\Logs;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SummarizeAll extends SafeBaseCommand
{
    protected $group = 'logs';
    protected $name = 'logs:summarize-all';
    protected $description = 'Summarize logs for all known subsystems from writable/logs/** and emit docs/_aiops/logs markdown reports.';
    protected $usage = 'logs:summarize-all [--json]';
    protected $options = [
        '--json' => 'Print JSON output in addition to files.',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $date = date('Y-m-d');
        $baseDir = ROOTPATH . 'writable/logs';
        $outDir = ROOTPATH . 'docs/_aiops/logs';
        @mkdir($outDir, 0775, true);

        $sources = [
            'codeigniter-app' => $this->globFiles($baseDir . '/log-*.php'),
            'codeigniter-cli' => $this->globFiles($baseDir . '/cli-*.log'),
            'chat' => $this->globFiles($baseDir . '/chat/*.log'),
            'aiops' => $this->globFiles($baseDir . '/aiops/*.log'),
            'n8n' => $this->globFiles($baseDir . '/n8n/*.log'),
            'node-bridges' => $this->globFiles($baseDir . '/bridges/*.log'),
            'workers-cron' => $this->globFiles($baseDir . '/workers/*.log'),
        ];

        $missing = [];
        $subsystemSummaries = [];
        foreach ($sources as $name => $files) {
            if (empty($files)) {
                $missing[] = $name;
            }
            $subsystemSummaries[$name] = $this->summarizeSubsystem($name, $files);
        }

        foreach ($subsystemSummaries as $name => $summary) {
            $file = $outDir . '/subsystem-' . $name . '.md';
            file_put_contents($file, $this->renderSubsystemMarkdown($summary));
        }

        file_put_contents(
            $outDir . '/summary-' . $date . '.md',
            $this->renderGlobalMarkdown($date, $subsystemSummaries, $missing)
        );

        $payload = [
            'ok' => true,
            'date' => $date,
            'output_dir' => str_replace(ROOTPATH, '', $outDir),
            'missing_sources' => $missing,
            'subsystems' => $subsystemSummaries,
        ];

        if (isset($flags['json'])) {
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        } else {
            CLI::write('logs:summarize-all completed for ' . $date, 'green');
            CLI::write('Output: docs/_aiops/logs/summary-' . $date . '.md');
            if (!empty($missing)) {
                CLI::write('Missing sources: ' . implode(', ', $missing), 'yellow');
            }
        }

        return EXIT_SUCCESS;
    }

    private function globFiles(string $pattern): array
    {
        $files = glob($pattern) ?: [];
        sort($files);

        return $files;
    }

    private function summarizeSubsystem(string $name, array $files): array
    {
        $lineCount = 0;
        $errorCount = 0;
        $warningCount = 0;
        $latestTs = null;

        foreach ($files as $file) {
            $lines = @file($file, FILE_IGNORE_NEW_LINES) ?: [];
            $lineCount += count($lines);

            foreach ($lines as $line) {
                if (stripos($line, 'error') !== false || stripos($line, 'fatal') !== false) {
                    $errorCount++;
                }
                if (stripos($line, 'warn') !== false) {
                    $warningCount++;
                }

                if (preg_match('/(\d{4}-\d{2}-\d{2}[T\s]\d{2}:\d{2}:\d{2})/', $line, $m) === 1) {
                    if ($latestTs === null || $m[1] > $latestTs) {
                        $latestTs = $m[1];
                    }
                }
            }
        }

        return [
            'subsystem' => $name,
            'files' => array_map(static fn($f) => str_replace(ROOTPATH, '', $f), $files),
            'file_count' => count($files),
            'lines' => $lineCount,
            'errors' => $errorCount,
            'warnings' => $warningCount,
            'latest_timestamp' => $latestTs,
        ];
    }

    private function renderSubsystemMarkdown(array $summary): string
    {
        $lines = [
            '# Subsystem Log Summary: ' . $summary['subsystem'],
            '',
            '- Files: ' . $summary['file_count'],
            '- Lines scanned: ' . $summary['lines'],
            '- Errors: ' . $summary['errors'],
            '- Warnings: ' . $summary['warnings'],
            '- Latest timestamp: ' . ($summary['latest_timestamp'] ?? 'none'),
            '',
            '## Files',
        ];

        if (empty($summary['files'])) {
            $lines[] = '- _No files found_';
        } else {
            foreach ($summary['files'] as $file) {
                $lines[] = '- `' . $file . '`';
            }
        }

        $lines[] = '';
        return implode(PHP_EOL, $lines);
    }

    private function renderGlobalMarkdown(string $date, array $subsystems, array $missing): string
    {
        $lines = [
            '# AIOPS Logs Summary — ' . $date,
            '',
            '| Subsystem | Files | Lines | Errors | Warnings | Latest Timestamp |',
            '|---|---:|---:|---:|---:|---|',
        ];

        foreach ($subsystems as $summary) {
            $lines[] = sprintf(
                '| %s | %d | %d | %d | %d | %s |',
                $summary['subsystem'],
                $summary['file_count'],
                $summary['lines'],
                $summary['errors'],
                $summary['warnings'],
                $summary['latest_timestamp'] ?? 'none'
            );
        }

        $lines[] = '';
        $lines[] = '## Missing Sources';
        if (empty($missing)) {
            $lines[] = '- none';
        } else {
            foreach ($missing as $name) {
                $lines[] = '- ' . $name;
            }
        }

        $lines[] = '';
        return implode(PHP_EOL, $lines);
    }
}
