<?php

namespace App\Commands\Ops\Email;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\EmailOpsService;

class QueueScan extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'email:queue-scan';
    protected $description = 'Ops helper command: email:queue-scan';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new EmailOpsService();

        return $this->respond($service->queueScan());
    }
}
