<?php

namespace App\Services\AIOps;

use App\Models\AIOpsInstructionModel;
use App\Models\AIOpsDependencyModel;

class InstructionService
{
    protected AIOpsInstructionModel $instructions;
    protected AIOpsDependencyModel $deps;

    public function __construct()
    {
        $this->instructions = new AIOpsInstructionModel();
        $this->deps         = new AIOpsDependencyModel();
    }

    public function enqueueInstruction(
        string $text,
        string $source = 'manual',
        bool $autoPR = false,
        bool $dryRun = false,
        ?string $severityOverride = null
    ): array {
        $this->validateAgainstPolicy($text);

        $normalized = $this->normalizeInstruction($text);
        $hash       = hash('sha256', $normalized);

        // Exact dedupe
        $existing = $this->instructions
            ->where('instruction_hash', $hash)
            ->first();

        if ($existing) {
            return [
                'id' => (int) $existing['id'],
                'status' => 'duplicate',
                'classification' => $existing['classification'] ?? null,
                'risk' => $existing['risk_level'] ?? null,
            ];
        }

        // Near-duplicate dedupe (fuzzy)
        $near = $this->findNearDuplicate($normalized, 7, 200, 0.80);
        if ($near) {
            return [
                'id' => (int) $near['id'],
                'status' => 'near-duplicate',
                'classification' => $near['classification'] ?? null,
                'risk' => $near['risk_level'] ?? null,
                'similarity' => (float) $near['similarity'],
            ];
        }

        $classification = $this->classifyInstruction($text);

        // Soft spam throttle
        $recent = $this->instructions
            ->where('created_at >=', date('Y-m-d H:i:s', strtotime('-2 minutes')))
            ->where('classification', $classification)
            ->countAllResults();

        if ($recent > 5) {
            throw new \RuntimeException('Too many similar instructions submitted recently.');
        }

        $id = $this->instructions->insert([
            'instruction_text'   => $text,
            'instruction_hash'   => $hash,
            'source'             => $source,
            'classification'     => $classification,
            'status'             => 'queued',
            'auto_pr'            => $autoPR ? 1 : 0,
            'dry_run'            => $dryRun ? 1 : 0,
            'severity_override'  => $severityOverride,
        ], true);

        return [
            'id' => (int) $id,
            'status' => 'queued',
            'classification' => $classification,
            'risk' => $severityOverride,
        ];
    }


    public function create(
        string $text,
        string $source = 'manual',
        bool $autoPR = false,
        bool $dryRun = false,
        ?string $severityOverride = null
    ): array {
        return $this->enqueueInstruction($text, $source, $autoPR, $dryRun, $severityOverride);
    }

    public function claimNextQueued(): ?array
    {
        $row = $this->instructions
            ->where('status', 'queued')
            ->orderBy('created_at', 'ASC')
            ->first();

        if (!$row) return null;

        $this->instructions->update($row['id'], [
            'status' => 'processing',
            'worker_notes' => null,
        ]);

        return $this->instructions->find($row['id']);
    }

    // ✅ Dependency-aware claim
    public function claimNextRunnableQueued(DependencyResolver $deps): ?array
    {
        $id = $deps->getRunnableQueuedId();
        if (!$id) return null;

        $row = $this->instructions->find($id);
        if (!$row) return null;

        $this->instructions->update($id, [
            'status' => 'processing',
            'worker_notes' => null,
        ]);

        return $this->instructions->find($id);
    }

    // ✅ Used by Worker to persist score fields mid-run
    public function updateFields(int $id, array $data): void
    {
        $this->instructions->update($id, $data);
    }

    public function complete(int $id, array $data): void
    {
        $this->instructions->update($id, array_merge($data, [
            'status' => 'completed',
        ]));
    }

    public function fail(int $id, string $reason): void
    {
        $this->instructions->update($id, [
            'status' => 'failed',
            'worker_notes' => $reason,
        ]);
    }

    public function markBlocked(int $id, string $reason): void
    {
        $this->instructions->update($id, [
            'status' => 'blocked',
            'worker_notes' => $reason,
        ]);
    }

    public function addDependency(int $instructionId, int $dependsOn): int
    {
        return (int) $this->deps->insert([
            'instruction_id' => $instructionId,
            'depends_on'     => $dependsOn,
        ], true);
    }

