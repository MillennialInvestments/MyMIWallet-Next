<?php

declare(strict_types=1);

namespace App\Services\AIOps;

use Config\Database;

/**
 * Platform form inventory + seeder readiness audit (GT-FORM-HARNESS-001).
 *
 * Default run is read-only: no submissions, no seeders, no DB queries, and
 * reports go to FormSubmissionPolicy::reportDir() (WRITEPATH or an external
 * directory), never into the source tree.
 *
 * Options:
 *  - dry_run (bool, default true)
 *  - policy (array)       FormSubmissionPolicy decision; submissions and seeders
 *                         run only when it is allowed AND dry_run is false
 *  - db_counts (bool)     read table row counts for seed readiness (read-only SELECTs)
 *  - seeder (string)      seeder to validate (run only under an allowed policy)
 *  - limit (int)          max files
 *  - report_dir (string)  override report location (must pass reportDir() rules)
 *  - write_reports (bool, default true)
 */
class FormDebugSeederAuditService
{
    public function run(array $options = []): array
    {
        $dryRun = (bool) ($options['dry_run'] ?? true);
        $policy = is_array($options['policy'] ?? null) ? $options['policy'] : ['allowed' => false, 'reason' => 'policy_missing'];
        $live   = ! $dryRun && ($policy['allowed'] ?? false) === true;
        $limit  = isset($options['limit']) ? max(1, (int) $options['limit']) : null;

        $seederResult = $this->maybeRunSeeder($options['seeder'] ?? null, ! $live);

        $formFiles = $this->discoverFormFiles();
        if ($limit !== null) {
            $formFiles = array_slice($formFiles, 0, $limit);
        }

        $dbTableCounts = ! empty($options['db_counts']) ? $this->safeTableCounts() : [];
        $intelligence  = new FormIntelligenceService();
        $executor      = new FormTestExecutor();

        $corpus = $this->referenceCorpus();

        $entries = [];
        foreach ($formFiles as $file) {
            $rel = $this->relative($file);
            $referenced = $this->isViewReferenced($rel, $corpus);
            foreach ($intelligence->inventory((string) @file_get_contents($file), $rel) as $entry) {
                $entry['view_referenced'] = $referenced;
                $entry['seed_readiness'] = $dbTableCounts === []
                    ? ['note' => 'DB counts not requested (--with-db-counts).']
                    : $this->reviewSeedReadiness($file, $entry, $dbTableCounts);

                $entry['submission'] = ['executed' => false, 'status' => 'SKIPPED', 'reason' => $live ? 'not_selected' : 'dry_run'];
                if ($live && $entry['kind'] === 'form' && $entry['status'] === FormIntelligenceService::STATUS_PASS) {
                    $execution = $executor->execute(['ok' => true, 'source' => ['type' => 'file', 'value' => $rel], 'forms' => [$entry]], ['policy' => $policy]);
                    $entry['submission'] = [
                        'executed'       => ($execution['test_id'] ?? null) !== null,
                        'status'         => ($execution['error_detected'] ?? false) ? 'FAIL' : (($execution['ok'] ?? false) ? 'PASS' : ($execution['status'] ?? 'BLOCKED')),
                        'test_id'        => $execution['test_id'] ?? null,
                        'http_status'    => $execution['submit']['status'] ?? null,
                    ];
                    if ((int) ($execution['submit']['status'] ?? 0) === 0) {
                        $entry['submission']['error'] = mb_substr((string) ($execution['submit']['body'] ?? ($execution['reason'] ?? '')), 0, 160);
                    }
                }
                $entries[] = $entry;
            }
        }

        $report = [
            'schema'           => 'mymi.form-inventory.v1',
            'generated_at_utc' => gmdate('Y-m-d\TH:i:s\Z'),
            'source_sha'       => $this->sourceSha(),
            'options'          => [
                'dry_run'   => $dryRun,
                'live'      => $live,
                'policy'    => $policy['reason'] ?? null,
                'db_counts' => $dbTableCounts !== [],
                'limit'     => $limit,
            ],
            'seeder'  => $seederResult,
            'session' => $executor->sessionNotes(),
            'summary' => $this->buildSummary($entries, $formFiles),
            'forms'   => $entries,
        ];

        if (($options['write_reports'] ?? true) !== false) {
            $report['report_files'] = $this->writeReports($report, $options['report_dir'] ?? null);
        }

        return $report;
    }

