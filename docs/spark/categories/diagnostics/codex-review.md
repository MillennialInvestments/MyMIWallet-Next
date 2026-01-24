# spark:codex:review

## Purpose
Generate Codex review artifacts (summary + prompt payload) for release hygiene.

## Usage
php spark codex:review

## Arguments
- None (uses env `REVIEW_OUTPUT_DIR` and `REVIEW_LOOKBACK_COMMITS`).

## What It Touches
- Database tables: None
- Files/directories: Writes to `docs/codex/reviews` (or `REVIEW_OUTPUT_DIR`).
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (writes review markdown files)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: No
- Suggested schedule: On-demand before reviews or releases.

## Related Commands
- spark:ops:analyze-commands

## Failure Modes
- `git` commands fail or repo not available.
- Output directory cannot be created/written.

## Status
- Existing
