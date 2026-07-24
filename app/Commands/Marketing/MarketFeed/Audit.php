<?php

declare(strict_types=1);

namespace App\Commands\Marketing\MarketFeed;

use App\Commands\SafeBaseCommand;
use App\Services\Marketing\MarketFeed\FederalReserveRssFixtureAdapter;
use App\Services\Marketing\MarketFeed\MarketFeedSourceRegistryService;
use CodeIgniter\CLI\CLI;
use Config\MarketingMarketFeed;

final class Audit extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:market-feed:audit';
    protected $description = 'Audit the disabled-by-default market-feed contract.';
    protected $aiOpsRunnable = true;

    public function run(array $params)
    {
        $this->parseParams($params);

        $config = new MarketingMarketFeed();
        $sources = (new MarketFeedSourceRegistryService())->getAllSources();
        $failures = [];

        foreach (['enabled', 'live_network_enabled', 'persist_enabled'] as $property) {
            if ((bool) $config->{$property}) {
                $failures[] = 'Feature flag must remain disabled: ' . $property;
            }
        }

        $keys = array_keys($sources);
        $sortedKeys = $keys;
        sort($sortedKeys, SORT_STRING);

        if ($keys !== $sortedKeys || count($keys) !== count(array_unique($keys))) {
            $failures[] = 'Registry keys are not uniquely sorted.';
        }

        foreach ($sources as $key => $source) {
            if (($source['source_key'] ?? null) !== $key) {
                $failures[] = 'Source-key mismatch: ' . $key;
            }

            if (trim((string) ($source['source_name'] ?? '')) === '') {
                $failures[] = 'Source name missing: ' . $key;
            }

            if (($source['adapter_class'] ?? null) !== FederalReserveRssFixtureAdapter::class) {
                $failures[] = 'Adapter mismatch: ' . $key;
            }

            if (! empty($source['enabled'])) {
                $failures[] = 'Source unexpectedly enabled: ' . $key;
            }

            if (($source['network_required'] ?? null) !== false) {
                $failures[] = 'Source requires network: ' . $key;
            }

            $fixture = trim((string) ($source['fixture_path'] ?? ''));
            $resolved = ROOTPATH . ltrim($fixture, '/\\');

            if (! is_file($resolved)) {
                $failures[] = 'Fixture missing: ' . $fixture;
            }
        }

        if ($failures !== []) {
            foreach ($failures as $failure) {
                CLI::error('STOP: ' . $failure);
            }

            CLI::error('STATUS: FAIL');

            return EXIT_ERROR;
        }

        CLI::write('SOURCE_COUNT=' . count($sources));
        CLI::write('STATUS: PASS', 'green');

        return EXIT_SUCCESS;
    }
}
