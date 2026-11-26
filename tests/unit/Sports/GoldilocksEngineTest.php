<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Modules\Sports\Libraries\GoldilocksEngine;
use App\Modules\Sports\Libraries\RbSplitsCalculator;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * Pure-math certification for RB defense-tier splits and the Goldilocks pick.
 */
final class GoldilocksEngineTest extends CIUnitTestCase
{
    /** Opponent => [rush rank, RB receiving rank] */
    private const DEF = [
        'TOP' => [3, 5], 'MID' => [16, 15], 'BOT' => [30, 28],
    ];

    private function games(): array
    {
        // 4 games vs top-10 D (low), 4 vs mid, 4 vs bottom-10 D (high)
        $rows = [];
        $plan = [
            ['TOP', 40, 10], ['TOP', 50, 14], ['TOP', 45, 12], ['TOP', 55, 16],
            ['MID', 70, 20], ['MID', 65, 22], ['MID', 75, 18], ['MID', 70, 24],
            ['BOT', 100, 30], ['BOT', 110, 34], ['BOT', 95, 28], ['BOT', 105, 32],
        ];
        foreach ($plan as $i => [$opp, $rush, $rec]) {
            $rows[] = ['season' => 2025, 'week' => 12 - $i, 'opponent' => $opp, 'rush_yds' => $rush, 'rec_yds' => $rec];
        }

        return RbSplitsCalculator::tagGames($rows, static fn ($g) => ['rush_def_rank' => self::DEF[$g['opponent']][0], 'rb_rec_def_rank' => self::DEF[$g['opponent']][1]]);
    }

    public function testTierBoundaries(): void
    {
        $this->assertSame('top', RbSplitsCalculator::tierForRank(1));
        $this->assertSame('top', RbSplitsCalculator::tierForRank(10));
        $this->assertSame('mid', RbSplitsCalculator::tierForRank(11));
        $this->assertSame('mid', RbSplitsCalculator::tierForRank(22));
        $this->assertSame('bottom', RbSplitsCalculator::tierForRank(23));
        $this->assertSame('bottom', RbSplitsCalculator::tierForRank(32));
        $this->assertSame('unknown', RbSplitsCalculator::tierForRank(null));
    }

    public function testGamesSortedOldestFirstAndTagged(): void
    {
        $g = $this->games();
        $this->assertSame(1, $g[0]['week']);
        $this->assertSame(12, $g[11]['week']);
        $this->assertSame('bottom', $g[0]['tiers']['rush_yds']);
        $this->assertSame(137, (int) $g[0]['rush_rec_yds']); // week 1 = 105 rush + 32 rec
    }

    public function testSplitsAveragesByTier(): void
    {
        $s = RbSplitsCalculator::splits($this->games());
        $this->assertSame(47.5, $s['rush_yds']['top']['avg']);
        $this->assertSame(70.0, $s['rush_yds']['mid']['avg']);
        $this->assertSame(102.5, $s['rush_yds']['bottom']['avg']);
        $this->assertSame(4, $s['rush_yds']['top']['games']);
        $this->assertSame(12, $s['rush_yds']['overall']['games']);
        $this->assertSame(73.33, $s['rush_yds']['overall']['avg']);
        $this->assertSame(13.0, $s['rec_yds']['top']['avg']);
        $this->assertSame(5, $s['rush_yds']['last5']['games']);
        $this->assertSame(0, $s['rush_yds']['unknown']['games']);
        $this->assertSame(['games' => 0, 'avg' => null, 'median' => null, 'stddev' => null, 'min' => null, 'max' => null], RbSplitsCalculator::stats([]));
        $this->assertSame(2.5, RbSplitsCalculator::stats([1, 2, 3, 4])['median']);
    }

    public function testProjectionFollowsMatchup(): void
    {
        $games = $this->games();
        $vsTop = GoldilocksEngine::evaluate($games, ['rush_def_rank' => 4, 'rb_rec_def_rank' => 6]);
        $vsBottom = GoldilocksEngine::evaluate($games, ['rush_def_rank' => 31, 'rb_rec_def_rank' => 30]);

        $this->assertSame('top', $vsTop['opponent_tiers']['rush_yds']);
        $this->assertSame('bottom', $vsBottom['opponent_tiers']['rush_yds']);
        $this->assertLessThan($vsBottom['projections']['rush_yds']['projection'], $vsTop['projections']['rush_yds']['projection']);
        $this->assertLessThan($vsBottom['projections']['rec_yds']['projection'], $vsTop['projections']['rec_yds']['projection']);
        $this->assertSame('high', $vsTop['projections']['rush_yds']['confidence']);
        // No lines: suggestions exist and the over line sits below the under line.
        $sl = $vsBottom['suggested_lines']['rush_yds'];
        $this->assertNotNull($sl['over_at_or_below']);
        $this->assertLessThan($sl['under_at_or_above'], $sl['over_at_or_below']);
        $this->assertNull($vsBottom['best']);
    }

