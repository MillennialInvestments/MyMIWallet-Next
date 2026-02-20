# Overlay Failure Report

## Overlay simulation
- Fresh CI4 appstarter simulated by static file/namespace compatibility checks.
- Core package includes required Config + Commands + Services + Integrations directories.

## Findings
- No blocking class/namespace collisions inside `infrastructure/tbi-ci4-core/app/*`.
- Runtime dependency caveat: integrating commands into a fresh CI4 app requires adding command classes into `Config/Console.php`.
- Runtime dependency caveat: if Redis/IMAP extensions are absent, dependent subsystems must remain disabled by flags.

## Patch suggestions
1. Provide installer command `infra:overlay-install` to copy/update config registrations safely.
2. Provide optional `Config/Services.overlay.php` for explicit service binding migration.
3. Add CI smoke test: `php spark list` in a clean CI4 fixture app.
