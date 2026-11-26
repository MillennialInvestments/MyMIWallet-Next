<?php

declare(strict_types=1);

namespace App\Services\Options;

use DateTimeImmutable;

/**
 * Options Campaign Accounting Engine.
 *
 * Implements deterministic multi-leg campaign grouping, cash-recovery tracking,
 * fee-adjusted P&L accounting, and residual runner valuation.
 *
 * Invariant: An economically funded residual option is NEVER reported as risk-free.
 */
class OptionsCampaignManager
{
    /**
     * Compute comprehensive 12-metric campaign accounting.
     *
     * @param array{
     *   campaign_id?: string,
     *   ticker: string,
     *   strategy: string,
     *   legs: list<array{
     *     leg_id?: string|int,
     *     leg_type: string, // 'call' | 'put'
     *     strike: float,
     *     expiry: string,
     *     contracts_bought: int,
     *     entry_price: float, // price per share, e.g. 0.42 ($42/contract)
     *     multiplier?: int, // default 100
     *     open_fee?: float,
     *     contracts_sold?: int,
     *     exit_price?: float,
     *     close_fee?: float,
     *     current_bid?: float
     *   }>
     * } $campaign
     * @return array
     */
    public function calculateCampaign(array $campaign): array
    {
        $ticker   = strtoupper(trim((string) ($campaign['ticker'] ?? 'UNKNOWN')));
        $strategy = (string) ($campaign['strategy'] ?? 'custom');
        $legs     = (array) ($campaign['legs'] ?? []);

        $totalOriginalDebit = 0.0;
        $totalFees          = 0.0;
        $cashRecovered      = 0.0;
        $closedCostBasis    = 0.0;
        $openCostBasis      = 0.0;
        $currentLiquidation = 0.0;
        $openCalls          = 0;
        $openPuts           = 0;
        $processedLegs      = [];
        $expiries           = [];

        $now = new DateTimeImmutable();

        foreach ($legs as $idx => $leg) {
            $legType   = strtolower(trim((string) ($leg['leg_type'] ?? 'call')));
            $strike    = (float) ($leg['strike'] ?? 0.0);
            $expiry    = (string) ($leg['expiry'] ?? date('Y-m-d'));
            $multiplier= (int) ($leg['multiplier'] ?? 100);
            $bought    = max(0, (int) ($leg['contracts_bought'] ?? 0));
            $entryPr   = (float) ($leg['entry_price'] ?? 0.0);
            $openFee   = (float) ($leg['open_fee'] ?? 0.0);

            $sold      = max(0, min($bought, (int) ($leg['contracts_sold'] ?? 0)));
            $exitPr    = (float) ($leg['exit_price'] ?? 0.0);
            $closeFee  = (float) ($leg['close_fee'] ?? 0.0);
            $bid       = (float) ($leg['current_bid'] ?? $entryPr);

            $openQty = $bought - $sold;
            if ($legType === 'call') {
                $openCalls += $openQty;
            } else {
                $openPuts += $openQty;
            }

            $legOutlay = $bought * $entryPr * $multiplier;
            $legFees   = $openFee + $closeFee;
            $legCredit = $sold * $exitPr * $multiplier;

            $closedBasis = $sold * $entryPr * $multiplier;
            $openBasis   = $openQty * $entryPr * $multiplier;
            $legLiqValue = $openQty * $bid * $multiplier;

            $totalOriginalDebit += $legOutlay;
            $totalFees          += $legFees;
            $cashRecovered      += $legCredit;
            $closedCostBasis    += $closedBasis;
            $openCostBasis      += $openBasis;
            $currentLiquidation += $legLiqValue;

            $expDt = DateTimeImmutable::createFromFormat('Y-m-d', $expiry);
            $dte = $expDt ? max(0, (int) $now->diff($expDt)->format('%r%a')) : 0;
            $expiries[] = ['expiry' => $expiry, 'dte' => $dte];

            $processedLegs[] = [
                'leg_id'           => $leg['leg_id'] ?? ($idx + 1),
                'leg_type'         => $legType,
                'strike'           => $strike,
                'expiry'           => $expiry,
                'dte'              => $dte,
                'contracts_bought' => $bought,
                'contracts_sold'   => $sold,
                'contracts_open'   => $openQty,
                'entry_price'      => $entryPr,
                'exit_price'       => $exitPr,
                'current_bid'      => $bid,
                'original_debit'   => round($legOutlay, 4),
                'cash_recovered'   => round($legCredit, 4),
                'liquidation_value'=> round($legLiqValue, 4),
                'fees'             => round($legFees, 4),
            ];
        }

        // Core Accounting Metrics
        // 1. Total original premium debit
        // 2. Total commissions and fees
        // 3. Cash recovered from independently closed legs
        // 4. Remaining unrecovered net cost: max(0, (debit + fees) - recovered)
        $remainingUnrecovered = max(0.0, ($totalOriginalDebit + $totalFees) - $cashRecovered);

        // 5. Open contract quantities
        $totalOpenContracts = $openCalls + $openPuts;

        // 6. Current executable liquidation value
        // 7. Realized and unrealized P&L separately
        $realizedPnl   = $cashRecovered - $closedCostBasis;
        $unrealizedPnl = $currentLiquidation - $openCostBasis;

        // 8. Fee-adjusted campaign profit/loss
        $feeAdjustedNetPnl = ($realizedPnl + $unrealizedPnl) - $totalFees;

        // 9. Premium recovery percentage
        $recoveryPct = $totalOriginalDebit > 0
            ? min(100.0, round(($cashRecovered / $totalOriginalDebit) * 100.0, 2))
            : 0.0;

        // 10. Minimum sale proceeds needed to recover remaining cost
        $minProceedsToBreakeven = $remainingUnrecovered;

        // 11. Remaining time value and expiration exposure
        $minDte = ! empty($expiries) ? min(array_column($expiries, 'dte')) : 0;
        $maxDte = ! empty($expiries) ? max(array_column($expiries, 'dte')) : 0;

        // 12. Residual runner value and opportunity cost
        $isDebitFunded = $totalOriginalDebit > 0 && $cashRecovered >= $totalOriginalDebit;
        $isFullyCostAndFeeRecovered = $remainingUnrecovered <= 0.0;
        $hasResidualRunner = $isDebitFunded && $totalOpenContracts > 0;

        $residualAccounting = [
            'has_residual_runner'           => $hasResidualRunner,
            'is_debit_funded'               => $isDebitFunded,
            'is_fee_recovered'              => $isFullyCostAndFeeRecovered,
            'open_contracts'                => $totalOpenContracts,
            'residual_liquidation_value'    => round($currentLiquidation, 4),
            'is_literally_risk_free'        => false, // Always false per invariant
            'risk_characterization'         => $hasResidualRunner
                ? 'Economically funded (original debit fully recovered). Not risk-free: remaining contracts carry opportunity cost and total loss of current market value if expiring worthless.'
                : 'Capital at risk until remaining cost is recovered.',
            'opportunity_cost_at_risk'      => round($currentLiquidation, 4),
            'min_dte_to_expiry'             => $minDte,
            'max_dte_to_expiry'             => $maxDte,
        ];

        return [
            'ticker'                               => $ticker,
            'strategy'                             => $strategy,
            'total_original_premium_debit'         => round($totalOriginalDebit, 4),
            'total_commissions_and_fees'           => round($totalFees, 4),
            'cash_recovered'                       => round($cashRecovered, 4),
            'remaining_unrecovered_net_cost'       => round($remainingUnrecovered, 4),
            'open_contract_quantities'             => [
                'calls' => $openCalls,
                'puts'  => $openPuts,
                'total' => $totalOpenContracts,
            ],
            'current_executable_liquidation_value' => round($currentLiquidation, 4),
            'realized_pnl'                         => round($realizedPnl, 4),
            'unrealized_pnl'                       => round($unrealizedPnl, 4),
            'fee_adjusted_campaign_pnl'            => round($feeAdjustedNetPnl, 4),
            'premium_recovery_percentage'          => $recoveryPct,
            'min_sale_proceeds_to_breakeven'       => round($minProceedsToBreakeven, 4),
            'residual_runner_accounting'           => $residualAccounting,
            'legs'                                 => $processedLegs,
        ];
    }

