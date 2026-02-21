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

        $this->sparkRun('ops:php:extensions');
        $this->sparkRun('ops:network:matrix');
        $this->sparkRun('runtime:spark-doctor', true);
        $this->sparkRun('dreamhost:imap-capabilities', true);

        CLI::write("\n✔ Ops Doctor complete.", 'green');
        $this->nextStep('ops:report', 'Capture a consolidated Ops snapshot after diagnostics.');

        return EXIT_SUCCESS;
    }
}
