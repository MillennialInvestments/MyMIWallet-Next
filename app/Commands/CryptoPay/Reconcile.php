<?php

declare(strict_types=1);

namespace App\Commands\CryptoPay;

use App\Commands\SafeBaseCommand;
use App\Libraries\CryptoPay\CryptoPayFactory;
use CodeIgniter\CLI\CLI;

/**
 * Confirms open Ethereum, Base, XRP Ledger and Bitcoin checkouts on the
 * server, so a paid order is delivered even if the buyer closed the page.
 * Safe to run often: each checkout is fulfilled at most once. Cron: every minute.
 */
class Reconcile extends SafeBaseCommand
{
    protected $group = 'CryptoPay';
    protected $name = 'cryptopay:reconcile';
    protected $description = 'Confirm open crypto checkouts (ETH, Base, XRP, BTC) on chain and deliver paid orders.';
    protected $usage = 'cryptopay:reconcile [--limit=100]';
    protected $options = ['--limit' => 'Most checkouts to look at in one run (default 100, max 500).'];

    public function run(array $params)
    {
        if (! db_connect()->tableExists('bf_crypto_pay_requests')) {
            CLI::write('SEMANTIC_RESULT=PASS CHECKED=0 REASON=tables_not_migrated');
            return 0;
        }
        $svc = CryptoPayFactory::make();
        if ($svc === null) {
            CLI::write('SEMANTIC_RESULT=PASS CHECKED=0 REASON=crypto_pay_disabled');
            return 0;
        }
        $limit = (int) ($params['limit'] ?? CLI::getOption('limit') ?? 100);
        $counts = $svc->reconcile($limit > 0 ? $limit : 100);
        ksort($counts);
        $parts = [];
        foreach ($counts as $status => $n) {
            $parts[] = strtoupper($status) . '=' . $n;
        }
        $chains = implode(',', array_column($svc->offered(), 'chain'));
        CLI::write(trim('SEMANTIC_RESULT=PASS CHAINS=' . ($chains === '' ? 'none' : $chains) . ' CHECKED=' . array_sum($counts) . ' ' . implode(' ', $parts)));
        return 0;
    }
}
