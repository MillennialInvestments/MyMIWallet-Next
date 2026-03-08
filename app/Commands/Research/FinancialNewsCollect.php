<?php

namespace App\Commands\Research;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Services\Research\FinancialResearchService;

class FinancialNewsCollect extends SafeBaseCommand
{
    protected $group = 'research';
    protected $name = 'research:news:collect';

    public function run(array $params)
    {

        $service = new FinancialResearchService();

        $feeds = [
            'https://feeds.finance.yahoo.com/rss/2.0/headline?s=^GSPC',
            'https://www.marketwatch.com/rss/topstories',
            'https://www.reutersagency.com/feed/?best-topics=business-finance'
        ];

        foreach ($feeds as $feed) {

            $rss = simplexml_load_file($feed);

            foreach ($rss->channel->item as $item) {

                $service->storeNews(
                    'rss',
                    (string) $item->title,
                    (string) $item->link,
                    (string) $item->description
                );
            }
        }

        CLI::write('Financial news collected.', 'green');
    }
}