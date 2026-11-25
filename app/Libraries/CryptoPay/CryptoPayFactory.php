<?php

declare(strict_types=1);

namespace App\Libraries\CryptoPay;

use App\Libraries\CryptoPay\Chains\Bitcoin;
use App\Libraries\CryptoPay\Chains\ChainAdapter;
use App\Libraries\CryptoPay\Chains\EvmUsdc;
use App\Libraries\CryptoPay\Chains\Xrpl;
use App\Libraries\SecureTransfer\DbAuditLog;
use App\Libraries\SolanaPay\Fulfillers;
use Config\CryptoPay as CryptoPayConfig;

/** Wires crypto checkout from config. Null while it is off or not migrated. */
final class CryptoPayFactory
{
    public static function make(?Http $http = null): ?CryptoPayService
    {
        $db = db_connect();
        $config = config(CryptoPayConfig::class);
        if (! CryptoPayService::available($db, $config)) {
            return null;
        }
        return new CryptoPayService(
            $config,
            self::adapters($config, $http ?? new CurlHttp()),
            $db,
            Fulfillers::defaults(),
            DbAuditLog::available($db) ? new DbAuditLog($db) : null,
        );
    }

    /** @return array<string, ChainAdapter> */
    public static function adapters(CryptoPayConfig $config, Http $http): array
    {
        $prices = new SpotPrice($http, $config->maxPriceSpread);
        $net = $config->network;
        $out = [];
        foreach ($config->chains() as $chain) {
            $urls = $config->endpoints[$chain];
            $out[$chain] = match ($chain) {
                'ethereum', 'base' => new EvmUsdc($chain, CryptoPayConfig::CHAIN_IDS[$chain][$net], CryptoPayConfig::USDC[$chain][$net], $urls, $http, $config->confirmations[$chain]),
                'xrpl'             => new Xrpl($net, $urls, $http, $prices),
                'bitcoin'          => new Bitcoin($net, $urls, $http, $prices),
            };
        }
        return $out;
    }
}
