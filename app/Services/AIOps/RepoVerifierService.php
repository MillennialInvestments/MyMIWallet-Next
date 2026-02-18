<?php

namespace App\Services\AIOps;

class RepoVerifierService
{
    public function verifyGapItems(array $gapItems): array
    {
        $root = realpath(WRITEPATH . '..'); // project root
        $out  = [];

        foreach ($gapItems as $item) {
            $item->exists = false;
            $item->evidence = null;

            if ($item->type === 'class') {
                $path = $this->inferPathFromFqcn($root, $item->reference);
                if ($path && is_file($path)) {
                    $item->exists = true;
                    $item->evidence = $path;
                }
            }

            if ($item->type === 'route') {
                // quick search in Routes.php and Modules
                $found = $this->grepRoutes($root, $item->reference);
                if ($found) {
                    $item->exists = true;
                    $item->evidence = $found;
                }
            }

            $out[] = $item;
        }

        return $out;
    }

    private function inferPathFromFqcn(string $root, string $fqcn): ?string
    {
        // Expect App\ => ./app
        if (! str_starts_with($fqcn, 'App\\')) return null;
        $rel = 'app/' . str_replace('\\', '/', substr($fqcn, 4)) . '.php';
        return $root . '/' . $rel;
    }

    private function grepRoutes(string $root, string $route): ?string
    {
        $candidates = [
            $root . '/app/Config/Routes.php',
            $root . '/app/Config/Routes/',
            $root . '/app/Modules',
        ];

        foreach ($candidates as $cand) {
            if (is_dir($cand)) {
                $rii = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($cand));
                foreach ($rii as $f) {
                    if ($f->isDir()) continue;
                    if (strtolower(pathinfo($f->getPathname(), PATHINFO_EXTENSION)) !== 'php') continue;
                    $body = @file_get_contents($f->getPathname());
                    if ($body !== false && strpos($body, $route) !== false) {
                        return $f->getPathname();
                    }
                }
            } elseif (is_file($cand)) {
                $body = @file_get_contents($cand);
                if ($body !== false && strpos($body, $route) !== false) {
                    return $cand;
                }
            }
        }

        return null;
    }
}
