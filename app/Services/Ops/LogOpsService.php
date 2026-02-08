<?php

declare(strict_types=1);

namespace App\Services\Ops;

class LogOpsService
{
    /** @return array<string,mixed> */
    public function scan(int $tail = 200): array
    {
        $files = $this->collectFiles();
        $items = [];
        foreach ($files as $file) {
            $items[$file] = trim((string) shell_exec('tail -n ' . (int) $tail . ' ' . escapeshellarg($file) . ' 2>/dev/null'));
        }

        return ['files' => array_keys($items), 'contents' => $items];
    }

    /** @param array<string,mixed> $scan @return array<string,mixed> */
    public function summarize(array $scan): array
    {
        $lines = [];
        foreach (($scan['contents'] ?? []) as $content) {
            if (! is_string($content)) {
                continue;
            }
            $lines = array_merge($lines, preg_split('/\r\n|\r|\n/', $content) ?: []);
        }

        $severity = ['error' => 0, 'warning' => 0, 'notice' => 0, 'other' => 0];
        $groups = [];
        foreach ($lines as $line) {
            $l = trim($line);
            if ($l === '') {
                continue;
            }
            $key = strtolower(substr($l, 0, 140));
            $groups[$key] = ($groups[$key] ?? 0) + 1;

            if (str_contains(strtolower($l), 'error')) {
                $severity['error']++;
            } elseif (str_contains(strtolower($l), 'warning')) {
                $severity['warning']++;
            } elseif (str_contains(strtolower($l), 'notice')) {
                $severity['notice']++;
            } else {
                $severity['other']++;
            }
        }

        arsort($groups);

        return [
            'severity' => $severity,
            'top_messages' => array_slice($groups, 0, 15, true),
            'detectors' => [
                'memory_exhaustion' => $this->contains($lines, 'Allowed memory size exhausted'),
                'routing_failures' => $this->contains($lines, 'Page Not Found'),
                'controller_failures' => $this->contains($lines, 'Controller or its method is not found'),
                'db_outages' => $this->contains($lines, 'SQLSTATE') || $this->contains($lines, 'Connection refused'),
            ],
        ];
    }

    /** @return list<string> */
    private function collectFiles(): array
    {
        $patterns = [
            ROOTPATH . 'writable/logs/*.log',
            '/var/log/nginx/error.log',
            '/var/log/php*-fpm.log',
            '/home/*/logs/*.log',
        ];

        $files = [];
        foreach ($patterns as $pattern) {
            foreach (glob($pattern) ?: [] as $file) {
                if (is_readable($file)) {
                    $files[] = $file;
                }
            }
        }

        return array_values(array_unique($files));
    }

    /** @param list<string> $lines */
    private function contains(array $lines, string $needle): bool
    {
        foreach ($lines as $line) {
            if (stripos($line, $needle) !== false) {
                return true;
            }
        }

        return false;
    }
}
