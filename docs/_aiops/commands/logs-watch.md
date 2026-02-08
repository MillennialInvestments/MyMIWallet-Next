# `logs:watch`

## Purpose
Operational command for DreamHost-safe AIOps workflows.

## Usage
```bash
php spark logs:watch --json --dry-run
```

## Outputs
- Structured JSON to stdout when `--json` is used.
- Markdown + JSON artifacts in `docs/_aiops/`.

## Exit behavior
- `0` on successful execution.
- Non-zero when hard failures occur (e.g., internal processing error).
