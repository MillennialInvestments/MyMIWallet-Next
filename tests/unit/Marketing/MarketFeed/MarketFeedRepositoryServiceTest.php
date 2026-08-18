<?php

declare(strict_types=1);

namespace Tests\Unit\Marketing\MarketFeed;

use App\Services\Marketing\MarketFeed\MarketFeedRepositoryService;
use CodeIgniter\Test\CIUnitTestCase;
use Config\MarketingMarketFeed;
use RuntimeException;

final class MarketFeedRepositoryServiceTest extends CIUnitTestCase
{
    public function testDisabledPersistenceResolvesNothing(): void
    {
        $config = $this->config(false);
        $resolved = 0;

        $factory = static function () use (&$resolved): object {
            $resolved++;

            return new class {
            };
        };

        $service = new MarketFeedRepositoryService(
            $config,
            $factory,
            $factory,
            $factory,
            $factory
        );

        $result = $service->persist([
            $this->normalizedItem(),
        ]);

        $this->assertSame(0, $resolved);
        $this->assertSame('disabled', $result['status']);
        $this->assertSame(1, $result['skipped']);
    }

    public function testInsertThenIdenticalRerunIsUnchanged(): void
    {
        [$service, $source, $item, $run, $connection] =
            $this->service();

        $first = $service->persist(
            [$this->normalizedItem()],
            $this->sourceDefinition(),
            [
                'execution_mode' => 'unit_test',
                'objective_id' => 'MYMI-NEWS-LIVE-001C',
                'api_key' => 'must-not-be-recorded',
            ]
        );

        $second = $service->persist(
            [$this->normalizedItem()],
            $this->sourceDefinition()
        );

        $this->assertSame('completed', $first['status']);
        $this->assertSame(2, $first['inserted']);
        $this->assertSame(0, $first['errors']);

        $this->assertSame('completed', $second['status']);
        $this->assertSame(2, $second['unchanged']);

        $this->assertSame(1, $source->addCalls);
        $this->assertSame(1, $item->addCalls);

        $this->assertSame(2, $connection->beginCalls);
        $this->assertSame(2, $connection->commitCalls);
        $this->assertSame(0, $connection->rollbackCalls);

        $firstRun = $run->rows[1];

        $this->assertSame('completed', $firstRun['status']);
        $this->assertStringNotContainsString(
            'api_key',
            $firstRun['provenance_json']
        );
    }

    public function testChangedSentimentPayloadUpdatesExistingItem(): void
    {
        [$service, , $item] = $this->service();

        $service->persist(
            [$this->normalizedItem()],
            $this->sourceDefinition()
        );

        $changed = $this->normalizedItem();
        $changed['payload_sha256'] = str_repeat('b', 64);
        $changed['relevance_score'] = 0.95;
        $changed['sentiment_score'] = -0.75;
        $changed['sentiment_label'] = 'Bearish';

        $result = $service->persist(
            [$changed],
            $this->sourceDefinition()
        );

        $stored = $item->rows[
            $changed['identity_sha256']
        ];

        $this->assertSame(1, $result['updated']);
        $this->assertSame(1, $result['unchanged']);
        $this->assertSame(0.95, $stored['relevance_score']);
        $this->assertSame(-0.75, $stored['sentiment_score']);
        $this->assertSame('Bearish', $stored['sentiment_label']);
    }

    public function testConcurrentDuplicateBecomesUnchanged(): void
    {
        [$service, , $item] = $this->service();

        $item->simulateDuplicateRace = true;

        $result = $service->persist([
            $this->normalizedItem(),
        ]);

        $this->assertSame('completed', $result['status']);
        $this->assertSame(0, $result['inserted']);
        $this->assertSame(1, $result['unchanged']);
        $this->assertSame(0, $result['errors']);
    }

    public function testPersistenceFailureRollsBackWholeBatch(): void
    {
        [$service, , $item, $run, $connection] =
            $this->service();

        $item->throwOnAddCall = 2;

        $second = $this->normalizedItem();
        $second['identity_sha256'] = str_repeat('d', 64);
        $second['payload_sha256'] = str_repeat('e', 64);

        $result = $service->persist([
            $this->normalizedItem(),
            $second,
        ]);

        $this->assertSame('failed', $result['status']);
        $this->assertTrue($result['rolled_back']);
        $this->assertSame(0, $result['inserted']);
        $this->assertSame(1, $result['errors']);
        $this->assertSame(1, $connection->rollbackCalls);

        $this->assertSame('failed', $run->rows[1]['status']);
        $this->assertSame(1, $run->rows[1]['rolled_back']);
    }

