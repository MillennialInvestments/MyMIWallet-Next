<?php

declare(strict_types=1);

namespace App\Commands;

use CodeIgniter\CLI\CLI;

class GtmLaunchSmoke extends SafeBaseCommand
{
    protected $group = 'GTM';
    protected $name = 'gtm:launch:smoke';
    protected $description = 'Run non-destructive HTTP smoke checks for Phase A user navigation surfaces.';

    public function run(array $params)
    {
        $baseUrl = rtrim((string) (env('app.baseURL') ?: 'http://127.0.0.1'), '/');
        $paths = ['/login', '/Budget', '/Investments', '/Investments/Watchlist'];

        $results = [];
        foreach ($paths as $path) {
            $url = $baseUrl . $path;
            [$status, $body] = $this->request($url);
            $hasRawError = str_contains(strtolower($body), 'fatal error') || str_contains(strtolower($body), 'uncaught');
            $pass = $status > 0 && $status !== 500 && ! $hasRawError;
            $results[] = [
                'path' => $path,
                'status' => $status,
                'raw_error' => $hasRawError,
                'pass' => $pass,
            ];
        }

        $output = ROOTPATH . 'docs/launch/launch_smoke_results.md';
        if (! is_dir(dirname($output))) {
            mkdir(dirname($output), 0775, true);
        }

        $lines = [
            '# Launch Smoke Results',
            '',
            '- Generated: ' . gmdate('c'),
            '- Command: `php spark gtm:launch:smoke`',
            '- Base URL: `' . $baseUrl . '`',
            '',
            '| Path | HTTP Status | Raw PHP Error Signature | Pass |',
            '|---|---:|---|---|',
        ];

        foreach ($results as $result) {
            $lines[] = '| `' . $result['path'] . '` | ' . $result['status'] . ' | ' . ($result['raw_error'] ? 'yes' : 'no') . ' | ' . ($result['pass'] ? 'YES' : 'NO') . ' |';
        }

        file_put_contents($output, implode(PHP_EOL, $lines) . PHP_EOL);
        CLI::write('Launch smoke results written: ' . $output, 'green');

        return EXIT_SUCCESS;
    }

    /** @return array{0:int,1:string} */
    private function request(string $url): array
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 8);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: text/html,application/json']);

        $body = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        return [$status, is_string($body) ? $body : ''];
    }
}
