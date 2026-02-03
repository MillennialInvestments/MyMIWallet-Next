<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class InvestmentScannerLineageModel extends Model
{
    protected $table = 'bf_investment_scanner_lineage';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'scanner_key',
        'scanner_name',
        'source',
        'meta_json',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * @param array<string, mixed>|string|null $meta
     */
    public function rememberScanner(string $scannerKey, string $scannerName, string $source, $meta = null): void
    {
        helper('json_validation');

        $builder = $this->db->table($this->table);
        $builder->ignore(true)->insert([
            'scanner_key' => $scannerKey,
            'scanner_name' => $scannerName,
            'source' => $source,
            'meta_json' => aiops_normalize_json($meta),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
