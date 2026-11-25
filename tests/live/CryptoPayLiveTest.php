<?php

use App\Libraries\CryptoPay\Chains\Bitcoin;
use App\Libraries\CryptoPay\Chains\EvmUsdc;
use App\Libraries\CryptoPay\Chains\Xrpl;
use App\Libraries\CryptoPay\CurlHttp;
use App\Libraries\CryptoPay\Http;
use App\Libraries\CryptoPay\SpotPrice;
use CodeIgniter\Test\CIUnitTestCase;
use Config\CryptoPay as CryptoPayConfig;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../_support/bootstrap.php';
}

/** Real HTTP that also notes each request that got no usable answer, so a failed probe says which call failed. */
final class CryptoPayLiveHttp implements Http
{
    /** @var list<string> */
    public array $failed = [];
    /** @var list<string> */
    public array $gets = [];

    public function __construct(private CurlHttp $inner)
    {
    }

    public function postJson(string $url, array $body): ?array
    {
        $r = $this->inner->postJson($url, $body);
        if ($r === null || isset($r['error'])) {
            $this->failed[] = 'POST ' . parse_url($url, PHP_URL_HOST) . ' ' . ($body['method'] ?? '') . ($r === null ? '' : ' ' . json_encode($r['error']));
        }
        return $r;
    }

    public function get(string $url): ?string
    {
        $this->gets[] = (string) parse_url($url, PHP_URL_HOST) . parse_url($url, PHP_URL_PATH);
        $r = $this->inner->get($url);
        if ($r === null) {
            $this->failed[] = 'GET ' . parse_url($url, PHP_URL_HOST) . parse_url($url, PHP_URL_PATH);
        }
        return $r;
    }
}

/**
 * Live, read-only probe of every crypto checkout chain against the public
 * endpoints the app uses by default: test networks and mainnet. It reads
 * block heights, address history and prices only; it never signs or sends.
 * Skipped unless CRYPTO_LIVE=1 (needs internet), so the normal suite stays offline.
 */
final class CryptoPayLiveTest extends CIUnitTestCase
{
    /** The XRPL genesis account exists on every network. */
    private const XRPL_ACCOUNT = 'rHb9CJAWyB4rj91VRWn96DkukG4bwdtyTh';
    private const EVM_ADDRESS = '0x000000000000000000000000000000000000dEaD';
    private const BTC_ADDRESS = ['testnet' => 'tb1qw508d6qejxtdg4y5r3zarvary0c5xw7kxpjzsx', 'mainnet' => 'bc1qw508d6qejxtdg4y5r3zarvary0c5xw7kxv8f3t4'];
    private const SOLANA_DEVNET_GENESIS = 'EtWTRABZaYq6iMfeYKouRu166VU2xqa1wcaWoxPkrZBG';

    private CryptoPayLiveHttp $http;

    protected function setUp(): void
    {
        parent::setUp();
        if (getenv('CRYPTO_LIVE') !== '1') {
            $this->markTestSkipped('live network probe: set CRYPTO_LIVE=1');
        }
        $this->http = new CryptoPayLiveHttp(new CurlHttp(20));
    }

    private static function report(string $line): void
    {
        fwrite(STDERR, 'LIVE ' . $line . PHP_EOL);
    }

    /** @return list<array{string, string}> */
    public static function networks(): array
    {
        return [['testnet'], ['mainnet']];
    }

    private function assertScan(string $label, object $adapter, array $row): void
    {
        $this->http->failed = [];
        $this->http->gets = [];
        $tip = $adapter->cursor();
        $this->assertIsInt($tip, $label . ': tip height');
        $this->assertGreaterThan(0, $tip);
        [$payments, $complete] = $adapter->payments($row + ['start_cursor' => max(1, $tip - 20), 'scan_cursor' => 0]);
        self::report(sprintf('%-18s tip=%d complete=%s matches=%d', $label, $tip, $complete ? 'yes' : 'NO', count($payments)));
        foreach (array_unique($this->http->failed) as $f) {
            self::report('  no answer: ' . $f);
        }
        if (! $complete) {
            self::report('  requests: ' . implode(' | ', $this->http->gets));
        }
        $this->assertTrue($complete, $label . ': a full read of recent history');
    }

