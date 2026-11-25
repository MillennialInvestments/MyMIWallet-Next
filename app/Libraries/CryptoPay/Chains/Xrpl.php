<?php

declare(strict_types=1);

namespace App\Libraries\CryptoPay\Chains;

use App\Libraries\CryptoPay\Http;
use App\Libraries\CryptoPay\SpotPrice;

/**
 * XRP on the XRP Ledger. Each checkout gets its own destination tag; a
 * payment counts when it is validated, succeeded, carries that tag and
 * delivered at least the quoted XRP. The delivered amount (meta) is used,
 * never the requested Amount, so a partial payment cannot pass as full.
 */
final class Xrpl implements ChainAdapter
{
    private const PAGES = 5;
    /** Seconds between the Unix epoch and the XRP Ledger epoch (2000-01-01). */
    private const RIPPLE_EPOCH = 946684800;
    /** Mainnet passed this ledger long ago; the test networks reset and stay far below it. */
    private const MAINNET_MIN_LEDGER = 80000000;

    /** @var array<string, true> endpoints that proved they are on the configured network */
    private array $verified = [];

    /** @param list<string> $endpoints */
    public function __construct(
        private string $network,
        private array $endpoints,
        private Http $http,
        private SpotPrice $prices,
    ) {
    }

    public function chain(): string
    {
        return 'xrpl';
    }

    public function asset(): string
    {
        return 'XRP';
    }

    public function decimals(): int
    {
        return 6; // drops
    }

    public function matchMode(): string
    {
        return self::MATCH_TAG;
    }

    public function maxAmountTag(): int
    {
        return 0;
    }

    public function amountStep(): int
    {
        return 1;
    }

    public function validAddress(string $address): bool
    {
        return (bool) preg_match('/^r[1-9A-HJ-NP-Za-km-z]{24,34}$/', $address);
    }

    public function quote(int $cents): ?array
    {
        $usd = $this->prices->usd('XRP');
        if ($usd === null || (float) $usd <= 0) {
            return null;
        }
        return ['amount' => (int) ceil($cents * 10000 / (float) $usd), 'rate' => $usd];
    }

    public function cursor(): ?int
    {
        $r = $this->call('ledger', ['ledger_index' => 'validated']);
        return is_array($r) && is_numeric($r['ledger_index'] ?? null) ? (int) $r['ledger_index'] : null;
    }

    public function payments(array $row): array
    {
        $min = max((int) $row['start_cursor'], (int) ($row['scan_cursor'] ?? 0) + 1);
        $params = ['account' => (string) $row['recipient'], 'ledger_index_min' => $min, 'ledger_index_max' => -1, 'forward' => true, 'limit' => 200];
        $found = [];
        $lastLedger = null;
        for ($page = 0; $page < self::PAGES; $page++) {
            $r = $this->call('account_tx', $params);
            if (! is_array($r)) {
                return [$found, false, $this->fullyRead($lastLedger, $min)];
            }
            foreach ((array) ($r['transactions'] ?? []) as $entry) {
                $p = is_array($entry) ? $this->match($entry, $row) : null;
                if ($p !== null) {
                    $found[] = $p;
                }
                // API v2 puts ledger_index on the entry, API v1 inside tx.
                $ledger = is_array($entry) ? ($entry['ledger_index'] ?? $entry['tx']['ledger_index'] ?? null) : null;
                if (is_numeric($ledger)) {
                    $lastLedger = (int) $ledger;
                }
            }
            if (! isset($r['marker'])) {
                $scannedTo = is_numeric($r['ledger_index_max'] ?? null) ? (int) $r['ledger_index_max'] : null;
                return [$found, true, $scannedTo];
            }
            $params['marker'] = $r['marker'];
        }
        // Busier than one sweep reads (or flooded with tiny payments): keep the
        // ledgers read in full, so the next sweep moves on instead of re-reading them.
        return [$found, false, $this->fullyRead($lastLedger, $min)];
    }

    /** Reading forward, every ledger before the last one seen was read in full. */
    private function fullyRead(?int $lastLedger, int $min): ?int
    {
        return $lastLedger !== null && $lastLedger - 1 >= $min ? $lastLedger - 1 : null;
    }

