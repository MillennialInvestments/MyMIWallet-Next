<?php

declare(strict_types=1);

namespace App\Commands;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class MailVerify extends SafeBaseCommand
{
    protected string $group       = 'maintenance';
    protected string $name        = 'mail:verify';
    protected $description = 'Verify SMTP settings by sending a diagnostic email.';
    protected $usage       = 'mail:verify you@example.com';
    protected $arguments   = [
        'to' => 'Recipient email address.',
    ];
    protected $options     = [
        '--dry-run' => 'Preview actions without sending email',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:mail:verify] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $to = $args[0] ?? null;

        if (! $to) {
            CLI::error('Usage: php spark mail:verify you@example.com');
            log_message('error', '[spark:mail:verify] Failed', ['reason' => 'Missing recipient email']);
            return EXIT_ERROR;
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
            if ($dryRun) {
                CLI::write('Dry-run enabled. Email will not be sent.', 'yellow');
            } else {
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

        if ($dryRun) {
            CLI::write('Result: dry-run (no email sent)', 'yellow');
            log_message('info', '[spark:mail:verify] Completed', ['to' => $to, 'dry_run' => true]);
            return EXIT_SUCCESS;
        }

        if ($sent) {
            CLI::write('Result: success', 'green');
            log_message('info', '[spark:mail:verify] Completed', ['to' => $to, 'dry_run' => false]);
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

        log_message('error', '[spark:mail:verify] Failed', ['reason' => $error ?? 'unknown']);

        return EXIT_ERROR;
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

    protected function isDestructive(): bool
    {
        return false;
    }
}
