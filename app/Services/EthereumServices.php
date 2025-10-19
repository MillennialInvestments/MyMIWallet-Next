<?php

namespace App\Services;

use CodeIgniter\Cache\CacheInterface;
use Config\Services;
use Elliptic\EC;
use GuzzleHttp\Client;
use kornrunner\Keccak;

/**
 * Lightweight Ethereum helper mirroring SolanaService patterns.
 * Handles address normalization/validation and basic RPC calls
 * with caching/backoff.
 */
class EthereumServices
{
    private Client $client;
    private CacheInterface $cache;
    private array $rpcEndpoints = [];
    private int $httpTimeout = 10;

    public function __construct(?Client $client = null, ?CacheInterface $cache = null)
    {
        $primary  = getenv('ETH_RPC_PRIMARY') ?: 'https://mainnet.infura.io/v3/' . (getenv('INFURA_PROJECT_ID') ?: '');
        $fallback = getenv('ETH_RPC_FALLBACKS') ?: '';
        $endpoints = array_merge([$primary], array_map('trim', explode(',', $fallback)));
        $this->rpcEndpoints = array_values(array_filter(array_unique($endpoints)));

        $this->client = $client ?? new Client(['timeout' => $this->httpTimeout]);
        $this->cache  = $cache ?? Services::cache();
    }

    /** Core JSON-RPC caller with basic retries */
    private function rpc(string $method, array $params = [])
    {
        $payload = ['jsonrpc' => '2.0', 'id' => 1, 'method' => $method, 'params' => $params];
        $attemptsPerEndpoint = 2;
        $backoffUs = 250000; // 250ms
        $lastError = null;

        foreach ($this->rpcEndpoints as $url) {
            for ($i = 0; $i < $attemptsPerEndpoint; $i++) {
                try {
                    $resp = $this->client->post($url, ['json' => $payload]);
                    $json = json_decode($resp->getBody(), true);
                    if (!is_array($json)) {
                        throw new \RuntimeException('bad json');
                    }
                    if (isset($json['error'])) {
                        throw new \RuntimeException(json_encode($json['error']));
                    }
                    return $json['result'] ?? null;
                } catch (\Throwable $e) {
                    $lastError = $e;
                    usleep($backoffUs);
                }
            }
        }
        throw new \RuntimeException('Ethereum RPC failed for ' . $method . ': ' . ($lastError?->getMessage() ?? 'unknown'));
    }

    /**
     * Normalize a potential Ethereum address to checksum format.
     */
    public function normalizeAddress($maybe): ?string
    {
        if (!is_string($maybe)) {
            return null;
        }
        $maybe = trim($maybe);
        if ($maybe === '') {
            return null;
        }
        if (preg_match('/^0x[0-9a-fA-F]{40}$/', $maybe)) {
            return $this->toChecksum($maybe);
        }
        if (preg_match('/^[0-9a-fA-F]{40}$/', $maybe)) {
            return $this->toChecksum('0x' . $maybe);
        }
        return null;
    }

    /** Convert address to EIP-55 checksum */
    public function toChecksum(string $addr): string
    {
        $addr = strtolower(ltrim($addr, '0x'));
        $hash = Keccak::hash($addr, 256);
        $ret = '0x';
        for ($i = 0; $i < 40; $i++) {
            $ret .= (hexdec($hash[$i]) >= 8) ? strtoupper($addr[$i]) : $addr[$i];
        }
        return $ret;
    }

    public function isValidChecksum(string $addr): bool
    {
        return $this->normalizeAddress($addr) === $addr;
    }

    /** Get ETH balance (wei + ether) with 60s cache */
    public function getBalance(string $address): array
    {
        $normalized = $this->normalizeAddress($address);
        if (!$normalized) {
            return ['address' => null, 'wei' => 0, 'eth' => 0.0];
        }
        $cacheKey = 'eth_balance_' . $normalized;
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        if ($cached = $this->cache->get($cacheKeySanitized)) {
            return $cached;
        }
        try {
            $weiHex = $this->rpc('eth_getBalance', [$normalized, 'latest']);
            $wei = $weiHex ? hexdec($weiHex) : 0;
            $result = ['address' => $normalized, 'wei' => $wei, 'eth' => $wei / 1e18];
            $this->cache->save($cacheKeySanitized, $result, 60);
            return $result;
        } catch (\Throwable $e) {
            log_message('error', 'EthereumService::getBalance failed {addr}: {msg}', [
                'addr' => substr($normalized, 0, 6) . '…',
                'msg'  => $e->getMessage(),
            ]);
            return ['address' => $normalized, 'wei' => 0, 'eth' => 0.0];
        }
    }

    /** Placeholder transaction lookup - implement via provider or Etherscan */
    public function getTransactions(string $address, int $limit = 100): array
    {
        $normalized = $this->normalizeAddress($address);
        if (!$normalized) {
            return [];
        }
        // TODO: integrate real transaction lookup provider
        return [];
    }

    /**
     * Fetch ERC-20 token balance for an address.
     * Returns raw token units (caller must apply decimals).
     */
    public function tokenBalance(string $contract, string $address): float
    {
        $addr = $this->normalizeAddress($address);
        if (!$addr || !preg_match('/^0x[0-9a-fA-F]{40}$/', $contract)) {
            return 0.0;
        }
        $data = '0x70a08231' . str_pad(substr($addr, 2), 64, '0', STR_PAD_LEFT);
        try {
            $hex = $this->rpc('eth_call', [['to' => $this->toChecksum($contract), 'data' => $data], 'latest']);
            return $hex ? (float) hexdec($hex) : 0.0;
        } catch (\Throwable $e) {
            log_message('error', 'EthereumService::tokenBalance failed: {msg}', ['msg' => $e->getMessage()]);
            return 0.0;
        }
    }

    /**
     * Broadcast a pre-signed raw transaction to the network.
     */
    public function sendRawTransaction(string $signedHex): ?string
    {
        $signedHex = trim($signedHex);
        if ($signedHex === '' || !preg_match('/^0x[0-9a-fA-F]+$/', $signedHex)) {
            return null;
        }
        try {
            return $this->rpc('eth_sendRawTransaction', [$signedHex]);
        } catch (\Throwable $e) {
            log_message('error', 'EthereumService::sendRawTransaction failed: {msg}', ['msg' => $e->getMessage()]);
            return null;
        }
    }

    /** Generate new secp256k1 address and return checksum address */
    public function generateAddressForUser(int $userId): ?string
    {
        try {
            $ec = new EC('secp256k1');
            $kp = $ec->genKeyPair();
            $publicKey = $kp->getPublic(false, 'hex'); // uncompressed, 0x04 + X + Y
            $hash = Keccak::hash(substr($publicKey, 2), 256);
            $addr = '0x' . substr($hash, -40);
            return $this->toChecksum($addr);
        } catch (\Throwable $e) {
            log_message('error', 'EthereumService::generateAddressForUser failed: ' . $e->getMessage());
            return null;
        }
    }
}
?>