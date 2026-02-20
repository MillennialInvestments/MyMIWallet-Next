<?php

declare(strict_types=1);

namespace App\Integrations\Providers\AlphaVantage;

use App\Integrations\Contracts\ProviderInterface;
use App\Services\CacheService;
use App\Services\RateLimiter;
use Psr\Log\LoggerInterface;

class AlphaVantageClient implements ProviderInterface
{
    public function __construct(
        private readonly AlphaVantageConfig $config,
        private readonly object $httpClient,
        private readonly CacheService $cache,
        private readonly LoggerInterface $logger,
        private readonly RateLimiter $rateLimiter,
    ) {
    }

    public function getName(): string
    {
        return 'alphavantage';
    }

    public function quote(string $symbol): array
    {
        return $this->cache->remember("alphavantage:quote:{$symbol}", $this->config->cacheTtl, function () use ($symbol) {
            if (! $this->rateLimiter->allow('alphavantage', 5, 60)) {
                return ['ok' => false, 'error' => 'Rate limited'];
            }

            $response = $this->httpClient->get($this->config->baseUrl . '/query', [
                'query' => [
                    'function' => 'GLOBAL_QUOTE',
                    'symbol' => $symbol,
                    'apikey' => $this->config->apiKey,
                ],
            ]);

            return json_decode((string) $response->getBody(), true) ?: [];
        });
    }

    public function healthcheck(): array
    {
        return ['ok' => $this->config->apiKey !== '', 'provider' => $this->getName()];
    }
}
