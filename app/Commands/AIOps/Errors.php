<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class Errors extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:errors';
    protected $description = 'Run the AIOps error scan wrapper and delegate to logs:errors when available.';
    protected $usage = 'aiops:errors [--date=YYYY-MM-DD] [--limit=100]';

    protected $options = [
        '--date'  => 'Optional date to analyze, format YYYY-MM-DD.',
        '--limit' => 'Optional max number of error rows/items to inspect.',
    ];

    public function run(array $params)
    {
        $date = CLI::getOption('date');
        $limit = CLI::getOption('limit');

        CLI::write('Running AIOps error scan...', 'yellow');

        try {
            $commandString = 'logs:errors';

            if (! empty($date)) {
                $commandString .= ' --date=' . escapeshellarg((string) $date);
            }

            if (! empty($limit)) {
                $commandString .= ' --limit=' . (int) $limit;
            }

            if (function_exists('command')) {
                command($commandString);
            } else {
                CLI::write('Command helper unavailable. Falling back to direct runtime shell call.', 'yellow');

                $sparkBinary = rtrim(ROOTPATH, '/\\') . DIRECTORY_SEPARATOR . 'spark';
                if (! is_file($sparkBinary)) {
                    throw new \RuntimeException('Spark binary not found at project root.');
                }

                $shell = escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg($sparkBinary) . ' ' . $commandString;
                passthru($shell, $exitCode);

                if ((int) $exitCode !== 0) {
                    throw new \RuntimeException('Delegated logs:errors command failed with exit code ' . $exitCode);
                }
            }

            CLI::write('AIOps error scan completed.', 'green');

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            CLI::error('AIOps Errors command failed: ' . $e->getMessage());

            log_message('error', 'AIOps Errors command failed: {message}', [
                'message' => $e->getMessage(),
            ]);

            return EXIT_ERROR;
        }
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}