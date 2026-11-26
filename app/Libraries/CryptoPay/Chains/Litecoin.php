<?php

declare(strict_types=1);

namespace App\Libraries\CryptoPay\Chains;

use App\Libraries\CryptoPay\Http;
use App\Libraries\CryptoPay\SpotPrice;

/**
 * Litecoin (LTC) to MyMI's address, read through Esplora / Blockchair APIs.
 * Matched by dedicated address pool or exact amount tag (sats / litoshis).
 */
final class Litecoin implements ChainAdapter
{
    /** @param list<string> $endpoints API bases (e.g. https://litecoinspace.org/api) */
    public function __construct(
        private string $network,
        private array $endpoints,
        private Http $http,
        private ?SpotPrice $prices = null,
    ) {
    }

    public function chain(): string
    {
        return 'litecoin';
    }

    public function asset(): string
    {
        return 'LTC';
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
        return 999;
    }

    public function amountStep(): int
    {
        return 1000;
    }

    public function validAddress(string $address): bool
    {
        $a = trim($address);
        if ($this->network === 'testnet') {
            return (bool) preg_match('/^(tltc1[qpzry9x8gf2tvdw0s3jn54khce6mua7l]{38,87}|[mn2][a-km-zA-HJ-NP-Z1-9]{26,34})$/', $a);
        }

        // Mainnet: LTC Bech32 (ltc1...) or Base58 (L... or M...)
        return (bool) preg_match('/^(ltc1[qpzry9x8gf2tvdw0s3jn54khce6mua7l]{38,87}|[LM3][a-km-zA-HJ-NP-Z1-9]{26,34})$/', $a);
    }

    public function quote(int $cents): ?array
    {
        if ($this->prices !== null) {
            $quote = $this->prices->quote('LTC', $cents);
            if ($quote !== null) {
                return $quote;
            }
        }
        return ['amount' => $cents * 100_000, 'rate' => '100.00'];
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
        return "litecoin:{$row['recipient']}?amount={$amount}";
    }
}
