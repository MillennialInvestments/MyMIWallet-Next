<?php

declare(strict_types=1);

namespace App\Services;

class SubSystemManager
{
    private array $map;
    private string $aiopsMode;
    private string $aiopsBaseUrl;
    private string $aiopsAppKey;
    private string $aiopsSharedSecret;
    private int $aiopsTimeout;
    private bool $allowRemoteServiceActions;

    public function __construct()
    {
        $chatPort = $this->resolveChatPort();
        $this->aiopsMode = strtolower((string) env('AIOPS_MODE', 'remote'));
        $this->aiopsBaseUrl = rtrim((string) env('AIOPS_BASE_URL', 'https://aiops.timothyburks.com'), '/');
        $this->aiopsAppKey = (string) env('AIOPS_APP_KEY', 'mymiwallet');
        $this->aiopsSharedSecret = (string) env('AIOPS_SHARED_SECRET', '');
        $this->aiopsTimeout = max(1, (int) env('AIOPS_REQUEST_TIMEOUT', '30'));
        $this->allowRemoteServiceActions = filter_var((string) env('AIOPS_ALLOW_REMOTE_SERVICE_ACTIONS', 'false'), FILTER_VALIDATE_BOOLEAN);

        $this->map = [
            'aiops.n8n' => [
                'root' => ROOTPATH . 'aiops',
                'runtime' => ROOTPATH . 'aiops/runtime',
                'service' => 'n8n',
                'port' => (int) (env('N8N_PORT') ?: 5678),
                'start' => ROOTPATH . 'aiops/bin/n8n-start-safe.sh',
                'stop' => ROOTPATH . 'aiops/bin/n8n-stop-safe.sh',
                'log' => ROOTPATH . 'aiops/runtime/n8n.log',
                'bridge_port' => (int) (env('BRIDGE_PORT') ?: 8500),
            ],
            'chat.app' => [
                'root' => ROOTPATH . 'chat',
                'runtime' => ROOTPATH . 'chat/runtime',
                'service' => 'chat',
                'port' => $chatPort,
                'start' => ROOTPATH . 'chat/bin/chat-start-safe.sh',
                'stop' => ROOTPATH . 'chat/bin/chat-stop-safe.sh',
                'log' => ROOTPATH . 'writable/logs/chat/chat.log',
                'error_log' => ROOTPATH . 'writable/logs/chat/chat-errors.log',
            ],
        ];
    }

    public function ensureRuntimeDirs(): void
    {
        foreach ($this->map as $cfg) {
            @mkdir($cfg['runtime'], 0775, true);
        }

        @mkdir(ROOTPATH . 'writable/logs/chat', 0775, true);
    }

