<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
final class PublicRoutesAccessibleTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testPublicRoutesRemainAccessible(): void
    {
        $routes = [
            ['GET', '/', [200, 301, 302], true],
            ['GET', 'login', [200], false],
            ['GET', 'register', [200], false],
            ['GET', 'register/success', [200, 302], true],
            ['GET', 'activate', [200, 302], true],
            ['GET', 'activate-account', [200, 302], true],
            ['GET', 'forgot-password', [200], false],
            ['GET', 'reset-password', [200], false],
            ['GET', 'blog', [200], false],
            ['GET', 'Blog', [200], false],
            ['GET', 'Blog/News-And-Updates', [200], false],
            ['GET', 'News', [301, 302], true],
            ['GET', 'pricing', [200], false],
            ['GET', 'Support', [200], false],
            ['GET', 'health', [200, 503], false],
            ['GET', 'healthz', [200, 503], false],
            ['GET', 'status', [200, 503], false],
            ['GET', 'api/health', [200, 503], false],
        ];

        foreach ($routes as [$method, $path, $allowed, $allowRedirect]) {
            $response = strtolower($method) === 'get'
                ? $this->get($path)
                : $this->post($path);

            $status = $response->getStatusCode();

            $this->assertContains(
                $status,
                $allowed,
                sprintf('Unexpected status for %s %s: %d', $method, $path, $status)
            );

            if (! $allowRedirect && $response->isRedirect()) {
                $location = (string) $response->getHeaderLine('Location');
                $this->assertStringNotContainsString('/login', $location, sprintf('%s %s should not redirect to login', $method, $path));
            }
        }
    }
}
