<?php

declare(strict_types=1);

namespace App\Commands\Auth;

use App\Commands\SafeBaseCommand;
use App\Services\AuthBaselineService;
use CodeIgniter\CLI\CLI;

class Smoke extends SafeBaseCommand
{
    protected $group = 'auth';
    protected $name = 'auth:smoke';
    protected $description = 'Probe auth-critical routes and runtime expectations for login/register/reset/redirect safety.';

    public function run(array $params)
    {
        $this->parseParams($params);

        $service = service('authBaseline');
        if (! $service instanceof AuthBaselineService) {
            $service = new AuthBaselineService();
        }

        $report = $service->runSmokeProbes();

        CLI::write('Auth smoke report: ' . ($report['status'] ?? 'UNKNOWN'), ($report['status'] ?? '') === 'PASS' ? 'green' : 'red');

        foreach (($report['checks'] ?? []) as $check) {
            $label = (string) ($check['key'] ?? 'unknown');
            $status = ($check['pass'] ?? false) ? 'PASS' : 'FAIL';
            $extra = isset($check['status']) ? ' [' . $check['status'] . ']' : '';
            CLI::write(sprintf('- %s %s%s', $status, $label, $extra), $status === 'PASS' ? 'green' : 'red');
        }

        $outPath = ROOTPATH . 'docs/_baseline/auth/current/smoke.runtime.json';
        if (! is_dir(dirname($outPath))) {
            mkdir(dirname($outPath), 0775, true);
        }
        file_put_contents($outPath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        CLI::write('Saved: docs/_baseline/auth/current/smoke.runtime.json');

        return (($report['status'] ?? 'FAIL') === 'PASS') ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
