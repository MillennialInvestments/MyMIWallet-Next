<?php

namespace Tests\Unit\SolanaFees;

use App\Libraries\SecureTransfer\Base58;
use App\Libraries\SolanaFees\ArrayFeeReceiptStore;
use App\Libraries\SolanaFees\SolanaFeeService;
use App\Libraries\SolanaFees\SolanaRpc;
use CodeIgniter\Test\CIUnitTestCase;
use Config\SolanaFees;

/** SOL service fees: two separately priced kinds, checked against a fake RPC. */
final class SolanaFeeServiceTest extends CIUnitTestCase
{
    private int $now = 1_800_000_000;
    private string $treasury;
    private string $payer;
    /** @var array<string, array> */
    private array $chain = [];

    protected function setUp(): void
    {
        parent::setUp();
        $this->treasury = Base58::encode(sodium_crypto_sign_publickey(sodium_crypto_sign_keypair()));
        $this->payer = Base58::encode(sodium_crypto_sign_publickey(sodium_crypto_sign_keypair()));
    }

    private function config(int $transfer = 5_000_000, int $payment = 20_000_000): SolanaFees
    {
        $c = new SolanaFees();
        $c->treasury = $this->treasury;
        $c->lamports = ['transfer_processing' => $transfer, 'payment_processing' => $payment];
        $c->cluster = 'devnet';
        return $c;
    }

    private function service(?SolanaFees $c = null, ?ArrayFeeReceiptStore $store = null): SolanaFeeService
    {
        $rpc = new class ($this->chain) implements SolanaRpc {
            public function __construct(private array &$chain)
            {
            }

            public function getTransaction(string $signature): ?array
            {
                return $this->chain[$signature] ?? null;
            }
        };
        return new SolanaFeeService($c ?? $this->config(), $rpc, $store ?? new ArrayFeeReceiptStore(), fn () => $this->now);
    }

    /** Puts a confirmed System transfer on the fake chain; returns its signature. */
    private function pay(int $lamports, ?string $from = null, ?string $to = null, array $overrides = []): string
    {
        $sig = Base58::encode(random_bytes(64));
        $from ??= $this->payer;
        $this->chain[$sig] = array_replace_recursive([
            'slot' => 123, 'blockTime' => $this->now - 30, 'meta' => ['err' => null, 'innerInstructions' => []],
            'transaction' => ['message' => [
                'accountKeys' => [['pubkey' => $from, 'signer' => true], ['pubkey' => $to ?? $this->treasury, 'signer' => false]],
                'instructions' => [['program' => 'system', 'parsed' => ['type' => 'transfer',
                    'info' => ['source' => $from, 'destination' => $to ?? $this->treasury, 'lamports' => $lamports]]]],
            ]],
        ], $overrides);
        return $sig;
    }

    public function testTwoKindsArePricedSeparately(): void
    {
        $svc = $this->service();
        $this->assertSame(['kind' => 'transfer_processing', 'required' => true, 'lamports' => 5_000_000, 'sol' => '0.005',
            'treasury' => $this->treasury, 'cluster' => 'devnet'], $svc->quote('transfer_processing'));
        $this->assertSame('0.02', $svc->quote('payment_processing')['sol']);
        $this->assertFalse($svc->required('unknown_kind'));
    }

    public function testOffWithoutTreasuryOrPrice(): void
    {
        $c = $this->config(0, 0);
        $this->assertFalse($this->service($c)->required('transfer_processing'));
        $this->assertSame(['ok' => true, 'charged' => false], $this->service($c)->claim('transfer_processing', 1, $this->payer, 'x', 'ref'));
        $c = $this->config();
        $c->treasury = 'not-a-wallet';
        $this->assertFalse($this->service($c)->required('transfer_processing'));
    }

    public function testValidPaymentIsAcceptedOnceAndRecorded(): void
    {
        $store = new ArrayFeeReceiptStore();
        $svc = $this->service(null, $store);
        $sig = $this->pay(5_000_000);
        $r = $svc->claim('transfer_processing', 7, $this->payer, $sig, 'transfer-a');
        $this->assertTrue($r['ok'], json_encode($r));
        $this->assertSame(5_000_000, $store->rows[$sig]['lamports']);
        $this->assertSame('transfer-a', $store->rows[$sig]['reference']);
        $this->assertSame('fee_signature_already_used', $svc->claim('transfer_processing', 7, $this->payer, $sig, 'transfer-b')['error']);
        // Paying the transfer fee does not pay the (separate, larger) payment fee.
        $this->assertSame('fee_signature_already_used', $svc->claim('payment_processing', 7, $this->payer, $sig, 'pay-1')['error']);
    }

