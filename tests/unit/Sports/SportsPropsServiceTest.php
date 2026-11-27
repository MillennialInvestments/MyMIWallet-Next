<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Database\Migrations\CreateSportsPropAnalyticsTables;
use App\Modules\Sports\Controllers\SportsController;
use App\Modules\Sports\Libraries\Providers\CsvStatsProvider;
use App\Modules\Sports\Libraries\SportsPropsService;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use Config\Database;

/**
 * End-to-end certification on SQLite: migration, sample import (idempotent),
 * no look-ahead defense ranks, player report, sample removal, CSV import,
 * and the login guard on the web routes.
 */
require_once APPPATH . 'Database/Migrations/2026-11-27-000100_CreateSportsPropAnalyticsTables.php';

final class SportsPropsServiceTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    private SportsPropsService $svc;
    private string $tmp;
    private string $prefix = '';

    protected function setUp(): void
    {
        parent::setUp();
        $db = Database::connect();
        // Production uses an empty DBPrefix and explicit bf_ table names; mirror that here.
        $this->prefix = $db->getPrefix();
        $db->setPrefix('');
        $db->resetDataCache();
        (new CreateSportsPropAnalyticsTables(Database::forge()))->up();
        $db->resetDataCache();
        $this->svc = new SportsPropsService($db);
        $this->tmp = sys_get_temp_dir() . '/sports_' . bin2hex(random_bytes(4));
        mkdir($this->tmp);
    }

    protected function tearDown(): void
    {
        (new CreateSportsPropAnalyticsTables(Database::forge()))->down();
        Database::connect()->setPrefix($this->prefix);
        Database::connect()->resetDataCache();
        array_map('unlink', glob($this->tmp . '/*') ?: []);
        @rmdir($this->tmp);
        parent::tearDown();
    }

    public function testMigrationCreatesTables(): void
    {
        $this->assertTrue($this->svc->tablesReady());
        $this->assertSame(0, $this->svc->counts()['players']);
    }

    public function testSampleImportIsIdempotentAndReportsSplits(): void
    {
        $first = $this->svc->import(CsvStatsProvider::sample());
        $this->assertTrue($first['ok']);
        $this->assertSame(3, $first['players']);
        $this->assertSame(51, $first['game_logs_inserted']);
        $this->assertSame(32, $first['defense_ranks']);

        $second = $this->svc->import(CsvStatsProvider::sample());
        $this->assertSame(0, $second['game_logs_inserted']);
        $this->assertSame(51, $second['game_logs_updated']);
        $counts = $this->svc->counts();
        $this->assertSame(3, $counts['players']);
        $this->assertSame(51, $counts['game_logs']);

        $players = $this->svc->listPlayers();
        $this->assertCount(3, $players);
        $alpha = $this->svc->findPlayer('Alpha');
        $this->assertNotNull($alpha);

        // Pick the toughest and softest rush defenses in the sample set.
        $db = Database::connect();
        $top = $db->table(SportsPropsService::T_DEFENSE)->where('rush_def_rank', 1)->get()->getRowArray()['team'];
        $bottom = $db->table(SportsPropsService::T_DEFENSE)->where('rush_def_rank', 32)->get()->getRowArray()['team'];

        $vsTop = $this->svc->playerReport((int) $alpha['id'], null, $top, [['market' => 'rush_yds', 'line' => 70.5, 'over_odds' => -110, 'under_odds' => -110]]);
        $vsBottom = $this->svc->playerReport((int) $alpha['id'], null, $bottom, []);

        $this->assertSame(2025, $vsTop['season']);
        $this->assertCount(17, $vsTop['games']);
        $this->assertTrue($vsTop['provenance']['is_sample']);
        $this->assertFalse($vsTop['provenance']['wagering']);
        $this->assertSame(1, $vsTop['opponent']['rush_def_rank']);
        $this->assertSame('top', $vsTop['goldilocks']['opponent_tiers']['rush_yds']);
        $this->assertSame('bottom', $vsBottom['goldilocks']['opponent_tiers']['rush_yds']);
        $this->assertLessThan($vsBottom['goldilocks']['projections']['rush_yds']['projection'], $vsTop['goldilocks']['projections']['rush_yds']['projection']);
        $this->assertCount(2, $vsTop['goldilocks']['candidates']);
        $this->assertGreaterThan(
            $vsTop['splits']['rush_yds']['top']['avg'],
            $vsTop['splits']['rush_yds']['bottom']['avg'],
            'Sample RB Alpha should run for more yards against bottom-10 rush defenses'
        );

        $this->assertNull($this->svc->playerReport(999999));

        $removed = $this->svc->removeSample();
        $this->assertSame(3, $removed['removed_players']);
        $this->assertSame(0, $this->svc->counts()['game_logs']);
        $this->assertSame(0, $this->svc->counts()['defense_ranks']);
    }

    public function testCsvImportUsesWeeklyRanksWithoutLookAhead(): void
    {
        file_put_contents($this->tmp . '/logs.csv', "player_id,player_name,team,position,season,week,game_date,opponent,home_away,rush_att,rush_yds,rush_td,targets,receptions,rec_yds,rec_td\n"
            . "p1,Test Back,AAA,RB,2025,1,2025-09-07,BBB,H,15,60,0,3,2,15,0\n"
            . "p1,Test Back,AAA,RB,2025,5,2025-10-05,BBB,A,18,80,1,4,3,25,0\n"
            . ",Missing Id,AAA,RB,2025,6,,BBB,H,1,1,0,0,0,0,0\n");
        file_put_contents($this->tmp . '/def.csv', "season,week,team,rush_def_rank,rb_rec_def_rank,rush_yds_allowed_pg\n"
            . "2025,0,BBB,25,,120.5\n"
            . "2025,4,BBB,5,7,88\n"
            . "2025,9,BBB,20,20,100\n");

        $r = $this->svc->import(new CsvStatsProvider($this->tmp . '/logs.csv', $this->tmp . '/def.csv', 'csv'));
        $this->assertSame(1, $r['players']);
        $this->assertSame(2, $r['game_logs_inserted']);

        $player = $this->svc->findPlayer('Test Back');
        $report = $this->svc->playerReport((int) $player['id'], 2025, 'BBB');
        // Week 1: no weekly rank before week 1, so the season rank (25) applies.
        $this->assertSame(25, $report['games'][0]['rush_def_rank']);
        // Week 5: the week 4 rank (5) applies; the week 9 rank is in the future.
        $this->assertSame(5, $report['games'][1]['rush_def_rank']);
        $this->assertSame(7, $report['games'][1]['rb_rec_def_rank']);
        // Upcoming game uses the newest rank on file.
        $this->assertSame(20, $report['opponent']['rush_def_rank']);
    }

    public function testViewsRenderWithReportData(): void
    {
        $this->svc->import(CsvStatsProvider::sample());
        $alpha = $this->svc->findPlayer('Alpha');
        $lines = [['market' => 'rush_yds', 'line' => 70.5, 'over_odds' => -115, 'under_odds' => -105]];
        $report = $this->svc->playerReport((int) $alpha['id'], null, 'KC', $lines);

        $html = view('App\\Modules\\Sports\\Views\\nfl\\player', ['report' => $report, 'lines' => $lines]);
        $this->assertStringContainsString('Goldilocks vs KC', $html);
        $this->assertStringContainsString('Averages by opponent defense rank', $html);
        $this->assertStringContainsString('1-800-GAMBLER', $html);
        $this->assertStringContainsString('sample data, not real stats', $html);
        $this->assertStringNotContainsString('<script', $html);

        $index = view('App\\Modules\\Sports\\Views\\nfl\\index', ['tablesReady' => true, 'players' => $this->svc->listPlayers(), 'disclaimer' => SportsPropsService::DISCLAIMER]);
        $this->assertStringContainsString('Sample RB Alpha', $index);
        $this->assertStringContainsString('/MyMISports/NFL/Player/', $index);

        // Portrait phones/tablets: every data table stacks into labelled cards.
        foreach (['sports-player-table' => $index, 'sports-projections' => $html, 'sports-candidates' => $html, 'sports-splits' => $html, 'sports-gamelog' => $html] as $id => $doc) {
            $this->assertMatchesRegularExpression('/class="[^"]*sports-stack(-lg)?" id="' . $id . '"/', $doc, $id . ' must use the stacked mobile layout');
        }
        $this->assertStringContainsString('data-label="Rush yds / game"', $index);
        $this->assertStringContainsString('data-label="Model chance"', $html);
        $this->assertStringContainsString('@media (max-width: 767.98px)', $html);
        $this->assertStringContainsString('@media (max-width: 991.98px)', $html);

        if (($dump = getenv('SPORTS_VIEW_DUMP')) !== false && is_dir($dump)) {
            file_put_contents($dump . '/index.html', $index);
            file_put_contents($dump . '/player.html', $html);
        }
    }

    public function testCsvProviderRejectsMissingFile(): void
    {
        $this->expectException(\RuntimeException::class);
        iterator_to_array((new CsvStatsProvider($this->tmp . '/nope.csv', $this->tmp . '/nope.csv'))->gameLogs());
    }

    public function testRoutesRequireLogin(): void
    {
        foreach (['MyMISports/NFL', 'MyMISports/NFL/Player/1', 'MyMISports/NFL/API/Goldilocks?player_id=1'] as $path) {
            $result = $this->get($path);
            $code = $result->response()->getStatusCode();
            $this->assertContains($code, [301, 302, 303, 307, 401, 403], $path . ' must be routed and refuse anonymous access, got ' . $code);
        }
        foreach (['MyMISports/NFL/Refresh', 'MyMISports/NFL/RefreshLines/1'] as $path) {
            $code = $this->post($path)->response()->getStatusCode();
            $this->assertContains($code, [301, 302, 303, 307, 401, 403], 'POST ' . $path . ' must refuse anonymous access, got ' . $code);
        }
        $this->assertTrue(class_exists(SportsController::class));
    }
}
