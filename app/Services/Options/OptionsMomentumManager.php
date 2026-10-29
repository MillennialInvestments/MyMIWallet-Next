<?php

declare(strict_types=1);

namespace App\Services\Options;

use App\Models\Options\OptionsExitAlertModel;
use App\Models\Options\OptionsPositionHistoryModel;
use App\Models\Options\OptionsPositionLegModel;
use App\Models\Options\OptionsPositionModel;
use App\Services\Notifications\DiscordNotifier;

class OptionsMomentumManager
{
    public function __construct(
        private readonly OptionsPositionModel $positionModel,
        private readonly OptionsPositionLegModel $legModel,
        private readonly OptionsPositionHistoryModel $historyModel,
        private readonly OptionsExitAlertModel $exitAlertModel,
        private readonly ?DiscordNotifier $discord = null,
    ) {
    }

    /**
     * Evaluate all active positions and generate necessary exit warnings.
     */
    public function evaluateAllActive(string $timestamp = ''): array
    {
        $timestamp = $timestamp !== '' ? $timestamp : date('Y-m-d H:i:s');
        $activePositions = $this->positionModel->getActivePositions();
        $evaluated = [];
        $alertsGenerated = [];

        foreach ($activePositions as $position) {
            $res = $this->evaluatePosition($position, $timestamp);
            $evaluated[] = $res;
            if (! empty($res['alerts'])) {
                $alertsGenerated = array_merge($alertsGenerated, $res['alerts']);
            }
        }

        return [
            'evaluated_at' => $timestamp,
            'active_count' => count($activePositions),
            'evaluated_count' => count($evaluated),
            'alerts_generated' => count($alertsGenerated),
            'positions' => $evaluated,
            'alerts' => $alertsGenerated,
        ];
    }

