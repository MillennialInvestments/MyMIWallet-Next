<?php

namespace App\Commands;

use App\Services\MarketingNewsScrapeService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class MarketingNewsScrape extends BaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:news-scrape';
    protected $description = 'Ingests alert/news emails (or OCR/raw text) into bf_marketing_temp_scraper.';

    public function run(array $params)
    {
        /** @var MarketingNewsScrapeService $service */
        $service = service('marketingNewsScrapeService');

        $mailbox = CLI::getOption('mailbox') ?: 'alerts@mymiwallet.com';
        $limit = max(1, (int) (CLI::getOption('limit') ?: 25));
        $ocrPath = CLI::getOption('ocr');
        $filePath = CLI::getOption('file');
        $force = CLI::getOption('force') !== null;

        $results = [];

        if (is_string($ocrPath) && trim($ocrPath) !== '') {
            $payload = $service->ingestOcrImage($ocrPath);
            $results[] = $payload ? ['source' => 'ocr', 'stored_id' => $service->storeTempRecord($payload + ['force' => $force])] : ['source' => 'ocr', 'stored_id' => 0];
        }

        if (is_string($filePath) && trim($filePath) !== '') {
            $payload = $service->ingestRawTextFile($filePath);
            $results[] = $payload ? ['source' => 'file', 'stored_id' => $service->storeTempRecord($payload + ['force' => $force])] : ['source' => 'file', 'stored_id' => 0];
        }

        if ($ocrPath === null && $filePath === null) {
            $results[] = $service->fetchEmails(['mailbox' => $mailbox, 'limit' => $limit, 'force' => $force]);
        }

        CLI::write(json_encode(['status' => 'success', 'results' => $results], JSON_PRETTY_PRINT));
    }
}
