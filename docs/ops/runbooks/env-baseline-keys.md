# Environment Baseline Keys

## Purpose
Document the manual verification process for production `.env` secrets and security toggles.

## Prereqs
- SSH access to DreamHost VPS with user permissions for the deployment directory.
- Read access to `.env` and backups under `/home/mymiteam/mymiwallet/site/current/`.
- Awareness of expected DB, email, and cookie settings for the target environment.

## Steps (CLI)
1. `cd /home/mymiteam/mymiwallet/site/current` and run `cp .env .env.backup-$(date +%Y%m%d%H%M)`.
2. Open `.env` with a safe editor (`nano -w .env`) and confirm:
   - `CI_ENVIRONMENT=production`, `CI_DEBUG=false`, `app.forceGlobalSecureRequests=true`.
   - `cookie.domain` matches primary domain and `cookie.secure=true`.
   - Database credentials (`database.default.*`) match managed MySQL instance.
   - Mail transport keys (`email.SMTPHost`, etc.) are populated.
   - CSP toggles align with rollout plan (`security.CSPEnabled=true` unless emergency exemption).
3. Save changes and exit; run `php spark config:check` (or equivalent) to lint configuration.
4. Reload PHP opcode cache via `_ops/opcache-reset` endpoint to apply settings.

## Validation
- Hit `/healthz` and `/status` to confirm HTTP 200 responses.
- Trigger a minimal authenticated page to ensure sessions and cookies remain valid.
- Review `writable/logs` for new warnings.

## Rollback
- Restore the previous backup with `mv .env.backup-YYYYMMDDHHMM .env`.
- Clear opcode cache again via `_ops/opcache-reset`.
- Notify stakeholders of the rollback and capture diff for follow-up.
