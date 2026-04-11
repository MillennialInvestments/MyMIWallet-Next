<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use App\Services\MarketingNewsGenerateService;
use App\Services\MarketingNewsScrapeService;
use CodeIgniter\CLI\CLI;

class Pipeline extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:pipeline';
    protected $description = 'Runs marketing generation pipeline sections.';

    public function run(array $params)
    {
        $mode = strtolower((string) ($params[0] ?? 'all'));
        $pipeline = service('marketingPipelineService');
        $mailbox = CLI::getOption('mailbox');
        $username = CLI::getOption('username');
        if ((! is_string($username) || trim($username) === '') && is_string($mailbox) && str_contains($mailbox, '@')) {
            $username = $mailbox;
        }

        $result = [];
        if ($mode === 'news' || $mode === 'all') {
            $scrapeService = service('marketingNewsScrapeService');
            if (! $scrapeService instanceof MarketingNewsScrapeService) {
                $scrapeService = new MarketingNewsScrapeService();
            }
            $generateService = service('marketingNewsGenerateService');
            if (! $generateService instanceof MarketingNewsGenerateService) {
                $generateService = new MarketingNewsGenerateService();
            }

            $scrape = $scrapeService->fetchEmails([
                'mailbox' => $mailbox,
                'username' => $username,
                'folder' => CLI::getOption('folder'),
                'subject' => CLI::getOption('subject') ?: null,
                'limit' => max(1, (int) (CLI::getOption('limit') ?: 25)),
            ]);
            $generate = $generateService->processPending(max(1, (int) (CLI::getOption('generate-limit') ?: 25)));
            $distribute = $pipeline->processPendingGeneratedContent(max(1, (int) (CLI::getOption('distribute-limit') ?: 10)));
            if (((int) ($generate['processed'] ?? 0)) === 0 && ((int) ($distribute['count'] ?? 0)) === 0) {
                $result['reason'] = 'No source records were available because inbox scraping failed';
            }
            $result['news'] = [
                'scrape' => $scrape,
                'generate' => $generate,
                'distribute' => $distribute,
            ];
        }
        if ($mode === 'notifications' || $mode === 'all') {
            $result['notifications'] = $pipeline->processPendingNotifications(10);
        }
        if ($mode === 'temp' || $mode === 'all') {
            $result['temp_scraper'] = $pipeline->processPendingTempRecords(10);
        }
        if ($mode === 'campaigns' || $mode === 'all') {
            $result['campaigns'] = $pipeline->processPendingCampaigns(5);
        }

        CLI::write(json_encode(['status' => 'success', 'mode' => $mode, 'mailbox' => $mailbox, 'result' => $result], JSON_PRETTY_PRINT));
    }
}
