<?php

declare(strict_types=1);

namespace App\Commands\Marketing\MarketFeed;

use App\Commands\SafeBaseCommand;
use App\Services\Marketing\MarketFeed\AlphaVantageNewsSentimentAdapter;
use App\Services\Marketing\MarketFeed\FederalReserveRssFixtureAdapter;
use App\Services\Marketing\MarketFeed\MarketFeedAdapterInterface;
use App\Services\Marketing\MarketFeed\MarketFeedSourceRegistryService;
use CodeIgniter\CLI\CLI;
use Config\MarketingMarketFeed;

final class Audit extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:market-feed:audit';
    protected $description =
        'Audit the disabled-by-default market-feed contract.';
    protected $aiOpsRunnable = true;

    public function run(array $params)
    {
        $this->parseParams($params);

        $config = new MarketingMarketFeed();
        $sources = (
            new MarketFeedSourceRegistryService()
        )->getAllSources();
        $failures = [];

        foreach (
            [
                'enabled',
                'live_network_enabled',
                'persist_enabled',
                'alpha_vantage_enabled',
            ] as $property
        ) {
            if ((bool) $config->{$property}) {
                $failures[] =
                    'Feature flag must remain disabled: '
                    . $property;
            }
        }

        $expected = [
            'alpha_vantage_news' => [
                'adapter' =>
                    AlphaVantageNewsSentimentAdapter::class,
                'network_required' => true,
            ],
            'federal_reserve_rss' => [
                'adapter' =>
                    FederalReserveRssFixtureAdapter::class,
                'network_required' => false,
            ],
        ];

        $keys = array_keys($sources);
        $sortedKeys = $keys;
        sort($sortedKeys, SORT_STRING);

        if (
            $keys !== $sortedKeys
            || count($keys) !== count(array_unique($keys))
        ) {
            $failures[] =
                'Registry keys are not uniquely sorted.';
        }

        foreach ($expected as $key => $expectation) {
            if (! isset($sources[$key])) {
                $failures[] =
                    'Expected source is missing: ' . $key;
            }
        }

        foreach ($sources as $key => $source) {
            if (! isset($expected[$key])) {
                $failures[] =
                    'Unexpected source registered: ' . $key;
                continue;
            }

            if (($source['source_key'] ?? null) !== $key) {
                $failures[] =
                    'Source-key mismatch: ' . $key;
            }

            if (
                trim(
                    (string) (
                        $source['source_name']
                        ?? ''
                    )
                ) === ''
            ) {
                $failures[] =
                    'Source name missing: ' . $key;
            }

            $adapterClass = (string) (
                $source['adapter_class']
                ?? ''
            );

            if (
                $adapterClass
                !== $expected[$key]['adapter']
            ) {
                $failures[] =
                    'Adapter mismatch: ' . $key;
            }

            if (
                ! is_a(
                    $adapterClass,
                    MarketFeedAdapterInterface::class,
                    true
                )
            ) {
                $failures[] =
                    'Adapter contract mismatch: ' . $key;
            }

            if (! empty($source['enabled'])) {
                $failures[] =
                    'Source unexpectedly enabled: ' . $key;
            }

            if (
                (bool) (
                    $source['network_required']
                    ?? false
                )
                !== $expected[$key]['network_required']
            ) {
                $failures[] =
                    'Network requirement mismatch: ' . $key;
            }

            $fixture = trim(
                (string) (
                    $source['fixture_path']
                    ?? ''
                )
            );
            $resolved = ROOTPATH
                . ltrim($fixture, '/\\');

            if (
                $fixture === ''
                || ! is_file($resolved)
            ) {
                $failures[] =
                    'Fixture missing: ' . $fixture;
            }
        }

        if ($failures !== []) {
            foreach ($failures as $failure) {
                CLI::error('STOP: ' . $failure);
            }

            CLI::error('STATUS: FAIL');

            return EXIT_ERROR;
        }

        CLI::write(
            'SOURCE_COUNT=' . count($sources)
        );
        CLI::write('STATUS: PASS', 'green');

        return EXIT_SUCCESS;
    }
}
