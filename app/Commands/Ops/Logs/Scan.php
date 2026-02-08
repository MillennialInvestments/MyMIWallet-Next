<?php

declare(strict_types=1);

namespace App\Commands\Ops\Logs;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\LogOpsService;

class Scan extends BaseOpsCommand
{
    protected $name = 'logs:scan';
    protected $description = 'Harvest available application/system logs for analysis.';

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $summary = (new LogOpsService())->scan();
        return $this->respond(['command'=>$this->name,'timestamp'=>gmdate('c'),'summary'=>$summary,'exit_code'=>EXIT_SUCCESS], 'logs/raw-scan', isset($flags['dry-run']), isset($flags['json']));
    }
}
