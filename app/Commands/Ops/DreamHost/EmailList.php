<?php

declare(strict_types=1);

namespace App\Commands\Ops\DreamHost;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\DreamHostService;

class EmailList extends BaseOpsCommand
{
    protected $name = 'dreamhost:email:list';
    protected $description = 'List DreamHost mailboxes, quotas, and status.';

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $summary = (new DreamHostService())->listEmailAccounts();
        return $this->respond(['command'=>$this->name,'timestamp'=>gmdate('c'),'summary'=>$summary,'exit_code'=>EXIT_SUCCESS], 'dreamhost/email-list', isset($flags['dry-run']), isset($flags['json']));
    }
}
