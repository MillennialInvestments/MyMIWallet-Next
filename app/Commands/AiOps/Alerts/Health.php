<?php

namespace App\Commands\AiOps\Alerts;

use App\Commands\SafeBaseCommand;
use App\Services\SlackWebhookService;
use CodeIgniter\CLI\CLI;
use Config\Database;

class Health extends SafeBaseCommand
{
    protected $group       = 'AIOps - Alerts';
    protected $name        = 'aiops:alerts-health';
    protected $description = 'Run health checks on aiops alert queue and notify if failures are high';

    public function run(array $params)
    {
        $db = Database::connect();

        $count = $db->table('aiops_email_queue')
            ->where('status', 'failed')
            ->countAllResults();

        CLI::write('Failed queue count: ' . $count);

        if ($count > 10) {
            $message = sprintf('[aiops:alerts-health] Failed queue count is high: %d', $count);
            (new SlackWebhookService())->notify($message);
            CLI::error('Health check threshold exceeded. Notification sent.');
            return;
        }

        CLI::write('Health check passed.', 'green');
    }
}