    /** @dataProvider networks */
    public function testEvmUsdc(string $net): void
    {
        foreach (['ethereum', 'base'] as $chain) {
            $adapter = new EvmUsdc($chain, CryptoPayConfig::CHAIN_IDS[$chain][$net], CryptoPayConfig::USDC[$chain][$net], CryptoPayConfig::DEFAULT_ENDPOINTS[$chain][$net], $this->http, 1);
            $this->assertScan("$chain/$net", $adapter, ['recipient' => self::EVM_ADDRESS, 'asset_amount' => 1]);
        }
    }

    /** @dataProvider networks */
    public function testXrpl(string $net): void
    {
        $adapter = new Xrpl($net, CryptoPayConfig::DEFAULT_ENDPOINTS['xrpl'][$net], $this->http, new SpotPrice($this->http));
        $this->assertScan("xrpl/$net", $adapter, ['recipient' => self::XRPL_ACCOUNT, 'dest_tag' => 1, 'asset_amount' => 1]);
    }

    /** @dataProvider networks */
    public function testBitcoin(string $net): void
    {
        $adapter = new Bitcoin($net, CryptoPayConfig::DEFAULT_ENDPOINTS['bitcoin'][$net], $this->http, new SpotPrice($this->http));
        $this->assertScan("bitcoin/$net", $adapter, ['recipient' => self::BTC_ADDRESS[$net], 'asset_amount' => 1, 'created_at' => time()]);
    }

    public function testWrongNetworkEndpointsAreRefusedLive(): void
    {
        $prices = new SpotPrice($this->http);
        $this->assertNull((new Xrpl('mainnet', CryptoPayConfig::DEFAULT_ENDPOINTS['xrpl']['testnet'], $this->http, $prices))->cursor(), 'XRPL testnet server on a mainnet setting');
        $this->assertNull((new Xrpl('testnet', CryptoPayConfig::DEFAULT_ENDPOINTS['xrpl']['mainnet'], $this->http, $prices))->cursor(), 'XRPL mainnet server on a testnet setting');
        $this->assertNull((new Bitcoin('mainnet', CryptoPayConfig::DEFAULT_ENDPOINTS['bitcoin']['testnet'], $this->http, $prices))->cursor(), 'Bitcoin testnet4 on a mainnet setting');
        $this->assertNull((new EvmUsdc('base', 8453, CryptoPayConfig::USDC['base']['mainnet'], CryptoPayConfig::DEFAULT_ENDPOINTS['base']['testnet'], $this->http, 1))->cursor(), 'Base Sepolia RPC on a Base mainnet setting');
        self::report('wrong-network endpoints refused: xrpl both ways, bitcoin, base');
    }

    public function testSpotPrices(): void
    {
        $prices = new SpotPrice($this->http);
        foreach (['BTC', 'XRP'] as $asset) {
            $usd = $prices->usd($asset);
            self::report(sprintf('price %-4s %s USD', $asset, $usd ?? 'NONE'));
            $this->assertNotNull($usd, $asset . ' price from the public tickers');
            $this->assertGreaterThan(0, (float) $usd);
        }
    }

    public function testSolanaDevnet(): void
    {
        $r = $this->http->postJson('https://api.devnet.solana.com', ['jsonrpc' => '2.0', 'id' => 1, 'method' => 'getGenesisHash', 'params' => []]);
        self::report('solana/devnet genesis ' . (($r['result'] ?? null) === self::SOLANA_DEVNET_GENESIS ? 'ok' : 'MISMATCH'));
        $this->assertSame(self::SOLANA_DEVNET_GENESIS, $r['result'] ?? null);
    }
}
