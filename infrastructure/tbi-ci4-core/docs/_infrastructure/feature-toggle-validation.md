# Feature Toggle Validation

## Result
Static validation complete for the overlay package.

## Controls verified
- `Config/Features.php` includes integration + system-level flags.
- `Config/Infrastructure.php` defines global overlay safety defaults.
- `Config/Integrations.php` centralizes provider schema.
- Commands and reports are generated without requiring external APIs.

## Gaps found in source repo (upstream MyMIWallet)
1. Direct `env()/getenv()` usage in deep libraries/services still exists.
2. Some API consumers mix transport + business logic, limiting disableability.
3. Cron route endpoints may execute domain flows without feature pre-checks.

## Required next patches
- Add guards in upstream `app/Config/Services.php` for every optional subsystem.
- Add Null-object adapters for Redis/IMAP/external providers when disabled.
- Add centralized `Infrastructure` feature checks in route-level cron handlers.
