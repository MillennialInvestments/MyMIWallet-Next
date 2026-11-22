<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\{AccountsModel, ExchangeModel, WalletModel};
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Exceptions\PageNotFoundException;
use RuntimeException;

class ExchangeService
{
    protected AccountsModel $accountsModel;
    protected ExchangeModel $exchangeModel;
    protected WalletModel $walletModel;
    protected BaseConnection $db;

    public function __construct(?BaseConnection $db = null)
    {
        $this->db            = $db ?? \Config\Database::connect();
        $this->accountsModel = new AccountsModel();
        $this->exchangeModel = new ExchangeModel();
        $this->walletModel   = new WalletModel();
    }

    /**
     * Get All Active Exchanges (preserving backward compatibility)
     */
    public function getExchanges(): array
    {
        return $this->exchangeModel->getExchanges();
    }

    /**
     * Retrieve or initialize user balance for a given currency.
     */
    public function getExchangeBalance(int $userId, string $currency = 'USD'): array
    {
        if ($userId <= 0) {
            throw new RuntimeException('Invalid user ID');
        }

        $currency = strtoupper(trim($currency));

        if (! $this->db->tableExists('bf_exchanges_balances', false)) {
            return [
                'user_id'           => $userId,
                'currency'          => $currency,
                'available_balance' => 0.0,
                'hold_balance'      => 0.0,
                'total_balance'     => 0.0,
            ];
        }

        $row = $this->db->table('bf_exchanges_balances')
            ->where('user_id', $userId)
            ->where('currency', $currency)
            ->get()
            ->getRowArray();

        if (! $row) {
            $initial = [
                'user_id'           => $userId,
                'currency'          => $currency,
                'available_balance' => 0.00000000,
                'hold_balance'      => 0.00000000,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ];
            $this->db->table('bf_exchanges_balances')->insert($initial);
            $initial['id'] = $this->db->insertID();
            $row           = $initial;
        }

        $available = (float) ($row['available_balance'] ?? 0);
        $hold      = (float) ($row['hold_balance'] ?? 0);

        return [
            'id'                => (int) ($row['id'] ?? 0),
            'user_id'           => $userId,
            'currency'          => $currency,
            'available_balance' => round($available, 8),
            'hold_balance'      => round($hold, 8),
            'total_balance'     => round($available + $hold, 8),
        ];
    }

    /**
     * Deposit/credit available balance for a user.
     */
    public function depositBalance(int $userId, float $amount, string $currency = 'USD'): array
    {
        if ($amount <= 0) {
            throw new RuntimeException('Deposit amount must be greater than zero');
        }

        $bal = $this->getExchangeBalance($userId, $currency);

        $newAvailable = round($bal['available_balance'] + $amount, 8);

        $this->db->table('bf_exchanges_balances')
            ->where('user_id', $userId)
            ->where('currency', strtoupper($currency))
            ->update([
                'available_balance' => $newAvailable,
                'updated_at'        => date('Y-m-d H:i:s'),
            ]);

        return $this->getExchangeBalance($userId, $currency);
    }

    /**
     * Atomically moves amount from available_balance to hold_balance.
     */
    public function holdBalance(int $userId, float $amount, string $currency = 'USD'): bool
    {
        if ($amount <= 0) {
            return true;
        }

        $bal = $this->getExchangeBalance($userId, $currency);
        if ($bal['available_balance'] < $amount) {
            return false;
        }

        $newAvailable = round($bal['available_balance'] - $amount, 8);
        $newHold      = round($bal['hold_balance'] + $amount, 8);

        return (bool) $this->db->table('bf_exchanges_balances')
            ->where('user_id', $userId)
            ->where('currency', strtoupper($currency))
            ->update([
                'available_balance' => $newAvailable,
                'hold_balance'      => $newHold,
                'updated_at'        => date('Y-m-d H:i:s'),
            ]);
    }

