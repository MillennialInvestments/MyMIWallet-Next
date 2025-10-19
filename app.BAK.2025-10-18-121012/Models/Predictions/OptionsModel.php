<?php namespace App\Models\Predictions;

use CodeIgniter\Model;

class OptionsModel extends Model
{
    protected $table = 'bf_predictions_options';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'market_id','label','odds_bips','liquidity_gold','is_winner','created_at','updated_at'
    ];

    public function forMarket(int $marketId): array
    {
        return $this->where('market_id',$marketId)->orderBy('id','ASC')->findAll();
    }

    public function setWinner(int $marketId, int $optionId): void
    {
        $this->where('market_id',$marketId)->set(['is_winner'=>0,'updated_at'=>date('Y-m-d H:i:s')])->update();
        $this->update($optionId, ['is_winner'=>1,'updated_at'=>date('Y-m-d H:i:s')]);
    }

    public function addLiquidityGold(int $optionId, float $delta): void
    {
        // atomic in DB: liquidity_gold = liquidity_gold + delta
        $this->where('id',$optionId)
             ->set('liquidity_gold', "liquidity_gold + ".$this->db->escape($delta), false)
             ->update();
    }
}