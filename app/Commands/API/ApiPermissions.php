<?php

declare(strict_types=1);

namespace App\Commands\API;

use App\Commands\SafeBaseCommand;
use App\Services\ApiGovernanceService;

class ApiPermissions extends SafeBaseCommand
{
    protected $group = 'API';
    protected $name = 'api:permissions';
    protected $description = 'Generate endpoint permission matrix in markdown and JSON.';

    public function run(array $params)
    {
        $scan = (new ApiGovernanceService())->scan();
        @mkdir(ROOTPATH . 'docs/security', 0775, true);
        $rows = [];
        $md = [
            '# Endpoint Permission Matrix',
            '- Timestamp: ' . $scan['metadata']['timestamp'],
            '- Run UUID: ' . $scan['metadata']['run_uuid'],
            '',
            '| Method | URI | Handler | Requires Auth | Filters |',
            '|---|---|---|---|---|',
        ];
        foreach ($scan['routes'] as $r) {
            $rows[] = [
                'method' => $r['http_methods'],
                'uri' => $r['uri'],
                'handler' => $r['controller'] . '::' . $r['action'],
                'requires_auth' => $r['auth_required'],
                'filters' => $r['filters'],
            ];
            $md[] = sprintf('| %s | %s | %s::%s | %s | %s |', $r['http_methods'], $r['uri'], $r['controller'], $r['action'], $r['auth_required'] ? 'yes' : 'no', implode(',', $r['filters']));
        }
        file_put_contents(ROOTPATH . 'docs/security/endpoint-permission-matrix.md', implode(PHP_EOL, $md) . PHP_EOL);
        file_put_contents(ROOTPATH . 'docs/security/endpoint-permission-matrix.json', json_encode([
            'timestamp' => $scan['metadata']['timestamp'],
            'run_uuid' => $scan['metadata']['run_uuid'],
            'environment' => $scan['metadata']['environment'],
            'summary' => ['count' => count($rows)],
            'endpoints' => $rows,
        ], JSON_PRETTY_PRINT));

        return EXIT_SUCCESS;
    }
}
