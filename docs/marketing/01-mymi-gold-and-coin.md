---
title: "MyMI Gold & Coin"
slug: "mymi-gold-and-coin"
status: "active"
audience: ["beginner","advanced"]
goals:
  - "Drive 1,200 free-to-Gold upgrades by 2025-01-31 through bundled wallet and coin perks."
  - "Increase Solana Coin swap participation by 25% month-over-month across Gold cohorts."
pillars: ["Financial Wellness 2025","Investing","Crypto"]
primary_cta: "https://www.mymiwallet.com/Register"
secondary_cta: "https://www.mymiwallet.com/Memberships"
discounts:
  new_year_2025: "60% off annual plans"
channels: ["facebook","linkedin","x","stocktwits","discord","youtube","tiktok","email","blog","in_app"]
kpis:
  - name: "Gold upgrades"
    target: 1200
  - name: "Solana coin swaps"
    target: 500
seo:
  primary_keywords: ["MyMI Gold","financial wellness membership","Solana coin rewards","investment portfolio tracker","crypto budgeting app"]
  secondary_keywords: ["wealth dashboards","tokenized rewards","investment alerts","portfolio automation"]
utm:
  source: "omni-hub"
  medium: "organic"
  campaign: "mymi-gold-and-coin"
  content: "asset-block-01"
compliance_notes: "No performance guarantees; emphasize educational utility and risk awareness for digital assets."
doc_version: "1.0"
updated: "2025-09-07"
---

# 1) Positioning & Promise
- One-liner: Upgrade to MyMI Gold to unlock Solana-backed coin rewards, deeper analytics, and exclusive trade intelligence in one financial wellness hub.
- Who it’s for (personas): Side-hustle investors building diversified portfolios, emerging crypto adopters seeking budgeting discipline, and premium members who want auto-synced alerts.
- Pain → Promise → Proof: Members struggle to connect budgeting, portfolio analytics, and crypto swaps; Gold centralizes wallet, investments, and alerts with Solana liquidity and guided workflows; dashboards pull live data from `app/Modules/Investments/Portfolio` and `app/Modules/Exchange/Solana` to show positions, swaps, and returns with exportable proof.
- New Year 2025 hook (start-fresh framing + 60% off annual): Start 2025 with a reset: claim 60% off annual Gold, sweep holiday spending into smart budgets, and convert bonuses into MyMI Coin rewards ready for Solana swaps.

# 2) Feature Source-of-Truth (auto-scrub)
- Modules/Libs to scan:
  - `app/Libraries/MyMIMarketing.php` for campaign automation triggers and CTA builders.
  - `app/Libraries/MyMIAlerts.php` for premium alert entitlements tied to Gold.
  - `app/Modules/Exchange/Solana` views for swap UX copy, gas fee caps, and staking toggles.
  - `app/Modules/Investments/Portfolio` and `app/Modules/Investments/Watchlist` for Gold-only analytics (benchmark overlays, advanced filters).
  - `app/Modules/Wallet/Budget` and `app/Modules/Wallet/Accounts` for zero-based budgets and linked accounts gating.
  - `app/Modules/Memberships/Controllers/Memberships.php` for plan metadata and pricing tables.
  - `app/Modules/Referrals` for referral bonus accrual logic when Gold members invite peers.
- Database tables to reference:
  - `bf_users_memberships` for plan tiers, renewal cadence, and coupon flags.
  - `bf_marketing_scraper` for prior Solana and Gold keyword summaries.
  - `bf_investment_trade_alerts` to cross-sell alert upgrades.
  - `bf_referrals` for tracking bonus payouts and coin multipliers.
- Pull factual strings: capture `POST /exchange/solana/swap`, Gold wallet limit flags (`gold_wallet_cap`), referral bonus percentages, and membership pricing endpoints from `/memberships/api` for dashboards.

# 3) Benefits → Feature Mapping
- Beginner benefits: Guided onboarding checklists sync budgets, watchlists, and Coin vault; automated savings rules push spare change into MyMI Coin; Gold dashboard shows net worth trendlines with actionable tasks.
- Advanced benefits: Advanced chart overlays (EMA clouds, risk scoring) in `Investments` module, Solana swap depth view with slippage guardrails, and alert bundling for equities + crypto + macro triggers.
- Proof points: 92% of 2024 Gold beta group connected both bank and exchange accounts; average user executed 3.1 Solana swaps per month; watchlist automation reduced manual spreadsheet updates by 8 hours monthly.

# 4) Offers, Pricing & Discounts
- Free tier inclusions: Core budgeting templates, two synced institutions, daily digest email, community Discord access.
- Premium differentiators: Unlimited bank sync, allocation heatmaps, Solana swap discounts, advanced alert packs, and monthly portfolio diagnostics PDF.
- 60% off annual plans copy block: “Kick off 2025 with a fresh balance sheet—lock annual Gold for 60% off before January 31 and double your first month of Coin rewards.”
- Referral incentives: Gold members earn 250 Coin for each referral that stays past 30 days; track progress inside `app/Modules/Referrals/Views/dashboard.php` with referral codes tied to `bf_referrals.status`.

