<?php

declare(strict_types=1);

namespace App\Commands\Marketing\MarketFeed;

use App\Commands\SafeBaseCommand;
use App\Services\Marketing\MarketFeed\MarketFeedSourceRegistryService;
use CodeIgniter\CLI\CLI;
use Config\MarketingMarketFeed;

final class Health extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:market-feed:health';
    protected $description = 'Report market-feed feature and fixture readiness.';
    protected $aiOpsRunnable = true;

    public function run(array $params)
    {
        $this->parseParams($params);

        $config = new MarketingMarketFeed();
        $sources = (new MarketFeedSourceRegistryService())->getAllSources();

        CLI::write('COLLECTION_ENABLED=' . ($config->enabled ? 'true' : 'false'));
        CLI::write('LIVE_NETWORK_ENABLED=' . ($config->live_network_enabled ? 'true' : 'false'));
        CLI::write('PERSIST_ENABLED=' . ($config->persist_enabled ? 'true' : 'false'));
        CLI::write('SOURCE_COUNT=' . count($sources));

        $failures = [];

        if ($sources === []) {
            $failures[] = 'Source registry is empty.';
        }

        foreach ($sources as $source) {
            $fixture = trim((string) ($source['fixture_path'] ?? ''));

            if ($fixture === '') {
                continue;
            }

            $resolved = str_starts_with($fixture, DIRECTORY_SEPARATOR)
                ? $fixture
                : ROOTPATH . ltrim($fixture, '/\\');

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

        CLI::write('STATUS: PASS', 'green');

        return EXIT_SUCCESS;
    }
}
