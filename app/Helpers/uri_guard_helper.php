<?php

use CodeIgniter\HTTP\URI;

if (! function_exists('log_if_placeholder_in_uri')) {
    /**
     * Logs when a route placeholder like (:segment) shows up in an actual URI.
     *
     * @param string $uriString Raw URI string (e.g. /Wallets/Debt/Edit/Account/(:segment))
     * @param string $context   Where this was called from (e.g. 'pre_system')
     */
    function log_if_placeholder_in_uri(string $uriString, string $context = 'unknown'): void
    {
        $uriString = trim($uriString);
        if ($uriString === '') {
            return;
        }

        // Patterns for common CI4 placeholders
        $patterns = [
            '/\(:segment\)/',
            '/\(:num\)/',
            '/\(:any\)/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $uriString)) {
                log_message(
                    'error',
                    'URI placeholder leaked into request in {context}: "{uri}"',
                    [
                        'context' => $context,
                        'uri'     => $uriString,
                    ]
                );

                // Optional: add a debug log to help trace it more
                log_message(
                    'debug',
                    'URI placeholder debug trace in {context}: {uri}',
                    [
                        'context' => $context,
                        'uri'     => $uriString,
                    ]
                );

                break;
            }
        }
    }
}
