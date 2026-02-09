<?php

if (! function_exists('safe_email_view')) {
    function safe_email_view(?string $view, array $data = []): string
    {
        if (! is_string($view) || trim($view) === '') {
            log_message('error', '[EMAIL] Null or empty email view');
            return 'MyMI Wallet notification. Please contact support.';
        }

        return (string) view($view, $data);
    }
}

if (! function_exists('render_email_view')) {
    function render_email_view(?string $view, array $data = []): string
    {
        return safe_email_view($view, $data);
    }
}
