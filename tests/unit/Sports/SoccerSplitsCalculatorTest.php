<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Modules\Sports\Libraries\SoccerSplitsCalculator;
use CodeIgniter\Test\CIUnitTestCase;

final class SoccerSplitsCalculatorTest extends CIUnitTestCase
{
    public function testPoissonProbability(): void
    {
        // For lambda = 2.0, P(k = 0) = e^-2 = ~0.1353
        $p0 = SoccerSplitsCalculator::poisson(0, 2.0);
        $this->assertEqualsWithDelta(0.1353, $p0, 0.001);

        // For lambda = 2.0, P(k = 2) = (4 * e^-2) / 2 = ~0.2707
        $p2 = SoccerSplitsCalculator::poisson(2, 2.0);
        $this->assertEqualsWithDelta(0.2707, $p2, 0.001);
    }

    public function testSimulateMatch(): void
    {
        // Strong home favorite (xG 2.40 vs 0.80)
        $sim = SoccerSplitsCalculator::simulateMatch(2.40, 0.80);

        $this->assertArrayHasKey('home_win_prob', $sim);
        $this->assertArrayHasKey('draw_prob', $sim);
        $this->assertArrayHasKey('away_win_prob', $sim);
        $this->assertArrayHasKey('btts_prob', $sim);
        $this->assertArrayHasKey('over_25_prob', $sim);

        // Home team should have majority win probability
        $this->assertGreaterThan(0.60, $sim['home_win_prob']);
        $this->assertLessThan(0.20, $sim['away_win_prob']);

        // Check fair odds signs
        $this->assertLessThan(0, $sim['fair_home_odds']); // Minus money favorite
        $this->assertGreaterThan(0, $sim['fair_away_odds']); // Plus money underdog
    }

    public function testProjectXg(): void
    {
        $homeStats = ['xg_for_pg' => 2.20, 'xg_against_pg' => 0.90];
        $awayStats = ['xg_for_pg' => 1.50, 'xg_against_pg' => 1.40];

        $proj = SoccerSplitsCalculator::projectXg($homeStats, $awayStats);

        $this->assertArrayHasKey('home_xg', $proj);
        $this->assertArrayHasKey('away_xg', $proj);
        $this->assertGreaterThan($proj['away_xg'], $proj['home_xg']);
    }
}
