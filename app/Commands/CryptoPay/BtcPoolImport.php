<?php

declare(strict_types=1);

namespace App\Commands\CryptoPay;

use App\Commands\SafeBaseCommand;
use App\Services\CryptoPay\BtcAddressPoolService;
use CodeIgniter\CLI\CLI;

/**
 * Import pre-generated Bitcoin addresses into the checkout address pool.
 *
 * Generated offline from an xpub (tools/testnet-wallets/wallets.mjs xpub-pool).
 * Guarantees zero keys in the database.
 */
class BtcPoolImport extends SafeBaseCommand
{
    protected $group = 'CryptoPay';
    protected $name = 'cryptopay:btc-pool-import';
    protected $description = 'Import pre-generated Bitcoin addresses into the checkout address pool.';
    protected $usage = 'cryptopay:btc-pool-import --file=PATH [--network=testnet]';
    protected $options = [
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

        $filePath = $opt('file');
        $network = strtolower($opt('network', 'testnet'));

        if ($filePath === '' || ! is_file($filePath)) {
            CLI::write('SEMANTIC_RESULT=FAILED REASON=file_not_found PATH=' . esc($filePath), 'red');
            return 1;
        }

        $raw = file_get_contents($filePath);
        $decoded = json_decode((string) $raw, true);

        if (! is_array($decoded)) {
            CLI::write('SEMANTIC_RESULT=FAILED REASON=invalid_json_format', 'red');
            return 2;
        }

        $service = new BtcAddressPoolService();
        $imported = $service->importAddresses($decoded, $network);
        $stats = $service->stats($network);

        CLI::write("SEMANTIC_RESULT=PASS IMPORTED={$imported} TOTAL={$stats['total']} UNUSED={$stats['unused']} NETWORK={$network}", 'green');
        return 0;
    }
}
