<?php

declare(strict_types=1);

namespace App\Libraries\Ops\Analyzers;

use App\Libraries\Ops\Issue;

class RuntimeAnalyzer
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public function analyze(): array
    {
        $files = $this->getRuntimeScanFiles();
        $forbidden = $this->scanForbiddenFastCgiRefs($files);

        if ($forbidden === []) {
            return [];
        }

        return [
            Issue::build([
                'domain' => 'ops',
                'severity' => 'P0',
                'title' => 'Runtime check failed: forbidden FastCGI references',
                'evidence' => [
                    'matches' => $forbidden,
                    'files_scanned' => $files,
                ],
                'suggested_fix' => [
                    'Update nginx configs to use the correct PHP handler.',
                    'Remove forbidden php-cgi/php-fpm references.',
                    'Re-run runtime:check after updating configs.',
                ],
                'ai_prompt' => 'Investigate forbidden FastCGI references from runtime:check output.',
                'owner' => 'human',
                'status' => 'open',
            ]),
        ];
    }

    /**
     * @return array<int, string>
     */
    private function getRuntimeScanFiles(): array
    {
        $home = rtrim(env('HOME') ?: '/home/mymiteam', '/');

        $files = [];

        $confMain = $home . '/nginx/conf/nginx.conf';
        if (is_file($confMain)) {
            $files[] = $confMain;
        }

        foreach (glob($home . '/nginx/sites-enabled/*.conf') ?: [] as $file) {
            if (is_file($file)) {
                $files[] = $file;
            }
        }

        foreach ([
            $home . '/nginx/logs/error.log',
            $home . '/nginx/logs/access.log',
        ] as $log) {
            if (is_file($log)) {
                $files[] = $log;
            }
        }

        $siteErr = $home . '/nginx/logs/mymiwallet.com.error.log';
        if (is_file($siteErr)) {
            $files[] = $siteErr;
        }

        return array_values(array_unique($files));
    }

    /**
     * @param array<int, string> $files
     * @return array<int, string>
     */
    private function scanForbiddenFastCgiRefs(array $files): array
    {
        $hits = [];
        $patterns = [
            '/\\bphp-cgi\\b/i',
            '/\\bphp-fpm\\b/i',
            '/\\bphp-pm\\b/i',
            '/fastcgi_pass\\s+[^;]*(9000|9071)\\b/i',
            '/\\b(9000|9071)\\b/',
            '/\\bphp82\\b/i',
        ];

        foreach ($files as $file) {
            $content = $this->readFileSafe($file);
            if ($content === null || $content === '') {
                continue;
            }

            foreach ($patterns as $pattern) {
                if (preg_match($pattern, $content)) {
                    $hits[] = sprintf('%s found in %s', $this->patternLabel($pattern), $file);
                }
            }
        }

        return array_values(array_unique($hits));
    }

    private function readFileSafe(string $path): ?string
    {
        $maxBytes = 2 * 1024 * 1024;
        $size = @filesize($path);
        if ($size === false) {
            return null;
        }

        if ($size > $maxBytes) {
            $fh = @fopen($path, 'rb');
            if (! $fh) {
                return null;
            }

            fseek($fh, -$maxBytes, SEEK_END);
            $data = stream_get_contents($fh);
            fclose($fh);
            return $data ?: null;
        }

        return @file_get_contents($path) ?: null;
    }

    private function patternLabel(string $pattern): string
    {
        if (str_contains($pattern, 'fastcgi_pass')) {
            return 'fastcgi_pass:9000/9071';
        }
        if (str_contains($pattern, 'php-cgi')) {
            return 'php-cgi';
        }
        if (str_contains($pattern, 'php-fpm')) {
            return 'php-fpm';
        }
        if (str_contains($pattern, 'php-pm')) {
            return 'php-pm';
        }
        if (str_contains($pattern, 'php82')) {
            return 'php82';
        }
        if (str_contains($pattern, '(9000|9071)')) {
            return '9000/9071';
        }
        return 'forbidden ref';
    }
}
