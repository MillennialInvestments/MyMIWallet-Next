<?php

namespace App\Modules\AIOps\Models;

use App\Models\ObservedModel;

class AIOpsBudgetModel extends ObservedModel
{
    protected $table         = 'bf_aiops_budget';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = [
        'date',
        'cap_usd',
        'used_usd',
        'hard_stop_percent',
        'is_enabled',
        'alerted_at_80',
    ];

    public function findByDate(string $date): ?array
    {
        return $this->where('date', $date)->first();
    }
}
