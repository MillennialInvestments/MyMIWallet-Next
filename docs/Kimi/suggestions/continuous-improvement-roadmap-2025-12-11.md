# Kimi Continuous Improvement Roadmap (2025-12-11)

## High
- **Logging/Tracing:** Add structured logs for every Kimi call (latency, prompt hash, status) and centralize in `AlertJobQueue` + Marketing jobs for incident review.
- **Response Schema:** Define JSON schemas for marketing summaries, social copy, and alert commentary; validate before persisting to avoid malformed payloads.
- **Rate Safety:** Add Redis-backed throttling and batching for `/Marketing/generateKimi*` and `/Alerts/generateAlertCommentary` to prevent API saturation.

## Medium
- **Python Companion Jobs:** Build offline analytics notebooks for alert performance and marketing CTRs, feeding highlights back into prompts.
- **Caching Layer:** Cache recent Kimi outputs per record to reuse across social/email/discord distribution.
- **Test Coverage:** Add PHPUnit cases covering `DocsIndex`, `KimiSuggestions`, and Kimi-aware Marketing/Alerts helpers with mocked `KimiClient`.

## Low
- **Prompt Library:** Store reusable prompt templates in `/docs/Kimi/prompts` and load dynamically in services.
- **Backtesting Hooks:** Wire generated alert commentary into a backtester to score AI narratives vs. actual outcomes.
- **Spark Audit Stub:** Add a `spark kimi:audit` command that counts Kimi calls in logs and prints feature toggles status for ops checks.
