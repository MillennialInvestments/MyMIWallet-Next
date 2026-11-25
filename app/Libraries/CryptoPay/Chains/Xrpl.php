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

    /** @param list<string> $endpoints */
    public function __construct(
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
        $scannedTo = null;
        for ($page = 0; $page < self::PAGES; $page++) {
            $r = $this->call('account_tx', $params);
            if (! is_array($r)) {
                return [$found, false, null];
            }
            foreach ((array) ($r['transactions'] ?? []) as $entry) {
                $p = is_array($entry) ? $this->match($entry, $row) : null;
                if ($p !== null) {
                    $found[] = $p;
                }
            }
            if (! isset($r['marker'])) {
                $scannedTo = is_numeric($r['ledger_index_max'] ?? null) ? (int) $r['ledger_index_max'] : null;
                return [$found, true, $scannedTo];
            }
            $params['marker'] = $r['marker'];
        }
        return [$found, false, null]; // busier than one sweep reads; next sweep reads again
    }

    /** @return array{id: string, amount: int, payer: string, confirmations: int}|null */
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
        return ['id' => 'xrpl:' . $hash, 'amount' => (int) $delivered, 'payer' => (string) ($tx['Account'] ?? ''), 'confirmations' => 1];
    }

    public function paymentUri(array $row): string
    {
        $xrp = rtrim(rtrim(number_format(((int) $row['asset_amount']) / 1e6, 6, '.', ''), '0'), '.');
        return $row['recipient'] . '?dt=' . (int) $row['dest_tag'] . '&amount=' . $xrp;
    }

    private function call(string $method, array $params): ?array
    {
        foreach ($this->endpoints as $url) {
            $json = $this->http->postJson($url, ['method' => $method, 'params' => [$params]]);
            $result = $json['result'] ?? null;
            if (is_array($result) && ($result['status'] ?? '') === 'success') {
                return $result;
            }
        }
        return null;
    }
}
