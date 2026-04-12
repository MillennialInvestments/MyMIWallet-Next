<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

use Config\ApiResearch as ApiResearchConfig;

class ApiResearchManager
{
    protected $config;

    public function __construct()
    {
        $config = config('ApiResearch');

        if (! $config instanceof ApiResearchConfig) {
            $config = new ApiResearchConfig();
        }

        $this->config = $config;
    }

    public function run(string $docsUrl, array $options = []): array
    {
        $domain      = $options['domain'] ?? (string) parse_url($docsUrl, PHP_URL_HOST);
        $maxPages    = (int) ($options['max_pages'] ?? $this->config->maxPages);
        $maxDepth    = (int) ($options['max_depth'] ?? $this->config->maxDepth);
        $providerSlug = $this->slugFromUrl($docsUrl);
        $providerName = ucwords(str_replace('-', ' ', $providerSlug));

        $crawler        = new ApiDocsCrawler();
        $specDetector   = new ApiSpecDetector();
        $openApiParser  = new OpenApiParser();
        $postmanParser  = new PostmanParser();
        $endpointX      = new ApiEndpointExtractor();
        $authDetector   = new ApiAuthDetector();
        $exampleX       = new ApiExampleExtractor();
        $taskGenerator  = new ApiTaskGenerator();
        $diffEngine     = new ApiDiffEngine();
        $writer         = new ApiReportWriter();
        $repo           = new ApiSnapshotRepository();
        $aiSummarizer   = new ApiAiSummarizer();

        $runId = $repo->startRun($providerSlug, $providerName, $docsUrl, $domain);

        try {
            $pages = $crawler->crawl($docsUrl, $domain, $maxPages, $maxDepth);

            if ($this->config->storeInDatabase) {
                $repo->savePages($runId, $pages);
            }

            $specCandidates = $specDetector->discover($docsUrl, $pages);

            $parsedSpecs = [];

            foreach ($specCandidates as $candidate) {
                $type = (string) ($candidate['type'] ?? '');

                if ($type === 'postman') {
                    $parsedSpecs[] = $postmanParser->parse($candidate);
                } else {
                    $parsedSpecs[] = $openApiParser->parse($candidate);
                }
            }

            if ($this->config->storeInDatabase) {
                $repo->saveSpecs($runId, $parsedSpecs);
            }

            $specEndpoints = $endpointX->extractFromSpecs($parsedSpecs);
            $pageEndpoints = $endpointX->extractFromPages($pages);
            $allEndpoints  = $this->mergeEndpoints($specEndpoints, $pageEndpoints);

            if ($this->config->storeInDatabase) {
                $repo->saveEndpoints($runId, $allEndpoints);
            }

            $auth     = $authDetector->detect($pages, $parsedSpecs, $allEndpoints);
            $examples = $exampleX->extract($pages);

            $servers = $this->extractServers($parsedSpecs);
            $rateLimits = $this->extractRateLimits($pages);
            $pagination = $this->extractPagination($pages);
            $webhooks = $this->extractWebhooks($pages, $parsedSpecs);
            $sdkSupport = $this->extractSdkSupport($pages);
            $sourceUrls = $this->collectSourceUrls($pages, $parsedSpecs);

            $snapshot = [
                'run_id'         => $runId,
                'provider_slug'  => $providerSlug,
                'provider_name'  => $providerName,
                'run_timestamp'  => date('c'),
                'start_url'      => $docsUrl,
                'docs_domain'    => $domain,
                'source_urls'    => $sourceUrls,
                'pages_scraped'  => count($pages),
                'specs_found'    => count($parsedSpecs),
                'endpoints_found'=> count($allEndpoints),
                'auth'           => $auth,
                'servers'        => $servers,
                'rate_limits'    => $rateLimits,
                'pagination'     => $pagination,
                'webhooks'       => $webhooks,
                'sdk_support'    => $sdkSupport,
                'examples'       => $examples,
                'endpoints'      => $allEndpoints,
            ];

            $snapshot['generated_tasks'] = $taskGenerator->generate($providerSlug, $snapshot);
            $snapshot['integration_score'] = $this->calculateIntegrationScore($snapshot);

            $timestamp = $writer->timestamp();

            $rawMarkdownPath = $writer->write(
                ROOTPATH . 'docs/APIs/raw',
                $providerSlug . '-' . $timestamp . '-raw.md',
                $this->buildRawMarkdown($pages, $parsedSpecs)
            );

            $jsonSnapshotPath = $writer->writeJson(
                ROOTPATH . 'docs/APIs/snapshots',
                $providerSlug . '-' . $timestamp . '-snapshot.json',
                $snapshot
            );

            $markdownReportPath = $writer->write(
                ROOTPATH . 'docs/APIs/reports',
                $providerSlug . '-' . $timestamp . '-report.md',
                $this->buildReportMarkdown($snapshot)
            );

            $aiSummaryPath = '';
            if ($this->config->enableAiSummary) {
                $aiSummary = $aiSummarizer->summarize($snapshot);

                if ($aiSummary !== '') {
                    $aiSummaryPath = $writer->write(
                        ROOTPATH . 'docs/APIs/reports',
                        $providerSlug . '-' . $timestamp . '-ai-summary.md',
                        $aiSummary
                    );
                }
            }

            $diffMarkdownPath = '';
            $previousRun = $repo->getPreviousRun($providerSlug, $runId);

            if ($this->config->compareAgainstPrevious && is_array($previousRun) && ! empty($previousRun['json_snapshot_path'])) {
                $oldSnapshot = $writer->readJsonFile((string) $previousRun['json_snapshot_path']);
                $diff = $diffEngine->compare($oldSnapshot, $snapshot);
                $diffMarkdownPath = $writer->writeDiffReport($providerSlug, $diff);
                $repo->saveDiff($providerSlug, (int) $previousRun['id'], $runId, $diff);
                $snapshot['diff'] = $diff;
            }

            $repo->completeRun($runId, [
                'status'               => 'completed',
                'pages_scraped'        => count($pages),
                'specs_found'          => count($parsedSpecs),
                'endpoints_found'      => count($allEndpoints),
                'auth_confidence'      => (float) ($auth['confidence'] ?? 0),
                'integration_score'    => (float) ($snapshot['integration_score'] ?? 0),
                'raw_snapshot_path'    => $rawMarkdownPath,
                'markdown_report_path' => $markdownReportPath,
                'json_snapshot_path'   => $jsonSnapshotPath,
                'ai_summary_path'      => $aiSummaryPath,
                'error_message'        => '',
            ]);

            return [
                'run_id'               => $runId,
                'provider_slug'        => $providerSlug,
                'raw_markdown_path'    => $rawMarkdownPath,
                'markdown_report_path' => $markdownReportPath,
                'json_snapshot_path'   => $jsonSnapshotPath,
                'ai_summary_path'      => $aiSummaryPath,
                'diff_markdown_path'   => $diffMarkdownPath,
                'snapshot'             => $snapshot,
            ];
        } catch (\Throwable $e) {
            $repo->completeRun($runId, [
                'status'               => 'failed',
                'pages_scraped'        => 0,
                'specs_found'          => 0,
                'endpoints_found'      => 0,
                'auth_confidence'      => 0,
                'integration_score'    => 0,
                'raw_snapshot_path'    => '',
                'markdown_report_path' => '',
                'json_snapshot_path'   => '',
                'ai_summary_path'      => '',
                'error_message'        => $e->getMessage(),
            ]);

            throw $e;
        }
    }

