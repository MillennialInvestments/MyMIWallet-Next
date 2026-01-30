<?php

namespace App\Models\MDIT;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class MditInvestorProfileModel extends Model
{
    protected $table = 'bf_mdit_investor_profiles';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_on';
    protected $updatedField = 'updated_on';

    protected $allowedFields = [
        'user_id',
        'kyc_status',
        'accreditation_status',
        'risk_ack_on',
        'created_on',
        'updated_on',
    ];
}
