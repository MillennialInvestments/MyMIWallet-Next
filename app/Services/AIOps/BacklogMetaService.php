<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class BacklogMetaService
{
    /**
     * @return array{attempts:int,last_status:string,last_run:string,locked:bool}
     */
    public function loadMeta(string $jobId): array
    {
        $path = $this->metaPath($jobId);
        if (! is_file($path)) {
            $meta = $this->defaults();
            $this->saveMeta($jobId, $meta);

            return $meta;
        }

        $decoded = json_decode((string) file_get_contents($path), true);
        if (! is_array($decoded)) {
            $meta = $this->defaults();
            $this->saveMeta($jobId, $meta);

            return $meta;
        }

        $meta = [
            'attempts' => max(0, (int) ($decoded['attempts'] ?? 0)),
            'last_status' => (string) ($decoded['last_status'] ?? ''),
            'last_run' => (string) ($decoded['last_run'] ?? ''),
            'locked' => (bool) ($decoded['locked'] ?? false),
        ];

        if ($meta['last_run'] === '') {
            $meta['last_run'] = gmdate('c');
            $this->saveMeta($jobId, $meta);
        }

        return $meta;
    }

    /**
     * @param array{attempts:int,last_status:string,last_run:string,locked:bool} $data
     */
    public function saveMeta(string $jobId, array $data): void
    {
        $dir = ROOTPATH . 'docs/_aiops/patches';
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $normalized = [
            'attempts' => max(0, (int) ($data['attempts'] ?? 0)),
            'last_status' => (string) ($data['last_status'] ?? ''),
            'last_run' => (string) ($data['last_run'] ?? gmdate('c')),
            'locked' => (bool) ($data['locked'] ?? false),
        ];

        file_put_contents($this->metaPath($jobId), json_encode($normalized, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
    }

    public function isLocked(string $jobId): bool
    {
        return (bool) $this->loadMeta($jobId)['locked'];
    }

    private function metaPath(string $jobId): string
    {
        return ROOTPATH . 'docs/_aiops/patches/' . $jobId . '.meta.json';
    }

    /**
     * @return array{attempts:int,last_status:string,last_run:string,locked:bool}
     */
    private function defaults(): array
    {
        return [
            'attempts' => 0,
            'last_status' => '',
            'last_run' => gmdate('c'),
            'locked' => false,
        ];
    }
}
