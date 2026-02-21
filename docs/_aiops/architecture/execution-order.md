0) Non-Negotiables (Engine Contract)
Namespace + folder standard

All AIOps services: App\Services\AIOps\*

All AIOps commands: App\Commands\AIOps\*

No AiOps anywhere (Linux case sensitivity will keep biting you).

Engine output standard (every command)

Every Spark command must end with:

----------------------------------------
NEXT STEP:
  php spark <recommended:command>
WHY:
  <1-line reason>
ARTIFACTS:
  <paths written, if any>
----------------------------------------

We’ll implement a reusable helper so every command prints this consistently.

1) AIOps Service Map (Complete)

Think of AIOps as 6 subsystems:

A) Discovery + Indexing

DocsScannerService — scans /docs/** and produces document inventory

CellDiscoveryScanner — discovers “cells” (modules/subsystems) from app tree

CommandHookService — indexes Spark commands (your governance/README features)

B) Observability + Regression

ObservabilityStateService (add) — reads/writes writable/audit/* state

FingerprintService (add) — builds fingerprints & compares snapshots

RegressionEvaluator (add) — determines pass/fail + severity + deltas

C) Governance + Targeting

GovernanceScorer — produces governance score & rules compliance

TargetingIntelligence — chooses what to fix first (risk × impact × recurrence)

BranchLockService — prevents unsafe PR creation / forced main writes

D) Patch Planning + Diff

DependencyResolver — resolves what must change together

DiffBuilder — produces candidate patch & file staging

DeduplicationService — avoids repeating same patch jobs

E) LLM / Ollama Integration

OllamaCodeGenService — generates code when missing

OllamaPatchRunner — generates diff patches given constraints

PatchJob, PatchResult — job/result DTOs

F) PR + Publishing

GitHubPRService — creates PR (or writes “PR proposal package” offline)

PRComposerService (add) — PR body builder w/ artifacts list

ReleaseNotesService (add) — summarized change log & risk summary

2) Service Dependency Graph (Mermaid)

Copy into /docs/_aiops/architecture/service-dependency-graph.md:

flowchart TD
  subgraph Inputs
    Docs[/docs/**/]
    App[app/**]
    Logs[writable/logs/]
    Audit[writable/audit/]
    Env[.env]
  end

  subgraph Discovery
    DS[DocsScannerService]
    CS[CellDiscoveryScanner]
    CH[CommandHookService]
  end

  subgraph Observability
    OS[ObservabilityStateService]
    FP[FingerprintService]
    RE[RegressionEvaluator]
  end

  subgraph Governance
    GS[GovernanceScorer]
    TI[TargetingIntelligence]
    BL[BranchLockService]
  end

  subgraph Planning
    DR[DependencyResolver]
    DB[DiffBuilder]
    DD[DeduplicationService]
  end

  subgraph LLM
    OCG[OllamaCodeGenService]
    OPR[OllamaPatchRunner]
    PJ[PatchJob]
    PR[PatchResult]
  end

  subgraph Publishing
    PRC[PRComposerService]
    GPR[GitHubPRService]
    RN[ReleaseNotesService]
  end

  Docs --> DS
  App --> CS
  App --> CH
  Logs --> OS
  Audit --> OS
  Env --> GS
  Env --> BL

  DS --> TI
  CS --> TI
  CH --> GS
  OS --> FP --> RE

  RE --> GS
  GS --> TI
  BL --> DR
  TI --> DR --> DB --> DD

  DB --> PJ --> OPR --> PR
  DB --> OCG --> DB

  PR --> PRC --> GPR
  GS --> PRC
  RE --> PRC
  DB --> RN --> PRC
3) Execution Order (Authoritative Pipeline)
Tier 0 — Safety + setup

aiops:gate:cost

aiops:branch:lock (add command wrapper if missing)

Tier 1 — Observability baseline

aiops:observe:scan

aiops:observe:hash

aiops:observe:cost

aiops:observe:regression (gate)

Tier 2 — Governance + priority

aiops:governance:analyze

aiops:priority:build

Tier 3 — Patch planning

aiops:patch:risk_score

aiops:patch:validate

aiops:patch:dry_run

Tier 4 — Patch application

aiops:diff:format

aiops:patch:hallucination

aiops:patch:apply

Tier 5 — Test + gates

app:test

codex:gate

app:gate:coverage

Tier 6 — PR

aiops:pr:proposal (offline package always available)

aiops:pr:create (only if GitHub env configured)

4) Repair Pipeline Architecture (Clean Design)

Repair Pipeline is 3 phases with explicit artifacts:

Phase 1: Diagnose

Inputs: docs inventory, route inventory, logs summary, regression deltas

Outputs:

docs/_aiops/state.json

docs/_aiops/gap-report.md

writable/audit/observability_regression_report.md

Phase 2: Plan

Builds prioritized “PatchJobs” with:

change scope

files

risk score

rollback plan

test plan

Outputs:

docs/_aiops/patch_jobs/<timestamp>-<job>/instruction.md

docs/_aiops/patch_jobs/<timestamp>-<job>/ollama_prompt.md

Phase 3: Execute

Patch apply (dry-run → validate → apply)

Run tests, gate checks, regression check after apply

Outputs:

docs/_aiops/spark-results.md

docs/_aiops/doc-change-log.md

docs/_aiops/nightly-summary.md

Rule: No PR without Phase 3 passing.

5) Ollama Integration Strategy (Deterministic + Cost-aware)

Your current pattern should be locked to a deterministic loop:

A) When to call Ollama

Only call Ollama for:

Missing class/interface/DTO stubs (e.g., GapItem)

Boilerplate service implementations behind stable interfaces

Controlled patch generation with explicit file list and constraints

B) Prompt contract (must include)

Every prompt must include:

Allowed files list (absolute paths)

Forbidden areas (vendor/, system/)

Output format: unified diff only

Risk constraints: no schema changes unless included in mysql.md

Test requirements: list expected Spark commands

C) Patch runner contract

OllamaPatchRunner::run(PatchJob $job): PatchResult

returns:

diff (string)

filesTouched[]

warnings[]

confidenceScore (0–100)

needsHumanReview (bool)

D) Hard gating

If confidenceScore < 70 ⇒ create “proposal only”, no apply

If hallucination detector flags ⇒ block apply, require manual

6) PR Strategy (Online + Offline, Always Works)
Always create an offline PR package

Even without GitHub token:

docs/_aiops/pr-proposals/<timestamp>/

title.txt

body.md

files.txt (touched files)

risk.md

test-results.md

diff.patch

Then:

If GitHub env configured: GitHubPRService posts PR.

Else: terminal prints instructions to manually create PR with that package.

7) Governance Scoring Engine (Concrete & Computable)

Create a single score 0–100 with subscores:

Inputs (examples)

Observability: logging coverage, regression gates present, artifacts written

Safety: branch lock, rollback, dry-run, “no vendor edits”, diff validation

Security: filter coverage, permission audit, rate limits, CSRF/XSS checks

Quality: tests run, coverage threshold, PHPStan baseline

Docs: command README, architecture docs, changelog updated

Scoring model (example weights)

Safety: 30

Observability: 25

Security: 20

Quality: 15

Docs: 10

Output artifacts

docs/_aiops/governance/report.md

docs/_aiops/governance/report.json

8) “NEXT STEP” Terminal Footer for Every Spark Command

You asked: “include text in terminal returns for all spark commands to show next step spark command needed on a per spark command basis”.

We do this with one reusable helper + one-liner call in every command.

A) Add a tiny reusable trait

Create:

app/Commands/Traits/NextStepTrait.php

<?php

namespace App\Commands\Traits;

use CodeIgniter\CLI\CLI;

trait NextStepTrait
{
    protected function nextStep(string $cmd, string $why, array $artifacts = []): void
    {
        CLI::write(str_repeat('-', 40));
        CLI::write('NEXT STEP:');
        CLI::write('  php spark ' . $cmd);
        CLI::write('WHY:');
        CLI::write('  ' . $why);

        if (! empty($artifacts)) {
            CLI::write('ARTIFACTS:');
            foreach ($artifacts as $path) {
                CLI::write('  ' . $path);
            }
        }

        CLI::write(str_repeat('-', 40));
    }
}
B) Use it in every command

At top of each command:

use App\Commands\Traits\NextStepTrait;

class X extends SafeBaseCommand {
  use NextStepTrait;

At end of run():

$this->nextStep('aiops:observe:regression', 'Verify no regressions before patch planning.', [
  WRITEPATH . 'audit/observability_regression_report.md',
]);
9) Per-Command “NEXT STEP” Mapping

This is the authoritative mapping you can put in docs and apply to all commands:

Observability

aiops:observe:scan → next: aiops:observe:hash

aiops:observe:hash → next: aiops:observe:cost

aiops:observe:cost → next: aiops:observe:regression

aiops:observe:regression → next: aiops:governance:analyze

Governance / Priority

aiops:governance:analyze → next: aiops:priority:build

aiops:priority:build → next: aiops:patch:risk_score

Patch

aiops:patch:risk_score → next: aiops:patch:validate

aiops:patch:validate → next: aiops:patch:dry_run

aiops:patch:dry_run → next: aiops:diff:format

aiops:diff:format → next: aiops:patch:hallucination

aiops:patch:hallucination → next: aiops:patch:apply

aiops:patch:apply → next: app:test

Tests / Gates

app:test → next: codex:gate

codex:gate → next: app:gate:coverage 60 warn

app:gate:coverage ... → next: aiops:pr:proposal

PR

aiops:pr:proposal → next: aiops:pr:create

aiops:pr:create → next: aiops:run (or “done”)

10) Build Instructions (Codex-ready, copy/paste)

Use this as Codex instruction payload. It’s deliberately deterministic.

Step 1 — Create architecture docs

Create directory + files:

docs/_aiops/architecture/service-map.md

docs/_aiops/architecture/service-dependency-graph.md (with mermaid above)

docs/_aiops/architecture/execution-order.md

docs/_aiops/architecture/repair-pipeline.md

docs/_aiops/architecture/ollama-strategy.md

docs/_aiops/architecture/pr-strategy.md

docs/_aiops/architecture/governance-scoring.md

docs/_aiops/architecture/next-step-standard.md

Step 2 — Add NextStepTrait

Create: app/Commands/Traits/NextStepTrait.php

Step 3 — Apply NextStepTrait to ALL AIOps commands

Update each app/Commands/AIOps/*.php

Update each app/Commands/AIOps/**/**/*.php

Add use NextStepTrait;

Add $this->nextStep(...) at end of run with correct mapping

Step 4 — Normalize command names

If you have aiops:auto:run, ensure there is no aiops:auto-run in docs or scripts.
Update docs and any orchestration code to call the real command names.

Step 5 — Service wiring in app/Config/Services.php

Ensure service factories exist for:

aiopsDocsScanner

aiopsRepoVerifier

aiopsPriorityWriter

aiopsOllamaCodeGen

aiopsPublicPagesPipeline

aiopsManualRunNotifier

aiopsOllamaPatchRunner

(new) aiopsObservabilityState

(new) aiopsFingerprint

(new) aiopsRegressionEvaluator

(new) aiopsPRComposer

(new) aiopsReleaseNotes

Step 6 — Add missing “engine” services (skeleton first)

Create skeletons with safe no-op behavior and clear TODO markers:

app/Services/AIOps/ObservabilityStateService.php

app/Services/AIOps/FingerprintService.php

app/Services/AIOps/RegressionEvaluator.php

app/Services/AIOps/PRComposerService.php

app/Services/AIOps/ReleaseNotesService.php

Step 7 — Update RepairRunSafe to only call existing commands

In RepairRunSafe, replace any runSpark() with $this->spark().
Replace any wrong command names with correct ones (e.g. aiops:auto:run not aiops:auto-run).

Step 8 — Add aiops:pr:proposal command (offline PR package)

Create command that:

reads docs/_aiops/* artifacts

writes a PR proposal folder with patch, title, body, risk, tests

prints NEXT STEP: aiops:pr:create

Step 9 — Gate enforcement

All gating commands must:

write artifacts

print NEXT STEP

return non-zero exit on failure

Step 10 — Final verification script

Add a single command:

php spark aiops:doctor

It should:

verify all services exist

verify all commands print NEXT STEP footer

verify namespace case consistency

verify required docs exist

(Doctor is your “trust anchor”.)

11) What I Need You To Do Right Now (Minimal)

Run these exact commands to validate readiness before Codex builds:

php spark list | grep -i "aiops:"
grep -R "AiOps" app/ || true
grep -R "runSpark(" app/ || true

Then proceed directly with the Codex build instructions above.

12) If You Want This Even Cleaner (Optional but worth it)

We can enforce the NEXT STEP footer without manually adding it everywhere by wrapping all commands in a base class hook — but CI4’s command lifecycle makes that less deterministic than the trait approach. The trait approach is fastest and most reliable.