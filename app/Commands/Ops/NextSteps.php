<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use App\Libraries\Ops\Analyzers\CommandsAnalyzer;
use App\Libraries\Ops\Analyzers\ConfigLintAnalyzer;
use App\Libraries\Ops\Analyzers\CspAnalyzer;
use App\Libraries\Ops\Analyzers\Psr4Analyzer;
use App\Libraries\Ops\Analyzers\RoutesAnalyzer;
use App\Libraries\Ops\Analyzers\RuntimeAnalyzer;
use App\Libraries\Ops\Issue;
use App\Models\AiOpsTaskModel;
use CodeIgniter\CLI\CLI;

class NextSteps extends SafeBaseCommand
{
    protected $group = 'ops';
    protected $name = 'ops:next-steps';
    protected $description = 'Generate next-steps issues from audit commands and write docs/snapshots.';
    protected $usage = 'ops:next-steps [--emit=docs|db|both] [--date=YYYY-MM-DD] [--dry-run] [--approve]';
    protected $options = [
        '--emit' => 'docs (default), db, or both',
        '--date' => 'Override the snapshot date (YYYY-MM-DD)',
        '--dry-run' => 'Run analyzers but skip writes',
        '--approve' => 'Acknowledge and write docs/snapshots/tasks',
    ];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $emit = $this->resolveOption($params, 'emit', 'docs');
        $dateOverride = $this->resolveOption($params, 'date', null);
        $dryRun = $this->resolveDryRun($flags);

        $issues = array_merge(
            (new Psr4Analyzer())->analyze(),
            (new RuntimeAnalyzer())->analyze(),
            (new CommandsAnalyzer())->analyze(),
            (new ConfigLintAnalyzer())->analyze(),
            (new RoutesAnalyzer())->analyze(),
            (new CspAnalyzer())->analyze(),
            $this->scanLatestLogIssue()
        );

        $issues = array_map([$this, 'normalizeIssue'], $issues);
        $issues = $this->dedupeIssues($issues);

        $generatedAt = date('c');
        $dateString = $dateOverride ?: date('Y-m-d');

        if ($dryRun) {
            CLI::write('Dry-run enabled. Writes are skipped.', 'yellow');
        }

        if ($emit === 'docs' || $emit === 'both') {
            if (! $dryRun) {
                $markdown = $this->buildMarkdown($issues, $generatedAt, $dateString);
                $this->writeDocs($markdown);
                $this->writeSnapshot($issues, $generatedAt, $dateString);
            }
        }

        if (($emit === 'db' || $emit === 'both') && ! $dryRun) {
            $this->enqueueAiOpsTasks($issues);
        }

        CLI::write(sprintf('ops:next-steps completed. Issues: %d', count($issues)), 'green');