    public function validateAgainstPolicy(string $text): void
    {
        $blocked = [
            'DROP DATABASE',
            'rm -rf',
            'chmod 777',
            'sudo ',
        ];

        foreach ($blocked as $pattern) {
            if (stripos($text, $pattern) !== false) {
                throw new \RuntimeException('Policy blocked instruction due to forbidden pattern: ' . $pattern);
            }
        }
    }

    public function classifyInstruction(string $text): string
    {
        $t = strtolower($text);
        if (str_contains($t, 'audit')) return 'audit';
        if (str_contains($t, 'log') || str_contains($t, 'critical') || str_contains($t, 'warning')) return 'logs';
        if (str_contains($t, 'refactor') || str_contains($t, 'optimize')) return 'optimization';
        if (str_contains($t, 'fix') || str_contains($t, 'error') || str_contains($t, 'bug')) return 'repair';
        if (str_contains($t, 'build') || str_contains($t, 'add feature')) return 'feature';
        return 'general';
    }

    public function scoreRisk(string $text): string
    {
        $t = strtolower($text);
        if (str_contains($t, 'security') || str_contains($t, 'auth') || str_contains($t, 'database')) return 'HIGH';
        if (str_contains($t, 'config') || str_contains($t, 'routes') || str_contains($t, 'cache')) return 'MEDIUM';
        return 'LOW';
    }

    private function normalizeInstruction(string $text): string
    {
        $text = trim($text);
        $text = preg_replace('/\s+/', ' ', $text);
        $text = strtolower($text);
        return $text;
    }

    private function tokenize(string $text): array
    {
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9\s]/', ' ', $text);
        $text = preg_replace('/\s+/', ' ', trim($text));
        if ($text === '') return [];

        $tokens = explode(' ', $text);

        $tokens = array_values(array_filter($tokens, static function ($t) {
            return strlen($t) >= 3;
        }));

        $stop = ['the','and','for','with','that','this','from','into','your','are','was','were','have','has','had','not','but','you'];
        $tokens = array_values(array_filter($tokens, static function ($t) use ($stop) {
            return !in_array($t, $stop, true);
        }));

        return $tokens;
    }

    private function termFrequency(array $tokens): array
    {
        $tf = [];
        foreach ($tokens as $t) {
            $tf[$t] = ($tf[$t] ?? 0) + 1;
        }
        return $tf;
    }

    private function cosineSimilarity(array $a, array $b): float
    {
        $dot = 0.0;
        $normA = 0.0;
        $normB = 0.0;

        foreach ($a as $k => $v) {
            $normA += $v * $v;
            if (isset($b[$k])) {
                $dot += $v * $b[$k];
            }
        }
        foreach ($b as $v) {
            $normB += $v * $v;
        }

        if ($normA == 0.0 || $normB == 0.0) return 0.0;

        return $dot / (sqrt($normA) * sqrt($normB));
    }

    private function findNearDuplicate(string $normalized, int $lookbackDays = 7, int $limit = 200, float $threshold = 0.80): ?array
    {
        $since = date('Y-m-d H:i:s', strtotime("-{$lookbackDays} days"));

        $candidates = $this->instructions
            ->select('id, instruction_text, instruction_hash, status, pr_branch, pr_url, classification, risk_level, created_at')
            ->where('created_at >=', $since)
            ->orderBy('created_at', 'DESC')
            ->findAll($limit);

        if (!$candidates) return null;

        $baseTokens = $this->tokenize($normalized);
        $baseTF = $this->termFrequency($baseTokens);

        $best = null;
        $bestScore = 0.0;

        foreach ($candidates as $c) {
            $candNorm = $this->normalizeInstruction((string) ($c['instruction_text'] ?? ''));
            if ($candNorm === '') continue;

            $candTF = $this->termFrequency($this->tokenize($candNorm));
            $score = $this->cosineSimilarity($baseTF, $candTF);

            if ($score > $bestScore) {
                $bestScore = $score;
                $best = $c;
            }
        }

        if ($best && $bestScore >= $threshold) {
            $best['similarity'] = $bestScore;
            return $best;
        }

        return null;
    }
}