    private function service(): array
    {
        $config = $this->config(true);
        $source = new InMemoryMarketSourceModel();
        $item = new InMemoryMarketFeedItemModel();
        $run = new InMemoryMarketFeedRunModel();
        $connection = new InMemoryTransactionConnection();

        $service = new MarketFeedRepositoryService(
            $config,
            static fn (): object => $source,
            static fn (): object => $item,
            static fn (): object => $run,
            static fn (): object => $connection
        );

        return [
            $service,
            $source,
            $item,
            $run,
            $connection,
        ];
    }

    private function config(bool $enabled): MarketingMarketFeed
    {
        $config = new MarketingMarketFeed();
        $config->enabled = $enabled;
        $config->persist_enabled = $enabled;

        return $config;
    }

    private function normalizedItem(): array
    {
        return [
            'identity_sha256' => str_repeat('a', 64),
            'source_key' => 'alpha_vantage',
            'external_item_id' => 'fixture-001',
            'title' => 'Fixture',
            'summary' => 'Summary',
            'canonical_url' => 'https://example.test/fixture',
            'published_at' => '2026-07-01 12:00:00',
            'collected_at' => '2026-07-01 12:00:00',
            'relevance_score' => 0.85,
            'sentiment_score' => 0.25,
            'sentiment_label' => 'Neutral',
            'payload_sha256' => str_repeat('c', 64),
            'normalized_metadata_json' => '{"fixture":true}',
        ];
    }

    private function sourceDefinition(): array
    {
        return [
            'source_key' => 'alpha_vantage',
            'source_name' => 'Alpha Vantage',
            'source_url' => 'https://example.test/',
            'adapter_class' => 'FixtureAdapter',
            'enabled' => false,
            'configuration' => [
                'mode' => 'fixture_only',
            ],
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

    public function updateSource(
        int|string $id,
        array $data
    ): bool {
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
    public bool $simulateDuplicateRace = false;
    public ?int $throwOnAddCall = null;

    public function getItemByIdentitySha256(
        string $identity
    ): ?array {
        return $this->rows[$identity] ?? null;
    }

    public function addItem(array $data): int|false
    {
        $this->addCalls++;

        if (
            $this->throwOnAddCall !== null
            && $this->addCalls === $this->throwOnAddCall
        ) {
            throw new RuntimeException(
                'Synthetic persistence failure.'
            );
        }

        if ($this->simulateDuplicateRace) {
            $this->simulateDuplicateRace = false;
            $data['id'] = count($this->rows) + 1;
            $this->rows[$data['identity_sha256']] = $data;

            return false;
        }

        $data['id'] = count($this->rows) + 1;
        $this->rows[$data['identity_sha256']] = $data;

        return $data['id'];
    }

    public function updateItem(
        int|string $id,
        array $data
    ): bool {
        $this->updateCalls++;
        $data['id'] = $id;
        $this->rows[$data['identity_sha256']] = $data;

        return true;
    }
}

final class InMemoryMarketFeedRunModel
{
    public array $rows = [];

    public function addRun(array $data): int
    {
        $id = count($this->rows) + 1;
        $data['id'] = $id;
        $this->rows[$id] = $data;

        return $id;
    }

    public function updateRun(
        int|string $id,
        array $data
    ): bool {
        $this->rows[$id] = array_merge(
            $this->rows[$id],
            $data
        );

        return true;
    }
}

final class InMemoryTransactionConnection
{
    public int $beginCalls = 0;
    public int $commitCalls = 0;
    public int $rollbackCalls = 0;

    public function transBegin(): bool
    {
        $this->beginCalls++;

        return true;
    }

    public function transCommit(): bool
    {
        $this->commitCalls++;

        return true;
    }

    public function transRollback(): bool
    {
        $this->rollbackCalls++;

        return true;
    }
}
