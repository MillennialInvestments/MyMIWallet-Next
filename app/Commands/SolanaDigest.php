<?php

namespace App\Commands;

use App\Services\SolanaService;
use App\Services\TbiProjectCoinService;
use CodeIgniter\CLI\CLI;

class SolanaDigest extends SafeBaseCommand
{
    protected $group = 'AIOps - Solana';
    protected $name = 'aiops:solana-digest';
    protected $description = 'Write a Solana exchange readiness digest.';

    public function run(array $params)
    {
        $this->parseParams($params);
        $solana = new SolanaService();
        $coins = [];
        try {
            $coins = (new TbiProjectCoinService())->createPhase03Drafts(true);
        } catch (\Throwable $e) {
            $coins = [['error' => $e->getMessage()]];
        }

        $payload = [
            'generated_at' => date('c'),
            'network' => $solana->resolveNetwork(),
            'mainnet_minting_allowed' => $solana->isMainnetMintAllowed(false),
            'network_status' => $solana->getSafeNetworkStatus(),
            'draft_coin_plan' => $coins,
        ];
        $path = $this->writeReport('solana-digest', $payload);
        CLI::write('Solana digest written: ' . $path);
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
