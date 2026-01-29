<?php

declare(strict_types=1);

namespace App\Libraries\Ops\Analyzers;

use App\Libraries\Ops\Issue;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class CspAnalyzer
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public function analyze(): array
    {
        $root = ROOTPATH;
        $scanRoots = [
            $root . 'app/Views/errors',
            $root . 'app/Views/partials',
            $root . 'app/Views/blog',
            $root . 'app/Views/Dashboard',
            $root . 'app/Views/Auth',
            $root . 'app/Views/themes/public/layouts',
        ];
        $excludedDirs = [
            'vendor',
            'writable',
            'node_modules',
            '.git',
            'system',
            'builds',
            'app/_legacy',
            'app/Views/emails',
            'app/Views/themes/public/layouts/total-index.php',
            'app/Views/themes/public/layouts/_sitenav-new.php',
        ];

        $hits = [];

        foreach ($scanRoots as $scanRoot) {
            if (! is_dir($scanRoot)) {
                continue;
            }

            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($scanRoot, RecursiveDirectoryIterator::SKIP_DOTS)
            );

            foreach ($iterator as $file) {
                if (! $file->isFile()) {
                    continue;
                }

                $path = $file->getPathname();
                $relative = ltrim(str_replace($root, '', $path), DIRECTORY_SEPARATOR);

                foreach ($excludedDirs as $exclude) {
                    if (str_starts_with($relative, $exclude)) {
                        continue 2;
                    }
                }

                if (! in_array($file->getExtension(), ['php', 'html'], true)) {
                    continue;
                }

                $contents = file_get_contents($path);
                if ($contents === false) {
                    continue;
                }

                $lines = preg_split('/\\r\\n|\\r|\\n/', $contents);
                if (! is_array($lines)) {
                    continue;
                }

                foreach ($lines as $index => $line) {
                    $lineNumber = $index + 1;

                    if (preg_match('/<script(?![^>]*\\bsrc=)[^>]*>/i', $line)
                        && ! preg_match('/nonce\\s*=/', $line)) {
                        $hits[] = $this->formatHit($relative, $lineNumber, 'inline <script> without nonce');
                    }

                    if (preg_match('/<style[^>]*>/i', $line)
                        && ! preg_match('/nonce\\s*=/', $line)) {
                        $hits[] = $this->formatHit($relative, $lineNumber, 'inline <style> without nonce');
                    }

                    if (preg_match('/\\bon(?:click|change|load|submit|input)\\s*=\\s*[\\\'\"]/i', $line)) {
                        $hits[] = $this->formatHit($relative, $lineNumber, 'inline event handler');
                    }

                    if (preg_match('/\\sstyle\\s*=\\s*/i', $line)) {
                        $hits[] = $this->formatHit($relative, $lineNumber, 'style attribute');
                    }
                }
            }
        }

        if ($hits === []) {
            return [];
        }

        return [
            Issue::build([
                'domain' => 'security',
                'severity' => 'P1',
                'title' => 'CSP audit: inline CSP violations detected',
                'evidence' => $hits,
                'suggested_fix' => [
                    'Replace inline scripts/styles with external files or add nonces.',
                    'Avoid inline event handlers in templates.',
                    'Re-run security:csp:audit after updates.',
                ],
                'ai_prompt' => 'Address CSP inline violations found in templates.',
                'owner' => 'human',
                'status' => 'open',
            ]),
        ];
    }

    /**
     * @return array{file:string,line:int,issue:string}
     */
    private function formatHit(string $file, int $line, string $issue): array
    {
        return [
            'file' => $file,
            'line' => $line,
            'issue' => $issue,
        ];
    }
}
