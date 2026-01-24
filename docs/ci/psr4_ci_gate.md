# PSR-4 CI Gate

## Purpose
Fail builds when PSR-4 drift is introduced so autoloading stays deterministic and deploys remain safe.

## How It Works
- `scripts/ci/check_psr4.sh` runs `php spark audit:psr4 --ci`.
- A non-zero exit code indicates violations and fails the job.
- CI runs on every push, PR, and a weekly schedule.

## How to Bypass (Explicitly Discouraged)
Bypassing requires either:
- Removing the job from CI, or
- Editing `scripts/ci/check_psr4.sh` to always exit `0`.

Both actions disable guardrails and should be avoided.

## Example CI YAML (GitHub Actions)
```yaml
name: PSR-4 Audit

on: [push, pull_request]

jobs:
  psr4:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
      - run: composer install --no-interaction --no-progress --prefer-dist
      - run: scripts/ci/check_psr4.sh
```
