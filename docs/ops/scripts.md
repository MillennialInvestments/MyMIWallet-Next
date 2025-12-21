# Ops Scripts (Phone-safe)

All scripts live in `scripts/ops/` and are designed to be SSH-friendly (no sudo) and to emit JSON.

## Common notes
- Ensure execute bit is set (`chmod +x scripts/ops/*.sh`).
- Set env vars inline when running from a phone SSH client.
- No secrets are printed; tokens are passed via headers or env only.

## Script catalog

### health_check.sh
- **Purpose:** Quick platform pulse (php version, disk, optional HTTP ping).
- **Run:** `bash scripts/ops/health_check.sh`
- **Env:** `TARGET_URL`, `DB_PING=1`, `HEALTH_LOG` (optional append-only log path).

### log_summarize_and_diff.sh
- **Purpose:** Summaries of `writable/logs/log-YYYY-MM-DD.log` with diff to previous run.
- **Run:** `bash scripts/ops/log_summarize_and_diff.sh`
- **Env:** `LOG_DATE`, `PREVIOUS_DATE`, `HEALTH_LOG` (optional append-only log path).

### run_cron_endpoint.sh
- **Purpose:** Call a protected cron endpoint with Bearer token.
- **Run:** `BASE_URL=https://www.mymiwallet.com CRON_PATH=/API/Management/runCronManually MYMI_CRON_TOKEN=*** bash scripts/ops/run_cron_endpoint.sh`
- **Env:** `BASE_URL` (required), `CRON_PATH` (required), `MYMI_CRON_TOKEN` (required), `CRON_LOG` (optional JSONL path).

### deploy_pull_restart.sh
- **Purpose:** Safe git pull + optional PHP-FPM reload touch.
- **Run:** `bash scripts/ops/deploy_pull_restart.sh`
- **Env:** `APP_PATH` (defaults to repo root), `RESTART_TOUCH` (path to touch for reload), `BRANCH` (optional checkout target).

### create_codex_task.sh
- **Purpose:** Create `docs/codex/tasks/<slug>.md` from inbox data or ad-hoc request.
- **Run:** `TASK_SLUG=my-task TITLE="Short Title" SUMMARY="One-liner" bash scripts/ops/create_codex_task.sh`
- **Env:** `TASK_SLUG` (required), `TITLE`, `SUMMARY`, `SOURCE` (optional), `DEST_DIR` (default `docs/codex/tasks`).

### run_codex_review.sh
- **Purpose:** Wrapper to call `php spark codex:review` with env overrides.
- **Run:** `bash scripts/ops/run_codex_review.sh`
- **Env:** `REVIEW_LOOKBACK_COMMITS`, `REVIEW_OUTPUT_DIR`.
