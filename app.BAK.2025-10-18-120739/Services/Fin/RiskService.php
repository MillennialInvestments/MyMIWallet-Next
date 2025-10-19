<?php
namespace App\Services\Fin;

use App\Models\Fin\RiskBudgetModel;
use App\Models\Fin\RiskBreachModel;
use App\Models\Fin\PositionDailyModel;

class RiskService
{
    public static function evaluate(int $userId): array
    {
        $budget = (new RiskBudgetModel())->getForUser($userId);
        $portfolio = PositionService::computePortfolio($userId);
        $positions = $portfolio['positions'];
        $total = max(0.0, (float)$portfolio['total_value']);

        $breaches = [];

        foreach ($positions as $p) {
            if ($p['exposure_pct'] > (float)$budget['max_position_pct']) {
                $breaches[] = self::record($userId, 'position_pct', $p['symbol'], $p['exposure_pct'], (float)$budget['max_position_pct'], 'Position exposure too high');
            }
        }

        $byClass = [];
        foreach ($positions as $p) {
            $byClass[$p['asset_type']] = ($byClass[$p['asset_type']] ?? 0) + $p['mkt_value'];
        }
        foreach ($byClass as $class => $value) {
            $pct = $total > 0 ? ($value / $total) * 100.0 : 0.0;
            if ($pct > (float)$budget['max_asset_class_pct']) {
                $breaches[] = self::record($userId, 'asset_class_pct', $class, $pct, (float)$budget['max_asset_class_pct'], 'Asset class exposure too high');
            }
        }

        $today = date('Y-m-d');
        $yday = date('Y-m-d', strtotime('-1 day'));
        $todayV = self::portfolioValueOn($userId, $today, $total);
        $ydayV  = self::portfolioValueOn($userId, $yday);
        if ($ydayV !== null && $ydayV > 0) {
            $chg = (($todayV - $ydayV) / $ydayV) * 100.0;
            if ($chg < - (float)$budget['max_daily_loss_pct']) {
                $breaches[] = self::record($userId, 'daily_loss', null, abs($chg), (float)$budget['max_daily_loss_pct'], 'Daily loss exceeded');
            }
        }

        $peak = self::peakValueToDate($userId, $today);
        if ($peak !== null && $peak > 0 && $todayV !== null) {
            $dd = (($todayV - $peak) / $peak) * 100.0;
            if (abs($dd) > (float)$budget['max_drawdown_pct']) {
                $breaches[] = self::record($userId, 'drawdown', null, abs($dd), (float)$budget['max_drawdown_pct'], 'Portfolio drawdown exceeded');
            }
        }

        return ['budget'=>$budget,'portfolio'=>$portfolio,'breaches'=>array_values(array_filter($breaches))];
    }

    private static function record(int $userId, string $type, ?string $ref, float $metric, float $threshold, string $msg): array
    {
        (new RiskBreachModel())->insert([
            'user_id'=>$userId,
            'type'=>$type,
            'symbol'=>$ref,
            'metric'=>$metric,
            'threshold'=>$threshold,
            'details'=>$msg,
            'occurred_at'=>date('Y-m-d H:i:s'),
        ]);
        audit('risk.breach', ['type'=>$type,'ref'=>$ref,'pct'=>$metric,'thr'=>$threshold], 'risk');
        return ['type'=>$type,'ref'=>$ref,'metric'=>$metric,'threshold'=>$threshold,'message'=>$msg];
    }

    public static function snapshotToday(int $userId): void
    {
        $pf = PositionService::computePortfolio($userId);
        $date = date('Y-m-d');
        foreach ($pf['positions'] as $p) {
            (new PositionDailyModel())->insert([
                'user_id'=>$userId,
                'date'=>$date,
                'symbol'=>$p['symbol'],
                'qty'=>$p['qty'],
                'avg_cost'=>$p['avg_cost'],
                'market_price'=>$p['market_price'] ?? 0,
                'market_value'=>$p['mkt_value'],
                'unrealized_pnl'=>$p['unrealized'],
                'realized_pnl'=>$pf['realized'],
                'created_at'=>date('Y-m-d H:i:s'),
            ]);
        }
    }

    private static function portfolioValueOn(int $userId, string $date, ?float $fallback=null): ?float
    {
        $row = db_connect()->table('bf_fin_positions_daily')->selectSum('market_value','v')->where(['user_id'=>$userId,'date'=>$date])->get()->getRowArray();
        if ($row && $row['v'] !== null) {
            return (float)$row['v'];
        }
        return $fallback;
    }

    private static function peakValueToDate(int $userId, string $date): ?float
    {
        $row = db_connect()->table('bf_fin_positions_daily')
            ->selectMax('mv','mx')
            ->fromSubquery(
                db_connect()->table('bf_fin_positions_daily')->selectSum('market_value','mv')->where('user_id',$userId)->groupBy('date'),
                't'
            )->get()->getRowArray();
        return $row ? (float)$row['mx'] : null;
    }
}

