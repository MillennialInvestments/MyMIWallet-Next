<?php

declare(strict_types=1);

namespace App\Commands\Master\Health;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class Dependencies extends SafeBaseCommand
{
    protected $group = 'master';
    protected $name = 'master:health:dependencies';
    protected $description = 'Inspect service(), model, and view dependency references across controllers.';

    public function run(array $params)
    {
        $controllers = [];
        $paths = [APPPATH . 'Controllers', APPPATH . 'Modules'];

        foreach ($paths as $path) {
            if (!is_dir($path)) {
                continue;
            }

            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS)
            );

            foreach ($iterator as $file) {
                if ($file->isDir() || $file->getExtension() !== 'php') {
                    continue;
                }

                $pathname = $file->getPathname();
                if (strpos(str_replace('\\', '/', $pathname), '/Controllers/') === false &&
                    strpos(str_replace('\\', '/', $pathname), '/Controllers.php') === false) {
                    continue;
                }

                $content = file_get_contents($pathname);

                preg_match_all('/service\(\s*[\'"]([^\'"]+)[\'"]\s*\)/', $content, $services);
                preg_match_all('/return\s+view\(\s*[\'"]([^\'"]+)[\'"]/', $content, $views);
                preg_match_all('/new\s+([A-Za-z0-9_]+Model)\s*\(/', $content, $models);

                $controllers[] = [
                    'path'     => str_replace(ROOTPATH, '', $pathname),
                    'services' => array_values(array_unique($services[1] ?? [])),
                    'views'    => array_values(array_unique($views[1] ?? [])),
                    'models'   => array_values(array_unique($models[1] ?? [])),
                ];
            }
        }

        file_put_contents(
            ROOTPATH . 'docs/_health_dependencies.json',
            json_encode([
                'generated_at' => date('Y-m-d H:i:s'),
                'controllers'  => $controllers,
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        CLI::write('Dependency health report written: docs/_health_dependencies.json', 'green');
    }
}