# build_page_seo_inventory.py

## Purpose
Generate SEO-focused page inventory CSV/Markdown from the functional inventory with inferred schema, keyword, and linking metadata.

## How to run
- `python3 scripts/build_page_seo_inventory.py`

## Inputs / outputs
- **Inputs**: `docs/functional_inventory/feature_inventory.csv` (must exist).
- **Outputs**: `docs/page_seo_inventory/page_seo_inventory.csv` and `page_seo_inventory.md`.

## Dependencies
- Python 3 standard library only.

## Risks found
- Exits with raw stack trace if input CSV missing or malformed; no usage guidance.
- Uses hard-coded base URL; no way to point at staging domains.
- "todo" placeholders default to string values rather than booleans, so downstream tooling must interpret manually.

## Suggested improvements
- Add `argparse` with `--input`, `--output-dir`, and `--base-url` flags.
- Validate required columns and surface friendlier error messages when CSV is empty or lacks headers.
- Consider boolean fields instead of "todo" strings and expose a `--default-meta` option.

## Proposed patch summary
- Implement CLI options with defaults, schema validation, and explicit exit codes for missing data.
- Add summary print of generated row counts and any skipped items.

## Owner Notes
- Pure local file work—safe on DreamHost. Ensure destination directories exist or let script create them with proper permissions.
