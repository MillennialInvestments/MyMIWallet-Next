<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Database\Migrations\CreatePredictionsAndGamificationTables;
use App\Database\Migrations\CreateSportsBetTrackerAndUserSettingsTables;
use App\Database\Migrations\CreateSportsMlbNhlAndSgpTables;
use App\Database\Migrations\CreateSportsPropAnalyticsTables;
use App\Database\Migrations\CreateSportsPropLinesTable;
use App\Database\Migrations\CreateSportsQbWrMatchupTables;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use Config\Database;

require_once APPPATH . 'Database/Migrations/2026-11-27-000100_CreateSportsPropAnalyticsTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000200_CreateSportsPropLinesTable.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000300_CreateSportsQbWrMatchupTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000400_CreateSportsBetTrackerAndUserSettingsTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000500_CreatePredictionsAndGamificationTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000600_CreateSportsMlbNhlAndSgpTables.php';

final class SportsMlbNhlSgpControllerTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    private string $prefix = '';

    protected function setUp(): void
    {
        parent::setUp();
        config('Encryption')->key = str_repeat('k', 32);
        \Config\Services::injectMock('authentication', new class {
            public function check(): bool { return true; }
            public function isLoggedIn(): bool { return true; }
            public function id(): int { return 42; }
            public function user(): ?object {
                return (object)['id' => 42, 'username' => 'testuser', 'email' => 'test@example.com'];
            }
        });

        $db = Database::connect();
        $this->prefix = $db->getPrefix();
        $db->setPrefix('');
        $db->resetDataCache();

        (new CreateSportsPropAnalyticsTables(Database::forge()))->up();
        (new CreateSportsPropLinesTable(Database::forge()))->up();
        (new CreateSportsQbWrMatchupTables(Database::forge()))->up();
        (new CreateSportsBetTrackerAndUserSettingsTables(Database::forge()))->up();
        (new CreatePredictionsAndGamificationTables(Database::forge()))->up();
        (new CreateSportsMlbNhlAndSgpTables(Database::forge()))->up();
        $db->resetDataCache();
    }

    protected function tearDown(): void
    {
        \Config\Services::resetSingle('authentication');
        (new CreateSportsMlbNhlAndSgpTables(Database::forge()))->down();
        (new CreatePredictionsAndGamificationTables(Database::forge()))->down();
        (new CreateSportsBetTrackerAndUserSettingsTables(Database::forge()))->down();
        (new CreateSportsQbWrMatchupTables(Database::forge()))->down();
        (new CreateSportsPropLinesTable(Database::forge()))->down();
        (new CreateSportsPropAnalyticsTables(Database::forge()))->down();

        $db = Database::connect();
        $db->setPrefix($this->prefix);
        $db->resetDataCache();
        parent::tearDown();
    }

    public function testMlbDashboardRenders(): void
    {
        $res = $this->withSession(['logged_in' => 42, 'userID' => 42])->get('MyMISports/MLB');
        $res->assertOK();
        $res->assertSee('MLB Baseball Analytics');
        $res->assertSee('Coors Field');
        $res->assertSee('Tarik Skubal');
    }

    public function testMlbPlayerSplits(): void
    {
        // First ensure sample data seeded
        $this->withSession(['logged_in' => 42, 'userID' => 42])->get('MyMISports/MLB');

        $db = Database::connect();
        $p = $db->table('bf_sports_players')->where('sport', 'MLB')->get()->getRowArray();
        $this->assertNotNull($p);

        $res = $this->withSession(['logged_in' => 42, 'userID' => 42])->get('MyMISports/MLB/Player/' . $p['id']);
        $res->assertOK();
        $res->assertSee($p['full_name']);
        $res->assertSee('MLB Prop Splits');
    }

    public function testMlbRefresh(): void
    {
        $res = $this->withSession(['logged_in' => 42, 'userID' => 42])->post('MyMISports/MLB/Refresh', [
            csrf_token() => csrf_hash(),
        ]);
        $this->assertTrue($res->isRedirect());
        $this->assertStringContainsString('MyMISports/MLB', (string) $res->getRedirectUrl());
    }

    public function testNhlDashboardRenders(): void
    {
        $res = $this->withSession(['logged_in' => 42, 'userID' => 42])->get('MyMISports/NHL');
        $res->assertOK();
        $res->assertSee('NHL Hockey Analytics');
        $res->assertSee('Connor McDavid');
    }

    public function testNhlPlayerSplits(): void
    {
        $this->withSession(['logged_in' => 42, 'userID' => 42])->get('MyMISports/NHL');

        $db = Database::connect();
        $p = $db->table('bf_sports_players')->where('sport', 'NHL')->get()->getRowArray();
        $this->assertNotNull($p);

        $res = $this->withSession(['logged_in' => 42, 'userID' => 42])->get('MyMISports/NHL/Player/' . $p['id']);
        $res->assertOK();
        $res->assertSee($p['full_name']);
        $res->assertSee('NHL Prop Splits');
    }

    public function testNhlRefresh(): void
    {
        $res = $this->withSession(['logged_in' => 42, 'userID' => 42])->post('MyMISports/NHL/Refresh', [
            csrf_token() => csrf_hash(),
        ]);
        $this->assertTrue($res->isRedirect());
        $this->assertStringContainsString('MyMISports/NHL', (string) $res->getRedirectUrl());
    }

    public function testSgpEngineDashboardRenders(): void
    {
        $res = $this->withSession(['logged_in' => 42, 'userID' => 42])->get('My-Bets/SGP');
        $res->assertOK();
        $res->assertSee('Same-Game Parlay (SGP)');
        $res->assertSee('qb_pass_yds');
    }

    public function testSgpCalculateApi(): void
    {
        $payload = [
            csrf_token()   => csrf_hash(),
            'odds_a'       => -115,
            'odds_b'       => -115,
            'r'            => 0.58,
            'offered_odds' => 185,
        ];

        $res = $this->withSession(['logged_in' => 42, 'userID' => 42, 'cuID' => 42])
            ->withHeaders(['X-Requested-With' => 'XMLHttpRequest'])
            ->post('My-Bets/SGP/Calculate', $payload);
        $res->assertOK();

        $data = json_decode($res->getJSON(), true);
        $this->assertIsArray($data);
        $this->assertArrayHasKey('fair_correlated_odds', $data);
        $this->assertArrayHasKey('ev_percentage', $data);
        $this->assertArrayHasKey('verdict', $data);
        $this->assertGreaterThan(0.0, $data['ev_percentage']);
    }
}
