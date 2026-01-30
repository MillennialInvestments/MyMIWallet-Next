<?php

namespace App\Commands\Runtime;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SparkDoctor extends SafeBaseCommand
{
    protected $group       = 'Runtime';
    protected $name        = 'spark:doctor';
    protected $description = 'Validate Spark command discovery and CI4 compatibility';
    protected $usage       = 'spark:doctor';

    public function run(array $params)
    {
        CLI::write('🧠 Spark Doctor running...', 'yellow');

        exec('php tools/spark_scan_commands.php', $output, $code);

        foreach ($output as $line) {
            CLI::write($line);
        }

        if ($code !== 0) {
            service('discord')->send(
                '🚨 Spark Doctor FAILED on ' . gethostname()
            );

            service('email')->send(
                'support@mymiwallet.com',
                'Spark Doctor Failure',
                implode("\n", $output)
            );

            CLI::error('Spark Doctor FAILED. Fix Spark commands before deploy.');
            return EXIT_ERROR;
        }

        CLI::write('✅ Spark layer is healthy.', 'green');
        return EXIT_SUCCESS;
    }
}
