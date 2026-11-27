<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

/**
 * Pure math for NFL wide receiver and tight end (WR/TE) game logs:
 * tags each game with the opponent's pass/receiving defense tier and
 * builds per-tier averages for receiving yards, receptions, targets, and touchdowns.
 *
 * Tiers (32-team league):
 *   top    = pass defense rank 1-10  (hardest matchup)
 *   mid    = pass defense rank 11-22
 *   bottom = pass defense rank 23-32 (easiest matchup)
 */
final class ReceiverSplitsCalculator
{
    public const MARKETS = [
        'rec_yds',
        'receptions',
        'targets',
        'anytime_td',
    ];

    public const TIERS = ['top', 'mid', 'bottom'];

    public const TIER_LABELS = [
        'top'     => 'Top-10 pass defense',
        'mid'     => 'Middle pass defense (11-22)',
        'bottom'  => 'Bottom-10 pass defense (23-32)',
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
        if ($rank <= 22) {
            return 'mid';
        }

        return 'bottom';
    }

    /**
     * Which defensive rank drives each receiver market.
     */
    public static function rankForMarket(string $market, array $defense): ?int
    {
        $passRank = isset($defense['pass_def_rank']) && $defense['pass_def_rank'] !== null ? (int) $defense['pass_def_rank'] : null;
        $passTd   = isset($defense['pass_td_def_rank']) && $defense['pass_td_def_rank'] !== null ? (int) $defense['pass_td_def_rank'] : null;
        $rush     = isset($defense['rush_def_rank']) && $defense['rush_def_rank'] !== null ? (int) $defense['rush_def_rank'] : null;

        return match ($market) {
            'anytime_td' => $passTd ?? $passRank,
            default      => $passRank ?? $rush,
        };
    }

    public static function marketValue(string $market, array $game): float
    {
        return match ($market) {
            'rec_yds'    => (float) ($game['rec_yds'] ?? 0),
            'receptions' => (float) ($game['receptions'] ?? 0),
            'targets'    => (float) ($game['targets'] ?? 0),
            'anytime_td' => (float) (($game['rec_td'] ?? 0) + ($game['rush_td'] ?? 0)),
            default      => throw new \InvalidArgumentException('Unknown Receiver market: ' . $market),
        };
    }

    /**
     * @param list<array<string,mixed>> $games game logs
     * @param callable(array):?array $defenseLookup returns defense row for a game or null
     * @return list<array<string,mixed>> tagged games sorted oldest first
     */
    public static function tagGames(array $games, callable $defenseLookup): array
    {
        usort($games, static fn ($a, $b) => [(int) $a['season'], (int) $a['week']] <=> [(int) $b['season'], (int) $b['week']]);

        foreach ($games as &$game) {
            $defense = $defenseLookup($game) ?? [];
            $game['pass_def_rank'] = isset($defense['pass_def_rank']) ? (int) $defense['pass_def_rank'] : null;
            $game['tiers'] = [];
            foreach (self::MARKETS as $market) {
                $game['tiers'][$market] = self::tierForRank(self::rankForMarket($market, $defense));
            }
        }
        unset($game);

        return $games;
    }

    /**
     * @param list<array<string,mixed>> $taggedGames
     * @return array<string, array<string, array<string, float|int|null>>>
     */
    public static function splits(array $taggedGames): array
    {
        $out = [];
        foreach (self::MARKETS as $market) {
            $allValues = array_map(static fn ($g) => self::marketValue($market, $g), $taggedGames);
            $last5 = array_slice($allValues, -5);

            $byTier = ['top' => [], 'mid' => [], 'bottom' => [], 'unknown' => []];
            foreach ($taggedGames as $g) {
                $t = $g['tiers'][$market] ?? 'unknown';
                $byTier[$t][] = self::marketValue($market, $g);
            }

            $out[$market] = [
                'overall' => self::summary($allValues),
                'last5'   => self::summary($last5),
                'top'     => self::summary($byTier['top']),
                'mid'     => self::summary($byTier['mid']),
                'bottom'  => self::summary($byTier['bottom']),
                'unknown' => self::summary($byTier['unknown']),
            ];
        }

        return $out;
    }

    /**
     * @param list<float> $values
     * @return array{games:int, avg:?float, median:?float, stddev:?float, min:?float, max:?float}
     */
    public static function summary(array $values): array
    {
        $n = count($values);
        if ($n === 0) {
            return ['games' => 0, 'avg' => null, 'median' => null, 'stddev' => null, 'min' => null, 'max' => null];
        }
        sort($values);
        $sum = array_sum($values);
        $avg = $sum / $n;
        $mid = intdiv($n, 2);
        $median = ($n % 2 === 1) ? $values[$mid] : ($values[$mid - 1] + $values[$mid]) / 2.0;

        $variance = 0.0;
        if ($n > 1) {
            foreach ($values as $v) {
                $variance += ($v - $avg) ** 2;
            }
            $variance /= ($n - 1);
        }

        return [
            'games'  => $n,
            'avg'    => round($avg, 2),
            'median' => round($median, 2),
            'stddev' => round(sqrt($variance), 2),
            'min'    => round($values[0], 2),
            'max'    => round($values[$n - 1], 2),
        ];
    }
}
