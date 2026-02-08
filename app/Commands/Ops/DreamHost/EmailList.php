<?php

namespace App\Commands\Ops\DreamHost;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\DreamHostService;

class EmailList extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'dreamhost:email-list';
    protected $description = 'Ops helper command: dreamhost:email-list';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new DreamHostService();

        return $this->respond($service->emailList((string) ($args[0] ?? 'mymiwallet.com')));
    }
}
