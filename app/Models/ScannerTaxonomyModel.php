<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class ScannerTaxonomyModel extends Model
{
    protected $table = 'bf_scanner_taxonomy';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'scanner_name_raw',
        'scanner_key',
        'scanner_family',
        'default_timeframe',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function rememberScanner(array $payload): void
    {
        $scannerName = (string) ($payload['scanner_name_raw'] ?? '');
        if ($scannerName === '') {
            return;
        }

        $data = [
            'scanner_name_raw' => $scannerName,
            'scanner_key' => (string) ($payload['scanner_key'] ?? ''),
            'scanner_family' => $payload['scanner_family'] ?? null,
            'default_timeframe' => $payload['default_timeframe'] ?? null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table($this->table)->ignore(true)->insert($data);
    }
}
