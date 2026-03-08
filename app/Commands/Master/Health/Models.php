<?php

declare(strict_types=1);

namespace App\Commands\Master\Health;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class Models extends SafeBaseCommand
{
    protected $group = 'master';
    protected $name = 'master:health:models';
    protected $description = 'Inspect models for table mapping and basic CI4 model metadata.';

    public function run(array $params)
    {
        $files = $this->findModelFiles();
        $report = [
            'generated_at' => date('Y-m-d H:i:s'),
            'models'       => [],
            'issues'       => [],
        ];

        foreach ($files as $file) {
            $content = file_get_contents($file);

            preg_match('/protected\s+\$table\s*=\s*[\'"]([^\'"]+)[\'"]\s*;/', $content, $table);
            preg_match('/protected\s+\$primaryKey\s*=\s*[\'"]([^\'"]+)[\'"]\s*;/', $content, $pk);

            $item = [
                'path'        => str_replace(ROOTPATH, '', $file),
                'table'       => $table[1] ?? null,
                'primary_key' => $pk[1] ?? null,
            ];

            if (empty($item['table'])) {
                $report['issues'][] = $item['path'] . ' missing $table';
            }

            $report['models'][] = $item;
        }

        file_put_contents(
            ROOTPATH . 'docs/_health_models.json',
            json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        CLI::write('Model health report written: docs/_health_models.json', 'green');
    }

    protected function findModelFiles(): array
    {
        $paths = [APPPATH . 'Models', APPPATH . 'Modules'];
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

                if (strpos(str_replace('\\', '/', $pathname), '/Models/') !== false) {
                    $files[] = $pathname;
                }
            }
        }

        sort($files);
        return array_values(array_unique($files));
    }
}