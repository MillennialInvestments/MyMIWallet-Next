<?php

use App\Libraries\SecureTransfer\ArrayAuditLog;
use App\Libraries\SecureTransfer\Base58;
use App\Libraries\SolanaFees\ArrayFeeReceiptStore;
use App\Libraries\SolanaFees\SolanaFeeService;
use App\Libraries\SolanaPay\PayRpc;
use App\Libraries\SolanaPay\SolanaPayService;
use App\Libraries\SolanaPay\TransactionBuilder;
use CodeIgniter\Test\CIUnitTestCase;
use Config\SolanaFees;
use Config\SolanaPay as SolanaPayConfig;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../../_support/bootstrap.php';
}

final class SolanaPayServiceTest extends CIUnitTestCase
{
    private string $treasury;
    private string $payer;
    private string $payerUsdc;
    private string $mintUsdc;
    private string $mymiUsdc;
    private int $now = 1_790_000_000;
    /** @var array<string, array> signature => jsonParsed transaction */
    private array $chain = [];
    /** @var array<string, list<array>> reference => signature list */
    private array $byReference = [];
    /** @var list<array> */
    private array $fulfilled = [];
    private \CodeIgniter\Database\BaseConnection $sqlite;

    protected function setUp(): void
    {
        parent::setUp();
        $key = static fn (): string => Base58::encode(random_bytes(32));
        [$this->treasury, $this->payer, $this->payerUsdc, $this->mymiUsdc] = [$key(), $key(), $key(), $key()];
        $this->mintUsdc = SolanaPayConfig::USDC_DEVNET;

        $this->sqlite = \Config\Database::connect(['DSN' => '', 'hostname' => '', 'username' => '', 'password' => '', 'database' => ':memory:',
            'DBDriver' => 'SQLite3', 'DBPrefix' => '', 'pConnect' => false, 'DBDebug' => true, 'charset' => 'utf8', 'DBCollat' => '',
            'swapPre' => '', 'encrypt' => false, 'compress' => false, 'strictOn' => false, 'failover' => [], 'port' => 0,
            'foreignKeys' => true, 'busyTimeout' => 1000], false);
        require_once APPPATH . 'Database/Migrations/2026-11-23-000400_CreateSolanaPayRequests.php';
        require_once APPPATH . 'Database/Migrations/2026-11-15-000300_CreateFormFeatureTables.php';
        (new \App\Database\Migrations\CreateSolanaPayRequests(\Config\Database::forge($this->sqlite)))->up();
        (new \App\Database\Migrations\CreateSolanaPayRequests(\Config\Database::forge($this->sqlite)))->up();
        (new \App\Database\Migrations\CreateFormFeatureTables(\Config\Database::forge($this->sqlite)))->up();
    }

    private function service(int $feeLamports = 5_000_000, ?ArrayAuditLog $audit = null): SolanaPayService
    {
        $fees = new SolanaFees();
        $fees->treasury = $this->treasury;
        $fees->lamports = ['transfer_processing' => 1_000_000, 'payment_processing' => $feeLamports];
        $fees->cluster = 'devnet';

        $cfg = new SolanaPayConfig();
        $cfg->enabled = true;
        $cfg->recipient = $this->treasury;
        $cfg->recipientUsdcAccount = $this->mymiUsdc;
        $cfg->usdcMint = $this->mintUsdc;
        $cfg->cluster = 'devnet';
        $cfg->rpcUrls = ['http://rpc.invalid'];

        $test = $this;
        $rpc = new class ($test) implements PayRpc {
            public function __construct(private SolanaPayServiceTest $t)
            {
            }

            public function call(string $method, array $params): mixed
            {
                return $this->t->rpc($method, $params);
            }

            public function getTransaction(string $signature): ?array
            {
                return $this->t->rpc('getTransaction', [$signature]);
            }
        };
        $clock = fn (): int => $this->now;
        $fulfillers = [];
        foreach (array_keys(SolanaPayConfig::PURPOSES) as $p) {
            $fulfillers[$p] = function (int $userId, int $claimId, array $row): array {
                $this->fulfilled[] = ['user' => $userId, 'claim' => $claimId, 'row' => $row];
                return ['ok' => true, 'reason' => 'fulfilled', 'message' => 'done'];
            };
        }

        return new SolanaPayService($cfg, $rpc, new SolanaFeeService($fees, $rpc, new ArrayFeeReceiptStore(), $clock),
            $this->sqlite, $fulfillers, 'https://mymi.test/API/SolanaPay/Tx', $audit, $clock);
    }

