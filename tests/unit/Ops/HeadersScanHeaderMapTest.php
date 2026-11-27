<?php

use App\Libraries\Ops\OpsJobRegistry;
use CodeIgniter\HTTP\Header;
use CodeIgniter\HTTP\Response;
use CodeIgniter\Test\CIUnitTestCase;
use Config\App;

/**
 * ops.security.headers_scan scored 0 because getHeaderLine() throws on a
 * header sent twice ("Cache-Control already has multiple headers").
 *
 * @internal
 */
final class HeadersScanHeaderMapTest extends CIUnitTestCase
{
    public function testRepeatedHeaderIsJoinedInsteadOfThrowing(): void
    {
        $map = OpsJobRegistry::headerMap([
            'Cache-Control'          => [new Header('Cache-Control', 'no-store'), new Header('Cache-Control', 'max-age=0')],
            'X-Frame-Options'        => new Header('X-Frame-Options', 'SAMEORIGIN'),
            'Strict-Transport-Security' => new Header('Strict-Transport-Security', 'max-age=31536000'),
        ]);

        $this->assertSame('no-store, max-age=0', $map['cache-control']);
        $this->assertSame('SAMEORIGIN', $map['x-frame-options']);
        $this->assertArrayHasKey('strict-transport-security', $map);
    }

    public function testRealResponseWithDuplicateHeader(): void
    {
        $response = new Response(new App());
        $response->setHeader('Referrer-Policy', 'same-origin');
        $response->appendHeader('Cache-Control', 'no-store');
        $response->addHeader('Cache-Control', 'private');

        $this->assertIsArray($response->headers()["Cache-Control"], "fixture must repeat the header");
        $map = OpsJobRegistry::headerMap($response->headers());

        $this->assertSame('same-origin', $map['referrer-policy']);
        $this->assertStringContainsString('no-store', $map['cache-control']);
    }
}
