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

        $existing = $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', $ticker)
            ->where('status', $status)
            ->where('source', 'scanner')
            ->get()
            ->getRowArray();

        if ($existing) {
            $alertId = (int) $existing['id'];
            $this->db->table('bf_investment_trade_alerts')
                ->where('id', $alertId)
                ->update([
                    'category' => $category,
                    'trade_type' => $result->direction,
                    'price' => $result->price,
                    'current_price' => $result->price,
                    'ema_9' => $result->ema8,
                    'ema_21' => $result->ema13,
                    'ema_34' => $result->ema55,
                    'volume' => $result->volume,
                    'occurrences' => ((int) ($existing['occurrences'] ?? 0)) + 1,
                    'last_updated' => $now,
                    'last_updated_time' => $now,
                    'modified_on' => $now,
                ]);
        } else {
            $this->db->table('bf_investment_trade_alerts')->insert([
                'active' => 1,
                'status' => $status,
                'send_alert' => 1,
                'alert_created' => 1,
                'ticker' => $ticker,
                'exchange' => 'UNKNOWN',
                'category' => $category,
                'trade_type' => $result->direction,
                'price' => $result->price,
                'current_price' => $result->price,
                'potential_price' => $result->price,
                'ema_9' => $result->ema8,
                'ema_21' => $result->ema13,
                'ema_34' => $result->ema55,
                'volume' => $result->volume,
                'trade_description' => 'Scanner signal: ' . $result->signal . ' (' . $result->timeframe . ')',
                'occurrences' => 1,
                'notification_sent' => 0,
                'source' => 'scanner',
                'created_on' => $now,
                'last_updated' => $now,
                'last_updated_time' => $now,
            ]);
            $alertId = (int) $this->db->insertID();
        }

        $this->db->table('bf_investment_alert_history')->insert([
            'trade_id' => $alertId,
            'ticker' => $ticker,
            'category' => $category,
            'status' => $status,
            'occurrences' => $existing ? ((int) ($existing['occurrences'] ?? 0)) + 1 : 1,
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
