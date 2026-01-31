<?php

namespace App\Commands\Runtime;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SparkFix extends SafeBaseCommand
{
    protected $group       = 'Runtime';
    protected $name        = 'spark:fix';
    protected $description = 'Auto-heal Spark command standards and generate a fix report';
    protected $usage       = 'spark:fix';

    public function run(array $params)
    {
        CLI::write('🔧 Running Spark fixer...', 'yellow');

        exec('php tools/spark_fix.php', $output, $code);

        foreach ($output as $line) {
            CLI::write($line);
        }

        if ($code !== 0) {
            CLI::error('Spark fixer failed.');
            return EXIT_ERROR;
        }

        CLI::write('✅ Spark fixer complete. Now run: php spark spark:doctor', 'green');
        return EXIT_SUCCESS;
    }
}
