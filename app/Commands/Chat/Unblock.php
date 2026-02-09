<?php

declare(strict_types=1);

namespace App\Commands\Chat;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Unblock extends SafeBaseCommand
{
    protected $group = 'chat';
    protected $name = 'chat:unlock';
    protected $description = 'Safely clear stale chat runtime lock and pid files.';
    protected $usage = 'chat:unlock [--force] [--json]';

    protected $options = [
        '--force' => 'Also kill a running process if PID exists (dangerous).',
        '--json' => 'Output JSON payload.',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $runtime = ROOTPATH . 'chat/runtime';
        $pidFile = $runtime . '/chat.pid';
        $lockFile = $runtime . '/chat.lock';

        $force = $this->optBool($flags, 'force');
        $json = $this->optBool($flags, 'json');

        $result = [
            'ok' => true,
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

            if ($pid !== '' && ctype_digit($pid) && @posix_kill((int) $pid, 0)) {
                $result['pid_alive'] = true;

                if ($force) {
                    @posix_kill((int) $pid, SIGTERM);
                    $result['removed'][] = 'process:' . $pid;
                } else {
                    $result['ok'] = false;
                    $result['message'] = "Process {$pid} is still active; stop chat first or use --force.";
                }
            }

            if (! $result['pid_alive'] || $force) {
                @unlink($pidFile);
                $result['removed'][] = 'chat.pid';
            }
        }

        if (is_file($lockFile)) {
            @unlink($lockFile);
            $result['removed'][] = 'chat.lock';
        }

        log_message('info', '[spark:chat:unlock] completed', [
            'ok' => $result['ok'],
            'removed' => $result['removed'],
            'force' => $force,
        ]);

        CLI::write(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return $result['ok'] ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
