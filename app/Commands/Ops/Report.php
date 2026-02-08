<?php

namespace App\Commands\Ops;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\VpsHealthService;

class Report extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'ops:report';
    protected $description = 'Ops helper command: ops:report';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new VpsHealthService();

        return $this->respond(['ok'=>true,'summary'=>[$service->healthcheck(),$service->nginxStatus(),$service->phpFpmHealth()]]);
    }
}
