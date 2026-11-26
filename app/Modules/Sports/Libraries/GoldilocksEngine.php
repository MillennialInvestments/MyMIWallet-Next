<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

/**
 * "Goldilocks" prop finder for running backs.
 *
 * For an upcoming opponent it projects yards from the player's game logs
 * (tier-matched average shrunk toward the season average, blended with the
 * last five games), estimates the chance of clearing each prop line, and
 * compares that with the sportsbook's price.
 *
 * A pick is "Goldilocks" when it is neither too risky nor too thin:
 *   - model hit probability between MIN_PROB and MAX_PROB (55%-75%)
 *   - edge over the no-vig market probability of at least MIN_EDGE (3 pts)
 *   - positive expected value at the offered price
 * The best Goldilocks pick is the one with the highest expected value.
 *
 * Educational analytics only. It never places, accepts or brokers a wager.
 */
final class GoldilocksEngine
{
    public const MIN_PROB = 0.55;
    public const MAX_PROB = 0.75;
    public const MIN_EDGE = 0.03;

    /** Prior strength (in games) that pulls a small tier sample toward the season average. */
    public const SHRINK_GAMES = 3;

    /** Blend weights for the projection. */
    public const W_TIER   = 0.5;
    public const W_RECENT = 0.3;
    public const W_SEASON = 0.2;

    /** Blend weights for the hit probability. */
    public const W_NORMAL    = 0.65;
    public const W_EMPIRICAL = 0.35;

    /** Floors on the spread so a few similar games don't fake certainty. */
    public const SIGMA_FLOOR = ['rush_yds' => 12.0, 'rec_yds' => 8.0, 'rush_rec_yds' => 15.0];

    /** Target hit rate used to suggest lines when no sportsbook lines are given. */
    public const SUGGEST_PROB = 0.65;

    /**
     * @param list<array<string,mixed>> $taggedGames output of RbSplitsCalculator::tagGames()
     * @param array<string,mixed>       $opponentDefense defense row for the upcoming opponent (rush_def_rank, rb_rec_def_rank)
     * @param list<array{market:string,line:float,over_odds:?int,under_odds:?int}> $lines offered prop lines
     */
    public static function evaluate(array $taggedGames, array $opponentDefense, array $lines = []): array
    {
        $splits = RbSplitsCalculator::splits($taggedGames);
        $projections = [];
        foreach (RbSplitsCalculator::MARKETS as $market) {
            $tier = RbSplitsCalculator::tierForRank(RbSplitsCalculator::rankForMarket($market, $opponentDefense));
            $projections[$market] = self::project($market, $tier, $splits[$market], $taggedGames);
        }

        $candidates = [];
        foreach ($lines as $line) {
            $market = $line['market'];
            if (! isset($projections[$market])) {
                continue;
            }
            foreach (['over', 'under'] as $side) {
                $candidates[] = self::scoreSide($projections[$market], $taggedGames, $line, $side);
            }
        }

        $goldilocks = array_values(array_filter($candidates, static fn ($c) => $c['goldilocks']));
        usort($goldilocks, static fn ($a, $b) => $b['ev_per_dollar'] <=> $a['ev_per_dollar']);
        usort($candidates, static fn ($a, $b) => $b['ev_per_dollar'] <=> $a['ev_per_dollar']);

        $suggested = [];
        foreach ($projections as $market => $projection) {
            $suggested[$market] = self::suggestLines($projection, $taggedGames);
        }

        $best = $goldilocks[0] ?? null;

        return [
            'opponent_tiers' => array_map(static fn ($p) => $p['opponent_tier'], $projections),
            'projections'    => $projections,
            'candidates'     => $candidates,
            'best'           => $best,
            'verdict'        => $best !== null
                ? sprintf('%s %s %.1f (%s) is the Goldilocks pick: %.0f%% model chance vs %.0f%% priced in.', strtoupper($best['side']), self::marketLabel($best['market']), $best['line'], self::formatOdds($best['odds']), $best['model_prob'] * 100, $best['market_prob'] * 100)
                : ($lines === [] ? 'No sportsbook lines given. See the suggested Goldilocks lines.' : 'No Goldilocks bet: none of the offered lines has enough edge at a sensible hit rate. Pass.'),
            'suggested_lines' => $suggested,
            'rules' => [
                'min_prob' => self::MIN_PROB,
                'max_prob' => self::MAX_PROB,
                'min_edge' => self::MIN_EDGE,
            ],
        ];
    }

