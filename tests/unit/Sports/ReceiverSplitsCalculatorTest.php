<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Modules\Sports\Libraries\GoldilocksEngine;
use App\Modules\Sports\Libraries\ReceiverSplitsCalculator;
use CodeIgniter\Test\CIUnitTestCase;

final class ReceiverSplitsCalculatorTest extends CIUnitTestCase
{
    public function testTierForRank(): void
    {
        $this->assertSame('top', ReceiverSplitsCalculator::tierForRank(1));
        $this->assertSame('top', ReceiverSplitsCalculator::tierForRank(10));
        $this->assertSame('mid', ReceiverSplitsCalculator::tierForRank(15));
        $this->assertSame('bottom', ReceiverSplitsCalculator::tierForRank(30));
        $this->assertSame('unknown', ReceiverSplitsCalculator::tierForRank(null));
    }

    public function testMarketValueExtraction(): void
    {
        $game = [
            'rec_yds'    => 115,
            'receptions' => 8,
            'targets'    => 12,
            'rec_td'     => 1,
            'rush_td'    => 0,
        ];

        $this->assertSame(115.0, ReceiverSplitsCalculator::marketValue('rec_yds', $game));
        $this->assertSame(8.0, ReceiverSplitsCalculator::marketValue('receptions', $game));
        $this->assertSame(12.0, ReceiverSplitsCalculator::marketValue('targets', $game));
        $this->assertSame(1.0, ReceiverSplitsCalculator::marketValue('anytime_td', $game));
    }

    public function testTagGamesAndReceiverSplits(): void
    {
        $games = [
            ['season' => 2026, 'week' => 1, 'opponent' => 'DEN', 'targets' => 10, 'receptions' => 7, 'rec_yds' => 85, 'rec_td' => 1],
            ['season' => 2026, 'week' => 2, 'opponent' => 'WAS', 'targets' => 14, 'receptions' => 11, 'rec_yds' => 140, 'rec_td' => 2],
            ['season' => 2026, 'week' => 3, 'opponent' => 'NYJ', 'targets' => 6, 'receptions' => 4, 'rec_yds' => 45, 'rec_td' => 0],
        ];

        $defLookup = static function (array $g) {
            return match ($g['opponent']) {
                'DEN' => ['pass_def_rank' => 5],  // top
                'WAS' => ['pass_def_rank' => 30], // bottom
                'NYJ' => ['pass_def_rank' => 3],  // top
                default => null,
            };
        };

        $tagged = ReceiverSplitsCalculator::tagGames($games, $defLookup);
        $this->assertCount(3, $tagged);
        $this->assertSame('top', $tagged[0]['tiers']['rec_yds']);
        $this->assertSame('bottom', $tagged[1]['tiers']['rec_yds']);
        $this->assertSame('top', $tagged[2]['tiers']['rec_yds']);

        $splits = ReceiverSplitsCalculator::splits($tagged);
        $this->assertArrayHasKey('rec_yds', $splits);
        $this->assertArrayHasKey('receptions', $splits);
        $this->assertSame(3, $splits['rec_yds']['overall']['games']);
        $this->assertSame(2, $splits['rec_yds']['top']['games']);
        $this->assertSame(65.0, $splits['rec_yds']['top']['avg']);
        $this->assertSame(140.0, $splits['rec_yds']['bottom']['avg']);

        // Goldilocks WR evaluation
        $opp = ['pass_def_rank' => 28]; // bottom tier pass defense
        $lines = [
            ['market' => 'rec_yds', 'line' => 75.5, 'over_odds' => -110, 'under_odds' => -110],
            ['market' => 'receptions', 'line' => 5.5, 'over_odds' => -115, 'under_odds' => -105],
        ];

        $res = GoldilocksEngine::evaluate($tagged, $opp, $lines, 'WR');
        $this->assertSame('WR', $res['position']);
        $this->assertGreaterThan(70, $res['projections']['rec_yds']['projection']);
        $this->assertCount(4, $res['candidates']);
    }
}
