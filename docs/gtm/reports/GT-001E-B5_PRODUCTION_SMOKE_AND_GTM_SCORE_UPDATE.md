# GT-001E-B5 Broker Production Smoke and GTM Score Update

## Status

Validation/report-only. No route mutation, no controller restoration, no route deletion, no database mutation, no external API calls, and no production mutation.

## Production Deployment Evidence

- PR #563 deployed: Broker route classification audit.
- PR #564 deployed: Broker remediation plan.
- PR #565 deployed: Broker route remediation matrix.
- PR #566 deployed: Broker owner decision pass.
- PR #567 deployed: Broker legacy-read apiToken guard patch.
- PR #568 deployed: Wallets API replacement coverage.

## Current Broker Readiness Snapshot
STATUS=FAIL
ROUTES_PHP_BROKER_ROUTES=81
SPARK_REGISTERED_BROKER_ROUTES=81
EXPLICIT_GUARDED_ROUTES=10
EXPLICIT_UNGUARDED_ROUTES=71
MISSING_HANDLER_FILES=77
EXTERNAL_FETCH_REVIEW_ROUTES=60
MUTATION_REVIEW_ROUTES=7

## GTM Score Recommendation

- Prior master GTM readiness score: 30 / 100.
- Recommended Broker lane improvement: +4.
- Recommended updated master GTM readiness score: 34 / 100.

## Why The Score Moves

- Broker route inventory is now documented.
- Owner decision matrix exists for legacy Broker routes.
- The safest first 10 legacy-read Broker routes now have explicit apiToken route filters.
- Wallets API replacement coverage is documented for Plaid and Robinhood route families.

## Why The Score Does Not Move Higher

- 77 registered Broker routes still reference missing handler files.
- 71 Broker routes remain without explicit route-level auth/api/internal filters.
- Plaid and Robinhood route families still need owner-approved redirect, deprecation, or replacement decisions.
- Link, unlink, refresh, and sync routes still require mutation-safe method and guard review.

## Next Recommended Lane

GT-001F Alerts API_TOKEN classification.
