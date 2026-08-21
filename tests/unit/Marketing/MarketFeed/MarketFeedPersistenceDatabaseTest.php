<?php

declare(strict_types=1);

namespace Tests\Unit\Marketing\MarketFeed;

use App\Database\Migrations\CreateMarketingMarketFeedIngestRuns;
use App\Database\Migrations\CreateMarketingMarketFeedLedger;
use App\Database\Migrations\HardenMarketingMarketFeedPersistence;
use App\Models\MarketingMarketFeedItemModel;
use App\Models\MarketingMarketFeedRunModel;
use App\Models\MarketingMarketSourceModel;
use App\Services\Marketing\MarketFeed\MarketFeedRepositoryService;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;
use Config\MarketingMarketFeed;
use RuntimeException;

final class MarketFeedPersistenceDatabaseTest extends CIUnitTestCase
{
    public function testSqlitePersistenceContract(): void
    {
        require_once APPPATH
            . 'Database/Migrations/'
            . '2026-07-20-000001_CreateMarketingMarketFeedLedger.php';

        require_once APPPATH
            . 'Database/Migrations/'
            . '2026-08-18-000001_HardenMarketingMarketFeedPersistence.php';

        require_once APPPATH
            . 'Database/Migrations/'
            . '2026-08-18-000002_CreateMarketingMarketFeedIngestRuns.php';

        $db = Database::connect(
            [
                'DSN' => 'sqlite::memory:',
                'hostname' => '',
                'username' => '',
                'password' => '',
                'database' => ':memory:',
                'DBDriver' => 'SQLite3',
                'DBPrefix' => '',
                'pConnect' => false,
                'DBDebug' => true,
                'charset' => 'utf8',
                'DBCollat' => 'utf8_general_ci',
                'swapPre' => '',
                'encrypt' => false,
                'compress' => false,
                'strictOn' => false,
                'failover' => [],
                'port' => 0,
                'foreignKeys' => true,
                'busyTimeout' => 1000,
            ],
            false
        );

        $forge = Database::forge($db);

        (new CreateMarketingMarketFeedLedger($forge))->up();

        $forge->addColumn(
            'bf_marketing_market_feed_items',
            [
                'relevance_score' => [
                    'type' => 'DECIMAL',
                    'constraint' => '12,8',
                    'null' => true,
                ],
            ]
        );

        $fieldMigration =
            new HardenMarketingMarketFeedPersistence($forge);

        $fieldMigration->up();
        $fieldMigration->up();

        (new CreateMarketingMarketFeedIngestRuns($forge))->up();

        $this->assertTrue(
            $db->tableExists('bf_marketing_market_feed_items')
        );
        $this->assertTrue(
            $db->tableExists('bf_marketing_market_feed_runs')
        );
        $this->assertTrue(
            $db->fieldExists(
                'relevance_score',
                'bf_marketing_market_feed_items'
            )
        );
        $this->assertTrue(
            $db->fieldExists(
                'sentiment_score',
                'bf_marketing_market_feed_items'
            )
        );
        $this->assertTrue(
            $db->fieldExists(
                'sentiment_label',
                'bf_marketing_market_feed_items'
            )
        );

        $config = new MarketingMarketFeed();
        $config->enabled = true;
        $config->persist_enabled = true;

        $sourceModel = new MarketingMarketSourceModel($db);
        $itemModel = new MarketingMarketFeedItemModel($db);
        $runModel = new MarketingMarketFeedRunModel($db);

        $service = new MarketFeedRepositoryService(
            $config,
            static fn (): object => $sourceModel,
            static fn (): object => $itemModel,
            static fn (): object => $runModel,
            static fn (): object => $db
        );

        $item = $this->item('1', '2');

        $first = $service->persist(
            [$item],
            $this->source(),
            ['execution_mode' => 'sqlite_certification']
        );

        $second = $service->persist(
            [$item],
            $this->source(),
            ['execution_mode' => 'sqlite_certification']
        );

        $this->assertSame('completed', $first['status']);
        $this->assertSame(2, $first['inserted']);
        $this->assertSame(0, $first['errors']);

        $this->assertSame('completed', $second['status']);
        $this->assertSame(2, $second['unchanged']);

        $changed = $item;
        $changed['payload_sha256'] = str_repeat('3', 64);
        $changed['relevance_score'] = 0.99;
        $changed['sentiment_score'] = -0.75;
        $changed['sentiment_label'] = 'Bearish';

        $third = $service->persist(
            [$changed],
            $this->source()
        );

        $this->assertSame(1, $third['updated']);
        $this->assertSame(1, $third['unchanged']);

        $stored = $itemModel->getItemByIdentitySha256(
            $item['identity_sha256']
        );

        $this->assertNotNull($stored);
        $this->assertSame(
            0.99,
            (float) $stored['relevance_score']
        );
        $this->assertSame(
            -0.75,
            (float) $stored['sentiment_score']
        );
        $this->assertSame(
            'Bearish',
            $stored['sentiment_label']
        );

        $failingModel = new FailingSecondDatabaseItemModel(
            $itemModel
        );

        $rollbackService = new MarketFeedRepositoryService(
            $config,
            static fn (): object => $sourceModel,
            static fn (): object => $failingModel,
            static fn (): object => $runModel,
            static fn (): object => $db
        );

        $rollbackOne = $this->item('4', '5');
        $rollbackTwo = $this->item('6', '7');

        $rollback = $rollbackService->persist([
            $rollbackOne,
            $rollbackTwo,
        ]);

        $this->assertSame('failed', $rollback['status']);
        $this->assertTrue($rollback['rolled_back']);

        $rolledBackCount = $db
            ->table('bf_marketing_market_feed_items')
            ->whereIn(
                'identity_sha256',
                [
                    $rollbackOne['identity_sha256'],
                    $rollbackTwo['identity_sha256'],
                ]
            )
            ->countAllResults();

        $this->assertSame(0, $rolledBackCount);

        $runCount = $db
            ->table('bf_marketing_market_feed_runs')
            ->countAllResults();

        $this->assertGreaterThanOrEqual(4, $runCount);
    }

