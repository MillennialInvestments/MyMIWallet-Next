<?php

declare(strict_types=1);

namespace App\Services\AIOps;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

class RepoScannerService
{
    /** @return array<string, array<int, string>> */
    public function buildContextSummary(): array
    {
        $summary = [
            'controllers' => [],
            'models' => [],
            'tables' => [],
            'routes' => [],
            'filters' => [],
            'spark_commands' => [],
        ];

        foreach ($this->scanPaths() as $path) {
            if (! is_dir($path)) {
                continue;
            }

            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
            /** @var SplFileInfo $file */
            foreach ($iterator as $file) {
                if (! $file->isFile() || $file->getExtension() !== 'php') {
                    continue;
                }

                $content = (string) @file_get_contents($file->getPathname());
                if ($content === '') {
                    continue;
                }

                preg_match_all('/class\s+([A-Za-z0-9_]+Controller)\b/', $content, $controllerMatches);
                preg_match_all('/class\s+([A-Za-z0-9_]+Model)\b/', $content, $modelMatches);
                preg_match_all('/\$table\s*=\s*[\'\"]([A-Za-z0-9_]+)[\'\"]\s*;/', $content, $tableMatches);
                preg_match_all('/\$routes->(?:get|post|put|delete|patch|match|group|resource)\([^\n;]+/', $content, $routeMatches);
                preg_match_all('/\b(?:filter|filters)\b[^\n;]*/i', $content, $filterMatches);
                preg_match_all('/protected\s+\$name\s*=\s*[\'\"]([^\'\"]+)[\'\"]\s*;/', $content, $sparkMatches);

                $summary['controllers'] = array_merge($summary['controllers'], $controllerMatches[1] ?? []);
                $summary['models'] = array_merge($summary['models'], $modelMatches[1] ?? []);
                $summary['tables'] = array_merge($summary['tables'], $tableMatches[1] ?? []);
                $summary['routes'] = array_merge($summary['routes'], $routeMatches[0] ?? []);
                $summary['filters'] = array_merge($summary['filters'], $filterMatches[0] ?? []);

                if (str_contains($file->getPathname(), '/Commands/')) {
                    $summary['spark_commands'] = array_merge($summary['spark_commands'], $sparkMatches[1] ?? []);
                }
            }
        }

        foreach ($summary as $key => $items) {
            $summary[$key] = array_values(array_unique(array_map('trim', $items)));
        }

        return $summary;
    }

    /** @return array<int, string> */
    private function scanPaths(): array
    {
        return [
            ROOTPATH . 'app',
            ROOTPATH . 'app/Modules',
            ROOTPATH . 'app/Libraries',
            ROOTPATH . 'app/Services',
        ];
    }
}
