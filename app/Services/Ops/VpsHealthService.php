<?php

declare(strict_types=1);

namespace App\Services\Ops;

class VpsHealthService
{
    /** @return array<string,mixed> */
    public function healthSnapshot(): array
    {
        return [
            'disk' => $this->run('df -h'),
            'inodes' => $this->run('df -i'),
            'memory' => $this->run('free -m'),
            'php_version' => PHP_VERSION,
            'ci_environment' => env('CI_ENVIRONMENT', 'production'),
            'load_average' => sys_getloadavg(),
            'time_drift_seconds' => time() - strtotime(gmdate('Y-m-d H:i:s')),
            'php_extensions_required' => $this->requiredExtensions(),
            'cache_writable' => $this->writableChecks(),
        ];
    }

    /** @return array<string,mixed> */
    public function nginxStatus(): array
    {
        return [
            'ports' => [
                '80' => $this->portOpen('127.0.0.1', 80),
                '443' => $this->portOpen('127.0.0.1', 443),
            ],
            'php_fpm_socket_exists' => $this->findFpmSocket(),
            'fastcgi_probe' => $this->run('php -r "echo function_exists(\'fsockopen\') ? \"ok\" : \"missing\";"'),
            'error_log_tail' => $this->tailReadableLogs([
                '/var/log/nginx/error.log',
                '/home/*/logs/*.log',
            ]),
            'proxy_headers_note' => 'Verify X-Forwarded-Proto and Host headers in NGINX vhost config.',
        ];
    }

    /** @return array<string,mixed> */
    public function phpFpmHealth(): array
    {
        return [
            'php_cli_version' => PHP_VERSION,
            'php_fpm_socket' => $this->findFpmSocket(),
            'memory_limit' => ini_get('memory_limit'),
            'max_execution_time' => ini_get('max_execution_time'),
            'opcache_enabled' => extension_loaded('Zend OPcache'),
            'disabled_functions' => ini_get('disable_functions') ?: '',
        ];
    }

    /** @return array<string,mixed> */
    public function filesystemScan(int $minutes = 60): array
    {
        $recent = trim((string) shell_exec('find writable -type f -mmin -' . (int) $minutes . ' 2>/dev/null | head -n 30'));

        return [
            'writable_paths' => $this->writableChecks(),
            'upload_paths' => [
                'writable/uploads' => is_writable(ROOTPATH . 'writable/uploads'),
                'public/uploads' => is_writable(ROOTPATH . 'public/uploads'),
            ],
            'broken_symlinks' => $this->run('find . -xtype l 2>/dev/null | head -n 30'),
            'recent_modifications' => $recent === '' ? [] : explode("\n", $recent),
        ];
    }

    private function run(string $command): string
    {
        $output = shell_exec($command . ' 2>&1');
        return trim((string) $output);
    }

    /** @return array<string,bool> */
    private function writableChecks(): array
    {
        $paths = [
            'writable',
            'writable/cache',
            'writable/logs',
            'writable/session',
        ];

        $result = [];
        foreach ($paths as $path) {
            $result[$path] = is_writable(ROOTPATH . $path);
        }

        return $result;
    }

    /** @return array<string,bool> */
    private function requiredExtensions(): array
    {
        $required = ['intl', 'mbstring', 'json', 'openssl', 'curl'];
        $result = [];

        foreach ($required as $ext) {
            $result[$ext] = extension_loaded($ext);
        }

        return $result;
    }

    /** @return string|false */
    private function findFpmSocket()
    {
        $candidates = glob('/run/php/*.sock') ?: [];
        if ($candidates !== []) {
            return $candidates[0];
        }

        $alt = glob('/var/run/php/*.sock') ?: [];
        return $alt[0] ?? false;
    }

    /** @param list<string> $patterns @return array<string,string> */
    private function tailReadableLogs(array $patterns): array
    {
        $result = [];
        foreach ($patterns as $pattern) {
            $files = glob($pattern) ?: [];
            foreach ($files as $file) {
                if (! is_readable($file)) {
                    continue;
                }
                $result[$file] = trim((string) shell_exec('tail -n 20 ' . escapeshellarg($file) . ' 2>/dev/null'));
            }
        }

        return $result;
    }

    private function portOpen(string $host, int $port): bool
    {
        $conn = @fsockopen($host, (string) $port, $errno, $errstr, 1.0);
        if (! is_resource($conn)) {
            return false;
        }
        fclose($conn);

        return true;
    }
}
