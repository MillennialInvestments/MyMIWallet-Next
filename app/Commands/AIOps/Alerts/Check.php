<?php

namespace App\Commands\AIOps\Alerts;

use App\Commands\SafeBaseCommand;
use App\Services\EmailScraperService;
use App\Services\EmailQueueService;
use CodeIgniter\CLI\CLI;

class Check extends SafeBaseCommand
{
    protected $group       = 'AIOps - Alerts';
    protected $name        = 'aiops:alerts-check';
    protected $description = 'Fetch emails and queue them for processing';

    public function run(array $params)
    {
        CLI::write("Fetching emails...");

        $config = config('MyMI');

        $scraper = new EmailScraperService();
        $emails = $scraper->fetchUnread($config->alertEmail);

        $queue = new EmailQueueService();

        foreach ($emails as $email) {
            $queue->enqueue($email);
        }

        CLI::write(count($emails) . " emails queued.", 'green');

        CLI::write("Dispatching worker...");
        exec('php spark aiops:alerts-worker > /dev/null 2>&1 &');
    }
}
