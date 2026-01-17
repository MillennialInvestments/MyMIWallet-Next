<?php

namespace App\Models;

use CodeIgniter\Model;

class SignalFilesModel extends Model
{
    protected $table         = 'bf_investment_signal_files';
    protected $primaryKey    = 'id';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = [
        'week_key',
        'file_date',
        'file_path',
        'file_name',
        'category',
        'signal_type',
        'file_hash',
        'rows_total',
        'rows_inserted',
        'rows_skipped',
        'processed_at',
        'created_at',
        'updated_at',
    ];

    public function alreadyProcessed(string $filePath, string $fileHash): bool
    {
        return (bool) $this->where('file_path', $filePath)
            ->where('file_hash', $fileHash)
            ->first();
    }
}
