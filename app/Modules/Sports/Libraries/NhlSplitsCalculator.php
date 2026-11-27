<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

/**
 * Pure math and statistical distributions for NHL Hockey analytics:
 * - Skater Shots on Goal (SOG), Points, Goals, Assists vs opponent shot suppression tiers
 * - Goalie Saves, Goals Against (GA), and Save % vs opposing team shot generation pace
 * - Power Play (PP) vs Penalty Kill (PK) special teams net edge.
 */
final class NhlSplitsCalculator
{
    public const SKATER_MARKETS = [
        'shots_on_goal'    => 'Shots on Goal (SOG)',
        'points'           => 'Points (G+A)',
        'goals'            => 'Goals Scored',
        'assists'          => 'Assists',
        'powerplay_points' => 'Power Play Points',
        'blocked_shots'    => 'Blocked Shots',
    ];

    public const GOALIE_MARKETS = [
        'saves'         => 'Goalie Saves',
        'goals_against' => 'Goals Against (GA)',
        'shots_faced'   => 'Shots Faced',
    ];

    public const TIERS = ['top', 'mid', 'bottom'];

    public const TIER_LABELS = [
        'top'     => 'Top 10 Defense (Low SOG / Tough Matchup)',
        'mid'     => 'Mid 10 Defense (Neutral 11-20)',
        'bottom'  => 'Bottom 10 Defense (High SOG Allowed 21-32)',
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
     * Resolves value of a skater market from a game log row.
     *
     * @param array<string,mixed> $game
     */
    public static function skaterMarketValue(string $market, array $game): float
    {
        $sog = (float) ($game['shots_on_goal'] ?? 0);
        $goals = (float) ($game['goals'] ?? 0);
        $assists = (float) ($game['assists'] ?? 0);
        $pts = (float) ($game['points'] ?? ($goals + $assists));
        $ppp = (float) ($game['powerplay_points'] ?? 0);
        $blocks = (float) ($game['blocked_shots'] ?? 0);

        return match ($market) {
            'shots_on_goal'    => $sog,
            'points'           => $pts,
            'goals'            => $goals,
            'assists'          => $assists,
            'powerplay_points' => $ppp,
            'blocked_shots'    => $blocks,
            default            => throw new \InvalidArgumentException('Unknown NHL skater market: ' . $market),
        };
    }

    /**
     * Resolves value of a goalie market from a game log row.
     *
     * @param array<string,mixed> $game
     */
    public static function goalieMarketValue(string $market, array $game): float
    {
        $saves = (float) ($game['saves'] ?? 0);
        $ga = (float) ($game['goals_against'] ?? 0);
        $shots = (float) ($game['shots_faced'] ?? ($saves + $ga));

        return match ($market) {
            'saves'         => $saves,
            'goals_against' => $ga,
            'shots_faced'   => $shots,
            default         => throw new \InvalidArgumentException('Unknown NHL goalie market: ' . $market),
        };
    }

    /**
     * Computes special teams mismatch score between Team A's Power Play (PP%)
     * and Team B's Penalty Kill (PK%).
     *
     * @return array{special_teams_edge: float, verdict: string}
     */
    public static function specialTeamsEdge(float $teamA_ppPct, float $teamB_pkPct): array
    {
        // League avg PP is ~21%, league avg PK is ~79% (sum = 100%)
        // If PP + (100 - PK) > 42%, offensive special teams has positive expected value
        $powerPlayAdvantage = ($teamA_ppPct + (100.0 - $teamB_pkPct)) - 42.0;
        $edge = round($powerPlayAdvantage, 1);

        $verdict = match (true) {
            $edge >= 5.0  => 'Strong Power Play Advantage (+EV PP Props)',
            $edge <= -5.0 => 'Elite Penalty Kill Suppression (-EV PP Props)',
            default       => 'Neutral Special Teams Matchup',
        };

        return [
            'special_teams_edge' => $edge,
            'verdict'            => $verdict,
        ];
    }

    /**
     * Aggregates skater game logs into defensive tier splits.
     *
     * @param list<array<string,mixed>> $games
     * @param array<string,array<string,mixed>> $defByTeam
     * @return array<string,array<string,mixed>>
     */
    public static function skaterSplits(array $games, array $defByTeam = []): array
    {
        $result = [];
        foreach (array_keys(self::SKATER_MARKETS) as $market) {
            $allValues = [];
            $byTier = ['top' => [], 'mid' => [], 'bottom' => [], 'unknown' => []];

            foreach ($games as $g) {
                $val = self::skaterMarketValue($market, $g);
                $allValues[] = $val;

                $opp = strtoupper(trim((string) ($g['opponent'] ?? '')));
                $oppDef = $defByTeam[$opp] ?? [];
                $rank = isset($oppDef['sog_def_rank']) ? (int) $oppDef['sog_def_rank'] : null;
                $tier = self::tierForRank($rank);
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
