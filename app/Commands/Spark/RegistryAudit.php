<?php

namespace App\Commands\Spark;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Console;

class RegistryAudit extends SafeBaseCommand
{
    protected $group = 'Spark';
    protected $name = 'spark:registry-audit';
    protected $description = 'Audit Spark command registry against filesystem declarations and runtime list output.';
    protected $usage = 'spark:registry-audit';

    public function run(array $params)
    {
        CLI::write('Auditing Spark registry...', 'yellow');

        $console = new Console();
        $registeredClasses = array_values(array_filter($console->commands ?? [], static fn ($item) => is_string($item) && $item !== ''));

        $filesystemRecords = $this->scanCommandFiles();
        $filesystemClasses = array_keys($filesystemRecords);

        $missingFromConsole = array_values(array_diff($filesystemClasses, $registeredClasses));
        $missingFromFilesystem = array_values(array_diff($registeredClasses, $filesystemClasses));

        $consoleNames = $this->collectNamesFromClasses($registeredClasses, $filesystemRecords);
        $filesystemNames = $this->collectNamesFromFilesystem($filesystemRecords);
        $runtimeNames = $this->loadRuntimeCommandNames();

        $runtimeMissingFromConsole = array_values(array_diff($runtimeNames, $consoleNames));
        $consoleMissingFromRuntime = array_values(array_diff($consoleNames, $runtimeNames));
        $orphanFiles = array_values(array_filter(
            $filesystemRecords,
            static fn (array $record) => ($record['name'] ?? '') === ''
        ));

        $groupDrift = $this->findGroupDrift($filesystemRecords);

        CLI::write('');
        CLI::write('Filesystem classes: ' . count($filesystemClasses));
        CLI::write('Console registered classes: ' . count($registeredClasses));
        CLI::write('Filesystem command names: ' . count($filesystemNames));
        CLI::write('Runtime spark list names: ' . count($runtimeNames));

        $hasIssues = false;

        if ($missingFromConsole !== []) {
            $hasIssues = true;
            CLI::error("\n❌ Classes on filesystem but missing from Console.php:");
            foreach ($missingFromConsole as $class) {
                CLI::write(' - ' . $class);
            }
        }

        if ($missingFromFilesystem !== []) {
            $hasIssues = true;
            CLI::error("\n❌ Classes registered in Console.php but missing from filesystem:");
            foreach ($missingFromFilesystem as $class) {
                CLI::write(' - ' . $class);
            }
        }

        if ($runtimeMissingFromConsole !== []) {
            $hasIssues = true;
            CLI::error("\n❌ Runtime commands missing from Console.php registrations:");
            foreach ($runtimeMissingFromConsole as $command) {
                CLI::write(' - ' . $command);
            }
        }

        if ($consoleMissingFromRuntime !== []) {
            $hasIssues = true;
            CLI::error("\n❌ Console-registered commands missing from runtime spark list:");
            foreach ($consoleMissingFromRuntime as $command) {
                CLI::write(' - ' . $command);
            }
        }

        if ($orphanFiles !== []) {
            $hasIssues = true;
            CLI::error("\n❌ Command files with no declared \$name property:");
            foreach ($orphanFiles as $record) {
                CLI::write(' - ' . $this->relativePath($record['path']));
            }
        }

        if ($groupDrift !== []) {
            $hasIssues = true;
            CLI::error("\n❌ Group drift detected (group != name prefix):");
            foreach ($groupDrift as $entry) {
                CLI::write(sprintf(' - %s (%s vs %s)', $entry['command'], $entry['group'], $entry['expected']));
            }
        }

        if (! $hasIssues) {
            CLI::write("\n✔ Registry clean — no drift detected.", 'green');
            return EXIT_SUCCESS;
        }

        return EXIT_ERROR;
    }

