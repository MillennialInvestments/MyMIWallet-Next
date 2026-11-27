<?php

namespace App\Libraries\Exchange\Providers;

use App\Libraries\CryptoPay\Http;
use App\Libraries\CryptoPay\SpotPrice;
use App\Libraries\Exchange\ExchangeProvider;
use CodeIgniter\Database\BaseConnection;
use Config\Database;
use InvalidArgumentException;

/**
 * In-database paper trading exchange provider.
 *
 * Guarantees:
 * 1. MyMI Gold and MyMI Coin are strictly NOT tradable assets.
 * 2. Balances can never be negative.
 * 3. Strict session IDOR enforcement by user_id.
 * 4. Realistic market execution using SpotPrice or simulated tick feeds.
 */
class PaperExchangeProvider implements ExchangeProvider
{
    protected BaseConnection $db;
    protected ?SpotPrice $spotPrice = null;
    /** @var array<string, float> Custom mock prices for deterministic tests */
    protected array $mockPrices = [];

    public function __construct(?BaseConnection $db = null, ?SpotPrice $spotPrice = null, array $mockPrices = [])
    {
        $this->db = $db ?? Database::connect();
        $this->spotPrice = $spotPrice;
        $this->mockPrices = $mockPrices;
    }

    public function name(): string
    {
        return 'paper';
    }

    /**
     * @return array{ok: bool, symbol?: string, price?: float, error?: string, message?: string}
     */
    public function quote(string $symbol): array
    {
        $symbol = strtoupper(trim($symbol));
        [$base, $quote] = $this->parseSymbol($symbol);

        $this->assertAssetTradable($base);

        if (isset($this->mockPrices[$symbol])) {
            return ['ok' => true, 'symbol' => $symbol, 'price' => $this->mockPrices[$symbol]];
        }

        if (isset($this->mockPrices[$base])) {
            return ['ok' => true, 'symbol' => $symbol, 'price' => $this->mockPrices[$base]];
        }

        if ($this->spotPrice !== null) {
            $priceStr = $this->spotPrice->usd($base);
            if ($priceStr !== null) {
                return ['ok' => true, 'symbol' => $symbol, 'price' => (float) $priceStr];
            }
        }

        // Standard default baseline paper pricing if spot price is offline
        $fallbackPrices = [
            'BTC'   => 96500.0,
            'ETH'   => 3450.0,
            'SOL'   => 215.0,
            'XRP'   => 1.45,
            'USDC'  => 1.0,
            'USDT'  => 1.0,
            'PYUSD' => 1.0,
            'EURC'  => 1.05,
            'POL'   => 0.50,
            'ARB'   => 0.85,
            'OP'    => 1.95,
            'AVAX'  => 38.50,
            'BNB'   => 640.0,
            'LTC'   => 95.0,
            'DOGE'  => 0.38,
            'TRX'   => 0.20,
        ];

        if (isset($fallbackPrices[$base])) {
            return ['ok' => true, 'symbol' => $symbol, 'price' => $fallbackPrices[$base]];
        }

        return [
            'ok'      => false,
            'error'   => 'price_unavailable',
            'message' => "Live price for {$symbol} is currently unavailable.",
        ];
    }

    public function placeOrder(int $userId, array $params): array
    {
        if ($userId <= 0) {
            return ['ok' => false, 'error' => 'unauthorized', 'message' => 'Valid user session required.'];
        }

        $symbol = strtoupper(trim((string) ($params['symbol'] ?? '')));
        $side = strtolower(trim((string) ($params['side'] ?? '')));
        $quantity = (float) ($params['quantity'] ?? 0);
        $orderType = strtolower(trim((string) ($params['order_type'] ?? 'market')));

        if ($symbol === '' || !in_array($side, ['buy', 'sell'], true) || $quantity <= 0) {
            return ['ok' => false, 'error' => 'invalid_parameters', 'message' => 'Invalid order parameters.'];
        }

        [$base, $quote] = $this->parseSymbol($symbol);
        $this->assertAssetTradable($base);

        // Seed initial paper cash balance ($10,000 USD) if user is new
        $this->ensureUserInitialized($userId);

        // Every paper order fills at once at the provider's own quote. A price
        // sent by the browser is ignored: otherwise anyone could "buy" BTC at
        // $0.01 and sell it back at market, inflating paper balances.
        $price = (float) ($this->quote($symbol)['price'] ?? 0.0);

        if ($price <= 0) {
            return ['ok' => false, 'error' => 'price_unavailable', 'message' => 'Cannot execute order without valid price.'];
        }

        $totalCost = $quantity * $price;
        $orderId = 'ord_' . bin2hex(random_bytes(16));
        $now = date('Y-m-d H:i:s');

        $this->db->transStart();

        $balances = $this->getUserBalanceMap($userId);

        if ($side === 'buy') {
            $currentUsd = $balances['USD'] ?? 0.0;
            if ($currentUsd < $totalCost) {
                $this->db->transRollback();
                return [
                    'ok'      => false,
                    'error'   => 'insufficient_funds',
                    'message' => sprintf('Insufficient USD balance. Required: $%.2f, Available: $%.2f', $totalCost, $currentUsd),
                ];
            }

            // Deduct USD, credit base asset
            $this->adjustBalance($userId, 'USD', -$totalCost);
            $this->adjustBalance($userId, $base, $quantity);
        } else {
            $currentAsset = $balances[$base] ?? 0.0;
            if ($currentAsset < $quantity) {
                $this->db->transRollback();
                return [
                    'ok'      => false,
                    'error'   => 'insufficient_balance',
                    'message' => sprintf('Insufficient %s balance. Required: %.8f, Available: %.8f', $base, $quantity, $currentAsset),
                ];
            }

            // Deduct base asset, credit USD
            $this->adjustBalance($userId, $base, -$quantity);
            $this->adjustBalance($userId, 'USD', $totalCost);
        }

        // Insert order record
        $this->db->table('bf_paper_exchange_orders')->insert([
            'user_id'         => $userId,
            'order_id'        => $orderId,
            'symbol'          => $symbol,
            'side'            => $side,
            'order_type'      => $orderType,
            'quantity'        => number_format($quantity, 8, '.', ''),
            'price'           => number_format($price, 8, '.', ''),
            'filled_quantity' => number_format($quantity, 8, '.', ''),
            'total_cost'      => number_format($totalCost, 8, '.', ''),
            'status'          => 'filled',
            'created_at'      => $now,
            'updated_at'      => $now,
        ]);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return ['ok' => false, 'error' => 'transaction_failed', 'message' => 'Failed to record paper exchange order.'];
        }

