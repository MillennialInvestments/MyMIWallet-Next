# System Status & Operations Transparency

Learn how MyMI keeps you informed about automation health inside Discord.

## #system-status channel
- Dedicated channel for uptime notes, incident updates, and maintenance windows.
- Short messages indicate when queues are delayed or when API limits hit.

## Why you might see “system delayed”
- Discord or data-provider rate limits are throttling sends.
- Scheduled CRON jobs are still running or paused for maintenance.
- Quiet hours are active to avoid overnight noise.

## Daily jobs and checks
- Alert processing jobs run on schedules to fetch, enrich, and dispatch signals.
- Marketing/news digests and earnings posts have morning CRON windows.
- Health checks log delivery results and surface issues to the ops channel.

## How rate limits affect you
- Messages are queued with pacing to stay under Discord’s limits (and external API limits like Alpha Vantage or MarketAux).
- If rate limits are hit, messages retry with backoff; severe cases trigger an ops notification.

## Why transparency matters
- Seeing status notes builds trust and lets you know when to expect updates.
- If you notice delays, check `#system-status` before re-running commands or posting duplicate requests.

## What to do if something looks off
- Check the latest post in `#system-status` for known incidents.
- If nothing is posted and you still see an issue, drop a note in `#welcome-support` with details.
