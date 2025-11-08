---
title: "Discord: Coffee & Stocks 24/7"
slug: "discord-coffee-and-stocks"
status: "active"
audience: ["beginner","advanced"]
goals:
  - "Sustain 40% daily active members in Coffee & Stocks by March 2025."
  - "Convert 20% of engaged members into Gold upgrades using Discord workflows."
pillars: ["Financial Wellness 2025","Investing","Crypto"]
primary_cta: "https://www.mymiwallet.com/Register"
secondary_cta: "https://www.mymiwallet.com/Memberships"
discounts:
  new_year_2025: "60% off annual plans"
channels: ["discord","email","in_app"]
kpis:
  - name: "Daily active ratio"
    target: "40%"
  - name: "Discord-driven upgrades"
    target: "20%"
seo:
  primary_keywords: ["Coffee and Stocks Discord","financial wellness community","trade alerts discord","budgeting discord"]
  secondary_keywords: ["no spam finance discord","solana discord","financial education community"]
utm:
  source: "discord"
  medium: "organic"
  campaign: "discord-coffee-and-stocks"
  content: "server-playbook"
compliance_notes: "Moderate financial discussions, enforce no financial advice rule, track disclosure acceptance."
doc_version: "1.0"
updated: "2025-09-07"
---

# 1) Positioning & Promise
- One-liner: 24/7 moderated community for budgeting, investing, Solana swaps, and alert workflows.
- Personas: New budgeting users, advanced traders sharing setups, moderators.
- Pain → Promise → Proof: Members need real-time accountability; Coffee & Stocks pipeline integrates MyMIAlerts, budgets, and Solana streams via Discord bots; logs show 68% of Gold upgrades touched Discord prompts.
- New Year hook: “Join daily accountability rooms, complete the 2025 reset checklist, and lock 60% off Gold via `/gold-upgrade`.”

# 2) Feature Source-of-Truth (auto-scrub)
- Modules: `app/Libraries/MyMIMarketing.php` for Discord automation, `app/Libraries/MyMIAlerts.php` for alert pipelines, `app/Modules/Wallet`, `app/Modules/Investments`, `app/Modules/Exchange`, `scripts/discord`.
- Database: `bf_marketing_scraper` for prompts, `bf_investment_trade_alerts`, `bf_users_memberships` for role gating.
- Pull strings: Discord command handlers `/gold-upgrade`, `/budget-plan`, `/sol-alert`, `discord_throttle_rules`, welcome flow configuration `discord_welcome_workflow.json`.

# 3) Benefits → Feature Mapping
- Beginner benefits: accountability threads, budgeting office hours, curated resource drops.
- Advanced benefits: Alert staging channels, Solana liquidity calls, referral leaderboard.
- Proof: 40% daily active ratio, 15k monthly messages, 94% adherence to quiet hours after automation update.

