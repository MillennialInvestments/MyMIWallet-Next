<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Modules\Sports\Libraries\MlbSplitsCalculator;
use CodeIgniter\Test\CIUnitTestCase;

final class MlbSplitsCalculatorTest extends CIUnitTestCase
{
    public function testTierForRank(): void
    {
        $this->assertSame('top', MlbSplitsCalculator::tierForRank(1));
        $this->assertSame('top', MlbSplitsCalculator::tierForRank(10));
        $this->assertSame('mid', MlbSplitsCalculator::tierForRank(11));
        $this->assertSame('mid', MlbSplitsCalculator::tierForRank(20));
        $this->assertSame('bottom', MlbSplitsCalculator::tierForRank(21));
        $this->assertSame('bottom', MlbSplitsCalculator::tierForRank(30));
        $this->assertSame('unknown', MlbSplitsCalculator::tierForRank(null));
        $this->assertSame('unknown', MlbSplitsCalculator::tierForRank(0));
    }

    public function testPitcherMarketValues(): void
    {
        $game = [
            'ip'              => 6.2, // 6 full innings + 2 outs = 20 outs
            'strikeouts'      => 9,
            'hits_allowed'    => 4,
            'er'              => 1,
            'walks'           => 2,
        ];

        $this->assertSame(9.0, MlbSplitsCalculator::pitcherMarketValue('strikeouts', $game));
        $this->assertSame(20.0, MlbSplitsCalculator::pitcherMarketValue('outs_recorded', $game));
        $this->assertSame(4.0, MlbSplitsCalculator::pitcherMarketValue('hits_allowed', $game));
        $this->assertSame(1.0, MlbSplitsCalculator::pitcherMarketValue('earned_runs', $game));
        $this->assertSame(2.0, MlbSplitsCalculator::pitcherMarketValue('walks', $game));
    }

    public function testBatterMarketValues(): void
    {
        $game = [
            'hits'        => 3,
            'doubles'     => 1,
            'triples'     => 0,
            'home_runs'   => 1,
            'total_bases' => 7, // 1 single (1) + 1 double (2) + 1 HR (4) = 7
            'runs'        => 2,
            'rbi'         => 3,
            'strikeouts'  => 1,
        ];

        $this->assertSame(7.0, MlbSplitsCalculator::batterMarketValue('total_bases', $game));
        $this->assertSame(3.0, MlbSplitsCalculator::batterMarketValue('hits', $game));
        $this->assertSame(5.0, MlbSplitsCalculator::batterMarketValue('runs_rbis', $game));
        $this->assertSame(1.0, MlbSplitsCalculator::batterMarketValue('home_runs', $game));
        $this->assertSame(1.0, MlbSplitsCalculator::batterMarketValue('strikeouts', $game));
    }

    public function testBallparkAdjust(): void
    {
        // Sea level neutral park
        $adjSeaLevel = MlbSplitsCalculator::ballparkAdjust(10.0, 1.0, 0);
        $this->assertSame(10.0, $adjSeaLevel);

        // Coors Field (5280 ft altitude, 1.18 run factor)
        $adjCoors = MlbSplitsCalculator::ballparkAdjust(10.0, 1.18, 5280);
        $this->assertGreaterThan(12.0, $adjCoors);
    }

    public function testF5Projection(): void
    {
        $f5 = MlbSplitsCalculator::f5Projection(2.80, 4.50, 1.0, true);

        $this->assertArrayHasKey('team_a_prob', $f5);
        $this->assertArrayHasKey('team_b_prob', $f5);
        $this->assertArrayHasKey('f5_total_runs', $f5);
        $this->assertGreaterThan(0.60, $f5['team_a_prob']);
        $this->assertLessThan(0.40, $f5['team_b_prob']);
        $this->assertSame('Team A F5 ML', $f5['edge_pick']);
    }

    public function testPitcherAndBatterSplits(): void
    {
        $pitcherLogs = [
            ['ip' => 6.0, 'strikeouts' => 9, 'hits_allowed' => 3, 'er' => 1, 'walks' => 1, 'opp_k_rate_rank' => 3], // top K opp
            ['ip' => 7.0, 'strikeouts' => 10, 'hits_allowed' => 2, 'er' => 0, 'walks' => 2, 'opp_k_rate_rank' => 5], // top K opp
            ['ip' => 5.1, 'strikeouts' => 5, 'hits_allowed' => 6, 'er' => 3, 'walks' => 2, 'opp_k_rate_rank' => 25], // bottom K opp
        ];

        $pSplits = MlbSplitsCalculator::pitcherSplits($pitcherLogs);
        $this->assertArrayHasKey('strikeouts', $pSplits);
        $this->assertSame(8.0, $pSplits['strikeouts']['overall']['avg']);
        $this->assertSame(9.5, $pSplits['strikeouts']['top']['avg']);
        $this->assertSame(5.0, $pSplits['strikeouts']['bottom']['avg']);

        $batterLogs = [
            ['opp_pitcher_hand' => 'L', 'hits' => 2, 'doubles' => 1, 'triples' => 0, 'home_runs' => 1, 'total_bases' => 6, 'runs' => 2, 'rbi' => 2, 'strikeouts' => 0],
            ['opp_pitcher_hand' => 'R', 'hits' => 1, 'doubles' => 0, 'triples' => 0, 'home_runs' => 0, 'total_bases' => 1, 'runs' => 0, 'rbi' => 0, 'strikeouts' => 1],
        ];

        $bSplits = MlbSplitsCalculator::batterSplits($batterLogs);
        $this->assertArrayHasKey('total_bases', $bSplits);
        $this->assertSame(6.0, $bSplits['total_bases']['vs_lhp']['avg']);
        $this->assertSame(1.0, $bSplits['total_bases']['vs_rhp']['avg']);
    }
}
