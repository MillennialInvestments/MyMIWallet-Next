<?php

namespace App\Commands\Marketing\MarketFeed;

use App\Services\Marketing\MarketFeed\FederalReserveRssFixtureAdapter;
use App\Services\Marketing\MarketFeed\MarketFeedNormalizerService;
use App\Services\Marketing\MarketFeed\MarketFeedSourceRegistryService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

final class CollectDryRun extends BaseCommand
{
    protected $group = 'Marketing';

    protected $name =
        'marketing:market-feed:collect-dry-run';

    protected $description =
        'Normalize the local Federal Reserve RSS fixture without persistence.';

    public function run(array $params)
    {
        $sources = (
            new MarketFeedSourceRegistryService()
        )->getAllSources();

        $source = null;

        foreach ($sources as $candidate) {
            $adapterClass = (string) (
                $candidate['adapter_class'] ?? ''
            );

            if (str_contains(
                $adapterClass,
                'FederalReserveRssFixtureAdapter'
            )) {
                $source = $candidate;
                break;
            }
        }

        if (! is_array($source)) {
            CLI::error(
                'STOP: Federal Reserve fixture source missing.'
            );

            return EXIT_ERROR;
        }

        $sourceKey = (string) (
            $source['source_key'] ?? ''
        );

        $fixturePath = (string) (
            $source['fixture_path'] ?? ''
        );

        $resolvedPath = str_starts_with(
            $fixturePath,
            DIRECTORY_SEPARATOR
        )
            ? $fixturePath
            : ROOTPATH . ltrim(
                $fixturePath,
                '/\\'
            );

        if (! is_file($resolvedPath)) {
            CLI::error(
                'STOP: fixture missing: '
                . $fixturePath
            );

            return EXIT_ERROR;
        }

        $items = (
            new FederalReserveRssFixtureAdapter()
        )->parse($resolvedPath);

        $normalizer =
            new MarketFeedNormalizerService();

        CLI::write(
            'SOURCE_KEY=' . $sourceKey
        );
        CLI::write(
            'ITEM_COUNT=' . count($items)
        );

        foreach ($items as $item) {
            $item['collected_at'] =
                $item['published_at']
                ?? '1970-01-01 00:00:00';

            $normalized = $normalizer->normalize(
                $sourceKey,
                $item
            );

            CLI::write(sprintf(
                'ITEM identity_sha256=%s title="%s" canonical_url=%s',
                $normalized['identity_sha256'],
                str_replace(
                    '"',
                    '\"',
                    $normalized['title']
                ),
                (string) (
                    $normalized['canonical_url']
                    ?? ''
                )
            ));
        }

        CLI::write('STATUS: PASS', 'green');

        return EXIT_SUCCESS;
    }
}
