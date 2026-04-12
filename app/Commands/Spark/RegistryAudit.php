<?php

namespace App\Commands\Spark;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Console as ConsoleConfig;
use ReflectionClass;
use Throwable;

class RegistryAudit extends SafeBaseCommand
{
    protected $group = 'Spark';
    protected $name = 'registry:audit';
    protected $description = 'Audit Spark command registry against filesystem declarations and runtime list output.';
    protected $usage = 'registry:audit';

    /**
     * Runtime commands that are valid but should not be required in app/Config/Console.php
     * because they are provided by CI4, Myth/Auth, Debugbar, Worker Mode, etc.
     *
     * @var string[]
     */
    protected $runtimeExternalPrefixes = [
        'auth:',
        'cache:',
        'config:check',
        'db:create',
        'db:seed',
        'db:table',
        'debugbar:',
        'env',
        'filter:',
        'help',
        'key:generate',
        'lang:',
        'list',
        'logs:clear',
        'make:',
        'migrate',
        'migrate:',
        'namespaces',
        'optimize',
        'phpini:check',
        'publish',
        'routes',
        'serve',
        'worker:',
    ];

    /**
     * Classes intentionally allowed to be registered but not appear cleanly in parsed runtime list.
     *
     * @var string[]
     */
    protected $allowRegisteredButHidden = [
        \App\Commands\Docs\DatabaseMap::class,
        \App\Commands\Docs\DependenciesMap::class,
        \App\Commands\Docs\FullDocsAudit::class,
        \App\Commands\Docs\ModulesMap::class,
        \App\Commands\Docs\RoutesInventory::class,
        \App\Commands\Docs\SparkCommandsInventory::class,
        \App\Commands\Docs\SyncDocsSystem::class,
        \App\Commands\Docs\Exports\ExportViewTxt::class,
        \App\Commands\Docs\Generate\DocsReadmeBuilder::class,
        \App\Commands\Docs\Scan\ViewDirectories::class,
        \App\Commands\Docs\Scan\ViewFiles::class,
        \App\Commands\Research\FinancialNewsCollect::class,
        \App\Commands\Research\MarketDataCompile::class,
        \App\Commands\Research\ResearchPipeline::class,
        \App\Commands\Research\ThinkOrSwimImport::class,
        \App\Commands\Spark\Reset::class,
    ];

    /**
     * Base/helper/support classes that should never be treated as missing runnable commands.
     *
     * @var string[]
     */
    protected $ignoreFilesystemClasses = [
        \App\Commands\SafeBaseCommand::class,
        \App\Commands\Ollama\BaseOllamaCommand::class,
        \App\Commands\Ops\BaseOpsCommand::class,
        \App\Commands\Research\BaseResearchTaskCommand::class,
        \App\Commands\Support\ArtifactHelper::class,
        \App\Commands\Support\GitHubIssueHelper::class,
        \App\Commands\Ops\Support\CommandRulesScanner::class,
    ];

