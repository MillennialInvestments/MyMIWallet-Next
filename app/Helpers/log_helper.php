<?php

declare(strict_types=1);

if (! function_exists('log_context')) {
    /**
     * @param array<string, mixed> $context
     */
    function log_context(array $context = []): string
    {
        return json_encode($context, JSON_UNESCAPED_SLASHES) ?: '{}';
    }
}
