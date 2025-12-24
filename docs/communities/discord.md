# Discord Communities Hub

## What a community means on Discord
Discord is the central community server with channels for alerts, education, support, and membership upgrades. It is the destination for funnel routing from every platform.

## Assets to create in the Discord UI
- Discord server with verified vanity URL
- Channels: #announcements, #trade-alerts, #budget-tips, #new-members, #live-streams
- Roles aligned to Starter/Basic/Pro/Premium
- Welcome message with links to website tools
- Bots/webhooks for marketing ingestion if needed

## Posting cadence
- Announcements: 3–5 per week
- Trade/budget alerts: as generated
- Live thread per Saturday stream
- Weekly recap pinned in #announcements

## Best performing native content types
- Markdown posts with bullets and links
- Threads for Q&A
- Polls using reactions
- Short clips or embeds from YouTube/TikTok

## Format constraints
- Character limit per message: ~2,000
- Links: allowed; avoid >3 per message
- Hashtags: not required; use channel mentions instead (#announcements)
- Mentions: @role for routing; keep under 2 mentions
- Tickers: plain text or $TICKER for consistency

## CTA routing
- Posts/Announcements → Discord channels
- Discord → Website → Free tools → Membership checkout

## Pinned Post / About template
```
Welcome to the MyMI Wallet Discord!

🔗 Website: {{website}}
💬 Discord (you are here) — share the invite: {{discord}}
📊 Free Budget Tool: {{budget_tool}}
✨ Premium features teaser: {{premium}}
📧 Email list/newsletter: {{newsletter}}
```

## Tracking fields for Management Module
- Platform key: discord
- Server invite and vanity URL
- Channel IDs for routing (announcements, alerts, support)
- Role IDs mapped to tiers
- Default webhook destination for distribution queue
- Approval flag before outbound webhooks

## Automation reference
Summaries feed Discord markdown posts and are stored in `bf_social_generated_posts`. Use SocialPostFormatter to add channel mentions and respect the 2,000 character limit before queueing to `bf_social_distribution_queue`.
