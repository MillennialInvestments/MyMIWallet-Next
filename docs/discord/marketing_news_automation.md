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

# Discord Marketing News Automation

## News Source Pipeline
- **Entry point:** `App\Modules\APIs\Controllers\ManagementController::cronFetchAndGenerateNews()`
- **Processor:** `App\Libraries\MyMIMarketing::cronFetchAndGenerateNews()`
- **Storage:**
  - Raw scrape records: `bf_marketing_temp_scraper`
  - Final summaries: `bf_marketing_scraper`
- **Helper methods:**
  - `App\Models\MarketingModel::insertTempNews()` writes raw news items.
  - `App\Models\MarketingModel::insertNewsSummary()` stores finalized summaries (deduped by hash).
  - `App\Models\MarketingModel::getTodaysTopNewsSummaries()` returns the latest items for distribution.

## Discord Distribution Path
- **Entry point:** `GET /API/Management/distributeTodaysNewsContent`
- **Handler:** `ManagementController::distributeTodaysNewsContent()`
- **Sender:** `App\Libraries\MyMIDiscord::sendWebhookMessage()` using `DISCORD_WEBHOOK_NEWS` (via `config('Discord')->newsWebhook`).
- **Payload:** Compact embed titled "Today's Top News" with bullet items (title, brief summary, and link).

## Environment Variables
Set the following values in your `.env` or DreamHost panel:

```env
DISCORD_WEBHOOK_NEWS="https://discord.com/api/webhooks/..."
DISCORD_WEBHOOK_ALERTS="https://discord.com/api/webhooks/..."  # optional
DISCORD_BOT_TOKEN="..."                                       # if bot API fallback is used
DISCORD_PUBLIC_KEY="..."                                      # only needed for interactions
MARKETAUX_API_KEY="..."                                       # required for news fetching
```

## How to Test Manually
1. **Run news generation (fetch + summarize)**
   ```bash
   curl "https://www.mymiwallet.com/index.php/API/Management/cronFetchAndGenerateNews?cronKey=YOUR_CRON_KEY"
   ```
   - Expect HTTP 200 with counts of temp/final inserts.
   - Check logs for `cronFetchAndGenerateNews` start/end and dedupe counts.
   - Confirm new rows in `bf_marketing_temp_scraper` and `bf_marketing_scraper`.

2. **Send today's digest to Discord**
   ```bash
   curl "https://www.mymiwallet.com/index.php/API/Management/distributeTodaysNewsContent?cronKey=YOUR_CRON_KEY"
   ```
   - Expect HTTP 200 JSON with `sent` count and item IDs/titles.
   - Verify the message in the Discord `#mymi-news` channel (news webhook target).

3. **Error path**
   - Temporarily clear or invalidate `DISCORD_WEBHOOK_NEWS`.
   - Re-run the distribution call above.
   - Expect an error response and an `error` log entry (flows into `bf_error_logs`).

## Cron Setup (DreamHost)
Use the same PHP binary path as existing tasks. Replace `USERNAME` with the server user (e.g., `mymiteam`).

```bash
/usr/local/php82/bin/php /home/USERNAME/mymiwallet.com/site/current/public/index.php \
  API/Management/cronFetchAndGenerateNews cronKey=YOUR_CRON_KEY \
  >> /home/USERNAME/logs/news-fetch-cron.log 2>&1

/usr/local/php82/bin/php /home/USERNAME/mymiwallet.com/site/current/public/index.php \
  API/Management/distributeTodaysNewsContent cronKey=YOUR_CRON_KEY \
  >> /home/USERNAME/logs/discord-news-cron.log 2>&1
```

## Logging & Observability
- `ManagementController::cronFetchAndGenerateNews()` logs start/end counts and dedupes.
- `ManagementController::distributeTodaysNewsContent()` logs empty queues and Discord delivery errors.
- All log_message output is forwarded through the CI4 logging pipeline (including `bf_error_logs`).