<?php

namespace App\Commands\Ops\PHP;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\VpsHealthService;

class FpmHealth extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'ops:php-fpm-health';
    protected $description = 'Ops helper command: ops:php-fpm-health';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new VpsHealthService();

        return $this->respond($service->phpFpmHealth());
    }
}
