<?php

namespace Tests\Unit\HTTP;

use App\HTTP\IncomingRequest;
use App\Services\Forms\ProjectFormService;
use CodeIgniter\HTTP\SiteURI;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\Test\CIUnitTestCase;
use Config\App;

/**
 * POST /Support/Response with a form body was a 500 ("Failed to parse JSON
 * string") because getJSON() threw before the getPost() fallback ran.
 */
final class LenientJsonRequestTest extends CIUnitTestCase
{
    private function request(?string $body): IncomingRequest
    {
        $config = new App();

        return new IncomingRequest($config, new SiteURI($config), $body, new UserAgent());
    }

    public function testFormBodyReadsAsNoJson(): void
    {
        $this->assertNull($this->request('topic=Help&details=hello')->getJSON(true));
    }

    public function testEmptyBodyReadsAsNoJson(): void
    {
        $this->assertNull($this->request('')->getJSON(true));
    }

    public function testJsonBodyStillParses(): void
    {
        $this->assertSame(['a' => 1], $this->request('{"a":1}')->getJSON(true));
    }

    public function testServiceUsesAppRequestClass(): void
    {
        $this->assertInstanceOf(IncomingRequest::class, \Config\Services::incomingrequest(null, false));
    }

    public function testPromotionalLinksBecomeJsonList(): void
    {
        $this->assertSame('["https://a.example","https://b.example"]', ProjectFormService::linksJson("https://a.example, https://b.example\n"));
        $this->assertNull(ProjectFormService::linksJson('  '));
    }
}
