# News Automation Playbook

## Pipeline Tables
- `bf_marketing_temp_scraper` (raw news scrape staging)
- `bf_marketing_scraper` (normalized news records)
- `bf_marketing_posts` / `bf_marketing_generated_posts` (news summaries)

## Spark Commands
- `php spark news:audit` (audit news ingestion/summarization)
- `php spark marketing:automation-audit` (overall automation audit)

## Definition of Done
- News items are captured in staging (`bf_marketing_temp_scraper`).
- Normalized news records exist in `bf_marketing_scraper`.
- Summaries are generated into posts tables with status metadata.

## Dedupe Rules
- Deduplicate by URL, vendor, and published timestamp.
- Reject re-ingestion of identical summaries within the same day.

## Rate Limiting / Pacing
- Enforce vendor API limits (MarketAux, AlphaVantage, etc.).
- If rate limits hit, mark ingestion run as partial and retry later.

## Platform Constraints
- Discord embeds should include title + short summary (avoid full article body).
- LinkedIn/X/Facebook posts should include the primary link only once.
