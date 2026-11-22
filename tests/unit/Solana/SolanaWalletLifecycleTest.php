<?php

declare(strict_types=1);

namespace Tests\Unit\Solana;

use App\Commands\SolanaWalletSecretsAudit;
use App\Models\SolanaModel;
use App\Services\SolanaService;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;
use Config\Solana;

require_once APPPATH . 'Database/Migrations/2026-11-22-000200_CreateExchangeCoinAddressTable.php';
use App\Database\Migrations\CreateExchangeCoinAddressTable;

final class SolanaWalletLifecycleTest extends CIUnitTestCase
{
    protected $db;
    protected SolanaService $solanaService;
    protected SolanaModel $solanaModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->db = Database::connect();
        $this->db->resetDataCache();

        // Run migration for bf_exchanges_coin_addresses
        $migration = new CreateExchangeCoinAddressTable(Database::forge($this->db));
        $migration->up();

        // Create bf_users_wallet for custodial wallet lifecycle & disconnect tests
        $this->db->query('CREATE TABLE IF NOT EXISTS bf_users_wallet (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER,
            amount NUMERIC DEFAULT 0,
            account_id INTEGER DEFAULT 0,
            status TEXT DEFAULT "Active",
            active INTEGER DEFAULT 1,
            deleted INTEGER DEFAULT 0,
            label TEXT NULL,
            market TEXT NULL,
            created_on DATETIME NULL,
            modified_on DATETIME NULL,
            updated_on DATETIME NULL
        )');

        // Clear tables
        $this->db->table('bf_exchanges_coin_addresses')->emptyTable();
        $this->db->table('bf_users_wallet')->emptyTable();

