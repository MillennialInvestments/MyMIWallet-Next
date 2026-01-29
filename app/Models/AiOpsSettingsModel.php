<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class AiOpsSettingsModel extends Model
{
    protected $table = 'bf_aiops_settings';
    protected $primaryKey = 'setting_key';
    protected $returnType = 'array';
    protected $allowedFields = [
        'setting_key',
        'setting_value',
        'updated_at',
        'updated_by',
    ];
    protected $useTimestamps = true;
    protected $createdField = '';
    protected $updatedField = 'updated_at';

    public function getValue(string $key): ?string
    {
        $row = $this->find($key);
        return $row['setting_value'] ?? null;
    }
}
