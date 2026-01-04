<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class RuntimeConfigModel extends Model
{
    protected $table          = 'bf_runtime_config';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields  = [
        'config_key',
        'config_value',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    public function getValue(string $key, $default = null)
    {
        $row = $this->where('config_key', $key)->first();
        return $row['config_value'] ?? $default;
    }

    public function setValue(string $key, $value): void
    {
        $existing = $this->where('config_key', $key)->first();
        $payload = [
            'config_key'   => $key,
            'config_value' => $value,
        ];

        if ($existing) {
            $this->update($existing['id'], $payload);
        } else {
            $this->insert($payload);
        }
    }
}
