<?php

declare(strict_types=1);

namespace App\Libraries\CryptoPay;

/**
 * USD spot price of BTC or XRP from public exchange tickers, tried in order.
 * When two sources answer they must agree within $maxSpread, or no price is
 * given (checkout says "price unavailable" rather than charge a wrong amount).
 * One answering source is enough, so one exchange being down does not stop
 * checkout.
 */
final class SpotPrice
{
    /** @var array<string, string> */
    private array $cache = [];

    public function __construct(private Http $http, private float $maxSpread = 0.03)
    {
    }

    /** USD per coin as a decimal string, or null. */
    public function usd(string $asset): ?string
    {
        $asset = strtoupper($asset);
        if (isset($this->cache[$asset])) {
            return $this->cache[$asset];
        }
        $prices = [];
        foreach ($this->sources($asset) as $source) {
            $p = $source();
            if ($p !== null && $p > 0) {
                $prices[] = $p;
            }
            if (count($prices) === 2) {
                break;
            }
        }
        if ($prices === []) {
            return null;
        }
        if (count($prices) === 2 && abs($prices[0] - $prices[1]) / min($prices) > $this->maxSpread) {
            log_message('warning', 'Crypto checkout: {asset} price sources disagree ({a} vs {b}); no quote', ['asset' => $asset, 'a' => $prices[0], 'b' => $prices[1]]);
            return null;
        }
        // Of two answers, quote the lower price: the buyer pays more coins, never less than the price.
        $price = min($prices);
        return $this->cache[$asset] = rtrim(rtrim(number_format($price, 8, '.', ''), '0'), '.');
    }

    /** @return list<callable(): ?float> */
    private function sources(string $asset): array
    {
        $kraken = ['BTC' => 'XBTUSD', 'XRP' => 'XRPUSD'][$asset] ?? null;
        $bitstamp = ['BTC' => 'btcusd', 'XRP' => 'xrpusd'][$asset] ?? null;
        if ($kraken === null) {
            return [];
        }
        return [
            fn (): ?float => self::num(json_decode((string) $this->http->get('https://api.coinbase.com/v2/prices/' . $asset . '-USD/spot'), true)['data']['amount'] ?? null),
            function () use ($kraken): ?float {
                $r = json_decode((string) $this->http->get('https://api.kraken.com/0/public/Ticker?pair=' . $kraken), true);
                $first = is_array($r['result'] ?? null) ? reset($r['result']) : null;
                return self::num(is_array($first) ? ($first['c'][0] ?? null) : null);
            },
            fn (): ?float => self::num(json_decode((string) $this->http->get('https://www.bitstamp.net/api/v2/ticker/' . $bitstamp . '/'), true)['last'] ?? null),
        ];
    }

    private static function num(mixed $v): ?float
    {
        return is_numeric($v) ? (float) $v : null;
    }
}
