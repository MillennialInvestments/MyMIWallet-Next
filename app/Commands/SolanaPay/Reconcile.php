<?php

declare(strict_types=1);

namespace App\Commands\SolanaPay;

use App\Commands\SafeBaseCommand;
use App\Libraries\SolanaPay\SolanaPayFactory;
use CodeIgniter\CLI\CLI;

/**
 * Confirms open Solana Pay checkouts on the server, so a paid order is
 * delivered even if the buyer closed the checkout page. Safe to run often:
 * each checkout is fulfilled at most once. Run it from cron every minute.
 */
class Reconcile extends SafeBaseCommand
{
    protected $group = 'SolanaPay';
    protected $name = 'solanapay:reconcile';
    protected $description = 'Confirm open Solana Pay checkouts on chain and deliver paid orders.';
    protected $usage = 'solanapay:reconcile [--limit=100]';
    protected $options = ['--limit' => 'Most checkouts to look at in one run (default 100, max 500).'];

    public function run(array $params)
    {
        if (! db_connect()->tableExists('bf_solana_pay_requests')) {
            CLI::write('SEMANTIC_RESULT=PASS CHECKED=0 REASON=tables_not_migrated');
            return 0;
        }
        $svc = SolanaPayFactory::make();
        if ($svc === null) {
            CLI::write('SEMANTIC_RESULT=PASS CHECKED=0 REASON=solana_pay_disabled');
            return 0;
        }
        $limit = (int) ($params['limit'] ?? CLI::getOption('limit') ?? 100);
        $counts = $svc->reconcile($limit > 0 ? $limit : 100);
        ksort($counts);
        $parts = [];
        foreach ($counts as $status => $n) {
            $parts[] = strtoupper($status) . '=' . $n;
        }
        CLI::write(trim('SEMANTIC_RESULT=PASS CHECKED=' . array_sum($counts) . ' ' . implode(' ', $parts)));
        return 0;
    }
}
