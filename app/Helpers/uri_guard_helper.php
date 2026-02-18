<?php

/**
 * CI4 Logger - Settings
 * Audited: 2026-02-18
 * Purpose: Provides URI guard wrappers that inspect and log placeholder routing leaks.
 */


use CodeIgniter\HTTP\IncomingRequest;
use Config\Services;

if (! function_exists('log_if_placeholder_in_uri')) {
    /**
     * Logs when a route placeholder like (:segment) shows up in an actual URI.
     */
    function log_if_placeholder_in_uri(string $uriString, string $context = 'unknown', array $extra = []): bool
    {
        $uriString = trim($uriString);
        if ($uriString === '') {
            return false;
        }

        $userContext = $extra['user']
            ?? ((function_exists('current_user_id') && current_user_id()) ? 'user#' . current_user_id() : 'guest');

        $decodedUri = rawurldecode($uriString);

        // Common CI4 placeholders (add more if you use them)
        $needles = [
            '(:segment)', '(:num)', '(:any)', '(:alpha)', '(:alphanum)',
            '{id}', '{segment}',
        ];

        foreach ($needles as $needle) {
            if (strpos($decodedUri, $needle) !== false) {
                log_message(
                    'warning',
                    'URI guard detected placeholder in {context}: "{uri}" (user {user})',
                    [
                        'context' => $context,
                        'uri'     => $decodedUri,
                        'user'    => $userContext,
                        'extra'   => $extra,
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
     * Intended to be called early (pre_system hook / filter).
     */
    function guard_uri_placeholders(IncomingRequest $request, string $context = 'unknown'): void
    {
        try {
            $uri       = $request->getUri();
            $uriString = (string) $uri;
            $path      = ltrim($uri->getPath(), '/');

            // Ignore common probes you never want to log-spam about
            if (
                str_starts_with($path, 'wp-includes/')
                || str_starts_with($path, 'wp-admin/')
                || $path === 'wp-login.php'
                || $path === 'xmlrpc.php'
            ) {
                return;
            }

            $session = Services::session(null);
            $userId  = $session?->get('user_id') ?? $session?->get('cuID') ?? 'guest';

            // If encoded placeholders ever make it here, log it.
            // (NGINX should block these first.)
            if (preg_match('/%28:(num|segment|any|alpha|alphanum)%29/i', $uriString)) {
                log_message('notice', 'URI guard saw encoded placeholder in {context}: "{uri}" (user {user})', [
                    'context' => $context,
                    'uri'     => rawurldecode($uriString),
                    'user'    => $userId,
                ]);
                return;
            }

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
     * Guard runtime-generated URLs against leaking CI placeholders.
     */
    function mymi_url_guard(string $url, array $context = []): string
    {
        $decoded = rawurldecode($url);

        // Detect placeholders in final URL output
        if (preg_match('/\(\:(segment|num|any|alpha|alphanum)\)|%28:(segment|num|any|alpha|alphanum)%29/i', $decoded)) {
            log_message('warning', 'URI guard: placeholder token detected in URL: {url}', [
                'url'     => $decoded,
                'context' => $context,
            ]);

            // Safe fallback
            return site_url('/');
        }

        return $url;
    }
}
