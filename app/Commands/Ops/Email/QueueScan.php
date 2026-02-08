<?php

declare(strict_types=1);

namespace App\Commands\Ops\Email;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\EmailOpsService;

class QueueScan extends BaseOpsCommand
{
    protected $name = 'email:queue:scan';
    protected $description = 'Detect stuck or failed outbound mail patterns.';

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $summary = (new EmailOpsService())->queueScan();
        return $this->respond(['command'=>$this->name,'timestamp'=>gmdate('c'),'summary'=>$summary,'exit_code'=>EXIT_SUCCESS], 'email/queue-scan', isset($flags['dry-run']), isset($flags['json']));
    }
}
