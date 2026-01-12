# Scripts Inventory (scripts/)

Audit date: 2025-12-21T13:42:16+00:00

This inventory covers every script under `scripts/` (including nested folders). Each entry notes the inferred purpose, inputs/flags, outputs, exit behavior, and key dependencies.

## Summary by type
- **Bash**: cron_kick.sh; deploy_safe.sh; doctor.sh; lint_no_route_tokens.sh; logs_triage.sh; smoke_routes.sh; warm_routes.sh; mymi-configs/collect.sh; ops/create_codex_task.sh; ops/health_check.sh; ops/deploy_pull_restart.sh; ops/log_summarize_and_diff.sh; ops/run_codex_review.sh; ops/run_cron_endpoint.sh
- **PHP (CLI)**: route_parser.php; social_ignite.php
- **Python**: build_content_hub_inventory.py; build_inventory.py; build_page_seo_inventory.py; build_sitemap_from_inventory.py; build_syndication_inventory.py
- **Node/JS**: import_and_categorize.js
- **Data/Config helpers**: cron_endpoints.json; social_input.sample.json; social_templates.json; warm_routes.txt

## Script details

### build_content_hub_inventory.py (python3)
- **Purpose**: Generate content hub inventory CSV/MD from feature inventory and SEO inventory fallbacks.
- **Inputs/flags**: No CLI flags; reads `docs/functional_inventory/feature_inventory.csv` and first existing SEO inventory file.
- **Outputs**: `docs/content_hub_inventory/content_hub_inventory.csv` and `.md`.
- **Exit behavior**: Raises on unhandled errors (no explicit exit codes beyond Python defaults).
- **Dependencies**: Python 3 stdlib.

### build_inventory.py (python)
- **Purpose**: Parse CI4 routes into feature inventory CSV/MD.
- **Inputs/flags**: None; calls `scripts/route_parser.php` to emit `route_dump.json`.
- **Outputs**: `docs/functional_inventory/feature_inventory.csv` and `.md`; deletes `route_dump.json` when done.
- **Exit behavior**: Aborts if PHP route parser fails (subprocess check=True).
- **Dependencies**: Python stdlib; PHP CLI; CI4 app configs readable.

### build_page_seo_inventory.py (python3)
- **Purpose**: Build SEO inventory CSV/MD from functional inventory with inferred schema/meta needs.
- **Inputs/flags**: None; requires `docs/functional_inventory/feature_inventory.csv`.
- **Outputs**: `docs/page_seo_inventory/page_seo_inventory.csv` and `.md`.
- **Exit behavior**: Throws FileNotFoundError if input missing.
- **Dependencies**: Python 3 stdlib.

### build_sitemap_from_inventory.py (python)
- **Purpose**: Emit `public/sitemap.xml` from feature inventory for UI pages.
- **Inputs/flags**: Reads `docs/functional_inventory/feature_inventory.csv`.
- **Outputs**: `public/sitemap.xml`.
- **Exit behavior**: Unhandled exceptions propagate; no guard around file I/O.
- **Dependencies**: Python stdlib.

### build_syndication_inventory.py (python3)
- **Purpose**: Generate syndication inventory CSV/MD seeded from functional inventory modules.
- **Inputs/flags**: Reads `docs/functional_inventory/feature_inventory.csv` when present.
- **Outputs**: `docs/syndication_inventory/syndication_inventory.csv` and `.md`.
- **Exit behavior**: Standard Python exceptions on failure.
- **Dependencies**: Python 3 stdlib.

### cron_kick.sh (bash)
- **Purpose**: Trigger cron endpoints listed in `cron_endpoints.json` with optional dry-run.
- **Inputs/flags**: `--base <url>`; `--dry-run`; env `CRON_SECRET` or `.env` lookup.
- **Outputs**: Console status per endpoint.
- **Exit behavior**: Continues through endpoints; does not fail fast on HTTP errors (only prints).
- **Dependencies**: bash, php, curl, mapfile, JSON file.