    /**
     * Evaluate a single options position against momentum exit criteria.
     * Enforces stale quote guards and whole-position liquidation math for unequal contracts.
     */
    public function evaluatePosition(array $position, string $timestamp = '', array $context = []): array
    {
        $timestamp = $timestamp !== '' ? $timestamp : date('Y-m-d H:i:s');
        $positionId = (int) $position['id'];
        $legs = $this->legModel->getLegsForPosition($positionId);

        $callBid = null;
        $putBid = null;
        $callQuantity = 1;
        $putQuantity = 1;
        $hasCallLeg = false;
        $hasPutLeg = false;

        foreach ($legs as $leg) {
            if ($leg['leg_type'] === 'call') {
                $hasCallLeg = true;
                if (isset($leg['current_bid']) && $leg['current_bid'] !== null && (float) $leg['current_bid'] > 0) {
                    $callBid = (float) $leg['current_bid'];
                }
                $callQuantity = (int) ($leg['quantity'] ?? 1);
            } elseif ($leg['leg_type'] === 'put') {
                $hasPutLeg = true;
                if (isset($leg['current_bid']) && $leg['current_bid'] !== null && (float) $leg['current_bid'] > 0) {
                    $putBid = (float) $leg['current_bid'];
                }
                $putQuantity = (int) ($leg['quantity'] ?? 1);
            }
        }

        $quotesAvailable = ($hasCallLeg ? $callBid !== null : true)
            && ($hasPutLeg ? $putBid !== null : true)
            && ($hasCallLeg || $hasPutLeg);

        // STALE / UNKNOWN QUOTE GUARD:
        // Do not fall back to fill price or fabricate current P&L. Stale/missing marks cannot trigger profit alerts.
        if (! $quotesAvailable) {
            $newStatus = ($position['status'] ?? 'open') === 'open' ? 'warning_quote_stale' : (string) ($position['status'] ?? 'open');
            $this->positionModel->update($positionId, [
                'status' => $newStatus,
                'updated_at' => $timestamp,
            ]);

            return [
                'position_id' => $positionId,
                'ticker' => $position['ticker'],
                'strategy' => $position['strategy'],
                'quote_status' => 'stale_or_unavailable',
                'combined_bid' => null,
                'unrealized_pnl' => null,
                'peak_pnl' => (float) ($position['peak_unrealized_pnl'] ?? 0.0),
                'status' => $newStatus,
                'alerts' => [],
            ];
        }

        $multiplier = 100.0;
        $combinedBid = ($callBid ?? 0.0) + ($putBid ?? 0.0);
        $currentValue = (($callBid ?? 0.0) * $multiplier * $callQuantity) + (($putBid ?? 0.0) * $multiplier * $putQuantity);

        $contracts = (int) ($position['contracts_count'] ?? max($callQuantity, $putQuantity));
        $totalDebit = (float) ($position['total_entry_debit'] ?? ($combinedBid * $multiplier * $contracts));
        $unrealizedPnl = round($currentValue - $totalDebit, 2);

        $targetProfit = (float) ($position['target_net_profit'] ?? 200.0);
        $targetLiquidationTotal = $totalDebit + $targetProfit;
        $targetExitPerPair = (float) ($position['target_combined_exit'] ?? ($targetLiquidationTotal / max(1, $contracts) / $multiplier));
        $peakPnl = max((float) ($position['peak_unrealized_pnl'] ?? 0.0), $unrealizedPnl);

        $alerts = [];
        $newStatus = (string) ($position['status'] ?? 'open');
        $riskFlag = 'normal';

        // 1. Profit Target Reached (Relies on entire position executable liquidation value, valid for unequal contracts)
        if ($currentValue >= $targetLiquidationTotal || $unrealizedPnl >= $targetProfit) {
            $newStatus = 'target_reached';
            $riskFlag = 'take_profit';
            $alerts[] = $this->createExitAlert($positionId, $position['ticker'], [
                'alert_type' => 'profit_target_reached',
                'severity' => 'action_required',
                'recommended_action' => 'take_profit',
                'current_profit' => $unrealizedPnl,
                'target_profit' => $targetProfit,
                'summary' => sprintf(
                    'PROFIT TARGET REACHED: %s combined liquidation value reached $%.2f (outlay: $%.2f, net profit: +$%.2f vs target +$%.2f). Lock in full gains.',
                    $position['ticker'],
                    $currentValue,
                    $totalDebit,
                    $unrealizedPnl,
                    $targetProfit
                ),
                'now' => $timestamp,
            ]);
        }
        // 2. Peak-Profit Trailing Warning
        elseif ($peakPnl >= 100.0 && $unrealizedPnl < ($peakPnl * 0.70)) {
            $newStatus = 'warning_trailing';
            $riskFlag = 'peak_drawdown';
            $alerts[] = $this->createExitAlert($positionId, $position['ticker'], [
                'alert_type' => 'peak_profit_trailing',
                'severity' => 'warning',
                'recommended_action' => 'tighten_stop',
                'current_profit' => $unrealizedPnl,
                'target_profit' => $targetProfit,
                'summary' => sprintf(
                    'TRAILING PROFIT WARNING: %s retraced from peak profit +$%.2f down to +$%.2f (>30%% drop from peak). Tighten stop or trim dominant leg.',
                    $position['ticker'],
                    $peakPnl,
                    $unrealizedPnl
                ),
                'now' => $timestamp,
            ]);
        }
        // 3. Theta Decay / Expiration Cutoff Warning (Regular Market Close 16:00:00 US Eastern)
        elseif (! empty($position['expiry'])) {
            try {
                $nyTz = new \DateTimeZone('America/New_York');
                $expiryDateTime = new \DateTimeImmutable($position['expiry'] . ' 16:00:00', $nyTz);
                $currentDateTime = new \DateTimeImmutable($timestamp, $nyTz);
                $hoursRemaining = ($expiryDateTime->getTimestamp() - $currentDateTime->getTimestamp()) / 3600.0;
            } catch (\Throwable) {
                $hoursRemaining = (strtotime($position['expiry'] . ' 16:00:00') - strtotime($timestamp)) / 3600.0;
            }

            if ($hoursRemaining > 0 && $hoursRemaining <= 24.0 && $unrealizedPnl < ($targetProfit * 0.5)) {
                $newStatus = 'warning_theta';
                $riskFlag = 'theta_warning';
                $alerts[] = $this->createExitAlert($positionId, $position['ticker'], [
                    'alert_type' => 'theta_decay_cutoff',
                    'severity' => 'warning',
                    'recommended_action' => 'close_both',
                    'current_profit' => $unrealizedPnl,
                    'target_profit' => $targetProfit,
                    'summary' => sprintf(
                        'EXPIRATION THETA CUTOFF: %s has only %.1f hours to expiry with combined bid $%.2f. Risk of rapid time-decay collapse.',
                        $position['ticker'],
                        $hoursRemaining,
                        $combinedBid
                    ),
                    'now' => $timestamp,
                ]);
            }
        }

        // Update position records
        $this->positionModel->update($positionId, [
            'current_combined_bid' => $combinedBid,
            'current_combined_value' => $currentValue,
            'current_unrealized_pnl' => $unrealizedPnl,
            'peak_unrealized_pnl' => $peakPnl,
            'status' => $newStatus,
            'updated_at' => $timestamp,
        ]);

        // Record history snapshot with provenance / context metrics
        $this->historyModel->insert([
            'position_id' => $positionId,
            'stock_price' => (float) ($position['entry_stock_price'] ?? 0),
            'call_bid' => $callBid,
            'put_bid' => $putBid,
            'combined_bid' => $combinedBid,
            'unrealized_pnl' => $unrealizedPnl,
            'rvol' => isset($context['rvol']) ? (float) $context['rvol'] : null,
            'momentum_score' => isset($context['momentum_score']) ? (float) $context['momentum_score'] : null,
            'risk_flag' => $riskFlag,
            'recorded_at' => $timestamp,
        ]);

        return [
            'position_id' => $positionId,
            'ticker' => $position['ticker'],
            'strategy' => $position['strategy'],
            'quote_status' => 'fresh',
            'combined_bid' => $combinedBid,
            'current_value' => $currentValue,
            'unrealized_pnl' => $unrealizedPnl,
            'peak_pnl' => $peakPnl,
            'status' => $newStatus,
            'alerts' => $alerts,
        ];
    }

