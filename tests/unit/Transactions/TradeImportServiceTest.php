<?php

declare(strict_types=1);

namespace Tests\Unit\Transactions;

use App\Models\InvestmentModel;
use App\Models\TransactionModel;
use App\Modules\User\Controllers\InvestmentsController;
use App\Services\TradeImportService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * GTM-034: Trade and transaction imports certification.
 *
 * Covers:
 * - Broker CSV format normalization and parsing.
 * - Input validation (numeric bounds, required columns).
 * - Deterministic trade signature and duplicate-import prevention.
 * - User-scoped batch insertion (IDOR prevention).
 * - TransactionModel idempotency and user scoping.
 */
final class TradeImportServiceTest extends CIUnitTestCase
{
    private const USER_A = 7001;
    private const USER_B = 7002;

    protected function setUp(): void
    {
        parent::setUp();

        $db = db_connect();
        $db->resetDataCache();

        $db->query('CREATE TABLE IF NOT EXISTS bf_users_trades (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            symbol TEXT NOT NULL,
            shares NUMERIC NOT NULL,
            entry_price NUMERIC NOT NULL,
            current_price NUMERIC NULL,
            total_trade_cost NUMERIC NULL,
            total_trade_costs NUMERIC NULL,
            net_gains NUMERIC NULL,
            order_status TEXT NOT NULL,
            trade_type TEXT NULL,
            position_type TEXT NULL,
            open_date TEXT NULL,
            open_time TEXT NULL,
            submitted_date TEXT NULL,
            created_on TEXT NULL,
            modified_on TEXT NULL,
            created_by INTEGER NULL,
            modified_by INTEGER NULL,
            status TEXT DEFAULT "Active",
            active INTEGER DEFAULT 1,
            closed TEXT DEFAULT "false",
            json_user_fields TEXT NULL
        )');

        foreach (['modified_on', 'net_gains', 'open_time', 'created_by', 'modified_by'] as $col) {
            try {
                $db->query("ALTER TABLE bf_users_trades ADD COLUMN {$col} TEXT NULL");
            } catch (\Throwable) {
                // Column already exists
            }
        }

        // Create isolated test table for bf_users_wallet_transactions
        $db->query('CREATE TABLE IF NOT EXISTS bf_users_wallet_transactions (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            transaction_id TEXT UNIQUE,
            user_id INTEGER,
            wallet_id INTEGER,
            amount NUMERIC DEFAULT 0,
            type TEXT,
            status TEXT DEFAULT "completed",
            reviewed INTEGER DEFAULT 0,
            reviewed_by TEXT,
            reviewed_at TEXT,
            review_notes TEXT,
            unix_timestamp INTEGER,
            submitted_date TEXT,
            month TEXT,
            day TEXT,
            year TEXT,
            time TEXT
        )');

        foreach (['user_id', 'wallet_id', 'amount', 'type', 'status', 'reviewed', 'reviewed_by', 'reviewed_at', 'review_notes', 'unix_timestamp', 'submitted_date', 'month', 'day', 'year', 'time'] as $col) {
            try {
                $db->query("ALTER TABLE bf_users_wallet_transactions ADD COLUMN {$col} TEXT NULL");
            } catch (\Throwable) {
                // Column already exists
            }
        }

        $db->table('bf_users_trades')->whereIn('user_id', [self::USER_A, self::USER_B])->delete();
        $db->table('bf_users_wallet_transactions')->whereIn('user_id', [self::USER_A, self::USER_B])->delete();
    }

    protected function tearDown(): void
    {
        $db = db_connect();
        $db->table('bf_users_trades')->whereIn('user_id', [self::USER_A, self::USER_B])->delete();
        $db->table('bf_users_wallet_transactions')->whereIn('user_id', [self::USER_A, self::USER_B])->delete();
        $db->resetDataCache();

        parent::tearDown();
    }

    public function testParseCsvStandardHeaders(): void
    {
        $service = new TradeImportService();
        $csv = "symbol,shares,entry_price,open_date,position_type\n"
             . "AAPL,10,150.25,2026-11-01,BUY\n"
             . "MSFT,5,320.50,2026-11-02,BUY\n";

        $res = $service->parseCsv($csv);

        $this->assertEmpty($res['errors']);
        $this->assertCount(2, $res['trades']);
        $this->assertSame('AAPL', $res['trades'][0]['symbol']);
        $this->assertSame(10.0, $res['trades'][0]['shares']);
        $this->assertSame(150.25, $res['trades'][0]['entry_price']);
        $this->assertSame('2026-11-01', $res['trades'][0]['open_date']);
        $this->assertSame('BUY', $res['trades'][0]['position_type']);
    }

