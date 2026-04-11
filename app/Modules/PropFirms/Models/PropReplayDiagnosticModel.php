<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropReplayDiagnosticModel extends ObservedModel
{
    protected $table = 'bf_prop_replay_diagnostics';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [];
}
