---
title: "Budgeting & Investments Libraries"
slug: "budgeting-and-investments-libraries"
status: "active"
audience: ["beginner"]
goals:
  - "Onboard 2,500 new budgeting library users by 2025-02-15 with guided templates."
  - "Increase watchlist-to-portfolio conversion rate to 35% for new signups within 30 days."
pillars: ["Financial Wellness 2025","Budgeting","Investing"]
primary_cta: "https://www.mymiwallet.com/Register"
secondary_cta: "https://www.mymiwallet.com/Memberships"
discounts:
  new_year_2025: "60% off annual plans"
channels: ["facebook","linkedin","x","discord","youtube","tiktok","email","blog","in_app"]
kpis:
  - name: "Template activations"
    target: 2500
  - name: "Portfolio creations"
    target: 875
seo:
  primary_keywords: ["budgeting templates","investment library","beginner investing plans","financial wellness starter","net worth tracker"]
  secondary_keywords: ["cash flow planning","watchlist builder","investment education","goal-based budgeting"]
utm:
  source: "content-hub"
  medium: "organic"
  campaign: "budgeting-and-investments-libraries"
  content: "template-pack-a"
compliance_notes: "Emphasize educational guidance and avoid prescriptive allocation advice."
doc_version: "1.0"
updated: "2025-09-07"
---

# 1) Positioning & Promise
- One-liner: Launch your 2025 money reset with guided budgeting templates and an investment library that grows with you.
- Who it’s for (personas): Budget beginners, college grads starting first investment accounts, side hustlers organizing multiple income streams.
- Pain → Promise → Proof: Users juggle spreadsheets and separate investing apps; the MyMI budgeting and investments libraries integrate zero-based budgeting, goal trackers, and curated asset research from `app/Modules/Investments/Library` with contextual learning in `app/Modules/Wallet/Templates`; testimonials show 30-day setup success.
- New Year 2025 hook: “Refresh your spending and investing habits—unlock the library, save 60% on annual Gold, and automate your first goals by mid-January.”

# 2) Feature Source-of-Truth (auto-scrub)
- Modules to scan: `app/Modules/Wallet/Templates`, `app/Modules/Wallet/Budget`, `app/Modules/Investments/Library`, `app/Modules/Investments/Watchlist`, `app/Libraries/MyMIMarketing.php` for onboarding flows, `app/Libraries/MyMIAlerts.php` for optional alert prompts.
- Database tables: `bf_marketing_temp_scraper` for budgeting keywords, `bf_users_memberships` for access gating, `bf_investment_tickers` for curated starter portfolios.
- Pull strings: fetch template names (e.g., `zero_base_template`), `GET /wallet/templates/{id}`, watchlist automation toggle `auto_create_portfolio`, and onboarding routes `/wallet/onboarding`.

# 3) Benefits → Feature Mapping
- Beginner benefits: Step-by-step wizard, pre-filled categories, paycheck-to-plan automation, and “first investment” walkthrough linking to watchlist.
- Advanced benefits: Scenario planning spreadsheets export, integration with alerts, ability to tag goals by asset class.
- Proof points: 68% of new users complete budgeting wizard within 48 hours; 42% activate investment library after first checklist; support CSAT 4.7/5 from 2024 pilot.

# 4) Offers, Pricing & Discounts
- Free tier: Access to three budgeting templates, two investment library cards, community Q&A.
- Premium: Unlimited templates, AI insights, integration with MyMIAlerts Pro, Solana swap planning.
- 60% copy: “Reset your finances with a full template vault—annual upgrades are 60% off through New Year 2025.”
- Referral incentives: Invite friends via `app/Modules/Referrals`; earn 100 Coin per activated budgeting checklist.

# 5) SEO Brief
- Keywords: budgeting templates, beginner investing library, net worth tracker, financial wellness course, debt payoff planner.
- Headlines: “Build Your 2025 Budget & Portfolio in One App,” “Starter Investing Library with Guided Budgets,” “MyMI Templates Turn Resolutions into Results.”
- Meta: “Use MyMI’s budgeting and investment libraries to launch your 2025 money plan—templates, checklists, and investing tips in one hub.”
- FAQ:
  1. **How many templates can I access?** Free tier offers three; upgrade for unlimited, per `bf_users_memberships.plan_limits`.
  2. **Do templates sync with bank feeds?** Yes—`Wallet/Accounts` handles connections and updates budgets nightly.
  3. **Can I customize categories?** Drag-and-drop editor stored in `wallet_budget_categories` table.
  4. **What’s inside the investment library?** Research briefs, alert links, and risk notes curated from `app/Modules/Investments/Library`.
  5. **How do referrals work?** Share referral link; automation posts to `bf_referrals` and triggers Coin bonus on completion.

