<?php

declare(strict_types=1);

namespace App\Services\AIOps;

use App\Libraries\ScannerRouter;
use App\Models\AiOpsEmailProcessedModel;
use App\Models\InvestmentScannerLineageModel;
use App\Models\InvestmentTickerDailyCountModel;
use RuntimeException;

class EmailScannerService
{
    private AiOpsEmailProcessedModel $processed;
    private InvestmentTickerDailyCountModel $tickerCounts;
    private InvestmentScannerLineageModel $scannerLineage;

    public function __construct(
        ?AiOpsEmailProcessedModel $processed = null,
        ?InvestmentTickerDailyCountModel $tickerCounts = null,
        ?InvestmentScannerLineageModel $scannerLineage = null
    ) {
        $this->processed = $processed ?? new AiOpsEmailProcessedModel();
        $this->tickerCounts = $tickerCounts ?? new InvestmentTickerDailyCountModel();
        $this->scannerLineage = $scannerLineage ?? new InvestmentScannerLineageModel();
    }

    /**
     * @param array<string, mixed> $config
     * @return array<string, mixed>
     */
    public function scan(array $config): array
    {
        if (! function_exists('imap_open')) {
            throw new RuntimeException('IMAP extension not available.');
        }

        $host = trim((string) ($config['host'] ?? ''));
        $user = trim((string) ($config['user'] ?? ''));
        $pass = trim((string) ($config['pass'] ?? ''));
        $mailbox = trim((string) ($config['mailbox'] ?? 'INBOX'));
        $fromFilter = trim((string) ($config['from'] ?? ''));
        $since = $config['since'] ?? null;
        $limit = (int) ($config['limit'] ?? 0);
        $dryRun = (bool) ($config['dry_run'] ?? false);

        if ($host === '' || $user === '' || $pass === '') {
            throw new RuntimeException('IMAP credentials are not configured.');
        }

        $criteriaParts = [];
        if ($since) {
            $criteriaParts[] = 'SINCE "' . $this->formatImapDate((string) $since) . '"';
        }
        if ($fromFilter !== '') {
            $criteriaParts[] = 'FROM "' . addslashes($fromFilter) . '"';
        }
        $criteria = $criteriaParts === [] ? 'ALL' : implode(' ', $criteriaParts);

        $port = (int) (env('MYMI_ALERTS_IMAP_PORT') ?: 993);
        $mailboxConnection = $this->buildMailboxString([
            'host' => $host,
            'port' => $port,
            'mailbox' => $mailbox,
        ]);

        log_message('debug', 'EmailScannerService IMAP config: ' . json_encode([
            'library' => 'EmailScannerService',
            'host' => $host,
            'port' => $port,
            'mailbox' => $mailbox,
            'connection_string' => $mailboxConnection,
        ], JSON_UNESCAPED_SLASHES));

        log_message('debug', 'IMAP Mailbox String: ' . $mailboxConnection);

        $imap = @imap_open($mailboxConnection, $user, $pass);

        if (!$imap) {
            $errors = imap_errors();
            $last = imap_last_error();
            throw new RuntimeException(
                'IMAP connect failed: ' . ($last ?: 'Unknown') .
                ' | All errors: ' . json_encode($errors)
            );
        }

        try {
            $uids = imap_search($imap, $criteria, SE_UID) ?: [];
            if ($limit > 0) {
                $uids = array_slice($uids, 0, $limit);
            }

            $summary = [
                'status' => 'success',
                'scanned_count' => count($uids),
                'processed_count' => 0,
                'duplicate_count' => 0,
                'ticker_count' => 0,
                'tickers' => [],
                'mailbox' => $mailbox,
                'criteria' => $criteria,
                'dry_run' => $dryRun,
            ];

            foreach ($uids as $uid) {
                $imapUid = (int) $uid;
                if ($imapUid <= 0) {
                    continue;
                }

                if ($this->processed->hasProcessed($mailbox, $imapUid)) {
                    $summary['duplicate_count']++;
                    continue;
                }

                $overviewList = imap_fetch_overview($imap, (string) $imapUid, FT_UID);
                $overview = $overviewList[0] ?? null;

                $rawSubject = is_object($overview) ? (string) ($overview->subject ?? '') : '';
                $subject = trim(imap_utf8($rawSubject));
                $fromEmail = $this->extractEmail(is_object($overview) ? (string) ($overview->from ?? '') : '');
                $messageId = is_object($overview) ? (string) ($overview->message_id ?? '') : '';
                $receivedAt = is_object($overview) && isset($overview->date)
                    ? date('Y-m-d H:i:s', strtotime((string) $overview->date))
                    : null;

                if ($fromFilter !== '' && $fromEmail !== '' && strtolower($fromEmail) !== strtolower($fromFilter)) {
                    continue;
                }

                $body = $this->getBody($imap, $imapUid);
                $scannerName = $this->extractScannerName($subject, $body);
                $scannerKey = ScannerRouter::resolveScannerEventKey($scannerName ?: $subject);
                $scanDate = $receivedAt ? substr($receivedAt, 0, 10) : date('Y-m-d');

                $tickers = $this->extractTickers($subject, $body);
                $uniqueTickers = array_values(array_unique($tickers));

                if (! $dryRun) {
                    $inserted = $this->processed->insertIfNew([
                        'mailbox' => $mailbox,
                        'imap_uid' => $imapUid,
                        'message_id' => $messageId ?: null,
                        'from_email' => $fromEmail ?: null,
                        'subject' => $subject !== '' ? $subject : null,
                        'received_at' => $receivedAt,
                        'status' => 'stored',
                        'processed_at' => date('Y-m-d H:i:s'),
                    ], [
                        'tickers' => $uniqueTickers,
                        'scanner_key' => $scannerKey,
                        'scanner_name' => $scannerName,
                    ]);

                    if (! $inserted) {
                        $summary['duplicate_count']++;
                        continue;
                    }

                    if ($scannerName) {
                        $this->scannerLineage->rememberScanner($scannerKey, $scannerName, 'email', [
                            'mailbox' => $mailbox,
                            'from_email' => $fromEmail,
                        ]);
                    }

                    foreach ($uniqueTickers as $ticker) {
                        $this->tickerCounts->incrementCount($ticker, $scanDate, 'email', $scannerKey, 1);
                    }
                }

                $summary['processed_count']++;
                $summary['ticker_count'] += count($uniqueTickers);
                $summary['tickers'] = array_values(array_unique(array_merge($summary['tickers'], $uniqueTickers)));
            }

            return $summary;
        } catch (\Throwable $e) {
            throw new RuntimeException('Email scanner failed: ' . $e->getMessage(), 0, $e);
        } finally {
            imap_close($imap);
        }
    }

