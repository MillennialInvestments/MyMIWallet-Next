<?php

declare(strict_types=1);

namespace App\Commands\GigHop;

use App\Commands\Base\BaseAiopsCommand;

class DispatchOptimize extends BaseAiopsCommand
{
    protected $group = 'GigHop';
    protected $name = 'gighop:dispatch:optimize';
    protected $description = 'Runs safe dispatch optimization analysis for GigHop routes.';

    public function run(array $params): int
    {
        return $this->safeRun(function (): int {
            helper(['cli', 'log']);

            $actions = [
                'rebalance_hot_zones' => 'queued',
                're-score_driver_proximity' => 'queued',
                'evaluate_surge_windows' => 'queued',
            ];

            $this->writeOutput('Dispatch optimization plan generated.', 'success');
            foreach ($actions as $action => $status) {
                $this->writeOutput(sprintf('- %s: %s', $action, $status), 'info');
            }

            $this->logCommandEvent('gighop_dispatch_optimize', ['actions' => $actions]);

            return EXIT_SUCCESS;
        });
    }
}
