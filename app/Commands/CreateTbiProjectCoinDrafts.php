<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class CreateTbiProjectCoinDrafts extends BaseCommand
{
    protected $group = 'Exchange';
    protected $name = 'exchange:create-tbi-project-coin-drafts';
    protected $description = 'Create or update draft/devnet TBI project coin records without minting or broadcasting.';
    protected $usage = 'exchange:create-tbi-project-coin-drafts [--dry-run] [--apply]';
    protected $options = ['--dry-run' => 'Preview only.', '--apply' => 'Apply idempotent draft rows.'];

    public function run(array $params)
    {
        $apply = in_array('--apply', $params, true) || isset($params['apply']);
        $dryRun = ! $apply || in_array('--dry-run', $params, true) || isset($params['dry-run']);
        if ($apply && (in_array('--dry-run', $params, true) || isset($params['dry-run']))) {
            $dryRun = true;
            $apply = false;
        }

        $timestamp = date('Ymd-His');
        $reportDir = ROOTPATH . 'docs/_aiops/reports/solana-phase-03b';
        if (! is_dir($reportDir)) {
            mkdir($reportDir, 0775, true);
        }

        $drafts = $this->draftDefinitions();
        $actions = [];
        $errors = [];
        $warnings = [];

        try {
            $db = \Config\Database::connect();
            if (! $db->tableExists('bf_tbi_project_coins')) {
                throw new \RuntimeException('Table bf_tbi_project_coins is missing. Run migration 2026-05-27-000100 first.');
            }

            $projectId = $this->resolveTbiSolutionsProjectId($db, $dryRun);
            foreach ($drafts as $draft) {
                $payload = $draft;
                $payload['project_id'] = $projectId;
                $payload['metadata_json'] = json_encode([
                    'network' => 'devnet',
                    'minting_enabled' => false,
                    'broadcast_enabled' => false,
                    'created_by' => 1,
                    'draft_created_by_command' => $this->name,
                    'security_note' => 'Draft only. No mainnet minting or transaction broadcast performed.',
                ]);

                $existing = $db->table('bf_tbi_project_coins')->where('coin_key', $payload['coin_key'])->get()->getRowArray();
                if ($existing) {
                    $actions[] = ['coin_key' => $payload['coin_key'], 'action' => 'update', 'id' => $existing['id'] ?? null];
                    if (! $dryRun) {
                        $db->table('bf_tbi_project_coins')->where('id', $existing['id'])->update($payload);
                    }
                    continue;
                }

                $actions[] = ['coin_key' => $payload['coin_key'], 'action' => 'insert', 'id' => null];
                if (! $dryRun) {
                    $db->table('bf_tbi_project_coins')->insert($payload);
                }
            }
        } catch (\Throwable $e) {
            if ($dryRun) {
                $warnings[] = 'Database unavailable for dry-run inspection: ' . $e->getMessage();
                foreach ($drafts as $draft) {
                    $actions[] = ['coin_key' => $draft['coin_key'], 'action' => 'would-upsert', 'id' => null];
                }
            } else {
                $errors[] = $e->getMessage();
            }
        }

        $report = [
            '# TBI Project Coin Draft Creation',
            '',
            '- Generated: ' . date('c'),
            '- Mode: ' . ($dryRun ? 'dry-run' : 'apply'),
            '- Mainnet minting: not performed',
            '- Mainnet broadcast: not performed',
            '- Warnings: ' . (empty($warnings) ? 'none' : implode('; ', $warnings)),
            '- Errors: ' . (empty($errors) ? 'none' : implode('; ', $errors)),
            '',
            '## Actions',
        ];
        foreach ($actions as $action) {
            $report[] = '- ' . $action['action'] . ': ' . $action['coin_key'] . ($action['id'] ? ' (id ' . $action['id'] . ')' : '');
        }
        $reportPath = $reportDir . '/tbi-project-coin-drafts-' . $timestamp . '.md';
        file_put_contents($reportPath, implode(PHP_EOL, $report) . PHP_EOL);

        CLI::write(sprintf('TBI drafts: mode=%s actions=%d warnings=%d errors=%d report=%s', $dryRun ? 'dry-run' : 'apply', count($actions), count($warnings), count($errors), str_replace(ROOTPATH, '', $reportPath)), empty($errors) ? (empty($warnings) ? 'green' : 'yellow') : 'red');
        return empty($errors) ? EXIT_SUCCESS : EXIT_ERROR;
    }

    private function resolveTbiSolutionsProjectId($db, bool $dryRun): int
    {
        if (! $db->tableExists('bf_projects')) {
            return 1;
        }

        $fields = $db->getFieldNames('bf_projects');
        $titleColumn = in_array('title', $fields, true) ? 'title' : (in_array('name', $fields, true) ? 'name' : null);
        if ($titleColumn === null) {
            return 1;
        }

        $existing = $db->table('bf_projects')->where($titleColumn, 'TBI Solutions Project')->get()->getRowArray();
        if ($existing && isset($existing['id'])) {
            return (int) $existing['id'];
        }

        if ($dryRun) {
            return 1;
        }

        $payload = [$titleColumn => 'TBI Solutions Project'];
        if (in_array('user_id', $fields, true)) {
            $payload['user_id'] = 1;
        }
        if (in_array('created_by', $fields, true)) {
            $payload['created_by'] = 1;
        }
        if (in_array('status', $fields, true)) {
            $payload['status'] = 'draft';
        }
        if (in_array('created_at', $fields, true)) {
            $payload['created_at'] = date('Y-m-d H:i:s');
        }
        if (in_array('updated_at', $fields, true)) {
            $payload['updated_at'] = date('Y-m-d H:i:s');
        }
        $db->table('bf_projects')->insert($payload);
        return (int) $db->insertID();
    }

    private function draftDefinitions(): array
    {
        return [
            ['coin_key' => 'tbi_coin', 'coin_name' => 'TBI Coin', 'symbol' => 'TBI', 'coin_type' => 'utility', 'unit_value_usd' => '1.000000', 'solana_mint_address' => null, 'exchange_asset_id' => null, 'project_exchange_symbol' => 'TBI-DEV', 'primary_issuance_enabled' => 0, 'secondary_trading_enabled' => 0, 'compliance_required' => 0, 'status' => 'draft'],
            ['coin_key' => 'tbi_invest_coin', 'coin_name' => 'TBI Invest Coin', 'symbol' => 'TBIINV', 'coin_type' => 'investment', 'unit_value_usd' => '1.000000', 'solana_mint_address' => null, 'exchange_asset_id' => null, 'project_exchange_symbol' => 'TBIINV-DEV', 'primary_issuance_enabled' => 0, 'secondary_trading_enabled' => 0, 'compliance_required' => 1, 'status' => 'draft'],
        ];
    }
}
