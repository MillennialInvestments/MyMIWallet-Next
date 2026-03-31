<?php

declare(strict_types=1);

namespace App\Commands\Platform;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class RunSubsystem extends SafeBaseCommand
{
    protected $group = 'platform';
    protected $name = 'platform:run:subsystem';
    protected $description = 'Run platform pipeline scoped to one or more subsystems.';

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $subsystems = (string) ($flags['subsystems'] ?? '');
        command('platform:run --subsystems=' . $subsystems);
        CLI::write('Subsystem run complete.', 'green');
    }
}
