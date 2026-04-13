# Marketing Distribution Engine Hardening & Regression Report

## Complete
- Added `marketing:regression:smoke` to run the full pipeline sequence and assert count movement plus duplicate-target checks.
- Added SQL assertion support for duplicate story hashes, pending review backlog, approved-not-distributed backlog, failed target accumulation, and duplicate target records.
- Added API/ops summaries via `distributionSummary`, `distributionHistory/{generated_content_id}`, `distributionFailedSummary`, and `distributionChannelTotals`.
- Added failure-injection hook support using `MARKETING_DISTRIBUTION_FAILURE_INJECTION_DESTINATIONS`.
- Added `marketing:distribution:failure-inject-test` for channel-level retry behavior checks.
- Hardened target idempotency so failed/retrying targets are updated in-place (no new target row) when ensuring destinations.

## Partially Complete
- Native channel “delivery truth” is proven by code path behavior, but external platform acknowledgements are limited to queued/internal writes for `email` and `discord`.
- Existing `marketing:retry-distribution` behavior is now aligned to retry failed rows; max-retry lockout remains based on config and should be tuned per environment.

## Still Needs Correction
- No dedicated persistent “assertion history” table yet (assertions are runtime-calculated).
- No hard fail threshold configuration per SQL assertion yet (currently command-level warning/fail conditions).

## Runtime Mismatches Discovered
- API endpoints were already routed for distribution summary/history, but backing service methods were missing.
- Prior failure flow moved failed rows to `retrying`, while retry command only selected `failed`, causing retry gaps.

## Future-Risk Areas
- `email` destination currently confirms queue insertion, not confirmed downstream provider delivery.
- `discord` destination confirms enqueue acceptance, not guaranteed webhook/network delivery.
- Smoke assertions may need environment-specific tolerances when production intake volume is intermittent.

## Channel Handler Proof
- **blog**: writes/upserts `bf_marketing_blog_posts` and marks target `sent` on DB write success (internal publish table, not third-party push).
- **in_app**: inserts into `bf_marketing_in_app_notifications` and marks target `sent` (internal staging/notification record).
- **email**: inserts queued rows into `bf_email_outbox` and marks target `sent` (queued delivery, not provider-confirmed send).
- **discord**: calls `MyMIDiscord::enqueuePlain(...)` and marks target `sent` if enqueue returns true (queued delivery, not confirmed post).
