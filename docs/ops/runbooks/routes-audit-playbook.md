# Routes Audit Playbook

## Purpose
Provide manual verification steps for controller-to-route mappings and HTTP responses.

## Prereqs
- SSH access or deployment URL with admin credentials.
- Ability to tail application logs and run `php spark routes` locally.

## Steps (CLI)
1. Run `php spark routes --filter=API` and export output to `/tmp/routes-api.txt`.
2. Compare the generated list against `app/Config/Routes.php` to identify duplicates (e.g., health endpoints, Support routes).
3. For each audited controller, send sample requests:
   - `curl -I https://www.mymiwallet.com/API/Management/Run-CRON-Tasks?cronKey=...`
   - `curl -s https://www.mymiwallet.com/Support` (expect 200 + rendered layout).
   - `curl -s https://www.mymiwallet.com/API/Alerts/addTradeAlert` with JSON payload (expect JSON schema).
4. Capture HTTP status, headers, and response snippets; log discrepancies in `/home/mymiteam/logs/route-audit-$(date +%F).md`.

## Validation
- Confirm each audited route returns 2xx/3xx or expected 4xx with JSON `{ status, message|data }`.
- Verify no duplicate route definitions exist after changes by re-running `php spark routes`.

## Rollback
- Revert route or controller changes with `git checkout -- app/Config/Routes.php` and redeploy.
- Notify stakeholders if any controller remains unreachable and schedule follow-up patch.
