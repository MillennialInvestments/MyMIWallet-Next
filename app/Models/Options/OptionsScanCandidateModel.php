<?php

declare(strict_types=1);

namespace App\Models\Options;

use CodeIgniter\Model;

class OptionsScanCandidateModel extends Model
{
    protected $table = 'bf_options_scan_candidates';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'ticker',
        'strategy',
        'expiry',
        'dte',
        'stock_price',
        'call_strike',
        'put_strike',
        'call_bid',
        'call_ask',
        'put_bid',
        'put_ask',
        'combined_debit',
        'target_profit',
        'required_exit_value',
        'breakeven_move',
        'breakeven_move_pct',
        'target_move',
        'target_move_pct',
        'atr_14',
        'historical_5d_range',
        'rvol_20d',
        'price_displacement_efficiency',
        'turnover_efficiency_pct',
        'vol_accel_1m',
        'vol_accel_5m',
        'vol_accel_15m',
        'range_expansion_ratio',
        'iv_call',
        'iv_put',
        'realized_vol_20d',
        'iv_rv_ratio',
        'spread_pct',
        'reachability_score',
        'ranking_score',
        'scan_status',
        'rejection_reason',
        'scanned_at',
        'created_at',
    ];
    protected $useTimestamps = false;

    /**
     * Fetch top ranked qualified opportunities.
     *
     * @param int $limit
     * @return array
     */
    public function getTopOpportunities(int $limit = 20): array
    {
        return $this->where('scan_status', 'qualified')
            ->orderBy('ranking_score', 'DESC')
            ->limit($limit)
            ->findAll();
    }

    /**
     * Fetch latest candidate for a specific ticker.
     *
     * @param string $ticker
     * @return array|null
     */
    public function getLatestByTicker(string $ticker): ?array
    {
        return $this->where('ticker', strtoupper($ticker))
            ->orderBy('scanned_at', 'DESC')
            ->first();
    }
}
