<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class MailTest extends BaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'mail:test';
    protected $description = 'Send a DreamHost SMTP test email and output transport diagnostics.';

    public function run(array $params)
    {
        $config = config('Email');
        $to     = $params[0]
            ?? getenv('mail.test.to')
            ?? getenv('test.email.to')
            ?? getenv('email.test.to');

        if (! $to) {
            CLI::error('Usage: php spark mail:test you@example.com');
            return;
        }

        $email = service('email');
        $email->setFrom($config->fromEmail ?? 'support@mymiwallet.com', $config->fromName ?? 'MyMI Wallet Support');
        $email->setTo($to);
        $email->setSubject('MyMI Wallet SMTP connectivity test');
        $email->setMessage('This is a diagnostic email sent via DreamHost SMTP (port 587, STARTTLS).');

        $meta = [
            'host'     => $config->SMTPHost,
            'port'     => $config->SMTPPort,
            'protocol' => $config->protocol,
            'crypto'   => $config->SMTPCrypto,
            'from'     => $config->fromEmail,
            'username' => $config->SMTPUser !== '' ? '[set]' : '[empty]',
        ];

        $sent  = false;
        $debug = '';

        try {
            $sent  = $email->send(false);
            $debug = $email->printDebugger(['headers', 'subject', 'body']);
        } catch (\Throwable $e) {
            $debug = 'Exception: ' . $e->getMessage();
        }

        if ($sent) {
            log_message('info', 'SMTP test email sent successfully.', $meta);
            CLI::write('SMTP test email sent successfully.');
        } else {
            log_message('error', 'SMTP test email failed', array_merge($meta, ['debug' => $debug]));
            CLI::error('SMTP test email failed. See debug output below:');
            CLI::write($debug);
        }

        CLI::write('Transport meta: ' . json_encode($meta));
    }
}
