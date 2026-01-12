# scripts/build_content_hub_inventory.py

## Purpose
Build Knowledge Hub content inventory artifacts (CSV + Markdown) by combining feature inventory data, optional SEO inventories, and seeded content plans.

## How to run
```bash
python scripts/build_content_hub_inventory.py
```

## Inputs/Outputs
- **Inputs**: `docs/functional_inventory/feature_inventory.csv` (required) and the first available SEO inventory from configured candidates under `docs/marketing` or `public/assets/documents/Exports`.
- **Outputs**: `docs/content_hub_inventory/content_hub_inventory.csv` and `.md`.
- **Exit codes**: Raises if required feature inventory is missing; otherwise exits 0.

## Dependencies
- Python 3 stdlib.
- Write access to `docs/content_hub_inventory`.

## Risks found
- Hard-coded SEO candidate paths and base domain; no CLI overrides.
- No validation of SEO CSV headers; differences could silently skew link data.
- Minimal logging; failures surface only as exceptions.

## Suggested improvements
- Add `--feature-inventory`, `--seo-inventory`, and `--output-dir` flags with help text.
- Validate CSV headers and warn when optional SEO file is absent or malformed.
- Emit summary counts (rows produced, drafts vs. planned) and write locations on success.

## Proposed patch summary
- Add `argparse` + validation helpers; log which SEO source was chosen.
- Include a dry-run option to preview top rows without writing files.

## Owner Notes
- Safe for DreamHost; uses only stdlib. Keep seed data updated as Knowledge Hub roadmap evolves.
