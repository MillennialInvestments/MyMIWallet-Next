<?php

namespace App\Services\Marketing\MarketFeed;

final class MarketFeedSourceRegistryService
{
    private array $sources = [];

    public function __construct()
    {
        $this->loadSources();
    }

    private function loadSources(): void
    {
        $source = [
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
        ];

        $this->sources = [
            $source['source_key'] => $source,
        ];

        ksort(
            $this->sources,
            SORT_STRING
        );
    }

    public function getAllSources(): array
    {
        return $this->sources;
    }

    public function getSourceByKey(
        string $key
    ): ?array {
        return $this->sources[$key] ?? null;
    }
}
