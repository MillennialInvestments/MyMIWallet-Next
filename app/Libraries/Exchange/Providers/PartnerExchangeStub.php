<?php

namespace App\Libraries\Exchange\Providers;

use App\Libraries\Exchange\ExchangeProvider;

/**
 * Documented stub for licensed crypto-as-a-service partner adapters
 * (e.g., Zero Hash, Bakkt, Paxos).
 *
 * Operational Status:
 * Blocked by Gate G-PARTNER: Requires executed partner contract, legal clearance,
 * and production/sandbox API credentials.
 */
class PartnerExchangeStub implements ExchangeProvider
{
    public function name(): string
    {
        return 'licensed_partner_stub';
    }

    public function quote(string $symbol): array
    {
        return [
            'ok'      => false,
            'error'   => 'partner_gate_required',
            'code'    => 'G-PARTNER',
            'message' => 'Partner integration requires executed contract and credentials (Gate G-PARTNER).',
        ];
    }

    public function placeOrder(int $userId, array $params): array
    {
        return [
            'ok'      => false,
            'error'   => 'partner_gate_required',
            'code'    => 'G-PARTNER',
            'message' => 'Partner order execution requires executed contract and credentials (Gate G-PARTNER).',
        ];
    }

    public function cancelOrder(int $userId, string $orderId): array
    {
        return [
            'ok'      => false,
            'error'   => 'partner_gate_required',
            'code'    => 'G-PARTNER',
            'message' => 'Partner order cancellation requires executed contract and credentials (Gate G-PARTNER).',
        ];
    }

    public function balances(int $userId): array
    {
        return [];
    }

    public function history(int $userId, int $limit = 50): array
    {
        return [];
    }
}
