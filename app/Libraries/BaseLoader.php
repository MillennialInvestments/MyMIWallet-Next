<?php

namespace App\Libraries;
use App\Libraries\MyMIUser;

use CodeIgniter\Email\Email;

/**
 * Shared loader for controllers (as a trait).
 * - DI cache to avoid recomputing services
 * - Null-safe, default-filled commonData() for layouts
 */
trait BaseLoader
{
    /** @var array<string,mixed> */
    protected array $di = [];

    /** Simple DI cache */
    protected function di(string $key, callable $factory)
    {
        if (! array_key_exists($key, $this->di)) {
            $this->di[$key] = $factory();
        }
        return $this->di[$key];
    }

    /** Preload a couple of heavy services (optional) */
    protected function initBaseLoader(): void
    {
        $this->di('MyMIMarketing', fn () => service('MyMIMarketing'));
        $this->di('email', fn () => service('email'));
    }

    // ---- Library getters ----
    protected function getMyMIWallet()       { return $this->di('MyMIWallet',      fn () => service('MyMIWallet')); }
    protected function getMyMIWallets()      { return $this->di('MyMIWallets',     fn () => service('MyMIWallets')); }
    protected function getMyMIGold()         { return $this->di('MyMIGold',        fn () => service('MyMIGold')); }
    protected function getMyMIInvestments()  { return $this->di('MyMIInvestments', fn () => service('MyMIInvestments')); }
    protected function getMyMIMarketing()    { return $this->di('MyMIMarketing',   fn () => service('MyMIMarketing')); }
    protected function getMyMIAnalytics()    { return $this->di('MyMIAnalytics',   fn () => service('MyMIAnalytics')); }

    // ---- Service getters ----
    // ---- Email ----
    protected function getEmail(): Email
    {
        /** @var Email $email */
        $email = $this->di('email', fn () => service('email'));
        return $email;
    }

    /**
     * Populate common controller/view data with SAFE defaults.
     * Children can call this via alias `commonData()` if they define their own commonData().
     */
    public function commonData(): array
    {
        // Ensure $this->data array exists in controllers that use this trait
        if (!isset($this->data) || !is_array($this->data)) {
            $this->data = [];
        }

        // ---- Current user id (null-safe) ----
        if (session()->has('user_id')) {
            $cuID = (int) session()->get('user_id');
        } elseif (function_exists('auth') && auth()->user() !== null) {
            $cuID = (int) (auth()->user()->id ?? 0);
        } else {
            $cuID = 0;
            log_message('debug', 'BaseLoader: no authenticated user; proceeding with guest defaults.');
        }
        $this->data['cuID'] = $cuID ?: null;

        // ---- Site settings & request basics ----
        $siteSettings                = config('SiteSettings');
        $this->data['siteSettings']  = $siteSettings;
        $this->data['debug']         = (int) ($siteSettings->debug ?? 0);
        $this->data['beta']          = (int) ($siteSettings->beta  ?? 0);

        // Request/Agent may not be set on CLI – guard them
        $req                         = service('request');
        $this->data['uri']           = method_exists($req, 'getUri')       ? $req->getUri()       : null;
        $this->data['userAgent']     = method_exists($req, 'getUserAgent') ? $req->getUserAgent() : null;

        // ---- User account info (null-safe) ----
        $userAccount = [];
        try {
            $userAccount = service('MyMIUser')->getUserInformation($cuID);
            if (!is_array($userAccount)) {
                $userAccount = [];
            }
        } catch (\Throwable $e) {
            log_message('error', 'BaseLoader: getUserInformation failed: ' . $e->getMessage());
        }
        $this->data['cuID'] = $cuID ?: null;

        $this->data['cuUsername']     = $userAccount['cuUsername']    ?? '';
        $this->data['cuDisplayName']  = $userAccount['cuDisplayName'] ?? '';
        $this->data['cuEmail']        = $userAccount['cuEmail']       ?? '';
        $this->data['cuRole']         = $userAccount['cuRole']        ?? '';
        $this->data['cuKYC']          = $userAccount['cuKYC']         ?? '';
        $this->data['cuUserType']     = $userAccount['cuUserType']    ?? '';
        $this->data['cuWalletID']     = $userAccount['cuWalletID']    ?? '';
        $this->data['cuWalletCount']  = (int) ($userAccount['cuWalletCount'] ?? 0);
        $this->data['MyMIGCoinSum']   = (float)($userAccount['MyMIGCoinSum'] ?? 0);
        $this->data['walletID']       = $userAccount['walletID']      ?? '';

        // ---- Solana info (null-safe) ----
        $solanaData = [];
        try {
            $solanaData = $this->getSolanaService()->getSolanaData($cuID);
            if (!is_array($solanaData)) {
                $solanaData = [];
            }
        } catch (\Throwable $e) {
            log_message('error', 'BaseLoader: getSolanaData failed: ' . $e->getMessage());
        }
        $userSol = $solanaData['userSolanaWallets'] ?? [];
        $this->data['cuSolanaDW']          = $userSol['cuSolanaDW']   ?? null;
        $this->data['cuSolanaTotal']       = (float)($userSol['cuSolanaTotal'] ?? 0);
        $this->data['cuSolanaValue']       = (float)($userSol['cuSolanaValue'] ?? 0);
        $this->data['solanaNetworkStatus'] = $solanaData['solanaNetworkStatus'] ?? 'Unknown';

        // ---- Dashboard info (null-safe) ----
        $dashboard = [];
        try {
            $dashboard = $this->getMyMIDashboard()->dashboardInfo($cuID);
            if (!is_array($dashboard)) {
                $dashboard = [];
            }
        } catch (\Throwable $e) {
            log_message('error', 'BaseLoader: dashboardInfo failed: ' . $e->getMessage());
        }

        $progress = $dashboard['progressGoalData'] ?? [];
        $this->data['progressGoalData']   = is_array($progress) ? $progress : [];
        $this->data['completedGoals']     = is_array($progress['completions'] ?? null) ? $progress['completions'] : [];
        $this->data['pendingGoals']       = is_array($progress['goals'] ?? null)       ? $progress['goals']       : [];
        $this->data['promotionalBanners'] = is_array($dashboard['promotionalBanners'] ?? null) ? $dashboard['promotionalBanners'] : [];

        // ---- Budget info (null-safe) ----
        $budget = [];
        try {
            $budget = $this->getBudgetService()->getUserBudget($cuID);
            if (!is_array($budget)) {
                $budget = [];
            }
        } catch (\Throwable $e) {
            log_message('error', 'BaseLoader: getUserBudget failed: ' . $e->getMessage());
        }

        $this->data['userBudget']        = $budget;
        $this->data['userBudgetRecords'] = $budget['records'] ?? [];
        $checking                        = (float)($budget['checkingSummary'] ?? 0);
        $this->data['checkingSummary']   = $checking;

        // ---- Credit / Debt / Balances (null-safe) ----
        $creditAccounts = $debtAccounts = [];
        try {
            $creditAccounts = $this->getAccountService()->getUserCreditAccounts($cuID) ?? [];
            $debtAccounts   = $this->getAccountService()->getUserDebtAccounts($cuID)   ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'BaseLoader: account service failed: ' . $e->getMessage());
        }

