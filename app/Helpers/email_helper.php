<?php

if (! function_exists('render_email_view')) {
    function render_email_view(?string $view, array $data = []): string
    {
        if (! is_string($view) || trim($view) === '') {
            return '';
        }

        return (string) view($view, $data);
    }
}
