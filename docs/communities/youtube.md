# YouTube Communities Hub

## What a community means on YouTube
A community on YouTube centers on the channel and its playlists, plus Community tab posts and memberships that nurture recurring viewers into Discord members and paying subscribers.

## Assets to create in the YouTube UI
- Primary YouTube Channel with verified handle
- Playlists for recurring series (Budget Tips, Trade Alerts, Weekly Recap)
- Community tab enabled with branding and channel trailer
- Channel Membership tiers aligned to Starter/Basic/Pro/Premium
- Pinned playlist linking to Discord and website tools

## Posting cadence
- Short-form: 3–5 Shorts per week
- Long-form: 1–2 uploaded videos per week
- Live: Weekly live stream (Saturday) with Discord CTA
- Community tab: 3 posts per week for polls and link-outs

## Best performing native content types
- Shorts with quick hooks
- Long-form tutorials and trade walk-throughs
- Live Q&A streams
- Polls for ticker preferences and feature requests

## Format constraints
- Title: 100 characters max
- Description: flexible, but first 200 chars should contain CTA + keywords
- Hashtags: 3–8 recommended, avoid overstuffing
- Links: allowed in description and pinned comment; avoid more than 3 unique domains
- Mentions: @channel and @creator supported
- Tickers: plain text (AAPL) in title; $TICKER allowed in description

## CTA routing
- Post → Channel/Playlist → Discord join link
- Channel → Discord announcements channel
- Discord → Website landing → Free tools → Membership upsell

## Pinned Post / About template
```
Welcome to MyMI Wallet!

🔗 Website: {{website}}
💬 Discord: {{discord}}
📊 Free Budget Tool: {{budget_tool}}
✨ Premium features teaser: {{premium}}
📧 Email list/newsletter: {{newsletter}}
```

## Tracking fields for Management Module
- Platform key: youtube
- Channel URL and playlist URLs
- Primary community playlist ID
- Posting cadence plan (shorts/long/live/community)
- Membership tier mapping to Starter/Basic/Pro/Premium
- Default hashtag set and max hashtag count
- Pinned comment/description template version
- Live stream schedule and replay link

## Automation reference
Use scraper → summarize → keywords → generate content → distribute flow. Map YouTube descriptions to Discord + website CTAs and ensure pinned comment includes membership upsell. Store generated variants in `bf_social_generated_posts`.
