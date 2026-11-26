<?php

declare(strict_types=1);

namespace Tests\Unit\PropFirms;

use App\Modules\PropFirms\Controllers\AccountsController;
use App\Modules\PropFirms\Controllers\NotificationsController;
use App\Modules\PropFirms\Controllers\PropFirmsController;
use App\Modules\PropFirms\Controllers\TradovateController;
use App\Modules\PropFirms\Libraries\PropFirmDefaultsSeeder;
use App\Modules\PropFirms\Libraries\PropFirmEngine;
use App\Modules\PropFirms\Libraries\PropFirmsService;
use App\Modules\PropFirms\Libraries\PropNotificationService;
use App\Modules\PropFirms\Libraries\RuleEngines\ApexRuleEngine;
use App\Modules\PropFirms\Libraries\RuleEngines\TopstepRuleEngine;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\URI;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;
use ReflectionClass;

/**
 * MYMI-GTM-052: Certification tests for the PropFirms domain.
 *
 * Verifies:
 * - PropFirmDefaultsSeeder seeds default firms (Apex, Topstep) and rule sets idempotently.
 * - ApexRuleEngine evaluates trailing drawdown, DLL, stop-loss requirements, and max contracts.
 * - TopstepRuleEngine evaluates real-time trailing drawdown, DLL, and profit consistency caps.
 * - PropFirmEngine integrates rule engines, persists snapshots, and enforces symbol gating.
 * - PropFirmsService dashboardSummary aggregates multi-account metrics and isolates by user.
 * - AccountsController, TradovateController, and NotificationsController enforce session ownership (IDOR).
 * - PropFirmsController::seedDefaults enforces admin role restrictions.
 */
final class PropFirmsDomainTest extends CIUnitTestCase
{
    private const USER_A = 9001;
    private const USER_B = 9002;

    protected function setUp(): void
    {
        parent::setUp();

        $db = Database::connect();
        $db->resetDataCache();

        $this->createTables($db);
    }

