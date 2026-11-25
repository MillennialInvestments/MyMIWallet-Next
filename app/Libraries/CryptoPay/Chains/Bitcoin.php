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
    /** Genesis block hashes: mainnet, and the test networks (testnet4, testnet3, signet). */
    private const GENESIS = [
        'mainnet' => ['000000000019d6689c085ae165831e934ff763ae46a2a6c172b3f1b60a8ce26f'],
        'testnet' => [
            '00000000da84f2bafbbc53dee25a72ae507ff4914b867c565be350b0da8bf043',
            '000000000933ea01ad0ee984209779baaec3ced90fa3f408719526f8d77f4943',
            '00000008819873e925422c1ff0f99f7cc9bbb232af63a077a480a3633bee1ef6',
        ],
    ];

    /** @var array<string, true> endpoints whose genesis block matches the configured network */
    private array $verified = [];

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
        // Block height, not miner timestamps (which can be off by an hour or more).
        $startHeight = (int) $row['start_cursor'];
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
                    if ((int) ($tx['status']['block_height'] ?? 0) < $startHeight) {
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

    /** @return list<array{id: string, amount: int, payer: string, confirmations: int, time: ?int}> */
    private function match(array $tx, array $row, int $tip): array
    {
        $txid = strtolower((string) ($tx['txid'] ?? ''));
        if (! preg_match('/^[0-9a-f]{64}$/', $txid)) {
            return [];
        }
        $height = ! empty($tx['status']['confirmed']) ? (int) ($tx['status']['block_height'] ?? 0) : 0;
        $confirmations = $height > 0 ? max(0, $tip - $height + 1) : 0;
        $payer = (string) ($tx['vin'][0]['prevout']['scriptpubkey_address'] ?? '');
        $time = $height > 0 && is_numeric($tx['status']['block_time'] ?? null) ? (int) $tx['status']['block_time'] : null;
        $out = [];
        foreach ((array) ($tx['vout'] ?? []) as $i => $vout) {
            if (is_array($vout) && ($vout['scriptpubkey_address'] ?? '') === $row['recipient'] && (int) ($vout['value'] ?? -1) === (int) $row['asset_amount']) {
                $out[] = ['id' => 'bitcoin:' . $txid . ':' . $i, 'amount' => (int) $vout['value'], 'payer' => $payer, 'confirmations' => $confirmations, 'time' => $time];
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
            if (! $this->onNetwork($base)) {
                continue;
            }
            $body = $this->http->get(rtrim($base, '/') . $path);
            if ($body !== null) {
                return $body;
            }
        }
        return null;
    }

    /** An endpoint is used only after its genesis block shows it is on the configured network. */
    private function onNetwork(string $base): bool
    {
        if (isset($this->verified[$base])) {
            return true;
        }
        $hash = strtolower(trim((string) $this->http->get(rtrim($base, '/') . '/block-height/0')));
        if (! preg_match('/^[0-9a-f]{64}$/', $hash)) {
            return false;
        }
        if (! in_array($hash, self::GENESIS[$this->network] ?? [], true)) {
            log_message('error', 'Crypto checkout: Bitcoin endpoint {url} is not on {net}; not used', ['url' => parse_url($base, PHP_URL_HOST), 'net' => $this->network]);
            return false;
        }
        $this->verified[$base] = true;
        return true;
    }
}
