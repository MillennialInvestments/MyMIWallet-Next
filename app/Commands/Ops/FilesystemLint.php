<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\FilesystemGovernance;

class FilesystemLint extends SafeBaseCommand
{
    protected $group = 'ops';
    protected $name = 'ops:filesystem:lint';
    protected $description = 'Lint and optionally auto-fix filesystem governance violations.';
    protected $usage = 'ops:filesystem:lint [--fix] [--report] [--json]';
    protected $options = [
        '--fix' => 'Automatically apply safe fixes',
        '--report' => 'Write fix plan to docs/_ops/filesystem-lint.md',
        '--json' => 'JSON output',
    ];

    private FilesystemGovernance $governance;

    public function run(array $params)
    {
        $this->parseParams($params);
        $this->governance = config('FilesystemGovernance');

        $fixMode = $this->optBool('fix');
        $json = $this->optBool('json');

        $files = $this->collectCommandFiles(ROOTPATH . 'app/Commands');
        $issues = [];

        foreach ($files as $file) {
            $issues = array_merge($issues, $this->scanFile($file));
        }

        $fixPlan = [];
        $fixesApplied = 0;
        $manualRequired = 0;

        foreach ($issues as $issue) {
            $fixPlan[] = $this->describeFix($issue);

            if (! $this->canAutoFix($issue)) {
                $manualRequired++;
                continue;
            }

            if ($fixMode && $this->applyFix($issue)) {
                $fixesApplied++;
            }
        }

        $severitySummary = $this->buildSeveritySummary($issues);
        $confidenceSummary = $this->buildConfidenceSummary($issues);

        $payload = [
            'generated_at' => gmdate('c'),
            'total_files' => count($files),
            'issues' => $issues,
            'issue_count' => count($issues),
            'error_count' => (int) ($severitySummary['error'] ?? 0),
            'severity_summary' => $severitySummary,
            'fixes_applied' => $fixesApplied,
            'manual_required' => $manualRequired,
            'confidence_summary' => $confidenceSummary,
            'fix_plan' => $fixPlan,
        ];

        $this->writeUnifiedReports($payload);

        if ($issues === []) {
            CLI::write('Filesystem lint: OK', 'green');
        } else {
            CLI::write('Filesystem lint: FAIL', 'red');
            foreach ($issues as $issue) {
                CLI::write(sprintf('%s:%d %s [%s]', $issue['file'], $issue['line'], $issue['reason'], strtoupper($issue['severity'])), 'yellow');
            }
        }

        if ($json) {
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        }

        return ($payload['error_count'] > 0) ? EXIT_ERROR : EXIT_SUCCESS;
    }

    private function collectCommandFiles(string $root): array
    {
        if (! is_dir($root)) {
            return [];
        }

        $files = [];
        $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($root));
        foreach ($it as $entry) {
            if ($entry->isDir() || $entry->getExtension() !== 'php') {
                continue;
            }

            $path = $entry->getPathname();
            if (str_ends_with($path, 'FilesystemLint.php')) {
                continue;
            }

            $files[] = $path;
        }

