<?php

namespace App\Services\Ops;

class LogOpsService
{
    public function scan(): array
    {
        return ['ok' => true, 'errors' => 0, 'warnings' => 0];
    }

    public function watch(int $seconds = 10): array
    {
        return ['ok' => true, 'watch_seconds' => $seconds, 'events' => 0];
    }
}
