<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\SubsCommandTrait;
use App\Services\AIOps\AiOpsServiceManager;

class Status extends SafeBaseCommand
{
    use SubsCommandTrait;

    protected $group = 'AIOps - Repair';
    protected $name = 'aiops:status';
    protected $description = 'AIOps runtime status';
    protected $options = ['--json' => 'JSON output'];

    public function run(array $params)
    {
        $this->parseParams($params);
        $json = $this->optBool('json');

        $mode = strtolower((string) env('AIOPS_MODE', 'remote'));
        $serviceManager = new AiOpsServiceManager();
        $n8n = $serviceManager->ensureServiceRunning('n8n');

        $services = ['n8n' => $n8n];

        if ($mode === 'local') {
            $mgr = $this->mgr();
            $services['bridge_8500'] = [
                'port_listening' => $mgr->isPortOccupied(8500),
            ];
        }

        $payload = [
            'status' => $n8n['status'] === 'running' ? 'ok' : 'degraded',
            'timestamp' => date('c'),
            'mode' => $mode,
            'services' => $services,
        ];

        $this->emit($payload, $json);

        return EXIT_SUCCESS;
    }
}
