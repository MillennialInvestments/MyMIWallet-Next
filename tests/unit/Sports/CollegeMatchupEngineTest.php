<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Modules\Sports\Libraries\CollegeMatchupEngine;
use CodeIgniter\Test\CIUnitTestCase;

final class CollegeMatchupEngineTest extends CIUnitTestCase
{
    public function testNormalCdf(): void
    {
        $this->assertEqualsWithDelta(0.5000, CollegeMatchupEngine::normalCdf(0.0), 0.001);
        $this->assertEqualsWithDelta(0.8413, CollegeMatchupEngine::normalCdf(1.0), 0.001);
        $this->assertEqualsWithDelta(0.1587, CollegeMatchupEngine::normalCdf(-1.0), 0.001);
    }

    public function testProjectMatchupFootball(): void
    {
        $home = [
            'sport'              => 'NCAAF',
            'team'               => 'UGA',
            'net_rating'         => 24.0,
            'off_rating'         => 40.0,
            'tempo_pace'         => 68.0,
            'home_court_adv_pts' => 3.5,
        ];

        $away = [
            'sport'      => 'NCAAF',
            'team'       => 'ALA',
            'net_rating' => 17.0,
            'off_rating' => 38.0,
            'tempo_pace' => 70.0,
        ];

        $res = CollegeMatchupEngine::projectMatchup($home, $away);

        // Expected margin = (24 - 17) + 3.5 = +10.5
        // Fair spread = -10.5
        $this->assertSame(10.5, $res['projected_margin']);
        $this->assertSame(-10.5, $res['fair_spread']);
        $this->assertGreaterThan(0.70, $res['home_win_prob']);
        $this->assertStringContainsString('UGA (-10.5)', $res['edge_pick']);
    }

    public function testProjectMatchupBasketballNeutralSite(): void
    {
        $home = [
            'sport'              => 'NCAAB',
            'team'               => 'UCONN',
            'net_rating'         => 30.0,
            'off_rating'         => 120.0,
            'tempo_pace'         => 66.0,
            'home_court_adv_pts' => 4.5,
        ];

        $away = [
            'sport'      => 'NCAAB',
            'team'       => 'KU',
            'net_rating' => 26.0,
            'off_rating' => 118.0,
            'tempo_pace' => 69.0,
        ];

        // Neutral site game should ignore home_court_adv_pts
        $res = CollegeMatchupEngine::projectMatchup($home, $away, true);

        // Expected margin = 30 - 26 = +4.0
        $this->assertSame(4.0, $res['projected_margin']);
        $this->assertSame(-4.0, $res['fair_spread']);
        $this->assertTrue($res['neutral_site']);
    }
}
