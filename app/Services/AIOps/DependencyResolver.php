<?php

namespace App\Services\AIOps;

use App\Models\AIOpsDependencyModel;
use App\Models\AIOpsInstructionModel;

class DependencyResolver
{
    protected AIOpsDependencyModel $deps;
    protected AIOpsInstructionModel $instructions;

    public function __construct()
    {
        $this->deps = new AIOpsDependencyModel();
        $this->instructions = new AIOpsInstructionModel();
    }

    public function isRunnable(int $instructionId): array
    {
        $rows = $this->deps->where('instruction_id', $instructionId)->findAll();

        foreach ($rows as $r) {
            $depId = (int) $r['depends_on'];
            $dep = $this->instructions->find($depId);

            if (!$dep) {
                return ['ok' => false, 'reason' => "Dependency {$depId} missing"];
            }

            if (($dep['status'] ?? null) !== 'completed') {
                return ['ok' => false, 'reason' => "Waiting on dependency {$depId} (status={$dep['status']})"];
            }
        }

        return ['ok' => true, 'reason' => null];
    }

    // ✅ Compatibility alias (your Worker calls this)
    public function checkDependencies(int $instructionId): array
    {
        return $this->isRunnable($instructionId);
    }

    public function getRunnableQueuedId(): ?int
    {
        $queued = $this->instructions
            ->select('id')
            ->where('status', 'queued')
            ->orderBy('created_at', 'ASC')
            ->findAll(200);

        foreach ($queued as $q) {
            $id = (int) $q['id'];
            $chk = $this->isRunnable($id);
            if ($chk['ok']) return $id;
        }

        return null;
    }

    public function detectCycles(): array
    {
        $edges = $this->deps->findAll();
        $graph = [];

        foreach ($edges as $e) {
            $a = (int)$e['instruction_id'];
            $b = (int)$e['depends_on'];
            $graph[$a][] = $b;
            if (!isset($graph[$b])) $graph[$b] = [];
        }

        $vis = [];
        $stack = [];
        $cycles = [];

        $dfs = function($node) use (&$dfs, &$graph, &$vis, &$stack, &$cycles) {
            $vis[$node] = true;
            $stack[$node] = true;

            foreach ($graph[$node] ?? [] as $nei) {
                if (!isset($vis[$nei])) {
                    $dfs($nei);
                } elseif (!empty($stack[$nei])) {
                    $cycles[] = [$node, $nei];
                }
            }

            $stack[$node] = false;
        };

        foreach (array_keys($graph) as $n) {
            if (!isset($vis[$n])) $dfs($n);
        }

        return $cycles;
    }
}