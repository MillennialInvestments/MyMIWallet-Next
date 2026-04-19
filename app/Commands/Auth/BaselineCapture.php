<?php

declare(strict_types=1);

namespace App\Commands\Auth;

use App\Commands\SafeBaseCommand;
use App\Services\AuthBaselineService;
use CodeIgniter\CLI\CLI;

class BaselineCapture extends SafeBaseCommand
{
    protected $group = 'auth';
    protected $name = 'auth:baseline:capture';
    protected $description = 'Capture auth/authz golden baseline artifacts.';
    protected $options = [
        '--no-smoke' => 'Skip smoke probes during baseline capture.',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $service = service('authBaseline');
        if (! $service instanceof AuthBaselineService) {
            $service = new AuthBaselineService();
        }

        $timestamp = $service->timestamp();
        $result = $service->capture($timestamp, ! isset($flags['no-smoke']));

        CLI::write('Auth baseline captured.', 'green');
        CLI::write('History: ' . ($result['history_dir'] ?? 'n/a'));
        CLI::write('Current: ' . ($result['current_dir'] ?? 'n/a'));
        CLI::write('Smoke status: ' . (($result['smoke']['status'] ?? 'UNKNOWN')));

        $smokeStatus = (string) ($result['smoke']['status'] ?? 'UNKNOWN');

        return in_array($smokeStatus, ['PASS', 'SKIPPED'], true) ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
