# User Flow Validation

## Simulated Flows Reviewed
1. Guest → register → login → use free tools
2. Guest → `/Discord/register` attribution resolution
3. Free user → premium feature → upsell redirect / 403 JSON
4. Premium user → gated endpoint access
5. Expired subscription → entitlement downgrade
6. Wallet swap endpoint → entitlement check
7. Investments analytics API → entitlement check
8. Budget forecasting page → entitlement check

## Validation Method
- Static code tracing across controllers, APIs, routes, filters, shared views, and fetch helpers
- Migration/schema validation against checked-in docs and migrations
- PHP linting on changed files

## Observed Outcomes
- Source-prefixed registration routes now map cleanly through filters.
- Attribution is now both logged and persisted to `users` when columns exist.
- Premium denials consistently redirect browser flows to `/Memberships` and return 403 JSON for API/AJAX callers.
- API-side analytics and swap endpoints no longer rely solely on UI/controller gating.

## Remaining Risks
- No live browser/database environment was available to execute end-to-end production sessions.
- Background jobs and older alert-processing scripts still need deeper runtime verification in staging before Discord promotion.
