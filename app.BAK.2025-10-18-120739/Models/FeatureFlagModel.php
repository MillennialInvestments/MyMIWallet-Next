<?php
namespace App\Models;

use CodeIgniter\Model;

// PATCH: model for feature flags
class FeatureFlagModel extends Model
{
    protected $table = 'bf_feature_flags';
    protected $primaryKey = 'id';
    protected $allowedFields = ['flag','enabled','rollout_pct','rules_json','description','created_at','updated_at'];
    protected $useTimestamps = false;

    public function getByFlag(string $flag): ?array
    {
        return $this->where('flag',$flag)->first();
    }
}