        return EXIT_SUCCESS;
    }

    /**
     * @param array<string, mixed> $issue
     * @return array<string, mixed>
     */
    private function normalizeIssue(array $issue): array
    {
        $severity = strtoupper((string) ($issue['severity'] ?? 'P2'));
        $title = strtolower((string) ($issue['title'] ?? ''));
        $evidencePayload = $issue['evidence'] ?? [];
        $evidence = strtolower(json_encode($evidencePayload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));

        if (preg_match('/constructor|runtime|fastcgi|php-fpm|php-cgi|writable|vendor missing|cache boot|502|503|504/', $title . ' ' . $evidence)) {
            $severity = 'P0';
        } elseif (preg_match('/psr-4|psr4|csp|route|auth audit|config lint|signature/', $title . ' ' . $evidence)) {
            $severity = 'P1';
        } elseif (! in_array($severity, ['P0', 'P1', 'P2'], true)) {
            $severity = 'P2';
        }

        $issue['severity'] = $severity;
        $issue['evidence'] = is_array($evidencePayload) ? $evidencePayload : [];
        $issue['suggested_fix'] = $issue['suggested_fix'] ?? [];
        $issue['owner'] = $issue['owner'] ?? 'human';
        $issue['status'] = $issue['status'] ?? 'open';
        $issue['codex_prompt'] = $issue['codex_prompt'] ?? ($issue['ai_prompt'] ?? '');
        $issue['chatgpt_prompt'] = $issue['chatgpt_prompt'] ?? ($issue['ai_prompt'] ?? '');
        $issue['auto_queue'] = (bool) ($issue['auto_queue'] ?? (($issue['owner'] ?? 'human') !== 'human'));

        $hash = $issue['task_key'] ?? $issue['id'] ?? Issue::hash($issue);
        $issue['task_key'] = $hash;
        $issue['id'] = $hash;

        return $issue;
    }

    /**
     * @param array<int, array<string, mixed>> $issues
     * @return array<int, array<string, mixed>>
     */
    private function dedupeIssues(array $issues): array
    {
        $unique = [];
        foreach ($issues as $issue) {
            $unique[$issue['id']] = $issue;
        }
        return array_values($unique);
    }

    private function buildMarkdown(array $issues, string $generatedAt, string $dateString): string
    {
        $groups = [
            'P0' => [],
            'P1' => [],
            'P2' => [],
        ];

        foreach ($issues as $issue) {
            $severity = $issue['severity'] ?? 'P2';
            $groups[$severity][] = $issue;
        }

        $lines = [];
        $lines[] = '# Next Steps';
        $lines[] = '';
        $lines[] = sprintf('✅ Current Status Snapshot (%s)', $generatedAt);
        $lines[] = sprintf('- Environment: %s', $this->resolveEnvironmentLabel());
        $lines[] = '';
        $lines[] = '';
        $lines[] = $this->renderIssueSection('🔥 P0 (Must fix now)', $groups['P0']);
        $lines[] = $this->renderIssueSection('⚠️ P1 (Fix this week)', $groups['P1']);
        $lines[] = $this->renderIssueSection('🧹 P2 (Cleanup/backlog)', $groups['P2']);

        $lines[] = $this->renderAiWorkQueue($issues);
        $lines[] = $this->renderPromptSection('📌 Copy/paste prompts for ChatGPT', $issues, 'chatgpt');
        $lines[] = $this->renderPromptSection('🤖 Copy/paste prompts for Codex', $issues, 'codex');

        $lines[] = '✅ Completion checklist';
        $lines[] = '';
        if ($issues === []) {
            $lines[] = '- [ ] Review latest snapshot and confirm no outstanding issues.';
        } else {
            foreach ($issues as $issue) {
                $lines[] = sprintf('- [ ] %s (%s)', $issue['title'], $issue['severity']);
            }
        }
        $lines[] = '';
        $lines[] = sprintf('Snapshot JSON: docs/next/snapshots/issues-%s.json', $dateString);
        $lines[] = '';

        return implode("\n", $lines);
    }

    /**
     * @param array<int, array<string, mixed>> $issues
     */
    private function renderIssueSection(string $title, array $issues): string
    {
        $lines = [$title, ''];
        if ($issues === []) {
            $lines[] = '- None.';
            $lines[] = '';
            return implode("\n", $lines);
        }

        foreach ($issues as $issue) {
            $lines[] = sprintf('- **%s** (`%s`)', $issue['title'], $issue['domain']);
            if (! empty($issue['suggested_fix'])) {
                $fixes = is_array($issue['suggested_fix']) ? $issue['suggested_fix'] : [$issue['suggested_fix']];
                foreach ($fixes as $fix) {
                    $lines[] = sprintf('  - %s', $fix);
                }
            }
            if (! empty($issue['evidence'])) {
                $lines[] = '  - Evidence: ' . $this->summarizeEvidence($issue['evidence']);
            }
        }

        $lines[] = '';
        return implode("\n", $lines);
    }

    /**
     * @param array<int, array<string, mixed>> $issues
     */
    private function renderAiWorkQueue(array $issues): string
    {
        $queue = array_values(array_filter($issues, static fn (array $issue): bool => (bool) ($issue['auto_queue'] ?? false)));
        $lines = ['🧠 AI Work Queue (things your worker can do safely)', ''];

        if ($queue === []) {
            $lines[] = '- None queued.';
            $lines[] = '';
            return implode("\n", $lines);
        }

        foreach ($queue as $issue) {
            $lines[] = sprintf('- %s (%s)', $issue['title'], $issue['owner']);
        }

        $lines[] = '';
        return implode("\n", $lines);
    }

    /**
     * @param array<int, array<string, mixed>> $issues
     */
    private function renderPromptSection(string $title, array $issues, string $target): string
    {
        $lines = [$title, ''];
        $filtered = array_filter($issues, static fn (array $issue): bool => ($issue['owner'] ?? '') === $target);

        if ($filtered === []) {
            $lines[] = '- None.';
            $lines[] = '';
            return implode("\n", $lines);
        }

        foreach ($filtered as $issue) {
            $promptKey = $target === 'chatgpt' ? 'chatgpt_prompt' : 'codex_prompt';
            $prompt = (string) ($issue[$promptKey] ?? '');
            if ($prompt === '') {
                continue;
            }
            $lines[] = sprintf('**%s**', $issue['title']);
            $lines[] = '```';
            $lines[] = $prompt;
            $lines[] = '```';
            $lines[] = '';
        }

        return implode("\n", $lines);
    }

    /**
     * @param array<string, mixed> $evidence
     */
    private function summarizeEvidence(array $evidence): string
    {
        if (isset($evidence['file'])) {
            return sprintf('%s:%s', $evidence['file'], (string) ($evidence['constructor_line'] ?? ''));
        }

        if (isset($evidence['matches'])) {
            $matches = (array) $evidence['matches'];
            return $matches[0] ?? 'see snapshot';
        }

        if (isset($evidence['failures']) || isset($evidence['warnings'])) {
            $failures = count((array) ($evidence['failures'] ?? []));
            $warnings = count((array) ($evidence['warnings'] ?? []));
            return sprintf('%d failures, %d warnings', $failures, $warnings);
        }

        if (isset($evidence['issues'])) {
            $issues = (array) $evidence['issues'];
            return sprintf('%d issue(s)', count($issues));
        }

        return 'see snapshot';
    }

    private function writeDocs(string $markdown): void
    {
        $target = ROOTPATH . 'docs/next/Next-Steps.md';
        $dir = dirname($target);
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
        file_put_contents($target, $markdown);
    }

    /**
     * @param array<int, array<string, mixed>> $issues
     */
    private function writeSnapshot(array $issues, string $generatedAt, string $dateString): void
    {
        $dir = ROOTPATH . 'docs/next/snapshots';
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $payload = [
            'generated_at' => $generatedAt,
            'environment' => $this->resolveEnvironmentLabel(),
            'issue_count' => count($issues),
            'issues' => array_values($issues),
        ];

        $path = ROOTPATH . 'docs/_ops/next-steps.json';
        @mkdir(dirname($path), 0775, true);
        file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT));
    }

    /**
     * @param array<int, array<string, mixed>> $issues
     */
    private function enqueueAiOpsTasks(array $issues): void
    {
        $model = new AiOpsTaskModel();

        foreach ($issues as $issue) {
            $model->upsertFromIssue($issue);
        }
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function scanLatestLogIssue(): array
    {
        $logPath = $this->resolveTodayLogPath();
        if ($logPath === null) {
            return [];
        }

        $content = $this->readFileSafe($logPath);
        if ($content === null || $content === '') {
            return [];
        }

        if (! preg_match('/(ERROR|CRITICAL|EMERGENCY|exception)/i', $content)) {
            return [];
        }

        return [[
            'id' => sha1('log-scan-' . $logPath),
            'domain' => 'ops',
            'severity' => 'P0',
            'title' => 'Runtime logs include errors today',
            'evidence' => [
                'log_file' => $logPath,
            ],
            'suggested_fix' => [
                'Review the latest log entries for stack traces.',
                'Resolve errors and verify the application health.',
            ],
            'ai_prompt' => 'Review latest writable log entries for errors and summarize fixes.',
            'owner' => 'human',
            'status' => 'open',
        ]];
    }

    private function resolveTodayLogPath(): ?string
    {
        $logDir = ROOTPATH . 'writable/logs';
        if (! is_dir($logDir)) {
            return null;
        }

        $date = date('Y-m-d');
        $path = $logDir . DIRECTORY_SEPARATOR . 'log-' . $date . '.php';
        if (is_file($path)) {
            return $path;
        }

        return null;
    }

    private function readFileSafe(string $path): ?string
    {
        $maxBytes = 2 * 1024 * 1024;
        $size = @filesize($path);
        if ($size === false) {
            return null;
        }

        if ($size > $maxBytes) {
            $fh = @fopen($path, 'rb');
            if (! $fh) {
                return null;
            }

            fseek($fh, -$maxBytes, SEEK_END);
            $data = stream_get_contents($fh);
            fclose($fh);
            return $data ?: null;
        }

        return @file_get_contents($path) ?: null;
    }

    private function resolveOption(array $params, string $key, ?string $default): ?string
    {
        $value = $default;
        foreach ($params as $index => $param) {
            if ($param === '--' . $key && isset($params[$index + 1])) {
                $value = $params[$index + 1];
                continue;
            }

            if (str_starts_with($param, '--' . $key . '=')) {
                $value = substr($param, strlen('--' . $key . '='));
            }
        }

        return $value;
    }

    private function resolveEnvironmentLabel(): string
    {
        $env = env('CI_ENVIRONMENT', 'production');
        $host = gethostname() ?: 'unknown-host';

        return sprintf('%s (%s)', $env, $host);
    }

    protected function isDestructive(): bool
    {
        return true;
    }
}
