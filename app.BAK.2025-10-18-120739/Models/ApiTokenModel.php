<?php
// PATCH: API token storage model
namespace App\Models;
use CodeIgniter\Model;

class ApiTokenModel extends Model
{
    protected $table = 'bf_api_tokens';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','token_prefix','token_hash','scopes_json','last_used_at','revoked_at','created_at'];
    protected $useTimestamps = false;

    public function findActiveByPrefix(string $prefix): ?array
    {
        return $this->where(['token_prefix'=>$prefix])->where('revoked_at', null)->first();
    }
}
