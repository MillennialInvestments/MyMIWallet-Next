<?php

declare(strict_types=1);

namespace Tests\Unit\CryptoPay;

use App\Libraries\CryptoPay\Chains\Bitcoin;
use App\Libraries\CryptoPay\Chains\EvmUsdc;
use App\Libraries\CryptoPay\CryptoPayAlerts;
use App\Libraries\CryptoPay\Http;
use App\Libraries\CryptoPay\SpotPrice;
use CodeIgniter\Test\CIUnitTestCase;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../../_support/bootstrap.php';
}

final class FallbackTestHttp implements Http
{
    /** @var array<string, callable(array): ?array> */
    public array $postHandlers = [];
    /** @var array<string, ?string> */
    public array $gets = [];
    /** @var list<string> */
    public array $calls = [];

    public function postJson(string $url, array $body): ?array
    {
        $method = $body['method'] ?? '';
        $this->calls[] = "POST {$url} {$method}";
        if (isset($this->postHandlers[$url])) {
            return ($this->postHandlers[$url])($body);
        }
        return null;
    }

    public function get(string $url): ?string
    {
        $this->calls[] = "GET {$url}";
        return $this->gets[$url] ?? null;
    }
}

final class KeyedRpcFallbackTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        CryptoPayAlerts::reset();
    }

    public function testEvmFallbackToSecondaryEndpointWhenPrimaryFails(): void
    {
        $http = new FallbackTestHttp();
        $primaryUrl = 'https://keyed-primary.rpc.test';
        $fallbackUrl = 'https://public-fallback.rpc.test';

        // Primary fails on eth_chainId / eth_blockNumber
        $http->postHandlers[$primaryUrl] = function (array $body) {
            return null; // Simulated failure/network refusal
        };

        // Fallback responds with Base Sepolia chainId 84532 (0x14a34)
        $http->postHandlers[$fallbackUrl] = function (array $body) {
            $method = $body['method'] ?? '';
            if ($method === 'eth_chainId') {
                return ['jsonrpc' => '2.0', 'id' => 1, 'result' => '0x14a34'];
            }
            if ($method === 'eth_blockNumber') {
                return ['jsonrpc' => '2.0', 'id' => 1, 'result' => '0x64']; // block 100
            }
            return null;
        };

        $adapter = new EvmUsdc(
            chain: 'base',
            chainId: 84532,
            usdc: '0x036cbd53842c5426634e7929541ec2318f3dcf7e',
            endpoints: [$primaryUrl, $fallbackUrl],
            http: $http,
            confirmations: 1
        );

        $cursor = $adapter->cursor();
        $this->assertSame(100, $cursor);
        $this->assertContains("POST {$primaryUrl} eth_chainId", $http->calls);
        $this->assertContains("POST {$fallbackUrl} eth_chainId", $http->calls);
    }

    public function testEvmRefusesWrongChainIdAndAlerts(): void
    {
        $http = new FallbackTestHttp();
        $badUrl = 'https://wrong-chain.rpc.test';
        $goodUrl = 'https://good-chain.rpc.test';

        // badUrl reports Ethereum Mainnet (1 = 0x1) instead of Sepolia 11155111
        $http->postHandlers[$badUrl] = function (array $body) {
            return ['jsonrpc' => '2.0', 'id' => 1, 'result' => '0x1'];
        };

        $http->postHandlers[$goodUrl] = function (array $body) {
            $method = $body['method'] ?? '';
            if ($method === 'eth_chainId') {
                return ['jsonrpc' => '2.0', 'id' => 1, 'result' => '0xaa36a7']; // 11155111
            }
            if ($method === 'eth_blockNumber') {
                return ['jsonrpc' => '2.0', 'id' => 1, 'result' => '0x100'];
            }
            return null;
        };

        $adapter = new EvmUsdc(
            chain: 'ethereum',
            chainId: 11155111,
            usdc: '0x1c7d4b196cb0c7b01d743fbc6116a902379c7238',
            endpoints: [$badUrl, $goodUrl],
            http: $http,
            confirmations: 1
        );

        $cursor = $adapter->cursor();
        $this->assertSame(256, $cursor);
        $this->assertNotEmpty(CryptoPayAlerts::$dispatched);
        $this->assertSame('Endpoint Refusal', CryptoPayAlerts::$dispatched[0]['title']);
    }

    public function testBitcoinFallbackWhenFirstEndpointFails(): void
    {
        $http = new FallbackTestHttp();
        $ep1 = 'https://primary.esplora.test/api';
        $ep2 = 'https://fallback.esplora.test/api';

        // ep1 returns empty / 404
        $http->gets["{$ep1}/block-height/0"] = null;

        // ep2 returns valid testnet4 genesis hash
        $genesis4 = '00000000da84f2bafbbc53dee25a72ae507ff4914b867c565be350b0da8bf043';
        $http->gets["{$ep2}/block-height/0"] = $genesis4;
        $http->gets["{$ep2}/blocks/tip/height"] = '85000';

        $prices = new SpotPrice($http, 0.05);
        $adapter = new Bitcoin(
            network: 'testnet',
            endpoints: [$ep1, $ep2],
            http: $http,
            prices: $prices
        );

        $cursor = $adapter->cursor();
        $this->assertSame(85000, $cursor);
    }
}
