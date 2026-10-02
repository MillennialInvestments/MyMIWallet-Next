# Repair slices (execution order). BASE_SHA=80b9439e7caa64451e4a4e207d99cb5278e2e4c4 (re-verify at start).
Common: OBJECTIVE_ID=REV-MVP-TRADE-ALERTS (register in AIOps), WORKTREE/BRANCH/TASK_ID assigned by `ai`, never by hand. FORBIDDEN_PATHS for all: production tree /apps/TBI/www/**, `.env*`, `app/Config/APISettings.php` secret values, unrelated modules (Exchange, CoinVault, Budget). Related existing tasks to reconcile via AIOps first: MYMI-GTM-001/002 (credentials/config), -017 (registration), -035 (idempotency/webhook), -041/-042 (market data, alerts), -043 (memberships/entitlements). If AIOps shows them done, verify evidence and do not redo.

## REV-S001 Route/landing integrity baseline
PROBLEM: no proven public path to Alerts; preview free/paid split unknown. IMPACT: visitors cannot convert. EVIDENCE: Routes.php 246-255. ALLOWED: app/Config/Routes.php, app/Controllers/Home.php, tests/feature/**. PATCH_INTENT: run baseline tests; assert 200 for /, /Memberships, /register, /login, legal pages, /Alerts/Preview/NVDA; fix only broken targets. TARGETED_TEST: tests/feature/PublicRoutesAccessibleTest.php. REGRESSION: AlertsRoutesTest. ROLLBACK: revert slice commit. PASS: all 200; FAIL_RECOVERY: fix same-scope route; SUCCESSOR: S002. HUMAN_GATE: none.

## REV-S002 Subscriber data pipeline + freshness
PROBLEM: refresh cadence, stale handling unproven. IMPACT: empty/old feed. ALLOWED: app/Models/AlertsModel.php, app/Modules/APIs/Controllers/AlertsAPIController.php (read paths), app/Config/**no secrets**, tests/unit/**. PATCH_INTENT: expose `data_timestamp` and stale flag in alerts payload; degrade safely if provider returns nothing. TARGETED: new tests/unit/AlertsFreshnessTest.php (fixtures in examples/). REGRESSION: ScannerEndpointsTest. HUMAN_GATE: provider API keys (real activation).

## REV-S003 Entitlement enforcement tests
PROBLEM: no allow/deny tests for `alerts.trade_alerts`. ALLOWED: tests/feature/**, tests/_support/**, PremiumEntitlementService only if a defect is shown. PATCH_INTENT: feature tests for free(deny 403/redirect), tier1 active(allow), expired(deny), trial. TARGETED: tests/feature/RevenueEntitlementTest.php (proposed: proposed-tests/). REGRESSION: AlertsRoutesTest. HUMAN_GATE: none.

## REV-S004 Checkout + subscription lifecycle (largest)
PROBLEM: no processor, client-set price, no subscription writer, no cancel/failed-payment handling. ALLOWED: new app/Services/Billing/**, WalletsController::purchase*, new webhook route+controller, migration adding provider ids to bf_users_subscriptions, tests/**. PATCH_INTENT: provider hosted checkout in TEST MODE; server-side price map from SiteSettings keyed by plan (ignore POSTed fee); signature-verified idempotent webhook creates/updates bf_users_subscriptions (tier, status, expires_at); cancel at period end; failed payment -> status past_due (NOTE: PremiumEntitlementService::normalizeStatus does not list past_due at line ~181; extend it) -> denied after grace; remove "BETA CREDIT CARD" copy. TARGETED: tests/feature/RevenueCheckoutTest.php with provider test fixtures (no network). HUMAN_GATES: provider choice (owner), provider account/test keys, DB migration approval, secrets via safe runtime config (GTM-002), real-money activation.

## REV-S005 Subscriber alerts page output
ALLOWED: app/Modules/User/Views/Alerts/**, AlertsController. PATCH_INTENT: show timestamps, empty-state, stale banner, disclaimer; no internal data. TARGETED: tests/feature/AlertsPageRenderTest.php. 

## REV-S006 Digest/alert delivery (only if owner wants it in v1)
PATCH_INTENT: per-subscriber in-app/email digest using existing email processors; gated by entitlement; unsubscribe link. HUMAN_GATE: email provider/credentials; marketing consent (legal).

## REV-S007 Landing/pricing/CTA UX
ALLOWED: app/Views/themes/public/**, Routes.php (new `/Trade-Alerts` landing, proposed), Home.php. PATCH_INTENT: one-URL landing with offer, preview links, plans, legal links, disclaimers, mobile-safe. HUMAN_GATE: OWNER pricing/plan selection for Alerts, copy/legal approval.

## REV-S008 Docs/fixtures sync
ALLOWED: docs/_aiops/gtm/revenue-mvp/**. Update docs to the implemented reality; remove PROPOSED tags only where proven.

## REV-S009 End-to-end smoke
ALLOWED: tests/smoke/**, tools/**. PATCH_INTENT: wire run-revenue-mvp.sh validate into repo tests/smoke. Sandbox legs BLOCKED_EXTERNAL_SANDBOX until keys exist. 

Rollback for every slice: single commit revert via AIOps; migrations (S004) must ship with down().
Readiness: NOT_READY now. IMPLEMENTATION_READY after S001-S005,S007-S008 + S004 tests pass. SANDBOX_REVENUE_READY after S009 sandbox legs pass. PRODUCTION_REVENUE_READY needs approved release + post-deploy smoke.