    public function testParseCsvBrokerHeaderVariants(): void
    {
        $service = new TradeImportService();
        // Broker headers: Ticker, Quantity, Price, Date, Action
        $csv = "Ticker,Quantity,Price,Date,Action\n"
             . "NVDA,20,125.00,11/05/2026,Buy\n"
             . "TSLA,15,210.50,11/06/2026,Sell\n";

        $res = $service->parseCsv($csv);

        $this->assertEmpty($res['errors']);
        $this->assertCount(2, $res['trades']);
        $this->assertSame('NVDA', $res['trades'][0]['symbol']);
        $this->assertSame(20.0, $res['trades'][0]['shares']);
        $this->assertSame(125.0, $res['trades'][0]['entry_price']);
        $this->assertSame('2026-11-05', $res['trades'][0]['open_date']);
        $this->assertSame('BUY', $res['trades'][0]['position_type']);
        $this->assertSame('SELL', $res['trades'][1]['position_type']);
    }

    public function testParseCsvRejectsEmptyAndMissingHeaders(): void
    {
        $service = new TradeImportService();

        $emptyRes = $service->parseCsv('');
        $this->assertNotEmpty($emptyRes['errors']);
        $this->assertEmpty($emptyRes['trades']);

        $missingCols = "name,amount\nfoo,100\n";
        $missingRes = $service->parseCsv($missingCols);
        $this->assertNotEmpty($missingRes['errors']);
        $this->assertEmpty($missingRes['trades']);
    }

    public function testParseCsvRejectsNegativeOrZeroValues(): void
    {
        $service = new TradeImportService();
        $csv = "symbol,shares,entry_price\n"
             . "AAPL,-10,150\n"
             . "MSFT,5,0\n"
             . ",10,100\n";

        $res = $service->parseCsv($csv);
        $this->assertCount(3, $res['errors']);
        $this->assertEmpty($res['trades']);
    }

    public function testTradeSignatureIsDeterministic(): void
    {
        $service = new TradeImportService();
        $tradeA = [
            'symbol'        => 'aapl',
            'shares'        => 10,
            'entry_price'   => 150.25,
            'open_date'     => '2026-11-01',
            'position_type' => 'buy',
        ];
        $tradeB = [
            'symbol'        => 'AAPL',
            'shares'        => '10.0000',
            'entry_price'   => '150.2500',
            'open_date'     => '2026-11-01',
            'position_type' => 'BUY',
        ];

        $sigA = $service->computeTradeSignature(self::USER_A, $tradeA);
        $sigB = $service->computeTradeSignature(self::USER_A, $tradeB);
        $this->assertSame($sigA, $sigB, 'Trade signature must be normalized and deterministic.');

        $sigDifferentUser = $service->computeTradeSignature(self::USER_B, $tradeA);
        $this->assertNotSame($sigA, $sigDifferentUser, 'Trade signatures must differ across users.');
    }

    public function testImportTradesSuccessfulBatch(): void
    {
        $model = new InvestmentModel();
        $service = new TradeImportService($model);

        $trades = [
            ['symbol' => 'AMD', 'shares' => 10, 'entry_price' => 140.0, 'open_date' => '2026-11-10', 'position_type' => 'BUY'],
            ['symbol' => 'INTC', 'shares' => 50, 'entry_price' => 24.50, 'open_date' => '2026-11-10', 'position_type' => 'BUY'],
        ];

        $res = $service->importTrades(self::USER_A, $trades);

        $this->assertTrue($res['success'], 'Import must succeed: ' . implode('; ', $res['errors']));
        $this->assertSame(2, $res['imported_count']);
        $this->assertSame(0, $res['duplicate_count']);
        $this->assertCount(2, $res['imported_ids']);

        // Verify persisted in DB with user_id
        $db = db_connect();
        $saved = $db->table('bf_users_trades')->where('user_id', self::USER_A)->get()->getResultArray();
        $this->assertCount(2, $saved);
        $this->assertSame('AMD', $saved[0]['symbol']);
        $this->assertSame('INTC', $saved[1]['symbol']);
    }

