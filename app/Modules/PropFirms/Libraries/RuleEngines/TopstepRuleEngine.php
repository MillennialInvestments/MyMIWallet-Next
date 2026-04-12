<?php

namespace App\Modules\PropFirms\Libraries\RuleEngines;

class TopstepRuleEngine implements PropFirmRuleEngineInterface
{
    public function refreshThresholds(array $account, array $ruleSet): array
    {
        $currentBalance = (float) ($account['current_balance'] ?? 0);
        $startingBalance = (float) ($ruleSet['starting_balance'] ?? 0);
        $dll = (float) ($ruleSet['daily_loss_limit'] ?? 0);
        $drawdownLimit = (float) ($ruleSet['drawdown_limit'] ?? ($ruleSet['max_drawdown'] ?? 0));
        $consistencyPercent = (float) ($ruleSet['consistency_percent'] ?? 0);

        return [
            'starting_balance' => $startingBalance,
            'current_balance' => $currentBalance,
            'min_balance_for_drawdown' => max(0.0, $startingBalance - $drawdownLimit),
            'min_balance_for_dll' => max(0.0, $currentBalance - $dll),
            'drawdown_limit' => $drawdownLimit,
            'daily_loss_limit' => $dll,
            'consistency_percent' => $consistencyPercent,
        ];
    }

    public function evaluateAccountState(array $account, array $ruleSet, array $context = []): array
    {
        $thresholds = $this->refreshThresholds($account, $ruleSet);
        $currentBalance = $thresholds['current_balance'];
        $startingBalance = $thresholds['starting_balance'];
        $pnlTotal = $currentBalance - $startingBalance;
        $remainingDrawdown = $currentBalance - $thresholds['min_balance_for_drawdown'];
        $remainingDll = $currentBalance - $thresholds['min_balance_for_dll'];

        $largestWinningDay = (float) ($context['largest_winning_day'] ?? 0);
        $consistencyPercent = (float) $thresholds['consistency_percent'];
        $consistencyCap = $pnlTotal > 0 ? $pnlTotal * ($consistencyPercent / 100) : 0;
        $consistencyBreach = $pnlTotal > 0 && $consistencyPercent > 0 && $largestWinningDay > $consistencyCap;

        $warnings = [];
        if ($remainingDrawdown <= 250) {
            $warnings[] = 'Approaching trailing drawdown threshold.';
        }
        if ($remainingDll <= 150) {
            $warnings[] = 'Approaching daily loss limit.';
        }
        if ($consistencyBreach) {
            $warnings[] = 'Profit consistency threshold exceeded.';
        }

        $riskState = 'healthy';
        $breachReason = null;
        $canTrade = true;
        if ($remainingDrawdown <= 0) {
            $riskState = 'breached';
            $breachReason = 'trailing_drawdown_breached';
            $canTrade = false;
        } elseif ($remainingDll <= 0) {
            $riskState = 'breached';
            $breachReason = 'dll_breached';
            $canTrade = false;
        } elseif ($consistencyBreach) {
            $riskState = 'warning';
        } elseif (! empty($warnings)) {
            $riskState = 'warning';
        }

        return [
            'can_trade' => $canTrade,
            'risk_state' => $riskState,
            'remaining_drawdown' => round($remainingDrawdown, 2),
            'remaining_dll' => round($remainingDll, 2),
            'max_contracts_allowed' => (int) ($context['max_contracts_allowed'] ?? 5),
            'stop_loss_required' => (bool) ($ruleSet['stop_loss_required'] ?? false),
            'warnings' => $warnings,
            'breach_reason' => $breachReason,
            'thresholds' => $thresholds,
            'pnl_total' => round($pnlTotal, 2),
            'consistency_cap' => round($consistencyCap, 2),
        ];
    }

    public function checkTradeEligibility(array $account, array $ruleSet, array $tradeContext = []): array
    {
        $state = $this->evaluateAccountState($account, $ruleSet, $tradeContext);

        $requestedContracts = (int) ($tradeContext['requested_contracts'] ?? 1);
        if ($requestedContracts > (int) $state['max_contracts_allowed']) {
            $state['can_trade'] = false;
            $state['risk_state'] = 'breached';
            $state['breach_reason'] = 'max_contracts_exceeded';
            $state['warnings'][] = 'Requested contracts exceed allowed maximum.';
        }

        if ($state['stop_loss_required'] && empty($tradeContext['has_stop_loss'])) {
            $state['can_trade'] = false;
            $state['risk_state'] = 'breached';
            $state['breach_reason'] = 'stop_loss_required';
            $state['warnings'][] = 'Stop-loss must be attached before submitting this trade.';
        }

        return $state;
    }
}
