<?php

declare(strict_types=1);

namespace App\Commands\Ops\Email;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\EmailOpsService;

class Test extends BaseOpsCommand
{
    protected $name = 'email:test';
    protected $description = 'End-to-end mail configuration validation (safe, non-sending).';
    protected $usage = 'email:test [recipient] [--json] [--dry-run]';

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $to = $args[0] ?? 'postmaster@localhost';
        $summary = (new EmailOpsService())->test((string) $to);
        return $this->respond(['command'=>$this->name,'timestamp'=>gmdate('c'),'summary'=>$summary,'exit_code'=>EXIT_SUCCESS], 'email/test', isset($flags['dry-run']), isset($flags['json']));
    }
}
