<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

/**
 * Pure math for Team vs Team NFL game matchups:
 * models projected final scores, point spreads, game totals, and win probabilities
 * by combining team offensive scoring, opponent scoring defense, home-field advantage,
 * and recent form.
 *
 * Educational analytics only; no wagers placed, accepted, or brokered.
 */
final class TeamMatchupCalculator
{
    public const LEAGUE_AVG_POINTS = 21.8;
    public const HOME_FIELD_ADVANTAGE = 2.0;

    /** Spread & Total standard deviations for normal distribution evaluation */
    public const SPREAD_SIGMA = 13.5;
    public const TOTAL_SIGMA  = 13.8;

    public const MIN_PROB = 0.55;
    public const MAX_PROB = 0.75;
    public const MIN_EDGE = 0.03;

    /**
     * @param array<string,mixed> $homeStats ['points_scored_pg' => float, 'points_allowed_pg' => float, 'recent_scored_pg' => float, 'recent_allowed_pg' => float]
     * @param array<string,mixed> $awayStats ['points_scored_pg' => float, 'points_allowed_pg' => float, 'recent_scored_pg' => float, 'recent_allowed_pg' => float]
     * @return array{
     *   home_score: float,
     *   away_score: float,
     *   projected_spread: float,
     *   projected_total: float,
     *   home_win_prob: float,
     *   away_win_prob: float
     * }
     */
    public static function projectMatchup(array $homeStats, array $awayStats): array
    {
        $homeScored = (float) ($homeStats['points_scored_pg'] ?? self::LEAGUE_AVG_POINTS);
        $homeRecent = (float) ($homeStats['recent_scored_pg'] ?? $homeScored);
        $homeOffense = (0.7 * $homeScored) + (0.3 * $homeRecent);

        $awayAllowed = (float) ($awayStats['points_allowed_pg'] ?? self::LEAGUE_AVG_POINTS);
        $awayRecentAllowed = (float) ($awayStats['recent_allowed_pg'] ?? $awayAllowed);
        $awayDefFactor = max(0.5, ((0.7 * $awayAllowed) + (0.3 * $awayRecentAllowed)) / self::LEAGUE_AVG_POINTS);

        $awayScored = (float) ($awayStats['points_scored_pg'] ?? self::LEAGUE_AVG_POINTS);
        $awayRecent = (float) ($awayStats['recent_scored_pg'] ?? $awayScored);
        $awayOffense = (0.7 * $awayScored) + (0.3 * $awayRecent);

        $homeAllowed = (float) ($homeStats['points_allowed_pg'] ?? self::LEAGUE_AVG_POINTS);
        $homeRecentAllowed = (float) ($homeStats['recent_allowed_pg'] ?? $homeAllowed);
        $homeDefFactor = max(0.5, ((0.7 * $homeAllowed) + (0.3 * $homeRecentAllowed)) / self::LEAGUE_AVG_POINTS);

        $homeProj = ($homeOffense * $awayDefFactor) + (self::HOME_FIELD_ADVANTAGE / 2.0);
        $awayProj = ($awayOffense * $homeDefFactor) - (self::HOME_FIELD_ADVANTAGE / 2.0);

        $homeProj = max(7.0, round($homeProj, 1));
        $awayProj = max(7.0, round($awayProj, 1));

        $projectedSpread = round($awayProj - $homeProj, 1); // Negative means home favorite
        $projectedTotal  = round($homeProj + $awayProj, 1);

        // Win probability using logistic/normal model
        $spreadZ = ($homeProj - $awayProj) / self::SPREAD_SIGMA;
        $homeWinProb = round(self::stdNormCdf($spreadZ), 3);
        $awayWinProb = round(1.0 - $homeWinProb, 3);

        return [
            'home_score'       => $homeProj,
            'away_score'       => $awayProj,
            'projected_spread' => $projectedSpread,
            'projected_total'  => $projectedTotal,
            'home_win_prob'    => $homeWinProb,
            'away_win_prob'    => $awayWinProb,
        ];
    }

