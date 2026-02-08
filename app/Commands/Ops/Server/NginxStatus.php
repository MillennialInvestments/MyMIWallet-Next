<?php

namespace App\Commands\Ops\Server;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\VpsHealthService;

class NginxStatus extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'ops:nginx-status';
    protected $description = 'Ops helper command: ops:nginx-status';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new VpsHealthService();

        return $this->respond($service->nginxStatus());
    }
}
