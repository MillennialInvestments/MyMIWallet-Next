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
            throw new InvalidArgumentException(
                'Market-feed source key is required.'
            );
        }

        $externalItemId = trim((string) (
            $item['external_item_id']
            ?? $item['guid']
            ?? ''
        ));

        $canonicalUrl = $this->normalizeCanonicalUrl(
            $item['canonical_url']
            ?? $item['link']
            ?? null
        );

        if ($externalItemId === '' && $canonicalUrl === null) {
            throw new InvalidArgumentException(
                'External item ID or canonical URL is required.'
            );
        }

        $title = $this->sanitizeText(
            $item['title']
            ?? $item['headline']
            ?? ''
        );

        $summary = $this->sanitizeText(
            $item['summary']
            ?? $item['description']
            ?? ''
        );

        $source = $this->nullableString(
            $item['source']
            ?? $item['source_name']
            ?? null
        );

        $authors = $this->normalizeAuthors(
            $item['authors']
            ?? ($item['raw_metadata']['authors'] ?? [])
        );

        $topics = $this->normalizeTopics(
            $item['topics']
            ?? ($item['raw_metadata']['topics'] ?? [])
        );

        $tickers = $this->normalizeTickers(
            $item['tickers']
            ?? ($item['raw_metadata']['tickers'] ?? [])
        );

        $publishedAt = $this->normalizeDate(
            $item['published_at']
            ?? $item['pubDate']
            ?? null
        );

        $collectedAt = $this->normalizeDate(
            $item['collected_at'] ?? null
        ) ?? $publishedAt;

        $relevanceScore = $this->nullableFloat(
            $item['relevance_score'] ?? null
        );

        $sentimentScore = $this->nullableFloat(
            $item['sentiment_score'] ?? null
        );

        $sentimentLabel = $this->nullableString(
            $item['sentiment_label'] ?? null
        );

        $metadataItem = $item;
        $metadataItem['title'] = $title;
        $metadataItem['summary'] = $summary;
        $metadataItem['canonical_url'] = $canonicalUrl;
        $metadataItem['published_at'] = $publishedAt;
        $metadataItem['collected_at'] = $collectedAt;
        $metadataItem['source'] = $source;
        $metadataItem['authors'] = $authors;
        $metadataItem['topics'] = $topics;
        $metadataItem['tickers'] = $tickers;
        $metadataItem['relevance_score'] = $relevanceScore;
        $metadataItem['sentiment_score'] = $sentimentScore;
        $metadataItem['sentiment_label'] = $sentimentLabel;

        $metadataItem = $this->sanitizeMetadata(
            $metadataItem
        );

        $sortedItem = $this->sortRecursively(
            $metadataItem
        );

        $metadataJson = $this->encode(
            $sortedItem
        );

        $identityValue = $externalItemId !== ''
            ? $externalItemId
            : (string) $canonicalUrl;

        return [
            'identity_sha256' => hash(
                'sha256',
                $sourceKey . '|' . $identityValue
            ),
            'source_key' => $sourceKey,
            'external_item_id' =>
                $externalItemId !== ''
                    ? $externalItemId
                    : null,
            'title' => $title,
            'summary' => $summary,
            'source' => $source,
            'authors' => $authors,
            'canonical_url' => $canonicalUrl,
            'published_at' => $publishedAt,
            'collected_at' => $collectedAt,
            'tickers' => $tickers,
            'topics' => $topics,
            'payload_sha256' => hash(
                'sha256',
                $metadataJson
            ),
            'normalized_metadata_json' => $metadataJson,
            'relevance_score' => $relevanceScore,
            'sentiment_score' => $sentimentScore,
            'sentiment_label' => $sentimentLabel,
        ];
    }

    /**
     * @param array<int, array<string, mixed>> $items
     * @return array<int, array<string, mixed>>
     */
    public function rankAndDedupe(
        array $items,
        DateTimeImmutable|string|null $referenceTime = null
    ): array {
        $reference = $this->resolveReferenceTime(
            $items,
            $referenceTime
        );

        $deduped = [];

        foreach ($items as $item) {
            if (! is_array($item)) {
                throw new InvalidArgumentException(
                    'Rank input must contain normalized feed items.'
                );
            }

            $identity = strtolower(
                trim((string) (
                    $item['identity_sha256']
                    ?? ''
                ))
            );

            if (
                preg_match(
                    '/^[0-9a-f]{64}$/',
                    $identity
                ) !== 1
            ) {
                throw new InvalidArgumentException(
                    'Normalized feed identity is required for ranking.'
                );
            }

            $item['identity_sha256'] = $identity;

            if (
                ! isset($deduped[$identity])
                || $this->candidateWinsDuplicate(
                    $item,
                    $deduped[$identity]
                )
            ) {
                $deduped[$identity] = $item;
            }
        }

        $ranked = [];

        foreach ($deduped as $item) {
            $providerRelevance = $this->clamp01(
                (float) (
                    $item['relevance_score']
                    ?? 0.0
                )
            );

            $recency = $this->recencyScore(
                $item,
                $reference
            );

            $sentimentMagnitude = $this->clamp01(
                abs(
                    (float) (
                        $item['sentiment_score']
                        ?? 0.0
                    )
                )
            );

            $strategic = $this->strategicRelevance(
                $item
            );

            $score = round(
                ($providerRelevance * 0.45)
                + ($recency * 0.30)
                + ($sentimentMagnitude * 0.15)
                + ($strategic * 0.10),
                8
            );

            $item['rank_score'] = $score;
            $item['ranking_components'] = [
                'provider_relevance' =>
                    $providerRelevance,
                'recency' => $recency,
                'sentiment_magnitude' =>
                    $sentimentMagnitude,
                'strategic_relevance' =>
                    $strategic,
            ];

            $ranked[] = $item;
        }

        usort(
            $ranked,
            function (array $left, array $right): int {
                $score = (
                    (float) ($right['rank_score'] ?? 0.0)
                ) <=> (
                    (float) ($left['rank_score'] ?? 0.0)
                );

                if ($score !== 0) {
                    return $score;
                }

                $published = $this->timestampRank(
                    $right['published_at']
                    ?? $right['collected_at']
                    ?? null
                ) <=> $this->timestampRank(
                    $left['published_at']
                    ?? $left['collected_at']
                    ?? null
                );

                if ($published !== 0) {
                    return $published;
                }

                return strcmp(
                    (string) (
                        $left['identity_sha256']
                        ?? ''
                    ),
                    (string) (
                        $right['identity_sha256']
                        ?? ''
                    )
                );
            }
        );

        return array_values($ranked);
    }

    private function normalizeCanonicalUrl(
        mixed $value
    ): ?string {
        if ($value === null) {
            return null;
        }

        $url = trim((string) $value);

        if ($url === '') {
            return null;
        }

        if (
            filter_var(
                $url,
                FILTER_VALIDATE_URL
            ) === false
        ) {
            throw new InvalidArgumentException(
                'Market-feed canonical URL is invalid.'
            );
        }

        $parts = parse_url($url);

        if (! is_array($parts)) {
            throw new InvalidArgumentException(
                'Market-feed canonical URL is invalid.'
            );
        }

        $scheme = strtolower(
            (string) ($parts['scheme'] ?? '')
        );

        if (
            ! in_array(
                $scheme,
                ['http', 'https'],
                true
            )
        ) {
            throw new InvalidArgumentException(
                'Market-feed canonical URL scheme is unsupported.'
            );
        }

        if (
            isset($parts['user'])
            || isset($parts['pass'])
        ) {
            throw new InvalidArgumentException(
                'Market-feed canonical URL credentials are prohibited.'
            );
        }

        $host = strtolower(
            trim(
                (string) ($parts['host'] ?? ''),
                '.'
            )
        );

        if (
            $host === ''
            || ! str_contains($host, '.')
            || preg_match(
                '/^[a-z0-9.-]+$/',
                $host
            ) !== 1
        ) {
            throw new InvalidArgumentException(
                'Market-feed canonical URL host is invalid.'
            );
        }

        $port = isset($parts['port'])
            ? (int) $parts['port']
            : null;

        if (
            ($scheme === 'http' && $port === 80)
            || (
                $scheme === 'https'
                && $port === 443
            )
        ) {
            $port = null;
        }

        $path = (string) (
            $parts['path']
            ?? '/'
        );

        if ($path === '') {
            $path = '/';
        }

        $query = $this->normalizeQuery(
            (string) (
                $parts['query']
                ?? ''
            )
        );

        return $scheme
            . '://'
            . $host
            . (
                $port !== null
                    ? ':' . $port
                    : ''
            )
            . $path
            . (
                $query !== ''
                    ? '?' . $query
                    : ''
            );
    }

    private function normalizeQuery(
        string $query
    ): string {
        $query = trim($query);

        if ($query === '') {
            return '';
        }

        $pairs = [];

        foreach (explode('&', $query) as $pair) {
            if ($pair === '') {
                continue;
            }

            $parts = explode(
                '=',
                $pair,
                2
            );

            $key = rawurlencode(
                rawurldecode($parts[0])
            );

            if (array_key_exists(1, $parts)) {
                $pairs[] = $key
                    . '='
                    . rawurlencode(
                        rawurldecode(
                            $parts[1]
                        )
                    );
            } else {
                $pairs[] = $key;
            }
        }

        sort(
            $pairs,
            SORT_STRING
        );

        return implode(
            '&',
            $pairs
        );
    }

    private function sanitizeText(
        mixed $value
    ): string {
        $text = (string) $value;

        $text = preg_replace(
            '#<(script|style)\b[^>]*>.*?</\1>#is',
            ' ',
            $text
        ) ?? $text;

        $text = strip_tags($text);

        $text = html_entity_decode(
            $text,
            ENT_QUOTES | ENT_HTML5,
            'UTF-8'
        );

        return trim(
            preg_replace(
                '/\s+/u',
                ' ',
                $text
            ) ?? $text
        );
    }

    private function normalizeAuthors(
        mixed $value
    ): array {
        if (is_string($value)) {
            $value = [$value];
        }

        if (! is_array($value)) {
            return [];
        }

        $authors = [];

        foreach ($value as $candidate) {
            if (! is_scalar($candidate)) {
                continue;
            }

            $author = $this->sanitizeText(
                $candidate
            );

            if ($author === '') {
                continue;
            }

            $key = strtolower($author);

            if (! isset($authors[$key])) {
                $authors[$key] = $author;
            }
        }

        $authors = array_values($authors);

        usort(
            $authors,
            static function (
                string $left,
                string $right
            ): int {
                return strcasecmp(
                    $left,
                    $right
                ) ?: strcmp(
                    $left,
                    $right
                );
            }
        );

        return $authors;
    }

    private function normalizeTopics(
        mixed $value
    ): array {
        if (! is_array($value)) {
            return [];
        }

        $topics = [];

        foreach ($value as $candidate) {
            if (is_string($candidate)) {
                $topic = $this->sanitizeText(
                    $candidate
                );

                $score = null;
            } elseif (is_array($candidate)) {
                $topic = $this->sanitizeText(
                    $candidate['topic']
                    ?? $candidate['name']
                    ?? ''
                );

                $score = $this->nullableFloat(
                    $candidate['relevance_score']
                    ?? null
                );
            } else {
                continue;
            }

            if ($topic === '') {
                continue;
            }

            $key = strtolower($topic);

            $normalized = [
                'topic' => $topic,
                'relevance_score' => $score,
            ];

            if (
                ! isset($topics[$key])
                || (
                    ($score ?? -1.0)
                    >
                    (
                        $topics[$key][
                            'relevance_score'
                        ]
                        ?? -1.0
                    )
                )
            ) {
                $topics[$key] = $normalized;
            }
        }

        $topics = array_values($topics);

        usort(
            $topics,
            static fn (
                array $left,
                array $right
            ): int =>
                strcasecmp(
                    (string) $left['topic'],
                    (string) $right['topic']
                ) ?: strcmp(
                    (string) $left['topic'],
                    (string) $right['topic']
                )
        );

        return $topics;
    }

    private function normalizeTickers(
        mixed $value
    ): array {
        if (! is_array($value)) {
            return [];
        }

        $tickers = [];

        foreach ($value as $candidate) {
            if (is_string($candidate)) {
                $ticker = strtoupper(
                    trim($candidate)
                );

                $relevance = null;
                $sentiment = null;
                $label = null;
            } elseif (is_array($candidate)) {
                $ticker = strtoupper(
                    trim(
                        (string) (
                            $candidate['ticker']
                            ?? $candidate['symbol']
                            ?? ''
                        )
                    )
                );

                $relevance = $this->nullableFloat(
                    $candidate['relevance_score']
                    ?? null
                );

                $sentiment = $this->nullableFloat(
                    $candidate['sentiment_score']
                    ?? $candidate[
                        'ticker_sentiment_score'
                    ]
                    ?? null
                );

                $label = $this->nullableString(
                    $candidate['sentiment_label']
                    ?? $candidate[
                        'ticker_sentiment_label'
                    ]
                    ?? null
                );
            } else {
                continue;
            }

            if (
                $ticker === ''
                || preg_match(
                    '/^[A-Z0-9][A-Z0-9.^=-]{0,19}$/',
                    $ticker
                ) !== 1
            ) {
                continue;
            }

            $normalized = [
                'ticker' => $ticker,
                'relevance_score' =>
                    $relevance,
                'sentiment_score' =>
                    $sentiment,
                'sentiment_label' =>
                    $label,
            ];

            if (
                ! isset($tickers[$ticker])
                || (
                    ($relevance ?? -1.0)
                    >
                    (
                        $tickers[$ticker][
                            'relevance_score'
                        ]
                        ?? -1.0
                    )
                )
            ) {
                $tickers[$ticker] = $normalized;
            }
        }

        ksort(
            $tickers,
            SORT_STRING
        );

        return array_values($tickers);
    }

    private function candidateWinsDuplicate(
        array $candidate,
        array $current
    ): bool {
        foreach (
            ['collected_at', 'published_at']
            as $field
        ) {
            $left = $this->timestampRank(
                $candidate[$field] ?? null
            );

            $right = $this->timestampRank(
                $current[$field] ?? null
            );

            if ($left !== $right) {
                return $left > $right;
            }
        }

        return strcmp(
            (string) (
                $candidate['payload_sha256']
                ?? ''
            ),
            (string) (
                $current['payload_sha256']
                ?? ''
            )
        ) > 0;
    }

    private function resolveReferenceTime(
        array $items,
        DateTimeImmutable|string|null $referenceTime
    ): DateTimeImmutable {
        $utc = new DateTimeZone('UTC');

        if (
            $referenceTime
            instanceof DateTimeImmutable
        ) {
            return $referenceTime->setTimezone(
                $utc
            );
        }

        if (is_string($referenceTime)) {
            try {
                return (
                    new DateTimeImmutable(
                        $referenceTime
                    )
                )->setTimezone($utc);
            } catch (Throwable) {
                throw new InvalidArgumentException(
                    'Ranking reference time is invalid.'
                );
            }
        }

        $latest = null;

        foreach ($items as $item) {
            if (! is_array($item)) {
                continue;
            }

            foreach (
                ['collected_at', 'published_at']
                as $field
            ) {
                $timestamp = $this->timestampRank(
                    $item[$field] ?? null
                );

                if (
                    $timestamp > 0
                    && (
                        $latest === null
                        || $timestamp > $latest
                    )
                ) {
                    $latest = $timestamp;
                }
            }
        }

        return (
            new DateTimeImmutable(
                '@' . ($latest ?? 0)
            )
        )->setTimezone($utc);
    }

    private function recencyScore(
        array $item,
        DateTimeImmutable $reference
    ): float {
        $timestamp = $this->timestampRank(
            $item['published_at']
            ?? $item['collected_at']
            ?? null
        );

        if ($timestamp <= 0) {
            return 0.0;
        }

        $age = max(
            0,
            $reference->getTimestamp()
            - $timestamp
        );

        $window = 7 * 24 * 60 * 60;

        return round(
            max(
                0.0,
                1.0 - ($age / $window)
            ),
            8
        );
    }

    private function strategicRelevance(
        array $item
    ): float {
        $parts = [
            (string) ($item['title'] ?? ''),
            (string) ($item['summary'] ?? ''),
            (string) ($item['source'] ?? ''),
        ];

        foreach (
            ($item['topics'] ?? [])
            as $topic
        ) {
            if (is_array($topic)) {
                $parts[] = (string) (
                    $topic['topic']
                    ?? ''
                );
            }
        }

        $text = strtolower(
            implode(
                ' ',
                $parts
            )
        );

        $categories = [
            [
                'financial market',
                'markets',
                'equity',
                'stocks',
                'bonds',
                'yield',
                'index',
            ],
            [
                'federal reserve',
                'monetary',
                'interest rate',
                'inflation',
                'central bank',
            ],
            [
                'fiscal',
                'treasury',
                'budget',
                'tax',
                'government spending',
            ],
            [
                'technology',
                'tech',
                'artificial intelligence',
                'semiconductor',
                'software',
            ],
            [
                'blockchain',
                'bitcoin',
                'crypto',
                'ethereum',
            ],
        ];

        $matched = 0;

        foreach ($categories as $keywords) {
            foreach ($keywords as $keyword) {
                if (
                    str_contains(
                        $text,
                        $keyword
                    )
                ) {
                    $matched++;

                    break;
                }
            }
        }

        return $matched / count($categories);
    }

    private function timestampRank(
        mixed $value
    ): int {
        if ($value === null) {
            return 0;
        }

        $text = trim((string) $value);

        if ($text === '') {
            return 0;
        }

        try {
            return (
                new DateTimeImmutable($text)
            )->getTimestamp();
        } catch (Throwable) {
            return 0;
        }
    }

    private function clamp01(
        float $value
    ): float {
        return max(
            0.0,
            min(
                1.0,
                $value
            )
        );
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

        $text = $this->sanitizeText(
            $value
        );

        return $text === ''
            ? null
            : $text;
    }

    private function sanitizeMetadata(
        mixed $value
    ): mixed {
        if (is_string($value)) {
            return $this->sanitizeText(
                $value
            );
        }

        if (! is_array($value)) {
            return $value;
        }

        $sanitized = [];

        foreach ($value as $key => $child) {
            if (
                is_string($key)
                && (
                    $this->isSensitiveMetadataKey(
                        $key
                    )
                    || $this->isFullBodyMetadataKey(
                        $key
                    )
                )
            ) {
                continue;
            }

            $sanitized[$key] =
                $this->sanitizeMetadata(
                    $child
                );
        }

        return $sanitized;
    }

    private function isSensitiveMetadataKey(
        string $key
    ): bool {
        return preg_match(
            '/(?:api[_-]?key|authorization|password|secret|credential|access[_-]?token|refresh[_-]?token|request[_-]?headers?|response[_-]?headers?|headers?)/i',
            $key
        ) === 1;
    }

    private function isFullBodyMetadataKey(
        string $key
    ): bool {
        return preg_match(
            '/^(?:full[_-]?(?:text|content|body)|article[_-]?body|raw[_-]?html|body[_-]?html|article[_-]?html|content[_-]?html)$/i',
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
