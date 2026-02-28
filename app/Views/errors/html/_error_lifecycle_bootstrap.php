<?php

declare(strict_types=1);

if (! function_exists('mymi_bootstrap_error_lifecycle')) {
    function mymi_bootstrap_error_lifecycle(int $statusCode, string $event, string $safeMessage): void
    {
        http_response_code($statusCode);

        if (defined('ERROR_LOGGING_ACTIVE')) {
            return;
        }

        define('ERROR_LOGGING_ACTIVE', true);

        static $logged = false;
        if ($logged) {
            return;
        }

        $logged = true;

        try {
            log_message('error', '[ERROR_PAGE] event={event} status={status} message={message}', [
                'event' => $event,
                'status' => $statusCode,
                'message' => $safeMessage,
            ]);
        } catch (\Throwable $e) {
            // Swallow logging exceptions to avoid recursion loops.
        }
    }
}
