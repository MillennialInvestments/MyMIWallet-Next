<?php

use App\Libraries\CryptoPay\Chains\Bitcoin;
use App\Libraries\CryptoPay\Chains\EvmUsdc;
use App\Libraries\CryptoPay\Chains\Xrpl;
use App\Libraries\CryptoPay\CryptoPayService;
use App\Libraries\CryptoPay\Http;
use App\Libraries\CryptoPay\SpotPrice;
use App\Libraries\SecureTransfer\ArrayAuditLog;
use App\Libraries\SolanaPay\Fulfillers;
use CodeIgniter\Test\CIUnitTestCase;
use Config\CryptoPay as CryptoPayConfig;
use Config\SolanaPay as SolanaPayConfig;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../../_support/bootstrap.php';
}

/** Fake HTTP for the chain adapters: answers come from the test's fake chains. */
final class CryptoPayFakeHttp implements Http
{
    /** @var array<string, callable(array): ?array> url => handler(body) */
    public array $post = [];
    /** @var array<string, ?string> url => body */
    public array $gets = [];
    /** @var list<string> */
    public array $log = [];

    public function postJson(string $url, array $body): ?array
    {
        $this->log[] = $url . ' ' . ($body['method'] ?? '');
        return isset($this->post[$url]) ? ($this->post[$url])($body) : null;
    }

    public function get(string $url): ?string
    {
        $this->log[] = 'GET ' . $url;
        return $this->gets[$url] ?? null;
    }
}

final class CryptoPayServiceTest extends CIUnitTestCase
{
    private const EVM_RPC = 'https://evm.test';
    private const EVM_RPC_2 = 'https://evm2.test';
    private const XRPL_RPC = 'https://xrpl.test';
    private const ESPLORA = 'https://esplora.test/api';
    private const USDC = '0x036cbd53842c5426634e7929541ec2318f3dcf7e';
    private const MYMI_EVM = '0x1111111111111111111111111111111111111111';
    private const BUYER_EVM = '0x2222222222222222222222222222222222222222';
    private const MYMI_XRP = 'rPT1Sjq2YGrBMTttX4GZHjKu9dyfzbpAYe';
    private const BUYER_XRP = 'rHb9CJAWyB4rj91VRWn96DkukG4bwdtyTh';
    private const MYMI_BTC = 'tb1qw508d6qejxtdg4y5r3zarvary0c5xw7kxpjzsx';

    private int $now = 1_790_000_000;
    private int $block = 500;
    /** @var list<array> EVM Transfer logs */
    private array $logs = [];
    private bool $evmDown = false;
    /** @var list<array> XRPL account_tx entries */
    private array $xrplTxs = [];
    /** @var list<array> Esplora txs, newest first */
    private array $btcTxs = [];
    private int $btcTip = 100;
    /** @var list<array> */
    private array $fulfilled = [];
    private CryptoPayFakeHttp $http;
    private \CodeIgniter\Database\BaseConnection $sqlite;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sqlite = \Config\Database::connect(['DSN' => '', 'hostname' => '', 'username' => '', 'password' => '', 'database' => ':memory:',
            'DBDriver' => 'SQLite3', 'DBPrefix' => '', 'pConnect' => false, 'DBDebug' => true, 'charset' => 'utf8', 'DBCollat' => '',
            'swapPre' => '', 'encrypt' => false, 'compress' => false, 'strictOn' => false, 'failover' => [], 'port' => 0,
            'foreignKeys' => true, 'busyTimeout' => 1000], false);
        require_once APPPATH . 'Database/Migrations/2026-11-25-000100_CreateCryptoPayRequests.php';
        require_once APPPATH . 'Database/Migrations/2026-11-15-000300_CreateFormFeatureTables.php';
        (new \App\Database\Migrations\CreateCryptoPayRequests(\Config\Database::forge($this->sqlite)))->up();
        (new \App\Database\Migrations\CreateCryptoPayRequests(\Config\Database::forge($this->sqlite)))->up(); // idempotent
        (new \App\Database\Migrations\CreateFormFeatureTables(\Config\Database::forge($this->sqlite)))->up();

