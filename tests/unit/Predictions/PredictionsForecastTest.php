<?php

declare(strict_types=1);

namespace Tests\Unit\Predictions;

use App\Filters\FeatureFlagFilter;
use App\Libraries\MyMIPredictions;
use App\Models\InvestmentForecastAccuracyModel;
use App\Models\InvestmentForecastHistoryModel;
use App\Models\InvestmentPriceForecastModel;
use App\Models\Predictions\LiquidityModel;
use App\Models\Predictions\MarketsModel;
use App\Models\Predictions\OptionsModel;
use App\Models\Predictions\OrdersModel;
use App\Models\Predictions\PayoutsModel;
use App\Models\Predictions\PositionsModel;
use App\Models\Predictions\SettlementsModel;
use App\Models\Predictions\TradesModel;
use App\Modules\APIs\Controllers\PredictionsAPIController;
use App\Modules\User\Controllers\InvestmentsController;
use App\Modules\User\Controllers\PredictionsController;
use App\Services\Forecasting\ForecastAccuracyEvaluator;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\URI;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;
use Config\Features;
use ReflectionClass;
use ReflectionMethod;

final class PredictionsForecastTest extends CIUnitTestCase
{
    protected $db;
    protected MyMIPredictions $predictionsService;
    protected MarketsModel $marketsModel;
    protected OptionsModel $optionsModel;
    protected OrdersModel $ordersModel;
    protected PositionsModel $positionsModel;
    protected SettlementsModel $settlementsModel;
    protected PayoutsModel $payoutsModel;
    protected TradesModel $tradesModel;
    protected LiquidityModel $liquidityModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->db = Database::connect();
        $this->db->resetDataCache();

        $this->ensureTables();

        $this->marketsModel = new MarketsModel();
        $this->optionsModel = new OptionsModel();
        $this->ordersModel = new OrdersModel();
        $this->positionsModel = new PositionsModel();
        $this->settlementsModel = new SettlementsModel();
        $this->payoutsModel = new PayoutsModel();
        $this->tradesModel = new TradesModel();
        $this->liquidityModel = new LiquidityModel();

