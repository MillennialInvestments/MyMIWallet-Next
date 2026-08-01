<?php

declare(strict_types=1);

namespace App\Commands\Marketing\MarketFeed;

use App\Commands\SafeBaseCommand;
use App\Services\Marketing\MarketFeed\MarketFeedAdapterInterface;
use App\Services\Marketing\MarketFeed\MarketFeedNormalizerService;
use App\Services\Marketing\MarketFeed\MarketFeedSourceRegistryService;
use CodeIgniter\CLI\CLI;
use Throwable;

final class CollectDryRun extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name =
        'marketing:market-feed:collect-dry-run';
    protected $description =
        'Normalize a local market-feed fixture without persistence.';
    protected $usage =
        'marketing:market-feed:collect-dry-run '
        . '[--source=<source-key>]';
    protected $options = [
        '--source' =>
            'Fixture source key. Defaults to federal_reserve_rss.',
    ];
    protected $aiOpsRunnable = true;

    public function run(array $params)
    {
        $this->parseParams($params);

        $sourceKey = $this->resolveSourceKey();

        $source = (
            new MarketFeedSourceRegistryService()
        )->getSourceByKey($sourceKey);

        if (! is_array($source)) {
            CLI::error(
                'STOP: market-feed source missing: '
                . $sourceKey
            );

            return EXIT_ERROR;
        }

        $fixturePath = (string) (
            $source['fixture_path']
            ?? ''
        );
        $resolvedPath = str_starts_with(
            $fixturePath,
            DIRECTORY_SEPARATOR
        )
            ? $fixturePath
            : ROOTPATH . ltrim($fixturePath, '/\\');

        if (! is_file($resolvedPath)) {
            CLI::error(
                'STOP: fixture missing: '
                . $fixturePath
            );

            return EXIT_ERROR;
        }

        $adapterClass = (string) (
            $source['adapter_class']
            ?? ''
        );

        if (
            $adapterClass === ''
            || ! class_exists($adapterClass)
            || ! is_a(
                $adapterClass,
                MarketFeedAdapterInterface::class,
                true
            )
        ) {
            CLI::error(
                'STOP: invalid market-feed adapter: '
                . $adapterClass
            );

            return EXIT_ERROR;
        }

        try {
            /** @var MarketFeedAdapterInterface $adapter */
            $adapter = new $adapterClass();
            $items = $adapter->parse($resolvedPath);
            $normalizer =
                new MarketFeedNormalizerService();

            CLI::write(
                'SOURCE_KEY=' . $sourceKey
            );
            CLI::write(
                'ITEM_COUNT=' . count($items)
            );

            foreach ($items as $item) {
                $normalized = $normalizer->normalize(
                    $sourceKey,
                    $item
                );

                CLI::write(sprintf(
                    'ITEM identity_sha256=%s '
                    . 'title="%s" canonical_url=%s',
                    $normalized['identity_sha256'],
                    str_replace(
                        '"',
                        '\\"',
                        $normalized['title']
                    ),
                    (string) (
                        $normalized['canonical_url']
                        ?? ''
                    )
                ));
            }
        } catch (Throwable $exception) {
            CLI::error(
                'STOP: ' . $exception->getMessage()
            );
            CLI::error('STATUS: FAIL');

            return EXIT_ERROR;
        }

        CLI::write('STATUS: PASS', 'green');

        return EXIT_SUCCESS;
    }
    private function resolveSourceKey(): string
    {
        $argv = $_SERVER['argv'] ?? [];

        foreach ($argv as $index => $argument) {
            if (! is_string($argument)) {
                continue;
            }

            if (str_starts_with($argument, '--source=')) {
                $value = trim(
                    substr(
                        $argument,
                        strlen('--source=')
                    )
                );

                return $value !== ''
                    ? $value
                    : 'federal_reserve_rss';
            }

            if (
                $argument === '--source'
                && isset($argv[$index + 1])
            ) {
                $value = trim(
                    (string) $argv[$index + 1]
                );

                return $value !== ''
                    ? $value
                    : 'federal_reserve_rss';
            }
        }

        $value = trim(
            (string) $this->option(
                'source',
                'federal_reserve_rss'
            )
        );

        return $value !== ''
            ? $value
            : 'federal_reserve_rss';
    }

}
