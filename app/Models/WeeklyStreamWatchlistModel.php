<?php

namespace App\Models;

use CodeIgniter\Model;

class WeeklyStreamWatchlistModel extends Model
{
    protected $table            = 'bf_weekly_stream_watchlist';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'week_start_date',
        'watchlist_name',
        'symbol',
        'score',
        'notes',
        'created_at',
    ];
    protected $useTimestamps = false;
}
