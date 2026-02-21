<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class FingerprintService
{
    public function fingerprintFiles(array $paths): array
    {
        $out = [];
        foreach ($paths as $path) {
            $full = ROOTPATH . ltrim((string) $path, '/');
            $out[(string) $path] = is_file($full) ? hash_file('sha1', $full) : null;
        }

        return $out;
    }
}
