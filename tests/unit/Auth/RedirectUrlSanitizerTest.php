<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;

final class RedirectUrlSanitizerTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        helper('redirect_url');
    }

    public function testRejectsLiteralWildcardsAndLoopTargets(): void
    {
        $this->assertNull(redirect_url_sanitize('*'));
        $this->assertNull(redirect_url_sanitize('/*'));
        $this->assertNull(redirect_url_sanitize('/login'));
        $this->assertNull(redirect_url_sanitize('/logout'));
        $this->assertNull(redirect_url_sanitize('/register/success'));
    }

    public function testRejectsExternalUrl(): void
    {
        $this->assertNull(redirect_url_sanitize('https://evil.example/phish'));
    }

    public function testAllowsValidInternalPath(): void
    {
        $this->assertSame('/Dashboard', redirect_url_sanitize('/Dashboard'));
    }

    public function testStripsTrackingParameters(): void
    {
        $input = '/Dashboard?utm_source=google&gclid=abc123&tab=overview';
        $this->assertSame('/Dashboard?tab=overview', redirect_url_sanitize($input));
    }

    public function testSanitizesCurrentUrlWithTrackingParameters(): void
    {
        $current = site_url('Budget?utm_campaign=spring&_ga=123&view=monthly');
        $this->assertSame('/Budget?view=monthly', redirect_url_sanitize($current));
    }
}
