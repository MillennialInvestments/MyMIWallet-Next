<?php

namespace App\Services;

use App\Libraries\MyMIMarketing;
use App\Models\MarketingModel;
use App\Services\Marketing\OcrService;
use Config\Database;

class MarketingNewsScrapeService
{
    public function __construct(
        private ?MarketingModel $marketingModel = null,
        private ?MyMIMarketing $marketingLibrary = null,
        private ?OcrService $ocrService = null,
    ) {
        $this->marketingModel ??= new MarketingModel();
        $this->marketingLibrary ??= service('MyMIMarketing');
        $this->ocrService ??= new OcrService();
    }

    public function fetchEmails(array $options = []): array
    {
        $mailbox = trim((string) ($options['mailbox'] ?? 'alerts@mymiwallet.com'));
        $limit = max(1, (int) ($options['limit'] ?? 25));
        $force = !empty($options['force']);

        $emailType = str_contains($mailbox, '@') ? explode('@', $mailbox)[0] : $mailbox;
        $fetched = $this->marketingLibrary->fetchAndStoreEmails($emailType);

        if (!is_array($fetched)) {
            return ['source' => 'mailbox', 'mailbox' => $mailbox, 'stored' => 0, 'skipped' => 0, 'items' => []];
        }

        $stored = 0;
        $skipped = 0;
        $items = [];

        foreach (array_slice($fetched, 0, $limit) as $email) {
            $parsed = $this->parseAlertEmail((array) $email);
            if ($parsed === null) {
                $skipped++;
                continue;
            }

            $id = $this->storeTempRecord($parsed + ['force' => $force]);
            if ($id > 0) {
                $stored++;
                $items[] = ['id' => $id, 'title' => $parsed['title'] ?? ''];
            } else {
                $skipped++;
            }
        }

        return [
            'source' => 'mailbox',
            'mailbox' => $mailbox,
            'stored' => $stored,
            'skipped' => $skipped,
            'items' => $items,
        ];
    }

    public function parseAlertEmail(array $email): ?array
    {
        $subject = trim((string) ($email['subject'] ?? $email['email_subject'] ?? $email['title'] ?? ''));
        $rawBody = (string) ($email['body'] ?? $email['content'] ?? $email['email_body'] ?? '');
        $sender = trim((string) ($email['from'] ?? $email['email_sender'] ?? ''));
        $messageId = trim((string) ($email['message_id'] ?? $email['email_identifier'] ?? md5($subject . $sender)));

        $cleanBody = $this->cleanFooterNoise($rawBody);
        $headlineSource = $subject !== '' ? $subject : (strtok($cleanBody, "\n") ?: '');
        if ($headlineSource === '') {
            return null;
        }

        $headline = $this->parseHeadlineLine($headlineSource);
        $alertType = $this->detectAlertType($headlineSource . ' ' . $cleanBody);

        return [
            'source_type' => 'email_alert',
            'source_provider' => $headline['provider'] ?? 'Unknown',
            'alert_type' => $alertType,
            'sender_email' => $sender,
            'source_message_id' => $messageId,
            'title' => $headline['title'] ?: $headlineSource,
            'content' => trim($cleanBody),
            'ticker' => $headline['ticker'] ?? null,
            'company_name' => $headline['company_name'] ?? null,
            'status' => 'pending',
            'date_scraped' => date('Y-m-d H:i:s'),
            'date_published' => $this->extractPublishDate($email),
        ];
    }

    public function parseHeadlineLine(string $line): array
    {
        $line = trim(preg_replace('/\s+/', ' ', strip_tags($line)) ?? '');
        $provider = 'Unknown';
        $title = $line;

        if (preg_match('/^([A-Za-z0-9\-\.\s]+):\s*(.+)$/', $line, $m)) {
            $provider = trim($m[1]);
            $title = trim($m[2]);
        }

        $ticker = null;
        if (preg_match('/\(([A-Z]{1,6})\)/', $title, $m)) {
            $ticker = $m[1];
        } elseif (preg_match('/\b([A-Z]{2,5})\b/', $title, $m)) {
            $ticker = $m[1];
        }

        $company = preg_split('/\b(reports|announces|completes|launches|wins|secures|files)\b/i', $title)[0] ?? '';
        $company = trim($company, " -:\t\n\r\0\x0B");

        return [
            'provider' => $provider,
            'title' => $title,
            'ticker' => $ticker,
            'company_name' => $company !== '' ? $company : null,
        ];
    }