    private function item(
        string $identityNibble,
        string $payloadNibble
    ): array {
        return [
            'identity_sha256' =>
                str_repeat($identityNibble, 64),
            'source_key' => 'alpha_vantage',
            'external_item_id' =>
                'fixture-' . $identityNibble,
            'title' => 'Fixture',
            'summary' => 'Summary',
            'canonical_url' =>
                'https://example.test/'
                . $identityNibble,
            'published_at' => '2026-08-18 12:00:00',
            'collected_at' => '2026-08-18 12:00:00',
            'relevance_score' => 0.85,
            'sentiment_score' => 0.25,
            'sentiment_label' => 'Neutral',
            'payload_sha256' =>
                str_repeat($payloadNibble, 64),
            'normalized_metadata_json' =>
                '{"fixture":true}',
        ];
    }

    private function source(): array
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

final class FailingSecondDatabaseItemModel
{
    private MarketingMarketFeedItemModel $delegate;
    private int $adds = 0;

    public function __construct(
        MarketingMarketFeedItemModel $delegate
    ) {
        $this->delegate = $delegate;
    }

    public function getItemByIdentitySha256(
        string $identity
    ): ?array {
        return $this->delegate
            ->getItemByIdentitySha256($identity);
    }

    public function getItemByIdentitySha256ForUpdate(
        string $identity
    ): ?array {
        return $this->delegate
            ->getItemByIdentitySha256ForUpdate($identity);
    }

    public function addItem(array $data): int|string|false
    {
        $this->adds++;

        if ($this->adds === 2) {
            throw new RuntimeException(
                'Synthetic database persistence failure.'
            );
        }

        return $this->delegate->addItem($data);
    }

    public function updateItem(
        int|string $id,
        array $data
    ): bool {
        return $this->delegate->updateItem($id, $data);
    }
}
