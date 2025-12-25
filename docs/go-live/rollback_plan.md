# Rollback Plan

Follow these steps if a deployment fails or critical issues appear.

## 1) Database Backup and Restore
- Confirm latest backup timestamp; if missing, take an immediate snapshot: `mysqldump ... > backup-YYYYMMDDHHMM.sql` (user-level permissions).
- To restore: stop write traffic (enable maintenance), `mysql ... < backup-YYYYMMDDHHMM.sql`.
- Verify restore by checking a known record (user login or budget entry) and the `bf_error_logs` table count.

## 2) Application Version Rollback
- Identify previous release tag or commit and switch the symlink/deploy directory to that build.
- Reinstall dependencies if the vendor/node build differs (`composer install --no-dev`, `npm ci && npm run build` if applicable).
- Clear opcode cache: `_ops/opcache-reset` or `/API/Ops/OPcacheReset`.
- Confirm routes (`app/Config/Routes.php`) align with the rolled-back build.

## 3) Nginx/Site Config Revert
- Restore the last known-good Nginx config from backup (user-space path per `docs/nginx/`).
- Run `nginx -t` as the app user; reload with `nginx -s reload`.
- Ensure FastCGI params point to the correct PHP-FPM socket/port and HTTPS headers propagate.

## 4) Post-Rollback Validation
- Hit `/healthz` and `/status` (expect 200), then authenticate to `/Account`.
- Spot-check critical flows: login, dashboard widgets, `/Budget/summary`, `/Investments`, `/API/Alerts/processTradeAlerts`.
- Check `bf_error_logs` and `writable/logs` for new CRITICAL/ERROR entries.
- Confirm email sending works with a test password reset.

## 5) Incident Checklist (Short)
- Record start/end times, impacted routes, and user impact.
- Capture key logs/screenshots and the commit hash rolled back from/to.
- Notify stakeholders and create a follow-up task to fix the root cause.
- Disable maintenance mode once validations pass.
