<?php

declare(strict_types=1);

namespace App\Commands\Master\Health;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class Controllers extends SafeBaseCommand
{
    protected $group = 'master';
    protected $name = 'master:health:controllers';
    protected $description = 'Inspect controllers for basic CI4 health issues.';

    public function run(array $params)
    {
        $files = $this->findControllerFiles();
        $report = [
            'generated_at' => date('Y-m-d H:i:s'),
            'controllers'  => [],
            'issues'       => [],
        ];

        foreach ($files as $file) {
            $content = file_get_contents($file);

            $item = [
                'path'              => str_replace(ROOTPATH, '', $file),
                'has_namespace'     => preg_match('/namespace\s+[^;]+;/', $content) === 1,
                'has_class'         => preg_match('/class\s+[A-Za-z0-9_]+/', $content) === 1,
                'public_methods'    => preg_match_all('/public\s+function\s+[A-Za-z0-9_]+\s*\(/', $content),
                'uses_responsetrait'=> strpos($content, 'ResponseTrait') !== false,
                'uses_logging'      => strpos($content, 'log_message(') !== false,
            ];

            if (!$item['has_namespace']) {
                $report['issues'][] = $item['path'] . ' missing namespace';
            }

            if (!$item['has_class']) {
                $report['issues'][] = $item['path'] . ' missing class';
            }

            $report['controllers'][] = $item;
        }

        file_put_contents(
            ROOTPATH . 'docs/_health_controllers.json',
            json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        CLI::write('Controller health report written: docs/_health_controllers.json', 'green');
    }

    protected function findControllerFiles(): array
    {
        $paths = [APPPATH . 'Controllers', APPPATH . 'Modules'];
        $files = [];

        foreach ($paths as $path) {
            if (!is_dir($path)) {
                continue;
            }

            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS)
            );

            foreach ($iterator as $file) {
                if ($file->isDir()) {
                    continue;
                }

                $pathname = $file->getPathname();
                if (pathinfo($pathname, PATHINFO_EXTENSION) !== 'php') {
                    continue;
                }

                if (strpos(str_replace('\\', '/', $pathname), '/Controllers/') !== false ||
                    strpos(str_replace('\\', '/', $pathname), '/Controllers.php') !== false) {
                    $files[] = $pathname;
                }
            }
        }

        sort($files);
        return array_values(array_unique($files));
    }
}