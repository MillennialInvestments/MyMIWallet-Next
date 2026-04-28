<?php

declare(strict_types=1);

namespace App\Services\AIOps;

use Config\Database;

class FormDebugSeederAuditService
{
    public function run(array $options = []): array
    {
        $dryRun = (bool) ($options['dry_run'] ?? true);
        $seederInput = $options['seeder'] ?? null;
        $submitEnabled = (bool) ($options['submit'] ?? false);
        $limit = isset($options['limit']) ? max(1, (int) $options['limit']) : null;

        $seederResult = $this->maybeRunSeeder($seederInput, $dryRun);

        $formFiles = $this->discoverFormFiles();
        if ($limit !== null) {
            $formFiles = array_slice($formFiles, 0, $limit);
        }

        $dbTableCounts = $this->safeTableCounts();
        $intelligence = new FormIntelligenceService();
        $executor = new FormTestExecutor();

        $forms = [];
        foreach ($formFiles as $file) {
            $html = (string) @file_get_contents($file);
            $analysis = $intelligence->analyze(['type' => 'file', 'value' => $file]);

            $tableReview = $this->reviewSeedReadiness($file, $analysis, $dbTableCounts);
            $submission = [
                'executed' => false,
                'reason' => 'Dry-run or submit disabled.',
            ];

            if ($submitEnabled && ($analysis['ok'] ?? false)) {
                $execution = $executor->execute($analysis);
                $submission = [
                    'executed' => true,
                    'test_id' => $execution['test_id'] ?? null,
                    'error_detected' => (bool) ($execution['error_detected'] ?? false),
                    'status' => $execution['submit']['status'] ?? null,
                    'final_url' => $execution['submit']['final_url'] ?? null,
                ];
            }

            $forms[] = [
                'file' => $file,
                'contains_form' => str_contains(strtolower($html), '<form'),
                'analysis_ok' => (bool) ($analysis['ok'] ?? false),
                'form' => $analysis['form'] ?? null,
                'route' => $analysis['route'] ?? null,
                'seed_readiness' => $tableReview,
                'seeder_recommendation' => $this->recommendSeeder($tableReview),
                'submission' => $submission,
            ];
        }

        $report = [
            'generated_at_utc' => gmdate('Y-m-d H:i:s'),
            'options' => [
                'dry_run' => $dryRun,
                'submit' => $submitEnabled,
                'limit' => $limit,
            ],
            'seeder' => $seederResult,
            'summary' => $this->buildSummary($forms, $formFiles),
            'forms' => $forms,
        ];

        $reportFiles = $this->writeReports($report);
        $report['report_files'] = $reportFiles;

        return $report;
    }

    private function maybeRunSeeder($seederInput, bool $dryRun): array
    {
        if (! is_string($seederInput) || trim($seederInput) === '') {
            return ['requested' => false, 'executed' => false, 'note' => 'No seeder provided.'];
        }

        $resolved = $this->resolveSeederClass($seederInput);
        if ($resolved === null) {
            return [
                'requested' => true,
                'executed' => false,
                'note' => 'Seeder not found: ' . $seederInput,
            ];
        }

        if ($dryRun) {
            return [
                'requested' => true,
                'executed' => false,
                'seeder' => $resolved,
                'note' => 'Dry-run: seeder was validated but not executed.',
            ];
        }

        $db = Database::connect();
        try {
            $db->transBegin();
            $seeder = \Config\Database::seeder();
            $seeder->call($resolved);
            $db->transCommit();

            return [
                'requested' => true,
                'executed' => true,
                'seeder' => $resolved,
                'note' => 'Seeder executed successfully.',
            ];
        } catch (\Throwable $e) {
            if ($db->transStatus()) {
                $db->transRollback();
            }

            return [
                'requested' => true,
                'executed' => false,
                'seeder' => $resolved,
                'note' => 'Seeder execution failed: ' . $e->getMessage(),
            ];
        }
    }

