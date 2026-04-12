<?php

declare(strict_types=1);

namespace App\Commands\API;

use App\Libraries\ApiResearch\ApiReportWriter;
use App\Libraries\ApiResearch\ApiUrlTester;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ApiTestUrl extends SafeBaseCommand
{
    protected $group       = 'API';
    protected $name        = 'api:test-url';
    protected $description = 'Test an API URL or endpoint and write a markdown report.';
    protected $usage       = 'api:test-url <url> [--method GET] [--timeout 20]';
    protected $arguments   = [
        'url' => 'The API URL or endpoint to test.',
    ];
    protected $options     = [
        '--method'  => 'HTTP method: GET, POST, PUT, PATCH, DELETE',
        '--timeout' => 'Timeout in seconds',
    ];

    public function run(array $params)
    {
        $url = $params[0] ?? null;

        if (empty($url)) {
            CLI::error('Missing URL.');
            return;
        }

        $method  = (string) (CLI::getOption('method') ?: 'GET');
        $timeout = (int) (CLI::getOption('timeout') ?: 20);

        $tester = new ApiUrlTester();
        $writer = new ApiReportWriter();

        $result = $tester->test($url, $method, [], null, $timeout);

        $slug      = $writer->slugify($url);
        $timestamp = $writer->timestamp();
        $directory = ROOTPATH . 'docs/APIs/reports';

        $content = [];
        $content[] = '# API URL Test Report';
        $content[] = '';
        $content[] = '- URL: ' . $url;
        $content[] = '- Method: ' . strtoupper($method);
        $content[] = '- Status Code: ' . ($result['status_code'] ?? 'N/A');
        $content[] = '- Duration: ' . ($result['duration_ms'] ?? 0) . ' ms';
        $content[] = '- JSON Detected: ' . (! empty($result['json_detected']) ? 'Yes' : 'No');
        $content[] = '- Auth Hint: ' . ($result['auth_hint'] ?? 'Unknown');
        $content[] = '';
        $content[] = '## Body Preview';
        $content[] = '';
        $content[] = '```';
        $content[] = (string) ($result['body_preview'] ?? '');
        $content[] = '```';

        $path = $writer->write($directory, $slug . '-' . $timestamp . '-api-test.md', implode("\n", $content));

        CLI::write('URL test complete.', 'green');
        CLI::write('Report: ' . $path);
    }
}