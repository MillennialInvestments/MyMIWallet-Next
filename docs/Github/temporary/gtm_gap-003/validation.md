# GAP-003 Validation Instructions

## Files patched
- app/Config/ExternalApiPolicy.php
- app/Services/ExternalApiGuard.php
- app/Config/Services.php
- app/Commands/GtmHealthSnapshot.php
- docs/launch/external_api_cost_controls.md
- docs/launch/daily_health_snapshot.md

## Commands
1. `php -l app/Config/ExternalApiPolicy.php`
2. `php -l app/Services/ExternalApiGuard.php`
3. `php -l app/Config/Services.php`
4. `php -l app/Commands/GtmHealthSnapshot.php`
5. `php spark cache:clear`
6. `php spark gtm:health:snapshot`
7. `php vendor/bin/phpunit --filter ExternalApiGuardTest`

## Expected
- ExternalApiGuard denies calls after provider cap and logs critical.
- Snapshot includes `ExternalApiPolicy.providerCaps.*` and backoff settings.
