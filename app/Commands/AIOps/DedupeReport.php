<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\AIOpsInstructionModel;
use App\Services\AIOps\InstructionService;

class DedupeReport extends SafeBaseCommand
{
    protected $group       = 'AIOps - Run';
    protected $name        = 'aiops:dedupe:report';
    protected $description = 'Generate duplicate and near-duplicate instruction report.';

    protected $model;
    protected $service;

    public function run(array $params)
    {
        CLI::write("=== AIOps Deduplication Report ===", 'yellow');

        $this->reportExactDuplicates();
        $this->reportNearDuplicates();
        $this->reportOpenPRConflicts();

        CLI::write("\nReport complete.", 'green');
    }

    protected function model(): AIOpsInstructionModel
    {
        if (! $this->model instanceof AIOpsInstructionModel) {
            $this->model = new AIOpsInstructionModel();
        }

        return $this->model;
    }

    protected function instructionService(): InstructionService
    {
        if (! $this->service instanceof InstructionService) {
            $this->service = new InstructionService();
        }

        return $this->service;
    }

    protected function reportExactDuplicates(): void
    {
        CLI::write("\n[Exact Duplicates]", 'cyan');

        $duplicates = $this->model()
            ->select('instruction_hash, COUNT(*) as total')
            ->groupBy('instruction_hash')
            ->having('total > 1')
            ->findAll();

        if (!$duplicates) {
            CLI::write("No exact duplicates found.");
            return;
        }

        foreach ($duplicates as $dup) {
            CLI::write("Hash: {$dup['instruction_hash']} (Count: {$dup['total']})", 'red');

            $rows = $this->model()
                ->where('instruction_hash', $dup['instruction_hash'])
                ->findAll();

            foreach ($rows as $row) {
                CLI::write("  - ID {$row['id']} | Status: {$row['status']} | PR: {$row['pr_branch']}");
            }
        }
    }

    protected function reportNearDuplicates(): void
    {
        CLI::write("\n[Near Duplicates ≥ 0.80 Similarity]", 'cyan');

        $rows = $this->model()
            ->orderBy('created_at', 'DESC')
            ->findAll(200);

        $checked = [];

        foreach ($rows as $row) {
            if (in_array($row['id'], $checked, true)) continue;

            $normalized = strtolower(trim($row['instruction_text'] ?? ''));

            foreach ($rows as $candidate) {
                if ($row['id'] === $candidate['id']) continue;
                if (in_array($candidate['id'], $checked, true)) continue;

                $sim = $this->similarity($normalized, $candidate['instruction_text']);

                if ($sim >= 0.80) {
                    CLI::write(
                        "Near Duplicate: {$row['id']} ↔ {$candidate['id']} | Similarity: " . number_format($sim, 3),
                        'yellow'
                    );
                }
            }

            $checked[] = $row['id'];
        }
    }

    protected function reportOpenPRConflicts(): void
    {
        CLI::write("\n[Open PR Branch Conflicts]", 'cyan');

        $open = $this->model()
            ->where('status', 'processing')
            ->orWhere('status', 'completed')
            ->where('pr_branch IS NOT NULL', null, false)
            ->findAll();

        $branches = [];

        foreach ($open as $row) {
            $branch = $row['pr_branch'];
            if (!$branch) continue;

            $branches[$branch][] = $row['id'];
        }

        foreach ($branches as $branch => $ids) {
            if (count($ids) > 1) {
                CLI::write("Branch Conflict: {$branch} → IDs: " . implode(', ', $ids), 'red');
            }
        }
    }

    protected function similarity(string $a, string $b): float
    {
        $aTokens = array_count_values(explode(' ', preg_replace('/\s+/', ' ', strtolower($a))));
        $bTokens = array_count_values(explode(' ', preg_replace('/\s+/', ' ', strtolower($b))));

        $dot = 0.0;
        $normA = 0.0;
        $normB = 0.0;

        foreach ($aTokens as $k => $v) {
            $normA += $v * $v;
            if (isset($bTokens[$k])) {
                $dot += $v * $bTokens[$k];
            }
        }

        foreach ($bTokens as $v) {
            $normB += $v * $v;
        }

        if ($normA == 0 || $normB == 0) return 0.0;

        return $dot / (sqrt($normA) * sqrt($normB));
    }
}
