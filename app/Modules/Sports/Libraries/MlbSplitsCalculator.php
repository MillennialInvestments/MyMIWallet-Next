<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

/**
 * Pure math and statistical distributions for MLB Baseball analytics:
 * - Pitcher Strikeout & Outs Recorded splits vs opponent K-rate tiers (Top 10 swing-and-miss vs Bottom 10 contact)
 * - Batter Total Bases, Hits, and Hits+Runs+RBIs vs pitcher handedness (LHP vs RHP splits)
 * - Ballpark dimension and altitude adjustments (e.g. Coors Field altitude effect)
 * - First 5 Innings (F5) win probabilities & fair totals model.
 */
final class MlbSplitsCalculator
{
    public const PITCHER_MARKETS = [
        'strikeouts'    => 'Pitcher Strikeouts',
        'outs_recorded' => 'Outs Recorded',
        'hits_allowed'  => 'Hits Allowed',
        'earned_runs'   => 'Earned Runs',
        'walks'         => 'Walks Allowed',
    ];

    public const BATTER_MARKETS = [
        'total_bases' => 'Total Bases',
        'hits'        => 'Hits',
        'runs_rbis'   => 'Runs + RBIs',
        'home_runs'   => 'Home Runs',
        'strikeouts'  => 'Batter Strikeouts',
    ];

    public const TIERS = ['top', 'mid', 'bottom'];

    public const TIER_LABELS = [
        'top'     => 'Top 10 (High Strikeout / High Suppression)',
        'mid'     => 'Mid 10 (Neutral Matchup 11-20)',
        'bottom'  => 'Bottom 10 (Contact Heavy / Favorable 21-30)',
        'unknown' => 'Rank unknown',
    ];

    public static function tierForRank(?int $rank): string
    {
        if ($rank === null || $rank < 1) {
            return 'unknown';
        }
        if ($rank <= 10) {
            return 'top';
        }
        if ($rank <= 20) {
            return 'mid';
        }

        return 'bottom';
    }

    /**
     * Resolves value of a pitcher market from a game log row.
     *
     * @param array<string,mixed> $game
     */
    public static function pitcherMarketValue(string $market, array $game): float
    {
        $ip = (float) ($game['ip'] ?? 0);
        $ks = (float) ($game['strikeouts'] ?? 0);
        $hits = (float) ($game['hits_allowed'] ?? 0);
        $er = (float) ($game['er'] ?? 0);
        $bb = (float) ($game['walks'] ?? 0);

        // Outs recorded: 6.0 IP = 18 outs; 6.1 IP = 19 outs; 6.2 IP = 20 outs
        $wholeInnings = (int) floor($ip);
        $fractional = round(($ip - $wholeInnings) * 10);
        $outs = (float) ($wholeInnings * 3 + $fractional);

        return match ($market) {
            'strikeouts'    => $ks,
            'outs_recorded' => $outs,
            'hits_allowed'  => $hits,
            'earned_runs'   => $er,
            'walks'         => $bb,
            default         => throw new \InvalidArgumentException('Unknown MLB pitcher market: ' . $market),
        };
    }

    /**
     * Resolves value of a batter market from a game log row.
     *
     * @param array<string,mixed> $game
     */
    public static function batterMarketValue(string $market, array $game): float
    {
        $hits = (float) ($game['hits'] ?? 0);
        $tb = (float) ($game['total_bases'] ?? 0);
        if ($tb === 0.0 && $hits > 0.0) {
            $tb = (float) ($hits + (int) ($game['doubles'] ?? 0) + 2 * (int) ($game['triples'] ?? 0) + 3 * (int) ($game['home_runs'] ?? 0));
        }
        $runs = (float) ($game['runs'] ?? 0);
        $rbi = (float) ($game['rbi'] ?? 0);
        $hr = (float) ($game['home_runs'] ?? 0);
        $ks = (float) ($game['strikeouts'] ?? 0);

        return match ($market) {
            'total_bases' => $tb,
            'hits'        => $hits,
            'runs_rbis'   => $runs + $rbi,
            'home_runs'   => $hr,
            'strikeouts'  => $ks,
            default       => throw new \InvalidArgumentException('Unknown MLB batter market: ' . $market),
        };
    }

    /**
     * Adjusts a projection based on ballpark run factors and altitude.
     */
    public static function ballparkAdjust(float $baseMetric, float $parkRunFactor, int $altitudeFeet = 0): float
    {
        $altitudeFactor = 1.0 + (max(0, $altitudeFeet - 1000) / 10000.0) * 0.08;
        $totalFactor = $parkRunFactor * $altitudeFactor;

        return round($baseMetric * $totalFactor, 2);
    }

