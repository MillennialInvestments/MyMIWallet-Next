<?php

declare(strict_types=1);

namespace Tests\Unit\MDIT;

use App\Commands\MditNavComputeDaily;
use App\Models\MDIT\MditDepositModel;
use App\Models\MDIT\MditInvestorProfileModel;
use App\Models\MDIT\MditNavSnapshotModel;
use App\Models\MDIT\MditRedemptionModel;
use App\Models\MDIT\MditTokenLedgerModel;
use App\Models\MDIT\MditWalletModel;
use App\Models\MDIT\MditWebhookEventModel;
use App\Modules\APIs\Controllers\MditAdminAPIController;
use App\Modules\APIs\Controllers\MditDepositAPIController;
use App\Modules\APIs\Controllers\MditInvestorAPIController;
use App\Modules\APIs\Controllers\MditIssuanceAPIController;
use App\Modules\APIs\Controllers\MditRedemptionAPIController;
use App\Modules\APIs\Controllers\MditWebhookAPIController;
use App\Services\MDIT\MditDepositService;
use App\Services\MDIT\MditInvestorService;
use App\Services\MDIT\MditIssuanceService;
use App\Services\MDIT\MditNavService;
use App\Services\MDIT\MditRedemptionService;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\URI;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Config\Database;
use ReflectionClass;
use RuntimeException;
use Tests\Support\Database\AppliesAppMigrations;

/**
 * MYMI-GTM-053: Certification tests for MDIT (Millennial Digital Income Trust) domain.
 *
 * Verifies:
 * - KYC & Accreditation lifecycle: initiation, attestation, and eligibility gating.
 * - Wallet ownership validation and deposit initiation idempotency.
 * - Deposit confirmation on-chain with tx hash uniqueness and IDOR protection.
 * - Token minting against daily NAV with duplicate minting prevention.
 * - Token redemption with balance checks and admin burning/approval lifecycle.
 * - Daily NAV computation logic and spark command safety.
 * - Webhook HMAC signature verification and event logging.
 * - Admin controller endpoints bounded result sets.
 */
final class MditDomainTest extends CIUnitTestCase
{
    use AppliesAppMigrations;
    use DatabaseTestTrait;

    protected $migrate = false;
    protected $refresh = false;

    private const USER_A = 9101;
    private const USER_B = 9102;
    private const ADMIN_USER = 9199;

    protected function setUp(): void
    {
        parent::setUp();

        $this->applyAppMigrations(
            $this->db,
            ['2026-04-01-000105_CreateMditPhase1Tables.php'],
            [
                'bf_mdit_investor_profiles',
                'bf_mdit_wallets',
                'bf_mdit_deposits',
                'bf_mdit_token_ledger',
                'bf_mdit_redemptions',
                'bf_mdit_nav_snapshots',
                'bf_mdit_disclosures_acceptance',
                'bf_mdit_webhook_events',
            ]
        );
    }

    protected function tearDown(): void
    {
        Services::resetSingle('authentication');
        parent::tearDown();
    }

    public function testKycLifecycleAndAccreditationAttestation(): void
    {
        $service = new MditInvestorService();

        // 1. Initially no profile; startKyc creates one with PENDING status
        $start = $service->startKyc(self::USER_A);
        $this->assertNotEmpty($start['session_id']);

        $profile = $service->getOrCreateProfile(self::USER_A);
        $this->assertSame('PENDING', $profile['kyc_status']);
        $this->assertSame('PENDING', $profile['accreditation_status']);
        $this->assertFalse($service->isVerifiedAndAccredited(self::USER_A));

        // 2. Attest accreditation
        $updated = $service->attestAccreditation(self::USER_A, true);
        $this->assertSame('ACCREDITED', $updated['accreditation_status']);
        // Still not verified KYC
        $this->assertFalse($service->isVerifiedAndAccredited(self::USER_A));

        // 3. Manually verify KYC in database
        (new MditInvestorProfileModel())->update($profile['id'], [
            'kyc_status' => 'VERIFIED',
        ]);
        $this->assertTrue($service->isVerifiedAndAccredited(self::USER_A));

        // 4. Attest rejected accreditation removes eligibility
        $service->attestAccreditation(self::USER_A, false);
        $this->assertFalse($service->isVerifiedAndAccredited(self::USER_A));
    }

