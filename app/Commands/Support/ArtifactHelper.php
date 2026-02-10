<?php

declare(strict_types=1);

namespace App\Commands\Support;

use CodeIgniter\CLI\CLI;

class ArtifactHelper
{
    public static function parseOptionValue(array $params, string $name): ?string
    {
        $count = count($params);
        $needle = '--' . $name;

        for ($i = 0; $i < $count; $i++) {
            $param = $params[$i];

            if ($param === $needle && isset($params[$i + 1])) {
                return trim((string) $params[$i + 1]);
            }

            if (str_starts_with($param, $needle . '=')) {
                return trim(substr($param, strlen($needle) + 1));
            }
        }

        return null;
    }

    public static function normalizeCommand(string $command): string
    {
        return str_replace([':', ' '], ['-', '-'], $command);
    }

    /**
     * @return array{dir: string, timestamp: string}|array{error: string}
     */
    public static function resolveArtifactDirs(string $commandName, ?string $outOverride): array
    {
        $timestamp = gmdate('Ymd-His');
        $normalized = self::normalizeCommand($commandName);

        $docsRoot = rtrim(ROOTPATH, '/') . '/docs/_support';

        $docsDir = $docsRoot . '/' . $normalized . '/' . $timestamp;

        if ($outOverride !== null && $outOverride !== '') {
            $resolved = self::resolvePath($outOverride);
            if (str_starts_with($resolved, $docsRoot)) {
                $docsDir = $resolved;
            } else {
                return ['error' => '--out must be inside docs/_support'];
            }
        }

        return [
            'dir' => $docsDir,
            'timestamp' => $timestamp,
        ];
    }

    public static function writeArtifacts(
        string $dir,
        string $summary,
        array $report,
        array $rawPayloads = [],
        ?array $meta = null
    ): bool {
        $summary = rtrim($summary) . PHP_EOL;
        $reportJson = json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;

        if (! self::writeBundle($dir, $summary, $reportJson, $rawPayloads, $meta)) {
            return false;
        }

        return true;
    }

    private static function writeBundle(
        string $dir,
        string $summary,
        string $reportJson,
        array $rawPayloads,
        ?array $meta
    ): bool
    {
        $artifactDir = str_starts_with($dir, ROOTPATH) ? $dir : '';

        if ($artifactDir === '') {
            CLI::error('Artifact directory must be rooted at ROOTPATH.');
            return false;
        }

        $artifactDir = rtrim($artifactDir, '/');
        $docsRoot = rtrim(ROOTPATH, '/') . '/docs/_support';

        if (! str_starts_with($artifactDir, $docsRoot)) {
            log_message('warning', 'Artifact path outside policy', ['path' => $artifactDir]);
            return false;
        }

        if (! self::ensureArtifactDir($artifactDir)) {
            CLI::error('Unable to create artifact directory: ' . $artifactDir);
            return false;
        }

        if (file_put_contents($artifactDir . '/summary.md', $summary) === false) {
            CLI::error('Unable to write summary artifact: ' . $artifactDir . '/summary.md');
            return false;
        }

        if (file_put_contents($artifactDir . '/report.json', $reportJson) === false) {
            CLI::error('Unable to write report artifact: ' . $artifactDir . '/report.json');
            return false;
        }

        if ($meta !== null) {
            $metaJson = json_encode($meta, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
            if (file_put_contents($artifactDir . '/meta.json', $metaJson) === false) {
                CLI::error('Unable to write meta artifact: ' . $artifactDir . '/meta.json');
                return false;
            }
        }

        foreach ($rawPayloads as $filename => $payload) {
            $target = $artifactDir . '/' . ltrim((string) $filename, '/');
            if (! str_starts_with($target, $artifactDir . '/')) {
                CLI::error('Refusing to write raw payload outside artifact directory.');
                return false;
            }
            $body = is_string($payload)
                ? $payload
                : json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            if ($body === false) {
                CLI::error('Unable to encode raw payload: ' . $filename);
                return false;
            }
            if (file_put_contents($target, $body . PHP_EOL) === false) {
                CLI::error('Unable to write raw payload: ' . $target);
                return false;
            }
        }

        return true;
    }

    public static function ensureArtifactDir(string $dir): bool
    {
        $artifactDir = str_starts_with($dir, ROOTPATH) ? $dir : '';

        if (is_dir($artifactDir)) {
            return true;
        }

        return mkdir($artifactDir, 0755, true);
    }

    private static function resolvePath(string $path): string
    {
        $path = trim($path);

        if ($path === '') {
            return $path;
        }

        if ($path[0] === '/') {
            return $path;
        }

        return rtrim(ROOTPATH, '/') . '/' . ltrim($path, '/');
    }

    public static function safeWrite(string $path, string $contents): bool
    {
        $resolved = ROOTPATH . 'docs/_support/' . basename($path);
        if (! self::guardPath($resolved)) {
            return false;
        }

        $dir = dirname($resolved);
        if (! self::ensureArtifactDir($dir)) {
            CLI::error('Unable to create directory for file: ' . $resolved);
            return false;
        }

        if (file_put_contents($resolved, $contents) === false) {
            CLI::error('Unable to write file: ' . $resolved);
            return false;
        }

        return true;
    }

    public static function safeAppend(string $path, string $contents): bool
    {
        $resolved = ROOTPATH . 'docs/_support/' . basename($path);
        if (! self::guardPath($resolved)) {
            return false;
        }

        $dir = dirname($resolved);
        if (! self::ensureArtifactDir($dir)) {
            CLI::error('Unable to create directory for file: ' . $resolved);
            return false;
        }

        if (file_put_contents($resolved, $contents, FILE_APPEND) === false) {
            CLI::error('Unable to append file: ' . $resolved);
            return false;
        }

        return true;
    }

    private static function guardPath(string $path): bool
    {
        $docsRoot = rtrim(ROOTPATH, '/') . '/docs/_support';

        if (! str_starts_with($path, $docsRoot)) {
            CLI::error('Refusing to write outside docs/_support.');
            return false;
        }

        return true;
    }
}