    /**
     * Evaluates a spread line (e.g. Home -3.5 or Away +3.5).
     *
     * @param float $offeredSpread offered line from Home team's perspective (e.g. -3.5 means Home -3.5)
     * @param int|null $homeOdds American odds for Home cover (e.g. -110)
     * @param int|null $awayOdds American odds for Away cover (e.g. -110)
     */
    public static function evaluateSpread(float $projectedSpread, float $offeredSpread, ?int $homeOdds = -110, ?int $awayOdds = -110): array
    {
        // Diff between projected spread and offered spread from Home perspective
        // If projected is -6.0 and offered is -3.5, Home has edge
        $z = ($offeredSpread - $projectedSpread) / self::SPREAD_SIGMA;
        $homeCoverProb = round(self::stdNormCdf($z), 3);
        $awayCoverProb = round(1.0 - $homeCoverProb, 3);

        $homeOddsVal = $homeOdds ?? -110;
        $awayOddsVal = $awayOdds ?? -110;

        $noVig = self::noVigProbabilities($homeOddsVal, $awayOddsVal);

        $homeEdge = $homeCoverProb - $noVig['p1'];
        $awayEdge = $awayCoverProb - $noVig['p2'];

        $homeEv = self::evPerDollar($homeCoverProb, $homeOddsVal);
        $awayEv = self::evPerDollar($awayCoverProb, $awayOddsVal);

        $homeGoldilocks = ($homeCoverProb >= self::MIN_PROB && $homeCoverProb <= self::MAX_PROB && $homeEdge >= self::MIN_EDGE && $homeEv > 0);
        $awayGoldilocks = ($awayCoverProb >= self::MIN_PROB && $awayCoverProb <= self::MAX_PROB && $awayEdge >= self::MIN_EDGE && $awayEv > 0);

        return [
            'home' => [
                'market'          => 'spread',
                'side'            => 'home',
                'pick'            => 'Home ' . ($offeredSpread > 0 ? '+' . $offeredSpread : (string) $offeredSpread),
                'line'            => $offeredSpread,
                'prob'            => $homeCoverProb,
                'model_prob'      => $homeCoverProb,
                'no_vig_prob'     => $noVig['p1'],
                'market_prob'     => $noVig['p1'],
                'edge'            => round($homeEdge, 3),
                'odds'            => $homeOddsVal,
                'ev_per_dollar'   => round($homeEv, 3),
                'goldilocks'      => $homeGoldilocks,
            ],
            'away' => [
                'market'          => 'spread',
                'side'            => 'away',
                'pick'            => 'Away ' . (-$offeredSpread > 0 ? '+' . (-$offeredSpread) : (string) (-$offeredSpread)),
                'line'            => -$offeredSpread,
                'prob'            => $awayCoverProb,
                'model_prob'      => $awayCoverProb,
                'no_vig_prob'     => $noVig['p2'],
                'market_prob'     => $noVig['p2'],
                'edge'            => round($awayEdge, 3),
                'odds'            => $awayOddsVal,
                'ev_per_dollar'   => round($awayEv, 3),
                'goldilocks'      => $awayGoldilocks,
            ],
        ];
    }

    /**
     * Evaluates a game total line (e.g. Over/Under 47.5).
     */
    public static function evaluateTotal(float $projectedTotal, float $offeredTotal, ?int $overOdds = -110, ?int $underOdds = -110): array
    {
        $z = ($projectedTotal - $offeredTotal) / self::TOTAL_SIGMA;
        $overProb = round(self::stdNormCdf($z), 3);
        $underProb = round(1.0 - $overProb, 3);

        $overOddsVal = $overOdds ?? -110;
        $underOddsVal = $underOdds ?? -110;

        $noVig = self::noVigProbabilities($overOddsVal, $underOddsVal);

        $overEdge = $overProb - $noVig['p1'];
        $underEdge = $underProb - $noVig['p2'];

        $overEv = self::evPerDollar($overProb, $overOddsVal);
        $underEv = self::evPerDollar($underProb, $underOddsVal);

        $overGoldilocks = ($overProb >= self::MIN_PROB && $overProb <= self::MAX_PROB && $overEdge >= self::MIN_EDGE && $overEv > 0);
        $underGoldilocks = ($underProb >= self::MIN_PROB && $underProb <= self::MAX_PROB && $underEdge >= self::MIN_EDGE && $underEv > 0);

        return [
            'over' => [
                'market'        => 'total',
                'side'          => 'over',
                'pick'          => 'Over ' . $offeredTotal,
                'line'          => $offeredTotal,
                'prob'          => $overProb,
                'model_prob'    => $overProb,
                'no_vig_prob'   => $noVig['p1'],
                'market_prob'   => $noVig['p1'],
                'edge'          => round($overEdge, 3),
                'odds'          => $overOddsVal,
                'ev_per_dollar' => round($overEv, 3),
                'goldilocks'    => $overGoldilocks,
            ],
            'under' => [
                'market'        => 'total',
                'side'          => 'under',
                'pick'          => 'Under ' . $offeredTotal,
                'line'          => $offeredTotal,
                'prob'          => $underProb,
                'model_prob'    => $underProb,
                'no_vig_prob'   => $noVig['p2'],
                'market_prob'   => $noVig['p2'],
                'edge'          => round($underEdge, 3),
                'odds'          => $underOddsVal,
                'ev_per_dollar' => round($underEv, 3),
                'goldilocks'    => $underGoldilocks,
            ],
        ];
    }

