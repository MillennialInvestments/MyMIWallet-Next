<?php
namespace App\Models;

use CodeIgniter\Model;

class PermissionRoleModel extends Model
{
    protected $table = 'bf_permission_role';
    protected $primaryKey = 'id';
    protected $allowedFields = ['permission_id','role_id','created_at'];
}
