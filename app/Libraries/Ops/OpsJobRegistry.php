<?php

declare(strict_types=1);

namespace App\Libraries\Ops;

use App\Libraries\MyMIAlerts;
use App\Libraries\MyMIMarketing;
use App\Models\RuntimeConfigModel;
use Config\Database;
use Config\Services;
use Throwable;

class OpsJobRegistry
{
    /** @var array<string,callable> */
    protected array $handlers = [];

    public function __construct()
    {
        $this->registerDefaults();
    }

    /**
     * @param callable(array):array|string $handler
     */
    public function register(string $jobKey, callable $handler): void
    {
        $this->handlers[$jobKey] = $handler;
    }

    /**
     * @return array<string,callable>
     */
    public function all(): array
    {
        return $this->handlers;
    }

    /**
     * @throws \RuntimeException
     */
    public function dispatch(string $jobKey, array $payload = []): array
    {
        if (! isset($this->handlers[$jobKey])) {
            throw new \RuntimeException("No handler registered for {$jobKey}");
        }

        $handler = $this->handlers[$jobKey];

        try {
            $result = $handler($payload);
        } catch (Throwable $e) {
            throw new \RuntimeException($e->getMessage(), (int) $e->getCode(), $e);
        }

        if (is_array($result)) {
            return $result;
        }

        return ['result' => $result];
    }

    protected function registerDefaults(): void
    {
        $this->register('ops.health.check', fn(array $payload = []): array => $this->handleHealthCheck($payload));

        $this->register('ops.logs.triage_daily', fn(array $payload = []): array => $this->handleLogsTriageDaily($payload));

        $this->register('ops.security.headers_scan', fn(array $payload = []): array => $this->handleSecurityHeadersScan($payload));

        $this->register('ops.routes.smoke_test', fn(array $payload = []): array => $this->handleRoutesSmokeTest($payload));

        $this->register('ops.db.maintenance', fn(array $payload = []): array => $this->handleDbMaintenance($payload));

        $this->register('ops.docs.sync_from_chatgpt_export', fn(array $payload = []): array => $this->handleDocsSyncFromChatgpt($payload));

        $this->register('ops.logs.summarize', fn(array $payload = []): array => $this->handleSummarizeLogs($payload));

        $this->register('ops.docs.inventory_scan', fn(array $payload = []): array => $this->handleDocsInventory($payload));

        $this->register('marketing.generate_digest', function (array $payload = []): array {
            if (class_exists(MyMIMarketing::class)) {
                try {
                    $marketing = new MyMIMarketing();
                    $digest = method_exists($marketing, 'generateDigest')
                        ? $marketing->generateDigest($payload)
                        : 'marketing digest handler stubbed';

                    return [
                        'status' => 'ok',
                        'output' => $digest,
                        'handler' => MyMIMarketing::class,
                        'output_text' => is_scalar($digest) ? (string) $digest : json_encode($digest, JSON_UNESCAPED_SLASHES),
                    ];
                } catch (Throwable $e) {
                    return [
                        'status' => 'error',
                        'message' => $e->getMessage(),
                        'output_text' => $e->getMessage(),
                    ];
                }
            }

            return [
                'status'  => 'ok',
                'message' => 'Marketing digest stub executed',
                'output'  => ['payload' => $payload],
                'output_text' => 'Marketing digest stub executed',
            ];
        });

        $this->register('alerts.process', function (array $payload = []): array {
            if (class_exists(MyMIAlerts::class)) {
                try {
                    $alerts = new MyMIAlerts();
                    $result = method_exists($alerts, 'process')
                        ? $alerts->process($payload)
                        : 'alerts process stubbed';

                    return [
                        'status' => 'ok',
                        'output' => $result,
                        'handler' => MyMIAlerts::class,
                        'output_text' => is_scalar($result) ? (string) $result : json_encode($result, JSON_UNESCAPED_SLASHES),
                    ];
                } catch (Throwable $e) {
                    return [
                        'status' => 'error',
                        'message' => $e->getMessage(),
                        'output_text' => $e->getMessage(),
                    ];
                }
            }

            return [
                'status'  => 'ok',
                'message' => 'Alerts process stub executed',
                'output'  => ['payload' => $payload],
                'output_text' => 'Alerts process stub executed',
            ];
        });

        $this->register('ops.worker.kick', function (): array {
            return [
                'status'  => 'ok',
                'message' => 'Worker kick acknowledged',
                'ts'      => date('c'),
            ];
        });
    }