    public function testGoldilocksPicksTheSweetSpot(): void
    {
        $games = $this->games();
        $lines = [
            ['market' => 'rush_yds', 'line' => 68.5, 'over_odds' => -110, 'under_odds' => -110],   // soft line vs bottom D: value over
            ['market' => 'rush_yds', 'line' => 20.5, 'over_odds' => -2000, 'under_odds' => 1000], // near-certain: too safe
            ['market' => 'rec_yds', 'line' => 45.5, 'over_odds' => 300, 'under_odds' => -400],    // long shot over
        ];
        $r = GoldilocksEngine::evaluate($games, ['rush_def_rank' => 30, 'rb_rec_def_rank' => 29], $lines);

        $this->assertNotNull($r['best']);
        $this->assertSame('rush_yds', $r['best']['market']);
        $this->assertSame(68.5, $r['best']['line']);
        $this->assertSame('over', $r['best']['side']);
        $this->assertGreaterThanOrEqual(GoldilocksEngine::MIN_PROB, $r['best']['model_prob']);
        $this->assertLessThanOrEqual(GoldilocksEngine::MAX_PROB, $r['best']['model_prob']);
        $this->assertGreaterThan(0, $r['best']['ev_per_dollar']);
        $this->assertCount(6, $r['candidates']);

        foreach ($r['candidates'] as $c) {
            if ($c['line'] === 20.5 && $c['side'] === 'over') {
                $this->assertFalse($c['goldilocks']);
                $this->assertStringContainsString('too safe', implode(' ', $c['why_not']));
            }
            if ($c['line'] === 45.5 && $c['side'] === 'over') {
                $this->assertFalse($c['goldilocks']);
                $this->assertStringContainsString('too risky', implode(' ', $c['why_not']));
            }
        }
        $this->assertStringContainsString('Goldilocks pick', $r['verdict']);
    }

    public function testNoGoldilocksWhenLineIsSharp(): void
    {
        $games = $this->games();
        // Line 69 vs a mid defense sits where neither side has 3 points of edge.
        $r = GoldilocksEngine::evaluate($games, ['rush_def_rank' => 16, 'rb_rec_def_rank' => 16], [
            ['market' => 'rush_yds', 'line' => 69.0, 'over_odds' => -110, 'under_odds' => -110],
        ]);
        $this->assertNull($r['best']);
        $this->assertStringContainsString('Pass', $r['verdict']);
    }

    public function testOddsMath(): void
    {
        $this->assertEqualsWithDelta(0.5238, GoldilocksEngine::impliedProb(-110), 0.0001);
        $this->assertEqualsWithDelta(0.4, GoldilocksEngine::impliedProb(150), 0.0001);
        $this->assertEqualsWithDelta(0.9091, GoldilocksEngine::payoutPerDollar(-110), 0.0001);
        $this->assertEqualsWithDelta(1.5, GoldilocksEngine::payoutPerDollar(150), 0.0001);
        $this->assertEqualsWithDelta(0.5, GoldilocksEngine::normalCdf(0.0), 1e-6);
        $this->assertEqualsWithDelta(0.8413, GoldilocksEngine::normalCdf(1.0), 1e-4);
        $this->assertEqualsWithDelta(0.0228, GoldilocksEngine::normalCdf(-2.0), 1e-4);
    }

    public function testParseLinesRejectsJunk(): void
    {
        $lines = GoldilocksEngine::parseLines('rush_yds:65.5:-115:-105,bogus:10,rec_yds:abc,rec_yds:22.5:+120,rush_rec_yds:-5', ['rush_rec_yds', 'rec_yds'], ['88.5', ''], ['-110', ''], ['50', '']);
        $this->assertCount(3, $lines);
        $this->assertSame(['market' => 'rush_yds', 'line' => 65.5, 'over_odds' => -115, 'under_odds' => -105], $lines[0]);
        $this->assertSame(120, $lines[1]['over_odds']);
        $this->assertNull($lines[1]['under_odds']);
        $this->assertSame('rush_rec_yds', $lines[2]['market']);
        $this->assertNull($lines[2]['under_odds']); // "50" is not valid American odds
    }
}
