<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Skip for CLI and for the DebugToolbar collector
        if (is_cli()) {
            return;
        }

        $session = Services::session();

        // ——— Determine login state (supporting multiple app variants) ———
        // Common keys your app uses across modules:
        $isLoggedIn = (bool) ($session->get('isLoggedIn') ?? $session->get('logged_in') ?? false);
        $userId     = $session->get('user_id') ?? $session->get('cuID') ?? null;

        // If you have a custom auth service, prefer it:
        // $auth = service('authentication', null, false);
        // if ($auth && method_exists($auth, 'check')) {
        //     $isLoggedIn = $auth->check();
        //     $userId     = $auth->id() ?? $userId;
        // }

        if ($isLoggedIn || ! empty($userId)) {
            return; // allow request
        }

        // Not authenticated — respond appropriately
        $acceptsJSON = $request->isAJAX()
            || str_contains((string) $request->getHeaderLine('Accept'), 'application/json')
            || str_starts_with($request->getUri()->getPath(), 'API/');

        if ($acceptsJSON) {
            // API-style response
            return Services::response()
                ->setJSON([
                    'status'  => 'error',
                    'message' => 'Unauthorized: authentication required.',
                ])
                ->setStatusCode(401);
        }

        // Web request — redirect to Login (adjust route if needed)
        return redirect()->to(site_url('Login'));
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // no-op
    }
}
