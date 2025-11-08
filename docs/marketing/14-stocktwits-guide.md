---
title: "Stocktwits Guide"
slug: "stocktwits-guide"
status: "active"
audience: ["advanced"]
goals:
  - "Maintain 6% average engagement per post on Stocktwits."
  - "Generate 600 premium alert upgrades attributable to Stocktwits workflows by March 2025."
pillars: ["Investing","Crypto"]
primary_cta: "https://www.mymiwallet.com/Register"
secondary_cta: "https://www.mymiwallet.com/Memberships"
discounts:
  new_year_2025: "60% off annual plans"
channels: ["stocktwits","email","discord","blog"]
kpis:
  - name: "Stocktwits engagement"
    target: "6%"
  - name: "Stocktwits conversions"
    target: 600
seo:
  primary_keywords: ["stocktwits strategy","trade alert posts","ticker tagging stocktwits","financial wellness stocktwits"]
  secondary_keywords: ["stocktwits threads","crypto stocktwits","solana stocktwits"]
utm:
  source: "stocktwits"
  medium: "organic"
  campaign: "stocktwits-guide"
  content: "stocktwits-playbook"
compliance_notes: "Follow Stocktwits house rules, include risk disclaimers, avoid pump language."
doc_version: "1.0"
updated: "2025-09-07"
---

# 1) Positioning & Promise
- One-liner: Share actionable market snapshots and alert recaps for the Stocktwits trader community.
- Personas: Alert analysts, social strategists, moderators.
- Pain → Promise → Proof: Stocktwits demands concise, ticker-rich updates; MyMI uses templated posts referencing `app/Libraries/MyMIAlerts.php` outputs and drives DM/Discord follow-ups; 2024 campaigns produced 520 upgrades via Stocktwits.
- New Year hook: “Drop morning alert grids, highlight 60% Gold upgrades, and invite traders to Coffee & Stocks without breaking rules.”

# 2) Feature Source-of-Truth (auto-scrub)
- Modules: `app/Libraries/MyMIAlerts.php`, `app/Libraries/MyMIMarketing.php`, `resources/social/stocktwits`, `app/Modules/Exchange`, `app/Modules/Investments`.
- Database: `bf_marketing_scraper`, `bf_investment_trade_alerts`, `bf_users_memberships`.
- Pull strings: Templates `stocktwits_alert_grid`, DM script `stocktwits_dm_new_year`, ticker mapping `bf_investment_tickers`.

# 3) Benefits → Feature Mapping
- Beginner? (advanced) benefits: Quick-market context, educational disclaimers, link to budgeting resources via Discord.
- Advanced benefits: Alert detail, Solana swap callouts, integration with DM and Discord.
- Proof: 6.2% engagement average, 40% of conversions joined Discord, 95% compliance rating.

# 4) Offers, Pricing & Discounts
- Free: Alert snapshot posts, DM scripts, Discord invite commands.
- Gold: Real-time alert feed, Solana liquidity snapshots, premium Discord rooms.
- 60% copy: “Post CTA: ‘Want full alert access + 60% off Gold? Comment GOLD and we’ll DM the checklist.’”
- Referral: DM includes referral code.

# 5) SEO Brief
- Keywords: Stocktwits alert strategy, trade alerts Stocktwits, financial wellness Stocktwits.
- Headlines: “Stocktwits Playbook for MyMI Alerts,” “How to Share 60% Gold Offer on Stocktwits,” “Ticker-Rich Posts with Compliance.”
- Meta: “Use alert grids, ticker tagging, and DM follow-ups to convert Stocktwits traders into MyMI Gold members.”
- FAQ: posting cadence, ticker tagging, DM automation, compliance, CTA tokens.

# 6) Content Blueprints
## Stocktwits Assets
- **Allowed Tactics:** Morning posts with 3-4 tickers, chart snapshots, `{{CTA_PRIMARY}}` in comment follow-up, polls, recap threads.
- **Forbidden Tactics:** Pump/dump language, more than 5 tickers per post, linking to external offers directly, trading guarantees.
- **No-link Variants:** Ask followers to comment `GOLD`, use DM follow-up with `{{CTA_PRIMARY}}`, invite to Discord via `{{CTA_SECONDARY}}` command, share screenshot with instructions.
- **Ticker Tagging Rules:** Prefix equities with `$`, keep to 3 tickers; mention `#SOL` for Solana, `#Crypto` as needed.
- **Disclosure Snippet:** “Educational only. No financial advice. Past performance ≠ future results.”
- **Cadence:** Pre-market alert grid 8:15am ET, mid-day update 12:30pm ET, close recap 3:45pm ET, weekend macro outlook.
- **Creative Checklist:** Alert grid graphic, callout text, CTA comment, DM script, compliance footer.

## Email
- Welcome: Outline Stocktwits strategy, CTA `{{CTA_PRIMARY}}`.
- Deep Dive: Share analytics and top posts, CTA `{{CTA_SECONDARY}}`.
- Case Study: Trader success story linking Stocktwits to upgrades.

## Blog
- Outline: Stocktwits audience, content structure, DM automation, compliance, CTA `{{CTA_PRIMARY}}`.
- Draft: 1,000 words with post examples.

## Video
- Shorts: 45s screen recording of alert grid creation.
- Long-form: 5-minute tutorial on analytics + DM follow-up.
- Slides: 8 slides for team training.

# 7) Distribution Plan
- Posting windows: Align with market hours; pre-market 8:15, intraday 12:30, close 3:45, weekend 10:00.
- Quiet hours: No posts between 6pm-7am ET except scheduled announcements.
- UTM matrix: Comments `utm_content=stocktwits-comment`, DMs `utm_content=stocktwits-dm`, Discord invites `utm_content=stocktwits-discord`.
- Cross-post: Repurpose posts for X threads, Discord alerts channel, blog recaps.

# 8) Dashboard & Automation Hooks
- Buttons: “Generate Stocktwits Grid,” “Sync DM Responses,” “Push Discord Invite.”
- CRON: `marketing:stocktwits-scheduler` 06:00 ET, `marketing:stocktwits-dm-sync` hourly.
- Summaries: Dashboard > Marketing > Stocktwits referencing `bf_marketing_scraper` and `bf_investment_trade_alerts`.

# 9) Compliance & Disclaimers
- Include disclaimers in each post; store templates in `_assets/stocktwits-disclaimer.txt`.
- Avoid discussing specific entries/exits; focus on education.
- Monitor replies for compliance violations and escalate to mods.

# 10) Success Metrics & Review Cycle
- Owners: Alerts Strategist for content, Community Manager for DMs, Compliance for review.
- Checklist: Audit ticker counts, confirm CTA tokens, review analytics weekly, update alert grid assets, ensure DM follow-ups logged.
- Iterate: Test live chart GIFs, integrate autop-run analytics, host AMAs in Discord referencing Stocktwits posts.
