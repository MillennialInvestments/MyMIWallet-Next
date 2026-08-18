<?php

declare(strict_types=1);

namespace Tests\Unit\Marketing\MarketFeed;

use App\Services\Marketing\MarketFeed\MarketFeedNormalizerService;
use CodeIgniter\Test\CIUnitTestCase;
use InvalidArgumentException;

final class MarketFeedNormalizerServiceTest extends CIUnitTestCase
{
    public function testNormalizesDeterministicIdentityAndFields(): void
    {
        $service = new MarketFeedNormalizerService();
        $result = $service->normalize(' federal_reserve ', [
            'external_item_id' => 'fixture-001',
            'title' => ' Fixture title ',
            'summary' => ' Fixture summary ',
            'canonical_url' => 'https://example.test/item',
            'published_at' => '2026-07-01T12:00:00+00:00',
            'collected_at' => '2026-07-01 13:00:00',
            'metadata' => ['b' => 2, 'a' => 1],
        ]);

        $this->assertSame(
            hash('sha256', 'federal_reserve|fixture-001'),
            $result['identity_sha256']
        );
        $this->assertSame('federal_reserve', $result['source_key']);
        $this->assertSame('Fixture title', $result['title']);
        $this->assertSame('Fixture summary', $result['summary']);
        $this->assertSame('2026-07-01 12:00:00', $result['published_at']);
        $this->assertSame('2026-07-01 13:00:00', $result['collected_at']);
    }

    public function testFallsBackToCanonicalUrlForIdentity(): void
    {
        $result = (new MarketFeedNormalizerService())->normalize('federal_reserve', [
            'canonical_url' => 'https://example.test/fallback',
            'title' => 'Fallback',
            'collected_at' => '2026-07-01 13:00:00',
        ]);

        $this->assertSame(
            hash('sha256', 'federal_reserve|https://example.test/fallback'),
            $result['identity_sha256']
        );
    }

    public function testMetadataEncodingIsDeterministic(): void
    {
        $service = new MarketFeedNormalizerService();
        $first = $service->normalize('federal_reserve', [
            'external_item_id' => 'fixture-002',
            'collected_at' => '2026-07-01 13:00:00',
            'metadata' => ['b' => 2, 'a' => 1],
        ]);
        $second = $service->normalize('federal_reserve', [
            'metadata' => ['a' => 1, 'b' => 2],
            'collected_at' => '2026-07-01 13:00:00',
            'external_item_id' => 'fixture-002',
        ]);

        $this->assertSame($first['payload_sha256'], $second['payload_sha256']);
        $this->assertSame(
            $first['normalized_metadata_json'],
            $second['normalized_metadata_json']
        );
    }

    public function testMissingCollectedAtFallsBackToPublishedAt(): void
    {
        $result = (new MarketFeedNormalizerService())->normalize('federal_reserve', [
            'external_item_id' => 'fixture-003',
            'published_at' => '2026-07-02T15:30:00-05:00',
        ]);

        $this->assertSame('2026-07-02 20:30:00', $result['published_at']);
        $this->assertSame('2026-07-02 20:30:00', $result['collected_at']);
    }

    public function testInvalidCollectedAtFallsBackToPublishedAt(): void
    {
        $result = (new MarketFeedNormalizerService())->normalize('federal_reserve', [
            'external_item_id' => 'fixture-004',
            'published_at' => '2026-07-03 09:00:00 UTC',
            'collected_at' => 'not-a-date',
        ]);

        $this->assertSame('2026-07-03 09:00:00', $result['collected_at']);
    }

    public function testMissingDatesRemainNullAndDeterministic(): void
    {
        $service = new MarketFeedNormalizerService();
        $item = ['external_item_id' => 'fixture-005', 'title' => 'No dates'];

        $first = $service->normalize('federal_reserve', $item);
        $second = $service->normalize('federal_reserve', $item);

        $this->assertNull($first['published_at']);
        $this->assertNull($first['collected_at']);
        $this->assertSame($first, $second);
    }

    public function testNormalizesFirstClassSentimentFields(): void
    {
        $result = (new MarketFeedNormalizerService())->normalize(
            'alpha_vantage',
            [
                'external_item_id' => 'sentiment-001',
                'relevance_score' => '0.85000000',
                'sentiment_score' => '-0.10000000',
                'sentiment_label' => ' negative ',
            ]
        );

        $this->assertSame(0.85, $result['relevance_score']);
        $this->assertSame(-0.1, $result['sentiment_score']);
        $this->assertSame('negative', $result['sentiment_label']);
    }

    public function testMissingSentimentFieldsRemainNull(): void
    {
        $result = (new MarketFeedNormalizerService())->normalize(
            'alpha_vantage',
            ['external_item_id' => 'sentiment-002']
        );

        $this->assertNull($result['relevance_score']);
        $this->assertNull($result['sentiment_score']);
        $this->assertNull($result['sentiment_label']);
    }

    public function testInvalidSentimentFieldsRemainNull(): void
    {
        $result = (new MarketFeedNormalizerService())->normalize(
            'alpha_vantage',
            [
                'external_item_id' => 'sentiment-003',
                'relevance_score' => '',
                'sentiment_score' => 'not-numeric',
                'sentiment_label' => '   ',
            ]
        );

        $this->assertNull($result['relevance_score']);
        $this->assertNull($result['sentiment_score']);
        $this->assertNull($result['sentiment_label']);
    }

    public function testSentimentMetadataHashingRemainsDeterministic(): void
    {
        $service = new MarketFeedNormalizerService();

        $first = $service->normalize('alpha_vantage', [
            'external_item_id' => 'sentiment-004',
            'relevance_score' => 0.75,
            'sentiment_score' => 0.25,
            'sentiment_label' => 'Neutral',
            'metadata' => ['b' => 2, 'a' => 1],
        ]);

        $second = $service->normalize('alpha_vantage', [
            'metadata' => ['a' => 1, 'b' => 2],
            'sentiment_label' => 'Neutral',
            'sentiment_score' => 0.25,
            'relevance_score' => 0.75,
            'external_item_id' => 'sentiment-004',
        ]);

        $this->assertSame(
            $first['identity_sha256'],
            $second['identity_sha256']
        );
        $this->assertSame(
            $first['payload_sha256'],
            $second['payload_sha256']
        );
        $this->assertSame(
            $first['normalized_metadata_json'],
            $second['normalized_metadata_json']
        );
    }

    public function testSensitiveMetadataIsNotPersistedIntoNormalizedJson(): void
    {
        $result = (new MarketFeedNormalizerService())->normalize(
            'alpha_vantage',
            [
                'external_item_id' => 'sentiment-005',
                'metadata' => [
                    'safe' => 'preserved',
                    'api_key' => 'must-not-survive',
                ],
                'authorization' => 'Bearer must-not-survive',
            ]
        );

        $metadata = json_decode(
            $result['normalized_metadata_json'],
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $this->assertArrayNotHasKey('authorization', $metadata);
        $this->assertSame('preserved', $metadata['metadata']['safe']);
        $this->assertArrayNotHasKey(
            'api_key',
            $metadata['metadata']
        );
    }

    public function testRejectsMissingIdentityInputs(): void
    {
        $this->expectException(InvalidArgumentException::class);

        (new MarketFeedNormalizerService())->normalize(
            'federal_reserve',
            ['title' => 'No identity']
        );
    }
}
