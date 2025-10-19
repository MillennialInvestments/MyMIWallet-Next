<?php
namespace App\Models;

use CodeIgniter\Model;

class RoleUserModel extends Model
{
    protected $table = 'bf_role_user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['role_id','user_id','created_at'];
}