    private function formatImapDate(string $date): string
    {
        $timestamp = strtotime($date);
        if ($timestamp === false) {
            $timestamp = time();
        }

        return date('d-M-Y', $timestamp);
    }

    private function extractEmail(string $from): string
    {
        if (preg_match('/<([^>]+)>/', $from, $matches)) {
            return strtolower(trim($matches[1]));
        }

        $sanitized = trim($from);
        if (strpos($sanitized, '@') !== false) {
            $parts = preg_split('/\s+/', $sanitized);
            return strtolower(trim($parts[0] ?? $sanitized));
        }

        return strtolower($sanitized);
    }

    private function getBody($imap, int $imapUid): string
    {
        $body = imap_fetchbody($imap, (string) $imapUid, '1', FT_UID | FT_PEEK);

        if ($body === '') {
            $body = imap_body($imap, (string) $imapUid, FT_UID | FT_PEEK);
        }

        $structure = @imap_fetchstructure($imap, (string) $imapUid, FT_UID);
        $encoding = is_object($structure) ? (int) $structure->encoding : 0;

        return $this->stripHtml($this->decodeBody($body, $encoding));
    }

    private function decodeBody(string $body, int $encoding): string
    {
        switch ($encoding) {
            case 3:
                return base64_decode($body, true) ?: $body;
            case 4:
                return quoted_printable_decode($body);
            default:
                return $body;
        }
    }

    private function stripHtml(string $body): string
    {
        $decoded = html_entity_decode($body, ENT_QUOTES | ENT_HTML5);
        $clean = strip_tags($decoded);
        $clean = preg_replace('/\s+/', ' ', (string) $clean);

        return trim((string) $clean);
    }

    private function extractScannerName(string $subject, string $body): ?string
    {
        if ($subject !== '' && preg_match('/\[(.+?)\]/', $subject, $matches)) {
            return trim($matches[1]);
        }

        if (preg_match('/scanner\s*[:\-]\s*([^\n\r]+)/i', $body, $matches)) {
            return trim($matches[1]);
        }

        return null;
    }

    /**
     * @return array<int, string>
     */
    private function extractTickers(string $subject, string $body): array
    {
        $content = strtoupper($subject . ' ' . $body);
        preg_match_all('/\b[A-Z]{1,5}(?:\.[A-Z])?\b/', $content, $matches);

        $stoplist = [
            'ALERT',
            'BUY',
            'SELL',
            'CALL',
            'PUT',
            'STOP',
            'LIMIT',
            'LONG',
            'SHORT',
            'DAY',
            'WEEK',
            'MONTH',
            'ENTRY',
            'EXIT',
            'TARGET',
            'NEWS',
            'MOVE',
            'FROM',
            'WITH',
            'YOUR',
            'THIS',
            'THAT',
            'USD',
            'ETF',
            'IPO',
            'AI',
        ];

        $tickers = [];
        foreach ($matches[0] ?? [] as $candidate) {
            $candidate = trim($candidate);
            if ($candidate === '' || in_array($candidate, $stoplist, true)) {
                continue;
            }
            if (strlen($candidate) === 1 && ! ctype_alpha($candidate)) {
                continue;
            }
            $tickers[] = $candidate;
        }

        return array_values(array_unique($tickers));
    }

    private function buildMailboxString(array $config): string
    {
        $host = trim((string) ($config['host'] ?? ''));
        if ($host === '') {
            throw new RuntimeException('IMAP host is required.');
        }
        $port = (int) ($config['port'] ?? 993);
        $mailbox = trim((string) ($config['mailbox'] ?? 'INBOX'));
        if ($mailbox === '') {
            $mailbox = 'INBOX';
        }

        return sprintf(
            '{%s:%d/imap/ssl/novalidate-cert}%s',
            $host,
            $port,
            $mailbox
        );
    }

}
