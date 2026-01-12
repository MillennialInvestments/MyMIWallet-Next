# build_sitemap_from_inventory.py

## Purpose
Create `public/sitemap.xml` from the functional inventory, including only UI pages in allowed categories.

## How to run
- `python3 scripts/build_sitemap_from_inventory.py`

## Inputs / outputs
- **Inputs**: `docs/functional_inventory/feature_inventory.csv`.
- **Outputs**: `public/sitemap.xml` written in-place.

## Dependencies
- Python stdlib (csv, datetime, xml.etree).

## Risks found
- No shebang or usage; file paths are hard-coded and assume working directory at repo root.
- Fails with uncaught exceptions if input file is missing or malformed.
- Always rewrites production sitemap using the hard-coded https://www.mymiwallet.com base URL.

## Suggested improvements
- Add CLI flags for `--input`, `--output`, and `--base-url` plus `--dry-run` preview mode.
- Validate input exists before attempting to write and emit clearer error messages.
- Consider skipping non-public routes by configuration instead of hard-coded categories.

## Proposed patch summary
- Add `#!/usr/bin/env python3`, `argparse`, base-url parameterization, and guarded file writes (write to temp then move).
- Return non-zero on missing inputs and print summary of URLs emitted.

## Owner Notes
- Keep DreamHost-friendly: no sudo, local file writes only. Ensure writable public/ directory before running.
