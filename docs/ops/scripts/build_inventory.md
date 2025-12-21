# build_inventory.py

## Purpose
Parse CodeIgniter 4 routes via `scripts/route_parser.php` and produce the functional inventory CSV/Markdown files used across docs.

## How to run
- `python3 scripts/build_inventory.py`

## Inputs / outputs
- **Inputs**: CI4 routes loaded indirectly through `scripts/route_parser.php` (requires app bootstrap); no CLI flags.
- **Outputs**: `docs/functional_inventory/feature_inventory.csv` and `feature_inventory.md`; temporary `route_dump.json` removed after completion.

## Dependencies
- Python stdlib; PHP CLI; access to `app/Config/Routes.php` and related classes.

## Risks found
- Missing shebang; depends on being invoked with `python3` explicitly.
- Fails if PHP route parsing errors occur; error messages come from PHP subprocess without friendly context.
- No CLI usage guidance or dry-run option.

## Suggested improvements
- Add shebang + executable bit for consistency with other Python utilities.
- Wrap subprocess call with clearer error handling (e.g., surface Routes.php parse errors with context path).
- Accept `--routes-file`/`--output-dir` flags to support alternate environments.

## Proposed patch summary
- Add `#!/usr/bin/env python3`, `argparse` for input/output overrides, and try/except around the PHP subprocess with actionable messages.
- Return explicit non-zero exit codes on missing routes, invalid JSON, or write failures.

## Owner Notes
- Writes inside repo only; no network calls. Ensure PHP 8.2 CLI available on DreamHost shell before running.