    public function testUnspentReceiptCanBeRetriedBySameUser(): void
    {
        $svc = $this->service();
        $sig = $this->pay(5_000_000);
        $this->assertTrue($svc->claim('transfer_processing', 7, $this->payer, $sig, 'transfer-a')['ok']);
        $unused = fn (string $ref) => $ref === 'transfer-a';
        $this->assertTrue($svc->claim('transfer_processing', 7, $this->payer, $sig, 'transfer-b', $unused)['reused_unspent']);
        $this->assertFalse($svc->claim('transfer_processing', 8, $this->payer, $sig, 'transfer-c', fn () => true)['ok']);
    }

    public function testRefusals(): void
    {
        $svc = $this->service();
        $this->assertSame('fee_signature_invalid', $svc->claim('transfer_processing', 1, $this->payer, 'abc', 'r')['error']);
        $this->assertSame('fee_payment_not_found', $svc->claim('transfer_processing', 1, $this->payer, Base58::encode(random_bytes(64)), 'r')['error']);
        $this->assertSame('fee_payment_too_small', $svc->claim('transfer_processing', 1, $this->payer, $this->pay(4_999_999), 'r')['error']);
        $other = Base58::encode(sodium_crypto_sign_publickey(sodium_crypto_sign_keypair()));
        $this->assertSame('fee_payment_too_small', $svc->claim('transfer_processing', 1, $this->payer, $this->pay(9_000_000, null, $other), 'r')['error']);
        $this->assertSame('fee_payment_not_from_your_wallet', $svc->claim('transfer_processing', 1, $this->payer, $this->pay(9_000_000, $other), 'r')['error']);
        $this->assertSame('fee_payment_failed_on_chain', $svc->claim('transfer_processing', 1, $this->payer,
            $this->pay(9_000_000, null, null, ['meta' => ['err' => ['InstructionError' => [0, 'Custom']]]]), 'r')['error']);
        $this->assertSame('fee_payment_too_old', $svc->claim('transfer_processing', 1, $this->payer,
            $this->pay(9_000_000, null, null, ['blockTime' => $this->now - 7200]), 'r')['error']);
    }

    public function testDbReceiptStoreRefusesASecondUseOfOneSignature(): void
    {
        require_once APPPATH . 'Database/Migrations/2026-11-23-000200_CreateSolanaFeeReceipts.php';
        $db = \Config\Database::connect(['DSN' => '', 'hostname' => '', 'username' => '', 'password' => '', 'database' => ':memory:',
            'DBDriver' => 'SQLite3', 'DBPrefix' => '', 'pConnect' => false, 'DBDebug' => true, 'charset' => 'utf8', 'DBCollat' => '',
            'swapPre' => '', 'encrypt' => false, 'compress' => false, 'strictOn' => false, 'failover' => [], 'port' => 0,
            'foreignKeys' => true, 'busyTimeout' => 1000], false);
        $m = new \App\Database\Migrations\CreateSolanaFeeReceipts(\Config\Database::forge($db));
        $m->up();
        $m->up();
        $store = new \App\Libraries\SolanaFees\DbFeeReceiptStore($db);
        $svc = new SolanaFeeService($this->config(), new class ($this->chain) implements SolanaRpc {
            public function __construct(private array &$chain)
            {
            }

            public function getTransaction(string $signature): ?array
            {
                return $this->chain[$signature] ?? null;
            }
        }, $store, fn () => $this->now);
        $sig = $this->pay(5_000_000);
        $this->assertTrue($svc->claim('transfer_processing', 7, $this->payer, $sig, 'ref-1')['ok']);
        $this->assertSame('ref-1', $store->find($sig)['reference']);
        $this->assertFalse($store->insert($store->find($sig)));
        $this->assertSame('fee_signature_already_used', $svc->claim('transfer_processing', 7, $this->payer, $sig, 'ref-2')['error']);
        $this->assertTrue($svc->claim('transfer_processing', 7, $this->payer, $sig, 'ref-2', fn () => true)['ok']);
        $this->assertSame('ref-2', $store->find($sig)['reference']);
    }
}