    protected function slugFromUrl(string $url): string
    {
        $host = (string) parse_url($url, PHP_URL_HOST);

        if ($host === '') {
            return 'unknown-api';
        }

        $host = preg_replace('/^www\./', '', $host);
        $parts = explode('.', $host);

        return preg_replace('/[^a-z0-9\-]+/', '-', strtolower((string) ($parts[0] ?? 'api')));
    }

    protected function mergeEndpoints(array $a, array $b): array
    {
        $map = [];

        foreach (array_merge($a, $b) as $endpoint) {
            $key = strtoupper((string) ($endpoint['method'] ?? '')) . ' ' . (string) ($endpoint['path'] ?? '');

            if ($key !== ' ' && ! isset($map[$key])) {
                $map[$key] = $endpoint;
            }
        }

        return array_values($map);
    }

    protected function extractServers(array $parsedSpecs): array
    {
        $servers = [];

        foreach ($parsedSpecs as $spec) {
            foreach (($spec['servers'] ?? []) as $server) {
                if (is_array($server) && ! empty($server['url'])) {
                    $servers[] = $server['url'];
                }
            }
        }

        return array_values(array_unique($servers));
    }

    protected function extractRateLimits(array $pages): array
    {
        $items = [];

        foreach ($pages as $page) {
            $text = strtolower((string) ($page['text'] ?? ''));

            if (
                str_contains($text, 'rate limit')
                || str_contains($text, 'requests per minute')
                || str_contains($text, 'requests per second')
                || str_contains($text, 'quota')
                || str_contains($text, '429')
            ) {
                $items[] = mb_substr((string) ($page['text'] ?? ''), 0, 1500);
            }
        }

        return array_slice(array_values(array_unique($items)), 0, 10);
    }

