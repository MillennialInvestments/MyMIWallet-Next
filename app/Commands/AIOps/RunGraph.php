<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Services\AIOps\DependencyResolver;

class RunGraph extends SafeBaseCommand
{
    protected $group       = 'AIOps - Run';
    protected $name        = 'aiops:graph:run';
    protected $description = 'Execute queued instructions respecting dependency graph (runs worker iteratively).';

    public function run(array $params)
    {
        $deps = new DependencyResolver();
        $cycles = $deps->detectCycles();

        if ($cycles) {
            CLI::write("⚠️ Dependency cycles detected:", 'red');
            foreach ($cycles as $c) {
                CLI::write(" - Cycle edge: {$c[0]} -> {$c[1]}");
            }
            CLI::write("Fix cycles before running graph safely.");
            return;
        }

        CLI::write("✅ No cycles detected. Executing runnable queue...", 'green');

        $runs = 0;
        while (true) {
            $runnable = $deps->getRunnableQueuedId();
            if (!$runnable) break;

            CLI::write("Running worker once (next runnable: #{$runnable})", 'yellow');
            // Reuse spark to avoid duplicating worker logic
            passthru('php spark aiops:worker --once');

            $runs++;
            if ($runs > 200) {
                CLI::write("Safety stop: too many iterations.", 'red');
                break;
            }
        }

        CLI::write("✅ Graph run complete.", 'green');
    }
}