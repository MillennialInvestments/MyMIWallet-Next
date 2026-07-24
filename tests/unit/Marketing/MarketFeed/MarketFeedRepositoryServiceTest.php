<?php

declare(strict_types=1);

namespace Tests\Unit\Marketing\MarketFeed;

use App\Services\Marketing\MarketFeed\MarketFeedRepositoryService;
use CodeIgniter\Test\CIUnitTestCase;
use Config\MarketingMarketFeed;

final class MarketFeedRepositoryServiceTest extends CIUnitTestCase
{
    public function testDisabledPersistenceDoesNotResolveFactories(): void
    {
        $config = new MarketingMarketFeed();
        $config->enabled = false;
        $config->persist_enabled = false;
        $resolved = 0;

        $factory = static function () use (&$resolved): object {
            $resolved++;

            return new class {
            };
        };

        $service = new MarketFeedRepositoryService($config, $factory, $factory);
        $result = $service->persist([$this->normalizedItem()]);

        $this->assertSame(0, $resolved);
        $this->assertSame('disabled', $result['status']);
        $this->assertSame(1, $result['skipped']);
    }

    public function testEnabledPersistenceUsesSourceAndItemContracts(): void
    {
        $config = new MarketingMarketFeed();
        $config->enabled = true;
        $config->persist_enabled = true;
        $sourceModel = new InMemoryMarketSourceModel();
        $itemModel = new InMemoryMarketFeedItemModel();
        $service = new MarketFeedRepositoryService(
            $config,
            static fn (): object => $sourceModel,
            static fn (): object => $itemModel
        );

        $first = $service->persist(
            [$this->normalizedItem()],
            $this->sourceDefinition()
        );
        $second = $service->persist(
            [$this->normalizedItem()],
            $this->sourceDefinition()
        );

        $this->assertSame('completed', $first['status']);
        $this->assertSame(2, $first['inserted']);
        $this->assertSame(0, $first['errors']);
        $this->assertSame(2, $second['unchanged']);
        $this->assertSame(1, $sourceModel->addCalls);
        $this->assertSame(1, $itemModel->addCalls);
    }

    public function testChangedPayloadUpdatesExistingItem(): void
    {
        $config = new MarketingMarketFeed();
        $config->enabled = true;
        $config->persist_enabled = true;
        $sourceModel = new InMemoryMarketSourceModel();
        $itemModel = new InMemoryMarketFeedItemModel();
        $service = new MarketFeedRepositoryService(
            $config,
            static fn (): object => $sourceModel,
            static fn (): object => $itemModel
        );

        $service->persist([$this->normalizedItem()], $this->sourceDefinition());
        $changed = $this->normalizedItem();
        $changed['payload_sha256'] = str_repeat('b', 64);
        $changed['title'] = 'Updated fixture';
        $result = $service->persist([$changed], $this->sourceDefinition());

        $this->assertSame(1, $result['updated']);
        $this->assertSame(1, $result['unchanged']);
        $this->assertSame(1, $itemModel->updateCalls);
    }

    private function normalizedItem(): array
    {
        return [
            'identity_sha256' => str_repeat('a', 64),
            'source_key' => 'federal_reserve_rss',
            'external_item_id' => 'fixture-001',
            'title' => 'Fixture',
            'summary' => 'Summary',
            'canonical_url' => 'https://example.test/fixture',
            'published_at' => '2026-07-01 12:00:00',
            'collected_at' => '2026-07-01 12:00:00',
            'payload_sha256' => str_repeat('c', 64),
            'normalized_metadata_json' => '{"fixture":true}',
        ];
    }

    private function sourceDefinition(): array
    {
        return [
            'source_key' => 'federal_reserve_rss',
            'source_name' => 'Federal Reserve RSS',
            'source_url' => 'https://www.federalreserve.gov/',
            'adapter_class' => 'App\\Services\\Marketing\\MarketFeed\\FederalReserveRssFixtureAdapter',
            'enabled' => false,
            'configuration' => ['mode' => 'fixture_only'],
        ];
    }
}

final class InMemoryMarketSourceModel
{
    public array $rows = [];
    public int $addCalls = 0;
    public int $updateCalls = 0;

    public function getSourceByKey(string $sourceKey): ?array
    {
        return $this->rows[$sourceKey] ?? null;
    }

    public function addSource(array $data): int
    {
        $this->addCalls++;
        $data['id'] = count($this->rows) + 1;
        $this->rows[$data['source_key']] = $data;

        return $data['id'];
    }

    public function updateSource(int|string $id, array $data): bool
    {
        $this->updateCalls++;
        $data['id'] = $id;
        $this->rows[$data['source_key']] = $data;

        return true;
    }
}

final class InMemoryMarketFeedItemModel
{
    public array $rows = [];
    public int $addCalls = 0;
    public int $updateCalls = 0;

    public function getItemByIdentitySha256(string $identity): ?array
    {
        return $this->rows[$identity] ?? null;
    }

    public function addItem(array $data): int
    {
        $this->addCalls++;
        $data['id'] = count($this->rows) + 1;
        $this->rows[$data['identity_sha256']] = $data;

        return $data['id'];
    }

    public function updateItem(int|string $id, array $data): bool
    {
        $this->updateCalls++;
        $data['id'] = $id;
        $this->rows[$data['identity_sha256']] = $data;

        return true;
    }
}
