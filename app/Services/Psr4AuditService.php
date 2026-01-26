<?php

declare(strict_types=1);

namespace App\Services;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

class Psr4AuditService
{
    private const LEGACY_SUFFIXES = ['.orig.php', '.bak.php', '.disabled.php'];

    /** @var array<string, string> */
    private array $namespaceRoots;

    /** @var array<int, string> */
    private array $excludedPaths;

    /** @var array<int, string> */
    private array $ignorePatterns;

    public function __construct()
    {
        $this->namespaceRoots = [
            'App\\' => rtrim(APPPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR,
            'Config\\' => rtrim(APPPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR,
        ];

        $this->excludedPaths = [
            rtrim(APPPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . '_legacy',
            rtrim(APPPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'Migrations',
        ];

        $this->ignorePatterns = $this->loadIgnorePatterns();
    }

    /**
     * @return array{
     *  summary: array{
     *      total_classes:int,
     *      psr4_ok:int,
     *      violations:int,
     *      real_violations:int,
     *      legacy_globals:int,
     *      legacy_files:int,
     *      ignored_files:int,
     *      last_scan:string
     *  },
     *  issues: array<int, array<string, mixed>>,
     *  legacy_files: array<int, string>,
     *  ignored_files: array<int, string>,
     *  classes: array<string, array{file:string, namespace:string, class:string}>
     * }
     */
    public function audit(): array
    {
        $issues = [];
        $legacyFiles = [];
        $ignoredFiles = [];
        $legacyGlobals = [];
        $classes = [];
        $classIssues = [];
        $scanTime = date('Y-m-d H:i:s');

        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(APPPATH));

        /** @var SplFileInfo $file */
        foreach ($iterator as $file) {
            if (! $file->isFile()) {
                continue;
            }

            if ($file->getExtension() !== 'php') {
                continue;
            }

            $filePath = $file->getPathname();
            $relativePath = $this->toRelativePath($filePath);

            if ($this->shouldIgnore($relativePath)) {
                $ignoredFiles[] = $relativePath;
                continue;
            }

            if ($this->isLegacyPath($filePath)) {
                $legacyFiles[] = $relativePath;
                continue;
            }

            if ($this->hasLegacySuffix($file->getFilename())) {
                $issues[] = [
                    'type' => 'legacy-suffix',
                    'file' => $relativePath,
                    'message' => 'Legacy suffix found in active app tree.',
                ];
                $legacyFiles[] = $relativePath;
                continue;
            }

            $contents = @file_get_contents($filePath);
            if ($contents === false) {
                continue;
            }

            $namespace = $this->extractNamespace($contents);
            $classNames = $this->extractClasses($contents);

            if (empty($classNames)) {
                continue;
            }

            if (count($classNames) > 1) {
                $issues[] = [
                    'type' => 'multi-class',
                    'file' => $relativePath,
                    'classes' => $classNames,
                    'message' => 'Multiple class declarations detected in file.',
                ];
            }

            $className = $classNames[0];
            $fqcn = $namespace ? $namespace . '\\' . $className : $className;

            $classes[$fqcn] = [
                'file' => $relativePath,
                'namespace' => $namespace ?? '',
                'class' => $className,
            ];

            if ($namespace === null) {
                $issues[] = [
                    'type' => 'legacy-global',
                    'class' => $fqcn,
                    'file' => $relativePath,
                    'message' => 'Legacy global class detected (no namespace).',
                ];
                $legacyGlobals[] = $fqcn;
                continue;
            }

            $rootPath = $this->resolveRootPath($namespace);
            if ($rootPath === null) {
                $issues[] = [
                    'type' => 'namespace-root',
                    'class' => $fqcn,
                    'file' => $relativePath,
                    'namespace' => $namespace,
                    'message' => 'Namespace root does not map to configured PSR-4 roots.',
                ];
                $classIssues[$fqcn] = true;
                continue;
            }

            $expectedDir = $this->expectedDirectory($rootPath, $namespace);
            $actualDir = rtrim($file->getPath(), DIRECTORY_SEPARATOR);

            if ($expectedDir !== null && rtrim($expectedDir, DIRECTORY_SEPARATOR) !== $actualDir) {
                $issues[] = [
                    'type' => 'directory-mismatch',
                    'class' => $fqcn,
                    'file' => $relativePath,
                    'expected' => $this->toRelativePath($expectedDir) . '/',
                    'found' => $this->toRelativePath($actualDir) . '/',
                ];
                $classIssues[$fqcn] = true;
            }

            if (! $this->filenameMatchesClass($file->getFilename(), $className, $namespace, $filePath)) {
                $issues[] = [
                    'type' => 'filename-mismatch',
                    'class' => $fqcn,
                    'file' => $relativePath,
                    'expected' => $this->buildExpectedPath($expectedDir, $className),
                    'found' => $relativePath,
                ];
                $classIssues[$fqcn] = true;
            }
        }

        $totalClasses = count($classes);
        $violations = count(array_keys($classIssues));

        return [
            'summary' => [
                'total_classes' => $totalClasses,
                'psr4_ok' => max(0, $totalClasses - $violations),
                'violations' => $violations,
                'real_violations' => $violations,
                'legacy_globals' => count($legacyGlobals),
                'legacy_files' => count($legacyFiles),
                'ignored_files' => count($ignoredFiles),
                'last_scan' => $scanTime,
            ],
            'issues' => $issues,
            'legacy_files' => $legacyFiles,
            'ignored_files' => $ignoredFiles,
            'classes' => $classes,
        ];
    }

    /**
     * @return array<int, string>
     */
    private function loadIgnorePatterns(): array
    {
        $root = rtrim(dirname(APPPATH), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $path = $root . 'docs/psr4/.psr4ignore';

        if (! is_file($path)) {
            return [];
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            return [];
        }

        $patterns = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }

            $patterns[] = $line;
        }

        return $patterns;
    }

    private function shouldIgnore(string $relativePath): bool
    {
        if (empty($this->ignorePatterns)) {
            return false;
        }

        $relativePath = str_replace('\\', '/', $relativePath);

        foreach ($this->ignorePatterns as $pattern) {
            if ($this->matchesPattern($relativePath, $pattern)) {
                return true;
            }
        }

        return false;
    }

    private function matchesPattern(string $path, string $pattern): bool
    {
        $pattern = str_replace('\\', '/', trim($pattern));
        $path = str_replace('\\', '/', $path);

        if ($pattern === '') {
            return false;
        }

        if (! str_contains($pattern, '/')) {
            $path = basename($path);
        }

        $regex = $this->globToRegex($pattern);

        return (bool) preg_match($regex, $path);
    }

    private function globToRegex(string $pattern): string
    {
        $quoted = preg_quote($pattern, '/');
        $quoted = str_replace('\*\*', '.*', $quoted);
        $quoted = str_replace('\*', '[^\\/]*', $quoted);
        $quoted = str_replace('\?', '.', $quoted);

        return '/^' . $quoted . '$/';
    }

    private function isLegacyPath(string $path): bool
    {
        foreach ($this->excludedPaths as $excluded) {
            $excluded = rtrim($excluded, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
            if (str_starts_with($path, $excluded)) {
                return true;
            }
        }

        return false;
    }

    private function hasLegacySuffix(string $filename): bool
    {
        foreach (self::LEGACY_SUFFIXES as $suffix) {
            if (str_ends_with($filename, $suffix)) {
                return true;
            }
        }

        return false;
    }

    private function extractNamespace(string $contents): ?string
    {
        if (preg_match('/^\s*namespace\s+([^;]+);/m', $contents, $matches)) {
            return trim($matches[1]);
        }

        return null;
    }

    /**
     * @return array<int, string>
     */
    private function extractClasses(string $contents): array
    {
        if (preg_match_all('/^\s*(?:abstract\s+|final\s+)?(class|interface|trait|enum)\s+([A-Za-z0-9_]+)/m', $contents, $matches)) {
            return $matches[2];
        }

        return [];
    }

    private function resolveRootPath(?string $namespace): ?string
    {
        if ($namespace === null) {
            return null;
        }

        foreach ($this->namespaceRoots as $root => $path) {
            if ($namespace === rtrim($root, '\\') || str_starts_with($namespace, $root)) {
                return $path;
            }
        }

        return null;
    }

    private function expectedDirectory(string $rootPath, ?string $namespace): ?string
    {
        if ($namespace === null) {
            return null;
        }

        foreach ($this->namespaceRoots as $root => $basePath) {
            $root = rtrim($root, '\\');
            if ($namespace === $root) {
                return rtrim($basePath, DIRECTORY_SEPARATOR);
            }

            if (str_starts_with($namespace, $root . '\\')) {
                $suffix = substr($namespace, strlen($root) + 1);
                $suffixPath = str_replace('\\', DIRECTORY_SEPARATOR, $suffix);
                return rtrim($basePath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $suffixPath;
            }
        }

        return null;
    }

    private function filenameMatchesClass(string $filename, string $className, ?string $namespace, string $filePath): bool
    {
        if ($filename === $className . '.php') {
            return true;
        }

        if ($this->isMigration($namespace, $filePath)) {
            return $this->isMigrationFilenameValid($filename, $className);
        }

        return false;
    }

    private function isMigration(?string $namespace, string $filePath): bool
    {
        if ($namespace === null) {
            return false;
        }

        if (! str_starts_with($namespace, 'App\\Database\\Migrations')) {
            return false;
        }

        $migrationsPath = rtrim(APPPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'Migrations' . DIRECTORY_SEPARATOR;

        return str_starts_with($filePath, $migrationsPath);
    }

    private function isMigrationFilenameValid(string $filename, string $className): bool
    {
        if (! preg_match('/^\d{4}-\d{2}-\d{2}-\d{6}_(.+)\.php$/', $filename, $matches)) {
            return false;
        }

        $suffix = $matches[1];
        $snake = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $className));

        return strtolower($suffix) === strtolower($className) || strtolower($suffix) === $snake;
    }

    private function buildExpectedPath(?string $expectedDir, string $className): string
    {
        $dir = $expectedDir ? rtrim($expectedDir, DIRECTORY_SEPARATOR) : APPPATH;
        return $this->toRelativePath($dir . DIRECTORY_SEPARATOR . $className . '.php');
    }

    private function toRelativePath(string $path): string
    {
        $root = rtrim(dirname(APPPATH), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        return str_replace('\\', '/', str_replace($root, '', $path));
    }
}
