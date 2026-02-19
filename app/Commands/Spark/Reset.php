<?php

namespace App\Commands\Spark;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Reset extends SafeBaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'ops:spark-reset';
    protected $description = 'Purge Spark command cache and rebuild autoloads safely.';
    protected $usage       = 'ops:spark-reset';

    public function run(array $params)
    {
        CLI::write('🔁 Spark Reset starting...', 'yellow');

        // 1️⃣ Remove Spark command cache
        $cmdCache = WRITEPATH . 'cache/Commands.php';
        if (is_file($cmdCache)) {
            unlink($cmdCache);
            CLI::write('✔ Removed writable/cache/Commands.php');
        } else {
            CLI::write('ℹ No Spark command cache found');
        }

        // 2️⃣ Rebuild Composer autoload
        $composer = file_exists('composer.phar')
            ? PHP_BINARY . ' composer.phar'
            : 'composer';

        CLI::write('🔧 Rebuilding Composer autoload...');
        passthru($composer . ' dump-autoload', $code);

        if ($code !== 0) {
            CLI::error('❌ Composer autoload rebuild failed');
            return EXIT_ERROR;
        }

        CLI::write('✔ Autoload rebuilt');

        CLI::write('✅ Spark reset complete. Run `php spark list` to verify.', 'green');
        return EXIT_SUCCESS;
    }
}
