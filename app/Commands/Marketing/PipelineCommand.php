<?php

namespace App\Commands\Marketing;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class PipelineCommand extends BaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:pipeline';
    protected $description = 'Runs marketing generation pipeline sections.';

    public function run(array $params)
    {
        $mode = strtolower((string) ($params[0] ?? 'all'));
        $pipeline = service('marketingPipelineService');

        $result = [];
        if ($mode === 'notifications' || $mode === 'all') {
            $result['notifications'] = $pipeline->processPendingNotifications(10);
        }
        if ($mode === 'temp' || $mode === 'all') {
            $result['temp_scraper'] = $pipeline->processPendingTempRecords(10);
        }
        if ($mode === 'campaigns' || $mode === 'all') {
            $result['campaigns'] = $pipeline->processPendingCampaigns(5);
        }

        CLI::write(json_encode(['status' => 'success', 'mode' => $mode, 'result' => $result], JSON_PRETTY_PRINT));
    }
}
