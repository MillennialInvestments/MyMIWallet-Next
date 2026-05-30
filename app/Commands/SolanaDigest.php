<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class SolanaDigest extends BaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:solana-digest';
    protected $description = 'Summarize current Solana Exchange routes, files, and status.';
    protected $usage = 'aiops:solana-digest';

    public function run(array $params)
    {
        $timestamp = date('Ymd-His');
        $reportDir = ROOTPATH . 'docs/_aiops/reports/solana-phase-03b';
        if (! is_dir($reportDir)) {
            mkdir($reportDir, 0775, true);
        }

        $routeFile = ROOTPATH . 'app/Config/Routes.php';
        $routes = is_file($routeFile) ? file($routeFile, FILE_IGNORE_NEW_LINES) : [];
        $solanaRoutes = [];
        foreach ($routes as $line) {
            if (str_contains($line, 'SolanaController::') || str_contains($line, 'SolanaAPIController::') || str_contains($line, 'API/Solana') || str_contains($line, 'Exchange/Solana')) {
                $solanaRoutes[] = trim($line);
            }
        }

        $keyEndpoints = ['API/Solana/health', 'API/Solana/wallet/(:segment)/balance', 'API/Solana/wallet/(:segment)/tokens', 'Exchange/Solana'];
        $files = [
            'app/Modules/APIs/Controllers/SolanaAPIController.php',
            'app/Modules/Exchange/Controllers/SolanaController.php',
            'app/Libraries/MyMISolana.php',
            'app/Services/SolanaService.php',
            'app/Models/SolanaModel.php',
            'app/Services/TbiProjectCoinService.php',
            'app/Models/TbiProjectCoinModel.php',
        ];

        $report = [
            '# Solana Phase 03B Digest',
            '',
            '- Generated: ' . date('c'),
            '- Solana route/controller line count: ' . count($solanaRoutes),
            '- Key endpoints: ' . implode(', ', $keyEndpoints),
            '',
            '## Files',
        ];
        foreach ($files as $file) {
            $report[] = '- ' . $file . ': ' . (is_file(ROOTPATH . $file) ? 'present' : 'missing');
        }
        $report[] = '';
        $report[] = '## Route Lines';
        foreach ($solanaRoutes as $route) {
            $report[] = '- `' . str_replace('`', '\`', $route) . '`';
        }

        $reportPath = $reportDir . '/solana-digest-' . $timestamp . '.md';
        file_put_contents($reportPath, implode(PHP_EOL, $report) . PHP_EOL);

        CLI::write(sprintf('Solana digest: routes=%d report=%s', count($solanaRoutes), str_replace(ROOTPATH, '', $reportPath)), 'green');
        return EXIT_SUCCESS;
    }
}
