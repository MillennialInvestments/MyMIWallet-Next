<?php

namespace App\Commands\Marketing;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class DistributeCommand extends BaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:distribute';
    protected $description = 'Distribute approved generated marketing content.';

    public function run(array $params)
    {
        $pipeline = service('marketingPipelineService');
        $result = $pipeline->processPendingGeneratedContent((int) ($params[0] ?? 10));

        CLI::write(json_encode(['status' => 'success', 'result' => $result], JSON_PRETTY_PRINT));
    }
}