    /**
     * Process an external signal (e.g. from TradingView or momentum indicators).
     */
    public function handleMomentumSignal(int $positionId, string $signalType, array $payload = []): array
    {
        $position = $this->positionModel->find($positionId);
        if (! $position) {
            return ['status' => 'error', 'message' => 'Position not found'];
        }

        $now = date('Y-m-d H:i:s');
        $ticker = (string) $position['ticker'];
        $unrealizedPnl = (float) ($position['current_unrealized_pnl'] ?? 0.0);
        $targetProfit = (float) ($position['target_net_profit'] ?? 200.0);

        if ($signalType === 'momentum_weakening') {
            $this->positionModel->update($positionId, [
                'status' => 'warning_momentum',
                'updated_at' => $now,
            ]);

            $alert = $this->createExitAlert($positionId, $ticker, [
                'alert_type' => 'momentum_weakening',
                'severity' => 'warning',
                'recommended_action' => 'trim_leg',
                'current_profit' => $unrealizedPnl,
                'target_profit' => $targetProfit,
                'summary' => sprintf(
                    'TRADINGVIEW MOMENTUM WEAKENING: %s momentum fading (RVOL/velocity dropping below threshold). Recommend taking partial profit or preparing exit.',
                    $ticker
                ),
                'now' => $now,
            ]);

            return ['status' => 'ok', 'action' => 'warning_generated', 'alert' => $alert];
        }

        if ($signalType === 'target_reached') {
            $this->positionModel->update($positionId, [
                'status' => 'target_reached',
                'updated_at' => $now,
            ]);

            $alert = $this->createExitAlert($positionId, $ticker, [
                'alert_type' => 'profit_target_reached',
                'severity' => 'action_required',
                'recommended_action' => 'take_profit',
                'current_profit' => $unrealizedPnl,
                'target_profit' => $targetProfit,
                'summary' => sprintf('TRADINGVIEW TARGET REACHED: %s hit the profit target.', $ticker),
                'now' => $now,
            ]);

            return ['status' => 'ok', 'action' => 'target_alert_generated', 'alert' => $alert];
        }

        return ['status' => 'ok', 'action' => 'signal_logged'];
    }

    /**
     * Calculate theoretical expiration stock price targets for an options position.
     * Supports unequal contract quantities (v7 specification).
     *
     * Total outlay = multiplier * (call_contracts * call_debit + put_contracts * put_debit) + fees.
     * Target liquidation = outlay + target_profit.
     * Call target stock = call_strike + (target_liquidation / (call_contracts * multiplier)).
     * Put target stock  = put_strike  - (target_liquidation / (put_contracts  * multiplier)).
     */
    public function calculateExpirationTargets(
        float $callStrike,
        float $putStrike,
        int $callContracts,
        int $putContracts,
        float $callDebit = 0.95,
        float $putDebit = 0.95,
        float $targetProfit = 200.0,
        int $multiplier = 100,
        float $fees = 0.0
    ): array {
        $callOutlay = $callContracts * $callDebit * $multiplier;
        $putOutlay  = $putContracts  * $putDebit  * $multiplier;
        $outlay     = $callOutlay + $putOutlay + $fees;
        $targetLiquidation = $outlay + $targetProfit;

        $callTarget = $callContracts > 0 ? ($callStrike + ($targetLiquidation / ($callContracts * $multiplier))) : 0.0;
        $putTarget  = $putContracts  > 0 ? ($putStrike  - ($targetLiquidation / ($putContracts  * $multiplier))) : 0.0;

        return [
            'call_contracts' => $callContracts,
            'put_contracts' => $putContracts,
            'call_debit' => $callDebit,
            'put_debit' => $putDebit,
            'multiplier' => $multiplier,
            'fees' => round($fees, 4),
            'outlay' => round($outlay, 4),
            'target_profit' => round($targetProfit, 4),
            'target_liquidation' => round($targetLiquidation, 4),
            'call_strike' => $callStrike,
            'put_strike' => $putStrike,
            'call_expiration_target' => round($callTarget, 4),
            'put_expiration_target' => round($putTarget, 4),
        ];
    }

