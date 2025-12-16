<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class ContentScannerIngestModel extends Model
{
    protected $table = 'bf_content_scanner_ingest';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'scan_name',
        'quote_ts',
        'payload_hash',
        'source',
        'row_count',
        'status',
        'created_at',
        'updated_at',
    ];
}