<?php
namespace App\Models;

use CodeIgniter\Model;

class PermissionModel extends Model
{
    protected $table = 'bf_permissions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['slug','label','created_at','updated_at'];

    public function bySlug(string $slug): ?array
    {
        return $this->where('slug',$slug)->first();
    }
}
