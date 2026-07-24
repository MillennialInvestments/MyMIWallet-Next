<?php

namespace Tests\Unit\Marketing\MarketFeed;

use App\Services\Marketing\MarketFeed\FederalReserveRssFixtureAdapter;
use App\Services\Marketing\MarketFeed\MarketFeedSourceRegistryService;
use CodeIgniter\Test\CIUnitTestCase;

final class MarketFeedSourceRegistryServiceTest extends CIUnitTestCase
{
    public function testRegistryIsDeterministicAndSorted(): void
    {
        $service =
            new MarketFeedSourceRegistryService();

        $first = $service->getAllSources();
        $second = $service->getAllSources();

        $this->assertSame(
            $first,
            $second
        );

        $keys = array_keys($first);
        $sortedKeys = $keys;

        sort(
            $sortedKeys,
            SORT_STRING
        );

        $this->assertSame(
            $sortedKeys,
            $keys
        );

        $this->assertSame(
            count($keys),
            count(array_unique($keys))
        );
    }

    public function testFederalReserveFixtureContract(): void
    {
        $service =
            new MarketFeedSourceRegistryService();

        $source = $service->getSourceByKey(
            'federal_reserve_rss'
        );

        $this->assertIsArray($source);

        $this->assertSame(
            'federal_reserve_rss',
            $source['source_key']
        );

        $this->assertSame(
            'Federal Reserve RSS',
            $source['source_name']
        );

        $this->assertSame(
            FederalReserveRssFixtureAdapter::class,
            $source['adapter_class']
        );

        $this->assertFalse(
            (bool) $source['enabled']
        );

        $this->assertFalse(
            (bool) $source['network_required']
        );

        $this->assertStringEndsWith(
            'tests/Fixtures/Marketing/MarketFeed/'
            . 'federal-reserve-rss.xml',
            $source['fixture_path']
        );
    }
}
