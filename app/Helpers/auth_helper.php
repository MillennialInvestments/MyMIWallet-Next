<?php

declare(strict_types=1);

if (! function_exists('user_id')) {
    /**
     * Returns the current authenticated user id across Shield/Myth/Auth.
     */
    function user_id(): ?int
    {
        // Shield-first resolution.
        if (function_exists('auth')) {
            try {
                $auth = auth();
                if (is_object($auth) && method_exists($auth, 'user')) {
                    $user = $auth->user();
                    if (is_object($user) && isset($user->id)) {
                        return (int) $user->id;
                    }
                }
            } catch (\Throwable $e) {
                // Continue to Myth/Auth/session fallbacks.
            }
        }

        // Myth/Auth-style service resolution.
        try {
            $authentication = service('authentication');
            if (is_object($authentication) && method_exists($authentication, 'id')) {
                $id = $authentication->id();
                if ($id !== null) {
                    return (int) $id;
                }
            }
        } catch (\Throwable $e) {
            // Continue to session fallback.
        }

        $sessionId = session('user_id');
        return $sessionId === null ? null : (int) $sessionId;
    }
}
