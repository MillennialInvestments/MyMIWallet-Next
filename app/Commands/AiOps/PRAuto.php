<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class PRAuto extends SafeBaseCommand
{
    protected $group = 'AIOps - PR';
    protected $name = 'aiops:pr:auto';
    protected $description = 'Full safe pipeline: observe → validate → regression → PR';

    public function run(array $params)
    {
        $cronEnabled = getenv('AIOPS_CRON_ENABLED');

        if (!$cronEnabled || !filter_var($cronEnabled, FILTER_VALIDATE_BOOL)) {
            CLI::error('AIOPS_CRON_ENABLED=false; exiting.');
            return;
        }

        CLI::write('Running SAFE AiOps pipeline...');

        // SAFE VALIDATION PIPELINE
        $this->spark('aiops:repair:run_safe');

        // Only if validation passed
        $this->sparkIfExists('aiops:pr:create');
    }

    private function spark(string $cmd): void
    {
        $full = PHP_BINARY . ' ' . escapeshellarg(ROOTPATH . 'spark') . ' ' . $cmd;
        exec($full . ' 2>&1', $out, $code);
        foreach ($out as $line) CLI::write($line);

        if ($code !== 0) {
            CLI::error("Command failed: {$cmd}");
            exit(1);
        }
    }

    private function sparkIfExists(string $cmd): void
    {
        $full = PHP_BINARY . ' ' . escapeshellarg(ROOTPATH . 'spark') . ' ' . $cmd;
        exec($full . ' 2>&1', $out, $code);

        $joined = implode("\n", $out);

        if (str_contains($joined, 'Command "') && str_contains($joined, '" not found')) {
            CLI::write("Skipping missing command: {$cmd}");
            return;
        }

        foreach ($out as $line) CLI::write($line);

        if ($code !== 0) {
            CLI::error("Command failed: {$cmd}");
            exit(1);
        }
    }
}