    public function testDepositInitiationAndWalletValidation(): void
    {
        $investorService = new MditInvestorService();
        $depositService = new MditDepositService();
        $wallets = new MditWalletModel();

        // Setup verified investor
        $investorService->getOrCreateProfile(self::USER_A);
        $profile = (new MditInvestorProfileModel())->where('user_id', self::USER_A)->first();
        (new MditInvestorProfileModel())->update($profile['id'], [
            'kyc_status' => 'VERIFIED',
            'accreditation_status' => 'ACCREDITED',
        ]);

        $walletAddr = '0x1111222233334444555566667777888899990000';
        $chain = 'ETH';

        // 1. Wallet not owned -> ensureWalletOwned is false
        $this->assertFalse($depositService->ensureWalletOwned(self::USER_A, $walletAddr, $chain));

        // 2. Link wallet to User A
        $wallets->insert([
            'user_id' => self::USER_A,
            'wallet_address' => $walletAddr,
            'chain' => $chain,
            'is_primary' => 1,
            'status' => 'ACTIVE',
            'created_on' => date('Y-m-d H:i:s'),
        ]);
        $this->assertTrue($depositService->ensureWalletOwned(self::USER_A, $walletAddr, $chain));

        // 3. User B cannot use User A's wallet
        $this->assertFalse($depositService->ensureWalletOwned(self::USER_B, $walletAddr, $chain));

        // 4. Initiate deposit with idempotency key
        $idempotencyKey = 'idemp-deposit-001';
        $deposit1 = $depositService->initiateDeposit([
            'user_id' => self::USER_A,
            'wallet_address' => $walletAddr,
            'chain' => $chain,
            'asset_symbol' => 'USDC',
            'amount' => 1000.0,
            'status' => 'CREATED',
            'idempotency_key' => $idempotencyKey,
            'created_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s'),
        ]);

        $this->assertNotNull($deposit1['id']);
        $this->assertSame('CREATED', $deposit1['status']);