    public function cleanFooterNoise(string $body): string
    {
        $clean = html_entity_decode(strip_tags($body));
        $clean = preg_replace('/\r\n|\r/', "\n", $clean) ?? $clean;
        $lines = array_values(array_filter(array_map(static fn($line) => trim($line), explode("\n", $clean))));

        $noise = [
            'unsubscribe', 'privacy policy', 'view in browser', 'this message was sent',
            'do not reply', 'all rights reserved', 'forwarded message',
        ];

        $kept = [];
        foreach ($lines as $line) {
            $lineLower = strtolower($line);
            $isNoise = false;
            foreach ($noise as $token) {
                if (str_contains($lineLower, $token)) {
                    $isNoise = true;
                    break;
                }
            }
            if (! $isNoise) {
                $kept[] = $line;
            }
        }

        return trim(implode("\n", $kept));
    }

    public function ingestOcrImage(string $path): ?array
    {
        $text = trim($this->ocrService->extractText($path));
        if ($text === '') {
            return null;
        }

        $headlineLine = strtok($text, "\n") ?: $text;
        $headline = $this->parseHeadlineLine($headlineLine);

        return [
            'source_type' => 'screenshot_alert',
            'source_provider' => $headline['provider'] ?? 'OCR',
            'alert_type' => $this->detectAlertType($text),
            'sender_email' => null,
            'source_message_id' => 'ocr:' . md5($path . $text),
            'title' => $headline['title'] ?: $headlineLine,
            'content' => $text,
            'ticker' => $headline['ticker'] ?? null,
            'company_name' => $headline['company_name'] ?? null,
            'status' => 'pending',
            'date_scraped' => date('Y-m-d H:i:s'),
            'date_published' => null,
        ];
    }

    public function ingestRawTextFile(string $path): ?array
    {
        if (!is_file($path)) {
            return null;
        }

        $text = trim((string) file_get_contents($path));
        if ($text === '') {
            return null;
        }

        $headlineLine = strtok($text, "\n") ?: $text;
        $headline = $this->parseHeadlineLine($headlineLine);

        return [
            'source_type' => 'email_alert',
            'source_provider' => $headline['provider'] ?? 'raw_text',
            'alert_type' => $this->detectAlertType($text),
            'sender_email' => null,
            'source_message_id' => 'file:' . md5($path . $text),
            'title' => $headline['title'] ?: $headlineLine,
            'content' => $text,
            'ticker' => $headline['ticker'] ?? null,
            'company_name' => $headline['company_name'] ?? null,
            'status' => 'pending',
            'date_scraped' => date('Y-m-d H:i:s'),
            'date_published' => null,
        ];
    }

    public function storeTempRecord(array $payload): int
    {
        $db = Database::connect();
        $normalizedTitle = mb_strtolower(trim((string) ($payload['title'] ?? '')));
        $normalizedBody = mb_strtolower(trim((string) ($payload['content'] ?? '')));
        $contentHash = hash('sha256', $normalizedTitle . '|' . $normalizedBody);
        $force = !empty($payload['force']);

        if (! $force && $db->table('bf_marketing_temp_scraper')->where('content_hash', $contentHash)->countAllResults() > 0) {
            return 0;
        }

        $row = [
            'status' => $payload['status'] ?? 'pending',
            'title' => $payload['title'] ?? null,
            'content' => $payload['content'] ?? null,
            'summary' => null,
            'source_type' => $payload['source_type'] ?? 'email_alert',
            'source_provider' => $payload['source_provider'] ?? null,
            'alert_type' => $payload['alert_type'] ?? null,
            'sender_email' => $payload['sender_email'] ?? null,
            'source_message_id' => $payload['source_message_id'] ?? null,
            'ticker' => $payload['ticker'] ?? null,
            'company_name' => $payload['company_name'] ?? null,
            'content_hash' => $contentHash,
            'date_scraped' => $payload['date_scraped'] ?? date('Y-m-d H:i:s'),
            'date_published' => $payload['date_published'] ?? null,
            'processed_at' => null,
            'created_on' => date('Y-m-d H:i:s'),
            'modified_on' => date('Y-m-d H:i:s'),
            'processed' => 0,
        ];

        $db->table('bf_marketing_temp_scraper')->insert($row);

        return (int) $db->insertID();
    }

    private function detectAlertType(string $text): string
    {
        $text = mb_strtolower($text);
        if (str_contains($text, 'press release alert')) {
            return 'press_release';
        }
        if (str_contains($text, 'news alert')) {
            return 'news';
        }
        if (str_contains($text, 'earnings')) {
            return 'earnings';
        }

        return 'general_news';
    }

    private function extractPublishDate(array $email): ?string
    {
        $candidates = [
            $email['date'] ?? null,
            $email['email_date'] ?? null,
            $email['sent_at'] ?? null,
        ];

        foreach ($candidates as $candidate) {
            if (!is_string($candidate) || trim($candidate) === '') {
                continue;
            }
            $ts = strtotime($candidate);
            if ($ts !== false) {
                return date('Y-m-d H:i:s', $ts);
            }
        }

        return null;
    }
}
