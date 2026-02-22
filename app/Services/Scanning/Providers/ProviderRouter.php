<?php

declare(strict_types=1);

namespace App\Services\Scanning\Providers;

use App\Services\Scanning\CacheLayer;
use App\Services\Scanning\RateLimiter;

class ProviderRouter
{
    /** @var list<MarketDataProviderInterface> */
    private array $providers;

    public function __construct(
        private readonly CacheLayer $cache,
        private readonly RateLimiter $rateLimiter,
        MarketDataProviderInterface ...$providers
    ) {
        $this->providers = $providers;
    }

    public function fetchCandles(string $symbol, string $timeframe, int $limit = 200): array
    {
        $cacheKey = $this->cache->key('scanner:ohlcv', [$symbol, $timeframe, $limit]);
        $cached = $this->cache->get($cacheKey);
        if (is_array($cached) && isset($cached['candles'])) {
            return $cached + ['provider' => (string) ($cached['provider'] ?? 'cache')];
        }

        foreach ($this->providers as $provider) {
            if (! $provider->isAvailable()) {
                continue;
            }
            $this->rateLimiter->throttle($provider->getName());
            try {
                $resp = $provider->fetchCandles($symbol, $timeframe, $limit);
            } catch (\Throwable $e) {
                log_message('warning', 'SCANNER: provider {p} failed for {s}: {m}', ['p' => $provider->getName(), 's' => $symbol, 'm' => $e->getMessage()]);
                continue;
            }

            if (($resp['status'] ?? 'error') === 'ok' && ! empty($resp['candles'])) {
                $resp['provider'] = $provider->getName();
                $this->cache->set($cacheKey, $resp, $this->cache->ttlForTimeframe($timeframe));
                return $resp;
            }
        }

        return ['status' => 'error', 'message' => 'No provider succeeded', 'candles' => [], 'provider' => 'none'];
    }

    public function health(): array
    {
        $status = [];
        foreach ($this->providers as $provider) {
            $status[$provider->getName()] = ['available' => $provider->isAvailable()];
        }
        return $status;
    }
}