    protected function handleHealthCheck(array $payload = []): array
    {
        $targets = $payload['hosts'] ?? [
            'mymiwallet.com'      => 'https://mymiwallet.com',
            'chat.mymiwallet.com' => 'https://chat.mymiwallet.com',
            'aiops.mymiwallet.com'=> 'https://aiops.mymiwallet.com',
        ];

        $httpResults = [];
        $httpClient  = $this->httpClient();
        foreach ($targets as $label => $url) {
            $name = is_string($label) ? $label : (string) $url;
            try {
                $response = $httpClient->get($url, ['timeout' => 6]);
                $httpResults[] = [
                    'target'    => $name,
                    'url'       => $url,
                    'status'    => $response->getStatusCode(),
                    'ok'        => $response->getStatusCode() >= 200 && $response->getStatusCode() < 400,
                    'timestamp' => date('c'),
                ];
            } catch (Throwable $e) {
                $httpResults[] = [
                    'target'    => $name,
                    'url'       => $url,
                    'status'    => null,
                    'ok'        => false,
                    'error'     => $e->getMessage(),
                    'timestamp' => date('c'),
                ];
            }
        }

        $dbOk      = false;
        $dbError   = null;
        $dbLatency = null;
        try {
            $start = microtime(true);
            $db    = Database::connect();
            $db->query('SELECT 1');
            $dbOk      = true;
            $dbLatency = round((microtime(true) - $start) * 1000, 2);
        } catch (Throwable $e) {
            $dbError = $e->getMessage();
        }

        $diskPath      = $payload['disk_path'] ?? ROOTPATH;
        $minFreeBytes  = (int) ($payload['min_free_bytes'] ?? 500 * 1024 * 1024);
        $freeBytes     = @disk_free_space($diskPath) ?: 0;
        $totalBytes    = @disk_total_space($diskPath) ?: 0;
        $freePercent   = $totalBytes > 0 ? round(($freeBytes / $totalBytes) * 100, 2) : null;
        $diskOk        = $freeBytes >= $minFreeBytes;
        $healthStatus  = $dbOk && $diskOk && ! $this->anyHttpErrors($httpResults) ? 'ok' : 'degraded';

        $markdown = "# Ops Health Check\n\n";
        $markdown .= "- Generated: " . date('c') . "\n";
        $markdown .= "- Overall status: **{$healthStatus}**\n\n";

        $markdown .= "## HTTP Targets\n";
        foreach ($httpResults as $result) {
            $statusText = $result['ok'] ? '✅' : '❌';
            $code = $result['status'] === null ? 'n/a' : (string) $result['status'];
            $error = isset($result['error']) ? " ({$result['error']})" : '';
            $markdown .= "- {$statusText} {$result['target']} ({$result['url']}): {$code}{$error}\n";
        }

        $markdown .= "\n## Database Connectivity\n";
        $markdown .= $dbOk
            ? "- ✅ Connected (latency: {$dbLatency} ms)\n"
            : "- ❌ Connection failed: {$dbError}\n";

        $markdown .= "\n## Disk Free Space\n";
        $markdown .= "- Path: `{$diskPath}`\n";
        $markdown .= "- Free: " . number_format($freeBytes / (1024 * 1024), 2) . " MB\n";
        if ($freePercent !== null) {
            $markdown .= "- Free %: {$freePercent}%\n";
        }
        $markdown .= "- Threshold: " . number_format($minFreeBytes / (1024 * 1024), 2) . " MB\n";
        $markdown .= "- Status: " . ($diskOk ? '✅ ok' : '❌ low disk') . "\n";

        $reportPath = (new OpsReportWriter())->write('ops.health.check', $markdown);

        return [
            'status'          => $healthStatus,
            'http_results'    => $httpResults,
            'db_ok'           => $dbOk,
            'db_error'        => $dbError,
            'db_latency_ms'   => $dbLatency,
            'disk'            => [
                'path'       => $diskPath,
                'free_bytes' => $freeBytes,
                'total_bytes'=> $totalBytes,
                'threshold'  => $minFreeBytes,
            ],
            'report_markdown' => $markdown,
            'report_path'     => $reportPath,
        ];
    }

