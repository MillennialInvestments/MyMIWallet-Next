# CI4 Logging & CLI Fixes — 2025-12-22

## What changed

- **Logging:** `logs:healthcheck` and `logs:summarize` now resolve log files using the configured `FileHandler` extension (defaulting to `.php`) and fall back to `.log` only when needed.
- **CLI stability:** Command constructors were removed/avoided; `OpsFetchCommands` now lazy-loads its model to prevent spark autoload failures.
- **Mail provider:** `MailService` now references the correct mail provider namespaces and sample `.env` entries include sender defaults.
- **Guardrails:** Added a helper script to flag any future zero-argument command constructors.

## Verification commands

Run from the project root (disable opcache for accurate CLI behavior):

- `php -d opcache.enable_cli=0 spark list`
- `php -d opcache.enable_cli=0 spark routes`
- `php -d opcache.enable_cli=0 spark cache:clear`
- `php -d opcache.enable_cli=0 spark logs:healthcheck`
- `php -d opcache.enable_cli=0 spark logs:summarize yesterday`
- `ls -la writable/logs | tail -n 30`