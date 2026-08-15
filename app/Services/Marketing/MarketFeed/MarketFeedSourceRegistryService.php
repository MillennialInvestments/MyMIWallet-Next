<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed;

final class MarketFeedSourceRegistryService
{
    private array $sources = [];

    public function __construct()
    {
        $this->loadSources();
    }

    public function getAllSources(): array
    {
        return $this->sources;
    }

    public function getSourceByKey(string $key): ?array
    {
        return $this->sources[$key] ?? null;
    }

    private function loadSources(): void
    {
        $sources = [
            [
                'source_key' => 'federal_reserve_rss',
                'source_name' => 'Federal Reserve RSS',
                'source_url' =>
                    'https://www.federalreserve.gov/',
                'fixture_path' =>
                    'tests/Fixtures/Marketing/MarketFeed/'
                    . 'federal-reserve-rss.xml',
                'adapter_class' =>
                    FederalReserveRssFixtureAdapter::class,
                'enabled' => false,
                'network_required' => false,
                'configuration' => [
                    'mode' => 'fixture_only',
                ],
            ],
            [
                'source_key' => 'alpha_vantage_news',
                'source_name' =>
                    'Alpha Vantage News Sentiment',
                'source_url' =>
                    'https://www.alphavantage.co/',
                'fixture_path' =>
                    'tests/Fixtures/Marketing/MarketFeed/'
                    . 'alpha-vantage-news-sentiment.json',
                'adapter_class' =>
                    AlphaVantageNewsSentimentAdapter::class,
                'enabled' => false,
                'network_required' => true,
                'configuration' => [
                    'mode' => 'fixture_only',
                    'function' => 'NEWS_SENTIMENT',
                    'bounded_transport_available' => true,
                    'live_provider_enabled_by_default' => false,
                ],
            ],
        ];

        foreach ($sources as $source) {
            $this->sources[
                (string) $source['source_key']
            ] = $source;
        }

        ksort($this->sources, SORT_STRING);
    }
}
