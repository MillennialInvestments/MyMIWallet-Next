<?php

namespace App\Commands\Ops\Logs;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\LogOpsService;

class Scan extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'logs:scan';
    protected $description = 'Ops helper command: logs:scan';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new LogOpsService();

        return $this->respond($service->scan());
    }
}