    public function run(array $params)
    {
        CLI::write('Auditing Spark registry...', 'yellow');

        $console = config(ConsoleConfig::class);
        $registeredClasses = array_values(array_filter(
            $console->commands ?? [],
            static fn ($item) => is_string($item) && $item !== ''
        ));
        $registeredClasses = array_values(array_unique($registeredClasses));
        sort($registeredClasses);

        $filesystemClasses = $this->discoverCommandClasses(APPPATH . 'Commands');
        $filesystemConcrete = $this->filterConcreteCommandClasses($filesystemClasses);
        $filesystemConcrete = array_values(array_filter(
            $filesystemConcrete,
            fn (string $class) => ! in_array($class, $this->ignoreFilesystemClasses, true)
        ));
        sort($filesystemConcrete);

        $filesystemRecords = $this->buildFilesystemRecords($filesystemConcrete);

        $missingFromConsole = array_values(array_diff($filesystemConcrete, $registeredClasses));
        $missingFromFilesystem = array_values(array_diff($registeredClasses, $filesystemConcrete));

        $filesystemNames = $this->collectNamesFromFilesystem($filesystemRecords);
        $consoleNames = $this->collectNamesFromClasses($registeredClasses, $filesystemRecords);

        $runtimeNames = $this->loadRuntimeCommandNames();
        $runtimeMissingFromConsole = $this->findRuntimeCommandsMissingFromConsole($runtimeNames, $consoleNames);
        $consoleMissingFromRuntime = $this->findConsoleRegisteredMissingFromRuntime($consoleNames, $registeredClasses);
        $orphanFiles = $this->findOrphanCommandFiles($filesystemRecords);
        $groupDrift = $this->findGroupDrift($filesystemRecords);

        CLI::write('');
        CLI::write('Filesystem classes: ' . count($filesystemConcrete));
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
                CLI::write(sprintf(
                    ' - %s (%s vs %s)',
                    $entry['command'],
                    $entry['group'],
                    $entry['expected']
                ));
            }
        }

        if (! $hasIssues) {
            CLI::write("\n✔ Registry clean — no drift detected.", 'green');
            return EXIT_SUCCESS;
        }

        return EXIT_ERROR;
    }

    /**
     * @param string $path
     * @return string[]
     */
    private function discoverCommandClasses(string $path): array
    {
        $classes = [];

        if (! is_dir($path)) {
            return $classes;
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if (! $file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            $fqcn = $this->extractClassFromFile($file->getPathname());
            if ($fqcn !== null) {
                $classes[] = $fqcn;
            }
        }

        $classes = array_values(array_unique($classes));
        sort($classes);

        return $classes;
    }

    private function extractClassFromFile(string $file): ?string
    {
        $code = @file_get_contents($file);
        if ($code === false || trim($code) === '') {
            return null;
        }

        $tokens = token_get_all($code);
        $namespace = '';
        $className = null;
        $count = count($tokens);

        for ($i = 0; $i < $count; $i++) {
            $token = $tokens[$i];

            if (! is_array($token)) {
                continue;
            }

            if ($token[0] === T_NAMESPACE) {
                $namespace = '';
                for ($j = $i + 1; $j < $count; $j++) {
                    $t = $tokens[$j];

                    if (is_array($t) && defined('T_NAME_QUALIFIED') && $t[0] === T_NAME_QUALIFIED) {
                        $namespace .= $t[1];
                        continue;
                    }

                    if (is_array($t) && ($t[0] === T_STRING || $t[0] === T_NS_SEPARATOR)) {
                        $namespace .= $t[1];
                        continue;
                    }

                    if ($t === ';' || $t === '{') {
                        break;
                    }
                }
            }

            if ($token[0] === T_CLASS) {
                $prev = $this->previousNonWhitespaceToken($tokens, $i);
                if (is_array($prev) && in_array($prev[0], [T_DOUBLE_COLON, T_NEW], true)) {
                    continue;
                }

                for ($j = $i + 1; $j < $count; $j++) {
                    $t = $tokens[$j];
                    if (is_array($t) && $t[0] === T_STRING) {
                        $className = $t[1];
                        break 2;
                    }
                }
            }
        }

        if ($className === null) {
            return null;
        }

        return trim($namespace . '\\' . $className, '\\');
    }

    /**
     * @param array<int, mixed> $tokens
     * @param int $index
     * @return mixed
     */
    private function previousNonWhitespaceToken(array $tokens, int $index)
    {
        for ($i = $index - 1; $i >= 0; $i--) {
            $token = $tokens[$i];

            if (is_array($token) && in_array($token[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT], true)) {
                continue;
            }

            return $token;
        }

        return null;
    }

    /**
     * @param string[] $classes
     * @return string[]
     */
    private function filterConcreteCommandClasses(array $classes): array
    {
        $results = [];

        foreach ($classes as $class) {
            if (! class_exists($class)) {
                continue;
            }

            try {
                $reflection = new ReflectionClass($class);

                if ($reflection->isAbstract()) {
                    continue;
                }

                if (! $reflection->isSubclassOf(BaseCommand::class)) {
                    continue;
                }

                $results[] = $class;
            } catch (Throwable $e) {
                CLI::write('[WARN] Reflection failed for ' . $class . ': ' . $e->getMessage(), 'red');
            }
        }

        $results = array_values(array_unique($results));
        sort($results);

        return $results;
    }

    /**
     * @param string[] $classes
     * @return array<string, array<string, string>>
     */
    private function buildFilesystemRecords(array $classes): array
    {
        $records = [];

        foreach ($classes as $class) {
            try {
                $reflection = new ReflectionClass($class);
                $defaults = $reflection->getDefaultProperties();

                $name = isset($defaults['name']) && is_string($defaults['name']) ? trim($defaults['name']) : '';
                $group = isset($defaults['group']) && is_string($defaults['group']) ? trim($defaults['group']) : '';

                $records[$class] = [
                    'class' => $class,
                    'path' => $reflection->getFileName() ?: '',
                    'name' => $name,
                    'group' => $group,
                ];
            } catch (Throwable $e) {
                CLI::write('[WARN] Unable to build filesystem record for ' . $class . ': ' . $e->getMessage(), 'red');
            }
        }

        ksort($records);

        return $records;
    }

    /**
     * @param string[] $classes
     * @param array<string, array<string, string>> $filesystemRecords
     * @return string[]
     */
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

    /**
     * @param array<string, array<string, string>> $filesystemRecords
     * @return string[]
     */
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

    /**
     * Uses "php spark list" output because it is the most reliable source in this environment.
     *
     * @return string[]
     */
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

            $commands[] = trim($matches[1]);
        }

        $commands = array_values(array_unique($commands));
        sort($commands);

        return $commands;
    }

    /**
     * @param string[] $runtimeNames
     * @param string[] $consoleNames
     * @return string[]
     */
    private function findRuntimeCommandsMissingFromConsole(array $runtimeNames, array $consoleNames): array
    {
        $results = [];

        foreach ($runtimeNames as $name) {
            if ($this->isExternalRuntimeCommand($name)) {
                continue;
            }

            if (! in_array($name, $consoleNames, true)) {
                $results[] = $name;
            }
        }

        $results = array_values(array_unique($results));
        sort($results);

        return $results;
    }

    /**
     * @param string[] $consoleNames
     * @param string[] $registeredClasses
     * @return string[]
     */
    private function findConsoleRegisteredMissingFromRuntime(array $consoleNames, array $registeredClasses): array
    {
        $runtimeNames = $this->loadRuntimeCommandNames();
        $runtimeLookup = array_flip($runtimeNames);

        $results = [];

        foreach ($registeredClasses as $class) {
            if (in_array($class, $this->allowRegisteredButHidden, true)) {
                continue;
            }

            if (! class_exists($class)) {
                continue;
            }

            try {
                $reflection = new ReflectionClass($class);
                $defaults = $reflection->getDefaultProperties();
                $name = isset($defaults['name']) && is_string($defaults['name']) ? trim($defaults['name']) : '';

                if ($name === '') {
                    continue;
                }

                if (! isset($runtimeLookup[$name])) {
                    $results[] = $name;
                }
            } catch (Throwable $e) {
                CLI::write('[WARN] Unable to inspect registered class ' . $class . ': ' . $e->getMessage(), 'red');
            }
        }

        $results = array_values(array_unique($results));
        sort($results);

        return $results;
    }

    /**
     * @param array<string, array<string, string>> $filesystemRecords
     * @return array<int, array<string, string>>
     */
    private function findOrphanCommandFiles(array $filesystemRecords): array
    {
        return array_values(array_filter(
            $filesystemRecords,
            static fn (array $record) => trim((string) ($record['name'] ?? '')) === ''
        ));
    }

    private function isExternalRuntimeCommand(string $commandName): bool
    {
        foreach ($this->runtimeExternalPrefixes as $prefix) {
            if ($commandName === $prefix || str_starts_with($commandName, $prefix)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param array<string, array<string, string>> $filesystemRecords
     * @return array<int, array<string, string>>
     */
    private function findGroupDrift(array $filesystemRecords): array
    {
        $drift = [];

        foreach ($filesystemRecords as $record) {
            $name = strtolower(trim((string) ($record['name'] ?? '')));
            $group = trim((string) ($record['group'] ?? ''));

            if ($name === '' || $group === '' || ! str_contains($name, ':')) {
                continue;
            }

            $expected = strtolower((string) strtok($name, ':'));
            $normalizedGroup = strtolower(trim((string) strtok($group, ' ')));

            if ($expected !== '' && $normalizedGroup !== '' && $expected !== $normalizedGroup) {
                $drift[] = [
                    'command' => $record['name'],
                    'group' => $record['group'],
                    'expected' => $expected,
                ];
            }
        }

        return $drift;
    }

    private function relativePath(string $path): string
    {
        $root = rtrim(ROOTPATH, '/\\') . DIRECTORY_SEPARATOR;

        if ($path !== '' && str_starts_with($path, $root)) {
            return ltrim(substr($path, strlen($root)), '/\\');
        }

        return $path;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}