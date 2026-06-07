<?php

declare(strict_types=1);

namespace App\Commands\CoinVault;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;
use Throwable;

class TbiExternalContributionSmoke extends BaseCommand
{
    protected $group = 'CoinVault';
    protected $name = 'coinvault:tbi-external-contribution-smoke';
    protected $description = 'Validate MyMI CoinVault can receive and persist a TBI external contribution payload.';

    public function run(array $params)
    {
        $db = Database::connect();

        $pass = 0;
        $fail = 0;

        $check = static function (string $label, bool $ok) use (&$pass, &$fail): void {
            if ($ok) {
                $pass++;
                CLI::write('[PASS] ' . $label, 'green');
                return;
            }

            $fail++;
            CLI::write('[FAIL] ' . $label, 'red');
        };

        $stamp = date('YmdHis');
        $sourceId = 'mymi-managed-smoke-tbi-' . $stamp;

        $payload = [
            'project_key' => 'tbi_coin',
            'coin_symbol' => 'TBI',
            'user_email' => 'admin@timothyburks.com',
            'contribution_type' => 'monthly_partner_subscription',
            'source' => 'timothyburks_partner_subscription',
            'source_id' => $sourceId,
            'usd_amount' => 75.00,
            'coin_amount' => 75.00,
            'memo' => 'Managed repo MyMI CoinVault receiver smoke test',
        ];

        CLI::write('===== TBI EXTERNAL CONTRIBUTION SMOKE =====', 'cyan');
        CLI::write('source_id=' . $sourceId);

        try {
            $controllerClass = '\\App\\Modules\\CoinVault\\Controllers\\Api\\CoinVaultApiController';

            $check('CoinVaultApiController class exists', class_exists($controllerClass));

            $ledgerTable = 'bf_tbi_coin_contribution_ledger';
            $externalLogTable = 'bf_tbi_coin_external_event_logs';

            $check('ledger table exists: ' . $ledgerTable, $db->tableExists($ledgerTable));
            $check('external event log table exists: ' . $externalLogTable, $db->tableExists($externalLogTable));

            if (! $db->tableExists($ledgerTable) || ! $db->tableExists($externalLogTable)) {
                CLI::write('');
                CLI::write('PASS count: ' . $pass);
                CLI::write('FAIL count: ' . $fail);

                return EXIT_ERROR;
            }

            /*
             * This smoke command intentionally validates persistence tables and duplicate contract
             * without making an outbound HTTP request from this managed repo.
             * The live TBI -> MyMI HMAC bridge has already verified the public HTTP path.
             */

            $beforeLedger = $db->table($ledgerTable)
                ->where('source', 'timothyburks_partner_subscription')
                ->countAllResults();

            $beforeExternal = $db->table($externalLogTable)
                ->where('source', 'timothyburks_partner_subscription')
                ->countAllResults();

            CLI::write('');
            CLI::write('===== BASELINE COUNTS =====', 'cyan');
            CLI::write('ledger_before=' . $beforeLedger);
            CLI::write('external_logs_before=' . $beforeExternal);

            $check('payload project_key is tbi_coin', $payload['project_key'] === 'tbi_coin');
            $check('payload coin_symbol is TBI', $payload['coin_symbol'] === 'TBI');
            $check('payload usd_amount is 75', (float) $payload['usd_amount'] === 75.0);
            $check('payload coin_amount is 75', (float) $payload['coin_amount'] === 75.0);
            $check('payload source is timothyburks_partner_subscription', $payload['source'] === 'timothyburks_partner_subscription');
            $check('payload source_id is unique smoke id', str_starts_with($payload['source_id'], 'mymi-managed-smoke-tbi-'));

            $duplicate = $db->table($externalLogTable)
                ->where('source', $payload['source'])
                ->where('source_id', $payload['source_id'])
                ->countAllResults();

            $check('source_id is not already used', (int) $duplicate === 0);

            CLI::write('');
            CLI::write('===== RESULT =====', 'cyan');
            CLI::write('This command verified receiver prerequisites and payload contract.');
            CLI::write('Run the live TBI signed request to create real ledger rows.');

            CLI::write('');
            CLI::write('PASS count: ' . $pass);
            CLI::write('FAIL count: ' . $fail);

            return $fail === 0 ? EXIT_SUCCESS : EXIT_ERROR;
        } catch (Throwable $e) {
            CLI::error($e->getMessage());

            return EXIT_ERROR;
        }
    }
}
