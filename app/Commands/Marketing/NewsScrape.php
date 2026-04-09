<?php

namespace App\Commands\Marketing;

use App\Services\MarketingNewsScrapeService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class NewsScrape extends BaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:news-scrape';
    protected $description = 'Ingests alert/news emails (or OCR/raw text) into bf_marketing_temp_scraper.';
    protected $usage = 'marketing:news-scrape [--mailbox=alerts@mymiwallet.com] [--limit=50] [--ocr=/path/image.png] [--file=/path/text.txt] [--force]';

    public function run(array $params)
    {
        $service = service('marketingNewsScrapeService');
        if (!$service instanceof MarketingNewsScrapeService) {
            $service = new MarketingNewsScrapeService();
        }

        $mailbox = CLI::getOption('mailbox') ?: 'alerts@mymiwallet.com';
        $limit = max(1, (int) (CLI::getOption('limit') ?: 25));
        $ocrPath = CLI::getOption('ocr');
        $filePath = CLI::getOption('file');
        $force = CLI::getOption('force') !== null;

        $results = [];

        if (is_string($ocrPath) && trim($ocrPath) !== '') {
            $payload = $service->ingestOcrImage($ocrPath);
            if ($payload !== null) {
                $id = $service->storeTempRecord($payload + ['force' => $force]);
                $results[] = ['source' => 'ocr', 'stored_id' => $id, 'title' => $payload['title'] ?? null];
            } else {
                $results[] = ['source' => 'ocr', 'stored_id' => 0, 'warning' => 'No OCR text extracted'];
            }
        }

        if (is_string($filePath) && trim($filePath) !== '') {
            $payload = $service->ingestRawTextFile($filePath);
            if ($payload !== null) {
                $id = $service->storeTempRecord($payload + ['force' => $force]);
                $results[] = ['source' => 'file', 'stored_id' => $id, 'title' => $payload['title'] ?? null];
            } else {
                $results[] = ['source' => 'file', 'stored_id' => 0, 'warning' => 'File missing or empty'];
            }
        }

        if ($ocrPath === null && $filePath === null) {
            $results[] = $service->fetchEmails([
                'mailbox' => $mailbox,
                'limit' => $limit,
                'force' => $force,
            ]);
        }

        CLI::write(json_encode([
            'status' => 'success',
            'command' => 'marketing:news-scrape',
            'mailbox' => $mailbox,
            'limit' => $limit,
            'force' => $force,
            'results' => $results,
        ], JSON_PRETTY_PRINT));
    }
}
