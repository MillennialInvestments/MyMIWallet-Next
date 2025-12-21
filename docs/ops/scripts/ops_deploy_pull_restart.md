# ops/deploy_pull_restart.sh

## Purpose
Fetch and pull the latest Git changes for a target app path, optionally checking out a branch and touching a restart marker file.

## How to run
- `bash scripts/ops/deploy_pull_restart.sh`
- `BRANCH=main RESTART_TOUCH=/home/user/restart.txt bash scripts/ops/deploy_pull_restart.sh`

## Inputs / outputs
- **Inputs**: Env `APP_PATH` (default repo root), `BRANCH` optional, `RESTART_TOUCH` optional path to touch.
- **Outputs**: JSON summary containing git status before, fetch/pull output snippets, restart result.

## Dependencies
- git, bash coreutils (touch, cd).

## Risks found
- No usage/help; git fetch/pull errors are swallowed by `|| true` and only reflected as strings in JSON.
- Does not verify working tree cleanliness before pulling; could merge into dirty tree.

## Suggested improvements
- Add `usage()` and flags `--fail-on-dirty`, `--branch`, `--restart-touch` with clear exit codes.
- If git commands fail, exit non-zero and surface stderr instead of silently capturing.

## Proposed patch summary
- Implement flag parsing, working tree checks, and error handling with exit 1 on failed fetch/pull unless `--allow-dirty` set.

## Owner Notes
- Safe on DreamHost; no sudo. Ensure APP_PATH points to repo with correct permissions.
