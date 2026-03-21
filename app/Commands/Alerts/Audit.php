<?php

namespace App\Commands\Alerts;

use App\Models\AlertsModel;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;
use ReflectionMethod;

class Audit extends SafeBaseCommand
{
    protected $group       = 'Alerts';
    protected $name        = 'alerts:audit';
    protected $description = 'Audit recent scraped alert emails against generated trade alerts.';
    protected $options     = [
        '--dry-run' => 'Preview actions without writing audit artifacts',
    ];

    private $symbolExtractor = null;

    public function run(array $params)
    {
        log_message('info', '[spark:alerts:audit] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $startTime = microtime(true);
        $startedAt = date('Y-m-d H:i:s');
        $memoryStart = memory_get_usage(true);

        log_message('info', 'alerts:audit started', [
            'started_at' => $startedAt,
            'memory_start' => $memoryStart,
        ]);

        $db = Database::connect();
        $alertsModel = new AlertsModel();

        $scraperColumns = $this->getTableColumns($db, 'bf_investment_scraper');
        $alertsColumns = $this->getTableColumns($db, 'bf_investment_trade_alerts');

        $scraperSubjectColumn = $this->pickColumn($scraperColumns, ['email_subject', 'subject']);
        $scraperContentColumn = $this->pickColumn($scraperColumns, ['email_body', 'content']);
        $scraperSourceColumn = $this->pickColumn($scraperColumns, ['source_email', 'email_sender']);
        $scraperStatusColumn = $this->pickColumn($scraperColumns, ['status']);
        $scraperCreatedColumn = $this->pickColumn($scraperColumns, ['created_at', 'created_on']);
        $scraperCategoryColumn = $this->pickColumn($scraperColumns, ['category']);

        $alertCreatedColumn = $this->pickColumn($alertsColumns, ['created_at', 'created_on']);
        $alertTypeColumn = $this->pickColumn($alertsColumns, ['alert_type']);
        $alertCategoryColumn = $this->pickColumn($alertsColumns, ['category']);
        $alertSourceColumn = $this->pickColumn($alertsColumns, ['source_scraper_id']);
        $alertOccurrencesColumn = $this->pickColumn($alertsColumns, ['occurrences']);
        $alertStatusColumn = $this->pickColumn($alertsColumns, ['status']);

        $emails = $this->fetchScraperEmails(
            $db,
            $scraperSubjectColumn,
            $scraperContentColumn,
            $scraperSourceColumn,
            $scraperStatusColumn,
            $scraperCreatedColumn,
            $scraperCategoryColumn
        );

        $alerts = $this->fetchTradeAlerts(
            $db,
            $alertTypeColumn,
            $alertCategoryColumn,
            $alertStatusColumn,
            $alertOccurrencesColumn,
            $alertSourceColumn,
            $alertCreatedColumn
        );

        if (! $scraperSourceColumn) {
            log_message('warning', 'alerts:audit could not locate source_email column in bf_investment_scraper.');
        }

        $emailCount = count($emails);
        $alertCount = count($alerts);

        $emailsById = [];
        foreach ($emails as $email) {
            $emailsById[$email['id']] = $email;
        }

        $alertsBySourceId = [];
        $alertsByTicker = [];
        $alertsWithoutSource = 0;

        foreach ($alerts as $alert) {
            $ticker = strtoupper(trim((string) ($alert['ticker'] ?? '')));
            $alert['ticker'] = $ticker;

            if ($alertSourceColumn) {
                $sourceId = $alert['source_scraper_id'] ?? null;
                if ($sourceId) {
                    $alertsBySourceId[$sourceId][] = $alert;
                } else {
                    $alertsWithoutSource++;
                }
            }

            if ($ticker !== '') {
                $alertsByTicker[$ticker][] = $alert;
            }
        }

        if ($alertSourceColumn) {
            foreach ($alertsBySourceId as $sourceId => $rows) {
                if (! isset($emailsById[$sourceId])) {
                    $alertsWithoutSource += count($rows);
                }
            }
        }

        $emailsWithAlerts = 0;
        $emailsMissingAlerts = 0;
        $symbolMismatchCount = 0;
        $emailsWithIssues = 0;
        $issues = [];

        foreach ($emails as $email) {
            $subject = (string) ($email['subject'] ?? '');
            $content = (string) ($email['content'] ?? '');
            $text = trim($subject . ' ' . $content);

            $expectedSymbols = $this->extractSymbols($alertsModel, $text);

            $relatedAlerts = [];
            if ($alertSourceColumn) {
                $relatedAlerts = $alertsBySourceId[$email['id']] ?? [];
            }

            if ($relatedAlerts === [] && $expectedSymbols !== []) {
                foreach ($expectedSymbols as $symbol) {
                    foreach ($alertsByTicker[$symbol] ?? [] as $alert) {
                        $relatedAlerts[$alert['id']] = $alert;
                    }
                }
                $relatedAlerts = array_values($relatedAlerts);
            }

            if ($relatedAlerts !== []) {
                $emailsWithAlerts++;
            } else {
                $emailsMissingAlerts++;
            }

            $issueTypes = [];

            if ($relatedAlerts === []) {
                $issueTypes[] = 'Email missing trade alert';
                if (strtolower((string) ($email['status'] ?? '')) === 'processed') {
                    $issueTypes[] = 'Processed email missing alert';
                }
            }

            $foundSymbols = array_values(array_unique(array_filter(array_map('strtoupper', array_column($relatedAlerts, 'ticker')))));

            if ($expectedSymbols !== [] && $relatedAlerts !== []) {
                $missingSymbols = array_values(array_diff($expectedSymbols, $foundSymbols));
                $unexpectedSymbols = array_values(array_diff($foundSymbols, $expectedSymbols));

                if ($missingSymbols !== [] || $unexpectedSymbols !== []) {
                    $issueTypes[] = 'Symbol mismatch';
                    $symbolMismatchCount++;
                }
            }

            if ($alertSourceColumn && $relatedAlerts !== []) {
                $tickerCounts = [];
                foreach ($relatedAlerts as $alert) {
                    $tickerCounts[$alert['ticker']] = ($tickerCounts[$alert['ticker']] ?? 0) + 1;
                }
                foreach ($tickerCounts as $count) {
                    if ($count > 1) {
                        $issueTypes[] = 'Duplicate alerts for email';
                        break;
                    }
                }
            }

            if ($scraperCategoryColumn && ($alertTypeColumn || $alertCategoryColumn) && $relatedAlerts !== []) {
                $expectedType = strtolower((string) ($email['category'] ?? ''));
                if ($expectedType !== '') {
                    foreach ($relatedAlerts as $alert) {
                        $actualType = $alert['alert_type'] ?? $alert['category'] ?? null;
                        if ($actualType !== null && strtolower((string) $actualType) !== $expectedType) {
                            $issueTypes[] = 'Incorrect alert type mapping';
                            break;
                        }
                    }
                }
            }

            if ($issueTypes !== []) {
                $emailsWithIssues++;
                $issues[] = [
                    'email_id' => $email['id'],
                    'subject' => $this->trimSubject($subject),
                    'expected_symbols' => $expectedSymbols,
                    'found_alerts' => $this->formatAlertsSummary($relatedAlerts),
                    'issue_type' => implode('; ', array_values(array_unique($issueTypes))),
                ];
            }
        }

        $correctlyMapped = $emailCount - $emailsWithIssues;
        $percentMapped = $emailCount > 0 ? round(($correctlyMapped / $emailCount) * 100, 2) : 100.0;

        $healthStatus = 'PASS';
        if ($emailsWithIssues > 0 && $percentMapped >= 90) {
            $healthStatus = 'WARNING';
        } elseif ($percentMapped < 90) {
            $healthStatus = 'FAIL';
        }

        CLI::newLine();
        CLI::write('SECTION 1: COUNTS');
        CLI::write('----------------------------------------');
        CLI::write('Emails scanned: ' . $emailCount);
        CLI::write('Alerts scanned: ' . $alertCount);
        CLI::write('Emails with alerts: ' . $emailsWithAlerts);
        CLI::write('Emails missing alerts: ' . $emailsMissingAlerts);
        CLI::write('Alerts without source email: ' . $alertsWithoutSource);
        CLI::write('Symbol mismatches: ' . $symbolMismatchCount);

        CLI::newLine();
        CLI::write('SECTION 2: TOP ISSUES (LIMIT 25)');
        CLI::write('----------------------------------------');

        if ($issues === []) {
            CLI::write('No issues detected.');
        } else {
            foreach (array_slice($issues, 0, 25) as $issue) {
                CLI::write('- Email ID: ' . $issue['email_id']);
                CLI::write('  Subject: ' . $issue['subject']);
                CLI::write('  Expected symbols: ' . ($issue['expected_symbols'] !== [] ? implode(', ', $issue['expected_symbols']) : '—'));
                CLI::write('  Found alerts: ' . ($issue['found_alerts'] !== '' ? $issue['found_alerts'] : '—'));
                CLI::write('  Issue type: ' . $issue['issue_type']);
                CLI::newLine();
            }
        }

        CLI::write('SECTION 3: HEALTH SCORE');
        CLI::write('----------------------------------------');
        CLI::write($healthStatus . ' - ' . $percentMapped . '% correctly mapped');

        $durationMs = (int) ((microtime(true) - $startTime) * 1000);
        $memoryPeak = memory_get_peak_usage(true);

        log_message('info', 'alerts:audit completed', [
            'duration_ms' => $durationMs,
            'memory_peak' => $memoryPeak,
            'emails_scanned' => $emailCount,
            'alerts_scanned' => $alertCount,
            'emails_with_alerts' => $emailsWithAlerts,
            'emails_missing_alerts' => $emailsMissingAlerts,
            'alerts_without_source' => $alertsWithoutSource,
            'symbol_mismatches' => $symbolMismatchCount,
            'health_status' => $healthStatus,
            'percent_mapped' => $percentMapped,
        ]);

        if (! $dryRun) {
            $this->writeAuditMarkdown([
                'started_at' => $startedAt,
                'duration_ms' => $durationMs,
                'memory_peak' => $memoryPeak,
                'emails_scanned' => $emailCount,
                'alerts_scanned' => $alertCount,
                'emails_with_alerts' => $emailsWithAlerts,
                'emails_missing_alerts' => $emailsMissingAlerts,
                'alerts_without_source' => $alertsWithoutSource,
                'symbol_mismatches' => $symbolMismatchCount,
                'health_status' => $healthStatus,
                'percent_mapped' => $percentMapped,
                'issues' => $issues,
            ]);

            $this->insertAuditLog($db, [
                'level' => 'info',
                'message' => 'alerts:audit completed',
                'context' => json_encode([
                    'emails_scanned' => $emailCount,
                    'alerts_scanned' => $alertCount,
                    'emails_missing_alerts' => $emailsMissingAlerts,
                    'symbol_mismatches' => $symbolMismatchCount,
                    'health_status' => $healthStatus,
                    'percent_mapped' => $percentMapped,
                ], JSON_UNESCAPED_SLASHES),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        } else {
            CLI::write('dry_run=true (no audit artifacts written)', 'yellow');
        }

        CLI::newLine();
        CLI::write('Audit duration: ' . $durationMs . ' ms');
        CLI::write('Memory peak: ' . $this->formatBytes($memoryPeak));

        if ($healthStatus === 'FAIL') {
            log_message('error', '[spark:alerts:audit] Failed', ['reason' => 'Health status FAIL']);
        }

        log_message('info', '[spark:alerts:audit] Completed', [
            'emails_scanned' => $emailCount,
            'alerts_scanned' => $alertCount,
            'health_status' => $healthStatus,
            'percent_mapped' => $percentMapped,
            'dry_run' => $dryRun,
        ]);

        return $healthStatus === 'FAIL' ? EXIT_ERROR : EXIT_SUCCESS;
    }

    private function fetchScraperEmails(
        $db,
        ?string $subjectColumn,
        ?string $contentColumn,
        ?string $sourceColumn,
        ?string $statusColumn,
        ?string $createdColumn,
        ?string $categoryColumn
    ): array {
        $select = ['id'];

        if ($sourceColumn) {
            $select[] = $sourceColumn . ' AS source_email';
        }
        if ($subjectColumn) {
            $select[] = $subjectColumn . ' AS subject';
        }
        if ($contentColumn) {
            $select[] = $contentColumn . ' AS content';
        }
        if ($statusColumn) {
            $select[] = $statusColumn . ' AS status';
        }
        if ($createdColumn) {
            $select[] = $createdColumn . ' AS created_at';
        }
        if ($categoryColumn) {
            $select[] = $categoryColumn . ' AS category';
        }

        $builder = $db->table('bf_investment_scraper')->select(implode(', ', $select), false);

        if ($sourceColumn) {
            $config = config('MyMI');
            $builder->groupStart();
            foreach ($config->allowedAlertEmails as $allowedAlertEmail) {
                $builder->orWhere($sourceColumn, $allowedAlertEmail);
            }
            $builder->groupEnd();
        }

        if ($createdColumn) {
            $builder->orderBy($createdColumn, 'DESC');
        } else {
            $builder->orderBy('id', 'DESC');
        }

        return $builder->limit(250)->get()->getResultArray();
    }

    private function fetchTradeAlerts(
        $db,
        ?string $alertTypeColumn,
        ?string $alertCategoryColumn,
        ?string $statusColumn,
        ?string $occurrencesColumn,
        ?string $sourceColumn,
        ?string $createdColumn
    ): array {
        $select = ['id', 'ticker'];

        if ($alertTypeColumn) {
            $select[] = $alertTypeColumn . ' AS alert_type';
        }
        if ($alertCategoryColumn) {
            $select[] = $alertCategoryColumn . ' AS category';
        }
        if ($statusColumn) {
            $select[] = $statusColumn . ' AS status';
        }
        if ($occurrencesColumn) {
            $select[] = $occurrencesColumn . ' AS occurrences';
        }
        if ($sourceColumn) {
            $select[] = $sourceColumn . ' AS source_scraper_id';
        }
        if ($createdColumn) {
            $select[] = $createdColumn . ' AS created_at';
        }

        $builder = $db->table('bf_investment_trade_alerts')->select(implode(', ', $select), false);

        if ($createdColumn) {
            $builder->orderBy($createdColumn, 'DESC');
        } else {
            $builder->orderBy('id', 'DESC');
        }

        return $builder->limit(250)->get()->getResultArray();
    }

    private function getTableColumns($db, string $table): array
    {
        try {
            $columns = $db->getFieldNames($table);
        } catch (\Throwable $e) {
            $columns = [];
        }

        $map = [];
        foreach ($columns as $column) {
            $map[strtolower($column)] = $column;
        }

        return $map;
    }

    private function pickColumn(array $columns, array $candidates): ?string
    {
        foreach ($candidates as $candidate) {
            $key = strtolower($candidate);
            if (isset($columns[$key])) {
                return $columns[$key];
            }
        }

        return null;
    }

    private function extractSymbols(AlertsModel $alertsModel, string $text): array
    {
        if ($text === '') {
            return [];
        }

        if ($this->symbolExtractor === null) {
            $this->symbolExtractor = new ReflectionMethod($alertsModel, 'defaultSymbolExtractor');
            $this->symbolExtractor->setAccessible(true);
        }

        $symbols = (array) $this->symbolExtractor->invoke($alertsModel, $text);
        $symbols = array_map('strtoupper', $symbols);
        $symbols = array_values(array_unique(array_filter($symbols)));

        return $symbols;
    }

    private function trimSubject(string $subject, int $limit = 120): string
    {
        $subject = trim($subject);
        if (mb_strlen($subject) <= $limit) {
            return $subject;
        }

        return mb_substr($subject, 0, $limit - 3) . '...';
    }

    private function formatAlertsSummary(array $alerts): string
    {
        $parts = [];
        foreach ($alerts as $alert) {
            $ticker = $alert['ticker'] ?? '—';
            $type = $alert['alert_type'] ?? $alert['status'] ?? null;
            $parts[] = $type ? sprintf('%s (%s)', $ticker, $type) : (string) $ticker;
        }

        return implode(', ', $parts);
    }

    private function formatBytes(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $index = 0;
        $value = (float) $bytes;

        while ($value >= 1024 && $index < count($units) - 1) {
            $value /= 1024;
            $index++;
        }

        return number_format($value, 2) . ' ' . $units[$index];
    }

    private function writeAuditMarkdown(array $summary): void
    {
        $docPath = ROOTPATH . 'docs' . DIRECTORY_SEPARATOR . 'audit';
        if (! is_dir($docPath)) {
            mkdir($docPath, 0775, true);
        }

        $issues = $summary['issues'] ?? [];
        $hasIssues = $issues !== [];

        $lines = [];
        $lines[] = '# Alerts Audit - Last Run';
        $lines[] = '';
        $lines[] = 'Run timestamp: ' . ($summary['started_at'] ?? date('Y-m-d H:i:s'));
        $lines[] = 'Duration (ms): ' . ($summary['duration_ms'] ?? 0);
        $lines[] = 'Memory peak: ' . $this->formatBytes((int) ($summary['memory_peak'] ?? 0));
        $lines[] = '';
        $lines[] = '## Summary';
        $lines[] = '- Emails scanned: ' . ($summary['emails_scanned'] ?? 0);
        $lines[] = '- Alerts scanned: ' . ($summary['alerts_scanned'] ?? 0);
        $lines[] = '- Emails with alerts: ' . ($summary['emails_with_alerts'] ?? 0);
        $lines[] = '- Emails missing alerts: ' . ($summary['emails_missing_alerts'] ?? 0);
        $lines[] = '- Alerts without source email: ' . ($summary['alerts_without_source'] ?? 0);
        $lines[] = '- Symbol mismatches: ' . ($summary['symbol_mismatches'] ?? 0);
        $lines[] = '- Health status: ' . ($summary['health_status'] ?? 'PASS') . ' (' . ($summary['percent_mapped'] ?? 100) . '%)';
        $lines[] = '';

        if (! $hasIssues) {
            $lines[] = '## Status';
            $lines[] = 'No issues detected during this audit run.';
        } else {
            $lines[] = '## Top Issues';
            foreach (array_slice($issues, 0, 25) as $issue) {
                $lines[] = sprintf(
                    '- Email ID %s | Subject: %s | Expected: %s | Found: %s | Issue: %s',
                    $issue['email_id'] ?? '—',
                    $issue['subject'] ?? '—',
                    ! empty($issue['expected_symbols']) ? implode(', ', $issue['expected_symbols']) : '—',
                    $issue['found_alerts'] ?? '—',
                    $issue['issue_type'] ?? '—'
                );
            }

            $lines[] = '';
            $lines[] = '## Codex Remediation Instructions';
            $lines[] = '```text';
            $lines[] = 'Objective: Resolve ingestion mismatches found in alerts:audit.';
            $lines[] = '';
            $lines[] = 'Summary of failures:';
            $lines[] = sprintf('- Emails missing alerts: %d', $summary['emails_missing_alerts'] ?? 0);
            $lines[] = sprintf('- Symbol mismatches: %d', $summary['symbol_mismatches'] ?? 0);
            $lines[] = sprintf('- Alerts without source email: %d', $summary['alerts_without_source'] ?? 0);
            $lines[] = '';
            $lines[] = 'Suspected root causes:';
            $lines[] = '- Scraper records not linked to trade alerts (missing source_scraper_id or identifier mapping).';
            $lines[] = '- Symbol extraction regex/stoplist drift vs. actual email content.';
            $lines[] = '- Category/alert_type mapping mismatch between scraper and trade alert builder.';
            $lines[] = '';
            $lines[] = 'Files likely needing review:';
            $lines[] = '- app/Models/AlertsModel.php';
            $lines[] = '- app/Libraries/MyMIAlerts.php';
            $lines[] = '- app/Modules/APIs/Controllers/AlertsController.php';
            $lines[] = '- app/Modules/Management/Controllers/AlertsController.php';
            $lines[] = '- app/Libraries/Brokers/ThinkorSwimParser.php';
            $lines[] = '';
            $lines[] = 'Recommended fixes:';
            $lines[] = '- Ensure scraper records persist source identifiers used by trade alerts.';
            $lines[] = '- Align symbol extraction rules with the latest alert email formats.';
            $lines[] = '- Normalize alert_type/category mapping when generating trade alerts.';
            $lines[] = '- Re-run alerts:audit after corrections to confirm health score returns to PASS.';
            $lines[] = '```';
        }

        file_put_contents($docPath . DIRECTORY_SEPARATOR . 'alerts_audit_last_run.md', implode(PHP_EOL, $lines));
    }

    private function insertAuditLog($db, array $payload): void
    {
        try {
            $columns = $db->getFieldNames('bf_error_logs');
        } catch (\Throwable $e) {
            return;
        }

        $available = array_map('strtolower', $columns);
        $filtered = array_intersect_key($payload, array_flip($available));

        if ($filtered === []) {
            return;
        }

        try {
            $db->table('bf_error_logs')->insert($filtered);
        } catch (\Throwable $e) {
            log_message('warning', 'alerts:audit failed to insert audit log: {error}', ['error' => $e->getMessage()]);
        }
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
