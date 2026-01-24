# spark:alerts:parse-test

## Purpose
Parse a broker email sample and output normalized execution data for parser validation.

## Usage
php spark alerts:parse-test --file=/path/to/email.txt [--subject="..."]

## Arguments
- file (string) – Path to the raw email text file (required).
- subject (string) – Optional subject override (falls back to Subject header).

## What It Touches
- Database tables: None
- Files/directories: Reads the provided email sample file.
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: No
- Suggested schedule: On-demand during parser debugging.

## Related Commands
- spark:alerts:audit

## Failure Modes
- File missing/unreadable.
- Parser cannot match subject/body.

## Status
- Existing
