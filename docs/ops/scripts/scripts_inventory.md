# Scripts Inventory (scripts/)

This inventory covers all scripts under `scripts/` and subdirectories, with inferred purpose, inputs, outputs, exit behavior, and dependencies. Types: 3 Bash, 5 Python, 1 PHP, 1 Node.js.

## Bash

### scripts/smoke_routes.sh
- **Type**: Bash
- **Purpose**: Smoke test two public routes for expected HTTP status codes.
- **Inputs/Flags**: Optional positional base URL (defaults to `https://www.mymiwallet.com`).
- **Outputs**: Prints progress messages; no files written.
- **Exit behavior**: `set -euo pipefail`; exits non-zero if curl+grep checks fail.
- **Dependencies**: `curl`, `grep`; outbound HTTPS access.

### scripts/lint_no_route_tokens.sh
- **Type**: Bash
- **Purpose**: Prevent CI route tokens from appearing outside allowed route config files.
- **Inputs/Flags**: None.
- **Outputs**: Prints offending matches when found; no files written.
- **Exit behavior**: `set -euo pipefail`; exits 1 when matches exist, otherwise 0.
- **Dependencies**: `grep`, basic POSIX utilities; assumes repo root relative to script.

### scripts/mymi-configs/collect.sh
- **Type**: Bash
- **Purpose**: Collect diagnostic snapshots (system info, spark help/routes, key configs, greps) into timestamped directory under `writable/diagnostics`.
- **Inputs/Flags**: `PHPBIN` env to choose PHP binary (default `php`).
- **Outputs**: Writes multiple text copies under `writable/diagnostics/diag-<timestamp>/`; drops a `probe.php` helper.
- **Exit behavior**: `set +e` (continues on errors); overall exit is last command status (typically 0) even if steps fail.
- **Dependencies**: `php`, `composer`, CodeIgniter `spark`, `cp`, `sed`, `grep`, `zip` (for optional packing instruction), standard coreutils.

## Python

### scripts/build_inventory.py
- **Purpose**: Generate route-based feature inventory Markdown + CSV from CodeIgniter routes.
- **Entrypoint**: `python scripts/build_inventory.py` (no shebang).
- **Inputs/Flags**: None; runs `php scripts/route_parser.php` internally to create `route_dump.json`.
- **Outputs**: `docs/functional_inventory/feature_inventory.md` and `.csv`; deletes `route_dump.json`.
- **Exit behavior**: Raises and exits non-zero if PHP subprocess fails; otherwise 0.
- **Dependencies**: `python3` stdlib, PHP CLI, writable docs directory, application routes loaded by `scripts/route_parser.php`.

### scripts/build_page_seo_inventory.py
- **Purpose**: Derive SEO page inventory from functional inventory.
- **Entrypoint**: `python scripts/build_page_seo_inventory.py`.
- **Inputs/Flags**: Reads `docs/functional_inventory/feature_inventory.csv`; no CLI flags.
- **Outputs**: `docs/page_seo_inventory/page_seo_inventory.{csv,md}`.
- **Exit behavior**: Raises FileNotFoundError if input missing; otherwise exits 0.
- **Dependencies**: `python3` stdlib, ability to write under `docs/page_seo_inventory`.

### scripts/build_sitemap_from_inventory.py
- **Purpose**: Build `public/sitemap.xml` from feature inventory data.
- **Entrypoint**: `python scripts/build_sitemap_from_inventory.py` (no shebang).
- **Inputs/Flags**: Reads `docs/functional_inventory/feature_inventory.csv`.
- **Outputs**: Writes `public/sitemap.xml`.
- **Exit behavior**: Unhandled exceptions if input missing; otherwise exits 0.
- **Dependencies**: `python3` stdlib, write access to `public/`.

### scripts/build_content_hub_inventory.py
- **Purpose**: Create Knowledge Hub content inventory CSV/MD using feature + SEO sources plus built-in seed data.
- **Entrypoint**: `python scripts/build_content_hub_inventory.py`.
- **Inputs/Flags**: Reads `docs/functional_inventory/feature_inventory.csv` and first existing SEO inventory candidate under `docs/marketing` or `public/assets/documents/Exports`.
- **Outputs**: `docs/content_hub_inventory/content_hub_inventory.{csv,md}`.
- **Exit behavior**: Throws if mandatory feature inventory missing; otherwise 0.
- **Dependencies**: `python3` stdlib; write access to docs paths.

### scripts/build_syndication_inventory.py
- **Purpose**: Generate syndication/platform inventory artifacts.
- **Entrypoint**: `python scripts/build_syndication_inventory.py`.
- **Inputs/Flags**: Reads `docs/functional_inventory/feature_inventory.csv` to harvest modules; no flags.
- **Outputs**: `docs/syndication_inventory/syndication_inventory.{csv,md}`.
- **Exit behavior**: Fails if feature inventory missing; otherwise exits 0.
- **Dependencies**: `python3` stdlib; write access to docs paths.

## PHP

### scripts/route_parser.php
- **Purpose**: Lightweight router collector that loads `app/Config/Routes.php` and emits `route_dump.json` for downstream inventories.
- **Entrypoint**: `php scripts/route_parser.php` (strict types enabled).
- **Inputs/Flags**: None.
- **Outputs**: `route_dump.json` in repo root.
- **Exit behavior**: Depends on PHP/route inclusion; exits non-zero if application files error.
- **Dependencies**: PHP CLI, ability to include CodeIgniter config files.

## Node.js

### scripts/import_and_categorize.js
- **Purpose**: Auto-categorize exported ChatGPT conversations into markdown tasks grouped by topic.
- **Entrypoint**: `node scripts/import_and_categorize.js [EXPORT_CONVOS]` (no shebang; ES module style).
- **Inputs/Flags**: Optional path to `conversations.json` export (default `./chatgpt-export/conversations.json`).
- **Outputs**: Writes categorized markdown files under `docs/categorized/<category>/` plus `docs/processed_index.json`.
- **Exit behavior**: Exits 1 on error; logs created files during success.
- **Dependencies**: Node.js with `fs`, `path`, `slugify`, `natural`, `@xenova/transformers`; GPU/network not required but downloads model weights on first run.
