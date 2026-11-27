<?php

namespace Tests\Unit\MDIT;

use App\Database\Migrations\CreateMditPhase1Tables;
use App\Database\Migrations\CreateMyMICoinInterestTable;
use App\Models\MDIT\MditDepositModel;
use App\Models\MDIT\MditInvestorProfileModel;
use App\Models\MDIT\MditTokenLedgerModel;
use App\Models\MDIT\MditWalletModel;
use App\Services\MDIT\MditDepositService;
use App\Services\MDIT\MditInvestorService;
use App\Services\MDIT\MditIssuanceService;
use App\Services\MDIT\MditNavService;
use App\Services\MDIT\MyMICoinOfferingService;
use CodeIgniter\Database\SQLite3\Connection;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;

/**
 * @internal
 */
final class MyMICoinOfferingTest extends CIUnitTestCase
{
    protected $db;
    private MyMICoinOfferingService $offeringService;
    private MditInvestorProfileModel $profileModel;
    private MditDepositModel $depositModel;
    private MditTokenLedgerModel $ledgerModel;

    protected function setUp(): void
    {
        parent::setUp();

        require_once APPPATH . 'Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php';
        require_once APPPATH . 'Database/Migrations/2026-11-25-000500_CreateMyMICoinInterestTable.php';

        $sqliteConfig = [
            'DBDriver' => 'SQLite3',
            'database' => ':memory:',
            'DBPrefix' => '',
        ];
        $this->db = Database::connect($sqliteConfig);

        $forge = Database::forge($this->db);
        (new CreateMditPhase1Tables($forge))->up();
        (new CreateMyMICoinInterestTable($forge))->up();

        $this->profileModel = new MditInvestorProfileModel($this->db);
        $this->depositModel = new MditDepositModel($this->db);
        $this->ledgerModel = new MditTokenLedgerModel($this->db);
        $snapshotModel = new \App\Models\MDIT\MditNavSnapshotModel($this->db);
        $walletModel = new MditWalletModel($this->db);

        $investorService = new MditInvestorService($this->profileModel);
        $depositService = new MditDepositService($this->depositModel, $walletModel);
        $navService = new MditNavService($snapshotModel, $this->ledgerModel);
        $issuanceService = new MditIssuanceService($this->depositModel, $this->ledgerModel, $navService);

        $this->offeringService = new MyMICoinOfferingService(
            $this->db,
            $investorService,
            $depositService,
            $issuanceService
        );
    }

    protected function tearDown(): void
    {
        $forge = Database::forge($this->db);
        (new CreateMyMICoinInterestTable($forge))->down();
        (new CreateMditPhase1Tables($forge))->down();
        $this->db->close();
        parent::tearDown();
    }

    public function testOfferingDetailsContainDisclaimersAndTerms(): void
    {
        $details = $this->offeringService->getOfferingDetails();

        $this->assertSame('MYMIC', $details['token_symbol']);
        $this->assertSame('SEC Regulation D Rule 506(c)', $details['regulatory_framework']);
        $this->assertSame('Accredited Investors Only', $details['investor_eligibility']);
        $this->assertFalse($details['is_exchange_traded']);
        $this->assertSame(5000.0, $details['minimum_investment_usd']);
        $this->assertStringContainsString('No returns or dividends are guaranteed', $details['return_disclaimer']);
    }

    public function testNonAccreditedUserCannotInitiateDeposit(): void
    {
        $userId = 101;
        // Profile initialized as PENDING KYC and accreditation
        $this->profileModel->insert([
            'user_id'              => $userId,
            'kyc_status'           => 'PENDING',
            'accreditation_status' => 'PENDING',
            'created_on'           => date('Y-m-d H:i:s'),
            'updated_on'           => date('Y-m-d H:i:s'),
        ]);

        $res = $this->offeringService->initiateAccreditedDeposit($userId, [
            'amount'         => 10000,
            'wallet_address' => '0x1234567890123456789012345678901234567890',
            'chain'          => 'ETHEREUM',
        ]);

        $this->assertFalse($res['ok']);
        $this->assertSame('accreditation_required', $res['error']);
        $this->assertSame('ACCREDITED_INVESTOR_ONLY', $res['code']);
    }

