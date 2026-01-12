# build_content_hub_inventory.py

## Purpose
Generate content hub inventory CSV/MD outputs by combining baseline content definitions with existing feature and SEO inventory files.

## How to run
- `python3 scripts/build_content_hub_inventory.py`

## Inputs / outputs
- **Inputs**: `docs/functional_inventory/feature_inventory.csv`; first existing SEO inventory candidate under `docs/marketing/page_seo_inventory.csv` or `public/assets/documents/Exports/`.
- **Outputs**: `docs/content_hub_inventory/content_hub_inventory.csv` and `content_hub_inventory.md`.

## Dependencies
- Python 3 standard library (csv, datetime, pathlib, regex). No external packages.

## Risks found
- No CLI flags or usage help; failures surface as Python tracebacks.
- Assumes feature/SEO inventories exist; silently skips missing SEO data and may emit empty rows if source files absent.

## Suggested improvements
- Add `argparse` with `--feature-file` and `--seo-file` overrides plus `--output-dir` for safer CI usage.
- Validate required columns before writing output and fail fast with clear messages.
- Log skipped/missing SEO inventory to stderr for operator awareness.

## Proposed patch summary
- Introduce CLI argument parsing with defaults matching current paths and a `--dry-run` flag that only validates sources.
- Add input schema check and explicit exit codes for missing/empty source data.
- Emit summary counts to stdout and warnings to stderr.

## Owner Notes
- Safe to run on DreamHost (pure Python, local file writes only). Ensure docs output directory is writable.