    /**
     * Atomically releases amount from hold_balance back to available_balance.
     */
    public function releaseHold(int $userId, float $amount, string $currency = 'USD'): bool
    {
        if ($amount <= 0) {
            return true;
        }

        $bal = $this->getExchangeBalance($userId, $currency);
        $releaseAmount = min($amount, $bal['hold_balance']);

        $newHold      = round($bal['hold_balance'] - $releaseAmount, 8);
        $newAvailable = round($bal['available_balance'] + $releaseAmount, 8);

        return (bool) $this->db->table('bf_exchanges_balances')
            ->where('user_id', $userId)
            ->where('currency', strtoupper($currency))
            ->update([
                'available_balance' => $newAvailable,
                'hold_balance'      => max(0.0, $newHold),
                'updated_at'        => date('Y-m-d H:i:s'),
            ]);
    }

    /**
     * Atomically deducts amount from hold_balance upon fill/settlement.
     */
    public function deductHold(int $userId, float $amount, string $currency = 'USD'): bool
    {
        if ($amount <= 0) {
            return true;
        }

        $bal = $this->getExchangeBalance($userId, $currency);
        $newHold = max(0.0, round($bal['hold_balance'] - $amount, 8));

        return (bool) $this->db->table('bf_exchanges_balances')
            ->where('user_id', $userId)
            ->where('currency', strtoupper($currency))
            ->update([
                'hold_balance' => $newHold,
                'updated_at'   => date('Y-m-d H:i:s'),
            ]);
    }

    /**
     * Atomically credits amount to available_balance.
     */
    public function creditBalance(int $userId, float $amount, string $currency = 'USD'): bool
    {
        if ($amount <= 0) {
            return true;
        }

        $bal = $this->getExchangeBalance($userId, $currency);
        $newAvailable = round($bal['available_balance'] + $amount, 8);

        return (bool) $this->db->table('bf_exchanges_balances')
            ->where('user_id', $userId)
            ->where('currency', strtoupper($currency))
            ->update([
                'available_balance' => $newAvailable,
                'updated_at'        => date('Y-m-d H:i:s'),
            ]);
    }

    /**
     * Places a new limit order with atomic balance reservation.
     * IDOR-safe: strictly uses $userId supplied from the authenticated session.
     */
    public function placeOrder(array $params, int $userId): array
    {
        if ($userId <= 0) {
            throw new RuntimeException('Authenticated user required to place an order.');
        }

        $tradeType  = ucfirst(strtolower((string) ($params['trade_type'] ?? 'Buy')));
        if (! in_array($tradeType, ['Buy', 'Sell'], true)) {
            throw new RuntimeException('Invalid trade type; must be Buy or Sell.');
        }

        $marketPair = strtoupper(trim((string) ($params['market_pair'] ?? 'USD')));
        $symbol     = strtoupper(trim((string) ($params['symbol'] ?? $params['market'] ?? '')));

        if ($symbol === '') {
            throw new RuntimeException('Market symbol is required.');
        }

        $amount = (float) ($params['amount'] ?? $params['buy_amount'] ?? $params['sell_amount'] ?? 0);
        $price  = (float) ($params['price'] ?? $params['coin_value'] ?? 0);

        if ($amount <= 0) {
            throw new RuntimeException('Order amount must be greater than zero.');
        }
        if ($price <= 0) {
            throw new RuntimeException('Order price must be greater than zero.');
        }

        $totalCost = round($amount * $price, 8);
        $fee       = round($totalCost * 0.001, 8); // 0.1% standard exchange fee

        // Atomic balance check and hold reservation
        if ($tradeType === 'Buy') {
            $requiredQuote = round($totalCost + $fee, 8);
            $held = $this->holdBalance($userId, $requiredQuote, $marketPair);
            if (! $held) {
                return [
                    'status'   => 'rejected',
                    'reason'   => 'insufficient_balance',
                    'message'  => "Insufficient {$marketPair} balance to place buy order (required: {$requiredQuote}).",
                ];
            }
        } else {
            // Sell order requires holding the base asset
            $held = $this->holdBalance($userId, $amount, $symbol);
            if (! $held) {
                return [
                    'status'   => 'rejected',
                    'reason'   => 'insufficient_asset_balance',
                    'message'  => "Insufficient {$symbol} balance to place sell order (required: {$amount}).",
                ];
            }
        }

        $orderData = [
            'user_id'          => $userId,
            'trade_type'       => $tradeType,
            'market_pair'      => $marketPair,
            'market'           => $symbol,
            'amount'           => $amount,
            'price'            => $price,
            'total'            => $amount,
            'total_cost'       => $totalCost,
            'fees'             => $fee,
            'filled_amount'    => 0.00000000,
            'remaining_amount' => $amount,
            'status'           => 'Open',
            'current_date'     => date('Y-m-d'),
            'created_on'       => date('Y-m-d H:i:s'),
        ];

        $this->db->table('bf_exchanges_orders')->insert($orderData);
        $orderId = (int) $this->db->insertID();
        $orderData['id'] = $orderId;

        return [
            'status'   => 'success',
            'order_id' => $orderId,
            'order'    => $orderData,
        ];
    }

