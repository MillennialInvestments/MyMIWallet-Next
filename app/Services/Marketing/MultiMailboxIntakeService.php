<?php

declare(strict_types=1);

namespace App\Services\Marketing;

use App\Models\AlertsModel;
use App\Models\MarketingModel;
use Config\Database;
use Config\NewsEmailServer;

class MultiMailboxIntakeService
{
    private MarketingModel $marketingModel;
    private AlertsModel $alertsModel;
    private NewsEmailServer $newsConfig;
    private $db;

    public function __construct(
        ?MarketingModel $marketingModel = null,
        ?AlertsModel $alertsModel = null,
        ?NewsEmailServer $newsConfig = null
    ) {
        $this->marketingModel = $marketingModel ?? new MarketingModel();
        $this->alertsModel = $alertsModel ?? new AlertsModel();
        $this->newsConfig = $newsConfig ?? config('NewsEmailServer');
        $this->db = Database::connect();
    }

    /**
     * Poll both mailboxes or a specific target.
     *
     * @param array<string, mixed> $options
     * @return array<string, mixed>
     */
    public function fetchAll(array $options = []): array
    {
        $target = strtolower((string) ($options['mailbox'] ?? 'all'));
        $limit = max(1, (int) ($options['limit'] ?? 20));
        $dryRun = (bool) ($options['dry_run'] ?? false);

        $results = [
            'status' => 'success',
            'timestamp' => date('Y-m-d H:i:s'),
            'alerts_mailbox' => null,
            'news_mailbox' => null,
            'total_scanned' => 0,
            'total_new_stored' => 0,
            'total_duplicates' => 0,
            'errors' => [],
        ];

        if ($target === 'all' || $target === 'alerts' || $target === 'trade_alerts') {
            $alertUser = (string) env('alerts.imap.user', env('MYMI_ALERT_EMAIL', 'alerts@mymiwallet.com'));
            $resAlerts = $this->fetchFromMailbox($alertUser, 'trade_alert', $limit, $dryRun);
            $results['alerts_mailbox'] = $resAlerts;
            $results['total_scanned'] += (int) ($resAlerts['scanned'] ?? 0);
            $results['total_new_stored'] += (int) ($resAlerts['stored'] ?? 0);
            $results['total_duplicates'] += (int) ($resAlerts['duplicates'] ?? 0);
            if (! empty($resAlerts['errors'])) {
                $results['errors'] = array_merge($results['errors'], (array) $resAlerts['errors']);
            }
        }

        if ($target === 'all' || $target === 'news') {
            $newsUser = (string) env('MARKETING_NEWS_IMAP_USER', 'news@mymiwallet.com');
            $resNews = $this->fetchFromMailbox($newsUser, 'news', $limit, $dryRun);
            $results['news_mailbox'] = $resNews;
            $results['total_scanned'] += (int) ($resNews['scanned'] ?? 0);
            $results['total_new_stored'] += (int) ($resNews['stored'] ?? 0);
            $results['total_duplicates'] += (int) ($resNews['duplicates'] ?? 0);
            if (! empty($resNews['errors'])) {
                $results['errors'] = array_merge($results['errors'], (array) $resNews['errors']);
            }
        }

        return $results;
    }

