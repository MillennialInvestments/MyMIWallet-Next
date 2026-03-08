<?php

declare(strict_types=1);

namespace App\Commands\Master\Health;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class Views extends SafeBaseCommand
{
    protected $group = 'master';
    protected $name = 'master:health:views';
    protected $description = 'Inspect views inventory and view directory health.';

    public function run(array $params)
    {
        $paths = [APPPATH . 'Views', APPPATH . 'Modules'];
        $views = [];

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
                $normalized = str_replace('\\', '/', $pathname);

                if (strpos($normalized, '/Views/') !== false) {
                    $views[] = str_replace(ROOTPATH, '', $pathname);
                }
            }
        }

        sort($views);

        file_put_contents(
            ROOTPATH . 'docs/_health_views.json',
            json_encode([
                'generated_at' => date('Y-m-d H:i:s'),
                'count'        => count($views),
                'views'        => $views,
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        CLI::write('View health report written: docs/_health_views.json', 'green');
    }
}