    /**
     * @param array<string, array<string, float|int|null>> $marketSplits
     */
    public static function project(string $market, string $tier, array $marketSplits, array $taggedGames): array
    {
        $season = $marketSplits['overall'];
        $recent = $marketSplits['last5'];
        $tierStats = $marketSplits[$tier] ?? ['games' => 0, 'avg' => null];

        if ($season['games'] === 0) {
            return [
                'market' => $market, 'opponent_tier' => $tier, 'projection' => null, 'sigma' => null,
                'season_avg' => null, 'tier_avg' => null, 'tier_games' => 0, 'last5_avg' => null,
                'games' => 0, 'confidence' => 'none',
            ];
        }

        $seasonAvg = (float) $season['avg'];
        $nTier = (int) $tierStats['games'];
        $tierAvg = $nTier > 0 ? (float) $tierStats['avg'] : $seasonAvg;
        $shrunkTier = ($nTier * $tierAvg + self::SHRINK_GAMES * $seasonAvg) / ($nTier + self::SHRINK_GAMES);
        $recentAvg = $recent['games'] > 0 ? (float) $recent['avg'] : $seasonAvg;

        $projection = self::W_TIER * $shrunkTier + self::W_RECENT * $recentAvg + self::W_SEASON * $seasonAvg;
        $sigma = max((float) ($season['stddev'] ?? 0), self::SIGMA_FLOOR[$market] ?? 10.0);

        $games = (int) $season['games'];
        $confidence = ($games >= 10 && $nTier >= 4) ? 'high' : (($games >= 6 && $nTier >= 2) ? 'medium' : 'low');

        return [
            'market'        => $market,
            'opponent_tier' => $tier,
            'projection'    => round($projection, 1),
            'sigma'         => round($sigma, 1),
            'season_avg'    => round($seasonAvg, 1),
            'tier_avg'      => $nTier > 0 ? round($tierAvg, 1) : null,
            'tier_games'    => $nTier,
            'last5_avg'     => round($recentAvg, 1),
            'games'         => $games,
            'confidence'    => $confidence,
        ];
    }

    /** Model probability that the player goes OVER the line. */
    public static function probOver(array $projection, array $taggedGames, float $line): float
    {
        if ($projection['projection'] === null) {
            return 0.5;
        }
        $market = $projection['market'];
        $pNormal = 1.0 - self::normalCdf(($line - (float) $projection['projection']) / (float) $projection['sigma']);

        // Empirical hit rate, tier-matched when the sample is big enough, Laplace-smoothed.
        $pool = $taggedGames;
        if ($projection['tier_games'] >= 3) {
            $pool = array_values(array_filter($taggedGames, static fn ($g) => ($g['tiers'][$market] ?? null) === $projection['opponent_tier']));
        }
        $hits = 0;
        foreach ($pool as $g) {
            if (RbSplitsCalculator::marketValue($market, $g) > $line) {
                $hits++;
            }
        }
        $pEmpirical = ($hits + 1) / (count($pool) + 2);

        $p = self::W_NORMAL * $pNormal + self::W_EMPIRICAL * $pEmpirical;

        return min(0.99, max(0.01, $p));
    }

    public static function scoreSide(array $projection, array $taggedGames, array $line, string $side): array
    {
        $value = (float) $line['line'];
        $pOver = self::probOver($projection, $taggedGames, $value);
        $modelProb = $side === 'over' ? $pOver : 1.0 - $pOver;

        $overOdds = isset($line['over_odds']) ? (int) $line['over_odds'] : null;
        $underOdds = isset($line['under_odds']) ? (int) $line['under_odds'] : null;
        $odds = $side === 'over' ? ($overOdds ?? -110) : ($underOdds ?? -110);
        $otherOdds = $side === 'over' ? $underOdds : $overOdds;

        $implied = self::impliedProb($odds);
        $marketProb = $implied;
        if ($otherOdds !== null) {
            $marketProb = $implied / ($implied + self::impliedProb($otherOdds)); // remove the vig
        }

        $payout = self::payoutPerDollar($odds);
        $ev = $modelProb * $payout - (1.0 - $modelProb);
        $edge = $modelProb - $marketProb;

        $reasons = [];
        if ($modelProb < self::MIN_PROB) {
            $reasons[] = 'too risky (hit chance under ' . (int) (self::MIN_PROB * 100) . '%)';
        }
        if ($modelProb > self::MAX_PROB) {
            $reasons[] = 'too safe to be priced well (hit chance over ' . (int) (self::MAX_PROB * 100) . '%)';
        }
        if ($edge < self::MIN_EDGE) {
            $reasons[] = 'edge under ' . (int) (self::MIN_EDGE * 100) . ' pts';
        }
        if ($ev <= 0) {
            $reasons[] = 'negative expected value';
        }
        if ($projection['confidence'] === 'none') {
            $reasons[] = 'no game logs';
        }

        return [
            'market'        => $projection['market'],
            'line'          => $value,
            'side'          => $side,
            'odds'          => $odds,
            'projection'    => $projection['projection'],
            'model_prob'    => round($modelProb, 4),
            'market_prob'   => round($marketProb, 4),
            'edge'          => round($edge, 4),
            'ev_per_dollar' => round($ev, 4),
            'confidence'    => $projection['confidence'],
            'goldilocks'    => $reasons === [],
            'why_not'       => $reasons,
        ];
    }

