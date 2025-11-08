---
title: "Discord No-Links Guide"
slug: "discord-no-links-guide"
status: "active"
audience: ["advanced"]
goals:
  - "Maintain 100% compliance with no-link servers while delivering campaign CTAs via commands."
  - "Generate 800 qualified interactions per month in no-link partner servers."
pillars: ["Financial Wellness 2025","Investing","Crypto"]
primary_cta: "https://www.mymiwallet.com/Register"
secondary_cta: "https://www.mymiwallet.com/Memberships"
discounts:
  new_year_2025: "60% off annual plans"
channels: ["discord","email"]
kpis:
  - name: "No-link interactions"
    target: 800
  - name: "Command-triggered upgrades"
    target: 150
seo:
  primary_keywords: ["discord no link strategy","finance discord compliance","bot commands marketing","no link cta"]
  secondary_keywords: ["discord automation","financial education discord","cta command"]
utm:
  source: "discord-no-links"
  medium: "organic"
  campaign: "discord-no-links-guide"
  content: "command-playbook"
compliance_notes: "Respect server-specific rules, rely on bot commands and DM opt-ins, capture moderator approvals."
doc_version: "1.0"
updated: "2025-09-07"
---

# 1) Positioning & Promise
- One-liner: Deliver value-first education in partner servers without posting links; rely on bot commands and DM opt-ins.
- Personas: Community liaisons, moderators, automation engineers.
- Pain → Promise → Proof: No-link servers restrict URLs; MyMI deploys `/info` command and DM sequences integrated with `app/Libraries/MyMIMarketing.php`; trials saw 92% compliance and 18% upgrade rate from command flows.
- New Year hook: “Use `/info gold` to deliver the 60% offer without breaking server rules; tie prompts to 2025 planning.”

# 2) Feature Source-of-Truth (auto-scrub)
- Modules: `scripts/discord/no-link-bot.js`, `app/Libraries/MyMIMarketing.php`, `app/Modules/Wallet`, `app/Modules/Investments`, `app/Modules/Referrals`, `app/Modules/Memberships`.
- Database: `bf_marketing_scraper` for prompts, `bf_users_memberships` for upgrades, `bf_referrals` for DM codes.
- Pull strings: Commands `/info`, `/plan`, `/cta`, throttle file `discord_no_link_rules.json`, DM templates `discord_dm_no_link`.

# 3) Benefits → Feature Mapping
- Beginner benefits: Value posts, Q&A support, automation to deliver resources privately.
- Advanced benefits: Command analytics, DM segmentation, integration with alerts.
- Proof: 800 monthly interactions target met in August pilot; zero moderation strikes; command logs captured conversions.

# 4) Offers, Pricing & Discounts
- Free: Access to bot commands, value prompts, DM sequences.
- Gold: Additional command triggers unlocking premium channels in Coffee & Stocks, double Coin for command conversions.
- 60% copy: “Prompt: ‘Type `/info gold` for the 60% annual upgrade checklist—delivered privately.’”
- Referral: `/info referral` DM includes referral tracking link.

# 5) SEO Brief
- Keywords: discord no link marketing, bot command CTA, financial education discord compliance.
- Headlines: “No-Link Discord Playbook for MyMI Campaigns,” “Command-Only CTAs that Convert,” “How to Share 60% Gold Offers Without Links.”
- Meta: “Use bot commands, DM opt-ins, and value-first prompts to promote MyMI in no-link Discord servers.”
- FAQ: command usage, DM consent, moderation approvals, CTA tokens, logging.

# 6) Content Blueprints
## Discord Assets
- **Allowed Tactics:** `/info` commands, image uploads with disclaimers, value-first threads, polls, AMA sessions, DM follow-ups after opt-in.
- **Forbidden Tactics:** Posting direct URLs, unsolicited DMs, cross-posting invites without admin approval, guaranteeing returns.
- **No-link Alternates:** Use `/info gold`, `/info budget`, `/info alerts` to DM resources; share CTA as text instructions (“Type `/info gold` to receive the checklist”).
- **Cadence:** Value drop Monday/Wednesday, AMA Friday, weekend recap Sunday; limit to 5 automation triggers per hour.
- **Hashtag/Tag style:** Use channel tags like `#value-drop`, `#budgeting`, `#solana` instead of hashtags.
- **Creative Checklist:** Image with disclaimer, script for command instructions, DM template with `{{CTA_PRIMARY}}`, compliance note.
- **Welcome Script:** “Thanks for inviting MyMI. We respect your no-link policy. All offers delivered via `/info` commands and consent-based DMs.”

## Email
- Welcome: Outline no-link strategy, CTA `{{CTA_PRIMARY}}` for command cheat sheet.
- Deep Dive: Provide analytics and DM segmentation approach, CTA `{{CTA_SECONDARY}}`.
- Case Study: Share partner server success and upgrade metrics.

## Blog
- Outline: Compliance challenge, command solution, DM workflow, results, CTA `{{CTA_PRIMARY}}`.
- Draft: 1,000 words with command screenshots.

## Video
- Shorts: 45s demonstration of `/info gold` command.
- Long-form: 5-minute training for ambassadors on command usage and compliance.
- Slides: 7 slides summarizing rules, commands, metrics.

# 7) Distribution Plan
- Deployment windows: Align with host server schedule; confirm event calendar weekly.
- Quiet hours: Follow host rules; default 11pm-7am ET no automation unless allowed.
- UTM: Commands map to `utm_content=discord-info-gold`, `utm_content=discord-info-budget`, `utm_content=discord-info-referral`.
- Cross-post: Provide weekly summary to host mods via email; update Coffee & Stocks with highlights.

# 8) Dashboard & Automation Hooks
- Buttons: “Generate No-Link Script,” “Sync Command Analytics,” “Send Moderator Report.”
- CRON: `marketing:discord-no-link-report` Mondays 07:30 ET, `marketing:command-sync` hourly.
- Summaries: Dashboard > Marketing > Discord No-Link referencing `bf_marketing_scraper` and command logs.

# 9) Compliance & Disclaimers
- Document mod approvals, store in CRM notes.
- Commands include auto-disclaimer; DM includes unsub link.
- Report any flagged interactions within 24 hours to host admins.

# 10) Success Metrics & Review Cycle
- Owners: Community Partnerships for relationships, Automation Engineer for bot health, Compliance for oversight.
- Checklist: Review command logs, confirm DM consent, test CTA tokens, refresh prompt scripts monthly, update host rules database.
- Iterate: Add analytics dashboard, integrate slash command suggestions, co-host events with partner servers.
