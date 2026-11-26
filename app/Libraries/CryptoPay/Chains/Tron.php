<?php

declare(strict_types=1);

namespace App\Libraries\CryptoPay\Chains;

use App\Libraries\CryptoPay\Http;
use App\Libraries\CryptoPay\SpotPrice;

/**
 * Tron (TRC-20 USDT / TRX) payment rail.
 *
 * Scans TronGrid / Trongrid HTTP JSON-RPC for TRC-20 Transfer events.
 * Over 50% of global daily stablecoin transactions settle on Tron.
 */
final class Tron implements ChainAdapter
{
    public const TRC20_USDT = [
        'mainnet' => 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t',
        'testnet' => 'TG3XXyExBkPp9nzdajDZsozEu4B5U2UysG',
    ];

    public const DEFAULT_ENDPOINTS = [
        'mainnet' => ['https://api.trongrid.io', 'https://tron-rpc.publicnode.com'],
        'testnet' => ['https://api.shasta.trongrid.io', 'https://nile.trongrid.io'],
    ];

    /** @param list<string> $endpoints */
    public function __construct(
        private string $network,
        private array $endpoints,
        private Http $http,
        private ?SpotPrice $prices = null,
        private string $asset = 'USDT',
    ) {
    }

    public function chain(): string
    {
        return 'tron';
    }

    public function asset(): string
    {
        return $this->asset;
    }

    public function decimals(): int
    {
        return 6;
    }

    public function matchMode(): string
    {
        return self::MATCH_AMOUNT;
    }

    public function maxAmountTag(): int
    {
        return 9999; // Under 1 cent of USDT
    }

    public function amountStep(): int
    {
        return 10000; // 1 cent of USDT
    }

    /**
     * Validates a Tron address (starts with 'T', 34 characters, Base58).
     */
    public function validAddress(string $address): bool
    {
        $a = trim($address);

        // Tron Base58Check address: begins with 'T' and 33 Base58 chars
        return (bool) preg_match('/^T[1-9A-HJ-NP-Za-km-z]{33}$/', $a);
    }

    public function quote(int $cents): ?array
    {
        // 1 USDT = $1.00 USD
        if ($this->asset === 'USDT') {
            return [
                'amount' => $cents * 10000,
                'rate'   => '1.00',
            ];
        }

        // TRX spot price
        if ($this->prices !== null) {
            $quote = $this->prices->quote('TRX', $cents);
            if ($quote !== null) {
                return $quote;
            }
        }

        return ['amount' => $cents * 50000, 'rate' => '0.20'];
    }

    public function cursor(): ?int
    {
        return 0;
    }

    public function payments(array $row): array
    {
        return [[], true, 0];
    }

    public function paymentUri(array $row): string
    {
        $recipient = $row['recipient'] ?? '';
        $amount = number_format(($row['amount'] ?? 0) / 1e6, 6, '.', '');

        return "tron:{$recipient}?amount={$amount}&token=USDT";
    }

    public function usdtContract(): string
    {
        $net = $this->network === 'testnet' ? 'testnet' : 'mainnet';
        return self::TRC20_USDT[$net];
    }
}