    protected function handleLogsTriageDaily(array $payload = []): array
    {
        $logsDir = rtrim(WRITEPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'logs';
        $cutoff  = time() - 86400;
        $results = [];
        $grouped = [];

        if (! is_dir($logsDir)) {
            return [
                'status'  => 'error',
                'message' => 'Logs directory not found',
                'path'    => $logsDir,
            ];
        }

        $files = array_filter(glob($logsDir . DIRECTORY_SEPARATOR . '*') ?: [], 'is_file');
        foreach ($files as $file) {
            if ((int) filemtime($file) < $cutoff) {
                continue;
            }
            $entries = $this->scanLogFile($file, ['error', 'warning']);
            foreach ($entries as $entry) {
                $normalized = $this->normalizeMessage($entry['line']);
                if (! isset($grouped[$normalized])) {
                    $grouped[$normalized] = [
                        'count'      => 0,
                        'examples'   => [],
                        'last_seen'  => $entry['timestamp'] ?? null,
                        'severity'   => $entry['severity'],
                    ];
                }
                $grouped[$normalized]['count']++;
                $grouped[$normalized]['examples'][] = [
                    'file' => basename($file),
                    'line' => $entry['line'],
                ];
                $grouped[$normalized]['last_seen'] = $entry['timestamp'] ?? $grouped[$normalized]['last_seen'];
            }
            $results[] = [
                'file'     => basename($file),
                'hits'     => count($entries),
                'examples' => array_slice($entries, 0, 5),
            ];
        }

        $markdown  = "# Daily Log Triage\n\n";
        $markdown .= "Generated at " . date('c') . "\n\n";
        $markdown .= "## Summary\n";
        foreach ($grouped as $message => $meta) {
            $markdown .= "- **{$meta['severity']}** ×{$meta['count']} — {$message}\n";
        }
        if ($grouped === []) {
            $markdown .= "- No ERROR or WARNING entries in the last 24h\n";
        }

        $markdown .= "\n## File Coverage\n";
        foreach ($results as $row) {
            $markdown .= "- {$row['file']}: {$row['hits']} hits\n";
        }

        $reportPath = (new OpsReportWriter())->write('ops.logs.triage_daily', $markdown);

        return [
            'status'          => 'ok',
            'files_scanned'   => array_column($results, 'file'),
            'grouped'         => $grouped,
            'report_markdown' => $markdown,
            'report_path'     => $reportPath,
        ];
    }

    protected function handleSecurityHeadersScan(array $payload = []): array
    {
        $targets = $payload['targets'] ?? [
            'https://mymiwallet.com/',
            'https://mymiwallet.com/Login',
            'https://mymiwallet.com/Account/Security',
            'https://chat.mymiwallet.com/',
        ];
        $required = $payload['required'] ?? [
            'strict-transport-security',
            'content-security-policy',
            'x-frame-options',
            'x-content-type-options',
            'referrer-policy',
        ];

        $client = $this->httpClient();
        $reports = [];
        foreach ($targets as $target) {
            $headersFound = [];
            $statusCode   = null;
            $error        = null;
            try {
                $response   = $client->get($target, ['timeout' => 8]);
                $statusCode = $response->getStatusCode();
                foreach ($response->getHeaderNames() as $name) {
                    $headersFound[strtolower($name)] = $response->getHeaderLine($name);
                }
            } catch (Throwable $e) {
                $error = $e->getMessage();
            }

            $missing = array_values(array_diff($required, array_keys($headersFound)));
            $score   = (int) round(((count($required) - count($missing)) / max(count($required), 1)) * 100);
            $reports[] = [
                'url'      => $target,
                'status'   => $statusCode,
                'missing'  => $missing,
                'score'    => $score,
                'error'    => $error,
            ];
        }

        $averageScore = count($reports) > 0 ? round(array_sum(array_column($reports, 'score')) / count($reports), 2) : 0.0;
        $markdown  = "# Security Headers Scan\n\n";
        $markdown .= "- Generated: " . date('c') . "\n";
        $markdown .= "- Average score: {$averageScore}\n\n";
        foreach ($reports as $row) {
            $status = $row['status'] ? $row['status'] : 'n/a';
            $markdown .= "### {$row['url']}\n";
            $markdown .= "- Status: {$status}\n";
            $markdown .= "- Score: {$row['score']} / 100\n";
            if ($row['missing']) {
                $markdown .= "- Missing: " . implode(', ', $row['missing']) . "\n";
            } else {
                $markdown .= "- All required headers present\n";
            }
            if ($row['error']) {
                $markdown .= "- Error: {$row['error']}\n";
            }
            $markdown .= "\n";
        }

        $reportPath = (new OpsReportWriter())->write('ops.security.headers_scan', $markdown);

        return [
            'status'          => $averageScore >= 80 ? 'ok' : 'attention',
            'reports'         => $reports,
            'average_score'   => $averageScore,
            'report_markdown' => $markdown,
            'report_path'     => $reportPath,
        ];
    }

    protected function handleRoutesSmokeTest(array $payload = []): array
    {
        $baseUrl = rtrim((string) ($payload['base_url'] ?? env('app.baseURL') ?? 'https://mymiwallet.com'), '/');
        $routes  = $payload['routes'] ?? [
            '/',
            '/Login',
            '/Account',
            '/Account/Billing',
            '/Account/Notifications',
            '/Account/Security',
            '/Account/Activity',
            '/Search',
            '/Trade-Tracker',
            '/MyMI-Wallet',
            '/MyMI-Gold/Goals/Daily',
            '/Advisor',
            '/API/Health',
            '/API/Ops/status',
            '/API/Ops/dispatch',
            '/Discord/completeOnboardingStep',
            '/Marketplace',
            '/AI/Chat',
            '/AI/Notes',
            '/alerts',
            '/cron/auth',
            '/cron/Run-CRON-Tasks',
            '/investments',
            '/blog',
            '/pricing',
            '/security',
            '/privacy-policy',
            '/terms',
            '/roadmap',
            '/status',
        ];

        $client  = $this->httpClient();
        $results = [];
        foreach ($routes as $route) {
            $url = $baseUrl . $route;
            $status = null;
            $error = null;
            try {
                $response = $client->get($url, ['timeout' => 8]);
                $status   = $response->getStatusCode();
            } catch (Throwable $e) {
                $error = $e->getMessage();
            }
            $results[] = [
                'route'  => $route,
                'url'    => $url,
                'status' => $status,
                'ok'     => $status !== null && $status < 400,
                'error'  => $error,
            ];
        }

        $failures = array_values(array_filter($results, static fn(array $row) => $row['ok'] === false));

        $markdown  = "# Routes Smoke Test\n\n";
        $markdown .= "- Base URL: {$baseUrl}\n";
        $markdown .= "- Generated: " . date('c') . "\n\n";
        if ($failures === []) {
            $markdown .= "All routes responded with < 400 status codes.\n";
        } else {
            $markdown .= "## Failures (" . count($failures) . ")\n";
            foreach ($failures as $row) {
                $status = $row['status'] ?? 'n/a';
                $error = $row['error'] ? " ({$row['error']})" : '';
                $markdown .= "- {$row['route']} — status {$status}{$error}\n";
            }
        }

        $reportPath = (new OpsReportWriter())->write('ops.routes.smoke_test', $markdown);

        return [
            'status'          => $failures === [] ? 'ok' : 'attention',
            'results'         => $results,
            'failures'        => $failures,
            'report_markdown' => $markdown,
            'report_path'     => $reportPath,
        ];
    }

    protected function handleDbMaintenance(array $payload = []): array
    {
        $queueRetentionDays = (int) ($payload['queue_retention_days'] ?? 14);
        $runsRetentionDays  = (int) ($payload['runs_retention_days'] ?? 60);
        $optimizedTables    = [];
        $purgedQueue        = 0;
        $purgedRuns         = 0;
        $errors             = [];

        try {
            $db = Database::connect();
            $tablesToOptimize = $payload['tables'] ?? ['bf_ops_queue', 'bf_ops_job_runs'];
            foreach ($tablesToOptimize as $table) {
                try {
                    $db->query("OPTIMIZE TABLE {$table}");
                    $optimizedTables[] = $table;
                } catch (Throwable $optError) {
                    $errors[] = "OPTIMIZE {$table}: " . $optError->getMessage();
                }
            }

            $db->table('bf_ops_queue')
                ->where('created_at <', date('Y-m-d H:i:s', strtotime("-{$queueRetentionDays} days")))
                ->whereIn('status', ['completed', 'failed'])
                ->delete();

            $purgedQueue = $db->affectedRows();

            $db->table('bf_ops_job_runs')
                ->where('finished_at <', date('Y-m-d H:i:s', strtotime("-{$runsRetentionDays} days")))
                ->delete();

            $purgedRuns = $db->affectedRows();
        } catch (Throwable $e) {
            $errors[] = $e->getMessage();
        }

        $markdown  = "# DB Maintenance\n\n";
        $markdown .= "- Executed: " . date('c') . "\n";
        $markdown .= "- Optimized tables: " . ($optimizedTables ? implode(', ', $optimizedTables) : 'none') . "\n";
        $markdown .= "- Purged queue rows: {$purgedQueue}\n";
        $markdown .= "- Purged run rows: {$purgedRuns}\n";
        if ($errors) {
            $markdown .= "\n## Errors\n";
            foreach ($errors as $error) {
                $markdown .= "- {$error}\n";
            }
        }

        $reportPath = (new OpsReportWriter())->write('ops.db.maintenance', $markdown);

        return [
            'status'          => $errors ? 'attention' : 'ok',
            'optimized'       => $optimizedTables,
            'purged_queue'    => $purgedQueue,
            'purged_runs'     => $purgedRuns,
            'errors'          => $errors,
            'report_markdown' => $markdown,
            'report_path'     => $reportPath,
        ];
    }

    protected function handleDocsSyncFromChatgpt(array $payload = []): array
    {
        $sourcePath   = $payload['source'] ?? (ROOTPATH . 'docs/chatgpt/export/chatgpt_data.json');
        $newSincePath = ROOTPATH . 'docs/chatgpt/new_since_last.md';
        $topicsPath   = ROOTPATH . 'docs/chatgpt/topics_index.json';
        $missingPath  = ROOTPATH . 'docs/ops/missing_actions.md';
        $runtimeKey   = 'chatgpt.export.last_ts';
        $runtime      = new RuntimeConfigModel();

        if (! is_file($sourcePath)) {
            return [
                'status'  => 'error',
                'message' => 'Source export not found',
                'path'    => $sourcePath,
            ];
        }

        $lastTimestamp = (int) $runtime->getValue($runtimeKey, 0);
        $raw           = json_decode((string) file_get_contents($sourcePath), true);
        $conversations = is_array($raw) ? $raw : [];

        $newItems   = [];
        $topics     = [];
        $missing    = [];
        $latestSeen = $lastTimestamp;

        foreach ($conversations as $conversation) {
            $ts    = isset($conversation['timestamp']) ? strtotime((string) $conversation['timestamp']) : null;
            $ts    = $ts ?? (isset($conversation['updated_at']) ? strtotime((string) $conversation['updated_at']) : null);
            $ts    = $ts ?? (isset($conversation['created_at']) ? strtotime((string) $conversation['created_at']) : null);
            $ts    = $ts ?? time();
            $topic = (string) ($conversation['topic'] ?? $conversation['title'] ?? 'untitled');
            $textRaw = $conversation['content'] ?? $conversation['messages'] ?? '';
            $text  = is_array($textRaw) ? json_encode($textRaw) : (string) $textRaw;

            if ($ts <= $lastTimestamp) {
                continue;
            }

            $newItems[] = [
                'topic' => $topic,
                'timestamp' => date('c', $ts),
                'excerpt' => mb_substr($this->normalizeMessage($text), 0, 280),
            ];

            $topics[$topic] = ($topics[$topic] ?? 0) + 1;
            $latestSeen = max($latestSeen, $ts);

            $missing = array_merge($missing, $this->extractActionItems($text));
        }

        $markdown  = "# New Conversations Since Last Sync\n\n";
        $markdown .= "- Export file: `{$sourcePath}`\n";
        $markdown .= "- Previous watermark: " . ($lastTimestamp ? date('c', $lastTimestamp) : 'none') . "\n";
        $markdown .= "- Found: " . count($newItems) . "\n\n";
        foreach ($newItems as $item) {
            $markdown .= "## {$item['topic']}\n";
            $markdown .= "- Timestamp: {$item['timestamp']}\n";
            $markdown .= "- Excerpt: {$item['excerpt']}\n\n";
        }
        if (! is_dir(dirname($newSincePath))) {
            mkdir(dirname($newSincePath), 0775, true);
        }
        file_put_contents($newSincePath, $markdown);
        file_put_contents($topicsPath, json_encode($topics, JSON_PRETTY_PRINT));

        if (! is_dir(dirname($missingPath))) {
            mkdir(dirname($missingPath), 0775, true);
        }
        $missingMarkdown = "# Potential Missing Actions\n\n";
        if ($missing) {
            foreach (array_slice($missing, 0, 100) as $line) {
                $missingMarkdown .= "- {$line}\n";
            }
        } else {
            $missingMarkdown .= "No TODO/fix signals detected.\n";
        }
        file_put_contents($missingPath, $missingMarkdown);

        $runtime->setValue($runtimeKey, (string) $latestSeen);

        $reportPath = (new OpsReportWriter())->write('ops.docs.sync_from_chatgpt_export', $markdown);

        return [
            'status'          => 'ok',
            'new_items'       => $newItems,
            'topics_index'    => $topics,
            'missing_actions' => $missing,
            'report_markdown' => $markdown,
            'report_path'     => $reportPath,
            'latest_timestamp'=> $latestSeen,
        ];
    }

    protected function handleSummarizeLogs(array $payload = []): array
    {
        $logsDir = rtrim(WRITEPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'logs';
        if (! is_dir($logsDir)) {
            return [
                'status'  => 'error',
                'message' => 'Logs directory not found',
                'path'    => $logsDir,
            ];
        }

        $files = array_filter(glob($logsDir . DIRECTORY_SEPARATOR . '*') ?: [], 'is_file');
        $summaries = [];
        $totalErrors = 0;
        $totalWarnings = 0;

        foreach ($files as $file) {
            $tailLines = $this->tailFile($file, 60);
            $errors    = $this->countKeywords($tailLines, ['ERROR', 'CRITICAL', 'ALERT']);
            $warnings  = $this->countKeywords($tailLines, ['WARNING', 'WARN']);
            $summaries[] = [
                'file'        => basename($file),
                'size_bytes'  => filesize($file) ?: 0,
                'modified_at' => filemtime($file) ? date('c', (int) filemtime($file)) : null,
                'errors'      => $errors,
                'warnings'    => $warnings,
                'tail'        => array_slice($tailLines, -20),
            ];
            $totalErrors   += $errors;
            $totalWarnings += $warnings;
        }

        $summaryText  = "Log scan at " . date('c') . "\n";
        $summaryText .= "Files: " . count($summaries) . "\n";
        $summaryText .= "Errors: {$totalErrors} | Warnings: {$totalWarnings}\n";
        foreach (array_slice($summaries, 0, 3) as $row) {
            $summaryText .= "- {$row['file']}: {$row['errors']} errors, {$row['warnings']} warnings\n";
        }

        return [
            'status'        => 'ok',
            'generated_at'  => date('c'),
            'file_count'    => count($summaries),
            'total_errors'  => $totalErrors,
            'total_warnings'=> $totalWarnings,
            'files'         => $summaries,
            'output_text'   => $summaryText,
        ];
    }

    protected function handleDocsInventory(array $payload = []): array
    {
        $docsDir   = ROOTPATH . 'docs';
        $outputDir = $docsDir . DIRECTORY_SEPARATOR . 'ops';
        $target    = $outputDir . DIRECTORY_SEPARATOR . 'docs_inventory.md';
        $files     = [];

        if (is_dir($docsDir)) {
            $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($docsDir));
            foreach ($iterator as $file) {
                if ($file->isDir()) {
                    continue;
                }
                $path = str_replace(ROOTPATH, '', $file->getPathname());
                $files[] = $path;
            }
        }

        if (! is_dir($outputDir)) {
            mkdir($outputDir, 0775, true);
        }

        $content = "# Docs Inventory\n\nGenerated at " . date('Y-m-d H:i:s') . "\n\n";
        foreach ($files as $file) {
            $content .= "- {$file}\n";
        }

        file_put_contents($target, $content);

        return [
            'status'   => 'ok',
            'written'  => $target,
            'count'    => count($files),
            'files'    => $files,
            'payload'  => $payload,
            'output_text' => "Docs inventory written to {$target} (" . count($files) . " files)",
        ];
    }

    /**
     * @param array<int,string> $lines
     */
    protected function countKeywords(array $lines, array $keywords): int
    {
        $count = 0;
        foreach ($lines as $line) {
            foreach ($keywords as $keyword) {
                if (stripos($line, $keyword) !== false) {
                    $count++;
                    break;
                }
            }
        }

        return $count;
    }

    protected function anyHttpErrors(array $httpResults): bool
    {
        foreach ($httpResults as $result) {
            if (! $result['ok']) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array<int,array<string,string|null>>
     */
    protected function scanLogFile(string $file, array $keywords): array
    {
        $entries = [];
        if (! is_readable($file)) {
            return $entries;
        }

        $spl = new \SplFileObject($file, 'r');
        while (! $spl->eof()) {
            $line = trim((string) $spl->fgets());
            if ($line === '') {
                continue;
            }
            foreach ($keywords as $keyword) {
                if (stripos($line, $keyword) !== false) {
                    $entries[] = [
                        'line'      => $line,
                        'severity'  => strtoupper($keyword),
                        'timestamp' => $this->extractTimestamp($line),
                    ];
                    break;
                }
            }
        }

        return $entries;
    }

    protected function extractTimestamp(string $line): ?string
    {
        if (preg_match('/\d{4}-\d{2}-\d{2} [0-9:]{8}/', $line, $matches)) {
            return $matches[0];
        }

        return null;
    }

    protected function normalizeMessage(string $message): string
    {
        $message = preg_replace('/\[[^\]]+\]/', '', $message);
        $message = preg_replace('/\s+/', ' ', (string) $message);

        return trim((string) $message);
    }

    /**
     * @return array<int,string>
     */
    protected function extractActionItems(string $text): array
    {
        $lines = preg_split('/\r\n|\r|\n/', (string) $text) ?: [];
        $keywords = ['todo', 'fix', 'error', 'need to', 'missing', 'bug'];
        $matches = [];
        foreach ($lines as $line) {
            foreach ($keywords as $keyword) {
                if (stripos($line, $keyword) !== false) {
                    $matches[] = trim($line);
                    break;
                }
            }
        }

        return array_values(array_unique(array_filter($matches, static fn($line) => $line !== '')));
    }

    protected function httpClient()
    {
        return Services::curlrequest([
            'http_errors'     => false,
            'verify'          => false,
            'allow_redirects' => true,
        ]);
    }

    /**
     * @return array<int,string>
     */
    protected function tailFile(string $file, int $lines = 50): array
    {
        if (! is_file($file) || ! is_readable($file)) {
            return [];
        }

        $buffer = [];
        $spl = new \SplFileObject($file, 'r');
        $spl->seek(PHP_INT_MAX);
        $lastLine = $spl->key();
        $target = max(0, $lastLine - $lines + 1);
        $spl->seek($target);

        while (! $spl->eof()) {
            $buffer[] = trim((string) $spl->current());
            $spl->next();
        }

        return array_values(array_filter($buffer, static fn($line) => $line !== ''));
    }
}
