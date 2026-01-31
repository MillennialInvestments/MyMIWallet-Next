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
     * @return array{docsDir: string, rawDir: string, timestamp: string}|array{error: string}
     */
    public static function resolveArtifactDirs(string $commandName, ?string $outOverride): array
    {
        $timestamp = gmdate('Ymd-His');
        $normalized = self::normalizeCommand($commandName);

        $docsRoot = rtrim(ROOTPATH, '/') . '/docs/aiops/artifacts';
        $rawRoot = rtrim(WRITEPATH, '/') . '/aiops/artifacts';

        $docsDir = $docsRoot . '/' . $normalized . '/' . $timestamp;
        $rawDir = $rawRoot . '/' . $normalized . '/' . $timestamp;

        if ($outOverride !== null && $outOverride !== '') {
            $resolved = self::resolvePath($outOverride);
            if (str_starts_with($resolved, $docsRoot)) {
                $docsDir = $resolved;
            } elseif (str_starts_with($resolved, $rawRoot)) {
                $rawDir = $resolved;
            } else {
                return ['error' => '--out must be inside docs/aiops/artifacts or writable/aiops/artifacts'];
            }
        }

        return [
            'docsDir' => $docsDir,
            'rawDir' => $rawDir,
            'timestamp' => $timestamp,
        ];
    }

    public static function writeArtifacts(
        string $docsDir,
        string $rawDir,
        string $summary,
        array $report,
        bool $writeDocs,
        bool $writeRaw
    ): bool {
        $summary = rtrim($summary) . PHP_EOL;
        $reportJson = json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;

        if ($writeDocs && ! self::writeBundle($docsDir, $summary, $reportJson)) {
            return false;
        }

        if ($writeRaw && ! self::writeBundle($rawDir, $summary, $reportJson)) {
            return false;
        }

        return true;
    }

    private static function writeBundle(string $dir, string $summary, string $reportJson): bool
    {
        if (! self::ensureDir($dir)) {
            CLI::error('Unable to create artifact directory: ' . $dir);
            return false;
        }

        if (file_put_contents($dir . '/summary.md', $summary) === false) {
            CLI::error('Unable to write summary artifact: ' . $dir . '/summary.md');
            return false;
        }

        if (file_put_contents($dir . '/report.json', $reportJson) === false) {
            CLI::error('Unable to write report artifact: ' . $dir . '/report.json');
            return false;
        }

        return true;
    }

    private static function ensureDir(string $dir): bool
    {
        if (is_dir($dir)) {
            return true;
        }

        return mkdir($dir, 0755, true);
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
}
