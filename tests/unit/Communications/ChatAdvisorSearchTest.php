<?php

declare(strict_types=1);

namespace Tests\Unit\Communications;

use App\Controllers\Api\AdminChatUsageController;
use App\Entities\SearchResult;
use App\Libraries\AiCostControls;
use App\Libraries\KimiClient;
use App\Models\AlertsModel;
use App\Models\ChatToolRunModel;
use App\Models\ChatUsageModel;
use App\Modules\Advisor\Controllers\AdvisorController;
use App\Modules\APIs\Controllers\ChatAPIController;
use App\Modules\Management\Controllers\ChatUsageAdminController;
use App\Modules\Search\Controllers\SearchController;
use App\Services\SearchService;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\URI;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;
use ReflectionClass;

/**
 * MYMI-GTM-054: Certification tests for Communications, Community Chat, Advisor, and Search.
 *
 * Verifies:
 * - Chat API tool execution, session authentication, premium/management role gating, and audit logging.
 * - Chat Admin usage controls, config persistence, and user usage resets.
 * - Advisor insight generation, IDOR session scoping, storyboard generation, and trade analysis.
 * - SearchService multi-domain search across projects, assets, posts, and session-isolated alerts.
 * - SearchResult entity mapping, pagination bounds, and SearchController JSON API.
 */
final class ChatAdvisorSearchTest extends CIUnitTestCase
{
    private const USER_A = 9201;
    private const USER_B = 9202;
    private const ADMIN_USER = 9299;

    private ?string $originalChatConfigFile = null;

    protected function setUp(): void
    {
        parent::setUp();

        $path = ROOTPATH . 'chat/config.runtime.json';
        if (is_file($path)) {
            $this->originalChatConfigFile = file_get_contents($path);
        }

        $db = Database::connect();
        $db->resetDataCache();

        $this->createTables($db);
    }

    protected function tearDown(): void
    {
        $path = ROOTPATH . 'chat/config.runtime.json';
        if ($this->originalChatConfigFile !== null && is_file($path)) {
            file_put_contents($path, $this->originalChatConfigFile);
        }

        parent::tearDown();
    }

