# scripts/build_syndication_inventory.py

## Purpose
Generate syndication and ecosystem inventory outputs (CSV + Markdown) describing platform submissions, feeds, and ownership.

## How to run
```bash
python scripts/build_syndication_inventory.py
```

## Inputs/Outputs
- **Inputs**: `docs/functional_inventory/feature_inventory.csv` to derive module names; no CLI flags.
- **Outputs**: `docs/syndication_inventory/syndication_inventory.csv` and `.md`.
- **Exit codes**: Exceptions if feature inventory missing; otherwise exits 0.

## Dependencies
- Python 3 stdlib.
- Write access to `docs/syndication_inventory`.

## Risks found
- Paths and base data are hard-coded; no configuration or help text.
- Assumes module names exist in feature inventory; mismatches silently fall back to requested names.
- No logging of selected content sources or rows written.

## Suggested improvements
- Add argument parsing for input/output paths and base domain parameters.
- Validate module availability and warn when requested modules are missing.
- Summarize row counts per priority/category after generation.

## Proposed patch summary
- Implement `argparse`, emit selection logs, and add optional `--dry-run` to inspect planned rows.

## Owner Notes
- Stdlib-only; suitable for DreamHost. Keep platform list updated with marketing roadmap to avoid stale feeds.
