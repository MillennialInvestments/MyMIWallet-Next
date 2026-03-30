<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class RouteErrorHeatmapModel extends Model
{
    protected $table = 'bf_route_error_heatmap';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'route',
        'error_type',
        'status_code',
        'hit_count',
        'last_seen',
    ];
}
