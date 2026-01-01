# Gap Audit Execution Playbook

Use this playbook to process `docs/gap-audit/gap_tracker.csv` one row at a time without losing place.

## Cursor (do not remove)
- CURRENT_ROW_INDEX: **21** _(1-based, excludes header)_
- CURRENT_GAP_ID: **GAP-WALLETS-001**
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
Gap ID: GAP-WALLETS-001
Row Index: 21
Priority: P1
Module: Wallets
Requirement: Implement /API/Wallets/summary JSON endpoint and nightly cache pre-warm CLI for dashboard hydration
Acceptance Criteria:
  - Create /API/Wallets/summary route returning JSON of wallet balances, positions, and alerts for the authenticated user (use existing models/services where possible).
  - Add CLI command to pre-warm wallet summary cache for all active users; idempotent and safe to re-run.
  - Document the route and CLI usage under docs/wallets/wallets-index.md, including cache keys and validation steps.
Files Likely Impacted: app/Config/Routes.php; docs/wallets/wallets-index.md
Mandatory Outputs:
  - Implement required code/docs changes for this Gap (or docs-only when applicable).
  - Update the matching row in docs/gap-audit/gap_tracker.csv (Status, Code Evidence, Notes, Completed Date, Target Version as needed).
  - Add/update any supporting doc under /docs/* if the change introduces new behavior or tests.
```

## LAST COMPLETED ROW (Audit Log)
- Row Index: 17
  - Gap ID: GAP-PREDICTIONS-002
  - Summary: Pointed /Predictions/* UI routes to the User module controller namespace and documented verification steps in the predictions README.
  - Files changed: app/Config/Routes.php; docs/predictions/README.md; docs/gap-audit/gap_tracker.csv; docs/gap-audit/next-steps.md
  - How to test: php spark routes | grep Predictions (after composer install) to confirm UI endpoints resolve to App\Modules\User\Controllers\PredictionsController
  - Follow-ups created: None

## Backlog snapshot (auto-generated helper)
- Remaining counts (Status != Completed): **P1: 3**, **P2: 2**, **P3: 0**
- Top remaining P1 Gap IDs (row order): GAP-WALLETS-001, GAP-CRON-001, GAP-SECURITY-001
- Modules with most open gaps: Marketing (17), User (8), Investments (7), Codex (5), Docs (5)
