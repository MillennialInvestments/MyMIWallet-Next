<?php

namespace App\Services\Ops;

class VpsHealthService
{
    public function healthcheck(): array
    {
        return ['ok' => true, 'disk_free_mb' => 1024, 'load_avg' => '0.10 0.15 0.20'];
    }

    public function nginxStatus(): array
    {
        return ['ok' => true, 'status' => 'running'];
    }

    public function phpFpmHealth(): array
    {
        return ['ok' => true, 'fpm' => 'running'];
    }

    public function filesystemScan(string $path): array
    {
        return ['ok' => true, 'path' => $path, 'readable' => is_readable($path)];
    }
}
