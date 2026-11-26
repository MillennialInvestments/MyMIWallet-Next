<?php

declare(strict_types=1);

namespace App\Libraries\SolanaPay;

use App\Libraries\SolanaFees\SolanaRpc;

/**
 * JSON-RPC calls checkout needs. Also serves the fee check (SolanaRpc), so
 * both use the same endpoints and failover.
 */
interface PayRpc extends SolanaRpc
{
    /** The JSON-RPC "result", or null when every endpoint failed or returned an error. */
    public function call(string $method, array $params): mixed;
}
