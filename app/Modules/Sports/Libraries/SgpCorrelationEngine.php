<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

/**
 * Quantitative Same-Game Parlay (SGP) Correlation & +EV Joint Probability Engine.
 *
 * Traditional parlay calculators assume statistical independence:
 *   P(A ∩ B) = P(A) × P(B)
 * In Same-Game Parlays, markets have empirical statistical correlations (r):
 *   P(A ∩ B) = P(A) × P(B) + r × sqrt(P(A)(1 - P(A)) × P(B)(1 - P(B)))
 *
 * This engine detects mispriced books where the offered SGP payout exceeds
 * the correlation-adjusted fair price (+EV SGP).
 */
final class SgpCorrelationEngine
{
    /**
     * Empirical cross-market correlation table.
     * r > 0 means legs help each other (Synergistic).
     * r < 0 means legs cannibalize each other (Conflicting).
     */
    public const CORRELATION_MATRIX = [
        'NFL' => [
            [
                'leg_a'       => 'qb_pass_yds',
                'leg_b'       => 'wr_rec_yds',
                'direction'   => 'same',
                'r'           => 0.58,
                'synergy'     => 'Synergistic (+EV Boost)',
                'description' => 'Starting QB passing yards & WR1 receiving yards are strongly co-dependent.',
            ],
            [
                'leg_a'       => 'qb_pass_yds',
                'leg_b'       => 'team_total_over',
                'direction'   => 'same',
                'r'           => 0.52,
                'synergy'     => 'Synergistic (+EV Boost)',
                'description' => 'High QB passing production correlates directly with higher team scoring.',
            ],
            [
                'leg_a'       => 'qb_pass_yds',
                'leg_b'       => 'rb_rush_yds',
                'direction'   => 'same',
                'r'           => -0.22,
                'synergy'     => 'Cannibalistic (-EV Fade)',
                'description' => 'High passing volume often occurs in negative game scripts that reduce rush attempts.',
            ],
            [
                'leg_a'       => 'spread_fav',
                'leg_b'       => 'game_under',
                'direction'   => 'same',
                'r'           => 0.18,
                'synergy'     => 'Positive Game Script',
                'description' => 'Large favorites running out the clock in the 4th quarter lowers combined total points.',
            ],
        ],
        'NBA' => [
            [
                'leg_a'       => 'pg_assists',
                'leg_b'       => 'c_points',
                'direction'   => 'same',
                'r'           => 0.42,
                'synergy'     => 'Synergistic (+EV Boost)',
                'description' => 'Primary ball-handler pick-and-roll assists feed high-percentage center paint scoring.',
            ],
            [
                'leg_a'       => 'game_pace_over',
                'leg_b'       => 'player_pra',
                'direction'   => 'same',
                'r'           => 0.46,
                'synergy'     => 'Synergistic (+EV Boost)',
                'description' => 'Faster game pace increases total possessions, lifting Points + Rebounds + Assists.',
            ],
            [
                'leg_a'       => 'team_blowout_spread',
                'leg_b'       => 'star_player_minutes',
                'direction'   => 'same',
                'r'           => -0.38,
                'synergy'     => 'Minutes Risk (-EV Fade)',
                'description' => 'Blowout game scripts lead to star starters resting the entire 4th quarter.',
            ],
        ],
        'MLB' => [
            [
                'leg_a'       => 'pitcher_strikeouts',
                'leg_b'       => 'game_total_under',
                'direction'   => 'same',
                'r'           => 0.48,
                'synergy'     => 'Synergistic (+EV Boost)',
                'description' => 'Dominant starter strikeout performances sharply depress opponent run totals.',
            ],
            [
                'leg_a'       => 'batter_total_bases',
                'leg_b'       => 'team_runs_over',
                'direction'   => 'same',
                'r'           => 0.44,
                'synergy'     => 'Synergistic (+EV Boost)',
                'description' => 'Heart-of-the-order extra-base hits generate multiple team runs.',
            ],
            [
                'leg_a'       => 'pitcher_strikeouts',
                'leg_b'       => 'hits_allowed',
                'direction'   => 'same',
                'r'           => -0.35,
                'synergy'     => 'Inverse Matchup',
                'description' => 'High swing-and-miss stuff prevents balls in play and baserunners.',
            ],
        ],
        'NHL' => [
            [
                'leg_a'       => 'goalie_saves',
                'leg_b'       => 'game_total_under',
                'direction'   => 'same',
                'r'           => 0.35,
                'synergy'     => 'Synergistic (+EV Boost)',
                'description' => 'High goalie save efficiency in low-danger zones preserves lower scorelines.',
            ],
            [
                'leg_a'       => 'skater_shots_on_goal',
                'leg_b'       => 'skater_points',
                'direction'   => 'same',
                'r'           => 0.51,
                'synergy'     => 'Synergistic (+EV Boost)',
                'description' => 'High individual shot volume generates rebound chances and goals.',
            ],
            [
                'leg_a'       => 'opponent_pk_top10',
                'leg_b'       => 'powerplay_points',
                'direction'   => 'same',
                'r'           => -0.30,
                'synergy'     => 'Suppression Matchup',
                'description' => 'Elite penalty killing units nullify power play point opportunities.',
            ],
        ],
    ];

