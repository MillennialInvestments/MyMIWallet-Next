<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

/**
 * Quantitative Soccer (Football) Analytics & Poisson Goal Simulation Engine:
 * - Computes team offensive & defensive ratings and projected expected goals (xG).
 * - Bivariate Poisson simulation across scoreline matrices (0-0 through 6-6).
 * - Solves fair 3-way moneyline (1X2: Home Win / Draw / Away Win).
 * - Solves Both Teams to Score (BTTS) and Over/Under 2.5 match totals.
 */
final class SoccerSplitsCalculator
{
    /**
     * Poisson mass function: P(k; lambda) = (lambda^k * e^-lambda) / k!
     */
    public static function poisson(int $k, float $lambda): float
    {
        if ($k < 0 || $lambda <= 0.0) {
            return $k === 0 ? 1.0 : 0.0;
        }

        $fact = 1;
        for ($i = 2; $i <= $k; $i++) {
            $fact *= $i;
        }

        return (pow($lambda, $k) * exp(-$lambda)) / $fact;
    }

    /**
     * Simulates full scoreline matrix (up to maxGoals x maxGoals)
     * and computes 1X2, BTTS, Over/Under, and most likely score.
     *
     * @return array<string,mixed>
     */
    public static function simulateMatch(float $homeXg, float $awayXg, int $maxGoals = 6): array
    {
        $homeXg = max(0.2, min(5.0, $homeXg));
        $awayXg = max(0.2, min(5.0, $awayXg));

        $pHomeWin = 0.0;
        $pDraw = 0.0;
        $pAwayWin = 0.0;
        $pBtts = 0.0;
        $pOver25 = 0.0;

        $topScore = ['home' => 1, 'away' => 1, 'prob' => 0.0];
        $matrix = [];

        for ($h = 0; $h <= $maxGoals; $h++) {
            $pH = self::poisson($h, $homeXg);
            for ($a = 0; $a <= $maxGoals; $a++) {
                $pA = self::poisson($a, $awayXg);
                $pScore = $pH * $pA;
                $matrix[$h][$a] = round($pScore, 4);

                if ($h > $a) {
                    $pHomeWin += $pScore;
                } elseif ($h === $a) {
                    $pDraw += $pScore;
                } else {
                    $pAwayWin += $pScore;
                }

                if ($h >= 1 && $a >= 1) {
                    $pBtts += $pScore;
                }

                if (($h + $a) >= 3) {
                    $pOver25 += $pScore;
                }

                if ($pScore > $topScore['prob']) {
                    $topScore = ['home' => $h, 'away' => $a, 'prob' => round($pScore, 4)];
                }
            }
        }

        // Normalize sum to 1.0
        $sum1X2 = max(0.001, $pHomeWin + $pDraw + $pAwayWin);
        $normHome = round($pHomeWin / $sum1X2, 3);
        $normDraw = round($pDraw / $sum1X2, 3);
        $normAway = round(1.0 - $normHome - $normDraw, 3);

        $normBtts = round(min(0.95, max(0.05, $pBtts)), 3);
        $normOver25 = round(min(0.95, max(0.05, $pOver25)), 3);

        return [
            'home_xg'            => $homeXg,
            'away_xg'            => $awayXg,
            'home_win_prob'      => $normHome,
            'draw_prob'          => $normDraw,
            'away_win_prob'      => $normAway,
            'fair_home_odds'     => SgpCorrelationEngine::probToAmerican($normHome),
            'fair_draw_odds'     => SgpCorrelationEngine::probToAmerican($normDraw),
            'fair_away_odds'     => SgpCorrelationEngine::probToAmerican($normAway),
            'btts_prob'          => $normBtts,
            'fair_btts_yes_odds' => SgpCorrelationEngine::probToAmerican($normBtts),
            'fair_btts_no_odds'  => SgpCorrelationEngine::probToAmerican(1.0 - $normBtts),
            'over_25_prob'       => $normOver25,
            'fair_over_25_odds'  => SgpCorrelationEngine::probToAmerican($normOver25),
            'fair_under_25_odds' => SgpCorrelationEngine::probToAmerican(1.0 - $normOver25),
            'most_likely_score'  => $topScore['home'] . ' - ' . $topScore['away'],
            'score_probability'  => round($topScore['prob'] * 100.0, 1),
            'score_matrix'       => $matrix,
        ];
    }

    /**
     * Projects match xG from historical stats and home advantage.
     * League average goals per match is ~1.45 goals per side.
     *
     * @param array<string,mixed> $homeStats
     * @param array<string,mixed> $awayStats
     * @return array{home_xg: float, away_xg: float}
     */
    public static function projectXg(array $homeStats, array $awayStats): array
    {
        $leagueAvg = 1.45;
        $homeAdvantage = 1.15; // Home teams produce ~15% more xG in domestic leagues

        $homeOff = (float) ($homeStats['xg_for_pg'] ?? 1.50) / $leagueAvg;
        $awayDef = (float) ($awayStats['xg_against_pg'] ?? 1.20) / $leagueAvg;

        $awayOff = (float) ($awayStats['xg_for_pg'] ?? 1.30) / $leagueAvg;
        $homeDef = (float) ($homeStats['xg_against_pg'] ?? 1.10) / $leagueAvg;

        $homeProj = round($homeOff * $awayDef * $leagueAvg * $homeAdvantage, 2);
        $awayProj = round($awayOff * $homeDef * $leagueAvg * (2.0 - $homeAdvantage), 2);

        return [
            'home_xg' => max(0.5, $homeProj),
            'away_xg' => max(0.4, $awayProj),
        ];
    }
}
