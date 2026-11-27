<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

/**
 * Quantitative College Sports Matchup & Spread Projection Engine (NCAAF & NCAAB):
 * - Net efficiency ratings (SP+ / KenPom style power ratings)
 * - Home-field and home-court advantage scaling (e.g. 3.5 pts football, 4.0 pts basketball)
 * - Tempo & possession-adjusted expected point totals
 * - Win probabilities via normal cumulative distribution function (CDF).
 */
final class CollegeMatchupEngine
{
    /**
     * Projects fair point spread and total points between two college teams.
     *
     * @param array<string,mixed> $homeTeam
     * @param array<string,mixed> $awayTeam
     * @param bool $neutralSite
     * @return array<string,mixed>
     */
    public static function projectMatchup(array $homeTeam, array $awayTeam, bool $neutralSite = false): array
    {
        $sport = strtoupper((string) ($homeTeam['sport'] ?? 'NCAAF'));
        $isFootball = ($sport === 'NCAAF');

        $hAdv = $neutralSite ? 0.0 : (float) ($homeTeam['home_court_adv_pts'] ?? ($isFootball ? 3.0 : 3.5));

        $hNet = (float) ($homeTeam['net_rating'] ?? 10.0);
        $aNet = (float) ($awayTeam['net_rating'] ?? 5.0);

        // Expected margin from Home perspective (Positive = Home favored, Negative = Away favored)
        $margin = ($hNet - $aNet) + $hAdv;
        $fairSpread = round(-1.0 * $margin, 1); // Betting spread convention: -7.5 means favored by 7.5

        // Expected total points:
        // Football: League avg is ~54 pts
        // Basketball: Based on tempo / possessions. Avg is ~142 pts
        $baseTotal = $isFootball ? 54.0 : 142.0;
        $tempoScale = ((float) ($homeTeam['tempo_pace'] ?? 70.0) + (float) ($awayTeam['tempo_pace'] ?? 70.0)) / 140.0;
        $offSum = ((float) ($homeTeam['off_rating'] ?? 30.0) + (float) ($awayTeam['off_rating'] ?? 30.0)) * 0.15;
        $projectedTotal = round(($baseTotal * $tempoScale) + $offSum, 1);

        // Win probability via standard normal distribution approximation
        // Football spread standard deviation is ~14.0 pts; Basketball is ~11.0 pts
        $stdev = $isFootball ? 14.0 : 11.0;
        $z = $margin / $stdev;
        $hProb = self::normalCdf($z);
        $aProb = 1.0 - $hProb;

        return [
            'sport'           => $sport,
            'home_team'       => $homeTeam['team'] ?? 'HOME',
            'away_team'       => $awayTeam['team'] ?? 'AWAY',
            'neutral_site'    => $neutralSite,
            'projected_margin'=> round($margin, 1),
            'fair_spread'     => $fairSpread,
            'projected_total' => $projectedTotal,
            'home_win_prob'   => round($hProb, 3),
            'away_win_prob'   => round($aProb, 3),
            'fair_home_odds'  => SgpCorrelationEngine::probToAmerican($hProb),
            'fair_away_odds'  => SgpCorrelationEngine::probToAmerican($aProb),
            'edge_pick'       => $margin >= 3.0
                ? (($homeTeam['team'] ?? 'HOME') . ' (' . ($fairSpread > 0 ? '+' : '') . $fairSpread . ')')
                : (($awayTeam['team'] ?? 'AWAY') . ' (' . (-1 * $fairSpread > 0 ? '+' : '') . (-1 * $fairSpread) . ')'),
        ];
    }

    /**
     * Approximation of standard normal CDF: Phi(x)
     */
    public static function normalCdf(float $x): float
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
