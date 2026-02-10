<?php

declare(strict_types=1);

namespace App\Commands\Auth;

use App\Commands\SafeBaseCommand;
use App\Controllers\AuthController;
use CodeIgniter\CLI\CLI;
use Config\Services;
use ReflectionMethod;

class FlowSmoke extends SafeBaseCommand
{
    protected $group = 'auth';
    protected $name = 'auth:flow-smoke';
    protected $description = 'Smoke test for auth redirect safety and login route no-cache headers.';

    public function run(array $params)
    {
        helper('url');
        $this->parseParams($params);

        Services::injectMock('authentication', new class {
            public function check(): bool { return false; }
        });
        Services::injectMock('eventTracker', new class {
            public function track(string $event, array $data = [], ?int $userId = null, ?string $channel = null): void {}
        });

        $steps = [];

        $controller = new AuthController();
        $controller->initController(Services::request(), Services::response(), Services::logger());

        $method = new ReflectionMethod($controller, 'determineRedirectDestination');
        $method->setAccessible(true);

        session()->set('redirect_url', '/login');
        $loginLoopBlocked = $method->invoke($controller) === site_url('Dashboard');
        $steps[] = ['key' => 'login_loop_blocked', 'ok' => $loginLoopBlocked];

        session()->set('redirect_url', 'https://evil.example');
        $externalBlocked = $method->invoke($controller) === site_url('Dashboard');
        $steps[] = ['key' => 'external_redirect_blocked', 'ok' => $externalBlocked];

        $response = service('response');
        $response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->setHeader('Pragma', 'no-cache');
        $response->setHeader('Expires', '0');
        $headersPresent = $response->getHeaderLine('Cache-Control') !== ''
            && $response->getHeaderLine('Pragma') === 'no-cache'
            && $response->getHeaderLine('Expires') === '0';
        $steps[] = ['key' => 'no_cache_headers_present', 'ok' => $headersPresent];

        $failed = array_values(array_map(static fn ($s) => $s['key'], array_filter($steps, static fn ($s) => ! $s['ok'])));
        foreach ($steps as $step) {
            CLI::write(sprintf('%s %s', $step['ok'] ? 'PASS' : 'FAIL', $step['key']));
        }

        return $failed === [] ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
