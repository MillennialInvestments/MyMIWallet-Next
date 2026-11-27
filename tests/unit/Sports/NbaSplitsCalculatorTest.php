<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Modules\Sports\Libraries\NbaSplitsCalculator;
use CodeIgniter\Test\CIUnitTestCase;

final class NbaSplitsCalculatorTest extends CIUnitTestCase
{
    public function testTierForRank(): void
    {
        $this->assertSame('top', NbaSplitsCalculator::tierForRank(1));
        $this->assertSame('top', NbaSplitsCalculator::tierForRank(10));
        $this->assertSame('mid', NbaSplitsCalculator::tierForRank(11));
        $this->assertSame('mid', NbaSplitsCalculator::tierForRank(20));
        $this->assertSame('bottom', NbaSplitsCalculator::tierForRank(21));
        $this->assertSame('bottom', NbaSplitsCalculator::tierForRank(30));
        $this->assertSame('unknown', NbaSplitsCalculator::tierForRank(null));
        $this->assertSame('unknown', NbaSplitsCalculator::tierForRank(0));
    }

    public function testMarketValues(): void
    {
        $game = [
            'pts'     => 30,
            'reb'     => 10,
            'ast'     => 8,
            'threes'  => 4,
            'steals'  => 2,
            'blocks'  => 1,
        ];

        $this->assertSame(30.0, NbaSplitsCalculator::marketValue('pts', $game));
        $this->assertSame(10.0, NbaSplitsCalculator::marketValue('reb', $game));
        $this->assertSame(8.0, NbaSplitsCalculator::marketValue('ast', $game));
        $this->assertSame(4.0, NbaSplitsCalculator::marketValue('threes', $game));
        $this->assertSame(3.0, NbaSplitsCalculator::marketValue('stocks', $game)); // 2 steals + 1 block
        $this->assertSame(48.0, NbaSplitsCalculator::marketValue('pra', $game)); // 30 + 10 + 8
    }

    public function testTagGamesAndSplits(): void
    {
        $defenseRanks = [
            'BOS' => ['pts_def_rank' => 3, 'reb_def_rank' => 5, 'ast_def_rank' => 4, 'three_def_rank' => 2, 'def_rating_rank' => 2], // top
            'CHA' => ['pts_def_rank' => 28, 'reb_def_rank' => 25, 'ast_def_rank' => 29, 'three_def_rank' => 27, 'def_rating_rank' => 28], // bottom
        ];

        $games = [
            ['opponent' => 'BOS', 'pts' => 22, 'reb' => 8, 'ast' => 6, 'threes' => 2, 'steals' => 1, 'blocks' => 0],
            ['opponent' => 'BOS', 'pts' => 24, 'reb' => 7, 'ast' => 5, 'threes' => 1, 'steals' => 0, 'blocks' => 1],
            ['opponent' => 'CHA', 'pts' => 38, 'reb' => 12, 'ast' => 11, 'threes' => 5, 'steals' => 3, 'blocks' => 2],
        ];

        $tagged = NbaSplitsCalculator::tagGames($games, $defenseRanks);
        $this->assertCount(3, $tagged);
        $this->assertSame('top', $tagged[0]['tiers']['pts']);
        $this->assertSame('bottom', $tagged[2]['tiers']['pts']);

        $splits = NbaSplitsCalculator::splits($tagged);
        $ptsSplits = $splits['pts'];

        $this->assertSame(3, $ptsSplits['overall']['games']);
        $this->assertEqualsWithDelta(28.0, (float) $ptsSplits['overall']['avg'], 0.1);
        $this->assertSame(2, $ptsSplits['top']['games']);
        $this->assertEqualsWithDelta(23.0, (float) $ptsSplits['top']['avg'], 0.1);
        $this->assertSame(1, $ptsSplits['bottom']['games']);
        $this->assertEqualsWithDelta(38.0, (float) $ptsSplits['bottom']['avg'], 0.1);
    }
}
