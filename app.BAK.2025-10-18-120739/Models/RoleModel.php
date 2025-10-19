<?php
namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'bf_roles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['slug','label','created_at','updated_at'];

    public function bySlug(string $slug): ?array
    {
        return $this->where('slug',$slug)->first();
    }
}
