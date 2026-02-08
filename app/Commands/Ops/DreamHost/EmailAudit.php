<?php

declare(strict_types=1);

namespace App\Commands\Ops\DreamHost;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\DreamHostService;

class EmailAudit extends BaseOpsCommand
{
    protected $name = 'dreamhost:email:audit';
    protected $description = 'Audit DreamHost email posture (quota, dormant/orphaned risk hints).';

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $list = (new DreamHostService())->listEmailAccounts();
        $summary = [
            'source' => $list,
            'checks' => [
                'over_quota' => 'Detect from API payload usage/quota fields when available.',
                'dormant_accounts' => 'Cross-reference login/send activity from app telemetry.',
                'orphaned_mailboxes' => 'Compare account domain against active hosted domains.',
            ],
        ];
        return $this->respond(['command'=>$this->name,'timestamp'=>gmdate('c'),'summary'=>$summary,'exit_code'=>EXIT_SUCCESS], 'dreamhost/email-audit', isset($flags['dry-run']), isset($flags['json']));
    }
}
