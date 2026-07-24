<?php

declare(strict_types=1);

namespace App\Commands\Marketing\MarketFeed;

use App\Commands\SafeBaseCommand;
use App\Services\Marketing\MarketFeed\FederalReserveRssFixtureAdapter;
use App\Services\Marketing\MarketFeed\MarketFeedNormalizerService;
use App\Services\Marketing\MarketFeed\MarketFeedSourceRegistryService;
use CodeIgniter\CLI\CLI;

final class CollectDryRun extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:market-feed:collect-dry-run';
    protected $description = 'Normalize the local Federal Reserve RSS fixture without persistence.';
    protected $aiOpsRunnable = true;

    public function run(array $params)
    {
        $this->parseParams($params);

        $source = (new MarketFeedSourceRegistryService())->getSourceByKey('federal_reserve_rss');

        if (! is_array($source)) {
            CLI::error('STOP: Federal Reserve fixture source missing.');

            return EXIT_ERROR;
        }

        $sourceKey = (string) ($source['source_key'] ?? '');
        $fixturePath = (string) ($source['fixture_path'] ?? '');
        $resolvedPath = str_starts_with($fixturePath, DIRECTORY_SEPARATOR)
            ? $fixturePath
            : ROOTPATH . ltrim($fixturePath, '/\\');

        if (! is_file($resolvedPath)) {
            CLI::error('STOP: fixture missing: ' . $fixturePath);

            return EXIT_ERROR;
        }

        $items = (new FederalReserveRssFixtureAdapter())->parse($resolvedPath);
        $normalizer = new MarketFeedNormalizerService();

        CLI::write('SOURCE_KEY=' . $sourceKey);
        CLI::write('ITEM_COUNT=' . count($items));

        foreach ($items as $item) {
            $normalized = $normalizer->normalize($sourceKey, $item);

            CLI::write(sprintf(
                'ITEM identity_sha256=%s title="%s" canonical_url=%s',
                $normalized['identity_sha256'],
                str_replace('"', '\\"', $normalized['title']),
                (string) ($normalized['canonical_url'] ?? '')
            ));
        }

        CLI::write('STATUS: PASS', 'green');

        return EXIT_SUCCESS;
    }
}