    protected function extractPagination(array $pages): array
    {
        $items = [];

        foreach ($pages as $page) {
            $text = strtolower((string) ($page['text'] ?? ''));

            if (
                str_contains($text, 'pagination')
                || str_contains($text, 'cursor')
                || str_contains($text, 'offset')
                || str_contains($text, 'limit')
                || str_contains($text, 'next page')
            ) {
                $items[] = mb_substr((string) ($page['text'] ?? ''), 0, 1500);
            }
        }

        return array_slice(array_values(array_unique($items)), 0, 10);
    }

    protected function extractWebhooks(array $pages, array $parsedSpecs): array
    {
        $items = [];

        foreach ($pages as $page) {
            $text = strtolower((string) ($page['text'] ?? ''));

            if (str_contains($text, 'webhook') || str_contains($text, 'callback')) {
                $items[] = mb_substr((string) ($page['text'] ?? ''), 0, 1500);
            }
        }

        foreach ($parsedSpecs as $spec) {
            $raw = strtolower((string) ($spec['raw_content'] ?? ''));
            if (str_contains($raw, 'webhook')) {
                $items[] = 'Webhook reference found in parsed spec: ' . (string) ($spec['source_url'] ?? '');
            }
        }

        return array_slice(array_values(array_unique($items)), 0, 10);
    }

    protected function extractSdkSupport(array $pages): array
    {
        $support = [];

        foreach ($pages as $page) {
            $text = strtolower((string) ($page['text'] ?? ''));

            foreach (['php', 'javascript', 'python', 'java', 'c#', 'go', 'ruby'] as $lang) {
                if (str_contains($text, $lang)) {
                    $support[] = $lang;
                }
            }
        }

        return array_values(array_unique($support));
    }

    protected function collectSourceUrls(array $pages, array $parsedSpecs): array
    {
        $urls = [];

        foreach ($pages as $page) {
            if (! empty($page['url'])) {
                $urls[] = (string) $page['url'];
            }
        }

        foreach ($parsedSpecs as $spec) {
            if (! empty($spec['source_url'])) {
                $urls[] = (string) $spec['source_url'];
            }
        }

        return array_values(array_unique($urls));
    }

    protected function calculateIntegrationScore(array $snapshot): float
    {
        $score = 0;

        if (! empty($snapshot['specs_found'])) {
            $score += 25;
        }

        if (! empty($snapshot['auth']['primary_auth_type']) && $snapshot['auth']['primary_auth_type'] !== 'unknown') {
            $score += 20;
        }

        if (! empty($snapshot['endpoints_found'])) {
            $score += 20;
        }

        if (! empty($snapshot['examples']['curl']) || ! empty($snapshot['examples']['json'])) {
            $score += 10;
        }

        if (! empty($snapshot['rate_limits'])) {
            $score += 10;
        }

        if (! empty($snapshot['servers'])) {
            $score += 10;
        }

        if (! empty($snapshot['sdk_support'])) {
            $score += 5;
        }

        return min(100, $score);
    }

