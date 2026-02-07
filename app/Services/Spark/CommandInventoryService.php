<?php

declare(strict_types=1);

namespace App\Services\Spark;

use App\Commands\Ops\Support\CommandRulesScanner;

class CommandInventoryService
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public function scan(string $basePath): array
    {
        $files = $this->listCommandFiles($basePath);
        $violations = $this->mapViolations($basePath);
        $commands = [];

        foreach ($files as $file) {
            $contents = $this->readFile($file);
            if ($contents === '') {
                continue;
            }

            $classInfo = $this->extractClassInfo($contents);
            if ($classInfo === null) {
                continue;
            }

            if (! $classInfo['is_command']) {
                continue;
            }

            if (($classInfo['is_abstract'] ?? false) === true) {
                continue;
            }

            $metadata = $this->extractMetadata($contents);
            $psr4 = $this->evaluatePsr4($file, $classInfo);

            $commands[] = array_merge($classInfo, [
                'file' => $file,
                'metadata' => $metadata,
                'violations' => $violations[$file] ?? [],
                'psr4' => $psr4,
                'has_dry_run' => $metadata['has_dry_run'],
                'has_approve' => $metadata['has_approve'],
                'is_destructive' => $metadata['is_destructive'],
            ]);
        }

        return $commands;
    }

    /**
     * @return array<string, array<int, string>>
     */
    private function mapViolations(string $basePath): array
    {
        $scanner = new CommandRulesScanner();
        $entries = $scanner->scan($basePath);
        $map = [];

        foreach ($entries as $entry) {
            $map[$entry['file']] = $entry['violations'];
        }

        return $map;
    }

    /**
     * @return array<int, string>
     */
    private function listCommandFiles(string $basePath): array
    {
        $files = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($basePath, \FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $fileInfo) {
            if (! $fileInfo->isFile()) {
                continue;
            }

            if ($fileInfo->getExtension() !== 'php') {
                continue;
            }

            $files[] = $fileInfo->getPathname();
        }

        sort($files);

        return $files;
    }

    private function readFile(string $path): string
    {
        $contents = @file_get_contents($path);
        if ($contents === false) {
            return '';
        }

        return $contents;
    }

    /**
     * @return array<string, mixed>|null
     */
    private function extractClassInfo(string $contents): ?array
    {
        if (! preg_match('/namespace\s+([^;]+);/', $contents, $namespaceMatch)) {
            $namespace = '';
        } else {
            $namespace = trim($namespaceMatch[1]);
        }

        if (! preg_match('/(?:(abstract)\s+)?class\s+([A-Za-z0-9_]+)\s+extends\s+([A-Za-z0-9_\\\\]+)/', $contents, $classMatch)) {
            return null;
        }

        $isAbstract = isset($classMatch[1]) && trim((string) $classMatch[1]) === 'abstract';
        $className = $classMatch[2];
        $extends = $classMatch[3];
        $fqcn = $namespace !== '' ? $namespace . '\\' . $className : $className;

        $isCommand = str_contains($extends, 'BaseCommand');
        $usesSafeBase = str_contains($extends, 'SafeBaseCommand');

        return [
            'class' => $fqcn,
            'class_short' => $className,
            'namespace' => $namespace,
            'extends' => $extends,
            'is_command' => $isCommand,
            'is_abstract' => $isAbstract,
            'uses_safe_base' => $usesSafeBase,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function extractMetadata(string $contents): array
    {
        $name = $this->matchStringProperty($contents, 'name');
        $group = $this->matchStringProperty($contents, 'group');
        $description = $this->matchStringProperty($contents, 'description');

        $hasDryRun = str_contains($contents, '--dry-run');
        $hasApprove = str_contains($contents, '--approve');

        $isDestructive = false;
        if (preg_match('/function\s+isDestructive\(\)\s*:\s*bool\s*\{(.*?)\}/s', $contents, $match)) {
            $isDestructive = str_contains($match[1], 'return true');
        }

        return [
            'name' => $name,
            'group' => $group,
            'description' => $description,
            'has_dry_run' => $hasDryRun,
            'has_approve' => $hasApprove,
            'is_destructive' => $isDestructive,
        ];
    }

    private function matchStringProperty(string $contents, string $property): ?string
    {
        if (! preg_match('/protected\s+\$' . preg_quote($property, '/') . '\s*=\s*[\'\"]([^\'\"]+)[\'\"]\s*;/', $contents, $matches)) {
            return null;
        }

        return $matches[1];
    }

    /**
     * @return array{expected_namespace:string, expected_class:string, ok:bool}
     */
    private function evaluatePsr4(string $file, array $classInfo): array
    {
        $relative = $this->relativeToCommands($file);
        $relative = str_replace('\\', '/', $relative);
        $parts = explode('/', $relative);
        $classFile = array_pop($parts);
        $expectedClass = pathinfo($classFile, PATHINFO_FILENAME);
        $expectedNamespace = 'App\\Commands';

        if ($parts !== []) {
            $expectedNamespace .= '\\' . implode('\\', $parts);
        }

        $ok = ($expectedNamespace === $classInfo['namespace']) && ($expectedClass === $classInfo['class_short']);

        return [
            'expected_namespace' => $expectedNamespace,
            'expected_class' => $expectedClass,
            'ok' => $ok,
        ];
    }

    private function relativeToCommands(string $path): string
    {
        $root = rtrim(ROOTPATH . 'app/Commands', DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        if (str_starts_with($path, $root)) {
            return ltrim(substr($path, strlen($root)), DIRECTORY_SEPARATOR);
        }

        return $path;
    }
}
