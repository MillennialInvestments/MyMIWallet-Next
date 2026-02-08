<?php

declare(strict_types=1);

namespace App\Commands\Chat;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Unlock extends SafeBaseCommand
{
    protected $group = 'chat';
    protected $name = 'chat:unlock';
    protected $description = 'Safely clear stale chat runtime lock and pid files.';
    protected $usage = 'chat:unlock [--force]';

    protected $options = [
        '--force' => 'Also kill running process if pid exists (DANGEROUS).',
    ];

    public function run(array $params)
    {
        $runtime = ROOTPATH . 'chat/runtime';
        $pidFile = $runtime . '/chat.pid';
        $lockFile = $runtime . '/chat.lock';

        $force = $this->options['force'] ?? false;

        $result = [
            'action' => 'unlock',
            'runtime' => $runtime,
            'pid_file' => $pidFile,
            'lock_file' => $lockFile,
            'pid' => null,
            'pid_alive' => false,
            'removed' => [],
        ];

        if (is_file($pidFile)) {
            $pid = trim((string) file_get_contents($pidFile));
            $result['pid'] = $pid;

            if ($pid !== '' && ctype_digit($pid) && posix_kill((int) $pid, 0)) {
                $result['pid_alive'] = true;

                if ($force) {
                    posix_kill((int) $pid, SIGTERM);
                    $result['removed'][] = 'process:' . $pid;
                } else {
                    CLI::write("Process $pid is alive. Use --force to terminate.", 'yellow');
                }
            }

            if (!$result['pid_alive'] || $force) {
                unlink($pidFile);
                $result['removed'][] = 'pid_file';
            }
        }

        if (is_file($lockFile)) {
            unlink($lockFile);
            $result['removed'][] = 'lock_file';
        }

        CLI::write(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}
