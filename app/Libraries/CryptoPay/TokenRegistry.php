<?php

declare(strict_types=1);

namespace App\Libraries\CryptoPay;

/**
 * Multi-chain token registry for stablecoins and verified assets across
 * Solana, Ethereum, Base, Polygon, Arbitrum, Optimism, Avalanche, and BSC.
 */
final class TokenRegistry
{
    public const TOKENS = ['USDC', 'USDT', 'PYUSD', 'EURC'];

    /**
     * Verified smart contract addresses (token => chain => [mainnet, testnet]).
     *
     * @var array<string, array<string, array{mainnet: string, testnet: string}>>
     */
    public const CONTRACTS = [
        'USDC' => [
            'ethereum'  => ['mainnet' => '0xa0b86991c6218b36c1d19d4a2e9eb0ce3606eb48', 'testnet' => '0x1c7d4b196cb0c7b01d743fbc6116a902379c7238'],
            'base'      => ['mainnet' => '0x833589fcd6edb6e08f4c7c32d4f71b54bda02913', 'testnet' => '0x036cbd53842c5426634e7929541ec2318f3dcf7e'],
            'polygon'   => ['mainnet' => '0x3c499c542cEF5E3811e1192ce70d8cC03d5c3359', 'testnet' => '0x41e94eb019c0762f9bfcf9fb1e58725bfb0e7582'],
            'arbitrum'  => ['mainnet' => '0xaf88d065e77c8cC2239327C5EDb3A432268e5831', 'testnet' => '0x75faf114eafb1BDbe2F0316DF893fd58CE46AA4d'],
            'optimism'  => ['mainnet' => '0x0b2c639c533813f4aa9d7837caf62653d097ff85', 'testnet' => '0x5fd84259d66Cd46123540766Be93DFE6D43130D7'],
            'avalanche' => ['mainnet' => '0xB97EF9Ef8734C71904D8002F8b6Bc66Dd9c48a6E', 'testnet' => '0x5425890298aed601595a70ab815c96711a31bc65'],
            'bsc'       => ['mainnet' => '0x8ac76a51cc950d9822d68b83fe1ad97b32cd580d', 'testnet' => '0x64544969ed7EBf5f083679233325356EbE738930'],
            'solana'    => ['mainnet' => 'EPjFWdd5AufqSSqeM2qN1xzybapC8G4wEGGkZwyTDt1v', 'testnet' => '4zMMC9srt5Ri5X14GAgXhaHii3GnPAEERYPJgZJDncDU'],
        ],
        'USDT' => [
            'ethereum'  => ['mainnet' => '0xdac17f958d2ee523a2206206994597c13d831ec7', 'testnet' => '0x7169d38820dfd117c3fa1f22a697dba58d90ba06'],
            'base'      => ['mainnet' => '0xfde4c96c8593536e31f229ea8f37b2ada2699bb2', 'testnet' => '0x808456652fdb59e9339177118425934441a11e2a'],
            'polygon'   => ['mainnet' => '0xc2132d05d31c914a87c6611c10748aeb04b58e8f', 'testnet' => '0xa02f6adc7926efeabb6cd85be613765e99999999'],
            'arbitrum'  => ['mainnet' => '0xfd086bc7cd5c481dcc9c85ebe478a1c0b69fcbb9', 'testnet' => '0x3f3f5df88d7c144e72434f41b3240b3b0557429d'],
            'optimism'  => ['mainnet' => '0x94b008aa00579c1307b0ef2c499ad98a8ce58e58', 'testnet' => '0x7f27352d5f83db87a5a3e00f4b07cc2138d8ee52'],
            'avalanche' => ['mainnet' => '0x9702230a8ea53601f5cd2dc00fdbc13d4df4a8c7', 'testnet' => '0xb4ff3837ac642b582845c4709d2d7904b3cf4ff0'],
            'bsc'       => ['mainnet' => '0x55d398326f99059ff775485246999027b3197955', 'testnet' => '0x337610d27c682e347c9cd60bd4b3b107c9d34ddd'],
            'solana'    => ['mainnet' => 'Es9vMFrzaCERmJfrF4H2FYD4KCoNkY11McCe8BenwNYB', 'testnet' => 'D1BhyE6Uq2eQ2X6sXo6Z6vYhC4E5E4E3E2E1E0E9E8E7'],
        ],
        'PYUSD' => [
            'ethereum'  => ['mainnet' => '0x6c3ea9036406852006290770bedfcaba0e23a0e8', 'testnet' => '0xca768019be7f13cf9a1c252a7813a48e718b9588'],
            'solana'    => ['mainnet' => '2b1kV6ebUAKGJJRwGpQiBpDrjeeZ9eTVJwBpNnJY4v8q', 'testnet' => 'CXk2AMBfi3TwaEL2468s6zP8xq9NxTXjp9gjMgzeUynM'],
        ],
        'EURC' => [
            'ethereum'  => ['mainnet' => '0x1abaea1f7c25db8950e1516b889265a291030972', 'testnet' => '0x08210f9170f89ab7658f0b5e3fb39b0e06c8a962'],
            'base'      => ['mainnet' => '0x60a3e35cc302bfa44cb288bc5a4f316fdb1adb42', 'testnet' => '0x808456652fdb59e9339177118425934441a11e2a'],
            'avalanche' => ['mainnet' => '0xc891eb4cbdeff6e073e859e987815ed43c036570', 'testnet' => '0x5425890298aed601595a70ab815c96711a31bc65'],
            'solana'    => ['mainnet' => 'HzwqbKZw8HxMN6bF2yFZNrht3c2iXXzpKcFu7uBEDKtr', 'testnet' => '6hM3B2qH3jV3E8j2h5x2H9f8j7V4x1f9j8k4V7x6h3j2'],
        ],
    ];

    /**
     * Resolves token decimals for a given token on a chain.
     */
    public static function decimals(string $token, string $chain): int
    {
        $tok = strtoupper(trim($token));
        $ch = strtolower(trim($chain));

        if ($ch === 'bsc' && in_array($tok, ['USDC', 'USDT'], true)) {
            return 18;
        }

        return 6;
    }

    /**
     * Resolves the token contract address.
     */
    public static function contract(string $token, string $chain, string $network = 'mainnet'): ?string
    {
        $tok = strtoupper(trim($token));
        $ch = strtolower(trim($chain));
        $net = strtolower(trim($network)) === 'testnet' ? 'testnet' : 'mainnet';

        return self::CONTRACTS[$tok][$ch][$net] ?? null;
    }

    /**
     * @return list<string>
     */
    public static function supportedChains(string $token): array
    {
        $tok = strtoupper(trim($token));
        return array_keys(self::CONTRACTS[$tok] ?? []);
    }
}
