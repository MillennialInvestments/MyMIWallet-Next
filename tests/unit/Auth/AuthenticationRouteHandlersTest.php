<?php

declare(strict_types=1);

namespace Tests\Unit\Auth;

use App\Controllers\AuthController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Services;

/**
 * @internal
 */
final class AuthenticationRouteHandlersTest extends CIUnitTestCase
{
    private AuthController $controller;

    protected function setUp(): void
    {
        parent::setUp();

        $this->controller = new AuthController();
        $request = Services::request();
        $response = Services::response();
        $logger = Services::logger();

        $this->controller->initController($request, $response, $logger);
    }

    public function testAllSixMethodsExistOnAuthController(): void
    {
        $methods = [
            'handleProviderCallback',
            'linkProvider',
            'linkRobinhood',
            'linkSnapTrade',
            'redirectToProvider',
            'unlinkProvider',
        ];

        foreach ($methods as $method) {
            $this->assertTrue(
                method_exists(AuthController::class, $method),
                sprintf('AuthController must implement %s()', $method)
            );
        }
    }

    public function testLinkRobinhoodFailsClosedWhenUnauthenticated(): void
    {
        $response = $this->controller->linkRobinhood();

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame(401, $response->getStatusCode());

        $body = json_decode($response->getBody(), true);
        $this->assertIsArray($body);
        $this->assertSame('error', $body['status'] ?? null);
        $this->assertSame('Unauthorized', $body['message'] ?? null);
    }

    public function testLinkSnapTradeFailsClosedWhenUnauthenticated(): void
    {
        $response = $this->controller->linkSnapTrade();

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame(401, $response->getStatusCode());

        $body = json_decode($response->getBody(), true);
        $this->assertIsArray($body);
        $this->assertSame('error', $body['status'] ?? null);
        $this->assertSame('Unauthorized', $body['message'] ?? null);
    }

    public function testRedirectToProviderRejectsInvalidProvider(): void
    {
        $response = $this->controller->redirectToProvider('invalid-provider-xyz');

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertStringContainsString('login', (string) $response->getHeaderLine('Location'));

        $session = Services::session();
        $flash = $session->getFlashdata('auth_message');
        $this->assertIsArray($flash);
        $this->assertSame('danger', $flash['type'] ?? null);
    }

    public function testRedirectToProviderHandlesUnconfiguredProviderGracefully(): void
    {
        $response = $this->controller->redirectToProvider('google');

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertStringContainsString('login', (string) $response->getHeaderLine('Location'));

        $session = Services::session();
        $flash = $session->getFlashdata('auth_message');
        $this->assertIsArray($flash);
        $this->assertSame('warning', $flash['type'] ?? null);
        $this->assertStringContainsString('Google', $flash['text'] ?? '');
    }

    public function testHandleProviderCallbackRejectsInvalidProvider(): void
    {
        $response = $this->controller->handleProviderCallback('invalid-provider-xyz');

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertStringContainsString('login', (string) $response->getHeaderLine('Location'));

        $session = Services::session();
        $flash = $session->getFlashdata('auth_message');
        $this->assertIsArray($flash);
        $this->assertSame('danger', $flash['type'] ?? null);
    }

    public function testLinkProviderFailsClosedWhenUnauthenticated(): void
    {
        $response = $this->controller->linkProvider('google');

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertStringContainsString('login', (string) $response->getHeaderLine('Location'));

        $session = Services::session();
        $flash = $session->getFlashdata('auth_message');
        $this->assertIsArray($flash);
        $this->assertSame('warning', $flash['type'] ?? null);
    }

    public function testUnlinkProviderFailsClosedWhenUnauthenticated(): void
    {
        $response = $this->controller->unlinkProvider('google');

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertStringContainsString('login', (string) $response->getHeaderLine('Location'));

        $session = Services::session();
        $flash = $session->getFlashdata('auth_message');
        $this->assertIsArray($flash);
        $this->assertSame('warning', $flash['type'] ?? null);
    }

    public function testRouteHandlerBaselineDoesNotContainAuthControllerMethods(): void
    {
        $baselineContent = (string) file_get_contents(ROOTPATH . 'tests/baseline/route-handler-gaps.txt');

        $methods = [
            'App\Controllers\AuthController::handleProviderCallback',
            'App\Controllers\AuthController::linkProvider',
            'App\Controllers\AuthController::linkRobinhood',
            'App\Controllers\AuthController::linkSnapTrade',
            'App\Controllers\AuthController::redirectToProvider',
            'App\Controllers\AuthController::unlinkProvider',
        ];

        foreach ($methods as $method) {
            $this->assertStringNotContainsString(
                $method,
                $baselineContent,
                sprintf('%s must be removed from route-handler-gaps.txt', $method)
            );
        }
    }
}
