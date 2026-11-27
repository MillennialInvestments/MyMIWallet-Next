<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Database\Migrations\CreateSportsBetTrackerAndUserSettingsTables;
use App\Database\Migrations\CreateSportsPropAnalyticsTables;
use App\Database\Migrations\CreateSportsPropLinesTable;
use App\Database\Migrations\CreateSportsQbWrMatchupTables;
use App\Modules\Sports\Controllers\SportsController;
use App\Modules\Sports\Libraries\BettingCalculators;
use App\Modules\Sports\Libraries\SportsBetTrackerService;
use App\Modules\Sports\Libraries\SportsPropsService;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Config\Database;

require_once APPPATH . 'Database/Migrations/2026-11-27-000100_CreateSportsPropAnalyticsTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000200_CreateSportsPropLinesTable.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000300_CreateSportsQbWrMatchupTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000400_CreateSportsBetTrackerAndUserSettingsTables.php';

final class SportsAdvancedTabsTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    private string $prefix = '';

    protected function setUp(): void
    {
        parent::setUp();
        config('Encryption')->key = str_repeat('k', 32);
        $db = Database::connect();
        $this->prefix = $db->getPrefix();
        $db->setPrefix('');
        $db->resetDataCache();

        (new CreateSportsPropAnalyticsTables(Database::forge()))->up();
        (new CreateSportsPropLinesTable(Database::forge()))->up();
        (new CreateSportsQbWrMatchupTables(Database::forge()))->up();
        (new CreateSportsBetTrackerAndUserSettingsTables(Database::forge()))->up();
        $db->resetDataCache();
    }

    protected function tearDown(): void
    {
        \Config\Services::resetSingle('authentication');
        (new CreateSportsBetTrackerAndUserSettingsTables(Database::forge()))->down();
        (new CreateSportsQbWrMatchupTables(Database::forge()))->down();
        (new CreateSportsPropLinesTable(Database::forge()))->down();
        (new CreateSportsPropAnalyticsTables(Database::forge()))->down();
        Database::connect()->setPrefix($this->prefix);
        Database::connect()->resetDataCache();
        parent::tearDown();
    }

    public function testUnauthenticatedRedirects(): void
    {
        // Route group is guarded by 'login' filter
        $paths = [
            'MyMISports/NBA',
            'MyMISports/Tracker',
            'MyMISports/Odds',
            'MyMISports/Calculators',
            'MyMISports/Settings',
        ];

        foreach ($paths as $p) {
            $res = $this->get($p);
            $this->assertTrue($res->isRedirect(), "Route {$p} must redirect unauthenticated visitors to login.");
        }
    }

    public function testNbaPlayerReportAndSplits(): void
    {
        $db = Database::connect();
        $svc = new SportsPropsService($db);
        $this->assertTrue($svc->nbaTablesReady());

        $players = $svc->listNbaPlayers(2025);
        $this->assertNotEmpty($players);

        $first = $players[0];
        $this->assertSame('NBA', $first['sport']);
        $this->assertGreaterThan(0, $first['pts_pg']);

        $report = $svc->nbaPlayerReport((int) $first['id'], 2025, 'BOS');
        $this->assertNotNull($report);
        $this->assertNotEmpty($report['splits']['pts']);
        $this->assertNotEmpty($report['tagged_games']);
    }

    public function testMultiBookOddsMatrix(): void
    {
        $db = Database::connect();
        $svc = new SportsPropsService($db);

        $nflOdds = $svc->multiBookOddsMatrix('NFL');
        $this->assertNotEmpty($nflOdds);
        $this->assertArrayHasKey('books', $nflOdds[0]);
        $this->assertArrayHasKey('DraftKings', $nflOdds[0]['books']);
        $this->assertArrayHasKey('FanDuel', $nflOdds[0]['books']);

        $nbaOdds = $svc->multiBookOddsMatrix('NBA');
        $this->assertNotEmpty($nbaOdds);
        $this->assertSame('Points', $nbaOdds[0]['market_label']);
    }

    public function testCalculateApiDirectly(): void
    {
        $controller = new SportsController();
        $controller->initController(
            \Config\Services::request(),
            \Config\Services::response(),
            \Config\Services::logger()
        );

        // Test pure math via BettingCalculators
        $kelly = BettingCalculators::kelly(1000.0, 100, 0.60, 0.5);
        $this->assertTrue($kelly['has_edge']);
        $this->assertEqualsWithDelta(10.0, $kelly['recommended_pct'], 0.1);
        $this->assertEqualsWithDelta(100.0, $kelly['recommended_stake'], 1.0);

        $arb = BettingCalculators::arbitrage(1000.0, 120, -105);
        $this->assertTrue($arb['is_arbitrage']);
        $this->assertGreaterThan(0, $arb['guaranteed_profit']);

        $noVig = BettingCalculators::noVig(-110, -110, 0.55);
        $this->assertEqualsWithDelta(4.76, $noVig['market_vig_pct'], 0.1);
        $this->assertSame(100, $noVig['fair_odds_a']);
    }
}
