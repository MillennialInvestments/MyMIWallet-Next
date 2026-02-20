# Subsystem Inventory

This inventory captures non-baseline CI4 subsystems found in MyMIWallet and maps them to portability + toggle requirements for TBI Core.

## Discovered categories
- Custom Services (`app/Services/*`)
- Logger and diagnostics (`app/Config/Logger.php`, `app/Config/Debug.php`)
- Spark commands (`app/Commands/*`, registered through `app/Config/Console.php`)
- AIOps modules (`app/Services/AIOps/*`, `app/Commands/Ops/*`)
- Cron route orchestration (`app/Config/Routes.php`)
- External provider clients (AlphaVantage, MarketAux, CoinGecko, Discord, Zapier, IMAP, Twilio)
- Queue/worker systems (`app/Config/QueueConfig.php`, queue workers)
- Redis/caching subsystem (`app/Config/Cache.php`, predis)
- Email subsystem (SMTP + IMAP)
- Security middleware/filters (`app/Filters/*`, `app/Config/Filters.php`)
- Service container overrides (`app/Config/Services.php`)

## Portability summary
- Portable with guard rails: services, integrations, spark commands, logging, cache, security filters.
- Needs toggle hardening: AIOps modules, email/imap scanners, cron route groups.
- Needs refactor from hard-coded env access: legacy domain libraries under `app/Libraries/*`.

## Required controls
- Every subsystem must be protected by `feature.*` or `feature.integration.*` flag.
- Services must return null/fallback when disabled.
- Optional dependencies (Redis, IMAP, DB tables) must fail closed without boot-fatals.
