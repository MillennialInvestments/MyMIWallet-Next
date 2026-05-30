<?php

namespace App\Commands;

use App\Services\SolanaService;
use CodeIgniter\CLI\CLI;

class SolanaHealthcheck extends SafeBaseCommand
{
    protected $group = 'AIOps - Solana';
    protected $name = 'aiops:solana-healthcheck';
    protected $description = 'Write a non-fatal Solana RPC healthcheck report.';

    public function run(array $params)
    {
        $this->parseParams($params);
        $service = new SolanaService();
        $status = $service->getSafeNetworkStatus();
        if (! empty($status['degraded'])) {
            $service->notifyTeam('solana_rpc_outage', 'Solana RPC healthcheck is degraded.', ['status' => $status]);
        }

        $path = $this->writeReport('solana-healthcheck', [
            'generated_at' => date('c'),
            'network' => $service->resolveNetwork(),
            'status' => $status,
        ]);

        CLI::write('Solana healthcheck: ' . (($status['healthy'] ?? false) ? 'healthy' : 'degraded') . ' | ' . $path);
        return EXIT_SUCCESS;
    }

    private function writeReport(string $slug, array $payload): string
    {
        $dir = ROOTPATH . 'docs/_aiops/reports/solana-phase-03';
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
        $path = $dir . '/' . $slug . '-' . date('Ymd-His') . '.json';
        file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        return str_replace(ROOTPATH, '', $path);
    }
}
