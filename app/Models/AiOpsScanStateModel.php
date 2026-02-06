<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class AiOpsScanStateModel extends Model
{
    protected $table = 'aiops_scan_state';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'scanner_name',
        'status',
        'last_cursor',
        'sleep_seconds',
        'batch_size',
        'max_prs_per_run',
        'cycle_count',
        'last_run_at',
        'notes',
        'updated_at',
    ];
    protected $useTimestamps = false;

    public function getOrCreateScannerState(string $scannerName): array
    {
        $row = $this->where('scanner_name', $scannerName)->first();
        if ($row) {
            return $row;
        }

        $this->insert([
            'scanner_name' => $scannerName,
            'status' => 'idle',
            'sleep_seconds' => 900,
            'batch_size' => 5,
            'max_prs_per_run' => 1,
            'cycle_count' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return (array) $this->where('scanner_name', $scannerName)->first();
    }
}
