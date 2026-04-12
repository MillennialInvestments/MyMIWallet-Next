<?php

declare(strict_types=1);

namespace App\Commands\API;

use App\Libraries\ApiResearch\ApiDocsCrawler;
use App\Libraries\ApiResearch\ApiDocsSummarizer;
use App\Libraries\ApiResearch\ApiReportWriter;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class DocsScrapeApi extends SafeBaseCommand
{
    protected $group       = 'Docs';
    protected $name        = 'api:scrape';
    protected $description = 'Scrape API docs and generate a MyMI Wallet integration summary report.';
    protected $usage       = 'api:scrape <url> [--domain example.com] [--max-pages 25] [--max-depth 2]';
    protected $arguments   = [
        'url' => 'The documentation start URL.',
    ];
    protected $options     = [
        '--domain'    => 'Restrict scraping to a specific domain.',
        '--max-pages' => 'Maximum number of pages to crawl.',
        '--max-depth' => 'Maximum crawl depth.',
    ];

    public function run(array $params)
    {
        $url = $params[0] ?? null;

        if (empty($url)) {
            CLI::error('Missing required documentation URL.');
            return;
        }

        $domain   = CLI::getOption('domain') ?: null;
        $maxPages = (int) (CLI::getOption('max-pages') ?: 25);
        $maxDepth = (int) (CLI::getOption('max-depth') ?: 2);

        $crawler    = new ApiDocsCrawler();
        $summarizer = new ApiDocsSummarizer();
        $writer     = new ApiReportWriter();

        $pages = $crawler->crawl($url, $domain, $maxPages, $maxDepth);
        $summary = $summarizer->summarize($pages, $url);

        $slug = $writer->slugify($url);
        $timestamp = $writer->timestamp();

        $scrapedDir = ROOTPATH . 'docs/APIs/scraped';
        $reportDir  = ROOTPATH . 'docs/APIs/reports';

        $rawPath = $writer->write(
            $scrapedDir,
            $slug . '-' . $timestamp . '-raw.md',
            $this->buildRawMarkdown($pages)
        );

        $reportPath = $writer->write(
            $reportDir,
            $slug . '-' . $timestamp . '-integration-report.md',
            $this->buildSummaryMarkdown($summary)
        );

        CLI::write('Documentation scrape complete.');
        CLI::write('Raw crawl file: ' . $rawPath, 'yellow');
        CLI::write('Summary report: ' . $reportPath, 'green');
    }

    protected function buildRawMarkdown(array $pages): string
    {
        $lines = [];
        $lines[] = '# Raw API Documentation Crawl';
        $lines[] = '';

        foreach ($pages as $page) {
            $lines[] = '---';
            $lines[] = '## ' . ($page['title'] ?: $page['url']);
            $lines[] = '';
            $lines[] = '- URL: ' . $page['url'];
            $lines[] = '- Success: ' . ((! empty($page['success'])) ? 'Yes' : 'No');
            $lines[] = '- Status Code: ' . ($page['status_code'] ?? 'N/A');
            $lines[] = '- Depth: ' . ($page['depth'] ?? 0);
            $lines[] = '';
            $lines[] = ($page['text'] ?? '');
            $lines[] = '';
        }

        return implode("\n", $lines);
    }

    protected function buildSummaryMarkdown(array $summary): string
    {
        $lines = [];
        $lines[] = '# API Integration Research Report';
        $lines[] = '';
        $lines[] = '- Start URL: ' . $summary['start_url'];
        $lines[] = '- Pages Scraped: ' . $summary['pages_scraped'];
        $lines[] = '';

        $lines[] = '## Core Findings';
        $lines[] = '';

        foreach ($summary['findings'] as $section => $items) {
            $lines[] = '### ' . ucwords(str_replace('_', ' ', $section));
            $lines[] = '';

            if (empty($items)) {
                $lines[] = '- No clear references found.';
            } else {
                foreach ($items as $item) {
                    $lines[] = '- ' . $item;
                }
            }

            $lines[] = '';
        }

        $lines[] = '## MyMI Wallet Application Notes';
        $lines[] = '';

        foreach ($summary['mymi_wallet_application_notes'] as $note) {
            $lines[] = '- ' . $note;
        }

        $lines[] = '';
        $lines[] = '## Source URLs';
        $lines[] = '';

        foreach ($summary['source_urls'] as $url) {
            $lines[] = '- ' . $url;
        }

        $lines[] = '';

        return implode("\n", $lines);
    }
}