# Completed: Marketing config centralization + inbox visibility diagnostics

Date: 2026-04-09

## Summary
- Added a centralized CI4 config file at `app/Config/Marketing.php` for:
  - IMAP mailbox connection settings and multi-folder defaults.
  - Accepted subject patterns and allowed sender lists.
  - Footer-noise cleanup tokens and provider parsing prefixes.
  - OCR runtime options.
  - Temp scraper table/deduplication behavior.
  - Storyline clustering thresholds and weight tuning.
  - Logging/debug flags.
- Refactored `marketing:news-scrape` and `MarketingNewsScrapeService` to use `Config\Marketing`.
- Added multi-folder inbox scanning and detailed telemetry fields (connection, folder counts, matched count, parsed count, stored count, duplicate skipped, parse failed, and rejection reasons).
- Added debug-only subject listing mode (`--debug-subjects`) that evaluates candidates without storing records.
- Added `marketing:news-debug` diagnostic Spark command to list folders, per-folder counts, first N subjects, and filter match tallies.
- Updated supporting services (`MarketingStoryService`, `Marketing\MarketingNotificationService`, `Marketing\OcrService`) to read shared centralized Marketing config values.

## Operational output improvements
`marketing:news-scrape` now emits structured diagnostics even when nothing is stored, including:
- connection success/failure
- configured folder(s)
- per-folder total message counts
- matched counts
- explicit rejection reasons (sender not allowed, subject not matched, parse failed, duplicate skipped)

