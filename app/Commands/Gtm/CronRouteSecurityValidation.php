<?php

declare(strict_types=1);

namespace App\Commands\Gtm;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class CronRouteSecurityValidation extends SafeBaseCommand
{
    protected $group = 'GTM';
    protected $name = 'gtm:cron:validate-security';
    protected $description = 'Validate INTERNAL_CRON and /API/Management routes reject missing/invalid tokens.';

    public function run(array $params)
    {
        $baseUrl = $this->resolveBaseUrl($params);
        $targets = $this->discoverTargets();

        $results = [];
        $criticalExposure = null;

        foreach ($targets as $target) {
            $method = $target['method'];
            $path = '/' . ltrim($target['path'], '/');
            $url = $baseUrl . $path;

            $noTokenStatus = $this->requestStatus($method, $url, null);
            $invalidTokenStatus = $this->requestStatus($method, $url, 'Bearer invalid-gtm-token');

            $row = [
                'method' => $method,
                'path' => $path,
                'no_token' => $noTokenStatus,
                'invalid_token' => $invalidTokenStatus,
                'pass' => $this->isDenied($noTokenStatus) && $this->isDenied($invalidTokenStatus),
            ];

            $results[] = $row;

            if ($noTokenStatus === 200 || $invalidTokenStatus === 200) {
                $criticalExposure = $row;
                break;
            }
        }

        $this->writeReport($baseUrl, $results, $criticalExposure);

        if ($criticalExposure !== null) {
            CLI::error('CRITICAL exposure detected: ' . $criticalExposure['method'] . ' ' . $criticalExposure['path']);
            return EXIT_ERROR;
        }

        CLI::write('Cron route security validation complete: docs/launch/cron_route_security_validation.md', 'green');
        return EXIT_SUCCESS;
    }

    private function resolveBaseUrl(array $params): string
    {
        foreach ($params as $param) {
            if (! is_string($param)) {
                continue;
            }

            if (str_starts_with($param, '--base-url=')) {
                return rtrim(substr($param, 11), '/');
            }

            if (str_starts_with($param, 'http://') || str_starts_with($param, 'https://')) {
                return rtrim($param, '/');
            }
        }

        return rtrim((string) (env('app.baseURL') ?: getenv('APP_BASEURL') ?: 'http://127.0.0.1'), '/');
    }

    /** @return list<array{method:string,path:string}> */
    private function discoverTargets(): array
    {
        $targets = [];

        $routesFile = ROOTPATH . 'app/Config/Routes.php';
        if (is_file($routesFile)) {
            $lines = file($routesFile, FILE_IGNORE_NEW_LINES) ?: [];
            foreach ($lines as $line) {
                $trim = trim($line);
                if ($trim === '' || str_starts_with($trim, '//')) {
                    continue;
                }

                if (preg_match('/\$routes->(get|post|put|delete|patch|options|match)\((.+)\);/i', $trim, $m) !== 1) {
                    continue;
                }

                $verb = strtoupper($m[1]);
                $args = $m[2];

                if (preg_match('/^[\'\"]([^\'\"]+)[\'\"]\s*,/i', $args, $a) !== 1) {
                    continue;
                }

                $path = '/' . ltrim($a[1], '/');
                if (! str_contains($path, '/API/Management/')) {
                    continue;
                }

                if ($verb === 'MATCH') {
                    foreach (['GET', 'POST'] as $mv) {
                        $targets[] = ['method' => $mv, 'path' => $path];
                    }
                } else {
                    $targets[] = ['method' => $verb, 'path' => $path];
                }
            }
        }

        $csvPath = ROOTPATH . 'docs/functional_inventory/feature_inventory.csv';
        if (is_file($csvPath) && ($fp = fopen($csvPath, 'rb')) !== false) {
            $header = fgetcsv($fp);
            if (is_array($header)) {
                $index = array_flip($header);
                while (($row = fgetcsv($fp)) !== false) {
                    $isCron = strtolower((string) ($row[$index['IsCronEndpoint']] ?? 'false')) === 'true';
                    $route = (string) ($row[$index['RoutePath']] ?? '');
                    $methodSpec = (string) ($row[$index['HttpMethod']] ?? 'GET');
                    if (! $isCron || ! str_starts_with($route, '/API/')) {
                        continue;
                    }

                    foreach (explode('|', $methodSpec) as $method) {
                        $method = strtoupper(trim($method));
                        if ($method === '') {
                            continue;
                        }
                        $targets[] = ['method' => $method, 'path' => $route];
                    }
                }
            }
            fclose($fp);
        }

        $uniq = [];
        foreach ($targets as $t) {
            $key = $t['method'] . ' ' . $t['path'];
            $uniq[$key] = $t;
        }

        $out = array_values($uniq);
        usort($out, static function (array $a, array $b): int {
            return strcmp($a['method'] . ' ' . $a['path'], $b['method'] . ' ' . $b['path']);
        });

        return $out;
    }

    private function requestStatus(string $method, string $url, ?string $authHeader): int
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        $headers = ['Accept: application/json'];
        if ($authHeader !== null) {
            $headers[] = 'Authorization: ' . $authHeader;
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, '{}');
            $headers[] = 'Content-Type: application/json';
        }

        curl_exec($ch);
        $http = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        return $http;
    }

    private function isDenied(int $status): bool
    {
        return $status === 401 || $status === 403;
    }

    /** @param list<array{method:string,path:string,no_token:int,invalid_token:int,pass:bool}> $results */
    private function writeReport(string $baseUrl, array $results, ?array $criticalExposure): void
    {
        $path = ROOTPATH . 'docs/launch/cron_route_security_validation.md';
        $dir = dirname($path);
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $lines = [
            '# Cron Route Security Validation',
            '',
            '- Generated: ' . date('Y-m-d H:i:s T'),
            '- Command: `php spark gtm:cron:validate-security`',
            '- Base URL: `' . $baseUrl . '`',
            '- Routes checked: ' . count($results),
            '',
            '| Method | Route | No Token Status | Invalid Token Status | Pass |',
            '|---|---|---:|---:|---|',
        ];

        foreach ($results as $r) {
            $lines[] = '| ' . $r['method'] . ' | `' . $r['path'] . '` | ' . $r['no_token'] . ' | ' . $r['invalid_token'] . ' | ' . ($r['pass'] ? 'YES' : 'NO') . ' |';
        }

        $passCount = 0;
        foreach ($results as $r) {
            if ($r['pass']) {
                $passCount++;
            }
        }
        $lines[] = '';
        $lines[] = '- Pass count: ' . $passCount;
        $lines[] = '- Fail count: ' . (count($results) - $passCount);
        $lines[] = '';
        if ($criticalExposure !== null) {
            $lines[] = '## Result';
            $lines[] = '- **CRITICAL EXPOSURE DETECTED**: `' . $criticalExposure['method'] . ' ' . $criticalExposure['path'] . '` returned HTTP 200 without valid auth.';
        } else {
            $lines[] = '## Result';
            $lines[] = '- No HTTP 200 exposure found for missing/invalid token checks.';
        }

        file_put_contents($path, implode(PHP_EOL, $lines) . PHP_EOL);
    }
}
