# Marketing & News Automation

This guide captures how marketing content and news flow into the platform and how to extend them to Discord.

## Content Sources
- **MarketAux API:** Fetched via `MyMIMarketing` news utilities; used for symbol-specific and general market headlines.
- **Email Scrapes:** Broker/newsletter emails delivered to `alerts@mymiwallet.com`, staged in `bf_marketing_temp_scraper`, and promoted to `bf_marketing_scraper` after parsing.
- **Alert-Derived Marketing:** Trade alerts enriched into marketing copy through `MyMIMarketing::generateTradeAlertMessage` and campaign builders.

## Processing & Scoring
- **Sanitization/Summarization:** Marketing library routines clean and compress story bodies before distribution.
- **Ranking:** TF-IDF/keyword extraction guides selection of top stories (see marketing dashboards and prompt generators).
- **Buffering:** Campaigns store platform-specific variants (including `discord` payloads) in marketing tables for later dispatch.

## Current Discord Touchpoints
- `MyMIMarketing::distributeTradeAlert()` posts generated alert messages to Discord alongside social channels.
- Campaign distribution (`queueGroupedDigest`) will send digest text to Discord when `platforms['discord']` is enabled.
- `postToDiscord` handles raw webhook posting with 2000-character truncation and environment-driven webhook URLs.

## Candidate Automations
- **Daily Top 5 News Digest:** Summarize highest-ranked stories from `bf_marketing_scraper`; post morning digest to `#market-news`.
- **Today’s Story:** Single in-depth summary with headline + link back to MyMI dashboard.
- **Breaking News:** Immediate Discord push for stories with high sentiment or watchlist ticker match.
- **Topic Buckets:** Publish AI/semis/crypto/macro buckets as short listicles with source links.

## Example Discord Payloads
```json
{
  "content": "📰 Top Market Stories\n1) {headline_1} — {link_1}\n2) {headline_2} — {link_2}\n...\nDiscuss: https://www.mymiwallet.com/News"
}
```
```json
{
  "content": "📌 Today’s Story: {headline}\n{summary}\nFull coverage: {url}\n#markets #mymi"
}
```

## Implementation Notes
- Keep webhook URLs in ENV; support channel overrides per automation.
- Reuse `formatDiscordPost`/`postToDiscord` helpers for consistent truncation and emoji usage.
- Optionally mirror to Zapier/email for subscribers who prefer alternative channels.