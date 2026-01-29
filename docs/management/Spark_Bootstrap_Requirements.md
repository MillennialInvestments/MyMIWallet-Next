# Spark Bootstrap Requirements

This document captures the runtime truth needed for `php spark` to boot inside Codex/CI/production environments.

## Why `php spark list` failed in the Codex environment

The Codex workspace does **not** have Composer dependencies installed, so Spark cannot load the CodeIgniter bootstrap:

- `vendor/autoload.php` is missing.
- `vendor/codeigniter4/framework/system/Boot.php` is missing.
- `.env` is not present, so CLI context variables default to empty values.

Without `vendor/`, Spark will exit before command discovery. The fix is to run `composer install` (or `composer install --no-dev` for production), then ensure `.env` is present.

## Spark Bootstrap Checklist

### Required files

- `spark` (CLI entrypoint)
- `app/Config/Paths.php`
- `vendor/autoload.php`
- `vendor/codeigniter4/framework/system/Boot.php`
- `app/Config/Boot/development.php`
- `app/Config/Boot/production.php`
- `app/Config/Boot/cli.php`
- `.env` (or environment variables injected by the runtime)

### Required permissions

- `writable/` must be readable + writable by the CLI user.
  - `writable/cache`
  - `writable/logs`
  - `writable/session`
- `app/`, `public/`, and `vendor/` must be readable by the CLI user.

### Required env vars (CLI context)

Minimum required for Spark boot + core commands:

- `CI_ENVIRONMENT` (`development`, `testing`, or `production`)
- `app.baseURL`
- Database credentials (if commands touch DB):
  - `database.default.hostname`
  - `database.default.database`
  - `database.default.username`
  - `database.default.password`

Optional but required for specific command groups:

- Ops mail ingestion: `MYMI_OPS_IMAP_HOST`, `MYMI_OPS_IMAP_USER`, `MYMI_OPS_IMAP_PASS`
- Discord alerts: `DISCORD_ALERT_WEBHOOK`
- OpenAI analysis: `OPENAI_API_KEY`, `OPENAI_MODEL`

### .env loading rules (CLI)

- `spark` boots via `CodeIgniter\Boot::bootSpark()` and loads `.env` if present in the project root.
- If `.env` is missing, commands only see environment variables from the shell/runner.
- For CI runs, provide `.env` via `cp env .env` or set environment variables explicitly in the CI job.

### CI vs production differences

| Concern | CI | Production |
| --- | --- | --- |
| Dependencies | `composer install` (dev OK) | `composer install --no-dev` |
| Env | `CI_ENVIRONMENT=testing` + mock secrets | `CI_ENVIRONMENT=production` + real secrets |
| Writable perms | Fresh `writable/` | Ensure correct owner + group (e.g., 775) |
| Spark boot | Must fail fast if `vendor/` missing | Must fail fast if `.env`/secrets missing |
| Command safety | Use `--dry-run` for smoke tests | Use `--approve` for destructive ops |

## Quick verification checklist

1. `php -v` shows PHP 8.1+.
2. `ls vendor/autoload.php` and `ls vendor/codeigniter4/framework/system/Boot.php` both exist.
3. `ls app/Config/Boot` includes `development.php`, `production.php`, and `cli.php`.
4. `.env` exists or env vars are injected by the runtime.
5. `php spark` boots and returns help output.
