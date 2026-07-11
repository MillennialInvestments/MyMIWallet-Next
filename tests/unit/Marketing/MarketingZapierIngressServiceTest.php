<?php

declare(strict_types=1);

namespace Tests\Unit\Marketing;

use App\Services\Marketing\MarketingZapierIngressService;
use CodeIgniter\Test\CIUnitTestCase;

final class MarketingZapierIngressServiceTest extends CIUnitTestCase
{
    private MarketingZapierIngressService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = new MarketingZapierIngressService();
    }

    public function testValidContractReturnsAcceptedPreview(): void
    {
        $result = $this->service->preview(
            'rss-by-zapier',
            'unit-test-key-001',
            $this->validPayload()
        );

        $this->assertSame(202, $result['status_code']);
        $this->assertSame(
            'accepted_preview',
            $result['body']['status']
        );
        $this->assertFalse(
            $result['body']['meta']['persisted']
        );
        $this->assertFalse(
            $result['body']['meta']['external_calls']
        );
    }

    public function testMissingGuidReturnsValidationFailure(): void
    {
        $payload = $this->validPayload();
        unset($payload['item_guid']);

        $result = $this->service->preview(
            'rss-by-zapier',
            'unit-test-key-002',
            $payload
        );

        $this->assertSame(422, $result['status_code']);
        $this->assertSame(
            'missing_required_fields',
            $result['body']['error']['code']
        );
    }

    public function testUnsupportedUrlSchemeIsRejected(): void
    {
        $payload = $this->validPayload();
        $payload['canonical_url'] = 'file:///tmp/example';

        $result = $this->service->preview(
            'rss-by-zapier',
            'unit-test-key-003',
            $payload
        );

        $this->assertSame(422, $result['status_code']);
        $this->assertSame(
            'invalid_url',
            $result['body']['error']['code']
        );
    }

    public function testCanonicalHashIgnoresAssociativeKeyOrder(): void
    {
        $first = $this->validPayload();
        $second = array_reverse($first, true);

        $firstResult = $this->service->preview(
            'rss-by-zapier',
            'unit-test-key-004',
            $first
        );

        $secondResult = $this->service->preview(
            'rss-by-zapier',
            'unit-test-key-004',
            $second
        );

        $this->assertSame(
            $firstResult['body']['data']['request_hash'],
            $secondResult['body']['data']['request_hash']
        );
    }

    public function testEmptyCategoriesAreRejected(): void
    {
        $payload = $this->validPayload();
        $payload['categories'] = [];

        $result = $this->service->preview(
            'rss-by-zapier',
            'unit-test-key-005',
            $payload
        );

        $this->assertSame(422, $result['status_code']);
        $this->assertSame(
            'missing_required_fields',
            $result['body']['error']['code']
        );
    }

    public function testInvalidRawPayloadHashIsRejected(): void
    {
        $payload = $this->validPayload();
        $payload['raw_payload_hash'] = 'not-a-sha256-hash';

        $result = $this->service->preview(
            'rss-by-zapier',
            'unit-test-key-006',
            $payload
        );

        $this->assertSame(422, $result['status_code']);
        $this->assertSame(
            'invalid_raw_payload_hash',
            $result['body']['error']['code']
        );
    }

    private function validPayload(): array
    {
        return [
            'source_type' => 'rss',
            'source_name' => 'Example Feed',
            'source_domain' => 'example.com',
            'feed_url' => 'https://example.com/feed.xml',
            'item_guid' => 'example-item-guid',
            'title' => 'Example Market Story',
            'canonical_url' => 'https://example.com/story',
            'published_at' => '2026-07-11T14:00:00Z',
            'retrieved_at' => '2026-07-11T14:05:00Z',
            'author' => 'Example Author',
            'summary' => 'Example summary.',
            'content' => 'Example article content.',
            'categories' => ['markets'],
            'raw_payload_hash' => hash('sha256', 'unit-sample'),
            'metadata' => [
                'test' => true,
            ],
        ];
    }
}
