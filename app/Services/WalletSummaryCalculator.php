<?php

namespace App\Services;

class WalletSummaryCalculator
{
    /**
     * Calculate net worth, liability totals, and related indicators.
     *
     * @param array $balances Expected keys: checking, invest, crypto, debt, creditAvailable, creditLimit
     * @param array $signals  Optional context values: thisMonthsInvestments, thisMonthsSurplus, investableToday
     */
    public function calculate(array $balances, array $signals = []): array
    {
        $checking        = (float)($balances['checking'] ?? 0.0);
        $investments     = (float)($balances['invest'] ?? $balances['investments'] ?? 0.0);
        $crypto          = (float)($balances['crypto'] ?? 0.0);
        $debtRaw         = (float)($balances['debt'] ?? 0.0);
        $creditAvailable = (float)($balances['creditAvailable'] ?? 0.0);
        $creditLimit     = (float)($balances['creditLimit'] ?? 0.0);

        $assetTotal      = $checking + $investments + $crypto;
        $liabilities     = max(0.0, $debtRaw);
        $netWorth        = $assetTotal - $liabilities;

        $investable = 0.0;
        if (array_key_exists('investableToday', $signals)) {
            $investable = (float)$signals['investableToday'];
        } elseif (array_key_exists('thisMonthsInvestments', $signals)) {
            $investable = (float)$signals['thisMonthsInvestments'];
        } elseif (array_key_exists('thisMonthsSurplus', $signals)) {
            $investable = max(0.0, (float)$signals['thisMonthsSurplus']);
        }
        $investable = max(0.0, $investable);

        $creditUtilization = 0.0;
        if ($creditLimit > 0.0) {
            $used = max(0.0, $creditLimit - $creditAvailable);
            $creditUtilization = min(1.0, $used / $creditLimit);
        }

        return [
            'netWorth'          => $netWorth,
            'totalAssets'       => $assetTotal,
            'totalLiabilities'  => $liabilities,
            'investableToday'   => $investable,
            'creditAvailable'   => $creditAvailable,
            'creditLimit'       => $creditLimit,
            'creditUtilization' => $creditUtilization,
            'debtAvailable'     => (float)($balances['debtAvailable'] ?? 0.0),
            'breakdown'         => [
                'checking'    => $checking,
                'investments' => $investments,
                'crypto'      => $crypto,
                'debt'        => $liabilities,
            ],
        ];
    }
}