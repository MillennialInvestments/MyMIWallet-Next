<?php

namespace App\Commands\Health;

use App\Commands\SafeBaseCommand;
use App\Services\Triage\CommandRunner;
use CodeIgniter\CLI\CLI;

class Disk extends SafeBaseCommand
{
    protected string $group = 'health';
    protected string $name = 'health:disk';
    protected $description = 'Check disk and inode usage for the host.';

    public function run(array $params)
    {
        log_message('info', '[spark:health:disk] Started', ['params' => $params]);
        CLI::write('Running disk health checks...', 'yellow');

        $runner = new CommandRunner();
        $disk = $runner->run('df -h');
        $inodes = $runner->run('df -i');

        CLI::newLine();
        CLI::write('Disk usage (df -h)');
        CLI::write('----------------------------------------');
        foreach ($disk['output'] as $line) {
            CLI::write($line);
        }

        CLI::newLine();
        CLI::write('Inode usage (df -i)');
        CLI::write('----------------------------------------');
        foreach ($inodes['output'] as $line) {
            CLI::write($line);
        }

        $diskWarn = $this->hasThresholdExceeded($disk['output']);
        $inodeWarn = $this->hasThresholdExceeded($inodes['output']);
        $overall = ! $diskWarn && ! $inodeWarn;

        CLI::newLine();
        CLI::write('overall=' . ($overall ? 'PASS' : 'WARN'));

        log_message('info', '[spark:health:disk] Completed', [
            'disk_exit' => $disk['exit_code'],
            'inode_exit' => $inodes['exit_code'],
            'disk_warn' => $diskWarn,
            'inode_warn' => $inodeWarn,
        ]);

        return $overall ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    private function hasThresholdExceeded(array $lines): bool
    {
        foreach ($lines as $line) {
            if (! preg_match_all('/(\d+)%/', $line, $matches)) {
                continue;
            }

            foreach ($matches[1] as $percent) {
                if ((int) $percent > 90) {
                    return true;
                }
            }
        }

        return false;
    }
}
