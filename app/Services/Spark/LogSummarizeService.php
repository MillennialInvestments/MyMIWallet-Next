<?php

namespace App\Services\Spark;

use CodeIgniter\Log\Handlers\FileHandler;
use Config\Database;
use DateInterval;
use DateTimeImmutable;
use DateTimeZone;

class LogSummarizeService
{
    public function summarizeForDate(
        string $date,
        bool $dryRun = false,
        bool $createPr = false,
        ?DateTimeImmutable $rangeEnd = null
    ): array {
        $timezone = new DateTimeZone(config('App')->appTimezone ?? 'UTC');
        $rangeEnd = $rangeEnd ?? new DateTimeImmutable('now', $timezone);
        $rangeStart = $rangeEnd->sub(new DateInterval('PT24H'));

        $baseDir = rtrim(WRITEPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'aiops/logs';
        $dirs = [
            $baseDir . '/summaries',
            $baseDir . '/json',
            $baseDir . '/csv',
            $baseDir . '/audit',
            $baseDir . '/locks',
            $baseDir . '/state',
            $baseDir . '/prs',
        ];
        foreach ($dirs as $dir) {
            if (! is_dir($dir)) {
                mkdir($dir, 0775, true);
            }
        }

        $lockPath = $baseDir . '/locks/logs-summarize.lock';
        $lock = $this->acquireLock($lockPath);
        if (! $lock['ok']) {
            return [
                'ok' => false,
                'message' => $lock['message'],
                'lock' => $lock,
            ];
        }

        $audit = [
            'run_id' => bin2hex(random_bytes(4)),
            'date' => $date,
            'range_start' => $rangeStart->format('c'),
            'range_end' => $rangeEnd->format('c'),
            'dry_run' => $dryRun,
            'create_pr' => $createPr,
            'started_at' => gmdate('c'),
        ];

        try {
            $logFiles = $this->resolveLogFiles();
            $fileEntries = $this->parseLogFiles($logFiles, $rangeStart, $rangeEnd);
            $dbEntries = $this->fetchDbLogEntries($rangeStart, $rangeEnd);
            $entries = array_merge($fileEntries, $dbEntries);

            $analysis = $this->analyzeEntries($entries);
            $analysis['range'] = [
                'start' => $rangeStart->format('c'),
                'end' => $rangeEnd->format('c'),
            ];
            $analysis['source_files'] = $logFiles;
            $analysis['db_rows'] = count($dbEntries);

            $regressions = $this->detectRegressions($analysis['error_fingerprints'], $baseDir . '/state/last-summary.json');
            $analysis['regressions'] = $regressions;

            $actionables = $this->identifyActionables($analysis['deduped']);
            $analysis['actionables'] = $actionables;

            $summaryPath = $baseDir . '/summaries/' . $date . '-log-summary.md';
            $jsonPath = $baseDir . '/json/' . $date . '-log-summary.json';
            $csvPath = $baseDir . '/csv/' . $date . '-log-summary.csv';

            $markdown = $this->renderMarkdownSummary($analysis, $date);
            $jsonPayload = $this->buildJsonSummary($analysis, $date);
            $csvPayload = $this->renderCsv($analysis);

            $prBundles = [];
            if (! $dryRun) {
                file_put_contents($summaryPath, $markdown);
                file_put_contents($jsonPath, json_encode($jsonPayload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
                file_put_contents($csvPath, $csvPayload);

                file_put_contents($baseDir . '/state/last-summary.json', json_encode([
                    'date' => $date,
                    'created_at' => gmdate('c'),
                    'error_fingerprints' => $analysis['error_fingerprints'],
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

                if ($createPr && $actionables !== []) {
                    $prBundles = $this->writePrBundles($actionables, $analysis, $date, $baseDir);
                }
            }

            $audit['completed_at'] = gmdate('c');
            $audit['total_entries'] = $analysis['total_entries'];
            $audit['deduped_count'] = count($analysis['deduped']);
            $audit['actionables'] = count($actionables);
            $audit['pr_bundles'] = $prBundles;
            $audit['status'] = 'ok';

            $this->writeAuditLog($baseDir . '/audit', $audit);

            return [
                'ok' => true,
                'dry_run' => $dryRun,
                'date' => $date,
                'range_start' => $rangeStart->format('c'),
                'range_end' => $rangeEnd->format('c'),
                'summary_path' => $summaryPath,
                'json_path' => $jsonPath,
                'csv_path' => $csvPath,
                'total_entries' => $analysis['total_entries'],
                'deduped' => count($analysis['deduped']),
                'error_total' => $analysis['counts']['errors'],
                'warning_total' => $analysis['counts']['warnings'],
                'notice_total' => $analysis['counts']['notices'],
                'regressions' => $regressions,
                'actionables' => $actionables,
                'pr_bundles' => $prBundles,
            ];
        } finally {
            $this->releaseLock($lockPath);
        }
    }

    /**
     * @return array<int, string>
     */
    private function resolveLogFiles(): array
    {
        $loggerConfig = config('Logger');
        $fileConfig = $loggerConfig->handlers[FileHandler::class] ?? [];

        $path = $fileConfig['path'] ?? WRITEPATH . 'logs/';
        $path = $path === '' ? WRITEPATH . 'logs/' : rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        $candidates = [];
        foreach (['*.log', 'log-*.php', 'log-*.log'] as $pattern) {
            foreach (glob($path . $pattern) ?: [] as $file) {
                if (is_file($file) && filesize($file) > 0) {
                    $candidates[] = $file;
                }
            }
        }

        return array_values(array_unique($candidates));
    }

    /**
     * @param array<int, string> $files
     * @return array<int, array<string, mixed>>
     */
    private function parseLogFiles(array $files, DateTimeImmutable $rangeStart, DateTimeImmutable $rangeEnd): array
    {
        $entries = [];
        $pattern = '/^(DEBUG|INFO|NOTICE|WARNING|ERROR|CRITICAL|ALERT|EMERGENCY)\s*-\s*' .
            '(\d{4}-\d{2}-\d{2}\s+\d{2}:\d{2}:\d{2})\s*-->\s*(.*)$/';

        foreach ($files as $file) {
            $lines = file($file, FILE_IGNORE_NEW_LINES);
            if ($lines === false) {
                continue;
            }

            $current = null;

            foreach ($lines as $line) {
                if (preg_match($pattern, $line, $matches)) {
                    if ($current !== null) {
                        $entries[] = $current;
                    }

                    $level = strtoupper(trim($matches[1]));
                    $timestamp = trim($matches[2]);
                    $message = trim($matches[3]);

                    $entryTime = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $timestamp, $rangeStart->getTimezone());
                    if (! $entryTime) {
                        $current = null;
                        continue;
                    }

                    if ($entryTime < $rangeStart || $entryTime > $rangeEnd) {
                        $current = null;
                        continue;
                    }

                    $current = [
                        'timestamp' => $entryTime->format('Y-m-d H:i:s'),
                        'level' => $level,
                        'message' => $message,
                        'source' => 'file',
                        'file' => null,
                        'line' => null,
                        'exception' => null,
                        'raw' => $message,
                    ];
                    continue;
                }

                if ($current !== null && trim($line) !== '') {
                    $current['message'] .= "\n" . rtrim($line);
                    $current['raw'] .= "\n" . rtrim($line);
                }
            }

            if ($current !== null) {
                $entries[] = $current;
            }
        }

        return $entries;
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function fetchDbLogEntries(DateTimeImmutable $rangeStart, DateTimeImmutable $rangeEnd): array
    {
        $entries = [];

        try {
            $db = Database::connect();

            if (method_exists($db, 'tableExists') && ! $db->tableExists('bf_error_logs')) {
                return [];
            }

            $builder = $db->table('bf_error_logs');
            $builder->select('level, message, file, line, created_at');
            $builder->where('created_at >=', $rangeStart->format('Y-m-d H:i:s'));
            $builder->where('created_at <=', $rangeEnd->format('Y-m-d H:i:s'));
            $builder->orderBy('created_at', 'ASC');

            $rows = $builder->get()->getResultArray();
            foreach ($rows as $row) {
                $timestamp = $row['created_at'] ?? null;
                if (! $timestamp) {
                    continue;
                }
                $entries[] = [
                    'timestamp' => $timestamp,
                    'level' => strtoupper((string) ($row['level'] ?? 'ERROR')),
                    'message' => (string) ($row['message'] ?? ''),
                    'source' => 'db',
                    'file' => $row['file'] ?? null,
                    'line' => $row['line'] ?? null,
                    'exception' => null,
                    'raw' => (string) ($row['message'] ?? ''),
                ];
            }
        } catch (\Throwable $e) {
            log_message('warning', '[logs:summarize] Unable to read bf_error_logs', ['error' => $e->getMessage()]);
        }

        return $entries;
    }

    /**
     * @param array<int, array<string, mixed>> $entries
     * @return array<string, mixed>
     */
    private function analyzeEntries(array $entries): array
    {
        $deduped = [];
        $counts = [
            'errors' => 0,
            'warnings' => 0,
            'notices' => 0,
        ];

        foreach ($entries as $entry) {
            $category = $this->classifyLevel($entry['level']);
            $counts[$category . 's']++;

            $normalized = $this->normalizeMessage($entry['message']);
            $fileLine = $this->extractFileLine($entry['message']);
            $exception = $this->extractException($entry['message']);

            $fingerprint = implode('|', [
                $category,
                $exception ?? 'none',
                $fileLine['file'] ?? 'unknown',
                $fileLine['line'] ?? '0',
                $normalized,
            ]);

            if (! isset($deduped[$fingerprint])) {
                $deduped[$fingerprint] = [
                    'fingerprint' => $fingerprint,
                    'category' => $category,
                    'level' => $entry['level'],
                    'count' => 0,
                    'message' => $entry['message'],
                    'normalized' => $normalized,
                    'exception' => $exception,
                    'file' => $fileLine['file'] ?? $entry['file'],
                    'line' => $fileLine['line'] ?? $entry['line'],
                    'sample_timestamp' => $entry['timestamp'],
                    'sources' => [],
                ];
            }

            $deduped[$fingerprint]['count']++;
            $deduped[$fingerprint]['sources'][] = $entry['source'];
        }

        $errorGroups = [];
        foreach ($deduped as $item) {
            if ($item['category'] !== 'error') {
                continue;
            }
            $key = implode('|', [
                $item['file'] ?? 'unknown',
                $item['line'] ?? '0',
                $item['exception'] ?? 'unknown',
            ]);
            if (! isset($errorGroups[$key])) {
                $errorGroups[$key] = [
                    'file' => $item['file'],
                    'line' => $item['line'],
                    'exception' => $item['exception'],
                    'count' => 0,
                    'messages' => [],
                ];
            }
            $errorGroups[$key]['count'] += $item['count'];
            $errorGroups[$key]['messages'][] = $item['normalized'];
        }

        $errorFingerprints = array_values(array_map(
            static fn ($item) => $item['fingerprint'],
            array_filter($deduped, static fn ($item) => $item['category'] === 'error')
        ));

        return [
            'total_entries' => count($entries),
            'counts' => $counts,
            'deduped' => array_values($deduped),
            'error_groups' => array_values($errorGroups),
            'error_fingerprints' => $errorFingerprints,
        ];
    }

    private function classifyLevel(string $level): string
    {
        $level = strtoupper($level);

        if (in_array($level, ['ERROR', 'CRITICAL', 'ALERT', 'EMERGENCY'], true)) {
            return 'error';
        }

        if ($level === 'WARNING') {
            return 'warning';
        }

        return 'notice';
    }

    private function normalizeMessage(string $message): string
    {
        $firstLine = trim(strtok($message, "\n"));
        $firstLine = preg_replace('/\s+/', ' ', $firstLine);
        $firstLine = preg_replace('/\b0x[0-9a-f]+\b/i', '0x', $firstLine);

        return $firstLine ?? '';
    }

    /**
     * @return array{file: string|null, line: string|null}
     */
    private function extractFileLine(string $message): array
    {
        $patterns = [
            '/in\s+([^\s]+\.php)\s+on\s+line\s+(\d+)/i',
            '/([^\s]+\.php)[:\(](\d+)/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $message, $matches)) {
                return [
                    'file' => $matches[1],
                    'line' => $matches[2],
                ];
            }
        }

        return ['file' => null, 'line' => null];
    }

    private function extractException(string $message): ?string
    {
        if (preg_match('/\b([A-Za-z0-9_\\\\]+(?:Exception|Error))\b/', $message, $matches)) {
            return $matches[1];
        }

        return null;
    }

    /**
     * @param array<int, string> $current
     * @return array{regressions: array<int, string>, previous_date: string|null}
     */
    private function detectRegressions(array $current, string $stateFile): array
    {
        if (! is_file($stateFile)) {
            return ['regressions' => $current, 'previous_date' => null];
        }

        $payload = json_decode((string) file_get_contents($stateFile), true);
        $previous = $payload['error_fingerprints'] ?? [];
        if (! is_array($previous)) {
            $previous = [];
        }

        $regressions = array_values(array_diff($current, $previous));

        return [
            'regressions' => $regressions,
            'previous_date' => $payload['date'] ?? null,
        ];
    }

    /**
     * @param array<int, array<string, mixed>> $deduped
     * @return array<int, array<string, mixed>>
     */
    private function identifyActionables(array $deduped): array
    {
        $patterns = [
            'undefined_array_key' => [
                'regex' => '/Undefined (array key|index|offset)/i',
                'title' => 'Guard undefined array keys',
                'severity' => 'medium',
                'recommendation' => 'Add isset/array_key_exists checks or default values before reading keys.',
            ],
            'null_property' => [
                'regex' => '/Attempt to read property|Call to a member function .* on null|Trying to access array offset on value of type null/i',
                'title' => 'Add null guards before property access',
                'severity' => 'high',
                'recommendation' => 'Add null checks or early returns before accessing properties on nullable objects.',
            ],
            'deprecated_ci4' => [
                'regex' => '/deprecated/i',
                'title' => 'Replace deprecated CI4 usage',
                'severity' => 'low',
                'recommendation' => 'Update deprecated CodeIgniter methods to their supported replacements.',
            ],
            'psr4' => [
                'regex' => '/PSR-4|autoload/i',
                'title' => 'Resolve PSR-4 autoload violations',
                'severity' => 'medium',
                'recommendation' => 'Align class namespaces and file paths to the PSR-4 autoload standard.',
            ],
            'memory_exhaust' => [
                'regex' => '/Allowed memory size|Out of memory/i',
                'title' => 'Address memory exhaustion',
                'severity' => 'high',
                'recommendation' => 'Review memory usage, batch processing, and query limits to prevent exhaustion.',
            ],
            'db_fail' => [
                'regex' => '/SQLSTATE|Database Error|Query error|Deadlock found|Base table or view not found/i',
                'title' => 'Investigate repeated database failures',
                'severity' => 'high',
                'recommendation' => 'Review failing queries, add retries or safeguards, and validate schema assumptions.',
            ],
        ];

        $actionables = [];

        foreach ($deduped as $item) {
            foreach ($patterns as $key => $pattern) {
                if (preg_match($pattern['regex'], $item['message'])) {
                    $groupKey = implode('|', [
                        $key,
                        $item['file'] ?? 'unknown',
                    ]);

                    if (! isset($actionables[$groupKey])) {
                        $actionables[$groupKey] = [
                            'id' => $groupKey,
                            'type' => $key,
                            'title' => $pattern['title'],
                            'severity' => $pattern['severity'],
                            'file' => $item['file'],
                            'line' => $item['line'],
                            'recommendation' => $pattern['recommendation'],
                            'examples' => [],
                            'count' => 0,
                        ];
                    }

                    $actionables[$groupKey]['examples'][] = $item['normalized'];
                    $actionables[$groupKey]['count'] += $item['count'];
                }
            }
        }

        return array_values($actionables);
    }

    /**
     * @param array<string, mixed> $analysis
     */
    private function renderMarkdownSummary(array $analysis, string $date): string
    {
        $lines = [
            '# MyMI Wallet — AIOps Log Summary',
            '',
            '- Date: ' . $date,
            '- Range: ' . ($analysis['range']['start'] ?? '') . ' → ' . ($analysis['range']['end'] ?? ''),
            '- Total entries: ' . $analysis['total_entries'],
            '- Errors: ' . $analysis['counts']['errors'],
            '- Warnings: ' . $analysis['counts']['warnings'],
            '- Notices/Info: ' . $analysis['counts']['notices'],
            '',
            '## Top Error Groups',
        ];

        if ($analysis['error_groups'] === []) {
            $lines[] = '- ✅ No error groups found.';
        } else {
            foreach ($analysis['error_groups'] as $group) {
                $lines[] = sprintf(
                    '- %s:%s (%s) — %d occurrence(s)',
                    $group['file'] ?? 'unknown',
                    $group['line'] ?? 'n/a',
                    $group['exception'] ?? 'unknown',
                    $group['count']
                );
            }
        }

        $lines[] = '';
        $lines[] = '## Regressions (New Errors)';
        if (($analysis['regressions']['regressions'] ?? []) === []) {
            $lines[] = '- ✅ No new regressions detected.';
        } else {
            $lines[] = '- Previous summary date: ' . ($analysis['regressions']['previous_date'] ?? 'n/a');
            foreach ($analysis['regressions']['regressions'] as $fingerprint) {
                $lines[] = '  - ' . $fingerprint;
            }
        }

        $lines[] = '';
        $lines[] = '## Actionable Fixes';
        if ($analysis['actionables'] === []) {
            $lines[] = '- ✅ No actionable fixes detected.';
        } else {
            foreach ($analysis['actionables'] as $actionable) {
                $lines[] = sprintf(
                    '- **%s** (%s) — %d hit(s) %s',
                    $actionable['title'],
                    $actionable['severity'],
                    $actionable['count'],
                    $actionable['file'] ? 'in ' . $actionable['file'] : ''
                );
                $lines[] = '  - Recommendation: ' . $actionable['recommendation'];
            }
        }

        $lines[] = '';
        $lines[] = '## Sources';
        foreach ($analysis['source_files'] as $file) {
            $lines[] = '- ' . $file;
        }
        $lines[] = '- Database: bf_error_logs (' . $analysis['db_rows'] . ' rows)';
        $lines[] = '';

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    /**
     * @param array<string, mixed> $analysis
     * @return array<string, mixed>
     */
    private function buildJsonSummary(array $analysis, string $date): array
    {
        return [
            'date' => $date,
            'range' => $analysis['range'] ?? [],
            'counts' => $analysis['counts'],
            'total_entries' => $analysis['total_entries'],
            'error_groups' => $analysis['error_groups'],
            'regressions' => $analysis['regressions'],
            'actionables' => $analysis['actionables'],
            'deduped' => $analysis['deduped'],
            'sources' => [
                'files' => $analysis['source_files'],
                'db_rows' => $analysis['db_rows'],
            ],
        ];
    }

    /**
     * @param array<string, mixed> $analysis
     */
    private function renderCsv(array $analysis): string
    {
        $lines = ['category,level,count,exception,file,line,message'];
        foreach ($analysis['deduped'] as $item) {
            $lines[] = sprintf(
                '"%s","%s",%d,"%s","%s","%s","%s"',
                $item['category'],
                $item['level'],
                $item['count'],
                $this->csvEscape($item['exception'] ?? ''),
                $this->csvEscape($item['file'] ?? ''),
                $this->csvEscape($item['line'] ?? ''),
                $this->csvEscape($item['normalized'] ?? '')
            );
        }

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function csvEscape(string $value): string
    {
        return str_replace('"', '""', $value);
    }

    /**
     * @param array<int, array<string, mixed>> $actionables
     * @param array<string, mixed> $analysis
     * @return array<int, array<string, string>>
     */
    private function writePrBundles(array $actionables, array $analysis, string $date, string $baseDir): array
    {
        $bundles = [];

        foreach ($actionables as $actionable) {
            $slug = $this->slugify($actionable['type'] . '-' . ($actionable['file'] ?? 'general'));
            $bundleDir = $baseDir . '/prs/' . $date . '/' . $slug;

            if (! is_dir($bundleDir)) {
                mkdir($bundleDir, 0775, true);
            }

            $docPath = 'docs/aiops/logs/' . $date . '/' . $slug . '/README.md';
            $docBody = $this->renderFixDoc($actionable, $analysis, $date);
            $patch = $this->renderNewFilePatch($docPath, $docBody);

            $title = sprintf('aiops: %s (%s)', $actionable['title'], $date);
            $body = $this->renderPrBody($actionable, $analysis, $date, $docPath);

            $manifest = [
                'source' => 'logs:summarize',
                'slug' => $slug,
                'title' => $title,
                'created_at' => date('c'),
                'labels' => [
                    'aiops',
                    'logs',
                    'automated',
                    'severity:' . $actionable['severity'],
                ],
                'allow_auto_pr' => true,
                'requires_review' => true,
                'paths' => [$docPath],
                'risk' => $this->severityToRisk($actionable['severity']),
                'guardrails' => [
                    'no_migrations' => true,
                    'no_env_changes' => true,
                    'no_force_push' => true,
                    'no_auto_merge' => true,
                ],
            ];

            file_put_contents($bundleDir . '/pr.md', $body);
            file_put_contents($bundleDir . '/manifest.json', json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
            file_put_contents($bundleDir . '/changes.patch', $patch);

            $bundles[] = [
                'slug' => $slug,
                'path' => $bundleDir,
                'doc_path' => $docPath,
            ];
        }

        return $bundles;
    }

    private function renderFixDoc(array $actionable, array $analysis, string $date): string
    {
        $lines = [
            '# AIOps Log Fix Recommendation',
            '',
            '- Date: ' . $date,
            '- Severity: ' . $actionable['severity'],
            '- Type: ' . $actionable['type'],
            '- File: ' . ($actionable['file'] ?? 'unknown'),
            '- Line: ' . ($actionable['line'] ?? 'n/a'),
            '',
            '## Summary',
            $actionable['title'],
            '',
            '## Recommendation',
            $actionable['recommendation'],
            '',
            '## Evidence',
        ];

        foreach (array_slice($actionable['examples'], 0, 5) as $example) {
            $lines[] = '- ' . $example;
        }

        $lines[] = '';
        $lines[] = '## Risk Assessment';
        $lines[] = '- Low-risk documentation update only.';
        $lines[] = '';
        $lines[] = '## Rollback';
        $lines[] = '- Revert this documentation update.';
        $lines[] = '';

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function renderPrBody(array $actionable, array $analysis, string $date, string $docPath): string
    {
        $lines = [
            '# ' . $actionable['title'],
            '',
            '## Summary',
            sprintf('Automated log analysis detected %d occurrence(s) requiring attention.', $actionable['count']),
            '',
            '## Log references',
            '- Date: ' . $date,
            '- File: ' . ($actionable['file'] ?? 'unknown'),
            '- Line: ' . ($actionable['line'] ?? 'n/a'),
            '',
            '## Recommended Fix',
            $actionable['recommendation'],
            '',
            '## Risk Assessment',
            '- Severity: ' . $actionable['severity'],
            '- This PR contains documentation only; apply code fixes manually.',
            '',
            '## Rollback',
            '- Revert this PR commit.',
            '',
            '## Files',
            '- ' . $docPath,
            '',
            '## Labels',
            '- aiops',
            '- logs',
            '- automated',
            '- severity:' . $actionable['severity'],
            '',
        ];

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function severityToRisk(string $severity): string
    {
        return match ($severity) {
            'blocker', 'high' => 'high',
            'medium' => 'medium',
            default => 'low',
        };
    }

    private function renderNewFilePatch(string $path, string $content): string
    {
        $escaped = str_replace("\n", "\n", rtrim($content));
        $lines = explode("\n", $escaped);

        $patch = [];
        $patch[] = 'diff --git a/' . $path . ' b/' . $path;
        $patch[] = 'new file mode 100644';
        $patch[] = 'index 0000000..1111111';
        $patch[] = '--- /dev/null';
        $patch[] = '+++ b/' . $path;
        $patch[] = '@@ -0,0 +1,' . count($lines) . ' @@';
        foreach ($lines as $line) {
            $patch[] = '+' . $line;
        }

        return implode(PHP_EOL, $patch) . PHP_EOL;
    }

    private function slugify(string $value): string
    {
        $value = strtolower($value);
        $value = preg_replace('/[^a-z0-9]+/', '-', $value);
        $value = trim($value ?? '', '-');

        return $value ?: 'log-fix';
    }

    private function writeAuditLog(string $dir, array $payload): void
    {
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $path = rtrim($dir, '/') . '/logs-summarize-' . date('Y-m-d') . '.log';
        file_put_contents($path, json_encode($payload, JSON_UNESCAPED_SLASHES) . PHP_EOL, FILE_APPEND);
    }

    /**
     * @return array{ok: bool, message: string}
     */
    private function acquireLock(string $path): array
    {
        if (is_file($path)) {
            $payload = json_decode((string) file_get_contents($path), true);
            $started = $payload['started_at'] ?? null;
            if ($started !== null && (time() - (int) $started) < 3 * 3600) {
                return ['ok' => false, 'message' => 'Lockfile present; another run is active.'];
            }
        }

        $payload = [
            'pid' => getmypid(),
            'started_at' => time(),
        ];
        file_put_contents($path, json_encode($payload));

        return ['ok' => true, 'message' => 'lock acquired'];
    }

    private function releaseLock(string $path): void
    {
        if (is_file($path)) {
            unlink($path);
        }
    }
}
