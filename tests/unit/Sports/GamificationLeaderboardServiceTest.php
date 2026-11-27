<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Database\Migrations\CreatePredictionsAndGamificationTables;
use App\Modules\Sports\Libraries\GamificationLeaderboardService;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;

require_once APPPATH . 'Database/Migrations/2026-11-27-000500_CreatePredictionsAndGamificationTables.php';

final class GamificationLeaderboardServiceTest extends CIUnitTestCase
{
    private GamificationLeaderboardService $service;
    private string $prefix = '';

    protected function setUp(): void
    {
        parent::setUp();
        $db = Database::connect();
        $this->prefix = $db->getPrefix();
        $db->setPrefix('');
        $db->resetDataCache();

        (new CreatePredictionsAndGamificationTables(Database::forge()))->up();
        $db->resetDataCache();

        $this->service = new GamificationLeaderboardService($db);
    }

    protected function tearDown(): void
    {
        (new CreatePredictionsAndGamificationTables(Database::forge()))->down();
        Database::connect()->setPrefix($this->prefix);
        Database::connect()->resetDataCache();
        parent::tearDown();
    }

    public function testLeaderboardRankings(): void
    {
        $this->assertTrue($this->service->tablesReady());

        $leaders = $this->service->getLeaderboard();
        $this->assertNotEmpty($leaders);
        $this->assertGreaterThanOrEqual(5, count($leaders));

        $top = $leaders[0];
        $this->assertSame(1, $top['rank']);
        $this->assertGreaterThan(0, $top['net_roi_pct']);
        $this->assertGreaterThan(0, $top['virtual_bankroll']);
    }

    public function testUserStatsAndContest(): void
    {
        $stats = $this->service->getUserStats(777, 'TraderPro');
        $this->assertSame('TraderPro', $stats['username']);
        $this->assertSame(2500.00, (float) $stats['virtual_bankroll']);

        $contest = $this->service->getWeeklyContest();
        $this->assertArrayHasKey('rule_type', $contest);
        $this->assertStringContainsString('UIGEA', $contest['rule_type']);
        $this->assertArrayHasKey('prize_pool_usd', $contest);
    }
}
