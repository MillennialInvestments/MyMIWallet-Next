<?php

declare(strict_types=1);

if (! function_exists('is_ci')) {
    function is_ci(): bool
    {
        return env('CI') === 'true'
            || env('APP_ENV') === 'testing';
    }
}
