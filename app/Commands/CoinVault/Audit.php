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
            'Admin/CoinVault',
            'Projects',
            'Project/(:num)',
            'Contributions',
            'Payouts',
            'Wallet/(:num)',
            'API/CoinVault',
            'contributionEvent',
            'approveContribution/(:num)',
            'rejectContribution/(:num)',
            'requestPayout',
            'approvePayout/(:num)',
            'rejectPayout/(:num)',
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
            $checks[] = [
                'check' => 'db_table_or_mapping:' . $key . ':' . $info['table'],
                'ok' => ! empty($info['exists']),
                'warning' => null,
            ];
        }

        foreach ($service->solanaIntegrationMap() as $method => $mapping) {
            $checks[] = ['check' => 'solana_mapping:' . $method, 'ok' => $mapping !== ''];
        }

        $externalService = file_get_contents(APPPATH . 'Modules/CoinVault/Services/ExternalContributionService.php') ?: '';
        $vaultService = file_get_contents(APPPATH . 'Modules/CoinVault/Services/CoinVaultService.php') ?: '';
        $config = file_get_contents(APPPATH . 'Config/CoinVault.php') ?: '';

        $checks[] = ['check' => 'duplicate_contribution_prevention', 'ok' => str_contains($externalService, 'duplicate_source_event')];
        $checks[] = ['check' => 'ledger_write_path', 'ok' => str_contains($vaultService, 'CoinLedgerModel') || str_contains($vaultService, 'CoinContributionModel')];
        $checks[] = ['check' => 'admin_approval_path', 'ok' => str_contains($vaultService, 'approveContribution')];
        $checks[] = ['check' => 'uses_tbi_project_coin_registry', 'ok' => str_contains($config, 'bf_tbi_project_coins')];
        $checks[] = ['check' => 'uses_tbi_contribution_ledger', 'ok' => str_contains($config, 'bf_tbi_coin_contribution_ledger')];
        $checks[] = ['check' => 'no_unresolved_coin_vault_tables_in_config', 'ok' => ! str_contains($config, 'bf_coin_vault_')];

        $hardFailures = 0;

        foreach ($checks as $check) {
            $ok = (bool) $check['ok'];
            $warning = $check['warning'] ?? null;

            if (! $ok && ! $warning) {
                $hardFailures++;
            }

            CLI::write(
                ($ok ? '[OK] ' : ($warning ? '[WARN] ' : '[FAIL] ')) .
                $check['check'] .
                ($warning ? ' - ' . $warning : ''),
                $ok ? 'green' : ($warning ? 'yellow' : 'red')
            );
        }

        CLI::newLine();
        CLI::write('CoinVault audit completed with ' . $hardFailures . ' hard failure(s).', $hardFailures === 0 ? 'green' : 'red');

        return $hardFailures === 0 ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