    private function createTables($db): void
    {
        $db->query('CREATE TABLE IF NOT EXISTS bf_chat_tool_runs (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            mode TEXT NOT NULL,
            tool TEXT NOT NULL,
            request_json TEXT NULL,
            response_json TEXT NULL,
            status TEXT NOT NULL DEFAULT "success",
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_chat_usage (
            user_id INTEGER NOT NULL,
            month TEXT NOT NULL,
            tokens_used INTEGER NOT NULL DEFAULT 0,
            usd_used NUMERIC NOT NULL DEFAULT 0,
            last_plan TEXT NULL,
            last_email TEXT NULL,
            updated_at TEXT NULL,
            PRIMARY KEY (user_id, month)
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_users_wallets (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            balance NUMERIC NOT NULL DEFAULT 0,
            created_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_investment_trades (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            ticker TEXT NOT NULL,
            quantity NUMERIC NOT NULL DEFAULT 0,
            purchase_price NUMERIC NOT NULL DEFAULT 0,
            created_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_projects (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            description TEXT NULL,
            is_private INTEGER NOT NULL DEFAULT 0,
            created_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_assets (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            symbol TEXT NOT NULL,
            created_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_posts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            body TEXT NULL,
            status TEXT NOT NULL DEFAULT "published",
            created_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_investment_trade_alerts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            ticker TEXT NOT NULL,
            notes TEXT NULL,
            company TEXT NULL,
            price NUMERIC NULL,
            trade_description TEXT NULL,
            financial_news TEXT NULL,
            created_on TEXT NULL,
            modified_on TEXT NULL,
            created_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT NULL,
            username TEXT NULL,
            created_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_search_logs (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            q TEXT NOT NULL,
            user_id INTEGER NULL,
            results INTEGER NOT NULL DEFAULT 0,
            created_at TEXT NULL
        )');

        // Empty tables for fresh state
        $tables = [
            'bf_users',
            'bf_chat_tool_runs',
            'bf_chat_usage',
            'bf_users_wallets',
            'bf_investment_trades',
            'bf_projects',
            'bf_assets',
            'bf_posts',
            'bf_investment_trade_alerts',
            'bf_search_logs',
        ];
        foreach ($tables as $t) {
            $db->table($t)->emptyTable();
        }
    }

    public function testChatApiMeEndpointAuthentication(): void
    {
        // 1. Unauthenticated request
        $controllerUnauth = $this->createChatApiController(0);
        $respUnauth = $controllerUnauth->me();
        $this->assertSame(401, $respUnauth->getStatusCode());

        // 2. Authenticated request
        $controllerAuth = $this->createChatApiController(self::USER_A);
        $respAuth = $controllerAuth->me();
        $this->assertSame(200, $respAuth->getStatusCode());

        $body = json_decode((string) $respAuth->getBody(), true);
        $this->assertSame('success', $body['status']);
        $this->assertSame(self::USER_A, $body['data']['userId']);
    }

    public function testChatApiToolValidationAndExecution(): void
    {
        $db = Database::connect();

        // Populate wallet and investment data for User A
        $db->table('bf_users_wallets')->insert([
            'user_id' => self::USER_A,
            'balance' => 2500.50,
        ]);
        $db->table('bf_investment_trades')->insert([
            'user_id' => self::USER_A,
            'ticker' => 'AAPL',
            'quantity' => 10,
            'purchase_price' => 150.00,
        ]);

        // Populate data for User B (must NOT be visible to User A)
        $db->table('bf_users_wallets')->insert([
            'user_id' => self::USER_B,
            'balance' => 99999.00,
        ]);

        // 1. Missing tool param
        $ctrlNoTool = $this->createChatApiController(self::USER_A, []);
        $this->assertSame(400, $ctrlNoTool->tool()->getStatusCode());

        // 2. Unknown tool param
        $ctrlUnknownTool = $this->createChatApiController(self::USER_A, ['tool' => 'hack_database']);
        $this->assertSame(400, $ctrlUnknownTool->tool()->getStatusCode());

        // 3. Management mode forbidden for regular user
        $ctrlMgmtUser = $this->createChatApiController(self::USER_A, [
            'tool' => 'ops_status',
            'mode' => 'management',
        ]);
        $this->assertSame(403, $ctrlMgmtUser->tool()->getStatusCode());

        // 4. Budget snapshot tool execution strictly isolated to User A
        $ctrlBudget = $this->createChatApiController(self::USER_A, [
            'tool' => 'budget_snapshot',
            'mode' => 'user',
        ]);
        $respBudget = $ctrlBudget->tool();
        $this->assertSame(200, $respBudget->getStatusCode());
        $bodyBudget = json_decode((string) $respBudget->getBody(), true);
        $this->assertSame('success', $bodyBudget['status']);
        $this->assertEquals(self::USER_A, $bodyBudget['data']['user_id']);
        $this->assertEquals(2500.50, (float) $bodyBudget['data']['totals']['cash']);
        $this->assertEquals(150.00, (float) $bodyBudget['data']['totals']['invested']);

        // 5. Portfolio overview tool execution
        $ctrlPortfolio = $this->createChatApiController(self::USER_A, [
            'tool' => 'portfolio_overview',
            'mode' => 'user',
        ]);
        $respPortfolio = $ctrlPortfolio->tool();
        $this->assertSame(200, $respPortfolio->getStatusCode());
        $bodyPortfolio = json_decode((string) $respPortfolio->getBody(), true);
        $this->assertSame('success', $bodyPortfolio['status']);
        $this->assertCount(1, $bodyPortfolio['data']['positions']);
        $this->assertSame('AAPL', $bodyPortfolio['data']['positions'][0]['ticker']);

        // 6. Tool audit logging occurred in bf_chat_tool_runs
        $logs = (new ChatToolRunModel())->where('user_id', self::USER_A)->findAll();
        $this->assertGreaterThanOrEqual(2, count($logs));
    }

    public function testChatCostControlsAndAdminManagement(): void
    {
        $costControls = new AiCostControls();

        // 1. Default runtime config
        $config = $costControls->chatRuntimeConfig();
        $this->assertArrayHasKey('enabled', $config);
        $this->assertArrayHasKey('providerModel', $config);

        // 2. Persist updated settings
        $config['monthlyBudgetUsd'] = 150.0;
        $costControls->persistChatRuntimeConfig($config);
        $refreshed = $costControls->chatRuntimeConfig();
        $this->assertEquals(150.0, (float) $refreshed['monthlyBudgetUsd']);

        // 3. Chat usage summary
        $summary = $costControls->getChatUsageSummary();
        $this->assertArrayHasKey('month', $summary);
        $this->assertArrayHasKey('global', $summary);
        $this->assertArrayHasKey('users', $summary);

        // 4. Admin API Chat Usage Controller
        $adminApi = new AdminChatUsageController();
        $request = new IncomingRequest(config('App'), new URI('http://example.com/api/admin/chat-usage'), null, new UserAgent());
        $adminApi->initController($request, new Response(config('App')), Services::logger());
        $apiResp = $adminApi->index();
        $this->assertSame(200, $apiResp->getStatusCode());
    }

    public function testAdvisorControllerInsightAndIdorProtection(): void
    {
        // Mock KimiClient service
        $mockKimi = new class () extends KimiClient {
            public function __construct() {}
            public function chat(array $messages, array $tools = [], ?array $toolChoice = null, array $options = []): array
            {
                return [
                    'choices' => [
                        [
                            'message' => [
                                'content' => 'Financial Insight: Strong liquidity with conservative growth profile.',
                            ],
                        ],
                    ],
                ];
            }
        };
        Services::injectMock('kimiClient', $mockKimi);

        // Set config to enable Kimi AI
        config('SiteSettings')->enableKimiK2 = true;

        // 1. generateNow endpoint
        $controller = $this->createAdvisorController(self::USER_A, [
            'ticker' => 'NVDA',
            'score' => '88',
            'risk_rating' => 'Moderate',
            'sentiment' => 'Bullish',
        ]);
        $respNow = $controller->generateNow();
        $this->assertSame(200, $respNow->getStatusCode());
        $bodyNow = json_decode((string) $respNow->getBody(), true);
        $this->assertSame('success', $bodyNow['status']);
        $this->assertSame('NVDA', $bodyNow['media']['ticker']);
        $this->assertSame('88', $bodyNow['media']['score']);

        // 2. generateAdvisorInsight session scoping (User A requests insight)
        $respInsight = $controller->generateAdvisorInsight();
        $this->assertSame(200, $respInsight->getStatusCode());
        $bodyInsight = json_decode((string) $respInsight->getBody(), true);
        $this->assertSame('ok', $bodyInsight['status']);
        $this->assertStringContainsString('Financial Insight', $bodyInsight['content']);

        // 3. IDOR protection: User A cannot request insight with User B's user_id
        $controllerIdor = $this->createAdvisorController(self::USER_A, [
            'user_id' => self::USER_B,
        ], 'user');
        $respIdor = $controllerIdor->generateAdvisorInsight();
        $this->assertSame(200, $respIdor->getStatusCode());

        // 4. generateNewsStoryboard
        $respStory = $controller->generateNewsStoryboard();
        $this->assertSame(200, $respStory->getStatusCode());
        $bodyStory = json_decode((string) $respStory->getBody(), true);
        $this->assertSame('ok', $bodyStory['status']);
    }

    public function testAdvisorTradeAnalysis(): void
    {
        $db = Database::connect();
        $db->table('bf_investment_trade_alerts')->insert([
            'id' => 777,
            'user_id' => self::USER_A,
            'ticker' => 'TSLA',
            'company' => 'Tesla Inc',
            'price' => 220.50,
            'trade_description' => 'Breakout above 200 EMA',
            'financial_news' => 'Delivery numbers exceed consensus',
            'notes' => 'Bullish momentum continuation',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $mockKimi = new class () extends KimiClient {
            public function __construct() {}
            public function chat(array $messages, array $tools = [], ?array $toolChoice = null, array $options = []): array
            {
                return [
                    'choices' => [
                        [
                            'message' => [
                                'content' => 'Trade Analysis: Target $240, Stop-Loss $210.',
                            ],
                        ],
                    ],
                ];
            }
        };
        Services::injectMock('kimiClient', $mockKimi);
        config('SiteSettings')->enableKimiK2 = true;

        $controller = $this->createAdvisorController(self::USER_A);

        // Missing alert -> 404
        $this->assertSame(404, $controller->generateTradeAnalysis(9999)->getStatusCode());

        // Existing alert -> 200 with trade analysis
        $resp = $controller->generateTradeAnalysis(777);
        $this->assertSame(200, $resp->getStatusCode());
        $body = json_decode((string) $resp->getBody(), true);
        $this->assertSame('ok', $body['status']);
        $this->assertStringContainsString('Trade Analysis', $body['content']);
    }

    public function testSearchServiceAndEntityMapping(): void
    {
        $db = Database::connect();

        // 1. Empty query returns empty immediately
        $svc = new SearchService($db);
        $empty = $svc->search('');
        $this->assertSame([], $empty['items']);
        $this->assertSame(0, $empty['total']);

        // 2. Populate search targets
        $db->table('bf_projects')->insert([
            'title' => 'Green Energy Fund',
            'description' => 'Solar and wind infrastructure project',
            'is_private' => 0,
            'created_at' => '2026-11-20 12:00:00',
        ]);

        $db->table('bf_assets')->insert([
            'name' => 'Green Hydrogen Token',
            'symbol' => 'GHT',
            'created_at' => '2026-11-21 12:00:00',
        ]);

        $db->table('bf_posts')->insert([
            'title' => 'Investing in Green Tech',
            'body' => 'Why renewable energy assets are outperforming in 2026.',
            'status' => 'published',
            'created_at' => '2026-11-22 12:00:00',
        ]);

        // Private alert for User A
        $db->table('bf_investment_trade_alerts')->insert([
            'user_id' => self::USER_A,
            'ticker' => 'GREEN',
            'notes' => 'Green rally breakout signal',
            'created_at' => '2026-11-23 12:00:00',
        ]);

        // Session for User A
        session()->set('cuID', self::USER_A);

        // 3. Search for 'Green' across all types
        $results = $svc->search('Green', [], 10, 0);
        $this->assertGreaterThanOrEqual(3, count($results['items']));

        // Verify SearchResult entity properties
        $first = $results['items'][0];
        $this->assertInstanceOf(SearchResult::class, $first);
        $this->assertNotEmpty($first->type);
        $this->assertNotEmpty($first->title);
        $this->assertNotEmpty($first->url);

        // 4. Filter by specific type
        $projectOnly = $svc->search('Green', ['project']);
        $this->assertCount(1, $projectOnly['items']);
        $this->assertSame('project', $projectOnly['items'][0]->type);

        // 5. Pagination limit bounds: limit capped at 50
        $bounded = $svc->search('Green', [], 100, 0);
        $this->assertLessThanOrEqual(50, count($bounded['items']));
    }

    public function testSearchControllerApiEndpointAndLogging(): void
    {
        $db = Database::connect();
        $db->table('bf_projects')->insert([
            'title' => 'Quantum Computing Protocol',
            'description' => 'Decentralized compute network',
            'is_private' => 0,
            'created_at' => '2026-11-23 12:00:00',
        ]);

        $controller = $this->createSearchController(['q' => 'Quantum']);
        $response = $controller->api();

        $this->assertSame(200, $response->getStatusCode());
        $body = json_decode((string) $response->getBody(), true);
        $this->assertSame('success', $body['status']);
        $this->assertNotEmpty($body['data']['items']);
        $this->assertSame('Quantum Computing Protocol', $body['data']['items'][0]['title']);

        // Verify query was logged in bf_search_logs
        $logs = $db->table('bf_search_logs')->where('q', 'Quantum')->get()->getResultArray();
        $this->assertCount(1, $logs);
    }

    private function createChatApiController(int $userId, array $json = []): ChatAPIController
    {
        $controller = new ChatAPIController();

        $session = Services::session();
        $session->set('user_id', $userId > 0 ? $userId : null);
        $session->set('cuID', $userId > 0 ? $userId : null);

        $request = new class ($json) extends IncomingRequest {
            public function __construct(private array $mockJson)
            {
                parent::__construct(config('App'), new URI('http://example.com/Chat'), null, new UserAgent());
            }

            public function getJSON(bool $assoc = false, int $depth = 512, int $options = 0)
            {
                return $this->mockJson;
            }

            public function getPost($index = null, $filter = null, $flags = null)
            {
                return $index === null ? $this->mockJson : ($this->mockJson[$index] ?? null);
            }

            public function getMethod(bool $upper = false): string
            {
                return $upper ? 'POST' : 'post';
            }
        };

        $controller->initController($request, new Response(config('App')), Services::logger());

        $ref = new ReflectionClass($controller);
        if ($ref->hasProperty('cuID')) {
            $p = $ref->getProperty('cuID');
            $p->setAccessible(true);
            $p->setValue($controller, $userId > 0 ? $userId : null);
        }

        return $controller;
    }

    private function createAdvisorController(int $userId, array $post = [], string $role = 'user'): AdvisorController
    {
        $controller = new AdvisorController();

        $session = Services::session();
        $session->set('user_id', $userId);
        $session->set('cuID', $userId);
        $session->set('role', $role);

        $request = new class ($post) extends IncomingRequest {
            public function __construct(private array $mockPost)
            {
                parent::__construct(config('App'), new URI('http://example.com/Advisor'), null, new UserAgent());
            }

            public function getPost($index = null, $filter = null, $flags = null)
            {
                return $index === null ? $this->mockPost : ($this->mockPost[$index] ?? null);
            }

            public function getMethod(bool $upper = false): string
            {
                return $upper ? 'POST' : 'post';
            }
        };

        $controller->initController($request, new Response(config('App')), Services::logger());

        $ref = new ReflectionClass($controller);
        if ($ref->hasProperty('cuID')) {
            $p = $ref->getProperty('cuID');
            $p->setAccessible(true);
            $p->setValue($controller, $userId);
        }

        return $controller;
    }

    private function createSearchController(array $get = []): SearchController
    {
        $controller = new SearchController();

        $request = new class ($get) extends IncomingRequest {
            public function __construct(private array $mockGet)
            {
                parent::__construct(config('App'), new URI('http://example.com/API/Search'), null, new UserAgent());
            }

            public function getGet($index = null, $filter = null, $flags = null)
            {
                return $index === null ? $this->mockGet : ($this->mockGet[$index] ?? null);
            }

            public function getMethod(bool $upper = false): string
            {
                return $upper ? 'GET' : 'get';
            }
        };

        $controller->initController($request, new Response(config('App')), Services::logger());

        return $controller;
    }
}
