<?php

declare(strict_types=1);

namespace App\Services;

use App\Libraries\MyMIAlerts;
use App\Models\AlertsModel;
use CodeIgniter\Database\BaseConnection;
use Config\Database;
use InvalidArgumentException;

class AlertService
{
    protected MyMIAlerts $alertManager;
    protected AlertsModel $alertsModel;
    protected MarketDataFreshnessService $freshnessService;
    protected BaseConnection $db;

    public function __construct(
        ?MyMIAlerts $alertManager = null,
        ?AlertsModel $alertsModel = null,
        ?MarketDataFreshnessService $freshnessService = null,
        ?BaseConnection $db = null
    ) {
        $this->alertManager    = $alertManager ?? new MyMIAlerts();
        $this->alertsModel     = $alertsModel ?? new AlertsModel();
        $this->freshnessService = $freshnessService ?? new MarketDataFreshnessService();
        $this->db              = $db ?? Database::connect();
    }

    public function getAlertManager(): MyMIAlerts
    {
        return $this->alertManager;
    }

    public function getAlertsModel(): AlertsModel
    {
        return $this->alertsModel;
    }

    public function generateAlertCommentary(int $alertId): ?array
    {
        $alert = $this->alertsModel->find($alertId);
        if (! is_array($alert) && ! is_object($alert)) {
            return null;
        }

        return $this->alertManager->generateAlertCommentaryWithKimi((array) $alert);
    }

    public function generateAlertSocialCopy(int $alertId): ?array
    {
        $alert = $this->alertsModel->find($alertId);
        if (! is_array($alert) && ! is_object($alert)) {
            return null;
        }

        return $this->alertManager->generateAlertSocialCopyWithKimi((array) $alert);
    }

    /**
     * @param int[] $ids
     * @return array<int, mixed>
     */
    public function generateAlertBatchCommentary(array $ids): array
    {
        if ($ids === []) {
            return [];
        }

        $alerts = $this->alertsModel->whereIn('id', $ids)->limit(count($ids))->findAll();
        $responses = [];

        foreach ($alerts as $alert) {
            $alertArr = (array) $alert;
            $alertId = (int) ($alertArr['id'] ?? 0);
            if ($alertId <= 0) {
                continue;
            }

            $responses[$alertId] = $this->alertManager->generateAlertCommentaryWithKimi($alertArr);
        }

        return $responses;
    }

