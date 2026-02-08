<?php

namespace App\Commands\Ops\DreamHost;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\DreamHostService;

class EmailAudit extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'dreamhost:email-audit';
    protected $description = 'Ops helper command: dreamhost:email-audit';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new DreamHostService();

        return $this->respond($service->emailAudit((string) ($args[0] ?? 'mymiwallet.com')));
    }
}
