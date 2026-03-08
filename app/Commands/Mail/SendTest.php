<?php

declare(strict_types=1);

namespace App\Commands\Mail;

use App\Libraries\MailService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SendTest extends SafeBaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'mail:send-test';
    protected $description = 'Send a test email using branded templates.';
    protected $usage       = 'mail:send-test [to] [template] [--dry-run]';
    protected $arguments   = [
        'to' => 'Recipient email address.',
        'template' => 'Template name: activation, reset, or generic (default generic).',
    ];
    protected $options     = [
        '--dry-run' => 'Preview actions without sending email',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:mail:send-test] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $to = $args[0] ?? null;
        $template = strtolower((string) ($args[1] ?? 'generic'));

        if (! $to) {
            CLI::error('Usage: php spark mail:send-test you@example.com [activation|reset|generic]');
            log_message('error', '[spark:mail:send-test] Failed', ['reason' => 'Missing recipient email']);
            return EXIT_ERROR;
        }

        if ($dryRun) {
            CLI::write('Dry-run enabled. Email will not be sent.', 'yellow');
            log_message('info', '[spark:mail:send-test] Completed', ['to' => $to, 'template' => $template, 'dry_run' => true]);
            return EXIT_SUCCESS;
        }

        $mailService = new MailService();
        $result = null;

        if ($template === 'activation') {
            $user = (object) ['id' => null, 'email' => $to, 'name' => 'Test User'];
            $token = bin2hex(random_bytes(16));
            $result = $mailService->sendActivationEmail($user, $token, ['source' => 'cli']);
        } elseif ($template === 'reset') {
            $user = (object) ['id' => null, 'email' => $to, 'name' => 'Test User'];
            $token = bin2hex(random_bytes(16));
            $result = $mailService->sendPasswordResetEmail($user, $token, ['source' => 'cli']);
        } else {
            $subject = 'MyMI Wallet test email';
            $html = view('emails/layout', [
                'title' => $subject,
                'content' => '<p>This is a generic MyMI Wallet test email.</p>',
                'logoUrl' => rtrim((string) (env('APP_URL') ?: site_url()), '/') . '/assets/images/MyMI-Wallet-Logo-Black.png',
                'appUrl' => rtrim((string) (env('APP_URL') ?: site_url()), '/'),
                'supportEmail' => 'support@mymiwallet.com',
                'preheader' => $subject,
            ]);
            $result = $mailService->sendGeneric($to, $subject, $html, 'This is a generic MyMI Wallet test email.', ['source' => 'cli']);
        }

        if (! ($result['ok'] ?? false)) {
            CLI::error('Test email failed: ' . ($result['error'] ?? 'unknown'));
            log_message('error', '[spark:mail:send-test] Failed', ['reason' => $result['error'] ?? 'unknown']);
            return EXIT_ERROR;
        }

        CLI::write('Test email sent successfully.', 'green');
        log_message('info', '[spark:mail:send-test] Completed', ['to' => $to, 'template' => $template, 'dry_run' => false]);
        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
