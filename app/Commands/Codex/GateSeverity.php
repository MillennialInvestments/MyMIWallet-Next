<?php

namespace App\Commands\Codex;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\AuditState;

class GateSeverity extends SafeBaseCommand
{
    protected $group = 'Codex';
    protected $name = 'codex:gate:severity';
    protected $description = 'Fail if severity counters exceed thresholds';

    public function run(array $params)
    {
        $maxHigh   = (int)($params[0] ?? 0);
        $maxMedium = (int)($params[1] ?? 10);

        $state = new AuditState();
        $data = $state->get();

        $high = (int)($data['high_issues'] ?? 0);
        $med  = (int)($data['medium_issues'] ?? 0);

        CLI::write("HIGH issues: {$high} (max allowed {$maxHigh})");
        CLI::write("MEDIUM issues: {$med} (max allowed {$maxMedium})");

        if ($high > $maxHigh) {
            CLI::error('Severity gate failed: HIGH issues exceed threshold.');
            exit(1);
        }

        if ($med > $maxMedium) {
            CLI::error('Severity gate failed: MEDIUM issues exceed threshold.');
            exit(1);
        }

        CLI::write('Severity gate passed.');
    }
}
