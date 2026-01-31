<?php

namespace App\Commands\Runtime;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SparkDoctor extends SafeBaseCommand
{
    protected $group       = 'runtime';
    protected $name        = 'runtime:spark-doctor';
    protected $description = 'Validate Spark command discovery and CI4 compatibility';
    protected $usage       = 'runtime:spark-doctor';

    public function run(array $params)
    {
        CLI::write('🧠 Spark Doctor running...', 'yellow');

        $script = ROOTPATH . 'tools/spark_scan_commands.php';

        if (! is_file($script)) {
            CLI::error('Spark audit script not found: ' . $script);
            return EXIT_ERROR;
        }

        CLI::write('🔍 Running Spark command audit...', 'cyan');

        exec('php ' . escapeshellarg($script), $scanOutput, $scanCode);


        foreach ($scanOutput as $line) {
            CLI::write($line);
        }

        $cmdCount = 0;
        exec(PHP_BINARY . ' spark list', $listOutput, $listCode);

        if ($listCode === 0) {
            foreach ($listOutput as $line) {
                if (preg_match('/^\s+[a-zA-Z].+\s+[a-z0-9:_-]+$/', $line)) {
                    $cmdCount++;
                }
            }
        }

        $invalidFiles = [];
        foreach ($scanOutput as $line) {
            if (str_starts_with(trim($line), '- ') && str_contains($line, '/app/Commands/')) {
                $invalidFiles[] = substr(trim($line), 2);
            }
        }

        $status = $scanCode === 0 ? 'ok' : 'fail';

        try {
            (new \App\Models\Ops\SparkHealthModel())->insert([
                'hostname'           => gethostname() ?: null,
                'app_env'            => getenv('CI_ENVIRONMENT') ?: null,
                'php_version'        => PHP_VERSION,
                'ci_version'         => defined('CodeIgniter\\CodeIgniter::VERSION')
                    ? \CodeIgniter\CodeIgniter::VERSION
                    : null,
                'status'             => $status,
                'command_count'      => $cmdCount,
                'invalid_count'      => count($invalidFiles),
                'invalid_files_json' => $invalidFiles ? json_encode($invalidFiles) : null,
                'notes'              => $status === 'ok'
                    ? 'Spark Doctor passed'
                    : 'Spark Doctor failed',
            ]);
        } catch (\Throwable $e) {
            CLI::error('DB snapshot failed: ' . $e->getMessage());
        }

        if ($scanCode !== 0) {
            CLI::error('Spark Doctor FAILED.');
            return EXIT_ERROR;
        }

        CLI::write('✅ Spark layer is healthy.', 'green');
        return EXIT_SUCCESS;
    }
}
