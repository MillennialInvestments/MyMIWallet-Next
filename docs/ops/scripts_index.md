# Operations Scripts Index

Single-operator toolkit for daily DevOps and marketing tasks on DreamHost (no sudo required). All scripts live in `/scripts` and assume bash + PHP 8.2 are available.

| Script | Purpose | When to Run | Example |
| --- | --- | --- | --- |
| `doctor.sh` | Quick system + app sanity check (git state, PHP/composer presence, writable dirs, spark bootstrap, log errors, disk usage). | Morning check, before deploys. | `./scripts/doctor.sh` |
| `deploy_safe.sh` | Fast-forward pull + composer install + CI4 cache clear + optional opcache reset. Logs to `writable/logs/deploy-YYYY-MM-DD.log`. | Controlled deploys without sudo. | `./scripts/deploy_safe.sh` or `./scripts/deploy_safe.sh --dev` |
| `warm_routes.sh` | Curl-warm routes listed in `scripts/warm_routes.txt`, reporting status + timing. | After deploy or cache clear. | `./scripts/warm_routes.sh https://www.mymiwallet.com` |
| `smoke_routes.sh` | Minimal health smoke: home, `/healthz`, and protected dashboard route (accepts 200/301/302/403). | Post-deploy verification. | `./scripts/smoke_routes.sh https://www.mymiwallet.com` |
| `lint_no_route_tokens.sh` | Ensures CI4 route tokens stay inside `app/Config/Routes.php` or `app/Modules/*/Config/Routes.php`. | Pre-commit / pre-deploy. | `./scripts/lint_no_route_tokens.sh` |
| `logs_triage.sh` | Tail newest log + group ERROR/CRITICAL counts with optional filter. | During incidents or morning triage. | `./scripts/logs_triage.sh 200` or `./scripts/logs_triage.sh 200 Marketing` |
| `cron_kick.sh` | Calls cron/manual endpoints from `scripts/cron_endpoints.json` using `CRON_SECRET` (from env or `.env`), supports `--base` and `--dry-run`. | Manual cron replay or verification. | `./scripts/cron_kick.sh --base https://www.mymiwallet.com --dry-run` |
| `social_ignite.php` | Generates platform-specific marketing posts from one input (title/message/url), writing per-platform files + bundle JSON. | Campaign prep for Discord/X/LinkedIn/Facebook/email/blog. | `php scripts/social_ignite.php --input scripts/social_input.sample.json` |

Supporting files:
- `scripts/warm_routes.txt` — default warm targets.
- `scripts/cron_endpoints.json` — structured cron endpoints + headers.
- `scripts/social_templates.json` — platform templates/limits.
- `scripts/social_output/` — generated marketing assets (gitignored).
