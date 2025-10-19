<?php
namespace App\Models;

use CodeIgniter\Model;

class UserSessionModel extends Model
{
    protected $table      = 'bf_user_sessions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['session_id','user_id','revoked','created_at','updated_at'];
    protected $useTimestamps = true;

    public function isRevoked(string $sessionId): bool
    {
        $row = $this->where('session_id', $sessionId)->first();
        return $row ? (bool) ($row['revoked'] ?? 0) : false;
    }
}