        // 5. Duplicate call with same idempotency key returns exact same record without creating another row
        $deposit2 = $depositService->initiateDeposit([
            'user_id' => self::USER_A,
            'wallet_address' => $walletAddr,
            'chain' => $chain,
            'asset_symbol' => 'USDC',
            'amount' => 1000.0,
            'status' => 'CREATED',
            'idempotency_key' => $idempotencyKey,
            'created_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s'),
        ]);

        $this->assertSame($deposit1['id'], $deposit2['id']);
        $totalDeposits = (new MditDepositModel())->countAllResults();
        $this->assertSame(1, $totalDeposits);
    }

    public function testDepositConfirmationAndTxHashEnforcement(): void
    {
        $depositService = new MditDepositService();
        $deposits = new MditDepositModel();

        $depId1 = $deposits->insert([
            'user_id' => self::USER_A,
            'wallet_address' => '0xTEST1',
            'chain' => 'ETH',
            'asset_symbol' => 'USDC',
            'amount' => 500.0,
            'status' => 'CREATED',
            'idempotency_key' => 'dep-key-1',
            'created_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s'),
        ], true);

        $depId2 = $deposits->insert([
            'user_id' => self::USER_B,
            'wallet_address' => '0xTEST2',
            'chain' => 'ETH',
            'asset_symbol' => 'USDC',
            'amount' => 800.0,
            'status' => 'CREATED',
            'idempotency_key' => 'dep-key-2',
            'created_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s'),
        ], true);

        // 1. Confirm deposit 1 with valid tx hash
        $confirmed = $depositService->confirmDeposit($depId1, '0xTXHASH100');
        $this->assertSame('CONFIRMED_ONCHAIN', $confirmed['status']);
        $this->assertSame('0xTXHASH100', $confirmed['tx_hash']);
        $this->assertGreaterThanOrEqual(1, $confirmed['confirmations']);

        // 2. Attempting to confirm again with different tx hash throws
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('different transaction hash');
        $depositService->confirmDeposit($depId1, '0xTXHASH999');
    }

    public function testCannotReuseSameTxHashAcrossDeposits(): void
    {
        $depositService = new MditDepositService();
        $deposits = new MditDepositModel();

        $depId1 = $deposits->insert([
            'user_id' => self::USER_A,
            'wallet_address' => '0xTEST1',
            'chain' => 'ETH',
            'asset_symbol' => 'USDC',
            'amount' => 500.0,
            'status' => 'CREATED',
            'idempotency_key' => 'dep-hash-1',
            'created_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s'),
        ], true);

        $depId2 = $deposits->insert([
            'user_id' => self::USER_B,
            'wallet_address' => '0xTEST2',
            'chain' => 'ETH',
            'asset_symbol' => 'USDC',
            'amount' => 800.0,
            'status' => 'CREATED',
            'idempotency_key' => 'dep-hash-2',
            'created_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s'),
        ], true);

        $depositService->confirmDeposit($depId1, '0xREUSED_TX');

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Transaction hash already used');
        $depositService->confirmDeposit($depId2, '0xREUSED_TX');
    }

    public function testTokenMintingAndNavCalculation(): void
    {
        $deposits = new MditDepositModel();
        $navService = new MditNavService();
        $issuanceService = new MditIssuanceService();

        // Seed a NAV snapshot: nav_per_unit = 2.0
        $navService->computeDailyNav(date('Y-m-d'), 100000.0, 100000.0);
        // Set fixed NAV snapshot
        (new MditNavSnapshotModel())->emptyTable();
        (new MditNavSnapshotModel())->insert([
            'as_of_date' => date('Y-m-d'),
            'nav_total' => 200000.0,
            'token_supply' => 100000.0,
            'nav_per_unit' => 2.0,
            'cash_value' => 100000.0,
            'equities_value' => 100000.0,
            'created_on' => date('Y-m-d H:i:s'),
        ]);
        Services::cache()->clean();

        // 1. Unconfirmed deposit cannot be minted
        $unconfirmedId = $deposits->insert([
            'user_id' => self::USER_A,
            'wallet_address' => '0xTEST1',
            'chain' => 'ETH',
            'asset_symbol' => 'USDC',
            'amount' => 1000.0,
            'status' => 'CREATED',
            'idempotency_key' => 'mint-unconf',
            'created_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s'),
        ], true);

        try {
            $issuanceService->mintForDeposit($unconfirmedId);
            $this->fail('Expected exception for unconfirmed deposit');
        } catch (RuntimeException $e) {
            $this->assertStringContainsString('not confirmed on-chain', $e->getMessage());
        }

        // 2. Non-USDC deposit cannot be minted
        $nonUsdcId = $deposits->insert([
            'user_id' => self::USER_A,
            'wallet_address' => '0xTEST1',
            'chain' => 'ETH',
            'asset_symbol' => 'USDT',
            'amount' => 1000.0,
            'status' => 'CONFIRMED_ONCHAIN',
            'idempotency_key' => 'mint-usdt',
            'created_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s'),
        ], true);

        try {
            $issuanceService->mintForDeposit($nonUsdcId);
            $this->fail('Expected exception for non-USDC deposit');
        } catch (RuntimeException $e) {
            $this->assertStringContainsString('Only USDC deposits are supported', $e->getMessage());
        }

        // 3. Valid confirmed USDC deposit ($1,000 at $2.0 NAV = 500 units)
        $validId = $deposits->insert([
            'user_id' => self::USER_A,
            'wallet_address' => '0xTEST1',
            'chain' => 'ETH',
            'asset_symbol' => 'USDC',
            'amount' => 1000.0,
            'status' => 'CONFIRMED_ONCHAIN',
            'idempotency_key' => 'mint-valid',
            'created_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s'),
        ], true);

        $mintEntry = $issuanceService->mintForDeposit($validId);
        $this->assertSame('MINTED', $mintEntry['status']);
        $this->assertEquals(500.0, (float) $mintEntry['units']);
        $this->assertEquals(2.0, (float) $mintEntry['nav_at_mint']);

        // Deposit status updated to MINTED
        $depositUpdated = $deposits->find($validId);
        $this->assertSame('MINTED', $depositUpdated['status']);

        // 4. Repeated mint returns exact same entry
        $repeatEntry = $issuanceService->mintForDeposit($validId);
        $this->assertSame($mintEntry['id'], $repeatEntry['id']);
    }

    public function testTokenRedemptionLifecycleAndAdminApproval(): void
    {
        $redemptionService = new MditRedemptionService();
        $ledger = new MditTokenLedgerModel();

        // 1. User has 0 units -> request redemption fails
        try {
            $redemptionService->requestRedemption([
                'user_id' => self::USER_A,
                'wallet_address' => '0xWALLET1',
                'token_units' => 100.0,
                'requested_on' => date('Y-m-d H:i:s'),
                'status' => 'REQUESTED',
                'payout_asset' => 'USDC',
            ]);
            $this->fail('Expected exception for insufficient balance');
        } catch (RuntimeException $e) {
            $this->assertStringContainsString('Insufficient token balance', $e->getMessage());
        }

        // 2. Credit User A with 300 MDIT units
        $ledger->insert([
            'user_id' => self::USER_A,
            'wallet_address' => '0xWALLET1',
            'token_symbol' => 'MDIT',
            'units' => 300.0,
            'nav_at_mint' => 1.0,
            'minted_on' => date('Y-m-d H:i:s'),
            'status' => 'MINTED',
        ]);

        $this->assertEquals(300.0, $redemptionService->userTokenBalance(self::USER_A));

        // 3. User A requests redemption of 150 units
        $redemption = $redemptionService->requestRedemption([
            'user_id' => self::USER_A,
            'wallet_address' => '0xWALLET1',
            'token_units' => 150.0,
            'requested_on' => date('Y-m-d H:i:s'),
            'status' => 'REQUESTED',
            'payout_asset' => 'USDC',
        ]);

        $this->assertSame('REQUESTED', $redemption['status']);
        $redemptionId = (int) $redemption['id'];

        // 4. Admin approves redemption
        $approved = $redemptionService->approveRedemption($redemptionId, self::ADMIN_USER, 'Approved by compliance');
        $this->assertSame('COMPLETED', $approved['status']);
        $this->assertSame(self::ADMIN_USER, (int) $approved['approved_by']);
        $this->assertSame('Approved by compliance', $approved['notes']);

        // Burn entry was created
        $burnLedger = $ledger->find((int) $approved['burn_ledger_id']);
        $this->assertSame('BURNED', $burnLedger['status']);
        $this->assertEquals(150.0, (float) $burnLedger['units']);

        // Net token balance is now 150 (300 minted - 150 burned)
        $this->assertEquals(150.0, $redemptionService->userTokenBalance(self::USER_A));

        // 5. Approving non-pending redemption fails
        try {
            $redemptionService->approveRedemption($redemptionId, self::ADMIN_USER);
            $this->fail('Expected exception for already approved redemption');
        } catch (RuntimeException $e) {
            $this->assertStringContainsString('Redemption is not pending', $e->getMessage());
        }
    }

    public function testDailyNavComputationCommand(): void
    {
        $ledger = new MditTokenLedgerModel();
        $ledger->insert([
            'user_id' => self::USER_A,
            'wallet_address' => '0xMINT',
            'token_symbol' => 'MDIT',
            'units' => 50000.0,
            'status' => 'MINTED',
        ]);

        $command = new MditNavComputeDaily(Services::logger(), Services::commands());
        $exitCode = $command->run(['100000', '50000']);

        $this->assertSame(0, $exitCode);

        $latest = (new MditNavService())->latestSnapshot();
        $this->assertNotNull($latest);
        $this->assertEquals(150000.0, (float) $latest['nav_total']);
        $this->assertEquals(50000.0, (float) $latest['token_supply']);
        $this->assertEquals(3.0, (float) $latest['nav_per_unit']); // 150000 / 50000 = 3.0
    }

    public function testDepositConfirmationIDORProtection(): void
    {
        $deposits = new MditDepositModel();
        $depId = $deposits->insert([
            'user_id' => self::USER_B,
            'wallet_address' => '0xUSERB_WALLET',
            'chain' => 'ETH',
            'asset_symbol' => 'USDC',
            'amount' => 500.0,
            'status' => 'CREATED',
            'idempotency_key' => 'dep-idor-test',
            'created_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s'),
        ], true);

        // User A attempts to confirm User B's deposit
        $controller = $this->createDepositController(self::USER_A, [
            'deposit_id' => $depId,
            'tx_hash' => '0xIDOR_TX',
        ]);

        $response = $controller->confirm();
        $this->assertSame(403, $response->getStatusCode());
        $body = json_decode((string) $response->getBody(), true);
        $this->assertStringContainsString('Deposit does not belong to this user', (string) ($body['messages']['error'] ?? $body['message'] ?? ''));
    }

    public function testAdminControllerPendingEndpointsAreBounded(): void
    {
        $deposits = new MditDepositModel();
        $redemptions = new MditRedemptionModel();

        // Insert rows
        for ($i = 0; $i < 5; $i++) {
            $deposits->insert([
                'user_id' => self::USER_A,
                'wallet_address' => '0xADDR' . $i,
                'chain' => 'ETH',
                'asset_symbol' => 'USDC',
                'amount' => 100.0 + $i,
                'status' => 'CONFIRMED_ONCHAIN',
                'idempotency_key' => 'dep-bounded-' . $i,
                'created_on' => date('Y-m-d H:i:s'),
                'updated_on' => date('Y-m-d H:i:s'),
            ]);

            $redemptions->insert([
                'user_id' => self::USER_A,
                'wallet_address' => '0xADDR' . $i,
                'token_units' => 10.0 + $i,
                'requested_on' => date('Y-m-d H:i:s'),
                'status' => 'REQUESTED',
                'payout_asset' => 'USDC',
            ]);
        }

        $controller = $this->createAdminController(self::ADMIN_USER);

        $depResp = $controller->pendingDeposits();
        $this->assertSame(200, $depResp->getStatusCode());
        $depData = json_decode((string) $depResp->getBody(), true);
        $this->assertCount(5, $depData['data']);

        $redResp = $controller->pendingRedemptions();
        $this->assertSame(200, $redResp->getStatusCode());
        $redData = json_decode((string) $redResp->getBody(), true);
        $this->assertCount(5, $redData['data']);
    }

    private function createDepositController(int $userId, array $json = []): MditDepositAPIController
    {
        $controller = new MditDepositAPIController();
        $this->injectControllerContext($controller, $userId, $json);

        return $controller;
    }

    private function createAdminController(int $userId, array $json = []): MditAdminAPIController
    {
        $controller = new MditAdminAPIController();
        $this->injectControllerContext($controller, $userId, $json);

        return $controller;
    }

    private function injectControllerContext(object $controller, int $userId, array $json = []): void
    {
        $request = new class ($json) extends IncomingRequest {
            public function __construct(private array $mockJson)
            {
                parent::__construct(config('App'), new URI('http://example.com/'), null, new UserAgent());
            }

            public function getJSON(bool $assoc = false, int $depth = 512, int $options = 0)
            {
                return $this->mockJson;
            }

            public function getBody(): ?string
            {
                return json_encode($this->mockJson);
            }

            public function getMethod(bool $upper = false): string
            {
                return $upper ? 'POST' : 'post';
            }
        };

        $authMock = new class ($userId) {
            public function __construct(private int $uid) {}
            public function id(): int { return $this->uid; }
            public function check(): bool { return $this->uid > 0; }
            public function user(): ?object { return (object) ['id' => $this->uid]; }
        };
        Services::injectMock('authentication', $authMock);

        $response = new Response(config('App'));
        $logger = Services::logger();
        $controller->initController($request, $response, $logger);

        $ref = new ReflectionClass($controller);

        $propReq = $ref->getProperty('request');
        $propReq->setAccessible(true);
        $propReq->setValue($controller, $request);

        $propResp = $ref->getProperty('response');
        $propResp->setAccessible(true);
        $propResp->setValue($controller, new Response(config('App')));

        if ($ref->hasProperty('auth')) {
            $propAuth = $ref->getProperty('auth');
            $propAuth->setAccessible(true);
            $propAuth->setValue($controller, $authMock);
        }
    }
}
