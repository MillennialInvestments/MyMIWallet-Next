<?php

namespace App\Services\AIOps;

use App\Models\AIOpsInstructionModel;

class DeduplicationService
{
    protected AIOpsInstructionModel $instructions;

    public function __construct()
    {
        $this->instructions = new AIOpsInstructionModel();
    }

    public function recordMergedDuplicate(array $original, string $text, string $source, bool $autoPR, bool $dryRun, ?string $severityOverride, ?float $similarity): int
    {
        $id = $this->instructions->insert([
            'instruction_text'  => $text,
            'instruction_hash'  => null, // exact hash already belongs to original; keep null so it inserts safely
            'source'            => $source,
            'classification'    => $original['classification'] ?? null,
            'risk_level'        => $original['risk_level'] ?? null,
            'status'            => 'merged',
            'auto_pr'           => $autoPR ? 1 : 0,
            'dry_run'           => $dryRun ? 1 : 0,
            'severity_override' => $severityOverride,
            'duplicate_of'      => (int)$original['id'],
            'similarity_score'  => $similarity,
            'pr_branch'         => $original['pr_branch'] ?? null,
            'pr_url'            => $original['pr_url'] ?? null,
            'worker_notes'      => 'Merged into existing instruction #' . (int)$original['id'],
        ], true);

        return (int)$id;
    }
}