---
title: "MyProjects Real Estate Tokenization"
slug: "myprojects-real-estate"
status: "draft"
audience: ["advanced"]
goals:
  - "Recruit 500 waitlist signups for real estate token projects by April 2025."
  - "Secure 5 pilot property partners for tokenization workflows."
pillars: ["Investing","Financial Wellness 2025"]
primary_cta: "https://www.mymiwallet.com/Register"
secondary_cta: "https://www.mymiwallet.com/Memberships"
discounts:
  new_year_2025: "60% off annual plans"
channels: ["linkedin","x","discord","email","blog","youtube"]
kpis:
  - name: "Waitlist signups"
    target: 500
  - name: "Property partners"
    target: 5
seo:
  primary_keywords: ["real estate tokenization","fractional property investing","MyMI Projects","real estate dashboards"]
  secondary_keywords: ["tokenized assets","real estate workflow automation","investment project management"]
utm:
  source: "projects-hub"
  medium: "organic"
  campaign: "myprojects-real-estate"
  content: "tokenization-preview"
compliance_notes: "Highlight accreditation requirements and regulatory review; avoid implying investment guarantees."
doc_version: "1.0"
updated: "2025-09-07"
---

# 1) Positioning & Promise
- One-liner: Manage tokenized real estate projects end-to-end with MyProjects workflows tied to wallet, alerts, and compliance dashboards.
- Personas: Advanced investors, syndicators, compliance teams, potential property partners.
- Pain → Promise → Proof: Tokenization projects need structured tasks; `app/Modules/Projects` integrates portfolio metrics, compliance checklists, and referral workflows; pilot data shows 40% faster onboarding vs spreadsheets.
- New Year hook: “Join the 2025 tokenization pilot—secure 60% off Gold and reserve your slot for real estate projects.”

# 2) Feature Source-of-Truth (auto-scrub)
- Modules: `app/Modules/Projects`, `app/Modules/Investments`, `app/Modules/Wallet`, `app/Libraries/MyMIMarketing.php`, `app/Modules/Referrals`, `app/Modules/Memberships` for access.
- Database: `bf_projects` tables (tasks, statuses), `bf_users_memberships`, `bf_marketing_scraper` for tokenization terms.
- Pull strings: `/projects/dashboard`, `/projects/create`, workflow templates `real_estate_due_diligence`, compliance flag `requires_accredited_investor`, API endpoints for property data ingestion.

# 3) Benefits → Feature Mapping
- Beginner? (advanced) benefits: Structured onboarding, compliance reminders, connect to Wallet for cash tracking.
- Advanced benefits: Token issuance logging, investor communication modules, integration with alerts for market signals.
- Proof: Beta teams processed 3 pilot properties with real-time dashboards; compliance modules triggered 100% KYC completion.

# 4) Offers, Pricing & Discounts
- Free: Access to project previews, educational content.
- Gold: Full workflow templates, investor portal integration, referral perks.
- Enterprise: Custom branding, API integration, dedicated account team.
- 60% copy: “Reserve your Gold seat with 60% off annual plans while pilots run—unlock tokenization templates instantly.”
- Referral: Partners earn revenue share tracked via `bf_referrals.partner_pct`.

# 5) SEO Brief
- Keywords: real estate tokenization software, fractional property management, MyMI Projects token workflow.
- Headlines: “Tokenize Real Estate with MyProjects,” “Build 2025 Property Syndicates on MyMI,” “From Due Diligence to Distribution in One Dashboard.”
- Meta: “Join the MyProjects tokenization pilot to manage real estate workflows, compliance, and investor communications with 60% off Gold.”
- FAQ: accreditation, supported jurisdictions, workflow templates, compliance review, pricing.

# 6) Content Blueprints
## Social
- **LinkedIn Short:** “Pilot alert: MyProjects is opening real estate tokenization workflows to 5 partners. Reserve your slot. {{CTA_SECONDARY}}”
- **LinkedIn Long:** “Tokenization teams need structured tasks, KYC workflows, and investor dashboards. MyProjects unifies due diligence, wallet funding, and distribution. Join the 2025 pilot and lock the New Year 60% promo. {{CTA_PRIMARY}}”
- **X Posts:**
  1. “Real estate tokenization pilot opens Jan 10. Workflow templates, compliance gates, investor comms in one stack. {{CTA_PRIMARY}}”
  2. “Thread: 4 stages of the MyProjects tokenization pipeline (sourcing → diligence → issuance → reporting). Reply ‘TOKEN’ for deck.”
  3. “No-link variant: DM ‘PILOT’ for the compliance checklist.”
  4. “Highlight: Wallet integration tracks distributions automatically.”
- **Discord Welcome:** “Tokenization lab! Review pinned due diligence template, run `/project-intake` to submit property data, and use {{CTA_PRIMARY}} to upgrade for full workflows.”
- **Discord Pin:** “Pinned: Pilot calendar, compliance checklist, quiet hours 10pm-6am ET, investor communication scripts.”
- **Discord Prompts:** “Share your biggest hurdle,” “Which jurisdiction are you targeting?”, etc.

## Email
- Welcome: Invite to pilot waitlist, outline requirements, CTA `{{CTA_SECONDARY}}` for partner form.
- Deep Dive: Walk through workflow templates, include diagrams referencing `_assets/token-workflow.png`.
- Case Study: Use internal pilot metrics, highlight compliance success.

## Blog
- Outline: Tokenization landscape, MyProjects solution, pilot details, compliance, CTA `{{CTA_PRIMARY}}`.
- Draft: 1,050 words including regulatory callouts, integration notes.

## Video
- Shorts: 45s pilot invitation.
- Long-form: 5-minute workflow walkthrough.
- Slides: 10 slides for investor/partner presentations.

# 7) Distribution Plan
- Cadence: LinkedIn weekly, X 3x weekly, Discord updates bi-weekly, Email monthly, Blog quarterly, YouTube monthly.
- Quiet hours: Discord 10pm-6am ET; schedule LinkedIn Tuesday mornings.
- UTM: `utm_content=li-pilot`, `utm_content=x-thread-token`, `utm_content=email-waitlist`, `utm_content=discord-intake`.
- Cross-post: Provide PDF deck for no-link groups; use comment-first approach; create gated doc for partners via `projects_waitlist` form.

# 8) Dashboard & Automation Hooks
- Buttons: “Generate Pilot Deck,” “Send Compliance Checklist,” “Push Partner Intake.”
- CRON: `marketing:projects-digest` Wednesdays 08:00 ET, `marketing:pilot-followup` Fridays 16:00 ET.
- Summaries: Management Dashboard > Marketing > Projects referencing `bf_marketing_scraper` and `bf_projects`.

# 9) Compliance & Disclaimers
- Emphasize offerings pending regulatory approval; MyMI not a broker-dealer.
- Outline accreditation requirements, geographic restrictions, and risk disclaimers.
- Provide process for verifying property data and investor eligibility.

# 10) Success Metrics & Review Cycle
- Owners: Projects PM for workflow adoption, Partnerships Lead for pilot recruitment, Compliance for regulatory oversight.
- Checklist: Monitor waitlist growth, ensure forms capture required info, review CTA tokens, update compliance statements.
- Iterate: Add video tutorials, integrate DocuSign API, refine investor reporting modules.
