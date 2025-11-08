---
title: "TikTok Guide"
slug: "tiktok-guide"
status: "active"
audience: ["beginner"]
goals:
  - "Publish 20 TikToks per month with 12% average watch-through rate."
  - "Drive 400 Gold conversions via bio link and DM automation by March 2025."
pillars: ["Financial Wellness 2025","Budgeting","Investing","Crypto"]
primary_cta: "https://www.mymiwallet.com/Register"
secondary_cta: "https://www.mymiwallet.com/Memberships"
discounts:
  new_year_2025: "60% off annual plans"
channels: ["tiktok","email","blog","discord"]
kpis:
  - name: "Watch-through rate"
    target: "12%"
  - name: "TikTok conversions"
    target: 400
seo:
  primary_keywords: ["financial tiktok","budgeting tips tiktok","crypto tiktok","my mi wallet"]
  secondary_keywords: ["money reset","solana tutorial","finance automation"]
utm:
  source: "tiktok"
  medium: "organic"
  campaign: "tiktok-guide"
  content: "tiktok-playbook"
compliance_notes: "Follow TikTok community guidelines, include disclaimer text overlays, avoid unrealistic promises."
doc_version: "1.0"
updated: "2025-09-07"
---

# 1) Positioning & Promise
- One-liner: Create fast, story-driven TikToks showing budgeting resets, alert wins, and Solana workflows with clear CTAs.
- Personas: Short-form creators, community hosts, analysts.
- Pain → Promise → Proof: TikTok audience needs quick wins; MyMI clips combine screen captures with storytelling using `resources/video/tiktok` templates; Q4 2024 produced 360 conversions from Link-in-bio flows.
- New Year hook: “Launch a 2025 ‘Money Reset’ TikTok series with 60% Gold CTA overlays and DM automation.”

# 2) Feature Source-of-Truth (auto-scrub)
- Modules: `app/Modules/Wallet`, `app/Modules/Investments`, `app/Modules/Exchange`, `app/Libraries/MyMIAlerts.php`, `app/Libraries/MyMIMarketing.php`, `resources/video/tiktok`.
- Database: `bf_marketing_scraper` for scripts, `bf_users_memberships` for conversions, `bf_investment_trade_alerts` for ticker highlights.
- Pull strings: Script list `tiktok_hook_bank`, CTA overlay `{{CTA_PRIMARY}}`, DM automation `tiktok_dm_new_year`, Linktree mapping `linktree_gold_60`.

# 3) Benefits → Feature Mapping
- Beginner benefits: Quick budgeting tips, step-by-step overlays, community prompts.
- Advanced benefits: Alert recap micro-stories, Solana swap time-lapse, API teasers.
- Proof: 14% average watch-through on budgeting clips, 72% DM reply rate to “GOLD” keyword, 40% of viewers join Discord.

# 4) Offers, Pricing & Discounts
- Free: Template scripts, overlay pack, DM keyword triggers.
- Gold: Bonus video series, DM checklist, access to Coffee & Stocks challenges.
- 60% copy: “Overlay text: ‘Type GOLD for 60% off MyMI Gold (bio link)’.”
- Referral: DM follow-up includes referral code; track via `utm_content=tiktok-dm`.

# 5) SEO Brief
- Keywords: money reset TikTok, budgeting 2025, crypto swap TikTok.
- Headlines/Hooks: “3 ways to reset your money for 2025,” “Watch me swap Solana in 30 seconds,” “These alerts fired before the market moved.”
- Meta (caption) template: “2025 Money Reset | Budget, invest, swap | Save 60% on Gold → {{CTA_PRIMARY}}.”
- FAQ: posting cadence, sound usage, CTA overlays, DM automation, compliance.

# 6) Content Blueprints
## TikTok Structure
- **Hook Bank (first 2 seconds):** “Stop scrolling if your budget broke in 2024,” “This Solana automation just fired,” “Watch this alert save me before market open.”
- **Format:** Hook → problem → screen recording overlay → CTA.
- **Caption Template:** “Budget reset challenge | Alerts automation | Solana swap | Save 60% → {{CTA_PRIMARY}} #MoneyReset #MyMIGold #BudgetTok #Investing #CryptoTok.”
- **Hashtag Sets:** `#MoneyReset`, `#BudgetTok`, `#Investing`, `#CryptoTok`, `#Solana`, `#FinancialWellness2025`.
- **Allowed Tactics:** Jump cuts, on-screen captions, trending sounds (licensed), DM automation prompts (“Comment GOLD”), in-app Q&A stickers.
- **Forbidden Tactics:** Unlicensed music, financial guarantees, negative competitor callouts, link spamming.
- **No-link Variants:** Use Link-in-bio only; instruct viewers to “Comment GOLD for DM checklist” or “Tap the pinned comment for Discord command instructions.”
- **Creative Checklist:** Script, storyboard, overlay pack, CTA text, disclaimer text, captions file.
- **B-Roll Ideas:** Budget dashboard swipe, Solana swap animation, Coffee & Stocks clip, success DM screenshot (redacted).

## DM Automation
- Keyword triggers: “GOLD”, “BUDGET”, “ALERT”.
- DM script references `{{CTA_PRIMARY}}` and `{{CTA_SECONDARY}}` plus referral token.
- Compliance: DM includes unsubscribe instructions and educational disclaimer.

## Email
- Welcome: Outline TikTok strategy, CTA `{{CTA_PRIMARY}}` for script pack.
- Deep Dive: Analytics snapshot, DM automation tutorial, CTA `{{CTA_SECONDARY}}`.
- Case Study: Show conversions from Money Reset series.

## Blog
- Outline: Short-form storytelling, DM automation, compliance, CTA `{{CTA_PRIMARY}}`.
- Draft: 900 words with embedded TikToks.

## Video (meta)
- Repurpose top TikToks for YouTube Shorts and Instagram Reels.

# 7) Distribution Plan
- Posting cadence: Daily at 7am ET, 12pm ET, and 6pm ET (rotate content types). Post Money Reset series Monday-Thursday, Alert recaps Friday, Community wins weekend.
- Quiet hours: Avoid posts between 10pm-6am ET.
- UTM matrix: Bio link `utm_content=tiktok-bio`, DM automation `utm_content=tiktok-dm`, Discord push `utm_content=tiktok-discord`.
- Cross-post: Share to Instagram Reels and YouTube Shorts, embed in blog roundups, highlight in Discord #shortform.

# 8) Dashboard & Automation Hooks
- Buttons: “Generate TikTok Script,” “Sync DM Keywords,” “Update Linktree.”
- CRON: `marketing:tiktok-analytics` daily 05:30 ET, `marketing:tiktok-dm-sync` hourly.
- Summaries: Dashboard > Marketing > TikTok referencing `bf_marketing_scraper` and DM logs.

# 9) Compliance & Disclaimers
- Overlay text “Educational only, not financial advice.”
- Mention risk verbally when discussing investing/crypto.
- Maintain list of approved sounds; log DM opt-ins.

# 10) Success Metrics & Review Cycle
- Owners: Short-form Lead for production, Growth Analyst for conversions, Compliance for review.
- Checklist: Review analytics, confirm CTA overlays, refresh hook bank weekly, validate DM scripts, check Linktree routing.
- Iterate: Launch live Q&A, experiment with duets featuring community wins, test multi-part series.
