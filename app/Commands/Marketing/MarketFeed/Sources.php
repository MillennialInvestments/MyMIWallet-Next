<?php

namespace App\Commands\Marketing\MarketFeed;

use App\Services\Marketing\MarketFeed\MarketFeedSourceRegistryService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

final class Sources extends BaseCommand
{
    protected $group = 'Marketing';

    protected $name = 'marketing:market-feed:sources';

    protected $description =
        'List deterministic market-feed sources.';

    public function run(array $params)
    {
        $sources = (
            new MarketFeedSourceRegistryService()
        )->getAllSources();

        foreach ($sources as $source) {
            CLI::write(sprintf(
                'SOURCE source_key=%s source_name="%s" '
                . 'adapter_class=%s enabled=%s '
                . 'fixture_path=%s network_required=%s',
                (string) (
                    $source['source_key'] ?? ''
                ),
                str_replace(
                    '"',
                    '\"',
                    (string) (
                        $source['source_name'] ?? ''
                    )
                ),
                (string) (
                    $source['adapter_class'] ?? ''
                ),
                ! empty($source['enabled'])
                    ? 'true'
                    : 'false',
                (string) (
                    $source['fixture_path'] ?? ''
                ),
                ! empty($source['network_required'])
                    ? 'true'
                    : 'false'
            ));
        }

        CLI::write(
            'SOURCE_COUNT=' . count($sources)
        );

        return EXIT_SUCCESS;
    }
}
