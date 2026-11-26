<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

/**
 * Pure math for running back game logs: tags each game with the opponent's
 * defensive tier and builds per-tier averages for rushing, receiving and
 * combined yards. No database or HTTP access, so it is fully unit-testable.
 *
 * Tiers (32-team league):
 *   top    = defense rank 1-10  (hardest matchup)
 *   mid    = defense rank 11-22
 *   bottom = defense rank 23-32 (easiest matchup)
 */
final class RbSplitsCalculator
{
    public const MARKETS = ['rush_yds', 'rec_yds', 'rush_rec_yds'];
    public const TIERS   = ['top', 'mid', 'bottom'];

    public const TIER_LABELS = [
        'top'     => 'Top-10 defense',
        'mid'     => 'Middle defense (11-22)',
        'bottom'  => 'Bottom-10 defense (23-32)',
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
     * Which defensive rank drives each market. Receiving yards use the rank
     * against running-back receiving when it exists, else the rush rank.
     */
    public static function rankForMarket(string $market, array $defense): ?int
    {
        $rush = isset($defense['rush_def_rank']) && $defense['rush_def_rank'] !== null ? (int) $defense['rush_def_rank'] : null;
        $rec  = isset($defense['rb_rec_def_rank']) && $defense['rb_rec_def_rank'] !== null ? (int) $defense['rb_rec_def_rank'] : null;

        return $market === 'rec_yds' ? ($rec ?? $rush) : $rush;
    }

    public static function marketValue(string $market, array $game): float
    {
        $rush = (float) ($game['rush_yds'] ?? 0);
        $rec  = (float) ($game['rec_yds'] ?? 0);

        return match ($market) {
            'rush_yds'     => $rush,
            'rec_yds'      => $rec,
            'rush_rec_yds' => $rush + $rec,
            default        => throw new \InvalidArgumentException('Unknown market: ' . $market),
        };
    }

    /**
     * @param list<array<string,mixed>> $games    game logs (season, week, opponent, rush_yds, rec_yds, ...)
     * @param callable(array):?array     $defenseLookup returns the defense row for a game or null
     * @return list<array<string,mixed>> games sorted oldest first, each with `tiers` per market
     */
    public static function tagGames(array $games, callable $defenseLookup): array
    {
        usort($games, static fn ($a, $b) => [(int) $a['season'], (int) $a['week']] <=> [(int) $b['season'], (int) $b['week']]);

        foreach ($games as &$game) {
            $defense = $defenseLookup($game) ?? [];
            $game['rush_def_rank']   = isset($defense['rush_def_rank']) ? (int) $defense['rush_def_rank'] : null;
            $game['rb_rec_def_rank'] = isset($defense['rb_rec_def_rank']) && $defense['rb_rec_def_rank'] !== null ? (int) $defense['rb_rec_def_rank'] : null;
            $game['tiers'] = [];
            foreach (self::MARKETS as $market) {
                $game['tiers'][$market] = self::tierForRank(self::rankForMarket($market, $defense));
            }
            $game['rush_rec_yds'] = self::marketValue('rush_rec_yds', $game);
        }
        unset($game);

        return $games;
    }

    /**
     * @param list<array<string,mixed>> $taggedGames output of tagGames()
     * @return array<string, array<string, array<string, float|int|null>>> [market][overall|last5|top|mid|bottom|unknown] => stats
     */
    public static function splits(array $taggedGames): array
    {
        $out = [];
        foreach (self::MARKETS as $market) {
            $all    = array_map(static fn ($g) => self::marketValue($market, $g), $taggedGames);
            $byTier = ['top' => [], 'mid' => [], 'bottom' => [], 'unknown' => []];
            foreach ($taggedGames as $g) {
                $byTier[$g['tiers'][$market] ?? 'unknown'][] = self::marketValue($market, $g);
            }

            $out[$market] = [
                'overall' => self::stats($all),
                'last5'   => self::stats(array_slice($all, -5)),
            ];
            foreach ($byTier as $tier => $values) {
                $out[$market][$tier] = self::stats($values);
            }
        }

        return $out;
    }

    /**
     * @param list<float> $values
     * @return array{games:int, avg:?float, median:?float, stddev:?float, min:?float, max:?float}
     */
    public static function stats(array $values): array
    {
        $n = count($values);
        if ($n === 0) {
            return ['games' => 0, 'avg' => null, 'median' => null, 'stddev' => null, 'min' => null, 'max' => null];
        }

        $avg = array_sum($values) / $n;
        $sorted = $values;
        sort($sorted);
        $mid = intdiv($n, 2);
        $median = $n % 2 === 1 ? $sorted[$mid] : ($sorted[$mid - 1] + $sorted[$mid]) / 2;

        $variance = 0.0;
        if ($n > 1) {
            foreach ($values as $v) {
                $variance += ($v - $avg) ** 2;
            }
            $variance /= ($n - 1); // sample standard deviation
        }

        return [
            'games'  => $n,
            'avg'    => round($avg, 2),
            'median' => round((float) $median, 2),
            'stddev' => round(sqrt($variance), 2),
            'min'    => (float) $sorted[0],
            'max'    => (float) $sorted[$n - 1],
        ];
    }
}
