<?php

if (! function_exists('log_if_placeholder_in_uri')) {
    /**
     * Log whenever a URI still contains route placeholder tokens.
     */
    function log_if_placeholder_in_uri(string $uri, string $context = 'incoming_request'): void
    {
        if (strpos($uri, '(:segment') !== false || strpos($uri, '(:num') !== false) {
            log_message(
                'error',
                'URI Guard: placeholder token found in URI: {uri} (context: {context})',
                [
                    'uri'     => $uri,
                    'context' => $context,
                ]
            );
        }
    }
}
