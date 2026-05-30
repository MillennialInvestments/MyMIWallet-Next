<?php

namespace App\Commands;

use App\Services\TbiProjectCoinService;
use CodeIgniter\CLI\CLI;

class CreateTbiProjectCoinDrafts extends SafeBaseCommand
{
    protected $group = 'Exchange';
    protected $name = 'exchange:create-tbi-project-coin-drafts';
    protected $description = 'Create or preview TBI Solutions Project, TBI Coin, and TBI Invest Coin draft records.';
    protected $options = [
        '--dry-run' => 'Preview changes without writing database records',
        '--apply' => 'Apply idempotent draft creation updates',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $apply = isset($flags['apply']);
        $dryRun = ! $apply;

        try {
            $results = (new TbiProjectCoinService())->createPhase03Drafts($dryRun);
            $error = null;
        } catch (\Throwable $e) {
            $results = [];
            $error = $e->getMessage();
        }

        $payload = [
            'generated_at' => date('c'),
            'mode' => $dryRun ? 'dry-run' : 'apply',
            'mainnet_minting' => 'blocked',
            'results' => $results,
            'error' => $error,
        ];
        $path = $this->writeReport('tbi-project-coin-drafts', $payload);

        CLI::write('TBI project coin drafts ' . ($dryRun ? 'previewed' : 'applied') . ': ' . count($results) . ' | ' . $path);
        return $error === null ? EXIT_SUCCESS : EXIT_ERROR;
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
