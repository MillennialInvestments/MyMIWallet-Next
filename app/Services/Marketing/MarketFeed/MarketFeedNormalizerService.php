<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed;

use DateTimeImmutable;
use DateTimeZone;
use InvalidArgumentException;
use Throwable;

final class MarketFeedNormalizerService
{
    public function normalize(string $sourceKey, array $item): array
    {
        $sourceKey = trim($sourceKey);

        if ($sourceKey === '') {
            throw new InvalidArgumentException('Market-feed source key is required.');
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

        if ($externalItemId === '' && $canonicalUrl === '') {
            throw new InvalidArgumentException('External item ID or canonical URL is required.');
        }

        $identityValue = $externalItemId !== '' ? $externalItemId : $canonicalUrl;
        $metadataItem = $this->sanitizeMetadata($item);
        $sortedItem = $this->sortRecursively($metadataItem);
        $metadataJson = $this->encode($sortedItem);
        $publishedAt = $this->normalizeDate(
            $item['published_at']
            ?? $item['pubDate']
            ?? null
        );
        $collectedAt = $this->normalizeDate($item['collected_at'] ?? null)
            ?? $publishedAt;

        return [
            'identity_sha256' => hash('sha256', $sourceKey . '|' . $identityValue),
            'source_key' => $sourceKey,
            'external_item_id' => $externalItemId !== '' ? $externalItemId : null,
            'title' => trim((string) ($item['title'] ?? '')),
            'summary' => trim((string) (
                $item['summary']
                ?? $item['description']
                ?? ''
            )),
            'canonical_url' => $canonicalUrl !== '' ? $canonicalUrl : null,
            'published_at' => $publishedAt,
            'collected_at' => $collectedAt,
            'payload_sha256' => hash('sha256', $metadataJson),
            'normalized_metadata_json' => $metadataJson,
            'relevance_score' => $this->nullableFloat(
                $item['relevance_score'] ?? null
            ),
            'sentiment_score' => $this->nullableFloat(
                $item['sentiment_score'] ?? null
            ),
            'sentiment_label' => $this->nullableString(
                $item['sentiment_label'] ?? null
            ),
        ];
    }

    private function nullableFloat(mixed $value): ?float
    {
        if (
            $value === null
            || $value === ''
            || ! is_numeric($value)
        ) {
            return null;
        }

        return (float) $value;
    }

    private function nullableString(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $text = trim((string) $value);

        return $text === '' ? null : $text;
    }

    private function sanitizeMetadata(mixed $value): mixed
    {
        if (! is_array($value)) {
            return $value;
        }

        $sanitized = [];

        foreach ($value as $key => $child) {
            if (
                is_string($key)
                && $this->isSensitiveMetadataKey($key)
            ) {
                continue;
            }

            $sanitized[$key] = $this->sanitizeMetadata($child);
        }

        return $sanitized;
    }

    private function isSensitiveMetadataKey(string $key): bool
    {
        return preg_match(
            '/(?:api[_-]?key|authorization|password|secret|credential|access[_-]?token|refresh[_-]?token|request[_-]?headers?|response[_-]?headers?|headers?)/i',
            $key
        ) === 1;
    }

    private function normalizeDate(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $text = trim((string) $value);

        if ($text === '' || preg_match('/\b\d{4}\b/', $text) !== 1) {
            return null;
        }

        try {
            return (new DateTimeImmutable($text))
                ->setTimezone(new DateTimeZone('UTC'))
                ->format('Y-m-d H:i:s');
        } catch (Throwable) {
            return null;
        }
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

    private function sortRecursively(mixed $value): mixed
    {
        if (! is_array($value)) {
            return $value;
        }

        foreach ($value as $key => $child) {
            $value[$key] = $this->sortRecursively($child);
        }

        if (! array_is_list($value)) {
            ksort($value, SORT_STRING);
        }

        return $value;
    }
}
