<?php

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;

class FullDocsAudit extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:full-audit';

    public function run(array $params)
    {

        command('docs:inventory');
        command('docs:architecture:graph');
        command('docs:routes:inventory');
        command('docs:database:map');
        command('docs:modules:map');
        command('docs:spark:inventory');
        command('docs:dependencies:map');
        command('docs:readme:build');

    }
}