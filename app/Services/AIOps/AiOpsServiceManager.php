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

    /** @return array<string, mixed> */
    public function ensureServiceRunning(string $serviceName): array
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

        if (! $portListening) {
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
