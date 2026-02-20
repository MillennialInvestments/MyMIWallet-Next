<?php

declare(strict_types=1);

namespace App\Services\Ops;

use Config\App;
use Config\Cache;
use Config\Email;
use Config\Encryption;

class ConfigAuditService
{
    /**
     * @return array{
     *   checks: list<array<string, mixed>>,
     *   warnings: list<string>,
     *   failures: list<string>
     * }
     */
    public function audit(): array
    {
        $warnings = [];
        $failures = [];
        $checks = [];

        $app = new App();
        if (empty($app->baseURL)) {
            $failures[] = 'App baseURL missing.';
            $checks[] = ['name' => 'app.baseURL', 'status' => 'fail'];
        } else {
            $checks[] = ['name' => 'app.baseURL', 'status' => 'pass'];
        }

        $encryption = new Encryption();
        if (empty($encryption->key)) {
            $failures[] = 'Encryption key missing.';
            $checks[] = ['name' => 'encryption.key', 'status' => 'fail'];
        } else {
            $checks[] = ['name' => 'encryption.key', 'status' => 'pass'];
        }

        $validDrivers = ['OpenSSL', 'Sodium'];
        if (! in_array($encryption->driver, $validDrivers, true)) {
            $warnings[] = sprintf('Encryption driver unexpected: %s', $encryption->driver);
            $checks[] = ['name' => 'encryption.driver', 'status' => 'warn'];
        } else {
            $checks[] = ['name' => 'encryption.driver', 'status' => 'pass'];
        }

        $email = new Email();
        if ($email->protocol === 'smtp') {
            if (empty($email->SMTPHost) || empty($email->SMTPPort)) {
                $failures[] = 'SMTP host or port missing.';
                $checks[] = ['name' => 'email.smtp', 'status' => 'fail'];
            } else {
                $checks[] = ['name' => 'email.smtp', 'status' => 'pass'];
            }
        } else {
            $checks[] = ['name' => 'email.protocol', 'status' => 'pass'];
        }

        $cache = new Cache();
        if (in_array($cache->handler, ['redis', 'predis'], true)) {
            if (empty($cache->redis['host']) || empty($cache->redis['port'])) {
                $warnings[] = 'Redis cache selected but host/port missing.';
                $checks[] = ['name' => 'cache.redis', 'status' => 'warn'];
            } else {
                $checks[] = ['name' => 'cache.redis', 'status' => 'pass'];
            }
        }

        $queueEnabled = env('QUEUE_ENABLED') ?: env('queue.enabled');
        if ($queueEnabled) {
            if (! class_exists(\Config\QueueConfig::class)) {
                $warnings[] = 'Queue enabled but QueueConfig class missing.';
                $checks[] = ['name' => 'queue.config', 'status' => 'warn'];
            } else {
                $checks[] = ['name' => 'queue.config', 'status' => 'pass'];
            }
        }

        return [
            'checks' => $checks,
            'warnings' => $warnings,
            'failures' => $failures,
        ];
    }
}
