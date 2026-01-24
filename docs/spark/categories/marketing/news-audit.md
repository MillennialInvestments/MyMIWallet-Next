# spark:news:audit

## Purpose
Audit recent marketing news ingestion, summarization, and post generation quality.

## Usage
php spark news:audit

## Arguments
- None.

## What It Touches
- Database tables: `bf_marketing_temp_scraper`, `bf_marketing_scraper`, `bf_marketing_posts`/`bf_marketing_generated_posts` (read), `bf_error_logs` (write)
- Files/directories: None
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (logs issues to `bf_error_logs`)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes
- Suggested schedule: Weekly.

## Related Commands
- spark:contentengine:smoke

## Failure Modes
- Marketing tables missing.
- Error log insert failures.

## Status
- Existing
