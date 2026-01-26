<?php

namespace App\Commands;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class SecurityCspAudit extends SafeBaseCommand
{
    protected string $group = 'security';
    protected string $name = 'security:csp:audit';
    protected $description = 'Scan view templates for CSP-unsafe inline scripts, styles, and handlers.';
    protected $usage = 'security:csp:audit';
    protected $options = [
        '--dry-run' => 'Preview actions without writing data',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:security:csp:audit] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

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

        $issues = [];

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

                $lines = preg_split('/\r\n|\r|\n/', $contents);
                if (! is_array($lines)) {
                    continue;
                }

                foreach ($lines as $index => $line) {
                    $lineNumber = $index + 1;

                    if (preg_match('/<script(?![^>]*\bsrc=)[^>]*>/i', $line)
                        && ! preg_match('/nonce\s*=/', $line)) {
                        $issues[] = $this->formatIssue($relative, $lineNumber, 'inline <script> without nonce');
                    }

                    if (preg_match('/<style[^>]*>/i', $line)
                        && ! preg_match('/nonce\s*=/', $line)) {
                        $issues[] = $this->formatIssue($relative, $lineNumber, 'inline <style> without nonce');
                    }

                    if (preg_match('/\bon(?:click|change|load|submit|input)\s*=\s*[\'"]/i', $line)) {
                        $issues[] = $this->formatIssue($relative, $lineNumber, 'inline event handler');
                    }

                    if (preg_match('/\sstyle\s*=\s*/i', $line)) {
                        $issues[] = $this->formatIssue($relative, $lineNumber, 'style attribute');
                    }
                }
            }
        }

        if ($issues === []) {
            CLI::write('CSP audit: no inline violations found.', 'green');
            log_message('info', '[spark:security:csp:audit] Completed', ['issues' => 0, 'dry_run' => $dryRun]);
            return EXIT_SUCCESS;
        }

        CLI::write(sprintf('CSP audit: %d issue(s) found.', count($issues)), 'red');
        foreach ($issues as $issue) {
            CLI::write(sprintf(' - %s:%d (%s)', $issue['file'], $issue['line'], $issue['issue']), 'yellow');
        }

        log_message('error', '[spark:security:csp:audit] Failed', [
            'reason' => 'CSP audit issues detected',
            'issues' => count($issues),
            'dry_run' => $dryRun,
        ]);

        return EXIT_ERROR;
    }

    /**
     * @return array{file:string,line:int,issue:string}
     */
    private function formatIssue(string $file, int $line, string $issue): array
    {
        return [
            'file' => $file,
            'line' => $line,
            'issue' => $issue,
        ];
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