    protected function buildRawMarkdown(array $pages, array $parsedSpecs): string
    {
        $lines = [];
        $lines[] = '# Raw API Research Crawl';
        $lines[] = '';

        $lines[] = '## Pages';
        $lines[] = '';

        foreach ($pages as $page) {
            $lines[] = '### ' . ((string) ($page['title'] ?? '') !== '' ? $page['title'] : (string) $page['url']);
            $lines[] = '';
            $lines[] = '- URL: ' . (string) ($page['url'] ?? '');
            $lines[] = '- Status: ' . (string) ($page['status_code'] ?? 'N/A');
            $lines[] = '- Depth: ' . (int) ($page['depth'] ?? 0);
            $lines[] = '';
            $lines[] = mb_substr((string) ($page['text'] ?? ''), 0, 4000);
            $lines[] = '';
        }

        $lines[] = '## Specs';
        $lines[] = '';

        foreach ($parsedSpecs as $spec) {
            $lines[] = '### ' . (string) ($spec['title'] ?? 'Spec');
            $lines[] = '';
            $lines[] = '- Source: ' . (string) ($spec['source_url'] ?? '');
            $lines[] = '- Type: ' . (string) ($spec['spec_type'] ?? '');
            $lines[] = '- Version: ' . (string) ($spec['version'] ?? '');
            $lines[] = '';
        }

        return implode("\n", $lines);
    }