# 6) Content Blueprints (auto-generated then human-polished)
## Social Posts
- **Facebook Short:** “Start 2025 with a budget that sticks. Grab MyMI’s template library and connect your first investing goals. {{CTA_PRIMARY}}”
- **Facebook Long (no-link):** “We’re sharing our 2025 budgeting blueprint in Coffee & Stocks. Comment ‘BUDGET’ and we’ll drop the zero-based template + investment checklist DM.”
- **LinkedIn Short:** “Planning season is here. MyMI templates unite cashflow, goals, and first investments—60% off upgrades for New Year 2025. {{CTA_PRIMARY}}”
- **LinkedIn Long:** “What if your budgeting spreadsheet lived inside your investing dashboard? MyMI’s libraries sync paydays, envelopes, and beginner watchlists. See how teams use it to train new investors and claim the 60% annual promo. {{CTA_PRIMARY}}”
- **X Posts:**
  1. “Budget reset? Use MyMI templates to map cashflow → goals → first investment in under 30 minutes. {{CTA_PRIMARY}}”
  2. “Thread idea: Step 1 categorize 2024 spend, Step 2 auto-allocate to goals, Step 3 unlock beginner library. DM ‘PLAN’ for the PDF.”
  3. “Reminder: annual upgrades 60% off. Templates + alerts bundled for 2025. {{CTA_PRIMARY}}”
  4. “No-link prompt: What’s the first category you’ll automate in January? Reply and we’ll send the checklist.”
- **Discord Welcome:** “New budgeting squad! Grab #template-vault, sync your accounts, then run `/budget-plan` to trigger the onboarding flow. Want the full library? {{CTA_PRIMARY}}”
- **Discord Pin:** “Pinned resources: Template walkthrough, watchlist starter kit, quiet hours 11pm-6am ET, referral tracker for Coin bonuses.”
- **Discord Prompts (sample 5 of 30):** “Share your week-one win,” “Drop a screenshot of your envelope setup,” “What ticker are you researching this month?”, “How are you using Coin rewards?”, “Rate your automation confidence 1-5.”

## Email
- Welcome: Introduce template vault, 3-step onboarding, CTA `{{CTA_PRIMARY}}`.
- Deep Dive: Walkthrough of investment library cards and watchlist automation, CTA `{{CTA_SECONDARY}}` for membership comparison.
- Case Study: Highlight a user who paid off debt and started investing, include metrics (debt reduction 15%), CTA `{{CTA_PRIMARY}}`.

## Blog
- Outline sections: Problem, Template solution, Investment transition, Referral incentives, Compliance.
- Draft: 1,000-word article with subheadings, quotes, bullet checklists, CTA `{{CTA_PRIMARY}}` at start/end.

## Video
- Shorts: 45s demo of template selection + watchlist creation, end slate `{{CTA_PRIMARY}}`.
- Long-form: 5-minute tutorial from `/wallet/onboarding` through `/investments/library`, highlight analytics.
- Slides: 6-10 bullet slides covering setup steps, benefits, metrics, compliance.

# 7) Distribution Plan
- Cadence: Facebook & LinkedIn weekly, X 3x weekly, Discord prompts daily, YouTube bi-weekly, TikTok weekly, Email bi-weekly, in-app modal on Mondays.
- Quiet hours: Discord 11pm-6am ET; schedule email at 10am ET Tuesdays.
- UTM matrix:
  - Facebook: `utm_source=facebook&utm_medium=organic&utm_campaign=budgeting-and-investments-libraries&utm_content=fb-template`
  - LinkedIn: `utm_content=li-guide`
  - Email: `utm_source=email&utm_medium=automation&utm_content=welcome-seq`
  - In-app: tracked via feature flag `budgeting_modal_v1`.
- Cross-post: Provide PDF downloads in LinkedIn comment, Discord `/budget-link` command, X thread pinned with visuals.

# 8) Dashboard & Automation Hooks
- Buttons: “Generate Template Pack,” “Sync Watchlist Tips,” “Publish Discord Prompts.”
- CRON: `marketing:budgeting-roundup` 07:30 ET, `marketing:template-refresh` weekly Sunday 20:00 ET.
- Summaries: Lives under Campaign slug in Management Dashboard with daily TF-IDF refresh from `bf_marketing_scraper`.

# 9) Compliance & Disclaimers
- Clarify templates provide educational guidance; not investment recommendations.
- Encourage users to consult financial advisors for personalized plans.
- For investment library cards include risk disclaimers about market volatility.

# 10) Success Metrics & Review Cycle
- Owners: Growth PM for template activations, Education Lead for library consumption, Community Manager for Discord engagement.
- Weekly review: check onboarding completion, validate CTA tokens via `marketing:link-check`, refresh FAQ.
- Next iterations: add multilingual templates, integrate achievements into `Wallet/Badges`, test AI summaries for budgets.
