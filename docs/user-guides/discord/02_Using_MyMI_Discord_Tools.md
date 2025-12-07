# Using MyMI Discord Tools

Use these commands to pull MyMI Wallet data directly in Discord. Link your account first with `/mymi link`.

## Command reference

| Command | What it does | What you receive |
| --- | --- | --- |
| `/mymi link` | Generates a secure link to bind your Discord user to your MyMI Wallet account. | Link URL + confirmation status. |
| `/mymi alerts [timeRange] [symbol]` | Shows the most recent trade alerts, optionally filtered. | Symbol, entry, stop loss, targets, and status (open/active/closed). |
| `/mymi ticker <symbol>` | Looks up the latest alert for a ticker; falls back to a TradingView chart if no alert exists. | Recent alert summary or chart thumbnail + fundamentals/news highlights. |
| `/mymi portfolio [summary|positions]` | Returns your portfolio snapshot (requires linked account). | Total value, P&L, top holdings. |
| `/mymi watchlist [symbol]` | Shows your watchlist or one symbol’s details (requires linked account). | List of watchlist tickers, recent alerts, and notes. |
| `/mymi earnings [today|this_week]` | Lists upcoming earnings windows. | Symbols with dates and BMO/AMC timing. |
| `/mymi news [topic]` | Summarizes recent MarketAux and marketing stories. | Top headlines, short summaries, links back to the dashboard. |

### `$TICKER` auto-detection
- Messages that include `$AAPL` or similar trigger a quick lookup.
- If an alert exists, you’ll see the latest entry/target/stop with status.
- If no alert exists, the bot shares a TradingView chart and a short fundamentals/news snippet.

## Free vs. paid features
- **Free:** Preview alerts, basic ticker lookups, trimmed news/earnings summaries.
- **Paid tiers:** Full alert details (entry/stop/targets), richer news digests, faster refreshes, and portfolio/watchlist access.

## Rate limits and pacing
- Short cooldowns keep the bot within Discord rate limits; rapid-fire commands may ask you to wait a few seconds.
- Heavy commands (portfolio/watchlist) may be sent as ephemeral replies to keep channels tidy.

## Data formatting
- **Alerts:** Include entry price, stop loss, target levels, and status (open/updated/closed). Charts are attached when available.
- **Earnings:** Bullet lists with date and BMO/AMC timing; highlights watchlist symbols.
- **News:** Headline + 1–2 line summary with a link to the MyMI dashboard for full coverage.

## Why some data is hidden
- Portfolio and watchlist commands require a linked account and an active membership.
- Premium alert details are withheld for free users; you’ll see a prompt to upgrade if needed.

## Checklist before you command
- [ ] You’ve joined the server and can see the command channel.
- [ ] You ran `/mymi link` and saw a success message.
- [ ] You’re signed in to MyMI Wallet in your browser if a link prompt appears.
- [ ] You understand that premium data requires a paid tier.
