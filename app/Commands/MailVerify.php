<?php

declare(strict_types=1);

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class MailVerify extends BaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'mail:verify';
    protected $description = 'Verify SMTP settings by sending a diagnostic email.';
    protected $usage       = 'mail:verify you@example.com';

    public function run(array $params)
    {
        $to = $params[0] ?? null;

        if (! $to) {
            CLI::error('Usage: php spark mail:verify you@example.com');
            return 1;
        }

        $config = config('Email');
        $mailer = service('email');

        $meta = [
            'protocol' => $config->protocol ?? 'smtp',
            'host' => $config->SMTPHost ?? '',
            'port' => $config->SMTPPort ?? '',
            'crypto' => $config->SMTPCrypto ?? '',
            'from' => $config->fromEmail ?? '',
            'user' => $config->SMTPUser ?? '',
            'pass' => $config->SMTPPass ?? '',
        ];

        $start = microtime(true);
        $sent = false;
        $error = null;

        try {
            $mailer->clear(true);
            $mailer->setFrom($config->fromEmail, $config->fromName ?? 'MyMI Wallet Support');
            $mailer->setReplyTo($config->replyToEmail ?? $config->fromEmail, $config->replyToName ?? $config->fromName);
            $mailer->setTo($to);
            $mailer->setSubject('MyMI Wallet SMTP verification');
            $mailer->setMessage('This is a CLI SMTP verification email sent by MyMI Wallet.');
            $sent = $mailer->send(false);

            if (! $sent) {
                $error = strip_tags($mailer->printDebugger(['headers', 'subject'])) ?: 'Unknown email error.';
            }
        } catch (\Throwable $e) {
            $error = $e->getMessage();
            log_message('error', 'mail:verify exception: {error}', ['error' => $error]);
        }

        $durationMs = (int) ((microtime(true) - $start) * 1000);

        CLI::write('Mail verification report', 'green');
        CLI::write('----------------------------------------');
        CLI::write(sprintf('Host/Port: %s:%s', $meta['host'], $meta['port']));
        CLI::write(sprintf('Encryption: %s', $meta['crypto'] ?: 'none'));
        CLI::write(sprintf('Username: %s', $this->maskValue($meta['user'])));
        CLI::write(sprintf('Password: %s', $this->maskValue($meta['pass'])));
        CLI::write(sprintf('From: %s', $meta['from']));
        CLI::write(sprintf('To: %s', $to));
        CLI::write(sprintf('Duration: %dms', $durationMs));

        if ($sent) {
            CLI::write('Result: success', 'green');
            return 0;
        }

        CLI::error('Result: failure');
        CLI::error(sprintf('Error: %s', $error ?? 'Unknown error'));
        log_message('error', 'mail:verify failed', [
            'host' => $meta['host'],
            'port' => $meta['port'],
            'crypto' => $meta['crypto'],
            'error' => $error ?? 'unknown',
            'duration_ms' => $durationMs,
        ]);

        return 1;
    }

    private function maskValue(?string $value): string
    {
        if (! $value) {
            return '[empty]';
        }

        if (strlen($value) <= 4) {
            return str_repeat('*', strlen($value));
        }

        return substr($value, 0, 2) . str_repeat('*', max(0, strlen($value) - 4)) . substr($value, -2);
    }
}
