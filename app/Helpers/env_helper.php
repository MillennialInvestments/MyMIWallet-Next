<?php

if (! function_exists('is_prod')) {
    function is_prod(): bool
    {
        return strtolower((string) env('CI_ENVIRONMENT')) === 'production';
    }
}

if (! function_exists('is_dev')) {
    function is_dev(): bool
    {
        return strtolower((string) env('CI_ENVIRONMENT')) === 'development';
    }
}