    /**
     * Computes First 5 Innings (F5) implied moneyline win probability and expected total runs.
     * Uses FIP (Fielding Independent Pitching) / ERA proxies.
     *
     * @return array{team_a_prob: float, team_b_prob: float, f5_total_runs: float, edge_pick: string}
     */
    public static function f5Projection(float $teamA_fip, float $teamB_fip, float $parkFactor = 1.0, bool $teamA_home = true): array
    {
        $homeAdvantage = $teamA_home ? 0.20 : -0.20;
        // League avg F5 runs per team is ~2.3 runs
        $teamA_expRuns = max(0.8, (2.3 * ($teamB_fip / 4.10) * $parkFactor) + ($homeAdvantage * 0.5));
        $teamB_expRuns = max(0.8, (2.3 * ($teamA_fip / 4.10) * $parkFactor) - ($homeAdvantage * 0.5));

        $totalRuns = round($teamA_expRuns + $teamB_expRuns, 2);

        // Bill James Pythagorean expectation (exponent 1.83 for baseball)
        $exp = 1.83;
        $aPow = pow($teamA_expRuns, $exp);
        $bPow = pow($teamB_expRuns, $exp);
        $probA = round($aPow / max(0.001, $aPow + $bPow), 3);
        $probB = round(1.0 - $probA, 3);

        $edge = $probA >= 0.55 ? 'Team A F5 ML' : ($probB >= 0.55 ? 'Team B F5 ML' : 'No Clear F5 Edge');

        return [
            'team_a_prob'     => $probA,
            'team_b_prob'     => $probB,
            'f5_total_runs'   => $totalRuns,
            'edge_pick'       => $edge,
        ];
    }

    /**
     * Aggregates pitcher game logs into tier splits and overall averages.
     *
     * @param list<array<string,mixed>> $games
     * @return array<string,array<string,mixed>>
     */
    public static function pitcherSplits(array $games): array
    {
        $result = [];
        foreach (array_keys(self::PITCHER_MARKETS) as $market) {
            $allValues = [];
            $byTier = ['top' => [], 'mid' => [], 'bottom' => [], 'unknown' => []];

            foreach ($games as $g) {
                $val = self::pitcherMarketValue($market, $g);
                $allValues[] = $val;
                $oppRank = isset($g['opp_k_rate_rank']) ? (int) $g['opp_k_rate_rank'] : null;
                $tier = self::tierForRank($oppRank);
                $byTier[$tier][] = $val;
            }

            $result[$market] = [
                'overall' => self::calcStats($allValues),
                'top'     => self::calcStats($byTier['top']),
                'mid'     => self::calcStats($byTier['mid']),
                'bottom'  => self::calcStats($byTier['bottom']),
            ];
        }

        return $result;
    }

    /**
     * Aggregates batter game logs into platoon splits (vs LHP vs vs RHP).
     *
     * @param list<array<string,mixed>> $games
     * @return array<string,array<string,mixed>>
     */
    public static function batterSplits(array $games): array
    {
        $result = [];
        foreach (array_keys(self::BATTER_MARKETS) as $market) {
            $allValues = [];
            $vsLhp = [];
            $vsRhp = [];

            foreach ($games as $g) {
                $val = self::batterMarketValue($market, $g);
                $allValues[] = $val;
                $hand = strtoupper((string) ($g['opp_pitcher_hand'] ?? 'R'));
                if ($hand === 'L') {
                    $vsLhp[] = $val;
                } else {
                    $vsRhp[] = $val;
                }
            }

            $result[$market] = [
                'overall' => self::calcStats($allValues),
                'vs_lhp'  => self::calcStats($vsLhp),
                'vs_rhp'  => self::calcStats($vsRhp),
            ];
        }

        return $result;
    }

    /**
     * @param list<float> $values
     * @return array{count: int, avg: float, std: float, min: float, max: float}
     */
    public static function calcStats(array $values): array
    {
        $n = count($values);
        if ($n === 0) {
            return ['count' => 0, 'avg' => 0.0, 'std' => 0.0, 'min' => 0.0, 'max' => 0.0];
        }

        $sum = array_sum($values);
        $avg = round($sum / $n, 2);

        $variance = 0.0;
        foreach ($values as $v) {
            $variance += pow($v - $avg, 2);
        }
        $std = $n > 1 ? round(sqrt($variance / ($n - 1)), 2) : 0.0;

        return [
            'count' => $n,
            'avg'   => $avg,
            'std'   => $std,
            'min'   => round(min($values), 2),
            'max'   => round(max($values), 2),
        ];
    }
}