    private function createTables($db): void
    {
        $db->query('CREATE TABLE IF NOT EXISTS bf_prop_firms (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            status TEXT NOT NULL DEFAULT "active",
            meta_json TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_prop_rule_sets (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            prop_firm_id INTEGER NOT NULL,
            name TEXT NOT NULL,
            rule_version TEXT NOT NULL DEFAULT "v1",
            account_type TEXT NOT NULL DEFAULT "eval",
            platform TEXT NOT NULL DEFAULT "tradovate",
            starting_balance NUMERIC NOT NULL DEFAULT 0,
            daily_loss_limit NUMERIC NOT NULL DEFAULT 0,
            drawdown_limit NUMERIC NOT NULL DEFAULT 0,
            max_drawdown NUMERIC NOT NULL DEFAULT 0,
            trailing_mode TEXT NOT NULL DEFAULT "none",
            trailing_stop_behavior TEXT NOT NULL DEFAULT "none",
            stop_loss_required INTEGER NOT NULL DEFAULT 0,
            qualifying_days INTEGER NOT NULL DEFAULT 0,
            consistency_percent NUMERIC NOT NULL DEFAULT 0,
            max_position_size NUMERIC NOT NULL DEFAULT 0,
            config_json TEXT NULL,
            rules_json TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_prop_allowed_symbols (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            prop_rule_set_id INTEGER NOT NULL,
            symbol TEXT NOT NULL,
            is_enabled INTEGER NOT NULL DEFAULT 1,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_user_prop_accounts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            prop_firm_id INTEGER NOT NULL,
            prop_rule_set_id INTEGER NULL,
            account_ref TEXT NOT NULL,
            account_status TEXT NOT NULL DEFAULT "active",
            starting_balance NUMERIC NOT NULL DEFAULT 0,
            current_balance NUMERIC NOT NULL DEFAULT 0,
            peak_balance NUMERIC NULL,
            remaining_drawdown NUMERIC NULL,
            remaining_dll NUMERIC NULL,
            metadata_json TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_prop_broker_connections (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_prop_account_id INTEGER NOT NULL,
            broker_name TEXT NOT NULL,
            external_account_id TEXT NOT NULL,
            connection_status TEXT NOT NULL DEFAULT "connected",
            last_heartbeat_at TEXT NULL,
            credentials_json TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_prop_equity_history (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_prop_account_id INTEGER NOT NULL,
            equity NUMERIC NOT NULL DEFAULT 0,
            drawdown NUMERIC NOT NULL DEFAULT 0,
            recorded_at TEXT NOT NULL,
            source TEXT NOT NULL DEFAULT "broker_sync",
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_prop_positions (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_prop_account_id INTEGER NOT NULL,
            symbol TEXT NOT NULL,
            side TEXT NOT NULL,
            quantity NUMERIC NOT NULL DEFAULT 0,
            entry_price NUMERIC NOT NULL DEFAULT 0,
            closed_at TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_prop_signals (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_prop_account_id INTEGER NOT NULL,
            symbol TEXT NOT NULL,
            signal_type TEXT NOT NULL,
            signal_strength NUMERIC NOT NULL DEFAULT 0,
            triggered_at TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_prop_notifications (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_prop_account_id INTEGER NULL,
            channel TEXT NOT NULL DEFAULT "dashboard",
            type TEXT NOT NULL DEFAULT "INFO",
            symbol TEXT NULL,
            subject TEXT NOT NULL,
            body TEXT NOT NULL,
            status TEXT NOT NULL DEFAULT "queued",
            event_key TEXT NOT NULL,
            payload_json TEXT NULL,
            sent_at TEXT NULL,
            read_at TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_prop_trade_journal (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_prop_account_id INTEGER NOT NULL,
            prop_order_id INTEGER NULL,
            entry_title TEXT NOT NULL,
            entry_body TEXT NOT NULL,
            entry_reason TEXT NOT NULL,
            exit_reason TEXT NOT NULL,
            emotion_tag TEXT NOT NULL,
            mistake_tag TEXT NOT NULL,
            lessons_learned TEXT NOT NULL,
            review_score INTEGER NOT NULL DEFAULT 0,
            symbol TEXT NOT NULL,
            trade_date TEXT NOT NULL,
            replay_start_at TEXT NULL,
            replay_end_at TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_prop_sync_logs (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_prop_account_id INTEGER NOT NULL,
            sync_type TEXT NOT NULL,
            status TEXT NOT NULL,
            details_json TEXT NULL,
            created_at TEXT NULL
        )');

        // Empty tables for fresh test state
        $tables = [
            'bf_prop_sync_logs',
            'bf_prop_trade_journal',
            'bf_prop_notifications',
            'bf_prop_signals',
            'bf_prop_equity_history',
            'bf_prop_positions',
            'bf_prop_broker_connections',
            'bf_user_prop_accounts',
            'bf_prop_allowed_symbols',
            'bf_prop_rule_sets',
            'bf_prop_firms',
        ];
        foreach ($tables as $t) {
            $db->table($t)->emptyTable();
        }
    }

    public function testPropFirmDefaultsSeederIsIdempotent(): void
    {
        $seeder = new PropFirmDefaultsSeeder();
        $run1 = $seeder->seedDefaults();

        $this->assertGreaterThan(0, $run1['inserted_firms']);
        $this->assertGreaterThan(0, $run1['inserted_rule_sets']);

        $db = Database::connect();
        $firmCount = $db->table('bf_prop_firms')->countAllResults();
        $this->assertGreaterThanOrEqual(2, $firmCount);

        // Second run must be idempotent
        $run2 = $seeder->seedDefaults();
        $this->assertSame(0, $run2['inserted_firms']);
        $this->assertSame(0, $run2['inserted_rule_sets']);
    }

    public function testApexRuleEngineThresholdsAndEvaluation(): void
    {
        $engine = new ApexRuleEngine();
        $ruleSet = [
            'starting_balance' => 50000.0,
            'daily_loss_limit' => 2500.0,
            'drawdown_limit' => 2500.0,
            'stop_loss_required' => 1,
        ];

        // 1. Healthy state
        $account = [
            'starting_balance' => 50000.0,
            'current_balance' => 51000.0,
        ];
        $state = $engine->evaluateAccountState($account, $ruleSet);
        $this->assertTrue($state['can_trade']);
        $this->assertSame('healthy', $state['risk_state']);
        $this->assertNull($state['breach_reason']);
        $this->assertSame(3500.0, $state['remaining_drawdown']);
        $this->assertSame(2500.0, $state['remaining_dll']);

        // 2. Warning state (within $250 of drawdown limit)
        $accountWarn = [
            'starting_balance' => 50000.0,
            'current_balance' => 47700.0, // min drawdown is 47500; remaining = 200
        ];
        $stateWarn = $engine->evaluateAccountState($accountWarn, $ruleSet);
        $this->assertTrue($stateWarn['can_trade']);
        $this->assertSame('warning', $stateWarn['risk_state']);
        $this->assertNotEmpty($stateWarn['warnings']);

        // 3. Breached state: max drawdown breached
        $accountBreached = [
            'starting_balance' => 50000.0,
            'current_balance' => 47400.0, // below 47500
        ];
        $stateBreached = $engine->evaluateAccountState($accountBreached, $ruleSet);
        $this->assertFalse($stateBreached['can_trade']);
        $this->assertSame('breached', $stateBreached['risk_state']);
        $this->assertSame('max_drawdown_breached', $stateBreached['breach_reason']);

        // 4. Trade eligibility: stop loss required
        $eligibilityWithoutSl = $engine->checkTradeEligibility($account, $ruleSet, [
            'requested_contracts' => 2,
            'has_stop_loss' => false,
        ]);
        $this->assertFalse($eligibilityWithoutSl['can_trade']);
        $this->assertSame('stop_loss_required', $eligibilityWithoutSl['breach_reason']);

        // 5. Trade eligibility: max contracts exceeded
        $eligibilityContracts = $engine->checkTradeEligibility($account, $ruleSet, [
            'requested_contracts' => 20, // default max is 10
            'has_stop_loss' => true,
        ]);
        $this->assertFalse($eligibilityContracts['can_trade']);
        $this->assertSame('max_contracts_exceeded', $eligibilityContracts['breach_reason']);
    }

    public function testTopstepRuleEngineConsistencyAndDrawdown(): void
    {
        $engine = new TopstepRuleEngine();
        $ruleSet = [
            'starting_balance' => 50000.0,
            'daily_loss_limit' => 1000.0,
            'drawdown_limit' => 2000.0,
            'consistency_percent' => 50.0,
            'stop_loss_required' => 0,
        ];

        // 1. Healthy state
        $account = [
            'starting_balance' => 50000.0,
            'current_balance' => 52000.0,
        ];
        $state = $engine->evaluateAccountState($account, $ruleSet, [
            'largest_winning_day' => 800.0, // 50% cap of 2000 profit is 1000; 800 <= 1000
        ]);
        $this->assertTrue($state['can_trade']);
        $this->assertSame('healthy', $state['risk_state']);
        $this->assertSame(1000.0, $state['consistency_cap']);

        // 2. Consistency warning: single day exceeds 50% of total profits
        $stateConsistency = $engine->evaluateAccountState($account, $ruleSet, [
            'largest_winning_day' => 1500.0, // 1500 > 1000 cap
        ]);
        $this->assertTrue($stateConsistency['can_trade']);
        $this->assertSame('warning', $stateConsistency['risk_state']);
        $this->assertStringContainsString('Profit consistency', $stateConsistency['warnings'][0] ?? '');

        // 3. Trailing drawdown breach
        $accountBreach = [
            'starting_balance' => 50000.0,
            'current_balance' => 47900.0, // min balance is 48000
        ];
        $stateBreach = $engine->evaluateAccountState($accountBreach, $ruleSet);
        $this->assertFalse($stateBreach['can_trade']);
        $this->assertSame('breached', $stateBreach['risk_state']);
        $this->assertSame('trailing_drawdown_breached', $stateBreach['breach_reason']);
    }

    public function testPropFirmEngineIntegrationAndSymbolGating(): void
    {
        (new PropFirmDefaultsSeeder())->seedDefaults();
        $db = Database::connect();

        $firm = $db->table('bf_prop_firms')->where('slug', 'apex')->get()->getRowArray();
        $ruleSet = $db->table('bf_prop_rule_sets')->where('prop_firm_id', (int) $firm['id'])->get()->getRowArray();

        $db->table('bf_user_prop_accounts')->insert([
            'user_id' => self::USER_A,
            'prop_firm_id' => (int) $firm['id'],
            'prop_rule_set_id' => (int) $ruleSet['id'],
            'account_ref' => 'APEX-101',
            'account_status' => 'active',
            'starting_balance' => 50000.0,
            'current_balance' => 51500.0,
            'peak_balance' => 51500.0,
            'remaining_drawdown' => 4000.0,
            'remaining_dll' => 2500.0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $accountId = (int) $db->insertID();

        // Add allowed symbols for this rule set
        $db->table('bf_prop_allowed_symbols')->insert([
            'prop_rule_set_id' => (int) $ruleSet['id'],
            'symbol' => 'ES',
            'is_enabled' => 1,
        ]);
        $db->table('bf_prop_allowed_symbols')->insert([
            'prop_rule_set_id' => (int) $ruleSet['id'],
            'symbol' => 'NQ',
            'is_enabled' => 1,
        ]);

        $engine = new PropFirmEngine();

        // Evaluate account state persists snapshot
        $state = $engine->evaluateAccountState($accountId);
        $this->assertTrue($state['can_trade']);
        $this->assertSame('healthy', $state['risk_state']);

        $snapshot = $db->table('bf_prop_equity_history')->where('user_prop_account_id', $accountId)->get()->getRowArray();
        $this->assertNotNull($snapshot);
        $this->assertEquals(51500.0, (float) $snapshot['equity']);

        // Check trade eligibility with allowed symbol
        $allowedCheck = $engine->checkTradeEligibility($accountId, [
            'symbol' => 'ES',
            'requested_contracts' => 2,
            'has_stop_loss' => true,
        ]);
        $this->assertTrue($allowedCheck['can_trade']);

        // Check trade eligibility with forbidden symbol
        $disallowedCheck = $engine->checkTradeEligibility($accountId, [
            'symbol' => 'CL',
            'requested_contracts' => 2,
            'has_stop_loss' => true,
        ]);
        $this->assertFalse($disallowedCheck['can_trade']);
        $this->assertSame('symbol_not_allowed', $disallowedCheck['breach_reason']);
    }

    public function testPropFirmsServiceDashboardSummaryIsUserIsolated(): void
    {
        $db = Database::connect();

        // Create account for User A
        $db->table('bf_user_prop_accounts')->insert([
            'user_id' => self::USER_A,
            'prop_firm_id' => 1,
            'account_ref' => 'USERA-1',
            'account_status' => 'active',
            'starting_balance' => 50000.0,
            'current_balance' => 52000.0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $accIdA = (int) $db->insertID();

        // Create account for User B
        $db->table('bf_user_prop_accounts')->insert([
            'user_id' => self::USER_B,
            'prop_firm_id' => 1,
            'account_ref' => 'USERB-1',
            'account_status' => 'active',
            'starting_balance' => 50000.0,
            'current_balance' => 49000.0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $accIdB = (int) $db->insertID();

        // Positions: 2 open for User A, 1 for User B
        $db->table('bf_prop_positions')->insert([
            'user_prop_account_id' => $accIdA,
            'symbol' => 'ES',
            'side' => 'BUY',
            'quantity' => 1,
            'entry_price' => 5000.0,
            'closed_at' => null,
        ]);
        $db->table('bf_prop_positions')->insert([
            'user_prop_account_id' => $accIdA,
            'symbol' => 'NQ',
            'side' => 'BUY',
            'quantity' => 1,
            'entry_price' => 18000.0,
            'closed_at' => null,
        ]);
        $db->table('bf_prop_positions')->insert([
            'user_prop_account_id' => $accIdB,
            'symbol' => 'RTY',
            'side' => 'BUY',
            'quantity' => 1,
            'entry_price' => 2000.0,
            'closed_at' => null,
        ]);

        // Notifications: 1 for User A
        (new PropNotificationService())->notify([
            'user_prop_account_id' => $accIdA,
            'type' => 'INFO',
            'subject' => 'User A Alert',
            'body' => 'Notice for User A',
        ]);

        $service = new PropFirmsService();
        $summaryA = $service->dashboardSummary(self::USER_A);
        $summaryB = $service->dashboardSummary(self::USER_B);

        $this->assertSame(1, $summaryA['active_accounts']);
        $this->assertSame(2, $summaryA['open_positions']);
        $this->assertCount(1, $summaryA['notifications']);
        $this->assertSame(1, $summaryA['unread_notifications']);

        $this->assertSame(1, $summaryB['active_accounts']);
        $this->assertSame(1, $summaryB['open_positions']);
        $this->assertCount(0, $summaryB['notifications']);
    }

    public function testAccountsControllerIDORProtection(): void
    {
        $db = Database::connect();
        $db->table('bf_user_prop_accounts')->insert([
            'user_id' => self::USER_B,
            'prop_firm_id' => 1,
            'account_ref' => 'USERB-SECURE',
            'account_status' => 'active',
            'starting_balance' => 50000.0,
            'current_balance' => 50000.0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $foreignAccId = (int) $db->insertID();

        // User A attempts to view, update, delete, refresh, or connect broker to User B's account
        $controller = $this->createAccountsController(self::USER_A);

        // 1. Detail IDOR
        $detailResp = $controller->detail($foreignAccId);
        $this->assertSame(404, $detailResp->getStatusCode());

        // 2. Update IDOR
        $updateResp = $controller->update($foreignAccId);
        $this->assertSame(404, $updateResp->getStatusCode());

        // 3. Delete IDOR
        $deleteResp = $controller->delete($foreignAccId);
        $this->assertSame(404, $deleteResp->getStatusCode());

        // 4. RefreshState IDOR
        $refreshResp = $controller->refreshState($foreignAccId);
        $this->assertSame(404, $refreshResp->getStatusCode());

        // 5. AccountState IDOR
        $stateResp = $controller->accountState($foreignAccId);
        $this->assertSame(404, $stateResp->getStatusCode());

        // 6. ConnectBroker IDOR
        $connectResp = $controller->connectBroker($foreignAccId);
        $this->assertSame(404, $connectResp->getStatusCode());
    }

    public function testNotificationsControllerIDORProtection(): void
    {
        $db = Database::connect();
        $db->table('bf_user_prop_accounts')->insert([
            'user_id' => self::USER_B,
            'prop_firm_id' => 1,
            'account_ref' => 'USERB-NOTIF',
            'account_status' => 'active',
            'starting_balance' => 50000.0,
            'current_balance' => 50000.0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $foreignAccId = (int) $db->insertID();

        $notifService = new PropNotificationService();
        $notifId = $notifService->notify([
            'user_prop_account_id' => $foreignAccId,
            'type' => 'RISK_WARNING',
            'subject' => 'User B Risk Alert',
            'body' => 'Private risk body',
        ]);
        $this->assertNotNull($notifId);

        // User A attempts to mark User B's notification as read
        $controller = $this->createNotificationsController(self::USER_A);
        $resp = $controller->markRead($notifId);

        $this->assertSame(404, $resp->getStatusCode());
        $body = json_decode((string) $resp->getBody(), true);
        $this->assertSame('error', $body['status']);
        $this->assertSame('Notification not found.', $body['message']);

        // User B marks their own notification as read
        $controllerB = $this->createNotificationsController(self::USER_B);
        $respB = $controllerB->markRead($notifId);
        $this->assertSame(200, $respB->getStatusCode());
        $bodyB = json_decode((string) $respB->getBody(), true);
        $this->assertSame('ok', $bodyB['status']);
    }

    public function testTradovateControllerIDORProtection(): void
    {
        $db = Database::connect();
        $db->table('bf_user_prop_accounts')->insert([
            'user_id' => self::USER_B,
            'prop_firm_id' => 1,
            'account_ref' => 'USERB-TRADOVATE',
            'account_status' => 'active',
            'starting_balance' => 50000.0,
            'current_balance' => 50000.0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $foreignAccId = (int) $db->insertID();

        // User A attempts to connect, disconnect, or sync User B's Tradovate account
        $controller = $this->createTradovateController(self::USER_A);

        $this->assertSame(404, $controller->connect($foreignAccId)->getStatusCode());
        $this->assertSame(404, $controller->disconnect($foreignAccId)->getStatusCode());
        $this->assertSame(404, $controller->sync($foreignAccId)->getStatusCode());
        $this->assertSame(404, $controller->syncOrders($foreignAccId)->getStatusCode());
        $this->assertSame(404, $controller->syncFills($foreignAccId)->getStatusCode());
        $this->assertSame(404, $controller->syncPositions($foreignAccId)->getStatusCode());
    }

    public function testPropFirmsControllerSeedDefaultsRequiresAdmin(): void
    {
        // 1. Regular user session
        $controllerUser = $this->createPropFirmsController(self::USER_A, 'user');
        $respUser = $controllerUser->seedDefaults();
        $this->assertSame(403, $respUser->getStatusCode());
        $bodyUser = json_decode((string) $respUser->getBody(), true);
        $this->assertSame('Admin access required.', $bodyUser['message']);

        // 2. Admin session
        $controllerAdmin = $this->createPropFirmsController(self::USER_A, 'admin');
        $respAdmin = $controllerAdmin->seedDefaults();
        $this->assertSame(200, $respAdmin->getStatusCode());
        $bodyAdmin = json_decode((string) $respAdmin->getBody(), true);
        $this->assertSame('ok', $bodyAdmin['status']);
    }

    private function createAccountsController(int $userId): AccountsController
    {
        $controller = new AccountsController();
        $this->injectControllerState($controller, $userId);

        return $controller;
    }

    private function createNotificationsController(int $userId): NotificationsController
    {
        $controller = new NotificationsController();
        $this->injectControllerState($controller, $userId);

        return $controller;
    }

    private function createTradovateController(int $userId): TradovateController
    {
        $controller = new TradovateController();
        $this->injectControllerState($controller, $userId);

        return $controller;
    }

    private function createPropFirmsController(int $userId, string $role = 'user'): PropFirmsController
    {
        $controller = new PropFirmsController();
        $this->injectControllerState($controller, $userId, $role);

        return $controller;
    }

    private function injectControllerState(object $controller, int $userId, string $role = 'user'): void
    {
        $session = Services::session();
        $session->set('role', $role);

        $request = new class () extends IncomingRequest {
            public function __construct()
            {
                parent::__construct(config('App'), new URI('http://example.com/'), null, new UserAgent());
            }

            public function getPost($index = null, $filter = null, $flags = null)
            {
                return $index === null ? [] : null;
            }

            public function getJSON(bool $assoc = false, int $depth = 512, int $options = 0)
            {
                return [];
            }

            public function getMethod(bool $upper = false): string
            {
                return $upper ? 'POST' : 'post';
            }

            public function isAJAX(): bool
            {
                return true;
            }
        };

        $ref = new ReflectionClass($controller);

        if ($ref->hasProperty('cuID')) {
            $propCuId = $ref->getProperty('cuID');
            $propCuId->setAccessible(true);
            $propCuId->setValue($controller, $userId);
        }

        if ($ref->hasProperty('session')) {
            $propSession = $ref->getProperty('session');
            $propSession->setAccessible(true);
            $propSession->setValue($controller, $session);
        }

        $propReq = $ref->getProperty('request');
        $propReq->setAccessible(true);
        $propReq->setValue($controller, $request);

        $propResp = $ref->getProperty('response');
        $propResp->setAccessible(true);
        $propResp->setValue($controller, new Response(config('App')));
    }
}
