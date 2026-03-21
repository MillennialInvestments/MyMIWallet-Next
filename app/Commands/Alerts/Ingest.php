<?php

declare(strict_types=1);

namespace App\Commands\Alerts;

use App\Commands\SafeBaseCommand;
use App\Libraries\MyMIAlerts;
use App\Models\AiOpsIngestRunModel;
use App\Models\AlertsModel;
use CodeIgniter\CLI\CLI;

class Ingest extends SafeBaseCommand
{
    protected $group = 'Alerts';
    protected $name = 'alerts:ingest';
    protected $description = 'Ingest ThinkorSwim alert emails and upsert trade alerts.';
    protected $usage = 'ops:alerts:ingest [--since=15m|1h|today] [--limit=200] [--dry-run] [--verbose]';
    protected $options = [
        '--since' => 'How far back to scan (default: 15m). Supports 15m|1h|today.',
        '--limit' => 'Max emails to scan (default: 200).',
        '--dry-run' => 'Preview ingestion without DB writes.',
        '--verbose' => 'Verbose logging to CLI.',
    ];

    public function run(array $params)
    {
        $params = $this->normalizeCliParams($params);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $verbose = isset($flags['verbose']);

        $since = $this->resolveOption($params, 'since', '15m');
        $limit = (int) $this->resolveOption($params, 'limit', '200');
        if ($limit <= 0) {
            $limit = 200;
        }

        $startTime = microtime(true);
        $startedAt = date('Y-m-d H:i:s');
        $summary = [
            'emails_scanned' => 0,
            'new_emails' => 0,
            'duplicates' => 0,
            'alerts_created' => 0,
            'alerts_updated' => 0,
        ];
        $status = 'success';
        $errorMessage = null;

        try {
            if (! function_exists('imap_open')) {
                if ($dryRun) {
                    CLI::write('IMAP extension not available. Dry-run will skip mailbox scan.', 'yellow');
                    $errorMessage = 'IMAP extension not available.';
                    throw new \RuntimeException('Dry-run skip');
                }
                throw new \RuntimeException('IMAP extension not available.');
            }

            $config = config('MyMI');
            CLI::write('Using alert email: ' . $config->alertEmail, 'yellow');
            log_message('info', 'Using alert email: ' . $config->alertEmail);
            $imapHost = env('alerts.imap.host', 'imap.dreamhost.com:993/imap/ssl');
            $imapMailbox = sprintf('{%s}%s', $imapHost, 'INBOX');
            $imapUser = env('alerts.imap.user', $config->alertEmail);
            $imapPass = env('alerts.imap.pass', env('ALERTS_IMAP_PASSWORD', 'MyMI2024!'));

            $imap = @imap_open($imapMailbox, $imapUser, $imapPass);
            if (! $imap) {
                throw new \RuntimeException('Unable to connect to IMAP mailbox.');
            }

            try {
                $criteria = $this->buildImapCriteria($since);
                $emails = imap_search($imap, $criteria) ?: [];
                $emails = array_slice($emails, 0, $limit);
                $summary['emails_scanned'] = count($emails);

                if ($verbose) {
                    CLI::write('IMAP criteria: ' . $criteria, 'blue');
                    CLI::write('Emails scanned: ' . $summary['emails_scanned'], 'blue');
                }

                $alerts = $dryRun ? null : new MyMIAlerts();

                foreach ($emails as $emailNumber) {
                    $header = imap_headerinfo($imap, (int) $emailNumber);
                    $subject = isset($header->subject) ? imap_utf8($header->subject) : 'No Subject';
                    $date = isset($header->date) ? date('Y-m-d H:i:s', strtotime($header->date)) : date('Y-m-d H:i:s');
                    $sender = $header->from ?? [];
                    $messageId = isset($header->message_id) ? trim((string) $header->message_id) : '';
                    $body = $this->fetchEmailBody($imap, (int) $emailNumber);

                    $identifier = $messageId !== '' ? $messageId : md5($subject . $date . json_encode($sender));

                    if ($dryRun) {
                        $summary['new_emails']++;
                        if ($verbose) {
                            CLI::write(sprintf('Dry-run: would ingest "%s"', $subject));
                        }
                        continue;
                    }

                    $payload = [
                        'subject' => $subject,
                        'date' => $date,
                        'sender' => $sender,
                        'body' => $body,
                        'identifier' => $identifier,
                    ];

                    $result = $alerts->ingestEmailPayload($payload);
                    if ($result === null) {
                        $summary['duplicates']++;
                        continue;
                    }

                    if (! empty($result['id'])) {
                        $summary['new_emails']++;
                    }
                }
            } finally {
                imap_close($imap);
            }

            if (! $dryRun) {
                $alertsModel = new AlertsModel();
                $report = [];
                $alertsModel->processScrapedSymbols(null, null, $report);
                $summary['alerts_created'] = (int) ($report['alerts_created'] ?? 0);
                $summary['alerts_updated'] = (int) ($report['alerts_updated'] ?? 0);
            }
        } catch (\Throwable $e) {
            if ($dryRun && $e->getMessage() === 'Dry-run skip') {
                // noop: already logged
            } else {
                $status = 'error';
                $errorMessage = $e->getMessage();
                CLI::error('Alerts ingest failed: ' . $errorMessage);
            }
        }

        $endedAt = date('Y-m-d H:i:s');
        $durationMs = (int) ((microtime(true) - $startTime) * 1000);

        $this->writeMetrics([
            'job' => 'alerts_ingest',
            'started_at' => $startedAt,
            'ended_at' => $endedAt,
            'duration_ms' => $durationMs,
            'emails_scanned' => $summary['emails_scanned'],
            'new_emails' => $summary['new_emails'],
            'duplicates' => $summary['duplicates'],
            'alerts_created' => $summary['alerts_created'],
            'alerts_updated' => $summary['alerts_updated'],
            'status' => $status,
            'error_message' => $errorMessage,
            'created_at' => date('Y-m-d H:i:s'),
        ], $dryRun);

        CLI::write('Alerts ingest summary', 'yellow');
        CLI::write(sprintf('emails scanned: %d', $summary['emails_scanned']));
        CLI::write(sprintf('new stored: %d', $summary['new_emails']));
        CLI::write(sprintf('duplicates skipped: %d', $summary['duplicates']));
        CLI::write(sprintf('alerts created: %d', $summary['alerts_created']));
        CLI::write(sprintf('alerts updated: %d', $summary['alerts_updated']));
        CLI::write(sprintf('total runtime ms: %d', $durationMs));

        return $status === 'success' ? EXIT_SUCCESS : EXIT_ERROR;
    }

