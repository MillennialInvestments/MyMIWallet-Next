<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class EmailOutboxModel extends Model
{
    protected $table = 'bf_email_outbox';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;

    protected $allowedFields = [
        'user_id',
        'to_email',
        'subject',
        'type',
        'status',
        'error_message',
        'provider',
        'meta_json',
        'created_at',
        'sent_at',
    ];

    public function getFiltered(array $filters, int $limit = 100, int $offset = 0): array
    {
        $builder = $this->builder();

        if (! empty($filters['type'])) {
            $builder->where('type', $filters['type']);
        }

        if (! empty($filters['status'])) {
            $builder->where('status', $filters['status']);
        }

        if (! empty($filters['date_from'])) {
            $builder->where('created_at >=', $filters['date_from'] . ' 00:00:00');
        }

        if (! empty($filters['date_to'])) {
            $builder->where('created_at <=', $filters['date_to'] . ' 23:59:59');
        }

        if (! empty($filters['search'])) {
            $builder->groupStart()
                ->like('to_email', $filters['search'])
                ->orLike('subject', $filters['search'])
                ->groupEnd();
        }

        return $builder
            ->orderBy('id', 'DESC')
            ->limit($limit, $offset)
            ->get()
            ->getResultArray();
    }

    public function countFiltered(array $filters): int
    {
        $builder = $this->builder();

        if (! empty($filters['type'])) {
            $builder->where('type', $filters['type']);
        }

        if (! empty($filters['status'])) {
            $builder->where('status', $filters['status']);
        }

        if (! empty($filters['date_from'])) {
            $builder->where('created_at >=', $filters['date_from'] . ' 00:00:00');
        }

        if (! empty($filters['date_to'])) {
            $builder->where('created_at <=', $filters['date_to'] . ' 23:59:59');
        }

        if (! empty($filters['search'])) {
            $builder->groupStart()
                ->like('to_email', $filters['search'])
                ->orLike('subject', $filters['search'])
                ->groupEnd();
        }

        return $builder->countAllResults();
    }
}
