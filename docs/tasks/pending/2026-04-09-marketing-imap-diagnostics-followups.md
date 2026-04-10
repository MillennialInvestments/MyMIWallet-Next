# Pending: Marketing IMAP diagnostics follow-ups

Date: 2026-04-09

## Follow-up items
1. Add optional IMAP UID checkpointing to avoid rescanning already-evaluated messages during debug runs.
2. Add provider-specific parser adapters with explicit parse confidence scoring per source.
3. Add CLI flags to override allowed senders/subject patterns at runtime for one-off incident debugging.
4. Add a compact/verbose output mode split so CRON logs stay short while manual diagnostics stay detailed.
5. Add unit tests for sender/subject filter evaluation and folder-level diagnostic aggregation.
6. Add integration test fixtures for Schwab/Thinkorswim subject examples and expected parse outcomes.

