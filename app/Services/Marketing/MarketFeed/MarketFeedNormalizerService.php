<?php

namespace App\Services\Marketing\MarketFeed;

use InvalidArgumentException;

final class MarketFeedNormalizerService
{
    public function normalize(
        string $sourceKey,
        array $item
    ): array {
        $sourceKey = trim($sourceKey);

        if ($sourceKey === '') {
            throw new InvalidArgumentException(
                'Market-feed source key is required.'
            );
        }

        $externalItemId = trim((string) (
            $item['external_item_id']
            ?? $item['guid']
            ?? ''
        ));

        $canonicalUrl = trim((string) (
            $item['canonical_url']
            ?? $item['link']
            ?? ''
        ));

        if (
            $externalItemId === ''
            && $canonicalUrl === ''
        ) {
            throw new InvalidArgumentException(
                'External item ID or canonical URL is required.'
            );
        }

        $identityValue = $externalItemId !== ''
            ? $externalItemId
            : $canonicalUrl;

        $sortedItem = $this->sortRecursively(
            $item
        );

        $metadataJson = $this->encode(
            $sortedItem
        );

        return [
            'identity_sha256' => hash(
                'sha256',
                $sourceKey . '|' . $identityValue
            ),
            'source_key' => $sourceKey,
            'external_item_id' => $externalItemId !== ''
                ? $externalItemId
                : null,
            'title' => trim((string) (
                $item['title'] ?? ''
            )),
            'summary' => trim((string) (
                $item['summary']
                ?? $item['description']
                ?? ''
            )),
            'canonical_url' => $canonicalUrl !== ''
                ? $canonicalUrl
                : null,
            'published_at' => $this->normalizeDate(
                $item['published_at']
                ?? $item['pubDate']
                ?? null,
                false
            ),
            'collected_at' => $this->normalizeDate(
                $item['collected_at'] ?? null,
                true
            ),
            'payload_sha256' => hash(
                'sha256',
                $metadataJson
            ),
            'normalized_metadata_json' => $metadataJson,
        ];
    }

    private function normalizeDate(
        mixed $value,
        bool $fallbackToNow
    ): ?string {
        if ($value === null || trim((string) $value) === '') {
            return $fallbackToNow
                ? gmdate('Y-m-d H:i:s')
                : null;
        }

        $timestamp = strtotime(
            (string) $value
        );

        if ($timestamp === false) {
            return $fallbackToNow
                ? gmdate('Y-m-d H:i:s')
                : null;
        }

        return gmdate(
            'Y-m-d H:i:s',
            $timestamp
        );
    }

    private function encode(mixed $value): string
    {
        return json_encode(
            $value,
            JSON_UNESCAPED_SLASHES
            | JSON_UNESCAPED_UNICODE
            | JSON_THROW_ON_ERROR
        );
    }

    private function sortRecursively(
        mixed $value
    ): mixed {
        if (! is_array($value)) {
            return $value;
        }

        foreach ($value as $key => $child) {
            $value[$key] = $this->sortRecursively(
                $child
            );
        }

        if (! array_is_list($value)) {
            ksort($value, SORT_STRING);
        }

        return $value;
    }
}
