# 00 Daily Ops Quick Checks

## Title + Scope
Daily read-only validation of the MyMI Wallet stack on DreamHost.

## Safety notes
- No sudo required; commands are read-only.
- Stop and investigate before reloading services.

## Command Set (copy/paste blocks)
```bash
# 1) NGINX config test
"$HOME/nginx/sbin/nginx" -p "$HOME/nginx" -c conf/nginx.conf -t

# 2) Master/worker presence
ps -ef | grep '[n]ginx'

# 3) Health endpoint
curl -Is https://www.mymiwallet.com/healthz -k

# 4) Recent error log
ERROR_LOG="$HOME/nginx/logs/error.log"
[ -f "$ERROR_LOG" ] && tail -n 50 "$ERROR_LOG" || echo "no error log found"

# 5) Cert expiry (uses new helper)
./scripts/check_cert_expiry.sh www.mymiwallet.com

# 6) Smoke routes
./scripts/smoke_routes.sh

# 7) Route token lint
./scripts/lint_no_route_tokens.sh
```

## Expected Output
- `nginx -t` passes.
- `ps` shows master and worker processes.
- Health endpoint returns 200/301/302.
- Error log tail shows no new critical errors.
- Cert expiry script reports days remaining and exits 0 when >= 7 days.
- Smoke routes and lint scripts exit 0.

## If output differs → Branch A/B/C steps
- **Branch A: `nginx -t` fails** → Use [User-Space NGINX Start/Reload/PID](../nginx/01_user_space_nginx_start_reload_pid.md).
- **Branch B: Health endpoint fails** → Check app/PHP-FPM and recent deploys; consider `tail` on application logs under `writable/logs`.
- **Branch C: Cert expiry < 7 days** → Renew via acme.sh using [ACME http-01 404 Fix](../ssl/01_acme_http01_404_fix.md) if challenges fail.

## Verification steps
- Rerun this checklist after any remediation.

## Rollback steps
- Revert any config changes that caused new failures before reloading nginx.

## Notes / Follow-ups
- Log daily results in the [Incident Template](../templates/incident_template.md) when anomalies appear.
