<?php

namespace App\Commands;

use App\Services\MailService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class MailSend extends BaseCommand
{
    protected $group       = 'Mail';
    protected $name        = 'mail:send';
    protected $description = 'Process and send queued mail jobs.';
    protected $usage       = 'mail:send [limit]';

    public function run(array $params)
    {
        $limit      = (int) ($params[0] ?? 25);
        $mail       = service('mailService');
        $startedAt  = microtime(true);
        $result     = $mail instanceof MailService ? $mail->processQueue($limit) : ['sent' => 0, 'failed' => 0, 'deferred' => 0];
        $durationMs = (int) ((microtime(true) - $startedAt) * 1000);

        CLI::write("Mail queue processed in {$durationMs}ms", 'green');
        CLI::write("  Sent:      {$result['sent']}");
        CLI::write("  Deferred:  {$result['deferred']}");
        CLI::write("  Failed:    {$result['failed']}");
    }
}