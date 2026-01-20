<?php

declare(strict_types=1);

namespace App\Commands;

use App\Libraries\MailService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class MailSendTest extends BaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'mail:send-test';
    protected $description = 'Send a test email using branded templates.';
    protected $usage       = 'mail:send-test --to=you@example.com --template=activation';

    public function run(array $params)
    {
        $to = CLI::getOption('to') ?? null;
        $template = strtolower((string) (CLI::getOption('template') ?? 'generic'));

        if (! $to) {
            CLI::error('Usage: php spark mail:send-test --to=you@example.com --template=activation|reset|generic');
            return 1;
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
                'logoUrl' => rtrim((string) (getenv('APP_URL') ?: site_url()), '/') . '/assets/images/MyMI-Wallet-Logo-Black.png',
                'appUrl' => rtrim((string) (getenv('APP_URL') ?: site_url()), '/'),
                'supportEmail' => 'support@mymiwallet.com',
                'preheader' => $subject,
            ]);
            $result = $mailService->sendGeneric($to, $subject, $html, 'This is a generic MyMI Wallet test email.', ['source' => 'cli']);
        }

        if (! ($result['ok'] ?? false)) {
            CLI::error('Test email failed: ' . ($result['error'] ?? 'unknown'));
            return 1;
        }

        CLI::write('Test email sent successfully.', 'green');
        return 0;
    }
}
