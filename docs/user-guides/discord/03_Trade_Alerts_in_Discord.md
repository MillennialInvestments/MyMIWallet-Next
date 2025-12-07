# Trade Alerts in Discord

This guide explains how MyMI trade alerts appear in Discord, how updates are generated, and what each field means.

## How alerts are created
- Alerts originate from MyMI’s trading tools and curated email scrapes (e.g., broker newsletters). Parsed alerts populate the MyMI alert database before distribution to Discord.
- CRON jobs or manual triggers pick up new or updated alerts and route them to the appropriate tiered channels.
- Alerts always pass through the Discord queue to respect pacing and quiet hours.

## Fields you’ll see in an alert
- **Ticker & category:** The symbol and strategy tag.
- **Entry:** Suggested entry price.
- **Stop loss:** Protective exit level.
- **Targets:** One or more target levels (T1, T2, etc.).
- **Status:** Open, updated, or closed. Updates may include new targets or adjusted stops.
- **Chart:** TradingView snapshot when available.

## How email-scraped alerts are interpreted
- The scraper normalizes ticker, entry, stop, and targets from email text.
- Messages are sanitized before posting and truncated under Discord’s 2000-character limit.
- If parsing fails, the alert is held for review instead of posting incomplete data.

## How updates show up
- When an alert is modified (new target/stop/status), the updated payload is queued and posted to the same channel.
- Duplicate suppression keeps the channel clean; only meaningful changes are broadcast.

## TradingView charts
- Charts are generated from TradingView and attached when available to provide quick visual context.
- If a chart fails to generate, the alert still posts with text-only details.

## FAQ
**Why didn’t my alert send yet?**
- Quiet hours or pacing rules may delay delivery.
- Heavy queue volume or API rate limits can add a short delay.

**Why did I get a notification twice?**
- An alert update (e.g., new target) can trigger a second post. Exact duplicates are de-duplicated automatically.

**Why is the chart missing?**
- The TradingView snapshot service can occasionally fail or rate-limit; the alert will still post in text form.
