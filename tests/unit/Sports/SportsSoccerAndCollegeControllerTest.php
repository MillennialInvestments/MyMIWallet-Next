<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Database\Migrations\CreatePredictionsAndGamificationTables;
use App\Database\Migrations\CreateSportsBetTrackerAndUserSettingsTables;
use App\Database\Migrations\CreateSportsMlbNhlAndSgpTables;
use App\Database\Migrations\CreateSportsPropAnalyticsTables;
use App\Database\Migrations\CreateSportsPropLinesTable;
use App\Database\Migrations\CreateSportsQbWrMatchupTables;
use App\Database\Migrations\CreateSportsSoccerCollegeAndQuantTables;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use Config\Database;

require_once APPPATH . 'Database/Migrations/2026-11-27-000100_CreateSportsPropAnalyticsTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000200_CreateSportsPropLinesTable.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000300_CreateSportsQbWrMatchupTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000400_CreateSportsBetTrackerAndUserSettingsTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000500_CreatePredictionsAndGamificationTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000600_CreateSportsMlbNhlAndSgpTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000700_CreateSportsSoccerCollegeAndQuantTables.php';

final class SportsSoccerAndCollegeControllerTest extends CIUnitTestCase
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
        (new CreateSportsSoccerCollegeAndQuantTables(Database::forge()))->up();
        $db->resetDataCache();
    }

    protected function tearDown(): void
    {
        \Config\Services::resetSingle('authentication');
        (new CreateSportsSoccerCollegeAndQuantTables(Database::forge()))->down();
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

    public function testSoccerDashboardRenders(): void
    {
        $res = $this->withSession(['logged_in' => 42, 'userID' => 42])->get('MyMISports/Soccer');
        $res->assertOK();
        $res->assertSee('Soccer Analytics');
        $res->assertSee('Arsenal');
        $res->assertSee('Manchester City');
    }

    public function testSoccerSimulateApi(): void
    {
        $res = $this->withSession(['logged_in' => 42, 'userID' => 42, 'cuID' => 42])
            ->withHeaders(['X-Requested-With' => 'XMLHttpRequest'])
            ->post('MyMISports/Soccer/Simulate', [
                csrf_token() => csrf_hash(),
                'home_team'  => 'ARS',
                'away_team'  => 'MCI',
            ]);

        $res->assertOK();
        $data = json_decode($res->getJSON(), true);
        $this->assertIsArray($data);
        $this->assertArrayHasKey('home_win_prob', $data);
        $this->assertArrayHasKey('btts_prob', $data);
        $this->assertArrayHasKey('most_likely_score', $data);
    }

    public function testCollegeDashboardRendersNcaafAndNcaab(): void
    {
        // Test NCAAF
        $res1 = $this->withSession(['logged_in' => 42, 'userID' => 42])->get('MyMISports/College?sport=NCAAF');
        $res1->assertOK();
        $res1->assertSee('College Sports');
        $res1->assertSee('Georgia Bulldogs');

        // Test NCAAB
        $res2 = $this->withSession(['logged_in' => 42, 'userID' => 42])->get('MyMISports/College?sport=NCAAB');
        $res2->assertOK();
        $res2->assertSee('UConn Huskies');
    }

    public function testCollegeSimulateApi(): void
    {
        $res = $this->withSession(['logged_in' => 42, 'userID' => 42, 'cuID' => 42])
            ->withHeaders(['X-Requested-With' => 'XMLHttpRequest'])
            ->post('MyMISports/College/Simulate', [
                csrf_token()   => csrf_hash(),
                'home_team'    => 'UGA',
                'away_team'    => 'TEX',
                'neutral_site' => 0,
            ]);

        $res->assertOK();
        $data = json_decode($res->getJSON(), true);
        $this->assertIsArray($data);
        $this->assertArrayHasKey('fair_spread', $data);
        $this->assertArrayHasKey('home_win_prob', $data);
        $this->assertArrayHasKey('edge_pick', $data);
    }

    public function testSaveUserSettingsQuantWeights(): void
    {
        $payload = [
            csrf_token()             => csrf_hash(),
            'default_unit_size'      => 75.0,
            'default_bankroll'       => 3500.0,
            'bankroll_currency'      => 'USD',
            'quant_form_weight'      => 0.45,
            'quant_matchup_weight'   => 0.35,
            'quant_home_away_weight' => 0.10,
            'quant_venue_weight'     => 0.10,
        ];

        $res = $this->withSession(['logged_in' => 42, 'userID' => 42, 'user_id' => 42, 'cuID' => 42])
            ->post('MyMISports/Settings/Save', $payload);

        $this->assertTrue($res->isRedirect());

        $db = Database::connect();
        $row = $db->table('bf_sports_user_settings')->where('user_id', 42)->get()->getRowArray();
        $this->assertNotNull($row);
        $this->assertEquals(0.45, (float) $row['quant_form_weight']);
        $this->assertEquals(0.35, (float) $row['quant_matchup_weight']);
    }
}
