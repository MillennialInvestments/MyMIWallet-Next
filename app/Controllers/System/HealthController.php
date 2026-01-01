<?php
declare(strict_types=1);

namespace App\Controllers\System;

use App\Controllers\BaseController;
use CodeIgniter\CodeIgniter;
use CodeIgniter\HTTP\ResponseInterface;
use Throwable;

class HealthController extends BaseController
{
    public function healthz(): ResponseInterface
    {
        $checks = $this->collectChecks();
        $isHealthy = $this->areChecksPassing($checks);

        if (! $isHealthy) {
            $this->logCheckFailure('healthz', $checks);
        }

        return $this->response
            ->setStatusCode($isHealthy ? 200 : 503)
            ->setJSON([
                'status'    => $isHealthy ? 'ok' : 'degraded',
                'timestamp' => $this->now(),
                'checks'    => $checks,
            ]);
    }

    public function diag(): ResponseInterface
    {
        $checks = $this->collectChecks();
        $isHealthy = $this->areChecksPassing($checks);

        if (! $isHealthy) {
            $this->logCheckFailure('diag', $checks);
        }

        return $this->response
            ->setStatusCode($isHealthy ? 200 : 503)
            ->setJSON([
                'system' => [
                    'status'       => $isHealthy ? 'ok' : 'degraded',
                    'timestamp'    => $this->now(),
                    'app_version'  => $this->appVersion(),
                    'git_ref'      => $this->gitRef(),
                    'php_version'  => PHP_VERSION,
                    'ci_version'   => CodeIgniter::CI_VERSION,
                    'timezone'     => date_default_timezone_get(),
                    'memory_usage' => memory_get_usage(true),
                ],
                'checks' => $checks,
            ]);
    }

    /**
     * @return array<string,array<string,int|string|null>>
     */
    private function collectChecks(): array
    {
        return [
            'database' => $this->databaseCheck(),
            'cache'    => $this->cacheCheck(),
        ];
    }

    private function now(): string
    {
        return date(DATE_ATOM);
    }

    private function logCheckFailure(string $endpoint, array $checks): void
    {
        log_message('error', 'System check failed for {endpoint}', [
            'endpoint' => $endpoint,
            'checks'   => $checks,
        ]);
    }

    private function databaseCheck(): array
    {
        $started = microtime(true);

        try {
            $db = db_connect();
            $ok = $db->isConnected() || $db->simpleQuery('SELECT 1');

            return [
                'status' => $ok ? 'ok' : 'fail',
                'detail' => $ok ? 'database reachable' : 'database unreachable',
                'ms'     => $this->durationMs($started),
            ];
        } catch (Throwable $e) {
            log_message('error', 'Database health probe failed: {message}', ['message' => $e->getMessage()]);

            return [
                'status' => 'fail',
                'detail' => 'database error',
                'ms'     => $this->durationMs($started),
            ];
        }
    }

    private function cacheCheck(): array
    {
        $started = microtime(true);

        try {
            $cache = cache();
            $key   = 'healthz_ping';
            $value = (string) time();
            $cache->save($key, $value, 30);
            $ok = $cache->get($key) === $value;

            return [
                'status' => $ok ? 'ok' : 'fail',
                'detail' => $ok ? 'cache read/write ok' : 'cache read/write failed',
                'ms'     => $this->durationMs($started),
            ];
        } catch (Throwable $e) {
            log_message('error', 'Cache health probe failed: {message}', ['message' => $e->getMessage()]);

            return [
                'status' => 'fail',
                'detail' => 'cache error',
                'ms'     => $this->durationMs($started),
            ];
        }
    }

    /**
     * Determine if all checks are passing.
     *
     * @param array<string,array<string,string>> $checks
     */
    private function areChecksPassing(array $checks): bool
    {
        foreach ($checks as $check) {
            if (($check['status'] ?? '') !== 'ok') {
                return false;
            }
        }

        return true;
    }

    private function appVersion(): ?string
    {
        $envVersion = getenv('APP_VERSION');
        if (is_string($envVersion) && $envVersion !== '') {
            return $envVersion;
        }

        $composerPath = ROOTPATH . 'composer.json';
        if (is_readable($composerPath)) {
            $composer = json_decode((string) file_get_contents($composerPath), true);

            if (is_array($composer) && isset($composer['version']) && is_string($composer['version'])) {
                return $composer['version'];
            }
        }

        return null;
    }

    private function gitRef(): ?string
    {
        $headPath = ROOTPATH . '.git/HEAD';
        if (! is_readable($headPath)) {
            return null;
        }

        $head = trim((string) file_get_contents($headPath));
        if (str_starts_with($head, 'ref:')) {
            $refPath = ROOTPATH . '.git/' . trim(substr($head, 4));
            if (is_readable($refPath)) {
                return substr(trim((string) file_get_contents($refPath)), 0, 12);
            }
        }

        return substr($head, 0, 12) ?: null;
    }

    private function durationMs(float $started): int
    {
        return (int) round((microtime(true) - $started) * 1000);
    }
}
