<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Crypto checkout on chains other than Solana: USDC on Ethereum and Base,
 * XRP on the XRP Ledger and BTC on Bitcoin. Same products, prices and
 * fulfilment as Solana Pay (Config\SolanaPay::PURPOSES); the buyer pays from
 * their own wallet and MyMI never holds a key.
 *
 * The MyMI processing fee is part of the same payment (owner decision
 * 2026-11-25): price + fee, shown as two lines, paid in one transfer.
 *
 * Off until CRYPTO_PAY_ENABLED=true AND CRYPTO_PAY_NETWORK is set to exactly
 * "mainnet" or "testnet" (no default, so production can never quietly accept
 * test coins). A chain is offered only once its receiving address is set.
 */
class CryptoPay extends BaseConfig
{
    public const EVM_CHAINS = ['ethereum', 'base', 'polygon', 'arbitrum', 'optimism', 'avalanche', 'bsc'];
    public const CHAINS = ['ethereum', 'base', 'polygon', 'arbitrum', 'optimism', 'avalanche', 'bsc', 'xrpl', 'bitcoin'];

    /** Circle USDC contracts (6 decimals, except BSC which is 18 decimals). */
    public const USDC = [
        'ethereum'  => ['mainnet' => '0xa0b86991c6218b36c1d19d4a2e9eb0ce3606eb48', 'testnet' => '0x1c7d4b196cb0c7b01d743fbc6116a902379c7238'],
        'base'      => ['mainnet' => '0x833589fcd6edb6e08f4c7c32d4f71b54bda02913', 'testnet' => '0x036cbd53842c5426634e7929541ec2318f3dcf7e'],
        'polygon'   => ['mainnet' => '0x3c499c542cEF5E3811e1192ce70d8cC03d5c3359', 'testnet' => '0x41e94eb019c0762f9bfcf9fb1e58725bfb0e7582'],
        'arbitrum'  => ['mainnet' => '0xaf88d065e77c8cC2239327C5EDb3A432268e5831', 'testnet' => '0x75faf114eafb1BDbe2F0316DF893fd58CE46AA4d'],
        'optimism'  => ['mainnet' => '0x0b2c639c533813f4aa9d7837caf62653d097ff85', 'testnet' => '0x5fd84259d66Cd46123540766Be93DFE6D43130D7'],
        'avalanche' => ['mainnet' => '0xB97EF9Ef8734C71904D8002F8b6Bc66Dd9c48a6E', 'testnet' => '0x5425890298aed601595a70ab815c96711a31bc65'],
        'bsc'       => ['mainnet' => '0x8ac76a51cc950d9822d68b83fe1ad97b32cd580d', 'testnet' => '0x64544969ed7EBf5f083679233325356EbE738930'],
    ];
    /** EVM chain ids: mainnet / testnet */
    public const CHAIN_IDS = [
        'ethereum'  => ['mainnet' => 1, 'testnet' => 11155111],
        'base'      => ['mainnet' => 8453, 'testnet' => 84532],
        'polygon'   => ['mainnet' => 137, 'testnet' => 80002],
        'arbitrum'  => ['mainnet' => 42161, 'testnet' => 421614],
        'optimism'  => ['mainnet' => 10, 'testnet' => 11155420],
        'avalanche' => ['mainnet' => 43114, 'testnet' => 43113],
        'bsc'       => ['mainnet' => 56, 'testnet' => 97],
    ];
    /** Token decimals per chain (Circle native is 6, BSC Binance-Peg is 18). */
    public const DECIMALS = [
        'ethereum'  => 6,
        'base'      => 6,
        'polygon'   => 6,
        'arbitrum'  => 6,
        'optimism'  => 6,
        'avalanche' => 6,
        'bsc'       => 18,
    ];
    /** Public endpoints used when none are configured; add a self-hosted one first in .env. */
    public const DEFAULT_ENDPOINTS = [
        'ethereum'  => ['mainnet' => ['https://ethereum-rpc.publicnode.com', 'https://eth.llamarpc.com'], 'testnet' => ['https://ethereum-sepolia-rpc.publicnode.com']],
        'base'      => ['mainnet' => ['https://mainnet.base.org', 'https://base-rpc.publicnode.com'], 'testnet' => ['https://sepolia.base.org', 'https://base-sepolia-rpc.publicnode.com']],
        'polygon'   => ['mainnet' => ['https://polygon-rpc.com', 'https://polygon-bor-rpc.publicnode.com'], 'testnet' => ['https://rpc-amoy.polygon.technology']],
        'arbitrum'  => ['mainnet' => ['https://arb1.arbitrum.io/rpc', 'https://arbitrum-one-rpc.publicnode.com'], 'testnet' => ['https://sepolia-rollup.arbitrum.io/rpc']],
        'optimism'  => ['mainnet' => ['https://mainnet.optimism.io', 'https://optimism-rpc.publicnode.com'], 'testnet' => ['https://sepolia.optimism.io']],
        'avalanche' => ['mainnet' => ['https://api.avax.network/ext/bc/C/rpc', 'https://avalanche-c-chain-rpc.publicnode.com'], 'testnet' => ['https://api.avax-test.network/ext/bc/C/rpc']],
        'bsc'       => ['mainnet' => ['https://bsc-dataseed.binance.org', 'https://bsc-rpc.publicnode.com'], 'testnet' => ['https://data-seed-prebsc-1-s1.binance.org:8545']],
        'xrpl'      => ['mainnet' => ['https://xrplcluster.com', 'https://s1.ripple.com:51234'], 'testnet' => ['https://s.altnet.rippletest.net:51234']],
        'bitcoin'   => ['mainnet' => ['https://mempool.space/api', 'https://blockstream.info/api'], 'testnet' => ['https://mempool.space/testnet4/api']],
    ];
    /** Confirmations required before an order is delivered. */
    public const DEFAULT_CONFIRMATIONS = [
        'ethereum'  => ['mainnet' => 3, 'testnet' => 1],
        'base'      => ['mainnet' => 5, 'testnet' => 1],
        'polygon'   => ['mainnet' => 5, 'testnet' => 1],
        'arbitrum'  => ['mainnet' => 5, 'testnet' => 1],
        'optimism'  => ['mainnet' => 5, 'testnet' => 1],
        'avalanche' => ['mainnet' => 3, 'testnet' => 1],
        'bsc'       => ['mainnet' => 5, 'testnet' => 1],
        'xrpl'      => ['mainnet' => 1, 'testnet' => 1], // a validated ledger is final
        'bitcoin'   => ['mainnet' => 2, 'testnet' => 1],
    ];