    /**
     * FAIL entries as stable baseline lines (no line numbers):
     * file <TAB> kind <TAB> METHOD <TAB> action <TAB> reason
     *
     * @return list<string>
     */
    public static function gapLines(array $entries): array
    {
        $lines = [];
        foreach ($entries as $e) {
            if (($e['status'] ?? '') === FormIntelligenceService::STATUS_FAIL) {
                $lines[] = implode("\t", [$e['file'], $e['kind'], $e['method'], $e['action'], $e['reason']]);
            }
        }
        $lines = array_values(array_unique($lines));
        sort($lines, SORT_STRING);

        return $lines;
    }

    /**
     * All PHP under app/ keyed by relative path, used to tell whether a view
     * is rendered or included anywhere (UNREACHABLE when it is not).
     *
     * @return array<string, string>
     */
    private function referenceCorpus(): array
    {
        $out = [];
        $it  = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(APPPATH, \FilesystemIterator::SKIP_DOTS));
        foreach ($it as $f) {
            if ($f->isFile() && str_ends_with($f->getFilename(), '.php')) {
                $out[$this->relative($f->getPathname())] = (string) @file_get_contents($f->getPathname());
            }
        }

        return $out;
    }

    /**
     * Heuristic: the view's last two path segments (without .php), e.g.
     * "<Folder>/<View>", appear in another PHP file as a view name.
     * Null when the file is not under a Views directory.
     */
    private function isViewReferenced(string $rel, array $corpus): ?bool
    {
        if (! preg_match('#/Views/(.+)\.(php|html)$#', $rel, $m)) {
            return null;
        }
        $parts = explode('/', $m[1]);
        $tail  = array_slice($parts, -2);
        $name  = end($parts);
        $re    = '#' . implode('[\\\\/]+', array_map(static fn ($p) => preg_quote($p, '#'), $tail)) . '(?:\.php)?(?![\w\\\\/-])#';

        foreach ($corpus as $path => $code) {
            if ($path === $rel || ! str_contains($code, $name)) {
                continue;
            }
            if (preg_match($re, $code) === 1) {
                return true;
            }
        }

        return false;
    }

    private function relative(string $file): string
    {
        $root = rtrim(realpath(ROOTPATH) ?: ROOTPATH, '/') . '/';
        $real = realpath($file) ?: $file;

        return str_starts_with($real, $root) ? substr($real, strlen($root)) : $real;
    }

    private function sourceSha(): ?string
    {
        $head = ROOTPATH . '.git/HEAD';
        if (! is_file($head)) {
            return null;
        }
        $ref = trim((string) @file_get_contents($head));
        if (str_starts_with($ref, 'ref: ')) {
            $refFile = ROOTPATH . '.git/' . substr($ref, 5);

            return is_file($refFile) ? trim((string) @file_get_contents($refFile)) : null;
        }

        return $ref !== '' ? $ref : null;
    }

    /** $dryRun is true unless a live, policy-approved run was requested. */
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
                if ($content !== '' && preg_match('/<form\b|form_open(_multipart)?\(|\bfetch\(|\$\.(ajax|post|get)\(|\baxios\./i', $content) === 1) {
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
        $action = strtolower((string) ($analysis['action'] ?? ''));
        $inputs = array_map(
            static fn ($v) => strtolower(is_array($v) ? (string) ($v['name'] ?? '') : (string) $v),
            (array) ($analysis['inputs'] ?? [])
        );

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

    private function buildSummary(array $entries, array $formFiles): array
    {
        $byStatus = ['PASS' => 0, 'FAIL' => 0, 'BLOCKED' => 0, 'SKIPPED' => 0];
        $byReason = [];
        $byKind   = [];
        $unreferencedFails = 0;
        $unreferencedFiles = [];
        $submitted = 0;
        $withGaps = 0;
        $live = ['PASS' => 0, 'FAIL' => 0, 'BLOCKED' => 0, 'SKIPPED' => 0];
        $liveFails = [];

        foreach ($entries as $e) {
            $byStatus[$e['status']] = ($byStatus[$e['status']] ?? 0) + 1;
            $byReason[$e['reason']] = ($byReason[$e['reason']] ?? 0) + 1;
            $byKind[$e['kind']]     = ($byKind[$e['kind']] ?? 0) + 1;
            if (($e['view_referenced'] ?? null) === false) {
                $unreferencedFiles[$e['file']] = true;
                if ($e['status'] === FormIntelligenceService::STATUS_FAIL) {
                    $unreferencedFails++;
                }
            }
            if (($e['submission']['executed'] ?? false) === true) {
                $submitted++;
            }
            $subStatus = (string) ($e['submission']['status'] ?? 'SKIPPED');
            if (($e['submission']['reason'] ?? null) !== 'dry_run' && ($e['submission']['reason'] ?? null) !== 'not_selected') {
                $live[$subStatus] = ($live[$subStatus] ?? 0) + 1;
                if ($subStatus === 'FAIL') {
                    $liveFails[] = sprintf('%s %s %s -> HTTP %s%s', $e['file'] ?? '?', $e['method'] ?? '?', $e['action'] ?? '?', $e['submission']['http_status'] ?? '?', isset($e['submission']['error']) ? ' (' . $e['submission']['error'] . ')' : '');
                }
            }
            if (! empty($e['seed_readiness']['missing_seed_tables'])) {
                $withGaps++;
            }
        }
        ksort($byReason);
        ksort($byKind);

        return [
            'files_scanned'        => count($formFiles),
            'entries'              => count($entries),
            'forms_discovered'     => $byKind['form'] ?? 0,
            'js_requests'          => $byKind['js'] ?? 0,
            'forms_analyzed'       => count($entries),
            'forms_with_data_gaps' => $withGaps,
            'forms_submitted'      => $submitted,
            'live_submissions'     => $live,
            'live_fails'           => $liveFails,
            'by_status'            => $byStatus,
            'unreferenced_view_files' => count($unreferencedFiles),
            'fails_in_unreferenced_views' => $unreferencedFails,
            'by_reason'            => $byReason,
        ];
    }

    private function writeReports(array $report, ?string $override = null): array
    {
        $dir = FormSubmissionPolicy::reportDir($override);
        if (! is_dir($dir) && ! @mkdir($dir, 0775, true) && ! is_dir($dir)) {
            return ['error' => 'Could not create report directory: ' . $dir];
        }

        $stamp = gmdate('Ymd_His');
        $json  = $dir . '/form-inventory-' . $stamp . '.json';
        $md    = $dir . '/form-inventory-' . $stamp . '.md';

        @file_put_contents($json, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        @file_put_contents($md, $this->toMarkdown($report));

        return ['json' => $json, 'markdown' => $md];
    }

    private function toMarkdown(array $report): string
    {
        $summary = $report['summary'] ?? [];
        $lines = [
            '# Form inventory report',
            '',
            '- Generated (UTC): ' . ($report['generated_at_utc'] ?? ''),
            '- Source SHA: ' . ($report['source_sha'] ?? 'unknown'),
            '- Live submissions: ' . (! empty($report['options']['live']) ? 'yes' : 'no') . ' (policy: ' . ($report['options']['policy'] ?? '') . ')',
            '- Files scanned: ' . ($summary['files_scanned'] ?? 0) . '; forms: ' . ($summary['forms_discovered'] ?? 0) . '; JS requests: ' . ($summary['js_requests'] ?? 0),
            '',
            '| Status | Count |',
            '|---|---|',
        ];
        foreach ((array) ($summary['by_status'] ?? []) as $status => $n) {
            $lines[] = '| ' . $status . ' | ' . $n . ' |';
        }
        $lines[] = '';
        $lines[] = '| Key | Status | Reason | Kind | Method | Action | Source |';
        $lines[] = '|---|---|---|---|---|---|---|';
        foreach ((array) ($report['forms'] ?? []) as $e) {
            $lines[] = sprintf('| %s | %s | %s | %s | %s | `%s` | %s:%d |',
                $e['key'], $e['status'], $e['reason'], $e['kind'], $e['method'],
                str_replace('|', '\|', (string) $e['action']), $e['file'], $e['line']);
        }

        return implode("\n", $lines) . "\n";
    }
}
