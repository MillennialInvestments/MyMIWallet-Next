<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

/**
 * Pure mathematical models for sports betting analytics:
 * - Kelly Criterion bankroll sizing (Full, Half, Quarter)
 * - Two-Way Cross-Book Arbitrage / Hedge calculation
 * - No-Vig Fair Market Odds and Expected Value (+EV) calculation
 * - Odds conversions (American, Decimal, Implied Probability)
 * - Closing Line Value (CLV) calculation
 *
 * Strictly analytical / educational mathematics. No bets are placed or brokered.
 */
final class BettingCalculators
{
    /**
     * Converts American odds (-110, +150) to Decimal odds (1.9091, 2.5000).
     */
    public static function americanToDecimal(int|float $odds): float
    {
        $odds = (float) $odds;
        if ($odds === 0.0) {
            return 1.0;
        }
        if ($odds > 0) {
            return round(1.0 + ($odds / 100.0), 4);
        }

        return round(1.0 + (100.0 / abs($odds)), 4);
    }

    /**
     * Converts Decimal odds (e.g. 1.91, 2.50) to American odds (-110, +150).
     */
    public static function decimalToAmerican(float $decimal): int
    {
        if ($decimal <= 1.0) {
            return 0;
        }
        if ($decimal >= 2.0) {
            return (int) round(($decimal - 1.0) * 100.0);
        }

        return (int) round(-100.0 / ($decimal - 1.0));
    }

    /**
     * Converts American odds to implied probability (0.0 to 1.0).
     */
    public static function americanToImpliedProb(int|float $odds): float
    {
        $odds = (float) $odds;
        if ($odds === 0.0) {
            return 0.5;
        }
        if ($odds > 0) {
            return round(100.0 / ($odds + 100.0), 4);
        }

        return round(abs($odds) / (abs($odds) + 100.0), 4);
    }

    /**
     * Total payout (stake + profit) for a winning bet.
     */
    public static function calculatePayout(float $stake, int|float $odds): float
    {
        if ($stake <= 0) {
            return 0.0;
        }
        $dec = self::americanToDecimal($odds);

        return round($stake * $dec, 2);
    }

    /**
     * Settled net P&L for a bet based on status.
     * 'won': profit (payout - stake)
     * 'lost': -stake
     * 'push', 'cashed_out': 0.00 or custom settled amount
     */
    public static function calculatePnl(float $stake, int|float $odds, string $status, ?float $customSettled = null): float
    {
        $status = strtolower(trim($status));
        return match ($status) {
            'won'        => round(self::calculatePayout($stake, $odds) - $stake, 2),
            'lost'       => round(-1.0 * abs($stake), 2),
            'push'       => 0.00,
            'cashed_out' => $customSettled !== null ? round($customSettled - $stake, 2) : 0.00,
            default      => 0.00,
        };
    }

    /**
     * Kelly Criterion Bankroll Bet Sizing.
     *
     * f* = (b * p - q) / b
     * where b = net fractional odds (decimal - 1), p = estimated win prob, q = 1 - p.
     *
     * @param float $bankroll Current available betting bankroll in dollars
     * @param int|float $odds American odds offered by bookmaker (e.g. -110 or +140)
     * @param float $winProbability Model estimated true win probability (0.00 to 1.00)
     * @param float $fraction Kelly multiplier (e.g. 0.5 for Half Kelly, 0.25 for Quarter Kelly)
     * @return array<string,mixed>
     */
    public static function kelly(float $bankroll, int|float $odds, float $winProbability, float $fraction = 0.5): array
    {
        $bankroll = max(0.0, $bankroll);
        $p = max(0.0, min(1.0, $winProbability));
        $q = 1.0 - $p;
        $dec = self::americanToDecimal($odds);
        $b = max(0.0001, $dec - 1.0); // net odds

        // Raw Kelly fraction
        $fStar = ($b * $p - $q) / $b;
        $hasEdge = $fStar > 0.0;

        $fullPct = max(0.0, $fStar * 100.0);
        $halfPct = max(0.0, ($fStar * 0.5) * 100.0);
        $quarterPct = max(0.0, ($fStar * 0.25) * 100.0);

        $fraction = max(0.01, min(1.0, $fraction));
        $recPct = max(0.0, ($fStar * $fraction) * 100.0);
        $recStake = round(($bankroll * ($recPct / 100.0)), 2);

        // Expected Value (% of stake) = (p * b - q)
        $evPct = round(($p * $b - $q) * 100.0, 2);

        // Implied market prob
        $impliedProb = self::americanToImpliedProb($odds);
        $edgeVsMarket = round(($p - $impliedProb) * 100.0, 2);

        // Expected geometric growth rate
        $growthRate = 0.0;
        if ($hasEdge && $fStar < 1.0) {
            $growthRate = round(($p * log(1.0 + $b * $fStar) + $q * log(max(0.0001, 1.0 - $fStar))), 4);
        }

        return [
            'has_edge'           => $hasEdge,
            'win_probability'    => round($p, 4),
            'implied_prob'       => round($impliedProb, 4),
            'edge_vs_market_pct' => $edgeVsMarket,
            'expected_value_pct' => $evPct,
            'full_kelly_pct'     => round($fullPct, 2),
            'half_kelly_pct'     => round($halfPct, 2),
            'quarter_kelly_pct'  => round($quarterPct, 2),
            'recommended_pct'    => round($recPct, 2),
            'recommended_stake'  => $recStake,
            'bankroll'           => $bankroll,
            'fraction_used'      => $fraction,
            'expected_growth'    => $growthRate,
        ];
    }

