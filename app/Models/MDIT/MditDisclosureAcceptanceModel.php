<?php

namespace App\Models\MDIT;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class MditDisclosureAcceptanceModel extends Model
{
    protected $table = 'bf_mdit_disclosures_acceptance';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;

    protected $allowedFields = [
        'user_id',
        'disclosure_version',
        'accepted_on',
        'ip_address',
        'user_agent',
    ];
}
