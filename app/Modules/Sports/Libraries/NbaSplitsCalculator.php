<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

/**
 * Pure math for NBA player game logs:
 * Tags each game with the opponent's defensive ranking tier and builds
 * per-tier averages and standard deviations for Points, Rebounds, Assists,
 * 3-Pointers Made, Steals + Blocks (Stocks), and Points + Rebounds + Assists (PRA).
 *
 * Tiers (30-team league):
 *   top    = defensive rank 1-10  (tough matchup)
 *   mid    = defensive rank 11-20 (neutral matchup)
 *   bottom = defensive rank 21-30 (favorable matchup)
 */
final class NbaSplitsCalculator
{
    public const MARKETS = [
        'pts',
        'reb',
        'ast',
        'threes',
        'stocks',
        'pra',
    ];

    public const MARKET_LABELS = [
        'pts'    => 'Points',
        'reb'    => 'Rebounds',
        'ast'    => 'Assists',
        'threes' => '3-Pointers Made',
        'stocks' => 'Steals + Blocks',
        'pra'    => 'Pts + Reb + Ast (PRA)',
    ];

    public const TIERS = ['top', 'mid', 'bottom'];

    public const TIER_LABELS = [
        'top'     => 'Top-10 Defense (Tough)',
        'mid'     => 'Mid-10 Defense (Neutral 11-20)',
        'bottom'  => 'Bottom-10 Defense (Favorable 21-30)',
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
     * Which defensive rank drives each NBA prop market.
     *
     * @param array<string,mixed> $defense
     */
    public static function rankForMarket(string $market, array $defense): ?int
    {
        $ptsRank   = isset($defense['pts_def_rank']) && $defense['pts_def_rank'] !== null ? (int) $defense['pts_def_rank'] : null;
        $rebRank   = isset($defense['reb_def_rank']) && $defense['reb_def_rank'] !== null ? (int) $defense['reb_def_rank'] : null;
        $astRank   = isset($defense['ast_def_rank']) && $defense['ast_def_rank'] !== null ? (int) $defense['ast_def_rank'] : null;
        $threeRank = isset($defense['three_def_rank']) && $defense['three_def_rank'] !== null ? (int) $defense['three_def_rank'] : null;
        $defRating = isset($defense['def_rating_rank']) && $defense['def_rating_rank'] !== null ? (int) $defense['def_rating_rank'] : null;

        return match ($market) {
            'pts'    => $ptsRank ?? $defRating,
            'reb'    => $rebRank ?? $defRating,
            'ast'    => $astRank ?? $defRating,
            'threes' => $threeRank ?? $defRating,
            'stocks' => $defRating,
            'pra'    => $defRating ?? $ptsRank,
            default  => $defRating,
        };
    }

    /**
     * Resolves value of a market from a game log row.
     *
     * @param array<string,mixed> $game
     */
    public static function marketValue(string $market, array $game): float
    {
        $pts = (float) ($game['pts'] ?? 0);
        $reb = (float) ($game['reb'] ?? 0);
        $ast = (float) ($game['ast'] ?? 0);
        $threes = (float) ($game['threes'] ?? 0);
        $steals = (float) ($game['steals'] ?? 0);
        $blocks = (float) ($game['blocks'] ?? 0);

        return match ($market) {
            'pts'    => $pts,
            'reb'    => $reb,
            'ast'    => $ast,
            'threes' => $threes,
            'stocks' => $steals + $blocks,
            'pra'    => $pts + $reb + $ast,
            default  => throw new \InvalidArgumentException('Unknown NBA market: ' . $market),
        };
    }

    /**
     * Tags game logs with opponent defensive tiers.
     *
     * @param list<array<string,mixed>> $games
     * @param callable(array):?array|array<string,array<string,mixed>> $defenseLookup
     * @return list<array<string,mixed>>
     */
    public static function tagGames(array $games, callable|array $defenseLookup): array
    {
        $tagged = [];
        foreach ($games as $g) {
            $opp = strtoupper(trim((string) ($g['opponent'] ?? '')));
            $def = is_callable($defenseLookup) ? ($defenseLookup($g) ?? []) : ($defenseLookup[$opp] ?? []);

            $tiers = [];
            foreach (self::MARKETS as $m) {
                $rank = self::rankForMarket($m, $def);
                $tiers[$m] = self::tierForRank($rank);
            }

            $row = $g;
            $row['tiers'] = $tiers;
            $row['defense'] = $def;
            $tagged[] = $row;
        }

        return $tagged;
    }

    /**
     * Builds per-tier and overall splits for each market matching GoldilocksEngine contract.
     *
     * @param list<array<string,mixed>> $taggedGames
     * @return array<string,array<string,array<string,float|int|null>>>
     */
    public static function splits(array $taggedGames): array
    {
        $out = [];
        foreach (self::MARKETS as $market) {
            $allValues = array_map(static fn ($g) => self::marketValue($market, $g), $taggedGames);
            $last5 = array_slice($allValues, -5);

            $byTier = ['top' => [], 'mid' => [], 'bottom' => [], 'unknown' => []];
            foreach ($taggedGames as $g) {
                $tier = $g['tiers'][$market] ?? 'unknown';
                $byTier[$tier][] = self::marketValue($market, $g);
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
            return [
                'games'  => 0,
                'avg'    => null,
                'median' => null,
                'stddev' => null,
                'min'    => null,
                'max'    => null,
            ];
        }

        $avg = array_sum($values) / $n;
        $variance = 0.0;
        foreach ($values as $v) {
            $variance += ($v - $avg) ** 2;
        }
        $stddev = $n > 1 ? sqrt($variance / ($n - 1)) : 0.0;

        sort($values);
        $mid = intdiv($n, 2);
        $median = ($n % 2 === 1) ? $values[$mid] : ($values[$mid - 1] + $values[$mid]) / 2.0;

        return [
            'games'  => $n,
            'avg'    => round($avg, 2),
            'median' => round($median, 2),
            'stddev' => round($stddev, 2),
            'min'    => round(min($values), 2),
            'max'    => round(max($values), 2),
        ];
    }
}
