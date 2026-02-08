# Design: logs:summarize-all

## Command
`php spark logs:summarize-all`

## Goal
Aggregate logs across all major subsystems and generate Markdown operational summaries.

## Included Subsystems
- CodeIgniter app logs
- CodeIgniter CLI logs
- chat
- aiops
- n8n
- node bridges
- workers/cron runners

## Data Source Contract
Read only from: `writable/logs/**`

## Outputs
- `docs/_aiops/logs/summary-YYYY-MM-DD.md`
- `docs/_aiops/logs/subsystem-chat.md`
- `docs/_aiops/logs/subsystem-aiops.md`
- Additional subsystem files as discovered.

## Missing Source Reporting
The command emits a “Missing Sources” section listing subsystems with no matching log files.

## Notes
This implementation is intentionally lightweight and regex/count based; future revisions can include severity parsing, deduplication, and trend graphs.
