<?php

namespace App\Services\AIOps;

class DiffBuilder
{
    public function buildDiffArtifact(int $id, string $branch, string $patchDir, string $readyDir): array
    {
        $diffFile = $readyDir . '/diff.patch';

        // Only build if patch directory has something
        if (!is_dir($patchDir)) {
            return ['diff_file' => null, 'reason' => 'No patch dir'];
        }

        $files = $this->listFilesRecursive($patchDir);
        if (!$files) {
            return ['diff_file' => null, 'reason' => 'No patch files yet'];
        }

        // We do not apply patches automatically here. We just package patch content.
        // Convention: patchDir contains either:
        // - *.diff / *.patch (unified diffs), OR
        // - full replacement files (then AIOps should also provide a diff)
        $buf = "# AIOps diff artifact for instruction {$id}\n";
        $buf .= "# Branch: {$branch}\n\n";

        foreach ($files as $f) {
            $buf .= "### FILE: {$f}\n";
            $buf .= file_get_contents($f) . "\n\n";
        }

        file_put_contents($diffFile, $buf);
        return ['diff_file' => $diffFile, 'reason' => null];
    }

    private function listFilesRecursive(string $dir): array
    {
        $out = [];
        $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir));
        foreach ($it as $file) {
            if ($file->isFile()) {
                $out[] = $file->getPathname();
            }
        }
        return $out;
    }
}