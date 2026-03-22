<?php

declare(strict_types=1);

namespace App\Support;

class Http
{
    public static function get(string $url, array $options = [])
    {
        unset($options);

        return file_get_contents($url);
    }

    public static function post(string $url, array $data = [])
    {
        $context = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($data),
            ],
        ]);

        return file_get_contents($url, false, $context);
    }
}
