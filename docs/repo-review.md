# MyMI Wallet Repository Review Guide

This guide walks through a single-command triage of the MyMI Wallet codebase along with
follow-up checks to understand build health, dependency status, and configuration issues.

## Quick Audit (One-Shot Command)

Run the following from the repository root:

```bash
bash -euxo pipefail -c '
php -v >/dev/null 2>&1 && { git ls-files "*.php" | sed "/vendor\//d" | xargs -r -n1 php -l; }
[ -f composer.json ] && composer validate --no-check-all || true
[ -f composer.json ] && composer install --no-interaction --no-progress --prefer-dist || true
[ -f composer.json ] && composer audit || true
[ -f phpstan.neon ] && vendor/bin/phpstan analyse || true
[ -f psalm.xml ] && vendor/bin/psalm || true
[ -f package.json ] && npm install --no-audit --no-fund || true
[ -f package.json ] && npm run build || true
[ -f package.json ] && [ -f tsconfig.json ] && npx tsc --noEmit || true
[ -f nginx.conf ] && nginx -t -c "$(pwd)/nginx.conf" || true
[ -d writable ] && find writable -maxdepth 1 -type d -exec test -w {} \; || echo "Writable directory check failed"
[ -d certificates ] && ls certificates
'
```

### What It Does
- PHP syntax scan across tracked files (excluding `vendor/`).
- Composer validation, install (cached), and security audit.
- Static analysis via PHPStan and Psalm when configuration files exist.
- Node dependency install, production build, and TypeScript check when applicable.
- Nginx config validation when a config is present.
- Ensures writable directories exist and checks certificates for visibility.

## Manual Follow-Up Checklist
1. Review the output for any `Errors parsing` entries from `php -l`.
2. Investigate Composer audit vulnerabilities and create issues/tasks as needed.
3. Capture build artifacts or logs from `npm run build` failures for front-end teams.
4. Confirm static analysers (PHPStan/Psalm) run within the Codex diff budget; silence noisy rules locally if necessary.
5. For Nginx warnings, check `nginx.conf.bak` and environment-specific overrides in `nginx/`.
6. Verify cron configuration in `crontab.txt` and system crontab to prevent runaway jobs.
7. Document any secrets or certificate anomalies uncovered during the review.

## Reporting
- Summarize findings with references to the failing command output.
- File or update Codex tasks (`mmi-intake`) for work that exceeds the current scope.
- Link the generated task IDs in Slack/issue threads for traceability.
