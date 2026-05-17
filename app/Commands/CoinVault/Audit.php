<?php

declare(strict_types=1);

namespace App\Commands\CoinVault;

use App\Modules\CoinVault\Services\CoinVaultService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Audit extends BaseCommand
{
    protected $group = 'CoinVault';
    protected $name = 'coinvault:audit';
    protected $description = 'Audit Coin Vault module routes, files, database mappings, and Solana integration map.';

    public function run(array $params)
    {
        $requiredFiles = [
            'app/Modules/CoinVault/Controllers/CoinVaultController.php',
            'app/Modules/CoinVault/Controllers/Api/CoinVaultApiController.php',
            'app/Modules/CoinVault/Services/CoinVaultService.php',
            'app/Modules/CoinVault/Services/ExternalContributionService.php',
            'app/Modules/CoinVault/Services/CoinRewardRuleService.php',
            'app/Modules/CoinVault/Models/CoinProjectModel.php',
            'app/Modules/CoinVault/Models/CoinWalletModel.php',
            'app/Modules/CoinVault/Models/CoinLedgerModel.php',
            'app/Modules/CoinVault/Models/CoinContributionModel.php',
            'app/Modules/CoinVault/Models/CoinPayoutRequestModel.php',
        ];
        $routesFile = APPPATH . 'Config/Routes.php';
        $routes = is_file($routesFile) ? file_get_contents($routesFile) : '';
        $requiredRoutes = [
            'Admin/CoinVault', 'Projects', 'Project/(:num)', 'Contributions', 'Payouts', 'Wallet/(:num)',
            'API/CoinVault', 'contributionEvent', 'approveContribution/(:num)', 'rejectContribution/(:num)',
            'requestPayout', 'approvePayout/(:num)', 'rejectPayout/(:num)',
        ];

        $service = new CoinVaultService();
        $checks = [];
        foreach ($requiredFiles as $file) {
            $checks[] = ['check' => 'file:' . $file, 'ok' => is_file(ROOTPATH . $file)];
        }
        foreach ($requiredRoutes as $needle) {
            $checks[] = ['check' => 'route_contains:' . $needle, 'ok' => str_contains($routes, $needle)];
        }
        foreach ($service->tableStatus() as $key => $info) {
            $checks[] = ['check' => 'db_table_or_mapping:' . $key . ':' . $info['table'], 'ok' => ! empty($info['exists']), 'warning' => empty($info['exists']) ? 'recommended table pending migration review' : null];
        }
        foreach ($service->solanaIntegrationMap() as $method => $mapping) {
            $checks[] = ['check' => 'solana_mapping:' . $method, 'ok' => $mapping !== ''];
        }
        $checks[] = ['check' => 'duplicate_contribution_prevention', 'ok' => str_contains(file_get_contents(APPPATH . 'Modules/CoinVault/Services/ExternalContributionService.php'), 'duplicate_source_event')];
        $checks[] = ['check' => 'ledger_write_path', 'ok' => str_contains(file_get_contents(APPPATH . 'Modules/CoinVault/Services/CoinVaultService.php'), 'CoinLedgerModel')];
        $checks[] = ['check' => 'admin_approval_path', 'ok' => str_contains(file_get_contents(APPPATH . 'Modules/CoinVault/Services/CoinVaultService.php'), 'approveContribution')];

        $hardFailures = 0;
        foreach ($checks as $check) {
            $ok = (bool) $check['ok'];
            $warning = $check['warning'] ?? null;
            if (! $ok && ! $warning) {
                $hardFailures++;
            }
            CLI::write(($ok ? '[OK] ' : ($warning ? '[WARN] ' : '[FAIL] ')) . $check['check'] . ($warning ? ' - ' . $warning : ''), $ok ? 'green' : ($warning ? 'yellow' : 'red'));
        }

        CLI::newLine();
        CLI::write('CoinVault audit completed with ' . $hardFailures . ' hard failure(s).', $hardFailures === 0 ? 'green' : 'red');
        return $hardFailures === 0 ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
