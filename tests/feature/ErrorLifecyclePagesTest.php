<?php

use CodeIgniter\Test\CIUnitTestCase;

final class ErrorLifecyclePagesTest extends CIUnitTestCase
{
    public function testErrorViewsRenderSupportRedirectAndSafeContent(): void
    {
        helper('url');

        $cases = [
            ['errors/html/error_403', 403],
            ['errors/html/error_404', 404],
            ['errors/html/error_500', 500],
            ['errors/html/error_504', 504],
        ];

        foreach ($cases as [$viewPath, $code]) {
            http_response_code(200);
            $body = view($viewPath, ['message' => 'debug only']);

            $this->assertStringContainsString('Open Support', $body);
            $this->assertStringContainsString('setTimeout', $body);
            $this->assertStringNotContainsString('Stack trace', $body);
            $this->assertSame($code, http_response_code());
        }
    }
}
