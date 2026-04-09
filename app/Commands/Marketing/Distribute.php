<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Distribute extends SafeBaseCommand
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
