<?php

declare(strict_types=1);

namespace App\Commands\Ops\Email;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\EmailOpsService;

class Healthcheck extends BaseOpsCommand
{
    protected $name = 'email:healthcheck';
    protected $description = 'Mail subsystem diagnostics (SMTP, quota signals, bounce patterns).';

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $summary = (new EmailOpsService())->healthcheck();
        return $this->respond(['command'=>$this->name,'timestamp'=>gmdate('c'),'summary'=>$summary,'exit_code'=>EXIT_SUCCESS], 'email/healthcheck', isset($flags['dry-run']), isset($flags['json']));
    }
}
