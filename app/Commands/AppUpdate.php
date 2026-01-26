<?php

namespace App\Commands;

use CodeIgniter\CLI\CLI;
use Config\Services;

class AppUpdate extends SafeBaseCommand
{
    protected string $name = 'app:update';
    protected string $group = 'app';
    protected string $description = 'Run safe application update tasks.';
    protected string $usage = 'app:update';

    protected function isDestructive(): bool
    {
        return false;
    }

    public function run(array $params)
    {
        CLI::write('Starting app update...', 'green');

        Services::cache()->clean();
        CLI::write('✔ Cache cleared');

        passthru('composer dump-autoload');
        CLI::write('✔ Autoload rebuilt');

        CLI::write('✔ App update complete', 'green');
    }

    protected function isDestructive(): bool
    {
        return false;
    }

}
