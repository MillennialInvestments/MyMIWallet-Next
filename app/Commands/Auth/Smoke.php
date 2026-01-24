<?php

declare(strict_types=1);

namespace App\Commands\Auth;

use App\Services\AuthSmokeService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Smoke extends BaseCommand
{
    protected $group       = 'auth';
    protected $name        = 'auth:smoke';
    protected $description = 'Run a safe authentication smoke test and record health results for ops visibility.';

    protected $arguments = [];
    protected $options = [
        '--dry-run' => 'Preview actions without writing data',
        '--force'   => 'Required for destructive actions',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:auth:smoke] Started');
        CLI::write('Starting auth:smoke', 'yellow');

        $dryRun = $this->option('dry-run') !== null || ! $this->option('force');
        if ($dryRun) {
            CLI::write('Dry-run enabled. Use --force to execute the smoke test.', 'yellow');
            log_message('info', '[spark:auth:smoke] Dry-run completed');
            return EXIT_SUCCESS;
        }

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

        log_message('info', '[spark:auth:smoke] Completed', [
            'status' => $result['status'] ?? 'UNKNOWN',
            'score'  => $result['score'] ?? 0,
        ]);

        return ($result['status'] ?? '') === 'PASS' ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
