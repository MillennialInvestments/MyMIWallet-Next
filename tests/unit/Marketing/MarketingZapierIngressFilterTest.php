<?php

declare(strict_types=1);

namespace Tests\Unit\Marketing;

use App\Filters\MarketingZapierIngressFilter;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Services;

final class MarketingZapierIngressFilterTest extends CIUnitTestCase
{
    /** @var array<string,mixed> */
    private array $originalConfig;

    /** @var array<string,string> */
    private array $validHeaders;

    protected function setUp(): void
    {
        parent::setUp();

        $marketing = config('Marketing');

        $this->originalConfig = $marketing->zapierIngress;

        $marketing->zapierIngress = array_replace(
            $this->originalConfig,
            [
                'enabled' => true,
                'webhook_key' => 'gt-nh-005-unit-secret',
                'contract_test_enabled' => true,
                'max_bytes' => 1024,
                'rate_limit' => 60,
                'allowed_sources' => [
                    'rss-by-zapier',
                    'zapier',
                ],
            ]
        );

        $this->validHeaders = [
            'Content-Type' => 'application/json',
            'X-MyMI-Source' => 'rss-by-zapier',
            'X-MyMI-Webhook-Key' =>
                'gt-nh-005-unit-secret',
            'Idempotency-Key' => 'filter-unit-001',
        ];

        Services::resetSingle('response');
    }

    protected function tearDown(): void
    {
        config('Marketing')->zapierIngress =
            $this->originalConfig;

        Services::resetSingle('response');

        parent::tearDown();
    }

    public function testDisabledIngressReturns403(): void
    {
        config('Marketing')->zapierIngress['enabled'] =
            false;

        $response = $this->runFilter();

        $this->assertResponseStatus($response, 403);
        $this->assertSame(
            'ingress_disabled',
            $this->decode($response)['error']['code']
        );
    }

    public function testUnsupportedContentTypeReturns415(): void
    {
        $response = $this->runFilter([
            'Content-Type' => 'text/plain',
        ]);

        $this->assertResponseStatus($response, 415);
    }

    public function testOversizedBodyReturns413(): void
    {
        $response = $this->runFilter(
            [],
            json_encode(
                ['payload' => str_repeat('x', 2048)],
                JSON_THROW_ON_ERROR
            )
        );

        $this->assertResponseStatus($response, 413);
    }

    public function testDisallowedSourceReturns403(): void
    {
        $response = $this->runFilter([
            'X-MyMI-Source' => 'unknown-source',
        ]);

        $this->assertResponseStatus($response, 403);
    }

    public function testInvalidWebhookKeyReturns401WithoutLeak(): void
    {
        $response = $this->runFilter([
            'X-MyMI-Webhook-Key' => 'wrong-key',
        ]);

        $this->assertResponseStatus($response, 401);

        $body = $response->getBody();

        $this->assertStringNotContainsString(
            'gt-nh-005-unit-secret',
            $body
        );

        $this->assertStringNotContainsString(
            'wrong-key',
            $body
        );
    }

    public function testMissingIdempotencyKeyReturns400(): void
    {
        $response = $this->runFilter([
            'Idempotency-Key' => '',
        ]);

        $this->assertResponseStatus($response, 400);
    }

    /**
     * @param array<string,string> $headers
     */
    private function runFilter(
        array $headers = [],
        string $body = '{}'
    ): ResponseInterface {
        $resolvedHeaders = array_replace(
            $this->validHeaders,
            $headers
        );

        $request = $this->createMock(
            RequestInterface::class
        );

        $request
            ->method('getMethod')
            ->willReturn('POST');

        $request
            ->method('getHeaderLine')
            ->willReturnCallback(
                static function (
                    string $name
                ) use ($resolvedHeaders): string {
                    foreach (
                        $resolvedHeaders
                        as $headerName => $value
                    ) {
                        if (
                            strcasecmp(
                                $headerName,
                                $name
                            ) === 0
                        ) {
                            return $value;
                        }
                    }

                    return '';
                }
            );

        $request
            ->method('getBody')
            ->willReturn($body);

        Services::resetSingle('response');

        $result = (
            new MarketingZapierIngressFilter()
        )->before($request);

        $this->assertInstanceOf(
            ResponseInterface::class,
            $result
        );

        return $result;
    }

    private function assertResponseStatus(
        ResponseInterface $response,
        int $expectedStatus
    ): void {
        $this->assertSame(
            $expectedStatus,
            $response->getStatusCode(),
            $response->getBody()
        );
    }

    /**
     * @return array<string,mixed>
     */
    private function decode(
        ResponseInterface $response
    ): array {
        $decoded = json_decode(
            $response->getBody(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $this->assertIsArray($decoded);

        return $decoded;
    }
}
