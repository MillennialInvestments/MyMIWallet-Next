<?php

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
