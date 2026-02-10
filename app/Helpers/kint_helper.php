<?php

declare(strict_types=1);

// Local override to keep CLI/Spark stable when Kint assets are unavailable in certain deployments.

if (! function_exists('dd')) {
    if (class_exists('Kint\\Kint')) {
        function dd(...$vars): void
        {
            \Kint\Kint::$aliases[] = 'dd';
            \Kint\Kint::dump(...$vars);
            exit;
        }
    } else {
        function dd(...$vars)
        {
            return 0;
        }
    }
}

if (! function_exists('d') && ! class_exists('Kint\\Kint')) {
    function d(...$vars)
    {
        return 0;
    }
}

if (! function_exists('trace')) {
    if (class_exists('Kint\\Kint')) {
        function trace(): void
        {
            \Kint\Kint::$aliases[] = 'trace';
            \Kint\Kint::trace();
        }
    } else {
        function trace()
        {
            return 0;
        }
    }
}
