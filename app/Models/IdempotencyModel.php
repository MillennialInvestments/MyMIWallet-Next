<?php
namespace App\Models;

use CodeIgniter\Model;

class IdempotencyModel extends Model
{
    protected $table      = 'bf_idempotency';
    protected $primaryKey = 'id';
    protected $allowedFields = ['key','request_hash','status_code','response_json','state','created_at','updated_at','expires_at'];
    protected $useTimestamps = false;

    public function findByKey(string $key): ?array
    {
        return $this->where('key', $key)->first();
    }
}

