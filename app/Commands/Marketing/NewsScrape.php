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
    protected $usage = 'marketing:news:scrape [--username=tradealerts@mymiwallet.com] [--folder=INBOX] [--subject="Press Release"] [--limit=50] [--folders=INBOX,Alerts] [--search=ALL] [--debug-subjects] [--force]';

    public function run(array $params)
    {
        $service = service('marketingNewsScrapeService');
        if (! $service instanceof MarketingNewsScrapeService) {
            $service = new MarketingNewsScrapeService();
        }

        $username = CLI::getOption('username');
        $mailbox = CLI::getOption('mailbox');
        if ((! is_string($username) || trim($username) === '') && is_string($mailbox) && str_contains($mailbox, '@')) {
            $username = $mailbox;
        }
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
                'username' => $username,
                'folder' => $folderOpt,
                'folders' => $folders,
                'limit' => $limit,
                'force' => $force,
                'debug' => $debugSubjects,
                'subject' => CLI::getOption('subject') ?: null,
                'search_criteria' => $search,
            ]);
            $results[] = $result;
        }

        $routingSummary = [
            'marketing_news_matched' => 0,
            'investment_alerts_matched' => 0,
            'marketing_news_stored' => 0,
            'investment_alerts_stored' => 0,
            'rejected_count' => 0,
            'route_counts' => [],
            'keyword_counts' => [],
        ];
        foreach ($results as $entry) {
            $summary = (array) ($entry['routing_summary'] ?? []);
            $routingSummary['marketing_news_matched'] += (int) ($summary['marketing_news_matched'] ?? 0);
            $routingSummary['investment_alerts_matched'] += (int) ($summary['investment_alerts_matched'] ?? 0);
            $routingSummary['marketing_news_stored'] += (int) ($summary['marketing_news_stored'] ?? 0);
            $routingSummary['investment_alerts_stored'] += (int) ($summary['investment_alerts_stored'] ?? 0);
            $routingSummary['rejected_count'] += (int) ($summary['rejected_count'] ?? 0);
            foreach ((array) ($summary['route_counts'] ?? []) as $route => $count) {
                $routingSummary['route_counts'][$route] = (int) (($routingSummary['route_counts'][$route] ?? 0) + (int) $count);
            }
            foreach ((array) ($summary['keyword_counts'] ?? []) as $keyword => $count) {
                $routingSummary['keyword_counts'][$keyword] = (int) (($routingSummary['keyword_counts'][$keyword] ?? 0) + (int) $count);
            }
        }

        CLI::write((string) json_encode([
            'status' => 'success',
            'command' => 'marketing:news:scrape',
            'mailbox' => $mailbox,
            'username' => $username,
            'folders' => $folders,
            'search_criteria' => $search,
            'limit' => $limit,
            'force' => $force,
            'debug_subjects' => $debugSubjects,
            'routing_summary' => $routingSummary,
            'results' => $results,
        ], JSON_PRETTY_PRINT));
    }
}
