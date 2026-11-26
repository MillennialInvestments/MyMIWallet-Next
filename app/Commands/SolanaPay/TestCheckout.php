<?php

declare(strict_types=1);

namespace App\Commands\SolanaPay;

use App\Commands\SafeBaseCommand;
use App\Libraries\SolanaPay\SolanaPayFactory;
use CodeIgniter\CLI\CLI;
use Config\SolanaPay as SolanaPayConfig;

/**
 * Staging-only: open a Solana Pay checkout for a test user and print its payment details
 * as JSON, for tools/testnet-wallets (`node wallets.mjs pay <file>`) to pay
 * from a test wallet. Refuses unless the cluster is on devnet.
 */
class TestCheckout extends SafeBaseCommand
{
    protected $group = 'SolanaPay';
    protected $name = 'solanapay:test-checkout';
    protected $description = 'Devnet only: open a Solana Pay checkout for a test user and print its payment details as JSON.';
    protected $usage = 'solanapay:test-checkout --user=ID [--purpose=mymigold] [--usd=1] [--ref=]';
    protected $options = [
        '--user'    => 'Staging user id that the order belongs to.',
        '--purpose' => 'mymigold (default), membership, auction_topup or fund_units.',
        '--usd'     => 'Price in US dollars (default 1).',
        '--ref'     => 'Purpose reference: wallet id, plan slug, lot id or project id.',
    ];

    public function run(array $params)
    {
        $given = [];
        foreach (array_merge(CLI::getOptions(), $params) as $k => $v) {
            if (is_string($k) && str_contains($k, '=')) {
                [$k, $v] = explode('=', $k, 2);
            }
            if (is_string($k) && $v !== null && $v !== '') {
                $given[ltrim($k, '-')] = (string) $v;
            }
        }
        $opt = static fn (string $k, string $d = ''): string => $given[$k] ?? $d;
        $user = (int) $opt('user');
        $purpose = $opt('purpose', 'mymigold');
        $cents = (int) round(((float) $opt('usd', '1')) * 100);

        if ($user <= 0) {
            CLI::write('SEMANTIC_RESULT=FAILED REASON=usage: ' . $this->usage);
            return 2;
        }

        if (config(SolanaPayConfig::class)->cluster !== 'devnet') {
            CLI::write('SEMANTIC_RESULT=BLOCKED_SAFETY REASON=solana_not_devnet');
            return 3;
        }

        $svc = SolanaPayFactory::make();
        $r = $svc?->checkout($user, $purpose, $opt('ref'), $cents) ?? ['ok' => false, 'error' => 'solana_pay_disabled'];
        $r += ['chain' => 'solana'];

        if (! ($r['ok'] ?? false)) {
            CLI::write('SEMANTIC_RESULT=FAILED REASON=' . ($r['error'] ?? 'unknown_error'), 'red');
            return 1;
        }

        CLI::write(json_encode($r, JSON_UNESCAPED_SLASHES));
        return 0;
    }
}
