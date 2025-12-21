# Code Review Suggestions for scripts/

## High priority
- **Network scripts lack timeouts and failure exits**: `cron_kick.sh`, `warm_routes.sh`, `smoke_routes.sh`, `ops/health_check.sh`, and `ops/run_cron_endpoint.sh` call `curl` without timeouts and often exit 0 even on HTTP failures. Add configurable timeouts, failure counting, and non-zero exits for reliability.
- **Diagnostics collector runs with `set +e`**: `mymi-configs/collect.sh` suppresses errors and may silently skip critical data while copying sensitive configs. Switch to `set -euo pipefail`, add explicit error handling, and reinforce secret redaction to avoid leaking credentials.
- **Sitemap/route builders use hard-coded paths and base URLs**: `build_sitemap_from_inventory.py` and `build_inventory.py` assume repo root and production base, failing noisily if run elsewhere. Add argument parsing and input validation to prevent accidental writes to production `public/sitemap.xml` or crashes during CI.

## Medium priority
- **Missing usage/help across most bash scripts**: deploy/log/cron utilities lack `usage()` and helpful error messages, making ops handoffs harder. Add `--help` and flag parsing for `cron_kick.sh`, `deploy_safe.sh`, `doctor.sh`, `logs_triage.sh`, `warm_routes.sh`, `smoke_routes.sh`, and `ops/*` helpers.
- **Non-failing health/log summaries**: `ops/log_summarize_and_diff.sh` and `ops/health_check.sh` return 0 even when logs or HTTP checks fail; add `--allow-fail` toggles and default to non-zero exits to aid monitoring.
- **Output destinations not configurable**: `social_ignite.php` writes under `scripts/social_output/` and `import_and_categorize.js` writes under `docs/`; add `--output-dir` overrides to avoid clutter in production checkouts.

## Low priority
- **Shebang and entry guards**: Add `#!/usr/bin/env python3` and `if __name__ == "__main__":` to Python scripts lacking them, and `--help` for PHP CLIs for consistency.
- **Atomic writes**: Use temp file + move when writing JSON/CSV outputs (e.g., `build_content_hub_inventory.py`, `build_page_seo_inventory.py`, `ops/run_cron_endpoint.sh` log appends) to reduce partial file risk.
- **Route/token lint configurability**: `lint_no_route_tokens.sh` hard-codes allowlist; consider `--allowlist` flag and JSON output for CI dashboards.

## Recommended new scripts
- **`scripts/ops/check_curl_env.sh`**: Validate outbound connectivity, TLS versions, and curl timeouts across known endpoints; helps debug DreamHost networking without touching app routes.
- **`scripts/ops/rotate_logs.sh`**: Simple log rotation/archival for `writable/logs/` to prevent disk exhaustion and keep doctor/log triage fast.
- **`scripts/ops/cron_smoke_suite.sh`**: Batch runner that triggers critical cron endpoints with timeouts, aggregates statuses, and supports dry-run for schedule validation.
- **`scripts/ops/config_snapshot.sh`**: Safe snapshot of non-secret config diffs (Routes.php, env keys presence only) to compare environments without copying secrets.
