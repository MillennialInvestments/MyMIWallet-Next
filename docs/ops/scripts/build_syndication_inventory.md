# build_syndication_inventory.py

## Purpose
Generate syndication/partner distribution inventory from available feature modules and canned templates.

## How to run
- `python3 scripts/build_syndication_inventory.py`

## Inputs / outputs
- **Inputs**: `docs/functional_inventory/feature_inventory.csv` when present; otherwise builds rows from static templates.
- **Outputs**: `docs/syndication_inventory/syndication_inventory.csv` and `syndication_inventory.md`.

## Dependencies
- Python 3 standard library.

## Risks found
- No argument parsing or usage help; hard-coded output paths.
- Continues even if functional inventory missing, which can yield stale module references without warnings.
- Priority ordering and templates are embedded constants—hard to update without edits.

## Suggested improvements
- Add CLI options for input/output paths and a `--fail-on-missing-input` flag.
- Emit warnings when module resolution falls back or when requested modules are absent.
- Externalize platform templates to a YAML/JSON config to simplify edits.

## Proposed patch summary
- Introduce `argparse`, input presence checks, and structured logging of skipped modules.
- Optionally load templates from a config file while keeping defaults for backward compatibility.

## Owner Notes
- Safe for DreamHost; writes under docs only. Ensure docs/syndication_inventory is writable or let script create it.
