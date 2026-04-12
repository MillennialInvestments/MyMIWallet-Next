<?php

namespace App\Commands\Test;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Email extends SafeBaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'email:test';
    protected $description = 'Send a test email using the current SMTP configuration.';
    protected $arguments   = [
        'to' => 'Recipient email address.',
    ];
    protected $options     = [
        '--dry-run' => 'Preview actions without sending email',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:email:test] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $to = $args[0] ?? env('test.email.to');

        if (! $to) {
            CLI::error('Usage: php spark email:test you@example.com');
            log_message('error', '[spark:email:test] Failed', ['reason' => 'Missing recipient email']);
            return EXIT_ERROR;
        }

        if ($dryRun) {
            CLI::write('Dry-run enabled. Email will not be sent.', 'yellow');
            log_message('info', '[spark:email:test] Completed', ['dry_run' => true, 'to' => $to]);
            return EXIT_SUCCESS;
        }

        $result = service('mailService')->send(
            $to,
            'MyMI Wallet SMTP Test',
            'This is a test email from MyMI Wallet.',
            ['queue' => false, 'module' => 'system']
        );

        if (! ($result['ok'] ?? false)) {
            log_message('error', 'SMTP test failed: {debug}', ['debug' => $result['error'] ?? 'unknown']);
            CLI::error('SMTP test failed; see logs for details.');
            log_message('error', '[spark:email:test] Failed', ['reason' => $result['error'] ?? 'unknown']);
            return EXIT_ERROR;
        }

        CLI::write('SMTP test email sent successfully.');
        log_message('info', '[spark:email:test] Completed', ['to' => $to, 'dry_run' => false]);
        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
