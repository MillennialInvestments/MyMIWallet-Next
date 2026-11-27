<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Database\Migrations\CreateSportsPropAnalyticsTables;
use App\Database\Migrations\CreateSportsQbWrMatchupTables;
use App\Modules\Sports\Libraries\SportsPropsService;
use App\Modules\Sports\Libraries\TeamMatchupCalculator;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;

require_once APPPATH . 'Database/Migrations/2026-11-27-000100_CreateSportsPropAnalyticsTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000300_CreateSportsQbWrMatchupTables.php';

final class TeamMatchupCalculatorTest extends CIUnitTestCase
{
    private string $prefix = '';

    protected function setUp(): void
    {
        parent::setUp();
        $db = Database::connect();
        $this->prefix = $db->getPrefix();
        $db->setPrefix('');
        $db->resetDataCache();
        (new CreateSportsPropAnalyticsTables(Database::forge()))->up();
        (new CreateSportsQbWrMatchupTables(Database::forge()))->up();
        $db->resetDataCache();
    }

    protected function tearDown(): void
    {
        (new CreateSportsQbWrMatchupTables(Database::forge()))->down();
        (new CreateSportsPropAnalyticsTables(Database::forge()))->down();
        Database::connect()->setPrefix($this->prefix);
        Database::connect()->resetDataCache();
        parent::tearDown();
    }

    public function testProjectMatchupCalculatesScoresAndProbabilities(): void
    {
        $homeStats = [
            'points_scored_pg'   => 28.0,
            'points_allowed_pg'  => 17.5,
            'recent_scored_pg'   => 30.0,
            'recent_allowed_pg'  => 14.0,
        ];
        $awayStats = [
            'points_scored_pg'   => 20.0,
            'points_allowed_pg'  => 26.0,
            'recent_scored_pg'   => 18.0,
            'recent_allowed_pg'  => 28.0,
        ];

        $res = TeamMatchupCalculator::projectMatchup($homeStats, $awayStats);

        $this->assertGreaterThan($res['away_score'], $res['home_score'], 'Strong home team should project to outscore weak visitor');
        $this->assertLessThan(0, $res['projected_spread'], 'Negative spread indicates home favorite');
        $this->assertGreaterThan(0.5, $res['home_win_prob'], 'Home favorite has > 50% win chance');
        $this->assertEqualsWithDelta(1.0, $res['home_win_prob'] + $res['away_win_prob'], 0.01);
        $this->assertSame(round($res['home_score'] + $res['away_score'], 1), $res['projected_total']);
    }

    public function testEvaluateSpreadIdentifiesEdge(): void
    {
        // Projected spread is Home -7.0, offered spread is Home -3.5 (under-priced favorite)
        $eval = TeamMatchupCalculator::evaluateSpread(-7.0, -3.5, -110, -110);

        $this->assertArrayHasKey('home', $eval);
        $this->assertArrayHasKey('away', $eval);
        $this->assertSame('spread', $eval['home']['market']);
        $this->assertStringContainsString('Home -3.5', $eval['home']['pick']);
        $this->assertGreaterThan(0.55, $eval['home']['model_prob']);
        $this->assertGreaterThan(0.03, $eval['home']['edge']);
        $this->assertGreaterThan(0, $eval['home']['ev_per_dollar']);
        $this->assertTrue($eval['home']['goldilocks']);
    }

    public function testEvaluateTotalIdentifiesOverEdge(): void
    {
        // Projected total 52.0 vs offered total 44.5
        $eval = TeamMatchupCalculator::evaluateTotal(52.0, 44.5, -110, -110);

        $this->assertArrayHasKey('over', $eval);
        $this->assertArrayHasKey('under', $eval);
        $this->assertSame('total', $eval['over']['market']);
        $this->assertStringContainsString('Over 44.5', $eval['over']['pick']);
        $this->assertGreaterThan(0.55, $eval['over']['model_prob']);
        $this->assertGreaterThan(0, $eval['over']['ev_per_dollar']);
        $this->assertTrue($eval['over']['goldilocks']);
    }

    public function testEvaluateMoneylineIdentifiesUpsetOrFavorite(): void
    {
        // 65% model win probability vs -130 odds (56.5% implied)
        $eval = TeamMatchupCalculator::evaluateMoneyline(0.65, -130, 110);

        $this->assertArrayHasKey('home', $eval);
        $this->assertArrayHasKey('away', $eval);
        $this->assertSame('moneyline', $eval['home']['market']);
        $this->assertStringContainsString('Home ML', $eval['home']['pick']);
        $this->assertGreaterThan(0.03, $eval['home']['edge']);
        $this->assertTrue($eval['home']['goldilocks']);
    }

    public function testSportsPropsServiceMatchupReport(): void
    {
        $db = Database::connect();
        $svc = new SportsPropsService($db);

        $now = date('Y-m-d H:i:s');
        // Insert defense ranks for KC and DEN
        $db->table(SportsPropsService::T_DEFENSE)->insertBatch([
            ['provider' => 'nflverse', 'season' => 2026, 'week' => 1, 'team' => 'KC', 'rush_def_rank' => 10, 'rb_rec_def_rank' => 8, 'pass_def_rank' => 6, 'scoring_def_rank' => 5, 'points_allowed_pg' => 17.2, 'created_at' => $now, 'updated_at' => $now],
            ['provider' => 'nflverse', 'season' => 2026, 'week' => 1, 'team' => 'DEN', 'rush_def_rank' => 24, 'rb_rec_def_rank' => 20, 'pass_def_rank' => 22, 'scoring_def_rank' => 20, 'points_allowed_pg' => 24.5, 'created_at' => $now, 'updated_at' => $now],
        ]);

        $lines = [
            ['market' => 'spread', 'line' => -4.5, 'over_odds' => -110, 'under_odds' => -110],
            ['market' => 'total', 'line' => 45.5, 'over_odds' => -110, 'under_odds' => -110],
            ['market' => 'moneyline', 'line' => 0.0, 'over_odds' => -180, 'under_odds' => 150],
        ];

        $report = $svc->matchupReport('KC', 'DEN', 2026, $lines);

        $this->assertSame('KC', $report['home_team']);
        $this->assertSame('DEN', $report['away_team']);
        $this->assertNotEmpty($report['projection']);
        $this->assertCount(6, $report['candidates']); // 2 sides per each of the 3 lines
        $this->assertNotNull($report['verdict']);
    }
}
