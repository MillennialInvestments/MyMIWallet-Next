<?php

namespace App\Commands\Docs\Sync;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Services\Docs\DocsSyncEngine;

class DocsSystem extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:sync-system';

    public function run(array $params)
    {
        command('docs:services:list');
        command('docs:controllers:list');
        command('docs:views:list');

        command('docs:views:export');

        command('docs:readme:build');
    }
}