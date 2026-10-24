<?php

namespace App\Services\AIOps\Terminal;

use RuntimeException;

class ContributorTerminalSettingsService
{
    private string $globalPath;
    private string $userPath;

    public function __construct(?string $globalPath = null, ?string $userPath = null)
    {
        $home = rtrim((string) (getenv('HOME') ?: ''), '/');

        $this->globalPath = $globalPath ?? ROOTPATH . 'aiops/config/terminal-defaults.json';
        $this->userPath = $userPath ?? ($home !== ''
            ? $home . '/.tbi-aiops/settings.json'
            : WRITEPATH . 'aiops/contributor-settings.json');
    }

    public function globalDefaults(): array
    {
        return $this->readJsonFile($this->globalPath, true);
    }

    public function userOverrides(): array
    {
        return $this->readJsonFile($this->userPath, false);
    }

    public function effective(): array
    {
        return $this->mergeRecursiveDistinct($this->globalDefaults(), $this->userOverrides());
    }

    public function get(string $key): mixed
    {
        return $this->valueAt($this->effective(), $this->segments($key));
    }

    public function set(string $key, mixed $value): array
    {
        $segments = $this->segments($key);
        $defaults = $this->globalDefaults();
        $defaultValue = $this->valueAt($defaults, $segments, true);
        $normalized = $this->normalizeLike($value, $defaultValue, $key);
        $overrides = $this->userOverrides();

        $this->assignAt($overrides, $segments, $normalized);
        $this->writeUserOverrides($overrides);

        return $this->effective();
    }

    public function unset(string $key): array
    {
        $segments = $this->segments($key);
        $overrides = $this->userOverrides();

        $this->removeAt($overrides, $segments);
        $this->writeUserOverrides($overrides);

        return $this->effective();
    }

    public function reset(): array
    {
        $this->writeUserOverrides([]);

        return $this->effective();
    }

    public function globalPath(): string
    {
        return $this->globalPath;
    }

    public function userPath(): string
    {
        return $this->userPath;
    }

    private function readJsonFile(string $path, bool $required): array
    {
        if (! is_file($path)) {
            if ($required) {
                throw new RuntimeException('AIOps terminal defaults are missing: ' . $path);
            }

            return [];
        }

        $decoded = json_decode((string) file_get_contents($path), true);

        if (! is_array($decoded)) {
            throw new RuntimeException('Invalid AIOps terminal settings JSON: ' . $path);
        }

        return $decoded;
    }

    private function writeUserOverrides(array $overrides): void
    {
        $dir = dirname($this->userPath);

        if (! is_dir($dir) && ! mkdir($dir, 0700, true) && ! is_dir($dir)) {
            throw new RuntimeException('Unable to create contributor settings directory: ' . $dir);
        }

        @chmod($dir, 0700);

        $payload = json_encode(
            $overrides,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
        );

        if ($payload === false) {
            throw new RuntimeException('Unable to encode contributor terminal settings.');
        }

        $tmp = $this->userPath . '.tmp.' . getmypid();

        if (file_put_contents($tmp, $payload . PHP_EOL, LOCK_EX) === false) {
            throw new RuntimeException('Unable to write contributor terminal settings.');
        }

        @chmod($tmp, 0600);

        if (! rename($tmp, $this->userPath)) {
            @unlink($tmp);
            throw new RuntimeException('Unable to publish contributor terminal settings.');
        }

        @chmod($this->userPath, 0600);
    }

    private function segments(string $key): array
    {
        $segments = array_values(array_filter(
            array_map('trim', explode('.', trim($key))),
            static fn (string $segment): bool => $segment !== ''
        ));

        if ($segments === []) {
            throw new RuntimeException('A terminal setting key is required.');
        }

        return $segments;
    }

    private function valueAt(array $source, array $segments, bool $mustExist = false): mixed
    {
        $cursor = $source;

        foreach ($segments as $segment) {
            if (! is_array($cursor) || ! array_key_exists($segment, $cursor)) {
                if ($mustExist) {
                    throw new RuntimeException(
                        'Unknown AIOps terminal setting: ' . implode('.', $segments)
                    );
                }

                return null;
            }

            $cursor = $cursor[$segment];
        }

        return $cursor;
    }

    private function assignAt(array &$source, array $segments, mixed $value): void
    {
        $cursor =& $source;
        $last = array_pop($segments);

        foreach ($segments as $segment) {
            if (! isset($cursor[$segment]) || ! is_array($cursor[$segment])) {
                $cursor[$segment] = [];
            }

            $cursor =& $cursor[$segment];
        }

        $cursor[$last] = $value;
    }

    private function removeAt(array &$source, array $segments): void
    {
        $last = array_pop($segments);
        $cursor =& $source;

        foreach ($segments as $segment) {
            if (! isset($cursor[$segment]) || ! is_array($cursor[$segment])) {
                return;
            }

            $cursor =& $cursor[$segment];
        }

        unset($cursor[$last]);
    }

    private function normalizeLike(mixed $value, mixed $defaultValue, string $key): mixed
    {
        if (is_bool($defaultValue)) {
            if (is_bool($value)) {
                return $value;
            }

            $normalized = strtolower(trim((string) $value));

            if (in_array($normalized, ['1', 'true', 'yes', 'on'], true)) {
                return true;
            }

            if (in_array($normalized, ['0', 'false', 'no', 'off'], true)) {
                return false;
            }

            throw new RuntimeException('Expected boolean value for setting: ' . $key);
        }

        if (is_int($defaultValue)) {
            if (! is_numeric($value)) {
                throw new RuntimeException('Expected integer value for setting: ' . $key);
            }

            return (int) $value;
        }

        if (is_float($defaultValue)) {
            if (! is_numeric($value)) {
                throw new RuntimeException('Expected numeric value for setting: ' . $key);
            }

            return (float) $value;
        }

        if (is_string($defaultValue)) {
            return (string) $value;
        }

        throw new RuntimeException('Setting is not directly user-overridable: ' . $key);
    }

    private function mergeRecursiveDistinct(array $base, array $override): array
    {
        foreach ($override as $key => $value) {
            if (
                isset($base[$key])
                && is_array($base[$key])
                && is_array($value)
            ) {
                $base[$key] = $this->mergeRecursiveDistinct($base[$key], $value);
                continue;
            }

            $base[$key] = $value;
        }

        return $base;
    }
}