    /**
     * Creates and certifies a new trade alert with validation, user authorization, and history tracking.
     *
     * @param array<string, mixed> $data
     * @param int|null $sessionUserId
     * @return array<string, mixed>
     */
    public function createTradeAlert(array $data, ?int $sessionUserId = null): array
    {
        $symbol = strtoupper(trim((string) ($data['symbol'] ?? $data['ticker'] ?? '')));
        if ($symbol === '' || ! preg_match('/^[A-Z0-9\.\-\^]{1,15}$/', $symbol)) {
            throw new InvalidArgumentException('Invalid or missing symbol');
        }

        $userId = $sessionUserId !== null && $sessionUserId > 0
            ? $sessionUserId
            : (int) ($data['user_id'] ?? $data['created_by'] ?? 0);

        if ($userId <= 0) {
            throw new InvalidArgumentException('Valid user_id required to create alert');
        }

        $entryPrice = isset($data['entry_price']) ? (float) $data['entry_price'] : 0.0;
        $targetPrice = isset($data['target_price']) && (float) $data['target_price'] > 0
            ? (float) $data['target_price']
            : ($entryPrice > 0 ? round($entryPrice * 1.03, 2) : 0.0);

        $stopLoss = isset($data['stop_loss']) && (float) $data['stop_loss'] > 0
            ? (float) $data['stop_loss']
            : ($entryPrice > 0 ? round($entryPrice * 0.98, 2) : 0.0);

        $orderStatus = strtoupper(trim((string) ($data['order_status'] ?? 'OPENING')));
        $status = ($orderStatus === 'OPENING' || $orderStatus === 'OPENED') ? 'Opened' : 'Closed';

        // Check for duplicate active alert on same symbol
        if ($status === 'Opened' && $this->db->tableExists('bf_investment_trade_alerts')) {
            $duplicate = $this->db->table('bf_investment_trade_alerts')
                ->where('ticker', $symbol)
                ->where('status', 'Opened')
                ->limit(1)
                ->get()
                ->getRowArray();

            if ($duplicate !== null) {
                return [
                    'status'    => 'duplicate',
                    'trade_id'  => (int) ($duplicate['id'] ?? 0),
                    'message'   => "Active alert already exists for {$symbol}",
                    'duplicate' => true,
                ];
            }
        }

        $record = [
            'active'                => 1,
            'status'                => $status,
            'occurrences'           => 1,
            'alert_count'           => 1,
            'distributed_count'     => 0,
            'created_on'            => date('Y-m-d H:i:s'),
            'created_by'            => $userId,
            'updated_at'            => date('Y-m-d H:i:s'),
            'alert_created'         => 1,
            'send_alert'            => 0,
            'alert_sent'            => 0,
            'ticker'                => $symbol,
            'exchange'              => strtoupper(trim((string) ($data['exchange'] ?? 'US'))),
            'company'               => (string) ($data['company'] ?? $symbol),
            'price'                 => $entryPrice,
            'entry_price'           => $entryPrice,
            'current_price'         => $entryPrice,
            'target_price'          => $targetPrice,
            'potential_price'       => $targetPrice,
            'stop_loss'             => $stopLoss,
            'locked_profit_stop'    => $targetPrice,
            'trailing_stop_percent' => isset($data['trailing_stop_percent']) ? (float) $data['trailing_stop_percent'] : 1.0,
            'order_status'          => $orderStatus,
            'category'              => (string) ($data['category'] ?? 'Active Buy Alert'),
            'trade_type'            => (string) ($data['trade_type'] ?? 'Swing Trade'),
            'market_sentiment'      => (string) ($data['market_sentiment'] ?? 'Bullish'),
            'trade_description'     => (string) ($data['trade_description'] ?? ''),
            'analysis_summary'      => (string) ($data['analysis_summary'] ?? ''),
            'notification_sent'     => 0,
            'submitted_date'        => date('Y-m-d'),
            'last_updated'          => date('Y-m-d'),
            'last_updated_time'     => date('H:i:s'),
        ];

        $tradeId = 0;
        if ($this->db->tableExists('bf_investment_trade_alerts')) {
            $this->db->table('bf_investment_trade_alerts')->insert($record);
            $tradeId = (int) $this->db->insertID();
        }

        // Record history snapshot
        $this->recordAlertHistorySnapshot([
            'trade_alert_id' => $tradeId,
            'ticker'         => $symbol,
            'user_id'        => $userId,
            'price'          => $entryPrice,
            'status'         => $status,
            'category'       => $record['category'],
            'send_alert'     => 0,
            'alerted_on'     => date('Y-m-d H:i:s'),
            'created_on'     => date('Y-m-d H:i:s'),
        ]);

        return [
            'status'    => 'success',
            'trade_id'  => $tradeId,
            'symbol'    => $symbol,
            'data'      => $record,
            'duplicate' => false,
        ];
    }

    /**
     * Evaluates a trade alert against live or resolved market prices.
     *
     * @param int $alertId
     * @param float|null $currentPrice
     * @return array<string, mixed>
     */
    public function evaluateAlert(int $alertId, ?float $currentPrice = null): array
    {
        if ($alertId <= 0 || ! $this->db->tableExists('bf_investment_trade_alerts')) {
            return [
                'status'   => 'error',
                'message'  => 'Invalid alert ID or table unavailable',
                'alert_id' => $alertId,
            ];
        }

        $alert = $this->db->table('bf_investment_trade_alerts')
            ->where('id', $alertId)
            ->limit(1)
            ->get()
            ->getRowArray();

        if ($alert === null) {
            return [
                'status'   => 'not_found',
                'message'  => "Alert #{$alertId} not found",
                'alert_id' => $alertId,
            ];
        }

        $symbol = strtoupper((string) ($alert['ticker'] ?? $alert['symbol'] ?? ''));
        $targetPrice = (float) ($alert['target_price'] ?? 0.0);
        $stopLoss = (float) ($alert['stop_loss'] ?? 0.0);
        $entryPrice = (float) ($alert['entry_price'] ?? 0.0);

        if ($currentPrice === null || $currentPrice <= 0.0) {
            $quote = $this->freshnessService->resolveSafePrice($symbol, $entryPrice);
            $currentPrice = (float) $quote['price'];
        }

        $currentStatus = (string) ($alert['status'] ?? 'Opened');
        $newStatus = $currentStatus;
        $evaluation = 'ACTIVE';

        if ($targetPrice > 0.0 && $currentPrice >= $targetPrice) {
            $newStatus = 'Target Hit';
            $evaluation = 'TARGET_HIT';
        } elseif ($stopLoss > 0.0 && $currentPrice <= $stopLoss) {
            $newStatus = 'Stop Hit';
            $evaluation = 'STOP_HIT';
        }

        $updated = false;
        if ($newStatus !== $currentStatus) {
            $this->db->table('bf_investment_trade_alerts')
                ->where('id', $alertId)
                ->limit(1)
                ->update([
                    'status'        => $newStatus,
                    'current_price' => $currentPrice,
                    'updated_at'    => date('Y-m-d H:i:s'),
                ]);
            $updated = true;

            $this->recordAlertHistorySnapshot([
                'trade_alert_id' => $alertId,
                'ticker'         => $symbol,
                'user_id'        => (int) ($alert['created_by'] ?? 0),
                'price'          => $currentPrice,
                'status'         => $newStatus,
                'category'       => (string) ($alert['category'] ?? 'Active Buy Alert'),
                'send_alert'     => (int) ($alert['send_alert'] ?? 0),
                'alerted_on'     => date('Y-m-d H:i:s'),
                'created_on'     => date('Y-m-d H:i:s'),
            ]);
        }

        return [
            'status'        => 'success',
            'alert_id'      => $alertId,
            'symbol'        => $symbol,
            'entry_price'   => $entryPrice,
            'current_price' => $currentPrice,
            'target_price'  => $targetPrice,
            'stop_loss'     => $stopLoss,
            'prior_status'  => $currentStatus,
            'new_status'    => $newStatus,
            'evaluation'    => $evaluation,
            'updated'       => $updated,
        ];
    }