    protected function buildReportMarkdown(array $snapshot): string
    {
        $lines = [];
        $lines[] = '# API Research Report: ' . (string) ($snapshot['provider_name'] ?? $snapshot['provider_slug']);
        $lines[] = '';
        $lines[] = '## Overview';
        $lines[] = '';
        $lines[] = '- Provider: ' . (string) ($snapshot['provider_name'] ?? '');
        $lines[] = '- Provider Slug: ' . (string) ($snapshot['provider_slug'] ?? '');
        $lines[] = '- Start URL: ' . (string) ($snapshot['start_url'] ?? '');
        $lines[] = '- Docs Domain: ' . (string) ($snapshot['docs_domain'] ?? '');
        $lines[] = '- Run Date: ' . (string) ($snapshot['run_timestamp'] ?? '');
        $lines[] = '- Pages Scraped: ' . (int) ($snapshot['pages_scraped'] ?? 0);
        $lines[] = '- Specs Found: ' . (int) ($snapshot['specs_found'] ?? 0);
        $lines[] = '- Endpoints Found: ' . (int) ($snapshot['endpoints_found'] ?? 0);
        $lines[] = '- Integration Score: ' . number_format((float) ($snapshot['integration_score'] ?? 0), 2);
        $lines[] = '';

        $lines[] = '## Documentation Sources';
        $lines[] = '';
        foreach (($snapshot['source_urls'] ?? []) as $url) {
            $lines[] = '- ' . $url;
        }
        $lines[] = '';

        $lines[] = '## Authentication';
        $lines[] = '';
        $lines[] = '- Primary auth type: ' . (string) ($snapshot['auth']['primary_auth_type'] ?? 'unknown');
        $lines[] = '- Confidence: ' . number_format((float) ($snapshot['auth']['confidence'] ?? 0), 2);
        $lines[] = '- Token URL: ' . (string) ($snapshot['auth']['token_url'] ?? 'N/A');
        $lines[] = '- Required headers:';
        foreach (($snapshot['auth']['required_headers'] ?? []) as $header) {
            $lines[] = '  - ' . $header;
        }
        if (empty($snapshot['auth']['required_headers'])) {
            $lines[] = '  - None detected';
        }
        $lines[] = '';

        $lines[] = '## Environments / Base URLs';
        $lines[] = '';
        foreach (($snapshot['servers'] ?? []) as $server) {
            $lines[] = '- ' . $server;
        }
        if (empty($snapshot['servers'])) {
            $lines[] = '- None detected';
        }
        $lines[] = '';

        $lines[] = '## Rate Limits';
        $lines[] = '';
        foreach (($snapshot['rate_limits'] ?? []) as $item) {
            $lines[] = '- ' . str_replace("\n", ' ', mb_substr($item, 0, 500));
        }
        if (empty($snapshot['rate_limits'])) {
            $lines[] = '- None clearly detected';
        }
        $lines[] = '';

        $lines[] = '## Pagination';
        $lines[] = '';
        foreach (($snapshot['pagination'] ?? []) as $item) {
            $lines[] = '- ' . str_replace("\n", ' ', mb_substr($item, 0, 500));
        }
        if (empty($snapshot['pagination'])) {
            $lines[] = '- None clearly detected';
        }
        $lines[] = '';

        $lines[] = '## Webhooks';
        $lines[] = '';
        foreach (($snapshot['webhooks'] ?? []) as $item) {
            $lines[] = '- ' . str_replace("\n", ' ', mb_substr($item, 0, 500));
        }
        if (empty($snapshot['webhooks'])) {
            $lines[] = '- None clearly detected';
        }
        $lines[] = '';

        $lines[] = '## Endpoints';
        $lines[] = '';
        foreach (array_slice(($snapshot['endpoints'] ?? []), 0, 200) as $endpoint) {
            $lines[] = '### ' . (string) ($endpoint['method'] ?? '') . ' ' . (string) ($endpoint['path'] ?? '');
            $lines[] = '- Summary: ' . (string) ($endpoint['summary'] ?? '');
            $lines[] = '- Source: ' . (string) ($endpoint['source'] ?? '');
            if (! empty($endpoint['example_request'])) {
                $lines[] = '- Sample request:';
                $lines[] = '```';
                $lines[] = (string) $endpoint['example_request'];
                $lines[] = '```';
            }
            $lines[] = '';
        }

        $lines[] = '## SDK / Language Support';
        $lines[] = '';
        foreach (($snapshot['sdk_support'] ?? []) as $lang) {
            $lines[] = '- ' . $lang;
        }
        if (empty($snapshot['sdk_support'])) {
            $lines[] = '- None clearly detected';
        }
        $lines[] = '';

        $lines[] = '## Example Artifacts';
        $lines[] = '';
        foreach (['curl', 'json', 'javascript', 'php', 'python'] as $type) {
            $lines[] = '### ' . ucfirst($type);
            $lines[] = '';
            foreach (array_slice(($snapshot['examples'][$type] ?? []), 0, 5) as $example) {
                $lines[] = '- Source: ' . (string) ($example['source_url'] ?? '');
                $lines[] = '```';
                $lines[] = (string) ($example['code'] ?? '');
                $lines[] = '```';
            }
            if (empty($snapshot['examples'][$type])) {
                $lines[] = '- None detected';
            }
            $lines[] = '';
        }

        $lines[] = '## MyMI Wallet Integration Notes';
        $lines[] = '';
        $lines[] = '- Recommended library: App\\Libraries\\Integrations\\' . ucfirst(str_replace(' ', '', ucwords(str_replace('-', ' ', (string) ($snapshot['provider_slug'] ?? 'provider'))))) . 'Service';
        $lines[] = '- Recommended config keys should be stored in .env';
        $lines[] = '- Use Services::curlrequest() or a dedicated wrapper for external calls';
        $lines[] = '- Add retry, throttling, and failure logging before production rollout';
        $lines[] = '';

        $lines[] = '## Generated Implementation Tasks';
        $lines[] = '';
        foreach (($snapshot['generated_tasks'] ?? []) as $task) {
            $lines[] = '- ' . $task;
        }
        $lines[] = '';

        if (! empty($snapshot['diff'])) {
            $lines[] = '## Snapshot Comparison';
            $lines[] = '';
            foreach (($snapshot['diff']['new_endpoints'] ?? []) as $item) {
                $lines[] = '- New endpoint: ' . $item;
            }
            foreach (($snapshot['diff']['removed_endpoints'] ?? []) as $item) {
                $lines[] = '- Removed endpoint: ' . $item;
            }
            foreach (($snapshot['diff']['auth_changes'] ?? []) as $item) {
                $lines[] = '- Auth change: ' . $item;
            }
            $lines[] = '';
        }

        $lines[] = '## Raw Reference URLs';
        $lines[] = '';
        foreach (($snapshot['source_urls'] ?? []) as $url) {
            $lines[] = '- ' . $url;
        }

        return implode("\n", $lines);
    }
}