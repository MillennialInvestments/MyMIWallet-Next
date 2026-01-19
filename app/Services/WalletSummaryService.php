<?php

namespace App\Services;

use App\Libraries\MyMIBudget;
use App\Libraries\MyMIWallet;
use App\Models\AlertsModel;
use App\Models\WalletModel;
use App\Services\Fin\PositionService;
use CodeIgniter\Cache\CacheInterface;

class WalletSummaryService
{
    private WalletModel $walletModel;
    private AccountService $accountService;
    private WalletSummaryCalculator $calculator;
    private MyMIBudget $budgetLibrary;
    private MyMIWallet $walletLibrary;
    private AlertsModel $alertsModel;
    private ?CacheInterface $cache = null;

    public function __construct(
        ?WalletModel $walletModel = null,
        ?AccountService $accountService = null,
        ?WalletSummaryCalculator $calculator = null,
        ?MyMIBudget $budgetLibrary = null,
        ?MyMIWallet $walletLibrary = null,
        ?AlertsModel $alertsModel = null
    ) {
        $this->walletModel     = $walletModel     ?? new WalletModel();
        $this->accountService  = $accountService  ?? new AccountService();
        $this->calculator      = $calculator      ?? new WalletSummaryCalculator();
        $this->budgetLibrary   = $budgetLibrary   ?? new MyMIBudget();
        $this->walletLibrary   = $walletLibrary   ?? new MyMIWallet();
        $this->alertsModel     = $alertsModel     ?? new AlertsModel();
        $this->cache           = service('cache');
    }

    public function buildSummary(int $userId, bool $forceRefresh = false): array
    {
        if ($userId <= 0) {
            return [];
        }

        $cacheKey = $this->cacheKey($userId);

        if (! $forceRefresh && $this->cache) {
            $cached = $this->cache->get($cacheKey);
            if (is_array($cached)) {
                log_message('debug', '[CACHE] Dashboard cache hit', [
                    'key'     => $cacheKey,
                    'user_id' => $userId,
                ]);
                $cached['meta']['source'] = 'cache';
                return $cached;
            }
        }

        $budget = $this->getBudgetSnapshot($userId);
        $financialSummary = $this->buildFinancialSummary($budget);
        $walletSummaries  = $this->walletLibrary->getWalletSummaries($userId) ?? [];
        $wallets          = $this->walletModel->listByUser($userId, null, true);
        $accounts         = $this->getAccounts($userId);
        $positions        = PositionService::computePortfolio($userId);
        $alerts           = $this->getRecentAlerts($userId);

        $payload = [
            'meta' => [
                'userId'      => $userId,
                'generatedAt' => date(DATE_ATOM),
                'source'      => 'fresh',
                'cacheKey'    => $cacheKey,
            ],
            'budget'            => $budget,
            'financialSummary'  => $financialSummary,
            'walletSummaries'   => $walletSummaries,
            'wallets'           => $wallets,
            'accountCollections'=> $accounts,
            'positions'         => $positions,
            'alerts'            => $alerts,
        ];

        if ($this->cache) {
            $this->cache->save($cacheKey, $payload, 900);
        }

        return $payload;
    }

    private function cacheKey(int $userId): string
    {
        $key = cachekey_user('wallets:summary', $userId);
        if (function_exists('sanitizedCacheKey')) {
            return \sanitizedCacheKey($key);
        }

        return preg_replace('/[^A-Za-z0-9_\-:]/', '_', $key);
    }

    private function getBudgetSnapshot(int $userId): array
    {
        $budget = $this->budgetLibrary->getUserBudget($userId) ?? [];

        $totals = [
            'checking'        => (float) ($budget['checkingSummary'] ?? 0),
            'crypto'          => (float) ($budget['cryptoSummary'] ?? 0),
            'debt'            => max(0.0, (float) ($budget['debtSummary'] ?? 0)),
            'debtAvailable'   => (float) ($budget['debtAvailable'] ?? 0),
            'debtCreditLimit' => (float) ($budget['debtCreditLimit'] ?? 0),
            'invest'          => (float) ($budget['investSummary'] ?? 0),
            'creditAvailable' => (float) ($budget['creditAvailable'] ?? 0),
            'creditLimit'     => (float) ($budget['creditLimit'] ?? 0),
        ];

        $formatted = [];
        foreach ($totals as $key => $value) {
            $formatted[$key] = $this->formatCurrency($value);
        }

        return [
            'raw'       => $budget,
            'totals'    => $totals,
            'formatted' => $formatted,
            'meta'      => [
                'generatedAt' => date(DATE_ATOM),
                'source'      => 'fresh',
            ],
        ];
    }

    private function buildFinancialSummary(array $budgetSnapshot): array
    {
        $totals  = $budgetSnapshot['totals'] ?? [];
        $signals = [
            'thisMonthsInvestments' => (float) ($budgetSnapshot['raw']['thisMonthsInvestments'] ?? 0),
            'thisMonthsSurplus'     => (float) ($budgetSnapshot['raw']['thisMonthsSurplus'] ?? 0),
        ];

        $values = $this->calculator->calculate($totals, $signals);

        $formatted = [];
        foreach ($values as $key => $value) {
            if (is_array($value)) {
                continue;
            }
            $formatted[$key] = $this->formatCurrency($value);
        }

        if (isset($values['breakdown']) && is_array($values['breakdown'])) {
            $formatted['breakdown'] = [];
            foreach ($values['breakdown'] as $bk => $bv) {
                $formatted['breakdown'][$bk] = $this->formatCurrency($bv);
            }
        }

        return [
            'values'    => $values,
            'formatted' => $formatted,
            'asOf'      => $budgetSnapshot['meta']['generatedAt'] ?? null,
            'source'    => $budgetSnapshot['meta']['source'] ?? 'unknown',
        ];
    }

    private function getAccounts(int $userId): array
    {
        return [
            'bank'        => $this->accountService->getUserBankAccounts($userId) ?? [],
            'credit'      => $this->accountService->getUserCreditAccounts($userId) ?? [],
            'crypto'      => $this->accountService->getUserCryptoAccounts($userId) ?? [],
            'debt'        => $this->accountService->getUserDebtAccounts($userId) ?? [],
            'investment'  => $this->accountService->getUserInvestAccounts($userId) ?? [],
        ];
    }

    private function getRecentAlerts(int $userId): array
    {
        $builder = $this->alertsModel->builder()
            ->select('id, ticker, exchange, price, status, category, created_on, alert_priority, trade_type, company')
            ->where('status !=', 'Closed')
            ->orderBy('created_on', 'DESC')
            ->limit(10);

        if ($this->tableHasColumn('bf_investment_trade_alerts', 'created_by')) {
            $builder->where('created_by', $userId);
        } elseif ($this->tableHasColumn('bf_investment_trade_alerts', 'user_id')) {
            $builder->where('user_id', $userId);
        }

        return $builder->get()->getResultArray() ?? [];
    }

    private function tableHasColumn(string $table, string $column): bool
    {
        try {
            $fields = db_connect()->getFieldNames($table);
        } catch (\Throwable $e) {
            return false;
        }

        return in_array($column, $fields, true);
    }

    private function formatCurrency(float $value): string
    {
        return number_format($value, 2, '.', ',');
    }
}
