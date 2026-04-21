<?php

declare(strict_types=1);

namespace App\Commands\Auth;

use App\Commands\SafeBaseCommand;
use App\Services\AuthBaselineService;
use CodeIgniter\CLI\CLI;

class SurfaceScan extends SafeBaseCommand
{
    protected $group = 'auth';
    protected $name = 'auth:surface:scan';
    protected $description = 'Scan and report auth/authz runtime surface area.';

    public function run(array $params)
    {
        $this->parseParams($params);

        $service = service('authBaseline');
        if (! $service instanceof AuthBaselineService) {
            $service = new AuthBaselineService();
        }

        $report = $service->scanSurface();

        CLI::write('Auth surface scan', 'green');
        CLI::write('AuthController: ' . ($report['active_auth_controller_namespace'] ?? 'n/a'));
        CLI::write('service("auth"): ' . ($report['service_auth_runtime'] ?? 'n/a'));
        CLI::write('service("authentication"): ' . ($report['service_authentication_runtime'] ?? 'n/a'));

        CLI::newLine();
        CLI::write('Login/Register routes: ' . count($report['active_login_register_routes'] ?? []));
        foreach (($report['active_login_register_routes'] ?? []) as $route) {
            CLI::write('- ' . ($route['method'] ?? '?') . ' ' . ($route['uri'] ?? '?'));
        }

        CLI::write('Dashboard redirect routes: ' . count($report['dashboard_redirect_routes'] ?? []));
        foreach (($report['dashboard_redirect_routes'] ?? []) as $route) {
            CLI::write('- ' . ($route['method'] ?? '?') . ' ' . ($route['uri'] ?? '?'));
        }

        CLI::write('Filters touching auth/dashboard: ' . count($report['filters_touching_auth_and_dashboard'] ?? []));

        $outPath = ROOTPATH . 'docs/_baseline/auth/current/surface.scan.runtime.json';
        if (! is_dir(dirname($outPath))) {
            mkdir(dirname($outPath), 0775, true);
        }
        file_put_contents($outPath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        CLI::write('Saved: docs/_baseline/auth/current/surface.scan.runtime.json');

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
