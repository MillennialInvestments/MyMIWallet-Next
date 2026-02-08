<?php

namespace App\Commands\Ops\Logs;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\LogOpsService;

class Watch extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'logs:watch';
    protected $description = 'Ops helper command: logs:watch';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new LogOpsService();

        return $this->respond($service->watch((int) ($args[0] ?? 10)));
    }
}
