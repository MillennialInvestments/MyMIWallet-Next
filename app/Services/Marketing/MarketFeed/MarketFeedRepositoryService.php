<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed;

use App\Models\MarketingMarketFeedItemModel;
use App\Models\MarketingMarketSourceModel;
use Config\MarketingMarketFeed;
use RuntimeException;
use Throwable;

final class MarketFeedRepositoryService
{
    private MarketingMarketFeed $config;
    private $sourceModelFactory;
    private $itemModelFactory;

    public function __construct(
        ?MarketingMarketFeed $config = null,
        ?callable $sourceModelFactory = null,
        ?callable $itemModelFactory = null
    ) {
        $this->config = $config ?? new MarketingMarketFeed();
        $this->sourceModelFactory = $sourceModelFactory
            ?? static fn (): MarketingMarketSourceModel => new MarketingMarketSourceModel();
        $this->itemModelFactory = $itemModelFactory
            ?? static fn (): MarketingMarketFeedItemModel => new MarketingMarketFeedItemModel();
    }

    public function persistenceEnabled(): bool
    {
        return $this->config->enabled && $this->config->persist_enabled;
    }

    public function preview(array $items): array
    {
        return array_values($items);
    }

    public function persist(array $items, array $source = []): array
    {
        $summary = [
            'status' => 'disabled',
            'inserted' => 0,
            'updated' => 0,
            'unchanged' => 0,
            'skipped' => 0,
            'errors' => 0,
            'error_messages' => [],
        ];

        if (! $this->persistenceEnabled()) {
            $summary['skipped'] = count($items);

            return $summary;
        }

        $summary['status'] = 'completed';
        $sourceModel = ($this->sourceModelFactory)();
        $itemModel = ($this->itemModelFactory)();

        $this->assertSourceModel($sourceModel);
        $this->assertItemModel($itemModel);

        if ($source !== []) {
            $this->persistSource($sourceModel, $source, $summary);
        }

        foreach ($items as $item) {
            if (! is_array($item)) {
                $summary['skipped']++;
                continue;
            }

            try {
                $payload = $this->itemPayload($item);

                if ($payload === null) {
                    $summary['skipped']++;
                    continue;
                }

                $existing = $itemModel->getItemByIdentitySha256($payload['identity_sha256']);

                if ($existing === null) {
                    if ($itemModel->addItem($payload) === false) {
                        throw new RuntimeException('Feed item insert failed.');
                    }

                    $summary['inserted']++;
                    continue;
                }

                if (($existing['payload_sha256'] ?? null) === $payload['payload_sha256']) {
                    $summary['unchanged']++;
                    continue;
                }

                $id = $existing['id'] ?? null;

                if ($id === null || ! $itemModel->updateItem($id, $payload)) {
                    throw new RuntimeException('Feed item update failed.');
                }

                $summary['updated']++;
            } catch (Throwable $exception) {
                $summary['errors']++;
                $summary['error_messages'][] = $exception->getMessage();
            }
        }

        return $summary;
    }

    private function persistSource(object $sourceModel, array $source, array &$summary): void
    {
        try {
            $payload = $this->sourcePayload($source);

            if ($payload === null) {
                $summary['skipped']++;
                return;
            }

            $existing = $sourceModel->getSourceByKey($payload['source_key']);

            if ($existing === null) {
                if ($sourceModel->addSource($payload) === false) {
                    throw new RuntimeException('Market-feed source insert failed.');
                }

                $summary['inserted']++;
                return;
            }

            if (! $this->hasChanges($existing, $payload)) {
                $summary['unchanged']++;
                return;
            }

            $id = $existing['id'] ?? null;

            if ($id === null || ! $sourceModel->updateSource($id, $payload)) {
                throw new RuntimeException('Market-feed source update failed.');
            }

            $summary['updated']++;
        } catch (Throwable $exception) {
            $summary['errors']++;
            $summary['error_messages'][] = $exception->getMessage();
        }
    }

    private function sourcePayload(array $source): ?array
    {
        $sourceKey = trim((string) ($source['source_key'] ?? ''));
        $sourceName = trim((string) ($source['source_name'] ?? ''));
        $adapterClass = trim((string) ($source['adapter_class'] ?? ''));

        if ($sourceKey === '' || $sourceName === '' || $adapterClass === '') {
            return null;
        }

        $configurationJson = $source['configuration_json'] ?? null;

        if ($configurationJson === null && array_key_exists('configuration', $source)) {
            $configurationJson = json_encode(
                $source['configuration'],
                JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR
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
        $identity = strtolower(trim((string) ($item['identity_sha256'] ?? '')));
        $payload = strtolower(trim((string) ($item['payload_sha256'] ?? '')));
        $sourceKey = trim((string) ($item['source_key'] ?? ''));

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
            'external_item_id' => $item['external_item_id'] ?? null,
            'title' => trim((string) ($item['title'] ?? '')),
            'summary' => trim((string) ($item['summary'] ?? '')),
            'canonical_url' => $item['canonical_url'] ?? null,
            'published_at' => $item['published_at'] ?? null,
            'collected_at' => $item['collected_at'] ?? null,
            'payload_sha256' => $payload,
            'normalized_metadata_json' => $item['normalized_metadata_json'] ?? null,
        ];
    }

    private function hasChanges(array $existing, array $payload): bool
    {
        foreach ($payload as $key => $value) {
            if (($existing[$key] ?? null) != $value) {
                return true;
            }
        }

        return false;
    }

    private function assertSourceModel(object $model): void
    {
        foreach (['getSourceByKey', 'addSource', 'updateSource'] as $method) {
            if (! method_exists($model, $method)) {
                throw new RuntimeException('Invalid source model factory.');
            }
        }
    }

    private function assertItemModel(object $model): void
    {
        foreach (['getItemByIdentitySha256', 'addItem', 'updateItem'] as $method) {
            if (! method_exists($model, $method)) {
                throw new RuntimeException('Invalid feed-item model factory.');
            }
        }
    }
}