    /**
     * Evaluates a moneyline (win probability vs market moneyline).
     */
    public static function evaluateMoneyline(float $homeWinProb, ?int $homeOdds = -110, ?int $awayOdds = 100): array
    {
        $awayWinProb = 1.0 - $homeWinProb;
        $homeOddsVal = $homeOdds ?? -110;
        $awayOddsVal = $awayOdds ?? 100;

        $noVig = self::noVigProbabilities($homeOddsVal, $awayOddsVal);

        $homeEdge = $homeWinProb - $noVig['p1'];
        $awayEdge = $awayWinProb - $noVig['p2'];

        $homeEv = self::evPerDollar($homeWinProb, $homeOddsVal);
        $awayEv = self::evPerDollar($awayWinProb, $awayOddsVal);

        $homeGoldilocks = ($homeWinProb >= self::MIN_PROB && $homeWinProb <= self::MAX_PROB && $homeEdge >= self::MIN_EDGE && $homeEv > 0);
        $awayGoldilocks = ($awayWinProb >= self::MIN_PROB && $awayWinProb <= self::MAX_PROB && $awayEdge >= self::MIN_EDGE && $awayEv > 0);

        return [
            'home' => [
                'market'        => 'moneyline',
                'side'          => 'home',
                'pick'          => 'Home ML (' . ($homeOddsVal > 0 ? '+' . $homeOddsVal : (string) $homeOddsVal) . ')',
                'line'          => 0.0,
                'prob'          => round($homeWinProb, 3),
                'model_prob'    => round($homeWinProb, 3),
                'no_vig_prob'   => $noVig['p1'],
                'market_prob'   => $noVig['p1'],
                'edge'          => round($homeEdge, 3),
                'odds'          => $homeOddsVal,
                'ev_per_dollar' => round($homeEv, 3),
                'goldilocks'    => $homeGoldilocks,
            ],
            'away' => [
                'market'        => 'moneyline',
                'side'          => 'away',
                'pick'          => 'Away ML (' . ($awayOddsVal > 0 ? '+' . $awayOddsVal : (string) $awayOddsVal) . ')',
                'line'          => 0.0,
                'prob'          => round($awayWinProb, 3),
                'model_prob'    => round($awayWinProb, 3),
                'no_vig_prob'   => $noVig['p2'],
                'market_prob'   => $noVig['p2'],
                'edge'          => round($awayEdge, 3),
                'odds'          => $awayOddsVal,
                'ev_per_dollar' => round($awayEv, 3),
                'goldilocks'    => $awayGoldilocks,
            ],
        ];
    }

    public static function impliedProb(int $american): float
    {
        return $american < 0 ? (-$american) / (-$american + 100.0) : 100.0 / ($american + 100.0);
    }

    public static function noVigProbabilities(int $o1, int $o2): array
    {
        $i1 = self::impliedProb($o1);
        $i2 = self::impliedProb($o2);
        $sum = max(0.0001, $i1 + $i2);

        return ['p1' => round($i1 / $sum, 3), 'p2' => round($i2 / $sum, 3)];
    }

    public static function evPerDollar(float $prob, int $american): float
    {
        $payout = $american > 0 ? $american / 100.0 : 100.0 / (-$american);

        return ($prob * $payout) - (1.0 - $prob);
    }

    /**
     * Standard normal cumulative distribution function (Abramowitz & Stegun approximation).
     */
    public static function stdNormCdf(float $x): float
    {
        $b1 =  0.319381530;
        $b2 = -0.356563782;
        $b3 =  1.781477937;
        $b4 = -1.821255978;
        $b5 =  1.330274429;
        $p  =  0.2316419;
        $c  =  0.39894228;

        if ($x >= 0.0) {
            $t = 1.0 / (1.0 + $p * $x);
            return 1.0 - $c * exp(-$x * $x / 2.0) * $t *
                ($t * ($t * ($t * ($t * $b5 + $b4) + $b3) + $b2) + $b1);
        }

        $t = 1.0 / (1.0 - $p * $x);
        return $c * exp(-$x * $x / 2.0) * $t *
            ($t * ($t * ($t * ($t * $b5 + $b4) + $b3) + $b2) + $b1);
    }
}
