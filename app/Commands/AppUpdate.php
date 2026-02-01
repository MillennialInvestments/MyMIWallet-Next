<?php

namespace App\Commands;

use CodeIgniter\CLI\CLI;

class AppUpdate extends SafeBaseCommand
{
    protected $name = 'app:update';
    protected $group = 'app';
    protected $description = 'Deprecated. Use ops:app:update instead.';
    protected $usage = 'app:update (deprecated)';

    public function run(array $params)
    {
        $this->parseParams($params);
        CLI::error('app:update is deprecated. Use php spark ops:app:update instead.');
        CLI::write('This command no longer performs updates to avoid unsafe operations.', 'yellow');

        return EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

}
