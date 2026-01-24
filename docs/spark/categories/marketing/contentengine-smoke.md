# spark:contentengine:smoke

## Purpose
Run an end-to-end smoke test for Content Engine ingest → scoring → drafts pipeline.

## Usage
php spark contentengine:smoke

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
- Suggested schedule: On-demand during QA/testing.

## Related Commands
- spark:content:ingest-sample
- spark:news:audit

## Failure Modes
- Missing sample JSON file.
- Content Engine tables not present.
- Validation errors on ingest payload.

## Status
- Existing
