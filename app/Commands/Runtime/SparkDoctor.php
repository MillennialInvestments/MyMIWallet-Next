<?php
namespace App\Commands\Runtime;
// ---

// # 5️⃣ 🚑 Add `spark:doctor` command (pre-deploy health check)

// ### 📄 `app/Commands/Runtime/SparkDoctor.php`

// ```

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SparkDoctor extends SafeBaseCommand
{
    protected $group       = 'Runtime';
    protected $name        = 'spark:doctor';
    protected $description = 'Validate Spark command health and CI4 compatibility';
    protected $usage       = 'spark:doctor';

    public function run(array $params)
    {
        CLI::write('🧠 Spark Doctor running...', 'yellow');

        exec('php tools/spark_scan_commands.php', $output, $code);

        foreach ($output as $line) {
            CLI::write($line);
        }

        if ($code !== 0) {
            CLI::error('Spark Doctor failed. Fix issues before deploy.');
            return EXIT_ERROR;
        }

        CLI::write('✅ Spark layer is healthy.', 'green');
        return EXIT_SUCCESS;
    }
}
