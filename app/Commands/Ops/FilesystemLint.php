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

        $files = $this->collectCommandFiles(ROOTPATH . 'app/Commands');
        $issues = [];

        foreach ($files as $file) {
            $lines = $this->readLines($file);
            if ($lines === []) {
                continue;
            }

            $anchored = $this->findAnchoredVariables($lines);
            $issues = array_merge($issues, $this->scanFile($file, $lines, $anchored));
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
            }
        }

        if (isset($flags['json'])) {
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT));
        }

        return $issues === [] ? EXIT_SUCCESS : EXIT_ERROR;
    }

    private function collectCommandFiles(string $root): array
    {
        $files = [];
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($root));

        foreach ($iterator as $entry) {
            if ($entry->isDir()) {
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

    private function scanFile(string $file, array $lines, array $anchored): array
    {
        $issues = [];
        $relative = $this->relativePath($file);

        foreach ($lines as $index => $line) {
            $lineNumber = $index + 1;

            $calls = $this->extractCalls($line, ['file_put_contents', 'mkdir']);
            foreach ($calls as $call) {
                $firstArg = $this->extractFirstArgument($call['args']);
                if ($firstArg === '') {
                    continue;
                }

                if ($this->isAnchoredArgument($firstArg, $anchored)) {
                    continue;
                }

                $issues[] = [
                    'file' => $relative,
                    'line' => $lineNumber,
                    'call' => $call['name'],
                    'reason' => 'Missing ROOTPATH anchor',
                    'snippet' => trim($line),
                ];
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
