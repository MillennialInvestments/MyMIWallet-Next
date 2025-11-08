---
title: "MyMIAlerts Premium"
slug: "mymialerts-premium"
status: "active"
audience: ["advanced"]
goals:
  - "Grow premium alert subscriptions by 35% before March 2025."
  - "Achieve 80% alert engagement (opens/clicks) for new subscribers within 14 days."
pillars: ["Investing","Crypto"]
primary_cta: "https://www.mymiwallet.com/Register"
secondary_cta: "https://www.mymiwallet.com/Memberships"
discounts:
  new_year_2025: "60% off annual plans"
channels: ["x","stocktwits","discord","email","blog","in_app","youtube"]
kpis:
  - name: "Premium alert subs"
    target: 1500
  - name: "Alert engagement"
    target: "80%"
seo:
  primary_keywords: ["premium trade alerts","automated market alerts","MyMIAlerts","portfolio signal automation"]
  secondary_keywords: ["alert playbooks","discord trading alerts","zapier finance automation"]
utm:
  source: "alerts-hub"
  medium: "organic"
  campaign: "mymialerts-premium"
  content: "alerts-upgrade"
compliance_notes: "Avoid predictive language; reinforce alert data sources and manual confirmation steps."
doc_version: "1.0"
updated: "2025-09-07"
---

# 1) Positioning & Promise
- One-liner: Receive curated trade alerts across equities, crypto, and macro with automated routing to Discord, email, and Zapier.
- Personas: Swing traders, advanced investors, automation enthusiasts connecting workflows.
- Pain → Promise → Proof: Traders juggle email alerts and manual triggers; MyMIAlerts centralizes ingestion, scoring, and delivery; `app/Libraries/MyMIAlerts.php` processes email parsers and pushes to Discord; case study shows 20% faster reaction time to macro shifts.
- New Year hook: “Kick off 2025 by wiring smarter alerts—bundle MyMIAlerts Premium with 60% off Gold and automate every signal in one dashboard.”

# 2) Feature Source-of-Truth (auto-scrub)
- Modules: `app/Libraries/MyMIAlerts.php`, `app/Modules/Investments/Alerts`, `app/Modules/Exchange/Solana` for crypto tie-ins, `app/Modules/Wallet/Budget` for cash management prompts, `app/Modules/Projects` for alert-to-project workflows, `app/Libraries/MyMIMarketing.php` for distribution toggles.
- Database: `bf_investment_trade_alerts` (fields: `symbol`, `type`, `confidence`), `bf_marketing_scraper` for messaging, `bf_users_memberships` for entitlement flags, `bf_referrals` for referral-based alert upgrades.
- Pull strings: `/alerts/subscribe`, `/alerts/settings`, automation toggles `discord_webhook_id`, `zapier_trigger_url`, engagement metrics endpoints.

# 3) Benefits → Feature Mapping
- Beginner-adjacent benefits: Pre-built alert bundles (growth, income, crypto), step-by-step onboarding, compliance reminders.
- Advanced benefits: Custom parser rules, multi-channel distribution, dynamic throttling, integration with Projects to log trades.
- Proof: 94% uptime on CRON `processAllTradeAlerts`, 15-minute average ingestion, 2.3k actions triggered via Zapier connectors in August 2024.

# 4) Offers, Pricing & Discounts
- Free: Daily summary alert, limited Discord channel access, 24-hour delay on premium plays.
- Premium: Real-time alerts, advanced filters, unlimited webhook destinations, alert history export.
- 60% copy: “Upgrade to Premium Alerts with the New Year 60% annual offer and wire every signal to your favorite channel.”
- Referral: Earn 30 days of Premium for each paying referral; tracked via `bf_referrals.reward_days`.

# 5) SEO Brief
- Keywords: premium trade alerts, Discord trading automation, Zapier finance alerts, multi-channel trade notifications.
- Headlines: “Automate Your Trade Alerts with MyMI Premium,” “Route Every Signal to Discord, Email, Zapier,” “Save 60% on Premium Alerts for 2025.”
- Meta: “MyMIAlerts Premium delivers automated trade signals with Discord, email, and Zapier routing—upgrade with 60% off annual plans.”
- FAQ: coverage universe, alert frequency, integration steps, compliance statements, cancellation policy.

