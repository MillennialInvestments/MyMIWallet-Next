<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthRegistrationAttemptModel extends Model
{
    protected $table            = 'bf_auth_registration_attempts';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $allowedFields    = [
        'email',
        'email_hash',
        'ip_address',
        'user_agent',
        'uri',
        'status',
        'error_message',
    ];
}