<?php

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\ResponseInterface;
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

        $userContext = $extra['user']
            ?? ((function_exists('current_user_id') && current_user_id()) ? 'user#' . current_user_id() : 'guest');

        // Use a decoded copy for detecting real placeholders
        $decodedUri = rawurldecode($uriString);

        $placeholders = ['(:segment)', '(:num)', '{id}', '{segment}'];

        foreach ($placeholders as $needle) {
            if (strpos($decodedUri, $needle) !== false) {
                log_message(
                    'warning',
                    'URI guard detected placeholder in {context}: "{uri}" (user {user})',
                    [
                        'context' => $context,
                        'uri'     => $decodedUri,
                        'user'    => $userContext,
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
     * Validate URI for leaked placeholders.
     */
    function guard_uri_placeholders(IncomingRequest $request, string $context = 'unknown'): void
    {
        try {
            $uri       = $request->getUri();
            $uriString = (string) $uri;
            $path      = $uri->getPath();
            $decoded   = rawurldecode($uriString);

            $session = Services::session(null);
            $userId  = $session?->get('user_id') ?? $session?->get('cuID') ?? 'guest';

            // Block encoded placeholders before they ever reach routing
            $encodedPlaceholderPattern = '/%28:(num|segment)%29/i';
            if (preg_match($encodedPlaceholderPattern, $uriString)) {
                log_message(
                    'notice',
                    'URI guard blocked encoded placeholder request in {context}: "{uri}" (user {user})',
                    [
                        'context' => $context,
                        'uri'     => $decoded,
                        'user'    => $userId,
                    ]
                );

                Services::response()
                    ->setStatusCode(ResponseInterface::HTTP_NOT_FOUND)
                    ->setBody('Not Found')
                    ->send();
                exit;
            }

            // First check for unencoded placeholders in the path
            log_if_placeholder_in_uri($uriString, $context, [
                'route' => $path,
                'user'  => $userId,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'guard_uri_placeholders failed: {msg}', ['msg' => $e->getMessage()]);
        }
    }
}

if (! function_exists('mymi_url_guard')) {
    /**
     * Guard URLs against leaking CI4 route placeholders into runtime links.
     *
     * If a placeholder token is detected, it logs a warning and returns a safe fallback.
     *
     * @param string $url     Fully-formed URL or path
     * @param array  $context Optional context (e.g., ['source' => __FILE__, 'line' => __LINE__])
     */
    function mymi_url_guard(string $url, array $context = []): string
    {
        $decoded = rawurldecode($url);
        $pattern = '/\\(:segment\\)|\\(:num\\)|%28:segment%29|%28:num%29/i';

        if (preg_match($pattern, $decoded)) {
            log_message('warning', 'URI guard: placeholder token detected in URL: {url}', [
                'url'     => $decoded,
                'context' => $context,
            ]);

            return site_url('/');
        }

        return $url;
    }
}