# 6) Content Blueprints
## Social
- **X:**
  1. “Trade smarter with MyMIAlerts Premium—automated routing to Discord, email, Zapier. Annual plans 60% off. {{CTA_PRIMARY}}”
  2. “Alert stack checklist: parse inbox → score → push to Discord. Want the template? Reply ‘ALERT’ for DM.”
  3. “Showcase: Member triggered 15 workflows via Zapier this week. Screenshot in thread. {{CTA_PRIMARY}}”
  4. “No-link variant: Drop your favorite ticker and we’ll share how the alert pipeline scores it.”
- **Stocktwits:**
  - “$SPY traders: Premium Alerts now bundle macro + options + crypto flows. Upgrade while 60% promo lasts. {{CTA_PRIMARY}}”
  - “No-link alt: Posting tonight’s alert heatmap in Discord #coffee-and-stocks. Join us.”
- **Discord Welcome:** “You’re in the Premium Alerts war room. Visit #alert-inbox for real-time feeds, review pinned automation rules, and upgrade via {{CTA_PRIMARY}} if you haven’t unlocked instant delivery.”
- **Discord Pin:** “Pinned: CRON windows, webhook IDs, compliance reminders, quiet hours 10pm-6am ET, automation template library.”
- **Discord Prompts (sample 5):** “Share your alert-to-action workflow,” “Rate today’s signal accuracy,” “Post your zap screenshot,” “What’s your max alerts per day?”, “Which macro feed should we ingest next?”

## Email
- Welcome: Explain alert categories, onboarding steps, CTA `{{CTA_PRIMARY}}`.
- Deep Dive: Focus on automation settings with screenshots referencing `_assets/alerts-routing.png`, CTA `{{CTA_SECONDARY}}`.
- Case Study: Use actual metrics (reaction time, conversion), include compliance note.

## Blog
- Outline: Problem, ingestion engine, distribution options, case study, compliance, CTA `{{CTA_PRIMARY}}`.
- Draft: 1,000 words with callouts for Discord commands, Zapier mapping table, sample FAQ.

## Video
- Shorts: 45s pipeline animation.
- Long-form: 5-minute walkthrough of `processAllTradeAlerts` -> Discord -> Projects logging.
- Slides: 9 slides covering categories, automation, metrics, compliance.

# 7) Distribution Plan
- Cadence: X daily, Stocktwits midday, Discord real-time (limit to 8 promo posts/day), Email Thursdays, Blog monthly, In-app banners on login.
- Quiet hours: 10pm-6am ET for Discord pings; queue emails 9am ET.
- UTM matrix: `utm_content=x-thread-a`, `utm_content=discord-pin`, `utm_content=email-case` etc; feed to Zapier for tracking.
- Cross-post: Provide screenshot carousels for LinkedIn (if repurposed), comment-first approach for no-link groups, create audio snippet for YouTube Shorts.

# 8) Dashboard & Automation Hooks
- Buttons: “Generate Alert Recap,” “Sync Zapier Recipes,” “Send Compliance Notice.”
- CRON: `processAllTradeAlerts` every 15 minutes, `marketing:alerts-digest` nightly 22:00 ET, `marketing:utm-audit` daily.
- Summaries: Stored under Campaign in Management Dashboard referencing `bf_marketing_scraper` entries.

# 9) Compliance & Disclaimers
- Alerts are educational signals; not individualized investment advice.
- Encourage manual review before executing trades; highlight data source timestamps.
- Provide disclaimers about options risk, crypto volatility, and data delays.

# 10) Success Metrics & Review Cycle
- Owners: Alerts PM monitors subscriptions, Automation Engineer ensures pipeline uptime, Compliance Manager reviews copy weekly.
- Checklist: Validate webhook IDs, monitor open/click rates, review Discord feedback, update FAQs, confirm CTA tokens.
- Iterate: Launch sector-specific alert bundles, expand to SMS fallback, integrate AI summarization for alerts.
