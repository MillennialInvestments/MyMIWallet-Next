<?php

declare(strict_types=1);

namespace App\Commands\Ops\DreamHost;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\DreamHostService;

class DnsVerify extends BaseOpsCommand
{
    protected $name = 'dreamhost:dns:verify';
    protected $description = 'Verify SPF/DKIM/DMARC/MX alignment from DreamHost DNS records.';

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dns = (new DreamHostService())->listDns();
        $summary = [
            'records' => $dns,
            'checks' => ['spf' => 'pending-parse', 'dkim' => 'pending-parse', 'dmarc' => 'pending-parse', 'mx_alignment' => 'pending-parse'],
        ];
        return $this->respond(['command'=>$this->name,'timestamp'=>gmdate('c'),'summary'=>$summary,'exit_code'=>EXIT_SUCCESS], 'dreamhost/dns-verify', isset($flags['dry-run']), isset($flags['json']));
    }
}
