<?php

namespace App\Services;

use CodeIgniter\HTTP\ResponseInterface;
use Throwable;

class InternalEndpointGuardService
{
    /**
     * Allow CLI, authenticated users, or valid internal token requests.
     */
    public function authorize(bool $allowAuthenticatedUser = true): ?ResponseInterface
    {
        if (is_cli()) {
            return null;
        }

        if ($allowAuthenticatedUser) {
            $userId = function_exists('auth') ? auth()->id() : null;
            if ($userId !== null) {
                return null;
            }
        }

        try {
            $tokenService = service('internalToken');
        } catch (Throwable $e) {
            log_message('error', '[API] internalToken service unavailable for {route}: {message}', [
                'route'   => current_url(),
                'message' => $e->getMessage(),
            ]);

            return service('response')->setStatusCode(500)->setJSON([
                'status'  => 500,
                'error'   => 'Internal processing error',
                'messages'=> ['error' => 'Internal processing error'],
            ]);
        }

        if ($tokenService && method_exists($tokenService, 'allowed') && $tokenService->allowed()) {
            return null;
        }

        log_message('warning', '[API] Internal endpoint blocked: {route}', ['route' => current_url()]);

        return service('response')->setStatusCode(403)->setJSON([
            'status'  => 403,
            'error'   => 'Forbidden',
            'messages'=> ['error' => 'Internal endpoint'],
        ]);
    }
}
