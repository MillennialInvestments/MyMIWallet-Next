<?php

namespace App\Commands\Marketing;

use App\Services\MarketingNewsGenerateService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class NewsGenerate extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:news:generate';
    protected $description = 'Generates clustered story records from pending bf_marketing_temp_scraper rows.';
    protected $usage = 'marketing:news:generate [--limit=25] [--ticker=VSBLTY] [--category=press_release] [--force]';

    public function run(array $params)
    {
        $service = service('marketingNewsGenerateService');
        if (!$service instanceof MarketingNewsGenerateService) {
            $service = new MarketingNewsGenerateService();
        }

        $limit = max(1, (int) (CLI::getOption('limit') ?: 25));
        $result = $service->processPending($limit);
        if (((int) ($result['processed'] ?? 0)) === 0) {
            $result['reason'] = 'No eligible marketing_news records were available for generation.';
        }

        CLI::write(json_encode([
            'status' => 'success',
            'command' => 'marketing:news:generate',
            'limit' => $limit,
            'filters' => [
                'ticker' => CLI::getOption('ticker'),
                'category' => CLI::getOption('category'),
                'force' => CLI::getOption('force') !== null,
            ],
            'result' => $result,
        ], JSON_PRETTY_PRINT));
    }
}
