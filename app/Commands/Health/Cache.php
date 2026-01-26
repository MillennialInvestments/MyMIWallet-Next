<?php

namespace App\Commands\Health;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Cache extends SafeBaseCommand
{
    protected string $group = 'health';
    protected string $name = 'health:cache';
    protected $description = 'Check CI4 writable cache directories for access.';

    public function run(array $params)
    {
        log_message('info', '[spark:health:cache] Started', ['params' => $params]);
        CLI::write('Running cache health checks...', 'yellow');

        $paths = [
            'cache' => WRITEPATH . 'cache',
            'debugbar' => WRITEPATH . 'debugbar',
            'session' => WRITEPATH . 'session',
        ];

        $overall = true;

        CLI::newLine();
        foreach ($paths as $label => $path) {
            $exists = is_dir($path);
            $writable = $exists && is_writable($path);
            $status = $exists && $writable ? 'OK' : 'FAIL';
            $overall = $overall && $exists && $writable;

            CLI::write(sprintf('%s=%s (%s)', $label, $status, $path));
        }

        CLI::newLine();
        CLI::write('overall=' . ($overall ? 'PASS' : 'FAIL'));

        log_message('info', '[spark:health:cache] Completed', [
            'overall' => $overall,
        ]);

        return $overall ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
