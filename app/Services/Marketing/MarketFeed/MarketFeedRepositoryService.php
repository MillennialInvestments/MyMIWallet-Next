<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed;

use App\Models\MarketingMarketFeedItemModel;
use App\Models\MarketingMarketFeedRunModel;
use App\Models\MarketingMarketSourceModel;
use Config\MarketingMarketFeed;
use RuntimeException;
use Throwable;

final class MarketFeedRepositoryService
{
    private MarketingMarketFeed $config;
    private $sourceModelFactory;
    private $itemModelFactory;
    private $runModelFactory;
    private $connectionFactory;

    public function __construct(
        ?MarketingMarketFeed $config = null,
        ?callable $sourceModelFactory = null,
        ?callable $itemModelFactory = null,
        ?callable $runModelFactory = null,
        ?callable $connectionFactory = null
    ) {
        $this->config = $config ?? new MarketingMarketFeed();

        $this->sourceModelFactory = $sourceModelFactory
            ?? static fn (): MarketingMarketSourceModel =>
                new MarketingMarketSourceModel();

        $this->itemModelFactory = $itemModelFactory
            ?? static fn (): MarketingMarketFeedItemModel =>
                new MarketingMarketFeedItemModel();

        $this->runModelFactory = $runModelFactory
            ?? static fn (): MarketingMarketFeedRunModel =>
                new MarketingMarketFeedRunModel();

        $this->connectionFactory = $connectionFactory
            ?? static fn (): object => db_connect();
    }

    public function persistenceEnabled(): bool
    {
        return $this->config->enabled
            && $this->config->persist_enabled;
    }

    public function preview(array $items): array
    {
        return array_values($items);
    }

    public function persist(
        array $items,
        array $source = [],
        array $provenance = []
    ): array {
        $summary = [
            'status' => 'disabled',
            'run_uuid' => null,
            'inserted' => 0,
            'updated' => 0,
            'unchanged' => 0,
            'skipped' => 0,
            'errors' => 0,
            'rolled_back' => false,
            'error_messages' => [],
        ];

        if (! $this->persistenceEnabled()) {
            $summary['skipped'] = count($items);

            return $summary;
        }

        $sourceModel = ($this->sourceModelFactory)();
        $itemModel = ($this->itemModelFactory)();
        $runModel = ($this->runModelFactory)();
        $connection = ($this->connectionFactory)();

        $this->assertSourceModel($sourceModel);
        $this->assertItemModel($itemModel);
        $this->assertRunModel($runModel);
        $this->assertConnection($connection);

        $runUuid = bin2hex(random_bytes(16));
        $summary['run_uuid'] = $runUuid;

        try {
            $runId = $runModel->addRun(
                $this->runStartPayload(
                    $runUuid,
                    $items,
                    $source,
                    $provenance
                )
            );

            if ($runId === false) {
                throw new RuntimeException(
                    'Market-feed ingest run creation failed.'
                );
            }
        } catch (Throwable $exception) {
            $summary['status'] = 'failed';
            $summary['errors'] = 1;
            $summary['error_messages'][] = $exception->getMessage();

            return $summary;
        }

        try {
            if (! $connection->transBegin()) {
                throw new RuntimeException(
                    'Market-feed transaction could not begin.'
                );
            }

            if ($source !== []) {
                $this->persistSource(
                    $sourceModel,
                    $source,
                    $summary
                );
            }

            foreach ($items as $item) {
                if (! is_array($item)) {
                    $summary['skipped']++;

                    continue;
                }

                $payload = $this->itemPayload($item);

                if ($payload === null) {
                    $summary['skipped']++;

                    continue;
                }

                $this->persistItem(
                    $itemModel,
                    $payload,
                    $summary
                );
            }

            $summary['status'] = 'completed';

            $this->finishRun(
                $runModel,
                $runId,
                $summary
            );

            if (! $connection->transCommit()) {
                throw new RuntimeException(
                    'Market-feed transaction commit failed.'
                );
            }
        } catch (Throwable $exception) {
            $connection->transRollback();

            $summary['status'] = 'failed';
            $summary['rolled_back'] = true;
            $summary['inserted'] = 0;
            $summary['updated'] = 0;
            $summary['unchanged'] = 0;
            $summary['errors']++;
            $summary['error_messages'][] = $exception->getMessage();

            try {
                $this->finishRun(
                    $runModel,
                    $runId,
                    $summary
                );
            } catch (Throwable $auditException) {
                $summary['errors']++;
                $summary['error_messages'][] =
                    'Run audit update failed: '
                    . $auditException->getMessage();
            }
        }

        return $summary;
    }

