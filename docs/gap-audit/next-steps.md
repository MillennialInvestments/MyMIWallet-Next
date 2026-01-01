# Gap Audit Execution Playbook

Use this playbook to process `docs/gap-audit/gap_tracker.csv` one row at a time without losing place.

## Cursor (do not remove)
- CURRENT_ROW_INDEX: **90** _(1-based, excludes header)_
- CURRENT_GAP_ID: **GAP-CRON-001**
- CURRENT_PRIORITY: **P1**

> Cursor selection rules:
> 1) Work P1 first, then P2, then P3.  
> 2) Within a priority, pick the first row whose Status is not `Completed`.  
> 3) If a row is missing a Gap ID, generate one as `GAP-{MODULE}-{NNN}` (NNN = next available, 3 digits) and update the CSV in-place without reordering. Use the existing module token from prior Gap IDs when available; otherwise, sanitize the Module name (uppercase, strip non-alphanumerics, default `GEN` when blank).

## Naming conventions (required)
- **Task ID**: `GAPRUN-YYYYMMDD-####` (#### zero-padded counter starting at 0001 each day).
- **Branch**: `gap/{gap_id}/{short_slug}` (e.g., `gap/GAP-DEVOPS-001/healthz-endpoints`).
- **Commit**: `feat(gap): ...` | `fix(gap): ...` | `chore(gap): ...`; always include relevant Gap ID(s) in the commit body.
- **PR title**: `[GAP] {Gap ID} — {Short Requirement Title}`.

## Row-by-row workflow
### Step A — Read + Clarify Internally
- Read the CSV row + linked docs to draft a short implementation plan, risks, and dependencies.
- Do **not** ask Teddy questions unless ambiguity cannot be resolved from repo context.

### Step B — Implement (Code or Docs)
- Make minimal, safe changes aligned with CI4 conventions (PSR-4, routing rules, migrations/tests where relevant).
- Add logging/telemetry where meaningful and keep changes scoped to the Gap.

### Step C — Update `gap_tracker.csv` (mandatory)
- Set Status → `In Progress` during work, then `Completed` when finished.
- Code Evidence → list changed/added file paths.
- Notes → summary of what changed and how to test.
- Completed Date → ISO `YYYY-MM-DD`.
- Target Version → if blank, set to `v1.0` unless the row states otherwise.

### Step D — Update this file (cursor refresh)
- Advance the cursor to the next actionable row using the rules above.
- Regenerate the **NEXT TASK BLOCK** so it points at the new cursor row.
- Update the **LAST COMPLETED ROW (Audit Log)** with the finished work summary.

## NEXT TASK BLOCK (Copy/Paste into Codex)
Copy everything inside the block into Codex to execute the current row.

```
Gap ID: GAP-CRON-001
Row Index: 90
Priority: P1
Module: Cron
Requirement: Publish cron manifest and idempotency/telemetry for alerts, marketing, news pipelines
Acceptance Criteria:
  - Produce a consolidated cron manifest with cadence, owners, and endpoints referenced in docs/operations/04-cron-automation.md.
  - Add idempotency tokens/logging around trade alerts and marketing digest cron endpoints so reruns are safe.
  - Provide telemetry/validation steps aligned with marketing-cron-playbook.md and update documentation accordingly.
Files Likely Impacted: docs/operations/04-cron-automation.md; app/Modules/APIs/Controllers/ManagementController.php; app/Modules/APIs/Controllers/MarketingController.php
Mandatory Outputs:
  - Implement required code/docs changes for this Gap (or docs-only when applicable).
  - Update the matching row in docs/gap-audit/gap_tracker.csv (Status, Code Evidence, Notes, Completed Date, Target Version as needed).
  - Add/update any supporting doc under /docs/* if the change introduces new behavior or tests.
```

## LAST COMPLETED ROW (Audit Log)
- Row Index: 21
  - Gap ID: GAP-WALLETS-001
  - Summary: Added a cached `/API/Wallets/summary` endpoint plus a `wallets:warm-summary-cache` CLI to pre-hydrate wallet dashboards, and documented cache keys/verification steps.
  - Files changed: app/Modules/APIs/Controllers/WalletsController.php; app/Services/WalletSummaryService.php; app/Commands/WalletsWarmSummaryCache.php; app/Config/Routes.php; docs/wallets/wallets-index.md; docs/gap-audit/gap_tracker.csv; docs/gap-audit/next-steps.md
  - How to test: curl -s (authenticated) `${BASE_URL}/API/Wallets/summary` | jq '.data.meta'; php spark wallets:warm-summary-cache --user {id} to confirm cache warming output
  - Follow-ups created: None

## Backlog snapshot (auto-generated helper)
- Remaining counts (Status != Completed): **P1: 2**, **P2: 2**, **P3: 0**
- Top remaining P1 Gap IDs (row order): GAP-CRON-001, GAP-SECURITY-001
- Modules with most open gaps: Marketing (17), User (8), Investments (7), Codex (5), Docs (5)