    private function scanCommandFiles(): array
    {
        $records = [];
        $root = APPPATH . 'Commands';

        if (! is_dir($root)) {
            return $records;
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($root, \FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if (! $file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            $path = $file->getPathname();
            $contents = file_get_contents($path);
            if ($contents === false) {
                continue;
            }

            $namespace = $this->extractNamespace($contents);
            $class = $this->extractClass($contents);
            if ($namespace === null || $class === null) {
                continue;
            }

            $fqcn = $namespace . '\\' . $class;
            $name = $this->extractProperty($contents, 'name') ?? '';
            if ($name === '') {
                continue;
            }

            $records[$fqcn] = [
                'class' => $fqcn,
                'path' => $path,
                'name' => $name,
                'group' => $this->extractProperty($contents, 'group') ?? '',
            ];
        }

        ksort($records);

        return $records;
    }

    private function extractNamespace(string $contents): ?string
    {
        if (! preg_match('/namespace\s+([^;]+);/', $contents, $matches)) {
            return null;
        }

        return trim($matches[1]);
    }

    private function extractClass(string $contents): ?string
    {
        if (! preg_match('/^(?:(?:abstract|final)\s+)?class\s+([A-Za-z0-9_]+)/m', $contents, $matches)) {
            return null;
        }

        return trim($matches[1]);
    }

    private function extractProperty(string $contents, string $property): ?string
    {
        if (! preg_match('/protected\s+\$' . preg_quote($property, '/') . '\s*=\s*[\'\"]([^\'\"]+)[\'\"]/m', $contents, $matches)) {
            return null;
        }

        return trim($matches[1]);
    }

    private function collectNamesFromClasses(array $classes, array $filesystemRecords): array
    {
        $names = [];

        foreach ($classes as $class) {
            if (! isset($filesystemRecords[$class])) {
                continue;
            }

            $name = $filesystemRecords[$class]['name'] ?? '';
            if ($name !== '') {
                $names[] = $name;
            }
        }

        $names = array_values(array_unique($names));
        sort($names);

        return $names;
    }

    private function collectNamesFromFilesystem(array $filesystemRecords): array
    {
        $names = [];

        foreach ($filesystemRecords as $record) {
            $name = $record['name'] ?? '';
            if ($name !== '') {
                $names[] = $name;
            }
        }

        $names = array_values(array_unique($names));
        sort($names);

        return $names;
    }

    private function loadRuntimeCommandNames(): array
    {
        $output = [];
        $code = 0;
        $sparkBinary = rtrim(ROOTPATH, '/\\') . DIRECTORY_SEPARATOR . 'spark';

        if (! is_file($sparkBinary)) {
            return [];
        }

        $command = escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg($sparkBinary) . ' list';
        exec($command, $output, $code);
        if ($code !== 0) {
            return [];
        }

        $commands = [];
        foreach ($output as $line) {
            if (! preg_match('/^\s{2}([a-z0-9]+:[a-z0-9:_-]+)\s{2,}/', $line, $matches)) {
                continue;
            }

            $commands[] = $matches[1];
        }

        $commands = array_values(array_unique($commands));
        sort($commands);

        return $commands;
    }

    private function findGroupDrift(array $filesystemRecords): array
    {
        $drift = [];

        foreach ($filesystemRecords as $record) {
            $name = $record['name'] ?? '';
            $group = strtolower(trim((string) ($record['group'] ?? '')));

            if ($name === '' || $group === '' || ! str_contains($name, ':')) {
                continue;
            }

            $expected = strtolower(strtok($name, ':'));
            if ($expected !== $group) {
                $drift[] = [
                    'command' => $name,
                    'group' => $group,
                    'expected' => $expected,
                ];
            }
        }

        return $drift;
    }

    private function relativePath(string $path): string
    {
        $root = rtrim(ROOTPATH, '/\\') . DIRECTORY_SEPARATOR;

        if (str_starts_with($path, $root)) {
            return ltrim(substr($path, strlen($root)), '/\\');
        }

        return $path;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
