# Smoke Routes Script Usage

## Title + Scope
Run quick HTTP status checks against key MyMI Wallet routes using `scripts/smoke_routes.sh`.

## Symptoms
- Need a fast sanity check after deploys or config changes.
- Want to confirm clean URLs work alongside `/index.php` fallbacks.

## Root cause (most likely)
Not an error condition—this is a proactive validation tool.

## Safety notes
- Read-only HTTP requests; no state changes.
- Uses curl; respects HTTP redirects.

## Command Set (copy/paste blocks)
```bash
# Default base (www.mymiwallet.com)
./scripts/smoke_routes.sh

# Custom base (staging)
./scripts/smoke_routes.sh https://staging.mymiwallet.com
```

## Expected Output
- Lines prefixed with ✅ for routes returning acceptable statuses.
- Script exits 0 when all checks pass; exits non-zero on first failure.

## If output differs → Branch A/B/C steps
- **Branch A: Dashboard check fails** → Run [CI4 Routing Runbook](../ci4-routing/01_index_php_vs_clean_urls.md).
- **Branch B: Health check fails** → Inspect app health endpoint and PHP-FPM; check recent deploys.
- **Branch C: All routes 403** → Confirm auth/ACL expectations; may be blocking unauthenticated access.

## Fix steps
- Resolve the failing route by following the linked runbook, then rerun the script.

## Verification steps
- Re-run `./scripts/smoke_routes.sh` until all ✅ appear.
- Add extra route probes if needed:
  - `/health.php`
  - `/api/ping`
  - `/index.php/Dashboard`

## Rollback steps
- None required; script is read-only.

## Notes / Follow-ups
- Combine with [check_ci_routes.sh](../../scripts/check_ci_routes.sh) for focused dashboard vs index.php tests.
