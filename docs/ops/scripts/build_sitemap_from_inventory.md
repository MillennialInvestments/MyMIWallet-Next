# scripts/build_sitemap_from_inventory.py

## Purpose
Generate `public/sitemap.xml` from the functional feature inventory CSV.

## How to run
```bash
python scripts/build_sitemap_from_inventory.py
```

## Inputs/Outputs
- **Inputs**: `docs/functional_inventory/feature_inventory.csv`.
- **Outputs**: `public/sitemap.xml` (overwrites if present).
- **Exit codes**: Unhandled exceptions on missing input or write failures; otherwise exits 0.

## Dependencies
- Python 3 stdlib (`csv`, `xml.etree.ElementTree`).
- Write access to `public/`.

## Risks found
- No shebang or CLI help; assumes invocation via `python`.
- Hard-coded base URL and paths; not configurable.
- Overwrites sitemap without backup or diff; no validation of generated XML.
- Lacks filtering for canonical/duplicate routes beyond basic category checks.

## Suggested improvements
- Add `argparse` for input/output/base URL, plus `-h/--help`.
- Validate input presence with clear errors and optionally ensure output directory exists before writing.
- Add XML schema sanity checks (well-formedness) and row counts logged to stdout.
- Consider incremental filtering (e.g., skip non-GET routes or flagged legacy endpoints).

## Proposed patch summary
- Introduce argument parsing and friendly error messages for missing inputs.
- Add simple stats logging and optional dry-run mode to print sample URLs instead of writing.

## Owner Notes
- Ensure web server has permissions to read the generated sitemap; avoid running on production without confirming base URL and route set.
