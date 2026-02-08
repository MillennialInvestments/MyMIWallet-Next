<?php

declare(strict_types=1);

namespace App\Services;

class SubSystemManager
{
    private array $map;

    public function __construct()
    {
        $this->map = [
            'aiops.n8n' => [
                'root' => ROOTPATH . 'aiops',
                'runtime' => ROOTPATH . 'aiops/runtime',
                'service' => 'n8n',
                'port' => (int) (getenv('N8N_PORT') ?: 5678),
                'start' => ROOTPATH . 'aiops/bin/n8n-start-safe.sh',
                'stop' => ROOTPATH . 'aiops/bin/n8n-stop-safe.sh',
                'log' => ROOTPATH . 'aiops/runtime/n8n.log',
            ],
            'chat.app' => [
                'root' => ROOTPATH . 'chat',
                'runtime' => ROOTPATH . 'chat/runtime',
                'service' => 'chat',
                'port' => (int) (getenv('CHAT_PORT') ?: getenv('PORT') ?: 8300),
                'start' => ROOTPATH . 'chat/bin/chat-start-safe.sh',
                'stop' => ROOTPATH . 'chat/bin/chat-stop-safe.sh',
                'log' => ROOTPATH . 'chat/runtime/chat.log',
            ],
        ];
    }

    public function ensureRuntimeDirs(): void
    {
        foreach ($this->map as $cfg) {
            @mkdir($cfg['runtime'], 0775, true);
        }
    }

    public function status(string $service): array
    {
        $cfg = $this->cfg($service);
        $pidFile = $this->pidFile($cfg);
        $pid = is_file($pidFile) ? (int) trim((string) file_get_contents($pidFile)) : null;
        $running = $pid ? $this->isPidAlive($pid) : false;
        $port = $cfg['port'];
        $portListening = $this->isPortListening($port);
        $status = [
            'service' => $service,
            'pid' => $pid,
            'pid_file' => $pidFile,
            'running' => $running,
            'port' => $port,
            'port_listening' => $portListening,
            'runtime_dir' => $cfg['runtime'],
            'log_file' => $cfg['log'],
            'status' => ($running || $portListening) ? 'running' : 'stopped',
            'checked_at' => date('c'),
        ];

        $this->writeStatus($cfg, $status);

        return $status;
    }

    public function start(string $service, bool $dryRun = false): array
    {
        return $this->executeAction($service, 'start', $dryRun);
    }

    public function stop(string $service, bool $dryRun = false): array
    {
        return $this->executeAction($service, 'stop', $dryRun);
    }

    public function restart(string $service, bool $dryRun = false): array
    {
        $first = $this->stop($service, $dryRun);
        $second = $this->start($service, $dryRun);
        return ['action' => 'restart', 'stop' => $first, 'start' => $second, 'ok' => (bool) ($second['ok'] ?? false)];
    }

    public function tailLogs(string $service, int $lines = 200): array
    {
        $cfg = $this->cfg($service);
        $file = $cfg['log'];
        if (!is_file($file)) {
            return ['ok' => false, 'message' => 'Log file missing', 'log_file' => $file, 'lines' => []];
        }
        $content = file($file, FILE_IGNORE_NEW_LINES) ?: [];
        return ['ok' => true, 'log_file' => $file, 'lines' => array_slice($content, -1 * max(1, $lines))];
    }

    private function executeAction(string $service, string $action, bool $dryRun): array
    {
        $cfg = $this->cfg($service);
        $lock = $this->lockFile($cfg);
        if ($this->isFreshLock($lock, 120)) {
            return ['ok' => false, 'message' => 'Action already in progress', 'lock_file' => $lock, 'action' => $action];
        }
        @file_put_contents($lock, (string) getmypid());

        try {
            if ($dryRun) {
                return ['ok' => true, 'dry_run' => true, 'action' => $action, 'command' => $cfg[$action] ?? null];
            }

            $script = $cfg[$action] ?? null;
            if (!is_string($script) || !is_file($script)) {
                return ['ok' => false, 'message' => 'Action script missing', 'action' => $action, 'service' => $service];
            }

            $res = $this->runCommand('bash ' . escapeshellarg($script), $cfg['root']);
            $status = $this->status($service);

            return ['ok' => ($res['code'] === 0), 'action' => $action, 'exec' => $res, 'status' => $status];
        } finally {
            @unlink($lock);
        }
    }

    private function runCommand(string $command, string $cwd): array
    {
        $spec = [1 => ['pipe', 'w'], 2 => ['pipe', 'w']];
        $proc = proc_open($command, $spec, $pipes, $cwd);
        if (!is_resource($proc)) {
            return ['code' => 1, 'stdout' => '', 'stderr' => 'proc_open failed'];
        }
        stream_set_timeout($pipes[1], 20);
        stream_set_timeout($pipes[2], 20);
        $stdout = stream_get_contents($pipes[1]) ?: '';
        $stderr = stream_get_contents($pipes[2]) ?: '';
        fclose($pipes[1]);
        fclose($pipes[2]);
        $code = proc_close($proc);
        return ['code' => $code, 'stdout' => trim($stdout), 'stderr' => trim($stderr), 'command' => $command];
    }

    private function cfg(string $service): array
    {
        if (!isset($this->map[$service])) {
            throw new \InvalidArgumentException('Unknown service: ' . $service);
        }
        return $this->map[$service];
    }

    private function pidFile(array $cfg): string { return $cfg['runtime'] . '/' . $cfg['service'] . '.pid'; }
    private function lockFile(array $cfg): string { return $cfg['runtime'] . '/' . $cfg['service'] . '.lock'; }

    private function writeStatus(array $cfg, array $status): void
    {
        @file_put_contents($cfg['runtime'] . '/' . $cfg['service'] . '.status.json', json_encode($status, JSON_PRETTY_PRINT));
    }

    private function isFreshLock(string $file, int $seconds): bool
    {
        return is_file($file) && (time() - (int) filemtime($file)) < $seconds;
    }

    private function isPidAlive(int $pid): bool
    {
        if ($pid <= 1) return false;
        $out = shell_exec('kill -0 ' . (int) $pid . ' >/dev/null 2>&1; echo $?');
        return trim((string) $out) === '0';
    }

    public function isPortListening(int $port): bool
    {
        $fp = @fsockopen('127.0.0.1', $port, $errno, $errstr, 0.4);
        if ($fp) {
            fclose($fp);
            return true;
        }
        return false;
    }

    public function services(): array
    {
        return array_keys($this->map);
    }
}
