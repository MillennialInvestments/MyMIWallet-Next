<?php namespace App\Models\Predictions;

use CodeIgniter\Model;

class PositionsModel extends Model
{
    protected $table = 'bf_predictions_positions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'user_id','market_id','option_id','avg_entry_odds_bips','stake_asset',
        'stake_total','payout_max','created_at','updated_at'
    ];

    public function forUser(int $userId, array $filters=[], int $limit=100, int $offset=0): array
    {
        $b = $this->where('user_id',$userId)->orderBy('market_id','DESC');
        if (!empty($filters['market_id'])) $b->where('market_id',(int)$filters['market_id']);
        return $b->findAll($limit,$offset);
    }

    /** Upsert logic for accumulating stake/payout and recalculating avg_entry_odds_bips */
    public function accumulate(
        int $userId, int $marketId, int $optionId, int $fillOddsBips, string $asset, float $stake, float $payout
    ): void {
        $existing = $this->where(compact('user_id','market_id','option_id'))->first();
        $now = date('Y-m-d H:i:s');
        if ($existing) {
            $newStake  = (float)$existing['stake_total'] + $stake;
            $weighted  = ((int)$existing['avg_entry_odds_bips'] * (float)$existing['stake_total']) + ($fillOddsBips * $stake);
            $newAvg    = (int) round($weighted / max(0.00000001,$newStake));
            $this->update((int)$existing['id'], [
                'avg_entry_odds_bips'=>$newAvg,
                'stake_total'=>$newStake,
                'payout_max'=>(float)$existing['payout_max'] + $payout,
                'updated_at'=>$now
            ]);
        } else {
            $this->insert([
                'user_id'=>$userId,'market_id'=>$marketId,'option_id'=>$optionId,
                'avg_entry_odds_bips'=>$fillOddsBips,'stake_asset'=>$asset,
                'stake_total'=>$stake,'payout_max'=>$payout,'created_at'=>$now
            ]);
        }
    }
}