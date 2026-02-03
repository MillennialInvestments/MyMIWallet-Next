<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class InvestmentTickerDailyCountModel extends Model
{
    protected $table = 'bf_investment_ticker_daily_counts';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'ticker',
        'scan_date',
        'source',
        'scanner_key',
        'occurrences',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function incrementCount(string $ticker, string $scanDate, string $source, string $scannerKey, int $increment = 1): void
    {
        $builder = $this->db->table($this->table);
        $builder->where([
            'ticker' => $ticker,
            'scan_date' => $scanDate,
            'source' => $source,
            'scanner_key' => $scannerKey,
        ]);

        $builder->set('occurrences', 'occurrences + ' . $increment, false);
        $builder->set('updated_at', date('Y-m-d H:i:s'));
        $builder->update();

        if ($this->db->affectedRows() > 0) {
            return;
        }

        $builder = $this->db->table($this->table);
        $builder->ignore(true)->insert([
            'ticker' => $ticker,
            'scan_date' => $scanDate,
            'source' => $source,
            'scanner_key' => $scannerKey,
            'occurrences' => $increment,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
