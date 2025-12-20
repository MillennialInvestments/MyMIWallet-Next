# Daily + Deploy Runbook

For single-operator workflows on DreamHost (no sudo), use the scripts in `/scripts` to keep the app healthy and deployments predictable.

## Morning Routine
1. Sanity check: `./scripts/doctor.sh`
2. Log scan: `./scripts/logs_triage.sh 200`
3. Route token lint: `./scripts/lint_no_route_tokens.sh`
4. Smoke endpoints: `./scripts/smoke_routes.sh https://www.mymiwallet.com`

## Pre-Deploy Routine
1. Confirm clean git tree: part of `doctor.sh`.
2. Optional dry smoke on target host/base URL: `./scripts/smoke_routes.sh <base>`
3. Deploy: `./scripts/deploy_safe.sh` (append `--dev` if needed).
4. Warm caches: `./scripts/warm_routes.sh <base>` (defaults to https://www.mymiwallet.com).
5. Final smoke: `./scripts/smoke_routes.sh <base>`
6. Quick log glance: `./scripts/logs_triage.sh 100`

## After PR Merge Checklist
- Pull latest and deploy via `./scripts/deploy_safe.sh`.
- Run `./scripts/warm_routes.sh` to preheat critical endpoints.
- Verify `/healthz` and dashboard route via `./scripts/smoke_routes.sh`.
- If cron jobs were touched, trigger them (or dry-run) via `./scripts/cron_kick.sh --base <env>`.
- Capture any new ERROR/CRITICAL messages with `./scripts/logs_triage.sh 200`.
