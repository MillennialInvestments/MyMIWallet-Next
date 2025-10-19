<?php

namespace App\Models\Marketing;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class AudienceModel extends Model
{
    protected $table = 'bf_audience';
    protected $primaryKey = 'id';
    protected $allowedFields = ['campaign_id', 'user_id', 'account_type'];

    // Selects users based on account type
    public function getUsersByAccountType(string $accountType)
    {
        return $this->where('account_type', $accountType)->findAll();
    }
}
