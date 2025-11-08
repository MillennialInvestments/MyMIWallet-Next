# Alpha Vantage Rotation Playbook

## Purpose
Describe the manual process for rotating Alpha Vantage API keys and verifying webhook endpoints tied to alert distribution.

## Prereqs
- Access to Alpha Vantage account with ability to generate new keys.
- DreamHost VPS credentials with permission to edit `.env` and `app/Config/APIs.php`.
- Access to Discord/Zapier configuration store for webhook URLs.

## Steps (CLI)
1. Generate new Alpha Vantage keys in the vendor portal; copy all active keys.
2. SSH to the VPS and back up config: `cp app/Config/APIs.php app/Config/APIs.php.$(date +%Y%m%d%H%M)` and `cp .env .env.alpha.$(date +%Y%m%d%H%M)`.
3. Update `.env` entries (`ALPHA_VANTAGE_API_KEY*`, `ALPHA_VANTAGE_API_KEYS`) and mirror keys in `app/Config/APIs.php` arrays.
4. Update Discord/Zapier webhook URLs in `.env` (`DISCORD_*`, `ZAPIER_*`) if they changed, storing secrets in 1Password.
5. Clear caches: `php spark cache:clear` (if available) and hit `_ops/opcache-reset` endpoint.
6. Trigger `php spark alerts:update` (or call `/API/Management/runCRONTasks`) to confirm keys are accepted.

## Validation
- Monitor `writable/logs` for `AlphaVantage rate limit` notices; ensure they drop after rotation.
- Hit `/API/Alerts/addTradeAlert` in staging with a test symbol to confirm EMA enrichment succeeds.
- Send a dry-run Discord alert and Zapier hook to verify new URLs.

## Rollback
- Restore previous `.env` and `APIs.php` backups.
- Re-run cache clear and cron trigger.
- Notify stakeholders of rollback and schedule follow-up rotation window.
