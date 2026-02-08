<?php

namespace App\Commands\Ops\Email;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\EmailOpsService;

class Test extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'email:test';
    protected $description = 'Ops helper command: email:test';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new EmailOpsService();

        return $this->respond($service->sendTest((string) ($args[0] ?? 'admin@mymiwallet.com')));
    }
}
