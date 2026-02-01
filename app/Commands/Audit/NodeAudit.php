<?php

namespace App\Commands\Audit;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class NodeAudit extends SafeBaseCommand
{
    protected $group       = 'audit';
    protected $name        = 'audit:node';
    protected $description = 'Detect tracked node_modules and native build artifacts (read-only).';
    protected $usage       = 'audit:node';

    public function run(array $params)
    {
        $tracked = $this->getTrackedFiles();
        if ($tracked === null) {
            CLI::write('FAIL: Unable to read tracked files. Is this a git repository?', 'red');
            return 2;
        }

        $nodeModules = $this->findNodeModules($tracked);
        $nativeArtifacts = $this->findNativeArtifacts($tracked);
        $pythonCache = $this->findPythonCache($tracked);
        $missingIgnores = $this->missingIgnoreEntries();

        $violations = array_merge($nodeModules, $nativeArtifacts, $pythonCache);
        $hasViolations = !empty($violations) || !empty($missingIgnores);

        if (!$hasViolations) {
            CLI::write('PASS: No tracked node_modules or native build artifacts detected.', 'green');
            return 0;
        }

        CLI::write('FAIL: Hygiene violations detected.', 'red');
        CLI::newLine();

        if (!empty($nodeModules)) {
            CLI::write('Tracked node_modules directories:', 'yellow');
            foreach ($nodeModules as $dir) {
                CLI::write("- {$dir}");
            }
            CLI::newLine();
            CLI::write('Remediation:', 'yellow');
            foreach ($nodeModules as $dir) {
                CLI::write("git rm -r --cached {$dir}");
            }
            CLI::newLine();
        }

        if (!empty($nativeArtifacts)) {
            CLI::write('Tracked native build artifacts:', 'yellow');
            foreach ($nativeArtifacts as $file) {
                CLI::write("- {$file}");
            }
            CLI::newLine();
            CLI::write('Remediation:', 'yellow');
            foreach ($nativeArtifacts as $file) {
                CLI::write("git rm --cached {$file}");
            }
            CLI::newLine();
        }

        if (!empty($pythonCache)) {
            CLI::write('Tracked Python cache artifacts:', 'yellow');
            foreach ($pythonCache as $file) {
                CLI::write("- {$file}");
            }
            CLI::newLine();
            CLI::write('Remediation:', 'yellow');
            foreach ($pythonCache as $file) {
                CLI::write("git rm --cached {$file}");
            }
            CLI::newLine();
        }

        if (!empty($missingIgnores)) {
            CLI::write('Recommended .gitignore entries missing:', 'yellow');
            foreach ($missingIgnores as $entry) {
                CLI::write("- {$entry}");
            }
            CLI::newLine();
            CLI::write('Add to .gitignore:', 'yellow');
            foreach ($missingIgnores as $entry) {
                CLI::write($entry);
            }
            CLI::newLine();
        }

        return 1;
    }

    private function getTrackedFiles(): ?array
    {
        $output = [];
        $status = 0;
        @exec('git ls-files -z', $output, $status);
        if ($status !== 0) {
            return null;
        }

        $joined = implode("\n", $output);
        if ($joined === '') {
            return [];
        }

        $files = array_filter(explode("\0", $joined), 'strlen');
        return array_values($files);
    }

    private function findNodeModules(array $files): array
    {
        $dirs = [];
        foreach ($files as $file) {
            if (preg_match('#(^|/)node_modules(/|$)#', $file) === 1) {
                $parts = explode('/node_modules', $file, 2);
                $base = $parts[0] !== '' ? $parts[0] . '/node_modules' : 'node_modules';
                $dirs[$base] = true;
            }
        }
        return array_keys($dirs);
    }

    private function findNativeArtifacts(array $files): array
    {
        $hits = [];
        foreach ($files as $file) {
            if (preg_match('/\.(node|o|a|so|dll|dylib)$/i', $file) === 1) {
                $hits[] = $file;
            }
        }
        return $hits;
    }

    private function findPythonCache(array $files): array
    {
        $hits = [];
        foreach ($files as $file) {
            if (preg_match('#(^|/)__pycache__(/|$)#', $file) === 1 || preg_match('/\.pyc$/i', $file) === 1) {
                $hits[] = $file;
            }
        }
        return $hits;
    }

    private function missingIgnoreEntries(): array
    {
        $gitignore = ROOTPATH . '.gitignore';
        $content = is_file($gitignore) ? file_get_contents($gitignore) : '';
        $required = [
            '**/node_modules/',
            '**/__pycache__/',
            '*.pyc',
            '*.node',
            '*.o',
            '*.a',
            '*.so',
            '*.dll',
            '*.dylib',
        ];

        $missing = [];
        foreach ($required as $entry) {
            if ($content === '' || strpos($content, $entry) === false) {
                $missing[] = $entry;
            }
        }

        return $missing;
    }
}
