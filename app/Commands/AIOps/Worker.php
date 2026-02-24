<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Services\AIOps\BranchLockService;
use App\Services\AIOps\DependencyResolver;
use App\Services\AIOps\DiffBuilder;
use App\Services\AIOps\GitHubPRService;
use App\Services\AIOps\GovernanceScorer;
use App\Services\AIOps\InstructionService;
use App\Services\AIOps\TargetingIntelligence;

class Worker extends SafeBaseCommand
{
    protected $group       = 'AIOps - Run';
    protected $name        = 'aiops:worker';
    protected $description = 'Process queued AIOps instructions (governance + targeting + diff + optional PR).';
    protected $usage       = 'aiops:worker [--once] [--max=10] [--create-pr=0|1]';

    public function run(array $params)
    {
        $argv = $_SERVER['argv'] ?? [];
        $once = in_array('--once', $argv, true);
        $max  = min($this->getArgvInt($argv, 'max', 10), 25);
        $createPrFlag = $this->getArgvInt($argv, 'create-pr', 0) === 1;

        $instructions = new InstructionService();
        $deps         = new DependencyResolver();
        $governance   = new GovernanceScorer();
        $targetsSvc   = new TargetingIntelligence();
        $diffSvc      = new DiffBuilder();
        $ghSvc        = new GitHubPRService();
        $locker       = new BranchLockService();

        $processed = 0;

        do {
            // ✅ D) Only claim runnable queued items
            $job = $instructions->claimNextRunnableQueued($deps);
            if (!$job) {
                CLI::write('No runnable queued instructions.');
                return;
            }

            $id   = (int) $job['id'];
            $text = (string) ($job['instruction_text'] ?? '');

            if ($this->isRecursiveInstruction($text)) {
                $instructions->fail($id, 'Recursive AIOps trigger blocked by governance safeguard.');
                CLI::error("Blocked recursive instruction #{$id}");
                $processed++;
                if ($once || $processed >= $max) break;
                continue;
            }

            // ✅ Dependency gate (defensive: in case status changed after claim)
            $depCheck = $deps->checkDependencies($id);
            if (!$depCheck['ok']) {
                $instructions->markBlocked($id, $depCheck['reason']);
                CLI::write("⛔ Blocked #{$id}: " . $depCheck['reason']);
                $processed++;
                if ($once || $processed >= $max) break;
                continue;
            }

            // Flags
            $auto = ((int) ($job['auto_pr'] ?? 0)) === 1;
            $dry  = ((int) ($job['dry_run'] ?? 0)) === 1;
            $classification = strtolower((string) ($job['classification'] ?? 'general'));

            // Risk level: severity override > governance derived > heuristic
            $risk = $job['severity_override'] ?: ($job['risk_level'] ?? null);
            if (!$risk) {
                $risk = $instructions->scoreRisk($text);
            }

            $branch = "aiops/patch/{$id}";

            try {
                CLI::write("Processing #{$id} (risk={$risk}, autoPR=" . ($auto ? 'yes' : 'no') . ", dryRun=" . ($dry ? 'yes' : 'no') . ")");

                // === B) Governance Scoring Engine (numeric) ===
                $gov = $governance->score($text);

                // Persist scores early (so you can audit even on failure)
                $instructions->updateFields($id, [
                    'gov_score'  => $gov['gov_score'],
                    'risk_score' => $gov['risk_score'],
                    'risk_level' => $gov['risk_level'],
                ]);

                // Manual review gate blocks auto PR
                if ($auto && !empty($gov['requires_manual_review'])) {
                    $auto = false;
                    log_message('warning', "AIOPS_WORKER: Governance blocked auto PR for instruction {$id}");
                }

                // Safety gate: HIGH blocks auto PR no matter what
                if ($auto && strtoupper((string)$risk) === 'HIGH') {
                    $auto = false;
                    log_message('warning', "AIOPS_WORKER: HIGH risk blocked auto PR for instruction {$id}");
                }

                // === Output Paths ===
                $jobStamp = date('Ymd-His');
                $outDir   = ROOTPATH . "docs/_aiops/patch_jobs/{$jobStamp}-ingest-{$id}";
                $readyDir = ROOTPATH . "docs/_aiops/pr_ready/{$id}";
                $patchDir = $readyDir . "/patch";

                if (!is_dir($outDir))  mkdir($outDir, 0775, true);
                if (!is_dir($readyDir)) mkdir($readyDir, 0775, true);
                if (!is_dir($patchDir)) mkdir($patchDir, 0775, true);

                $generated = [];
                $instructionState = 'processing';

                // Persist raw instruction
                $instructionFile = $outDir . "/instruction.md";
                file_put_contents($instructionFile, $text);
                $generated[] = $instructionFile;

                // === File Targeting Intelligence ===
                $targets = $targetsSvc->inferTargets($text);
                $targetsFile = $readyDir . "/targets.json";
                file_put_contents($targetsFile, json_encode($targets, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
                $generated[] = $targetsFile;

                // PR scaffold
                $prMd = $readyDir . "/pr.md";
                $prBody = $this->buildPrScaffold($id, $risk, $gov, $targets);
                file_put_contents($prMd, $prBody);
                $generated[] = $prMd;

                // Ollama prompt contract
                $ollamaPrompt = $outDir . "/ollama_prompt.md";
                file_put_contents($ollamaPrompt, $this->buildOllamaPrompt($id, $risk, $gov, $targets, $text));
                $generated[] = $ollamaPrompt;

                // Dry run stops after staging
                if ($dry) {
                    $instructionState = 'patched';
                    $instructions->updateFields($id, [
                        'status' => $instructionState,
                        'risk_level'      => $risk,
                        'pr_branch'       => $branch,
                        'generated_files' => json_encode($generated),
                        'worker_notes'    => 'Dry run: artifacts staged only.',
                    ]);

                    $this->printGenerated($id, $outDir, $readyDir, $generated, null);
                    $this->printNextActions($this->determineNextSteps($job, [
                        'classification' => $classification,
                        'patch_generated' => $this->hasFilesInDirectory($patchDir),
                        'pr_url' => null,
                        'state' => $instructionState,
                        'pr_ready_id' => $id,
                    ]));
                    $processed++;
                    if ($once || $processed >= $max) break;
                    continue;
                }

                // === C) Branch lock wraps DIFF + PR operations ===
                $lockedBy = 'aiops-worker-' . gethostname();
                $lock = $locker->acquire($branch, $lockedBy, $id, 900);

                if (!$lock['ok']) {
                    $instructions->fail($id, 'Branch lock failed: ' . ($lock['reason'] ?? 'unknown'));
                    CLI::error("Lock failed for #{$id} branch={$branch}");
                    $processed++;
                    if ($once || $processed >= $max) break;
                    continue;
                }

                $prUrl = null;

                try {
                    // === Diff Builder (if patch exists) ===
                    $diffOut = $diffSvc->buildDiffArtifact($id, $branch, $patchDir, $readyDir);
                    if (!empty($diffOut['diff_file'])) {
                        $generated[] = $diffOut['diff_file'];
                    }

                    $patchGenerated = $this->hasFilesInDirectory($patchDir);

                    if ($classification === 'logs') {
                        $auto = true;
                        if ($this->needsMysqlDoc($targets)) {
                            $mysqlMd = $readyDir . '/mysql.md';
                            if (!is_file($mysqlMd)) {
                                file_put_contents($mysqlMd, "# MySQL Change Notes\n\nDocument schema impact and rollback steps.\n");
                                $generated[] = $mysqlMd;
                            }
                        }
                    }

                    // === GitHub PR Automation (optional) ===
                    $criticalRisk = strtoupper((string) ($risk ?: '')) === 'CRITICAL' || strtoupper((string) ($job['severity_override'] ?? '')) === 'CRITICAL';
                    $shouldAttemptPr = ($auto || $createPrFlag || $criticalRisk) && $patchGenerated;

                    if ($shouldAttemptPr) {
                        $prCreated = $ghSvc->createFromPrReady($id);
                        $prUrl = $ghSvc->getLastPrUrl();
                        if ($prCreated) {
                            $instructionState = 'pr_sent';
                        } else {
                            $instructionState = 'pr_ready';
                        }
                    } else {
                        $instructionState = $patchGenerated ? 'pr_ready' : 'patched';
                    }

                    // refresh TTL if work took a while
                    $locker->refresh($branch, $lockedBy, 900);

                } finally {
                    $locker->release($branch, $lockedBy);
                }

                // Complete job
                $instructions->updateFields($id, [
                    'status'          => $instructionState,
                    'risk_level'      => $risk,
                    'pr_branch'       => $branch,
                    'pr_url'          => $prUrl,
                    'generated_files' => json_encode($generated),
                    'worker_notes'    => $prUrl ? 'PR created successfully.' : 'Ready dir staged; PR not created.',
                ]);

                $this->printGenerated($id, $outDir, $readyDir, $generated, $prUrl);
                $this->printNextActions($this->determineNextSteps($job, [
                    'classification' => $classification,
                    'patch_generated' => $this->hasFilesInDirectory($patchDir),
                    'pr_url' => $prUrl,
                    'state' => $instructionState,
                    'pr_ready_id' => $id,
                ]));

            } catch (\Throwable $e) {
                $instructions->fail($id, 'Worker failure: ' . $e->getMessage());
                CLI::error("Failed #{$id}: " . $e->getMessage());
            }

            $processed++;

        } while (!$once && $processed < $max);
    }

    private function printGenerated(int $id, string $outDir, string $readyDir, array $generated, ?string $prUrl = null): void
    {
        CLI::newLine();
        CLI::write("✅ Completed #{$id}");
        CLI::write("Patch Job Dir: {$outDir}");
        CLI::write("PR Ready Dir:  {$readyDir}");
        CLI::write("Generated Files:");
        foreach ($generated as $f) {
            CLI::write(" - {$f}");
        }
        if ($prUrl) {
            CLI::write("PR URL: {$prUrl}");
        }
        CLI::newLine();
    }

    private function printNextActions(array $actions): void
    {
        CLI::write('NEXT STEPS:');
        foreach ($actions as $action) {
            CLI::write('- ' . $action);
        }
        CLI::newLine();
    }

    private function determineNextSteps(array $instruction, array $result): array
    {
        $classification = strtolower((string) ($result['classification'] ?? $instruction['classification'] ?? 'general'));
        $patchGenerated = (bool) ($result['patch_generated'] ?? false);
        $prUrl = (string) ($result['pr_url'] ?? '');
        $id = (int) ($result['pr_ready_id'] ?? $instruction['id'] ?? 0);

        $steps = ['Instruction lifecycle state: ' . ($result['state'] ?? 'unknown')];

        if ($classification === 'audit' && $patchGenerated) {
            $steps[] = 'php spark aiops:worker --create-pr=1';
            $steps[] = 'php spark aiops:pr:send --id=' . $id;
        }

        if ($classification === 'logs') {
            $steps[] = 'php spark logs:summarize';
            $steps[] = 'php spark aiops:worker:logs';
        }

        if ($patchGenerated && $prUrl === '') {
            $steps[] = 'Review docs/_aiops/pr_ready/' . $id . '/pr.md';
            $steps[] = 'php spark aiops:pr:send --id=' . $id;
        }

        if ($prUrl !== '') {
            $steps[] = 'PR created: ' . $prUrl;
        }

        return array_values(array_unique($steps));
    }

    private function hasFilesInDirectory(string $dir): bool
    {
        if (!is_dir($dir)) {
            return false;
        }

        $files = glob(rtrim($dir, '/') . '/*');
        return is_array($files) && $files !== [];
    }

    private function needsMysqlDoc(array $targets): bool
    {
        foreach (($targets['file_candidates'] ?? []) as $file) {
            $f = strtolower((string) $file);
            if (str_contains($f, 'migration') || str_contains($f, '.sql') || str_contains($f, 'database')) {
                return true;
            }
        }

        return false;
    }

    private function isRecursiveInstruction(string $text): bool
    {
        $t = strtolower($text);
        if (str_contains($t, 'aiops:worker:logs') || str_contains($t, 'logs:summarize --auto-aiops --auto-aiops')) {
            return true;
        }

        return substr_count($t, 'aiops:worker') > 2;
    }

    private function buildPrScaffold(int $id, string $risk, array $gov, array $targets): string
    {
        $targetsList = '';
        foreach (($targets['file_candidates'] ?? []) as $t) {
            $targetsList .= "- {$t}\n";
        }

        $manual = !empty($gov['requires_manual_review']) ? 'YES' : 'NO';

        return <<<MD
# PR Proposal (Instruction #{$id})

## Summary
Auto-generated scaffold. AIOps/Ollama should replace with final PR content.

## Risk
- Risk Level: **{$risk}**
- Governance Score: **{$gov['gov_score']}**
- Manual Review Required: **{$manual}**

## Suggested File Targets
{$targetsList}

## Notes
- If patch files exist in `docs/_aiops/pr_ready/{$id}/patch/`, the worker will generate `diff.patch`.
MD;
    }

    private function buildOllamaPrompt(int $id, string $risk, array $gov, array $targets, string $text): string
    {
        $manual = !empty($gov['requires_manual_review']) ? 'YES' : 'NO';

        return <<<MD
# AIOPS INGEST JOB #{$id}

## Goal
Analyze the instruction and produce minimal CI4-compatible code changes.

## Governance Context
- Risk Level: {$risk}
- Governance Score: {$gov['gov_score']}
- Manual Review Required: {$manual}

## Targeting Hints (best-effort)
{$this->formatTargets($targets)}

## Output Contract (STRICT)
Write outputs into:
- docs/_aiops/pr_ready/{$id}/
Include:
- pr.md (title, summary, rationale, rollback, tests)
- patch/ (full replacement files OR unified diffs per file)
- risks.md
- tests.md

## Instruction
{$text}
MD;
    }

    private function formatTargets(array $targets): string
    {
        $out = '';
        foreach (($targets['file_candidates'] ?? []) as $t) {
            $out .= "- {$t}\n";
        }
        return $out ?: "- (none inferred)\n";
    }

    private function getArgvInt(array $argv, string $key, int $default): int
    {
        $needleEq = '--' . $key . '=';
        $needle   = '--' . $key;

        foreach ($argv as $i => $arg) {
            if (str_starts_with($arg, $needleEq)) {
                $val = (int) substr($arg, strlen($needleEq));
                return $val > 0 ? $val : $default;
            }
            if ($arg === $needle) {
                $next = $argv[$i + 1] ?? null;
                if ($next !== null && !str_starts_with($next, '--')) {
                    $val = (int) $next;
                    return $val > 0 ? $val : $default;
                }
            }
        }
        return $default;
    }
}
