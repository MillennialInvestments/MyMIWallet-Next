<?php

declare(strict_types=1);

namespace App\Commands\Ops\DreamHost;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\DreamHostService;

class Limits extends BaseOpsCommand
{
    protected $name = 'dreamhost:limits';
    protected $description = 'Monitor DreamHost API/mail/resource limit hints.';

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $summary = (new DreamHostService())->limits();
        return $this->respond(['command'=>$this->name,'timestamp'=>gmdate('c'),'summary'=>$summary,'exit_code'=>EXIT_SUCCESS], 'dreamhost/limits', isset($flags['dry-run']), isset($flags['json']));
    }
}