        $this->http = new CryptoPayFakeHttp();
        $this->http->post[self::EVM_RPC] = fn (array $b): ?array => $this->evm($b);
        $this->http->post[self::XRPL_RPC] = fn (array $b): ?array => $this->xrpl($b);
        $this->setPrices('2.00', '2.01', '100000', '100100');
        $this->http->gets[self::ESPLORA . '/blocks/tip/height'] = null; // set per call below
    }

    private function setPrices(string $xrpA, string $xrpB, string $btcA, string $btcB): void
    {
        $this->http->gets['https://api.coinbase.com/v2/prices/XRP-USD/spot'] = json_encode(['data' => ['amount' => $xrpA]]);
        $this->http->gets['https://api.kraken.com/0/public/Ticker?pair=XRPUSD'] = json_encode(['result' => ['XXRPZUSD' => ['c' => [$xrpB, '1']]]]);
        $this->http->gets['https://api.coinbase.com/v2/prices/BTC-USD/spot'] = json_encode(['data' => ['amount' => $btcA]]);
        $this->http->gets['https://api.kraken.com/0/public/Ticker?pair=XBTUSD'] = json_encode(['result' => ['XXBTZUSD' => ['c' => [$btcB, '1']]]]);
    }

    private function evm(array $b): ?array
    {
        if ($this->evmDown) {
            return null;
        }
        return match ($b['method']) {
            'eth_blockNumber' => ['result' => '0x' . dechex($this->block)],
            'eth_getLogs' => ['result' => array_values(array_filter($this->logs, static fn (array $l): bool => hexdec($l['blockNumber']) >= hexdec($b['params'][0]['fromBlock'])
                && hexdec($l['blockNumber']) <= hexdec($b['params'][0]['toBlock'])))],
            default => null,
        };
    }

    private function xrpl(array $b): ?array
    {
        return match ($b['method']) {
            'ledger' => ['result' => ['status' => 'success', 'ledger_index' => 9000]],
            'account_tx' => ['result' => ['status' => 'success', 'ledger_index_max' => 9100, 'transactions' => array_values(array_filter($this->xrplTxs,
                static fn (array $t): bool => $t['ledger_index'] >= $b['params'][0]['ledger_index_min']))]],
            default => null,
        };
    }

    private function config(int $feeCents = 50): CryptoPayConfig
    {
        $cfg = new CryptoPayConfig();
        $cfg->enabled = true;
        $cfg->network = 'testnet';
        $cfg->recipients = ['ethereum' => '', 'base' => self::MYMI_EVM, 'xrpl' => self::MYMI_XRP, 'bitcoin' => self::MYMI_BTC];
        $cfg->endpoints = ['ethereum' => [], 'base' => [self::EVM_RPC], 'xrpl' => [self::XRPL_RPC], 'bitcoin' => [self::ESPLORA]];
        $cfg->confirmations = ['ethereum' => 3, 'base' => 2, 'xrpl' => 1, 'bitcoin' => 1];
        $cfg->feeCents = ['ethereum' => $feeCents, 'base' => $feeCents, 'xrpl' => $feeCents, 'bitcoin' => $feeCents];
        return $cfg;
    }

    private function service(int $feeCents = 50, ?ArrayAuditLog $audit = null, ?callable $fulfil = null): CryptoPayService
    {
        $cfg = $this->config($feeCents);
        $prices = new SpotPrice($this->http);
        $chains = [
            'base'    => new EvmUsdc('base', 84532, self::USDC, [self::EVM_RPC_2, self::EVM_RPC], $this->http, 2),
            'xrpl'    => new Xrpl([self::XRPL_RPC], $this->http, $prices),
            'bitcoin' => new Bitcoin('testnet', [self::ESPLORA], $this->http, $prices),
        ];
        $fulfillers = [];
        foreach (array_keys(SolanaPayConfig::PURPOSES) as $p) {
            $fulfillers[$p] = $fulfil ?? function (int $userId, int $claimId, array $row): array {
                $this->fulfilled[] = ['user' => $userId, 'claim' => $claimId, 'row' => $row];
                return ['ok' => true, 'reason' => 'fulfilled', 'message' => 'done'];
            };
        }
        return new CryptoPayService($cfg, $chains, $this->sqlite, $fulfillers, $audit, fn (): int => $this->now);
    }

    private function row(string $reference): array
    {
        return $this->sqlite->table('bf_crypto_pay_requests')->where('reference', $reference)->get()->getRowArray();
    }

    private function usdcLog(int $amount, int $block, array $o = []): void
    {
        $this->logs[] = [
            'address' => $o['address'] ?? self::USDC, 'removed' => $o['removed'] ?? false, 'blockNumber' => '0x' . dechex($block),
            'logIndex' => '0x' . dechex(count($this->logs)), 'transactionHash' => '0x' . bin2hex(random_bytes(32)),
            'topics' => [EvmUsdc::TRANSFER_TOPIC, '0x' . str_pad(substr(self::BUYER_EVM, 2), 64, '0', STR_PAD_LEFT), '0x' . str_pad(substr($o['to'] ?? self::MYMI_EVM, 2), 64, '0', STR_PAD_LEFT)],
            'data' => '0x' . str_pad(dechex($amount), 64, '0', STR_PAD_LEFT),
        ];
    }

    public function testEvmCheckoutPricesFeeInTheSamePaymentWithAUniqueAmount(): void
    {
        $svc = $this->service(50);
        $a = $svc->checkout(7, 'base', 'mymigold', 'w1', 2500);
        $b = $svc->checkout(7, 'base', 'mymigold', 'w1', 2500);

        $this->assertTrue($a['ok']);
        $this->assertSame('USDC', $a['asset']);
        $this->assertSame(['25.00', '0.50', '25.50'], [$a['usd'], $a['fee_usd'], $a['total_usd']]);
        $raw = (int) $a['amount_raw'];
        $this->assertSame(25_500_000, intdiv($raw, 10000) * 10000, 'price + fee in USDC units');
        $this->assertGreaterThan(25_500_000, $raw);
        $this->assertLessThan(25_510_000, $raw, 'the tag stays under one cent');
        $this->assertNotSame($a['amount_raw'], $b['amount_raw']);
        $this->assertSame(84532, $a['chain_id']);
        $this->assertSame('ethereum:' . self::USDC . '@84532/transfer?address=' . self::MYMI_EVM . '&uint256=' . $raw, $a['uri']);
        $this->assertSame(500, (int) $this->row($a['reference'])['start_cursor']);
        $this->assertContains(self::EVM_RPC_2 . ' eth_blockNumber', $this->http->log, 'first endpoint tried, then failover');

        $this->assertSame('chain_not_available', $svc->checkout(7, 'ethereum', 'mymigold', '', 2500)['error']);
        $this->assertSame('chain_not_available', $svc->checkout(7, 'dogecoin', 'mymigold', '', 2500)['error']);
        $this->assertSame('amount_out_of_range', $svc->checkout(7, 'base', 'mymigold', '', 50)['error']);
        $this->assertSame('unknown_purpose', $svc->checkout(7, 'base', 'free_money', '', 2500)['error']);
        $this->assertSame('not_signed_in', $svc->checkout(0, 'base', 'mymigold', '', 2500)['error']);
    }

    public function testEvmPaymentIsDeliveredOnceWithAVerifiedRecord(): void
    {
        $audit = new ArrayAuditLog();
        $svc = $this->service(50, $audit);
        $c = $svc->checkout(7, 'base', 'auction_topup', '12', 1000);
        $this->usdcLog((int) $c['amount_raw'], 503);
        $this->block = 504;

        $r = $svc->confirm($c['reference'], 7);
        $this->assertSame('fulfilled', $r['status']);
        $this->assertCount(1, $this->fulfilled);
        $row = $this->fulfilled[0]['row'];
        $this->assertSame('crypto-base', $row['provider']);
        $this->assertSame(1000, (int) $row['usd_cents'], 'the product gets the price, not price + fee');
        $this->assertStringStartsWith('base:0x', $row['signature']);
        $this->assertSame(self::BUYER_EVM, $this->row($c['reference'])['payer']);

        $this->assertSame('fulfilled', $svc->confirm($c['reference'], 7)['status']);
        $this->assertSame([], $svc->reconcile(), 'nothing left open for the sweep');
        $this->assertCount(1, $this->fulfilled, 'never delivered twice');

        $claim = $this->sqlite->table('bf_payment_claims')->where('provider', 'crypto-base')->get()->getRowArray();
        $this->assertSame('fulfilled', $claim['status']);
        $this->assertSame('10.00', number_format((float) $claim['verified_amount'], 2));
        $this->assertSame(50, json_decode($claim['detail'], true)['fee_cents']);
        $this->assertSame(['payment_confirmed'], array_column($audit->find([]), 'event'));
        $this->assertSame('not_found', $svc->confirm($c['reference'], 8)['status'], 'another user cannot read it');
    }

    public function testEvmWaitsForConfirmationsAndRejectsLookalikes(): void
    {
        $svc = $this->service();
        $c = $svc->checkout(7, 'base', 'mymigold', 'w1', 1000);
        $amount = (int) $c['amount_raw'];
        $this->usdcLog($amount + 1, 502);                               // wrong amount
        $this->usdcLog($amount, 502, ['address' => '0x' . str_repeat('9', 40)]); // a different token
        $this->usdcLog($amount, 502, ['to' => self::BUYER_EVM]);       // paid to someone else
        $this->usdcLog($amount, 502, ['removed' => true]);             // reorged out
        $this->usdcLog($amount, 499);                                  // before the checkout existed
        $this->block = 505;
        $this->assertSame('pending', $svc->confirm($c['reference'], 7)['status']);
        $this->assertSame([], $this->fulfilled);

        $this->usdcLog($amount, 505);                                  // real, 1 of 2 confirmations
        $r = $svc->confirm($c['reference'], 7);
        $this->assertSame('pending', $r['status']);
        $this->assertTrue($r['seen']);
        $this->assertStringContainsString('1 of 2', $r['message']);

        $this->block = 506;
        $this->assertSame('fulfilled', $svc->confirm($c['reference'], 7)['status']);
    }

    public function testOnePaymentNeverSettlesTwoCheckouts(): void
    {
        $svc = $this->service();
        $a = $svc->checkout(7, 'base', 'mymigold', 'w1', 1000);
        $b = $svc->checkout(8, 'base', 'mymigold', 'w2', 1000);
        // Force a clash the checkout itself avoids, to prove the database guard.
        $this->sqlite->table('bf_crypto_pay_requests')->where('reference', $b['reference'])->update(['asset_amount' => (int) $a['amount_raw']]);
        $this->usdcLog((int) $a['amount_raw'], 501);
        $this->block = 510;

        $this->assertSame('fulfilled', $svc->confirm($a['reference'], 7)['status']);
        $this->assertSame('pending', $svc->confirm($b['reference'], 8)['status']);
        $this->assertCount(1, $this->fulfilled);
    }

    public function testRpcOutageNeverExpiresACheckout(): void
    {
        $svc = $this->service();
        $c = $svc->checkout(7, 'base', 'mymigold', 'w1', 1000);
        $this->now += 5000;
        $this->evmDown = true;
        $this->assertSame('pending', $svc->confirm($c['reference'], 7)['status']);
        $this->assertSame('pending', $this->row($c['reference'])['status']);

        $this->evmDown = false;
        $this->assertSame('expired', $svc->confirm($c['reference'], 7)['status']);
    }

    public function testScanCursorOnlySkipsFinalBlocks(): void
    {
        $svc = $this->service();
        $c = $svc->checkout(7, 'base', 'mymigold', 'w1', 1000);
        $this->block = 520;
        $svc->confirm($c['reference'], 7);
        $this->assertSame(519, (int) $this->row($c['reference'])['scan_cursor'], 'blocks with fewer than 2 confirmations are read again');

        $this->usdcLog((int) $c['amount_raw'], 520);
        $this->block = 521;
        $this->assertSame('fulfilled', $svc->confirm($c['reference'], 7)['status']);
    }

    public function testXrpUsesDestinationTagAndDeliveredAmount(): void
    {
        $svc = $this->service(0);
        $c = $svc->checkout(7, 'xrpl', 'membership', 'starter', 1000);
        $this->assertTrue($c['ok']);
        $this->assertSame('2', $c['rate'], 'the lower of two agreeing prices');
        $this->assertSame('5', $c['amount']);           // $10 / $2.00
        $this->assertSame(5_000_000, (int) $c['amount_raw']);
        $this->assertIsInt($c['dest_tag']);
        $this->assertSame(self::MYMI_XRP . '?dt=' . $c['dest_tag'] . '&amount=5', $c['uri']);

        $tx = fn (array $o): array => [
            'ledger_index' => $o['ledger'] ?? 9001, 'validated' => $o['validated'] ?? true, 'hash' => strtoupper(bin2hex(random_bytes(32))),
            'tx' => ['TransactionType' => 'Payment', 'Account' => self::BUYER_XRP, 'Destination' => self::MYMI_XRP, 'DestinationTag' => $o['tag'] ?? $c['dest_tag'], 'Amount' => '5000000'],
            'meta' => ['TransactionResult' => $o['result'] ?? 'tesSUCCESS', 'delivered_amount' => $o['delivered'] ?? '5000000'],
        ];
        $this->xrplTxs[] = $tx(['delivered' => '10']);                  // partial payment flag: only 10 drops arrived
        $this->xrplTxs[] = $tx(['delivered' => ['currency' => 'USD', 'issuer' => self::BUYER_XRP, 'value' => '5']]); // a token, not XRP
        $this->xrplTxs[] = $tx(['tag' => 1]);                           // someone else's tag
        $this->xrplTxs[] = $tx(['result' => 'tecPATH_DRY']);
        $this->xrplTxs[] = $tx(['validated' => false]);
        $this->assertSame('pending', $svc->confirm($c['reference'], 7)['status']);

        $this->assertSame(9100, (int) $this->row($c['reference'])['scan_cursor'], 'validated ledgers are not read twice');
        $this->xrplTxs[] = $tx(['ledger' => 9101]);
        $this->assertSame('fulfilled', $svc->confirm($c['reference'], 7)['status']);
        $this->assertSame('crypto-xrpl', $this->fulfilled[0]['row']['provider']);
    }

    public function testDisagreeingPricesStopTheQuote(): void
    {
        $this->setPrices('2.00', '2.50', '100000', '100100');
        $svc = $this->service();
        $this->assertSame('price_unavailable', $svc->checkout(7, 'xrpl', 'mymigold', 'w1', 1000)['error']);

        // One exchange down is fine; the next one answers.
        $this->setPrices('2.00', '2.00', '100000', '100100');
        $this->http->gets['https://api.coinbase.com/v2/prices/XRP-USD/spot'] = null;
        $this->assertTrue($this->service()->checkout(7, 'xrpl', 'mymigold', 'w1', 1000)['ok']);
    }

    public function testBitcoinMatchesExactOutputAndConfirmations(): void
    {
        $this->http->gets[self::ESPLORA . '/blocks/tip/height'] = '100';
        $svc = $this->service(0);
        $c = $svc->checkout(7, 'bitcoin', 'mymigold', 'w1', 1000);
        $this->assertTrue($c['ok']);
        $amount = (int) $c['amount_raw'];
        $this->assertSame(10000, intdiv($amount, 100) * 100, '$10 at $100,000 = 10,000 sats, rounded to 100');
        $this->assertGreaterThan(10000, $amount);
        $this->assertStringStartsWith('bitcoin:' . self::MYMI_BTC . '?amount=0.0001', $c['uri']);

        $tx = fn (int $value, bool $confirmed, int $height = 0, ?int $time = null): array => [
            'txid' => bin2hex(random_bytes(32)), 'status' => ['confirmed' => $confirmed, 'block_height' => $height, 'block_time' => $time ?? $this->now],
            'vin' => [['prevout' => ['scriptpubkey_address' => 'tb1qbuyer']]],
            'vout' => [['scriptpubkey_address' => 'tb1qchange', 'value' => 5000], ['scriptpubkey_address' => self::MYMI_BTC, 'value' => $value]],
        ];
        $url = self::ESPLORA . '/address/' . self::MYMI_BTC . '/txs';
        $this->http->gets[$url] = json_encode([$tx($amount, false), $tx($amount + 1, true, 99), $tx($amount, true, 90, $this->now - 99999)]);
        $r = $svc->confirm($c['reference'], 7);
        $this->assertSame('pending', $r['status']);
        $this->assertTrue($r['seen'], 'in the mempool, not yet confirmed');

        $this->http->gets[$url] = json_encode([$tx($amount, true, 100)]);
        $this->assertSame('fulfilled', $svc->confirm($c['reference'], 7)['status']);
        $this->assertSame('tb1qbuyer', $this->row($c['reference'])['payer']);
    }

    public function testInterruptedDeliveryGoesToSupportNotTwice(): void
    {
        $svc = $this->service(0, null, function (): array {
            throw new \RuntimeException('process killed');
        });
        $c = $svc->checkout(7, 'base', 'mymigold', 'w1', 1000);
        $this->usdcLog((int) $c['amount_raw'], 501);
        $this->block = 510;
        $this->assertSame('unfulfilled', $svc->confirm($c['reference'], 7)['status']);

        // Simulate a crash after the payment record but before the final status.
        $this->sqlite->table('bf_crypto_pay_requests')->where('reference', $c['reference'])->update(['status' => 'confirmed', 'updated_at' => $this->now]);
        $this->now += 400;
        $counts = $this->service()->reconcile();
        $this->assertSame(1, $counts['unfulfilled'] ?? 0);
        $this->assertSame('interrupted_check_delivery', $this->row($c['reference'])['result']);
        $this->assertSame([], $this->fulfilled);
    }

    public function testOpenCheckoutCap(): void
    {
        $svc = $this->service();
        for ($i = 0; $i < 5; $i++) {
            $this->assertTrue($svc->checkout(7, 'base', 'mymigold', 'w1', 1000)['ok']);
        }
        $this->assertSame('too_many_open_checkouts', $svc->checkout(7, 'base', 'mymigold', 'w1', 1000)['error']);
        $this->assertTrue($svc->checkout(8, 'base', 'mymigold', 'w1', 1000)['ok']);
    }

    public function testConfigNeedsAnExplicitNetwork(): void
    {
        $cfg = new CryptoPayConfig();
        $this->assertFalse($cfg->ready(), 'off by default');
        $cfg->enabled = true;
        $cfg->recipients['base'] = self::MYMI_EVM;
        $cfg->endpoints['base'] = [self::EVM_RPC];
        $cfg->network = '';
        $this->assertSame([], $cfg->chains(), 'no network, no checkout: never accept test coins by accident');
        $cfg->network = 'testnet';
        $this->assertSame(['base'], $cfg->chains());
        $this->assertSame(84532, CryptoPayConfig::CHAIN_IDS['base']['testnet']);
    }

    public function testLedgerKeysForReconciliation(): void
    {
        $this->assertSame('SOLPAY-abc', Fulfillers::ledgerKey('solana', 'abc'));
        $this->assertSame('CRYPTO-abcdefghijklmnop', Fulfillers::ledgerKey('crypto-base', 'abcdefghijklmnopqrst'));
        $this->assertNull(Fulfillers::ledgerKey('paypal', 'X'));
        $this->assertSame(16, EvmUsdc::hexAmount('0x10'));
        $this->assertNull(EvmUsdc::hexAmount('0x' . str_repeat('f', 64)), 'absurd amounts are refused, not wrapped');
    }
}
