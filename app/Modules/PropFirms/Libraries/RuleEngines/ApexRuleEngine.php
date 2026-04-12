<?php

namespace App\Modules\PropFirms\Libraries\RuleEngines;

class ApexRuleEngine implements PropFirmRuleEngineInterface
{
    public function refreshThresholds(array $account, array $ruleSet): array
    {
        $currentBalance = (float) ($account['current_balance'] ?? 0);
        $startingBalance = (float) ($ruleSet['starting_balance'] ?? 0);
        $dll = (float) ($ruleSet['daily_loss_limit'] ?? 0);
        $drawdownLimit = (float) ($ruleSet['drawdown_limit'] ?? ($ruleSet['max_drawdown'] ?? 0));

        return [
            'starting_balance' => $startingBalance,
            'current_balance' => $currentBalance,
            'min_balance_for_drawdown' => max(0.0, $startingBalance - $drawdownLimit),
            'min_balance_for_dll' => max(0.0, $currentBalance - $dll),
            'drawdown_limit' => $drawdownLimit,
            'daily_loss_limit' => $dll,
        ];
    }

    public function evaluateAccountState(array $account, array $ruleSet, array $context = []): array
    {
        $thresholds = $this->refreshThresholds($account, $ruleSet);
        $currentBalance = $thresholds['current_balance'];
        $startingBalance = $thresholds['starting_balance'];
        $remainingDrawdown = $currentBalance - $thresholds['min_balance_for_drawdown'];
        $remainingDll = $currentBalance - $thresholds['min_balance_for_dll'];

        $warnings = [];
        if ($remainingDrawdown <= 250) {
            $warnings[] = 'Approaching maximum drawdown threshold.';
        }
        if ($remainingDll <= 150) {
            $warnings[] = 'Approaching daily loss limit.';
        }

        $riskState = 'healthy';
        $breachReason = null;
        $canTrade = true;
        if ($remainingDrawdown <= 0) {
            $riskState = 'breached';
            $breachReason = 'max_drawdown_breached';
            $canTrade = false;
        } elseif ($remainingDll <= 0) {
            $riskState = 'breached';
            $breachReason = 'dll_breached';
            $canTrade = false;
        } elseif (! empty($warnings)) {
            $riskState = 'warning';
        }

        return [
            'can_trade' => $canTrade,
            'risk_state' => $riskState,
            'remaining_drawdown' => round($remainingDrawdown, 2),
            'remaining_dll' => round($remainingDll, 2),
            'max_contracts_allowed' => (int) ($context['max_contracts_allowed'] ?? 10),
            'stop_loss_required' => (bool) ($ruleSet['stop_loss_required'] ?? false),
            'warnings' => $warnings,
            'breach_reason' => $breachReason,
            'thresholds' => $thresholds,
            'pnl_total' => round($currentBalance - $startingBalance, 2),
        ];
    }

    public function checkTradeEligibility(array $account, array $ruleSet, array $tradeContext = []): array
    {
        $state = $this->evaluateAccountState($account, $ruleSet, $tradeContext);

        $requestedContracts = (int) ($tradeContext['requested_contracts'] ?? 1);
        $maxContracts = (int) $state['max_contracts_allowed'];
        if ($requestedContracts > $maxContracts) {
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