        $this->solanaService = new SolanaService();
        $this->solanaModel = new SolanaModel();
    }

    protected function tearDown(): void
    {
        $this->db->table('bf_exchanges_coin_addresses')->emptyTable();
        $this->db->table('bf_users_wallet')->emptyTable();
        parent::tearDown();
    }

    public function testSolanaKeypairGenerationProducesValidBase58AndKeys(): void
    {
        $keypair = $this->solanaService->generateNewKeypair();

        $this->assertIsArray($keypair);
        $this->assertArrayHasKey('public_b58', $keypair);
        $this->assertArrayHasKey('public_hex', $keypair);
        $this->assertArrayHasKey('secret_key_b64', $keypair);
        $this->assertArrayHasKey('seed_b64', $keypair);

        // Public key must be a valid base58 address
        $this->assertTrue(
            $this->solanaService->isValidPublicKey($keypair['public_b58']),
            'Generated public key must be valid base58 Solana address'
        );

        // Hex public key must be 64 characters (32 bytes)
        $this->assertSame(64, strlen($keypair['public_hex']));

        // Secret key must decode to 64 bytes
        $secretBinary = base64_decode($keypair['secret_key_b64'], true);
        $this->assertNotFalse($secretBinary);
        $this->assertSame(64, strlen($secretBinary));

        // Seed must decode to 32 bytes and match the first 32 bytes of secret key
        $seedBinary = base64_decode($keypair['seed_b64'], true);
        $this->assertNotFalse($seedBinary);
        $this->assertSame(32, strlen($seedBinary));
        $this->assertSame(substr($secretBinary, 0, 32), $seedBinary);
    }

    public function testSolanaAddressValidationAndNormalization(): void
    {
        // Valid Solana base58 address
        $validAddress = '9WzDXwBbmkg8ZTbNMqUxvQRAyrZzDsGYdLVL9zYtAWWM';
        $this->assertTrue($this->solanaService->isValidPublicKey($validAddress));
        $this->assertSame($validAddress, $this->solanaService->normalizeAddress($validAddress));

        // Address with leading/trailing spaces gets trimmed and normalized
        $this->assertSame($validAddress, $this->solanaService->normalizeAddress("  {$validAddress}  "));

        // Invalid base58 characters ('0', 'O', 'I', 'l') must fail validation
        $this->assertFalse($this->solanaService->isValidPublicKey('0WzDXwBbmkg8ZTbNMqUxvQRAyrZzDsGYdLVL9zYtAWWM'));
        $this->assertFalse($this->solanaService->isValidPublicKey('IWzDXwBbmkg8ZTbNMqUxvQRAyrZzDsGYdLVL9zYtAWWM'));
        $this->assertFalse($this->solanaService->isValidPublicKey('OWzDXwBbmkg8ZTbNMqUxvQRAyrZzDsGYdLVL9zYtAWWM'));
        $this->assertFalse($this->solanaService->isValidPublicKey('lWzDXwBbmkg8ZTbNMqUxvQRAyrZzDsGYdLVL9zYtAWWM'));

        // Short or long strings must fail
        $this->assertFalse($this->solanaService->isValidPublicKey('short'));
        $this->assertFalse($this->solanaService->isValidPublicKey(str_repeat('A', 50)));

        // Hex 64-char public key converts to base58
        $hexKey = '0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef';
        $normalizedFromHex = $this->solanaService->normalizeAddress($hexKey);
        $this->assertNotNull($normalizedFromHex);
        $this->assertTrue($this->solanaService->isValidPublicKey($normalizedFromHex));

        // Array payloads normalized
        $arrayPayload = ['public_token' => $validAddress];
        $this->assertSame($validAddress, $this->solanaService->normalizeAddress($arrayPayload));

        // Invalid inputs return null
        $this->assertNull($this->solanaService->normalizeAddress(''));
        $this->assertNull($this->solanaService->normalizeAddress('   '));
        $this->assertNull($this->solanaService->normalizeAddress('not-a-valid-solana-address'));
    }

    public function testNonCustodialAddressLifecycleInDatabase(): void
    {
        $user1 = 701;
        $user2 = 702;
        $addr1 = '9WzDXwBbmkg8ZTbNMqUxvQRAyrZzDsGYdLVL9zYtAWWM';
        $addr2 = 'EPjFWdd5AufqSSqeM2qN1xzybapC8G4wEGGkZwyTDt1v';

        // Add non-custodial address for user 1
        $id1 = $this->solanaModel->addNonCustodialAddress($user1, $addr1, 'Primary Sol');
        $this->assertIsInt($id1);
        $this->assertGreaterThan(0, $id1);

        // Attach second address for user 1 (becomes default)
        $id2 = $this->solanaModel->attachExternalWallet($user1, $addr2, 'Secondary Sol');
        $this->assertIsInt($id2);
        $this->assertGreaterThan(0, $id2);

        // Verify listing addresses is isolated to user 1
        $user1Addresses = $this->solanaModel->listAddresses($user1);
        $this->assertCount(2, $user1Addresses);

        $user2Addresses = $this->solanaModel->listAddresses($user2);
        $this->assertCount(0, $user2Addresses);

        // Verify default address is addr2 (attached via attachExternalWallet)
        $defaultAddr = $this->solanaModel->getDefaultAddress($user1);
        $this->assertNotNull($defaultAddr);
        $this->assertSame($addr2, $defaultAddr['address']);
        $this->assertSame(1, (int) $defaultAddr['is_default']);

        // Switch default back to id1
        $switched = $this->solanaModel->setDefaultAddress($user1, $id1);
        $this->assertTrue($switched);

        // Check that id1 is default and id2 is not
        $updatedDefault = $this->solanaModel->getDefaultAddress($user1);
        $this->assertNotNull($updatedDefault);
        $this->assertSame($addr1, $updatedDefault['address']);
        $this->assertSame(1, (int) $updatedDefault['is_default']);

        $allAfterSwitch = $this->solanaModel->listAddresses($user1);
        foreach ($allAfterSwitch as $row) {
            if ((int) $row['id'] === $id1) {
                $this->assertSame(1, (int) $row['is_default']);
            } else {
                $this->assertSame(0, (int) $row['is_default']);
            }
        }
    }

    public function testDisconnectWalletOwnershipEnforcement(): void
    {
        $ownerId = 703;
        $attackerId = 704;

        // Insert wallets for both users
        $this->db->table('bf_users_wallet')->insert([
            'id'      => 801,
            'user_id' => $ownerId,
            'status'  => 'Active',
            'active'  => 1,
            'market'  => 'SOL',
        ]);
        $this->db->table('bf_users_wallet')->insert([
            'id'      => 802,
            'user_id' => $attackerId,
            'status'  => 'Active',
            'active'  => 1,
            'market'  => 'SOL',
        ]);

        // Attacker attempts to disconnect owner's wallet (IDOR negative test)
        $attackerResult = $this->solanaModel->disconnectWallet(801, $attackerId);
        $this->assertFalse($attackerResult, 'Attacker cannot disconnect another user wallet');

        // Verify owner's wallet is still active
        $ownerWallet = $this->db->table('bf_users_wallet')->where('id', 801)->get()->getRowArray();
        $this->assertSame(1, (int) $ownerWallet['active']);
        $this->assertSame('Active', $ownerWallet['status']);

        // Owner disconnects their own wallet
        $ownerResult = $this->solanaModel->disconnectWallet(801, $ownerId);
        $this->assertTrue($ownerResult, 'Owner can disconnect their own wallet');

        // Verify owner's wallet is now disconnected
        $updatedOwnerWallet = $this->db->table('bf_users_wallet')->where('id', 801)->get()->getRowArray();
        $this->assertSame(0, (int) $updatedOwnerWallet['active']);
        $this->assertSame('disconnected', $updatedOwnerWallet['status']);
    }

    public function testSolanaMainnetSafetyGuardrails(): void
    {
        // Devnet and testnet are allowed by default
        $devnetCheck = $this->solanaService->guardMainnetAction('broadcast', 'devnet');
        $this->assertTrue($devnetCheck['allowed']);
        $this->assertTrue($devnetCheck['success']);

        $testnetCheck = $this->solanaService->guardMainnetAction('broadcast', 'testnet');
        $this->assertTrue($testnetCheck['allowed']);
        $this->assertTrue($testnetCheck['success']);

        // Mainnet broadcast is blocked by default safety guardrails
        $mainnetBroadcast = $this->solanaService->guardMainnetAction('broadcast', 'mainnet-beta');
        $this->assertFalse($mainnetBroadcast['allowed']);
        $this->assertFalse($mainnetBroadcast['success']);
        $this->assertSame('blocked', $mainnetBroadcast['status']);
        $this->assertStringContainsString('disabled by safety guardrails', $mainnetBroadcast['message']);

        // Mainnet minting is blocked by default safety guardrails
        $mainnetMint = $this->solanaService->guardMainnetAction('mint', 'mainnet-beta');
        $this->assertFalse($mainnetMint['allowed']);
        $this->assertFalse($mainnetMint['success']);
        $this->assertSame('blocked', $mainnetMint['status']);
        $this->assertStringContainsString('disabled by safety guardrails', $mainnetMint['message']);
    }

    public function testSolanaConfigDefaultsAndMoneySwitches(): void
    {
        $config = config(Solana::class);

        $this->assertFalse($config->allowTransactionExecution, 'Money switch allowTransactionExecution must be false by default');
        $this->assertFalse($config->allowMainnetBroadcast, 'Money switch allowMainnetBroadcast must be false by default');
        $this->assertFalse($config->allowMainnetMint, 'Money switch allowMainnetMint must be false by default');
        $this->assertFalse($config->allowPrivateKeySubmission, 'Money switch allowPrivateKeySubmission must be false by default');
        $this->assertTrue($config->requireWalletSignature, 'requireWalletSignature must be true by default');
        $this->assertTrue($config->defaultDryRun, 'defaultDryRun must be true by default');
    }

    public function testSolanaControllerAndApiSecuritySurface(): void
    {
        $controllerSource = (string) file_get_contents(APPPATH . 'Modules/Exchange/Controllers/SolanaController.php');
        $apiSource = (string) file_get_contents(APPPATH . 'Modules/APIs/Controllers/SolanaAPIController.php');

        // SolanaController: addExternalWallet normalizes address
        $this->assertStringContainsString('$addr = $svc->normalizeAddress($addr);', $controllerSource);

        // SolanaController: executeSwap scopes user ID to session
        $this->assertStringContainsString(
            '$userId = (int) ($this->cuID ?? $this->currentUserId() ?? 0);',
            $controllerSource,
            'SolanaController::executeSwap must scope userId to session'
        );

        // SolanaController: lockTokens scopes user to currentUserId
        $this->assertStringContainsString(
            '$user = (string) ($this->currentUserId() ?: $this->request->getPost(\'user\'));',
            $controllerSource,
            'SolanaController::lockTokens must scope user to currentUserId'
        );

        // SolanaController: privateKeySubmissionDisabledResponse returns 403
        $this->assertStringContainsString('privateKeySubmissionDisabledResponse', $controllerSource);
        $this->assertStringContainsString('wallet_signature_required', $controllerSource);

        // SolanaAPIController: executeSwap scopes user ID to session/auth
        $this->assertStringContainsString(
            '$userId = (int) ($this->cuID ?? $this->auth?->id() ?? 0);',
            $apiSource,
            'SolanaAPIController::executeSwap must scope userId to session/auth'
        );
    }

    public function testSolanaWalletSecretsAuditSmokeCommand(): void
    {
        $command = new SolanaWalletSecretsAudit(service('logger'), service('commands'));
        $exitCode = $command->run(['guardrails-smoke' => true]);

        $this->assertSame(EXIT_SUCCESS, $exitCode, 'Audit command must exit with code EXIT_SUCCESS (0)');
    }
}
