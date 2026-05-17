<?php

declare(strict_types=1);

namespace App\Modules\CoinVault\Controllers;

use App\Controllers\BaseAdminController;
use App\Modules\CoinVault\Models\CoinContributionModel;
use App\Modules\CoinVault\Models\CoinPayoutRequestModel;
use App\Modules\CoinVault\Models\CoinProjectModel;
use App\Modules\CoinVault\Models\CoinWalletModel;
use App\Modules\CoinVault\Services\CoinVaultService;
use CodeIgniter\HTTP\ResponseInterface;

class CoinVaultController extends BaseAdminController
{
    protected CoinVaultService $coinVault;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->coinVault = new CoinVaultService();
    }

    public function index()
    {
        if ($guard = $this->requireAdminAccess()) {
            return $guard;
        }
        return $this->renderTheme('App\Modules\CoinVault\Views\dashboard', [
            'layout' => 'dashboard',
            'pageTitle' => 'Coin Vault | Admin | MyMI Wallet',
            ...$this->coinVault->getDashboardData(),
        ]);
    }

    public function projects()
    {
        return $this->index();
    }

    public function project(int $id)
    {
        if ($guard = $this->requireAdminAccess()) {
            return $guard;
        }
        $project = $this->coinVault->hasRequiredTables(['projects']) ? (new CoinProjectModel())->find($id) : null;
        return $this->renderTheme('App\Modules\CoinVault\Views\project', [
            'layout' => 'dashboard',
            'pageTitle' => 'Coin Vault Project',
            'project' => $project,
            'table_status' => $this->coinVault->tableStatus(),
        ]);
    }

    public function contributions()
    {
        if ($guard = $this->requireAdminAccess()) {
            return $guard;
        }
        $rows = $this->coinVault->hasRequiredTables(['contributions']) ? (new CoinContributionModel())->orderBy('created_at', 'DESC')->findAll(100) : [];
        return $this->renderTheme('App\Modules\CoinVault\Views\contributions', ['layout' => 'dashboard', 'pageTitle' => 'Coin Vault Contributions', 'contributions' => $rows, 'table_status' => $this->coinVault->tableStatus()]);
    }

    public function payouts()
    {
        if ($guard = $this->requireAdminAccess()) {
            return $guard;
        }
        $rows = $this->coinVault->hasRequiredTables(['payouts']) ? (new CoinPayoutRequestModel())->orderBy('created_at', 'DESC')->findAll(100) : [];
        return $this->renderTheme('App\Modules\CoinVault\Views\payouts', ['layout' => 'dashboard', 'pageTitle' => 'Coin Vault Payouts', 'payouts' => $rows, 'table_status' => $this->coinVault->tableStatus()]);
    }

    public function wallet(int $id)
    {
        if ($guard = $this->requireAdminAccess()) {
            return $guard;
        }
        $wallet = $this->coinVault->hasRequiredTables(['wallets']) ? (new CoinWalletModel())->find($id) : null;
        return $this->renderTheme('App\Modules\CoinVault\Views\wallet', ['layout' => 'dashboard', 'pageTitle' => 'Coin Vault Wallet', 'wallet' => $wallet, 'table_status' => $this->coinVault->tableStatus()]);
    }
}