    /**
     * Evaluates all currently opened active alerts.
     *
     * @param int $limit
     * @return array<string, mixed>
     */
    public function evaluateActiveAlerts(int $limit = 50): array
    {
        $limit = max(1, min($limit, 200));

        if (! $this->db->tableExists('bf_investment_trade_alerts')) {
            return [
                'evaluated_count' => 0,
                'targets_hit'     => 0,
                'stops_hit'       => 0,
                'active_count'    => 0,
                'details'         => [],
            ];
        }

        $activeAlerts = $this->db->table('bf_investment_trade_alerts')
            ->where('status', 'Opened')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();

        $targetsHit = 0;
        $stopsHit = 0;
        $activeCount = 0;
        $details = [];

        foreach ($activeAlerts as $alert) {
            $alertId = (int) ($alert['id'] ?? 0);
            if ($alertId <= 0) {
                continue;
            }

            $eval = $this->evaluateAlert($alertId);
            $details[] = $eval;

            if (($eval['evaluation'] ?? '') === 'TARGET_HIT') {
                $targetsHit++;
            } elseif (($eval['evaluation'] ?? '') === 'STOP_HIT') {
                $stopsHit++;
            } else {
                $activeCount++;
            }
        }

        return [
            'evaluated_count' => count($details),
            'targets_hit'     => $targetsHit,
            'stops_hit'       => $stopsHit,
            'active_count'    => $activeCount,
            'details'         => $details,
        ];
    }

    /**
     * Dispatches delivery of a trade alert across requested channels.
     *
     * @param int $alertId
     * @param string[] $channels
     * @param bool $dryRun
     * @return array<string, mixed>
     */
    public function deliverAlert(int $alertId, array $channels = ['discord', 'email'], bool $dryRun = false): array
    {
        if ($alertId <= 0 || ! $this->db->tableExists('bf_investment_trade_alerts')) {
            return [
                'status'  => 'error',
                'message' => 'Invalid alert ID or table unavailable',
            ];
        }

        $alert = $this->db->table('bf_investment_trade_alerts')
            ->where('id', $alertId)
            ->limit(1)
            ->get()
            ->getRowArray();

        if ($alert === null) {
            return [
                'status'  => 'not_found',
                'message' => "Alert #{$alertId} not found",
            ];
        }

        $deliveredChannels = [];
        $symbol = strtoupper((string) ($alert['ticker'] ?? ''));

        foreach ($channels as $channel) {
            $ch = strtolower(trim($channel));
            if ($ch === 'discord') {
                if (! $dryRun) {
                    try {
                        $this->alertManager->sendDiscordNotification($alert);
                        $deliveredChannels['discord'] = ['success' => true, 'mode' => 'live'];
                    } catch (\Throwable $e) {
                        $deliveredChannels['discord'] = ['success' => false, 'error' => $e->getMessage()];
                    }
                } else {
                    $deliveredChannels['discord'] = ['success' => true, 'mode' => 'dry_run'];
                }
            } elseif ($ch === 'email') {
                $deliveredChannels['email'] = ['success' => true, 'mode' => $dryRun ? 'dry_run' : 'queued'];
            }
        }

        // Persist sent status
        $this->db->table('bf_investment_trade_alerts')
            ->where('id', $alertId)
            ->limit(1)
            ->update([
                'send_alert'        => 1,
                'alert_sent'        => 1,
                'notification_sent' => 1,
                'updated_at'        => date('Y-m-d H:i:s'),
            ]);

        // Record history sent event
        $this->recordAlertHistorySnapshot([
            'trade_alert_id' => $alertId,
            'ticker'         => $symbol,
            'user_id'        => (int) ($alert['created_by'] ?? 0),
            'price'          => (float) ($alert['current_price'] ?? $alert['price'] ?? 0.0),
            'status'         => (string) ($alert['status'] ?? 'Opened'),
            'category'       => (string) ($alert['category'] ?? 'Active Buy Alert'),
            'send_alert'     => 1,
            'alerted_on'     => date('Y-m-d H:i:s'),
            'created_on'     => date('Y-m-d H:i:s'),
        ]);

        return [
            'status'    => 'success',
            'alert_id'  => $alertId,
            'symbol'    => $symbol,
            'channels'  => $deliveredChannels,
            'dry_run'   => $dryRun,
        ];
    }

