<?php

declare(strict_types=1);

namespace App\Services\Marketing\MarketFeed;

use DateTimeImmutable;
use DateTimeZone;
use InvalidArgumentException;
use JsonException;
use RuntimeException;
use Throwable;

final class AlphaVantageNewsSentimentAdapter implements MarketFeedAdapterInterface
{
    public function parse(string $input): array
    {
        $json = $this->readJson($input);

        try {
            $payload = json_decode(
                $json,
                true,
                512,
                JSON_THROW_ON_ERROR
            );
        } catch (JsonException $exception) {
            throw new RuntimeException(
                'Missing or invalid Alpha Vantage JSON content.',
                0,
                $exception
            );
        }

        if (
            ! is_array($payload)
            || ! array_key_exists('feed', $payload)
            || ! is_array($payload['feed'])
        ) {
            throw new RuntimeException(
                'Alpha Vantage feed array is missing or invalid.'
            );
        }

        $items = [];

        foreach ($payload['feed'] as $index => $entry) {
            if (! is_array($entry)) {
                throw new RuntimeException(
                    'Alpha Vantage feed item is invalid at index '
                    . $index
                    . '.'
                );
            }

            $items[] = $this->normalizeEntry($entry);
        }

        return $items;
    }

    private function readJson(string $input): string
    {
        $input = trim($input);

        if (preg_match('#^https?://#i', $input) === 1) {
            throw new InvalidArgumentException(
                'Live HTTP input is not permitted.'
            );
        }

        if (! is_file($input)) {
            return $input;
        }

        $json = file_get_contents($input);

        if ($json === false) {
            throw new RuntimeException(
                'Unable to read Alpha Vantage fixture.'
            );
        }

        return $json;
    }

    private function normalizeEntry(array $entry): array
    {
        $title = trim((string) ($entry['title'] ?? ''));
        $summary = trim((string) ($entry['summary'] ?? ''));
        $url = trim((string) ($entry['url'] ?? ''));
        $publishedValue = trim(
            (string) ($entry['time_published'] ?? '')
        );

        $this->assertCanonicalUrl($url);

        $authors = $this->normalizeStringList(
            $entry['authors'] ?? []
        );
        $topics = $this->normalizeTopics(
            $entry['topics'] ?? []
        );
        $tickers = $this->normalizeTickers(
            $entry['ticker_sentiment'] ?? []
        );

        $relevanceScores = [];

        foreach ($topics as $topic) {
            $relevanceScores[] = $topic['relevance_score'];
        }

        foreach ($tickers as $ticker) {
            $relevanceScores[] = $ticker['relevance_score'];
        }

        $sentimentScore = $this->nullableFloat(
            $entry['overall_sentiment_score'] ?? null
        );
        $sentimentLabel = trim(
            (string) ($entry['overall_sentiment_label'] ?? '')
        );

        return [
            'external_item_id' => hash(
                'sha256',
                $url . '|' . $publishedValue . '|' . $title
            ),
            'title' => $title,
            'summary' => $summary,
            'canonical_url' => $url,
            'published_at' => $this->normalizePublishedAt(
                $publishedValue
            ),
            'authors' => $authors,
            'source' => trim(
                (string) ($entry['source'] ?? '')
            ),
            'source_domain' => trim(
                (string) ($entry['source_domain'] ?? '')
            ),
            'topics' => $topics,
            'tickers' => $tickers,
            'relevance_score' => $relevanceScores === []
                ? null
                : max($relevanceScores),
            'sentiment_score' => $sentimentScore,
            'sentiment_label' => $sentimentLabel,
            'raw_metadata' => [
                'authors' => $authors,
                'source' => trim(
                    (string) ($entry['source'] ?? '')
                ),
                'source_domain' => trim(
                    (string) ($entry['source_domain'] ?? '')
                ),
                'topics' => $topics,
                'tickers' => $tickers,
                'overall_sentiment_score' => $sentimentScore,
                'overall_sentiment_label' => $sentimentLabel,
                'banner_image' => trim(
                    (string) ($entry['banner_image'] ?? '')
                ),
                'category_within_source' => trim(
                    (string) (
                        $entry['category_within_source']
                        ?? ''
                    )
                ),
            ],
        ];
    }

    private function assertCanonicalUrl(string $url): void
    {
        if (
            $url === ''
            || filter_var($url, FILTER_VALIDATE_URL) === false
        ) {
            throw new InvalidArgumentException(
                'Alpha Vantage canonical URL is missing or invalid.'
            );
        }

        $scheme = strtolower(
            (string) parse_url($url, PHP_URL_SCHEME)
        );

        if (! in_array($scheme, ['http', 'https'], true)) {
            throw new InvalidArgumentException(
                'Unsupported Alpha Vantage URL scheme.'
            );
        }
    }

    private function normalizePublishedAt(string $value): ?string
    {
        if ($value === '') {
            return null;
        }

        $timezone = new DateTimeZone('UTC');
        $date = DateTimeImmutable::createFromFormat(
            '!Ymd\THis',
            $value,
            $timezone
        );

        if ($date instanceof DateTimeImmutable) {
            return $date->format('Y-m-d H:i:s');
        }

        try {
            return (new DateTimeImmutable($value))
                ->setTimezone($timezone)
                ->format('Y-m-d H:i:s');
        } catch (Throwable) {
            return null;
        }
    }

    private function normalizeStringList(mixed $value): array
    {
        if (is_string($value)) {
            $value = [$value];
        }

        if (! is_array($value)) {
            return [];
        }

        $values = [];

        foreach ($value as $item) {
            $item = trim((string) $item);

            if ($item !== '') {
                $values[] = $item;
            }
        }

        return array_values(array_unique($values));
    }

    private function normalizeTopics(mixed $value): array
    {
        if (! is_array($value)) {
            return [];
        }

        $topics = [];

        foreach ($value as $item) {
            if (! is_array($item)) {
                continue;
            }

            $topic = trim((string) ($item['topic'] ?? ''));

            if ($topic === '') {
                continue;
            }

            $topics[] = [
                'topic' => $topic,
                'relevance_score' => (
                    $this->nullableFloat(
                        $item['relevance_score'] ?? null
                    )
                    ?? 0.0
                ),
            ];
        }

        return $topics;
    }

    private function normalizeTickers(mixed $value): array
    {
        if (! is_array($value)) {
            return [];
        }

        $tickers = [];

        foreach ($value as $item) {
            if (! is_array($item)) {
                continue;
            }

            $ticker = strtoupper(
                trim((string) ($item['ticker'] ?? ''))
            );

            if ($ticker === '') {
                continue;
            }

            $tickers[] = [
                'ticker' => $ticker,
                'relevance_score' => (
                    $this->nullableFloat(
                        $item['relevance_score'] ?? null
                    )
                    ?? 0.0
                ),
                'sentiment_score' => $this->nullableFloat(
                    $item['ticker_sentiment_score'] ?? null
                ),
                'sentiment_label' => trim(
                    (string) (
                        $item['ticker_sentiment_label']
                        ?? ''
                    )
                ),
            ];
        }

        return $tickers;
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
}
