# Environment Production Readiness (.env)

Use this list before promoting a build. Confirm values directly on the DreamHost VPS in the deploy path (no sudo required).

## Core `.env` Keys
- `CI_ENVIRONMENT=production`, `CI_DEBUG=false`
- `app.baseURL=https://www.mymiwallet.com` (or target domain)
- `app.forceGlobalSecureRequests=true` and cookies set to secure/HTTPS.
- Database: `database.default.*` matches managed MySQL; read-only replicas configured if applicable.
- Encryption: `encryption.key`, `security.sessionAuthSecret` populated; rotate if uncertain.
- Mail: `email.protocol`, `email.SMTPHost`, `email.SMTPUser`, `email.SMTPPass`, `email.SMTPPort`, `email.SMTPCrypto` set for production provider.
- Queue/cache: Redis connection strings present when enabled; disable gracefully if service unavailable.
- Logging: `logger.handlers[]` includes `DatabaseLoggerHandler` (writes to `bf_error_logs`); log threshold set to warning+ for production.
- Base paths: Asset/CDN URLs correct; no references to staging domains.

## Ops Toggles
- Maintenance mode toggle/landing page ready for controlled downtime.
- Feature flags for marketing/alerts/predictions align with launch scope.
- CSP, rate limiting, and throttle settings match security plan.

## Verification Steps
1. Backup `.env`: `cp .env .env.backup-$(date +%Y%m%d%H%M)`.
2. Validate keys per above; run `php spark config:check` (or equivalent) to lint configuration.
3. Clear opcode cache via `_ops/opcache-reset` or `/API/Ops/OPcacheReset`.
4. Hit `/healthz` and `/status` for 200 responses; load an authenticated page to verify sessions/cookies.
5. Review `writable/logs` and `bf_error_logs` for new warnings after reload.

## DreamHost Constraints
- Deployments run under the app user—**no `sudo` available**. Use user-space `nginx -t && nginx -s reload` and PHP-FPM reload commands provided by the host.
- App listens behind DreamHost proxy; ensure forwarded proto headers map to HTTPS (see `docs/nginx/*`).
- Database backups stored in user space; verify disk quotas before running large jobs.
