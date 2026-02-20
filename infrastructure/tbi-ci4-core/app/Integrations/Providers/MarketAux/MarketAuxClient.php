<?php

declare(strict_types=1);

namespace App\Integrations\Providers\MarketAux;

use App\Integrations\Contracts\ProviderInterface;
use App\Services\CacheService;
use App\Services\RateLimiter;
use Psr\Log\LoggerInterface;

class MarketAuxClient implements ProviderInterface
{
    public function __construct(
        private readonly MarketAuxConfig $config,
        private readonly object $httpClient,
        private readonly CacheService $cache,
        private readonly LoggerInterface $logger,
        private readonly RateLimiter $rateLimiter,
    ) {
    }

    public function getName(): string
    {
        return 'marketaux';
    }

    public function latestNews(array $symbols): array
    {
        return $this->cache->remember('marketaux:news:' . md5(json_encode($symbols)), $this->config->cacheTtl, function () use ($symbols) {
            if (! $this->rateLimiter->allow('marketaux', 10, 60)) {
                return ['ok' => false, 'error' => 'Rate limited'];
            }

            $response = $this->httpClient->get($this->config->baseUrl . '/api/v1/news/all', [
                'query' => [
                    'api_token' => $this->config->apiToken,
                    'symbols' => implode(',', $symbols),
                    'language' => 'en',
                ],
            ]);

            return json_decode((string) $response->getBody(), true) ?: [];
        });
    }

    public function healthcheck(): array
    {
        return ['ok' => $this->config->apiToken !== '', 'provider' => $this->getName()];
    }
}
