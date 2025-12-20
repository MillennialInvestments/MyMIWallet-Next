# scripts/build_page_seo_inventory.py

## Purpose
Produce SEO-focused inventory (CSV + Markdown) for UI pages using the functional feature inventory as input.

## How to run
```bash
python scripts/build_page_seo_inventory.py
```

## Inputs/Outputs
- **Inputs**: `docs/functional_inventory/feature_inventory.csv` must exist.
- **Outputs**: `docs/page_seo_inventory/page_seo_inventory.csv` and `.md`.
- **Exit codes**: Raises FileNotFoundError if input is missing; otherwise exits 0.

## Dependencies
- Python 3 stdlib.
- Write access to `docs/page_seo_inventory`.

## Risks found
- Hard-coded base URL (`https://www.mymiwallet.com`) and input/output paths; no CLI overrides.
- No logging around skipped rows; failures surface only as exceptions.
- Assumes functional inventory contains expected headers; lacks validation or schema check.

## Suggested improvements
- Add `--input`, `--output-dir`, and `--base-url` flags with help text.
- Validate CSV headers and emit warnings for missing/extra fields.
- Summarize counts (rows read vs. emitted) and provide sample output paths on success.

## Proposed patch summary
- Wire `argparse` for configurable paths and base URL.
- Add lightweight CSV schema validation and structured logging of skipped entries.

## Owner Notes
- Safe on DreamHost; relies solely on Python stdlib and repo files.
