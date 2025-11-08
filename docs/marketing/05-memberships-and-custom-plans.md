---
title: "Memberships & Custom Plans"
slug: "memberships-and-custom-plans"
status: "active"
audience: ["beginner","advanced"]
goals:
  - "Increase membership comparison page conversions by 20% before February 2025."
  - "Launch 10 enterprise custom plan pilots with financial partners."
pillars: ["Financial Wellness 2025","Budgeting","Investing"]
primary_cta: "https://www.mymiwallet.com/Register"
secondary_cta: "https://www.mymiwallet.com/Memberships"
discounts:
  new_year_2025: "60% off annual plans"
channels: ["facebook","linkedin","x","discord","email","blog","youtube","in_app"]
kpis:
  - name: "Membership conversions"
    target: 2000
  - name: "Custom plan pilots"
    target: 10
seo:
  primary_keywords: ["MyMI memberships","financial wellness plan","custom fintech pricing","investment membership"]
  secondary_keywords: ["enterprise financial wellness","white-label budgeting","crypto enabled membership"]
utm:
  source: "membership-hub"
  medium: "organic"
  campaign: "memberships-and-custom-plans"
  content: "pricing-overview"
compliance_notes: "Clearly define service scope and avoid implying fiduciary status."
doc_version: "1.0"
updated: "2025-09-07"
---

# 1) Positioning & Promise
- One-liner: Compare Free, Gold, and enterprise custom plans in one hub with transparent pricing and automation perks.
- Personas: New retail users, advanced investors upgrading to Gold, enterprise partners seeking co-branded deployments.
- Pain → Promise → Proof: Users need clarity on plan differentiation; `app/Modules/Memberships` surfaces feature toggles, while `app/Libraries/MyMIMarketing.php` personalizes CTAs; case studies show +28% retention among Gold members.
- New Year hook: “New Year, new plan: lock 60% off annual memberships or design a custom partner plan to launch your 2025 program.”

# 2) Feature Source-of-Truth (auto-scrub)
- Modules: `app/Modules/Memberships/Controllers/Memberships.php`, `app/Modules/Memberships/Views`, `app/Modules/Wallet`, `app/Modules/Investments`, `app/Modules/Projects`, `app/Modules/Referrals`, `app/Libraries/MyMIMarketing.php`.
- Database: `bf_users_memberships` (plan IDs, limits), `bf_marketing_scraper` for messaging, `bf_referrals` for plan-linked incentives.
- Pull strings: `/memberships`, `/memberships/compare`, plan JSON `memberships_plans.json`, custom quote endpoint `/memberships/custom/quote`, feature flags `enable_enterprise_branding`.

# 3) Benefits → Feature Mapping
- Beginner benefits: Transparent comparison table, onboarding wizard recommending plan, community perks.
- Advanced benefits: Advanced analytics, Solana swap discount, dedicated account manager for enterprise.
- Proof: 63% of trial users upgrade to Gold when interacting with compare page; enterprise pilots show 2.5x engagement vs baseline.

# 4) Offers, Pricing & Discounts
- Free: budgeting basics, limited alerts, community.
- Gold: unlimited sync, Solana perks, premium alerts, referral accelerator.
- Custom: dedicated reporting, white-label dashboards, API access from `app/Modules/API`.
- 60% copy: “Secure 60% off annual Gold before January 31 and receive double Coin rewards.”
- Referral: Gold members earn tiered Coin bonuses; enterprise partners access revenue share tracked in `bf_referrals.partner_pct`.

# 5) SEO Brief
- Keywords: MyMI membership pricing, financial wellness platform plans, enterprise budgeting software.
- Headlines: “Choose the Right MyMI Membership for 2025,” “Custom Financial Wellness Plans for Teams,” “Compare Free vs Gold vs Enterprise.”
- Meta: “Review MyMI membership tiers, claim 60% off annual Gold, or request a custom enterprise plan built on the MyMI stack.”
- FAQ: plan differences, payment options, cancellation, enterprise onboarding, compliance boundaries.

