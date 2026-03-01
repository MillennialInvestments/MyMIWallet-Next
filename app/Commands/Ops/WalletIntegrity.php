<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class WalletIntegrity extends SafeBaseCommand
{
    protected $group = 'Ops';
    protected $name = 'ops:integrity:wallet';
    protected $description = 'Validate wallet balances against completed ledger transactions.';
    protected $usage = 'ops:integrity:wallet [--limit=0] [--user_id=0]';

    public function run(array $params)
    {
        $limit = (int) ($this->getOption('limit') ?? 0);
        $userId = (int) ($this->getOption('user_id') ?? 0);

        try {
            $db = db_connect();

            $walletQ = $db->table('bf_users_wallet')->select('id,user_id,amount');
            if ($userId > 0) {
                $walletQ->where('user_id', $userId);
            }
            if ($limit > 0) {
                $walletQ->limit($limit);
            }

            $wallets = $walletQ->get()->getResultArray();
            if (! $wallets) {
                CLI::write('No wallets found for integrity scan.', 'yellow');
                return EXIT_SUCCESS;
            }

            $failures = 0;

            foreach ($wallets as $w) {
                $wid = (int) $w['id'];
                $stored = (float) ($w['amount'] ?? 0);

                // Adjust trans_type values if your schema uses different labels.
                $row = $db->table('bf_users_wallet_transactions')
                    ->select("
                        SUM(CASE WHEN trans_type='Deposit' THEN amount ELSE 0 END) AS dep,
                        SUM(CASE WHEN trans_type IN ('Withdraw','Withdrawal') THEN amount ELSE 0 END) AS wd
                    ")
                    ->where('wallet_id', $wid)
                    ->where('status', 'Completed')
                    ->get()
                    ->getRowArray();

                $dep = (float) ($row['dep'] ?? 0);
                $wd  = (float) ($row['wd'] ?? 0);
                $calc = $dep - $wd;

                if (round($stored, 2) !== round($calc, 2)) {
                    CLI::error("Mismatch wallet_id={$wid} stored={$stored} calc={$calc} (dep={$dep} wd={$wd})");
                    $failures++;
                }
            }

            if ($failures > 0) {
                CLI::error("FAILED: {$failures} wallet mismatches.");
                return EXIT_ERROR;
            }

            CLI::write('PASS: Wallet integrity verified.', 'green');
            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            CLI::error('Integrity scan error: ' . $e->getMessage());
            log_message('error', 'ops:integrity:wallet failed: {msg}', ['msg' => $e->getMessage()]);
            return EXIT_ERROR;
        }
    }
}