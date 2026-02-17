<?php

namespace App\Commands\AiOps\Observe;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Map extends SafeBaseCommand
{
    protected $group = 'AiOps';
    protected $name = 'aiops:observe:map';
    protected $description = 'Map errors to routes and controllers';

    public function run(array $params)
    {
        $statePath = WRITEPATH . 'audit/observability_state.json';

        if (!file_exists($statePath)) {
            CLI::error('Run aiops:observe:scan first.');
            return;
        }

        $data = json_decode(file_get_contents($statePath), true);

        $routesFile = APPPATH . 'Config/Routes.php';
        $routesContent = file_get_contents($routesFile);

        preg_match_all('/\$routes->get\([\'"]([^\'"]+)[\'"],\s*[\'"]([^\'"]+)/', $routesContent, $matches);

        $routeMap = [];

        foreach ($matches[1] as $i => $route) {
            $controller = $matches[2][$i] ?? '';
            $routeMap[$route] = $controller;
        }

        $data['route_map'] = $routeMap;

        file_put_contents($statePath, json_encode($data, JSON_PRETTY_PRINT));

        CLI::write('Route mapping completed.');
    }
}
