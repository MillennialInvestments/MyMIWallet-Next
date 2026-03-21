<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class Grep extends SafeBaseCommand
{
    protected $group = 'Ops';
    protected $name = 'ops:grep';
    protected $description = 'Search a path for a plain-text string or regex pattern.';
    protected $usage = 'ops:grep [path] <needle> [--regex] [--ext=php,md]';
    protected $arguments = [
        'path' => 'Optional path to search. Defaults to repository root.',
        'needle' => 'Text or regex pattern to search for.',
    ];
    protected $options = [
        '--regex' => 'Treat the needle as a regular expression.',
        '--ext' => 'Comma-separated list of file extensions to include.',
    ];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);

        [$path, $needle] = $this->resolveArguments($args);
        if ($needle === '') {
            CLI::error('Usage: php spark ops:grep [path] <needle> [--regex] [--ext=php,md]');
            return EXIT_ERROR;
        }

        $root = $this->resolvePath($path);
        if ($root === null) {
            CLI::error('Search path not found: ' . $path);
            return EXIT_ERROR;
        }

        $regex = $this->optBool($flags, 'regex', false);
        $extensions = $this->resolveExtensions($flags);
        $matches = 0;

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if (! $file->isFile()) {
                continue;
            }

            $pathname = $file->getPathname();

            if ($this->shouldSkip($pathname, $extensions)) {
                continue;
            }

            $lines = @file($pathname, FILE_IGNORE_NEW_LINES);
            if (! is_array($lines)) {
                continue;
            }

            foreach ($lines as $index => $line) {
                if ($this->lineMatches($line, $needle, $regex)) {
                    $matches++;
                    CLI::write(sprintf(
                        '%s:%d: %s',
                        ltrim(str_replace(ROOTPATH, '', $pathname), '/'),
                        $index + 1,
                        $line
                    ));
                }
            }
        }

        CLI::write(sprintf('Matches found: %d', $matches), $matches > 0 ? 'green' : 'yellow');

        return $matches > 0 ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function resolveArguments(array $args): array
    {
        if ($args === []) {
            return ['.', ''];
        }

        if (count($args) === 1) {
            return ['.', (string) $args[0]];
        }

        return [(string) array_shift($args), trim(implode(' ', $args))];
    }

    protected function resolvePath(string $path): ?string
    {
        $candidate = $path === '.' ? ROOTPATH : $path;

        if (! str_starts_with($candidate, ROOTPATH)) {
            $candidate = ROOTPATH . ltrim($candidate, '/');
        }

        $resolved = realpath($candidate);

        return $resolved !== false ? $resolved : null;
    }

    protected function resolveExtensions(array $flags): array
    {
        $ext = $this->optString($flags, 'ext', '');

        if ($ext === '') {
            return [];
        }

        return array_values(array_filter(array_map(
            static fn (string $value): string => ltrim(strtolower(trim($value)), '.'),
            explode(',', $ext)
        )));
    }

    protected function shouldSkip(string $path, array $extensions): bool
    {
        if (preg_match('#/(vendor|node_modules|writable|\.git)/#', $path) === 1) {
            return true;
        }

        if ($extensions === []) {
            return false;
        }

        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        return ! in_array($ext, $extensions, true);
    }

    protected function lineMatches(string $line, string $needle, bool $regex): bool
    {
        if (! $regex) {
            return str_contains($line, $needle);
        }

        $result = @preg_match('/' . str_replace('/', '\/', $needle) . '/', $line);

        return $result === 1;
    }
}
