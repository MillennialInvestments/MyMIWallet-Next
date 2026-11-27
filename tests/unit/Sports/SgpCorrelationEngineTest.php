<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Modules\Sports\Libraries\SgpCorrelationEngine;
use CodeIgniter\Test\CIUnitTestCase;

final class SgpCorrelationEngineTest extends CIUnitTestCase
{
    public function testAmericanOddsToProbability(): void
    {
        $this->assertSame(0.5238, SgpCorrelationEngine::americanToProb(-110));
        $this->assertSame(0.5000, SgpCorrelationEngine::americanToProb(100));
        $this->assertSame(0.4000, SgpCorrelationEngine::americanToProb(150));
        $this->assertSame(0.6667, SgpCorrelationEngine::americanToProb(-200));
    }

    public function testProbabilityToAmericanOdds(): void
    {
        $this->assertSame(-110, SgpCorrelationEngine::probToAmerican(0.5238));
        $this->assertSame(100, SgpCorrelationEngine::probToAmerican(0.50));
        $this->assertSame(150, SgpCorrelationEngine::probToAmerican(0.40));
        $this->assertSame(-200, SgpCorrelationEngine::probToAmerican(0.6667));
    }

    public function testCorrelationLookup(): void
    {
        // NFL: QB pass yds + WR rec yds
        $qbWr = SgpCorrelationEngine::lookupCorrelation('NFL', 'qb_pass_yds', 'wr_rec_yds');
        $this->assertSame(0.58, $qbWr['r']);
        $this->assertStringContainsString('Synergistic', $qbWr['synergy']);

        // NBA: PG assists + Center points
        $pgC = SgpCorrelationEngine::lookupCorrelation('NBA', 'pg_assists', 'c_points');
        $this->assertSame(0.42, $pgC['r']);

        // MLB: Pitcher Ks + Under
        $mlbK = SgpCorrelationEngine::lookupCorrelation('MLB', 'pitcher_strikeouts', 'game_total_under');
        $this->assertSame(0.48, $mlbK['r']);

        // NHL: Goalie saves + Under
        $nhlG = SgpCorrelationEngine::lookupCorrelation('NHL', 'goalie_saves', 'game_total_under');
        $this->assertSame(0.35, $nhlG['r']);

        // Unknown pair fallback
        $unk = SgpCorrelationEngine::lookupCorrelation('NFL', 'random_a', 'random_b');
        $this->assertSame(0.0, $unk['r']);
        $this->assertSame('Independent', $unk['synergy']);
    }

    public function testEvaluateTwoLegSgp(): void
    {
        // Positively correlated parlay:
        // Leg A (-115, 53.49%), Leg B (-115, 53.49%), r = +0.58
        // Independent joint prob = 28.6% (+250 independent odds).
        // Correlated joint prob = 43.0% (+132 fair correlated odds).
        // If the sportsbook offers +185, payout exceeds fair correlated price => +EV!
        $eval = SgpCorrelationEngine::evaluateTwoLegSgp(-115, -115, 0.58, 185);

        $this->assertArrayHasKey('fair_correlated_prob', $eval);
        $this->assertArrayHasKey('fair_correlated_odds', $eval);
        $this->assertArrayHasKey('ev_percentage', $eval);
        $this->assertGreaterThan(0.0, $eval['ev_percentage']);
        $this->assertStringContainsString('+EV', $eval['verdict']);

        // Cannibalistic parlay (-0.22) where book only offers standard independent odds (+260)
        // Joint prob drops below independent => -EV!
        $evalNeg = SgpCorrelationEngine::evaluateTwoLegSgp(-110, -110, -0.22, 220);
        $this->assertLessThan(0.0, $evalNeg['ev_percentage']);
        $this->assertStringContainsString('-EV', $evalNeg['verdict']);
    }
}
