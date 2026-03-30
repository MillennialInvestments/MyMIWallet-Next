<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class AutoFixAnalyze extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:autofix:analyze';
    protected $description = 'Analyze latest log file and produce categorized recurring issue suggestions.';

    public function run(array $params)
    {
        $logFile = $this->latestLogFile();
        if ($logFile === null) {
            CLI::error('No log files found in writable/logs.');
            return;
        }

        $lines = @file($logFile, FILE_IGNORE_NEW_LINES) ?: [];
        $issues = [];

        foreach ($lines as $line) {
            $signature = $this->extractSignature($line);
            if ($signature === null) {
                continue;
            }

            $issues[$signature]['signature'] = $signature;
            $issues[$signature]['count'] = ($issues[$signature]['count'] ?? 0) + 1;
            $issues[$signature]['type'] = $this->classify($line);
            $issues[$signature]['likely_file'] = $this->extractFilePath($line);
            $issues[$signature]['recommended_fix'] = $this->recommend($issues[$signature]['type']);
            $issues[$signature]['priority'] = in_array($issues[$signature]['type'], ['missing_view', 'null_object_access', 'auth_access_issue'], true)
                ? 'high'
                : 'medium';
        }

        usort($issues, static fn(array $a, array $b) => ($b['count'] ?? 0) <=> ($a['count'] ?? 0));

        $report = [
            'generated_at' => date(DATE_ATOM),
            'issues' => array_values($issues),
        ];

        $this->writeJson(ROOTPATH . 'writable/aiops/autofix_report.json', $report);
        $this->writeMarkdown(ROOTPATH . 'docs/reports/autofix_report.md', $report);

        CLI::write('Auto-fix report generated from: ' . $logFile, 'green');
        CLI::write('Issues: ' . count($report['issues']), 'yellow');
    }

    private function latestLogFile(): ?string
    {
        $files = glob(WRITEPATH . 'logs/log-*.php') ?: [];
        rsort($files);
        return $files[0] ?? null;
    }

    private function extractSignature(string $line): ?string
    {
        if (! str_contains($line, 'ERROR') && ! str_contains($line, 'CRITICAL') && ! str_contains($line, 'Exception')) {
            return null;
        }

        if (preg_match('/(Exception|Error):\s+(.+)$/', $line, $m)) {
            return trim($m[1] . ': ' . $m[2]);
        }

        return trim(substr($line, 0, 220));
    }

    private function extractFilePath(string $line): string
    {
        if (preg_match('/(APPPATH|\/app\/[^\s:]+\.php)/', $line, $m)) {
            return $m[1];
        }

        return '';
    }

    private function classify(string $line): string
    {
        $line = strtolower($line);

        return match (true) {
            str_contains($line, '404') || str_contains($line, 'page not found') => 'missing_route',
            str_contains($line, 'undefined method') => 'missing_method',
            str_contains($line, 'invalid file') || str_contains($line, 'view') && str_contains($line, 'not found') => 'missing_view',
            str_contains($line, 'must be public') || str_contains($line, 'visibility') => 'visibility_mismatch',
            str_contains($line, 'undefined variable') => 'undefined_variable',
            str_contains($line, 'call to a member function') || str_contains($line, 'on null') => 'null_object_access',
            str_contains($line, 'authentication') || str_contains($line, 'not logged in') => 'auth_access_issue',
            str_contains($line, 'service') && str_contains($line, 'not found') => 'service_init_without_context',
            default => 'unknown',
        };
    }

    private function recommend(string $type): string
    {
        return match ($type) {
            'missing_route' => 'Add explicit route alias or redirect for missed URI variants.',
            'missing_method' => 'Implement controller method or update route mapping.',
            'missing_view' => 'Create missing view file or update controller view reference.',
            'visibility_mismatch' => 'Adjust method/property visibility to match inheritance contract.',
            'undefined_variable' => 'Guard undefined variables with null-coalescing defaults in views.',
            'null_object_access' => 'Add null guards before object property/method calls.',
            'auth_access_issue' => 'Ensure route filters and auth state checks match route purpose.',
            'service_init_without_context' => 'Resolve service in controller lifecycle and guard missing dependencies.',
            default => 'Review stack trace and add targeted guard/fix.',
        };
    }

    private function writeJson(string $path, array $payload): void
    {
        @mkdir(dirname($path), 0775, true);
        file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
    }

    private function writeMarkdown(string $path, array $payload): void
    {
        @mkdir(dirname($path), 0775, true);

        $md = "# Auto-fix Analysis Report\n\n";
        $md .= '- Generated at: ' . ($payload['generated_at'] ?? '') . "\n\n";
        $md .= "| Signature | Count | Type | Likely File | Priority | Recommended Fix |\n";
        $md .= "|---|---:|---|---|---|---|\n";

        foreach (($payload['issues'] ?? []) as $issue) {
            $md .= sprintf(
                "| %s | %d | %s | %s | %s | %s |\n",
                str_replace('|', '/', (string) ($issue['signature'] ?? '')),
                (int) ($issue['count'] ?? 0),
                (string) ($issue['type'] ?? ''),
                (string) ($issue['likely_file'] ?? ''),
                (string) ($issue['priority'] ?? ''),
                str_replace('|', '/', (string) ($issue['recommended_fix'] ?? '')),
            );
        }

        file_put_contents($path, $md);
    }
}
