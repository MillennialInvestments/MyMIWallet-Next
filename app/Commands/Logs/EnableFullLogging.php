<?php

namespace App\Commands\Logs;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class EnableFullLogging extends SafeBaseCommand
{
    protected $group = 'App - Logging';
    protected $name = 'app:logs:enable-full';
    protected $description = 'Force CI4 to log all levels with DB + PHP fallback enabled.';

    public function run(array $params)
    {
        $configPath = APPPATH . 'Config/Logger.php';

        $contents = file_get_contents($configPath);

        $contents = preg_replace('/public \$threshold\s*=.*/', 'public $threshold = 9;', $contents);
        $contents = preg_replace('/public \$fileExtension\s*=.*/', "public \$fileExtension = 'log';", $contents);

        file_put_contents($configPath, $contents);

        CLI::write('Logger threshold set to 9 (ALL LEVELS)', 'green');
        CLI::write('Writable logs enabled.', 'green');

        CLI::write('Next: php spark cache:clear', 'yellow');
    }
}