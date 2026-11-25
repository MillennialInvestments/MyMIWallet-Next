<?php

declare(strict_types=1);

namespace Tests\App\Security;

use App\Models\Options\OptionsPositionModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Config\Services;

/**
 * W0 Security Certification:
 * GET /API/Options/positions must require an authenticated session or API token,
 * must scope all returned positions strictly to the authorized user_id, and must
 * prevent cross-user position enumeration and anonymous leakage.
 *
 * @internal
 */
final class OptionsPositionsAuthTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $migrate = false;
    protected $refresh = false;

    protected function setUp(): void
    {
        parent::setUp();

        if (service('authentication')->check()) {
            service('authentication')->logout();
        }
        session()->destroy();

        $db = db_connect();
        $db->query('DROP TABLE IF EXISTS ' . $db->prefixTable('options_positions'));
        $db->query(
            'CREATE TABLE ' . $db->prefixTable('options_positions') . ' (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                trade_uuid VARCHAR(64),
                user_id INTEGER,
                ticker VARCHAR(32),
                strategy VARCHAR(32),
                expiry DATE,
                contracts_count INTEGER DEFAULT 1,
                call_strike DECIMAL(12,4) DEFAULT 0,
                put_strike DECIMAL(12,4) DEFAULT 0,
                entry_stock_price DECIMAL(12,4) DEFAULT 0,
                entry_debit_per_pair DECIMAL(10,4) DEFAULT 1.90,
                total_entry_debit DECIMAL(12,4) DEFAULT 190.00,
                target_net_profit DECIMAL(12,4) DEFAULT 200.00,
                target_combined_exit DECIMAL(10,4) DEFAULT 3.90,
                current_combined_bid DECIMAL(10,4) DEFAULT 2.10,
                current_combined_value DECIMAL(12,4) DEFAULT 210.00,
                current_unrealized_pnl DECIMAL(12,4) DEFAULT 20.00,
                peak_unrealized_pnl DECIMAL(12,4) DEFAULT 35.00,
                status VARCHAR(32) DEFAULT "open",
                exit_reason VARCHAR(128) NULL,
                closed_combined_credit DECIMAL(10,4) NULL,
                realized_pnl DECIMAL(12,4) NULL,
                entry_at DATETIME NULL,
                closed_at DATETIME NULL,
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )'
        );

        // Seed sample positions for User 101 and User 202
        $db->table('bf_options_positions')->insert([
            'trade_uuid' => 'pos-user-101-uuid',
            'user_id' => 101,
            'ticker' => 'NVDA',
            'strategy' => 'long_strangle',
            'status' => 'open',
            'total_entry_debit' => 190.00,
            'current_unrealized_pnl' => 25.00,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $db->table('bf_options_positions')->insert([
            'trade_uuid' => 'pos-user-202-uuid',
            'user_id' => 202,
            'ticker' => 'TSLA',
            'strategy' => 'long_straddle',
            'status' => 'open',
            'total_entry_debit' => 280.00,
            'current_unrealized_pnl' => -40.00,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $db->resetDataCache();
    }

    protected function tearDown(): void
    {
        Services::reset(true);
        $db = db_connect();
        $db->query('DROP TABLE IF EXISTS ' . $db->prefixTable('options_positions'));
        $db->resetDataCache();
        parent::tearDown();
    }

    /**
     * Test 1: Anonymous request must be rejected (401 Unauthorized or redirect).
     */
    public function testAnonymousRequestIsRejected(): void
    {
        $result = $this->withSession([])->get('API/Options/positions');

        // Unauthenticated callers must NOT receive a 200 OK with data.
        $this->assertNotSame(
            200,
            $result->response()->getStatusCode(),
            'GET /API/Options/positions must NOT return 200 OK to unauthenticated callers!'
        );
        $this->assertTrue(
            in_array($result->response()->getStatusCode(), [401, 302], true),
            'Expected 401 Unauthorized or 302 login redirect, got: ' . $result->response()->getStatusCode()
        );
    }

    /**
     * Test 2: Authenticated User 101 must only see their own positions, never User 202.
     */
    public function testAuthenticatedUserOnlyReceivesTheirOwnPositions(): void
    {
        // Mock authentication service as User 101
        Services::injectMock('authentication', new class {
            public function check(): bool { return true; }
            public function id(): int { return 101; }
            public function user() { return (object) ['id' => 101, 'email' => 'user101@example.com']; }
            public function logout(): void {}
        });

        $result = $this->withSession([
            'user_id' => 101,
            'logged_in' => true,
        ])->get('API/Options/positions');

        $result->assertStatus(200);
        $body = json_decode($result->response()->getBody(), true);

        $this->assertSame('success', $body['status'] ?? null);
        $positions = $body['data']['positions'] ?? [];

        $this->assertNotEmpty($positions, 'User 101 should have positions.');
        foreach ($positions as $pos) {
            $this->assertSame(101, (int) $pos['user_id'], 'Cross-user position leaked! Expected user_id 101.');
            $this->assertSame('NVDA', $pos['ticker']);
            $this->assertNotSame('TSLA', $pos['ticker'], 'User 202 position TSLA leaked to User 101!');
        }
    }

    /**
     * Test 3: Model-level getActivePositions must enforce user_id scoping.
     */
    public function testModelEnforcesUserScoping(): void
    {
        $model = new OptionsPositionModel();

        // Calling with user_id 101
        $user101Positions = $model->getActivePositions(101);
        $this->assertCount(1, $user101Positions);
        $this->assertSame('NVDA', $user101Positions[0]['ticker']);

        // Calling with user_id 202
        $user202Positions = $model->getActivePositions(202);
        $this->assertCount(1, $user202Positions);
        $this->assertSame('TSLA', $user202Positions[0]['ticker']);

        // Calling with non-existent user_id 999
        $emptyPositions = $model->getActivePositions(999);
        $this->assertEmpty($emptyPositions);

        // Calling with null or 0 should return empty (fail closed in user context)
        $unscopedPositions = $model->getActivePositions(0);
        $this->assertEmpty($unscopedPositions, 'Unscoped user query must return empty array.');
    }

    /**
     * Test 4: Route definition in Routes.php must carry auth filter.
     */
    public function testRouteHasAuthFilter(): void
    {
        $routesContent = file_get_contents(APPPATH . 'Config/Routes.php');
        $this->assertMatchesRegularExpression(
            "/('positions',\s*'OptionsWebhookController::positions',\s*\[[^\]]*'filter'|group\('API\/Options',\s*\[[^\]]*'filter')/s",
            $routesContent,
            'Route API/Options/positions must be declared with an auth filter (e.g. login or apiUser)!'
        );
    }
}
