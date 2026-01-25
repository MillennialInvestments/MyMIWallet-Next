<?php

namespace App\Commands\Env;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class EnvDoctor extends BaseCommand
{
    protected $group       = 'env';
    protected $name        = 'env:doctor';
    protected $description = 'Environment diagnostics and snapshot (placeholder).';

    public function run(array $params)
    {
        CLI::write('EnvDoctor stub installed. Ready for Codex.', 'green');
    }
}
