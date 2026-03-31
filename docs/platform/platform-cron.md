# platform cron

## Edge repos
- Every 15 minutes: `php spark platform:edge-snapshot`
- Every 2 hours: `php spark platform:run --profile=light`
- Nightly: `php spark platform:run --profile=nightly`

## Control plane repo
- Every 15 minutes:
  - `php spark platform:control:collect`
  - `php spark platform:control:analyze`
- Every hour: `php spark platform:control:dispatch --dry-run=1`
- Nightly: `php spark platform:control:run`

These schedules minimize constant heavy AIOps work in each repo.
