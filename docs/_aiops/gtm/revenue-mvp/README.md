# Revenue MVP: MyMI Trade Alerts (state: NOT_READY)
Evidence base: origin/main 80b9439e7caa64451e4a4e207d99cb5278e2e4c4 (unchanged as of 2026-10-03). Details: SELECTION.md, FUNNEL_STATUS.md, REPAIR_SLICES.md.

REVENUE_MVP_SELECTED: Trade Alerts (`alerts.trade_alerts`, "Trade alerts", min tier tier1, trial allowed)
CUSTOMER: self-directed retail investors/traders who monitor tickers
PROBLEM: alerts, charts and news are scattered across many tabs
PAID_VALUE: alerts feed, trades view, alert history with news/chart context
RECURRING_VALUE: new alerts and fresh market data each market day (refresh cadence UNVERIFIED)
CURRENT_FEATURES: AlertsModel/AlertsAPIController pipeline (scanner, signals, email/Discord processors), public preview /Alerts/Preview/{symbol}, user Alerts pages gated by premium_guard
CURRENT_PRICING: SiteSettings monthly: Starter 9.99, Basic 29.99, Pro 49.99, Premium 99.99 (owner must confirm which include Alerts; PRICE_CONFLICT_FOUND: none in inspected files; DB/env overrides UNVERIFIED)
CURRENT_PLANS: Starter, Basic, Pro, Premium (entitlement tiers: starter/basic=tier1, pro=tier2, premium/gold=tier3)
CURRENT_SIGNUP_PATH: /register -> /login -> /Memberships (dedicated landing MISSING)
CURRENT_PAYMENT_PATH: MISSING (no processor package, empty keys, beta mock card on membership view, client-supplied price in WalletsController::purchase)
CURRENT_ENTITLEMENT_PATH: WORKING read path: PremiumEntitlementService::resolve -> premium_guard('alerts.trade_alerts'); subscription WRITER not found
CURRENT_SUBSCRIBER_OUTPUT: alerts pages exist; data-timestamp/stale display UNVERIFIED; digest MISSING
MISSING_COMPONENTS: payment provider + webhook, subscription writer, cancel/failed-payment states (past_due not recognized by normalizeStatus), landing page, freshness display, entitlement tests

Overlap to reconcile via AIOps: branch feature/mymi-gtm-055-public-surface-repair (PUBLIC-S001 register legal links, unmerged) covers part of REV-S001/S007. Unmerged Alerts hardening branches exist (GT-001F-B2..B5, e.g. API token guards); AIOps decides whether they precede REV-S002/S003.
Scripts: scripts/run-revenue-mvp.sh. Handoff: NORMAL_CHATGPT_REVENUE_HANDOFF.md.