    public function testImportTradesDuplicatePrevention(): void
    {
        $model = new InvestmentModel();
        $service = new TradeImportService($model);

        $csv = "symbol,shares,entry_price,open_date,position_type\n"
             . "AMZN,5,180.00,2026-11-12,BUY\n"
             . "GOOGL,8,175.50,2026-11-12,BUY\n";

        // First import
        $parsed = $service->parseCsv($csv);
        $res1 = $service->importTrades(self::USER_A, $parsed['trades'], true);
        $this->assertTrue($res1['success']);
        $this->assertSame(2, $res1['imported_count']);
        $this->assertSame(0, $res1['duplicate_count']);

        // Second import with identical CSV: must be skipped
        $res2 = $service->importTrades(self::USER_A, $parsed['trades'], true);
        $this->assertTrue($res2['success']);
        $this->assertSame(0, $res2['imported_count'], 'Duplicate trades must not be re-inserted.');
        $this->assertSame(2, $res2['duplicate_count'], 'Duplicates must be counted and reported.');

        // Verify database still only has 2 records
        $db = db_connect();
        $count = $db->table('bf_users_trades')->where('user_id', self::USER_A)->countAllResults();
        $this->assertSame(2, $count);
    }

    public function testImportTradesIntraBatchDeduplication(): void
    {
        $model = new InvestmentModel();
        $service = new TradeImportService($model);

        $trades = [
            ['symbol' => 'META', 'shares' => 10, 'entry_price' => 500.0, 'open_date' => '2026-11-14', 'position_type' => 'BUY'],
            ['symbol' => 'META', 'shares' => 10, 'entry_price' => 500.0, 'open_date' => '2026-11-14', 'position_type' => 'BUY'], // dup in same batch
        ];

        $res = $service->importTrades(self::USER_A, $trades, true);
        $this->assertTrue($res['success']);
        $this->assertSame(1, $res['imported_count']);
        $this->assertSame(1, $res['duplicate_count']);
    }

    public function testImportTradesRejectsInvalidUserId(): void
    {
        $service = new TradeImportService();
        $trades = [['symbol' => 'NFLX', 'shares' => 5, 'entry_price' => 600.0]];

        $res = $service->importTrades(0, $trades);
        $this->assertFalse($res['success']);
        $this->assertSame(0, $res['imported_count']);
        $this->assertNotEmpty($res['errors']);
    }

    public function testInvestmentModelImportInvestmentsFromCsvDelegates(): void
    {
        $model = new InvestmentModel();
        $tempFile = tempnam(sys_get_temp_dir(), 'trade_import_test_');
        file_put_contents($tempFile, "symbol,shares,entry_price,open_date,position_type\nSPY,10,580.0,2026-11-15,BUY\n");

        $result = $model->importInvestmentsFromCSV($tempFile, self::USER_A);
        @unlink($tempFile);

        $this->assertTrue($result['success']);
        $this->assertSame(1, $result['imported_count']);

        $db = db_connect();
        $record = $db->table('bf_users_trades')->where('user_id', self::USER_A)->where('symbol', 'SPY')->get()->getRowArray();
        $this->assertNotNull($record);
        $this->assertSame(self::USER_A, (int) $record['user_id']);
    }

    public function testTransactionModelInsertPreservesSuppliedTransactionId(): void
    {
        $model = new TransactionModel();
        $customId = 'txn_custom_idempotent_12345';

        $insertId = $model->insertTransaction([
            'transaction_id' => $customId,
            'user_id'        => self::USER_A,
            'wallet_id'      => 101,
            'amount'         => 150.00,
            'type'           => 'deposit',
        ]);

        $this->assertNotEmpty($insertId);

        $record = $model->getTransactionById($customId);
        $this->assertNotNull($record);
        $this->assertSame($customId, $record['transaction_id']);
        $this->assertSame(self::USER_A, (int) $record['user_id']);
    }