    /**
     * Cancels an open or partially filled order, releasing remaining held funds.
     * IDOR-safe: enforces order ownership unless $isAdmin is true.
     */
    public function cancelOrder(int $orderId, int $userId, bool $isAdmin = false): array
    {
        if ($orderId <= 0) {
            throw new RuntimeException('Invalid order ID.');
        }

        $order = $this->db->table('bf_exchanges_orders')
            ->where('id', $orderId)
            ->get()
            ->getRowArray();

        if (! $order) {
            throw PageNotFoundException::forPageNotFound("Exchange order #{$orderId} not found.");
        }

        $ownerId = (int) ($order['user_id'] ?? 0);
        if ($ownerId !== $userId && ! $isAdmin) {
            throw PageNotFoundException::forPageNotFound("Unauthorized access to order #{$orderId}.");
        }

        $currentStatus = (string) ($order['status'] ?? '');
        if (! in_array($currentStatus, ['Open', 'Partial', 'open', 'partial'], true)) {
            return [
                'status'   => 'error',
                'message'  => "Order #{$orderId} cannot be cancelled in status '{$currentStatus}'.",
            ];
        }

        $remainingAmount = (float) ($order['remaining_amount'] ?? $order['amount'] ?? 0);
        $tradeType       = (string) ($order['trade_type'] ?? 'Buy');
        $marketPair      = (string) ($order['market_pair'] ?? 'USD');
        $symbol          = (string) ($order['market'] ?? '');
        $price           = (float) ($order['price'] ?? 0);

        $released = 0.0;
        if ($remainingAmount > 0) {
            if (strcasecmp($tradeType, 'Buy') === 0) {
                $releaseCost = round($remainingAmount * $price, 8);
                $releaseFee  = round($releaseCost * 0.001, 8);
                $totalRelease = round($releaseCost + $releaseFee, 8);
                $this->releaseHold($ownerId, $totalRelease, $marketPair);
                $released = $totalRelease;
            } else {
                $this->releaseHold($ownerId, $remainingAmount, $symbol);
                $released = $remainingAmount;
            }
        }

        $this->db->table('bf_exchanges_orders')
            ->where('id', $orderId)
            ->update([
                'status'           => 'Cancelled',
                'remaining_amount' => 0.00000000,
                'completed_on'     => date('Y-m-d H:i:s'),
            ]);

        return [
            'status'          => 'success',
            'order_id'        => $orderId,
            'released_amount' => $released,
            'message'         => "Order #{$orderId} successfully cancelled.",
        ];
    }

