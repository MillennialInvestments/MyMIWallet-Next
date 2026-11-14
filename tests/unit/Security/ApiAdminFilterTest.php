<?php

namespace Tests\Unit\Security;

use App\Filters\ApiAdminFilter;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Services;

/**
 * GTM-027: admin-only write APIs reject anonymous callers.
 */
final class ApiAdminFilterTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Services::resetSingle('response');
        Services::injectMock('authentication', new class {
            public function check(): bool { return false; }
            public function id() { return null; }
        });
        putenv('CRON_KEY=test-cron-key');
        putenv('INTERNAL_API_TOKEN');
    }

    protected function tearDown(): void
    {
        putenv('CRON_KEY');
        parent::tearDown();
    }

    public function testAnonymousCallerGets401(): void
    {
        $res = (new ApiAdminFilter())->before($this->request([]));
        $this->assertSame(401, $res->getStatusCode());
    }

    public function testWrongCronKeyGets401(): void
    {
        $res = (new ApiAdminFilter())->before($this->request(['X-Cron-Key' => 'nope']));
        $this->assertSame(401, $res->getStatusCode());
    }

    public function testValidCronKeyPasses(): void
    {
        $this->assertNull((new ApiAdminFilter())->before($this->request(['X-Cron-Key' => 'test-cron-key'])));
    }

    public function testEmptyInternalTokenNeverMatches(): void
    {
        $res = (new ApiAdminFilter())->before($this->request(['X-Internal-Token' => '']));
        $this->assertSame(401, $res->getStatusCode());
    }

    private function request(array $headers): IncomingRequest
    {
        $request = $this->createMock(IncomingRequest::class);
        $request->method('getHeaderLine')->willReturnCallback(static fn (string $n): string => $headers[$n] ?? '');

        return $request;
    }
}
