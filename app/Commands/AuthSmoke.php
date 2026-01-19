<?php

declare(strict_types=1);

namespace App\Commands;

use App\Services\AuthSmokeService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class AuthSmoke extends BaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'auth:smoke';
    protected $description = 'Run a safe authentication smoke test and record health results.';

    public function run(array $params)
    {
        $service = new AuthSmokeService();
        $result = $service->run();

        CLI::newLine();
        CLI::write('Auth smoke test');
        CLI::write('----------------------------------------');
        CLI::write('status: ' . ($result['status'] ?? 'UNKNOWN'));
        CLI::write('score: ' . ($result['score'] ?? 0));
        CLI::write('summary: ' . ($result['summary'] ?? ''));
        CLI::write('run_id: ' . (($result['run_id'] ?? null) ?: 'n/a'));
        CLI::write('duration_ms: ' . ($result['duration_ms'] ?? 0));
        CLI::write('server: ' . ($result['server'] ?? 'n/a'));
        if (! empty($result['build_tag'])) {
            CLI::write('build_tag: ' . $result['build_tag']);
        }

        CLI::newLine();
        foreach (($result['details']['steps'] ?? []) as $step) {
            $line = sprintf(
                '- %s: %s (%s)',
                $step['key'] ?? 'unknown',
                $step['status'] ?? 'FAIL',
                $step['message'] ?? ''
            );
            CLI::write($line);
        }

        return ($result['status'] ?? '') === 'PASS' ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
