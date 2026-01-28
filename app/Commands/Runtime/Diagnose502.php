<?php

namespace App\Commands\Runtime;

use CodeIgniter\CLI\CLI;

class Diagnose502 extends \App\Commands\SafeBaseCommand
{
    protected $group = 'runtime';
    protected $name = 'runtime:diagnose-502';
    protected $description = 'Diagnose and optionally remediate 502/503 gateway errors';
    protected $usage = 'runtime:diagnose-502 [--force]';
    protected $options = [
        '--force' => 'Apply safe fixes (clear cache, remove stale sockets) after diagnostics',
    ];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $fixMode = isset($flags['force']);

        CLI::write('Runtime 502/503 Diagnostics', 'yellow');
        if ($fixMode) {
            CLI::write('Fix mode enabled (--force).', 'yellow');
        } else {
            CLI::write('Detection mode only. Re-run with --force to apply safe fixes.', 'yellow');
        }
        CLI::newLine();

        $phpStatus = $this->checkPhpHandler();
        $socketStatus = $this->checkFastCgiSockets($phpStatus);
        $configStatus = $this->scanNginxConfigs($socketStatus);
        $writableStatus = $this->checkWritablePaths();
        $cacheStatus = $this->checkCacheState();

        if ($fixMode) {
            $this->applyFixes($socketStatus, $cacheStatus, $writableStatus);
        }

        $summary = [
            'PHP handler detected' => $phpStatus['status'] ? '✔' : '❌',
            'FastCGI socket present' => $socketStatus['present'] ? '✔' : '❌',
            'fastcgi_pass mismatch' => $configStatus['mismatch'] ? '❌' : '✔',
            'Writable permissions' => $writableStatus['ok'] ? '✔' : '❌',
            'Cache state' => $cacheStatus['healthy'] ? '✔' : '⚠',
        ];

        CLI::newLine();
        CLI::write('Diagnosis Summary', 'yellow');
        CLI::write('─────────────────');
        foreach ($summary as $label => $status) {
            CLI::write(str_pad($label, 26) . ' ' . $status);
        }

        $blockingIssues = ! $phpStatus['status']
            || ! $socketStatus['present']
            || $configStatus['mismatch']
            || ! $writableStatus['ok'];

