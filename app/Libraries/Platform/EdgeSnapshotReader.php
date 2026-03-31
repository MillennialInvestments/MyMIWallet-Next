<?php

declare(strict_types=1);

namespace App\Libraries\Platform;

class EdgeSnapshotReader
{
    public function readStatus(string $artifactPath): array
    {
        return $this->readJson(rtrim($artifactPath, '/') . '/edge_status.json');
    }

    public function readMetrics(string $artifactPath): array
    {
        return $this->readJson(rtrim($artifactPath, '/') . '/edge_metrics.json');
    }

    private function readJson(string $file): array
    {
        if (! is_file($file)) {
            return [];
        }

        $decoded = json_decode((string) file_get_contents($file), true);

        return is_array($decoded) ? $decoded : [];
    }
}
