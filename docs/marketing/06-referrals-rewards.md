---
title: "Referrals & Rewards"
slug: "referrals-rewards"
status: "active"
audience: ["beginner"]
goals:
  - "Generate 3,000 qualified referral invites during Q1 2025."
  - "Increase referral-to-conversion rate to 18% by March 2025."
pillars: ["Financial Wellness 2025","Investing"]
primary_cta: "https://www.mymiwallet.com/Register"
secondary_cta: "https://www.mymiwallet.com/Memberships"
discounts:
  new_year_2025: "60% off annual plans"
channels: ["facebook","linkedin","x","discord","email","blog","tiktok"]
kpis:
  - name: "Referral invites"
    target: 3000
  - name: "Referral conversions"
    target: "18%"
seo:
  primary_keywords: ["MyMI referral program","financial app rewards","coin bonus","invite friends crypto"]
  secondary_keywords: ["referral automation","financial wellness rewards","crypto cashback"]
utm:
  source: "referral-hub"
  medium: "organic"
  campaign: "referrals-rewards"
  content: "referral-kit"
compliance_notes: "Include eligibility requirements, promotional terms, and cap disclaimers."
doc_version: "1.0"
updated: "2025-09-07"
---

# 1) Positioning & Promise
- One-liner: Turn community sharing into Coin bonuses and membership discounts with automated referral tracking.
- Personas: Current free users, Gold members, community moderators encouraging growth.
- Pain → Promise → Proof: Users need simple tracking; `app/Modules/Referrals` automates invite codes, `bf_referrals` logs status, and dashboards show progress; 2024 pilot delivered 14% conversion and 20% retention lift.
- New Year hook: “Share the 60% Gold deal with friends and bank double Coin rewards before January 31.”

# 2) Feature Source-of-Truth (auto-scrub)
- Modules: `app/Modules/Referrals`, `app/Modules/Memberships`, `app/Modules/Wallet`, `app/Libraries/MyMIMarketing.php` for CTA tokens, `app/Modules/Investments` for reward tie-ins.
- Database: `bf_referrals`, `bf_users_memberships`, `bf_marketing_scraper`.
- Pull strings: `/referrals/dashboard`, `/referrals/share`, reward tiers `coin_bonus_new_year`, automation `referral_webhook_url`.

# 3) Benefits → Feature Mapping
- Beginner benefits: Easy invite sharing, progress tracker, educational content for invites.
- Advanced benefits: Tiered rewards for Gold, automation to share via Discord and email, integration with Projects for group challenges.
- Proof: Referral leaderboard shows top ambassadors; UTMs confirm 1,200 conversions in last campaign.

# 4) Offers, Pricing & Discounts
- Free: Earn 100 Coin per successful referral.
- Gold: Earn 250 Coin + 1 month Gold credit.
- Promotions: 60% annual discount extends to referred user; referrer gets double Coin during New Year window.
- Terms: Cap 20 referrals per user per month; autop-run `marketing:referral-cap` ensures compliance.

# 5) SEO Brief
- Keywords: referral program financial app, invite friends get rewards, MyMI Coin bonus.
- Headlines: “Earn Coin Rewards by Sharing MyMI,” “Referral Program with 60% Gold Bonus,” “How to Track MyMI Referral Progress.”
- Meta: “Invite friends to MyMI, earn Coin bonuses, and unlock 60% off Gold memberships during the New Year promo.”
- FAQ: eligibility, payout timing, how coins convert, referral cap, compliance.

# 6) Content Blueprints
## Social
- **Facebook Short:** “Share MyMI, earn Coin bonuses, and give friends 60% off Gold. {{CTA_PRIMARY}}”
- **Facebook Long (no-link):** “We’re shipping new referral kits—comment ‘COIN’ and we’ll DM the swipe file.”
- **LinkedIn:** “Help teams launch 2025 financial wellness plans—refer MyMI, track rewards in real-time dashboards. {{CTA_PRIMARY}}”
- **X Posts:**
  1. “Referral season! Earn double Coin through Jan 31 when friends lock the 60% Gold promo. {{CTA_PRIMARY}}”
  2. “Thread idea: How referral tracking works (dashboard, rewards, caps). Reply ‘KIT’ for PDF.”
  3. “No-link prompt: Tag a friend who needs a budgeting reset; we’ll DM the invite.”
  4. “Showcase: Community ambassador earned 2,500 Coin in December. Learn how inside Coffee & Stocks.”
- **Discord Welcome:** “Referral HQ! Use `/share-referral` to grab your link, watch the leaderboard, and secure double Coin before the promo ends. {{CTA_PRIMARY}}”
- **Discord Pin:** “Pinned: Reward tiers, quiet hours 11pm-6am ET, automation checklist, compliance statement.”
- **Discord Prompts:** “Who did you invite this week?”, “Share your referral script,” “Celebrate a friend’s win,” etc.

## Email
- Welcome: Introduce referral dashboard, highlight double Coin, CTA `{{CTA_PRIMARY}}`.
- Deep Dive: Share automation options (Discord commands, email templates), CTA `{{CTA_SECONDARY}}`.
- Case Study: Highlight top ambassador metrics, include compliance terms.

## Blog
- Outline: Program overview, reward tiers, automation, compliance, CTA `{{CTA_PRIMARY}}`.
- Draft: 950 words with diagrams of referral funnel, include UTM tracking table.

## Video
- Shorts: 45s scoreboard showcase.
- Long-form: 4-minute tutorial on referral dashboard + automation.
- Slides: 7 slides covering program summary, rewards, compliance.

# 7) Distribution Plan
- Cadence: Facebook weekly, LinkedIn bi-weekly, X daily, Discord prompts daily, Email weekly, TikTok weekly spotlight, blog monthly.
- Quiet hours: Discord 11pm-6am ET.
- UTM matrix: `utm_content=fb-referral`, `utm_content=x-thread-ref`, `utm_content=discord-command`, `utm_content=email-case`.
- Cross-post: Provide shareable Canva templates in `_assets`, comment-first approach for groups.

# 8) Dashboard & Automation Hooks
- Buttons: “Generate Referral Kit,” “Push Leaderboard Update,” “Sync Reward Ledger.”
- CRON: `marketing:referral-reminder` daily 12:00 ET, `marketing:coin-payout` Mondays 09:00 ET.
- Summaries: Management Dashboard > Marketing > Referrals referencing `bf_marketing_scraper` and `bf_referrals`.

# 9) Compliance & Disclaimers
- Terms: Rewards subject to verification; referral must remain active 30 days.
- Disclose value of Coin rewards, tax responsibility, and membership discount availability.
- Provide opt-out instructions for invites and GDPR compliance.

# 10) Success Metrics & Review Cycle
- Owners: Growth Marketing for invites, Community for engagement, Finance for payout reconciliation.
- Checklist: Review leaderboard accuracy, confirm autop-run CRON success, audit CTA tokens, refresh templates.
- Iterate: Launch influencer tier, integrate SMS invites, explore localized copy.
