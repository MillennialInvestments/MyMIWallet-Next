<?php

namespace App\Models;

use CodeIgniter\Model;

class ErrorPatternModel extends Model
{
    protected $table = 'bf_error_patterns';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'fingerprint','category','error_type','severity','title','summary','likely_root_cause',
        'suggested_fix','controllers','services','tags','example_message',
        'occurrence_count','first_seen','last_seen','created_at','updated_at'
    ];

    protected $useTimestamps = false;

    public function upsertByFingerprint(string $fingerprint, array $data): int
    {
        $row = $this->where('fingerprint', $fingerprint)->first();

        $now = date('Y-m-d H:i:s');
        $data['updated_at'] = $now;

        if ($row) {
            $data['occurrence_count'] = (int)($data['occurrence_count'] ?? $row['occurrence_count'] ?? 0);
            $this->update((int)$row['id'], $data);
            return (int)$row['id'];
        }

        $data['fingerprint'] = $fingerprint;
        $data['created_at'] = $now;
        $this->insert($data);
        return (int)$this->getInsertID();
    }
}