        return [
            'ok'              => true,
            'order_id'        => $orderId,
            'symbol'          => $symbol,
            'side'            => $side,
            'quantity'        => $quantity,
            'price'           => $price,
            'total_cost'      => $totalCost,
            'status'          => 'filled',
            'updated_balances'=> $this->balances($userId),
        ];
    }

    public function cancelOrder(int $userId, string $orderId): array
    {
        // Enforce user_id matching to prevent IDOR
        $order = $this->db->table('bf_paper_exchange_orders')
            ->where('order_id', $orderId)
            ->where('user_id', $userId)
            ->get()
            ->getRowArray();

        if ($order === null) {
            return ['ok' => false, 'error' => 'not_found', 'message' => 'Order not found or access denied.'];
        }

        if ($order['status'] !== 'pending') {
            return [
                'ok'      => false,
                'error'   => 'cannot_cancel',
                'message' => "Order with status '{$order['status']}' cannot be cancelled.",
            ];
        }

        $this->db->table('bf_paper_exchange_orders')
            ->where('id', $order['id'])
            ->update([
                'status'     => 'cancelled',
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        return ['ok' => true, 'order_id' => $orderId, 'status' => 'cancelled'];
    }

    public function balances(int $userId): array
    {
        $this->ensureUserInitialized($userId);
        return $this->getUserBalanceMap($userId);
    }

    public function history(int $userId, int $limit = 50): array
    {
        return $this->db->table('bf_paper_exchange_orders')
            ->where('user_id', $userId)
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    protected function parseSymbol(string $symbol): array
    {
        $parts = explode('/', $symbol);
        if (count($parts) === 2) {
            return [strtoupper($parts[0]), strtoupper($parts[1])];
        }

        // Fallback for single symbol like BTC
        return [strtoupper($symbol), 'USD'];
    }

    protected function assertAssetTradable(string $baseAsset): void
    {
        $forbidden = ['MYMIG', 'MYMIGOLD', 'MYMIC', 'MYMICOIN'];
        if (in_array(strtoupper($baseAsset), $forbidden, true)) {
            throw new InvalidArgumentException("Asset '{$baseAsset}' is not tradable on the exchange.");
        }
    }

    protected function ensureUserInitialized(int $userId): void
    {
        $count = $this->db->table('bf_paper_exchange_balances')
            ->where('user_id', $userId)
            ->countAllResults();

        if ($count === 0) {
            $this->db->table('bf_paper_exchange_balances')->insert([
                'user_id'    => $userId,
                'asset'      => 'USD',
                'balance'    => '10000.00000000',
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }

    /**
     * @return array<string, float>
     */
    protected function getUserBalanceMap(int $userId): array
    {
        $rows = $this->db->table('bf_paper_exchange_balances')
            ->where('user_id', $userId)
            ->get()
            ->getResultArray();

        $map = ['USD' => 0.0];
        foreach ($rows as $row) {
            $map[$row['asset']] = (float) $row['balance'];
        }
        return $map;
    }

    protected function adjustBalance(int $userId, string $asset, float $delta): void
    {
        $row = $this->db->table('bf_paper_exchange_balances')
            ->where('user_id', $userId)
            ->where('asset', $asset)
            ->get()
            ->getRowArray();

        if ($row === null) {
            if ($delta < 0) {
                throw new InvalidArgumentException("Cannot create negative balance for {$asset}");
            }
            $this->db->table('bf_paper_exchange_balances')->insert([
                'user_id'    => $userId,
                'asset'      => $asset,
                'balance'    => number_format($delta, 8, '.', ''),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return;
        }

        $newBalance = (float) $row['balance'] + $delta;
        if ($newBalance < -0.00000001) {
            throw new InvalidArgumentException("Balance for {$asset} cannot become negative.");
        }

        // Clamp floating point epsilon at zero
        $newBalance = max(0.0, $newBalance);

        $this->db->table('bf_paper_exchange_balances')
            ->where('id', $row['id'])
            ->update([
                'balance'    => number_format($newBalance, 8, '.', ''),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
    }
}
