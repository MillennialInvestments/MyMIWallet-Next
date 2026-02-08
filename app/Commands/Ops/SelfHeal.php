<?php

declare(strict_types=1);

namespace App\Commands\Ops;

class SelfHeal extends BaseOpsCommand
{
    protected $name = 'ops:self-heal';
    protected $description = 'Safe auto-remediation (cache clear/log rotate/fallback toggles).';

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dry = isset($flags['dry-run']);

        $actions = [
            'clear_cache' => $dry ? 'planned' : 'executed',
            'rotate_logs' => 'planned',
            'disable_failing_features' => 'manual-flag-required',
            'fallback_configs' => 'manual-flag-required',
            'escalation' => 'alert human if recurring critical errors persist',
        ];

        if (! $dry && is_dir(ROOTPATH . 'writable/cache')) {
            @shell_exec('find ' . escapeshellarg(ROOTPATH . 'writable/cache') . ' -type f -delete 2>/dev/null');
        }

        return $this->respond(['command'=>$this->name,'timestamp'=>gmdate('c'),'summary'=>$actions,'exit_code'=>EXIT_SUCCESS], 'reports/self-heal', $dry, isset($flags['json']));
    }
}
