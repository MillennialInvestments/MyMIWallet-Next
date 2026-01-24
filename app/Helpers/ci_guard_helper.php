<?php

declare(strict_types=1);

if (! function_exists('is_ci')) {
    function is_ci(): bool
    {
        return getenv('CI') === 'true'
            || getenv('GITHUB_ACTIONS') === 'true'
            || defined('STDIN');
    }
}