    /**
     * Looks up empirical correlation between two markets.
     *
     * @return array{r: float, synergy: string, description: string}
     */
    public static function lookupCorrelation(string $sport, string $legA, string $legB, string $direction = 'same'): array
    {
        $sport = strtoupper(trim($sport));
        $matrix = self::CORRELATION_MATRIX[$sport] ?? [];

        foreach ($matrix as $item) {
            $matchDirect = ($item['leg_a'] === $legA && $item['leg_b'] === $legB);
            $matchInverse = ($item['leg_a'] === $legB && $item['leg_b'] === $legA);

            if (($matchDirect || $matchInverse) && $item['direction'] === $direction) {
                return [
                    'r'           => (float) $item['r'],
                    'synergy'     => (string) $item['synergy'],
                    'description' => (string) $item['description'],
                ];
            }
        }

        return [
            'r'           => 0.0,
            'synergy'     => 'Independent',
            'description' => 'No strong empirical covariance detected; legs behave independently.',
        ];
    }

    /**
     * Converts American odds to implied probability (0.0 to 1.0).
     */
    public static function americanToProb(int $odds): float
    {
        if ($odds === 0) {
            return 0.5;
        }

        if ($odds > 0) {
            return round(100.0 / ($odds + 100.0), 4);
        }

        $pos = abs($odds);
        return round($pos / ($pos + 100.0), 4);
    }

    /**
     * Converts implied probability to American odds.
     */
    public static function probToAmerican(float $prob): int
    {
        $p = max(0.01, min(0.99, $prob));

        if ($p > 0.5) {
            return (int) round(-100.0 * ($p / (1.0 - $p)));
        }

        return (int) round(100.0 * ((1.0 - $p) / $p));
    }

    /**
     * Solves fair joint probability for a 2-leg Same-Game Parlay with correlation r.
     *
     * @param int $oddsA American odds for leg A
     * @param int $oddsB American odds for leg B
     * @param float $r Correlation coefficient (-1.0 to 1.0)
     * @param int $offeredSgpOdds Sportsbook offered parlay American odds
     * @return array<string,mixed>
     */
    public static function evaluateTwoLegSgp(int $oddsA, int $oddsB, float $r, int $offeredSgpOdds): array
    {
        $pA = self::americanToProb($oddsA);
        $pB = self::americanToProb($oddsB);

        // Independent joint probability
        $pInd = $pA * $pB;

        // Covariance term: r * sqrt(Var(A) * Var(B))
        $covariance = $r * sqrt($pA * (1.0 - $pA) * $pB * (1.0 - $pB));

        // Correlated joint probability (clamped to realistic probability boundaries)
        $pCorrelated = max(0.01, min(0.95, $pInd + $covariance));

        $fairAmericanOdds = self::probToAmerican($pCorrelated);
        $independentOdds = self::probToAmerican($pInd);

        // Calculate expected value (EV) per dollar staked on the offered odds
        // Payout on $1: If odds > 0: 1 + odds/100; If odds < 0: 1 + 100/abs(odds)
        $payoutMultiplier = $offeredSgpOdds > 0 ? (1.0 + $offeredSgpOdds / 100.0) : (1.0 + 100.0 / abs($offeredSgpOdds));
        $evPerDollar = round(($pCorrelated * $payoutMultiplier) - 1.0, 4);
        $evPct = round($evPerDollar * 100.0, 2);

        $verdict = match (true) {
            $evPct >= 5.0   => '+EV High Value SGP (Book Underpriced Correlation)',
            $evPct >= 0.0   => '+EV Marginal Edge',
            $evPct >= -7.0  => 'Fair / Market Neutral SGP',
            default         => '-EV Sub-Optimal (Excessive Synthetic Juice)',
        };

        return [
            'prob_leg_a'           => $pA,
            'prob_leg_b'           => $pB,
            'correlation_r'        => $r,
            'independent_prob'     => round($pInd, 4),
            'independent_odds'     => $independentOdds,
            'fair_correlated_prob' => round($pCorrelated, 4),
            'fair_correlated_odds' => $fairAmericanOdds,
            'offered_sgp_odds'     => $offeredSgpOdds,
            'ev_per_dollar'        => $evPerDollar,
            'ev_percentage'        => $evPct,
            'verdict'              => $verdict,
        ];
    }
}