    /**
     * Fetch from a specific IMAP mailbox.
     */
    public function fetchFromMailbox(string $username, string $defaultType, int $limit = 20, bool $dryRun = false): array
    {
        $report = [
            'mailbox' => $username,
            'connection_ok' => false,
            'scanned' => 0,
            'stored' => 0,
            'duplicates' => 0,
            'errors' => [],
            'items' => [],
        ];

        if (! function_exists('imap_open')) {
            $report['errors'][] = 'PHP IMAP extension is not installed.';
            return $report;
        }

        $host = (string) env('alerts.imap.host', env('IMAP_HOST', 'imap.dreamhost.com'));
        $port = (int) env('alerts.imap.port', env('IMAP_PORT', 993));
        $flags = '/imap/ssl/novalidate-cert';
        $password = (string) env('alerts.imap.pass', env('IMAP_pass', env('IMAP_PASSWORD', '')));

        if ($password === '') {
            $report['errors'][] = "No IMAP password configured for {$username}";
            return $report;
        }

        $connectionString = sprintf('{%s:%d%s}INBOX', $host, $port, $flags);
        $imap = @imap_open($connectionString, $username, $password, 0, 1, ['DISABLE_AUTHENTICATOR' => 'GSSAPI']);

        if (! $imap) {
            $report['errors'][] = 'IMAP connection failed: ' . (imap_last_error() ?: 'Unknown error');
            return $report;
        }

        $report['connection_ok'] = true;

        try {
            $search = imap_search($imap, 'ALL', SE_UID);
            if (! $search) {
                @imap_close($imap);
                return $report;
            }

            rsort($search);
            $search = array_slice($search, 0, $limit);
            $report['scanned'] = count($search);

            foreach ($search as $uid) {
                $header = @imap_headerinfo($imap, imap_msgno($imap, $uid));
                $subject = $this->decodeMimeHeader($header->subject ?? 'No Subject');
                $from = $this->decodeMimeHeader($header->fromaddress ?? 'unknown');
                $dateStr = $header->date ?? date('Y-m-d H:i:s');
                $msgId = trim($header->message_id ?? "uid-{$uid}-{$username}");

                // Identifier deduplication
                $identifier = md5($msgId . '|' . $username);
                if ($this->isAlreadyStored($identifier, $subject)) {
                    $report['duplicates']++;
                    continue;
                }

                // Extract body
                $body = $this->fetchBody($imap, $uid);
                $cleanBody = trim(strip_tags($body));

                // Parse alert parameters
                $parsed = $this->parseEmailContent($subject, $cleanBody, $defaultType);

                $record = [
                    'title' => $subject,
                    'content' => $cleanBody,
                    'status' => 'pending',
                    'processed' => 0,
                    'type' => $parsed['type'],
                    'source_type' => 'email_alert',
                    'ticker' => $parsed['ticker'],
                    'company_name' => $parsed['company_name'],
                    'date_scraped' => date('Y-m-d H:i:s', strtotime($dateStr)),
                    'metadata' => json_encode([
                        'identifier' => $identifier,
                        'message_id' => $msgId,
                        'mailbox' => $username,
                        'from' => $from,
                        'parsed_trade' => $parsed,
                        'received_at' => date('Y-m-d H:i:s', strtotime($dateStr)),
                    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
                ];

                if (! $dryRun) {
                    $insertId = $this->storeTempScraperRecord($record);
                    if ($insertId > 0) {
                        $report['stored']++;
                        $report['items'][] = [
                            'id' => $insertId,
                            'ticker' => $parsed['ticker'],
                            'type' => $parsed['type'],
                            'subject' => $subject,
                        ];
                    } else {
                        $report['errors'][] = "Failed inserting record for UID {$uid}";
                    }
                } else {
                    $report['stored']++;
                    $report['items'][] = [
                        'id' => 0,
                        'ticker' => $parsed['ticker'],
                        'type' => $parsed['type'],
                        'subject' => $subject,
                    ];
                }
            }
        } finally {
            @imap_close($imap);
        }

        return $report;
    }

    /**
     * Programmatically inject a trade alert into the intake stream.
     *
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    public function injectTradeAlert(array $data): array
    {
        $ticker = strtoupper(trim((string) ($data['ticker'] ?? 'NVDA')));
        $strategy = strtoupper(trim((string) ($data['strategy'] ?? 'STRANGLE')));
        $underlierPrice = (float) ($data['underlier_price'] ?? 0.0);
        $callStrike = (float) ($data['call_strike'] ?? 0.0);
        $putStrike = (float) ($data['put_strike'] ?? 0.0);
        $targetProfit = (float) ($data['target_profit'] ?? 200.0);
        $headline = trim((string) ($data['headline'] ?? "{$ticker} Weekly Options Momentum {$strategy} Alert"));
        $note = trim((string) ($data['note'] ?? "Momentum breakout detected. High-volume two-sided setup for {$ticker}."));

        $subject = "🚨 Trade Alert: {$ticker} {$strategy} (${callStrike}C / ${putStrike}P)";
        $body = "Trade Alert Details:\nSymbol: {$ticker}\nStrategy: {$strategy}\nUnderlier Price: \${$underlierPrice}\nCall Strike: \${$callStrike}\nPut Strike: \${$putStrike}\nTarget Profit: +\${$targetProfit}\nCatalyst: {$headline}\nNotes: {$note}";

        $identifier = 'trade-alert-' . strtolower($ticker) . '-' . date('YmdHis') . '-' . bin2hex(random_bytes(3));

        $record = [
            'title' => $subject,
            'content' => $body,
            'status' => 'pending',
            'processed' => 0,
            'type' => 'trade_alert',
            'source_type' => 'email_alert',
            'ticker' => $ticker,
            'company_name' => $data['company_name'] ?? $ticker,
            'date_scraped' => date('Y-m-d H:i:s'),
            'metadata' => json_encode([
                'identifier' => $identifier,
                'mailbox' => 'alerts@mymiwallet.com',
                'from' => 'scanner@mymiwallet.com',
                'parsed_trade' => [
                    'ticker' => $ticker,
                    'strategy' => $strategy,
                    'underlier_price' => $underlierPrice,
                    'call_strike' => $callStrike,
                    'put_strike' => $putStrike,
                    'target_profit' => $targetProfit,
                    'headline' => $headline,
                    'note' => $note,
                    'type' => 'trade_alert',
                ],
                'received_at' => date('Y-m-d H:i:s'),
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        ];

        $insertId = $this->storeTempScraperRecord($record);

        return [
            'status' => 'success',
            'id' => $insertId,
            'ticker' => $ticker,
            'strategy' => $strategy,
            'subject' => $subject,
        ];
    }

    /**
     * Programmatically inject market news into the intake stream.
     *
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    public function injectMarketNews(array $data): array
    {
        $ticker = strtoupper(trim((string) ($data['ticker'] ?? 'SPY')));
        $headline = trim((string) ($data['headline'] ?? 'Major Market Catalyst Announced'));
        $body = trim((string) ($data['body'] ?? 'Key industry developments are shaping market direction today.'));
        $company = trim((string) ($data['company_name'] ?? $ticker));

        $identifier = 'news-' . strtolower($ticker) . '-' . date('YmdHis') . '-' . bin2hex(random_bytes(3));

        $record = [
            'title' => $headline,
            'content' => $body,
            'status' => 'pending',
            'processed' => 0,
            'type' => 'marketing_news',
            'source_type' => 'email_alert',
            'ticker' => $ticker,
            'company_name' => $company,
            'date_scraped' => date('Y-m-d H:i:s'),
            'metadata' => json_encode([
                'identifier' => $identifier,
                'mailbox' => 'news@mymiwallet.com',
                'from' => 'pr@businesswire.com',
                'parsed_trade' => [
                    'ticker' => $ticker,
                    'headline' => $headline,
                    'type' => 'marketing_news',
                ],
                'received_at' => date('Y-m-d H:i:s'),
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        ];

        $insertId = $this->storeTempScraperRecord($record);

        return [
            'status' => 'success',
            'id' => $insertId,
            'ticker' => $ticker,
            'headline' => $headline,
        ];
    }

    /**
     * Parse alert metadata from subject and body.
     */
    public function parseEmailContent(string $subject, string $body, string $fallbackType): array
    {
        $type = $fallbackType;
        $ticker = null;
        $strategy = null;
        $callStrike = null;
        $putStrike = null;
        $underlierPrice = null;
        $targetProfit = null;

        $text = $subject . ' ' . $body;

        // Detect Ticker ($NVDA or NVDA:)
        if (preg_match('/\$([A-Z]{1,5})\b/', $text, $m)) {
            $ticker = $m[1];
        } elseif (preg_match('/\b([A-Z]{2,5})\s*[:\-\/]/', $subject, $m)) {
            $ticker = $m[1];
        }

        // Detect Strategy
        if (preg_match('/\b(STRANGLE|STRADDLE|CALL|PUT|IRON CONDOR|SPREAD)\b/i', $text, $m)) {
            $strategy = strtoupper($m[1]);
            $type = 'trade_alert';
        }

        // Detect Strikes
        if (preg_match('/call[:\s]+\$?([0-9.]+)/i', $text, $m)) {
            $callStrike = (float) $m[1];
        }
        if (preg_match('/put[:\s]+\$?([0-9.]+)/i', $text, $m)) {
            $putStrike = (float) $m[1];
        }
        if (preg_match('/\$?([0-9.]+)\s*C/i', $text, $m) && ! $callStrike) {
            $callStrike = (float) $m[1];
        }
        if (preg_match('/\$?([0-9.]+)\s*P/i', $text, $m) && ! $putStrike) {
            $putStrike = (float) $m[1];
        }

        // Detect Underlier Price
        if (preg_match('/(?:underlier|price|spot)[:\s]+\$?([0-9.]+)/i', $text, $m)) {
            $underlierPrice = (float) $m[1];
        }

        // Detect Target Profit
        if (preg_match('/(?:target profit|profit target|target)[:\s]+\+?\$?([0-9.]+)/i', $text, $m)) {
            $targetProfit = (float) $m[1];
        }

        return [
            'type' => $type,
            'ticker' => $ticker ?: 'SPY',
            'strategy' => $strategy ?: 'TRADE ALERT',
            'call_strike' => $callStrike,
            'put_strike' => $putStrike,
            'underlier_price' => $underlierPrice,
            'target_profit' => $targetProfit ?: 200.0,
            'headline' => $subject,
            'company_name' => $ticker ?: 'Market',
        ];
    }

    private function isAlreadyStored(string $identifier, string $subject): bool
    {
        if ($this->db->tableExists('bf_marketing_temp_scraper')) {
            $exists = $this->db->table('bf_marketing_temp_scraper')
                ->where('title', $subject)
                ->orLike('metadata', $identifier)
                ->countAllResults();
            if ($exists > 0) {
                return true;
            }
        }
        return false;
    }

    private function storeTempScraperRecord(array $data): int
    {
        if (! $this->db->tableExists('bf_marketing_temp_scraper')) {
            return 0;
        }

        $fields = array_flip($this->db->getFieldNames('bf_marketing_temp_scraper'));
        $clean = array_intersect_key($data, $fields);
        $this->db->table('bf_marketing_temp_scraper')->insert($clean);
        return (int) $this->db->insertID();
    }

    private function decodeMimeHeader(string $input): string
    {
        if (! function_exists('imap_mime_header_decode')) {
            return $input;
        }
        $elements = @imap_mime_header_decode($input) ?: [];
        $result = '';
        foreach ($elements as $el) {
            $result .= $el->text;
        }
        return trim($result) !== '' ? trim($result) : $input;
    }

    private function fetchBody($imap, int $uid): string
    {
        $body = @imap_fetchbody($imap, $uid, '1.2');
        if (! $body) {
            $body = @imap_fetchbody($imap, $uid, '1');
        }
        if (! $body) {
            $body = @imap_body($imap, $uid);
        }
        return (string) $body;
    }
}
