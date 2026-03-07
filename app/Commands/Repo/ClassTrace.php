<?php

declare(strict_types=1);

namespace App\Commands\Repo;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

final class ClassTrace extends SafeBaseCommand
{
    protected $group = 'Repo';
    protected $name = 'repo:class-trace';
    protected $description = 'Trace where a class is declared and referenced in the repository.';
    protected $usage = 'repo:class-trace --class="App\\Modules\\Ops\\Controllers\\OpsManagementController"';

    public function run(array $params)
    {
        $targetClass = $this->getOptionValue($params, '--class', '');

        if ($targetClass === '') {
            CLI::error('Missing required option: --class="FQCN"');
            return;
        }

        $shortClass = substr($targetClass, strrpos($targetClass, '\\') + 1);
        $results = [
            'target_class' => $targetClass,
            'short_class' => $shortClass,
            'declarations' => [],
            'references' => [],
            'includes' => [],
            'duplicate_class_name_in_same_file' => [],
        ];

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(ROOTPATH . 'app')
        );

        foreach ($iterator as $file) {
            if (! $file->isFile() || substr($file->getFilename(), -4) !== '.php') {
                continue;
            }

            $path = $file->getPathname();
            $content = file_get_contents($path);

            if ($content === false) {
                continue;
            }

            $hasTargetNamespace = str_contains($content, 'namespace App\\Modules\\Ops\\Controllers;');
            $classMatches = [];
            preg_match_all('/class\s+' . preg_quote($shortClass, '/') . '\b/', $content, $classMatches);

            if (! empty($classMatches[0])) {
                $results['declarations'][] = [
                    'file' => $path,
                    'count' => count($classMatches[0]),
                ];

                if (count($classMatches[0]) > 1) {
                    $results['duplicate_class_name_in_same_file'][] = $path;
                }
            }

            if (str_contains($content, $targetClass) || str_contains($content, $shortClass)) {
                $results['references'][] = $path;
            }

            if (
                preg_match('/\b(require|include|require_once|include_once)\b/', $content) &&
                (str_contains($content, $shortClass) || str_contains($content, 'Controllers'))
            ) {
                $results['includes'][] = $path;
            }
        }

        $outDir = ROOTPATH . 'docs/_repo';
        if (! is_dir($outDir)) {
            mkdir($outDir, 0775, true);
        }

        file_put_contents(
            $outDir . '/class_trace.json',
            json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n"
        );

        $md = [];
        $md[] = '# Class Trace Report';
        $md[] = '';
        $md[] = '- Generated: `' . gmdate('Y-m-d\TH:i:s\Z') . '`';
        $md[] = '- Target class: `' . $targetClass . '`';
        $md[] = '';

        $md[] = '## Declarations';
        if ($results['declarations'] === []) {
            $md[] = '- None found';
        } else {
            foreach ($results['declarations'] as $row) {
                $md[] = '- `' . $row['file'] . '` (count: ' . $row['count'] . ')';
            }
        }

        $md[] = '';
        $md[] = '## Include / Require references';
        if ($results['includes'] === []) {
            $md[] = '- None found';
        } else {
            foreach ($results['includes'] as $file) {
                $md[] = '- `' . $file . '`';
            }
        }

        $md[] = '';
        $md[] = '## General references';
        if ($results['references'] === []) {
            $md[] = '- None found';
        } else {
            foreach ($results['references'] as $file) {
                $md[] = '- `' . $file . '`';
            }
        }

        $md[] = '';
        $md[] = '## Same-file duplicate class declarations';
        if ($results['duplicate_class_name_in_same_file'] === []) {
            $md[] = '- None';
        } else {
            foreach ($results['duplicate_class_name_in_same_file'] as $file) {
                $md[] = '- `' . $file . '`';
            }
        }

        file_put_contents($outDir . '/class_trace.md', implode("\n", $md) . "\n");

        CLI::write('Wrote class trace report to docs/_repo/class_trace.md', 'green');
    }

    private function getOptionValue(array $params, string $key, string $default): string
    {
        foreach ($params as $p) {
            if (is_string($p) && strpos($p, $key . '=') === 0) {
                return (string) substr($p, strlen($key) + 1);
            }
        }

        return $default;
    }
}