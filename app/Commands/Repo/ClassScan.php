<?php

declare(strict_types=1);

namespace App\Commands\Repo;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

final class ClassScan extends SafeBaseCommand
{
    protected $group = 'Repo';
    protected $name = 'repo:class-scan';
    protected $description = 'Scan repository for duplicate classes and namespace conflicts.';

    public function run(array $params)
    {
        $paths = [
            ROOTPATH . 'app',
        ];

        $classMap = [];
        $duplicates = [];

        foreach ($paths as $path) {

            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($path)
            );

            foreach ($iterator as $file) {

                if (!$file->isFile()) continue;

                if (substr($file->getFilename(), -4) !== '.php') continue;

                $full = $file->getPathname();

                $content = file_get_contents($full);

                if (!$content) continue;

                preg_match('/namespace\s+([^;]+);/', $content, $ns);
                preg_match('/class\s+([A-Za-z0-9_]+)/', $content, $class);

                if (!$ns || !$class) continue;

                $fqcn = trim($ns[1]) . '\\' . trim($class[1]);

                if (!isset($classMap[$fqcn])) {

                    $classMap[$fqcn] = [$full];

                } else {

                    $classMap[$fqcn][] = $full;
                    $duplicates[$fqcn] = $classMap[$fqcn];
                }
            }
        }

        $report = [
            'total_classes' => count($classMap),
            'duplicate_classes' => $duplicates
        ];

        $dir = ROOTPATH . 'docs/_repo';

        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        file_put_contents(
            $dir . '/class_integrity_report.json',
            json_encode($report, JSON_PRETTY_PRINT)
        );

        $md = [];
        $md[] = '# Class Integrity Report';
        $md[] = '';
        $md[] = 'Generated: ' . gmdate('Y-m-d H:i:s');
        $md[] = '';

        foreach ($duplicates as $class => $files) {

            $md[] = '## Duplicate Class';
            $md[] = '`' . $class . '`';
            $md[] = '';

            foreach ($files as $file) {
                $md[] = '- ' . $file;
            }

            $md[] = '';
        }

        file_put_contents($dir . '/class_integrity_report.md', implode("\n", $md));

        CLI::write('Classes scanned: ' . count($classMap), 'green');
        CLI::write('Duplicate classes: ' . count($duplicates), 'red');
        CLI::write('Report written to docs/_repo/', 'yellow');
    }
}