    /** Fake RPC used by the anonymous PayRpc above. */
    public function rpc(string $method, array $params): mixed
    {
        return match ($method) {
            'getTransaction' => $this->chain[$params[0]] ?? null,
            'getSignaturesForAddress' => $this->byReference[$params[0]] ?? [],
            'getLatestBlockhash' => ['value' => ['blockhash' => Base58::encode(str_repeat("\x07", 32)), 'lastValidBlockHeight' => 1]],
            'getRecentPrioritizationFees' => [['slot' => 1, 'prioritizationFee' => 0], ['slot' => 2, 'prioritizationFee' => 5000], ['slot' => 3, 'prioritizationFee' => 9000]],
            'getTokenAccountsByOwner' => ['value' => [['pubkey' => $this->payerUsdc, 'account' => ['data' => ['parsed' => ['info' => ['tokenAmount' => ['amount' => '900000000']]]]]]]],
            default => null,
        };
    }

    /** Put a payment for $reference on the fake chain and return its signature. */
    private function pay(string $reference, int $tokenAmount, int $feeLamports, array $override = []): string
    {
        $sig = Base58::encode(random_bytes(64));
        $instructions = [
            ['program' => 'spl-token', 'parsed' => ['type' => 'transferChecked', 'info' => [
                'source' => $this->payerUsdc, 'destination' => $override['destination'] ?? $this->mymiUsdc, 'mint' => $override['mint'] ?? $this->mintUsdc,
                'authority' => $this->payer, 'tokenAmount' => ['amount' => (string) $tokenAmount, 'decimals' => 6]]]],
        ];
        if ($feeLamports > 0) {
            $instructions[] = ['program' => 'system', 'parsed' => ['type' => 'transfer', 'info' => ['source' => $this->payer, 'destination' => $this->treasury, 'lamports' => $feeLamports]]];
        }
        $keys = [['pubkey' => $this->payer, 'signer' => true, 'writable' => true], ['pubkey' => $this->payerUsdc, 'signer' => false, 'writable' => true],
            ['pubkey' => $this->mymiUsdc, 'signer' => false, 'writable' => true], ['pubkey' => $this->treasury, 'signer' => false, 'writable' => true]];
        if (! ($override['no_reference'] ?? false)) {
            $keys[] = ['pubkey' => $reference, 'signer' => false, 'writable' => false];
        }
        $this->chain[$sig] = ['slot' => 5, 'blockTime' => $this->now, 'meta' => ['err' => $override['err'] ?? null, 'innerInstructions' => []],
            'transaction' => ['message' => ['accountKeys' => $keys, 'instructions' => $instructions]]];
        $this->byReference[$reference][] = ['signature' => $sig, 'err' => null];
        return $sig;
    }

    public function testCheckoutUsesServerPriceAndUniqueReference(): void
    {
        $svc = $this->service();
        $a = $svc->checkout(7, 'mymigold', 'w1', 2500);
        $b = $svc->checkout(7, 'mymigold', 'w1', 2500);

        $this->assertTrue($a['ok']);
        $this->assertNotSame($a['reference'], $b['reference']);
        $this->assertSame('25.00', $a['usd']);
        $this->assertSame('0.005', $a['fee_sol']);
        $this->assertSame('solana:' . rawurlencode('https://mymi.test/API/SolanaPay/Tx/' . $a['reference']), $a['url']);
        $row = $this->sqlite->table('bf_solana_pay_requests')->where('reference', $a['reference'])->get()->getRowArray();
        $this->assertSame(25_000_000, (int) $row['token_amount']);
        $this->assertSame('pending', $row['status']);

        $this->assertSame('amount_out_of_range', $svc->checkout(7, 'mymigold', '', 50)['error']);
        $this->assertSame('unknown_purpose', $svc->checkout(7, 'free_money', '', 2500)['error']);
        $this->assertSame('not_signed_in', $svc->checkout(0, 'mymigold', '', 2500)['error']);
    }

    public function testTransactionCarriesPriceReferenceAndFee(): void
    {
        $svc = $this->service();
        $c = $svc->checkout(7, 'membership', 'Pro', 1999);
        $t = $svc->transaction($c['reference'], $this->payer);

        $this->assertTrue($t['ok']);
        $this->assertStringContainsString('19.99 USDC + 0.005 SOL fee', $t['message']);
        $raw = base64_decode($t['transaction'], true);
        $this->assertSame(1, ord($raw[0]));                       // one signature slot
        $this->assertSame(str_repeat("\0", 64), substr($raw, 1, 64)); // left empty for the wallet
        $msg = substr($raw, 65);
        foreach ([$this->payer, $this->payerUsdc, $this->mymiUsdc, $this->treasury, $c['reference'], $this->mintUsdc] as $k) {
            $this->assertStringContainsString(Base58::decode($k), $msg);
        }
        $this->assertStringContainsString(chr(12) . pack('P', 19_990_000) . chr(6), $msg);  // transferChecked 19.99 USDC
        $this->assertStringContainsString(pack('V', 2) . pack('P', 5_000_000), $msg);      // 0.005 SOL fee
        $this->assertStringContainsString(chr(3) . pack('P', 5000), $msg);                 // priority fee from recent fees (p75)

        $this->assertSame('invalid_account', $svc->transaction($c['reference'], 'not-a-key')['error']);
        $this->assertSame('checkout_not_found', $svc->transaction(Base58::encode(random_bytes(32)), $this->payer)['error']);
        $this->now += 2000;
        $this->assertSame('checkout_closed', $svc->transaction($c['reference'], $this->payer)['error']);
    }