    private function persistSource(
        object $sourceModel,
        array $source,
        array &$summary
    ): void {
        $payload = $this->sourcePayload($source);

        if ($payload === null) {
            $summary['skipped']++;

            return;
        }

        $existing = $sourceModel->getSourceByKey(
            $payload['source_key']
        );

        if ($existing === null) {
            if ($sourceModel->addSource($payload) === false) {
                throw new RuntimeException(
                    'Market-feed source insert failed.'
                );
            }

            $summary['inserted']++;

            return;
        }

        if (! $this->hasChanges($existing, $payload)) {
            $summary['unchanged']++;

            return;
        }

        $id = $existing['id'] ?? null;

        if (
            $id === null
            || ! $sourceModel->updateSource($id, $payload)
        ) {
            throw new RuntimeException(
                'Market-feed source update failed.'
            );
        }

        $summary['updated']++;
    }

    private function persistItem(
        object $itemModel,
        array $payload,
        array &$summary
    ): void {
        $existing = $itemModel->getItemByIdentitySha256(
            $payload['identity_sha256']
        );

        if ($existing !== null) {
            $this->reconcileExistingItem(
                $itemModel,
                $existing,
                $payload,
                $summary
            );

            return;
        }

        try {
            $created = $itemModel->addItem($payload);
        } catch (Throwable $exception) {
            $this->reconcileConcurrentInsert(
                $itemModel,
                $payload,
                $summary,
                $exception
            );

            return;
        }

        if ($created === false) {
            $this->reconcileConcurrentInsert(
                $itemModel,
                $payload,
                $summary
            );

            return;
        }

        $summary['inserted']++;
    }

    private function reconcileConcurrentInsert(
        object $itemModel,
        array $payload,
        array &$summary,
        ?Throwable $insertException = null
    ): void {
        $winner = $itemModel->getItemByIdentitySha256(
            $payload['identity_sha256']
        );

        if ($winner === null) {
            if ($insertException !== null) {
                throw $insertException;
            }

            throw new RuntimeException(
                'Feed item insert failed without a concurrent winner.'
            );
        }

        $this->reconcileExistingItem(
            $itemModel,
            $winner,
            $payload,
            $summary
        );
    }

    private function reconcileExistingItem(
        object $itemModel,
        array $existing,
        array $payload,
        array &$summary
    ): void {
        if (
            ($existing['payload_sha256'] ?? null)
            === $payload['payload_sha256']
        ) {
            $summary['unchanged']++;

            return;
        }

        $id = $existing['id'] ?? null;

        if (
            $id === null
            || ! $itemModel->updateItem($id, $payload)
        ) {
            throw new RuntimeException(
                'Feed item update failed.'
            );
        }

        $summary['updated']++;
    }

    private function sourcePayload(array $source): ?array
    {
        $sourceKey = trim(
            (string) ($source['source_key'] ?? '')
        );
        $sourceName = trim(
            (string) ($source['source_name'] ?? '')
        );
        $adapterClass = trim(
            (string) ($source['adapter_class'] ?? '')
        );

        if (
            $sourceKey === ''
            || $sourceName === ''
            || $adapterClass === ''
        ) {
            return null;
        }

        $configurationJson =
            $source['configuration_json'] ?? null;

        if (
            $configurationJson === null
            && array_key_exists('configuration', $source)
        ) {
            $configurationJson = json_encode(
                $source['configuration'],
                JSON_UNESCAPED_SLASHES
                | JSON_UNESCAPED_UNICODE
                | JSON_THROW_ON_ERROR
            );
        }

        return [
            'source_key' => $sourceKey,
            'source_name' => $sourceName,
            'source_url' => $source['source_url'] ?? null,
            'adapter_class' => $adapterClass,
            'enabled' => ! empty($source['enabled']) ? 1 : 0,
            'configuration_json' => $configurationJson,
        ];
    }

    private function itemPayload(array $item): ?array
    {
        $identity = strtolower(
            trim((string) ($item['identity_sha256'] ?? ''))
        );
        $payload = strtolower(
            trim((string) ($item['payload_sha256'] ?? ''))
        );
        $sourceKey = trim(
            (string) ($item['source_key'] ?? '')
        );

        if (
            preg_match('/^[0-9a-f]{64}$/', $identity) !== 1
            || preg_match('/^[0-9a-f]{64}$/', $payload) !== 1
            || $sourceKey === ''
        ) {
            return null;
        }

        return [
            'identity_sha256' => $identity,
            'source_key' => $sourceKey,
            'external_item_id' =>
                $item['external_item_id'] ?? null,
            'title' => trim(
                (string) ($item['title'] ?? '')
            ),
            'summary' => trim(
                (string) ($item['summary'] ?? '')
            ),
            'canonical_url' =>
                $item['canonical_url'] ?? null,
            'published_at' =>
                $item['published_at'] ?? null,
            'collected_at' =>
                $item['collected_at'] ?? null,
            'relevance_score' =>
                $item['relevance_score'] ?? null,
            'sentiment_score' =>
                $item['sentiment_score'] ?? null,
            'sentiment_label' =>
                $item['sentiment_label'] ?? null,
            'payload_sha256' => $payload,
            'normalized_metadata_json' =>
                $item['normalized_metadata_json'] ?? null,
        ];
    }

