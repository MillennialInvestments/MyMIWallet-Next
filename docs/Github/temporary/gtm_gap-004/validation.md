# GAP-004 Validation Instructions

## Commands
1. `php -l app/Commands/GtmCronRouteSecurityValidation.php`
2. `php spark cache:clear`
3. `php spark gtm:cron:validate-security http://www.mymiwallet.com/index.php`

## Expected
- All checks for no-token and invalid-token return 401 or 403.
- If any check returns 200, command exits with error and report marks critical exposure.
