<?php

namespace App\Libraries;

class DevHotReload
{
    public static function register(): void
    {
        service('routes')->get('__hot-reload', 'DevTools::hotReload');
    }

    public static function passThroughBuffer(string $buffer): string
    {
        return $buffer;
    }
}
