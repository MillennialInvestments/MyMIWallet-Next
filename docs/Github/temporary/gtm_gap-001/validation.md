# GAP-001 Validation Instructions

## Files patched
- app/Views/errors/html/_error_lifecycle_bootstrap.php
- app/Views/errors/html/_launch_error_template.php
- app/Views/errors/html/error_403.php
- app/Views/errors/html/error_404.php
- app/Views/errors/html/error_500.php
- app/Views/errors/html/error_504.php
- app/Config/Routes.php
- app/Log/Handlers/DatabaseLoggerHandler.php

## Validation commands
1. `php -l app/Views/errors/html/error_403.php`
2. `php -l app/Views/errors/html/error_404.php`
3. `php -l app/Views/errors/html/error_500.php`
4. `php -l app/Views/errors/html/error_504.php`
5. `php -l app/Views/errors/html/_error_lifecycle_bootstrap.php`
6. `php -l app/Views/errors/html/_launch_error_template.php`
7. `php -l app/Log/Handlers/DatabaseLoggerHandler.php`
8. `php vendor/bin/phpunit --filter ErrorLifecyclePagesTest`

## Expected
- `/test-403`, `/test-404`, `/test-500`, `/test-504` each render support-safe page with 5-second redirect script.
- No stack trace text shown by default.
- Logger dedupe suppresses repeated insert/email storms for identical signatures.
