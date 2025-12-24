# X (Twitter) Communities Hub

## What a community means on X
Communities form via the main account, reply threads, and Lists. Short, fast posts feed followers into Discord and the membership funnel.

## Assets to create in the X UI
- Primary account with profile link to Discord/website
- Pinned post with CTA routing
- List of partner/analyst accounts to engage
- Draft thread templates for news and alerts

## Posting cadence
- Timeline posts: 3–5 per day (mix of hooks + charts)
- Threads: 3–4 per week for deep dives
- Spaces: 1 per week synced with Saturday live

## Best performing native content types
- Short hooks with 1–2 tickers
- Threads with 3–6 tweets
- Quote retweets of news and partners
- Spaces announcements with countdown

## Format constraints
- Character limit: 280 per tweet (use intelligent truncation)
- Hashtags: 0–3; prioritize tickers over hashtags
- Links: 1 per tweet max
- Mentions: keep < 3
- Tickers: prefer $TICKER format; auto-convert

## CTA routing
- Tweet/Thread → Profile → Discord invite
- Discord → Website → Free tools → Membership upsell

## Pinned Post / About template
```
Daily market moves + budgeting tips.

🔗 Website: {{website}}
💬 Discord: {{discord}}
📊 Free Budget Tool: {{budget_tool}}
✨ Premium features teaser: {{premium}}
📧 Email list/newsletter: {{newsletter}}
```

## Tracking fields for Management Module
- Platform key: x
- Profile URL and pinned tweet ID
- Thread template library version
- Default hashtag/ticker rules
- Spaces schedule and recording link pattern

## Automation reference
SocialPostFormatter should segment long bodies into thread-ready slices, enforce hashtag caps, and convert tickers to $TICKER before storing drafts in `bf_social_generated_posts`.
