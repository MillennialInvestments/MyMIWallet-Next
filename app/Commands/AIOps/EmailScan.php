<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use App\Models\AiOpsRunModel;
use App\Services\AIOps\EmailScannerService;
use CodeIgniter\CLI\CLI;
use Config\Database;

class EmailScan extends SafeBaseCommand
{
    protected $group = 'AIOps - Marketing';
    protected $name = 'aiops:email-scan';
    protected $description = 'Scan alerts mailbox for new emails and record AIOps counts.';
    protected $usage = 'aiops:email-scan [--mailbox=INBOX] [--from=alerts@mymiwallet.com] [--since=YYYY-MM-DD] [--lookback-days=2] [--limit=250] [--dry-run]';
    protected $options = [
        '--mailbox' => 'IMAP mailbox folder (default: INBOX).',
        '--from' => 'Filter by sender email address (default: alerts@mymiwallet.com).',
        '--since' => 'IMAP SINCE date in YYYY-MM-DD format (overrides lookback-days).',
        '--lookback-days' => 'Number of days to look back when --since is not provided (default: 2).',
        '--limit' => 'Maximum number of emails to scan per run.',
        '--dry-run' => 'Preview counts without writing to the database.',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:aiops:email-scan] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        if (! function_exists('imap_open')) {
            CLI::error('IMAP extension not available.');
            log_message('error', '[spark:aiops:email-scan] Failed', ['reason' => 'IMAP extension missing']);
            return EXIT_ERROR;
        }

        $host = trim((string) env('MYMI_ALERTS_IMAP_HOST'));
        $user = trim((string) env('MYMI_ALERTS_IMAP_USER'));
        $pass = trim((string) env('MYMI_ALERTS_IMAP_PASS'));
        $mailbox = trim((string) $this->resolveStringOption($params, 'mailbox', env('MYMI_ALERTS_IMAP_MAILBOX') ?: 'INBOX'));
        $from = trim((string) $this->resolveStringOption($params, 'from', env('MYMI_ALERTS_IMAP_FROM') ?: 'alerts@mymiwallet.com'));
        $since = trim((string) $this->resolveStringOption($params, 'since', ''));
        $lookbackDays = $this->resolveIntOption($params, 'lookback-days', (int) (env('MYMI_ALERTS_IMAP_LOOKBACK_DAYS') ?: 2));
        $limit = $this->resolveIntOption($params, 'limit', (int) (env('MYMI_ALERTS_IMAP_LIMIT') ?: 0));

        if ($host === '' || $user === '' || $pass === '') {
            CLI::error('IMAP credentials are not configured.');
            log_message('error', '[spark:aiops:email-scan] Failed', ['reason' => 'IMAP credentials missing']);
            return EXIT_ERROR;
        }

        $sinceDate = $since !== '' ? $since : date('Y-m-d', strtotime('-' . max(1, $lookbackDays) . ' days'));
        $lockKey = 'aiops:email-scan:' . $mailbox;

        $db = Database::connect();
        if (! $this->acquireLock($db, $lockKey)) {
            CLI::error('Scan already running; lock unavailable.');
            log_message('warning', '[spark:aiops:email-scan] Lock unavailable', ['lock' => $lockKey]);
            return EXIT_ERROR;
        }

        $runModel = new AiOpsRunModel();
        $startedAt = microtime(true);

        try {
            $runId = $runModel->startRun('email_scan', $mailbox, $from, [
                'since' => $sinceDate,
                'limit' => $limit,
                'dry_run' => $dryRun,
            ]);

            $service = new EmailScannerService();
            $summary = $service->scan([
                'host' => $host,
                'user' => $user,
                'pass' => $pass,
                'mailbox' => $mailbox,
                'from' => $from,
                'since' => $sinceDate,
                'limit' => $limit,
                'dry_run' => $dryRun,
            ]);

            $duration = (int) round(microtime(true) - $startedAt);
            $summary['duration_seconds'] = $duration;

            $status = $dryRun ? 'dry-run' : 'success';
            $runModel->finishRun($runId, $status, $summary, [
                'criteria' => $summary['criteria'] ?? null,
                'tickers' => $summary['tickers'] ?? [],
                'dry_run' => $dryRun,
            ]);

            $this->renderSummary($summary, $mailbox, $from, $sinceDate, $dryRun);

            log_message('info', '[spark:aiops:email-scan] Completed', [
                'summary' => $summary,
                'dry_run' => $dryRun,
            ]);
        } catch (\Throwable $error) {
            $duration = (int) round(microtime(true) - $startedAt);

            if (isset($runId)) {
                $runModel->finishRun($runId, 'failed', [
                'duration_seconds' => $duration,
                ], [
                    'error' => $error->getMessage(),
                    'dry_run' => $dryRun,
                ]);
            }

            log_message('error', '[spark:aiops:email-scan] Failed', ['reason' => $error->getMessage()]);
            CLI::error($error->getMessage());
            return EXIT_ERROR;
        } finally {
            $this->releaseLock($db, $lockKey);
        }
        return EXIT_SUCCESS;
    }

    private function acquireLock($db, string $lockKey): bool
    {
        $row = $db->query('SELECT GET_LOCK(?, 0) AS locked', [$lockKey])->getRowArray();
        return (int) ($row['locked'] ?? 0) === 1;
    }

    private function releaseLock($db, string $lockKey): void
    {
        $db->query('SELECT RELEASE_LOCK(?)', [$lockKey]);
    }

    private function resolveStringOption(array $params, string $key, string $default): string
    {
        $value = $default;
        foreach ($params as $index => $param) {
            if ($param === '--' . $key && isset($params[$index + 1])) {
                $value = (string) $params[$index + 1];
                continue;
            }

            if (str_starts_with($param, '--' . $key . '=')) {
                $value = (string) substr($param, strlen('--' . $key . '='));
            }
        }

        return $value;
    }

    private function resolveIntOption(array $params, string $key, int $default): int
    {
        $value = $default;
        foreach ($params as $index => $param) {
            if ($param === '--' . $key && isset($params[$index + 1])) {
                $value = (int) $params[$index + 1];
                continue;
            }

            if (str_starts_with($param, '--' . $key . '=')) {
                $value = (int) substr($param, strlen('--' . $key . '='));
            }
        }

        return $value;
    }

    /**
     * @param array<string, mixed> $summary
     */
    private function renderSummary(array $summary, string $mailbox, string $from, string $since, bool $dryRun): void
    {
        CLI::write('AIOps Email Scan Summary', 'yellow');
        CLI::write('Mailbox: ' . $mailbox);
        CLI::write('From: ' . $from);
        CLI::write('Since: ' . $since);
        CLI::write('Scanned: ' . ($summary['scanned_count'] ?? 0));
        CLI::write('Processed: ' . ($summary['processed_count'] ?? 0));
        CLI::write('Duplicates skipped: ' . ($summary['duplicate_count'] ?? 0));
        CLI::write('Tickers recorded: ' . ($summary['ticker_count'] ?? 0));
        CLI::write('Duration (seconds): ' . ($summary['duration_seconds'] ?? 0));
        if ($dryRun) {
            CLI::write('Mode: dry-run (no database writes)', 'yellow');
        }
    }
}