    /**
     * Calculate campaign metrics from an OptionsPositionModel record and optional legs.
     *
     * @param array $position bf_options_positions row
     * @param array $legs list of bf_options_position_legs rows
     * @return array
     */
    public function calculateFromPosition(array $position, array $legs = []): array
    {
        $ticker = (string) ($position['ticker'] ?? 'UNKNOWN');
        $strategy = (string) ($position['strategy'] ?? 'strangle');
        $multiplier = 100;

        $campaignLegs = [];
        if (! empty($legs)) {
            foreach ($legs as $leg) {
                $status = strtolower((string) ($leg['status'] ?? 'open'));
                $qty = (int) ($leg['quantity'] ?? 1);
                $isClosed = ($status === 'closed' || $status === 'harvested');
                $campaignLegs[] = [
                    'leg_id' => $leg['id'] ?? null,
                    'leg_type' => $leg['leg_type'] ?? 'call',
                    'strike' => (float) ($leg['strike'] ?? 0.0),
                    'expiry' => (string) ($leg['expiry'] ?? ($position['expiry'] ?? date('Y-m-d'))),
                    'contracts_bought' => $qty,
                    'entry_price' => (float) ($leg['fill_price'] ?? 0.0),
                    'multiplier' => $multiplier,
                    'contracts_sold' => $isClosed ? $qty : 0,
                    'exit_price' => (float) ($leg['exit_price'] ?? 0.0),
                    'current_bid' => (float) ($leg['current_bid'] ?? $leg['fill_price'] ?? 0.0),
                ];
            }
        } else {
            $contracts = max(1, (int) ($position['contracts_count'] ?? 1));
            $debitPerPair = (float) ($position['entry_debit_per_pair'] ?? 1.90);
            $legDebit = $debitPerPair / 2.0;
            $combinedBid = (float) ($position['current_combined_bid'] ?? $debitPerPair);
            $legBid = $combinedBid / 2.0;

            if (! empty($position['call_strike'])) {
                $campaignLegs[] = [
                    'leg_id' => 'call',
                    'leg_type' => 'call',
                    'strike' => (float) $position['call_strike'],
                    'expiry' => (string) ($position['expiry'] ?? date('Y-m-d')),
                    'contracts_bought' => $contracts,
                    'entry_price' => $legDebit,
                    'multiplier' => $multiplier,
                    'contracts_sold' => 0,
                    'current_bid' => $legBid,
                ];
            }

            if (! empty($position['put_strike'])) {
                $campaignLegs[] = [
                    'leg_id' => 'put',
                    'leg_type' => 'put',
                    'strike' => (float) $position['put_strike'],
                    'expiry' => (string) ($position['expiry'] ?? date('Y-m-d')),
                    'contracts_bought' => $contracts,
                    'entry_price' => $legDebit,
                    'multiplier' => $multiplier,
                    'contracts_sold' => 0,
                    'current_bid' => $legBid,
                ];
            }
        }

        $result = $this->calculateCampaign([
            'campaign_id' => (string) ($position['trade_uuid'] ?? $position['id'] ?? uniqid('camp_')),
            'ticker' => $ticker,
            'strategy' => $strategy,
            'legs' => $campaignLegs,
        ]);

        $result['position_id'] = $position['id'] ?? null;
        $result['status'] = $position['status'] ?? 'open';

        return $result;
    }
}
