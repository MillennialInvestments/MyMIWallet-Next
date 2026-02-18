<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class EnvSnapshot extends SafeBaseCommand
{
    protected $group       = 'Ops';
    protected $name        = 'ops:env:snapshot';
    protected $description = 'Print key env vars with secret redaction (safe for logs/screenshots).';

    public function run(array $params)
    {
        $keys = [
            'CI_ENVIRONMENT',
            'app.baseURL',
            'database.default.hostname',
            'database.default.database',
            'MYMI_ALERTS_IMAP_HOST',
            'MYMI_ALERTS_IMAP_PORT',
            'MYMI_ALERTS_IMAP_USER',
            'MYMI_ALERTS_IMAP_MAILBOX',
            'MYMI_ALERTS_IMAP_FROM',
            'MYMI_ALERTS_IMAP_LOOKBACK_DAYS',
            'MYMI_ALERTS_IMAP_LIMIT',
            'REDIS_HOST',
            'REDIS_PORT',
        ];

        CLI::write('Env snapshot (redacted):', 'yellow');

        foreach ($keys as $k) {
            $v = getenv($k);
            if ($v === false || $v === null || $v === '') {
                CLI::write($k . ' = (not set)');
                continue;
            }
            CLI::write($k . ' = ' . $this->redact($k, (string) $v));
        }

        // explicit secrets: never print values
        $secretKeys = [
            'MYMI_ALERTS_IMAP_PASS',
            'database.default.password',
            'OPENAI_API_KEY',
        ];
        foreach ($secretKeys as $sk) {
            $sv = getenv($sk);
            CLI::write($sk . ' = ' . (($sv && $sv !== '') ? '***REDACTED***' : '(not set)'));
        }

        return EXIT_SUCCESS;
    }

    private function redact(string $key, string $value): string
    {
        // redact anything that looks like a secret/token
        $lower = strtolower($key);
        if (str_contains($lower, 'pass') || str_contains($lower, 'secret') || str_contains($lower, 'token') || str_contains($lower, 'key')) {
            return '***REDACTED***';
        }
        return $value;
    }
}
