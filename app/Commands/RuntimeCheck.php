<?php

namespace App\Commands;

use CodeIgniter\CLI\CLI;

class RuntimeCheck extends SafeBaseCommand
{
    protected string $group       = 'app';
    protected string $name        = 'runtime:check';
    protected $description = 'Validate runtime invariants (nginx, php, permissions, etc.).';

    protected function isDestructive(): bool
    {
        return false;
    }

    public function run(array $params)
    {
        CLI::write('MyMI Wallet – Runtime Check', 'yellow');
        CLI::newLine();

        CLI::write('PHP Version: ' . PHP_VERSION);

        $scanFiles = $this->getRuntimeScanFiles();

        $forbidden = $this->scanForbiddenFastCgiRefs($scanFiles);

        if (! empty($forbidden)) {
            CLI::newLine();
            CLI::error('❌ Forbidden FastCGI references detected:');

            foreach ($forbidden as $hit) {
                CLI::write(' - ' . $hit);
            }

            CLI::newLine();
            CLI::error('Runtime check FAILED.');
            return;
        }

        CLI::newLine();
        CLI::write('✅ Runtime check PASSED.', 'green');
    }

    /**
     * Only scan ACTIVE nginx config + CURRENT logs.
     * Do NOT scan ~/nginx/src, _archive, vendor, backups, etc.
     */
    private function getRuntimeScanFiles(): array
    {
        $home = rtrim(getenv('HOME') ?: '/home/mymiteam', '/');

        $files = [];

        // Active configs
        $confMain = $home . '/nginx/conf/nginx.conf';
        if (is_file($confMain)) {
            $files[] = $confMain;
        }

        foreach (glob($home . '/nginx/sites-enabled/*.conf') ?: [] as $f) {
            if (is_file($f)) {
                $files[] = $f;
            }
        }

        // Only scan the *current* logs (not archives)
        foreach ([
            $home . '/nginx/logs/error.log',
            $home . '/nginx/logs/access.log',
        ] as $log) {
            if (is_file($log)) {
                $files[] = $log;
            }
        }

        // If you have a per-site log you KNOW is current, include it explicitly:
        $siteErr = $home . '/nginx/logs/mymiwallet.com.error.log';
        if (is_file($siteErr)) {
            $files[] = $siteErr;
        }

        return array_values(array_unique($files));
    }

    private function scanForbiddenFastCgiRefs(array $files): array
    {
        $hits = [];

        // Make patterns precise (avoid matching random "9000" in source code)
        $patterns = [
            '/\bphp-cgi\b/i',
            '/\bphp-fpm\b/i',
            '/\bphp-pm\b/i',
            '/fastcgi_pass\s+[^;]*(9000|9071)\b/i',
            '/\b(9000|9071)\b/', // keep, but only after we restricted scan files
            '/\bphp82\b/i',      // OPTIONAL: remove this if php82 is not actually forbidden
        ];

        foreach ($files as $file) {
            $content = $this->readFileSafe($file);
            if ($content === null || $content === '') {
                continue;
            }

            foreach ($patterns as $pat) {
                if (preg_match($pat, $content)) {
                    $label = basename($file);

                    // Only show “found in” once per file/pattern category
                    // (prevents spam)
                    $hits[] = sprintf('%s found in %s', $this->patternLabel($pat), $file);
                }
            }
        }

        return array_values(array_unique($hits));
    }

    private function readFileSafe(string $path): ?string
    {
        // Avoid huge logs
        $maxBytes = 2 * 1024 * 1024; // 2MB
        $size = @filesize($path);
        if ($size === false) {
            return null;
        }

        // If log is huge, tail it
        if ($size > $maxBytes) {
            $fh = @fopen($path, 'rb');
            if (! $fh) return null;

            fseek($fh, -$maxBytes, SEEK_END);
            $data = stream_get_contents($fh);
            fclose($fh);
            return $data ?: null;
        }

        return @file_get_contents($path) ?: null;
    }

    private function patternLabel(string $pattern): string
    {
        if (str_contains($pattern, 'fastcgi_pass')) return 'fastcgi_pass:9000/9071';
        if (str_contains($pattern, 'php-cgi')) return 'php-cgi';
        if (str_contains($pattern, 'php-fpm')) return 'php-fpm';
        if (str_contains($pattern, 'php-pm')) return 'php-pm';
        if (str_contains($pattern, 'php82')) return 'php82';
        if (str_contains($pattern, '(9000|9071)')) return '9000/9071';
        return 'forbidden ref';
    }
}
