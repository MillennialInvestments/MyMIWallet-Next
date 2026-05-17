<?php

declare(strict_types=1);

namespace App\Modules\CoinVault\Services;

class CoinRewardRuleService
{
    public function calculate(array $contribution, ?array $project = null): float
    {
        $config = config('CoinVault');
        $rules = $config->defaultRewardRules;
        $type = strtolower((string) ($contribution['contribution_type'] ?? ''));

        if (in_array($type, ['cash', 'expense', 'expense_contribution'], true)) {
            return round((float) ($contribution['usd_amount'] ?? 0) * (float) $rules['cash_coin_per_usd'], 8);
        }

        if (in_array($type, ['hour', 'hourly', 'hourly_contribution'], true)) {
            $usd = (float) ($contribution['hours'] ?? 0) * (float) $rules['hourly_rate_usd'];
            return round($usd * (float) $rules['cash_coin_per_usd'], 8);
        }

        if (in_array($type, ['task', 'task_reward', 'task_mining'], true)) {
            $tasks = (float) ($contribution['task_count'] ?? 0);
            return round($tasks / max(1, (float) $rules['task_count_per_coin']), 8);
        }

        return round((float) ($contribution['usd_amount'] ?? 0), 8);
    }

    public function ledgerTypeForContribution(string $type): string
    {
        return match (strtolower($type)) {
            'cash', 'expense', 'expense_contribution' => 'expense_contribution',
            'hour', 'hourly', 'hourly_contribution' => 'hourly_contribution',
            'testing', 'testing_reward' => 'testing_reward',
            'approval', 'approval_reward' => 'approval_reward',
            'in_app', 'in_app_credit' => 'in_app_credit',
            default => 'task_reward',
        };
    }
}