    /**
     * Open a simulated/paper two-sided position (independent contract quantities or target balance).
     */
    public function openSimulatedPosition(
        string $ticker,
        float $callDebit = 0.95,
        float $putDebit = 0.95,
        int $contracts = 1,
        float $stockPrice = 142.50,
        int $dte = 5,
        ?float $callStrike = null,
        ?float $putStrike = null,
        ?float $callTargetBalance = null,
        ?float $putTargetBalance = null,
        ?string $strategy = null,
        ?int $contractsCall = null,
        ?int $contractsPut = null,
        float $targetProfit = 200.0,
        float $fees = 0.0
    ): array {
        $ticker = strtoupper($ticker);
        $now = date('Y-m-d H:i:s');
        $expiry = date('Y-m-d', strtotime("+{$dte} days"));

        $stepSize = $stockPrice > 250.0 ? 5.0 : ($stockPrice > 50.0 ? 1.0 : 0.5);
        $atmStrike = round($stockPrice / $stepSize) * $stepSize;

        if ($strategy === 'straddle') {
            $callStrike = ($callStrike !== null && $callStrike > 0) ? $callStrike : $atmStrike;
            $putStrike  = ($putStrike !== null && $putStrike > 0) ? $putStrike : $atmStrike;
            $strategyName = 'long_straddle';
        } else {
            // Default: OTM Strangle (Call above stock, Put below stock)
            $defaultCall = round(($stockPrice * 1.04) / $stepSize) * $stepSize;
            $defaultPut  = round(($stockPrice * 0.96) / $stepSize) * $stepSize;
            $callStrike = ($callStrike !== null && $callStrike > 0) ? $callStrike : $defaultCall;
            $putStrike  = ($putStrike !== null && $putStrike > 0) ? $putStrike : $defaultPut;
            $strategyName = ($callStrike != $putStrike) ? 'long_strangle' : 'long_straddle';
        }

        // Independent contract count resolution (v7 priority, fallback to target balance or fixed contracts)
        if ($contractsCall !== null && $contractsPut !== null) {
            $contracts = max($contractsCall, $contractsPut);
        } elseif ($callTargetBalance !== null && $putTargetBalance !== null) {
            $contractsCall = max(1, (int) round($callTargetBalance / ($callDebit * 100.0)));
            $contractsPut  = max(1, (int) round($putTargetBalance / ($putDebit * 100.0)));
            $contracts     = max($contractsCall, $contractsPut);
        } else {
            $contractsCall = $contracts;
            $contractsPut  = $contracts;
        }

        $multiplier = 100.0;
        $combinedDebit = $callDebit + $putDebit; // e.g. $1.90
        $totalDebit = ($contractsCall * $callDebit * $multiplier) + ($contractsPut * $putDebit * $multiplier) + $fees;
        $targetLiquidation = $totalDebit + $targetProfit;
        $targetExitPerPair = ($contractsCall + $contractsPut) > 0
            ? round(($targetLiquidation / (($contractsCall + $contractsPut) / 2.0)) / $multiplier, 4)
            : ($combinedDebit + ($targetProfit / ($multiplier * max(1, $contracts))));

        $callExpiryTarget = $contractsCall > 0 ? round($callStrike + ($targetLiquidation / ($contractsCall * $multiplier)), 4) : 0.0;
        $putExpiryTarget  = $contractsPut  > 0 ? round($putStrike  - ($targetLiquidation / ($contractsPut  * $multiplier)), 4) : 0.0;
        $uuid = sprintf('opt-%s-%s-%s', strtolower($ticker), date('Ymd-His'), bin2hex(random_bytes(4)));

        $positionId = (int) $this->positionModel->insert([
            'trade_uuid' => $uuid,
            'ticker' => $ticker,
            'strategy' => $strategyName,
            'expiry' => $expiry,
            'contracts_count' => $contracts,
            'call_strike' => $callStrike,
            'put_strike' => $putStrike,
            'entry_stock_price' => $stockPrice,
            'entry_debit_per_pair' => $combinedDebit,
            'total_entry_debit' => $totalDebit,
            'target_net_profit' => $targetProfit,
            'target_combined_exit' => $targetExitPerPair,
            'current_combined_bid' => $combinedDebit,
            'current_combined_value' => $totalDebit,
            'current_unrealized_pnl' => 0.0,
            'peak_unrealized_pnl' => 0.0,
            'status' => 'open',
            'entry_at' => $now,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Create Call Leg
        $this->legModel->insert([
            'position_id' => $positionId,
            'leg_type' => 'call',
            'contract_symbol' => sprintf('%s-%s-C%.0f', $ticker, date('ymd', strtotime($expiry)), $callStrike),
            'strike' => $callStrike,
            'expiry' => $expiry,
            'quantity' => $contractsCall,
            'fill_price' => $callDebit,
            'current_bid' => $callDebit,
            'current_ask' => $callDebit * 1.03,
            'current_iv' => 0.4200,
            'delta' => 0.5000,
            'gamma' => 0.0350,
            'theta' => -0.1200,
            'vega' => 0.1800,
            'status' => 'open',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Create Put Leg
        $this->legModel->insert([
            'position_id' => $positionId,
            'leg_type' => 'put',
            'contract_symbol' => sprintf('%s-%s-P%.0f', $ticker, date('ymd', strtotime($expiry)), $putStrike),
            'strike' => $putStrike,
            'expiry' => $expiry,
            'quantity' => $contractsPut,
            'fill_price' => $putDebit,
            'current_bid' => $putDebit,
            'current_ask' => $putDebit * 1.03,
            'current_iv' => 0.4200,
            'delta' => -0.5000,
            'gamma' => 0.0350,
            'theta' => -0.1200,
            'vega' => 0.1800,
            'status' => 'open',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Record Initial History
        $this->historyModel->insert([
            'position_id' => $positionId,
            'stock_price' => $stockPrice,
            'call_bid' => $callDebit,
            'put_bid' => $putDebit,
            'combined_bid' => $combinedDebit,
            'unrealized_pnl' => 0.0,
            'rvol' => 1.5,
            'momentum_score' => 70.0,
            'risk_flag' => 'entry',
            'recorded_at' => $now,
        ]);

        return [
            'position_id' => $positionId,
            'trade_uuid' => $uuid,
            'ticker' => $ticker,
            'strategy' => $strategyName,
            'call_strike' => $callStrike,
            'put_strike' => $putStrike,
            'call_expiration_target' => $callExpiryTarget,
            'put_expiration_target' => $putExpiryTarget,
            'strike' => $atmStrike,
            'expiry' => $expiry,
            'contracts' => $contracts,
            'contracts_call' => $contractsCall,
            'contracts_put' => $contractsPut,
            'combined_debit' => $combinedDebit,
            'total_debit' => $totalDebit,
            'target_profit' => $targetProfit,
            'target_liquidation' => $targetLiquidation,
            'target_exit_per_pair' => $targetExitPerPair,
            'status' => 'open',
        ];
    }

    private function createExitAlert(int $positionId, string $ticker, array $data): array
    {
        $alertId = (int) $this->exitAlertModel->insert([
            'position_id' => $positionId,
            'ticker' => $ticker,
            'alert_type' => $data['alert_type'],
            'severity' => $data['severity'] ?? 'warning',
            'recommended_action' => $data['recommended_action'] ?? 'take_profit',
            'current_profit' => (float) ($data['current_profit'] ?? 0.0),
            'target_profit' => (float) ($data['target_profit'] ?? 200.0),
            'summary' => (string) ($data['summary'] ?? ''),
            'notified_discord' => 0,
            'notified_email' => 0,
            'status' => 'pending',
            'created_at' => $data['now'] ?? date('Y-m-d H:i:s'),
        ]);

        if ($this->discord !== null) {
            try {
                $this->discord->dispatch('options.exit_warning', [
                    'ticker' => $ticker,
                    'alert_type' => $data['alert_type'],
                    'summary' => $data['summary'],
                    'profit' => $data['current_profit'],
                ]);
                $this->exitAlertModel->update($alertId, [
                    'notified_discord' => 1,
                    'status' => 'dispatched',
                    'dispatched_at' => date('Y-m-d H:i:s'),
                ]);
            } catch (\Throwable) {
                // Ignore Discord dispatch exceptions in offline/mock runs
            }
        }

        return [
            'id' => $alertId,
            'ticker' => $ticker,
            'type' => $data['alert_type'],
            'action' => $data['recommended_action'],
            'summary' => $data['summary'],
        ];
    }
}
