<?php

declare(strict_types=1);

namespace App\Libraries\SolanaPay;

use App\Libraries\SecureTransfer\DbAuditLog;
use App\Libraries\SolanaFees\DbFeeReceiptStore;
use App\Libraries\SolanaFees\SolanaFeeService;
use Config\SolanaFees;
use Config\SolanaPay as SolanaPayConfig;

/** Wires the checkout service from config. Null while checkout is off or not migrated. */
final class SolanaPayFactory
{
    public static function make(): ?SolanaPayService
    {
        $db = db_connect();
        $config = config(SolanaPayConfig::class);
        if (! SolanaPayService::available($db, $config)) {
            return null;
        }
        $feeConfig = config(SolanaFees::class);
        $priced = $feeConfig->treasury !== '' && ($feeConfig->lamports['payment_processing'] ?? 0) > 0;
        if ($priced && ! DbFeeReceiptStore::available($db)) {
            return null;
        }
        $rpc = new HttpPayRpc($config->rpcUrls);

        return new SolanaPayService(
            $config,
            $rpc,
            new SolanaFeeService($feeConfig, $rpc, new DbFeeReceiptStore($db)),
            $db,
            Fulfillers::defaults(),
            site_url('API/SolanaPay/Tx'),
            DbAuditLog::available($db) ? new DbAuditLog($db) : null,
        );
    }
}
