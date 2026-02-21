<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class RepairRun extends SafeBaseCommand
{
    protected $group = 'AIOps - Repair';
    protected $name = 'aiops:repair:run';
    protected $description = 'Full autonomous repair pipeline';

    public function run(array $params)
    {
        CLI::write('Starting autonomous repair pipeline...');

        $this->sparkRun('aiops:observe:scan');
        $this->sparkRun('aiops:observe:hash');
        $this->sparkRun('aiops:observe:cost');
        $this->sparkRun('aiops:observe:suggest', true);
        $this->sparkRun('aiops:diff:format');
        $this->sparkRun('aiops:patch:apply');

        CLI::write('Repair pipeline complete.');
        $this->nextStep('aiops:repair:run_safe', 'Run gated validation and rollback safety before opening a PR.');

        return EXIT_SUCCESS;
    }
}
