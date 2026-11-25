<?php

declare(strict_types=1);

namespace App\Commands\CryptoPay;

use App\Commands\SafeBaseCommand;
use App\Libraries\CryptoPay\CryptoPayFactory;
use App\Libraries\SolanaPay\SolanaPayFactory;
use CodeIgniter\CLI\CLI;
use Config\CryptoPay as CryptoPayConfig;
use Config\SolanaPay as SolanaPayConfig;

/**
 * Staging-only: open a checkout for a test user and print its payment details
 * as JSON, for tools/testnet-wallets (`node wallets.mjs pay <file>`) to pay
 * from a test wallet. Refuses unless the chain is on a test network.
 */
class TestCheckout extends SafeBaseCommand
{
    protected $group = 'CryptoPay';
    protected $name = 'cryptopay:test-checkout';
    protected $description = 'Test networks only: open a checkout for a test user and print its payment details as JSON.';
    protected $usage = 'cryptopay:test-checkout --user=ID --chain=solana|ethereum|base|xrpl|bitcoin [--purpose=mymigold] [--usd=1] [--ref=]';
    protected $options = [
        '--user'    => 'Staging user id that the order belongs to.',
        '--chain'   => 'solana, ethereum, base, xrpl or bitcoin.',
        '--purpose' => 'mymigold (default), membership, auction_topup or fund_units.',
        '--usd'     => 'Price in US dollars (default 1).',
        '--ref'     => 'Purpose reference: wallet id, plan slug, lot id or project id.',
    ];

    public function run(array $params)
    {
        $opt = static fn (string $k, string $d = ''): string => (string) ($params[$k] ?? CLI::getOption($k) ?? $d);
        $user = (int) $opt('user');
        $chain = $opt('chain');
        $purpose = $opt('purpose', 'mymigold');
        $cents = (int) round(((float) $opt('usd', '1')) * 100);
        if ($user <= 0 || $chain === '') {
            CLI::write('SEMANTIC_RESULT=FAILED REASON=usage: ' . $this->usage);
            return 2;
        }

        if ($chain === 'solana') {
            if (config(SolanaPayConfig::class)->cluster !== 'devnet') {
                CLI::write('SEMANTIC_RESULT=BLOCKED_SAFETY REASON=solana_not_devnet');
                return 3;
            }
            $svc = SolanaPayFactory::make();
            $r = $svc?->checkout($user, $purpose, $opt('ref'), $cents) ?? ['ok' => false, 'error' => 'solana_pay_disabled'];
            $r += ['chain' => 'solana'];
        } else {
            if (config(CryptoPayConfig::class)->network !== 'testnet') {
                CLI::write('SEMANTIC_RESULT=BLOCKED_SAFETY REASON=crypto_pay_not_testnet');
                return 3;
            }
            $svc = CryptoPayFactory::make();
            $r = $svc?->checkout($user, $chain, $purpose, $opt('ref'), $cents) ?? ['ok' => false, 'error' => 'crypto_pay_disabled'];
        }
        if (! $r['ok']) {
            CLI::write('SEMANTIC_RESULT=FAILED REASON=' . $r['error'], 'red');
            return 1;
        }
        CLI::write(json_encode($r, JSON_UNESCAPED_SLASHES));
        return 0;
    }
}
