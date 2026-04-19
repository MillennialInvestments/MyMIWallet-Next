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
            'https://www.reutersagency.com/feed/?best-topics=business-finance',
        ];

        $feedsChecked = 0;
        $feedsLoaded  = 0;
        $found        = 0;
        $inserted     = 0;
        $failed       = 0;

        foreach ($feeds as $feed) {
            $feedsChecked++;

            $rss = @simplexml_load_file($feed);

            if ($rss === false || ! isset($rss->channel->item)) {
                CLI::write("Feed failed or empty: {$feed}", 'red');
                continue;
            }

            $feedsLoaded++;

            foreach ($rss->channel->item as $item) {
                $found++;

                try {
                    $ok = $service->storeNews(
                        'rss',
                        (string) $item->title,
                        (string) $item->link,
                        (string) $item->description
                    );

                    if ($ok) {
                        $inserted++;
                    } else {
                        $failed++;
                    }
                } catch (\Throwable $e) {
                    $failed++;
                    log_message('error', 'FinancialNewsCollect insert failed: {message}', [
                        'message' => $e->getMessage(),
                    ]);
                }
            }
        }

        CLI::write("Financial feeds checked: {$feedsChecked}", 'yellow');
        CLI::write("Financial feeds loaded: {$feedsLoaded}", 'yellow');
        CLI::write("Financial news found: {$found}", 'yellow');
        CLI::write("Financial news inserted: {$inserted}", 'green');
        CLI::write("Financial news failed: {$failed}", 'red');
    }
}