<?php

declare(strict_types=1);

namespace Tests\Unit\Investments;

use App\Models\InvestmentModel;
use App\Modules\User\Controllers\InvestmentsController;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\URI;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\Test\CIUnitTestCase;
use ReflectionClass;

/**
 * GTM-039 / GTM-040: Certification tests for Watchlists, Goals, and Strategies.
 *
 * Verifies:
 * - Watchlist CRUD: addToWatchlist, removeFromWatchlist, getUserWatchlist.
 * - Watchlist IDOR: user cannot access foreign watchlist; unauthenticated calls rejected.
 * - Financial Goals CRUD: create, read, update, delete with owner authorization.
 * - Financial Goals IDOR: non-owners cannot read, update, or delete foreign goals.
 * - Investment Strategies CRUD: create, read, update, delete with owner authorization.
 * - Investment Strategies IDOR: non-owners cannot read, update, or delete foreign strategies.
 * - Route handler coverage for previously missing InvestmentsController methods.
 */
final class InvestmentsWatchlistAndGoalsTest extends CIUnitTestCase
{
    private const USER_A = 8001;
    private const USER_B = 8002;

    private InvestmentModel $model;

    protected function setUp(): void
    {
        parent::setUp();
        helper(['feature', 'premium']);

        $mockEntitlement = new class () extends \App\Services\PremiumEntitlementService {
            public function resolve(?int $userId, array $context = []): array
            {
                return [
                    'featureAllowed'   => true,
                    'isLoggedIn'       => $userId !== null && $userId > 0,
                    'membershipTier'   => 'tier1',
                    'membershipStatus' => 'active',
                ];
            }
        };
        Services::injectMock('premiumEntitlementService', $mockEntitlement);

        $db = db_connect();
        $db->resetDataCache();

        $db->query('CREATE TABLE IF NOT EXISTS bf_users_watchlist (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            symbol TEXT NOT NULL,
            current_price NUMERIC NULL,
            created_on TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_financial_goals (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            name TEXT NOT NULL,
            target_amount NUMERIC NULL,
            description TEXT NULL,
            created_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_investment_strategies (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            name TEXT NOT NULL,
            description TEXT NULL,
            created_at TEXT NULL
        )');

        $db->table('bf_users_watchlist')->emptyTable();
        $db->table('bf_financial_goals')->emptyTable();
        $db->table('bf_investment_strategies')->emptyTable();

        $this->model = new InvestmentModel();
    }

    private function createController(?int $userId = self::USER_A, array $post = [], array $rawInput = [], string $method = 'GET'): InvestmentsController
    {
        $request = new class ($post, $rawInput, $method) extends IncomingRequest {
            public function __construct(
                private array $mockPost,
                private array $mockRawInput,
                private string $mockMethod
            ) {
                parent::__construct(config('App'), new URI('http://example.com/'), null, new UserAgent());
            }

            public function getPost($index = null, $filter = null, $flags = null)
            {
                if ($index === null) {
                    return $this->mockPost;
                }
                return $this->mockPost[$index] ?? null;
            }

            public function getRawInput(): array
            {
                return $this->mockRawInput;
            }

            public function getMethod(bool $upper = false): string
            {
                return $upper ? strtoupper($this->mockMethod) : strtolower($this->mockMethod);
            }

            public function isAJAX(): bool
            {
                return true;
            }
        };

        $controller = new InvestmentsController();
        $ref = new ReflectionClass(InvestmentsController::class);

        $propCuId = $ref->getProperty('cuID');
        $propCuId->setAccessible(true);
        $propCuId->setValue($controller, $userId);

        $propReq = $ref->getProperty('request');
        $propReq->setAccessible(true);
        $propReq->setValue($controller, $request);

        $propResp = $ref->getProperty('response');
        $propResp->setAccessible(true);
        $propResp->setValue($controller, new Response(config('App')));

        $propModel = $ref->getProperty('investmentModel');
        $propModel->setAccessible(true);
        $propModel->setValue($controller, $this->model);

        return $controller;
    }

    // ==========================================
    // Watchlist Tests (GTM-039)
    // ==========================================

    public function testAddToWatchlistStoresNormalizedSymbol(): void
    {
        $controller = $this->createController(self::USER_A, ['symbol' => 'aapl']);
        $response = $controller->addToWatchlist();

        $this->assertSame(200, $response->getStatusCode());
        $data = json_decode($response->getBody(), true);
        $this->assertSame('success', $data['status']);
        $this->assertSame('AAPL', $data['symbol']);

        $watchlist = $this->model->getUserWatchlist(self::USER_A);
        $this->assertCount(1, $watchlist);
        $this->assertSame('AAPL', $watchlist[0]['symbol']);
    }

    public function testAddToWatchlistRejectsEmptySymbol(): void
    {
        $controller = $this->createController(self::USER_A, ['symbol' => '']);
        $response = $controller->addToWatchlist();

        $this->assertSame(400, $response->getStatusCode());
        $data = json_decode($response->getBody(), true);
        $this->assertSame('error', $data['status']);
        $this->assertStringContainsString('Symbol is required', $data['message']);
    }

    public function testAddToWatchlistRejectsUnauthenticatedUser(): void
    {
        $controller = $this->createController(null, ['symbol' => 'TSLA']);
        $response = $controller->addToWatchlist();

        $this->assertSame(401, $response->getStatusCode());
    }

    public function testRemoveFromWatchlistRemovesOwnedSymbol(): void
    {
        $this->model->addToWatchlist(self::USER_A, 'NVDA');
        $this->assertCount(1, $this->model->getUserWatchlist(self::USER_A));

        $controller = $this->createController(self::USER_A, ['symbol' => 'NVDA']);
        $response = $controller->removeFromWatchlist();

        $this->assertSame(200, $response->getStatusCode());
        $this->assertEmpty($this->model->getUserWatchlist(self::USER_A));
    }

    public function testGetUserWatchlistReturnsUserItems(): void
    {
        $this->model->addToWatchlist(self::USER_A, 'MSFT');
        $this->model->addToWatchlist(self::USER_A, 'AMZN');

        $controller = $this->createController(self::USER_A);
        $response = $controller->getUserWatchlist(self::USER_A);

        $this->assertSame(200, $response->getStatusCode());
        $payload = json_decode($response->getBody(), true);
        $this->assertSame('success', $payload['status']);
        $this->assertCount(2, $payload['data']);
    }

    public function testGetUserWatchlistIDORForbidden(): void
    {
        $this->model->addToWatchlist(self::USER_B, 'GOOGL');

        // User A attempts to request User B's watchlist
        $controller = $this->createController(self::USER_A);
        $response = $controller->getUserWatchlist(self::USER_B);

        $this->assertSame(403, $response->getStatusCode());
        $payload = json_decode($response->getBody(), true);
        $this->assertSame('Forbidden', $payload['message']);
    }

    public function testWatchlistEndpointReturnsData(): void
    {
        $this->model->addToWatchlist(self::USER_A, 'SPY');

        $controller = $this->createController(self::USER_A);
        $response = $controller->watchlist();

        $this->assertSame(200, $response->getStatusCode());
        $payload = json_decode($response->getBody(), true);
        $this->assertSame('success', $payload['status']);
        $this->assertSame('SPY', $payload['data'][0]['symbol']);
    }

    // ==========================================
    // Financial Goals Tests (GTM-040)
    // ==========================================

    public function testCreateGoalSuccess(): void
    {
        $controller = $this->createController(self::USER_A, [
            'name'          => 'Emergency Fund',
            'target_amount' => 10000.0,
            'description'   => '6 months of living expenses',
        ]);

        $response = $controller->createGoal();
        $this->assertSame(200, $response->getStatusCode());
        $payload = json_decode($response->getBody(), true);
        $this->assertSame('success', $payload['status']);
        $this->assertGreaterThan(0, $payload['id']);

        $goal = $this->model->getGoalById((int) $payload['id'], self::USER_A);
        $this->assertNotNull($goal);
        $this->assertSame('Emergency Fund', $goal['name']);
        $this->assertSame(self::USER_A, (int) $goal['user_id']);
    }

    public function testCreateGoalRejectsEmptyName(): void
    {
        $controller = $this->createController(self::USER_A, [
            'name'          => '',
            'target_amount' => 5000.0,
        ]);

        $response = $controller->createGoal();
        $this->assertSame(400, $response->getStatusCode());
    }

    public function testGetGoalsReturnsOnlyUserGoals(): void
    {
        $this->model->createGoal(['user_id' => self::USER_A, 'name' => 'Goal A1']);
        $this->model->createGoal(['user_id' => self::USER_A, 'name' => 'Goal A2']);
        $this->model->createGoal(['user_id' => self::USER_B, 'name' => 'Goal B1']);

        $controller = $this->createController(self::USER_A);
        $response = $controller->getGoals();

        $this->assertSame(200, $response->getStatusCode());
        $goals = json_decode($response->getBody(), true);
        $this->assertCount(2, $goals);
        $this->assertSame('Goal A1', $goals[0]['name']);
        $this->assertSame('Goal A2', $goals[1]['name']);
    }

    public function testGetGoalIDORProtection(): void
    {
        $bId = $this->model->createGoal(['user_id' => self::USER_B, 'name' => 'Secret B Goal']);

        // User A tries to view User B's goal
        $controller = $this->createController(self::USER_A);
        $response = $controller->getGoal((int) $bId);

        $this->assertSame(404, $response->getStatusCode());
    }

    public function testUpdateGoalOwnerSuccessAndIDORProtection(): void
    {
        $aId = $this->model->createGoal(['user_id' => self::USER_A, 'name' => 'Original Goal A']);
        $bId = $this->model->createGoal(['user_id' => self::USER_B, 'name' => 'Original Goal B']);

        // Owner updates own goal
        $controllerA = $this->createController(self::USER_A, [], ['name' => 'Updated Goal A']);
        $responseA = $controllerA->updateGoal((int) $aId);
        $this->assertSame(200, $responseA->getStatusCode());

        $updatedA = $this->model->getGoalById((int) $aId, self::USER_A);
        $this->assertSame('Updated Goal A', $updatedA['name']);

        // User A attempts to update User B's goal
        $responseB = $controllerA->updateGoal((int) $bId);
        $this->assertSame(404, $responseB->getStatusCode());

        $untouchedB = $this->model->getGoalById((int) $bId, self::USER_B);
        $this->assertSame('Original Goal B', $untouchedB['name'], 'Foreign goal must remain unchanged');
    }

    public function testDeleteGoalOwnerSuccessAndIDORProtection(): void
    {
        $aId = $this->model->createGoal(['user_id' => self::USER_A, 'name' => 'Goal to delete']);
        $bId = $this->model->createGoal(['user_id' => self::USER_B, 'name' => 'Goal B protect']);

        $controllerA1 = $this->createController(self::USER_A);

        // User A cannot delete User B's goal
        $responseB = $controllerA1->deleteGoal((int) $bId);
        $this->assertSame(404, $responseB->getStatusCode());
        $this->assertNotNull($this->model->getGoalById((int) $bId, self::USER_B));

        // Owner deletes own goal with fresh response context
        $controllerA2 = $this->createController(self::USER_A);
        $responseA = $controllerA2->deleteGoal((int) $aId);
        $this->assertSame(200, $responseA->getStatusCode());
        $this->assertNull($this->model->getGoalById((int) $aId, self::USER_A));
    }

    // ==========================================
    // Investment Strategies Tests (GTM-040)
    // ==========================================

    public function testCreateStrategySuccess(): void
    {
        $controller = $this->createController(self::USER_A, [
            'name'        => 'Wheel Strategy',
            'description' => 'Cash-secured puts and covered calls',
        ]);

        $response = $controller->createStrategy();
        $this->assertSame(200, $response->getStatusCode());
        $payload = json_decode($response->getBody(), true);
        $this->assertSame('success', $payload['status']);

        $strategy = $this->model->getStrategyById((int) $payload['id'], self::USER_A);
        $this->assertNotNull($strategy);
        $this->assertSame('Wheel Strategy', $strategy['name']);
    }

    public function testStrategyIDORProtection(): void
    {
        $bId = $this->model->createStrategy(['user_id' => self::USER_B, 'name' => 'Secret B Strategy']);

        $controllerA = $this->createController(self::USER_A);

        // Get foreign strategy -> 404
        $getResp = $controllerA->getStrategy((int) $bId);
        $this->assertSame(404, $getResp->getStatusCode());

        // Update foreign strategy -> 404
        $updateResp = $controllerA->updateStrategy((int) $bId);
        $this->assertSame(404, $updateResp->getStatusCode());

        // Delete foreign strategy -> 404
        $delResp = $controllerA->deleteStrategy((int) $bId);
        $this->assertSame(404, $delResp->getStatusCode());

        $this->assertNotNull($this->model->getStrategyById((int) $bId, self::USER_B));
    }

    // ==========================================
    // Additional Handlers Tests (GTM-024)
    // ==========================================

    public function testAutoSaveAndTestEndpoints(): void
    {
        $controller = $this->createController(self::USER_A);

        $autoSaveResp = $controller->autoSave();
        $this->assertSame(200, $autoSaveResp->getStatusCode());
        $autoSaveData = json_decode($autoSaveResp->getBody(), true);
        $this->assertSame('success', $autoSaveData['status']);

        $testResp = $controller->test();
        $this->assertSame(200, $testResp->getStatusCode());
        $testData = json_decode($testResp->getBody(), true);
        $this->assertSame('success', $testData['status']);
    }
}
