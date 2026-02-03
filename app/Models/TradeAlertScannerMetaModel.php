<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class TradeAlertScannerMetaModel extends Model
{
    protected $table = 'bf_trade_alert_scanner_meta';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'alert_id',
        'scanner_key',
        'scanner_family',
        'timeframe',
        'signal',
        'tags_json',
        'created_at',
    ];
    protected $useTimestamps = false;
}
