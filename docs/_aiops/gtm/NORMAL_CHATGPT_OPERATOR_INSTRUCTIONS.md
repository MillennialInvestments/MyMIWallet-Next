# Normal ChatGPT Operator Instructions

Use this protocol to complete MyMI Wallet without repeatedly paying to rediscover the repository.

## One-time setup

1. Work only on the canonical TBI host and repository clone.
2. Confirm the repository path and current `main` SHA.
3. Run `ai check`, then `ai next`, and execute only the returned `NEXT_COMMAND`.
4. Install this bundle through the authorized task/worktree. Do not copy it into `main` manually.
5. Validate the catalog:

```bash
python3 docs/_aiops/gtm/scripts/mymi_gtm.py validate --repo .
```

## Select one task

```bash
python3 docs/_aiops/gtm/scripts/mymi_gtm.py next --repo .
```

If local catalog status lags TBI AIOps, TBI AIOps wins. Pass already completed task IDs only to improve local selection; do not use local flags as proof of completion:

```bash
python3 docs/_aiops/gtm/scripts/mymi_gtm.py next \
  --repo . \
  --completed MYMI-GTM-001 MYMI-GTM-002
```

## Build a bounded prompt packet

```bash
python3 docs/_aiops/gtm/scripts/mymi_gtm.py packet \
  --repo . \
  --task MYMI-GTM-001 \
  --output /tmp/MYMI-GTM-001.md
```

Paste the generated packet into a normal ChatGPT chat only after the authorized worktree is active. The packet deliberately contains no application file bodies and no secrets.

## ChatGPT execution contract

Add this sentence if the chat does not already know the TBI rules:

> Work only inside the current authorized TBI AIOps worktree. Start with read-only discovery. Do not print secrets, change production, commit, push, merge, deploy, edit AIOps state manually, or expand scope. If runtime, approval, credential, database, or environment access is missing, stop with an exact handoff instead of guessing. Use `ai finish` for governed closeout.

Then have ChatGPT follow this order:

1. Verify task ID, objective ID, worktree, branch, base SHA, and clean/expected status.
2. Inspect only the packet's initial files.
3. Report evidence and a minimal proposed patch.
4. Stop for approval when the task's mutation/approval gate requires it.
5. Implement only the accepted task scope.
6. Run targeted validation first, then the smallest relevant regression suite.
7. Record exact commands and exit codes.
8. Invoke the TBI closeout flow; do not manually commit or merge.
9. Create a fresh successor task for anything outside scope.

## Credit controls

- Never paste the full route file, entire repository tree, complete logs, vendor directory, build output, or database dump into a model.
- Default initial context: at most 6 files, 48 KiB total, and 400 log lines.
- Prefer deterministic summaries from `mymi_gtm.py audit`, `rg`, `git diff --stat`, CodeIgniter route output, test reports, and JSON/CSV evidence.
- Use local Ollama for broad classification, duplicate detection, and first-pass summaries when the task permits it.
- Use normal ChatGPT for bounded design/review and changes that require stronger reasoning.
- Start a new chat for each Golden Task so unrelated history does not consume context.
- Do not ask a model to re-audit completed tasks. Supply the evidence link and exact successor delta.
- If a task needs more than 270 seconds of automation or more than one coherent rollback unit, split it before coding.

## Stop conditions

Stop and create an exact handoff when any of these occurs:

- canonical repo/worktree/task identity cannot be proven;
- the working tree contains unexpected user changes that overlap the task;
- a secret value appears in output;
- production or external mutation would occur;
- database migration/backfill lacks backup and rollback evidence;
- the task depends on an unmerged/stale PR with no approved successor plan;
- required PHP/Composer, services, credentials, fixtures, or environment are unavailable;
- tests reveal a larger cross-domain defect than the task can safely own;
- the acceptance criteria cannot be proven.

## Required final task report

Every task report must contain:

- task/objective IDs and exact final SHA;
- files changed and why;
- tests/commands with exit codes;
- security/data/runtime risks;
- rollback notes;
- evidence links;
- deploy status (normally not deployed);
- remaining gaps and successor task IDs;
- explicit statement that no secrets were printed or committed.

## Production and release

Normal ChatGPT must never infer production readiness from local tests. Staging, deployment, rollback, and post-deploy reconciliation are separate Golden Tasks with explicit owners and approvals.
