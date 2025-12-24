# Twitch Communities Hub

## What a community means on Twitch
The Twitch community is anchored to the channel, live chat, and recurring show schedule that moves viewers into Discord and premium memberships.

## Assets to create in the Twitch UI
- Branded Twitch channel with panels
- Channel trailer and schedule blocks
- Discord panel and chat command (!discord)
- Extension for link hub if available

## Posting cadence
- Live: 1–2 streams per week (Saturday spotlight recommended)
- Clips: 2–4 highlights per week cross-posted to TikTok/YouTube Shorts
- Announcements: schedule update posts before each stream

## Best performing native content types
- Live market breakdowns
- Portfolio/budget build-alongs
- AMA + ticker requests
- Clips with strong hooks and overlays

## Format constraints
- Title: concise with ticker keywords; avoid clickbait
- Tags: 5–10 relevant
- Links: allowed in panels and chat commands, keep short
- Mentions: limited to chat shoutouts
- Tickers: plain text in title/description

## CTA routing
- Live/Clips → Twitch channel → Discord via panel/command
- Discord → Website → Free tools → Membership

## Pinned Post / About template
```
Live with MyMI Wallet every week.

🔗 Website: {{website}}
💬 Discord: {{discord}}
📊 Free Budget Tool: {{budget_tool}}
✨ Premium features teaser: {{premium}}
📧 Email list/newsletter: {{newsletter}}
```

## Tracking fields for Management Module
- Platform key: twitch
- Channel URL and schedule block
- Default stream titles and tag sets
- Discord command/CTA copy
- Clip template and highlight notes
- Stream-to-Discord routing checklist

## Automation reference
Use summaries to draft stream titles and description blocks, then push Discord announcements and store generated variants in `bf_social_generated_posts` with status draft until approved.
