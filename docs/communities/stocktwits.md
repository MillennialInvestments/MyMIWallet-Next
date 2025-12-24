# StockTwits Communities Hub

## What a community means on StockTwits
The community is ticker-centric. Posts join ticker streams and direct traders into Discord and memberships.

## Assets to create in the StockTwits UI
- Verified brand account
- Watchlist of core tickers
- Bio with Discord + website links
- Pinned idea aligned to membership offer

## Posting cadence
- Ideas: 2–3 per day during market hours
- Watchlist updates: daily open/close notes
- Polls/Questions: 2 per week

## Best performing native content types
- Short trade insights with charts
- Quick questions to drive replies
- Link-outs to deeper research (1 link max)

## Format constraints
- Character limit: ~1,000; target < 280 for fast reads
- Hashtags: keep minimal; platform prefers $TICKER tags
- Links: 1 allowed; avoid URL clutter
- Mentions: @user supported; keep < 3
- Tickers: MUST use $TICKER format

## CTA routing
- Post → Ticker stream → Profile bio → Discord invite
- Discord → Website → Free tools → Membership

## Pinned Post / About template
```
Trade smarter with MyMI Wallet.

🔗 Website: {{website}}
💬 Discord: {{discord}}
📊 Free Budget Tool: {{budget_tool}}
✨ Premium features teaser: {{premium}}
📧 Email list/newsletter: {{newsletter}}
```

## Tracking fields for Management Module
- Platform key: stocktwits
- Profile URL and watchlist tickers
- Default hashtag/ticker formatting ($TICKER enforced)
- Link cap and CTA copy
- Pinned idea template version

## Automation reference
Formatter must convert tickers to $TICKER and enforce single-link policy. Generated drafts flow into `bf_social_generated_posts` with status draft until manually approved.
