<?php

declare(strict_types=1);

namespace App\Commands\Master\Health;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Routes extends SafeBaseCommand
{
    protected $group = 'master';
    protected $name = 'master:health:routes';
    protected $description = 'Inspect route configuration files and emit a health report.';

    public function run(array $params)
    {
        $files = [APPPATH . 'Config/Routes.php'];
        $moduleRoutes = glob(APPPATH . 'Modules/*/Config/Routes.php') ?: [];
        $files = array_merge($files, $moduleRoutes);

        $report = [
            'generated_at' => date('Y-m-d H:i:s'),
            'files'        => [],
            'issues'       => [],
        ];

        foreach ($files as $file) {
            if (!is_file($file)) {
                continue;
            }

            $content = file_get_contents($file);

            preg_match_all('/\$routes->(get|post|add|match|group|resource)\(/', $content, $matches);

            $report['files'][] = [
                'path'         => str_replace(ROOTPATH, '', $file),
                'route_count'  => count($matches[0] ?? []),
                'has_closure'  => strpos($content, 'function(') !== false || strpos($content, 'function (') !== false,
            ];
        }

        $output = ROOTPATH . 'docs/_health_routes.json';
        file_put_contents($output, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        CLI::write('Route health report written: docs/_health_routes.json', 'green');
    }
}