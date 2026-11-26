<?php

namespace App\Libraries\Exchange;

/**
 * Interface for exchange trading providers.
 */
interface ExchangeProvider
{
    public function name(): string;

    /**
     * Get price quote for a symbol.
     *
     * @return array{ok: bool, symbol?: string, price?: float, error?: string}
     */
    public function quote(string $symbol): array;

    /**
     * Place a buy or sell order.
     *
     * @param int $userId
     * @param array{symbol: string, side: string, quantity: float, price?: float, order_type?: string} $params
     * @return array<string, mixed>
     */
    public function placeOrder(int $userId, array $params): array;

    /**
     * Cancel an open order.
     *
     * @param int $userId
     * @param string $orderId
     * @return array<string, mixed>
     */
    public function cancelOrder(int $userId, string $orderId): array;

    /**
     * Get user balances.
     *
     * @param int $userId
     * @return array<string, float>
     */
    public function balances(int $userId): array;

    /**
     * Get order history.
     *
     * @param int $userId
     * @param int $limit
     * @return array<array<string, mixed>>
     */
    public function history(int $userId, int $limit = 50): array;
}
