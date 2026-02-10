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
            WRITEPATH . 'cache/Commands.php',
            WRITEPATH . 'cache/config-*',
            WRITEPATH . 'cache/*.php',
        ];

        $deleted = 0;
        foreach ($paths as $pattern) {
            foreach (glob($pattern) ?: [] as $file) {
                if (is_file($file) && @unlink($file)) {
                    $deleted++;
                }
            }
        }

        CLI::write('Config caches cleared successfully. files_deleted=' . $deleted, 'green');

        return EXIT_SUCCESS;
    }
}
