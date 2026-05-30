<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class SolanaHealthcheck extends BaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:solana-healthcheck';
    protected $description = 'Run a safe Solana route and network health check.';
    protected $usage = 'aiops:solana-healthcheck';

    public function run(array $params)
    {
        $timestamp = date('Ymd-His');
        $reportDir = ROOTPATH . 'docs/_aiops/reports/solana-phase-03b';
        if (! is_dir($reportDir)) {
            mkdir($reportDir, 0775, true);
        }

        $routeFile = ROOTPATH . 'app/Config/Routes.php';
        $routes = is_file($routeFile) ? (string) file_get_contents($routeFile) : '';
        $healthRouteRegistered = str_contains($routes, "'health'") && str_contains($routes, 'SolanaAPIController::health');

        $networkStatus = ['status' => 'not_checked', 'healthy' => false];
        try {
            $service = service('solanaService');
            if (is_object($service) && method_exists($service, 'getSafeNetworkStatus')) {
                $networkStatus = (array) $service->getSafeNetworkStatus();
            } elseif (is_object($service) && method_exists($service, 'getNetworkStatus')) {
                $networkStatus = (array) $service->getNetworkStatus();
            }
        } catch (\Throwable $e) {
            $networkStatus = ['status' => 'error', 'healthy' => false, 'message' => $e->getMessage()];
        }

        $report = [
            '# Solana Phase 03B Healthcheck',
            '',
            '- Generated: ' . date('c'),
            '- API/Solana/health route registered: ' . ($healthRouteRegistered ? 'yes' : 'no'),
            '- Network status: `' . json_encode($networkStatus, JSON_UNESCAPED_SLASHES) . '`',
            '- Secrets printed: no',
            '',
        ];
        $reportPath = $reportDir . '/solana-healthcheck-' . $timestamp . '.md';
        file_put_contents($reportPath, implode(PHP_EOL, $report));

        CLI::write(sprintf('Solana healthcheck: route=%s report=%s', $healthRouteRegistered ? 'ok' : 'missing', str_replace(ROOTPATH, '', $reportPath)), $healthRouteRegistered ? 'green' : 'yellow');

        return $healthRouteRegistered ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