    private function runStartPayload(
        string $runUuid,
        array $items,
        array $source,
        array $provenance
    ): array {
        $sourceKey = trim(
            (string) ($source['source_key'] ?? '')
        );

        if ($sourceKey === '') {
            foreach ($items as $item) {
                if (! is_array($item)) {
                    continue;
                }

                $candidate = trim(
                    (string) ($item['source_key'] ?? '')
                );

                if ($candidate !== '') {
                    $sourceKey = $candidate;

                    break;
                }
            }
        }

        $executionMode = trim(
            (string) (
                $provenance['execution_mode']
                ?? 'bounded_manual'
            )
        );

        if ($executionMode === '') {
            $executionMode = 'bounded_manual';
        }

        $codeSha = strtolower(
            trim((string) ($provenance['code_sha'] ?? ''))
        );

        if (
            preg_match('/^[0-9a-f]{40}$/', $codeSha) !== 1
        ) {
            $codeSha = null;
        }

        $configSha = strtolower(
            trim(
                (string) (
                    $provenance['config_sha256']
                    ?? ''
                )
            )
        );

        if (
            preg_match('/^[0-9a-f]{64}$/', $configSha) !== 1
        ) {
            $configSha = null;
        }

        return [
            'run_uuid' => strtolower($runUuid),
            'source_key' =>
                $sourceKey !== '' ? $sourceKey : null,
            'execution_mode' =>
                substr($executionMode, 0, 32),
            'status' => 'running',
            'started_at' => gmdate('Y-m-d H:i:s'),
            'finished_at' => null,
            'inserted' => 0,
            'updated' => 0,
            'unchanged' => 0,
            'skipped' => 0,
            'errors' => 0,
            'rolled_back' => 0,
            'code_sha' => $codeSha,
            'config_sha256' => $configSha,
            'provenance_json' => json_encode(
                $this->allowlistedProvenance($provenance),
                JSON_UNESCAPED_SLASHES
                | JSON_UNESCAPED_UNICODE
                | JSON_THROW_ON_ERROR
            ),
        ];
    }

    private function allowlistedProvenance(
        array $provenance
    ): array {
        $allowed = [];

        foreach (
            [
                'execution_mode',
                'code_sha',
                'config_sha256',
                'objective_id',
                'mission_id',
            ] as $key
        ) {
            if (
                ! array_key_exists($key, $provenance)
                || ! is_scalar($provenance[$key])
            ) {
                continue;
            }

            $allowed[$key] = trim(
                (string) $provenance[$key]
            );
        }

        ksort($allowed, SORT_STRING);

        return $allowed;
    }

    private function finishRun(
        object $runModel,
        int|string $runId,
        array $summary
    ): void {
        if (
            ! $runModel->updateRun(
                $runId,
                [
                    'status' => $summary['status'],
                    'finished_at' =>
                        gmdate('Y-m-d H:i:s'),
                    'inserted' => $summary['inserted'],
                    'updated' => $summary['updated'],
                    'unchanged' =>
                        $summary['unchanged'],
                    'skipped' => $summary['skipped'],
                    'errors' => $summary['errors'],
                    'rolled_back' =>
                        $summary['rolled_back'] ? 1 : 0,
                ]
            )
        ) {
            throw new RuntimeException(
                'Market-feed ingest run update failed.'
            );
        }
    }

    private function hasChanges(
        array $existing,
        array $payload
    ): bool {
        foreach ($payload as $key => $value) {
            if (($existing[$key] ?? null) != $value) {
                return true;
            }
        }

        return false;
    }

    private function assertSourceModel(object $model): void
    {
        foreach (
            ['getSourceByKey', 'addSource', 'updateSource']
            as $method
        ) {
            if (! method_exists($model, $method)) {
                throw new RuntimeException(
                    'Invalid source model factory.'
                );
            }
        }
    }

    private function assertItemModel(object $model): void
    {
        foreach (
            [
                'getItemByIdentitySha256',
                'addItem',
                'updateItem',
            ] as $method
        ) {
            if (! method_exists($model, $method)) {
                throw new RuntimeException(
                    'Invalid feed-item model factory.'
                );
            }
        }
    }

    private function assertRunModel(object $model): void
    {
        foreach (['addRun', 'updateRun'] as $method) {
            if (! method_exists($model, $method)) {
                throw new RuntimeException(
                    'Invalid feed-run model factory.'
                );
            }
        }
    }

    private function assertConnection(object $connection): void
    {
        foreach (
            ['transBegin', 'transCommit', 'transRollback']
            as $method
        ) {
            if (! method_exists($connection, $method)) {
                throw new RuntimeException(
                    'Invalid transaction connection.'
                );
            }
        }
    }
}
