<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class AiOpsReviewLedgerModel extends Model
{
    protected $table = 'aiops_review_ledger';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'scanner_name',
        'file_path',
        'hash_at_review',
        'decision',
        'pr_ref',
        'summary',
        'reviewed_at',
    ];
    protected $useTimestamps = false;

    public function wasReviewedWithHash(string $scannerName, string $filePath, string $hash): bool
    {
        return $this->where('scanner_name', $scannerName)
            ->where('file_path', $filePath)
            ->where('hash_at_review', $hash)
            ->first() !== null;
    }

    public function recordDecision(string $scannerName, string $filePath, string $hash, string $decision, ?string $summary = null, ?string $prRef = null): void
    {
        if ($this->wasReviewedWithHash($scannerName, $filePath, $hash)) {
            return;
        }

        $this->insert([
            'scanner_name' => $scannerName,
            'file_path' => $filePath,
            'hash_at_review' => $hash,
            'decision' => $decision,
            'pr_ref' => $prRef,
            'summary' => $summary,
            'reviewed_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
