<?php

declare(strict_types=1);

namespace App\Commands\CryptoPay;

use App\Commands\SafeBaseCommand;
use App\Services\CryptoPay\UtxoAddressPoolService;
use CodeIgniter\CLI\CLI;

/**
 * Import pre-generated multi-asset UTXO addresses (Litecoin, Dogecoin) into the checkout address pool.
 *
 * Generated offline from an xpub (e.g. tools/testnet-wallets/wallets.mjs).
 * Guarantees zero keys in the database.
 */
class UtxoPoolImport extends SafeBaseCommand
{
    protected $group = 'CryptoPay';
    protected $name = 'cryptopay:utxo-pool-import';
    protected $description = 'Import pre-generated UTXO addresses (LTC, DOGE) into the checkout address pool.';
    protected $usage = 'cryptopay:utxo-pool-import --chain=ltc --file=PATH [--network=testnet]';
    protected $options = [
        '--chain'   => 'Target chain: ltc (Litecoin) or doge (Dogecoin)',
        '--file'    => 'Path to JSON file containing addresses array [{"address": "...", "index": 0}, ...]',
        '--network' => 'Target network: testnet (default) or mainnet',
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

        $chain = strtolower($opt('chain', 'ltc'));
        $filePath = $opt('file');
        $network = strtolower($opt('network', 'testnet'));

        if (! in_array($chain, ['ltc', 'doge'], true)) {
            CLI::write('SEMANTIC_RESULT=FAILED REASON=invalid_chain CHAIN=' . esc($chain), 'red');
            return 1;
        }

        if ($filePath === '' || ! is_file($filePath)) {
            CLI::write('SEMANTIC_RESULT=FAILED REASON=file_not_found PATH=' . esc($filePath), 'red');
            return 2;
        }

        $raw = file_get_contents($filePath);
        $decoded = json_decode((string) $raw, true);

        if (! is_array($decoded)) {
            CLI::write('SEMANTIC_RESULT=FAILED REASON=invalid_json_format', 'red');
            return 3;
        }

        $service = new UtxoAddressPoolService();
        $imported = $service->importAddresses($chain, $decoded, $network);
        $stats = $service->getPoolStats($chain, $network);

        CLI::write("SEMANTIC_RESULT=PASS ACTION=pool_imported CHAIN={$chain} IMPORTED={$imported} TOTAL={$stats['total']} UNUSED={$stats['unused']} RESERVED={$stats['reserved']} USED={$stats['used']}", 'green');

        return 0;
    }
}
