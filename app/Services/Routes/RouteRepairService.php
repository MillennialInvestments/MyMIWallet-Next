<?php

declare(strict_types=1);

namespace App\Services\Routes;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;

final class RouteRepairService
{
    public function repair(array $relativePaths, bool $apply = false): array
    {
        $files = $this->expandPhpFiles($relativePaths);

        $result = [
            'files' => $files,
            'changes' => [],
            'manual_review' => [],
            'summary' => [
                'invalid_fixed' => 0,
                'namespace_fixed' => 0,
                'duplicates_removed' => 0,
            ],
        ];

        $controllerIndex = $this->buildControllerIndex();

        foreach ($files as $file) {
            $content = file_get_contents($file);
            if ($content === false) {
                $result['manual_review'][] = [
                    'file' => $file,
                    'line' => 0,
                    'message' => 'Could not read file.',
                ];
                continue;
            }

            $lines = preg_split("/\R/", $content);
            if (! is_array($lines)) {
                continue;
            }

            $seenExact = [];
            $newLines = [];
            $changed = false;

            foreach ($lines as $idx => $line) {
                $lineNo = $idx + 1;

                if (! str_contains($line, '$routes->')) {
                    $newLines[] = $line;
                    continue;
                }

                $originalLine = $line;

                // 1) Fix single-colon invalid handlers: Controller:method -> Controller::method
                if (preg_match("/'([^']+:[A-Za-z_][A-Za-z0-9_]*)'/", $line, $m)) {
                    $fixed = str_replace(':', '::', $m[1]);
                    $line = str_replace("'" . $m[1] . "'", "'" . $fixed . "'", $line);
                    if ($line !== $originalLine) {
                        $result['changes'][] = [
                            'file' => $file,
                            'line' => $lineNo,
                            'message' => 'Fixed invalid single-colon handler syntax.',
                        ];
                        $result['summary']['invalid_fixed']++;
                        $changed = true;
                    }
                }

                // 2) Attempt namespace repair for quoted handlers only
                $handlerInfo = $this->extractQuotedHandler($line);
                if ($handlerInfo !== null) {
                    [$fullQuoted, $handler] = $handlerInfo;

                    $resolved = $this->resolveHandlerNamespace($handler, $controllerIndex);

                    if ($resolved !== null && $resolved !== $handler) {
                        $line = str_replace($fullQuoted, "'" . $resolved . "'", $line);
                        $result['changes'][] = [
                            'file' => $file,
                            'line' => $lineNo,
                            'message' => 'Repaired handler namespace: ' . $handler . ' -> ' . $resolved,
                        ];
                        $result['summary']['namespace_fixed']++;
                        $changed = true;
                    } elseif ($resolved === null && $this->looksLikeControllerHandler($handler)) {
                        $result['manual_review'][] = [
                            'file' => $file,
                            'line' => $lineNo,
                            'message' => 'Could not resolve handler namespace: ' . $handler,
                        ];
                    }
                }

                // 3) Remove exact duplicate route lines only
                $signature = trim($line);
                if ($signature !== '' && isset($seenExact[$signature])) {
                    $result['changes'][] = [
                        'file' => $file,
                        'line' => $lineNo,
                        'message' => 'Removed exact duplicate route line.',
                    ];
                    $result['summary']['duplicates_removed']++;
                    $changed = true;
                    continue;
                }

                $seenExact[$signature] = true;
                $newLines[] = $line;
            }

            if ($apply && $changed) {
                file_put_contents($file, implode(PHP_EOL, $newLines) . PHP_EOL);
            }
        }

        return $result;
    }

    private function expandPhpFiles(array $relativePaths): array
    {
        $files = [];

        foreach ($relativePaths as $path) {
            $full = ROOTPATH . ltrim($path, '/\\');

            if (is_file($full) && substr($full, -4) === '.php') {
                $files[] = $full;
                continue;
            }

            if (is_dir($full)) {
                $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($full));
                $regex = new RegexIterator($it, '/^.+\.php$/i', RegexIterator::GET_MATCH);
                foreach ($regex as $match) {
                    $files[] = $match[0];
                }
            }
        }

        sort($files);

        return array_values(array_unique($files));
    }

    private function buildControllerIndex(): array
    {
        $index = [];

        $roots = [
            ROOTPATH . 'app/Controllers',
            ROOTPATH . 'app/Modules',
        ];

        foreach ($roots as $root) {
            if (! is_dir($root)) {
                continue;
            }

            $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root));
            $regex = new RegexIterator($it, '/^.+Controller\.php$/i', RegexIterator::GET_MATCH);

            foreach ($regex as $match) {
                $file = $match[0];
                $fqcn = $this->extractClassFromPhpFile($file);
                if ($fqcn === null) {
                    continue;
                }

                $short = substr($fqcn, strrpos($fqcn, '\\') + 1);
                $index[$short][] = $fqcn;
            }
        }

        return $index;
    }

    private function extractClassFromPhpFile(string $file): ?string
    {
        $src = file_get_contents($file);
        if ($src === false) {
            return null;
        }

        if (! preg_match('/namespace\s+([^;]+);/m', $src, $nsMatch)) {
            return null;
        }

        if (! preg_match('/class\s+([A-Za-z_][A-Za-z0-9_]*)/m', $src, $classMatch)) {
            return null;
        }

        return trim($nsMatch[1]) . '\\' . trim($classMatch[1]);
    }

    private function extractQuotedHandler(string $line): ?array
    {
        if (preg_match("/'([^']*(?:Controller|APIController|AdminController|OpsController)[^']*)'/", $line, $m)) {
            return [$m[0], $m[1]];
        }

        return null;
    }

    private function resolveHandlerNamespace(string $handler, array $controllerIndex): ?string
    {
        if (! $this->looksLikeControllerHandler($handler)) {
            return null;
        }

        if (str_contains($handler, '\\') && str_contains($handler, '::')) {
            [$class, $method] = explode('::', $handler, 2);
            if (class_exists(ltrim($class, '\\'))) {
                return ltrim($handler, '\\');
            }

            $short = substr($class, strrpos($class, '\\') + 1);
            if (! isset($controllerIndex[$short]) || count($controllerIndex[$short]) !== 1) {
                return null;
            }

            return $controllerIndex[$short][0] . '::' . $method;
        }

        if (str_contains($handler, '::')) {
            [$class, $method] = explode('::', $handler, 2);
            if (! isset($controllerIndex[$class])) {
                return null;
            }

            if (count($controllerIndex[$class]) !== 1) {
                return null;
            }

            return $controllerIndex[$class][0] . '::' . $method;
        }

        return null;
    }

    private function looksLikeControllerHandler(string $handler): bool
    {
        return str_contains($handler, '::') || preg_match('/^[A-Za-z_\\\\]+:[A-Za-z_]/', $handler) === 1;
    }
}