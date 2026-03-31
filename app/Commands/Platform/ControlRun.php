<?php

declare(strict_types=1);

namespace App\Commands\Platform;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ControlRun extends SafeBaseCommand
{
    protected $group = 'platform';
    protected $name = 'platform:control:run';
    protected $description = 'Run control-plane collect -> analyze -> dispatch pipeline.';

    protected $options = [
        '--dry-run' => 'Pass --dry-run=1 to dispatch (default true).',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dryRun = (string) ($flags['dry-run'] ?? '1');

        CLI::write('Running control plane pipeline...', 'yellow');
        command('platform:control:collect');
        command('platform:control:analyze');
        command('platform:control:dispatch --dry-run=' . $dryRun);
        CLI::write('Control plane pipeline complete.', 'green');
    }
}