        $this->predictionsService = new MyMIPredictions(
            $this->marketsModel,
            $this->optionsModel,
            $this->ordersModel,
            $this->tradesModel,
            $this->positionsModel,
            $this->liquidityModel,
            $this->settlementsModel,
            $this->payoutsModel,
            null,
            null,
            null,
            null,
            null,
            $this->db
        );
    }

    protected function tearDown(): void
    {
        $this->cleanTables();
        parent::tearDown();
    }

    private function ensureTables(): void
    {
        $schemas = [
            'settings' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                class VARCHAR(255) NOT NULL,
                key VARCHAR(255) NOT NULL,
                value TEXT NULL,
                type VARCHAR(31) NOT NULL DEFAULT 'string',
                context VARCHAR(255) NULL,
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'users' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                username VARCHAR(100) NULL,
                status VARCHAR(255) NULL,
                status_message VARCHAR(255) NULL,
                active TINYINT(1) NOT NULL DEFAULT 1,
                last_active DATETIME NULL,
                created_at DATETIME NULL,
                updated_at DATETIME NULL,
                deleted_at DATETIME NULL,
                email VARCHAR(255) NULL
            )",
            'predictions_markets' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                slug VARCHAR(150) NULL,
                title VARCHAR(255) NOT NULL,
                description TEXT NULL,
                category VARCHAR(100) DEFAULT 'General',
                resolution_source VARCHAR(150) DEFAULT 'Admin/Oracle',
                currency_mode VARCHAR(20) DEFAULT 'GOLD_CENTRIC',
                state VARCHAR(20) DEFAULT 'OPEN',
                open_at DATETIME NULL,
                lock_at DATETIME NULL,
                resolve_at DATETIME NULL,
                created_by INTEGER NULL,
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'predictions_options' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                market_id INTEGER NOT NULL,
                label VARCHAR(150) NOT NULL,
                odds_bips INTEGER DEFAULT 0,
                liquidity_gold DECIMAL(20,8) DEFAULT '0.00000000',
                is_winner TINYINT(1) DEFAULT 0,
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'predictions_orders' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                market_id INTEGER NOT NULL,
                option_id INTEGER NOT NULL,
                side VARCHAR(10) DEFAULT 'BUY',
                stake_amount DECIMAL(20,8) DEFAULT '0.00000000',
                stake_asset VARCHAR(20) DEFAULT 'MIMG',
                expected_payout DECIMAL(20,8) DEFAULT '0.00000000',
                fee_bips INTEGER DEFAULT 0,
                state VARCHAR(20) DEFAULT 'PENDING',
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'predictions_positions' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                market_id INTEGER NOT NULL,
                option_id INTEGER NOT NULL,
                avg_entry_odds_bips INTEGER DEFAULT 0,
                stake_asset VARCHAR(20) DEFAULT 'MIMG',
                stake_total DECIMAL(20,8) DEFAULT '0.00000000',
                payout_max DECIMAL(20,8) DEFAULT '0.00000000',
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'predictions_liquidity' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                market_id INTEGER NOT NULL,
                option_id INTEGER NOT NULL,
                provider_user_id INTEGER NOT NULL,
                asset VARCHAR(20) DEFAULT 'MIMG',
                amount DECIMAL(20,8) DEFAULT '0.00000000',
                state VARCHAR(20) DEFAULT 'ACTIVE',
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'predictions_trades' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                order_id INTEGER NULL,
                user_id INTEGER NOT NULL,
                market_id INTEGER NOT NULL,
                option_id INTEGER NOT NULL,
                stake_asset VARCHAR(20) DEFAULT 'MIMG',
                stake_amount DECIMAL(20,8) DEFAULT '0.00000000',
                fee_amount DECIMAL(20,8) DEFAULT '0.00000000',
                fill_odds_bips INTEGER DEFAULT 0,
                created_at DATETIME NULL
            )",
            'predictions_settlements' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                market_id INTEGER NOT NULL,
                winning_option_id INTEGER NOT NULL,
                resolver_user_id INTEGER NULL,
                resolution_note TEXT NULL,
                resolved_at DATETIME NOT NULL,
                created_at DATETIME NULL
            )",
            'predictions_payouts' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                market_id INTEGER NOT NULL,
                position_id INTEGER NOT NULL,
                asset VARCHAR(20) DEFAULT 'MIMG',
                amount DECIMAL(20,8) DEFAULT '0.00000000',
                status VARCHAR(20) DEFAULT 'PENDING',
                tx_ref VARCHAR(100) NULL,
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            )",
            'investment_price_forecasts' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                alert_id INTEGER NULL,
                ticker VARCHAR(16) NOT NULL,
                timeframe VARCHAR(16) NOT NULL,
                forecast_direction VARCHAR(16) NOT NULL,
                target_price DECIMAL(16,6) NULL,
                range_low DECIMAL(16,6) NULL,
                range_high DECIMAL(16,6) NULL,
                confidence_score INTEGER DEFAULT 0,
                signal_score DECIMAL(10,4) NULL,
                indicators_json TEXT NULL,
                data_source VARCHAR(32) DEFAULT 'alphavantage',
                created_at DATETIME NOT NULL,
                updated_at DATETIME NULL
            )",
            'investment_forecast_history' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                forecast_id INTEGER NOT NULL,
                ticker VARCHAR(16) NOT NULL,
                timeframe VARCHAR(16) NOT NULL,
                forecast_direction VARCHAR(16) NOT NULL,
                target_price DECIMAL(16,6) NULL,
                range_low DECIMAL(16,6) NULL,
                range_high DECIMAL(16,6) NULL,
                confidence_score INTEGER DEFAULT 0,
                indicators_json TEXT NULL,
                recorded_at DATETIME NOT NULL
            )",
            'investment_forecast_accuracy' => "CREATE TABLE IF NOT EXISTS %s (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                forecast_id INTEGER NOT NULL,
                ticker VARCHAR(16) NOT NULL,
                timeframe VARCHAR(16) NOT NULL,
                evaluation_window INTEGER NOT NULL,
                forecast_direction VARCHAR(16) NOT NULL,
                confidence_score INTEGER DEFAULT 0,
                target_price DECIMAL(16,6) NULL,
                range_low DECIMAL(16,6) NULL,
                range_high DECIMAL(16,6) NULL,
                hit_result VARCHAR(16) DEFAULT 'unknown',
                mfe DECIMAL(16,6) NULL,
                mae DECIMAL(16,6) NULL,
                window_start DATETIME NULL,
                window_end DATETIME NULL,
                evaluated_at DATETIME NULL,
                notes TEXT NULL,
                created_at DATETIME NOT NULL
            )",
        ];

        foreach ($schemas as $table => $ddl) {
            $this->db->query(sprintf($ddl, $table));
            $this->db->query(sprintf($ddl, 'bf_' . $table));
        }
    }

    private function cleanTables(): void
    {
        $tables = [
            'predictions_payouts',
            'predictions_settlements',
            'predictions_trades',
            'predictions_positions',
            'predictions_orders',
            'predictions_options',
            'predictions_liquidity',
            'predictions_markets',
            'investment_forecast_accuracy',
            'investment_forecast_history',
            'investment_price_forecasts',
            'settings',
            'users',
        ];

        foreach ($tables as $t) {
            $this->db->query("DELETE FROM {$t}");
            $this->db->query("DELETE FROM bf_{$t}");
        }
    }

    /**
     * 1. Test MyMIPredictions constants and state/mode helpers
     */
    public function testConstantsAndStateOptions(): void
    {
        $this->assertSame(['DRAFT', 'OPEN', 'LOCKED', 'RESOLVED', 'CANCELED'], MyMIPredictions::VALID_STATES);
        $this->assertSame(MyMIPredictions::VALID_STATES, MyMIPredictions::ALL_STATES);
        $this->assertSame(['OPEN', 'LOCKED', 'RESOLVED', 'CANCELED'], MyMIPredictions::PUBLIC_STATES);
        $this->assertSame(['GOLD_CENTRIC', 'MULTI_ASSET'], MyMIPredictions::VALID_MODES);
        $this->assertSame(MyMIPredictions::VALID_MODES, MyMIPredictions::MODES);

        $publicStates = $this->predictionsService->allowedStates(true);
        $this->assertSame(MyMIPredictions::PUBLIC_STATES, $publicStates);

        $allStates = $this->predictionsService->allowedStates(false);
        $this->assertSame(MyMIPredictions::ALL_STATES, $allStates);

        $modes = $this->predictionsService->allowedModes();
        $this->assertSame(MyMIPredictions::MODES, $modes);
    }

    /**
     * 2. Test feature switch disabled by default for predictions
     */
    public function testPredictionsFeatureSwitchOffByDefault(): void
    {
        /** @var Features $features */
        $features = config('Features');
        $this->assertFalse($features->enabled('FEATURE_PREDICTIONS'), 'FEATURE_PREDICTIONS must be disabled by default');

        // Test FeatureFlagFilter rejects API/JSON request with 503
        $filter = new FeatureFlagFilter();
        $request = Services::incomingrequest(null, false);
        $request->setHeader('Accept', 'application/json');
        $res = $filter->before($request, ['predictions']);
        $this->assertInstanceOf(\CodeIgniter\HTTP\ResponseInterface::class, $res);
        $this->assertSame(503, $res->getStatusCode());

        // Test standard browser request redirects back with 302
        $requestHtml = Services::incomingrequest(null, false);
        $resHtml = $filter->before($requestHtml, ['predictions']);
        $this->assertInstanceOf(\CodeIgniter\HTTP\ResponseInterface::class, $resHtml);
        $this->assertSame(302, $resHtml->getStatusCode());
    }

    /**
     * 3. Test AMM odds calculation and bounds (clamped 1% - 99%)
     */
    public function testAmmOddsCalculationAndBounds(): void
    {
        $ref = new ReflectionMethod(MyMIPredictions::class, 'quoteOddsBipsAmm');
        $ref->setAccessible(true);

        // Equal liquidity 100 vs 100 with small stake
        $oddsEqual = $ref->invoke($this->predictionsService, 100.0, 100.0, 1.0);
        $this->assertGreaterThanOrEqual(4900, $oddsEqual);
        $this->assertLessThanOrEqual(5100, $oddsEqual);

        // Extreme skew (high Yes, low No) should be capped at 9900 bips (99%)
        $oddsHigh = $ref->invoke($this->predictionsService, 10000.0, 0.01, 10.0);
        $this->assertSame(9900, $oddsHigh);

        // Extreme skew (low Yes, high No) should be floored at 100 bips (1%)
        $oddsLow = $ref->invoke($this->predictionsService, 0.01, 10000.0, 10.0);
        $this->assertSame(100, $oddsLow);
    }

    /**
     * 4. Test market creation and option retrieval
     */
    public function testMarketCreationAndRetrieval(): void
    {
        $marketData = [
            'title' => 'Will Gold hit $3000 by year end?',
            'description' => 'Prediction on bullion pricing',
            'category' => 'Commodities',
            'resolution_source' => 'LBMA Fix',
            'currency_mode' => 'GOLD_CENTRIC',
            'options' => ['Yes', 'No'],
        ];

        $marketId = $this->predictionsService->createMarket($marketData, 1);
        $this->assertGreaterThan(0, $marketId);

        $market = $this->predictionsService->getMarket($marketId);
        $this->assertSame('Will Gold hit $3000 by year end?', $market['title']);
        $this->assertSame('OPEN', $market['state']);
        $this->assertCount(2, $market['options']);
        $this->assertSame('Yes', $market['options'][0]['label']);
        $this->assertSame('No', $market['options'][1]['label']);

        // Add liquidity
        $optId = (int) $market['options'][0]['id'];
        $liqRes = $this->predictionsService->addLiquidity([
            'market_id' => $marketId,
            'option_id' => $optId,
            'amount' => 100.0,
            'asset' => 'MIMG',
        ], 1);
        $this->assertTrue($liqRes['ok']);

        $updatedMarket = $this->predictionsService->getMarket($marketId);
        $this->assertEqualsWithDelta(100.0, (float) $updatedMarket['options'][0]['liquidity_gold'], 0.001);
    }

    /**
     * 5. Test order placement and position accumulation
     */
    public function testOrderPlacementAndPositionsAccumulation(): void
    {
        $marketId = $this->predictionsService->createMarket([
            'title' => 'Will BTC flip ETH forever?',
            'options' => ['Yes', 'No'],
            'initial_liquidity' => [500.0, 500.0],
        ], 1);

        $market = $this->predictionsService->getMarket($marketId);
        $yesOptionId = (int) $market['options'][0]['id'];

        $orderPayload = [
            'market_id' => $marketId,
            'option_id' => $yesOptionId,
            'stake_asset' => 'MIMG',
            'stake_amount' => 50.0,
            'idempotency_key' => 'tx_pred_order_001',
        ];

        $res = $this->predictionsService->placeOrder($orderPayload, 42);
        $this->assertTrue($res['ok']);
        $this->assertGreaterThan(0, $res['order_id']);

        // Check positions table
        $pos = $this->positionsModel->where(['user_id' => 42, 'market_id' => $marketId])->first();
        $this->assertNotNull($pos);
        $this->assertEqualsWithDelta(50.0, (float) $pos['stake_total'], 0.001);
        $this->assertGreaterThan(0, (float) $pos['payout_max']);

        // Test idempotency replay
        $resReplay = $this->predictionsService->placeOrder($orderPayload, 42);
        $this->assertTrue($resReplay['ok']);
        $this->assertTrue($resReplay['idempotent']);
        $this->assertSame($res['order_id'], $resReplay['order_id']);
    }

    /**
     * 6. Test order cancellation IDOR protection
     */
    public function testCancelOrderScopingAndIdorProtection(): void
    {
        $marketId = $this->predictionsService->createMarket([
            'title' => 'Will DGB reach $1 in 2027?',
            'options' => ['Yes', 'No'],
            'initial_liquidity' => [200.0, 200.0],
        ], 1);

        $market = $this->predictionsService->getMarket($marketId);
        $yesOptionId = (int) $market['options'][0]['id'];

        $orderRes = $this->predictionsService->placeOrder([
            'market_id' => $marketId,
            'option_id' => $yesOptionId,
            'stake_asset' => 'MIMG',
            'stake_amount' => 20.0,
        ], 10);

        $orderId = (int) $orderRes['order_id'];

        // Attacker (User 99) attempts to cancel User 10's order
        $hacked = $this->predictionsService->cancelOrder($orderId, 99);
        $this->assertFalse($hacked, 'User 99 must not be able to cancel User 10 order');

        // Order state must NOT be canceled
        $order = $this->ordersModel->find($orderId);
        $this->assertNotSame('CANCELED', $order['state']);

        // Owner (User 10) cancels their own order
        $canceled = $this->predictionsService->cancelOrder($orderId, 10);
        $this->assertTrue($canceled);

        $orderAfter = $this->ordersModel->find($orderId);
        $this->assertSame('CANCELED', $orderAfter['state']);
    }

    /**
     * 7. Test market settlement and payout generation
     */
    public function testMarketSettlementAndPayoutCreation(): void
    {
        $marketId = $this->predictionsService->createMarket([
            'title' => 'Will S&P 500 close higher this week?',
            'options' => ['Yes', 'No'],
            'initial_liquidity' => [100.0, 100.0],
        ], 1);

        $market = $this->predictionsService->getMarket($marketId);
        $yesOptionId = (int) $market['options'][0]['id'];

        // User 7 buys Yes
        $this->predictionsService->placeOrder([
            'market_id' => $marketId,
            'option_id' => $yesOptionId,
            'stake_asset' => 'MIMG',
            'stake_amount' => 25.0,
        ], 7);

        // Settle market with Yes as winner
        $settleResult = $this->predictionsService->settleMarket($marketId, 1, $yesOptionId, 'Official market close verification');
        $this->assertTrue($settleResult['ok']);
        $this->assertGreaterThanOrEqual(1, $settleResult['enqueued']);

        // Verify market state
        $resolvedMarket = $this->predictionsService->getMarket($marketId, false);
        $this->assertSame('RESOLVED', $resolvedMarket['state']);

        // Verify options winner
        $options = $this->optionsModel->forMarket($marketId);
        $this->assertSame(1, (int) $options[0]['is_winner']);
        $this->assertSame(0, (int) $options[1]['is_winner']);

        // Verify payout record
        $payout = $this->payoutsModel->where(['user_id' => 7, 'market_id' => $marketId])->first();
        $this->assertNotNull($payout);
        $this->assertSame('PENDING', $payout['status']);
        $this->assertGreaterThan(0, (float) $payout['amount']);
    }

    /**
     * 8. Test PredictionsAPIController authentication enforcement
     */
    public function testPredictionsAPIControllerAuthEnforcement(): void
    {
        $controller = new PredictionsAPIController();
        $request = Services::incomingrequest(null, false);
        $response = Services::response();
        $logger = Services::logger();
        $controller->initController($request, $response, $logger);

        // Without authentication, createMarket must return 401
        $resCreate = $controller->createMarket();
        $this->assertSame(401, $resCreate->getStatusCode());

        // placeOrder must return 401
        $resOrder = $controller->placeOrder();
        $this->assertSame(401, $resOrder->getStatusCode());

        // cancelOrder must return 401
        $resCancel = $controller->cancelOrder();
        $this->assertSame(401, $resCancel->getStatusCode());

        // settle must return 401
        $resSettle = $controller->settle(1);
        $this->assertSame(401, $resSettle->getStatusCode());

        // addLiquidity must return 401
        $resLiq = $controller->addLiquidity();
        $this->assertSame(401, $resLiq->getStatusCode());
    }

    /**
     * 9. Test InvestmentsController forecast modal payload presentation
     */
    public function testForecastModalPresentationPayload(): void
    {
        $forecasts = [
            [
                'timeframe' => '1d',
                'forecast_direction' => 'bullish',
                'confidence_score' => 88,
                'target_price' => '152.500000',
                'range_low' => '149.000000',
                'range_high' => '155.000000',
                'indicators_json' => json_encode(['rsi' => 64.2, 'macd' => 'bullish']),
                'updated_at' => '2026-11-23 12:00:00',
            ],
            [
                'timeframe' => '7d',
                'forecast_direction' => 'neutral',
                'confidence_score' => 55,
                'target_price' => '151.000000',
                'range_low' => '145.000000',
                'range_high' => '158.000000',
                'indicators_json' => json_encode(['rsi' => 50.1]),
                'updated_at' => '2026-11-23 12:00:00',
            ],
        ];

        $history = [
            [
                'recorded_at' => '2026-11-22 12:00:00',
                'timeframe' => '1d',
                'forecast_direction' => 'bullish',
                'confidence_score' => 82,
                'target_price' => '150.000000',
                'range_low' => '148.000000',
                'range_high' => '153.000000',
                'indicators_json' => json_encode(['rsi' => 60.5]),
            ],
        ];

        $controller = new InvestmentsController();
        $refMethod = new ReflectionMethod(InvestmentsController::class, 'buildForecastDetailsPayload');
        $refMethod->setAccessible(true);

        $payload = $refMethod->invoke($controller, 'AAPL', $forecasts, $history);
        $this->assertArrayHasKey('timeframes', $payload);
        $this->assertArrayHasKey('history', $payload);
        $this->assertArrayHasKey('1d', $payload['timeframes']);
        $this->assertSame('bullish', $payload['timeframes']['1d']['direction']);
        $this->assertSame(88, $payload['timeframes']['1d']['confidence']);
        $this->assertSame(64.2, $payload['timeframes']['1d']['indicators']['rsi']);

        // Check history
        $this->assertCount(1, $payload['history']);
        $this->assertSame(82, $payload['history'][0]['confidence']);
    }

    /**
     * 10. Test ForecastAccuracyEvaluator summary metrics and window evaluation
     */
    public function testForecastAccuracyEvaluatorSummary(): void
    {
        $accuracyModel = new InvestmentForecastAccuracyModel();
        $now = date('Y-m-d H:i:s');

        $accuracyModel->insert([
            'forecast_id' => 101,
            'ticker' => 'NVDA',
            'timeframe' => '1d',
            'evaluation_window' => 1,
            'forecast_direction' => 'bullish',
            'confidence_score' => 90,
            'hit_result' => 'hit',
            'created_at' => $now,
        ]);

        $accuracyModel->insert([
            'forecast_id' => 102,
            'ticker' => 'NVDA',
            'timeframe' => '1d',
            'evaluation_window' => 1,
            'forecast_direction' => 'bullish',
            'confidence_score' => 60,
            'hit_result' => 'miss',
            'created_at' => $now,
        ]);

        $evaluator = new ForecastAccuracyEvaluator(null, $accuracyModel);
        $summary = $evaluator->buildAccuracySummary('7d');

        $this->assertSame('7d', $summary['window']);
        $this->assertArrayHasKey('accuracyByTimeframe', $summary);
        $this->assertArrayHasKey('accuracyByDirection', $summary);
        $this->assertArrayHasKey('confidenceBuckets', $summary);

        $this->assertNotEmpty($summary['accuracyByTimeframe']);
        $this->assertSame('1d', $summary['accuracyByTimeframe'][0]['label']);
        $this->assertSame(1, $summary['accuracyByTimeframe'][0]['hits']);
        $this->assertSame(2, $summary['accuracyByTimeframe'][0]['total']);
        $this->assertEqualsWithDelta(50.0, (float) $summary['accuracyByTimeframe'][0]['hit_rate'], 0.1);

        $this->assertNotEmpty($summary['accuracyByDirection']);
        $this->assertSame('bullish', $summary['accuracyByDirection'][0]['label']);
        $this->assertSame(1, $summary['accuracyByDirection'][0]['hits']);
        $this->assertSame(2, $summary['accuracyByDirection'][0]['total']);
        $this->assertEqualsWithDelta(50.0, (float) $summary['accuracyByDirection'][0]['hit_rate'], 0.1);

        $this->assertNotEmpty($summary['confidenceBuckets']);
        $bucket85 = null;
        foreach ($summary['confidenceBuckets'] as $b) {
            if (($b['label'] ?? '') === '85-100') {
                $bucket85 = $b;
                break;
            }
        }
        $this->assertNotNull($bucket85);
        $this->assertSame(1, $bucket85['hits']);
        $this->assertSame(1, $bucket85['total']);
        $this->assertEqualsWithDelta(100.0, (float) $bucket85['hit_rate'], 0.1);
    }
}
