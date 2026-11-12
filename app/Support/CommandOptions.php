<?php

namespace App\Support;

class CommandOptions
{
    public static function get(array $params, string $name, ?string $default = null): ?string
    {
        $tokens = array_values(array_merge($params, array_slice($_SERVER['argv'] ?? [], 2)));
        $needle = '--' . $name;
        $prefix = $needle . '=';

        foreach ($tokens as $index => $token) {
            $token = (string) $token;

            if (str_starts_with($token, $prefix)) {
                return self::clean(substr($token, strlen($prefix)));
            }

            if ($token === $needle) {
                $next = $tokens[$index + 1] ?? null;

                if ($next !== null && ! str_starts_with((string) $next, '--')) {
                    return self::clean((string) $next);
                }

                return '1';
            }
        }

        return $default;
    }

    private static function clean(string $value): string
    {
        return trim($value, " \t\n\r\0\x0B\"'");
    }
}
