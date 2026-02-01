<?php

declare(strict_types=1);

namespace App\Services\Ops;

use CodeIgniter\HTTP\CURLRequest;
use Config\Services;
use Throwable;

class ApiHealthService
{
    /**
     * @param list<string> $internalRoutes
     * @param list<array{label: string, url: string, method?: string, timeout?: int}> $externalChecks
     * @return array{
     *   internal: list<array<string, mixed>>,
     *   external: list<array<string, mixed>>,
     *   warnings: list<string>,
     *   failures: list<string>
     * }
     */
    public function run(?string $baseUrl, array $internalRoutes, array $externalChecks, bool $strict): array
    {
        $warnings = [];
        $failures = [];
        $internalResults = [];
        $externalResults = [];

        if (! $baseUrl) {
            $warnings[] = 'Base URL not configured; internal API checks skipped.';
        } else {
            foreach ($internalRoutes as $route) {
                $internalResults[] = $this->checkUrl('internal:' . $route, rtrim($baseUrl, '/') . '/' . ltrim($route, '/'));
            }
        }

        foreach ($externalChecks as $check) {
            $externalResults[] = $this->checkUrl(
                $check['label'],
                $check['url'],
                $check['method'] ?? 'HEAD',
                $check['timeout'] ?? 3
            );
        }

        foreach (array_merge($internalResults, $externalResults) as $result) {
            if ($result['status'] === 'fail') {
                $message = sprintf('%s check failed (%s)', $result['label'], $result['code'] ?? 'no response');
                if ($result['scope'] === 'external' && ! $strict) {
                    $warnings[] = $message;
                } else {
                    $failures[] = $message;
                }
            }
        }

        return [
            'internal' => $internalResults,
            'external' => $externalResults,
            'warnings' => $warnings,
            'failures' => $failures,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function checkUrl(string $label, string $url, string $method = 'GET', int $timeout = 3): array
    {
        $start = microtime(true);
        $scope = str_starts_with($label, 'internal') ? 'internal' : 'external';
        $parts = parse_url($url);

        if (($parts['scheme'] ?? '') === 'tcp') {
            return $this->checkSocket($label, $url, $timeout, $scope, $start);
        }

        try {
            $client = $this->client();
            $response = $client->request($method, $url, [
                'timeout' => $timeout,
                'http_errors' => false,
            ]);
            $durationMs = (int) round((microtime(true) - $start) * 1000);
            $code = $response->getStatusCode();

            return [
                'label' => $label,
                'scope' => $scope,
                'url' => $this->redactUrl($url),
                'code' => $code,
                'duration_ms' => $durationMs,
                'status' => $code >= 200 && $code < 400 ? 'pass' : 'fail',
            ];
        } catch (Throwable $e) {
            $durationMs = (int) round((microtime(true) - $start) * 1000);
            return [
                'label' => $label,
                'scope' => $scope,
                'url' => $this->redactUrl($url),
                'code' => null,
                'duration_ms' => $durationMs,
                'status' => 'fail',
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function checkSocket(string $label, string $url, int $timeout, string $scope, float $start): array
    {
        $error = null;
        $errno = 0;
        $connection = @stream_socket_client(
            $url,
            $errno,
            $error,
            $timeout
        );
        $durationMs = (int) round((microtime(true) - $start) * 1000);

        if (is_resource($connection)) {
            fclose($connection);
            return [
                'label' => $label,
                'scope' => $scope,
                'url' => $this->redactUrl($url),
                'code' => 200,
                'duration_ms' => $durationMs,
                'status' => 'pass',
            ];
        }

        return [
            'label' => $label,
            'scope' => $scope,
            'url' => $this->redactUrl($url),
            'code' => null,
            'duration_ms' => $durationMs,
            'status' => 'fail',
            'error' => $error ?: 'Socket connection failed',
        ];
    }

    private function client(): CURLRequest
    {
        return Services::curlrequest([
            'timeout' => 3,
            'connect_timeout' => 2,
        ]);
    }

    private function redactUrl(string $url): string
    {
        $parts = parse_url($url);
        if (! $parts) {
            return $url;
        }

        $redacted = $parts['scheme'] ?? 'http';
        $redacted .= '://' . ($parts['host'] ?? 'unknown');
        if (! empty($parts['port'])) {
            $redacted .= ':' . $parts['port'];
        }
        $redacted .= $parts['path'] ?? '';

        return $redacted;
    }
}
