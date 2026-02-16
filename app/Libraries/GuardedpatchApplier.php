<?php

namespace App\Libraries;

class GuardedPatchApplier
{
    protected array $allowedPaths = [
        'app/Controllers',
        'app/Models',
        'app/Services',
    ];

    public function isAllowed(string $filePath): bool
    {
        foreach ($this->allowedPaths as $allowed) {
            if (str_starts_with($filePath, $allowed)) {
                return true;
            }
        }
        return false;
    }

    public function applyDiff(string $diffPath): array
    {
        if (!file_exists($diffPath)) {
            return ['ok' => false, 'error' => 'diff_not_found'];
        }

        $diff = file_get_contents($diffPath);

        preg_match_all('/\+\+\+ b\/(.+)/', $diff, $matches);

        foreach ($matches[1] ?? [] as $file) {
            if (!$this->isAllowed($file)) {
                return [
                    'ok' => false,
                    'error' => "Unauthorized file modification attempted: {$file}"
                ];
            }
        }

        exec('git apply ' . escapeshellarg($diffPath) . ' 2>&1', $output, $code);

        return [
            'ok' => $code === 0,
            'error' => $code === 0 ? null : implode("\n", $output)
        ];
    }
}
