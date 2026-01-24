# spark:ops:analyze-commands

## Purpose
Analyze parsed ops inbox items and generate AI plans for execution.

## Usage
php spark ops:analyze-commands

## Arguments
- None (uses `OPENAI_API_KEY` and `OPENAI_MODEL`).

## What It Touches
- Database tables: `bf_ops_command_inbox` (read/write)
- Files/directories: None
- Cache: None
- External APIs: OpenAI Chat Completions API

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (updates inbox statuses + AI plans)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes (ensure API key and rate limits)
- Suggested schedule: On-demand or hourly.

## Related Commands
- spark:ops:fetch-commands
- spark:ops:work

## Failure Modes
- Missing `OPENAI_API_KEY` (items marked Blocked).
- API errors or timeouts.

## Status
- Existing
