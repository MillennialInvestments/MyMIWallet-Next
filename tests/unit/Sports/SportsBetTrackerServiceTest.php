<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Database\Migrations\CreateSportsBetTrackerAndUserSettingsTables;
use App\Modules\Sports\Libraries\SportsBetTrackerService;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;

require_once APPPATH . 'Database/Migrations/2026-11-27-000400_CreateSportsBetTrackerAndUserSettingsTables.php';

final class SportsBetTrackerServiceTest extends CIUnitTestCase
{
    private SportsBetTrackerService $service;
    private string $prefix = '';

    protected function setUp(): void
    {
        parent::setUp();
        config('Encryption')->key = str_repeat('k', 32);
        $db = Database::connect();
        $this->prefix = $db->getPrefix();
        $db->setPrefix('');
        $db->resetDataCache();

        (new CreateSportsBetTrackerAndUserSettingsTables(Database::forge()))->up();
        $db->resetDataCache();

        $this->service = new SportsBetTrackerService($db);
    }

    protected function tearDown(): void
    {
        (new CreateSportsBetTrackerAndUserSettingsTables(Database::forge()))->down();
        Database::connect()->setPrefix($this->prefix);
        Database::connect()->resetDataCache();
        parent::tearDown();
    }

    public function testTablesReady(): void
    {
        $this->assertTrue($this->service->tablesReady());
    }

    public function testCreateBetAndSummary(): void
    {
        $userId = 42;

        // Create winning bet
        $bet1 = $this->service->createBet($userId, [
            'sportsbook'        => 'DraftKings',
            'sport'             => 'NFL',
            'bet_type'          => 'Prop',
            'event_description' => 'KC @ BUF',
            'selection'         => 'Mahomes Over 255.5 Pass Yds',
            'line'              => 255.5,
            'odds'              => -110,
            'stake_amount'      => 110.00,
            'status'            => 'won',
        ]);

        $this->assertGreaterThan(0, $bet1);

        // Create losing bet
        $bet2 = $this->service->createBet($userId, [
            'sportsbook'        => 'FanDuel',
            'sport'             => 'NBA',
            'bet_type'          => 'Prop',
            'event_description' => 'BOS @ NYK',
            'selection'         => 'Tatum Over 27.5 Pts',
            'line'              => 27.5,
            'odds'              => -110,
            'stake_amount'      => 55.00,
            'status'            => 'lost',
        ]);

        // Create open bet
        $bet3 = $this->service->createBet($userId, [
            'sportsbook'        => 'BetMGM',
            'sport'             => 'NFL',
            'bet_type'          => 'Spread',
            'event_description' => 'DET @ GB',
            'selection'         => 'Lions -3.5',
            'line'              => -3.5,
            'odds'              => 100,
            'stake_amount'      => 50.00,
            'status'            => 'open',
        ]);

        $summary = $this->service->getSummary($userId);

        $this->assertSame(3, $summary['total_bets']);
        $this->assertSame(1, $summary['won_bets']);
        $this->assertSame(1, $summary['lost_bets']);
        $this->assertSame(1, $summary['open_bets']);
        $this->assertEqualsWithDelta(215.00, $summary['total_staked'], 0.01);
        $this->assertEqualsWithDelta(165.00, $summary['settled_staked'], 0.01);
        $this->assertEqualsWithDelta(50.00, $summary['open_risk'], 0.01);
        // Won bet profit = $100, lost bet = -$55 -> Net PnL = +$45
        $this->assertEqualsWithDelta(45.00, $summary['net_pnl'], 0.01);
        // Win rate = 1 / (1 + 1) = 50%
        $this->assertEqualsWithDelta(50.00, $summary['win_rate_pct'], 0.01);
        // ROI % = 45 / 165 = 27.27%
        $this->assertEqualsWithDelta(27.27, $summary['roi_pct'], 0.1);
    }

    public function testFailClosedIdorIsolation(): void
    {
        $userA = 101;
        $userB = 102;

        $betA = $this->service->createBet($userA, [
            'event_description' => 'Chiefs @ Ravens',
            'selection'         => 'Chiefs ML',
            'odds'              => 120,
            'stake_amount'      => 50.00,
        ]);

        // User B cannot list User A's bets
        $betsB = $this->service->listBets($userB);
        $this->assertEmpty($betsB);

        // User B cannot update status of User A's bet
        $updated = $this->service->updateStatus($userB, $betA, 'won');
        $this->assertFalse($updated);

        // User B cannot delete User A's bet
        $deleted = $this->service->deleteBet($userB, $betA);
        $this->assertFalse($deleted);

        // User A's bet is still present and open
        $betsA = $this->service->listBets($userA);
        $this->assertCount(1, $betsA);
        $this->assertSame('open', $betsA[0]['status']);
    }

    public function testUserSettingsAndByokEncryption(): void
    {
        $userId = 202;

        $saved = $this->service->saveUserSettings($userId, [
            'default_unit_size' => 75.00,
            'default_bankroll'  => 5000.00,
            'bankroll_currency' => 'USD',
            'odds_api_key'      => 'secret-byok-odds-key-xyz',
        ]);
        $this->assertTrue($saved);

        $settings = $this->service->getUserSettings($userId);
        $this->assertSame(75.00, $settings['default_unit_size']);
        $this->assertSame(5000.00, $settings['default_bankroll']);
        $this->assertTrue($settings['has_odds_api_key']);

        // Decrypted key resolution
        $resolved = $this->service->resolveOddsApiKey($userId);
        $this->assertSame('secret-byok-odds-key-xyz', $resolved);
    }

    public function testCsvExportAndImport(): void
    {
        $userId = 303;

        $this->service->createBet($userId, [
            'placed_at'         => '2026-11-20 18:00:00',
            'sportsbook'        => 'DraftKings',
            'sport'             => 'NFL',
            'bet_type'          => 'Prop',
            'event_description' => 'PHI @ DAL',
            'selection'         => 'Barkley Over 78.5 Rush Yds',
            'line'              => 78.5,
            'odds'              => -115,
            'stake_amount'      => 100.00,
            'status'            => 'won',
        ]);

        $csv = $this->service->exportCsv($userId);
        $this->assertStringContainsString('Barkley Over 78.5 Rush Yds', $csv);
        $this->assertStringContainsString('DraftKings', $csv);

        // Import into a new user
        $newUser = 404;
        $importResult = $this->service->importCsv($newUser, $csv);

        $this->assertSame(1, $importResult['imported']);
        $this->assertSame(0, $importResult['skipped']);

        $importedBets = $this->service->listBets($newUser);
        $this->assertCount(1, $importedBets);
        $this->assertSame('Barkley Over 78.5 Rush Yds', $importedBets[0]['selection']);
        $this->assertSame('won', $importedBets[0]['status']);
    }
}