    /** @return array{id: string, amount: int, payer: string, confirmations: int, time: ?int}|null */
    private function match(array $entry, array $row): ?array
    {
        $tx = is_array($entry['tx'] ?? null) ? $entry['tx'] : (is_array($entry['tx_json'] ?? null) ? $entry['tx_json'] : null);
        $meta = is_array($entry['meta'] ?? null) ? $entry['meta'] : null;
        if ($tx === null || $meta === null || empty($entry['validated'])) {
            return null;
        }
        $hash = strtoupper((string) ($entry['hash'] ?? $tx['hash'] ?? ''));
        $delivered = $meta['delivered_amount'] ?? $meta['DeliveredAmount'] ?? null;
        if (($tx['TransactionType'] ?? '') !== 'Payment'
            || ($tx['Destination'] ?? '') !== $row['recipient']
            || ! isset($tx['DestinationTag']) || (int) $tx['DestinationTag'] !== (int) $row['dest_tag']
            || ($meta['TransactionResult'] ?? '') !== 'tesSUCCESS'
            || ! is_string($delivered) || ! ctype_digit($delivered) // an object is a token, not XRP
            || (int) $delivered < (int) $row['asset_amount']
            || ! preg_match('/^[0-9A-F]{64}$/', $hash)) {
            return null;
        }
        $time = null;
        if (is_numeric($tx['date'] ?? null)) {
            $time = (int) $tx['date'] + self::RIPPLE_EPOCH;
        } elseif (is_string($entry['close_time_iso'] ?? null) && strtotime($entry['close_time_iso']) !== false) {
            $time = (int) strtotime($entry['close_time_iso']);
        }
        return ['id' => 'xrpl:' . $hash, 'amount' => (int) $delivered, 'payer' => (string) ($tx['Account'] ?? ''), 'confirmations' => 1, 'time' => $time];
    }

    public function paymentUri(array $row): string
    {
        $xrp = rtrim(rtrim(number_format(((int) $row['asset_amount']) / 1e6, 6, '.', ''), '0'), '.');
        return $row['recipient'] . '?dt=' . (int) $row['dest_tag'] . '&amount=' . $xrp;
    }

    private function call(string $method, array $params): ?array
    {
        foreach ($this->endpoints as $url) {
            if (! $this->onNetwork($url)) {
                continue;
            }
            $result = $this->callAt($url, $method, $params);
            if ($result !== null) {
                return $result;
            }
        }
        return null;
    }

    private function callAt(string $url, string $method, array $params): ?array
    {
        // rippled wants an object here: an empty PHP array would encode as [] and be refused.
        $json = $this->http->postJson($url, ['method' => $method, 'params' => [$params === [] ? new \stdClass() : $params]]);
        $result = $json['result'] ?? null;
        return is_array($result) && ($result['status'] ?? '') === 'success' ? $result : null;
    }

    /**
     * Addresses look the same on mainnet and the test networks, so an endpoint
     * is used only after server_info shows it is on the configured network:
     * mainnet reports network id 0 (or none) and a ledger far past any test
     * network; Testnet and Devnet report their own id (1, 2).
     */
    private function onNetwork(string $url): bool
    {
        if (isset($this->verified[$url])) {
            return true;
        }
        $info = $this->callAt($url, 'server_info', [])['info'] ?? null;
        if (! is_array($info)) {
            return false;
        }
        $id = (int) ($info['network_id'] ?? 0);
        $seq = (int) ($info['validated_ledger']['seq'] ?? 0);
        $ok = $this->network === 'mainnet' ? ($id === 0 && $seq >= self::MAINNET_MIN_LEDGER) : $id > 0;
        if (! $ok) {
            log_message('error', 'Crypto checkout: XRPL endpoint {url} is not on {net} (network_id {id}); not used', ['url' => parse_url($url, PHP_URL_HOST), 'net' => $this->network, 'id' => $id]);
            return false;
        }
        $this->verified[$url] = true;
        return true;
    }
}