        return $blockingIssues ? EXIT_ERROR : EXIT_SUCCESS;
    }

    private function checkPhpHandler(): array
    {
        $home = $this->homeDir();
        $handlerSources = [];

        if (is_file($home . '/.php.sock')) {
            $handlerSources[] = 'dreamhost';
        }
        if ($this->processExists('php-fpm') || is_file('/tmp/php-fpm.sock')) {
            $handlerSources[] = 'php-fpm';
        }
        if ($this->processExists('php-cgi')) {
            $handlerSources[] = 'php-cgi';
        }

        $handler = 'unknown';
        if (in_array('dreamhost', $handlerSources, true)) {
            $handler = 'php-cgi (DreamHost)';
        } elseif (in_array('php-fpm', $handlerSources, true)) {
            $handler = 'php-fpm';
        } elseif (in_array('php-cgi', $handlerSources, true)) {
            $handler = 'php-cgi';
        }

        $status = $handler !== 'unknown';
        $label = $status ? '✔' : '❌';
        CLI::write(sprintf('%s PHP handler: %s', $label, $handler));

        if (count($handlerSources) > 1) {
            CLI::write('⚠ Multiple PHP handlers detected: ' . implode(', ', $handlerSources));
        }

        return [
            'status' => $status,
            'handler' => $handler,
            'sources' => $handlerSources,
        ];
    }

    private function checkFastCgiSockets(array $phpStatus): array
    {
        CLI::newLine();
        CLI::write('FastCGI / Socket Checks', 'yellow');

        $home = $this->homeDir();
        $sockets = [
            'dreamhost' => $home . '/.php.sock',
            'php-fpm' => '/tmp/php-fpm.sock',
        ];

        $present = false;
        $stale = false;
        $issues = [];

        foreach ($sockets as $label => $path) {
            if ($label === 'php-fpm' && ! in_array('php-fpm', $phpStatus['sources'], true) && ! is_file($path)) {
                continue;
            }

            $exists = file_exists($path);
            $socketStale = $exists ? $this->isSocketStale($path) : false;
            $present = $present || ($exists && ! $socketStale);
            $stale = $stale || $socketStale;

            if (! $exists) {
                $issues[] = sprintf('%s socket missing: %s', $label, $path);
            }
            if ($socketStale) {
                $issues[] = sprintf('%s socket stale: %s', $label, $path);
            }

            $status = $exists && ! $socketStale ? '✔' : '⚠';
            CLI::write(sprintf('%s %s', $status, $exists ? $path : 'missing'));
        }

        foreach ($issues as $issue) {
            CLI::write('⚠ ' . $issue);
        }

        return [
            'present' => $present,
            'stale' => $stale,
            'issues' => $issues,
        ];
    }

    private function scanNginxConfigs(array $socketStatus): array
    {
        CLI::newLine();
        CLI::write('Nginx fastcgi_pass Scan', 'yellow');

        $files = $this->listNginxConfigFiles();
        $targets = [];
        $mismatches = [];

        foreach ($files as $file) {
            $content = @file_get_contents($file);
            if ($content === false) {
                continue;
            }

            $found = $this->extractFastCgiTargets($content);
            foreach ($found as $target) {
                $targets[] = $target;

                if ($this->isFastCgiMismatch($target)) {
                    $mismatches[] = sprintf('%s in %s', $target, $file);
                }
            }
        }

        if ($files === []) {
            CLI::write('⚠ No nginx configs found in user space.');
        }

        foreach (array_unique($targets) as $target) {
            CLI::write('• fastcgi_pass ' . $target);
        }

        foreach (array_unique($mismatches) as $issue) {
            CLI::write('⚠ Mismatch: ' . $issue);
        }

        if ($targets === []) {
            CLI::write('⚠ No fastcgi_pass directives detected.');
        }

        return [
            'targets' => array_values(array_unique($targets)),
            'mismatch' => $mismatches !== [],
        ];
    }

    private function checkWritablePaths(): array
    {
        CLI::newLine();
        CLI::write('Writable Permissions', 'yellow');

        $paths = [
            WRITEPATH,
            rtrim(WRITEPATH, '/') . '/cache',
            rtrim(WRITEPATH, '/') . '/sessions',
            rtrim(WRITEPATH, '/') . '/logs',
        ];

        $issues = [];
        foreach ($paths as $path) {
            if (! is_dir($path)) {
                CLI::write('⚠ Missing: ' . $path);
                $issues[] = $path;
                continue;
            }

            if (! is_writable($path)) {
                CLI::write('❌ Not writable: ' . $path);
                $issues[] = $path;
                continue;
            }

            CLI::write('✔ Writable: ' . $path);
        }

        return [
            'ok' => $issues === [],
            'issues' => $issues,
        ];
    }

    private function checkCacheState(): array
    {
        CLI::newLine();
        CLI::write('Cache State', 'yellow');

        $cachePath = rtrim(WRITEPATH, '/') . '/cache';
        $count = $this->countFiles($cachePath);
        $healthy = $count < 5000;
        $label = $healthy ? '✔' : '⚠';

        CLI::write(sprintf('%s Cache files: %d', $label, $count));

        return [
            'count' => $count,
            'healthy' => $healthy,
            'path' => $cachePath,
        ];
    }

    private function applyFixes(array $socketStatus, array $cacheStatus, array $writableStatus): void
    {
        CLI::newLine();
        CLI::write('Safe Fixes (--force)', 'yellow');

        if (! $writableStatus['ok']) {
            CLI::write('⚠ Skipping cache cleanup: writable paths are not healthy.');
        } else {
            $cleared = $this->clearDirectoryFiles($cacheStatus['path']);
            CLI::write($cleared ? '✔ Cleared writable cache' : '⚠ No cache files cleared');
        }

        if ($socketStatus['stale']) {
            $dreamhostSocket = $this->homeDir() . '/.php.sock';
            if (file_exists($dreamhostSocket) && $this->isSocketStale($dreamhostSocket)) {
                $removed = @unlink($dreamhostSocket);
                CLI::write($removed ? '✔ Removed stale PHP socket' : '⚠ Unable to remove stale PHP socket');
            }
        }
    }

    private function listNginxConfigFiles(): array
    {
        $home = $this->homeDir();
        $files = [];

        $main = $home . '/nginx/conf/nginx.conf';
        if ($this->isConfigCandidate($main)) {
            $files[] = $main;
        }

        foreach (glob($home . '/nginx/sites-enabled/*.conf') ?: [] as $file) {
            if ($this->isConfigCandidate($file)) {
                $files[] = $file;
            }
        }

        return array_values(array_unique($files));
    }

    private function extractFastCgiTargets(string $content): array
    {
        $targets = [];
        if (preg_match_all('/fastcgi_pass\s+([^;\s]+)\s*;?/i', $content, $matches)) {
            foreach ($matches[1] as $match) {
                $targets[] = trim($match);
            }
        }

        return $targets;
    }

    private function isFastCgiMismatch(string $target): bool
    {
        $target = trim($target);

        if (str_starts_with($target, 'unix:')) {
            $path = substr($target, 5);
            return ! file_exists($path);
        }

        if (preg_match('/127\.0\.0\.1:(\d+)/', $target, $matches)) {
            $port = (int) $matches[1];
            if ($port === 9000 || $port === 9071) {
                return ! $this->processExists('php-fpm');
            }
        }

        return false;
    }

    private function isConfigCandidate(string $path): bool
    {
        if (! is_file($path)) {
            return false;
        }

        if (preg_match('/\.(bak|off)$/', $path)) {
            return false;
        }

        if (str_contains($path, '_archive/')) {
            return false;
        }

        if (str_contains($path, '/vendor/')) {
            return false;
        }

        return true;
    }

    private function processExists(string $process): bool
    {
        if (! function_exists('exec')) {
            return false;
        }

        $command = sprintf('pgrep -l %s 2>/dev/null', escapeshellarg($process));
        $output = [];
        $result = 1;
        @exec($command, $output, $result);

        return $result === 0 && $output !== [];
    }

    private function isSocketStale(string $path): bool
    {
        if (! file_exists($path)) {
            return false;
        }

        $errno = 0;
        $errstr = '';
        $client = @stream_socket_client('unix://' . $path, $errno, $errstr, 0.5);
        if ($client !== false) {
            fclose($client);
            return false;
        }

        return $errstr !== '';
    }

    private function clearDirectoryFiles(string $path): bool
    {
        if (! is_dir($path)) {
            return false;
        }

        $cleared = false;
        $iterator = new \DirectoryIterator($path);
        foreach ($iterator as $fileInfo) {
            if ($fileInfo->isDot()) {
                continue;
            }

            if ($fileInfo->isFile()) {
                $cleared = true;
                @unlink($fileInfo->getPathname());
            }
        }

        return $cleared;
    }

    private function countFiles(string $path): int
    {
        if (! is_dir($path)) {
            return 0;
        }

        $count = 0;
        $iterator = new \DirectoryIterator($path);
        foreach ($iterator as $fileInfo) {
            if ($fileInfo->isFile()) {
                $count++;
            }
        }

        return $count;
    }

    private function homeDir(): string
    {
        return rtrim(getenv('HOME') ?: '/home/mymiteam', '/');
    }
}
