<?php

namespace App\Commands\Ops\Email;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\EmailOpsService;

class Healthcheck extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'email:healthcheck';
    protected $description = 'Ops helper command: email:healthcheck';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new EmailOpsService();

        return $this->respond($service->healthcheck());
    }
}
