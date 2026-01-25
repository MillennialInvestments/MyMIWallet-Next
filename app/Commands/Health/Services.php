<?php

namespace App\Commands\Health;

use App\Commands\SafeBaseCommand;
use App\Services\Triage\CommandRunner;
use CodeIgniter\CLI\CLI;

class Services extends SafeBaseCommand
{
    protected $group = 'health';
    protected $name = 'health:services';
    protected $description = 'Check PHP-FPM service status and workers.';

    public function run(array $params)
    {
        log_message('info', '[spark:health:services] Started', ['params' => $params]);
        CLI::write('Running service health checks...', 'yellow');

        $runner = new CommandRunner();
        $systemctl = $runner->run('systemctl status php8.2-fpm');
        $ps = $runner->run('ps aux | grep php-fpm');

        CLI::newLine();
        CLI::write('systemctl status php8.2-fpm');
        CLI::write('----------------------------------------');
        foreach ($systemctl['output'] as $line) {
            CLI::write($line);
        }

        CLI::newLine();
        CLI::write('ps aux | grep php-fpm');
        CLI::write('----------------------------------------');
        foreach ($ps['output'] as $line) {
            CLI::write($line);
        }

        $workerCount = $this->countWorkers($ps['output']);
        $running = $systemctl['exit_code'] === 0;

        CLI::newLine();
        CLI::write('php_fpm_running=' . ($running ? 'true' : 'false'));
        CLI::write('php_fpm_workers=' . $workerCount);

        log_message('info', '[spark:health:services] Completed', [
            'php_fpm_running' => $running,
            'php_fpm_workers' => $workerCount,
            'systemctl_exit' => $systemctl['exit_code'],
        ]);

        return $running ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    private function countWorkers(array $lines): int
    {
        $count = 0;

        foreach ($lines as $line) {
            if (str_contains($line, 'php-fpm: pool') || str_contains($line, 'php-fpm: master process')) {
                $count++;
            }
        }

        return $count;
    }
}
