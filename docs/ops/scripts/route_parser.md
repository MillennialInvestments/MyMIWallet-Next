# route_parser.php

## Purpose
Provide a lightweight RouteCollector shim to load `app/Config/Routes.php`, capture defined routes, and dump them to `route_dump.json` for downstream tooling.

## How to run
- `php scripts/route_parser.php`

## Inputs / outputs
- **Inputs**: Requires CI4 app bootstrap context (APPPATH, ENVIRONMENT constants) and readable route/config files.
- **Outputs**: `scripts/route_dump.json` containing route metadata.

## Dependencies
- PHP 8.2+, CI4 routes configuration.

## Risks found
- No CLI help; errors from Routes.php propagate as PHP fatals.
- Writes output in scripts directory without allowing override.
- Minimal validation of route options; assumes structures match CI4 expectations.

## Suggested improvements
- Add CLI options for output path and app path; catch exceptions to emit friendly messages.
- Validate generated routes and return non-zero on parse failure or empty set.

## Proposed patch summary
- Wrap main block in try/catch, support `--output <file> --app-path <dir>`, and emit counts.

## Owner Notes
- DreamHost-safe; no network. Ensure php CLI uses correct ini settings if extensions required by routes.
