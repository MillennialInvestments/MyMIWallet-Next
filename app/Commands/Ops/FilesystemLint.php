<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class FilesystemLint extends SafeBaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'ops:filesystem:lint';
    protected $description = 'Lint Spark commands for unsafe filesystem writes (missing ROOTPATH anchoring).';
    protected $usage       = 'ops:filesystem:lint [--json]';
    protected $options     = [
        '--json' => 'Emit JSON results to stdout',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $roots = $this->collectScanRoots();
        $files = [];
        foreach ($roots as $root) {
            $files = array_merge($files, $this->collectCommandFiles($root));
        }
        $issues = [];

        foreach ($files as $file) {
            $lines = $this->readLines($file);
            if ($lines === []) {
                continue;
            }

            $anchored = $this->findAnchoredVariables($lines);
            $public = $this->findTargetVariables($lines, 'public');
            $writable = $this->findTargetVariables($lines, 'writable');
            $issues = array_merge($issues, $this->scanFile($file, $lines, $anchored, $public, $writable));
        }

        $payload = [
            'generated_at' => date('c'),
            'total_files' => count($files),
            'issues' => $issues,
            'issue_count' => count($issues),
        ];

        if ($issues === []) {
            CLI::write('Filesystem lint: OK', 'green');
        } else {
            CLI::write('Filesystem lint: FAIL', 'red');
            foreach ($issues as $issue) {
                CLI::write(sprintf('%s:%d %s (%s)', $issue['file'], $issue['line'], $issue['call'], $issue['reason']), 'yellow');
                CLI::write('  ' . $issue['snippet'], 'blue');
                CLI::write('  Fix: ' . $issue['suggested_fix'], 'white');
            }
        }

        if (isset($flags['json'])) {
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT));
        }

        return $issues === [] ? EXIT_SUCCESS : EXIT_ERROR;
    }

    private function collectScanRoots(): array
    {
        $roots = [
            ROOTPATH . 'app/Commands',
            ROOTPATH . 'tools',
            ROOTPATH . 'aiops',
        ];

        return array_values(array_filter($roots, 'is_dir'));
    }

    private function collectCommandFiles(string $root): array
    {
        $files = [];
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($root));

        foreach ($iterator as $entry) {
            if ($entry->isDir()) {
                continue;
            }

            if ($this->isExcludedPath($entry->getPathname())) {
                continue;
            }

            if ($entry->getExtension() !== 'php') {
                continue;
            }

            $files[] = $entry->getPathname();
        }

        return $files;
    }

    private function readLines(string $file): array
    {
        $contents = @file($file, FILE_IGNORE_NEW_LINES);
        if ($contents === false) {
            return [];
        }

        return $contents;
    }

    private function findAnchoredVariables(array $lines): array
    {
        $anchored = [];
        $changed = true;

        while ($changed) {
            $changed = false;
            foreach ($lines as $line) {
                if (! preg_match('/\$(\w+)\s*=\s*(.+);/', $line, $matches)) {
                    continue;
                }

                $var = $matches[1];
                $expr = $matches[2];

                if (isset($anchored[$var])) {
                    continue;
                }

                if (str_contains($expr, 'ROOTPATH')) {
                    $anchored[$var] = true;
                    $changed = true;
                    continue;
                }

                if (preg_match_all('/\$(\w+)/', $expr, $refs)) {
                    foreach ($refs[1] as $ref) {
                        if (isset($anchored[$ref])) {
                            $anchored[$var] = true;
                            $changed = true;
                            break;
                        }
                    }
                }
            }
        }

        return $anchored;
    }

    private function findTargetVariables(array $lines, string $target): array
    {
        $targets = [];
        $changed = true;

        while ($changed) {
            $changed = false;
            foreach ($lines as $line) {
                if (! preg_match('/\$(\w+)\s*=\s*(.+);/', $line, $matches)) {
                    continue;
                }

                $var = $matches[1];
                $expr = $matches[2];

                if (isset($targets[$var])) {
                    continue;
                }

                if ($this->expressionTargets($expr, $target)) {
                    $targets[$var] = true;
                    $changed = true;
                    continue;
                }

                if (preg_match_all('/\$(\w+)/', $expr, $refs)) {
                    foreach ($refs[1] as $ref) {
                        if (isset($targets[$ref])) {
                            $targets[$var] = true;
                            $changed = true;
                            break;
                        }
                    }
                }
            }
        }

        return $targets;
    }

    private function scanFile(string $file, array $lines, array $anchored, array $public, array $writable): array
    {
        $issues = [];
        $relative = $this->relativePath($file);

        foreach ($lines as $index => $line) {
            $lineNumber = $index + 1;
            // 🚨 Boot-risk detection: Config-layer exceptions
            if (str_contains($line, 'Config\\') && str_contains($line, 'throw new')) {
                $issues[] = [
                    'file' => $relative,
                    'line' => $lineNumber,
                    'call' => 'throw',
                    'reason' => 'Config-layer exception detected (boot risk)',
                    'snippet' => trim($line),
                    'suggested_fix' => 'Move guard logic into Spark command run()',
                ];
            }

            $calls = $this->extractCalls($line, ['file_put_contents', 'mkdir']);
            foreach ($calls as $call) {
                $firstArg = $this->extractFirstArgument($call['args']);
                if ($firstArg === '') {
                    continue;
                }

                $missingRoot = ! $this->isAnchoredArgument($firstArg, $anchored);
                if ($missingRoot) {
                    $issues[] = [
                        'file' => $relative,
                        'line' => $lineNumber,
                        'call' => $call['name'],
                        'reason' => 'Missing ROOTPATH anchor',
                        'snippet' => trim($line),
                        'suggested_fix' => $this->suggestRootpathFix($firstArg, $call['name']),
                    ];
                }

                if ($this->isTargetArgument($firstArg, $public, 'public')) {
                    $issues[] = [
                        'file' => $relative,
                        'line' => $lineNumber,
                        'call' => $call['name'],
                        'reason' => 'Writes to public/',
                        'snippet' => trim($line),
                        'suggested_fix' => $this->suggestSafeTargetFix('public'),
                    ];
                }

                if ($this->isTargetArgument($firstArg, $writable, 'writable')) {
                    $issues[] = [
                        'file' => $relative,
                        'line' => $lineNumber,
                        'call' => $call['name'],
                        'reason' => 'Writes to writable/',
                        'snippet' => trim($line),
                        'suggested_fix' => $this->suggestSafeTargetFix('writable'),
                    ];
                }
            }
        }

        return $issues;
    }

    private function extractCalls(string $line, array $names): array
    {
        $calls = [];
        foreach ($names as $name) {
            if (! preg_match('/@?' . preg_quote($name, '/') . '\s*\((.*)\)/', $line, $matches)) {
                continue;
            }

            $calls[] = [
                'name' => $name,
                'args' => $matches[1],
            ];
        }

        return $calls;
    }

    private function extractFirstArgument(string $args): string
    {
        $parts = preg_split('/,(?![^\(]*\))/m', $args);
        if (! isset($parts[0])) {
            return '';
        }

        return trim($parts[0]);
    }

    private function isAnchoredArgument(string $arg, array $anchored): bool
    {
        if (str_contains($arg, 'ROOTPATH')) {
            return true;
        }

        if (preg_match('/^\$(\w+)/', $arg, $matches)) {
            return isset($anchored[$matches[1]]);
        }

        return false;
    }

    private function isTargetArgument(string $arg, array $targets, string $target): bool
    {
        if ($this->expressionTargets($arg, $target)) {
            return true;
        }

        if (preg_match('/^\$(\w+)/', $arg, $matches)) {
            return isset($targets[$matches[1]]);
        }

        return false;
    }

    private function expressionTargets(string $expr, string $target): bool
    {
        if ($target === 'public') {
            return preg_match('/\bpublic[\/\\\\]/', $expr) === 1 || str_contains($expr, 'FCPATH');
        }

        if ($target === 'writable') {
            return preg_match('/\bwritable[\/\\\\]/', $expr) === 1 || str_contains($expr, 'WRITEPATH');
        }

        return false;
    }

    private function suggestRootpathFix(string $arg, string $call): string
    {
        $suggested = $this->extractLiteralPath($arg);
        if ($suggested !== null) {
            return sprintf('%s(ROOTPATH . %s, ...)', $call, $suggested);
        }

        return sprintf('%s(ROOTPATH . \'docs/...\', ...)', $call);
    }

    private function suggestSafeTargetFix(string $target): string
    {
        if ($target === 'writable') {
            return 'Use log_message() for logs or move output to ROOTPATH . \'docs/...\'';
        }

        return 'Move output to ROOTPATH . \'docs/...\'';
    }

    private function extractLiteralPath(string $arg): ?string
    {
        if (preg_match('/([\'"])([^\'"]+)\\1/', $arg, $matches)) {
            return $matches[1] . $matches[2] . $matches[1];
        }

        return null;
    }

    private function isExcludedPath(string $path): bool
    {
        $segments = preg_split('/[\/\\\\]+/', $path);
        if (! is_array($segments)) {
            return false;
        }

        foreach ($segments as $segment) {
            if (in_array($segment, ['node_modules', 'vendor', '.git', 'storage'], true)) {
                return true;
            }
        }

        return false;
    }

    private function relativePath(string $path): string
    {
        $root = rtrim(ROOTPATH, DIRECTORY_SEPARATOR);
        if (str_starts_with($path, $root)) {
            $trimmed = substr($path, strlen($root));
            return ltrim($trimmed, DIRECTORY_SEPARATOR);
        }

        return $path;
    }
}
