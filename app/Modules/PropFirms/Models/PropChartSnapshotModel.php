<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropChartSnapshotModel extends ObservedModel
{
    protected $table = 'bf_prop_chart_snapshots';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [];
}
