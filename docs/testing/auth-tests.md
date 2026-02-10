# Auth Test Coverage

## Added suites

- `tests/app/Auth/LoginFlowTest.php`
  - Login page accessible while logged out.
  - Logged-in users hitting `/login` redirect to `/Dashboard`.
  - Invalid credential flow sets an `auth_message` error flash.
  - Valid credential flow redirects to `/Dashboard` and sets success flash.

- `tests/app/Auth/AuthRedirectTest.php`
  - `/login` carries no-cache headers.
  - `determineRedirectDestination()` rejects external, root, login/logout loop URLs.

## Spark smoke task

- `php spark auth:flow-smoke`
  - Runs redirect-safety smoke checks.
  - Returns non-zero exit code when smoke checks fail.

## CI/CD integration

- `.github/workflows/ci.yml` now runs:
  - `phpunit --testsuite unit`
  - `phpunit --testsuite auth-smoke`
  - `php spark auth:flow-smoke`
  - a PHPCS step (when phpcs is available in the build image).

## Local run commands

```bash
phpunit --testsuite unit
phpunit --testsuite auth-smoke
php spark auth:flow-smoke
```
