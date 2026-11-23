# MyMI Wallet market "power moves" feed and n8n migration

Status: plan (2026-11-23). Owner: Tim. This document is not a runtime change.

## 1. Why the MyMI n8n workflows never set up

| Cause | Evidence | Fix |
| --- | --- | --- |
| The MyMI launcher dates from DreamHost and needs `aiops/node_modules/.bin/n8n`. No release ships that, so every start only logged `No such file`. | `aiops/bin/n8n-start-safe.sh`, the old `aiops/logs/n8n.log` | Retired on gq-ai01 (this PR). It exits 0 with a message, and `MYMI_ALLOW_LOCAL_N8N=1` keeps it for dev machines. |
| gq-ai01 already runs one governed n8n (TBI, port 5678). A second one would fight it for 5678/5679. | aiops-platform `ops/n8n/tbi-n8n.sh` | MyMI workflows move into the governed n8n. |
| The 10 JSON files in `docs/n8n/` fail the governed validator (`bin/n8n-tbi-validate.py`). They use the removed `function` and `cron` nodes, read `$env`, contain a placeholder secret (`YOUR_OPS_SHARED_SECRET`), and depend on Discord/SMTP credentials that were never created. | `docs/n8n/workflows/*.json`, `docs/n8n/templates/*.json` | Rebuild them in the governed format (below). |
| An n8n database (1 user, 1 stored credential) was committed. | `aiops/.n8n/n8n.sqlite*` | This PR stops tracking it (`git rm --cached`, gitignored). Purging it from history is a separate owner decision. |

### Where each old workflow goes

The governed n8n only observes and notifies. It never runs jobs, shell, git or DB writes.

| Old workflow | New home |
| --- | --- |
| AIOps Watchdog, Chat Health Guard, Nightly Platform Digest, Log Spike Alert | Governed n8n workflow `mymiHealthWatch001`: read-only health probes, posting to the ops Discord only when something changes |
| Market Content Push | MyMI power-moves feed (section 2), which reaches Discord through the bot's owner Publish queue |
| Docs Gap Codex Handoff | Governed MCP `marketing_submit` / triage path (advise only) |
| Daily Health + Logs, Nightly Routes + Security, Weekly DB Maintenance, Manual Ops Run | These run jobs, so they become MyMI systemd timers running `php spark` from the release, not n8n |

## 2. Power-moves feed: spend free sources first

Goal: a stream of stock and crypto moves and news that are likely to move a price, posted to the MyMI Discord and the app.

### Tiers (free tier first; paid only to confirm)

Limits are the providers' published free tiers as we understand them. Check each provider's current page before relying on it.

| Role | Source (key in code) | Free tier (verify) | How we use it |
| --- | --- | --- | --- |
| Live US stock trades | Finnhub WebSocket (`FINNHUB_API_KEY`) | Free, about 50 symbols | One long-lived socket on the watchlist (top movers + member watchlists). Price/volume spikes come from here, at zero REST cost. |
| Stock news | Finnhub `/news`, `/company-news` | 60 calls/min | Poll market news every 2 min. Pull company news only for symbols that just spiked. |
| Filings | SEC EDGAR (no key, User-Agent required) | 10 req/s | 8-K items 1.01/2.02/5.02/8.01 and Form 4 clusters for watched tickers, from the atom feed every 5 min |
| Macro | FRED (`FRED_API_KEY`), Fed/BLS RSS | Generous | CPI/jobs/FOMC release-day flags |
| Crypto prices | CoinGecko `/coins/markets` | ~30/min demo, monthly cap | One call every 5 min for the top 250 coins (1h/24h % and volume) |
| On-chain/DEX | DexScreener (no key), Birdeye | Free, rate limited | Only for coins that already spiked |
| Crypto news | CryptoPanic, CoinDesk/Cointelegraph RSS | Free dev tier / RSS | Poll every 5 min |
| Confirm a move | Twelve Data (`TWELVE_DATA_API_KEY`) | ~800/day, 8/min | Intraday bars for a flagged ticker only |
| Sentiment on a flagged ticker | MarketAux (`MARKETAUX_API_KEY`) | ~100/day | Entity sentiment, only after a move is flagged |
| Fundamentals / earnings | Alpha Vantage (3 env names in code) | ~25/day | Daily earnings calendar plus one overview per flagged ticker. Never used for polling. |
| General news fallback | GNews, NewsAPI.org/ai | ~100/day each; NewsAPI dev tier is delayed and not for production | Only when the free feeds are down |

### What counts as a power move (deterministic, then model)

1. A trigger from data, never from a model:
   - price change of at least 2.5x the symbol's normal intraday range (ATR-based), with volume at least 3x its 20-day average for that time of day; or
   - a high-impact filing or headline matched to a watched ticker (M&A, guidance, FDA, executive change, halt, big Form 4 buy); or
   - crypto: a 1h move of at least 5% on a top-100 coin with 24h volume at least 2x normal.
2. Confirm with one paid call at most (Twelve Data bars or MarketAux sentiment), taken from the daily budget.
3. Ollama (fleet first, no paid LLM) writes a one-line "what moved and why", using only the facts given and the source link.
4. Post: a Discord card with the ticker, move, volume, source link, "not financial advice", and nothing else.

### Budget ledger (the missing piece)

`ExternalApiGuard` caps calls per process only. Add a per-provider ledger that tracks calls today, calls this minute, and the tier limit, and stops at 80% of the daily free tier. When one source is out, the next one in its row takes over, and the feed degrades to free sources instead of failing. The daily snapshot goes into the existing AIOps usage tables so the dashboard shows spend per tier.

### Delivery

- MyMI app (this repo): the ledger, the Finnhub socket worker (systemd), the scorers, and a read-only `GET /API/Market/powerMoves` (token).
- Discord (timothyburks bot, PR tbisolutions/timothyburks#2015): MyMI #market-brief (daily) is already built. The live power-moves channel is one more publish kind; whether it posts automatically or waits for owner Publish is Tim's call.
- n8n (governed): reads the power-moves endpoint and posts the ops digest only. It never trades and never writes.

## 3. Next PRs

1. aiops-platform: governed `mymiHealthWatch001` workflow plus the `www.mymiwallet.com` host allowlist.
2. MyMI: per-provider budget ledger with tests.
3. MyMI: Finnhub socket worker plus scorer (staging first, then the staging form test).
4. MyMI: retire the job-running n8n JSONs into systemd timers.