        $repaymentSchedules = [];
        try {
            $repaymentSchedules = $this->getBudgetService()->calculateRepaymentSchedules($creditAccounts) ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'BaseLoader: calculateRepaymentSchedules failed: ' . $e->getMessage());
        }

        $currentBalances   = [];
        $availableBalances = [];
        $totalAvailable    = 0.0;
        try {
            $currentBalances   = $this->getBudgetService()->getCurrentBalances($creditAccounts)        ?? [];
            $availableBalances = $this->getBudgetService()->getAvailableBalances($repaymentSchedules)  ?? [];
            $totalAvailable    = (float)($this->getBudgetService()->getTotalAvailableBalance($debtAccounts) ?? 0);
        } catch (\Throwable $e) {
            log_message('error', 'BaseLoader: balance helpers failed: ' . $e->getMessage());
        }

        $this->data['repaymentSummary']     = $this->getBudgetService()->getRepaymentSummary($cuID) ?? [];
        $this->data['repaymentSchedules']   = $repaymentSchedules;
        $this->data['currentBalances']      = $currentBalances;
        $this->data['availableBalances']    = $availableBalances;
        $this->data['totalAvailableBalance']= $totalAvailable;

        // ---- Totals used by some layouts; set safe defaults ----
        $totalAccountBalance = 0.0;
        // If you want, add other components into the total here (e.g. $currentBalances sums)
        $totalAccountBalance += $checking;

        $this->data['totalAccountBalance']     = $totalAccountBalance;
        $this->data['totalAccountBalanceFMT']  = number_format($totalAccountBalance, 2);

        // ---- Unified current balance (SSOT) ----
        try {
            $this->data['balance'] = $this->getMyMIAnalytics()->getCurrentBalance($cuID);
        } catch (\Throwable $e) {
            log_message('error', 'BaseLoader: getCurrentBalance failed: ' . $e->getMessage());
            $this->data['balance'] = [
                'amount'     => 0.0,
                'currency'   => 'USD',
                'components' => [],
                'asOf'       => date('Y-m-d H:i:s'),
                'mode'       => 'net-liquid',
            ];
        }

        return $this->data;
    }
}