    /**
     * Matches a Buy order against a Sell order and atomically settles balances.
     */
    public function executeTradeMatch(int $buyOrderId, int $sellOrderId): array
    {
        $buyOrder = $this->db->table('bf_exchanges_orders')->where('id', $buyOrderId)->get()->getRowArray();
        $sellOrder = $this->db->table('bf_exchanges_orders')->where('id', $sellOrderId)->get()->getRowArray();

        if (! $buyOrder || ! $sellOrder) {
            throw new RuntimeException('One or both orders not found.');
        }

        if (strcasecmp((string) $buyOrder['trade_type'], 'Buy') !== 0) {
            throw new RuntimeException("Order #{$buyOrderId} is not a Buy order.");
        }
        if (strcasecmp((string) $sellOrder['trade_type'], 'Sell') !== 0) {
            throw new RuntimeException("Order #{$sellOrderId} is not a Sell order.");
        }

        if (strcasecmp((string) $buyOrder['market'], (string) $sellOrder['market']) !== 0) {
            throw new RuntimeException('Market symbol mismatch.');
        }

        $buyPrice  = (float) $buyOrder['price'];
        $sellPrice = (float) $sellOrder['price'];
        if ($buyPrice < $sellPrice) {
            throw new RuntimeException("Cannot match: Buy price ({$buyPrice}) is less than Sell price ({$sellPrice}).");
        }

        $buyRemaining  = (float) ($buyOrder['remaining_amount'] ?? $buyOrder['amount']);
        $sellRemaining = (float) ($sellOrder['remaining_amount'] ?? $sellOrder['amount']);

        if ($buyRemaining <= 0 || $sellRemaining <= 0) {
            throw new RuntimeException('One or both orders have no remaining unfilled amount.');
        }

        $matchQty   = min($buyRemaining, $sellRemaining);
        $execPrice  = $sellPrice; // Maker price execution
        $execCost   = round($matchQty * $execPrice, 8);
        $fee        = round($execCost * 0.001, 8);
        $netSeller  = round($execCost - $fee, 8);

        $buyerId    = (int) $buyOrder['user_id'];
        $sellerId   = (int) $sellOrder['user_id'];
        $marketPair = (string) $buyOrder['market_pair'];
        $symbol     = (string) $buyOrder['market'];

        // Balance settlement
        // 1. Buyer: deduct quote hold, credit base asset
        $buyerHoldDeduct = round($execCost + $fee, 8);
        $this->deductHold($buyerId, $buyerHoldDeduct, $marketPair);
        $this->creditBalance($buyerId, $matchQty, $symbol);

        // 2. Seller: deduct base asset hold, credit quote net funds
        $this->deductHold($sellerId, $matchQty, $symbol);
        $this->creditBalance($sellerId, $netSeller, $marketPair);

        // 3. Update Buy order
        $newBuyRemaining = round($buyRemaining - $matchQty, 8);
        $newBuyFilled    = round(((float) $buyOrder['filled_amount']) + $matchQty, 8);
        $buyStatus       = $newBuyRemaining <= 0.00000001 ? 'Closed' : 'Partial';

        $this->db->table('bf_exchanges_orders')->where('id', $buyOrderId)->update([
            'filled_amount'    => $newBuyFilled,
            'remaining_amount' => max(0.0, $newBuyRemaining),
            'status'           => $buyStatus,
            'completed_on'     => $buyStatus === 'Closed' ? date('Y-m-d H:i:s') : null,
        ]);

        // 4. Update Sell order
        $newSellRemaining = round($sellRemaining - $matchQty, 8);
        $newSellFilled    = round(((float) $sellOrder['filled_amount']) + $matchQty, 8);
        $sellStatus       = $newSellRemaining <= 0.00000001 ? 'Closed' : 'Partial';

        $this->db->table('bf_exchanges_orders')->where('id', $sellOrderId)->update([
            'filled_amount'    => $newSellFilled,
            'remaining_amount' => max(0.0, $newSellRemaining),
            'status'           => $sellStatus,
            'completed_on'     => $sellStatus === 'Closed' ? date('Y-m-d H:i:s') : null,
        ]);

        // 5. Record trade in bf_exchanges_trades
        $tradeId = null;
        if ($this->db->tableExists('bf_exchanges_trades', false)) {
            $this->db->table('bf_exchanges_trades')->insert([
                'buy_order_id'  => $buyOrderId,
                'sell_order_id' => $sellOrderId,
                'buyer_id'      => $buyerId,
                'seller_id'     => $sellerId,
                'market_pair'   => $marketPair,
                'market'        => $symbol,
                'price'         => $execPrice,
                'amount'        => $matchQty,
                'fee'           => $fee,
                'settled_at'    => date('Y-m-d H:i:s'),
            ]);
            $tradeId = (int) $this->db->insertID();
        }

        return [
            'status'           => 'success',
            'trade_id'         => $tradeId,
            'matched_quantity' => $matchQty,
            'execution_price'  => $execPrice,
            'execution_cost'   => $execCost,
            'fee'              => $fee,
            'buyer_id'         => $buyerId,
            'seller_id'        => $sellerId,
            'buy_status'       => $buyStatus,
            'sell_status'      => $sellStatus,
        ];
    }

