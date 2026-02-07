<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ConfigReset extends SafeBaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'ops:config:reset';
    protected $description = 'Clear config-related caches after config changes.';

    public function run(array $params)
    {
        $paths = [
            WRITEPATH . 'cache/FactoriesCache_*',
            WRITEPATH . 'cache/*.php',
        ];

        foreach ($paths as $pattern) {
            foreach (glob($pattern) ?: [] as $file) {
                @unlink($file);
            }
        }

        CLI::write('Config caches cleared successfully.', 'green');

        return EXIT_SUCCESS;
    }
}
