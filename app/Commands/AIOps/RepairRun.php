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

        $this->spark('aiops:observe:scan');
        $this->spark('aiops:observe:hash');
        $this->spark('aiops:observe:cost');
        $this->spark('aiops:observe:suggest');
        $this->spark('aiops:diff:format');
        $this->spark('aiops:patch:apply');

        CLI::write('Repair pipeline complete.');
    }

    private function runSpark(string $cmd)
    {
        exec(PHP_BINARY . ' ' . ROOTPATH . 'spark ' . $cmd . ' 2>&1', $out, $code);

        foreach ($out as $line) {
            CLI::write($line);
        }

        if ($code !== 0) {
            CLI::error("Step failed: {$cmd}");
            exit(1);
        }
    }
}
