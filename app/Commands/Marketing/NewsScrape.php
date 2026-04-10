<?php

namespace App\Commands\Marketing;

use App\Services\MarketingNewsScrapeService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class NewsScrape extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:news:scrape';
    protected $description = 'Ingests alert/news emails (or OCR/raw text) into bf_marketing_temp_scraper with folder-level diagnostics.';
    protected $usage = 'marketing:news-scrape [--limit=50] [--folder=INBOX] [--folders=INBOX,Alerts] [--search=ALL] [--debug-subjects] [--force]';

    public function run(array $params)
    {
        $service = service('marketingNewsScrapeService');
        if (! $service instanceof MarketingNewsScrapeService) {
            $service = new MarketingNewsScrapeService();
        }

        $mailbox = CLI::getOption('mailbox');
        $limit = max(1, (int) (CLI::getOption('limit') ?: 25));
        $ocrPath = CLI::getOption('ocr');
        $filePath = CLI::getOption('file');
        $force = CLI::getOption('force') !== null;
        $debugSubjects = CLI::getOption('debug-subjects') !== null;
        $search = CLI::getOption('search') ?: null;
        $foldersOpt = CLI::getOption('folders');
        $folderOpt = CLI::getOption('folder');

        $folders = null;
        if (is_string($foldersOpt) && trim($foldersOpt) !== '') {
            $folders = array_values(array_filter(array_map('trim', explode(',', $foldersOpt))));
        } elseif (is_string($folderOpt) && trim($folderOpt) !== '') {
            $folders = [trim($folderOpt)];
        }

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
            $result = $service->fetchEmails([
                'mailbox' => $mailbox,
                'folders' => $folders,
                'limit' => $limit,
                'force' => $force,
                'debug' => $debugSubjects,
                'search_criteria' => $search,
            ]);
            $results[] = $result;
        }

        CLI::write((string) json_encode([
            'status' => 'success',
            'command' => 'marketing:news-scrape',
            'mailbox' => $mailbox,
            'folders' => $folders,
            'search_criteria' => $search,
            'limit' => $limit,
            'force' => $force,
            'debug_subjects' => $debugSubjects,
            'results' => $results,
        ], JSON_PRETTY_PRINT));
    }
}
