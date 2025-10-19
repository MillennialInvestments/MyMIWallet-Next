<?php
namespace App\Models;

use CodeIgniter\Model;

// PATCH: per-user feature flag overrides
class FeatureFlagOverrideModel extends Model
{
    protected $table = 'bf_feature_flag_overrides';
    protected $primaryKey = 'id';
    protected $allowedFields = ['flag','user_id','allow','created_at'];
    protected $useTimestamps = false;
}
