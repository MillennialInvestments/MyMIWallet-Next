<?php

namespace App\Services;

use App\Libraries\MyMIMarketing;
use Config\Database;

class CalendarEmailTriggerService
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function pollInboxAndQueue(): void
    {
        $emails = $this->getUnreadEmails();

        foreach ($emails as $email) {
            $messageId = $email['message_id'] ?? md5(($email['subject'] ?? '') . ($email['date'] ?? ''));

            $exists = $this->db->table('calendar_trigger_inbox')
                ->where('message_id', $messageId)
                ->countAllResults();

            if ($exists) {
                continue;
            }

            $body = (string) ($email['body'] ?? '');
            $parsed = $this->parseKeyValueBlock($body);

            log_message('info', 'Calendar Trigger Received: ' . json_encode($parsed));

            $isAuthorizedAutomation = in_array($parsed['automation'] ?? '', ['marketing'], true);
            $hasValidToken = $this->passesTokenValidation($parsed);

            $status = 'parsed';
            $error = null;

            if (! $isAuthorizedAutomation) {
                $status = 'ignored';
                $error = 'Unsupported automation key';
            } elseif (! $hasValidToken) {
                $status = 'ignored';
                $error = 'Token validation failed';
            }

            $this->db->table('calendar_trigger_inbox')->insert([
                'message_id' => $messageId,
                'imap_uid' => $email['imap_uid'] ?? null,
                'from_email' => $email['from'] ?? null,
                'subject' => $email['subject'] ?? null,
                'received_at' => $email['date'] ?? date('Y-m-d H:i:s'),
                'raw_body' => substr($body, 0, 5000),
                'parsed_json' => json_encode($parsed),
                'status' => $status,
                'error' => $error,
                'created_at' => date('Y-m-d H:i:s'),
                'processed_at' => ($status === 'ignored') ? date('Y-m-d H:i:s') : null,
            ]);

            if ($status === 'ignored') {
                continue;
            }

            $queued = $this->queueJob($parsed);
            $this->db->table('calendar_trigger_inbox')
                ->where('message_id', $messageId)
                ->update([
                    'status' => $queued ? 'queued' : 'failed',
                    'processed_at' => date('Y-m-d H:i:s'),
                    'error' => $queued ? null : 'Queue dedupe conflict or missing route',
                ]);
        }
    }

    private function getUnreadEmails(): array
    {
        try {
            $emailReader = service('emailReader');
            if (is_object($emailReader) && method_exists($emailReader, 'getUnread')) {
                return (array) $emailReader->getUnread();
            }
        } catch (\Throwable $e) {
            log_message('debug', 'CalendarEmailTriggerService emailReader unavailable: ' . $e->getMessage());
        }

        // Fallback: leverage existing inbox scraper and read from temp table.
        $marketing = new MyMIMarketing();
        $marketing->fetchAndStoreEmails('marketing');

        $rows = $this->db->table('bf_marketing_temp_scraper')
            ->select('id, email_identifier, email_sender, email_subject, email_body, email_date, created_on')
            ->where('email_subject IS NOT NULL', null, false)
            ->like('LOWER(email_subject)', 'calendar')
            ->orderBy('id', 'DESC')
            ->limit(25)
            ->get()
            ->getResultArray();

        return array_map(static function (array $row): array {
            return [
                'message_id' => $row['email_identifier'] ?? null,
                'imap_uid' => (string) ($row['id'] ?? ''),
                'from' => $row['email_sender'] ?? '',
                'subject' => $row['email_subject'] ?? '',
                'body' => $row['email_body'] ?? '',
                'date' => $row['email_date'] ?? $row['created_on'] ?? date('Y-m-d H:i:s'),
            ];
        }, $rows);
    }

    private function passesTokenValidation(array $parsed): bool
    {
        $expectedToken = (string) env('CALENDAR_TRIGGER_TOKEN', '');
        if ($expectedToken === '') {
            return true;
        }

        return ($parsed['token'] ?? '') === $expectedToken;
    }

    private function parseKeyValueBlock(string $content): array
    {
        $lines = explode("\n", str_replace(["\r\n", "\r"], "\n", $content));
        $data = [];

        foreach ($lines as $line) {
            if (strpos($line, '=') !== false) {
                [$key, $value] = explode('=', $line, 2);
                $data[trim($key)] = trim($value);
            }
        }

        return $data;
    }

    private function queueJob(array $parsed): bool
    {
        $routeKey = $parsed['run_cron'] ?? null;

        if (empty($routeKey)) {
            return false;
        }

        $route = $this->db->table('automation_routes')
            ->where('route_key', $routeKey)
            ->where('enabled', 1)
            ->get()
            ->getRowArray();

        if (! $route) {
            log_message('error', 'Unknown automation route: ' . $routeKey);
            return false;
        }

        $dedupeKey = $parsed['dedupe_key'] ?? md5(json_encode($parsed));

        $exists = $this->db->table('automation_jobs')
            ->where('dedupe_key', $dedupeKey)
            ->countAllResults();

        if ($exists) {
            return true;
        }

        $payload = array_merge(
            json_decode((string) ($route['default_payload'] ?? '{}'), true) ?: [],
            $parsed,
            [
                'route_key' => $route['route_key'],
                'handler_type' => $route['handler_type'],
                'handler_target' => $route['handler_target'],
            ]
        );

        $this->db->table('automation_jobs')->insert([
            'job_type' => $parsed['workflow'] ?? 'general',
            'payload' => json_encode($payload),
            'dedupe_key' => $dedupeKey,
            'run_after' => date('Y-m-d H:i:s'),
            'status' => 'queued',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        log_message('info', 'Job Queued: ' . $dedupeKey);

        return true;
    }
}
