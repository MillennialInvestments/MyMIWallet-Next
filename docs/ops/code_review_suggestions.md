# Code Review Suggestions for scripts/

## High Priority
- **Harden diagnostics collector (`scripts/mymi-configs/collect.sh`)**: enable `set -euo pipefail`, add per-step error reporting, and expand secret redaction so failures and sensitive values are not silently skipped or leaked.
- **Add timeouts and help to smoke test (`scripts/smoke_routes.sh`)**: without curl timeouts the script can hang on network stalls; add `usage()` and configurable base/timeout to prevent CI timeouts.
- **Guard generated artifacts (`scripts/build_*`)**: multiple generators overwrite outputs without validation or temp files; add existence checks and atomic writes to avoid partial docs/sitemaps.

## Medium Priority
- **CLI ergonomics**: most scripts lack `-h/--help` and flag parsing; add `argparse`/`getopt` to document inputs and support alternate PHP binaries or base URLs.
- **Dependency detection**: `build_inventory.py` assumes `php` in PATH; `import_and_categorize.js` assumes ML deps are installed. Add preflight checks with actionable messages and exit code 2 on missing tooling.
- **Inventory consistency**: generators assume fixed CSV schemas; add header validation and row-count summaries so regressions surface early in CI.

## Low Priority
- **Exclude heavy directories in linters**: extend `lint_no_route_tokens.sh` exclusions to `node_modules`, `public/assets`, and export folders to speed scans.
- **Logging polish**: normalize success/failure banners across scripts and emit absolute output paths for easier file discovery.
- **Refactor reusable helpers**: consider a shared `scripts/lib/common.sh` for usage + logging patterns to reduce duplication.

## Recommended New Scripts
- **`scripts/run_inventory_pipeline.sh`**: single entrypoint to run route parsing + all inventory generators in order, with a `--dry-run` mode and summary report; keeps docs in sync with routes.
- **`scripts/check_runtime_deps.sh`**: probes for php/python/node/composer binaries, prints versions, and flags missing optional tools (shellcheck), giving DreamHost-friendly install tips.
- **`scripts/sanitize_env_export.sh`**: produces a redacted `.env` copy using a maintained allow/deny list, reducing risk of leaking secrets when sharing diagnostics.
