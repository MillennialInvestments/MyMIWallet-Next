<?php

namespace App\Commands\Mail;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Test extends SafeBaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'mail:test';
    protected $description = 'Send a DreamHost SMTP test email and output transport diagnostics.';
    protected $arguments   = [
        'to' => 'Recipient email address.',
    ];
    protected $options     = [
        '--dry-run' => 'Preview actions without sending email',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:mail:test] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $config = config('Email');
        $to     = $args[0]
            ?? env('mail.test.to')
            ?? env('test.email.to')
            ?? env('email.test.to');

        if (! $to) {
            CLI::error('Usage: php spark mail:test you@example.com');
            log_message('error', '[spark:mail:test] Failed', ['reason' => 'Missing recipient email']);
            return EXIT_ERROR;
        }

        if ($dryRun) {
            CLI::write('Dry-run enabled. Email will not be sent.', 'yellow');
            log_message('info', '[spark:mail:test] Completed', ['to' => $to, 'dry_run' => true]);
            return EXIT_SUCCESS;
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
            log_message('info', '[spark:mail:test] Completed', ['to' => $to, 'dry_run' => false]);
        } else {
            log_message('error', 'SMTP test email failed', array_merge($meta, ['debug' => $debug]));
            CLI::error('SMTP test email failed. See debug output below:');
            CLI::write($debug);
            log_message('error', '[spark:mail:test] Failed', ['reason' => $debug]);
            return EXIT_ERROR;
        }

        CLI::write('Transport meta: ' . json_encode($meta));
        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
