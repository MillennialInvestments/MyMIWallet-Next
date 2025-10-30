<?php
namespace App\Services\Fin;

use App\Models\Fin\TradeModel;

class PositionService
{
    /**
     * Build positions and realized P/L using weighted-average cost.
     * @return array{positions:array, realized:float, total_value:float}
     */
    public static function computePortfolio(int $userId): array
    {
        $trades = (new TradeModel())->byUser($userId);
        $positions = [];
        $realized = 0.0;

        foreach ($trades as $t) {
            $sym = $t['symbol'];
            $side = strtolower($t['side']);
            $qty = (float)$t['qty'];
            $price = (float)$t['price'];
            $fee = (float)($t['fee'] ?? 0);
            $type = (string)$t['asset_type'];

            $p = $positions[$sym] ?? ['symbol'=>$sym,'qty'=>0.0,'avg_cost'=>0.0,'asset_type'=>$type];
            if ($side === 'buy') {
                $newQty = $p['qty'] + $qty;
                $p['avg_cost'] = ($p['qty'] * $p['avg_cost'] + $qty * $price + $fee) / max(1e-9, $newQty);
                $p['qty'] = $newQty;
            } else {
                $sellQty = min($qty, $p['qty']);
                $realized += ($price - $p['avg_cost']) * $sellQty - $fee;
                $p['qty'] -= $sellQty;
                if ($p['qty'] <= 1e-9) {
                    $p['qty'] = 0;
                    $p['avg_cost'] = 0;
                }
            }
            $positions[$sym] = $p;
        }

        $total = 0.0;
        foreach ($positions as $sym => $p) {
            if ($p['qty'] <= 0) {
                unset($positions[$sym]);
                continue;
            }
            $mp = PriceService::getEodPrice($sym);
            $mv = ($mp ?? 0.0) * $p['qty'];
            $un = $mp !== null ? ($mp - $p['avg_cost']) * $p['qty'] : 0.0;
            $pct = ($p['avg_cost'] > 0 && $mp !== null) ? (($mp - $p['avg_cost']) / $p['avg_cost']) * 100.0 : 0.0;
            $positions[$sym]['market_price'] = $mp;
            $positions[$sym]['mkt_value'] = $mv;
            $positions[$sym]['unrealized'] = $un;
            $positions[$sym]['pnl_pct'] = $pct;
            $total += $mv;
        }

        foreach ($positions as $sym => $p) {
            $positions[$sym]['exposure_pct'] = $total > 0 ? ($p['mkt_value'] / $total) * 100.0 : 0.0;
        }

        return ['positions'=>array_values($positions),'realized'=>$realized,'total_value'=>$total];
    }
}