    public function testConfirmFulfilsExactlyOnceAndRecordsEverything(): void
    {
        $audit = new ArrayAuditLog();
        $svc = $this->service(5_000_000, $audit);
        $c = $svc->checkout(7, 'auction_topup', '12', 1000);
        $this->assertSame('pending', $svc->confirm($c['reference'], 7)['status']);

        $sig = $this->pay($c['reference'], 10_000_000, 5_000_000);
        $r = $svc->confirm($c['reference'], 7);
        $this->assertSame('fulfilled', $r['status']);
        $this->assertSame($sig, $r['signature']);
        $this->assertCount(1, $this->fulfilled);
        $this->assertSame($sig, $this->fulfilled[0]['row']['signature']);

        $again = $svc->confirm($c['reference'], 7);
        $this->assertSame('fulfilled', $again['status']);
        $this->assertCount(1, $this->fulfilled, 'a second status check must not deliver twice');

        $claim = $this->sqlite->table('bf_payment_claims')->where('provider', 'solana')->get()->getRowArray();
        $this->assertSame('fulfilled', $claim['status']);
        $this->assertSame('10.00', number_format((float) $claim['verified_amount'], 2));
        $this->assertSame(['payment_confirmed'], array_column($audit->find([]), 'event'));
        $this->assertSame('not_found', $svc->confirm($c['reference'], 8)['status'], 'another user cannot read or confirm it');
    }

    public function testWrongAmountTokenOrRecipientIsNotAccepted(): void
    {
        $svc = $this->service();
        $c = $svc->checkout(7, 'mymigold', '', 1000);
        $this->pay($c['reference'], 9_999_999, 5_000_000);
        $this->pay($c['reference'], 10_000_000, 5_000_000, ['mint' => Base58::encode(random_bytes(32))]);
        $this->pay($c['reference'], 10_000_000, 5_000_000, ['destination' => Base58::encode(random_bytes(32))]);
        $this->pay($c['reference'], 10_000_000, 5_000_000, ['err' => ['InstructionError' => [0, 'Custom']]]);

        $this->assertSame('pending', $svc->confirm($c['reference'], 7)['status']);
        $this->assertSame([], $this->fulfilled);
    }

    public function testPaymentWithoutTheFeeGoesToReviewNotDelivery(): void
    {
        $svc = $this->service();
        $c = $svc->checkout(7, 'fund_units', '3', 5000);
        $this->pay($c['reference'], 50_000_000, 0);

        $r = $svc->confirm($c['reference'], 7);
        $this->assertSame('review', $r['status']);
        $this->assertSame('fee_not_paid', $r['error']);
        $this->assertSame([], $this->fulfilled);
        $this->assertSame('review', $svc->confirm($c['reference'], 7)['status']);
    }

    public function testNoFeeWhenUnpricedAndExpiryAfterTheWindow(): void
    {
        $svc = $this->service(0);
        $c = $svc->checkout(7, 'mymigold', '', 1000);
        $this->assertSame('0', $c['fee_sol']);
        $t = $svc->transaction($c['reference'], $this->payer);
        $this->assertStringNotContainsString(pack('V', 2) . pack('P', 0), base64_decode($t['transaction']));

        $late = $svc->checkout(7, 'mymigold', '', 1000);
        $this->now += 2000;
        $this->assertSame('expired', $svc->confirm($late['reference'], 7)['status']);

        $this->pay($c['reference'], 10_000_000, 0);
        $this->assertSame('fulfilled', $svc->confirm($c['reference'], 7)['status']);
    }

    public function testVerifyRequiresTheReferenceAndASigner(): void
    {
        $row = ['reference' => Base58::encode(random_bytes(32)), 'created_at' => $this->now, 'recipient_token_account' => $this->mymiUsdc,
            'token_mint' => $this->mintUsdc, 'token_amount' => 10_000_000];
        $sig = $this->pay($row['reference'], 10_000_000, 0, ['no_reference' => true]);
        $this->assertSame('reference_missing', SolanaPayService::verify($this->chain[$sig], $row)['error']);

        $sig = $this->pay($row['reference'], 10_000_000, 0);
        $tx = $this->chain[$sig];
        $tx['transaction']['message']['accountKeys'][0]['signer'] = false;
        $this->assertSame('no_matching_transfer', SolanaPayService::verify($tx, $row)['error']);
        $this->assertTrue(SolanaPayService::verify($this->chain[$sig], $row)['ok']);
    }

    public function testCompactU16MatchesTheSolanaEncoding(): void
    {
        $this->assertSame("\x00", TransactionBuilder::compactU16(0));
        $this->assertSame("\x7f", TransactionBuilder::compactU16(127));
        $this->assertSame("\x80\x01", TransactionBuilder::compactU16(128));
        $this->assertSame("\xff\xff\x03", TransactionBuilder::compactU16(65535));
    }
}
