<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Database\Migrations\CreatePredictionsAndGamificationTables;
use App\Database\Migrations\CreateSportsBetTrackerAndUserSettingsTables;
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

final class SportsPredictionsAndGamificationControllerTest extends CIUnitTestCase
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
        $db->resetDataCache();
    }

    protected function tearDown(): void
    {
        \Config\Services::resetSingle('authentication');
        (new CreatePredictionsAndGamificationTables(Database::forge()))->down();
        (new CreateSportsBetTrackerAndUserSettingsTables(Database::forge()))->down();
        (new CreateSportsQbWrMatchupTables(Database::forge()))->down();
        (new CreateSportsPropLinesTable(Database::forge()))->down();
        (new CreateSportsPropAnalyticsTables(Database::forge()))->down();
        Database::connect()->setPrefix($this->prefix);
        Database::connect()->resetDataCache();
        parent::tearDown();
    }

    public function testPredictionsRouteRendersForAuthenticatedUser(): void
    {
        $result = $this->withSession(['logged_in' => 42, 'userID' => 42])
            ->get('MyMISports/Predictions');

        $result->assertOK();
        $result->assertSee('Non-Custodial Prediction Markets Hub');
        $result->assertSee('Polymarket');
        $result->assertSee('Kalshi');
    }

    public function testLeaderboardRouteRendersForAuthenticatedUser(): void
    {
        $result = $this->withSession(['logged_in' => 42, 'userID' => 42])
            ->get('MyMISports/Leaderboard');

        $result->assertOK();
        $result->assertSee('Social Prediction Leaderboard');
        $result->assertSee('Quantitative Strategy Challenge');
        $result->assertSee('UIGEA § 5362');
    }

    public function testOnrampRouteRendersForAuthenticatedUser(): void
    {
        $result = $this->withSession(['logged_in' => 42, 'userID' => 42])
            ->get('MyMISports/Onramp');

        $result->assertOK();
        $result->assertSee('Licensed Crypto On-Ramp');
        $result->assertSee('MoonPay');
        $result->assertSee('Stripe');
        $result->assertSee('OFAC');
    }

    public function testPlacePredictionOrderApi(): void
    {
        $result = $this->withSession(['logged_in' => 42, 'userID' => 42, 'user_id' => 42, 'cuID' => 42])
            ->withHeaders(['X-Requested-With' => 'XMLHttpRequest'])
            ->post('MyMISports/Predictions/Order', [
                csrf_token()  => csrf_hash(),
                'market_id'   => 1,
                'outcome'     => 'YES',
                'stake_usdc'  => 100.0,
                'user_wallet' => '0x1234567890abcdef1234567890abcdef12345678',
                'odds'        => 0.62,
            ]);

        $result->assertOK();
        $json = json_decode($result->getJSON(), true);
        $this->assertTrue($json['success']);
        $this->assertSame('0x1234567890abcdef1234567890abcdef12345678', $json['order']['user_wallet']);
        $this->assertSame(0.50, $json['order']['platform_fee_usdc']);
    }

    public function testOnrampCheckoutSanctionsBlock(): void
    {
        // Address on OFAC blacklist
        $result = $this->withSession(['logged_in' => 42, 'userID' => 42, 'user_id' => 42, 'cuID' => 42])
            ->withHeaders(['X-Requested-With' => 'XMLHttpRequest'])
            ->post('MyMISports/Onramp/Checkout', [
                csrf_token()         => csrf_hash(),
                'crypto_asset'       => 'USDC',
                'destination_wallet' => '0x7F367740f9273c52Aad32b3506B628B597B090b8',
                'fiat_amount'        => 250.0,
                'provider'           => 'moonpay',
            ]);

        $result->assertStatus(400);
        $json = json_decode($result->getJSON(), true);
        $this->assertFalse($json['success']);
        $this->assertStringContainsString('sanctions_block', $json['message']);
    }

    public function testOnrampCheckoutSuccessWithCompliantAddress(): void
    {
        $result = $this->withSession(['logged_in' => 42, 'userID' => 42, 'user_id' => 42, 'cuID' => 42])
            ->withHeaders(['X-Requested-With' => 'XMLHttpRequest'])
            ->post('MyMISports/Onramp/Checkout', [
                csrf_token()         => csrf_hash(),
                'crypto_asset'       => 'USDC',
                'destination_wallet' => '0x9999999999999999999999999999999999999999',
                'fiat_amount'        => 250.0,
                'provider'           => 'moonpay',
            ]);

        $result->assertOK();
        $json = json_decode($result->getJSON(), true);
        $this->assertTrue($json['success']);
        $this->assertStringContainsString('buy.moonpay.com', $json['checkout_url']);
        $this->assertSame(2.50, $json['platform_fee_earned']);
    }
}
