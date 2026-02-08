<?php

declare(strict_types=1);

namespace App\Commands\Ops\Health;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\VpsHealthService;

class Healthcheck extends BaseOpsCommand
{
    protected $name = 'ops:healthcheck';
    protected $description = 'Full VPS health snapshot for DreamHost-safe operations.';

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $service = new VpsHealthService();
        $snapshot = $service->healthSnapshot();

        $payload = [
            'command' => $this->name,
            'timestamp' => gmdate('c'),
            'summary' => $snapshot,
            'exit_code' => EXIT_SUCCESS,
        ];

        return $this->respond($payload, 'commands/ops-healthcheck', isset($flags['dry-run']), isset($flags['json']));
    }
}
