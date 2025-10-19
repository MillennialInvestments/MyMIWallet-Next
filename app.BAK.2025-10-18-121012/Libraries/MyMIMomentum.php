<?php
namespace App\Libraries;

use App\Models\AlertsModel;
use CodeIgniter\Database\ConnectionInterface;

#[\AllowDynamicProperties]
class MyMIMomentum
{
    protected $db;
    protected $alertsModel;

    public function __construct(ConnectionInterface $db = null)
    {
        $this->db = $db ?? db_connect();
        $this->alertsModel = new AlertsModel();
    }

    public function analyzeMomentum($symbol, $days = 21): array
    {
        $rows = $this->alertsModel
            ->getTechnicalSnapshots($symbol, $days); // Custom method shown below

        if (count($rows) < 2) {
            return ['status' => 'error', 'message' => 'Insufficient data'];
        }

        $rsiTrend     = end($rows)['rsi'] - $rows[0]['rsi'];
        $priceChange  = end($rows)['price'] - $rows[0]['price'];
        $momentumScore = $priceChange * $rsiTrend;

        return [
            'symbol'            => $symbol,
            'rsi_trend'         => $rsiTrend,
            'price_change'      => $priceChange,
            'momentum_strength' => round($momentumScore, 2),
        ];
    }

    public function scoreTradeOpportunity(string $symbol, int $days = 5, int $tradeId = null, ): float
    {
        // Fetch alert history for the past N days
        $history = $this->alertsModel->getAlertHistoryByTicker($symbol, $days);
        
        if (empty($history) || count($history) < 2) {
            log_message('warning', "⚠️ No history found for {$symbol}. Consider triggering backfill.");

            // Auto-backfill attempt
            if (method_exists($this->alertsModel, 'insertAlertSnapshot')) {
                $this->alertsModel->insertAlertSnapshot($symbol, $tradeId);
                log_message('info', "📈 Auto-triggered snapshot insert for {$symbol}");
            }

            // Try fallback to current alert data
            $current = $this->alertsModel->getAlertBySymbolExt($symbol);

            if (!$current) {
                log_message('error', "MyMIMomentum::scoreTradeOpportunity - No fallback alert found for {$symbol}.");
                return 0.0;
            }

            $price = floatval($current['price'] ?? 0.0);
            $rsi = floatval($current['ema_34'] ?? 50.0); // Use EMA 34 as a RSI proxy

            // Guard against missing values
            if ($price <= 0) {
                log_message('debug', "MyMIMomentum::scoreTradeOpportunity - skipped invalid price for {$symbol}");
                return 0.0;
            }
            if ($rsi <= 0) {
                log_message('debug', "MyMIMomentum::scoreTradeOpportunity - skipped invalid RSI for {$symbol}");
                return 0.0;
            }

            $momentumScore = ($price * 0.25) + ($rsi * 0.75);
            log_message('debug', "Fallback score for {$symbol} | Price: {$price} | RSI/EMA: {$rsi} | Score: {$momentumScore}");

            return round($momentumScore, 2);
        }

        // Process historical data
        $start = end($history);   // Oldest
        $end = reset($history);   // Most recent

        $priceDelta = floatval($end['price'] ?? 0) - floatval($start['price'] ?? 0);
        $rsiDelta = floatval($end['rsi'] ?? 0) - floatval($start['rsi'] ?? 0);

        // Compute score based on deltas
        $momentumScore = ($priceDelta * 2) + ($rsiDelta * 1.5);

        log_message('debug', "MyMIMomentum::scoreTradeOpportunity - {$symbol} | Start Price: {$start['price']} | End Price: {$end['price']} | ΔPrice: {$priceDelta} | ΔRSI: {$rsiDelta} | Score: {$momentumScore}");

        return round($momentumScore, 2);
    }

}
?>
