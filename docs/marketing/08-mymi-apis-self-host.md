---
title: "MyMI APIs & Self-Host Toolkit"
slug: "mymi-apis-self-host"
status: "draft"
audience: ["advanced"]
goals:
  - "Convert 100 developers into API sandbox accounts by March 2025."
  - "Close 15 self-host deployment consultations."
pillars: ["Investing","Financial Wellness 2025"]
primary_cta: "https://www.mymiwallet.com/Register"
secondary_cta: "https://www.mymiwallet.com/Memberships"
discounts:
  new_year_2025: "60% off annual plans"
channels: ["linkedin","x","email","blog","youtube","discord"]
kpis:
  - name: "API sandbox signups"
    target: 100
  - name: "Deployment consults"
    target: 15
seo:
  primary_keywords: ["MyMI API","financial wellness API","self-host fintech","CI4 fintech toolkit"]
  secondary_keywords: ["budgeting API","crypto exchange API","alert automation API"]
utm:
  source: "developer-hub"
  medium: "organic"
  campaign: "mymi-apis-self-host"
  content: "api-launch-kit"
compliance_notes: "Document security responsibilities, data governance, and regulatory expectations."
doc_version: "1.0"
updated: "2025-09-07"
---

# 1) Positioning & Promise
- One-liner: Deploy the MyMI stack on your infrastructure with CI4 APIs for budgeting, alerts, exchange, and analytics.
- Personas: Fintech builders, enterprise IT, integration partners.
- Pain → Promise → Proof: Teams need modular APIs; MyMI exposes REST endpoints documented in `/docs/api`, with SDK stubs; internal pilots showed <2 weeks to deploy budgeting + alerts modules.
- New Year hook: “Launch your 2025 financial wellness platform with MyMI APIs—claim 60% off Gold for sandbox access and book a deployment consult.”

# 2) Feature Source-of-Truth (auto-scrub)
- Modules: `app/Modules/API`, `app/Modules/Wallet`, `app/Modules/Investments`, `app/Modules/Exchange`, `app/Libraries/MyMIAlerts.php`, `app/Libraries/MyMIMarketing.php`, `scripts` for deployment helpers.
- Database: `bf_marketing_scraper`, `bf_users_memberships` for API entitlements, `bf_investment_trade_alerts` for alert endpoints.
- Pull strings: `/api/v1/*` routes, auth scopes `api_key`, CLI `spark mymi:deploy`, config flags `SELF_HOST_MODE`.

# 3) Benefits → Feature Mapping
- Beginner (developer) benefits: Sandbox credentials, Postman collections, guided deployment manual.
- Advanced benefits: Self-host CLI scripts, modular feature toggles, webhooks for alerts and swaps, data residency controls.
- Proof: Two partner deployments achieved 99.9% uptime, processed 1.2M API calls monthly; security audit passed OWASP checks.

# 4) Offers, Pricing & Discounts
- Free: Documentation access, limited API calls.
- Gold: Full API suite, priority support, access to deployment scripts.
- Enterprise: SLA-backed hosting assistance, white-label support.
- 60% copy: “Secure 60% off Gold to unlock full API sandbox access through Q1 2025.”
- Referral: Partners earn consulting credit when referring other developers; tracked via `bf_referrals.partner_pct`.

# 5) SEO Brief
- Keywords: financial wellness API, self-host fintech toolkit, CI4 API for budgeting, crypto alert API.
- Headlines: “Self-Host MyMI with CI4 APIs,” “Launch Financial Wellness Apps Faster,” “MyMI API Sandbox with 60% Off Access.”
- Meta: “Developers can deploy MyMI APIs for budgeting, investments, and crypto—join the sandbox and claim 60% off Gold access.”
- FAQ: authentication, rate limits, deployment prerequisites, support tiers, compliance.

# 6) Content Blueprints
## Social
- **LinkedIn Short:** “Developers: tap into MyMI APIs for budgeting, alerts, and exchange modules. Sandbox access is open with New Year pricing. {{CTA_SECONDARY}}”
- **LinkedIn Long:** “Launch a financial wellness platform without starting from scratch. MyMI’s CI4 APIs cover budgeting, portfolios, alerts, and crypto exchanges. Self-host or hybrid deploy with our automation scripts. Book a consult and secure 60% off Gold sandbox seats. {{CTA_PRIMARY}}”
- **X Posts:**
  1. “CI4-based APIs for budgeting + exchange now open. Developers get 60% off Gold for sandbox keys. {{CTA_PRIMARY}}”
  2. “Thread: Architecture—Wallet API → Alerts webhooks → Exchange endpoints. Reply ‘DOCS’ for Postman collection.”
  3. “No-link: What’s your top deployment blocker? DM for the runbook.”
  4. “Showcase: Partner deployed budgeting + alerts in 12 days with self-host toolkit.”
- **Discord Welcome:** “Welcome to #developer-lab. Grab the API quickstart, run `/api-keys` to generate sandbox credentials, and upgrade via {{CTA_PRIMARY}} for full access.”
- **Discord Pin:** “Pinned: Deployment scripts, rate limits, security checklist, quiet hours 11pm-6am ET.”
- **Discord Prompts:** “Share your stack,” “What’s your API call volume target?”, etc.

## Email
- Welcome: Provide API overview, sandbox steps, CTA `{{CTA_PRIMARY}}`.
- Deep Dive: Cover deployment scripts, rate limits, CTA `{{CTA_SECONDARY}}` for consult scheduling.
- Case Study: Highlight partner success, metrics, compliance.

## Blog
- Outline: API modules, deployment modes, security, compliance, CTA `{{CTA_PRIMARY}}`.
- Draft: 1,100 words with code snippets, diagrams, checklists.

## Video
- Shorts: 45s API quickstart.
- Long-form: 5-minute deployment tutorial.
- Slides: 8-slide deck for developer webinars.

# 7) Distribution Plan
- Cadence: LinkedIn weekly, X 3x weekly, Discord prompts twice weekly, Email monthly, Blog bi-monthly, YouTube monthly.
- Quiet hours: Discord 11pm-6am ET; schedule LinkedIn midday.
- UTM: `utm_content=li-api`, `utm_content=x-thread-api`, `utm_content=email-sandbox`, `utm_content=discord-key`.
- Cross-post: Provide GitHub gist for no-link groups, comment-first approach for LinkedIn, share PDF architecture doc.

# 8) Dashboard & Automation Hooks
- Buttons: “Generate API Kit,” “Send Deployment Checklist,” “Schedule Consult Reminder.”
- CRON: `marketing:api-nurture` Tuesdays 10:00 ET, `marketing:consult-followup` Thursdays 14:00 ET.
- Summaries: Management Dashboard > Marketing > Developer referencing `bf_marketing_scraper`.

# 9) Compliance & Disclaimers
- Outline shared security responsibilities for self-host deployments.
- Clarify data residency and privacy obligations; mention SOC2 roadmap.
- Include export restrictions for crypto modules.

# 10) Success Metrics & Review Cycle
- Owners: Developer Relations for sandbox signups, Solutions Engineering for consults, Compliance for security messaging.
- Checklist: Monitor API usage logs, ensure documentation links valid, update CTA tokens, review security checklist.
- Iterate: Publish SDK updates, integrate Terraform module, release monitoring dashboards.
