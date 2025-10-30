<?php
namespace App\Models;

use CodeIgniter\Model;

class UserPermissionOverrideModel extends Model
{
    protected $table = 'bf_user_permission_overrides';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','permission_id','allow','created_at'];
}
