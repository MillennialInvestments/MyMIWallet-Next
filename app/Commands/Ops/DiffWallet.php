<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class DiffWallet extends SafeBaseCommand
{
    protected $group = 'Ops';
    protected $name = 'ops:diff:wallet';
    protected $description = 'Run wallet-specific diff governance check.';

    public function run(array $params)
    {
        $serviceLive = 'app/Services/WalletService.php';
        $controllerLive = 'app/Modules/User/Controllers/WalletsController.php';

        $patchBase = 'docs/Github/temporary/phase1_wallet_hardening/';

        CLI::write("Running wallet diff check...", 'yellow');

        passthru("php spark ops:diff {$serviceLive} {$patchBase}WalletService.php --label=wallet_guard");
        passthru("php spark ops:diff {$controllerLive} {$patchBase}WalletsController.php --label=wallet_guard");

        CLI::write("Wallet diff guard completed.", 'green');
    }
}