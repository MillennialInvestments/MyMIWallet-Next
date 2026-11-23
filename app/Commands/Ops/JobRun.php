<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Services\Ops\OpsJobRunner;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

/**
 * php spark ops:job:run <job> [--allow-db-maintenance]
 *
 * Runs one allowlisted ops job now (used by the mymi-ops-* systemd timers).
 * Exit 0 ok/degraded, 1 error, 2 refused.
 */
class JobRun extends BaseCommand
{
    protected $group       = 'Ops';
    protected $name        = 'ops:job:run';
    protected $description = 'Run one allowlisted MyMI ops job now and record its last run.';
    protected $usage       = 'ops:job:run <job> [--allow-db-maintenance]';
    protected $arguments   = ['job' => 'One of: ' . 'ops.health.check, ops.logs.triage_daily, ops.routes.smoke_test, ops.security.headers_scan, ops.db.maintenance'];
    protected $options     = ['--allow-db-maintenance' => 'Required for ops.db.maintenance (deletes old ops queue/run rows).'];

    public function run(array $params)
    {
        $job = (string) ($params[0] ?? '');
        $allowDb = array_key_exists('allow-db-maintenance', $params) || CLI::getOption('allow-db-maintenance') !== null;
        $row = (new OpsJobRunner())->run($job, $allowDb);

        $line = strtoupper($row['status']) . ' ' . $row['job'] . ($row['summary'] !== '' ? ' ' . $row['summary'] : '');
        CLI::write($line, $row['rc'] === 0 ? 'green' : 'red');
        CLI::write('SEMANTIC_RESULT=' . ($row['rc'] === 0 ? 'PASS' : ($row['rc'] === 2 ? 'BLOCKED_SAFETY' : 'FAILED')));

        return $row['rc'];
    }
}
