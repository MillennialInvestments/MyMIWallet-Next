<?php

declare(strict_types=1);

namespace App\Commands\API;

use App\Commands\SafeBaseCommand;
use App\Services\ApiGovernanceService;
use CodeIgniter\CLI\CLI;

class ApiList extends SafeBaseCommand
{
    protected $group = 'API';
    protected $name = 'api:list';
    protected $description = 'List endpoints with filters, auth indicator, and version.';

    public function run(array $params)
    {
        $svc = new ApiGovernanceService();
        $scan = $svc->scan();
        $rows = [];
        foreach ($scan['routes'] as $route) {
            $rows[] = [
                $route['module'],
                $route['http_methods'],
                $route['uri'],
                $route['controller'] . '::' . $route['action'],
                implode(',', $route['filters']),
                $route['auth_required'] ? 'yes' : 'no',
                $route['version'],
            ];
        }

        CLI::table($rows, ['module', 'method', 'uri', 'handler', 'filters', 'auth', 'version']);

        $lines = [
            '# API List',
            '- Timestamp: ' . $scan['metadata']['timestamp'],
            '- Run UUID: ' . $scan['metadata']['run_uuid'],
            '- Environment: ' . $scan['metadata']['environment'],
            '',
        ];
        foreach ($scan['routes'] as $route) {
            $lines[] = sprintf('- [%s] %s `%s` → `%s::%s` | filters=%s | auth=%s | version=%s',
                $route['module'],
                $route['http_methods'],
                $route['uri'],
                $route['controller'],
                $route['action'],
                implode(',', $route['filters']),
                $route['auth_required'] ? 'yes' : 'no',
                $route['version']
            );
        }

        $target = ROOTPATH . 'docs/APIs/list';
        @mkdir($target, 0775, true);
        file_put_contents($target . '/latest.md', implode(PHP_EOL, $lines) . PHP_EOL);

        return EXIT_SUCCESS;
    }
}