# 6) Content Blueprints
## Social
- **Facebook Short:** “Ready to upgrade? Compare MyMI memberships and grab the 60% New Year offer. {{CTA_PRIMARY}}”
- **Facebook Long (no-link):** “We’re breaking down Free vs Gold vs Enterprise in Coffee & Stocks—drop ‘PLAN’ below for the pricing sheet.”
- **LinkedIn Short:** “Financial teams: co-brand MyMI with custom dashboards, API hooks, and compliance workflows. Request a pilot. {{CTA_SECONDARY}}”
- **LinkedIn Long:** “MyMI powers budgeting, investments, crypto, and alerts in one CI4 stack. Explore standard memberships or craft enterprise packages with custom branding, data rooms, and dedicated support. Secure 60% off Gold now. {{CTA_PRIMARY}}”
- **X Posts:**
  1. “Free → Gold → Enterprise. Explore MyMI plans and launch 2025 with automated financial wellness. {{CTA_PRIMARY}}”
  2. “Thread: 3 reasons enterprises bundle MyMI (white-label, alerts, referrals). Reply ‘ENTERPRISE’ for the playbook.”
  3. “60% off annual Gold ends soon—plus 250 Coin per referral. {{CTA_PRIMARY}}”
  4. “No-link variant: What feature decides your upgrade? Comment and we’ll DM the comparison PDF.”
- **Discord Welcome:** “Welcome to #membership-upgrade! Review pinned plan breakdown, run `/plan-match` to get recommendations, and upgrade via {{CTA_PRIMARY}}.”
- **Discord Pin:** “Pinned: Plan comparison table, enterprise request form, quiet hours 11pm-6am ET, referral leaderboard.”
- **Discord Prompts:** “Share why you upgraded,” “What enterprise features do you need?”, etc (30 prompts).

## Email
- Welcome: Outline plan tiers, highlight Gold discount, CTA `{{CTA_PRIMARY}}`.
- Deep Dive: Focus on enterprise customization, include CTA `{{CTA_SECONDARY}}` linking to form.
- Case Study: Feature partner success story (ex: TBI Corp) with metrics, CTA `{{CTA_PRIMARY}}`.

## Blog
- Outline: Member journey, plan comparison, enterprise case study, compliance.
- Draft: 1,100 words, embed comparison table, callouts for CTA tokens.

## Video
- Shorts: 45s overview of membership ladder.
- Long-form: 5-minute breakdown of features by plan using actual UI screens.
- Slides: 10 slide deck for sales demos.

# 7) Distribution Plan
- Cadence: Facebook weekly, LinkedIn 2x weekly, X daily, Discord prompts daily, Email bi-weekly, In-app modals at login, YouTube monthly.
- Quiet hours: Discord 11pm-6am ET; schedule LinkedIn mornings.
- UTM: `utm_content=fb-compare`, `utm_content=li-enterprise`, `utm_content=email-case`, `utm_content=discord-command`.
- Cross-post: Provide comparison PDF for no-link groups, use comment-first method, record audio snippet for LinkedIn doc posts.

# 8) Dashboard & Automation Hooks
- Buttons: “Generate Plan Matrix,” “Send Enterprise Deck,” “Push Referral Update.”
- CRON: `marketing:membership-audit` Mondays 08:00 ET, `marketing:enterprise-followup` daily 17:00 ET.
- Summaries: Management Dashboard > Marketing > Memberships referencing `bf_marketing_scraper`.

# 9) Compliance & Disclaimers
- Clarify MyMI is an educational platform, not a registered advisor.
- Outline data handling terms for enterprise partners, link to privacy docs.
- Note refund policy and terms of service references.

# 10) Success Metrics & Review Cycle
- Owners: Growth PM for conversions, Partnerships Lead for enterprise pilots, Support Lead for plan satisfaction.
- Checklist: Review pricing accuracy, confirm CTA tokens, update referral rewards, audit enterprise deck.
- Iterate: Add pricing calculator, integrate CRM sync, gather testimonials.
