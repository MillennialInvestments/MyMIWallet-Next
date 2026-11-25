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
    public const CHAINS = ['ethereum', 'base', 'xrpl', 'bitcoin'];

    /** Circle USDC contracts (6 decimals). */
    public const USDC = [
        'ethereum' => ['mainnet' => '0xa0b86991c6218b36c1d19d4a2e9eb0ce3606eb48', 'testnet' => '0x1c7d4b196cb0c7b01d743fbc6116a902379c7238'],
        'base'     => ['mainnet' => '0x833589fcd6edb6e08f4c7c32d4f71b54bda02913', 'testnet' => '0x036cbd53842c5426634e7929541ec2318f3dcf7e'],
    ];
    /** EVM chain ids: mainnet / Sepolia, Base / Base Sepolia. */
    public const CHAIN_IDS = [
        'ethereum' => ['mainnet' => 1, 'testnet' => 11155111],
        'base'     => ['mainnet' => 8453, 'testnet' => 84532],
    ];
    /** Public endpoints used when none are configured; add a self-hosted one first in .env. */
    public const DEFAULT_ENDPOINTS = [
        'ethereum' => ['mainnet' => ['https://ethereum-rpc.publicnode.com', 'https://eth.llamarpc.com'], 'testnet' => ['https://ethereum-sepolia-rpc.publicnode.com']],
        'base'     => ['mainnet' => ['https://mainnet.base.org', 'https://base-rpc.publicnode.com'], 'testnet' => ['https://sepolia.base.org', 'https://base-sepolia-rpc.publicnode.com']],
        'xrpl'     => ['mainnet' => ['https://xrplcluster.com', 'https://s1.ripple.com:51234'], 'testnet' => ['https://s.altnet.rippletest.net:51234']],
        'bitcoin'  => ['mainnet' => ['https://mempool.space/api', 'https://blockstream.info/api'], 'testnet' => ['https://mempool.space/testnet4/api']],
    ];
    /** Confirmations required before an order is delivered. */
    public const DEFAULT_CONFIRMATIONS = [
        'ethereum' => ['mainnet' => 3, 'testnet' => 1],
        'base'     => ['mainnet' => 5, 'testnet' => 1],
        'xrpl'     => ['mainnet' => 1, 'testnet' => 1], // a validated ledger is final
        'bitcoin'  => ['mainnet' => 2, 'testnet' => 1],
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
            if ($address === '' && in_array($chain, ['ethereum', 'base'], true)) {
                $address = $evm;
            }
            $this->recipients[$chain] = $address;
            $urls = array_values(array_filter(array_map('trim', explode(',', (string) env('CRYPTO_PAY_' . $key . '_RPC', '')))));
            $this->endpoints[$chain] = $urls !== [] || $this->network === '' ? $urls : self::DEFAULT_ENDPOINTS[$chain][$this->network];
            $this->confirmations[$chain] = max(1, (int) env('CRYPTO_PAY_' . $key . '_CONFIRMATIONS', $this->network === '' ? 1 : self::DEFAULT_CONFIRMATIONS[$chain][$this->network]));
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
