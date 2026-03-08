<?php

declare(strict_types=1);

namespace App\Services\Scanning;

use App\Libraries\MyMIAlerts;
use Config\Database;

final class ScannerAlertBridge
{
    public function __construct(
        private readonly \CodeIgniter\Database\BaseConnection $db,
        private readonly MyMIAlerts $alerts,
    ) {
    }

    public function syncToAlerts(ScannerResult $result): int
    {
        $ticker = strtoupper($result->symbol);
        if ($ticker === '') {
            return 0;
        }

        $category = $this->mapSignalToCategory($result->signal);
        $status = 'Opened';
        $now = date('Y-m-d H:i:s');

        $sql = <<<'SQL'
INSERT INTO bf_investment_trade_alerts
(
    active,
    status,
    send_alert,
    alert_created,
    ticker,
    exchange,
    category,
    trade_type,
    price,
    current_price,
    potential_price,
    ema_9,
    ema_21,
    ema_34,
    volume,
    trade_description,
    occurrences,
    notification_sent,
    source,
    created_on,
    last_updated,
    last_updated_time,
    modified_on
)
VALUES
(
    1,
    ?,
    1,
    1,
    ?,
    'UNKNOWN',
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    1,
    0,
    'scanner',
    ?,
    ?,
    ?,
    ?
)
ON DUPLICATE KEY UPDATE
    category = VALUES(category),
    trade_type = VALUES(trade_type),
    price = VALUES(price),
    current_price = VALUES(current_price),
    potential_price = VALUES(potential_price),
    ema_9 = VALUES(ema_9),
    ema_21 = VALUES(ema_21),
    ema_34 = VALUES(ema_34),
    volume = VALUES(volume),
    trade_description = VALUES(trade_description),
    occurrences = occurrences + 1,
    last_updated = VALUES(last_updated),
    last_updated_time = VALUES(last_updated_time),
    modified_on = VALUES(modified_on)
SQL;

        $this->db->query($sql, [
            $status,
            $ticker,
            $category,
            $result->direction,
            $result->price,
            $result->price,
            $result->price,
            $result->ema8,
            $result->ema13,
            $result->ema55,
            $result->volume,
            'Scanner signal: ' . $result->signal . ' (' . $result->timeframe . ')',
            $now,
            $now,
            $now,
            $now,
        ]);

        $alertRow = $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', $ticker)
            ->where('status', $status)
            ->where('source', 'scanner')
            ->orderBy('id', 'DESC')
            ->get(1)
            ->getRowArray();

        $alertId = (int) ($alertRow['id'] ?? 0);
        $existingOccurrences = (int) ($alertRow['occurrences'] ?? 1);

        $this->db->table('bf_investment_alert_history')->insert([
            'trade_id' => $alertId,
            'ticker' => $ticker,
            'category' => $category,
            'status' => $status,
            'occurrences' => $existingOccurrences,
            'source_email' => 'scanner',
            'email_subject' => 'Scanner Signal ' . $result->signal,
            'email_date' => $result->occurredOn,
            'created_on' => $now,
            'details' => json_encode([
                'signal' => $result->signal,
                'direction' => $result->direction,
                'timeframe' => $result->timeframe,
                'price' => $result->price,
                'vwap' => $result->vwap,
                'ema8' => $result->ema8,
                'ema13' => $result->ema13,
                'ema55' => $result->ema55,
                'last_liq_high' => $result->lastLiqHigh,
                'last_liq_low' => $result->lastLiqLow,
                'volume' => $result->volume,
                'vol_sma20' => $result->volSma20,
                'atr14' => $result->atr14,
                'payload' => $result->payload,
            ], JSON_UNESCAPED_SLASHES),
        ]);

        $latest = $this->db->table('bf_investment_trade_alerts')->where('id', $alertId)->get()->getRowArray() ?: [];
        if ((int) ($latest['notification_sent'] ?? 0) === 0) {
            $this->alerts->sendDiscordNotification($latest);
        }

        return $alertId;
    }

    private function mapSignalToCategory(string $signal): string
    {
        return match (strtoupper($signal)) {
            'SHIFT' => 'Momentum Shift',
            'H_SHIFT' => 'Hard Shift',
            'LIQ_BREAK' => 'Liquidity Break',
            'LIQ_SWEEP' => 'Liquidity Sweep',
            default => 'Scanner Signal',
        };
    }

    public static function makeDefault(): self
    {
        return new self(Database::connect(), service('mymialerts'));
    }
}
