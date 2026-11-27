<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Modules\Sports\Libraries\NhlSplitsCalculator;
use CodeIgniter\Test\CIUnitTestCase;

final class NhlSplitsCalculatorTest extends CIUnitTestCase
{
    public function testTierForRank(): void
    {
        $this->assertSame('top', NhlSplitsCalculator::tierForRank(1));
        $this->assertSame('top', NhlSplitsCalculator::tierForRank(10));
        $this->assertSame('mid', NhlSplitsCalculator::tierForRank(11));
        $this->assertSame('mid', NhlSplitsCalculator::tierForRank(20));
        $this->assertSame('bottom', NhlSplitsCalculator::tierForRank(21));
        $this->assertSame('bottom', NhlSplitsCalculator::tierForRank(32));
        $this->assertSame('unknown', NhlSplitsCalculator::tierForRank(null));
        $this->assertSame('unknown', NhlSplitsCalculator::tierForRank(0));
    }

    public function testSkaterMarketValues(): void
    {
        $game = [
            'shots_on_goal'    => 5,
            'goals'            => 2,
            'assists'          => 1,
            'powerplay_points' => 1,
            'blocked_shots'    => 2,
        ];

        $this->assertSame(5.0, NhlSplitsCalculator::skaterMarketValue('shots_on_goal', $game));
        $this->assertSame(3.0, NhlSplitsCalculator::skaterMarketValue('points', $game));
        $this->assertSame(2.0, NhlSplitsCalculator::skaterMarketValue('goals', $game));
        $this->assertSame(1.0, NhlSplitsCalculator::skaterMarketValue('assists', $game));
        $this->assertSame(1.0, NhlSplitsCalculator::skaterMarketValue('powerplay_points', $game));
        $this->assertSame(2.0, NhlSplitsCalculator::skaterMarketValue('blocked_shots', $game));
    }

    public function testGoalieMarketValues(): void
    {
        $game = [
            'saves'         => 32,
            'goals_against' => 2,
            'shots_faced'   => 34,
        ];

        $this->assertSame(32.0, NhlSplitsCalculator::goalieMarketValue('saves', $game));
        $this->assertSame(2.0, NhlSplitsCalculator::goalieMarketValue('goals_against', $game));
        $this->assertSame(34.0, NhlSplitsCalculator::goalieMarketValue('shots_faced', $game));
    }

    public function testSpecialTeamsEdge(): void
    {
        // Elite PP (28%) vs Bad PK (72% => 28% allowed). Net edge = (28 + 28) - 42 = +14%
        $edge = NhlSplitsCalculator::specialTeamsEdge(28.0, 72.0);
        $this->assertSame(14.0, $edge['special_teams_edge']);
        $this->assertStringContainsString('Strong Power Play Advantage', $edge['verdict']);

        // Bad PP (15%) vs Elite PK (87% => 13% allowed). Net edge = (15 + 13) - 42 = -14%
        $disadvantage = NhlSplitsCalculator::specialTeamsEdge(15.0, 87.0);
        $this->assertSame(-14.0, $disadvantage['special_teams_edge']);
        $this->assertStringContainsString('Elite Penalty Kill Suppression', $disadvantage['verdict']);
    }

    public function testSkaterSplits(): void
    {
        $defByTeam = [
            'CAR' => ['sog_def_rank' => 1],  // top defense
            'SJS' => ['sog_def_rank' => 32], // bottom defense
        ];

        $games = [
            ['opponent' => 'CAR', 'shots_on_goal' => 2, 'goals' => 0, 'assists' => 1],
            ['opponent' => 'CAR', 'shots_on_goal' => 3, 'goals' => 0, 'assists' => 0],
            ['opponent' => 'SJS', 'shots_on_goal' => 6, 'goals' => 2, 'assists' => 2],
        ];

        $splits = NhlSplitsCalculator::skaterSplits($games, $defByTeam);
        $this->assertArrayHasKey('shots_on_goal', $splits);
        $this->assertSame(3.67, $splits['shots_on_goal']['overall']['avg']);
        $this->assertSame(2.5, $splits['shots_on_goal']['top']['avg']);
        $this->assertSame(6.0, $splits['shots_on_goal']['bottom']['avg']);
    }
}
