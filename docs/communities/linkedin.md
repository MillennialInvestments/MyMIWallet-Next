# LinkedIn Communities Hub

## What a community means on LinkedIn
The LinkedIn community spans the Company Page, Showcase pages, and topical posts that drive professionals into Discord and product memberships.

## Assets to create in the LinkedIn UI
- Company Page with custom button to Discord or Website
- Showcase page for Budgeting/Investing content
- Featured post pinned with CTA
- UTM-tagged website links

## Posting cadence
- Company posts: 3 per week
- Articles/Newsletters: 1–2 per month
- Document/carousel posts: 1 per week

## Best performing native content types
- Carousels with concise slides
- Short text posts < 150 words
- Video explainers and screen demos
- Polls for feature prioritization

## Format constraints
- Post text: aim for < 3,000 chars (hard cap ~3,000)
- Hashtags: 3–5 targeted (#FinTech, #Budgeting)
- Links: allowed; prefer 1–2 with UTM
- Mentions: @company/user allowed; keep < 5
- Tickers: $TICKER or plain text both acceptable

## CTA routing
- Post → Company Page → Discord via custom button
- Discord → Website → Free tools → Membership upgrade

## Pinned Post / About template
```
Budget smarter with MyMI Wallet.

🔗 Website: {{website}}
💬 Discord: {{discord}}
📊 Free Budget Tool: {{budget_tool}}
✨ Premium features teaser: {{premium}}
📧 Email list/newsletter: {{newsletter}}
```

## Tracking fields for Management Module
- Platform key: linkedin
- Page URL and Showcase URL
- Custom button target
- Carousel template version
- Default hashtag set and cap
- UTM parameter pattern

## Automation reference
Generate LinkedIn-ready copy with SocialPostFormatter enforcing hashtag caps and short intros. Store as drafts in `bf_social_generated_posts` and track approvals before Buffer/Zapier distribution.
