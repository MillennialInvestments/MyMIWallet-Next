<?php

declare(strict_types=1);

namespace App\Commands\Traits;

trait ParamOptions
{
    protected function opt(array $params, string $key, string $default): string
    {
        $needle = '--' . $key;

        foreach ($params as $i => $p) {
            if (!is_string($p)) {
                continue;
            }

            if ($p === $needle && isset($params[$i + 1])) {
                return (string) $params[$i + 1];
            }

            $prefix = $needle . '=';
            if (str_starts_with($p, $prefix)) {
                return (string) substr($p, strlen($prefix));
            }
        }

        return $default;
    }

    protected function optInt(array $params, string $key, int $default): int
    {
        return (int) $this->opt($params, $key, (string) $default);
    }

    protected function optBool(array $params, string $key): bool
    {
        $needle = '--' . $key;
        foreach ($params as $p) {
            if (!is_string($p)) continue;
            if ($p === $needle) return true;
            if (str_starts_with($p, $needle . '=')) {
                $v = strtolower(trim((string) substr($p, strlen($needle) + 1)));
                return in_array($v, ['1', 'true', 'yes', 'on'], true);
            }
        }
        return false;
    }
}