### deploy_safe.sh (bash)
- **Purpose**: Safe deployment helper (git fetch/pull, composer install, cache clear, opcache reset).
- **Inputs/flags**: `--dev` to include dev dependencies; uses composer.phar/composer, git, php spark.
- **Outputs**: Logs to `writable/logs/deploy-<date>.log` via tee.
- **Exit behavior**: Exits on any failure due to `set -euo pipefail`.
- **Dependencies**: git, composer or composer.phar, php, spark CLI, find/rm.

### doctor.sh (bash)
- **Purpose**: Environment sanity checker for Git, PHP, Composer, writable dirs, spark.
- **Inputs/flags**: None; reads git status and latest log file.
- **Outputs**: Console summary; prints recent log errors if present.
- **Exit behavior**: Returns 0 if all checks OK, 1 otherwise.
- **Dependencies**: git, php, composer, spark, df/du, grep, ls.

### import_and_categorize.js (node)
- **Purpose**: Categorize ChatGPT export conversations into markdown tasks using embeddings and TF-IDF.
- **Inputs/flags**: `<path to conversations.json>` positional (defaults to `./chatgpt-export/conversations.json`).
- **Outputs**: Markdown files under `docs/categorized/<category>/`; updates `docs/processed_index.json`.
- **Exit behavior**: Throws if model download/processing fails; exits 1 on caught errors.
- **Dependencies**: Node (ESM), `slugify`, `natural`, `@xenova/transformers` (download model), fs/path APIs.

### lint_no_route_tokens.sh (bash)
- **Purpose**: Guard against CI4 route tokens outside allowed config files.
- **Inputs/flags**: None.
- **Outputs**: Console pass/fail with offending lines.
- **Exit behavior**: Exit 1 if disallowed patterns found.
- **Dependencies**: grep, bash.

### logs_triage.sh (bash)
- **Purpose**: Tail newest log file with optional filter and group ERROR/CRITICAL counts.
- **Inputs/flags**: `<lines>` default 200; `<filter>` optional case-insensitive grep.
- **Outputs**: Console output from tail/grep summary.
- **Exit behavior**: Exit 1 if log dir or files missing; otherwise 0 regardless of errors in grep tail.
- **Dependencies**: ls, tail, grep, awk.

### mymi-configs/collect.sh (bash)
- **Purpose**: Collect diagnostics (PHP info, spark routes, configs, redacted .env, permissions).
- **Inputs/flags**: Env `PHPBIN` to override php binary.
- **Outputs**: Files under `writable/diagnostics/diag-<timestamp>/` including probe.php and zipped suggestion.
- **Exit behavior**: Uses `set +e`; continues on failures without non-zero exit.
- **Dependencies**: php, composer, spark, grep, sed, cp, zip instructions.

### ops/create_codex_task.sh (bash)
- **Purpose**: Generate a Codex task markdown stub.
- **Inputs/flags**: Env `TASK_SLUG` (required), `TITLE`, `SUMMARY`, `SOURCE`, `DEST_DIR`.
- **Outputs**: `<DEST_DIR>/<slug>.md` and JSON pointer.
- **Exit behavior**: Exit 1 if TASK_SLUG missing; otherwise follows set -e semantics.
- **Dependencies**: bash coreutils (mkdir, printf, date).

### ops/health_check.sh (bash)
- **Purpose**: Lightweight health JSON (php version, disk usage, optional HTTP ping and DB ping).
- **Inputs/flags**: Env `TARGET_URL`, `DB_PING` (0/1), `HEALTH_LOG`.
- **Outputs**: JSON to stdout; optional append to HEALTH_LOG.
- **Exit behavior**: Exit 0 even if HTTP fails (status becomes "error"); set -e only trips on local command errors.
- **Dependencies**: php, curl, df/awk, uptime.

