<?php

declare(strict_types=1);

namespace App\Commands\Master\Health;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class Docs extends SafeBaseCommand
{
    protected $group = 'master';
    protected $name = 'master:health:docs';
    protected $description = 'Inspect docs directory health and summary coverage.';

    public function run(array $params)
    {
        $docsPath = ROOTPATH . 'docs';
        $report = [
            'generated_at' => date('Y-m-d H:i:s'),
            'total_md_files'=> 0,
            'readme_files' => 0,
            'directories'  => [],
        ];

        if (!is_dir($docsPath)) {
            CLI::error('docs directory missing.');
            return;
        }

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($docsPath, RecursiveDirectoryIterator::SKIP_DOTS)
        );

        $dirMap = [];

        foreach ($iterator as $file) {
            if ($file->isDir()) {
                continue;
            }

            $path = $file->getPathname();
            if (pathinfo($path, PATHINFO_EXTENSION) !== 'md') {
                continue;
            }

            $report['total_md_files']++;

            if (basename($path) === 'README.md') {
                $report['readme_files']++;
            }

            $dir = dirname(str_replace(ROOTPATH, '', $path));
            if (!isset($dirMap[$dir])) {
                $dirMap[$dir] = [
                    'directory' => $dir,
                    'md_files'  => 0,
                    'has_readme'=> false,
                ];
            }

            $dirMap[$dir]['md_files']++;

            if (basename($path) === 'README.md') {
                $dirMap[$dir]['has_readme'] = true;
            }
        }

        $report['directories'] = array_values($dirMap);

        file_put_contents(
            ROOTPATH . 'docs/_health_docs.json',
            json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        CLI::write('Docs health report written: docs/_health_docs.json', 'green');
    }
}