    /**
     * Two-Way Arbitrage / Risk-Free Hedge Calculator.
     *
     * Evaluates if two opposing bookmaker lines create an arbitrage opportunity.
     * Optimal stake allocation guarantees identical payout regardless of outcome.
     *
     * @param float $totalStake Total capital to distribute across both books
     * @param int|float $oddsA American odds at Sportsbook A
     * @param int|float $oddsB American odds at Sportsbook B
     * @return array<string,mixed>
     */
    public static function arbitrage(float $totalStake, int|float $oddsA, int|float $oddsB): array
    {
        $totalStake = max(0.0, $totalStake);
        $decA = self::americanToDecimal($oddsA);
        $decB = self::americanToDecimal($oddsB);

        $invA = 1.0 / max(1.0001, $decA);
        $invB = 1.0 / max(1.0001, $decB);
        $marketMargin = $invA + $invB; // If < 1.0, arb exists!

        $isArbitrage = $marketMargin < 1.0;
        $marginPct = round((1.0 - $marketMargin) * 100.0, 2);
        $vigPct = round(($marketMargin - 1.0) * 100.0, 2);

        // Optimal stake weighting
        $stakeA = round($totalStake * ($invA / $marketMargin), 2);
        $stakeB = round($totalStake - $stakeA, 2);

        $payoutA = round($stakeA * $decA, 2);
        $payoutB = round($stakeB * $decB, 2);
        $minPayout = min($payoutA, $payoutB);
        $profit = round($minPayout - $totalStake, 2);
        $roiPct = $totalStake > 0.0 ? round(($profit / $totalStake) * 100.0, 2) : 0.0;

        return [
            'is_arbitrage'       => $isArbitrage,
            'market_margin'      => round($marketMargin, 4),
            'arbitrage_edge_pct' => $marginPct,
            'market_vig_pct'     => $vigPct,
            'total_stake'        => $totalStake,
            'stake_a'            => $stakeA,
            'stake_b'            => $stakeB,
            'payout_a'           => $payoutA,
            'payout_b'           => $payoutB,
            'guaranteed_payout'  => $minPayout,
            'guaranteed_profit'  => $profit,
            'roi_pct'            => $roiPct,
            'dec_a'              => $decA,
            'dec_b'              => $decB,
        ];
    }

    /**
     * No-Vig (Fair Market Odds) and Expected Value (+EV) Calculator.
     *
     * Removes bookmaker overround from a two-way market to reveal true fair probability.
     *
     * @param int|float $oddsA American odds for Outcome A
     * @param int|float $oddsB American odds for Outcome B
     * @param float|null $modelWinProb Optional model-projected probability for Outcome A (0.0 to 1.0)
     * @return array<string,mixed>
     */
    public static function noVig(int|float $oddsA, int|float $oddsB, ?float $modelWinProb = null): array
    {
        $probA = self::americanToImpliedProb($oddsA);
        $probB = self::americanToImpliedProb($oddsB);

        $sumProb = $probA + $probB;
        $vigPct = round(($sumProb - 1.0) * 100.0, 2);

        // Fair probabilities
        $fairProbA = round($probA / max(0.0001, $sumProb), 4);
        $fairProbB = round($probB / max(0.0001, $sumProb), 4);

        $fairDecA = round(1.0 / max(0.0001, $fairProbA), 4);
        $fairDecB = round(1.0 / max(0.0001, $fairProbB), 4);

        $fairOddsA = self::decimalToAmerican($fairDecA);
        $fairOddsB = self::decimalToAmerican($fairDecB);

        $evPct = 0.0;
        $modelEdge = 0.0;
        if ($modelWinProb !== null) {
            $p = max(0.0, min(1.0, $modelWinProb));
            $decA = self::americanToDecimal($oddsA);
            $b = $decA - 1.0;
            $evPct = round(($p * $b - (1.0 - $p)) * 100.0, 2);
            $modelEdge = round(($p - $fairProbA) * 100.0, 2);
        }

        return [
            'market_vig_pct' => $vigPct,
            'implied_prob_a' => $probA,
            'implied_prob_b' => $probB,
            'fair_prob_a'    => $fairProbA,
            'fair_prob_b'    => $fairProbB,
            'fair_odds_a'    => $fairOddsA,
            'fair_odds_b'    => $fairOddsB,
            'has_model_prob' => $modelWinProb !== null,
            'model_prob_a'   => $modelWinProb !== null ? round($modelWinProb, 4) : null,
            'model_edge_pct' => $modelEdge,
            'ev_pct'         => $evPct,
        ];
    }

    /**
     * Closing Line Value (CLV) Edge.
     * Evaluates beating the closing line: ((Closing Implied / Taken Implied) - 1) * 100
     */
    public static function clvEdge(int|float $takenOdds, int|float $closingOdds): float
    {
        $takenProb = self::americanToImpliedProb($takenOdds);
        $closingProb = self::americanToImpliedProb($closingOdds);

        if ($takenProb <= 0.0) {
            return 0.0;
        }

        // If you took +150 (implied 40%) and it closed at +110 (implied 47.6%), your CLV is positive!
        return round((($closingProb / $takenProb) - 1.0) * 100.0, 2);
    }
}
