<?php

use App\Filters\SecurityHeadersFilter;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use Config\SecurityHeaders;

/**
 * GTM-030: pages carry security headers and a report-only CSP.
 *
 * @internal
 */
final class SecurityHeadersTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testLoginPageHasHeadersAndReportOnlyCsp(): void
    {
        $result = $this->get('login');
        $response = $result->response();

        $this->assertSame('nosniff', $response->getHeaderLine('X-Content-Type-Options'));
        $this->assertSame('strict-origin-when-cross-origin', $response->getHeaderLine('Referrer-Policy'));
        $csp = $response->getHeaderLine('Content-Security-Policy-Report-Only');
        $this->assertStringContainsString("object-src 'none'", $csp);
        $this->assertStringContainsString('report-uri /csp-report', $csp);
        $this->assertSame('', $response->getHeaderLine('Content-Security-Policy'), 'CSP must not be enforced yet');
    }

    public function testPolicyIncludesNonceWhenPresent(): void
    {
        $policy = SecurityHeadersFilter::buildPolicy(new SecurityHeaders(), 'abc123def456');
        $this->assertStringContainsString("'nonce-abc123def456'", $policy);
        $this->assertStringNotContainsString("'nonce-'", SecurityHeadersFilter::buildPolicy(new SecurityHeaders(), null));
        $this->assertStringNotContainsString('evil', SecurityHeadersFilter::buildPolicy(new SecurityHeaders(), "x'; script-src evil"));
    }

    public function testCspReportEndpointAcceptsReports(): void
    {
        $body = json_encode(['csp-report' => ['violated-directive' => 'script-src', 'blocked-uri' => 'inline', 'document-uri' => 'https://example.test/login?x=1']]);
        $result = $this->withBody($body)->withHeaders(['Content-Type' => 'application/csp-report'])->post('csp-report');
        $result->assertStatus(204);
    }
}
