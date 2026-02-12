<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use App\Services\EmailScraperService;
use App\Services\EmailQueueService;

class AlertsCheck extends SafeBaseCommand
{
    protected $group       = 'AIOps';
    protected $name        = 'aiops:alerts-check';
    protected $description = 'Fetch emails and queue them for processing';

    public function run(array $params)
    {
        CLI::write("Fetching emails...");

        $scraper = new EmailScraperService();
        $emails = $scraper->fetchUnread('alerts@mymiwallet.com');

        $queue = new EmailQueueService();

        foreach ($emails as $email) {
            $queue->enqueue($email);
        }

        CLI::write(count($emails) . " emails queued.", 'green');

        CLI::write("Dispatching worker...");
        exec('php spark aiops:alerts-worker > /dev/null 2>&1 &');
    }
}
