<?php
namespace App\Models\Fin;

use CodeIgniter\Model;

class PriceEodModel extends Model
{
    protected $table = 'bf_fin_prices_eod';
    protected $primaryKey = 'id';
    protected $allowedFields = ['symbol','date','close','source','created_at'];
    protected $useTimestamps = false;

    public function lastClose(string $symbol): ?array
    {
        return $this->where('symbol',$symbol)->orderBy('date','DESC')->first();
    }
}

