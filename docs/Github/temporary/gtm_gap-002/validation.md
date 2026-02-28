# GAP-002 Validation Instructions

## Files patched
- app/Commands/GtmHealthSnapshot.php
- app/Config/Console.php
- docs/launch/daily_health_snapshot.md

## Commands
1. `php -l app/Commands/GtmHealthSnapshot.php`
2. `php -l app/Config/Console.php`
3. `php spark cache:clear`
4. `php spark gtm:health:snapshot`

## Expected
- `docs/launch/daily_health_snapshot.md` is overwritten idempotently on each run.
- Snapshot includes route count + list, filter summary, cache driver, logger handlers, environment flags, and API policy summary.
