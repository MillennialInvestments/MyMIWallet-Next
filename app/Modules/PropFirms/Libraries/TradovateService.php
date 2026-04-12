<?php

namespace App\Modules\PropFirms\Libraries;

use App\Modules\PropFirms\Models\PropBrokerConnectionModel;
use App\Modules\PropFirms\Models\PropFillModel;
use App\Modules\PropFirms\Models\PropOrderModel;
use App\Modules\PropFirms\Models\PropPositionModel;
use App\Modules\PropFirms\Models\PropSyncLogModel;
use App\Modules\PropFirms\Models\UserPropAccountModel;

class TradovateService
{
    private PropBrokerConnectionModel $connections;
    private PropOrderModel $orders;
    private PropFillModel $fills;
    private PropPositionModel $positions;
    private PropSyncLogModel $syncLogs;
    private UserPropAccountModel $accounts;

    public function __construct()
    {
        $this->connections = new PropBrokerConnectionModel();
        $this->orders = new PropOrderModel();
        $this->fills = new PropFillModel();
        $this->positions = new PropPositionModel();
        $this->syncLogs = new PropSyncLogModel();
        $this->accounts = new UserPropAccountModel();
    }

    public function connect(int $userPropAccountId, array $credentials): array
    {
        $row = [
            'user_prop_account_id' => $userPropAccountId,
            'broker_name' => 'tradovate',
            'external_account_id' => (string) ($credentials['external_account_id'] ?? $credentials['account_ref'] ?? ''),
            'connection_status' => 'connected',
            'last_heartbeat_at' => date('Y-m-d H:i:s'),
            'credentials_json' => json_encode([
                'access_token' => (string) ($credentials['access_token'] ?? ''),
                'refresh_token' => (string) ($credentials['refresh_token'] ?? ''),
                'expires_at' => (string) ($credentials['expires_at'] ?? ''),
                'environment' => (string) ($credentials['environment'] ?? 'demo'),
            ], JSON_UNESCAPED_SLASHES),
        ];

        $id = $this->connections->insert($row, true);

        return ['connection_id' => (int) $id, 'status' => $id ? 'connected' : 'error'];
    }

    public function disconnect(int $userPropAccountId): bool
    {
        return (bool) $this->connections
            ->where('user_prop_account_id', $userPropAccountId)
            ->set([
                'connection_status' => 'disconnected',
                'last_heartbeat_at' => date('Y-m-d H:i:s'),
            ])
            ->update();
    }

