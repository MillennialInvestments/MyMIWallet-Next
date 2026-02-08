<?php

declare(strict_types=1);

namespace App\Commands\Ops\Server;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\VpsHealthService;

class NginxStatus extends BaseOpsCommand
{
    protected $name = 'ops:nginx:status';
    protected $description = 'NGINX sanity checks without sudo/systemd access.';

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $status = (new VpsHealthService())->nginxStatus();
        $payload = ['command' => $this->name, 'timestamp' => gmdate('c'), 'summary' => $status, 'exit_code' => EXIT_SUCCESS];

        return $this->respond($payload, 'commands/ops-nginx-status', isset($flags['dry-run']), isset($flags['json']));
    }
}
