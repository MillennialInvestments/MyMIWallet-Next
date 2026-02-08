<?php

namespace App\Commands\Ops\DreamHost;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\DreamHostService;

class DnsVerify extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'dreamhost:dns-verify';
    protected $description = 'Ops helper command: dreamhost:dns-verify';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new DreamHostService();

        return $this->respond($service->dnsVerify((string) ($args[0] ?? 'mymiwallet.com')));
    }
}
