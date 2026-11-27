<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Modules\Sports\Libraries\GoldilocksEngine;
use App\Modules\Sports\Libraries\QbSplitsCalculator;
use CodeIgniter\Test\CIUnitTestCase;

final class QbSplitsCalculatorTest extends CIUnitTestCase
{
    public function testTierForRank(): void
    {
        $this->assertSame('top', QbSplitsCalculator::tierForRank(1));
        $this->assertSame('top', QbSplitsCalculator::tierForRank(10));
        $this->assertSame('mid', QbSplitsCalculator::tierForRank(11));
        $this->assertSame('mid', QbSplitsCalculator::tierForRank(22));
        $this->assertSame('bottom', QbSplitsCalculator::tierForRank(23));
        $this->assertSame('bottom', QbSplitsCalculator::tierForRank(32));
        $this->assertSame('unknown', QbSplitsCalculator::tierForRank(null));
        $this->assertSame('unknown', QbSplitsCalculator::tierForRank(0));
    }

    public function testRankForMarket(): void
    {
        $def = [
            'pass_def_rank'    => 5,
            'pass_td_def_rank' => 12,
            'rush_def_rank'    => 28,
        ];

        $this->assertSame(5, QbSplitsCalculator::rankForMarket('pass_yds', $def));
        $this->assertSame(5, QbSplitsCalculator::rankForMarket('completions', $def));
        $this->assertSame(12, QbSplitsCalculator::rankForMarket('pass_tds', $def));
        $this->assertSame(28, QbSplitsCalculator::rankForMarket('rush_yds', $def));
    }

    public function testMarketValueExtraction(): void
    {
        $game = [
            'pass_yds'      => 285,
            'pass_td'       => 3,
            'completions'   => 24,
            'pass_att'      => 35,
            'interceptions' => 1,
            'rush_yds'      => 18,
        ];

        $this->assertSame(285.0, QbSplitsCalculator::marketValue('pass_yds', $game));
        $this->assertSame(3.0, QbSplitsCalculator::marketValue('pass_tds', $game));
        $this->assertSame(24.0, QbSplitsCalculator::marketValue('completions', $game));
        $this->assertSame(35.0, QbSplitsCalculator::marketValue('pass_att', $game));
        $this->assertSame(1.0, QbSplitsCalculator::marketValue('interceptions', $game));
        $this->assertSame(18.0, QbSplitsCalculator::marketValue('rush_yds', $game));
    }

    public function testTagGamesAndSplits(): void
    {
        $games = [
            ['season' => 2026, 'week' => 1, 'opponent' => 'BAL', 'pass_att' => 30, 'completions' => 20, 'pass_yds' => 220, 'pass_td' => 1, 'interceptions' => 1, 'rush_yds' => 10],
            ['season' => 2026, 'week' => 2, 'opponent' => 'CIN', 'pass_att' => 35, 'completions' => 25, 'pass_yds' => 310, 'pass_td' => 3, 'interceptions' => 0, 'rush_yds' => 15],
            ['season' => 2026, 'week' => 3, 'opponent' => 'CLE', 'pass_att' => 28, 'completions' => 18, 'pass_yds' => 200, 'pass_td' => 1, 'interceptions' => 2, 'rush_yds' => 5],
        ];

        $defLookup = static function (array $g) {
            return match ($g['opponent']) {
                'BAL' => ['pass_def_rank' => 3, 'rush_def_rank' => 5],   // top
                'CIN' => ['pass_def_rank' => 25, 'rush_def_rank' => 20], // bottom pass, mid rush
                'CLE' => ['pass_def_rank' => 8, 'rush_def_rank' => 8],   // top
                default => null,
            };
        };

        $tagged = QbSplitsCalculator::tagGames($games, $defLookup);
        $this->assertCount(3, $tagged);
        $this->assertSame('top', $tagged[0]['tiers']['pass_yds']);
        $this->assertSame('bottom', $tagged[1]['tiers']['pass_yds']);
        $this->assertSame('top', $tagged[2]['tiers']['pass_yds']);

        $splits = QbSplitsCalculator::splits($tagged);
        $this->assertArrayHasKey('pass_yds', $splits);
        $this->assertSame(3, $splits['pass_yds']['overall']['games']);
        $this->assertSame(round((220 + 310 + 200) / 3, 2), $splits['pass_yds']['overall']['avg']);
        $this->assertSame(2, $splits['pass_yds']['top']['games']);
        $this->assertSame(210.0, $splits['pass_yds']['top']['avg']);
        $this->assertSame(1, $splits['pass_yds']['bottom']['games']);
        $this->assertSame(310.0, $splits['pass_yds']['bottom']['avg']);

        // Goldilocks evaluation on QB
        $opp = ['pass_def_rank' => 26, 'rush_def_rank' => 24]; // soft pass defense
        $lines = [
            ['market' => 'pass_yds', 'line' => 235.5, 'over_odds' => -110, 'under_odds' => -110],
            ['market' => 'pass_tds', 'line' => 1.5, 'over_odds' => -120, 'under_odds' => 100],
        ];

        $res = GoldilocksEngine::evaluate($tagged, $opp, $lines, 'QB');
        $this->assertSame('QB', $res['position']);
        $this->assertNotEmpty($res['projections']['pass_yds']);
        $this->assertGreaterThan(220, $res['projections']['pass_yds']['projection']);
        $this->assertCount(4, $res['candidates']);
    }
}
