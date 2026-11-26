<?php

declare(strict_types=1);

namespace App\Commands\Sports;

use CodeIgniter\CLI\CLI;

/** Reads an option given as "--name value" or "--name=value". */
trait SportsOptionsTrait
{
    protected function opt(array $params, string $name): ?string
    {
        if (isset($params[$name]) && is_string($params[$name])) {
            return $params[$name];
        }
        foreach (array_merge(array_keys($params), array_values(array_filter($params, 'is_string'))) as $token) {
            $token = ltrim((string) $token, '-');
            if (str_starts_with($token, $name . '=')) {
                return substr($token, strlen($name) + 1);
            }
        }
        $cli = CLI::getOption($name);
        if (is_string($cli)) {
            return $cli;
        }
        foreach (array_keys(CLI::getOptions()) as $key) {
            if (str_starts_with((string) $key, $name . '=')) {
                return substr((string) $key, strlen($name) + 1);
            }
        }

        return null;
    }

    protected function flag(array $params, string $name): bool
    {
        return array_key_exists($name, $params) || array_key_exists($name, CLI::getOptions());
    }
}
