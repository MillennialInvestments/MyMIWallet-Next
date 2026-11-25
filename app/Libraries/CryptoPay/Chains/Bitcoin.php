<?php

declare(strict_types=1);

namespace App\Libraries\CryptoPay\Chains;

use App\Libraries\CryptoPay\Http;
use App\Libraries\CryptoPay\SpotPrice;

/**
 * BTC to MyMI's address, read through Esplora-compatible APIs (mempool.space,
 * Blockstream, or a self-hosted electrs/esplora listed first in .env). A
 * checkout is matched by an output of exactly its amount: the price in sats
 * rounded to 100, plus a per-checkout tag of 1-99 sats.
 */
final class Bitcoin implements ChainAdapter
{
    private const PAGES = 5;

    /** @param list<string> $endpoints Esplora API bases, e.g. https://mempool.space/testnet4/api */
    public function __construct(
        private string $network,
        private array $endpoints,
        private Http $http,
        private SpotPrice $prices,
    ) {
    }

    public function chain(): string
    {
        return 'bitcoin';
    }

    public function asset(): string
    {
        return 'BTC';
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
        return 99;
    }

    public function amountStep(): int
    {
        return 100;
    }

    public function validAddress(string $address): bool
    {
        $b58 = '[1-9A-HJ-NP-Za-km-z]{25,34}';
        $b32 = '[02-9ac-hj-np-z]{11,71}';
        return $this->network === 'mainnet'
            ? (bool) preg_match('/^(bc1' . $b32 . '|[13]' . $b58 . ')$/', $address)
            : (bool) preg_match('/^(tb1' . $b32 . '|[mn2]' . $b58 . ')$/', $address);
    }

    public function quote(int $cents): ?array
    {
        $usd = $this->prices->usd('BTC');
        if ($usd === null || (float) $usd <= 0) {
            return null;
        }
        return ['amount' => (int) ceil($cents * 1000000 / (float) $usd), 'rate' => $usd];
    }

    public function cursor(): ?int
    {
        $h = $this->get('/blocks/tip/height');
        return $h !== null && ctype_digit(trim($h)) ? (int) trim($h) : null;
    }

    public function payments(array $row): array
    {
        $tip = $this->cursor();
        if ($tip === null) {
            return [[], false, null];
        }
        $address = (string) $row['recipient'];
        $notBefore = (int) $row['created_at'] - 120;
        $found = [];
        $path = '/address/' . rawurlencode($address) . '/txs';
        for ($page = 0; $page < self::PAGES; $page++) {
            $body = $this->get($path);
            $txs = $body === null ? null : json_decode($body, true);
            if (! is_array($txs)) {
                return [$found, false, null];
            }
            $lastConfirmed = null;
            $older = false;
            $confirmedCount = 0;
            foreach ($txs as $tx) {
                if (! is_array($tx)) {
                    continue;
                }
                $confirmed = ! empty($tx['status']['confirmed']);
                if ($confirmed) {
                    $confirmedCount++;
                    $lastConfirmed = (string) ($tx['txid'] ?? '');
                    if ((int) ($tx['status']['block_time'] ?? 0) < $notBefore) {
                        $older = true;
                        continue;
                    }
                }
                foreach ($this->match($tx, $row, $tip) as $p) {
                    $found[] = $p;
                }
            }
            // Esplora pages confirmed history 25 at a time, newest first.
            if ($older || $confirmedCount < 25 || $lastConfirmed === null || $lastConfirmed === '') {
                return [$found, true, null];
            }
            $path = '/address/' . rawurlencode($address) . '/txs/chain/' . rawurlencode($lastConfirmed);
        }
        return [$found, false, null];
    }

    /** @return list<array{id: string, amount: int, payer: string, confirmations: int}> */
    private function match(array $tx, array $row, int $tip): array
    {
        $txid = strtolower((string) ($tx['txid'] ?? ''));
        if (! preg_match('/^[0-9a-f]{64}$/', $txid)) {
            return [];
        }
        $height = ! empty($tx['status']['confirmed']) ? (int) ($tx['status']['block_height'] ?? 0) : 0;
        $confirmations = $height > 0 ? max(0, $tip - $height + 1) : 0;
        $payer = (string) ($tx['vin'][0]['prevout']['scriptpubkey_address'] ?? '');
        $out = [];
        foreach ((array) ($tx['vout'] ?? []) as $i => $vout) {
            if (is_array($vout) && ($vout['scriptpubkey_address'] ?? '') === $row['recipient'] && (int) ($vout['value'] ?? -1) === (int) $row['asset_amount']) {
                $out[] = ['id' => 'bitcoin:' . $txid . ':' . $i, 'amount' => (int) $vout['value'], 'payer' => $payer, 'confirmations' => $confirmations];
            }
        }
        return $out;
    }

    public function paymentUri(array $row): string
    {
        $btc = rtrim(rtrim(number_format(((int) $row['asset_amount']) / 1e8, 8, '.', ''), '0'), '.');
        return 'bitcoin:' . $row['recipient'] . '?amount=' . $btc . '&label=' . rawurlencode('MyMI Wallet');
    }

    private function get(string $path): ?string
    {
        foreach ($this->endpoints as $base) {
            $body = $this->http->get(rtrim($base, '/') . $path);
            if ($body !== null) {
                return $body;
            }
        }
        return null;
    }
}
