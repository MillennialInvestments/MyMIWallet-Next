# social_ignite.php

## Purpose
Render campaign-specific social content across multiple platforms using templates and user-provided fields, writing outputs to dated folders.

## How to run
- `php scripts/social_ignite.php --input scripts/social_input.sample.json`
- `php scripts/social_ignite.php --title "New Feature" --message "Details" --url "https://..." --campaign "launch" --hashtags "fintech,alerts"`

## Inputs / outputs
- **Inputs**: Either `--input <json>` or explicit flags: `--title`, `--message`, `--url`, `--campaign`, optional `--hashtags`, `--cta`, `--tickers`. Uses `scripts/social_templates.json` for platform templates.
- **Outputs**: Files under `scripts/social_output/<date>/<campaign>/` (platform-specific), plus `bundle.json`; console summary of paths.

## Dependencies
- PHP 8.2+ with JSON extension; filesystem write permissions.

## Risks found
- Basic usage printed on missing options, but no `--help` flag; exits 1 when inputs missing.
- Creates output directories under scripts/ which may be unexpected for production deployments.
- No validation of URL/hashtags length beyond platform template settings.

## Suggested improvements
- Add `--help` and `--output-dir` flags; allow dry-run to preview rendered content without writing files.
- Validate required fields and template existence before processing; return non-zero on any platform write failure.

## Proposed patch summary
- Implement argument parsing via `getopt` with help, output-dir override, and dry-run preview; add validation and aggregated success summary.

## Owner Notes
- DreamHost-safe; writes inside repo only. Ensure scripts/social_output is writable or relocate via new flag.
