<?php

declare(strict_types=1);

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SyncAllDocs extends SafeBaseCommand
{

    protected $group = 'Docs';
    protected $name = 'docs:sync-all';
    protected $description = 'Run full documentation pipeline';

    public function run(array $params)
    {

        CLI::write('Running full docs pipeline...', 'yellow');

        command('docs:inventory');
        command('docs:audit');
        command('docs:generate-missing');
        command('docs:architecture-map');

        CLI::write('Docs pipeline completed.', 'green');
    }
}