    /**
     * Comprehensive exchange balance and order book reconciliation audit.
     */
    public function reconcileBalances(?string $symbol = null): array
    {
        $discrepancies    = [];
        $negativeBalances = [];

        $ordersBuilder = $this->db->table('bf_exchanges_orders');
        if ($symbol !== null && trim($symbol) !== '') {
            $ordersBuilder->where('market', strtoupper(trim($symbol)));
        }

        $orders = $ordersBuilder->limit(500)->get()->getResultArray();

        $openCount      = 0;
        $closedCount    = 0;
        $cancelledCount = 0;
        $partialCount   = 0;
        $totalVolume    = 0.0;

        foreach ($orders as $order) {
            $orderId   = (int) ($order['id'] ?? 0);
            $amount    = (float) ($order['amount'] ?? 0);
            $filled    = (float) ($order['filled_amount'] ?? 0);
            $remaining = (float) ($order['remaining_amount'] ?? 0);
            $status    = (string) ($order['status'] ?? 'Open');
            $cost      = (float) ($order['total_cost'] ?? 0);

            $totalVolume += $cost;

            switch (strtolower($status)) {
                case 'open':
                    $openCount++;
                    if ($remaining <= 0) {
                        $discrepancies[] = [
                            'order_id' => $orderId,
                            'type'     => 'open_with_zero_remaining',
                            'message'  => "Order #{$orderId} has status 'Open' but remaining_amount is 0.",
                        ];
                    }
                    break;
                case 'closed':
                case 'filled':
                    $closedCount++;
                    if ($remaining > 0.00001) {
                        $discrepancies[] = [
                            'order_id' => $orderId,
                            'type'     => 'closed_with_unfilled_remaining',
                            'message'  => "Order #{$orderId} has status '{$status}' but remaining_amount is {$remaining}.",
                        ];
                    }
                    break;
                case 'cancelled':
                    $cancelledCount++;
                    break;
                case 'partial':
                    $partialCount++;
                    break;
            }

            // Invariant: filled + remaining must equal amount (within floating tolerance)
            if ($amount > 0 && strtolower($status) !== 'cancelled') {
                $sum = round($filled + $remaining, 8);
                if (abs($sum - $amount) > 0.0001) {
                    $discrepancies[] = [
                        'order_id' => $orderId,
                        'type'     => 'quantity_accounting_mismatch',
                        'message'  => "Order #{$orderId}: filled ({$filled}) + remaining ({$remaining}) = {$sum} does not equal amount ({$amount}).",
                    ];
                }
            }
        }

        // Balance table audit
        if ($this->db->tableExists('bf_exchanges_balances', false)) {
            $balances = $this->db->table('bf_exchanges_balances')->limit(500)->get()->getResultArray();
            foreach ($balances as $bal) {
                $userId    = (int) ($bal['user_id'] ?? 0);
                $currency  = (string) ($bal['currency'] ?? 'USD');
                $available = (float) ($bal['available_balance'] ?? 0);
                $hold      = (float) ($bal['hold_balance'] ?? 0);

                if ($available < -0.00000001) {
                    $negativeBalances[] = [
                        'user_id'           => $userId,
                        'currency'          => $currency,
                        'available_balance' => $available,
                        'type'              => 'negative_available',
                    ];
                }
                if ($hold < -0.00000001) {
                    $negativeBalances[] = [
                        'user_id'      => $userId,
                        'currency'     => $currency,
                        'hold_balance' => $hold,
                        'type'         => 'negative_hold',
                    ];
                }
            }
        }

        $isPassed = empty($discrepancies) && empty($negativeBalances);

        return [
            'status'                  => $isPassed ? 'PASS' : 'FAIL',
            'orders_audited'          => count($orders),
            'open_orders_count'       => $openCount,
            'closed_orders_count'     => $closedCount,
            'cancelled_orders_count'  => $cancelledCount,
            'partial_orders_count'    => $partialCount,
            'total_volume_usd'        => round($totalVolume, 2),
            'discrepancies_count'     => count($discrepancies),
            'discrepancies'           => $discrepancies,
            'negative_balances_count' => count($negativeBalances),
            'negative_balances'       => $negativeBalances,
            'audit_timestamp'         => date('Y-m-d H:i:s'),
        ];
    }
}
