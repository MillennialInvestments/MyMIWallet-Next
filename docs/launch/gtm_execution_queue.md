# GTM Execution Queue

Queue generated from `docs/launch/gtm_gap_report.json` using launch priority order:
1) CRITICAL, 2) HIGH, 3) Core flow breakages, 4) Security exposures, 5) Logging/cost-bomb risks, 6) UX errors.

| Execution Order | Gap ID | Severity | Gate | File paths | Fix complexity | Status | Notes |
|---:|---|---|---|---|---|---|---|
| 1 | GAP-004 | MED | security_access_control | `docs/functional_inventory/feature_inventory.csv` | SMALL | NEEDS_YOU | Need active staging token tests for all INTERNAL_CRON routes |

## Immediate next unit
- `GAP-004` (MED, non-launch-blocking) requires staged token validation evidence.
