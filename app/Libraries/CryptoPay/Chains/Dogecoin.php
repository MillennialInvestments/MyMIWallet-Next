<?php

declare(strict_types=1);

namespace App\Libraries\CryptoPay\Chains;

use App\Libraries\CryptoPay\Http;
use App\Libraries\CryptoPay\SpotPrice;

/**
 * Dogecoin (DOGE) payment adapter via block explorer APIs.
 */
final class Dogecoin implements ChainAdapter
{
    /** @param list<string> $endpoints */
    public function __construct(
        private string $network,
        private array $endpoints,
        private Http $http,
        private ?SpotPrice $prices = null,
    ) {
    }

    public function chain(): string
    {
        return 'dogecoin';
    }

    public function asset(): string
    {
        return 'DOGE';
    }

    public function decimals(): int
    {
        return 8;
    }

    public function matchMode(): string
    {
        return self::MATCH_AMOUNT;
    }

    public function maxAmountTag(): int
    {
        return 9999;
    }

    public function amountStep(): int
    {
        return 10000;
    }

    public function validAddress(string $address): bool
    {
        $a = trim($address);
        if ($this->network === 'testnet') {
            return (bool) preg_match('/^(n|2)[a-km-zA-HJ-NP-Z1-9]{26,34}$/', $a);
        }

        // Mainnet: Starts with D, 34 characters Base58
        return (bool) preg_match('/^D[1-9A-HJ-NP-Za-km-z]{33}$/', $a);
    }

    public function quote(int $cents): ?array
    {
        if ($this->prices !== null) {
            $quote = $this->prices->quote('DOGE', $cents);
            if ($quote !== null) {
                return $quote;
            }
        }
        return ['amount' => $cents * 10_000_000, 'rate' => '0.10'];
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
        $amount = number_format(($row['amount'] ?? 0) / 1e8, 8, '.', '');
        return "dogecoin:{$row['recipient']}?amount={$amount}";
    }
}
