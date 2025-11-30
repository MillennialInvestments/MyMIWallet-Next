<?php

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\URI;
use Config\Services;

if (! function_exists('log_if_placeholder_in_uri')) {
    /**
     * Logs when a route placeholder like (:segment) shows up in an actual URI.
     *
     * @param string $uriString Raw URI string (e.g. /Wallets/Debt/Edit/Account/(:segment))
     * @param string $context   Where this was called from (e.g. 'pre_system')
     * @param array  $extra     Additional log context (e.g. route, user)
     */
    function log_if_placeholder_in_uri(string $uriString, string $context = 'unknown', array $extra = []): bool
    {
        $uriString = trim($uriString);
        if ($uriString === '') {
            return false;
        }

        $pathOnly = (string) parse_url($uriString, PHP_URL_PATH);

        // Patterns for common CI4 placeholders (unencoded only)
        $patterns = [
            '/\(:segment\)/i',
            '/\(:num\)/i',
            '/\(:any\)/i',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $pathOnly)) {
                log_message(
                    'error',
                    'URI placeholder leaked into request in {context}: "{uri}"',
                    [
                        'context' => $context,
                        'uri'     => $uriString,
                        'route'   => $extra['route'] ?? $pathOnly,
                        'user'    => $extra['user'] ?? 'guest',
                    ]
                );

                log_message(
                    'debug',
                    'URI placeholder debug trace in {context}: {uri}',
                    [
                        'context' => $context,
                        'uri'     => $uriString,
                        'route'   => $extra['route'] ?? $pathOnly,
                        'user'    => $extra['user'] ?? 'guest',
                    ]
                );

                return true;
            }
        }

        return false;
    }
}

if (! function_exists('guard_uri_placeholders')) {
    /**
     * Validate URI for leaked placeholders and optionally redirect encoded payloads.
     */
    function guard_uri_placeholders(IncomingRequest $request, string $context = 'unknown'): ?ResponseInterface
    {
        try {
            $uri       = $request->getUri();
            $uriString = (string) $uri;
            $path      = $uri->getPath();

            $session = Services::session(null);
            $userId  = $session?->get('user_id') ?? $session?->get('cuID') ?? 'guest';

            // First check for unencoded placeholders in the path
            log_if_placeholder_in_uri($uriString, $context, [
                'route' => $path,
                'user'  => $userId,
            ]);

            // Then handle already-encoded placeholder payloads (%28:segment%29)
            $encodedPatterns = ['%28:segment%29', '%28:num%29', '%28:any%29'];
            foreach ($encodedPatterns as $encodedPattern) {
                if (stripos($uriString, $encodedPattern) !== false) {
                    log_message('warning', 'URI guard detected encoded placeholder in {context}: "{uri}" (user {user})', [
                        'context' => $context,
                        'uri'     => $uriString,
                        'user'    => $userId,
                    ]);

                    $target = function_exists('site_url') ? site_url('/') : '/';

                    $response = Services::response();
                    $response->redirect($target, 'auto', 302);

                    return $response;
                }
            }

            return null;
        } catch (\Throwable $e) {
            log_message('error', 'guard_uri_placeholders failed: {msg}', ['msg' => $e->getMessage()]);
            return null;
        }
    }
}