<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SocialScheduleDue extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:schedule-due';
    protected $description = 'Mark due internal social campaign schedule rows ready.';

    public function run(array $params)
    {
        $service = new \App\Services\SocialCampaignService();
        $result = $service->queueDueSchedules(25);
        CLI::write(json_encode($result, JSON_PRETTY_PRINT));
        return EXIT_SUCCESS;
    }
}
