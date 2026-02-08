<?php

declare(strict_types=1);

namespace App\Services\Ops;

class EmailOpsService
{
    /** @return array<string,mixed> */
    public function healthcheck(): array
    {
        return [
            'smtp_connectivity' => $this->checkSmtp(),
            'quota_note' => 'Mailbox quotas sourced from DreamHost API email-list_users when available.',
            'bounce_patterns' => $this->scanFor('bounce'),
            'failed_delivery_patterns' => $this->scanFor('failed'),
            'spf_dkim' => [
                'spf_present' => $this->envConfigured('MAIL_SPF_DOMAIN'),
                'dkim_selector_present' => $this->envConfigured('MAIL_DKIM_SELECTOR'),
            ],
        ];
    }

    /** @return array<string,mixed> */
    public function queueScan(): array
    {
        return [
            'ci_mail_failures' => $this->scanFor('smtp'),
            'app_failures' => $this->scanFor('mail'),
            'stuck_note' => 'DreamHost queue internals are not directly accessible without elevated privileges.',
        ];
    }

    /** @return array<string,mixed> */
    public function test(string $to): array
    {
        return [
            'target' => $to,
            'smtp_auth_configured' => $this->envConfigured('SMTPUser') || $this->envConfigured('email.SMTPUser'),
            'tls_mode' => env('email.SMTPCrypto', env('MAIL_ENCRYPTION', 'tls')),
            'headers_expected' => ['From', 'To', 'Subject', 'Date', 'Message-ID'],
            'delivery_confirmation' => 'Use mailbox receipt + logs:summarize correlation for confirmation.',
        ];
    }

    private function checkSmtp(): bool
    {
        $host = (string) env('email.SMTPHost', env('MAIL_HOST', 'localhost'));
        $port = (int) env('email.SMTPPort', env('MAIL_PORT', 587));

        $conn = @fsockopen($host, (string) $port, $errno, $errstr, 2.0);
        if (! is_resource($conn)) {
            return false;
        }
        fclose($conn);
        return true;
    }

    /** @return list<string> */
    private function scanFor(string $term): array
    {
        $file = ROOTPATH . 'writable/logs';
        if (! is_dir($file)) {
            return [];
        }

        $cmd = 'rg -i --no-heading ' . escapeshellarg($term) . ' ' . escapeshellarg($file) . ' -n | head -n 30';
        $out = trim((string) shell_exec($cmd . ' 2>/dev/null'));

        return $out === '' ? [] : explode("\n", $out);
    }

    private function envConfigured(string $key): bool
    {
        return trim((string) env($key, '')) !== '';
    }
}