# 5) SEO Brief
- Primary/secondary keywords: MyMI Gold, financial wellness membership, Solana swap perks, investment alerts for beginners, budgeting with crypto, portfolio heatmaps, tokenized rewards, investment education membership.
- 3 headline variants (H1):
  1. “Level Up with MyMI Gold: Financial Wellness Meets Solana Coin Rewards”
  2. “Build 2025 Wealth Plans with MyMI Gold’s Budget + Crypto Toolkit”
  3. “Unlock Solana Swap Power with MyMI Gold Membership Savings”
- Meta description: “Bundle budgeting, portfolio tracking, and Solana Coin rewards with MyMI Gold and save 60% on annual plans for New Year 2025.”
- FAQ:
  1. **What upgrades come with MyMI Gold?** Gold unlocks unlimited sync, advanced analytics, and discounted Solana swaps sourced from `app/Modules/Investments` premium gates.
  2. **How do MyMI Coins work?** Coins accrue from budgeting challenges and referrals; balances sync with `bf_users_memberships` for redemption.
  3. **Is there a trial?** Yes—Gold includes a 14-day trial with instant access to alerts; cancellations revert to free features automatically.
  4. **What crypto assets are supported?** Solana pairs via `Exchange/Solana` plus roadmap tokens from `SolanaModel` config.
  5. **How do I apply the 60% discount?** Use the New Year coupon surfaced in `/memberships` checkout; automations inject the code via Marketing Engine.

# 6) Content Blueprints (auto-generated then human-polished)
## Social Posts (editable blocks)
- **Facebook / LinkedIn Short 1:** “New Year, new net worth. MyMI Gold bundles budgets, Solana swaps, and premium alerts—lock annual plans at 60% off today. {{CTA_PRIMARY}}”
- **Facebook / LinkedIn Short 2:** “Turn spare change into Solana rewards. Upgrade to MyMI Gold and unlock advanced dashboards plus 250 bonus Coin for every referral. {{CTA_PRIMARY}}”
- **Facebook / LinkedIn Long 1:** “🎯 2025 Resolution: manage cashflow, portfolio, and crypto in one view. MyMI Gold connects your bank feeds, watchlists, and Solana swap desk with automated insights. Join the Coffee & Stocks community, share your plan templates, and claim 60% off annual Gold before it expires. {{CTA_PRIMARY}}”
- **Facebook / LinkedIn Long 2 (no-link variant):** “We’re mapping our 2025 financial reset inside MyMI Gold—drop a ‘GOLD’ below and we’ll DM the Solana rewards checklist plus the 60% annual code. Let’s build smarter budgets together.”
- **X Post 1:** “Budget smarter. Swap Solana faster. MyMI Gold kicks off 2025 with 60% off annual + double Coin rewards. Grab your seat → {{CTA_PRIMARY}}”
- **X Post 2:** “Gold perk: unlimited sync + Solana swap depth + alert bundles. Referral bonus? 250 Coin each. Upgrade before the countdown. {{CTA_PRIMARY}}”
- **X Post 3:** “No-link thread idea: 
1️⃣ Clean your 2024 spending
2️⃣ Set Gold auto rules
3️⃣ Swap bonuses into Solana vaults
Comment ‘PLAN’ for the checklist.”
- **X Post 4:** “Case study: Gold traders cut manual tracking by 8 hrs/month with automated watchlists + Solana swaps. Ready to try? {{CTA_PRIMARY}}”
- **Stocktwits Post 1:** “$SOL crew: MyMI Gold now pipes Solana swap data straight into your alert stack. Annual plans are 60% off. {{CTA_PRIMARY}}”
- **Stocktwits Post 2 (no-link alt):** “Gold desk drop: daily Solana liquidity map + risk heatmap screenshot coming to Coffee & Stocks. Follow for tonight’s data dump.”
- **Discord Welcome:** “Welcome to the MyMI Gold vault! Grab #start-here for your Solana swap checklist, connect your accounts, then hit {{CTA_PRIMARY}} to upgrade before the 60% annual promo ends.”
- **Discord Pin:** “Pinned: Gold Hub Resources → budgets, swap desk hours, referral tracker, and Solana research. Use `/gold-upgrade` command during promo windows.”
- **Discord Daily Prompt Bank (rotate via `marketing:discord-prompts`):**
  1. “Share your weekly Solana DCA rule.”
  2. “Post a screenshot of your budget-to-coin automation.”
  3. “How many referrals have you tracked this month?”
  4. “What task did you complete from the Gold onboarding checklist today?”
  5. “Share one watchlist alert you’re monitoring (no advice).”
  6. “Which budget category freed up Coin for swaps this week?”
  7. “How are you using Coffee & Stocks quiet hours?”
  8. “Drop your favorite dashboard widget and why.”
  9. “What’s your Solana swap target for the month?”
  10. “Which referral message earned a response?”
  11. “Celebrate a win from the analytics heatmap.”
  12. “Which automation rule should we feature next?”
  13. “How are you allocating Coin rewards toward goals?”
  14. “What compliance reminder would you give a new member?”
  15. “Share a workflow that saved you time this week.”
  16. “Which KPI are you tracking in the Management dashboard?”
  17. “Post a before/after of your budgeting categories.”
  18. “What’s one insight from today’s alerts digest?”
  19. “Which Solana tutorial should we record next?”
  20. “How are you preparing for market volatility?”
  21. “What integrations are you testing (Zapier, Discord bot, etc.)?”
  22. “How do you explain Gold benefits to a friend?”
  23. “Which Coin milestone are you chasing this quarter?”
  24. “Share a desk setup shot for Coffee & Stocks.”
  25. “What was your favorite prompt this month?”
  26. “How do you balance budgets with crypto exposure?”
  27. “Which module should get a live demo?”
  28. “What question do you have for the Product team?”
  29. “Which referral incentives worked best for you?”
  30. “What’s your ‘fresh start’ focus for next week?”