    public bool $enabled = false;
    /** 'mainnet' or 'testnet'; anything else keeps crypto checkout off. */
    public string $network = '';
    /** @var array<string, string> chain => receiving address (public, never a key) */
    public array $recipients = [];
    /** @var array<string, list<string>> chain => endpoints tried in order */
    public array $endpoints = [];
    /** @var array<string, int> */
    public array $confirmations = [];
    /** @var array<string, int> chain => MyMI processing fee in US cents, added to the price */
    public array $feeCents = [];
    public int $requestTtlSeconds = 900;
    public int $minCents = 100;
    public int $maxCents = 1000000;
    /** Spot price sources for XRP and BTC, tried in order; two that answer must agree within this. */
    public float $maxPriceSpread = 0.03;

    public function __construct()
    {
        parent::__construct();
        $this->enabled = filter_var(env('CRYPTO_PAY_ENABLED', false), FILTER_VALIDATE_BOOLEAN);
        $network = strtolower(trim((string) env('CRYPTO_PAY_NETWORK', '')));
        $this->network = in_array($network, ['mainnet', 'testnet'], true) ? $network : '';
        $this->requestTtlSeconds = (int) env('CRYPTO_PAY_TTL_SECONDS', $this->requestTtlSeconds);
        $defaultFee = max(0, (int) env('CRYPTO_PAY_FEE_CENTS', 0));
        $evm = trim((string) env('CRYPTO_PAY_EVM_RECIPIENT', ''));

        foreach (self::CHAINS as $chain) {
            $key = strtoupper($chain);
            $address = trim((string) env('CRYPTO_PAY_' . $key . '_RECIPIENT', ''));
            if ($address === '' && in_array($chain, self::EVM_CHAINS, true)) {
                $address = $evm;
            }
            $this->recipients[$chain] = $address;
            $urls = array_values(array_filter(array_map('trim', explode(',', (string) env('CRYPTO_PAY_' . $key . '_RPC', '')))));
            $this->endpoints[$chain] = $urls !== [] || $this->network === '' ? $urls : self::DEFAULT_ENDPOINTS[$chain][$this->network];
            $this->confirmations[$chain] = max(1, (int) env('CRYPTO_PAY_' . $key . '_CONFIRMATIONS', $this->network === '' ? 1 : self::DEFAULT_CONFIRMATIONS[$chain][$this->network]));
            if ($chain === 'xrpl') {
                $this->confirmations[$chain] = 1; // a validated ledger is final; the adapter reports 1
            }
            $this->feeCents[$chain] = max(0, (int) env('CRYPTO_PAY_' . $key . '_FEE_CENTS', $defaultFee));
        }
    }

    public function ready(): bool
    {
        return $this->enabled && $this->network !== '' && $this->chains() !== [];
    }

    /** @return list<string> chains with a receiving address and at least one endpoint */
    public function chains(): array
    {
        if (! $this->enabled || $this->network === '') {
            return [];
        }
        return array_values(array_filter(self::CHAINS, fn (string $c): bool => ($this->recipients[$c] ?? '') !== '' && ($this->endpoints[$c] ?? []) !== []));
    }
}