    private function buildImapCriteria(string $since): string
    {
        $since = strtolower(trim($since));
        if ($since === 'today') {
            $date = date('d-M-Y');
            return 'SINCE "' . $date . '"';
        }

        if (preg_match('/^(\d+)(m|h)$/', $since, $match)) {
            $amount = (int) $match[1];
            $unit = $match[2];
            $interval = $unit === 'h' ? "-{$amount} hour" : "-{$amount} minute";
            $timestamp = strtotime($interval) ?: time();
            $date = date('d-M-Y', $timestamp);
            return 'SINCE "' . $date . '"';
        }

        $timestamp = strtotime($since);
        if ($timestamp !== false) {
            return 'SINCE "' . date('d-M-Y', $timestamp) . '"';
        }

        return 'ALL';
    }

    private function fetchEmailBody($imap, int $emailNumber): string
    {
        $body = imap_fetchbody($imap, $emailNumber, '1.2');
        if ($body === '') {
            $body = imap_fetchbody($imap, $emailNumber, '1');
        }
        if ($body === '') {
            $body = imap_body($imap, $emailNumber);
        }

        return is_string($body) ? $body : '';
    }

    private function resolveOption(array $params, string $key, string $default): string
    {
        $value = $default;
        foreach ($params as $index => $param) {
            if (! is_string($param)) {
                continue;
            }

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

    private function normalizeCliParams(array $params): array
    {
        $normalized = [];

        foreach ($params as $key => $value) {
            if (is_string($key)) {
                $flag = '--' . ltrim($key, '-');
                if ($value === null || $value === true || $value === '') {
                    $normalized[] = $flag;
                    continue;
                }

                if ($value === false) {
                    continue;
                }

                $normalized[] = $flag . '=' . (string) $value;
                continue;
            }

            $normalized[] = $value;
        }

        return $normalized;
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function writeMetrics(array $payload, bool $dryRun): void
    {
        try {
            $db = db_connect();
            if (! $db->tableExists('bf_aiops_ingest_runs')) {
                return;
            }
            $model = new AiOpsIngestRunModel();
            $model->insert($payload);
            if ($dryRun) {
                CLI::write('Metrics row inserted (dry-run).', 'yellow');
            }
        } catch (\Throwable $e) {
            CLI::write('Metrics insert skipped: ' . $e->getMessage(), 'yellow');
        }
    }

    protected function isDestructive(): bool
    {
        return true;
    }
}