    /**
     * Lines (half-yard steps) where over / under each hit at about SUGGEST_PROB.
     * Over: the highest line still at or above the target. Under: the lowest.
     */
    public static function suggestLines(array $projection, array $taggedGames): array
    {
        if ($projection['projection'] === null) {
            return ['fair_line' => null, 'over_at_or_below' => null, 'under_at_or_above' => null];
        }

        $overLine = null;
        $underLine = null;
        for ($line = 0.5; $line <= 300.5; $line += 1.0) {
            $pOver = self::probOver($projection, $taggedGames, $line);
            if ($pOver >= self::SUGGEST_PROB) {
                $overLine = $line;
            }
            if ($underLine === null && (1.0 - $pOver) >= self::SUGGEST_PROB) {
                $underLine = $line;
            }
        }

        return [
            'fair_line'         => $projection['projection'],
            'over_at_or_below'  => $overLine,
            'under_at_or_above' => $underLine,
            'target_prob'       => self::SUGGEST_PROB,
        ];
    }

    public static function impliedProb(int $americanOdds): float
    {
        if ($americanOdds === 0) {
            throw new \InvalidArgumentException('American odds cannot be 0');
        }

        return $americanOdds < 0
            ? (-$americanOdds) / (-$americanOdds + 100)
            : 100 / ($americanOdds + 100);
    }

    /** Profit per $1 staked if the bet wins. */
    public static function payoutPerDollar(int $americanOdds): float
    {
        return $americanOdds < 0 ? 100 / (-$americanOdds) : $americanOdds / 100;
    }

    /** Standard normal CDF (Abramowitz-Stegun 7.1.26, error < 1.5e-7). */
    public static function normalCdf(float $z): float
    {
        $sign = $z < 0 ? -1 : 1;
        $x = abs($z) / M_SQRT2;
        $t = 1.0 / (1.0 + 0.3275911 * $x);
        $y = 1.0 - (((((1.061405429 * $t - 1.453152027) * $t) + 1.421413741) * $t - 0.284496736) * $t + 0.254829592) * $t * exp(-$x * $x);

        return 0.5 * (1.0 + $sign * $y);
    }

    public static function marketLabel(string $market): string
    {
        return match ($market) {
            'rush_yds'     => 'rushing yards',
            'rec_yds'      => 'receiving yards',
            'rush_rec_yds' => 'rush + rec yards',
            default        => $market,
        };
    }

    public static function formatOdds(int $odds): string
    {
        return $odds > 0 ? '+' . $odds : (string) $odds;
    }

    /**
     * Parse lines from "rush_yds:65.5:-115:-105,rec_yds:22.5" or from
     * parallel arrays market[], line[], over[], under[].
     *
     * @return list<array{market:string,line:float,over_odds:?int,under_odds:?int}>
     */
    public static function parseLines(string|array|null $spec, array $markets = [], array $values = [], array $overs = [], array $unders = []): array
    {
        $rows = [];
        if (is_string($spec) && trim($spec) !== '') {
            foreach (explode(',', $spec) as $chunk) {
                $parts = array_map('trim', explode(':', $chunk));
                $rows[] = [$parts[0] ?? '', $parts[1] ?? '', $parts[2] ?? '', $parts[3] ?? ''];
            }
        }
        foreach ($markets as $i => $m) {
            $rows[] = [(string) $m, (string) ($values[$i] ?? ''), (string) ($overs[$i] ?? ''), (string) ($unders[$i] ?? '')];
        }

        $out = [];
        foreach ($rows as [$market, $line, $over, $under]) {
            if (! in_array($market, RbSplitsCalculator::MARKETS, true) || ! is_numeric($line)) {
                continue;
            }
            $lineValue = (float) $line;
            if ($lineValue < 0 || $lineValue > 500) {
                continue;
            }
            $out[] = [
                'market'     => $market,
                'line'       => $lineValue,
                'over_odds'  => self::parseOdds($over),
                'under_odds' => self::parseOdds($under),
            ];
            if (count($out) >= 12) {
                break;
            }
        }

        return $out;
    }

    private static function parseOdds(string $raw): ?int
    {
        $raw = trim($raw);
        if ($raw === '' || ! preg_match('/^[+-]?\d{3,5}$/', $raw)) {
            return null;
        }
        $odds = (int) $raw;

        return ($odds <= -100 || $odds >= 100) ? $odds : null;
    }
}
