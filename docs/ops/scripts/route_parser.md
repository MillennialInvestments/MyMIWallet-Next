# scripts/route_parser.php

## Purpose
Stub out minimal CodeIgniter routing context, load `app/Config/Routes.php`, and emit `route_dump.json` for downstream inventory scripts.

## How to run
```bash
php scripts/route_parser.php
```

## Inputs/Outputs
- **Inputs**: None; relies on `app/Config/Routes.php` and application route definitions.
- **Outputs**: `route_dump.json` in repo root.
- **Exit codes**: Non-zero on PHP/runtime errors; 0 on success.

## Dependencies
- PHP CLI (tested with PHP 8.x) with access to application files.
- No external libraries beyond CodeIgniter route definitions.

## Risks found
- No CLI help or error handling; any included file errors will surface as raw PHP stack traces.
- Writes `route_dump.json` to repo root without checking for pre-existing unrelated files.
- No cleanup on failure, leaving partial JSON output.

## Suggested improvements
- Add basic CLI usage text and optional `--output` path.
- Wrap inclusion in try/catch to print concise errors and remove partial files when failures occur.
- Allow specifying environment (e.g., `ENVIRONMENT`) and app root via flags to support staged configs.

## Proposed patch summary
- Add argument parsing (e.g., `getopt`) for `--output` and `--app-root`.
- Implement guarded file writing: write to temp file, then move to final path on success; delete on failure.

## Owner Notes
- Keep strict types; avoid loading heavy app services to minimize side effects during route discovery on shared hosting.
