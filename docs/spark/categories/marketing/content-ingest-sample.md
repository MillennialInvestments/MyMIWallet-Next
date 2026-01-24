# spark:content:ingest-sample

## Purpose
Load sample Daily Top Gainers JSON, ingest, score, and print the top ideas.

## Usage
php spark content:ingest-sample

## Arguments
- None.

## What It Touches
- Database tables: `bf_content_scanner_ingest`, `bf_content_scanner_rows`, `bf_content_ideas`, `bf_content_posts`
- Files/directories: Reads `writable/samples/daily_gainers.json`.
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (ingest, ideas, drafts)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: No
- Suggested schedule: On-demand for smoke testing.

## Related Commands
- spark:contentengine:smoke

## Failure Modes
- Missing sample JSON file.
- Content Engine tables not present.

## Status
- Existing
