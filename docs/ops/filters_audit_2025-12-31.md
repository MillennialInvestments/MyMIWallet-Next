# CI4 Filters Audit — 2025-12-31

Audit run to reconcile `app/Config/Filters.php` aliases with actual filter classes and routing usage. Sources scanned:

- `app/Config/Filters.php` (aliases, globals, filters lists)
- `app/Config/Routes.php` (route groups that apply `filter => 'alias'`)
- `rg "filter =>" app/Config/Routes.php` for inline usages

## Alias coverage

| Alias | Class | File Exists | Referenced In |
| --- | --- | --- | --- |
| apiToken | App\Filters\ApiTokenAuthFilter (app/Filters/ApiTokenAuthFilter.php) | yes | - |
| auth | App\Filters\AuthFilter (app/Filters/AuthFilter.php) | yes | - |
| authcheck | App\Filters\AuthCheckFilter (app/Filters/AuthCheckFilter.php) | yes | globals |
| captcha | App\Filters\CaptchaFilter (app/Filters/CaptchaFilter.php) | yes | - |
| cronKey | App\Filters\CronKeyFilter (app/Filters/CronKeyFilter.php) | yes | filters |
| cspoff | App\Filters\CspOff (app/Filters/CspOff.php) | yes | globals |
| csrf | CSRF | n/a | globals,filters |
| emailVerified | App\Filters\EmailVerifiedFilter (app/Filters/EmailVerifiedFilter.php) | yes | - |
| except | App\Filters\ExceptFilter (app/Filters/ExceptFilter.php) | yes | globals |
| feature | App\Filters\FeatureFlagFilter (app/Filters/FeatureFlagFilter.php) | yes | - |
| honeypot | Honeypot | n/a | globals |
| idempotency | App\Filters\IdempotencyFilter (app/Filters/IdempotencyFilter.php) | yes | - |
| invalidchars | InvalidChars | n/a | - |
| jsonException | App\Filters\JsonExceptionFilter (app/Filters/JsonExceptionFilter.php) | yes | globals |
| login | App\Filters\LoginFilter (app/Filters/LoginFilter.php) | yes | globals,filters |
| maintenance | App\Filters\MaintenanceFilter (app/Filters/MaintenanceFilter.php) | yes | globals |
| observability | App\Filters\ObservabilityFilter (app/Filters/ObservabilityFilter.php) | yes | globals |
| permission | App\Filters\PermissionFilter (app/Filters/PermissionFilter.php) | yes | - |
| ratelimit | App\Filters\RateLimitFilter (app/Filters/RateLimitFilter.php) | yes | - |
| sessionRevoked | App\Filters\SessionRevokedFilter (app/Filters/SessionRevokedFilter.php) | yes | globals |
| sessionTracker | App\Filters\SessionTrackerFilter (app/Filters/SessionTrackerFilter.php) | yes | globals |
| toolbar | DebugToolbar | n/a | - |

## Unused alias candidates (not referenced in globals/filters/routes)

- `apiToken`
- `auth`
- `captcha`
- `emailVerified`
- `feature`
- `idempotency`
- `invalidchars`
- `permission`
- `ratelimit`
- `toolbar`

## Missing filters

None. All aliases now resolve to concrete classes under `app/Filters/`.

## Notes

- `cronKey` is applied to the CRON routes in `app/Config/Routes.php` (e.g., `API/Management/*`).
- `authcheck` runs globally with the existing `except` list in `app/Config/Filters.php`.
- `observability` runs globally before/after to attach correlation IDs and timing headers without blocking requests.
