<?php

namespace App\Services;

class WalletSummaryCalculator
{
    /**
     * Calculate net worth, liability totals, credit utilization, and wallet indicators.
     *
     * Expected $balances keys:
     * checking, invest, investments, crypto, debt, creditAvailable, creditLimit,
     * debtAvailable, debtCreditLimit
     *
     * Optional $signals keys:
     * thisMonthsInvestments, thisMonthsSurplus, investableToday
     */
    public function calculate(array $balances, array $signals = []): array
    {
        $checking        = $this->money($balances['checking'] ?? 0.0);
        $investments     = $this->money($balances['invest'] ?? $balances['investments'] ?? 0.0);
        $crypto          = $this->money($balances['crypto'] ?? 0.0);
        $debtRaw         = $this->money($balances['debt'] ?? 0.0);
        $debtAvailable   = $this->money($balances['debtAvailable'] ?? 0.0);
        $debtCreditLimit = $this->money($balances['debtCreditLimit'] ?? 0.0);
        $creditAvailable = $this->money($balances['creditAvailable'] ?? 0.0);
        $creditLimit     = $this->money($balances['creditLimit'] ?? 0.0);

        $liquidAssets    = $checking;
        $investedAssets  = $investments + $crypto;
        $assetTotal      = $liquidAssets + $investedAssets;
        $liabilities     = max(0.0, $debtRaw);
        $netWorth        = $assetTotal - $liabilities;

        $investable = 0.0;

        if (array_key_exists('investableToday', $signals)) {
            $investable = $this->money($signals['investableToday']);
        } elseif (array_key_exists('thisMonthsInvestments', $signals)) {
            $investable = $this->money($signals['thisMonthsInvestments']);
        } elseif (array_key_exists('thisMonthsSurplus', $signals)) {
            $investable = max(0.0, $this->money($signals['thisMonthsSurplus']));
        }

        $investable = max(0.0, $investable);

        $creditUsed = 0.0;
        $creditUtilization = 0.0;

        if ($creditLimit > 0.0) {
            $creditUsed = max(0.0, $creditLimit - $creditAvailable);
            $creditUtilization = min(1.0, $creditUsed / $creditLimit);
        }

        $debtUtilization = 0.0;

        if ($debtCreditLimit > 0.0) {
            $debtUsed = max(0.0, $debtCreditLimit - $debtAvailable);
            $debtUtilization = min(1.0, $debtUsed / $debtCreditLimit);
        }

        $assetToDebtRatio = $liabilities > 0.0
            ? $assetTotal / $liabilities
            : ($assetTotal > 0.0 ? 999.0 : 0.0);

        return [
            'netWorth'              => $netWorth,
            'totalAssets'           => $assetTotal,
            'liquidAssets'          => $liquidAssets,
            'investedAssets'        => $investedAssets,
            'totalLiabilities'      => $liabilities,
            'investableToday'       => $investable,

            'creditAvailable'       => $creditAvailable,
            'creditLimit'           => $creditLimit,
            'creditUsed'            => $creditUsed,
            'creditUtilization'     => $creditUtilization,
            'creditUtilizationPct'  => $creditUtilization * 100,

            'debtAvailable'         => $debtAvailable,
            'debtCreditLimit'       => $debtCreditLimit,
            'debtUtilization'       => $debtUtilization,
            'debtUtilizationPct'    => $debtUtilization * 100,

            'assetToDebtRatio'      => $assetToDebtRatio,

            'breakdown' => [
                'checking'    => $checking,
                'investments' => $investments,
                'crypto'      => $crypto,
                'debt'        => $liabilities,
            ],
        ];
    }

    private function money($value): float
    {
        if (is_string($value)) {
            $value = str_replace([',', '$', ' '], '', $value);
        }

        return is_numeric($value) ? (float) $value : 0.0;
    }
}