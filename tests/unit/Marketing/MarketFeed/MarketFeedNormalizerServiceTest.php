<?php

namespace Tests\Unit\Marketing\MarketFeed;

use App\Services\Marketing\MarketFeed\MarketFeedNormalizerService;
use CodeIgniter\Test\CIUnitTestCase;
use InvalidArgumentException;

final class MarketFeedNormalizerServiceTest extends CIUnitTestCase
{
    public function testNormalizesDeterministicIdentityAndFields(): void
    {
        $service = new MarketFeedNormalizerService();

        $result = $service->normalize(
            ' federal_reserve ',
            [
                'external_item_id' => 'fixture-001',
                'title' => ' Fixture title ',
                'summary' => ' Fixture summary ',
                'canonical_url' =>
                    'https://example.test/item',
                'published_at' =>
                    '2026-07-01T12:00:00+00:00',
                'collected_at' =>
                    '2026-07-01 13:00:00',
                'metadata' => [
                    'b' => 2,
                    'a' => 1,
                ],
            ]
        );

        $this->assertSame(
            hash(
                'sha256',
                'federal_reserve|fixture-001'
            ),
            $result['identity_sha256']
        );
        $this->assertSame(
            'federal_reserve',
            $result['source_key']
        );
        $this->assertSame(
            'Fixture title',
            $result['title']
        );
        $this->assertSame(
            'Fixture summary',
            $result['summary']
        );
        $this->assertSame(
            '2026-07-01 12:00:00',
            $result['published_at']
        );
    }

    public function testFallsBackToCanonicalUrlForIdentity(): void
    {
        $service = new MarketFeedNormalizerService();

        $result = $service->normalize(
            'federal_reserve',
            [
                'canonical_url' =>
                    'https://example.test/fallback',
                'title' => 'Fallback',
                'collected_at' =>
                    '2026-07-01 13:00:00',
            ]
        );

        $this->assertSame(
            hash(
                'sha256',
                'federal_reserve|'
                . 'https://example.test/fallback'
            ),
            $result['identity_sha256']
        );
    }

    public function testMetadataEncodingIsDeterministic(): void
    {
        $service = new MarketFeedNormalizerService();

        $first = $service->normalize(
            'federal_reserve',
            [
                'external_item_id' => 'fixture-002',
                'collected_at' =>
                    '2026-07-01 13:00:00',
                'metadata' => [
                    'b' => 2,
                    'a' => 1,
                ],
            ]
        );

        $second = $service->normalize(
            'federal_reserve',
            [
                'metadata' => [
                    'a' => 1,
                    'b' => 2,
                ],
                'collected_at' =>
                    '2026-07-01 13:00:00',
                'external_item_id' => 'fixture-002',
            ]
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

    public function testRejectsMissingIdentityInputs(): void
    {
        $this->expectException(
            InvalidArgumentException::class
        );

        (
            new MarketFeedNormalizerService()
        )->normalize(
            'federal_reserve',
            ['title' => 'No identity']
        );
    }
}
