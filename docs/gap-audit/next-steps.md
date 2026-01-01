# Gap Audit Execution Playbook

Use this playbook to process `docs/gap-audit/gap_tracker.csv` one row at a time without losing place.

## Cursor (do not remove)
- CURRENT_ROW_INDEX: **5** _(1-based, excludes header)_
- CURRENT_GAP_ID: **GAP-PREDICTIONS-001**
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
Gap ID: GAP-PREDICTIONS-001
Row Index: 5
Priority: P1
Module: Predictions
Requirement: Add migrations for predictions markets/options/orders/trades/positions/liquidity/settlements/payouts
Acceptance Criteria:
  - Create migrations that define tables for markets, options, orders, trades, positions, liquidity, settlements, and payouts using CI4 migration conventions.
  - Register migrations with spark so they can be executed via CLI.
  - Ensure foreign keys/indexes cover common lookups (user, market, option, order identifiers) with safe defaults.
  - Provide brief docs or inline comments on running the migrations and any seed data if applicable.
Files Likely Impacted: app/Database/Migrations/*; docs/predictions/README.md; spark or composer.json if migration namespace registration is required.
Mandatory Outputs:
  - Implement required code/docs changes for this Gap (or docs-only when applicable).
  - Update the matching row in docs/gap-audit/gap_tracker.csv (Status, Code Evidence, Notes, Completed Date, Target Version as needed).
  - Add/update any supporting doc under /docs/* if the change introduces new behavior or tests.
```

## LAST COMPLETED ROW (Audit Log)
- Row Index: 4
  - Gap ID: GAP-DEVOPS-001
  - Summary: Hardened /system/healthz and /system/diag to return structured JSON (status, timestamp, dependency checks, app_version/git_ref metadata) with latency logging and failure telemetry, plus feature tests and doc curl guidance.
  - Files changed: app/Controllers/System/HealthController.php; tests/feature/SystemHealthEndpointsTest.php; docs/hardening-playbook.md; docs/gap-audit/gap_tracker.csv; docs/gap-audit/next-steps.md
  - How to test: curl -sS '${BASE_URL}/system/healthz' | jq . ; curl -sS '${BASE_URL}/system/diag' | jq . ; phpunit (once composer install succeeds)
  - Follow-ups created: None

## Backlog snapshot (auto-generated helper)
- Remaining counts (Status != Completed): **P1: 5**, **P2: 2**, **P3: 0**
- Top remaining P1 Gap IDs (row order): GAP-PREDICTIONS-001, GAP-PREDICTIONS-002, GAP-WALLETS-001, GAP-CRON-001, GAP-SECURITY-001
- Modules with most open gaps: Marketing (17), User (8), Investments (7), Codex (5), Docs (5)
