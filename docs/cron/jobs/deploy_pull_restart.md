# deploy_pull_restart

## Purpose
Phone-safe deploy helper to pull latest code and touch PHP-FPM reload hook without sudo.

## Schedule
Every 6 hours or on-demand before manual smoke tests.

## Entrypoint
`scripts/ops/deploy_pull_restart.sh`

## Inputs
- `APP_PATH` (git repo path; defaults to repo root)
- Optional `RESTART_TOUCH` (path to php-fpm reload file)

## Outputs
- JSON object with git status, pull result, and restart touch outcome.

## Failure modes
- Git remote unreachable.
- Merge conflicts during pull.
- Restart touch path missing.

## Logging locations
- stdout only; capture via cron email if needed.

## Rollback
If pull fails, no changes applied. If merge conflicts appear, resolve manually and rerun.

## Manual run command (SSH-safe)
```bash
bash scripts/ops/deploy_pull_restart.sh
```

## Security notes
- Never runs sudo; only executes git commands within repo and an optional touch file.