## Email
- **Welcome:** Outline the 14-day Gold trial, highlight Solana swap discount, include CTA `{{CTA_PRIMARY}}`, and mention referral bonus scoreboard.
- **Feature Deep Dive:** Focus on wallet automations and advanced analytics; embed step-by-step from `app/Modules/Wallet/Views/automation.php`; CTA `{{CTA_PRIMARY}}` and `{{CTA_SECONDARY}}` for plan compare.
- **Case Study:** Share a member story linking budget cleanup to Solana yield; include metrics and screenshot placeholders referencing `resources/marketing/gold-case.png` in `_assets` when available.

## Blog
- Outline: intro → problem (disconnected tools) → Gold solution (modules) → Solana rewards walkthrough → alert automation → referral stacking → compliance wrap.
- Draft (900–1,200 words): Provide structured paragraphs summarizing features, quotes from Coffee & Stocks moderators, and CTA paragraphs pointing to `{{CTA_PRIMARY}}` in concluding sections.

## Video
- **Shorts Script:** 45-second hook “60% off Gold,” highlight 3 screens (budget, Solana swap, alerts), call-to-action `{{CTA_PRIMARY}}` overlay.
- **Long-form Script:** 4-minute tour starting in Dashboard > Wallet > Exchange, referencing UI steps and referral tracker; include compliance statement.
- **Slide Bullets:** 8-slide deck covering overview, budget automation, Solana desk, alerts bundle, referral tracker, pricing snapshot, compliance, CTA.

# 7) Distribution Plan
- Channel cadence: Facebook/LinkedIn 3x weekly (Tue/Thu/Sun), X daily thread + weekend recap, Stocktwits during market open, Discord prompts daily at 9am ET and quiet hours 11pm-6am ET, YouTube weekly, TikTok twice weekly, Email Mondays.
- Quiet hours: Avoid Discord pings 11pm-6am ET per throttle; disable @everyone except launch day.
- UTM table:
  - Facebook: `utm_source=facebook&utm_medium=organic&utm_campaign=mymi-gold-and-coin&utm_content=fb-short-a`
  - LinkedIn: `utm_source=linkedin&utm_medium=organic&utm_campaign=mymi-gold-and-coin&utm_content=li-long-b`
  - Discord (no-link alt uses CTA commands tracked by webhook ID `discord_gold_command`).
- Cross-post variations: Provide image-first carousels for LinkedIn with comment CTA, Discord `/gold-info` command for no-link compliance, X threads with first tweet value drop.

# 8) Dashboard & Automation Hooks
- Buttons: Marketing dashboard uses “Generate Gold Kit,” “Preview Landing,” and “Share to Discord” endpoints hitting `MarketingController::generateGoldCampaign`.
- CRON windows: `cronFetchAndGenerateNews` at 05:00 ET for Solana headlines, `marketing:discord-prompts` at 08:45 ET, `marketing:utm-audit` at 21:00 ET.
- Summaries live in `Management > Marketing > Campaigns` with dataset `bf_marketing_scraper.campaign='mymi-gold-and-coin'`.

# 9) Compliance & Disclaimers
- Always state MyMI does not provide financial advice; encourage users to consult professionals.
- Note crypto volatility and potential for capital loss; highlight that Solana rewards are promotional and subject to network fees.
- Provide risk statement footer for all assets and UTMs.

# 10) Success Metrics & Review Cycle
- KPI owners: Growth Lead monitors upgrades via `bf_users_memberships`, Product Ops tracks swap volume, Community Lead monitors referral completions.
- Weekly checklist: review dashboard conversions, check Discord prompt engagement, validate CTA links via `marketing:link-check` task, refresh testimonials.
- Iterate next: test additional Solana tutorials, expand automation video library, survey Gold members about analytics depth.