        return $files;
    }

    private function scanFile(string $file): array
    {
        $lines = @file($file, FILE_IGNORE_NEW_LINES);
        if (! is_array($lines)) {
            return [];
        }

        $issues = [];
        $relative = $this->relativePath($file);
        $subsystem = $this->resolveSubsystem($relative);

        foreach ($lines as $index => $line) {
            $lineNumber = $index + 1;
            if (! preg_match('/(@?)(file_put_contents|mkdir)\s*\((.+)\)\s*;?/', $line, $match)) {
                continue;
            }

            $args = $match[3];
            $firstArg = $this->extractFirstArgument($args);
            if ($firstArg === '') {
                continue;
            }

            $resolved = $this->resolveTargetPath($firstArg, $subsystem);
            $reason = null;
            $severity = 'warning';

            if ($this->looksWritableArtifact($firstArg)) {
                $reason = 'Artifact written to writable/';
                $severity = 'error';
            } elseif (! str_contains($firstArg, 'ROOTPATH')) {
                $reason = 'Missing ROOTPATH anchor';
            }

            if (! $this->pathAllowed($subsystem, $resolved)) {
                $reason = 'Path not allowlisted';
                $severity = 'error';
            }

            if ($reason === null) {
                continue;
            }

            $replacement = $this->buildReplacementLine($line, $match[2], $firstArg, $resolved);

            $issues[] = [
                'file' => $relative,
                'line' => $lineNumber,
                'call' => $match[2],
                'reason' => $reason,
                'severity' => $severity,
                'snippet' => trim($line),
                'resolved_path' => $resolved,
                'subsystem' => $subsystem,
                'suggested_fix' => $replacement,
                'confidence' => $severity === 'error' ? 0.95 : 0.80,
                'replacement_line' => $replacement,
            ];
        }

        return $issues;
    }

    private function extractFirstArgument(string $args): string
    {
        $parts = preg_split('/,(?![^()]*\))/', $args);
        return isset($parts[0]) ? trim($parts[0]) : '';
    }

    private function resolveSubsystem(string $relativePath): string
    {
        if (str_contains($relativePath, '/AiOps/') || str_contains($relativePath, '/AIops/')) {
            return 'aiops';
        }
        if (str_contains($relativePath, '/Codex/')) {
            return 'codex';
        }
        if (str_contains($relativePath, '/Support/')) {
            return 'support';
        }
        if (str_contains($relativePath, 'GapTracker')) {
            return 'gap_tracker';
        }

        return 'ops';
    }

    private function resolveTargetPath(string $arg, string $subsystem): string
    {
        $pathBySubsystem = [
            'ops' => 'docs/_ops/autofix.json',
            'aiops' => 'docs/_aiops/autofix.json',
            'codex' => 'docs/_codex/autofix.json',
            'support' => 'docs/_support/autofix.json',
            'gap_tracker' => 'docs/_gap-tracker/autofix.json',
        ];

        if (str_contains($arg, 'WRITEPATH') && str_contains($arg, 'ci/')) {
            return 'ci/ci_bootstrap.json';
        }

        if (preg_match('/[\'\"]([^\'\"]+)[\'\"]/', $arg, $m) === 1) {
            $literal = ltrim($m[1], '/');
            if (str_starts_with($literal, 'docs/') || str_starts_with($literal, 'ci/')) {
                return $literal;
            }
            if (str_starts_with($literal, 'writable/')) {
                return (str_contains($literal, 'ci/')) ? 'ci/' . basename($literal) : ($pathBySubsystem[$subsystem] ?? 'docs/_ops/autofix.json');
            }
        }

        return $pathBySubsystem[$subsystem] ?? 'docs/_ops/autofix.json';
    }

    private function pathAllowed(string $subsystem, string $relativePath): bool
    {
        $allow = $this->governance->allowlists[$subsystem] ?? $this->governance->allowlists['default'];
        foreach ($allow as $prefix) {
            if (str_starts_with($relativePath, $prefix)) {
                return true;
            }
        }

        return false;
    }

    private function looksWritableArtifact(string $arg): bool
    {
        if (! str_contains($arg, 'WRITEPATH') && ! str_contains($arg, 'writable/')) {
            return false;
        }

        return ! str_contains($arg, 'logs');
    }

    private function buildReplacementLine(string $line, string $call, string $firstArg, string $resolvedPath): string
    {
        $expression = "ROOTPATH . '" . $resolvedPath . "'";

        if ($call === 'mkdir') {
            return preg_replace('/mkdir\s*\((.+)\)/', 'mkdir(' . $expression . ', 0775, true)', trim($line)) ?? ('mkdir(' . $expression . ', 0775, true);');
        }

        return str_replace($firstArg, $expression, trim($line));
    }

    private function canAutoFix(array $issue): bool
    {
        if (($issue['confidence'] ?? 0.0) < 0.75) {
            return false;
        }

        if (($issue['reason'] ?? '') === 'Path not allowlisted') {
            return false;
        }

        return ($issue['replacement_line'] ?? '') !== '';
    }

    private function applyFix(array $issue): bool
    {
        $file = ROOTPATH . ($issue['file'] ?? '');
        if (! is_file($file)) {
            return false;
        }

        $lines = @file($file, FILE_IGNORE_NEW_LINES);
        if (! is_array($lines)) {
            return false;
        }

        $lineNo = (int) ($issue['line'] ?? 0);
        if ($lineNo < 1 || ! isset($lines[$lineNo - 1])) {
            return false;
        }

        $oldLine = $lines[$lineNo - 1];
        preg_match('/^\s*/', $oldLine, $m);
        $indent = $m[0] ?? '';
        $newLine = $indent . rtrim((string) $issue['replacement_line'], ';') . ';';

        if ($newLine === $oldLine) {
            return false;
        }

        $lines[$lineNo - 1] = $newLine;
        $content = implode(PHP_EOL, $lines) . PHP_EOL;

        return file_put_contents($file, $content) !== false;
    }

    private function writeUnifiedReports(array $payload): void
    {
        $opsDir = ROOTPATH . 'docs/_ops';
        @mkdir($opsDir, 0775, true);

        $jsonPath = $opsDir . '/filesystem-lint.json';
        file_put_contents($jsonPath, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        file_put_contents($opsDir . '/filesystem-lint.md', $this->renderLintMarkdown($payload));
        file_put_contents($opsDir . '/filesystem-lint-summary.md', $this->renderSummaryMarkdown($payload));

        $trendPayload = $this->appendTrend($payload);
        file_put_contents($opsDir . '/filesystem-trend.md', $this->renderTrendMarkdown($trendPayload));
    }

    private function appendTrend(array $payload): array
    {
        $trendDir = ROOTPATH . 'docs/_ops/trends';
        @mkdir($trendDir, 0775, true);

        $trendFile = $trendDir . '/filesystem-violations.json';
        $history = [];
        if (is_file($trendFile)) {
            $decoded = json_decode((string) file_get_contents($trendFile), true);
            if (is_array($decoded)) {
                $history = $decoded;
            }
        }

        $history[] = [
            'timestamp' => gmdate('c'),
            'total' => (int) ($payload['issue_count'] ?? 0),
            'errors' => (int) ($payload['severity_summary']['error'] ?? 0),
            'warnings' => (int) ($payload['severity_summary']['warning'] ?? 0),
            'auto_fixed' => (int) ($payload['fixes_applied'] ?? 0),
            'manual_required' => (int) ($payload['manual_required'] ?? 0),
        ];

        file_put_contents($trendFile, json_encode($history, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        return array_slice($history, -7);
    }

    private function renderLintMarkdown(array $payload): string
    {
        $lines = [
            '# Filesystem Lint Report',
            '',
            '- Generated: ' . ($payload['generated_at'] ?? ''),
            '- Total violations: ' . (string) ($payload['issue_count'] ?? 0),
            '- Errors: ' . (string) ($payload['severity_summary']['error'] ?? 0),
            '- Warnings: ' . (string) ($payload['severity_summary']['warning'] ?? 0),
            '',
        ];

        foreach (($payload['fix_plan'] ?? []) as $entry) {
            $lines[] = '## ' . $entry['file'] . ':' . $entry['line'];
            $lines[] = 'Issue: ' . $entry['issue'];
            $lines[] = 'Fix:';
            $lines[] = 'Replace:';
            $lines[] = $entry['replace'];
            $lines[] = '';
            $lines[] = 'With:';
            $lines[] = $entry['with'];
            $lines[] = '';
            if (! empty($entry['allowed'])) {
                $lines[] = 'Allowed:';
                foreach ((array) $entry['allowed'] as $allowed) {
                    $lines[] = '- ' . $allowed;
                }
                $lines[] = '';
            }
        }

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function renderSummaryMarkdown(array $payload): string
    {
        return implode(PHP_EOL, [
            '# Filesystem Governance Summary',
            '',
            '- Total violations: ' . (string) ($payload['issue_count'] ?? 0),
            '- Errors: ' . (string) ($payload['severity_summary']['error'] ?? 0),
            '- Warnings: ' . (string) ($payload['severity_summary']['warning'] ?? 0),
            '- Auto-fixed: ' . (string) ($payload['fixes_applied'] ?? 0),
            '- Manual required: ' . (string) ($payload['manual_required'] ?? 0),
            '',
            'Status: ' . (((int) ($payload['severity_summary']['error'] ?? 0) > 0) ? '❌ Unhealthy' : (((int) ($payload['severity_summary']['warning'] ?? 0) > 0) ? '⚠️ Warning' : '✅ Healthy')),
            '',
        ]) . PHP_EOL;
    }

    private function renderTrendMarkdown(array $recent): string
    {
        $lines = ['## Filesystem Governance Trend', ''];
        $count = count($recent);
        if ($count < 2) {
            $lines[] = '- Not enough history yet.';
            return implode(PHP_EOL, $lines) . PHP_EOL;
        }

        $first = $recent[0];
        $last = $recent[$count - 1];

        $deltaTotal = (int) $last['total'] - (int) $first['total'];
        $deltaErrors = (int) $last['errors'] - (int) $first['errors'];
        $pct = ((int) $first['total'] > 0) ? round((($deltaTotal / (int) $first['total']) * 100), 2) : 0;
        $autoFixRate = ((int) $last['total'] > 0) ? round((((int) $last['auto_fixed'] / (int) $last['total']) * 100), 2) : 0;

        $lines[] = sprintf('- Total violations: %d → %d (%s%.2f%%)', $first['total'], $last['total'], $pct <= 0 ? '↓' : '↑', abs($pct));
        $lines[] = sprintf('- Errors: %d → %d (%s%d)', $first['errors'], $last['errors'], $deltaErrors <= 0 ? '↓' : '↑', abs($deltaErrors));
        $lines[] = sprintf('- Auto-fix rate: %.2f%%', $autoFixRate);
        $lines[] = '';
        $lines[] = 'Status: ' . (($deltaTotal < 0 || $deltaErrors < 0) ? '✅ Improving' : (($deltaTotal > 0 || $deltaErrors > 0) ? '❌ Regressing' : '➖ Stable'));

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function buildSeveritySummary(array $issues): array
    {
        $summary = ['error' => 0, 'warning' => 0];
        foreach ($issues as $issue) {
            $severity = $issue['severity'] ?? 'warning';
            $summary[$severity] = (int) ($summary[$severity] ?? 0) + 1;
        }

        return $summary;
    }

    private function buildConfidenceSummary(array $issues): array
    {
        $out = ['high' => 0, 'medium' => 0, 'low' => 0];
        foreach ($issues as $issue) {
            $c = (float) ($issue['confidence'] ?? 0);
            if ($c >= 0.90) {
                $out['high']++;
            } elseif ($c >= 0.75) {
                $out['medium']++;
            } else {
                $out['low']++;
            }
        }

        return $out;
    }

    private function describeFix(array $violation): array
    {
        $subsystem = (string) ($violation['subsystem'] ?? 'default');
        return [
            'file' => (string) ($violation['file'] ?? 'unknown'),
            'line' => (int) ($violation['line'] ?? 0),
            'issue' => (string) ($violation['reason'] ?? 'Unknown violation'),
            'replace' => (string) ($violation['snippet'] ?? ''),
            'with' => (string) ($violation['suggested_fix'] ?? ''),
            'allowed' => $this->governance->allowlists[$subsystem] ?? $this->governance->allowlists['default'],
        ];
    }

    private function relativePath(string $path): string
    {
        $root = rtrim(ROOTPATH, '/\\') . DIRECTORY_SEPARATOR;
        return str_starts_with($path, $root) ? ltrim(substr($path, strlen($root)), '/\\') : $path;
    }
}
