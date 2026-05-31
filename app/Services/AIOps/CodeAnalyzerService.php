<?php

declare(strict_types=1);

namespace App\Services\AIOps;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RuntimeException;
use SplFileInfo;
use Throwable;

class CodeAnalyzerService
{
    private string $rootPath;

    private array $severityWeights = [
        'low'      => 3,
        'moderate' => 8,
        'high'     => 16,
        'critical' => 28,
    ];

    public function __construct(?string $rootPath = null)
    {
        $root = $rootPath ?: ROOTPATH;
        $real = realpath($root);

        if (! $real) {
            throw new RuntimeException('Invalid project root path.');
        }

        $this->rootPath = rtrim($real, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    public function analyze(array $options): array
    {
        $files = $this->collectFiles($options);

        if ($files === []) {
            throw new RuntimeException('No files found for analysis.');
        }

        $findings = [];
        $metrics = [
            'total_lines' => 0,
            'php_files' => 0,
            'js_files' => 0,
            'css_files' => 0,
        ];

        foreach ($files as $file) {
            $relative = $this->relativePath($file);
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

            if ($extension === 'php') {
                $metrics['php_files']++;
            } elseif ($extension === 'js') {
                $metrics['js_files']++;
            } elseif ($extension === 'css') {
                $metrics['css_files']++;
            }

            $text = file_get_contents($file);

            if ($text === false) {
                $findings[] = $this->finding('moderate', 'read-error', $relative, 0, 'Could not read file.', '', 'Check file permissions.');
                continue;
            }

            $lines = preg_split('/\R/', $text) ?: [];
            $metrics['total_lines'] += count($lines);

            $findings = array_merge($findings, $this->analyzeSyntax($file, $relative, $extension));
            $findings = array_merge($findings, $this->analyzeLines($relative, $lines, $extension));
            $findings = array_merge($findings, $this->analyzeFileLevel($relative, $text, $extension));
        }

        $score = $this->riskScore($findings);

        return [
            'generated_at' => gmdate('c'),
            'repo' => basename($this->rootPath),
            'root' => $this->rootPath,
            'options' => $options,
            'summary' => [
                'files_scanned' => count($files),
                'findings_count' => count($findings),
                'risk_score' => $score,
                'risk_level' => $this->riskLevel($score),
                'metrics' => $metrics,
            ],
            'files' => array_map(fn ($file) => $this->relativePath($file), $files),
            'findings' => $findings,
        ];
    }

    public function writeReports(array $result, bool $writeJson = false): array
    {
        $dir = $this->rootPath . 'docs/_aiops/reports/code-analysis';

        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $stamp = gmdate('Ymd-His');
        $target = $result['options']['file'] ?: $result['options']['path'] ?: 'scan';
        $slug = preg_replace('/[^A-Za-z0-9_.-]+/', '-', trim((string) $target, '/')) ?: 'scan';

        $markdownPath = $dir . "/code-analysis-{$slug}-{$stamp}.md";
        file_put_contents($markdownPath, $this->renderMarkdown($result));

        $paths = [
            'markdown' => $this->relativePath($markdownPath),
            'json' => null,
        ];

        if ($writeJson) {
            $jsonPath = $dir . "/code-analysis-{$slug}-{$stamp}.json";
            file_put_contents($jsonPath, json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            $paths['json'] = $this->relativePath($jsonPath);
        }

        return $paths;
    }

    private function collectFiles(array $options): array
    {
        if (! empty($options['file'])) {
            $file = $this->resolvePath((string) $options['file']);

            if (! is_file($file)) {
                throw new RuntimeException('File not found: ' . $options['file']);
            }

            return [$file];
        }

        $path = $this->resolvePath((string) ($options['path'] ?? ''));

        if (! is_dir($path)) {
            throw new RuntimeException('Path not found or not a directory: ' . ($options['path'] ?? ''));
        }

        $extensions = array_filter(array_map(
            static fn ($value) => strtolower(ltrim(trim($value), '.')),
            explode(',', (string) ($options['ext'] ?? 'php,js,css'))
        ));

        $maxFiles = max(1, (int) ($options['max_files'] ?? 50));
        $files = [];

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $item) {
            if (! $item instanceof SplFileInfo || ! $item->isFile()) {
                continue;
            }

            $real = $item->getRealPath();

            if (! $real || $this->shouldSkip($real)) {
                continue;
            }

            $extension = strtolower(pathinfo($real, PATHINFO_EXTENSION));

            if (! in_array($extension, $extensions, true)) {
                continue;
            }

            $files[] = $real;

            if (count($files) >= $maxFiles) {
                break;
            }
        }

        sort($files);

        return $files;
    }

    private function shouldSkip(string $path): bool
    {
        $relative = $this->relativePath($path);

        foreach (['vendor/', 'node_modules/', 'writable/', '.git/', 'docs/_aiops/reports/'] as $skip) {
            if (str_contains($relative, $skip)) {
                return true;
            }
        }

        return false;
    }

    private function analyzeSyntax(string $file, string $relative, string $extension): array
    {
        if ($extension !== 'php') {
            return [];
        }

        $output = [];
        $code = 0;

        @exec('php -l ' . escapeshellarg($file) . ' 2>&1', $output, $code);

        if ($code !== 0) {
            return [
                $this->finding(
                    'critical',
                    'php-syntax',
                    $relative,
                    0,
                    'PHP syntax error detected.',
                    implode("\n", $output),
                    'Fix syntax before deploying or merging.'
                ),
            ];
        }

        return [];
    }

    private function analyzeLines(string $relative, array $lines, string $extension): array
    {
        $findings = [];

        $rules = [
            ['/privateKey|private_key|secret_key|mnemonic|seed phrase/i', 'critical', 'secret-exposure', 'Possible wallet/private-key/seed material reference.', 'Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.'],
            ['/\baccess_token\b|\bbearer\s+[A-Za-z0-9._-]+/i', 'high', 'token-exposure', 'Possible token/access credential reference.', 'Redact tokens and keep them server-side only.'],
            ['/\$_GET|\$_POST|getVar\s*\(|getPost\s*\(|getJSON\s*\(/i', 'moderate', 'input-validation', 'Request input is used in this file.', 'Validate and authorize all request input before use.'],
            ['/query\s*\(.*(\.|\{|\$)/i', 'high', 'sql-injection-risk', 'Potential dynamic SQL query detected.', 'Use Query Builder bindings or parameterized queries.'],
            ['/SELECT\s+\*/i', 'moderate', 'query-efficiency', 'SELECT * detected.', 'Select only required columns to reduce memory and improve query performance.'],
            ['/innerHTML\s*=|document\.write\s*\(|eval\s*\(/i', 'high', 'xss-risk', 'Potential unsafe browser-side DOM/script behavior.', 'Use textContent, safe templating, and avoid eval/document.write.'],
            ['/console\.log\s*\(/i', 'low', 'production-console', 'Console logging detected.', 'Remove production console logs or guard behind a development flag.'],
            ['/\byAxes\b|\bxAxes\b/i', 'moderate', 'chartjs-compat', 'Legacy Chart.js v2 axis syntax detected.', 'Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.'],
            ['/setInterval\s*\(/i', 'low', 'frontend-efficiency', 'setInterval detected.', 'Ensure intervals are cleared and do not create duplicate polling loops.'],
            ['/fetch\s*\(|\$\.ajax\s*\(/i', 'low', 'ajax-observability', 'AJAX/fetch usage detected.', 'Ensure loading states, error messages, CSRF headers, and retry handling are present.'],
            ['/TODO|FIXME|HACK/i', 'low', 'maintainability', 'Developer marker detected.', 'Resolve or convert to a tracked task.'],
        ];

        foreach ($lines as $number => $line) {
            $trimmed = trim((string) $line);

            if ($trimmed === '') {
                continue;
            }

            foreach ($rules as [$pattern, $severity, $category, $title, $recommendation]) {
                if (preg_match($pattern, $line)) {
                    $findings[] = $this->finding(
                        $severity,
                        $category,
                        $relative,
                        $number + 1,
                        $title,
                        $this->redact($trimmed),
                        $recommendation
                    );
                }
            }
        }

        return $findings;
    }

    private function analyzeFileLevel(string $relative, string $text, string $extension): array
    {
        $findings = [];

        if ($extension === 'php' && preg_match('/Controller\.php$/', $relative)) {
            if (! str_contains($text, 'log_message(')) {
                $findings[] = $this->finding('moderate', 'observability', $relative, 0, 'Controller has no log_message() calls.', '', 'Add targeted logging for failures and high-risk actions.');
            }

            if (str_contains($text, '$this->request') && ! preg_match('/validate\s*\(|setRules\s*\(/', $text)) {
                $findings[] = $this->finding('moderate', 'validation-gap', $relative, 0, 'Controller reads request data but validation was not obvious.', '', 'Use CI4 validation rules and authorization checks before processing request data.');
            }

            if (! preg_match('/try\s*\{/', $text)) {
                $findings[] = $this->finding('low', 'error-handling', $relative, 0, 'No try/catch blocks found in controller.', '', 'Add exception handling around external APIs, database writes, and render-sensitive flows.');
            }
        }

        if ($extension === 'js') {
            if ((str_contains($text, '$.ajax') || str_contains($text, 'fetch(')) && ! preg_match('/\.catch\s*\(|error\s*:/', $text)) {
                $findings[] = $this->finding('moderate', 'frontend-error-handling', $relative, 0, 'AJAX/fetch found without obvious error handling.', '', 'Add user-friendly failure handling and retry-safe UI states.');
            }
        }

        return $findings;
    }

    private function finding(string $severity, string $category, string $file, int $line, string $title, string $evidence, string $recommendation): array
    {
        return [
            'severity' => $severity,
            'category' => $category,
            'file' => $file,
            'line' => $line,
            'title' => $title,
            'evidence' => $evidence,
            'recommendation' => $recommendation,
        ];
    }

    private function riskScore(array $findings): int
    {
        $score = 0;

        foreach ($findings as $finding) {
            $score += $this->severityWeights[$finding['severity']] ?? 1;
        }

        return min(100, $score);
    }

    private function riskLevel(int $score): string
    {
        if ($score >= 76) {
            return 'critical';
        }

        if ($score >= 51) {
            return 'high';
        }

        if ($score >= 21) {
            return 'moderate';
        }

        return 'low';
    }

    private function renderMarkdown(array $result): string
    {
        $summary = $result['summary'];

        $markdown = [];
        $markdown[] = '# AIOps Code Analysis';
        $markdown[] = '';
        $markdown[] = '- Generated: ' . $result['generated_at'];
        $markdown[] = '- Repo: ' . $result['repo'];
        $markdown[] = '- Files scanned: ' . $summary['files_scanned'];
        $markdown[] = '- Findings: ' . $summary['findings_count'];
        $markdown[] = '- Risk score: ' . $summary['risk_score'] . ' / 100';
        $markdown[] = '- Risk level: ' . strtoupper($summary['risk_level']);
        $markdown[] = '';
        $markdown[] = '## Executive Summary';
        $markdown[] = '';
        $markdown[] = $summary['findings_count'] === 0
            ? 'No deterministic issues were detected.'
            : 'Deterministic analysis found issues or review points that may affect security, UX, backend efficiency, or maintainability.';
        $markdown[] = '';
        $markdown[] = '## Files';
        $markdown[] = '';

        foreach ($result['files'] as $file) {
            $markdown[] = '- `' . $file . '`';
        }

        $markdown[] = '';
        $markdown[] = '## Findings';
        $markdown[] = '';

        if ($result['findings'] === []) {
            $markdown[] = 'No findings.';
        }

        foreach ($result['findings'] as $finding) {
            $markdown[] = '### ' . strtoupper($finding['severity']) . ' — ' . $finding['title'];
            $markdown[] = '';
            $markdown[] = '- Category: `' . $finding['category'] . '`';
            $markdown[] = '- File: `' . $finding['file'] . '`';
            $markdown[] = '- Line: ' . $finding['line'];
            $markdown[] = '- Recommendation: ' . $finding['recommendation'];

            if ($finding['evidence'] !== '') {
                $markdown[] = '';
                $markdown[] = '```';
                $markdown[] = $finding['evidence'];
                $markdown[] = '```';
            }

            $markdown[] = '';
        }

        $markdown[] = '## Suggested Next Tasks';
        $markdown[] = '';
        $markdown[] = '- Fix any critical/high findings first.';
        $markdown[] = '- Convert repeated controller/model work into cached service methods.';
        $markdown[] = '- Remove production debug logs that expose tokens, CSRF hashes, request payloads, or internal model details.';
        $markdown[] = '- Add browser validation for affected routes and modal actions.';
        $markdown[] = '';

        return implode("\n", $markdown);
    }

    private function resolvePath(string $input): string
    {
        $input = trim($input, " \t\n\r\0\x0B\"'");

        if ($input === '') {
            throw new RuntimeException('Empty path provided.');
        }

        $candidate = str_starts_with($input, DIRECTORY_SEPARATOR)
            ? $input
            : $this->rootPath . ltrim($input, DIRECTORY_SEPARATOR);

        $real = realpath($candidate);

        if (! $real) {
            throw new RuntimeException('Path not found: ' . $input);
        }

        if (! str_starts_with($real, $this->rootPath)) {
            throw new RuntimeException('Refusing to analyze path outside project root: ' . $input);
        }

        return $real;
    }

    private function relativePath(string $path): string
    {
        $real = realpath($path) ?: $path;

        if (str_starts_with($real, $this->rootPath)) {
            return str_replace('\\', '/', substr($real, strlen($this->rootPath)));
        }

        return str_replace('\\', '/', $path);
    }

    private function redact(string $value): string
    {
        $value = preg_replace('/(privateKey|private_key|secret_key|mnemonic|access_token|bearer|token|password)(["\']?\s*[:=]\s*["\']?)[^"\'\s,}]+/i', '$1$2[REDACTED]', $value) ?? $value;
        $value = preg_replace('/[A-Za-z0-9+\/]{32,}={0,2}/', '[REDACTED_LONG_VALUE]', $value) ?? $value;

        return mb_substr($value, 0, 260);
    }
}