### ops/deploy_pull_restart.sh (bash)
- **Purpose**: Git fetch/pull helper with optional branch checkout and restart file touch.
- **Inputs/flags**: Env `APP_PATH`, `BRANCH`, `RESTART_TOUCH`.
- **Outputs**: JSON summary with git status/fetch/pull snippets.
- **Exit behavior**: set -euo pipefail; git errors captured into output strings due to `|| true` on fetch/pull.
- **Dependencies**: git, touch, bash.

### ops/log_summarize_and_diff.sh (bash)
- **Purpose**: Summarize log level counts for today vs yesterday and emit JSON.
- **Inputs/flags**: Env `LOG_DATE` (default today), `PREVIOUS_DATE` (default yesterday), `HEALTH_LOG`.
- **Outputs**: JSON counts; optional append to HEALTH_LOG.
- **Exit behavior**: Exit 0 even if log missing (prints error JSON then exits 0 intentionally).
- **Dependencies**: awk, date, bash, file access to writable/logs.

### ops/run_codex_review.sh (bash)
- **Purpose**: Proxy to `php spark codex:review` with optional env vars.
- **Inputs/flags**: Env `REVIEW_LOOKBACK_COMMITS`, `REVIEW_OUTPUT_DIR`.
- **Outputs**: Pass-through from spark command.
- **Exit behavior**: set -euo pipefail; fails if spark fails.
- **Dependencies**: php, spark command availability.

### ops/run_cron_endpoint.sh (bash)
- **Purpose**: Single cron endpoint trigger with bearer token.
- **Inputs/flags**: Env `BASE_URL`, `CRON_PATH`, `MYMI_CRON_TOKEN` (required), `CRON_LOG`.
- **Outputs**: JSON with URL, status code, body snippet; optional append to log.
- **Exit behavior**: Exit 1 when required vars missing; otherwise returns 0 regardless of HTTP status.
- **Dependencies**: curl, bash.

### route_parser.php (php cli)
- **Purpose**: Minimal RouteCollector shim to load CI4 Routes.php and dump compiled routes to JSON.
- **Inputs/flags**: None; expects app/Config/Routes.php and related includes.
- **Outputs**: `route_dump.json` in scripts directory.
- **Exit behavior**: PHP fatal/errors propagate; no explicit exit handling.
- **Dependencies**: PHP 8.2+, CI4 routes file accessible.

### smoke_routes.sh (bash)
- **Purpose**: Simple HTTP smoke test for home, healthz, and protected dashboard route.
- **Inputs/flags**: `<base_url>` positional (default https://www.mymiwallet.com).
- **Outputs**: Console PASS/FAIL per route.
- **Exit behavior**: Exits 1 on first failing status.
- **Dependencies**: curl, bash.

### social_ignite.php (php cli)
- **Purpose**: Render social copy for multiple platforms from template + inputs.
- **Inputs/flags**: `--input <json>` or explicit `--title/--message/--url/--campaign [--hashtags] [--cta] [--tickers]`.
- **Outputs**: Platform-specific files under `scripts/social_output/<date>/<campaign>/` plus bundle.json; console summary.
- **Exit behavior**: Exits 1 on missing inputs, template errors, or mkdir failure.
- **Dependencies**: PHP 8.2+, JSON extension, filesystem writes.

### warm_routes.sh (bash)
- **Purpose**: Warm configured routes via HTTP and measure timings.
- **Inputs/flags**: `<base_url>` positional (default https://www.mymiwallet.com); reads `scripts/warm_routes.txt`.
- **Outputs**: Console results per route.
- **Exit behavior**: Fails (exit 1) when routes file missing or when any route returns non 2xx/3xx/403.
- **Dependencies**: curl, bash.

### warm_routes.txt (data)
- **Purpose**: Route list used by warm_routes.sh (with comments and notes about acceptable 403 on ops endpoints).

### cron_endpoints.json / social_input.sample.json / social_templates.json
- **Purpose**: Config/data files consumed by cron_kick.sh and social_ignite.php respectively.
