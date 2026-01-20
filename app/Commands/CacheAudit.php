<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class CacheAudit extends BaseCommand
{
    protected $group = 'cache';
    protected $name = 'cache:audit';
    protected $description = 'Scan the repo for unsafe cache key usage.';
    protected $usage = 'cache:audit';

    public function run(array $params)
    {
        $issues = [];
        $path = ROOTPATH;
        $excluded = ['vendor', 'writable', 'node_modules', '.git', 'system', 'builds'];

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS)
        );
        foreach ($iterator as $file) {
            $relativePath = str_replace($path, '', $file->getPathname());
            $trimmed = ltrim($relativePath, DIRECTORY_SEPARATOR);
            foreach ($excluded as $exclude) {
                if (str_starts_with($trimmed, $exclude)) {
                    continue 2;
                }
            }

            if (str_contains($relativePath, DIRECTORY_SEPARATOR . 'node_modules' . DIRECTORY_SEPARATOR)
                || str_contains($relativePath, DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR)) {
                continue;
            }

            if (! $file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            $lines = file($file->getPathname(), FILE_IGNORE_NEW_LINES);
            if ($lines === false) {
                continue;
            }

            foreach ($lines as $index => $line) {
                if (strpos($line, 'CacheKey::') !== false
                    || strpos($line, 'safeCache') !== false
                    || strpos($line, 'sanitizeCacheKey') !== false
                    || strpos($line, 'sanitizedCacheKey') !== false
                    || strpos($line, 'sanitize_cache_key') !== false) {
                    continue;
                }

                $matches = [];
                $lineNumber = $index + 1;

                if (preg_match('/->(?:save|get|delete|remember)\(\s*([\'"])(.*?)\1/', $line, $matches)
                    || preg_match('/cache\(\s*([\'"])(.*?)\1/', $line, $matches)) {
                    $key = $matches[2] ?? '';
                    $reasons = $this->analyzeKey($key);
                    if (! empty($reasons)) {
                        $issues[] = [
                            'file' => $file->getPathname(),
                            'line' => $lineNumber,
                            'key'  => $key,
                            'reasons' => $reasons,
                        ];
                    }
                }
            }
        }

        if (empty($issues)) {
            CLI::write('Cache audit: no issues found.', 'green');
            return 0;
        }

        CLI::write(sprintf('Cache audit: %d issue(s) found.', count($issues)), 'red');
        foreach ($issues as $issue) {
            CLI::write(sprintf(' - %s:%d', $issue['file'], $issue['line']), 'yellow');
            CLI::write(sprintf('   key: %s', $issue['key']));
            CLI::write('   reasons: ' . implode('; ', $issue['reasons']));
            CLI::write('   suggestion: Use SafeCache::saveUser(...) / CacheKey::user(...) for user-scoped data.');
        }

        return 1;
    }

    private function analyzeKey(string $key): array
    {
        $reasons = [];

        if (preg_match('/[{}()\/\\\\@:]/', $key)) {
            $reasons[] = 'Reserved cache characters detected';
        }

        if (preg_match('/dashboardData|userData|profile/i', $key)) {
            $reasons[] = 'Too generic cache key';
        }

        if (preg_match('/user|profile|dashboard|wallet|budget|watchlist|investment|tax/i', $key)
            && ! preg_match('/uid[:_]/i', $key)) {
            $reasons[] = 'User-scoped key missing uid';
        }

        return $reasons;
    }
}