    /**
     * Retrieves user-scoped alert history safely with bounded limit.
     *
     * @param int $userId
     * @param array<string, mixed> $filters
     * @param int $limit
     * @return array<int, array>
     */
    public function getUserAlertHistory(int $userId, array $filters = [], int $limit = 50): array
    {
        if ($userId <= 0 || ! $this->db->tableExists('bf_investment_alert_history')) {
            return [];
        }

        $limit = max(1, min($limit, 100));
        $builder = $this->db->table('bf_investment_alert_history');

        if ($this->hasColumnSafe('bf_investment_alert_history', 'user_id')) {
            $builder->where('user_id', $userId);
        }

        if (! empty($filters['ticker'])) {
            $builder->where('ticker', strtoupper(trim((string) $filters['ticker'])));
        }

        if (! empty($filters['category'])) {
            $builder->where('category', trim((string) $filters['category']));
        }

        if (! empty($filters['date_from'])) {
            $builder->where('alerted_on >=', $filters['date_from']);
        }

        if (! empty($filters['date_to'])) {
            $builder->where('alerted_on <=', $filters['date_to']);
        }

        return $builder->orderBy('alerted_on', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    /**
     * Retrieves alert history for a specific symbol.
     *
     * @param string $symbol
     * @param int $limit
     * @return array<int, array>
     */
    public function getAlertHistoryBySymbol(string $symbol, int $limit = 20): array
    {
        $symbol = strtoupper(trim($symbol));
        if ($symbol === '' || ! $this->db->tableExists('bf_investment_alert_history')) {
            return [];
        }

        $limit = max(1, min($limit, 100));

        return $this->db->table('bf_investment_alert_history')
            ->where('ticker', $symbol)
            ->orderBy('alerted_on', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    /**
     * Defensive snapshot recorder for alert history.
     *
     * @param array<string, mixed> $snapshot
     */
    private function recordAlertHistorySnapshot(array $snapshot): void
    {
        if (! $this->db->tableExists('bf_investment_alert_history')) {
            return;
        }

        $data = [
            'ticker'     => $snapshot['ticker'] ?? 'UNKNOWN',
            'alerted_on' => $snapshot['alerted_on'] ?? date('Y-m-d H:i:s'),
        ];

        $allowedCols = ['trade_alert_id', 'user_id', 'price', 'status', 'category', 'send_alert', 'created_on'];
        foreach ($allowedCols as $col) {
            if (isset($snapshot[$col]) && $this->hasColumnSafe('bf_investment_alert_history', $col)) {
                $data[$col] = $snapshot[$col];
            }
        }

        try {
            $this->db->table('bf_investment_alert_history')->insert($data);
        } catch (\Throwable $e) {
            log_message('error', 'AlertService::recordAlertHistorySnapshot failed: ' . $e->getMessage());
        }
    }

    /**
     * Checks column existence safely without throwing.
     */
    private function hasColumnSafe(string $table, string $column): bool
    {
        try {
            foreach ($this->db->getFieldData($table) as $f) {
                if (strcasecmp($f->name, $column) === 0) {
                    return true;
                }
            }
            return false;
        } catch (\Throwable $e) {
            return false;
        }
    }
}
