<?php

declare(strict_types=1);

namespace App\Commands;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class InfraOverlayInstall extends SafeBaseCommand
{
    protected $group = 'Infrastructure';
    protected $name = 'infra:overlay-install';
    protected $description = 'Prints deterministic steps for installing TBI Core overlay into a fresh CI4 app.';

    public function run(array $params): void
    {
        CLI::write('Overlay install checklist:', 'yellow');
        CLI::write('1) Copy infrastructure/tbi-ci4-core/app/* into target app/.');
        CLI::write('2) Merge infrastructure/tbi-ci4-core/.env.template entries into target .env.');
        CLI::write('3) Register infra commands in Config/Console.php.');
        CLI::write('4) Add guarded service factories in Config/Services.php controlled by feature flags.');
        CLI::write('5) Run: composer dump-autoload && php spark list');
    }
}
