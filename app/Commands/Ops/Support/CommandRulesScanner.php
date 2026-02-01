<?php

namespace App\Commands\Ops\Support;

class CommandRulesScanner
{
    public function scan(string $basePath): array
    {
        $results = [];

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($basePath)
        );

        foreach ($iterator as $file) {
            if (!$file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            $path = $file->getPathname();
            $contents = file_get_contents($path);

            if (strpos($contents, 'extends') === false) {
                continue;
            }

            $violations = [];

            // Rule 1: constructor
            if (preg_match('/__construct\s*\(/', $contents)) {
                $violations[] = 'Constructor detected';
            }

            // Rule 2: getOption()
            if (preg_match('/->\s*getOption\s*\(/', $contents)) {
                $violations[] = 'Illegal getOption()';
            }

            // Rule 3: option()
            if (preg_match('/->\s*option\s*\(/', $contents)) {
                $violations[] = 'Illegal option()';
            }

            // Rule 4: PSR-4 filename mismatch
            $className = $this->extractClassName($contents);
            if ($className && basename($path, '.php') !== $className) {
                $violations[] = 'PSR-4 filename mismatch';
            }

            if ($violations !== []) {
                $results[] = [
                    'class'      => $className ?? '(unknown)',
                    'file'       => $path,
                    'violations' => $violations,
                ];
            }
        }

        return $results;
    }

    private function extractClassName(string $contents): ?string
    {
        if (preg_match('/class\s+([A-Za-z0-9_]+)/', $contents, $m)) {
            return $m[1];
        }

        return null;
    }
}
