<?php

declare(strict_types=1);

use App\Controllers\AuthController;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use Config\Services;

final class AuthRedirectTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testNoCacheFilterHeadersAppliedOnLoginRoute(): void
    {
        Services::injectMock('authentication', new FakeAuthenticationForRedirect(false));
        Services::injectMock('eventTracker', new class {
            public function track(string $event, array $data = [], ?int $userId = null, ?string $channel = null): void {}
        });

        $response = $this->get('login');

        $this->assertSame('no-store, no-cache, must-revalidate, max-age=0', $response->getHeaderLine('Cache-Control'));
        $this->assertSame('no-cache', $response->getHeaderLine('Pragma'));
        $this->assertSame('0', $response->getHeaderLine('Expires'));
    }

    public function testDetermineRedirectDestinationRejectsLoopAndExternalUrls(): void
    {
        $controller = new AuthController();
        $request = Services::request();
        $response = Services::response();
        $logger = Services::logger();

        Services::injectMock('authentication', new FakeAuthenticationForRedirect(true));
        $controller->initController($request, $response, $logger);

        $method = new ReflectionMethod($controller, 'determineRedirectDestination');
        $method->setAccessible(true);

        $session = session();

        $session->set('redirect_url', 'https://malicious.example/pwn');
        $this->assertSame(site_url('Dashboard'), $method->invoke($controller));

        $session->set('redirect_url', '/login');
        $this->assertSame(site_url('Dashboard'), $method->invoke($controller));

        $session->set('redirect_url', '/logout');
        $this->assertSame(site_url('Dashboard'), $method->invoke($controller));

        $session->set('redirect_url', '/');
        $this->assertSame(site_url('Dashboard'), $method->invoke($controller));

        $session->set('redirect_url', '/Budget');
        $this->assertSame('/Budget', $method->invoke($controller));
    }
}

final class FakeAuthenticationForRedirect
{
    public function __construct(private bool $loggedIn) {}

    public function check(): bool
    {
        return $this->loggedIn;
    }

    public function id(): ?int
    {
        return 1;
    }
}
