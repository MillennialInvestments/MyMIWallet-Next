# MYMI-GTM-ACCEPTANCE-QUALITY-GATE-001 — Semantic acceptance-test admission

## Scope and status

This read-only validator admits **acceptance-test design proposals**, not completion of Golden Tasks. The original seven-wave campaign, 28 original artifacts, W0-C01 verified checkpoint and all mission evidence remain immutable. The W0-C01 design is under `QUALITY_HOLD` until all semantic assertions and external approval boundaries are independently reviewed.

The program has two explicit modes:

- `design`: confirms exact catalog TaskID coverage, required seven text fields, meaningful positive/negative/authorization/integration/failure assertions, declared dependencies, and task-specific owner/security checks. `DESIGN_PASS_NOT_TASK_COMPLETION` is **not** operational certification.
- `evidence-review`: requires a *separate* owner-attestation JSON and validates the presence and SHA-256 of redacted evidence documents. `EVIDENCE_PACKET_VALIDATED_OWNER_CONFIRMATION_REQUIRED` still requires an authorized human to confirm that provider-side rotations and dependent controls actually occurred. It never rotates a secret or marks a task complete.

The program is stdlib Python; it makes no network, API, Git, database, or production calls; it never writes into MyMI Wallet or the campaign evidence folder; it does not output evidence content.

## Design input format

Use a JSON object with `task_tests` array and exactly the task IDs specified by repeated `--task-id` options:

```json
{
  "task_tests": [
    {
      "task_id": "MYMI-GTM-001",
      "positive": "...",
      "negative": "...",
      "authorization": "...",
      "integration": "...",
      "failure": "...",
      "external_gate": "..."
    }
  ]
}
```

Real assertions must identify what is exercised and the expected result. The five cases must be distinct, at least 14 words each, and relevant to the catalog's TaskID. Generic test narratives and placeholder statements fail closed. `MYMI-GTM-001` requires mentions of OpenAI API, database, basic authentication, webhook and health/service credentials, external owner approval, revocation/rotation and redaction. `MYMI-GTM-002` requires `chat/.env`, `.gitignore`, missing-config failure, security owner sign-off, and `MYMI-GTM-001` dependency. These rules are intentionally narrow and can reject plausible but underspecified tests.

Run, using the actual acceptance-result JSON as candidate (not the entire orchestration envelope):

```bash
python3 docs/_aiops/gtm/scripts/mymi_gtm_acceptance_quality_gate.py \
  --catalog docs/_aiops/gtm/tasks.csv \
  --candidate /path/to/verified-W0-C01-task-tests.json \
  --task-id MYMI-GTM-001 --task-id MYMI-GTM-002 \
  --mode design
```

When available, supply `--candidate-sha256=<64-hex-sha>` to bind the candidate to its original checkpoint. Do not claim that `design` acceptance closes external security gates.

## External attestation evidence

The optional `--mode evidence-review` requires `--evidence-root` and `--evidence` JSON with `tasks` map. A task contains `owner_approval` with `status=verified`, `redacted=true`, a nonempty `owner`, `verified_at` ISO date/time, evidence-relative `path` and SHA-256. Task `MYMI-GTM-001` additionally requires `credential_rotations` with keys `openai_api`, `database`, `basic_auth`, `webhook`, `health_service`, each with those same fields. A downstream task's evidence must include a parent task record with `dependency_verified=true`; this is an attestation only and does not substitute for real verification. Evidence file symlinks and paths outside the evidence root are refused. Never store or upload secret values as evidence.

**Limitation:** SHA-256 integrity and owner statements do not independently establish provider-side revocation or rotation. Those checks require human/provider verification and must remain pending until such verification occurs.

## Validation and governed delivery

Run the synthetic tests after the AIOps-approved source changes:

```bash
python3 -m unittest discover -s docs/_aiops/gtm/tests -p test_mymi_gtm_acceptance_quality_gate.py
git diff --check
```

Require manual review of generated tracked files, path allowlist, and evidence-only rollback notes before a pull request. Do not delete checkpoints, auto-revert source, merge, or modify `/apps/TBI/www/mymiwallet/current`. If a pre-merge defect is found, retain worktree evidence and create a reviewed corrective commit; post-deploy rollback requires separate owner authority.
