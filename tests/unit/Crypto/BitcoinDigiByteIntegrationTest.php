<?php

declare(strict_types=1);

namespace Tests\Unit\Crypto;

use App\Modules\APIs\Controllers\BitcoinAPIController;
use App\Modules\Exchange\Controllers\DigiByteController;
use App\Services\BitcoinService;
use App\Services\DigiByteService;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\URI;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Bitcoin;
use Config\Database;
use Config\DigiByte;
use ReflectionClass;

require_once APPPATH . 'Database/Migrations/2026-11-22-000200_CreateExchangeCoinAddressTable.php';
use App\Database\Migrations\CreateExchangeCoinAddressTable;

final class BitcoinDigiByteIntegrationTest extends CIUnitTestCase
{
    protected $db;
    protected BitcoinService $btcService;
    protected DigiByteService $dgbService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->db = Database::connect();
        $this->db->resetDataCache();

        // Ensure bf_exchanges_coin_addresses table exists
        $migration = new CreateExchangeCoinAddressTable(Database::forge($this->db));
        $migration->up();

        $this->db->table('bf_exchanges_coin_addresses')->emptyTable();

        $this->btcService = new BitcoinService();
        $this->dgbService = new DigiByteService();
    }

    protected function tearDown(): void
    {
        $this->db->table('bf_exchanges_coin_addresses')->emptyTable();
        parent::tearDown();
    }

    // =========================================================================
    // 1. Bitcoin Service Address & PSBT Validation
    // =========================================================================

    public function testBitcoinAddressValidation(): void
    {
        // Valid mainnet P2PKH (starts with 1)
        $this->assertTrue($this->btcService->isValidAddress('1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa'));

        // Valid mainnet P2SH (starts with 3)
        $this->assertTrue($this->btcService->isValidAddress('3J98t1WpEZ73CNmQviecrnyiWrnqRhWNLy'));

        // Valid mainnet Bech32 (starts with bc1)
        $this->assertTrue($this->btcService->isValidAddress('bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdq'));

        // Valid testnet Bech32 (starts with tb1)
        $this->assertTrue($this->btcService->isValidAddress('tb1qw508d6qejxtdg4y5r3zarvary0c5xw7kxpjzsx'));

        // Invalid addresses
        $this->assertFalse($this->btcService->isValidAddress(''));
        $this->assertFalse($this->btcService->isValidAddress('   '));
        $this->assertFalse($this->btcService->isValidAddress('not-a-valid-btc-address'));
        $this->assertFalse($this->btcService->isValidAddress('4A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa')); // Invalid prefix
        $this->assertFalse($this->btcService->isValidAddress(str_repeat('1', 80))); // Too long
    }

    public function testBitcoinBuildUnsignedPsbt(): void
    {
        $inputs = [
            [
                'txid' => '0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef',
                'vout' => 0,
            ],
        ];
        $outputs = [
            [
                'address' => 'bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdq',
                'value'   => 50000,
            ],
        ];

        $psbtBase64 = $this->btcService->buildUnsignedPsbt($inputs, $outputs, 'mainnet');
        $this->assertIsString($psbtBase64);

        $decoded = base64_decode($psbtBase64, true);
        $this->assertNotFalse($decoded);

        // Standard BIP174 magic bytes: "psbt\xff"
        $this->assertStringStartsWith("\x70\x73\x62\x74\xff", $decoded);
    }

    public function testBitcoinBuildUnsignedPsbtRejectsInvalidInputsOutputs(): void
    {
        $validInputs = [
            [
                'txid' => '0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef',
                'vout' => 1,
            ],
        ];
        $validOutputs = [
            [
                'address' => '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa',
                'value'   => 10000,
            ],
        ];

        // Empty inputs
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('PSBT requires at least one input');
        $this->btcService->buildUnsignedPsbt([], $validOutputs);
    }

    public function testBitcoinBuildUnsignedPsbtRejectsInvalidTxid(): void
    {
        $invalidInputs = [
            [
                'txid' => 'short-txid',
                'vout' => 0,
            ],
        ];
        $validOutputs = [
            [
                'address' => '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa',
                'value'   => 10000,
            ],
        ];

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('missing or invalid txid');
        $this->btcService->buildUnsignedPsbt($invalidInputs, $validOutputs);
    }

    public function testBitcoinBroadcastRawTransactionDeterministicDryRun(): void
    {
        // 32-byte synthetic raw tx hex (valid hex, even length)
        $syntheticTxHex = '02000000010123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef0000000000ffffffff01a086010000000000160014751e76e8199196d454941c45d1b3a323f1433bd600000000';

        $txid = $this->btcService->broadcastRawTransaction($syntheticTxHex, 'mainnet');
        $this->assertIsString($txid);
        $this->assertSame(64, strlen($txid));

        // Deterministic sha256d computation check
        $binary = (string) hex2bin($syntheticTxHex);
        $expectedTxid = bin2hex(strrev(hash('sha256', hash('sha256', $binary, true), true)));
        $this->assertSame($expectedTxid, $txid);
    }

    public function testBitcoinMainnetGuardrails(): void
    {
        // Devnet / testnet allowed
        $testnetCheck = $this->btcService->guardMainnetAction('broadcast', 'testnet');
        $this->assertTrue($testnetCheck['allowed']);
        $this->assertTrue($testnetCheck['success']);

        // Mainnet blocked by default
        $mainnetCheck = $this->btcService->guardMainnetAction('broadcast', 'mainnet');
        $this->assertFalse($mainnetCheck['allowed']);
        $this->assertFalse($mainnetCheck['success']);
        $this->assertSame('blocked', $mainnetCheck['status']);
        $this->assertStringContainsString('disabled by safety guardrails', $mainnetCheck['message']);

        // Service broadcast method returns dry-run status
        $broadcastResult = $this->btcService->broadcast('020000000001');
        $this->assertSame('dry_run', $broadcastResult['status']);
        $this->assertFalse($broadcastResult['broadcast']);
        $this->assertTrue($broadcastResult['dry_run']);
    }

    // =========================================================================
    // 2. DigiByte Service Address & Broadcast Validation
    // =========================================================================

    public function testDigiByteAddressValidation(): void
    {
        // Legacy P2PKH (starts with D)
        $this->assertTrue($this->dgbService->isValidAddress('D7W6b9qMhUjV66PcvYp5W2y2j5n6e6r2t1'));
        $this->assertTrue($this->dgbService->isValidAddress('DQr3jA2B76X1Bq9Vw2k8L9m8N7b6V5c4X3'));

        // Script P2SH (starts with S)
        $this->assertTrue($this->dgbService->isValidAddress('SR4y8q1K2K3m3v7q9w8e7r6t5y4u3m2k1j'));

        // SegWit Bech32 (starts with dgb1)
        $this->assertTrue($this->dgbService->isValidAddress('dgb1qvhegm2c0ea5v2nvwwhgr6h432g6a29g2vqv20e'));

        // Invalid addresses
        $this->assertFalse($this->dgbService->isValidAddress(''));
        $this->assertFalse($this->dgbService->isValidAddress('   '));
        $this->assertFalse($this->dgbService->isValidAddress('1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa')); // Bitcoin address
        $this->assertFalse($this->dgbService->isValidAddress('X7W6b9qMhUjV66PcvYp5W2y2j5n6e6r2t1')); // Invalid prefix
        $this->assertFalse($this->dgbService->isValidAddress('short'));
    }

    public function testDigiByteMainnetGuardrailsAndBroadcastDryRun(): void
    {
        // Non-mainnet allowed
        $testnetCheck = $this->dgbService->guardMainnetAction('broadcast', 'testnet');
        $this->assertTrue($testnetCheck['allowed']);
        $this->assertTrue($testnetCheck['success']);

        // Mainnet blocked by default
        $mainnetCheck = $this->dgbService->guardMainnetAction('broadcast', 'mainnet');
        $this->assertFalse($mainnetCheck['allowed']);
        $this->assertFalse($mainnetCheck['success']);
        $this->assertSame('blocked', $mainnetCheck['status']);

        // Broadcast returns dry-run
        $broadcastRes = $this->dgbService->broadcast('0100000001deadbeef');
        $this->assertSame('dry_run', $broadcastRes['status']);
        $this->assertFalse($broadcastRes['broadcast']);
        $this->assertTrue($broadcastRes['dry_run']);
    }

    // =========================================================================
    // 3. DigiByte Controller Lifecycle & IDOR Protection
    // =========================================================================

    public function testDigiByteControllerConnectAndDisconnectLifecycle(): void
    {
        $user1 = 401;
        $user2 = 402;
        $dgbAddress = 'D7W6b9qMhUjV66PcvYp5W2y2j5n6e6r2t1';

        // Connect wallet for User 1
        $controller1 = $this->createDigiByteController($user1, [
            'address' => $dgbAddress,
            'label'   => 'Primary DGB',
        ]);
        $response1 = $controller1->connectWallet();
        $this->assertSame(200, $response1->getStatusCode());

        $body1 = json_decode((string) $response1->getBody(), true);
        $this->assertSame('success', $body1['status']);
        $this->assertSame($dgbAddress, $body1['data']['address']);

        // Verify record in database
        $row = $this->db->table('bf_exchanges_coin_addresses')
            ->where(['user_id' => $user1, 'chain' => 'digibyte'])
            ->get()
            ->getRowArray();
        $this->assertNotNull($row);
        $this->assertSame($dgbAddress, $row['address']);
        $walletId = (int) $row['id'];

        // IDOR Test: User 2 attempts to disconnect User 1's wallet
        $controller2 = $this->createDigiByteController($user2, [
            'id' => $walletId,
        ]);
        $response2 = $controller2->disconnectWallet();
        $this->assertSame(404, $response2->getStatusCode());

        // Verify User 1's wallet still exists
        $stillExists = $this->db->table('bf_exchanges_coin_addresses')
            ->where(['id' => $walletId, 'user_id' => $user1])
            ->countAllResults();
        $this->assertSame(1, $stillExists, 'User 1 wallet must not be deleted by User 2');

        // Owner disconnects wallet
        $disconnectOwner = $this->createDigiByteController($user1, [
            'id' => $walletId,
        ]);
        $resOwner = $disconnectOwner->disconnectWallet();
        $this->assertSame(200, $resOwner->getStatusCode());

        $deletedCount = $this->db->table('bf_exchanges_coin_addresses')
            ->where(['id' => $walletId])
            ->countAllResults();
        $this->assertSame(0, $deletedCount, 'Owner must be able to disconnect wallet');
    }

    public function testDigiByteControllerRejectsPrivateKeySubmission(): void
    {
        $controller = $this->createDigiByteController(403, [
            'address'     => 'D7W6b9qMhUjV66PcvYp5W2y2j5n6e6r2t1',
            'private_key' => 'REDACTED_ATTEMPTED_KEY',
        ]);

        $response = $controller->connectWallet();
        $this->assertSame(403, $response->getStatusCode());

        $body = json_decode((string) $response->getBody(), true);
        $this->assertSame('error', $body['status']);
        $this->assertSame('private_key_submission_disabled', $body['reason']);
    }

    public function testDigiByteControllerFetchFrontendDataAndProvisionDefault(): void
    {
        $userId = 404;
        $dgbAddress = 'SR4y8q1K2K3m3v7q9w8e7r6t5y4u3m2k1j';

        // Pre-insert address for user
        $this->db->table('bf_exchanges_coin_addresses')->insert([
            'user_id'    => $userId,
            'chain'      => 'digibyte',
            'address'    => $dgbAddress,
            'label'      => 'My DGB',
            'is_default' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $controller = $this->createDigiByteController($userId, []);
        $res = $controller->fetchFrontendData();
        $this->assertSame(200, $res->getStatusCode());

        $body = json_decode((string) $res->getBody(), true);
        $this->assertSame('success', $body['status']);
        $this->assertSame($dgbAddress, $body['data']['address']);

        // Provision default wallet
        $provisionRes = $controller->provisionDefaultWallet();
        $this->assertSame(200, $provisionRes->getStatusCode());
        $provBody = json_decode((string) $provisionRes->getBody(), true);
        $this->assertSame('success', $provBody['status']);
        $this->assertSame($dgbAddress, $provBody['data']['wallet']['address']);
    }

    // =========================================================================
    // 4. Bitcoin API Controller Tests
    // =========================================================================

    public function testBitcoinApiControllerBuildUnsignedPsbt(): void
    {
        $controller = $this->createBitcoinApiController([
            'network' => 'mainnet',
            'inputs'  => [
                [
                    'txid' => '0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef',
                    'vout' => 0,
                ],
            ],
            'outputs' => [
                [
                    'address' => 'bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdq',
                    'value'   => 25000,
                ],
            ],
        ]);

        $res = $controller->buildUnsignedPsbt();
        $this->assertSame(200, $res->getStatusCode());

        $body = json_decode((string) $res->getBody(), true);
        $this->assertSame('success', $body['status']);
        $this->assertNotEmpty($body['psbt']);
        $this->assertTrue($body['dry_run']);
    }

    public function testBitcoinApiControllerRejectsInvalidInputsAndPrivateKeys(): void
    {
        // Empty inputs validation error
        $controller1 = $this->createBitcoinApiController([
            'network' => 'mainnet',
            'inputs'  => [],
            'outputs' => [
                ['address' => '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa', 'value' => 1000],
            ],
        ]);
        $res1 = $controller1->buildUnsignedPsbt();
        $this->assertSame(400, $res1->getStatusCode());

        // Private key submission rejection in broadcast
        $controller2 = $this->createBitcoinApiController([
            'hex'         => '0200000001deadbeef0000',
            'private_key' => 'REDACTED_LEAK_ATTEMPT',
        ]);
        $res2 = $controller2->broadcastSignedTx();
        $this->assertSame(403, $res2->getStatusCode());
    }

    public function testBitcoinApiControllerBroadcastSignedTxDryRun(): void
    {
        $syntheticTxHex = '02000000010123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef0000000000ffffffff01a086010000000000160014751e76e8199196d454941c45d1b3a323f1433bd600000000';

        $controller = $this->createBitcoinApiController([
            'hex'     => $syntheticTxHex,
            'network' => 'mainnet',
        ]);

        $res = $controller->broadcastSignedTx();
        $this->assertSame(200, $res->getStatusCode());

        $body = json_decode((string) $res->getBody(), true);
        $this->assertSame('success', $body['status']);
        $this->assertSame(64, strlen($body['txid']));
        $this->assertTrue($body['dry_run']);
    }

    // =========================================================================
    // 5. Config Money Switches & Guardrail Invariants
    // =========================================================================

    public function testBitcoinAndDigiByteConfigDefaults(): void
    {
        $btcConfig = config(Bitcoin::class);
        $dgbConfig = config(DigiByte::class);

        // Bitcoin Money Switches
        $this->assertFalse($btcConfig->allowTransactionExecution, 'Bitcoin allowTransactionExecution must be false by default');
        $this->assertFalse($btcConfig->allowMainnetBroadcast, 'Bitcoin allowMainnetBroadcast must be false by default');
        $this->assertFalse($btcConfig->allowPrivateKeySubmission, 'Bitcoin allowPrivateKeySubmission must be false by default');
        $this->assertTrue($btcConfig->defaultDryRun, 'Bitcoin defaultDryRun must be true by default');

        // DigiByte Money Switches
        $this->assertFalse($dgbConfig->allowTransactionExecution, 'DigiByte allowTransactionExecution must be false by default');
        $this->assertFalse($dgbConfig->allowMainnetBroadcast, 'DigiByte allowMainnetBroadcast must be false by default');
        $this->assertFalse($dgbConfig->allowPrivateKeySubmission, 'DigiByte allowPrivateKeySubmission must be false by default');
        $this->assertTrue($dgbConfig->defaultDryRun, 'DigiByte defaultDryRun must be true by default');
    }

    // =========================================================================
    // Helpers
    // =========================================================================

    private function createDigiByteController(int $userId, array $post): DigiByteController
    {
        $request = new IncomingRequest(config('App'), new URI('http://example.com/Exchange/DigiByte'), null, new UserAgent());
        $request->setMethod('POST');
        $request->setGlobal('post', $post);

        $response = new Response(config('App'));
        $logger = Services::logger();

        $controller = new DigiByteController();
        $controller->initController($request, $response, $logger);

        $ref = new ReflectionClass($controller);
        if ($ref->hasProperty('cuID')) {
            $prop = $ref->getProperty('cuID');
            $prop->setAccessible(true);
            $prop->setValue($controller, $userId);
        }

        return $controller;
    }

    private function createBitcoinApiController(array $payload): BitcoinAPIController
    {
        $request = new IncomingRequest(config('App'), new URI('http://example.com/API/Bitcoin'), null, new UserAgent());
        $request->setMethod('POST');
        $request->setBody(json_encode($payload));
        $request->setHeader('Content-Type', 'application/json');

        $response = new Response(config('App'));
        $logger = Services::logger();

        $controller = new BitcoinAPIController();
        $controller->initController($request, $response, $logger);

        return $controller;
    }
}