    private function resolveSeederClass(string $input): ?string
    {
        $seedDir = APPPATH . 'Database/Seeds/';
        $normalized = trim($input);

        if (str_ends_with($normalized, '.php')) {
            $normalized = substr($normalized, 0, -4);
        }

        $candidateClass = 'App\\Database\\Seeds\\' . $normalized;
        if (class_exists($candidateClass) || is_file($seedDir . $normalized . '.php')) {
            return $normalized;
        }

        $files = glob($seedDir . '*.php') ?: [];
        foreach ($files as $file) {
            $base = basename($file, '.php');
            if (strcasecmp($base, $normalized) === 0) {
                return $base;
            }
        }

        return null;
    }

    private function discoverFormFiles(): array
    {
        $dirs = [APPPATH . 'Views', APPPATH . 'Modules'];
        $files = [];

        foreach ($dirs as $dir) {
            if (! is_dir($dir)) {
                continue;
            }

            $it = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS)
            );

            foreach ($it as $file) {
                if (! $file->isFile()) {
                    continue;
                }

                $path = $file->getPathname();
                if (! preg_match('/\.(php|html)$/i', $path)) {
                    continue;
                }

                $content = (string) @file_get_contents($path);
                if ($content !== '' && preg_match('/<form\b/i', $content) === 1) {
                    $files[] = $path;
                }
            }
        }

        sort($files);
        return $files;
    }

    private function safeTableCounts(): array
    {
        try {
            $db = Database::connect();
            $tables = $db->listTables();
            $counts = [];

            foreach ($tables as $table) {
                try {
                    $count = (int) $db->table($table)->countAllResults();
                    $counts[$table] = $count;
                } catch (\Throwable $e) {
                    $counts[$table] = -1;
                }
            }

            return $counts;
        } catch (\Throwable $e) {
            return [];
        }
    }

    private function reviewSeedReadiness(string $file, array $analysis, array $tableCounts): array
    {
        $form = (array) ($analysis['form'] ?? []);
        $action = strtolower((string) ($form['action'] ?? ''));
        $inputs = array_map(static fn($v) => strtolower((string) $v), (array) ($form['inputs'] ?? []));

        $tokens = array_filter(array_unique(array_merge(
            preg_split('/[^a-z0-9]+/i', basename($file)) ?: [],
            preg_split('/[^a-z0-9]+/i', $action) ?: [],
            $inputs
        )), static fn($t) => is_string($t) && strlen($t) >= 4);

        $matched = [];
        foreach ($tableCounts as $table => $count) {
            $name = strtolower((string) $table);
            foreach ($tokens as $token) {
                if (str_contains($name, (string) $token)) {
                    $matched[$table] = $count;
                    break;
                }
            }
        }

        $emptyMatches = array_filter($matched, static fn($count) => (int) $count === 0);

        return [
            'candidate_tables' => $matched,
            'missing_seed_tables' => array_keys($emptyMatches),
            'enough_data' => count($matched) === 0 ? null : count($emptyMatches) === 0,
            'note' => count($matched) === 0
                ? 'No table candidates inferred from form/action/input tokens.'
                : (count($emptyMatches) === 0 ? 'Candidate tables have at least one row.' : 'Some candidate tables are empty.'),
        ];
    }

    private function recommendSeeder(array $seedReview): array
    {
        $missing = (array) ($seedReview['missing_seed_tables'] ?? []);

        if (empty($missing)) {
            return ['needed' => false, 'recommendation' => 'No additional seeder detected as necessary.'];
        }

        $seeders = array_map(static fn($f) => basename((string) $f, '.php'), glob(APPPATH . 'Database/Seeds/*.php') ?: []);
        $matches = [];

        foreach ($missing as $table) {
            $normalizedTable = strtolower((string) $table);
            foreach ($seeders as $seeder) {
                $normalizedSeeder = strtolower((string) $seeder);
                if (str_contains($normalizedSeeder, trim($normalizedTable, 'bf_'))) {
                    $matches[] = $seeder;
                }
            }
        }

        $matches = array_values(array_unique($matches));

        if (! empty($matches)) {
            return [
                'needed' => true,
                'recommendation' => 'Consider running: ' . implode(', ', $matches),
                'existing_seeders' => $matches,
            ];
        }

        return [
            'needed' => true,
            'recommendation' => 'Create a targeted seeder for tables: ' . implode(', ', $missing),
            'template_hint' => 'php spark make:seeder FormDebugTargetSeeder',
        ];
    }

    private function buildSummary(array $forms, array $formFiles): array
    {
        $withGaps = 0;
        $executed = 0;

        foreach ($forms as $form) {
            $missing = (array) ($form['seed_readiness']['missing_seed_tables'] ?? []);
            if (! empty($missing)) {
                $withGaps++;
            }

            if (($form['submission']['executed'] ?? false) === true) {
                $executed++;
            }
        }

        return [
            'forms_discovered' => count($formFiles),
            'forms_analyzed' => count($forms),
            'forms_with_data_gaps' => $withGaps,
            'forms_submitted' => $executed,
        ];
    }

    private function writeReports(array $report): array
    {
        $stamp = gmdate('Ymd_His');

        $docsDir = ROOTPATH . 'docs/_aiops/form-tests';
        $writableDir = WRITEPATH . 'aiops/form-tests';

        if (! is_dir($docsDir)) {
            @mkdir($docsDir, 0775, true);
        }

        if (! is_dir($writableDir)) {
            @mkdir($writableDir, 0775, true);
        }

        $docsMd = $docsDir . '/form-debug-seeder-audit-' . $stamp . '.md';
        $writableJson = $writableDir . '/form-debug-seeder-audit-' . $stamp . '.json';

        @file_put_contents($docsMd, $this->toMarkdown($report));
        @file_put_contents($writableJson, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return [
            'docs_markdown' => $docsMd,
            'writable_json' => $writableJson,
        ];
    }

    private function toMarkdown(array $report): string
    {
        $summary = $report['summary'] ?? [];
        $forms = $report['forms'] ?? [];
        $seeder = $report['seeder'] ?? [];

        $lines = [];
        $lines[] = '# Form Debug + Seeder Audit Report';
        $lines[] = '';
        $lines[] = '- Generated (UTC): ' . ($report['generated_at_utc'] ?? '');
        $lines[] = '- Dry Run: ' . (! empty($report['options']['dry_run']) ? 'yes' : 'no');
        $lines[] = '- Submission Enabled: ' . (! empty($report['options']['submit']) ? 'yes' : 'no');
        $lines[] = '- Seeder Note: ' . ($seeder['note'] ?? '');
        $lines[] = '';
        $lines[] = '## Summary';
        $lines[] = '';
        $lines[] = '- Forms discovered: ' . (string) ($summary['forms_discovered'] ?? 0);
        $lines[] = '- Forms analyzed: ' . (string) ($summary['forms_analyzed'] ?? 0);
        $lines[] = '- Forms with data gaps: ' . (string) ($summary['forms_with_data_gaps'] ?? 0);
        $lines[] = '- Forms submitted: ' . (string) ($summary['forms_submitted'] ?? 0);
        $lines[] = '';
        $lines[] = '## Form Review';
        $lines[] = '';

        foreach ($forms as $index => $form) {
            $lines[] = '### ' . ($index + 1) . '. ' . (($form['file'] ?? 'unknown'));
            $lines[] = '- Analysis OK: ' . (($form['analysis_ok'] ?? false) ? 'yes' : 'no');
            $lines[] = '- Action: ' . (($form['form']['action'] ?? '(none)'));
            $lines[] = '- Method: ' . (($form['form']['method'] ?? '(none)'));
            $lines[] = '- Inputs: ' . implode(', ', (array) ($form['form']['inputs'] ?? []));
            $lines[] = '- Seed Note: ' . (($form['seed_readiness']['note'] ?? ''));
            $lines[] = '- Missing Seed Tables: ' . implode(', ', (array) ($form['seed_readiness']['missing_seed_tables'] ?? []));
            $lines[] = '- Seeder Recommendation: ' . (($form['seeder_recommendation']['recommendation'] ?? ''));
            $lines[] = '- Submission: ' . (! empty($form['submission']['executed']) ? 'executed' : 'not executed');
            $lines[] = '';
        }

        return implode("\n", $lines) . "\n";
    }
}
