<?php

namespace App\Commands;

use App\Services\TbiProjectCoinService;
use CodeIgniter\CLI\CLI;

class SolanaTransactionAudit extends SafeBaseCommand
{
    protected $group = 'AIOps - Solana';
    protected $name = 'aiops:solana-transaction-audit';
    protected $description = 'Audit TBI project coin transaction lifecycle visibility.';
    protected $options = [
        '--user-id' => 'Filter by user ID',
        '--wallet' => 'Filter by wallet address (reserved for support handoff)',
        '--signature' => 'Filter by transaction signature/reference',
        '--mint-address' => 'Filter by mint address',
        '--status' => 'Filter by lifecycle status',
        '--date-from' => 'Start date YYYY-MM-DD',
        '--date-to' => 'End date YYYY-MM-DD',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $filters = [
            'user_id' => $flags['user-id'] ?? null,
            'wallet' => $flags['wallet'] ?? null,
            'signature' => $flags['signature'] ?? null,
            'mint_address' => $flags['mint-address'] ?? null,
            'status' => $flags['status'] ?? null,
            'date_from' => $flags['date-from'] ?? null,
            'date_to' => $flags['date-to'] ?? null,
            'limit' => 100,
        ];

        try {
            $rows = (new TbiProjectCoinService())->auditTransactions(array_filter($filters, static fn ($v) => $v !== null && $v !== ''));
            $error = null;
        } catch (\Throwable $e) {
            $rows = [];
            $error = $e->getMessage();
        }

        $payload = ['generated_at' => date('c'), 'filters' => $filters, 'count' => count($rows), 'rows' => $rows, 'error' => $error];
        $path = $this->writeReport('solana-transaction-audit', $payload);
        CLI::write('Solana transaction audit rows: ' . count($rows) . ' | ' . $path);
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
