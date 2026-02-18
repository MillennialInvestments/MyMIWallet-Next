<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\AiOpsGuard;

class GateCost extends SafeBaseCommand
{
    protected $group = 'AIOps - Management';
    protected $name = 'aiops:gate:cost';
    protected $description = 'Enforce daily AI cost cap; auto-disable AiOps LLM when threshold exceeded';

    public function run(array $params)
    {
        $settings = config('SiteSettings');
        $guard = new AiOpsGuard();

        $cap = (float)($settings->aiops_daily_cap_usd ?? 10.0);
        $hardStopPct = (int)($settings->aiops_hard_stop_percent ?? 80);

        $today = $guard->todayCostUsd();

        $threshold = ($cap * $hardStopPct) / 100.0;

        CLI::write("Daily cap (USD): {$cap}");
        CLI::write("Hard stop percent: {$hardStopPct}%");
        CLI::write("Hard stop threshold (USD): {$threshold}");
        CLI::write("Today's estimated cost (USD): " . number_format($today, 4));

        if ($today >= $threshold) {
            $guard->disable("Cost hard-stop tripped: today={$today}, threshold={$threshold}");
            CLI::error("AiOps disabled: cost threshold exceeded. Flag written: " . $guard->flagPath());
            exit(2);
        }

        CLI::write("Cost gate passed.");
    }
}