    public function status(string $service): array
    {
        if ($service === 'aiops.n8n' && $this->aiopsMode === 'remote') {
            return $this->remoteAiopsStatus($service);
        }

        $cfg = $this->cfg($service);
        $pidFile = $this->pidFile($cfg);
        $pid = is_file($pidFile) ? (int) trim((string) file_get_contents($pidFile)) : null;
        $running = $pid ? $this->isPidAlive($pid) : false;
        $port = (int) $cfg['port'];
        $portListening = $this->isPortListening($port);

        $bridgePort = (int) ($cfg['bridge_port'] ?? 0);
        $bridgeOwner = $bridgePort > 0 ? $this->portOwner($bridgePort) : ['owner' => 'none', 'pid' => null, 'args' => null];

        $issues = [];
        if ($pid !== null && ! $running) {
            $issues[] = 'pid_file_present_but_process_dead';
        }
        if ($running && ! $portListening) {
            $issues[] = 'process_alive_but_port_not_listening';
        }
        if (! $running && $portListening) {
            $issues[] = 'port_listening_without_pid';
        }

        $status = [
            'service' => $service,
            'mode' => 'local',
            'pid' => $pid,
            'pid_file' => $pidFile,
            'running' => $running,
            'port' => $port,
            'port_listening' => $portListening,
            'healthy' => $running && $portListening,
            'issues' => $issues,
            'bridge_port' => $bridgePort > 0 ? $bridgePort : null,
            'bridge_port_owner' => $bridgeOwner,
            'runtime_dir' => $cfg['runtime'],
            'log_file' => $cfg['log'],
            'error_log_file' => $cfg['error_log'] ?? null,
            'status' => empty($issues) ? (($running && $portListening) ? 'running' : 'stopped') : 'degraded',
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

    public function tailLogs(string $service, int $lines = 200, bool $json = false, ?string $since = null): array
    {
        $cfg = $this->cfg($service);
        $files = array_values(array_filter([$cfg['log'] ?? null, $cfg['error_log'] ?? null], static fn($p) => is_string($p) && $p !== ''));

        $bundle = [];
        foreach ($files as $file) {
            if (! is_file($file)) {
                $bundle[] = ['file' => $file, 'missing' => true, 'lines' => []];
                continue;
            }

            $content = file($file, FILE_IGNORE_NEW_LINES) ?: [];
            if ($since !== null && $since !== '') {
                $content = $this->filterBySince($content, $since);
            }

            $bundle[] = [
                'file' => $file,
                'missing' => false,
                'lines' => array_slice($content, -1 * max(1, $lines)),
            ];
        }

        $flatLines = [];
        foreach ($bundle as $entry) {
            foreach ($entry['lines'] as $line) {
                $flatLines[] = '[' . basename($entry['file']) . '] ' . $line;
            }
        }

        return [
            'ok' => !empty($flatLines) || !empty($bundle),
            'service' => $service,
            'since' => $since,
            'log_files' => $files,
            'sources' => $bundle,
            'lines' => $json ? [] : $flatLines,
        ];
    }

    /** @return array<string, mixed> */
    private function remoteAiopsStatus(string $service): array
    {
        $endpoint = $this->aiopsBaseUrl . '/health';
        log_message('debug', '[subsystems] remote aiops status config', [
            'mode' => $this->aiopsMode,
            'base_url' => $this->aiopsBaseUrl,
            'health_endpoint' => $endpoint,
            'app_key' => $this->aiopsAppKey,
            'timeout' => $this->aiopsTimeout,
        ]);

        if ($this->aiopsBaseUrl === '') {
            return [
                'service' => $service,
                'mode' => 'remote',
                'status' => 'degraded',
                'healthy' => false,
                'issues' => ['missing_base_url'],
                'remote_endpoint' => null,
                'checked_at' => date('c'),
            ];
        }

        $response = $this->remoteHealthRequest($endpoint);
        if (($response['http_code'] ?? 0) === 404) {
            $endpoint = $this->aiopsBaseUrl . '/status';
            $response = $this->remoteHealthRequest($endpoint);
        }

        $decoded = is_array($response['decoded'] ?? null) ? $response['decoded'] : [];
        $healthy = ($response['http_code'] ?? 0) >= 200 && ($response['http_code'] ?? 0) < 300;

        log_message('debug', '[subsystems] remote aiops health response', [
            'endpoint' => $endpoint,
            'http_code' => $response['http_code'] ?? 0,
            'body' => $response['body'] ?? null,
            'decoded' => $decoded,
            'curl_error' => $response['error'] ?? null,
        ]);

        return [
            'service' => $service,
            'mode' => 'remote',
            'pid' => null,
            'pid_file' => null,
            'running' => $healthy,
            'port' => null,
            'port_listening' => null,
            'healthy' => $healthy,
            'issues' => $healthy ? [] : ['remote_healthcheck_failed'],
            'bridge_port' => null,
            'bridge_port_owner' => null,
            'runtime_dir' => null,
            'log_file' => null,
            'error_log_file' => null,
            'status' => $healthy ? 'running' : 'degraded',
            'checked_at' => date('c'),
            'remote_endpoint' => $endpoint,
            'remote_http_code' => $response['http_code'] ?? 0,
            'remote_response' => $decoded,
        ];
    }

    /** @return array{http_code:int, body:string|null, decoded:array<string,mixed>|null, error:string|null} */
    private function remoteHealthRequest(string $url): array
    {
        $timestamp = (string) time();
        $signature = '';
        if ($this->aiopsSharedSecret !== '') {
            $signature = hash_hmac('sha256', $this->aiopsAppKey . '.' . $timestamp, $this->aiopsSharedSecret);
        }

        $headers = [
            'Accept: application/json',
            'X-App-Key: ' . $this->aiopsAppKey,
            'X-App-Timestamp: ' . $timestamp,
            'X-App-Signature: ' . $signature,
        ];

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_TIMEOUT => $this->aiopsTimeout,
        ]);

        $body = curl_exec($ch);
        $error = $body === false ? curl_error($ch) : null;
        $httpCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $decoded = null;
        if (is_string($body) && $body !== '') {
            $parsed = json_decode($body, true);
            if (is_array($parsed)) {
                $decoded = $parsed;
            }
        }

        return [
            'http_code' => $httpCode,
            'body' => is_string($body) ? $body : null,
            'decoded' => $decoded,
            'error' => $error,
        ];
    }