    public function refreshToken(int $connectionId, array $tokenPayload): bool
    {
        $connection = $this->connections->find($connectionId);
        if (! $connection) {
            return false;
        }

        $credentials = json_decode((string) ($connection['credentials_json'] ?? '{}'), true) ?: [];
        $credentials['access_token'] = (string) ($tokenPayload['access_token'] ?? ($credentials['access_token'] ?? ''));
        $credentials['refresh_token'] = (string) ($tokenPayload['refresh_token'] ?? ($credentials['refresh_token'] ?? ''));
        $credentials['expires_at'] = (string) ($tokenPayload['expires_at'] ?? date('Y-m-d H:i:s', time() + 3500));

        return $this->connections->update($connectionId, [
            'credentials_json' => json_encode($credentials, JSON_UNESCAPED_SLASHES),
            'last_heartbeat_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function fetchAccount(int $userPropAccountId): array
    {
        $account = $this->accounts->find($userPropAccountId) ?? [];
        $meta = json_decode((string) ($account['metadata_json'] ?? '{}'), true) ?: [];

        return [
            'account_ref' => (string) ($account['account_ref'] ?? ''),
            'balance' => (float) ($account['current_balance'] ?? 0),
            'starting_balance' => (float) ($account['starting_balance'] ?? 0),
            'daily_loss_limit' => (float) ($meta['initial_daily_loss_limit'] ?? 0),
        ];
    }

    public function fetchOrders(int $userPropAccountId, array $context = []): array
    {
        return $context['orders'] ?? [];
    }

    public function fetchFills(int $userPropAccountId, array $context = []): array
    {
        return $context['fills'] ?? [];
    }

    public function fetchPositions(int $userPropAccountId, array $context = []): array
    {
        return $context['positions'] ?? [];
    }

    public function normalizeOrder(array $order, int $userPropAccountId, ?int $connectionId): array
    {
        return [
            'user_prop_account_id' => $userPropAccountId,
            'prop_broker_connection_id' => $connectionId,
            'symbol' => strtoupper((string) ($order['symbol'] ?? 'UNKNOWN')),
            'side' => strtolower((string) ($order['side'] ?? 'buy')),
            'order_type' => strtolower((string) ($order['order_type'] ?? 'market')),
            'qty' => (float) ($order['qty'] ?? 0),
            'limit_price' => isset($order['limit_price']) ? (float) $order['limit_price'] : null,
            'status' => strtolower((string) ($order['status'] ?? 'new')),
            'external_order_id' => (string) ($order['external_order_id'] ?? ''),
            'submitted_at' => (string) ($order['submitted_at'] ?? date('Y-m-d H:i:s')),
        ];
    }

    public function normalizeFill(array $fill, int $propOrderId): array
    {
        return [
            'prop_order_id' => $propOrderId,
            'fill_qty' => (float) ($fill['fill_qty'] ?? $fill['qty'] ?? 0),
            'fill_price' => (float) ($fill['fill_price'] ?? $fill['price'] ?? 0),
            'fee_amount' => (float) ($fill['fee_amount'] ?? 0),
            'filled_at' => (string) ($fill['filled_at'] ?? date('Y-m-d H:i:s')),
            'external_fill_id' => (string) ($fill['external_fill_id'] ?? ''),
        ];
    }

    public function normalizePosition(array $position, int $userPropAccountId): array
    {
        return [
            'user_prop_account_id' => $userPropAccountId,
            'symbol' => strtoupper((string) ($position['symbol'] ?? 'UNKNOWN')),
            'side' => strtolower((string) ($position['side'] ?? 'long')),
            'qty' => (float) ($position['qty'] ?? 0),
            'avg_price' => (float) ($position['avg_price'] ?? 0),
            'unrealized_pnl' => (float) ($position['unrealized_pnl'] ?? 0),
            'opened_at' => (string) ($position['opened_at'] ?? date('Y-m-d H:i:s')),
            'closed_at' => $position['closed_at'] ?? null,
        ];
    }

    public function syncAccount(int $userPropAccountId, array $payload = []): array
    {
        $startedAt = date('Y-m-d H:i:s');
        $connection = $this->connections->where('user_prop_account_id', $userPropAccountId)->where('broker_name', 'tradovate')->orderBy('id', 'DESC')->first();
        $connectionId = $connection['id'] ?? null;

        $orderCount = $fillCount = $positionCount = 0;

        foreach ($this->fetchOrders($userPropAccountId, $payload) as $order) {
            $normalized = $this->normalizeOrder((array) $order, $userPropAccountId, $connectionId ? (int) $connectionId : null);
            $existing = $this->orders->where('external_order_id', (string) $normalized['external_order_id'])->where('user_prop_account_id', $userPropAccountId)->first();
            if ($existing) {
                $this->orders->update((int) $existing['id'], $normalized);
                $orderId = (int) $existing['id'];
            } else {
                $orderId = (int) $this->orders->insert($normalized, true);
            }
            $orderCount++;

            $fillRows = $payload['fills_by_order'][(string) ($normalized['external_order_id'] ?? '')] ?? [];
            foreach ($fillRows as $fill) {
                $normalizedFill = $this->normalizeFill((array) $fill, $orderId);
                $existingFill = $this->fills->where('external_fill_id', (string) $normalizedFill['external_fill_id'])->first();
                if ($existingFill) {
                    $this->fills->update((int) $existingFill['id'], $normalizedFill);
                } else {
                    $this->fills->insert($normalizedFill);
                }
                $fillCount++;
            }
        }

        foreach ($this->fetchFills($userPropAccountId, $payload) as $fill) {
            $externalOrderId = (string) ($fill['external_order_id'] ?? '');
            $order = $this->orders->where('external_order_id', $externalOrderId)->where('user_prop_account_id', $userPropAccountId)->first();
            if (! $order) {
                continue;
            }

            $normalizedFill = $this->normalizeFill((array) $fill, (int) $order['id']);
            $existingFill = $this->fills->where('external_fill_id', (string) $normalizedFill['external_fill_id'])->first();
            if ($existingFill) {
                $this->fills->update((int) $existingFill['id'], $normalizedFill);
            } else {
                $this->fills->insert($normalizedFill);
            }
            $fillCount++;
        }

        foreach ($this->fetchPositions($userPropAccountId, $payload) as $position) {
            $normalized = $this->normalizePosition((array) $position, $userPropAccountId);
            $existing = $this->positions->where('user_prop_account_id', $userPropAccountId)->where('symbol', (string) $normalized['symbol'])->first();
            if ($existing) {
                $this->positions->update((int) $existing['id'], $normalized);
            } else {
                $this->positions->insert($normalized);
            }
            $positionCount++;
        }

        $acct = $this->accounts->find($userPropAccountId) ?? [];
        $startingBalance = (float) ($acct['starting_balance'] ?? 0);
        $currentBalance = isset($payload['balance']) ? (float) $payload['balance'] : (float) ($acct['current_balance'] ?? $startingBalance);
        $peakBalance = max((float) ($acct['peak_balance'] ?? $startingBalance), $currentBalance);
        $drawdownLimit = (float) ($payload['drawdown_limit'] ?? max(0, $startingBalance - (float) ($payload['min_balance_threshold'] ?? 0)));
        $dailyLossLimit = (float) ($payload['daily_loss_limit'] ?? 0);
        $remainingDrawdown = max(0, $drawdownLimit - max(0, $peakBalance - $currentBalance));
        $remainingDll = max(0, $dailyLossLimit - max(0, $startingBalance - $currentBalance));

        $this->accounts->update($userPropAccountId, [
            'current_balance' => $currentBalance,
            'peak_balance' => $peakBalance,
            'remaining_drawdown' => $remainingDrawdown,
            'remaining_dll' => $remainingDll,
        ]);

        $summary = [
            'orders' => $orderCount,
            'fills' => $fillCount,
            'positions' => $positionCount,
            'balance' => $currentBalance,
            'peak_balance' => $peakBalance,
            'remaining_drawdown' => $remainingDrawdown,
            'remaining_dll' => $remainingDll,
        ];

        $this->syncLogs->insert([
            'user_prop_account_id' => $userPropAccountId,
            'sync_type' => (string) ($payload['sync_type'] ?? 'full_account_sync'),
            'status' => 'ok',
            'started_at' => $startedAt,
            'finished_at' => date('Y-m-d H:i:s'),
            'summary_json' => json_encode($summary, JSON_UNESCAPED_SLASHES),
        ]);

        return $summary;
    }
}
