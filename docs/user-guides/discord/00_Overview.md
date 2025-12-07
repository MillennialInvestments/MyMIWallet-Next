# MyMI Discord User Experience Overview

Welcome to the MyMI Wallet Discord experience. This guide explains what you can do in the server, how Discord connects to the MyMI Wallet (CI4) application, and what to expect from the automated alerts, news, and earnings posts.

## Membership tiers at a glance
- **Free:** Access to community channels, basic ticker lookups, and preview versions of alerts/news.
- **Starter / Basic (Tier 1):** Full alerts in the `#trade-alerts-tier1` channel, standard watchlists, and access to scheduled earnings/news posts.
- **Pro / Premium (Tier 2):** Priority alerts with richer targets, expanded news digests, and faster refresh intervals.
- **Gold (Tier 3) / Enterprise:** Highest-priority alert routing, premium research summaries, and early access to new automations.

## What the automations do
- **Alert automation:** Trade alerts flow from MyMI’s alert engine and email scrapes into Discord channels, including updates and TradingView chart snapshots.
- **News & marketing automation:** MarketAux and internal scrapers assemble daily digests, “Today’s Story” highlights, and marketing posts for Discord.
- **Earnings automation:** Weekly and optional daily posts show upcoming earnings with watchlist-aware highlights.
- **Interactive slash commands:** Slash commands retrieve account-linked data such as alerts, watchlists, and portfolios directly from the MyMI CI4 app.

## How Discord talks to the MyMI CI4 app
```
Discord user → /mymi command → Discord bot → CI4 API (Alerts/Investments/Marketing) → formatted response → Discord channel/DM
Email/news scrapers → CI4 marketing & alerts → Discord webhooks → #trade-alerts / #marketing-news / #earnings-watch
CRON jobs → CI4 jobs (alerts, news, earnings) → Discord queue → target channels
```

## Account linking (Discord ↔ MyMI Wallet)
1. Run `/mymi link` in Discord to generate a secure link token.
2. Sign in to your MyMI Wallet account and confirm the link.
3. After linking, Discord commands can show your portfolio, alerts, and watchlists; premium data follows your MyMI membership.

## What to expect when you interact
- Typing `$TICKER` in eligible channels triggers an automatic symbol lookup with recent alerts and a TradingView chart fallback when needed.
- `/mymi alerts` returns the newest trade alerts with entry, stop, targets, and status updates.
- `/mymi earnings` and `/mymi news` deliver quick summaries and links to the MyMI dashboards.
- `/mymi portfolio` and `/mymi watchlist` return your data if your account is linked; otherwise you’ll get a link prompt.
