<?php

declare(strict_types=1);

namespace App\Commands\Auth;

use App\Commands\SafeBaseCommand;
use App\Services\AuthSmokeService;
use CodeIgniter\CLI\CLI;

class SmokeTest extends SafeBaseCommand
{
    protected $group = 'auth';
    protected $name = 'auth:smoke-test';
    protected $description = 'Deterministic Myth/Auth smoke test for login/session/reset flow.';
    protected $arguments = [];
    protected $options = [
        '--json' => 'Output machine-readable JSON only',
    ];

    public function run(array $params)
    {
        $this->parseParams($params);
        $json = CLI::getOption('json') !== null;

        $result = (new AuthSmokeService())->run();

        if ($json) {
            CLI::write((string) json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            return ($result['status'] ?? '') === 'PASS' ? EXIT_SUCCESS : EXIT_ERROR;
        }

        CLI::write('Auth smoke-test');
        CLI::write('status: ' . ($result['status'] ?? 'UNKNOWN'));
        CLI::write('score: ' . ($result['score'] ?? 0));
        CLI::write('summary: ' . ($result['summary'] ?? ''));

        foreach (($result['details']['steps'] ?? []) as $step) {
            CLI::write(sprintf('- %s: %s (%s)', $step['key'] ?? 'unknown', $step['status'] ?? 'FAIL', $step['message'] ?? ''));
        }

        return ($result['status'] ?? '') === 'PASS' ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
