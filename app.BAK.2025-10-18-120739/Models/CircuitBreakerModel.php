<?php
namespace App\Models;

use CodeIgniter\Model;

class CircuitBreakerModel extends Model
{
    protected $table      = 'bf_circuit_breakers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','state','failures','successes','opened_at','updated_at'];
    protected $useTimestamps = false;

    public function byName(string $name): ?array
    {
        return $this->where('name', $name)->first();
    }
}

