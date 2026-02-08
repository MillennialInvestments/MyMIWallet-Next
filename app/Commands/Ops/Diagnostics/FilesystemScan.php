<?php

namespace App\Commands\Ops\Diagnostics;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\VpsHealthService;

class FilesystemScan extends BaseOpsCommand
{
    protected $group = 'ops';
    protected $name = 'ops:filesystem-scan';
    protected $description = 'Ops helper command: ops:filesystem-scan';

    public function run(array $params)
    {
        [$args] = $this->parseParams($params);
        $service = new VpsHealthService();

        return $this->respond($service->filesystemScan((string) ($args[0] ?? ROOTPATH)));
    }
}
