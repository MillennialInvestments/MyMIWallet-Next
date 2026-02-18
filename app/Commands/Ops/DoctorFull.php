<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class DoctorFull extends SafeBaseCommand
{
    protected $group       = 'Ops';
    protected $name        = 'ops:doctor:full';
    protected $description = 'Run high-signal diagnostics: env, php extensions, network matrix, IMAP capabilities (best-effort).';

    public function run(array $params)
    {
        CLI::write("Ops Doctor (full) starting...\n", 'yellow');

        $this->runSpark('ops:php:extensions');
        $this->runSpark('ops:network:matrix');

        // If available in your codebase, keep these (won’t fail the whole doctor if missing)
        $this->runSpark('runtime:spark-doctor', true);

        // DreamHost IMAP deep probe
        $this->runSpark('dreamhost:imap-capabilities', true);

        CLI::write("\n✔ Ops Doctor complete.", 'green');
        return EXIT_SUCCESS;
    }

    private function runSpark(string $command, bool $optional = false): void
    {
        $code = \CodeIgniter\CLI\CLI::runCommand($command);
        if ($code !== 0 && !$optional) {
            CLI::error("Command failed: {$command}");
        } elseif ($code !== 0 && $optional) {
            CLI::write("Optional command failed/skipped: {$command}", 'yellow');
        }
    }
}
