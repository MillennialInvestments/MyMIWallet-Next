<?php

namespace App\Commands\Ops\DreamHost;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\DreamHostService;

class Limits extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'dreamhost:limits';
    protected $description = 'Ops helper command: dreamhost:limits';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new DreamHostService();

        return $this->respond($service->limits());
    }
}
