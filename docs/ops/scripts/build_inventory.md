# scripts/build_inventory.py

## Purpose
Generate the functional feature inventory (Markdown + CSV) by reading CodeIgniter routes via `scripts/route_parser.php`.

## How to run
```bash
python scripts/build_inventory.py
```

## Inputs/Outputs
- **Inputs**: None directly; invokes `php scripts/route_parser.php`, which loads `app/Config/Routes.php` and writes `route_dump.json`.
- **Outputs**: `docs/functional_inventory/feature_inventory.md` and `docs/functional_inventory/feature_inventory.csv`; deletes `route_dump.json` afterward.
- **Exit codes**: Exits non-zero if the PHP subprocess fails; otherwise 0.

## Dependencies
- Python 3 stdlib.
- PHP CLI available in PATH; writable repo root for `route_dump.json` and docs directory.
- Application route definitions must be loadable without needing web server context.

## Risks found
- No argument parsing or help text; paths and base URLs are hard-coded.
- Assumes `php` is available; no fallback to alternate binaries or helpful error messaging.
- Deletes `route_dump.json` without checking for unrelated pre-existing file.
- Lacks logging around route parsing failures, so missing PHP extensions/config errors may be opaque.

## Suggested improvements
- Add `--php-bin` and `--output-dir` flags plus `-h/--help`.
- Validate prerequisites (PHP CLI, route file readability) with actionable errors before running.
- Guard removal of `route_dump.json` by confirming it was created by this run.
- Emit counts (routes processed, modules discovered) and timing for observability.

## Proposed patch summary
- Introduce `argparse` for PHP binary selection and custom output paths.
- Wrap subprocess call with try/except that prints PHP stderr when failures occur.
- Track temp file ownership and only delete when generated during the current run.

## Owner Notes
- Keep compatible with DreamHost PHP binary locations by honoring `PHPBIN` or CLI flag overrides.
