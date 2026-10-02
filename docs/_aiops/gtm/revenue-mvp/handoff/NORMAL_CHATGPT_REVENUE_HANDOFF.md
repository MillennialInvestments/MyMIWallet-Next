# NORMAL CHATGPT HANDOFF: MyMI Trade Alerts revenue MVP
Base SHA at discovery: 80b9439e7caa64451e4a4e207d99cb5278e2e4c4 (origin/main). Re-verify; current origin/main and live AIOps state outrank this file.
Source docs (in repo): docs/_aiops/gtm/revenue-mvp/{SELECTION,FUNNEL_STATUS,REPAIR_SLICES,OFFER,HOW_IT_WORKS,SUBSCRIBER_VALUE,FEATURE_MATRIX,DEMO_SCENARIOS,GTM_CHECKLIST,LAUNCH_COPY}.md, examples/*.json, proposed-tests/, handoff/ (scripts mirror).

## Mission
Drive REV-S001..S009 through TBI AIOps until REVENUE_MVP_CERTIFIED or a genuine gate. TBI AIOps is the only mutation authority. Never mutate /apps/TBI/www/mymiwallet/current. Never charge real cards. Never invent prices or URLs.

## Key facts you must not lose
- Selected product: Trade Alerts (`alerts.trade_alerts`, tier1+, already gated by premium_guard in AlertsController index()/trades()).
- Payment is MISSING: no stripe/braintree/paypal package; $stripApiKey empty; membership view shows a beta mock card; WalletsController::purchase() trusts POSTed `membership_fee`. No writer to bf_users_subscriptions found.
- Prices in SiteSettings: Starter 9.99, Basic 29.99, Pro 49.99, Premium 99.99 (monthly). Pricing/plan choice is an OWNER decision.
- Real public URLs (App::baseURL https://www.mymiwallet.com/): /register, /login, /Memberships, /Alerts/Preview/{symbol}, /Legal/Terms-And-Conditions, /Legal/Privacy-Policy.
- Fixtures are PROPOSED shapes except where examples/ marks provenance.

## Per-sequence protocol
1. cd to the exact AIOps-assigned worktree; verify `git rev-parse --show-toplevel`, branch, objective.
2. `ai check` then `ai next`; follow the semantic next-state. Inspect the output contract before parsing (scripts expect `NEXT_COMMAND:`; if AIOps differs, adapt lib/03 in your worktree under the tooling slice, do not guess).
3. Execute system-owned safe continuation. On failure: preserve evidence, diagnose; if same scope and authorized, fix -> targeted test -> regression -> `ai check` -> `ai next`.
4. Same failed command twice with no changed evidence: STOP REPEATED_FAILURE. Scope widening: SUCCESSOR_REQUIRED. Approval requested: STOP HUMAN_GATE and print the exact token.
5. Use `ai finish` when AIOps owns closeout. No manual commits/merges/pushes in that case. Forbidden: hard reset, clean, stash, force push, history rewrite, rm -rf, production overwrite.
6. First reconcile existing tasks MYMI-GTM-001/002/017/035/041/042/043 in AIOps; verify evidence if already complete, create only the smallest successor delta otherwise.

## Order
S001 -> S003 -> S002 -> S005 -> (S004 after owner gates) -> S007 -> S006 (optional) -> S008 -> S009.
S004 is blocked by: payment provider choice, test keys, migration approval, safe secret config. Proceed with S001/S002/S003/S005/S007/S008 meanwhile; do not wait on Teddy.

## Return to Teddy ONLY for
APPROVE tokens; owner pricing/plan decision (which plans include Alerts; confirm 9.99/29.99/49.99/99.99); payment provider choice and test-mode account/keys (recommended: provider-hosted checkout + signed webhook, test mode first); DB migration approval; legal/compliance sign-off on copy and disclaimers; production release approval; unavoidable scope expansion; control-plane conflict.

## Readiness states
NOT_READY (now) -> IMPLEMENTATION_READY -> SANDBOX_REVENUE_READY (smoke passes, sandbox legs run) -> PRODUCTION_REVENUE_READY (approved release, SHA, post-deploy smoke). Sandbox absent: BLOCKED_EXTERNAL_SANDBOX, keep the rest.

## Automation
/tmp/mymi-revenue-mvp/run-revenue-mvp.sh {preflight|discover|run|test|smoke|closeout|validate|all}
Env: WORKTREE, EXPECTED_BRANCH, REV_OBJECTIVE, optional SMOKE_BASE_URL (non-production), MAX_ITER. Evidence: /tmp/mymi-revenue-mvp/evidence/<run>/. Exit codes: 0 PASS, 1 FAIL, 2 BLOCKED, 3 STOP(guard), 4 HUMAN_GATE, 5 CONTRACT_UNKNOWN, 6 REPEATED_FAILURE, 7 MAX_ITER, 8 BLOCKED_EXTERNAL_SANDBOX.
Scripts are unproven against the live `ai` contract: preflight records `ai next` output so you can confirm.
