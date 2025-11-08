---
title: "X (Twitter) Guide"
slug: "x-twitter-guide"
status: "active"
audience: ["beginner","advanced"]
goals:
  - "Achieve 5% average engagement rate on X posts by February 2025."
  - "Drive 1,000 Gold conversions attributed to X threads and DMs."
pillars: ["Investing","Crypto","Financial Wellness 2025"]
primary_cta: "https://www.mymiwallet.com/Register"
secondary_cta: "https://www.mymiwallet.com/Memberships"
discounts:
  new_year_2025: "60% off annual plans"
channels: ["x","email","blog","discord"]
kpis:
  - name: "X engagement rate"
    target: "5%"
  - name: "X-attributed conversions"
    target: 1000
seo:
  primary_keywords: ["Twitter finance strategy","X thread playbook","ticker tagging rules","financial wellness twitter"]
  secondary_keywords: ["twitter no link variant","comment first twitter","trade alert threads"]
utm:
  source: "x"
  medium: "organic"
  campaign: "x-twitter-guide"
  content: "x-thread-playbook"
compliance_notes: "Follow platform rules, disclose partnerships, avoid guaranteeing returns, include #ad where necessary."
doc_version: "1.0"
updated: "2025-09-07"
---

# 1) Positioning & Promise
- One-liner: Deliver high-signal threads, alerts, and budgeting prompts on X with ticker tagging and CTA tokens.
- Personas: Social strategists, analysts, moderators.
- Pain → Promise → Proof: Feeds crowded with noise; MyMI uses structured threads with `Step 1-3` formatting, integrates CTA tokens, and routes DMs via `app/Libraries/MyMIMarketing.php`; Q3 2024 delivered 900 conversions from DM automations.
- New Year hook: “Launch #FinancialWellness2025 threads, share checklists, and DM the 60% Gold code to engaged followers.”

# 2) Feature Source-of-Truth (auto-scrub)
- Modules: `app/Libraries/MyMIMarketing.php`, `app/Libraries/MyMIAlerts.php`, `resources/social/x`, `app/Modules/Investments`, `app/Modules/Wallet`, `app/Modules/Exchange`.
- Database: `bf_marketing_scraper` for X copy, `bf_investment_trade_alerts` for ticker data, `bf_users_memberships` for attribution.
- Pull strings: Thread templates `x_thread_financial_reset`, DM script `x_dm_new_year`, ticker list `bf_investment_tickers`.

# 3) Benefits → Feature Mapping
- Beginner benefits: Budgeting threads, daily prompts, educational visuals.
- Advanced benefits: Alert recaps, Solana liquidity updates, ticker tagging with compliance disclaimers.
- Proof: 5.4% average engagement on pilot, 3,200 new followers, 70% DM reply rate.

# 4) Offers, Pricing & Discounts
- Free: Thread templates, DM scripts, CTA tokens.
- Gold: Access to deeper analytics shared via DM, discount codes, Coffee & Stocks invites.
- 60% copy: “Thread CTA: ‘Reply GOLD for the 60% annual upgrade checklist—delivered via DM.’”
- Referral: DM includes referral code from `bf_referrals`.

# 5) SEO Brief
- Keywords: X finance strategy, ticker tagging, financial wellness threads.
- Headlines: “X Thread Playbook for Financial Wellness 2025,” “Ticker Tagging Rules for MyMI Campaigns,” “How to DM the 60% Gold CTA on X.”
- Meta: “Use structured threads, ticker tagging, and DM automations to convert X audiences into MyMI Gold upgrades.”
- FAQ: posting cadence, ticker tagging rules, DM compliance, CTA tokens, analytics.

# 6) Content Blueprints
## Social Assets
- **Allowed Tactics:** Thread sequences, ticker tagging with `$` symbol, native video, polls, DM automations, reply prompts, `{{CTA_PRIMARY}}` tokens in final tweets.
- **Forbidden Tactics:** Over-tagging tickers (>5 per tweet), direct link spam, claims of guaranteed gains, using trending topics unrelated to finance.
- **No-link Variants:** Provide instructions (“Reply GOLD for the plan”), use carousels, quote tweets linking to Discord command instead of URL, rely on `{{CTA_PRIMARY}}` DM follow-up.
- **Cadence:** Daily thread at 8am ET, midday single tweet, evening recap; weekend educational thread.
- **Hashtag Sets:** `#FinancialWellness2025`, `#MyMIGold`, `#Budgeting`, `#Solana`, `#TradeAlerts`.
- **Ticker Tagging Rules:** Use `$` ticker for equities/ETFs (max 3 per tweet); mention `#SOL` for Solana; include risk disclaimer if discussing trade alerts.
- **Disclosure Snippets:** “Disclosure: Educational content only. No financial advice.”; “Partner highlight uses MyMI dashboards.”
- **Creative Checklist:** Thread headline, supporting images, CTA tweet, DM workflow, compliance screenshot.

## Email
- Welcome: Explain X strategy, CTA `{{CTA_PRIMARY}}` for thread templates.
- Deep Dive: Share analytics dashboards and DM automation steps, CTA `{{CTA_SECONDARY}}`.
- Case Study: Highlight top-performing thread metrics.

## Blog
- Outline: X algorithm trends, thread structure, DM automation, compliance, CTA `{{CTA_PRIMARY}}`.
- Draft: 1,050 words with tweet embeds.

## Video
- Shorts: 45s showing thread creation.
- Long-form: 5-minute breakdown of thread analytics and DM flows.
- Slides: 9 slides for internal training.

# 7) Distribution Plan
- Posting windows: 8am ET (thread), 12pm ET (single), 5pm ET (recap). Monitor news cycles for reactive posts.
- Quiet hours: Limit posts after 10pm ET; schedule weekend posts at 10am ET.
- UTM matrix: Threads `utm_content=x-thread`, DMs `utm_content=x-dm`, Polls `utm_content=x-poll`, Discord invites `utm_content=x-discord`.
- Cross-post: Convert threads to LinkedIn carousels, blog recaps, Discord prompts.

# 8) Dashboard & Automation Hooks
- Buttons: “Generate X Thread,” “Send DM Sequence,” “Sync Ticker Tags.”
- CRON: `marketing:x-thread-scheduler` hourly check, `marketing:x-dm-sync` 30 min.
- Summaries: Dashboard > Marketing > X referencing `bf_marketing_scraper` and DM logs.

# 9) Compliance & Disclaimers
- Include disclaimers in threads; pin compliance tweet weekly.
- Log DM consent and provide opt-out commands.
- Disclose affiliate relationships or paid promotions with #ad when required.

# 10) Success Metrics & Review Cycle
- Owners: Social Lead for threads, Analyst for metrics, Compliance for review.
- Checklist: Audit ticker usage, review DM scripts, confirm CTA tokens, refresh creative weekly, monitor sentiment.
- Iterate: Test Spaces sessions, integrate thread summaries into newsletters, experiment with collaborative threads.
