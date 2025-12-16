<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class ContentScannerRowModel extends Model
{
    protected $table = 'bf_content_scanner_rows';
    protected $primaryKey = 'id';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'ingest_id',
        'symbol',
        'raw_json',
        'stage',
        'mark',
        'mark_pct_change',
        'pct_chng_5d',
        'market_cap_m',
        'volume',
        'dollar_vol_m',
        'abvvol',
        'vol_365',
        'high_52w',
        'low_52w',
        'pct_1mo_chg',
        'created_at',
    ];
}
