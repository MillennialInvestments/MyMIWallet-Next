# Content Engine Overview

The Content Engine ingests a daily "Top Gainers" JSON payload, normalizes symbols and metrics, scores each name, and generates multi-platform drafts (TradingView, StockTwits, TikTok, YouTube, Facebook, optional Discord). The process is deterministic and functions without AI or third-party webhooks when disabled.

## Flow
1. **Ingest** via `/API/ContentEngine/ingestScanner` with a JSON body containing `scan_name`, `quote_ts`, and `rows`.
2. **Score** rows to create `bf_content_ideas`, assigning tiers and structured reasons.
3. **Draft** templates rendered per platform into `bf_content_posts`.
4. **Review** drafts from the Management dashboard block ("Daily Scanner Content") with modal previews.
5. **Distribute** through Zapier or Discord when enabled; otherwise responses are skipped safely.

## Key Safeguards
- Payload hash prevents duplicate ingests.
- Payload and row-count limits (1MB / 500 rows by default).
- Database transactions wrap ingest persistence.
- Templates are optional and missing files are logged instead of breaking the pipeline.

## Feature Flags
- `CONTENTENGINE_DISTRIBUTION_ENABLED` – enable/disable outbound sendPost behavior.
- `CONTENTENGINE_ZAPIER_WEBHOOK_URL` – optional Zapier webhook target.
- `CONTENTENGINE_DISCORD_ENABLED` – allow Discord dispatch stub logging.
