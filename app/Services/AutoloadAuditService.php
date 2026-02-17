<?php

declare(strict_types=1);

namespace App\Services;

class AutoloadAuditService
{
    public static function audit(): void
    {
        $issues = array_merge(
            self::scanNamespaceCompliance(),
            self::scanComposerAutoloadConflicts(),
            self::scanDuplicateDeclarations(),
            self::scanManualIncludes(),
        );

        if ($issues === []) {
            return;
        }

        $path = WRITEPATH . '/audit/logs/autoload_audit_' . date('YmdHis') . '.log';
        file_put_contents($path, implode(PHP_EOL, $issues) . PHP_EOL);
    }

    /** @return list<string> */
    private static function scanNamespaceCompliance(): array
    {
        $issues   = [];
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(APPPATH));

        foreach ($iterator as $file) {
            if (! $file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            $content = file_get_contents($file->getPathname());
            if ($content === false) {
                continue;
            }

            if (! preg_match('/^\s*namespace\s+([^;]+);/m', $content, $match)) {
                continue;
            }

            $namespace = trim($match[1]);
            $expected  = self::expectedNamespace($file->getPathname());

            if ($expected !== null && $namespace !== $expected) {
                $issues[] = "Namespace mismatch in {$file->getPathname()}: '{$namespace}' expected '{$expected}'";
            }
        }

        return $issues;
    }

    /** @return list<string> */
    private static function scanComposerAutoloadConflicts(): array
    {
        $composerPath = ROOTPATH . 'composer.json';
        if (! is_file($composerPath)) {
            return ['composer.json not found for autoload audit.'];
        }

        $json = file_get_contents($composerPath);
        if ($json === false) {
            return ['Unable to read composer.json for autoload audit.'];
        }

        $composer = json_decode($json, true);
        if (! is_array($composer)) {
            return ['Unable to parse composer.json for autoload audit.'];
        }

        $issues = [];
        $psr4   = $composer['autoload']['psr-4'] ?? [];

        if (! is_array($psr4)) {
            return $issues;
        }

        $isCi4 = self::isCodeIgniter4Project($composer);

        if (! $isCi4 && array_key_exists('Config\\', $psr4)) {
            $issues[] = "composer.json autoload.psr-4 should not map 'Config\\' outside CI4 projects.";
        }

        if ($isCi4) {
            $appMap = $psr4['App\\'] ?? null;
            $configMap = $psr4['Config\\'] ?? null;

            if ($appMap !== 'app/') {
                $issues[] = "CodeIgniter 4 project should map 'App\\' => 'app/' in composer.json autoload.psr-4.";
            }

            if ($configMap !== 'app/Config/') {
                $issues[] = "CodeIgniter 4 project should map 'Config\\' => 'app/Config/' in composer.json autoload.psr-4.";
            }
        }

        return $issues;
    }

    /** @return list<string> */
    private static function scanDuplicateDeclarations(): array
    {
        $issues       = [];
        $declarations = [];
        $iterator     = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(APPPATH));

        foreach ($iterator as $file) {
            if (! $file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            $content = file_get_contents($file->getPathname());
            if ($content === false) {
                continue;
            }

            $namespace = '';
            if (preg_match('/^\s*namespace\s+([^;]+);/m', $content, $nsMatch)) {
                $namespace = trim($nsMatch[1]);
            }

            if (! preg_match_all('/^\s*(?:final\s+|abstract\s+)?(class|interface|trait|enum)\s+([A-Za-z_][A-Za-z0-9_]*)/m', $content, $matches, PREG_SET_ORDER)) {
                continue;
            }

            foreach ($matches as $match) {
                $fqn = ltrim($namespace . '\\' . $match[2], '\\');
                $declarations[$fqn][] = $file->getPathname();
            }
        }

        foreach ($declarations as $fqn => $paths) {
            if (count($paths) < 2) {
                continue;
            }

            $issues[] = "Duplicate declaration detected for {$fqn}: " . implode(', ', $paths);
        }

        return $issues;
    }


    /** @return list<string> */
    private static function scanManualIncludes(): array
    {
        $issues   = [];
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(APPPATH));

        foreach ($iterator as $file) {
            if (! $file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            $content = file_get_contents($file->getPathname());
            if ($content === false) {
                continue;
            }

            if (! preg_match_all('/^\s*(require|require_once|include|include_once)\s+[^;]+;/m', $content, $matches)) {
                continue;
            }

            foreach ($matches[0] as $statement) {
                if (self::shouldIgnoreIncludeWarning($file->getPathname(), $statement, $content)) {
                    continue;
                }

                $issues[] = "Manual include/require detected in {$file->getPathname()}: " . trim($statement);
            }
        }

        return $issues;
    }


    private static function isCodeIgniter4Project(array $composer): bool
    {
        $requires = $composer['require'] ?? [];
        if (is_array($requires) && array_key_exists('codeigniter4/framework', $requires)) {
            return true;
        }

        $publicIndex = ROOTPATH . 'public/index.php';
        if (is_file($publicIndex)) {
            $indexContents = file_get_contents($publicIndex);
            if ($indexContents !== false && (str_contains($indexContents, 'CodeIgniter') || str_contains($indexContents, 'Boot::bootWeb'))) {
                return true;
            }
        }

        $spark = ROOTPATH . 'spark';
        if (is_file($spark)) {
            $sparkContents = file_get_contents($spark);
            if ($sparkContents !== false && str_contains($sparkContents, 'CodeIgniter\Boot')) {
                return true;
            }
        }

        return false;
    }

    private static function shouldIgnoreIncludeWarning(string $path, string $statement, string $content): bool
    {
        $normalizedPath = str_replace('\\', '/', $path);

        if (str_contains($statement, 'Helpers/')) {
            return true;
        }

        if (str_contains($normalizedPath, '/app/Views/') || str_contains($normalizedPath, '/system/Views/')) {
            return true;
        }

        if (str_ends_with($normalizedPath, '/app/Libraries/DbInventory/InventoryScanner.php')
            && str_contains($content, 'private function scanMigrations(): array')
            && preg_match('/\b(?:include|include_once|require|require_once)\s+\$file\s*;/', $statement) === 1
            && str_contains($content, "APPPATH . 'Database/Migrations'")) {
            return true;
        }

        return false;
    }

    private static function expectedNamespace(string $file): ?string
    {
        $relative = str_replace(APPPATH, '', $file);
        $relative = ltrim($relative, DIRECTORY_SEPARATOR);
        $parts    = explode(DIRECTORY_SEPARATOR, $relative);

        if ($parts === []) {
            return null;
        }

        $root = array_shift($parts);
        $fileName = array_pop($parts);
        if ($fileName === null) {
            return null;
        }

        $map = [
            'Controllers' => 'App\\Controllers',
            'Models'      => 'App\\Models',
            'Libraries'   => 'App\\Libraries',
            'Services'    => 'App\\Services',
            'Config'      => 'Config',
        ];

        if (! isset($map[$root])) {
            return null;
        }

        $suffix = $parts === [] ? '' : '\\' . implode('\\', $parts);

        return $map[$root] . $suffix;
    }
}
