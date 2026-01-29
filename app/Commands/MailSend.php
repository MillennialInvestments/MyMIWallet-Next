<?php

namespace App\Commands;

use App\Services\MailService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class MailSend extends SafeBaseCommand
{
    protected $group       = 'Mail';
    protected $name        = 'mail:send';
    protected $description = 'Process and send queued mail jobs.';
    protected $usage       = 'mail:send [limit] [--dry-run] [--approve]';
    protected $arguments   = [
        'limit' => 'Optional: max number of queued emails to send (default 25).',
    ];
    protected $options = [
        '--dry-run' => 'Preview actions without sending emails',
        '--approve' => 'Acknowledge and send queued emails',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:mail:send] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $limit  = (int) ($args[0] ?? 25);

        if ($dryRun) {
            CLI::write('Dry-run enabled. Mail queue will not be processed.', 'yellow');
            log_message('info', '[spark:mail:send] Completed', [
                'sent' => 0,
                'failed' => 0,
                'deferred' => 0,
                'dry_run' => true,
            ]);
            return EXIT_SUCCESS;
        }

        $mail       = new MailService();
        $startedAt  = microtime(true);
        $result     = $mail instanceof MailService ? $mail->processQueue($limit) : ['sent' => 0, 'failed' => 0, 'deferred' => 0];
        $durationMs = (int) ((microtime(true) - $startedAt) * 1000);

        CLI::write("Mail queue processed in {$durationMs}ms", 'green');
        CLI::write("  Sent:      {$result['sent']}");
        CLI::write("  Deferred:  {$result['deferred']}");
        CLI::write("  Failed:    {$result['failed']}");

        log_message('info', '[spark:mail:send] Completed', [
            'sent' => $result['sent'] ?? 0,
            'failed' => $result['failed'] ?? 0,
            'deferred' => $result['deferred'] ?? 0,
            'duration_ms' => $durationMs,
            'dry_run' => false,
        ]);

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return true;
    }
}
