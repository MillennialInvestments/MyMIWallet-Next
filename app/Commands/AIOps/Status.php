<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\Base\BaseAiopsCommand;
use App\Commands\Support\SubsCommandTrait;
use App\Services\AIOps\AiOpsServiceManager;

class Status extends BaseAiopsCommand
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

        $mgr = $this->mgr();
        $serviceManager = new AiOpsServiceManager();
        $n8n = $serviceManager->ensureServiceRunning('n8n');

        $payload = [
            'status' => $n8n['status'] === 'running' ? 'ok' : 'degraded',
            'timestamp' => date('c'),
            'services' => [
                'n8n' => $n8n,
                'bridge_8500' => [
                    'port_listening' => $mgr->isPortOccupied(8500),
                ],
            ],
        ];

        $this->emit($payload, $json);

        return EXIT_SUCCESS;
    }
}
