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
        $checks = [
            'database' => $this->databaseCheck(),
            'cache'    => $this->cacheCheck(),
        ];

        $isHealthy = $this->areChecksPassing($checks);

        if (! $isHealthy) {
            log_message('error', 'Healthz check failed: {checks}', ['checks' => $checks]);
        }

        return $this->response->setStatusCode($isHealthy ? 200 : 503)
            ->setJSON([
                'status'    => $isHealthy ? 'ok' : 'degraded',
                'timestamp' => date(DATE_ATOM),
                'checks'    => $checks,
            ]);
    }

    public function diag(): ResponseInterface
    {
        $checks = [
            'database' => $this->databaseCheck(),
            'cache'    => $this->cacheCheck(),
        ];
        $isHealthy = $this->areChecksPassing($checks);

        if (! $isHealthy) {
            log_message('error', 'Diagnostic check failed: {checks}', ['checks' => $checks]);
        }

        $system = [
            'status'        => $isHealthy ? 'ok' : 'degraded',
            'timestamp'     => date(DATE_ATOM),
            'environment'   => ENVIRONMENT,
            'php_version'   => PHP_VERSION,
            'ci_version'    => CodeIgniter::CI_VERSION,
            'git_ref'       => $this->gitRef(),
            'app_timezone'  => date_default_timezone_get(),
            'memory_usage'  => memory_get_usage(true),
        ];

        return $this->response->setStatusCode($isHealthy ? 200 : 503)
            ->setJSON([
                'system' => $system,
                'checks' => $checks,
            ]);
    }

    private function databaseCheck(): array
    {
        try {
            $db = db_connect();
            $ok = $db->isConnected() || $db->simpleQuery('SELECT 1');

            return [
                'status' => $ok ? 'ok' : 'fail',
                'detail' => $ok ? 'database reachable' : 'database unreachable',
            ];
        } catch (Throwable $e) {
            return [
                'status' => 'fail',
                'detail' => 'database error',
            ];
        }
    }

    private function cacheCheck(): array
    {
        try {
            $cache = cache();
            $key   = 'healthz_ping';
            $value = (string) time();
            $cache->save($key, $value, 30);
            $ok = $cache->get($key) === $value;

            return [
                'status' => $ok ? 'ok' : 'fail',
                'detail' => $ok ? 'cache read/write ok' : 'cache read/write failed',
            ];
        } catch (Throwable $e) {
            return [
                'status' => 'fail',
                'detail' => 'cache error',
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
}
