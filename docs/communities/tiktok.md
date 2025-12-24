# TikTok Communities Hub

## What a community means on TikTok
TikTok communities form around the profile, recurring series, and comment threads that feed viewers into Discord and memberships.

## Assets to create in the TikTok UI
- Verified brand profile with link-in-bio
- Highlighted series covers (Budget Tips, Trade Alerts, Weekend Live)
- Comment pin templates for CTA routing
- Profile link hub pointing to Discord and website tools

## Posting cadence
- Short-form: 5–7 clips per week
- Live: 1 live Q&A/market open per week with Discord CTA
- Duets/stitches: 2–3 per week reacting to market news

## Best performing native content types
- 30–60s hooks with on-screen captions
- Duets/stitches with analysts and earnings clips
- Poll stickers and question prompts
- Quick trade or budget checklists

## Format constraints
- Caption: ~2,200 characters, but keep hooks under 150 chars
- Hashtags: 3–6 targeted tags; avoid broad spam
- Links: only via bio; include "link in bio" mention
- Mentions: @user supported; keep under 3
- Tickers: plain text (AAPL) in captions

## CTA routing
- Post → Profile link-in-bio → Discord join
- Discord → Website → Free Budget Tool → Membership upgrade

## Pinned Post / About template
```
MyMI Wallet daily clips + live market walk-throughs.

🔗 Website: {{website}}
💬 Discord: {{discord}}
📊 Free Budget Tool: {{budget_tool}}
✨ Premium features teaser: {{premium}}
📧 Email list/newsletter: {{newsletter}}
```

## Tracking fields for Management Module
- Platform key: tiktok
- Profile handle and link-in-bio hub URL
- Cadence plan (shorts/live/duets)
- Default hashtag set and max hashtag count
- Comment pin CTA template version
- Live schedule and replay link pattern

## Automation reference
Feed scraper summaries into short-form hooks; enforce TikTok hashtag limits, generate caption + comment pin CTA, and log variants in `bf_social_generated_posts` for Discord and membership routing.
