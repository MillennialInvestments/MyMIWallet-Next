# Facebook Communities Hub

## What a community means on Facebook
Communities live across the Page, Groups, and Events. Page posts funnel members into the primary Group and onward to Discord and memberships.

## Assets to create in the Facebook UI
- Brand Page with completed About section
- Primary Group linked to the Page
- Event templates for live streams
- Pinned Feature post with Discord and website links

## Posting cadence
- Page posts: 3 per week
- Group posts: 3 per week (mix of polls and value drops)
- Live/Events: 1 per week

## Best performing native content types
- Reels for quick hooks
- Link posts for long-form resources
- Polls inside the Group
- Carousel/image tips

## Format constraints
- Page post text: effective under 2200 chars
- Hashtags: 2–5 relevant; avoid over-tagging
- Links: allowed; use 1–2 max per post
- Mentions: Pages/Groups allowed sparingly
- Tickers: plain text (AAPL) or $TICKER in copy

## CTA routing
- Page post → Linked Group → Discord invite
- Group → Discord → Website → Free tools → Membership

## Pinned Post / About template
```
MyMI Wallet on Facebook

🔗 Website: {{website}}
💬 Discord: {{discord}}
📊 Free Budget Tool: {{budget_tool}}
✨ Premium features teaser: {{premium}}
📧 Email list/newsletter: {{newsletter}}
```

## Tracking fields for Management Module
- Platform key: facebook
- Page URL and Group URL
- Event template link
- Default hashtag set and max count
- Reel vs post cadence plan
- Pinned post template version

## Automation reference
Use scraper summaries → keywords → SocialPostFormatter for Facebook constraints. Store generated Page and Group variants separately in `bf_social_generated_posts` with status draft pending approval.
