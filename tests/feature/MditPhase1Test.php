<?php

use App\Models\MDIT\MditDepositModel;
use App\Models\MDIT\MditTokenLedgerModel;
use App\Models\MDIT\MditWalletModel;
use App\Services\MDIT\MditIssuanceService;
use App\Services\MDIT\MditNavService;
use App\Services\MDIT\MditRedemptionService;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Tests\Support\Database\AppliesAppMigrations;

/**
 * @internal
 */
final class MditPhase1Test extends CIUnitTestCase
{
    use AppliesAppMigrations;
    use DatabaseTestTrait;
    use FeatureTestTrait;

    // Build only the MDIT schema; see AppliesAppMigrations for why the full
    // migration chain is not run here. MYMI-GTM-007.
    protected $migrate = false;
    protected $refresh = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->applyAppMigrations(
            $this->db,
            ['2026-04-01-000105_CreateMditPhase1Tables.php'],
            ['bf_mdit_investor_profiles', 'bf_mdit_wallets', 'bf_mdit_deposits', 'bf_mdit_token_ledger',
                'bf_mdit_redemptions', 'bf_mdit_nav_snapshots', 'bf_mdit_disclosures_acceptance', 'bf_mdit_webhook_events'],
        );
    }

    public function testDepositDeniedWhenNotVerified(): void
    {
        $wallets = new MditWalletModel();
        $wallets->insert([
            'user_id' => 1,
            'wallet_address' => '0xTESTWALLET',
            'chain' => 'ETH',
            'is_primary' => 1,
            'status' => 'ACTIVE',
            'created_on' => date('Y-m-d H:i:s'),
        ]);

        // An authenticated user (id 1) with no KYC/accreditation profile. Route
        // filters stay on; only the authentication service is stubbed.
        \Config\Services::injectMock('authentication', new class () {
            public function check(): bool { return true; }
            public function id(): int { return 1; }
            public function user(): ?object { return null; }
        });

        $result = $this->withSession(['user_id' => 1])
            ->withHeaders(['Accept' => 'application/json'])
            ->post('API/Mdit/deposits/initiate', [
                'chain' => 'ETH',
                'asset_symbol' => 'USDC',
                'amount' => 100,
                'wallet_address' => '0xTESTWALLET',
            ]);

        $result->assertStatus(403);
        $this->assertStringContainsString('KYC/Accreditation required.', (string) $result->response()->getBody());
    }

    public function testMintIdempotencyPreventsDoubleMint(): void
    {
        $deposits = new MditDepositModel();
        $depositId = $deposits->insert([
            'user_id' => 1,
            'wallet_address' => '0xTESTWALLET',
            'chain' => 'ETH',
            'asset_symbol' => 'USDC',
            'amount' => 100,
            'status' => 'CONFIRMED_ONCHAIN',
            'idempotency_key' => 'key-1',
            'created_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s'),
        ], true);

        $service = new MditIssuanceService();
        $first = $service->mintForDeposit($depositId);
        $second = $service->mintForDeposit($depositId);

        $ledger = new MditTokenLedgerModel();
        $entries = $ledger->where('source_deposit_id', $depositId)->findAll();

        $this->assertCount(1, $entries);
        $this->assertSame($first['id'], $second['id']);
    }

    public function testRedemptionFailsWithInsufficientUnits(): void
    {
        $service = new MditRedemptionService();

        $this->expectException(RuntimeException::class);
        $service->requestRedemption([
            'user_id' => 1,
            'wallet_address' => '0xTESTWALLET',
            'token_units' => 5,
            'requested_on' => date('Y-m-d H:i:s'),
            'status' => 'REQUESTED',
            'payout_asset' => 'USDC',
        ]);
    }

    public function testNavComputeHandlesZeroSupply(): void
    {
        $service = new MditNavService();
        $snapshot = $service->computeDailyNav(date('Y-m-d'));

        $this->assertSame(0.0, (float) $snapshot['token_supply']);
        $this->assertSame(1.0, (float) $snapshot['nav_per_unit']);
    }
}