# 4) Offers, Pricing & Discounts
- Free: Access to general channels, daily prompts, limited alert snapshots.
- Gold: Private channels (#gold-desk, #solana-signals), discount reminders, automation triggers.
- 60% copy: “Use `/gold-upgrade` before Jan 31 to unlock private desks and double Coin rewards.”
- Referral: `/share-referral` command posts unique link; bot tracks completions.

# 5) SEO Brief
- Keywords: financial discord community, Coffee and Stocks server, budgeting accountability discord.
- Headlines: “Join Coffee & Stocks Discord for 2025,” “Daily Prompts + Alerts in Our Discord Hub,” “Unlock Gold Perks in Discord.”
- Meta: “MyMI’s Coffee & Stocks Discord hosts budgeting, investing, and Solana prompts—join for 60% off Gold upgrades.”
- FAQ: join process, quiet hours, allowed content, upgrades, compliance.

# 6) Content Blueprints (auto-generated then human-polished)
## Social Posts (used for cross-promotion)
- **Email teaser:** “Coffee & Stocks is live 24/7—join Discord, follow the daily plan, and secure 60% off Gold with `/gold-upgrade`. {{CTA_PRIMARY}}”
- **In-app banner copy:** “Jump into Coffee & Stocks for New Year accountability. Quiet hours 11pm-6am ET; see pinned prompts.”
- **Push notification (if enabled):** “Daily Coffee & Stocks prompt is live—share your win and grab the 60% Gold code.”

## Discord Assets
- **Welcome Message:** “☕ Welcome to Coffee & Stocks! Grab #start-here to accept rules, meet your accountability pod, then run `/budget-plan` or `/sol-alert` to plug into the automation. Need the 60% Gold upgrade? Use `/gold-upgrade` before Jan 31.”
- **Pin Copy:** “Pinned resources: Daily prompt calendar, quiet hours (11pm-6am ET), disclosure log, referral leaderboard, Gold upgrade FAQ. Commands: `/gold-upgrade`, `/share-referral`, `/daily-checklist`.”
- **Allowed Tactics:** Value-first discussions, screenshot sharing with disclosures, CTA to {{CTA_PRIMARY}} via bot command, comment-first on promo posts, daily gratitude thread.
- **Forbidden Tactics:** Direct DMs with offers, external affiliate links, unverified financial advice, excessive tagging, posting outside quiet hours without mod approval.
- **No-link Alternates:** Use `/send-info` to DM landing pages, share image carousels with CTA instructions in comments, host AMA threads with pinned instructions.
- **Daily Prompt Bank (30):**
  1. “What budget win are you celebrating today?”
  2. “Share your #1 ticker on watch.”
  3. “How did you use MyMI Coin this week?”
  4. “Post your Solana swap goal.”
  5. “Drop a screenshot of your spending categories.”
  6. “What automation saved you time today?”
  7. “Rate your risk level 1-5.”
  8. “What’s one referral outreach you’ll try?”
  9. “Celebrate someone else’s win.”
  10. “What alert triggered overnight?”
  11. “How will you use the 60% discount?”
  12. “List three debts you’re tackling.”
  13. “What’s your Coffee & Stocks ritual?”
  14. “Share a compliance reminder for newcomers.”
  15. “What’s your wallet-to-coin automation target?”
  16. “How are you balancing budgets + crypto?”
  17. “Post your favorite dashboard view.”
  18. “Which module needs a tutorial?”
  19. “How many referrals have you logged?”
  20. “Showcase your MyProjects progress.”
  21. “What KPI are you tracking this week?”
  22. “Share a trade thesis without giving advice.”
  23. “Drop a gif for market mood.”
  24. “What quiet hours habit helps you reset?”
  25. “Who joined because of you?”
  26. “Highlight an underrated template.”
  27. “What’s your weekend plan for finances?”
  28. “Share a compliance tip for alerts.”
  29. “Which channel should we improve?”
  30. “State tomorrow’s top priority.”

## Email
- Welcome: Outline channel structure, commands, quiet hours, CTA `{{CTA_PRIMARY}}`.
- Deep Dive: Feature Gold-only rooms, highlight success stories, CTA `{{CTA_SECONDARY}}`.
- Case Study: Show member upgrade path via Discord prompts.

## Blog
- Outline: Community culture, automation commands, upgrade flows, compliance.
- Draft: 1,000 words with embedded screenshots (use `_assets/discord-dashboard.png`).

## Video
- Shorts: 45s server tour.
- Long-form: 5-minute walkthrough of bots + quiet hours.
- Slides: 8 slides for moderator onboarding.

# 7) Distribution Plan
- Discord cadence: Daily prompts 9am ET, midday alerts recap, evening wins thread; limit promo posts to 6/day.
- Quiet hours: 11pm-6am ET; automation `discord_throttle_rules` enforce silence.
- UTM: `/gold-upgrade` triggers `utm_content=discord-gold`, `/share-referral` logs `utm_content=discord-ref`; email/in-app promos use standard UTMs.
- Cross-post: Summaries posted to email Monday, blog monthly, in-app highlight weekly.

# 8) Dashboard & Automation Hooks
- Buttons: “Push Daily Prompt,” “Sync Discord Roles,” “Audit Quiet Hours.”
- CRON: `marketing:discord-prompts` daily 08:45 ET, `marketing:discord-summary` nightly 21:30 ET.
- Summaries: Management Dashboard > Marketing > Community referencing `bf_marketing_scraper` with `campaign='discord-coffee-and-stocks'`.

# 9) Compliance & Disclaimers
- Force `/accept-rules` onboarding to log compliance acceptance.
- Remind members content is educational; mods remove investment advice statements.
- Document screenshot redaction policy and Data Privacy expectations.

# 10) Success Metrics & Review Cycle
- Owners: Community Lead for engagement, Support for moderation, Marketing Ops for upgrades.
- Checklist: Review daily prompt execution, check quiet hour adherence, verify CTA tokens, refresh prompt bank monthly, audit referral command logs.
- Iterate: Launch voice channel office hours, integrate Stage events, surface AI summarizer for daily recaps.
