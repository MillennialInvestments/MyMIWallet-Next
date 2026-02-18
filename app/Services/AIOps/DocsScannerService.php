<?php

namespace App\Services\AIOps;

use DirectoryIterator;
use Throwable;

class DocsScannerService
{
    public function scanAllDocs(string $docsRoot, int $limitDocs = 0): DocsScanResult
    {
        $files = $this->collectMarkdownFiles($docsRoot);
        if ($limitDocs > 0) $files = array_slice($files, 0, $limitDocs);

        $gapItems = [];
        $readLog  = [];

        foreach ($files as $path) {
            $content = @file_get_contents($path);
            if ($content === false) continue;

            $readLog[] = [
                'path' => $path,
                'sha1' => sha1($content),
                'bytes' => strlen($content),
            ];

            $gapItems = array_merge($gapItems, $this->extractGapItems($path, $content));
        }

        return new DocsScanResult($readLog, $gapItems);
    }

    private function collectMarkdownFiles(string $root): array
    {
        $rii = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($root));
        $out = [];

        foreach ($rii as $file) {
            if ($file->isDir()) continue;
            $p = $file->getPathname();
            if (strtolower(pathinfo($p, PATHINFO_EXTENSION)) === 'md') {
                $out[] = $p;
            }
        }

        sort($out);
        return $out;
    }

    private function extractGapItems(string $path, string $content): array
    {
        $items = [];

        // Signals
        $signals = [
            'TODO', 'FIXME', 'GAP', 'MISSING', 'NEEDS', 'NOT IMPLEMENTED', 'UNBUILT'
        ];

        // 1) Basic gap lines
        $lines = preg_split("/\r\n|\n|\r/", $content);
        foreach ($lines as $i => $line) {
            foreach ($signals as $sig) {
                if (stripos($line, $sig) !== false) {
                    $items[] = GapItem::fromDocLine($path, $i + 1, trim($line));
                    break;
                }
            }
        }

        // 2) Heuristic: class-like references
        if (preg_match_all('/\b(App\\\\[A-Za-z0-9_\\\\]+)\b/', $content, $m)) {
            foreach (array_unique($m[1]) as $fqcn) {
                $items[] = GapItem::fromClassRef($path, $fqcn);
            }
        }

        // 3) Heuristic: route-like references
        if (preg_match_all('#\b(/API/[A-Za-z0-9/_\-]+)\b#', $content, $m2)) {
            foreach (array_unique($m2[1]) as $route) {
                $items[] = GapItem::fromRouteRef($path, $route);
            }
        }

        return $items;
    }
}
