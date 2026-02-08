<?php

namespace App\Commands\Ops;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\VpsHealthService;

class SelfHeal extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'ops:self-heal';
    protected $description = 'Ops helper command: ops:self-heal';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new VpsHealthService();

        return $this->respond(['ok'=>true,'actions'=>['clear-cache','restart-queue'],'note'=>'dry safe actions only']);
    }
}
