<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class AiOpsServiceManager
{
    /** @var array<string, array<string, mixed>> */
    private array $serviceMap = [
        'n8n' => [
            'port' => 5678,
            'health_url' => 'http://127.0.0.1:5678/healthz',
            'pid_file' => ROOTPATH . 'aiops/runtime/n8n.pid',
            'start_command' => 'nohup n8n > aiops/runtime/n8n.log 2>&1 &',
        ],
    ];

    private string $mode;
    private string $baseUrl;
    private string $appKey;
    private string $sharedSecret;
    private int $requestTimeout;
    private bool $allowLocalRestart;

    public function __construct()
    {
        $this->mode = strtolower((string) env('AIOPS_MODE', 'remote'));
        $this->baseUrl = rtrim((string) env('AIOPS_BASE_URL', 'https://aiops.timothyburks.com'), '/');
        $this->appKey = (string) env('AIOPS_APP_KEY', 'mymiwallet');
        $this->sharedSecret = (string) env('AIOPS_SHARED_SECRET', '');
        $this->requestTimeout = max(1, (int) env('AIOPS_REQUEST_TIMEOUT', '30'));
        $this->allowLocalRestart = filter_var((string) env('AIOPS_ALLOW_LOCAL_RESTART', 'false'), FILTER_VALIDATE_BOOLEAN);
    }

    /** @return array<string, mixed> */
    public function ensureServiceRunning(string $serviceName): array
    {
        if ($this->mode === 'remote') {
            return $this->checkRemoteStatus($serviceName);
        }

        return $this->checkLocalStatus($serviceName);
    }

    /** @return array<string, mixed> */
    private function checkRemoteStatus(string $serviceName): array
    {
        $endpoint = $this->baseUrl . '/health';
        log_message('debug', '[aiops:status] resolved remote config', [
            'mode' => $this->mode,
            'base_url' => $this->baseUrl,
            'health_endpoint' => $endpoint,
            'app_key' => $this->appKey,
            'timeout' => $this->requestTimeout,
        ]);

        if ($this->baseUrl === '') {
            return [
                'service_name' => $serviceName,
                'status' => 'degraded',
                'mode' => 'remote',
                'health_status' => 'missing_base_url',
                'notes' => 'AIOPS_BASE_URL is empty',
                'remote_endpoint' => null,
                'port_listening' => null,
                'restarted' => false,
            ];
        }

        $request = $this->requestRemoteHealth($endpoint);
        if (($request['http_code'] ?? 0) === 404) {
            $endpoint = $this->baseUrl . '/status';
            $request = $this->requestRemoteHealth($endpoint);
        }

        log_message('debug', '[aiops:status] remote health response', [
            'endpoint' => $endpoint,
            'http_code' => $request['http_code'] ?? 0,
            'body' => $request['body'] ?? null,
            'decoded' => $request['decoded'] ?? null,
            'curl_error' => $request['error'] ?? null,
        ]);

        $decoded = is_array($request['decoded'] ?? null) ? $request['decoded'] : [];
        $healthy = ($request['http_code'] ?? 0) >= 200 && ($request['http_code'] ?? 0) < 300;

        return [
            'service_name' => $serviceName,
            'status' => $healthy ? 'running' : 'degraded',
            'mode' => 'remote',
            'pid' => null,
            'port' => null,
            'last_checked_at' => date('Y-m-d H:i:s'),
            'health_status' => $healthy ? 'healthy' : 'unhealthy',
            'notes' => json_encode([
                'http_code' => $request['http_code'] ?? 0,
                'remote_status' => $decoded['status'] ?? null,
                'remote_ok' => $decoded['ok'] ?? null,
                'curl_error' => $request['error'] ?? null,
            ], JSON_UNESCAPED_SLASHES),
            'port_listening' => null,
            'restarted' => false,
            'health_url' => $endpoint,
            'remote_endpoint' => $endpoint,
            'remote_response' => $decoded,
        ];
    }

    /** @return array<string, mixed> */
    private function checkLocalStatus(string $serviceName): array
    {
        $service = $this->serviceMap[$serviceName] ?? null;
        if ($service === null) {
            return ['service_name' => $serviceName, 'status' => 'unknown_service'];
        }

        $this->ensureRuntimeDir();

        $port = (int) ($service['port'] ?? 0);
        $pidFile = (string) ($service['pid_file'] ?? '');
        $lsofOutput = trim((string) shell_exec('lsof -i :' . $port . ' 2>&1'));
        $psOutput = trim((string) shell_exec('ps aux | grep n8n 2>&1'));

        $pid = $this->extractPidFromLsof($lsofOutput);
        if ($pid === null && is_file($pidFile)) {
            $pid = (int) trim((string) file_get_contents($pidFile));
        }

        $portListening = $lsofOutput !== '' && ! str_contains(strtolower($lsofOutput), 'not found');
        $wasRestarted = false;

        if (! $portListening && $this->allowLocalRestart) {
            shell_exec((string) $service['start_command']);
            $wasRestarted = true;
            sleep(3);
            $lsofOutput = trim((string) shell_exec('lsof -i :' . $port . ' 2>&1'));
            $portListening = $lsofOutput !== '' && ! str_contains(strtolower($lsofOutput), 'not found');
            $pid = $this->extractPidFromLsof($lsofOutput) ?? $pid;
            if ($pid !== null) {
                @file_put_contents($pidFile, (string) $pid);
            }
        }

        $health = $this->checkHealth((string) ($service['health_url'] ?? ''));
        $status = ($portListening && $health['status'] === 'healthy') ? 'running' : 'degraded';

        $record = [
            'service_name' => $serviceName,
            'status' => $status,
            'mode' => 'local',
            'pid' => $pid,
            'port' => $port,
            'last_checked_at' => date('Y-m-d H:i:s'),
            'health_status' => $health['status'],
            'notes' => json_encode([
                'restarted' => $wasRestarted,
                'lsof' => $this->short($lsofOutput),
                'ps' => $this->short($psOutput),
                'health' => $health,
            ], JSON_UNESCAPED_SLASHES),
        ];

        $this->upsertServiceRecord($record);
        $this->appendRuntimeLog($record);

        return $record + [
            'port_listening' => $portListening,
            'restarted' => $wasRestarted,
            'health_url' => $service['health_url'] ?? null,
            'remote_endpoint' => null,
            'remote_response' => null,
        ];
    }

    /** @return array{http_code:int, body:string|null, decoded:array<string,mixed>|null, error:string|null} */
    private function requestRemoteHealth(string $url): array
    {
        $timestamp = (string) time();
        $signature = '';
        if ($this->sharedSecret !== '') {
            $signature = hash_hmac('sha256', $this->appKey . '.' . $timestamp, $this->sharedSecret);
        }

        $headers = [
            'Accept: application/json',
            'X-App-Key: ' . $this->appKey,
            'X-App-Timestamp: ' . $timestamp,
            'X-App-Signature: ' . $signature,
        ];

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_TIMEOUT => $this->requestTimeout,
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

    /** @param array<string, mixed> $record */
    private function upsertServiceRecord(array $record): void
    {
        try {
            $db = db_connect();
            $existing = $db->table('bf_aiops_services')->where('service_name', (string) $record['service_name'])->get()->getRowArray();

            if ($existing !== null) {
                $db->table('bf_aiops_services')->where('id', (int) $existing['id'])->update($record);

                return;
            }

            $db->table('bf_aiops_services')->insert($record);
        } catch (\Throwable $e) {
            $this->appendRuntimeLog([
                'service_name' => (string) $record['service_name'],
                'status' => 'db_unavailable',
                'pid' => $record['pid'] ?? null,
                'port' => $record['port'] ?? null,
                'health_status' => 'unknown',
            ]);
        }
    }

    /** @return array{status: string, http_code: int} */
    private function checkHealth(string $url): array
    {
        if ($url === '') {
            return ['status' => 'unknown', 'http_code' => 0];
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_exec($ch);
        $httpCode = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        return [
            'status' => ($httpCode >= 200 && $httpCode < 300) ? 'healthy' : 'unhealthy',
            'http_code' => $httpCode,
        ];
    }

    private function extractPidFromLsof(string $output): ?int
    {
        if ($output === '') {
            return null;
        }

        $lines = preg_split('/\R/', trim($output)) ?: [];
        foreach ($lines as $index => $line) {
            if ($index === 0 || trim($line) === '') {
                continue;
            }

            $parts = preg_split('/\s+/', trim($line)) ?: [];
            if (isset($parts[1]) && ctype_digit($parts[1])) {
                return (int) $parts[1];
            }
        }

        return null;
    }

    private function ensureRuntimeDir(): void
    {
        $dir = ROOTPATH . 'aiops/runtime';
        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }
    }

    private function appendRuntimeLog(array $record): void
    {
        $dir = ROOTPATH . 'aiops/runtime';
        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $line = sprintf("[%s] %s status=%s pid=%s port=%s health=%s\n", date('c'), (string) $record['service_name'], (string) $record['status'], (string) ($record['pid'] ?? 'n/a'), (string) ($record['port'] ?? 'n/a'), (string) ($record['health_status'] ?? 'n/a'));
        @file_put_contents($dir . '/service-state.log', $line, FILE_APPEND);
    }

    private function short(string $text): string
    {
        return mb_substr($text, 0, 1000);
    }
}
