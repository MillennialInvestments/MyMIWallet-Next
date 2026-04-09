<?php

namespace App\Commands;

use App\Services\MarketingNewsGenerateService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class MarketingNewsGenerate extends BaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:news:generate';
    protected $description = 'Generates clustered story records from pending bf_marketing_temp_scraper rows.';

    public function run(array $params)
    {
        /** @var MarketingNewsGenerateService $service */
        $service = service('marketingNewsGenerateService');
        $limit = max(1, (int) (CLI::getOption('limit') ?: 25));

        $result = $service->processPending($limit);

        CLI::write(json_encode(['status' => 'success', 'result' => $result], JSON_PRETTY_PRINT));
    }
}
