<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class ReleaseNotesService
{
    public function summarize(string $range = 'HEAD~1..HEAD'): string
    {
        $cmd = 'git --no-pager diff --name-only ' . escapeshellarg($range) . ' 2>/dev/null';
        exec($cmd, $out, $code);

        if ($code !== 0 || $out === []) {
            return '- No diff summary available.';
        }

        $lines = array_map(static fn ($file) => '- Updated `' . trim((string) $file) . '`', $out);
        return implode(PHP_EOL, $lines);
    }
}
