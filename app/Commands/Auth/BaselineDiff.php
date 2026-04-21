<?php

declare(strict_types=1);

namespace App\Commands\Auth;

use App\Commands\SafeBaseCommand;
use App\Services\AuthBaselineService;
use CodeIgniter\CLI\CLI;

class BaselineDiff extends SafeBaseCommand
{
    protected $group = 'auth';
    protected $name = 'auth:baseline:diff';
    protected $description = 'Diff current auth/authz runtime against current golden baseline.';

    public function run(array $params)
    {
        $this->parseParams($params);

        $service = service('authBaseline');
        if (! $service instanceof AuthBaselineService) {
            $service = new AuthBaselineService();
        }

        $diff = $service->diffAgainstCurrent();
        if (isset($diff['error'])) {
            CLI::error((string) $diff['error']);
            return EXIT_ERROR;
        }

        CLI::write('Changed files: ' . count($diff['changed_files'] ?? []));
        foreach (($diff['changed_files'] ?? []) as $item) {
            CLI::write('- ' . $item['file'], 'yellow');
        }

        CLI::write('Missing files: ' . count($diff['missing_files'] ?? []));
        foreach (($diff['missing_files'] ?? []) as $item) {
            CLI::write('- ' . $item, 'red');
        }

        CLI::write('Env drift keys: ' . count($diff['env_drift'] ?? []));
        foreach (array_keys($diff['env_drift'] ?? []) as $key) {
            CLI::write('- ' . $key, 'yellow');
        }

        $routeDrift = $diff['route_drift'] ?? ['changed' => false, 'added' => [], 'missing' => []];
        CLI::write('Route drift: ' . (($routeDrift['changed'] ?? false) ? 'YES' : 'NO'));
        foreach (($routeDrift['added'] ?? []) as $route) {
            CLI::write('- added: ' . $route, 'yellow');
        }
        foreach (($routeDrift['missing'] ?? []) as $route) {
            CLI::write('- missing: ' . $route, 'red');
        }

        CLI::write('Package drift: ' . count($diff['package_drift'] ?? []));
        foreach (array_keys($diff['package_drift'] ?? []) as $pkg) {
            CLI::write('- ' . $pkg, 'yellow');
        }

        $hasDrift = ! empty($diff['changed_files'])
            || ! empty($diff['missing_files'])
            || ! empty($diff['env_drift'])
            || ! empty($diff['package_drift'])
            || (($routeDrift['changed'] ?? false) === true);

        return $hasDrift ? EXIT_ERROR : EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
