<?php

namespace App\Commands\Ops\Health;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\VpsHealthService;

class Healthcheck extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'ops:healthcheck';
    protected $description = 'Ops helper command: ops:healthcheck';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new VpsHealthService();

        return $this->respond($service->healthcheck());
    }
}
