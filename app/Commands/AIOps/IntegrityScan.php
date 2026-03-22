<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class IntegrityScan extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:scan:integrity';
    protected $description = 'Scan CI4 app integrity for command inheritance, support files, view paths, and unsafe trim usage.';

    public function run(array $params)
    {
        $issues = [];

        $safeBasePath = APPPATH . 'Commands/SafeBaseCommand.php';
        $safeBaseContents = is_file($safeBasePath) ? (string) file_get_contents($safeBasePath) : '';
        if ($safeBaseContents === '' || ! str_contains($safeBaseContents, 'extends BaseCommand')) {
            $issues[] = 'SafeBaseCommand must extend CodeIgniter\\CLI\\BaseCommand.';
        }

        if (! is_file(APPPATH . 'Support/Http.php')) {
            $issues[] = 'Missing support dependency: app/Support/Http.php';
        }

        $fullScan = in_array('full', $params, true) || in_array('--full', $params, true);
        $targets = $this->scanTargets($fullScan);

        foreach ($this->scanForMissingAppClasses($targets) as $issue) {
            $issues[] = $issue;
        }

        foreach ($this->scanForInvalidViews($targets) as $issue) {
            $issues[] = $issue;
        }

        foreach ($this->scanForUnsafeTrimUsage($targets) as $issue) {
            $issues[] = $issue;
        }

        if ($issues === []) {
            CLI::write('PASS: integrity scan found no blocking issues.', 'green');
            return;
        }

        CLI::error('FAIL: integrity scan found ' . count($issues) . ' issue(s).');
        foreach ($issues as $issue) {
            CLI::write('- ' . $issue, 'yellow');
        }

        exit(EXIT_ERROR);
    }

    /**
     * @return list<string>
     */
    private function scanForMissingAppClasses(array $targets): array
    {
        $issues = [];

        foreach ($this->phpFiles($targets) as $file) {
            $lines = @file($file, FILE_IGNORE_NEW_LINES) ?: [];
            foreach ($lines as $index => $line) {
                if (! preg_match('/^use\s+(App\\[^;{]+);$/', trim($line), $match)) {
                    continue;
                }

                $fqcn = trim($match[1]);
                if (str_contains($fqcn, ' as ')) {
                    $fqcn = trim((string) preg_replace('/\s+as\s+.*/', '', $fqcn));
                }

                $classPath = APPPATH . str_replace('App\\', '', $fqcn) . '.php';
                $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $classPath);

                if (! is_file($classPath)) {
                    $issues[] = $this->relativePath($file) . ':' . ($index + 1) . ' references missing class ' . $fqcn;
                }
            }
        }

        return array_values(array_unique($issues));
    }

    /**
     * @return list<string>
     */
    private function scanForInvalidViews(array $targets): array
    {
        $issues = [];
        $locator = service('locator');

        foreach ($this->phpFiles($targets) as $file) {
            $contents = (string) file_get_contents($file);
            if ($contents === '') {
                continue;
            }

            if (! preg_match_all('~(?:view|respondWithRendered|renderTheme)\(\s*[\'\"]([^\'\"]+)[\'\"]~', $contents, $matches)) {
                continue;
            }

            foreach ($matches[1] as $view) {
                if (! str_contains($view, '/') && ! str_contains($view, '\\')) {
                    continue;
                }

                if (str_contains($view, '$') || str_contains($view, '{') || str_contains($view, '}')) {
                    continue;
                }
                if ($this->viewExists($locator, $view)) {
                    continue;
                }

                $issues[] = $this->relativePath($file) . ' references missing view ' . $view;
            }
        }

        return array_values(array_unique($issues));
    }

    /**
     * @return list<string>
     */
    private function scanForUnsafeTrimUsage(array $targets): array
    {
        $issues = [];

        foreach ($this->phpFiles($targets) as $file) {
            $lines = @file($file, FILE_IGNORE_NEW_LINES) ?: [];
            foreach ($lines as $index => $line) {
                if (preg_match('/\btrim\(\s*\$[A-Za-z_][A-Za-z0-9_]*\s*\)/', $line)) {
                    $issues[] = $this->relativePath($file) . ':' . ($index + 1) . ' may call trim() on a nullable value';
                }
            }
        }

        return $issues;
    }

    private function viewExists($locator, string $view): bool
    {
        $view = preg_replace('/\.php$/', '', $view) ?? $view;
        if ($locator->locateFile($view, 'Views')) {
            return true;
        }

        $normalized = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $view);
        $candidates = [
            APPPATH . 'Views' . DIRECTORY_SEPARATOR . $normalized . '.php',
        ];

        if (str_starts_with($view, 'App\\')) {
            $candidates[] = APPPATH . str_replace(['App\\', '\\'], ['', DIRECTORY_SEPARATOR], $view) . '.php';
        }

        foreach ($candidates as $candidate) {
            if (is_file($candidate)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return list<string>
     */
    /**
     * @param list<string> $targets
     * @return list<string>
     */
    private function phpFiles(array $targets): array
    {
        $files = [];

        foreach ($targets as $target) {
            if (is_file($target)) {
                if (pathinfo($target, PATHINFO_EXTENSION) === 'php') {
                    $files[] = $target;
                }

                continue;
            }

            if (! is_dir($target)) {
                continue;
            }

            $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($target, \FilesystemIterator::SKIP_DOTS));
            foreach ($iterator as $file) {
                if (! $file->isFile() || $file->getExtension() !== 'php') {
                    continue;
                }

                $files[] = $file->getPathname();
            }
        }

        $files = array_values(array_unique($files));
        sort($files);

        return $files;
    }

    /**
     * @return list<string>
     */
    private function scanTargets(bool $fullScan): array
    {
        if ($fullScan) {
            return [APPPATH];
        }

        return [
            APPPATH . 'Commands',
            APPPATH . 'Controllers',
            APPPATH . 'Modules/Management/Controllers',
            APPPATH . 'Modules/Management/Views/index.php',
        ];
    }

    private function relativePath(string $path): string
    {
        $root = rtrim(ROOTPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        if (str_starts_with($path, $root)) {
            return substr($path, strlen($root));
        }

        return $path;
    }
}
