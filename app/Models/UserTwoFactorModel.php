<?php
// PATCH: model for storing 2FA secrets
namespace App\Models;

use CodeIgniter\Model;

class UserTwoFactorModel extends Model
{
    protected $table      = 'bf_user_2fa';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id','is_enabled','secret_ciphertext','secret_iv','secret_tag','backup_codes_hashes','created_at','updated_at'
    ];
    protected $useTimestamps = false;

    public function byUser(int $userId): ?array
    {
        return $this->where('user_id', $userId)->first();
    }
}
