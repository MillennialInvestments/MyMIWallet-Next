<?php

namespace App\Models\Predictions;

use CodeIgniter\Model;

/**
 * Stores per-order settlement rows for prediction markets.
 *
 * Suggested table (rename $table if needed):
 *   bf_predictions_settlements
 */
class SettlementsModel extends Model
{
    protected $table            = 'bf_predictions_settlements';   // <— change if your table is different
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'order_id',          // FK to trades/orders table
        'user_id',           // owner of the order
        'market_id',         // the market this relates to
        'option_id',         // YES/NO (or outcome id)
        'stake_asset',       // e.g. 'USDC', 'SOL'
        'stake_amount',      // decimal string or float
        'fee_asset',         // optional (defaults to stake_asset if null)
        'fee_amount',        // settlement fee charged
        'payout_asset',      // asset of the payout
        'payout_amount',     // final payout after fees
        'fill_odds_bips',    // odds at fill time (1/10000)
        'result',            // 'won' | 'lost' | 'void' | 'cancelled' | null (pre-settlement)
        'settled_at',        // datetime when settlement applied
        'created_at',        // auto
        'updated_at',        // auto
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $dateFormat    = 'datetime';

    // Casting for safer math/JSON
    protected $casts = [
        'id'             => 'integer',
        'order_id'       => 'integer',
        'user_id'        => 'integer',
        'market_id'      => 'integer',
        'option_id'      => 'integer',
        'stake_amount'   => 'float',
        'fee_amount'     => 'float',
        'payout_amount'  => 'float',
        'fill_odds_bips' => 'integer',
        'settled_at'     => 'datetime',
        'created_at'     => 'datetime',
        'updated_at'     => 'datetime',
    ];

    // Basic validation (tighten as your schema requires)
    protected $validationRules = [
        'order_id'     => 'required|is_natural_no_zero',
        'user_id'      => 'required|is_natural_no_zero',
        'market_id'    => 'required|is_natural_no_zero',
        'option_id'    => 'required|is_natural_no_zero',
        'stake_asset'  => 'required|alpha_numeric_punct',
        'stake_amount' => 'required|greater_than_equal_to[0]',
        'fee_amount'   => 'permit_empty|greater_than_equal_to[0]',
        'fill_odds_bips' => 'permit_empty|is_natural',
        'result'       => 'permit_empty|in_list[won,lost,void,cancelled]',
    ];

    /* --------------------- Query helpers --------------------- */

    public function forOrder(int $orderId): array
    {
        return $this->where('order_id', $orderId)
                    ->orderBy('id', 'ASC')
                    ->findAll();
    }

    public function forUser(int $userId, int $limit = 100, int $offset = 0): array
    {
        return $this->where('user_id', $userId)
                    ->orderBy('id', 'DESC')
                    ->findAll($limit, $offset);
    }

    public function forMarket(int $marketId, ?string $result = null, int $limit = 100, int $offset = 0): array
    {
        $builder = $this->where('market_id', $marketId);
        if ($result !== null) {
            $builder->where('result', $result);
        }
        return $builder->orderBy('id', 'DESC')->findAll($limit, $offset);
    }

    public function unsettledForMarket(int $marketId, int $limit = 500, int $offset = 0): array
    {
        return $this->where('market_id', $marketId)
                    ->where('result', null)
                    ->orderBy('id', 'ASC')
                    ->findAll($limit, $offset);
    }

    /* --------------------- Write helpers --------------------- */

    /**
     * Apply a settlement decision to a row (by ID or by order_id).
     * $decision = 'won'|'lost'|'void'|'cancelled'
     */
    public function settle(array $where, string $decision, ?float $payoutAmount = null, ?string $payoutAsset = null): bool
    {
        $data = [
            'result'        => $decision,
            'payout_amount' => $payoutAmount,
            'payout_asset'  => $payoutAsset,
            'settled_at'    => date('Y-m-d H:i:s'),
        ];
        return (bool) $this->where($where)->set($data)->update();
    }

    /**
     * Utility: compute fair payout (gross) from odds + stake.
     * Example: bips=6000 (60%) → decimal odds ~1/0.6=1.666…, gross=stake*1.666…
     */
    public static function computeGrossPayoutFromBips(float $stake, int $fillOddsBips): float
    {
        $prob = max(1, $fillOddsBips) / 10000;        // prevent div/0
        $odds = $prob > 0 ? 1 / $prob : 0;
        return round($stake * $odds, 8);
    }
}
