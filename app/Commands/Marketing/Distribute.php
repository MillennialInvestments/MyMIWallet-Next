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
        if (((int) ($result['count'] ?? 0)) === 0) {
            $result['reason'] = 'No source records were available because inbox scraping failed';
        }

        CLI::write(json_encode(['status' => 'success', 'result' => $result], JSON_PRETTY_PRINT));
    }
}