    public function testTransactionModelInsertGeneratesTransactionIdWhenOmitted(): void
    {
        $model = new TransactionModel();

        $insertId = $model->insertTransaction([
            'user_id'   => self::USER_A,
            'wallet_id' => 102,
            'amount'    => 75.00,
            'type'      => 'withdrawal',
        ]);

        $this->assertNotEmpty($insertId);

        $record = $model->find($insertId);
        $this->assertNotNull($record);
        $this->assertStringStartsWith('trans_', $record['transaction_id']);
    }

    public function testTransactionModelUpdateEnforcesUserScope(): void
    {
        $model = new TransactionModel();
        $customId = 'txn_scope_test_999';

        $model->insertTransaction([
            'transaction_id' => $customId,
            'user_id'        => self::USER_A,
            'wallet_id'      => 103,
            'amount'         => 200.00,
            'type'           => 'deposit',
            'status'         => 'pending',
        ]);

        // Attempt update with non-matching user_id: must not update
        $model->updateTransaction($customId, ['status' => 'settled'], self::USER_B);
        $check1 = $model->getTransactionById($customId);
        $this->assertSame('pending', $check1['status'], 'Non-owner must not mutate transaction.');

        // Update with owner user_id: succeeds
        $model->updateTransaction($customId, ['status' => 'settled'], self::USER_A);
        $check2 = $model->getTransactionById($customId);
        $this->assertSame('settled', $check2['status'], 'Owner must successfully mutate transaction.');
    }

    public function testSaveTradeDataRejectsUnauthorizedMutation(): void
    {
        $model = new InvestmentModel();
        $tradeId = $model->addTrade([
            'user_id'           => self::USER_A,
            'symbol'            => 'NVDA',
            'shares'            => 10,
            'entry_price'       => 120.0,
            'total_trade_costs' => 1200.0,
            'order_status'      => 'Open',
        ]);
        $this->assertNotEmpty($tradeId);

        // Instantiate controller via reflection without full initController side-effects
        $refClass = new \ReflectionClass(InvestmentsController::class);
        /** @var InvestmentsController $controller */
        $controller = $refClass->newInstanceWithoutConstructor();

        // Bind model and mock response
        $refModel = $refClass->getProperty('investmentModel');
        $refModel->setAccessible(true);
        $refModel->setValue($controller, $model);

        $refCuID = $refClass->getProperty('cuID');
        $refCuID->setAccessible(true);
        // User B attempts to mutate User A's trade
        $refCuID->setValue($controller, self::USER_B);

        // Mock incoming JSON request
        $mockRequest = new class () extends \CodeIgniter\HTTP\IncomingRequest {
            public array $jsonBody = [];

            public function __construct()
            {
                parent::__construct(config('App'), new \CodeIgniter\HTTP\URI(), null, new \CodeIgniter\HTTP\UserAgent());
            }

            public function getJSON(bool $assoc = false, int $depth = 512, int $options = 0)
            {
                return $this->jsonBody;
            }
        };
        $mockRequest->jsonBody = [
            'trade' => [
                'id'          => $tradeId,
                'symbol'      => 'PWNED',
                'shares'      => 50,
                'entry_price' => 10.0,
            ],
        ];

        $refReq = $refClass->getProperty('request');
        $refReq->setAccessible(true);
        $refReq->setValue($controller, $mockRequest);

        $refResp = $refClass->getProperty('response');
        $refResp->setAccessible(true);
        $refResp->setValue($controller, \Config\Services::response());

        // Execute saveTradeData: must return 403 Forbidden
        $response = $controller->saveTradeData();
        $this->assertSame(403, $response->getStatusCode(), 'Non-owner trade update must return 403 Forbidden.');

        // Verify trade in database remains untouched
        $persisted = $model->getTradeById($tradeId);
        $this->assertSame('NVDA', $persisted['symbol'], 'Trade symbol must not be altered by non-owner.');
        $this->assertSame(self::USER_A, (int) $persisted['user_id']);

        // Now set controller user to OWNER (User A) and retry update
        $refCuID->setValue($controller, self::USER_A);
        $mockRequest->jsonBody['trade']['symbol'] = 'NVDA_UPDATED';

        $ownerResponse = $controller->saveTradeData();
        $this->assertSame(200, $ownerResponse->getStatusCode(), 'Owner trade update must return 200 OK.');

        $updated = $model->getTradeById($tradeId);
        $this->assertSame('NVDA_UPDATED', $updated['symbol'], 'Owner update must be persisted.');
    }
}
