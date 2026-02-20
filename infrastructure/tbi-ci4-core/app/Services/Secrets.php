<?php

declare(strict_types=1);

namespace App\Services;

class Secrets
{
    public function get(string $key, ?string $default = null): ?string
    {
        $value = env($key);

        if ($value === null || $value === '') {
            return $default;
        }

        return (string) $value;
    }
}