    private function filterBySince(array $lines, string $since): array
    {
        $seconds = $this->parseSinceToSeconds($since);
        if ($seconds <= 0) {
            return $lines;
        }

        $threshold = time() - $seconds;
        return array_values(array_filter($lines, static function (string $line) use ($threshold): bool {
            if (preg_match('/\[(\d{4}-\d{2}-\d{2}T[^\]]+)\]/', $line, $m) !== 1) {
                return true;
            }

            $ts = strtotime($m[1]);
            if ($ts === false) {
                return true;
            }

            return $ts >= $threshold;
        }));
    }

    private function parseSinceToSeconds(string $since): int
    {
        $clean = trim(strtolower($since));
        if ($clean === '') {
            return 0;
        }

        if (preg_match('/^(\d+)\s*([smhd])$/', $clean, $m) !== 1) {
            return 0;
        }

        $value = (int) $m[1];
        return match ($m[2]) {
            's' => $value,
            'm' => $value * 60,
            'h' => $value * 3600,
            'd' => $value * 86400,
            default => 0,
        };
    }

    private function executeAction(string $service, string $action, bool $dryRun): array
    {
        $cfg = $this->cfg($service);

        if ($service === 'aiops.n8n' && $this->aiopsMode === 'remote' && ! $this->allowRemoteServiceActions) {
            return [
                'ok' => false,
                'action' => $action,
                'service' => $service,
                'message' => 'AIOPS_MODE=remote: local lifecycle actions are disabled unless AIOPS_ALLOW_REMOTE_SERVICE_ACTIONS=true',
            ];
        }
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

    private function resolveChatPort(): int
    {
        $envPath = ROOTPATH . 'chat/.env';
        if (is_file($envPath)) {
            $lines = file($envPath, FILE_IGNORE_NEW_LINES) ?: [];
            foreach ($lines as $line) {
                $line = trim($line);
                if ($line === '' || str_starts_with($line, '#')) {
                    continue;
                }
                if (preg_match('/^PORT\s*=\s*(\d+)/', $line, $m) === 1) {
                    return (int) $m[1];
                }
            }
        }

        return 8300;
    }

    private function pidFile(array $cfg): string
    {
        return $cfg['runtime'] . '/' . $cfg['service'] . '.pid';
    }

    private function lockFile(array $cfg): string
    {
        return $cfg['runtime'] . '/' . $cfg['service'] . '.lock';
    }

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
        if ($pid <= 1) {
            return false;
        }

        $out = shell_exec('kill -0 ' . (int) $pid . ' >/dev/null 2>&1; echo $?');

        return trim((string) $out) === '0';
    }

    public function isPortOccupied(int $port): array
    {
        return $this->portOwner($port);
    }

    public function portOwner(int $port): array
    {
        $port = (int) $port;
        if ($port <= 0) {
            return ['owner' => 'invalid', 'pid' => null, 'args' => null, 'port' => $port];
        }

        $cmd = 'lsof -nP -iTCP:' . $port . ' -sTCP:LISTEN -Fp 2>/dev/null';
        $raw = trim((string) shell_exec($cmd));
        if ($raw === '') {
            return ['owner' => 'none', 'pid' => null, 'args' => null, 'port' => $port];
        }

        $pid = null;
        foreach (preg_split('/\R/', $raw) ?: [] as $line) {
            if (str_starts_with($line, 'p')) {
                $pid = (int) substr($line, 1);
                break;
            }
        }

        if ($pid === null || $pid <= 1) {
            return ['owner' => 'unknown', 'pid' => null, 'args' => null, 'port' => $port];
        }

        $args = trim((string) shell_exec('ps -p ' . $pid . ' -o args= 2>/dev/null'));
        $owner = 'unknown';
        if ($args !== '') {
            if (preg_match('/bridge-8500\.js/i', $args)) {
                $owner = 'bridge';
            } elseif (preg_match('/(?:^|\/)n8n(?:\.js)?(?:\s|$)|\bn8n\b/i', $args)) {
                $owner = 'n8n';
            } elseif (preg_match('/chat\/server\.js|node\s+server\.js/i', $args)) {
                $owner = 'chat';
            }
        }

        return ['owner' => $owner, 'pid' => $pid, 'args' => $args ?: null, 'port' => $port];
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