    public function testNonAccreditedUserCannotMint(): void
    {
        $userId = 101;
        $this->profileModel->insert([
            'user_id'              => $userId,
            'kyc_status'           => 'PENDING',
            'accreditation_status' => 'PENDING',
            'created_on'           => date('Y-m-d H:i:s'),
            'updated_on'           => date('Y-m-d H:i:s'),
        ]);

        $res = $this->offeringService->mintMyMICoin($userId, 1);

        $this->assertFalse($res['ok']);
        $this->assertSame('accreditation_required', $res['error']);
        $this->assertSame('ACCREDITED_INVESTOR_ONLY', $res['code']);
    }

    public function testAccreditedUserCanDepositAndMint(): void
    {
        $userId = 202;
        // User is KYC verified and accredited
        $this->profileModel->insert([
            'user_id'              => $userId,
            'kyc_status'           => 'VERIFIED',
            'accreditation_status' => 'ACCREDITED',
            'created_on'           => date('Y-m-d H:i:s'),
            'updated_on'           => date('Y-m-d H:i:s'),
        ]);

        // Initiate deposit
        $depositRes = $this->offeringService->initiateAccreditedDeposit($userId, [
            'amount'          => 7500,
            'wallet_address'  => 'So11111111111111111111111111111111111111112',
            'chain'           => 'SOLANA',
            'idempotency_key' => 'dep_test_202',
        ]);

        $this->assertTrue($depositRes['ok']);
        $depositId = $depositRes['deposit_id'];
        $this->assertNotNull($depositId);

        // Simulate on-chain confirmation of deposit
        $this->depositModel->update($depositId, [
            'status'  => 'CONFIRMED_ONCHAIN',
            'tx_hash' => 'tx_hash_confirmed_onchain_123',
        ]);

        // Mint token units into MDIT ledger
        $mintRes = $this->offeringService->mintMyMICoin($userId, $depositId);

        $this->assertTrue($mintRes['ok']);
        $this->assertSame('MYMIC', $mintRes['token_symbol']);
        $this->assertSame('MINTED', $mintRes['status']);

        // Verify ledger entry
        $ledger = $this->ledgerModel->where('source_deposit_id', $depositId)->first();
        $this->assertNotNull($ledger);
        $this->assertSame('MYMIC', $ledger['token_symbol']);
        $this->assertSame($userId, (int) $ledger['user_id']);
        $this->assertSame(7500.0, (float) $ledger['units']);
    }

    public function testAccreditedUserCannotMintAnotherUsersDeposit(): void
    {
        foreach ([404, 505] as $uid) {
            $this->profileModel->insert([
                'user_id'              => $uid,
                'kyc_status'           => 'VERIFIED',
                'accreditation_status' => 'ACCREDITED',
                'created_on'           => date('Y-m-d H:i:s'),
                'updated_on'           => date('Y-m-d H:i:s'),
            ]);
        }

        $depositRes = $this->offeringService->initiateAccreditedDeposit(404, [
            'amount'          => 6000,
            'wallet_address'  => 'So11111111111111111111111111111111111111112',
            'chain'           => 'SOLANA',
            'idempotency_key' => 'dep_test_404',
        ]);
        $depositId = (int) $depositRes['deposit_id'];
        $this->depositModel->update($depositId, ['status' => 'CONFIRMED_ONCHAIN', 'tx_hash' => 'tx_404']);

        $res = $this->offeringService->mintMyMICoin(505, $depositId);

        $this->assertFalse($res['ok']);
        $this->assertSame('deposit_not_found', $res['error']);
        $this->assertNull($this->ledgerModel->where('source_deposit_id', $depositId)->first());
    }

    public function testRegisterInterestStoresAttestation(): void
    {
        $userId = 303;
        $res = $this->offeringService->registerInterest(
            $userId,
            'accredited@example.com',
            true,
            25000.00,
            'CPA accredited verification letter on file'
        );

        $this->assertTrue($res['ok']);

        $row = $this->db->table('bf_mymicoin_interest_list')->where('user_id', $userId)->get()->getRowArray();
        $this->assertNotNull($row);
        $this->assertSame('accredited@example.com', $row['email']);
        $this->assertEquals(25000.0, (float) $row['intended_investment_usd']);
        $this->assertSame(1, (int) $row['accreditation_attestation']);
    }
}
