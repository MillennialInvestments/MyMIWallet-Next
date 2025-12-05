<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class TestEmail extends BaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'email:test';
    protected $description = 'Send a test email using the current SMTP configuration.';

    public function run(array $params)
    {
        $to = $params[0] ?? getenv('test.email.to');

        if (! $to) {
            CLI::error('Usage: php spark email:test you@example.com');
            return;
        }

        $email = service('email');

        $email->setTo($to);
        $email->setSubject('MyMI Wallet SMTP Test');
        $email->setMessage('This is a test email from MyMI Wallet.');

        if (! $email->send()) {
            $debug = $email->printDebugger(['headers', 'subject', 'body']);
            log_message('error', 'SMTP test failed: {debug}', ['debug' => $debug]);
            CLI::error('SMTP test failed; see logs for details.');
            return;
        }

        CLI::write('SMTP test email sent successfully.');
    }
}