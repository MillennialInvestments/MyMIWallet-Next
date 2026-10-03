# NORMAL CHATGPT HANDOFF: MyMI Trade Alerts revenue MVP (healthcheck 2026-10-03)

## Authority (read first)
Current source-controlled TBI AIOps state is authoritative over this file. Run `ai check` and `ai next` first. Automatically continue deterministic safe same-scope work. Do not make Teddy babysit normal engineering failures. Return to Teddy only for a genuine: APPROVE; credential/provider; database mutation; pricing/owner decision; legal/compliance; production/deployment; or irreconcilable scope/control-plane conflict. Never touch /apps/TBI/www/mymiwallet/current. Never hand-edit AIOps state JSON. Forbidden: git reset --hard, git clean, git stash, force push, history rewrite, rm -rf. Never charge a real card.

## Fields
CURRENT_SHA: head of branch claude/mymi-revenue-mvp-discovery-frjh28 on GitHub (docs only; `git rev-parse origin/claude/mymi-revenue-mvp-discovery-frjh28`)
ORIGIN_MAIN_SHA: 80b9439e7caa64451e4a4e207d99cb5278e2e4c4 (unchanged 2026-09-21 to 2026-10-03; verify with `git fetch origin main`)
TASK_ID: UNKNOWN. Claude had no access to gq-ai01. Resolve: `ai next` / AIOps task list. Candidate existing tasks: MYMI-GTM-039/041/042/043/055/057.
OBJECTIVE_ID: UNKNOWN. Proposed name REV-MVP-TRADE-ALERTS is NOT registered in AIOps (preflight on gq-ai01 returned OBJECTIVE_NOT_IN_AIOPS_STATE).
WORKTREE: UNKNOWN (no revenue worktree authorized yet). BRANCH: UNKNOWN (the claude/ branch is a docs delivery branch, not an AIOps worktree).
REVENUE_MVP: MyMI Trade Alerts (`alerts.trade_alerts`).
WHY_SELECTED: only candidate with a public demo (/Alerts/Preview/{symbol}), an enforced gate (premium_guard in AlertsController index/trades), and a live data pipeline. Budget forecasting needs user-entered data; wallet/Solana/CoinVault carries custody/compliance risk. Candidates 2/3 were shallowly inspected.
CURRENT_STATUS: NOT_READY.
COMPLETED_SLICES: none (all REV slices are docs/proposals only; no application code changed).
CURRENT_SLICE: none. Next: register, then REV-S001.
REPAIR_SLICES: REV-S001 route/landing baseline; REV-S003 entitlement tests; REV-S002 freshness/stale; REV-S005 alerts page output; REV-S004 checkout+subscription lifecycle (human gates); REV-S007 landing/pricing UX; REV-S006 digest (optional); REV-S008 docs sync; REV-S009 E2E smoke. Full records: REPAIR_SLICES.md.
ALLOWED_PATHS (per slice, in REPAIR_SLICES.md): Routes.php, Home.php, AlertsModel/AlertsAPIController/AlertsController, Alerts views, PremiumEntitlementService (only if defect shown), new app/Services/Billing/**, WalletsController::purchase*, themes/public, tests/**, docs/_aiops/gtm/revenue-mvp/**. Forbidden: production tree, .env*, secret values, Exchange/CoinVault/Budget modules.

## Known defects in source (80b9439)
1. No payment processor (no package, empty keys, beta mock card shown on membership page).
2. WalletsController::purchase() trusts POSTed `membership_fee` (price tampering).
3. No writer for bf_users_subscriptions found; PremiumEntitlementService::normalizeStatus does not recognize `past_due`.
4. No Alerts landing page; no entitlement allow/deny tests; freshness display unverified.

## Errors already hit (healthcheck) and status
| # | Error | Cause | State |
|---|---|---|---|
| 1 | git push 403 to MyMIWallet-Next | Claude GitHub App lacked org access | FIXED (push succeeded 2026-10-02) |
| 2 | gq-ai01: "couldn't find remote ref claude/..." | branch not yet pushed when fetched | FIXED (branch now on origin) |
| 3 | STOP OBJECTIVE_NOT_IN_AIOPS_STATE REV-MVP-TRADE-ALERTS rc=3 | objective not registered in AIOps | OPEN: first action below; scripts now report BLOCKED_OBJECTIVE_UNREGISTERED rc=2 |
| 4 | evidence path printed as "/20261002T215037Z" | EVROOT unset in run-revenue-mvp.sh | FIXED (default /tmp/mymi-revenue-mvp/evidence) |
| 5 | scripts assume `ai next` prints `NEXT_COMMAND:` | contract never inspected | OPEN: read gq-ai01 evidence ai-next.contract-sample.txt; runner stops CONTRACT_UNKNOWN rather than guess |
| 6 | ChatGPT's own error report | not delivered to Claude in this session | UNKNOWN: ChatGPT must reconcile its report against this table |
| 8 | MY ERROR: I told Teddy to run `git checkout FETCH_HEAD -- docs/_aiops/gtm/revenue-mvp` inside the canonical clone | canonical main is read-only; that command staged 28 new files into its index/worktree | OPEN: on gq-ai01 check `git status --short` in /apps/TBI/repos/mymiwallet-next. If revenue-mvp files are staged, undo non-destructively: `git rm -r --cached -q docs/_aiops/gtm/revenue-mvp && rm -r docs/_aiops/gtm/revenue-mvp` (plain rm -r, no -f, only that path), then `ai check` for drift. Do not use reset/clean/stash. |
| 7 | agent YAML (colon in description) | found and fixed during validation | FIXED in proposal |

## State observed from the repository (no AIOps access)
- origin/main unchanged at 80b9439. Active AIOps work visible on origin: feature/mymi-gtm-055-public-surface-repair (PUBLIC-S001 register legal-link repair, 2 files, NOT merged). It overlaps REV-S001/S007: let AIOps finish it, then verify; do not redo.
- Unmerged Alerts hardening branches: feature/mymi-gt001f-b2..b5 (owner decision pass, API token guards, deferred route review), feature/gt-002-01h-* (alerts theme). Decide through AIOps whether they must land before REV-S002/S003. Do not cherry-pick by hand.
- GTM tasks 039/041/042/043 exist in docs/_aiops/gtm/tasks.csv; current AIOps status for them is UNKNOWN to Claude.
AI_CHECK_STATE: UNKNOWN to Claude (last human-run result: PASS). AI_NEXT_STATE: UNKNOWN (last: PASS but no objective match). RECOVERY_STATE: none pending. NEXT_COMMAND: `ai next` (read it; scripts expect NEXT_COMMAND: line, verify).
VALIDATIONS: bash -n on all scripts; guard hooks simulated (14 cases); scripts exercised with stub ai (BLOCKED_OBJECTIVE_UNREGISTERED, CONTRACT_UNKNOWN, PRODUCTION_PATH_REJECTED, BRANCH_MISMATCH, PRODUCTION_URL_REJECTED). No PHP tests run, no application code exercised.
FAILURES: see error table. HUMAN_GATE now: none required for registration unless AIOps asks for an APPROVE token. Later gates: pricing/plan choice; payment provider + test keys; DB migration; legal copy review; production release.

## TEST_COMMANDS
`vendor/bin/phpunit tests/feature/AlertsRoutesTest.php tests/feature/PublicRoutesAccessibleTest.php tests/unit/RouteAndViewGuardrailsTest.php` (baseline); `bash docs/_aiops/gtm/revenue-mvp/scripts/04-revenue-test.sh`; proposed new tests in proposed-tests/. Scripts need env WORKTREE, EXPECTED_BRANCH, REV_OBJECTIVE.
DEMO_FIXTURES: docs/_aiops/gtm/revenue-mvp/examples/*.json (safe, provenance-tagged; most shapes PROPOSED).
DOCUMENTATION_PATHS: docs/_aiops/gtm/revenue-mvp/{README,SELECTION,FUNNEL_STATUS,REPAIR_SLICES,OFFER,HOW_IT_WORKS,SUBSCRIBER_VALUE,FEATURE_MATRIX,DEMO_SCENARIOS,GTM_CHECKLIST,LAUNCH_COPY}.md
GTM_STATUS: NOT_READY. LAUNCH_COPY.md is DRAFT. Do not post to communities. Verified URLs: https://www.mymiwallet.com/register, /Memberships, /Alerts/Preview/{symbol}. Plans in SiteSettings: 9.99/29.99/49.99/99.99 monthly (owner decision which include Alerts).
ROLLBACK: nothing deployed. Each slice is one AIOps-owned commit revert; migrations (S004) need down().

## FIRST ACTION
1. cd /apps/TBI/repos/mymiwallet-next ; `git fetch origin` ; pull the delivery branch docs: `git fetch origin claude/mymi-revenue-mvp-discovery-frjh28` (read via `git show origin/claude/mymi-revenue-mvp-discovery-frjh28:docs/_aiops/gtm/revenue-mvp/<file>`; avoid `git checkout FETCH_HEAD --` on canonical main).
2. Determine location class (canonical read-only / authorized worktree / production / unknown). Canonical main is READ-ONLY: do not write there.
3. Run `ai check`, `ai next`; read how AIOps registers an objective (docs/_aiops/gtm/NORMAL_CHATGPT_OPERATOR_INSTRUCTIONS.md, TBI_AIOPS_INSTALL_HANDOFF.md, `ai --help`). Register REV-S001..S009 (map onto GTM-039/041/042/043/055 where already tracked) through AIOps only.
4. Ask AIOps for an authorized feature worktree for the revenue objective. Inside it, run `bash <proposal>/install.sh` ONLY if its scope allows CLAUDE.md and .claude/ (files in docs/_aiops/gtm/revenue-mvp/claude-code-project/). Otherwise skip the Claude project install; it is optional.
5. Run scripts/01-revenue-preflight.sh with the real objective id, then 03-revenue-slice-runner.sh. Loop per slice: ai check -> ai next -> execute -> targeted test -> regression -> git diff --check -> ai finish (when AIOps owns closeout).
NEXT_EXACT_ACTION: steps 1-3 above (registration), then S001.

## Exit codes (scripts)
0 PASS, 1 FAIL, 2 BLOCKED (incl. BLOCKED_OBJECTIVE_UNREGISTERED), 3 STOP guard (production, branch mismatch, CONTROL_PLANE_DRIFT), 4 HUMAN_GATE, 5 CONTRACT_UNKNOWN, 6 REPEATED_FAILURE, 7 MAX_ITER, 8 BLOCKED_EXTERNAL_SANDBOX.
