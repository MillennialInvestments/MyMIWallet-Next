<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SocialCreateSampleCampaign extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:create-sample-campaign';
    protected $description = 'Create a draft-only sample social campaign.';

    public function run(array $params)
    {
        $service = new \App\Services\SocialCampaignService();
        $result = $service->createSampleCampaign();
        CLI::write(json_encode($result, JSON_PRETTY_PRINT));
        return ($result['status'] ?? '') === 'success' ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
